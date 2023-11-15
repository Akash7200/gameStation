<?php

include 'db.php';

$id = $_GET['id'];
$name = $_GET['name'];
$query = "select * from admin where name='$name'";
$run = mysqli_query($con,$query);
if($run){
    while($row = mysqli_fetch_assoc($run)){
        $user_id =  $row['id'];
    }
}


$query= "INSERT INTO game_library(game_id, user_id, add_date)
VALUES ('$id','$user_id', CURRENT_TIMESTAMP)";
$run = mysqli_query($con,$query);
if($run){
   echo "<script>window.location.href='gamePage.php?id=$id&name=$name';</script>";
}
else{
    echo "something wrong";
}
?>