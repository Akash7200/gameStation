<?php
include 'db.php';
$user_name = $_GET['name'];

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
th {
color: white;
}

td {
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
  
  <li class="nav-item">
        <a class="btn btn-outline-danger" href="user_index.php?name=<?php echo $user_name; ?>">Home</a>
      </li>
  <li class="nav-item">
        <a class="btn btn-outline-danger" href="Gamelist.php?name=<?php echo $user_name; ?>">All Games</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="buyGame.php?name=<?php echo $user_name; ?>">Purchase</a>
      </li>
      
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="profile.php?name=<?php echo $user_name; ?>">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
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


<div class="container">
<div class = "head" style = "text-align: center; padding: 10px, 0 px, 10px, 0px;">

  <h1>My Purchases</h1>
</div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Game Name</th>
        <th>Seller Name</th>
        <th>Requested On</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM user_info WHERE user_name = '$user_name'" ;
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $buyer_id = $row["user_id"];



    $query = "select * from transaction join rental ON rental.rent_id=TRANSACTION.rent_id 
    NATURAL JOIN game_info JOIN user_info ON rental.user_id=user_info.user_id 
    where transaction.user_id='$buyer_id' ";
    $run = mysqli_query($con, $query);
    if($run){
    while($row = mysqli_fetch_assoc($run)){

?>

      <tr>
        <td><?php echo $row['game_name'];?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><?php echo $row['trx_date'];?></td>
        <td><?php if($row['is_done'] == 0)
                    {echo 'Requested';}
                    else{ echo 'Completed';
                    }?></td>
        
      </tr>
      <?php
    }
    
}
?>
      
    </tbody>
  </table>


</div>


<div class="container">
<div class = "head" style = "text-align: center; padding: 10px, 0 px, 10px, 0px;">

  <h1>My Requests</h1>
</div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Game Name</th>
        <th>Buyer Name</th>
        <th>Requested On</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM user_info WHERE user_name = '$user_name'" ;
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $seller_id = $row["user_id"];

    $query = "select * from transaction join rental ON rental.rent_id=TRANSACTION.rent_id 
    NATURAL JOIN game_info JOIN user_info ON transaction.user_id=user_info.user_id 
    where rental.user_id='$seller_id' ";
    $run = mysqli_query($con, $query);
    if($run){
    while($row = mysqli_fetch_assoc($run)){

?>
      <tr>
        <td><?php echo $row['game_name'];?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><?php echo $row['trx_date'];?></td>
        <td><?php if($row['is_done'] == 0)
                    {echo 'Requested';}
                    else{ echo 'Completed';
                    }?></td>
         <td><?php if($row['is_done'] == 1) { 
            ?>
            <a class="btn btn-danger ">Unavailable </a>
            <?php
         }
            else{ ?>
            <a href="acceptRequest.php?rent_id=<?php echo $row['rent_id'];?>&seller_id=<?php echo $seller_id;?>&user_name=<?php echo $user_name;?>&buyer_id=<?php echo $row['user_id'];?>" class="btn btn-primary ">Accept </a>
            <?php    }   ?>     
        </td>
                
      </tr>
      <?php
    }
    
}
?>
      
    </tbody>
  </table>

  
</div>







<?php
include 'ft.php';
?>