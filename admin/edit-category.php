
<?php include_once 'includes/header.php';
include_once '../middleware/adminMiddleware.php';
include_once '../config/connect.php';

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
             <?php if(isset($_GET['id'])){
              
                $id =$_GET['id'];
                $select_sql = "SELECT * FROM categories WHERE id='$id'";
                $result = mysqli_query($conn,$select_sql);
                if(mysqli_num_rows($result)>0){
                
                    $data = mysqli_fetch_array($result);
                ?>
<div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
<form action="code.php" method="post" enctype="multipart/form-data">
    <div class="row">

<div class="col-md-6">
    <input type="hidden" name="category_id" value="<?php echo $data['id']; ?>">
<label for="exampleInputEmail1" class="form-label">Name</label>
<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" id="exampleInputEmail1" placeholder="Enter Your name" required>
</div>

<div class="col-md-6">
<label for="slug_id" class="form-label">Slug</label>
<input type="text" class="form-control" name="slug" value=" <?php echo $data['slug']; ?>"  id="slug_id" placeholder="Enter Slug" required>

</div>
<div class="mt-2">
<div class="col-md-12">
<label for="description" class="form-label">Description</label>
<textarea row="3" class="form-control" name="description"  id="description" placeholder="Enter description" required><?php echo $data['description']; ?></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="image" class="form-label">Upload Image</label>
<input type="file" class="form-control" name="image"  id="image">
<label for="image" class="form-label">Crennt Image</label>
<input type="hidden" name="old_image" value="<?php echo $data['image']; ?>"  >
  <img src="../uploads/<?php echo $data['image']; ?>" width="50px"  height ="50px" alt="">
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="meta_title" class="form-label">Meta Title</label>
<textarea row="3" class="form-control" name="meta_title"  id="meta_title" placeholder="Enter description" required><?php echo $data['meta_title']; ?></textarea>
</div>
</div>


<div class="mt-2">
<div class="col-md-12">
<label for="meta_description" class="form-label">Meta Description</label>
<textarea row="3" class="form-control" name="meta_description"  id="meta_description" placeholder="Enter description" required><?php echo $data['meta_description']; ?></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="meta_keyword" class="form-label">Meta Keyword</label>
<textarea row="3" class="form-control" name="meta_keyword"  id="meta_keyword" placeholder="Enter keyword" required><?php echo $data['meta_keywords']; ?></textarea>
</div>
</div>


<div class="col-md-6">
<div class="mt-2 mb-4 ">
<label for="status" class="form-label">Status</label>
<input type="checkbox" name="status"  id="status" <?php echo $data['status'] ?'checked':''; ?> >
</div>
</div>


<div class="col-md-6">
<div class="mt-2 mb-4">
<label for="popular" class="form-label" >Popular</label>
<input type="checkbox" name="popular"  id="popular" <?php echo $data['popular'] ?'checked':'';?> >
</div>
</div>

<div class="col-md-12">
<button type="submit" name="update_submit" class="btn btn-primary">UPDATE</button>
</div>

</div>
</form>

        </div>



                <?php
                }else{
                    echo "Category not found!";
                }    
            }else{
                    echo "Id Missing from url!";
                } ?>
         </div>
    </div>
</div>
<?php include_once 'includes/footer.php';?>