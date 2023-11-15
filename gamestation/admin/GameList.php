<?php
include 'db.php';
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games List</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
 
 body {
  background-image: url("images/bg.jpg"), url("paper.gif");
  background-color: #cccccc;
}
h1 {
  
  color: white;
}


</style>
</head>
<body>
    
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
        <a class="btn btn-outline-danger" href="profile.php?name=<?php echo $name; ?>">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="buyGame.php?name=<?php echo $name; ?>">Purchase</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="transaction.php?name=<?php echo $name; ?>">Transaction</a>
      </li>
      
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </li>
     </ul>
    </li>
     </ul>
     <form class="form-inline my-2 my-lg-0" method = "post" action ="newSearch.php?name=<?php echo $name?>">
      <input class="form-control mr-sm-2" name = "game_name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class = "container">
<div class = "head" style = "text-align: center; padding: 10px, 0 px, 10px, 0px;">
<h1>Our Collection</h1>
</div>
<hr>
<div class="card-columns">
<?php
$query = "select * from game_info order by game_name";
$run = mysqli_query($con, $query);
if($run){
  
    while($row = mysqli_fetch_assoc($run)){

?>


<div class="card" style="width:300px">

    <img class="card-img-top" src="../thumb/gamelogo/<?php echo $row['img'];?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['game_name'];?></h4>
      <p class="card-text"><?php echo $row['genre'];?></p>
      <a href="gamePage.php?id=<?php echo $row['game_id'];?>&name=<?php echo $name;?>" class="btn btn-primary stretched-link">View </a>
    </div>
  </div>
    
  <?php
    }
    
}
?>
</div>







<?php
include 'ft.php';
?>