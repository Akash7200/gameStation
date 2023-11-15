<?php
$name = $_GET['name'];
include 'db.php';



$id = $_GET['id'];
$query = "delete from game_info where game_id = $id";
$run = mysqli_query($con, $query);
if($run){
    echo "<script>window.location.href='edit_game.php?name=$name';</script>";
}
else{
    echo "<script>window.location.href='edit_game.php';</script>";
}
?>

