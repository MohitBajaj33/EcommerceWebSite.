<?php
include_once "includes/header.php";
include_once "function/userfunction.php";

if(isset($_GET['product'])){
    $prodect_slug =$_GET['product'];
    $prodect_data = getSlugActive("products",$prodect_slug);
    $prodect =mysqli_fetch_array($prodect_data);

    if($prodect)
    {
        ?>
        
        <div class="py-3 bg-primary" >
            <div class="container">
                <a class="text-white" href="index.php">Home/</a>
                <a class="text-white" href="index.php"><?= $prodect['name']; ?></a>
            </div>
        </div>

       <div class="bg-light py-4">
        <div class="container product_data mt-3" id="view-product">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                       <img src="uploads/<?=$prodect['image'];  ?>" alt="Product image" class="w-100">
                    </div>
                </div>
                <div class="col-md-8 mt-2">
                    <h4><?= $prodect['name']; ?>
                    <span class="float-end text-danger"><?php if($prodect['trending']) {echo "Trending";} ?>
                </h4>
                    <hr>
                    <p><?= $prodect['small_description']; ?></p>   
                    <div class="row">
                        <div class="col-md-6 col-sm-6 s_price">
                            <h5>RS <span class="text-success "> <?=$prodect['selling_price']; ?></span></h5>
                        </div>
                        <div class="col-md-6 col-sm-6 or_price">
                            <h5 >RS <soriginal_price class="text-danger "><?=$prodect['original_price']; ?></s></h5>
                        </div>
                   
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3" style="width:130px">
                                 <button class="input-group-text decrement-btn">-</button>
                                <input type="text" class="form-control input-qty text-center bg-white" value="1" disabled >
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4 col-sm-5 col-xs-5" id="btn_width">
                            <button class="btn btn-primary px-4 btncart addToCartBtn " value="<?=$prodect['id']; ?>"> <i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-5" id="btn_width">
                        <a href="#" class="btn btn-danger btnbuy px-4"> <i class="fa-sharp fa-solid fa-heart"></i> Add to Wishlist</a>
                        </div>
                    </div>

                    <hr>
                    <h6>Product Description:</h6>
                    <p><?= $prodect['description']; ?></p>
                </div>
            </div>
        </div>
</div>


        <?php

    }else
    {
        echo "Product Not fFound";
    }

}
else{
    echo "Something Went wrong";
}

include "includes/footer.php";
?>