<!DOCTYPE html>
<html lang="en">
<?php
        include 'db.php';
        $id = $_GET['id'];
        $name = $_GET['name'];

        $query = "select img from game_info where game_id = $id ";
        $run = mysqli_query($con, $query);
        while($row = mysqli_fetch_assoc($run)){?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStation</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
      }
      h1 {
  font-size: 100px;
}
      .hero-image {
        
        background-image: url("../thumb/gamebackground/<?php echo $row['img'];}?>");
        background-color: #cccccc;
        height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      .hero-text {
        text-align: center;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
        
        color: white ;
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

.rating > input{ display:none;}

.rating > label {
  position: relative;
    width: 1em;
    font-size: 4vw;
    color: #FFD600;
    cursor: pointer;
}
.rating > label::before{ 
  content: "\2605";
  position: absolute;
  opacity: 0;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before {
  opacity: 1 !important;
}

.rating > input:checked ~ label:before{
  opacity:1;
}

.rating:hover > input:checked ~ label:before{ opacity: 0.4; }


body {
  background-image: url("images/bg.jpg"), url("paper.gif");
  background-color: #cccccc;
}
h1, p{ 
    text-align: center;
    
}

h1{
    margin-top:150px;
}
p{ font-size: 1.2rem;}
@media only screen and (max-width: 600px) {
  h1{font-size: 8px;}
  p{font-size: 8px;}
}



    </style>
    
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <a class="btn btn-outline-danger" href="user_index.php?name=<?php echo $name; ?>">Home</a>
      </li>
      <ul class="navbar-nav mr-auto">
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
        <a class="btn btn-outline-danger" href="profile.php?name=<?php echo $name; ?>">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="logout.php">Logout</a>
    </li>
   </ul>
     
    
  </div>
</nav>
<div class="hero-image">

<?php
include 'db.php';
$id = $_GET['id'];
$name = $_GET['name'];

$query = "SELECT * FROM user_info WHERE user_name = '$name'" ;
$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
$buyer_id = $row['user_id'];

$query = "SELECT * FROM game_library WHERE user_id = '$buyer_id' and game_id = '$id'" ;
$run = mysqli_query($con,$query);
$row = mysqli_fetch_array($run);
$haveGame = 0;
if($row >=1){
  $haveGame = 1;
}
  
$query = "select * from game_info natural join makes natural join publisher where game_id = $id ";
$run = mysqli_query($con, $query);
if($run){
while($row = mysqli_fetch_assoc($run)){
?>
<div class = "container">
  <div class="hero-text">
    <h1 style="text-align:center; font-size:4vw;"><?php echo $row['game_name']; ?> </h1>
  </div>
  <div class = "row">
    <div class = "col">
      <div>
        <?php echo "<img height = '400px' width = 'auto' src = '../thumb/gamelogo/".$row['img']."'>";?>
      </div>
   </div>
  <div class="col">

  <td>
  <?php
   if($haveGame == 1) { ?>
    <a class = "btn btn-info"> Owned </a></td>   
  <?php
  } else { ?> 
  <a class = "btn btn-info" href = "addLibrary.php?id=<?php echo $row['game_id'];?>&name=<?php echo $name;?>"> Add to Library </a></td> 
<?php
} ?>
  <br><br>
  <table id="customers" align="center">
  <tr>
    <td>Rating</td>
    <td><?php  echo $row['rating'];?></td>
  </tr>
  <tr>
    <td>Publisher</td>
    <td><?php  echo $row['publisher_name'];?></td>
  </tr>
  <tr>
    <td>Released On</td>
    <td><?php  echo $row['publish_date'];?></td>
  </tr>
  
  <tr>
    <td>Website</td>
    <td> <a href="<?php  echo $row['game_website'];?>"><?php echo $row['game_website']?></a></td>
  </tr>
  <tr>
    <td colspan="2">
    <?php  echo $row['game_details'];?>
</td>
  </tr>
  </table>
  </div>
</div>
<?php } 
}
?>
</div>


<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
<div class="jumbotron">


  <h4>Rating And Reviews</h4>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Comment</th>
        <th>Rating</th>
        <th>Post Date</th>
      </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM comments natural join user_info where game_id = '$id'" ;
    $run = mysqli_query($con,$query);
    if($run){
    while($row = mysqli_fetch_assoc($run)){

?>

      <tr>
        <td><?php echo $row['user_name'];?></td>
        <td><?php echo $row['comment'];?></td>
        <td><?php echo $row['rating'];?></td>
        <td><?php echo $row['date_time'];?></td>
        
      </tr>
      <?php
    }
    
}
?>
      
    </tbody>
  </table>



  <?php
   if($haveGame == 1) { ?>


<form method = "post" >
<div class="form-group" >
  <label for="comment">Post Your Comment</label>
  <textarea class="form-control" rows="4" name="comment"></textarea>
</div>



<div class="rating">

  <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
  <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
  <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
  <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
  <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
</div>
<button type="submit" name = "submit" value="submit" class="btn btn-primary">Submit</button>
</submit>
<?php } ?>
</div>
</div>

<?php

if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];
    $query = "select * from user_info where user_name = '$name' ";
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $user_id = $row['user_id'];
    if($run){
      $query = "insert into comments (game_id, user_id, date_time, comment, rating)
      values('$id', '$user_id', CURRENT_TIMESTAMP, '$comment', '$rating')";
      $run = mysqli_query($con,$query);
      
      echo "<script>window.location.href='gamePage.php?id=$id&name=$name';</script>";
    }
    else{
      echo "<script>alert('Wrong username and/or password');</script>";
    }
}

?>

        
<?php include 'ft.php'; 