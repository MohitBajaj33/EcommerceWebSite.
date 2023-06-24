<?php
   session_start();
include('../config/connect.php');

if(isset($_SESSION['user.login'])){
    if(isset($_POST['scope'])){
        $scope =$_POST['scope'];
        $id =$_POST['id'];
        $chk_existing_cart="SELECT * FROM add_user WHERE id='$id'";
        $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);
        $data = mysqli_fetch_array($chk_existing_cart_run);
        $image = $data['image'];

        if(mysqli_num_rows($chk_existing_cart_run)>0)
        {
            $delete_query="DELETE FROM add_user WHERE id='$id'";
            $delete_query_run= mysqli_query($conn,$delete_query);
            if($delete_query_run){
                if(file_exists("../upload_user/".$image)){
                  unlink("../upload_user/".$image);
                }

              }
            if($delete_query_run){
                echo 200;
            }
            else{
                echo("Something went wrong");
            }
        }
        else
        {
            echo("Something went wrong");
        }
    }

}
?>