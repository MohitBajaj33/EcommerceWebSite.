<?php
session_start();
include('../config/connect.php');
if(isset($_SESSION['user.login']))
{
    if(isset($_POST['placeOrderBtn']))
    {
        $name=mysqli_real_escape_string($conn, $_POST['name']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $phone=mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode=mysqli_real_escape_string($conn,$_POST['pincode']);
        $address=$_POST['address'];
        $payment_mode=mysqli_real_escape_string($conn,$_POST['payment_mode']);
        $payment_id =mysqli_real_escape_string($conn,$_POST['payment_id']);

        if($name =="" || $email =="" || $phone =="" || $pincode=="" || $address=="")
        {
            echo("hii");
            $_SESSION['message'] ="All Fields are mandoatory";
            header('location:../checkout.php');
            exit(0);
        }

        $user_id=$_SESSION['auth_user']['user_id'];
        $query="SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid,p.name,p.image,p.selling_price 
        FROM  carts c, products p WHERE c.prod_id=p.id and c.user_id='$user_id' ORDER BY c.id DESC";
        $query_run = mysqli_query($conn,$query);
        $total_price=0;
         foreach($query_run  as $citem)
         {
            $total_price += $citem['selling_price']*$citem['prod_qty'];
         } 
        
        $tracking_no ="sharmacoder".rand(1111,9999).substr($phone,2);
        $insert_query="INSERT INTO orders (tracking_no,user_id,name,email,phone,address,pincode,total_price,payment_mode,payment_id)
        values('$tracking_no','$user_id','$name','$email','$phone','$address','$pincode','$total_price','$payment_mode','$payment_id')";
        
       
        $insert_query_run = mysqli_query($conn,$insert_query);
        if($insert_query_run )
        {
            $order_id=mysqli_insert_id($conn);
            foreach($query_run  as $citem)
         {
            $prod_id=$citem['prod_id'];
            $prod_qty=$citem['prod_qty'];
            $price=$citem['selling_price'];
            $insert_items_query = "INSERT INTO order_items (order_id,prod_id,qty,price) values('$order_id','$prod_id','$prod_qty','$price')";
            $insert_items_query_run=mysqli_query($conn,$insert_items_query);
         } 
         $deleteCartItem_query="DELETE FROM carts WHERE user_id='$user_id'";
         $deleteCartItem_query_run=mysqli_query($conn,$deleteCartItem_query);
         $_SESSION['message']="Order Placed successfully";
         header('Location:../my-orders.php');
         die();
           
        }

    }

}
else
{
    header('Location:../index.php');
}



?>