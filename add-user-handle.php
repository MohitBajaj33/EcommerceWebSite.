
<?php

include_once "includes/header.php";
include_once "function/userfunction.php";
include_once "config/connect.php";

echo '<pre>';
$foldername =getcwd();

$allowed_type =array('image/jpeg','image/png','image/jpg');
$error_type = '';
$pic_arr = $_FILES['pic'];
// print_r($pic_arr);

 $name = $pic_arr['name'];
 $pathinfo = pathinfo($name);
$filename = $pathinfo['filename'];
$extenstion = $pathinfo['extension'];
$real_name = time().'.'.$extenstion;

$type = $pic_arr['type'];
$tmp_location = $pic_arr['tmp_name'];
$size = floor($pic_arr['size']/1024);
$error = $pic_arr['error'];
$text_area = $_POST['text_area'];
$userId=$_SESSION['auth_user']['user_id'];

 $insert_sql = "INSERT INTO add_user(user_id, image, description) value('$userId', '$real_name', '$text_area')";
$result = mysqli_query($conn,$insert_sql);
  if(true){
     move_uploaded_file($tmp_location,$foldername.'/upload_user/'.$real_name);
    $_SESSION['message'] ="Add category Sccessfully!";
    header('location:add-user.php?msg=1');
  }else{
      $_SESSION['message'] ="Something went wrong";
      header('location:add-user.php');
    }

?>