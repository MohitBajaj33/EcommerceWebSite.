<?php
session_start();
if(isset($_SESSION['user.email'])){
    unset($_SESSION['user.email']);
    unset($_SESSION['user.login'] );
    $_SESSION['message'] ="Logout Successfully!";
}

header('location:index.php');