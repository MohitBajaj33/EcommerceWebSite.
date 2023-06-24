<?php include_once 'includes/header.php';
include_once '../middleware/adminMiddleware.php';
include_once '../config/connect.php';

$select_sql = "SELECT * from categories";
$result = mysqli_query($conn,$select_sql);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                   <h4 > Categories</h4>
                </div>
                <div class="card-body" id="category_table">
                <table class="table  table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $data){

                       ?>
                        <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><img src="../uploads/<?php echo $data['image']; ?>" width="50px" height="50px" alt="<?php echo $data['name']; ?>"></td>
                        <td><?php echo $data['status']=='0'?'visible':'Hidden'; ?></td>
                        <td><a href="edit-category.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td>
                        <!-- <form action="code.php" method="POST"> 
                            <input type="hidden" name="category_id" value="<?php echo $data['id']; ?>">  
                        <button type="submit" name="delete_submit" class="btn btn-primary">Delete</button></td>
                        </form>  -->
                        <button type="button" class="btn  btn-danger delete_category_btn"value="<?php echo $data['id']; ?>">Delete</button></td>
                        </tr>
                       <?php }?> 
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php';?>

