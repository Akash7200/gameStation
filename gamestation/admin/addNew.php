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
<div class="container">
<div class="jumbotron">
  <h2><b><center>Add A New Game</center></b></h2>
  <form action="validNew.php?name=<?php echo $name; ?>" method = "post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="title">Game Title</label>
      <input type="text" class="form-control" name="title">
    </div>
  <div class="form-group">
    <label for="genre">Genre</label>
      <select class="form-control" name="genre">
<?php
    $query = "select distinct(genre) from game_info";
    $run = mysqli_query($con,$query);
    if($run){
    while($row = mysqli_fetch_assoc($run)){

?>
        <option><?php echo $row['genre'];?></option>
        <?php 
        } }
        ?>
      </select>
	</div>
	<div class="form-group">
    <label for="publishDate">Publish Date</label>
    <input type="date" class="form-control" name="publishDate">
   
    </div>
    <div class="form-group">
  		<label for="publisher">Publisher</label>
        <select class="form-control" name="publisher">
    <?php
    $query = "select * from publisher";
    $run = mysqli_query($con,$query);
    if($run){
    while($row = mysqli_fetch_assoc($run)){

?>
          <option><?php echo $row['publisher_name'];?></option>
          <?php 
        } }
        ?>
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

    <div class="custom-file">
    <label>Game Logo</label>
    Select image to upload:
    <input type="file" name="img" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
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