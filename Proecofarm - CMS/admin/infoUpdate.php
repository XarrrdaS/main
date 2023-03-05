<?php
 
 
 require 'baza/db.php';
//$hostName  ="localhost";
//$userName ="root";
//$userPassword ="";
//$database ="cms";
//$db  = new mysqli($hostName, $userName, $userPassword,$database);
 

$sql = "SELECT * FROM posts";
if ($db->connect_error){     
 
         
     die("Błąd przy łączeniu: " . $db->connect_error);
 
}
 
if($db->query("SELECT DATABASE()")){
     
    $dbSuccess =true;
    
    $result = $db->query("SELECT DATABASE()");
    $row = $result->fetch_row();
    header('Location: modyfikacja.php');
    $result->close();
 
     
     
}
 
 
if ($dbSuccess) {
         
             
            $title =  $_REQUEST["title"];  
            $heading =  $_REQUEST["heading"];  
            $content_poczatek =  $_REQUEST["content_poczatek"];  
            $content_main =  $_REQUEST["content_main"];  
            $content_main2 =  $_REQUEST["content_main2"];  
          




        
            error_reporting(0);
             
            $msg = "";
             
 
            if (isset($_POST['upload']) && !empty($_FILES["uploadfile"]["name"])){
             
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $folder = "./image/" . $filename;
             
             
    
                $sqll = "INSERT INTO image (filename) VALUES ('$filename')";
             
           
                mysqli_query($db, $sqll);
             
        
                if (move_uploaded_file($tempname, $folder)) {
                    echo "<h3>  Obrazek poprawnie wysłany!</h3>";
                } else {
                    echo "<h3>  Błąd przy wysyłaniu obrazka!</h3>";
                }
            }
        

            


            error_reporting(0);
             
            $msg = "";
             
 
            if (isset($_POST['upload']) && !empty($_FILES["imgupload"]["name"])){
             
                $filenamee = $_FILES["imgupload"]["name"];
                $tempnamee = $_FILES["imgupload"]["tmp_name"];
                $folderr = "../img_gallery/" . $filenamee;
             
             
    
                $sqlll = "INSERT INTO gallery_img (img_name) VALUES ('$filenamee')";
             
           
                mysqli_query($db, $sqlll);
             
        
                if (move_uploaded_file($tempnamee, $folderr)) {
                    echo "<h3>  Obrazek poprawnie wysłany!</h3>";
                } else {
                    echo "<h3>  Błąd przy wysyłaniu obrazka!</h3>";
                }
            }
        



            $cname__select = "UPDATE posts SET title = '$title', heading = '$heading', content_poczatek = '$content_poczatek', content_main = '$content_main',
            content_main2 = '$content_main2' WHERE id = 1 ";
             
             
           
            $cname__select_Query= mysqli_query($db,$cname__select);




            $cel_operacji =  $_REQUEST["cel_operacji"];  
            $tytul_zdj =  $_REQUEST["tytul_zdj"];  
            $opis_operacji =  $_REQUEST["opis_operacji"];  
            $sklad_grupy =  $_REQUEST["sklad_grupy"];  
            $budzet =  $_REQUEST["budzet"];  



            $cname__select = "UPDATE main SET cel_operacji = '$cel_operacji', tytul_zdj = '$tytul_zdj', opis_operacji = '$opis_operacji', sklad_grupy = '$sklad_grupy',
            budzet = '$budzet' WHERE id = 1 ";
             
             
           
            $cname__select_Query= mysqli_query($db,$cname__select);
}

?>


             