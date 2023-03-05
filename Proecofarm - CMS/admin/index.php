<?php

header("Content-Type: text/html; charset=UTF-8");

session_start();


$is_admin = $_SESSION['admin'] ?? false;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['login'])) {
        
        $pass = $_POST['pass'] ?? null;
        $login = $_POST['login'] ?? null;
        $admin_hash = require_once 'haslo.php';
        $login_hash = require_once 'haslo.php';

        $login_hash = array_key_exists('login', $admin_hash) ? $admin_hash['login'] : null;
        $admin_hash = array_key_exists('pass', $admin_hash) ? $admin_hash['pass'] : null;
        if (!empty($pass) && password_verify($pass, $admin_hash) && !empty($login) && password_verify($login, $login_hash)) {
            $_SESSION['admin'] = true;
            echo '<p>Poprawnie zalogowano.</p>';
            header("Location: modyfikacja.php");
        } else {
            echo '<script>alert("Niepoprawny login lub hasło!")</script>';;
        }
    } elseif (isset($_POST['logout'])) {
        $_SESSION['admin'] = false;
        session_regenerate_id();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Realizacja Projektu</title>
    <link rel="shortcut icon" href="admin.ico">
    <link rel="shortcut icon" href="admin/admin.ico">
    <link href="style.css" rel="stylesheet">
    <link href="admin/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
        <div class='containter'>
            <div class="row">
                <main class="col-lg-8 offset-lg-2">
                <?php if (!$is_admin): ?>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" id='logowanie'>Login</label>
                            <input type="text" class="form-control" id="logowanie" aria-describedby="emailHelp" name="login" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" id="logowanie">Hasło</label>
                            <input type="password" class="form-control" id="logowanie" name="pass" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn">Zaloguj się</button>
                    </form>
                    <form action="logowanie.php" method="POST">
                        <button name="exit" type="submit" id="btn" class="btn btn-primary" style="margin-top: -1%;">Wyjdź</button>
                    </form>
                    <?php else: ?>
        <form action="logowanie.php" method="POST">
            <button name="logout" type="submit" id="btn" class="btn btn-primary">Wyloguj się</button>
        </form>
    <?php endif; ?>
                </main>
            </div>
        </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>