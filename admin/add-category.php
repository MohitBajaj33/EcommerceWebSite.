
<?php include_once 'includes/header.php';
include_once '../middleware/adminMiddleware.php';

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
<form action="code.php" method="post" enctype="multipart/form-data">
    <div class="row">

<div class="col-md-6">
<label for="exampleInputEmail1" class="form-label">Name</label>
<input type="text" class="form-control" name="name"  id="exampleInputEmail1" placeholder="Enter Your name" required>
</div>

<div class="col-md-6">
<label for="slug_id" class="form-label">Slug</label>
<input type="text" class="form-control" name="slug"  id="slug_id" placeholder="Enter Slug" required>

</div>
<div class="mt-2">
<div class="col-md-12">
<label for="description" class="form-label">Description</label>
<textarea row="3" class="form-control" name="description"  id="description" placeholder="Enter description" required></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="image" class="form-label">Upload Image</label>
<input type="file" class="form-control" name="image"  id="image"  required>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="meta_title" class="form-label">Meta Title</label>
<textarea row="3" class="form-control" name="meta_title"  id="meta_title" placeholder="Enter description" required></textarea>
</div>
</div>


<div class="mt-2">
<div class="col-md-12">
<label for="meta_description" class="form-label">Meta Description</label>
<textarea row="3" class="form-control" name="meta_description"  id="meta_description" placeholder="Enter description" required></textarea>
</div>
</div>

<div class="mt-2">
<div class="col-md-12">
<label for="meta_keyword" class="form-label">Meta Keyword</label>
<textarea row="3" class="form-control" name="meta_keyword"  id="meta_keyword" placeholder="Enter description" required></textarea>
</div>
</div>


<div class="col-md-6">
<div class="mt-2 mb-4 ">
<label for="status" class="form-label">Status</label>
<input type="checkbox" name="status"  id="status"  >
</div>
</div>


<div class="col-md-6">
<div class="mt-2 mb-4">
<label for="popular" class="form-label">Popular</label>
<input type="checkbox" name="popular"  id="popular"  >
</div>
</div>

<div class="col-md-12">
<button type="submit" name="submit" class="btn btn-primary">Save</button>
</div>

</div>
</form>

        </div>
         </div>
    </div>
</div>
<?php include_once 'includes/footer.php';?>