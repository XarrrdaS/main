<?php
  $name = $_POST['name'];
  $message = nl2br(strip_tags($_POST['message']));
  $email = $_POST['email'];
  $surname = $_POST['surname'];
  $choicee = $_POST['subject'];




$newline = str_replace( "<br />", "", $message );
$subject = 'Wiadomość ze strony Vivende: ' . date( "d-m-Y H:i" );




// MAIL DO KTÓREGO WYSYŁANE SĄ WIADOMOŚCI 

$to = "przyklad@przyklad.com";

// ^^^




$mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";


$eol = "\r\n";

$headers = "From: ".$name." <".$email.">\r\n" .
"MIME-Version: 1.0\r\n" .
   "Content-Type: multipart/mixed;\r\n" .
   " boundary=\"{$mime_boundary}\"";

$message = "Imię i Nazwisko: ".$name."\nTelefon: ".$surname."\nEmail: ".$email."\n\nTemat: ".$choicee."\nWiadomość:\n".$newline;

$message = "\n\n" .
"--{$mime_boundary}\n" .
"Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$message . "\n\n";

foreach($_FILES as $userfile){
    $tmp_name = $userfile['tmp_name'];
    $type = $userfile['type'];
    $name = $userfile['name'];
    $size = $userfile['size'];

    if (file_exists($tmp_name)){

       if(is_uploaded_file($tmp_name)){
          $file = fopen($tmp_name,'rb');
          $data = fread($file,filesize($tmp_name));
          fclose($file);
          $data = chunk_split(base64_encode($data));
        }

        $message .= "--{$mime_boundary}\n" .
           "Content-Type: {$type};\n" .
           " name=\"{$name}\"\n" .
           "Content-Disposition: attachment;\n" .
           " filename=\"{$fileatt_name}\"\n" .
           "Content-Transfer-Encoding: base64\n\n" .
        $data . "\n\n";
     }
  }

  $message.="--{$mime_boundary}--\n";

            if ( mail($to, $subject, $message, $headers) ) {
                header("Location: kontakt.html"); 
            } else {
                header("Location: kontakt.html"); 
            }
?>