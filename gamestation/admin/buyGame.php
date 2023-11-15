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
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="btn btn-outline-danger" href="user_index.php?name=<?php echo $name; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-danger" href="Gamelist.php?name=<?php echo $name; ?>">All Games</a>
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

  </div>


  <div class="container">
    <div class="head" style="text-align: center; padding: 10px, 0 px, 10px, 0px;">

      <h1>Available Games</h1>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Game Name</th>
          <th>Added by</th>
          <th>Location</th>
          <th>Price</th>
          <th>Added On</th>
          <th>Phone Number</th>
          <th>Buy</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $query = "select * from user_info join rental on user_info.user_id=rental.user_id join game_info on rental.game_id=game_info.game_id where user_name not like '$name'";
        $run = mysqli_query($con, $query);
        if ($run) {
          while ($row = mysqli_fetch_assoc($run)) {

        ?>

            <tr>
              <td><?php echo $row['game_name']; ?></td>
              <td><?php echo $row['user_name']; ?></td>
              <td><?php echo $row['division']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['post_date']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><a href="confirmBuy.php?game_id=<?php echo $row['game_id']; ?>&buyer_name=<?php echo $name; ?>&rent_id=<?php echo $row['rent_id']; ?>" class="btn btn-primary ">Buy </a></td>

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