<?php

include_once "includes/header.php";
include_once "function/userfunction.php";
include_once "config/connect.php";
?>

<!-- 
    <div class="py-3 bg-primary" >
        <div class="container">
            <a class="text-white" href="index.php">Home/</a>
            <a class="text-white" href="cart.php">Cart</a>   
        </div>
    </div> -->


    

 <div class="py-5">
    <div class="container">

            <div class="row align-items-center">
            
            <div class="col-md-3"></div>
                <div class="col-md-6">
                <div class="uplod_box" id="uplod_box">
                    <form action="add-user-handle.php" method="POST" enctype="multipart/form-data">
                     <div class="add-user">
                        <input type="file" id="upload_image"  name="pic">
                            <label for="upload_image"><i class="fa-solid fa-upload">&nbsp;
                                Choose A Photo
                            </i></label>
                            </div>
                            <textarea name="text_area" id="text_area" cols="40" rows="5" placeholder="Enter the message..."></textarea>
                            <input type="submit" name="sub" value="Upload" class="d-grid gap-2 col-6 mx-auto mt-3 btn btn-primary btn-lg">
                     </form>
                </div>
                <div class="col-md-3"></div>
        </div>
        </div>
    
        <?php
             $item = getAddUser();
             if(mysqli_num_rows($item)>0){
               ?>
               <div id="addBox">
          <div class="py-5">
                <div class="row">
                  <!-- <div class="col-md-12">
                           <div class="row align-items-center">
                                <div class="col-md-3 col-sm-3">
                                    <h6>Image</h6>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <h6>Description</h6>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <h6>Time</h6>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <h6>Action</h6>
                                </div>
                         </div> -->
                     
                         <?php 
             
                        
                         foreach($item as $citem){ 
                            ?>
                         
                            <div class="card shadow-sm mb-3">
                                <div class="row align-items-center product">
                                        <div class="col-md-3 col-sm-3 mb-2 veiw_image">
                                            <img class="veiw_image" src="upload_user/<?=$citem['image']?>" alt="Image" height="100" width="100">
                                        </div>
                                        <div class="col-md-3 col-sm-3 description">
                                            <h5><?=$citem['description']?></h5>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5><?=$citem['create_at']?></h5>
                                        </div>
                                        
                                      
                                        <div class="col-md-3 col-sm-3">
                                            <button class="btn btn-danger btn-sm ml-2 delete_add_user_item" value="<?=$citem['id']?>"><i class="fa fa-trash me-2"></i>Remove</button>
                                        </div>
                                </div>
                            </div>
                          <?php 
                         }
                         ?>
                         </div>
                          
                        </div>
                        <?php
             }
             ?>
                </div>
          </div>
        </div>
 </div> 

<?php
include "includes/footer.php";
?>