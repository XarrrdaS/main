<?php
//$db = new mysqli("localhost","root","","cms");
require 'baza/db.php';


if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_GET['id']; 


$query = " select * from image where id = '$id'";
$result = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($result);
$img_name = $data['filename'];
$del_path = "image/".$img_name;
$del = mysqli_query($db,"delete from image where id = '$id'"); 
if($del && unlink($del_path))
{   
    mysqli_close($db); 
    header("location: modyfikacja.php"); 
    exit;	
}
else
{
    echo "Błąd przy usuwaniu!"; 
}

?>


<?php
$idd = $_GET['id']; 


$query = " select * from gallery_img where id = '$idd'";
$resultt = mysqli_query($db, $query);
$dataa = mysqli_fetch_assoc($resultt);
$img_namee = $dataa['img_name'];
$del_pathh = "img_gallery/".$img_namee;
$dell = mysqli_query($db,"delete from gallery_img where id = '$idd'"); 
if($dell && unlink($del_pathh))
{   
    mysqli_close($db); 
    header("location: modyfikacja.php"); 
    exit;	
}
else
{
    echo "Błąd przy usuwaniu!"; 
}

?>





<?php
$iddd = $_GET['id']; 


$query = " select zdj from main where id = '$iddd'";
$resulttt = mysqli_query($db, $query);
$dataaa = mysqli_fetch_assoc($resultt);
$img_nameee = $dataa['zdj'];
$del_pathhh = "main/".$img_nameee;
$delll = mysqli_query($db,"delete from gallery_img where id = '$iddd'"); 
if($delll && unlink($del_pathhh))
{   
    mysqli_close($db); 
    header("location: modyfikacja.php"); 
    exit;	
}
else
{
    echo "Błąd przy usuwaniu!"; 
}

?>