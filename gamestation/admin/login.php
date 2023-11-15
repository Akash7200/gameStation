<?php
session_start();
include 'db.php';



?>
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
h3 {
  
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
  <a class="navbar-brand" href="index.php">GameStation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
     <li>
        <a class="btn btn-outline-danger" href="registeradmin.php">Register</a>
      </li>
      
     </ul>

    
  </div>
</nav>  
<div class = "container">
    <div class = "head" style="text-align:center;">
        <h1>Login to Gamestation</h1>
    </div>
    <form action="login.php" method = "post">
  <div class="form-group">
    <label for="uname"> <h3>Enter username:</h3></label>
    <input type="text" name = "uname" class="form-control" placeholder="Enter username" id="uname">
  </div>
  <div class="form-group">
    <label for="pwd"> <h3> Password: </h3></label>
    <input type="password" name="pwd" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br><br><br><br>
<?php
if(isset($_POST['submit'])){
    $user = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $get_user = "select * from admin where name = '$user' and password = '$pwd' ";
    $run = mysqli_query($con,$get_user);
    $row = mysqli_num_rows($run);
    if($row == 1){
      $_SESSION['loginsuccessful'] = 1;
      $check_admin = "select * from admin where name = '$user' and is_admin = '1' ";
      $run = mysqli_query($con,$check_admin);
      $row = mysqli_num_rows($run);
      if($row >= 1){
        header("Location: index.php?name=$user");
      }    
      else{
        header("Location: user_index.php?name=$user");         
      }
    }
    else{
      echo "<script>alert('Wrong username and/or password');</script>";
    }
}
?>

<?php
include 'ft.php';
?>