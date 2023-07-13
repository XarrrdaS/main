<!DOCTYPE html>
<html lang="pl">

<?php
    session_start();
    $is_admin = $_SESSION['admin'] ?? false;
    header("Content-Type: text/html; charset=UTF-8");

    // Sprawdzenie czy kliknięto przycisk wylogowania
    if(isset($_POST['logout'])) {
        // Zakończenie sesji i wygenerowanie nowego identyfikatora
        session_unset();
        session_destroy();
        session_regenerate_id();
        // Przekierowanie na stronę logowania
        header("Location: index.php");
        exit;
    }
?>


<?php if ($is_admin): ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-login.css">
    <title>Logged in</title>
</head>
<body>
    <div class="container">
        <h1>Successfully logged in &#10084;</h1>
        <form action="" method="post">
            <button name="logout" type="submit" id="btn" class="btn-logout">L O G &nbsp; O U T</button>
        </form>
    </div>
</body>

<?php 
    endif;
?>

</html>