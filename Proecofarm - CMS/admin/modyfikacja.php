<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora</title>
    <link rel="shortcut icon" href="admin.ico">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<form id="myForm" action="infoUpdate.php" method="post" enctype="multipart/form-data">

<?php
    session_start();
    $is_admin = $_SESSION['admin'] ?? false;
    require 'baza/db.php';
    //$db = new mysqli('localhost', 'root', '', 'cms');
    $sql = "SELECT * FROM posts";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    

?>


<?php

header("Content-Type: text/html; charset=UTF-8");

$is_admin = $_SESSION['admin'] ?? false;
?>


<?php if ($is_admin): ?>
<div style="margin-left: 20%;">
<h2 style='margin-bottom: 60px; margin-right: auto; margin-left: auto; display: block;'>Realizacja projektu</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tytuł</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='title'><?php echo $row['title']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nagłówek</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='heading'><?php echo $row['heading']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Wstęp</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='content_poczatek'><?php echo $row['content_poczatek']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Rozwinięcie</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='content_main'><?php echo $row['content_main']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Zakończenie</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='content_main2'><?php echo $row['content_main2']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Obrazek</label>
    <p><span><input type="file" name="uploadfile" style="width: 18%"></span></p>
    <?php
        $query = " select * from image ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <td><a id='delete' style="word-wrap: break-word;" class="btn btn-primary" href="delete.php?id=<?php echo $data['id']; ?>">Usuń</a></td>
            <img width=10% height=10% src="image/<?php echo $data['filename']; ?>">
            <br>

        <?php
        }
        ?>
  </div>
  <div>
<?php
  $sql = "SELECT * FROM main";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    ?>


  <div>
<h2 style='margin-bottom: 60px; margin-right: auto; margin-left: auto; display: block; margin-top: 200px'>ProEcoFarm główna strona</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cel operacji</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='cel_operacji'><?php echo $row['cel_operacji']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tytuł zdjęcia</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='tytul_zdj'><?php echo $row['tytul_zdj']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Opis operacji</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='opis_operacji'><?php echo $row['opis_operacji']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Skład grupy</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='sklad_grupy'><?php echo $row['sklad_grupy']; ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Budżet</label>
    <textarea onkeydown="if(event.keyCode===9){var v=this.value,s=this.selectionStart,e=this.selectionEnd;this.value=v.substring(0, s)+'\t'+v.substring(e);this.selectionStart=this.selectionEnd=s+1;return false;}" rows="3" style="width: 70% !important; overflow:hidden" type="text" class="form-control"  id="message" name='budzet'><?php echo $row['budzet']; ?></textarea>
  </div>



  <h2 style='margin-right: auto; margin-left: auto; display: block; margin-top: 150px;'>Galeria</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Obrazek</label>
    <p><span><input type="file" name="imgupload" style="width: 18%"></span></p>
    <?php
        $query = " select * from gallery_img ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <td><a id='delete' style="word-wrap: break-word;" class="btn btn-primary" href="delete.php?id=<?php echo $data['id']; ?>">Usuń</a></td>
            <img width=10% height=10% src="img_gallery/<?php echo $data['img_name']; ?>">
            <br>

        <?php
        }
        ?>

    </form>
  </div>
  <button class="btn btn-primary" type="submit" name="upload" id='zapisz' style="word-wrap: break-word;">Zapisz</button>   
</div>
</form>
</body>
<form action="logowanie.php" method="POST">
      <button name="logout" type="submit" class="btn btn-primary" style='word-wrap: break-word;' id='wyloguj'>Wyloguj się</button>
</form>







<?php endif; ?>
<script>
  document.querySelectorAll("textarea").forEach(element => {
    function autoResize(el) {
      el.style.height = el.scrollHeight + 'px';
    }
    autoResize(element);
    element.addEventListener('input', () => autoResize(element));
  });
</script>
</html>