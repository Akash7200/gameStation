<?php
include 'db.php';

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
</nav>
<!--registration form starts -->

<div class = "container">
    <div class = "head" style="text-align:center;">
        <h1>Register to Gamestation</h1>
    </div>
    <form action="registeradmin.php" method = "post">
  <div class="form-group">
    <label for="email"><h4>Choose a username:</h4></label>
    <input type="text" name = "uname" class="form-control" placeholder="Enter username" id="email">
  </div>
  <div class="form-group">
    <label for="pwd"><h4>Password (Use combinations of charcacters, symbols etc.):</h4></label>
    <input type="password" name="pwd" class="form-control" placeholder="Enter password" id="pwd">
  </div>
  <div class="form-group">
    <label for="DOB"><h4>Date of Birth</h4></label>
    <input type="date" class="form-control" name="DOB">
  </div>
  <div class="form-group">
    <label for="psnID"><h4>PSN ID</h4></label>
    <input type="text" name = "psnID" class="form-control" placeholder="Enter PSN ID" id="psnID">
  </div>
  <div class="form-group">
    <label for="email"><h4>Email</h4></label>
    <input type="text" name = "email" class="form-control" placeholder="Enter email" id="email">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<!-- form ends -->

<?php
    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $DOB = date('Y-m-d', strtotime( $_POST['DOB']));
        $now = time(); // or your date as well
        $your_date = strtotime($DOB);
        $datediff = $now - $DOB;

        $diff = ($datediff / (60 * 60 * 24*365));
        $psn = $_POST['psnID'];
        $email = $_POST['email'];
        $query = "select * from admin where name = '$uname' ";
        $run = mysqli_query($con,$query);
        $row = mysqli_num_rows($run);
        if($row == 0){
        $query = "INSERT INTO admin(name, password) VALUES('$uname', '$pwd')";
        $run = mysqli_query($con,$query);
        $query = "SELECT id FROM admin WHERE name = '$uname'" ;
        $run = mysqli_query($con,$query);
        $row = mysqli_fetch_array($run);
        $user_id = $row["id"];    
        echo $user_id;
        $query = "INSERT INTO user_info(user_id, user_name, birth_date, psn_id, email) VALUES('$user_id', '$uname', '$DOB', '$psn', '$email')";
        $run = mysqli_query($con, $query);
        if($run){
            echo "<script>alert('Account created successfully;');window.location.href='login.php';</script>";
        }
        else{
            echo "<script>alert('Something went wrong');window.location.href='registeradmin.php';</script>";
        }
      }
      else{
        echo "<script>alert('Username already exists. Chose a different username.');window.location.href='registeradmin.php';</script>";
      }
    }
?>

<?php
include 'ft.php';
?>