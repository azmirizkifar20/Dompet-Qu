<?php 
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    setcookie('id', '', time() - 86500);
    setcookie('key', '', time() - 86500);

    header("Location: login.php");
    exit;

?>