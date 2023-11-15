<?php

include 'db.php';
$name = $_GET['name'];


if(isset($_POST['submit'])){

    $getGameID = "SELECT MAX(game_id) FROM game_info";
    $run = mysqli_query($con,$getGameID);
    $row = mysqli_fetch_array($run);
    echo $row[0];

    $gameID = $row[0] + 1;
    $title = $_POST['title'];
    echo $title;
    $genre = $_POST['genre'];
    $publishDate = date('Y-m-d', strtotime( $_POST['publishDate']));
    $publisher = $_POST['publisher'];
    $budget = $_POST['budget'];
    $gameWebsite = $_POST['gameWebsite'];
    $gameDetails = $_POST['gameDetails'];


    $target = '../thumb/gamelogo'.basename($_FILES['img']['name']);
    $img = $_FILES['img']['name'];

   
    $query = "INSERT INTO game_info(game_id, game_name, genre, game_website, img , game_details)
    VALUES ('$gameID','$title','$genre', '$gameWebsite', '$img', '$gameDetails')";
    $run = mysqli_query($con,$query);

    
    if(move_uploaded_file($_FILES['img']['tmp_name'], '../thumb/gamelogo/'.$title.'.jpg')){
      echo "game uploaded";
    }
    else{
      echo "something wrong";
    }
    


    $query = "SELECT publisher_id FROM publisher WHERE publisher_name = '$publisher'" ;
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $pub_id = $row["publisher_id"];

    $query = "INSERT INTO makes(game_id, publisher_id, budget, publish_date) 
    VALUES ('$gameID','$pub_id', '$budget','$publishDate')";
    $run = mysqli_query($con,$query);

    echo "<script>alert('Game added successfully');window.location.href='edit_game.php?name=$name';</script>";
    

    }
?>