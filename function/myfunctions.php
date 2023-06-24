<?php

function getAllOrders()
{
    global $conn;
    $query="SELECT * FROM orders WHERE status='0'";
    return $query_run=mysqli_query($conn,$query);
}
function getAllOrdersHistory()
{
    global $conn;
    $query="SELECT * FROM orders WHERE status!='0'";
    return $query_run=mysqli_query($conn,$query);
}
function getUserDimand()
{
  global $conn;
  $query="SELECT u.id, u.image, u.description, u.create_at, r.name, r.phone 
  FROM  add_user u, registation r WHERE u.user_id=r.id;";
  return $query_run=mysqli_query($conn,$query);
}

function getUserDimandDetails($id)
{
  global $conn;
  $query="SELECT u.id, u.image, u.description, u.create_at, r.name, r.phone 
  FROM  add_user u, registation r WHERE u.user_id=r.id AND u.id='$id'";
  return $query_run=mysqli_query($conn,$query);
}

function checkTrackingNoValid($trackingNo)
{
    global $conn;
    $query="SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return $query_run=mysqli_query($conn,$query);
  }
  function redirect($url, $message)
  {
    $_SESSION['message']= $message;
    header('Location: '.$url);
    exit(0);
  }
?>