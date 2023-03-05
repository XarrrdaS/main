<?php

header("Content-Type: text/html; charset=UTF-8");

session_start();


$is_admin = $_SESSION['admin'] ?? false;
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['login'])) {
       
        $pass = $_POST['pass'] ?? null;
        $admin_hash = require_once 'haslo.php';
       
        $admin_hash = array_key_exists('pass', $admin_hash) ? $admin_hash['pass'] : null;
        if (!empty($pass) && password_verify($pass, $admin_hash)) {
            $_SESSION['admin'] = true;
            echo '<p>Poprawnie zalogowano.</p>';
            header("Location: ../modyfikacja.php");
        } else {
            echo '<p>Hasło nie pasuje!</p>';
        }
    } elseif (isset($_POST['logout'])) {
        $_SESSION['admin'] = false;
        header("Location: ../admin");
        session_regenerate_id();
    }
    elseif (isset($_POST['exit'])) {
        header("Location: ../realizacja.php");;
    }
}

?>
