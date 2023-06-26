<?php

include_once "includes/header.php";
include_once "middleware/cartMiddleware.php";
include_once "function/userfunction.php";
include_once "config/connect.php";
?>
    <div class="py-3 bg-primary" >
        <div class="container">
            <a class="text-white" href="index.php">Home/</a>
            <a class="text-white" href="checkout.php">Checkout</a>   
        </div>
    </div>

    <div class="py-5">
        <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="function/placeorder.php" method="POST">
                            <div class="row">
                                <div class="col-md-7">
                                    <h5>Basic Details</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class='fw-bold'>Name</label>
                                            <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class='fw-bold'>E-mail</label>
                                            <input type="email" name="email" required placeholder="Enter your email" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class='fw-bold'>Phone</label>
                                            <input type="number" name="phone" required placeholder="Enter your phone number" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class='fw-bold'>Pin Code</label>
                                            <input type="text" name="pincode" required placeholder="Enter your email" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class='fw-bold'>Address</label>
                                            <textarea name="address" required class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <h5>Order Details</h5>
                                    <hr>
                                    <?php $item = getCartItems();
                                    $total_price=0;
                                    foreach($item as $citem){
                                    ?>
                                            <div class="mb-1 border">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3 col-sm-3 mb-2">
                                                        <img src="uploads/<?=$citem['image']?>" alt="Image" width="50">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <h5 class="name"><?=$citem['name']?></h5>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <h5 class="selling_price">&#8377;<?=$citem['selling_price']?></h5>
                                                    </div>
                                                    <div class="col-md-3 col-sm-3">
                                                        <h5 class="qty">x<?=$citem['prod_qty']?></h5>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                    <?php 
                                    $total_price += $citem['selling_price']*$citem['prod_qty'];
                                    } 
                                    ?>
                                    <hr>
                                <h5>Total Price: <span class="float-end fw-bold">&#8377;<?= $total_price?></span></h5>
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and plase order | COD</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
        </div>
 </div>

<?php
include "includes/footer.php";
?>