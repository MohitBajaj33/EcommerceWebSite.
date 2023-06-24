<?php
session_start();
include_once '../config/connect.php';
include_once '../function/myfunctions.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

  if(isset($_POST['submit']) and !empty($_POST)){

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $status =isset($_POST['status'])?'1':'0';
    $popular = isset($_POST['popular'])?'1':'0';
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $insert_sql = "INSERT INTO categories (name,slug,description,meta_title,status,popular,image,meta_description,meta_keywords) values 
    ('$name','$slug','$description','$meta_title','$status','$popular','$filename','$meta_description','$meta_keyword')";
    $result = mysqli_query($conn,$insert_sql);
      if($result){
         move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
        $_SESSION['message'] ="Add category Sccessfully!";
        header('location:add-category.php?msg=1');
      }else{
          $_SESSION['message'] ="Something went wrong";
          header('location:add-category.php');
        }
}

  elseif(isset($_POST['update_submit']) and !empty($_POST)){
         
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $status =isset($_POST['status'])?'1':'0';
    $popular = isset($_POST['popular'])?'1':'0';
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $path = "../uploads";
    
  
    if($new_image !="" ){
      $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
    }else{
   $update_filename = $old_image;
    }
  
    $update_sql = "UPDATE categories SET name='$name',slug='$slug',description='$description',meta_title='$meta_title',
    status='$status',popular='$popular',image='$update_filename',meta_description='$meta_description'
    ,meta_keywords='$meta_keyword' WHERE id='$category_id'";


     $result = mysqli_query($conn,$update_sql);
     if($result){
        if($_FILES['image']['name'] !=""){
          move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'. $update_filename);
          if(file_exists("../uploads/".$old_image)){
            unlink("../uploads/".$old_image);
          }
        }
        $_SESSION['message'] ="Category Updated Susseccfully!";
        header("location:edit-category.php?id=".$category_id);
     }
  }


  elseif(isset($_POST['delete_category_btn']) and !empty($_POST)){
    $category_id = $_POST['category_id'];
    $delete_sql = "DELETE from categories WHERE id ='$category_id'";
    $select_sql = "SELECT * FROM categories WHERE id ='$category_id'";
    $select_run = mysqli_query($conn,$select_sql);
    $data = mysqli_fetch_array($select_run);
    $image = $data['image'];
    $delete_run = mysqli_query($conn,$delete_sql);
     
    if($delete_run){
      if(file_exists("../uploads/".$image)){
        unlink("../uploads/".$image);
      }

      echo 200;
      // $_SESSION['message'] ="Delete Item Successfully!";
      // header('location:category.php');
    }else{
      echo 500;
      // $_SESSION['message'] ="Something went wrong";
      // header('location:category.php');
    }
  }

  elseif(isset($_POST['add-products']) and !empty($_POST)){
        
    $category_id = $_POST['categorie_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity =$_POST['qty'];
    $status =isset($_POST['status'])?'1':'0';
    $trending = isset($_POST['trending'])?'1':'0';
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    
    $product_query="INSERT INTO products (category_id,name,slug,small_description,description,original_price,
    selling_price,image,qty,status,trending,meta_title,meta_keyword,meta_description) VALUES('$category_id','$name',
    '$slug','$small_description','$description','$original_price','$selling_price','$filename','$quantity',
    '$status','$trending','$meta_title','$meta_keyword','$meta_description')";

    // echo($product_query);
    // exit;
    $product_query_run =mysqli_query($conn,$product_query);
    if($product_query_run){
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
      header('location:add-products.php?msg=1');
      $_SESSION['message'] ="Add products Sccessfully!";
    }else{
      header('location:add-products.php?msg=1');
      $_SESSION['message'] ="Something went wrong!";
    }
  }

  elseif(isset($_POST['update-products']) and !empty($_POST)){
    $product_id = $_POST['product_id'];
    $category_id = $_POST['categorie_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity =$_POST['qty'];
    $status =isset($_POST['status'])?'1':'0';
    $trending = isset($_POST['trending'])?'1':'0';
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    
    $image = $_FILES['image']['name'];
    $path = "../uploads";
  

    if($new_image !="" ){
      $image_ext = pathinfo($image,PATHINFO_EXTENSION);
      $update_filename = time().'.'.$image_ext;
    }else{
   $update_filename = $old_image;
    }
  
    $update_product="UPDATE products SET category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',
     description='$description',original_price='$original_price', selling_price='$selling_price',image='$update_filename',qty='$quantity',
     status='$status',trending='$trending',meta_title='$meta_title',meta_keyword='$meta_keyword',meta_description='$meta_description'
     WHERE id='$product_id'";

   
    
    $result = mysqli_query($conn,$update_product);
    if($result){
       if($_FILES['image']['name'] !=""){
         move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'. $update_filename);
         if(file_exists("../uploads/".$old_image)){
           unlink("../uploads/".$old_image);
         }
       }
       $_SESSION['message'] ="Product Updated Susseccfully!";
       header("location:edit-product.php?id=".$product_id);
    }



  }

  elseif(isset($_POST['delete_product_btn'])){
    // $product_id = $_POST['product_id'];
    $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
    $delete_sql = "DELETE from products WHERE id ='$product_id'";
    $select_sql = "SELECT * FROM products WHERE id ='$product_id'";
    $select_run = mysqli_query($conn,$select_sql);
    $data = mysqli_fetch_array($select_run);
    $image = $data['image'];
   
    $delete_run = mysqli_query($conn,$delete_sql);

    if($delete_run){
      if(file_exists("../uploads/".$image)){
        unlink("../uploads/".$image);
      }
      echo 200;
      // $_SESSION['message'] ="Product delete Successfully!";
      // header('location:products.php');
    }else{
      echo 500;
      // $_SESSION['message'] ="Something went wrong";
      // header('location:products.php');
    }
  }
  elseif(isset($_POST['update_order_btn']))
  {
    $tracking_no =$_POST['tracking_no'];
    $order_status =$_POST['order_status'];
    
    $updateOrder_query ="UPDATE orders SET status='$order_status' WHERE tracking_no='$tracking_no'";
  
    $updateOrder_query_run = mysqli_query($conn,$updateOrder_query);

    redirect("view-order.php?t=$tracking_no", "Order status update successfully");
  }

}else{
  $_SESSION['message'] ="Request Not POST";
        header('location:add-category.php');
}
?>