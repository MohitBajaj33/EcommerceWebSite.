<?php
session_start();
include_once 'config/connect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){ 
if(isset($_POST['submit']) and !empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $phone = $_POST['phone'];
    $confirm_pass = $_POST['C_pass'];

    // echo $password;
    // echo $confirm_pass;

    //Database Connectivity
    $chick_email = "SELECT email from  registation where email='$email'";
    $resut = mysqli_query($conn,$chick_email);
    if(!mysqli_num_rows($resut)>0){
    if($password==$confirm_pass){
    $insert_sql = "INSERT INTO registation (name,email,phone,password) VALUES ('{$name}','{$email}','{$phone}','{$password}')";
    $insert_sql_run=mysqli_query($conn,$insert_sql);
    if($insert_sql_run){
        $_SESSION['message'] ="Registered Successfully";
        header('location:login.php');
    }else{
        $_SESSION['message'] ="Something went wrong";
        header('location:registration.php');
    }
 }else{
    $_SESSION['message'] ="Not match password!";
    header("location:registration.php");

 }
    }else{
    $_SESSION['message'] ="Email allredy registerd!";
    header('location:registration.php');
    }

    }
    // Login hendale
    elseif(isset($_POST['login']) and !empty($_POST)){
       
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $select_sql = "SELECT * from  registation where email='$email' and password='$password'";
        $resut= mysqli_query($conn,$select_sql);
      
       
        if(mysqli_num_rows($resut)>0){
            $_SESSION['user.email'] = $email;
            $_SESSION['user.login'] = true;
            $data= mysqli_fetch_array($resut);
            $user_id=$data['id'];
            $username=$data['name'];
            $useremail=$data['email'];
            $_SESSION['user.name'] = $data['name'];
            $_SESSION['auth_user']=[
                'user_id'=>$user_id,
                'name'=>$username,
                'email'=>$useremail
            ];
       
            $_SESSION['role']=$data['role_as'];
           
            if($data['role_as']==1){
                $_SESSION['message'] ="Login Successfully!";
                header('location:admin/index.php');
            }else{
                $_SESSION['message'] ="Login user Successfully!";
                header('location:index.php');
            }
              
        }else{
            $_SESSION['message'] ="Invalid Credentials";
            header('location:login.php');
        }

    } 

    
    // Login End
    else{
        header("location:registration.php?msg=1");
    }
    

}else{
    header("location:registration.php?msg=2");
}