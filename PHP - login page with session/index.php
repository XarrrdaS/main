<?php

header("Content-Type: text/html; charset=UTF-8");
session_start();


$is_admin = $_SESSION['admin'] ?? false;
?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['login'])) {
        
        $login = $_POST['login'] ?? null;
        $pass = $_POST['pass'] ?? null;
        $admin_hash = require_once 'hash.php';
        $login_hash = require_once 'hash.php';

        $login_hash = array_key_exists('login', $admin_hash) ? $admin_hash['login'] : null;
        $admin_hash = array_key_exists('pass', $admin_hash) ? $admin_hash['pass'] : null;
        if (!empty($pass) && password_verify($pass, $admin_hash) && !empty($login) && password_verify($login, $login_hash)) {
            $_SESSION['admin'] = true;
            header("Location: login.php");
            exit;
        } else {
            echo '<style>
            #login, #pass{
                animation: shake 0.2s ease-in-out 0s 2 !important;
                box-shadow: 0px 0px 1px 1px #e03a3a !important;
                width: 295px !important;
                height: 40px !important;
            }
            @keyframes shake {
                0% {transform: translateX(4px);}
                50% {transform: translateX(-4px);}
                100% {transform: translateX(4px);}
              }
        </style>';
        $_SESSION['admin'] = false;
        session_regenerate_id();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-index.css">
    <title>PANEL</title>
</head>
<body>
    <div class="container">
        <?php if (!$is_admin): ?>
        <span id="wlc">W E L C O M E</span>
        <form action="" method="post">
            <input type="text" name="login" id="login" placeholder="U S E R N A M E">
            <input type="password" name="pass" id="pass" placeholder="P A S S W O R D">
            <button id="btn">L O G &nbsp; I N</button>
        </form>
        <?php else: ?>
        <form action="" method="post">
            <button name="logout" type="submit" id="btn" class="btn-logout">L O G &nbsp; O U T</button>
        </form>
    <?php endif;
        session_destroy();
    ?>
    </div>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>