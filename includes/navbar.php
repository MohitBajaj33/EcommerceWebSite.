<?php include_once "function/userfunction.php";?>
<?php 
$data=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<section id="header">
        <a href="index.php"><img src="uploads/img/logo1.jpg" width="50px" alt="" class="logo_nav"></a>

        <div>
            <ul id="navbar">
                <li><a class="<?= $data=='index.php'?'active btn-bg-color':'';?>" href="index.php">Home</a></li>
                <li><a href="index.php#product1">Shop</a></li>
              
                <li><a href="#footer">Contact</a></li>
                
                <span id="close"><i class="fas fa-times"></i></span>
                <?php if(isset($_SESSION['user.email'])){ ?>
                    <li id="lg-bag"><a class="<?= $data=='cart.php'?'active btn-bg-color':'';?>" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
                    <li id="lg-bag"><a class="<?= $data=='my-orders.php'?'active btn-bg-color':'';?>" href="my-orders.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li id="lg-bag"><a class="<?= $data=='add-user.php'?'active btn-bg-color':'';?>" href="add-user.php"><i class="fa-sharp fa-solid fa-plus"></i></a></li>
                    <li><a href="#footer"><?php echo $_SESSION['user.name'];?></a></li>
                    <li><a href="logout.php">Logout</a></li>
              <?php  }else{?>
                
                <li><a href="login.php">Sign in</a></li>
                <li><a href="registration.php">Sign up</a></li>
             <?php }?>
            </ul>
            <div id="mobile">
            <?php if(isset($_SESSION['user.email'])){ ?>
                <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i><a>
                <a  href="my-orders.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <a  href="add-user.php"><i class="fa-sharp fa-solid fa-plus"></i></a>
              <?php  }?>
              
               <i id="bar"  class="fas fa-outdent"></i>
                
            </div>
        </div>
        </div>
    </section>