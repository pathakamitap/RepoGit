<?php
session_start();
session_destroy();
session_destroy();
    if(!isset($_SESSION['username'])){
        $loginMessage = 'You have been logged out.';
        header("location:../dealerLogin.php");
        exit();
    }

?>