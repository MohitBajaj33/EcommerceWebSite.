<?php
include_once 'includes/header.php';
include_once '../middleware/adminMiddleware.php';
include_once '../function/myfunctions.php';
include_once '../config/connect.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header bg-primary">
                   <span class="text-white fs-4">User Dimand</span>
                   <a href="order-history.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Order History</a>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Image</th>
                          <th>User</th>
                          <th>Mobile</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                              $userDimand=getUserDimand();
                            if(mysqli_num_rows($userDimand)>0)
                            {
                              foreach($userDimand as $item)
                              {?>
                               <tr>
                                 <td><?= $item['id'] ?></td>
                                 <td><?= $item['image'] ?></td>
                                 <td><?= $item['name'] ?></td>
                                 <td><?= $item['phone'] ?></td>
                                 <td><?= $item['create_at'] ?></td>
                                 <td><a href="viewUserDimand.php?id=<?= $item['id'];?>" class="btn btn-primary">View detials</a></td>

                                </tr>
                              <?php
                              }
                            }else{
                              ?>
                                <tr>
                                  <td colspan="5">No orders yet</td>
                                </tr>
                              <?php
                            }?>
                      </tbody>

                    </table>
                  
                </div>
  
            </div>
        </div>
    </div>
 </div>

