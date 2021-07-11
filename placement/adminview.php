<?php
require 'database_conn.php';?>

  

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   
    

    
    
    <title>view </title>
  </head>
<body>  








<?php require 'adminnav.php';?>




<style>
body{
  margin: 0px;
        padding: 0px;
        background-image: url('images/view.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;




}
</style>




<?php

if(isset($_GET['view'])){
  $sno = $_GET['view'];
  
  $sql_view = "SELECT * FROM `interview` WHERE `s_no` = $sno";

$result= mysqli_query($conn, $sql_view);

if($row = mysqli_fetch_assoc($result)){
$des=$row['description'];


echo '<div class= " overflow-scroll text-dark container card text-center my-5 mx-auto" style="background-color:#FFFDD0;height: 400px;">
<div class="card-body my-4 mx-5" >
<h2 class=" text-center ">Interview Experience</h2>

<p class="text-center">'. $des . '</p>
</div>
<div class="card-footer">
  <a class=" btn btn-warning btn-md" href="interview.php" role="button">Close</a>

</div>
</div>';



}

}

?>


<?php  require'footer.php';  ?>







<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
  crossorigin="anonymous"></script>

<script src="javascript/uploadnotes.js"></script>

  </body>
</html>


