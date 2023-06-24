
<?php
 
include_once 'includes/header.php';
include_once '../config/connect.php';
include_once '../middleware/adminMiddleware.php';


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php if(isset($_GET['id'])){
              
              $id =$_GET['id'];
              $select_sql = "SELECT * FROM products WHERE id='$id'";
              $result = mysqli_query($conn,$select_sql);
              if(mysqli_num_rows($result)>0){
              
                  $data = mysqli_fetch_array($result);
              ?>
        <div class="card">
        <div class="card-header">
            <h4>Edit Products</h4>
        </div>
        <div class="card-body">
<form action="code.php" method="post" enctype="multipart/form-data">
    <div class="row">

<div class="col-md-12">
<label class="mb-0" for="exampleInputEmail1" class="form-label">Select Category</label>
<select class="form-select mb-2" name="categorie_id">
<option selected>Select Category</option>
<?php
 $query="SELECT * FROM categories " ;
 $categories=mysqli_query($conn,$query);
 if(mysqli_num_rows($categories)>0){
    foreach($categories as $item){
        ?>
         <option value="<?php echo $item['id']; ?>" <?php echo $data['category_id']==$item['id']?'selected':''?>><?php echo $item['name']; ?></option>
         <?php
     }
 }
 else{
    echo "No Category availble";
 }

?>
</select>
</div>     
<input type="hidden" name="product_id"  value="<?php echo $data['id']; ?>">
<div class="col-md-6">
<label class="mb-0" for="exampleInputEmail1" class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>"  id="exampleInputEmail1" placeholder="Enter Your name" required>
</div>

<div class="col-md-6">
<label class="mb-0" for="slug_id" class="form-label">Slug</label>
<input type="text" class="form-control" value="<?php echo $data['slug']; ?>" name="slug"  id="slug_id" placeholder="Enter Slug" required>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="small_description" class="form-label"> Small Description</label>
<textarea row="3" class="form-control" name="small_description"  id="small_description" placeholder="Enter Small description" required><?php echo $data['small_description']; ?></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="description" class="form-label">Description</label>
<textarea row="3" class="form-control" name="description"  id="description" placeholder="Enter description" required><?php echo $data['description']; ?></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="original_price" class="form-label"> Original Price</label>
<input type="text" class="form-control" value="<?php echo $data['original_price']; ?>"  name="original_price"  id="original_price" placeholder="Enter Original Price" required>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="selling_price" class="form-label">Selling Price</label>
<input type="text" class="form-control" value="<?php echo $data['selling_price']; ?>"  name="selling_price"  id="selling_price" placeholder="Enter Selling Price" required>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="image" class="form-label">Upload Image</label>
<input type="hidden" name="old_image" value="<?php echo $data['image']; ?>"  >
<input type="file" class="form-control" name="image"  id="image">
<label for="image" class="form-label">Crennt Image</label>
  <img src="../uploads/<?php echo $data['image']; ?>" width="50px"  height ="50px" alt="">
</div>
</div>


<div class="row">
<div class="col-md-6">
<label class="mb-0" for="qty" class="form-label">Quantity</label>
<input type="number" class="form-control" value="<?php echo $data['qty']; ?>"   name="qty"  id="qty" placeholder="Enter Quantity"  required>
</div>

<div class="col-md-3">
<label class="mb-0" for="status" class="form-label">Status</label><br>
<input type="checkbox" <?php echo $data['status'] ?'checked':''; ?>  name="status" id="status"  >
</div>

<div class="col-md-3">
<label class="mb-0" for="trending" class="form-label">Trending</label><br>
<input type="checkbox" <?php echo $data['status'] ?'trending':''; ?>  name="trending" id="trending"  >
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_title" class="form-label">Meta Title</label>
<textarea row="3" class="form-control" name="meta_title"  id="meta_title" placeholder="Enter description" required><?php echo $data['meta_title']; ?></textarea>
</div>
</div>


<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_description" class="form-label">Meta Description</label>
<textarea row="3" class="form-control" name="meta_description"  id="meta_description" placeholder="Enter description" required><?php echo $data['meta_description']; ?></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_keyword" class="form-label">Meta Keyword</label>
<textarea row="3" class="form-control"  name="meta_keyword"  id="meta_keyword" placeholder="Enter description" required><?php echo $data['meta_keyword']; ?></textarea>
</div>
</div>


<div class="col-md-12 mt-2">
<button type="submit" name="update-products" class="btn btn-primary">Update</button>
</div>

</div>
</form>

        </div>
         </div>
         <?php
                }else{
                    echo "Product not found!";
                }    
            }else{
                    echo "Id Missing from url!";
                } ?>
         </div>
    </div>
</div>
<?php include_once 'includes/footer.php';?>