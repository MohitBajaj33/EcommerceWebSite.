<?php

include_once 'includes/header.php';
include_once '../middleware/adminMiddleware.php';
include_once '../function/myfunctions.php';
include_once '../config/connect.php';
if(isset($_GET['id']))
{
    $tracking_no=$_GET['id'];
    $UserDimandDetails= getUserDimandDetails($tracking_no);
    
    
    if(mysqli_num_rows($UserDimandDetails)<0)
    {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    }
}else
{
  ?>
  <h4>Something went wrong</h4>
  <?php
   }

 $data=mysqli_fetch_array($UserDimandDetails);
?>


        <div class="container product_data mt-3" id="view-product">
            <div class="row">
            <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-primary">
                   <span class="text-white fs-4">User Dimand</span>
                   <a href="userDimand.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
                </div>
</div>
</div>
<br>
<div class="bg-light py-4">
<div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                    <img src="../upload_user/<?=$data['image'];  ?>" alt="Product image" class="w-100">
                </div>
                </div>
                <div class="col-md-8 mt-2 align-items-center">
                    <h4>UserName = <?= $data['name']; ?></h4>
                    <h4>User Phone No. =  <?= $data['phone']; ?></h4>
                    <h4>UserDimand =  <?= $data['description']; ?></h4>
                    
                </div>
        </div>
</div>


 <?php
include "includes/footer.php";
?>