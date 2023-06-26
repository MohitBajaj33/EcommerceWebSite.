<?php include_once "includes/header.php" ;

?>

<div id="body">
<div class="py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_SESSION['message'])){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey</strong> <?=$_SESSION['message']?> .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         unset($_SESSION['message']);
    } ?>
            <div class="card">
                <div class="card-header">
                    <h4> Registration Form</h4>
                </div>
                <div class="card-body">
    <form action="authcode.php" method="post">
<div class="mb-3">
    <label for="Name_id" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="Name_id" placeholder="Enter Your name" required>
  </div>
  <div class="mb-3">
    <label for="Name_id" class="form-label">Phone No.</label>
    <input type="text" class="form-control" name="phone" id="Name_id" placeholder="Enter Your Mobile number" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"  id="exampleInputEmail1" placeholder="Enter Your email" required>
  </div>
  <div class="mb-3">
    <label for="Password_id" class="form-label">Password</label>
    <input type="password" class="form-control" name="pass"  id="Password_id" placeholder="Enter Password" required>
</div>
<div class="mb-3">
    <label for="con_Password_id" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="C_pass"  id="con-Password_id" placeholder="Confirm Password" required>
</div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

                </div>
            </div>


        </div>
    </div>
</div>
</div>
</div>
<?php include_once "includes/footer.php" ?>