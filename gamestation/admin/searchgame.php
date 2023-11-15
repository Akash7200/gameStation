
<table class ="table table-striped">
<thread>

<tr>
<th scope = "col">Game ID</th>
<th scope = "col">Title</th>
<th scope = "col">Publisher</th>
<th scope = "col">Website</th>
<th scop
e = "col">Game Info</th>
</tr>
</thread>
<?php
if(isset($_POST['submit'])){
    $user = $_POST['game_name'];
    $get_user = "select * from game_info where game_name = '%$user%'";
    $run = mysqli_query($con,$get_user);
if($run){
    while($row = mysqli_fetch_assoc($run)){

?>
    <!--<tbody>
        <tr>
            <th scope = "row"><?php echo $row['game_id']; ?> </th>
            <th><?php echo $row['game_name']; ?> </th>
            <th><?php echo $row['genre']; ?> </th>
            <th><?php echo $row['game_website']; ?> </th>
            <th><?php echo $row['game_details']; ?> </th>

        </tr>
    </tbody>-->
    <div class="card" style="width:400px" text-align: center>
    <?php echo "<img src=../thumb/gamelogo/$gameID" ?>
    <div class="card-body">
      <h4 class="card-title"><?php echo $row['game_name']; ?></h4>
      <p class="card-text"><?php echo $row['game_details']; ?></p>
      <a href="#" class="btn btn-secondary stretched-link">View Details</a>
    </div>
  </div>
    <?php
    }
}   
}
?>

</table>
</div>
