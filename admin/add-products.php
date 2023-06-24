
<?php include_once 'includes/header.php';
include_once '../config/connect.php';
include_once '../middleware/adminMiddleware.php';


?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4>Add Products</h4>
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
         <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
         <?php
     }
 }
 else{
    echo "No Category availble";
 }

?>
</select>
</div>     

<div class="col-md-6">
<label class="mb-0" for="exampleInputEmail1" class="form-label">Name</label>
<input type="text" class="form-control" name="name"  id="exampleInputEmail1" placeholder="Enter Your name" required>
</div>

<div class="col-md-6">
<label class="mb-0" for="slug_id" class="form-label">Slug</label>
<input type="text" class="form-control" name="slug"  id="slug_id" placeholder="Enter Slug" required>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="small_description" class="form-label"> Small Description</label>
<textarea row="3" class="form-control" name="small_description"  id="small_description" placeholder="Enter Small description" required></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="description" class="form-label">Description</label>
<textarea row="3" class="form-control" name="description"  id="description" placeholder="Enter description" required></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="original_price" class="form-label"> Original Price</label>
<input type="text" class="form-control" name="original_price"  id="original_price" placeholder="Enter Original Price" required>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="selling_price" class="form-label">Selling Price</label>
<input type="text" class="form-control" name="selling_price"  id="selling_price" placeholder="Enter Selling Price" required>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="image" class="form-label">Upload Image</label>
<input type="file" class="form-control" name="image"  id="image"  required>
</div>
</div>


<div class="row">
<div class="col-md-6">
<label class="mb-0" for="qty" class="form-label">Quantity</label>
<input type="number" class="form-control" name="qty"  id="qty" placeholder="Enter Quantity"  required>
</div>

<div class="col-md-3">
<label class="mb-0" for="status" class="form-label">Status</label><br>
<input type="checkbox" name="status" id="status"  >
</div>

<div class="col-md-3">
<label class="mb-0" for="trending" class="form-label">Trending</label><br>
<input type="checkbox" name="trending" id="trending"  >
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_title" class="form-label">Meta Title</label>
<textarea row="3" class="form-control" name="meta_title"  id="meta_title" placeholder="Enter description" required></textarea>
</div>
</div>


<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_description" class="form-label">Meta Description</label>
<textarea row="3" class="form-control" name="meta_description"  id="meta_description" placeholder="Enter description" required></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label class="mb-0" for="meta_keyword" class="form-label">Meta Keyword</label>
<textarea row="3" class="form-control" name="meta_keyword"  id="meta_keyword" placeholder="Enter description" required></textarea>
</div>
</div>


<div class="col-md-12 mt-2">
<button type="submit" name="add-products" class="btn btn-primary">Save</button>
</div>

</div>
</form>

        </div>
         </div>
    </div>
</div>
<?php include_once 'includes/footer.php';?>