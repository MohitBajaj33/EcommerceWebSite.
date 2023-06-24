<?php
if(isset($_SESSION['user.login'])){

    if($_SESSION['role']!=1){
        $_SESSION['message'] ="You are not authorized to access this page!";
        header('location:index.php');
    }
}else{
    $_SESSION['message'] ="Login to continue!";
    header('location:../login.php');
}


?>