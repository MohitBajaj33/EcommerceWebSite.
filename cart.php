<?php

include_once "includes/header.php";
include_once "middleware/cartMiddleware.php";
include_once "function/userfunction.php";
include_once "config/connect.php";
?>
    <div class="py-3 bg-primary" >
        <div class="container">
            <a class="text-white" href="index.php">Home/</a>
            <a class="text-white" href="cart.php">Cart</a>   
        </div>
    </div>

 <div class="py-5">
        <div class="container">
          <div class="">
                <div class="row">
                  <div class="col-md-12">
                           <!-- <div class="row align-items-center">
                                <div class="col-md-5 col-sm-3 mb-2">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3 col-sm-2">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <h6>Action</h6>
                                </div>
                         </div> -->
                     
                         <?php $item = getCartItems();
                         foreach($item as $citem){ ?>
                         <div id="mycart">
                            <div class="card product_data shadow-sm mb-3">
                                <div class="row align-items-center">
                                        <div class="col-md-2 col-sm-3 mb-2 veiw_image">
                                            <img class="veiw_image" src="uploads/<?=$citem['image']?>" alt="Image" width="80">
                                        </div>
                                        <div class=" col-md-3 col-sm-2 card_name">
                                            <h5><?=$citem['name']?></h5>
                                        </div>
                                        <div class=" col-md-3 col-sm-2 card_price">
                                            <h5>&#8377;<?=$citem['selling_price']?></h5>
                                        </div>
                                        
                                        <div class=" col-md-2 col-sm-2 card_qty">
                                            <div class="input-group mb-3" style="width:130px">
                                                <input type="hidden" class ="prodId" value="<?=$citem['prod_id']?>">
                                                <button class="input-group-text decrement-btn updateqty">-</button>
                                                <input type="text" class="form-control input-qty text-center bg-white" value="<?=$citem['prod_qty']?>" disabled >
                                                <button class="input-group-text increment-btn updateqty">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <button class="btn btn-danger btn-sm ml-2 delete_cart_item" value="<?=$citem['cid']?>"><i class="fa fa-trash me-2"></i>Remove</button>
                                        </div>
                                </div>
                            </div>
                          <?php 
                         }
                         ?>
                          <div class="float-end plaace_order">
                              <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                           </div>
                         </div>
                          
                        </div>
                </div>
          </div>
        </div>
 </div>

<?php
include "includes/footer.php";
?>