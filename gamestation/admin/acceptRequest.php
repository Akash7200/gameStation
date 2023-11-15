<?php

include 'db.php';

$buyer_id = $_GET['buyer_id'];
$seller_id = $_GET['seller_id'];
$user_name = $_GET['user_name'];
$rent_id = $_GET['rent_id'];

$query = "update rental set is_available = 0 where rent_id = '$rent_id' and user_id = '$seller_id'";
$run = mysqli_query($con, $query);

$query = "update transaction set is_done = 1 where rent_id = '$rent_id' and user_id = '$buyer_id'";
$run = mysqli_query($con, $query);


if($run){
    echo "<script>window.location.href='transaction.php?name=$user_name';</script>";
}
else{
    echo "<script>window.location.href='transaction.php?name=$user_name';</script>";
}
?>

