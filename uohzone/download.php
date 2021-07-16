<?php
require 'database_conn.php';

?>

<?php 
require 'navbar.php';

?>
<style>
  
  body{
  margin: 0px;
        padding: 0px;
        background-image: url('images/inter.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;




}

</style>

<?php

if(isset($_GET['download'])){
  $notesid = $_GET['download'];

  $sql_download = "SELECT * FROM `notes` WHERE `notes_id` = $notesid";


  $result= mysqli_query($conn, $sql_download);

  if($row = mysqli_fetch_assoc($result)){
  $notes_link=$row['link'];

     echo "<a   href='$notes_link' class='text-dark my-5 mx-auto d-grid gap-2 col-6 mx-auto btn btn-success btn btn-outline-info'><b>Go To Link To Download</b> </a>";


  }
}

  ?>



