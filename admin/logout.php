<?php
    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_email']);
    $_SESSION['admin'] = false;
    session_destroy();
    header("location:login.php");
?>