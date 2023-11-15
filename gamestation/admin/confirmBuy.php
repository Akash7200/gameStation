<?php

include 'db.php';

$game_id = $_GET['game_id'];
$buyer_name = $_GET['buyer_name'];
$rent_id = $_GET['rent_id'];
    
    $query = "SELECT * FROM user_info WHERE user_name = '$buyer_name'" ;
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $buyer_id = $row["user_id"];
echo $buyer_id;
$query = "select * from game_info join rental on game_info.game_id=rental.game_id join user_info
 on rental.user_id = user_info.user_id where rent_id =  '$rent_id'";
$run = mysqli_query($con, $query);


if($run){
    $row = mysqli_fetch_array($run);
    $rent_id = $row['rent_id'];
    $trx_amount = $row['price'];
    
    $query = "INSERT INTO transaction(user_id, rent_id, trx_date, trx_amount, is_done) 
    VALUES ('$buyer_id','$rent_id', CURRENT_TIMESTAMP,'$trx_amount', 0)";
    $run = mysqli_query($con,$query);
    echo "<script>window.location.href='buyGame.php?name=$buyer_name';</script>";
}
else{

}
