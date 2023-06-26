<?php 
      include_once "includes/header.php";
      include_once "config/connect.php";
?>

<?php 

  $select_query= "SELECT * FROM  products WHERE status='0' AND trending='0'";
  $result =mysqli_query($conn,$select_query);
  $data=mysqli_fetch_array($result);
?>


    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button><a href="#product1">Shop now</a> </button>
    </section>

    <!-- <section id="feature" class="section-p1">
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f2.png" alt="">
            <h6>Onile Order</h6>
        </div>
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f4.png" alt="">
            <h6>Promotios</h6>
        </div>
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img class="fe-img" src="uploads/img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>

    </section> -->
    <br>
    <section id="product1" class="section-p1">
        <h2>Trending Products </h2>
        <p>Summer Collection New Morden Desing</p>
        <div class="pro-container">
         <!-- <div class="owl-carousel"> -->
            <?php
                    $trending=getAllTrending();
                if(mysqli_num_rows($trending)>0)
                {
                    foreach($trending as $item){
                    {
                        ?>
                        <div class="pro item">
                            <a href="product-view.php?product=<?=$item['slug']; ?>">
                            <img src="uploads/<?= $item['image']; ?>" alt="">
                            </a>
                            <div class="dos">
                                <span>adidas</span>
                                <h5><?= $item['name']; ?></h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>&#8377;<s class="text-danger"><?= $item['original_price']; ?> </s>  &nbsp;  <?= $item['selling_price']; ?></h4>
                            </div>
                            <a class="cart" href="product-view.php?product=<?=$item['slug']; ?>"><i class="fa fa-shopping-cart me-2"></i></a>
                        
                            <!-- <i class="fas fa-shopping-cart cart addToCartBtn"></i>   -->
                        </div>
                    
                        <?php
                        }
                    }
                } 
                else
                {

                    echo "NO data available";
                }
                    ?>
            <!-- </div> -->
        </div>
    </section>

    <section id="product2" class="section-p1">
        <h2>Featured Products </h2>
        <p>Summer Collection New Morden Desing</p>
        <div class="pro-container">
                <?php
                    $count=0;
                if(mysqli_num_rows($result)>0)
                {
                    
                    foreach($result as $item){
                        $count++;
                        if($count<=5)
                    {
                        ?>
                        <div class="pro">
                            <a href="product-view.php?product=<?=$item['slug']; ?>">
                            <img src="uploads/<?= $item['image']; ?>" alt="">
                            </a>
                            <div class="dos">
                                <span>adidas</span>
                                <h5><?= $item['name']; ?></h5>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4>&#8377;<s class="text-danger"><?= $item['original_price']; ?> </s>  &nbsp;  <?= $item['selling_price']; ?></h4>
                            </div>
                            <a class="cart" href="product-view.php?product=<?=$item['slug']; ?>"><i class="fa fa-shopping-cart me-2"></i></a>
                        
                            <!-- <i class="fas fa-shopping-cart cart addToCartBtn"></i>   -->
                        </div>
                    
                        <?php
                        }
                    }
                } 
                else
                {

                    echo "NO data available";
                }
                    ?>
            
 

        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="product2" class="section-p1">
        <h2>New Arrivals </h2>
        <p>Summer Collection New Morden Desing</p>
        <div class="pro-container">
        <?php if(mysqli_num_rows($result)>0)
            {
                foreach($result as $item){
                    ?>
                    <div class="pro">
                        <a href="product-view.php?product=<?=$item['slug']; ?>">
                        <img src="uploads/<?= $item['image']; ?>" alt="">
                        </a>
                        <div class="dos">
                            <span>adidas</span>
                            <h5><?= $item['name']; ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                           <h4>&#8377;<s class="text-danger"><?= $item['original_price']; ?> </s>  &nbsp;  <?= $item['selling_price']; ?></h4>
                        </div>
                        <a class="cart" href="product-view.php?product=<?=$item['slug']; ?>"><i class="fa fa-shopping-cart me-2"></i></a>
                   </div>
                   <?php
                }
            } 
            else
            {

                echo "NO data available";
            }
                ?>
            
        </div>
    </section>





    <section id="sm-banner" class="section-p1" >
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free </h2>
            <span>The best classic dress is on sale at cara</span>
            <button> Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming season </h2>
            <span>The best classic dress is on sale at cara</span>
            <button>Learn More</button>
        </div>

    </section>
    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE </h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>SEASONAL SALE </h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>SEASONAL SALE </h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
    </section>
    <section id="newsletter" class="section-m1 section-p1">
        <div class="newstext">
            <h4>Sing Up For Newsletters</h4>
            <p>Get E-mail updates about our <span>special offers.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sing Up</button>
        </div>
    </section>
<?php include_once "includes/footer.php" ?>
<script>
   $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

   });
</script>