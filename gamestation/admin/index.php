<?php
session_start();
if(isset($_SESSION['loginsuccessful'])){}
else{
    echo "<script>alert('You are not logged in');window.location.href='login.php';</script>";
    }
include 'db.php';
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

</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="index.php?name=<?php echo $name; ?>">GameStation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="psPlusView.php?name=<?php echo $name; ?>">PS PLUS</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="addNew.php?name=<?php echo $name; ?>">Add A Game</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="edit_game.php?name=<?php echo $name; ?>">Edit Game</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php?name=<?php echo $name; ?>">Logout</a>
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


<div class = "head" style="text-align:center;" style="background-color: rgba(0, 0, 0, 0.2);>
        <h1>Welcome to Gamestation <?php echo $name ?> </h1>
        <div class ="dropdown-divider"></div>
        <div class="imgbox">
        <img class="center-fit" src="images/backAdmin.jpg" alt="THIEF!">

        </div>
        <div class ="dropdown-divider"></div>
        <div class ="dropdown-divider"></div>
</div>

<?php
include 'ft.php';
?>
