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
    <title>Admin - GameSpace</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
      }
      h1 {
  font-size: 100px;
}
     #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        background-color: #f2f2f2;
        color: grey;
      }

      #customers td, #customers th {
        border: 1px solid #f2f2f2;
        padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #ddd;}

      #customers tr:hover {background-color: #f2f2f2;}

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: white;}
        .rating {
  display: flex;
  flex-direction: row-reverse;
  justify-content: center;
}

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

h5 {
  
  color: black;
}
th {
color: black;
}

td {
color: black;
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
        <a class="btn btn-outline-danger" href="Gamelist.php?name=<?php echo $name; ?>">All Games</a>
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
<!--
     <form class="form-inline my-2 my-lg-0" method = "post" action ="newSearch.php">
      <input class="form-control mr-sm-2" name = "game_name" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
    </form>
-->
  </div>
</nav>
<?php
$query = "select * from user_info where user_name = '$name' ";
$run = mysqli_query($con, $query);
if($run){
while($row = mysqli_fetch_assoc($run)){
?>
<div class = "container">
  <div class="hero-text">
  <br>
  <div class = "head" style="text-align:center;">
  
  <h1 style="text-align:center; font-size:4vw;"><?php echo $row['user_name']; ?> </h1>
</div>
  <br>
  <table id="customers" align="center">
  <tr>
    <td>Date of Birth</td>
    <td><?php  echo $row['birth_date'];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php  echo $row['email'];?></td>
  </tr>
  <tr>
    <td>PSN ID</td>
    <td><?php  echo $row['psn_id'];?></td>
  </tr>
  
  </table>
  
  
  </div>
  <?php }} ?>






<div class = "head" style="text-align:center;">
<br>
<h2><?php echo 'My Games'?> </h2>
</div>
<br>
<div class="card-columns">

<?php
$query = "select * from admin where name='$name'";
$run = mysqli_query($con,$query);
if($run){
    while($row = mysqli_fetch_assoc($run)){
        $user_id =  $row['id'];
    }
}

$query = "select * from game_library join game_info on game_library.game_id = game_info.game_id where user_id = '$user_id'";
$run = mysqli_query($con,$query);
if($run){
  
  while($row = mysqli_fetch_assoc($run)){

?>

<div class="card" style="width:300px">

  <img class="card-img-top" src="../thumb/gamelogo/<?php echo $row['img'];?>" alt="Card image" style="width:100%">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['game_name'];?></h4>
    <p class="card-text" ><h5><?php echo $row['genre'];?></h5></p>
    <a href="gamePage.php?id=<?php echo $row['game_id'];?>&name=<?php echo $name;?>" class="btn btn-primary "><?php echo 'View'; ?> </a>
    <a href="sellPage.php?game_id=<?php echo $row['game_id'];?>&user_id=<?php echo $user_id;?>&name=<?php echo $name;?>" class="btn btn-success "><?php echo 'Sell'; ?> </a>

  </div>
</div>
  
<?php
  }
 
}
else{
  
}
?>
 </div>
<?php
include 'ft.php';
?>



