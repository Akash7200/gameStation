<?php
include 'db.php';
$game_id = $_GET['game_id'];
$user_id = $_GET['user_id'];
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - GameSpace</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  
body {
  background-image: url("images/bg.jpg"), url("paper.gif");
  background-color: #cccccc;
}
h1 {
  
  color: white;
}
h4 {
  
  color: black;
}

h6 {
  
  color: white;
}
</style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="user_index.php?name=<?php echo $name; ?>">GameStation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="user_index.php?name=<?php echo $name; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="GameList.php?name=<?php echo $name; ?>">All Games</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </li>
     </ul>
    </li>
     </ul>
<!--
     <form class="form-inline my-2 my-lg-0" method = "post" action ="newSearch.php">
      <input class="form-control mr-sm-2" name = "game_name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
    </form>
-->
  </div>
</nav>

<div class = "container">
    <div class = "head" style="text-align:center;">
    <br>
    <br>
        <h1>Enter Details</h1>
    </div>
    <form action="#" method = "post">
    <div class="form-group">
    <label for="division"><h6>Division</h6></label>
      <select class="form-control" name="division">
        <option>Dhaka</option>
        <option>Barisal</option>
        <option>Chittagong</option>
        <option>Khulna</option>
        <option>Rajshahi</option>
        <option>Mymensingh</option>
        <option>Sylet</option>
        <option>Rangpur</option>
      </select>
	</div>
    <div class="form-group">
      <label for="phone"><h6>Phone Number</h6></label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group">
      <label for="email"><h6>Email</h6></label>
      <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="price"><h6>Price</h6></label>
      <input type="int" class="form-control" name="price">
    </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</div>

<?php

if(isset($_POST['submit'])){
    $division = $_POST['division'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $price = $_POST['price'];

    $rent_id = "SELECT MAX(rent_id) FROM rental";
    $run = mysqli_query($con,$rent_id);
    $row = mysqli_fetch_array($run);
    echo $row[0];
    $rentID = $row[0] + 1;
    
    $query = "INSERT INTO rental
    VALUES ('$rentID','$game_id','$user_id', '$price', CURRENT_TIMESTAMP, '$division', '$email', '$phone', 1)";
    $run = mysqli_query($con,$query);

    if($run){
        echo "<script>window.location.href='user_index.php?name=$name';</script>";

    }
}

?>

<?php
include 'ft.php';
?>