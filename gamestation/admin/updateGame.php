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
h4 {
  
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
  <a class="navbar-brand" href="index.php?name=<?php echo $name; ?>">GameStation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="btn btn-outline-danger" href="index.php?name=<?php echo $name; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="psPlusView.php?name=<?php echo $name; ?>">PS PLUS</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-danger" href="addNew.php?name=<?php echo $name; ?>">Add A Game</a>
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

<?php

if($_GET['id']){
    if(isset($_POST['submit'])){

    /*  $getGameID = "select max(game_id) from game_info";
        $run = mysqli_query($con,$getGameID);
        $row = mysqli_num_rows($run);
    */
        $gameID = $_GET['id'];
    
        $title = $_POST['title'];
        echo $title;
        $genre = $_POST['genre'];
        $publishDate = date('Y-m-d', strtotime( $_POST['publishDate']));
        $publisher = $_POST['publisher'];
        $budget = $_POST['budget'];
        $gameWebsite = $_POST['gameWebsite'];
        $gameDetails = $_POST['gameDetails'];
    
        $query = "UPDATE game_info set game_name = '$title', genre = '$genre', game_website = '$gameWebsite', game_details = '$gameDetails'
        WHERE game_id = '$gameID'";
        $run = mysqli_query($con,$query);
        
        $query = "SELECT publisher_id FROM publisher WHERE publisher_name = '$publisher'" ;
            $run = mysqli_query($con,$query);
            $row = mysqli_fetch_array($run);
            $pub_id = $row["publisher_id"];
    
        $query = "INSERT INTO makes(game_id, publisher_id, budget, publish_date) 
        VALUES ('$gameID','$pub_id', '$budget','$publishDate')";
        $run = mysqli_query($con,$query);
        
        echo "<script>alert('Game Updated successfully');window.location.href='edit_game.php?name=$name';</script>";
        
    }
}
else{
    echo "failure";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
h4 {
  
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

<div class="container">
<div class="jumbotron">
  <h2><b><center>Update Game</center></b></h2>
  <form action="#" method = "post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="title">Game Title</label>
      <input type="text" class="form-control" name="title">
    </div>
  <div class="form-group">
    <label for="genre">Genre</label>
      <select class="form-control" name="genre">
        <option>Action</option>
        <option>Open world</option>
        <option>RPG</option>
        <option>Sports</option>
      </select>
	</div>
	<div class="form-group">
    <label for="publishDate">Publish Date</label>
    <input type="date" class="form-control" name="publishDate">
   
    </div>
    <div class="form-group">
  		<label for="publisher">Publisher</label>
        <select class="form-control" name="publisher">
          <option>Rockstar Games</option>
          <option>Electronic Arts</option>
          <option>Activision</option>
          <option>Sony Interactive Entertainment</option>
          <option>Gameloft</option>
          <option>Valve</option>
        </select>
	</div>
    <div class="form-group">
      <label for="budget">Budget (in million dollars) </label>
      <input type="text" class="form-control" name="budget">
    </div>
    <div class="form-group">
      <label for="gameWebsite">Website URL</label>
      <input type="text" class="form-control" name="gameWebsite">
    </div>
    
    <div class="form-group">
      <label for="comment">Game Details</label>
      <textarea class="form-control" rows="4" name="gameDetails"></textarea>
    </div>
    <button type="submit" name = "submit" value="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
</body>
</html>


<?php
include 'ft.php';
?>