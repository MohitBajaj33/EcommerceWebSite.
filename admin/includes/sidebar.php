<?php 
$data=substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-color" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php ">
    
        <span class="ms-1 font-weight-bold text-white">Admin</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='index.php'?'active btn-bg-color':'';?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1 ">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='category.php'?'active btn-bg-color':'';?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white<?= $data=='add-category.php'?'active btn-bg-color':'';?> " href="add-category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='products.php'?'active btn-bg-color':'';?>" href="products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Products</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='add-products.php'?'active btn-bg-color':'';?>" href="add-products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add Products</span>
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='orders.php'?'active btn-bg-color':'';?>" href="orders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?= $data=='userDimand.php'?'active btn-bg-color':'';?>" href="userDimand.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">User Dimand</span>
          </a>
        </li>
      </ul>
    </div>

    
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-bg-color mt-4 w-100" href="../logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>