<?php
if(!isset($_SESSION['user.login'])){
    $_SESSION['message'] ="Login to continue!";
    header('location:login.php');
}


?>