<?php
include 'db.php';
include 'header.php';
$id = $_GET['id'];
$name = $_GET['name'];
?>

<div class = "container">
    <div class = "head" style="text-align:center;">
        <h1>Enter Month & Year</h1>
    </div>
    <form action="#" method = "post">
    <div class="form-group">
    <label for="type">Type</label>
      <select class="form-control" name="type">
        <option>Essential</option>
        <option>Extra</option>
        <option>Premium</option>
      </select>
	</div>
    <div class="form-group">
    <label for="year">Year</label>
      <select class="form-control" name="year">
        <option>2021</option>
        <option>2022</option>
        <option>2023</option>
      </select>
	</div>
    <div class="form-group">
    <label for="month">Month</label>
      <select class="form-control" name="month">
        <option>January</option>
        <option>February</option>
        <option>March</option>
        <option>April</option>
        <option>May</option>
        <option>June</option>
        <option>July</option>
        <option>August</option>
        <option>September</option>
        <option>October</option>
        <option>November</option>
        <option>December</option>
    </select>
	</div>  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
</div>

<?php

if(isset($_POST['submit'])){
    $typename = $_POST['type'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if($typename == "Essential"){
      $type = 1;
    }
    else if($typename == "Extra"){
      $type = 2;
    }
    else{
      $type = 3;
    }
    $query = "INSERT INTO appears_on
    VALUES ('$id','$type', '$month', '$year')";
    $run = mysqli_query($con,$query);

    echo "<script>window.location.href='psPlusView.php?name=$name';</script>";
}

?>

<?php
include 'ft.php';
?>