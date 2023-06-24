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
                   <span class="text-white fs-4">Orders</span>
                   <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>User</th>
                          <th>Tracking Id</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>View</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $orders=getAllOrdersHistory();
                            if(mysqli_num_rows($orders)>0)
                            {
                              foreach($orders as $item)
                              {?>
                               <tr>
                                 <td><?= $item['id'] ?></td>
                                 <td><?= $item['name'] ?></td>
                                 <td><?= $item['tracking_no'] ?></td>
                                 <td><?= $item['total_price'] ?></td>
                                 <td><?= $item['created_at'] ?></td>
                                 <td><a href="view-order.php?t=<?= $item['tracking_no'];?>" class="btn btn-primary">View detials</a></td>

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

