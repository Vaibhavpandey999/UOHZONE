<?php  require 'database_conn.php'; ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">



    <title>Book Details</title>
  </head>
   
     <?php  require 'navbar.php'; ?>

     <style>
 body {
        margin: 0px;
        padding: 0px;
        background-image: url('images/notes1.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
    }

   .zz{
     width:50rem;
   } 

</style>



<?php

if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){ }
    else{
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>   Alert!</strong>    You Are Not Logged In Please Login To Report that Book is not Available  !
                                          <button type="button" class="close mx-auto" data-dismiss="alert" aria-label="Close">
          <span  aria-hidden="true">×</span>
      </button>
  </div> ';
    }

?>


     <?php
   
   if(isset($_GET['view'])){
     $sno = $_GET['view'];
    
   
     $sql_view = "SELECT * FROM `books` WHERE `book_id` = $sno";
   
   $result= mysqli_query($conn, $sql_view);
   
   if($row = mysqli_fetch_assoc($result)){
   
         $seller=$row['Seller_name'];
        $bookid=$row['book_id'];
       $name = $row['book_name'];
       $price = $row['price'];
       $author = $row['author_name'];
        
       $image=$row['image'];
        
       $mobile=$row['mobile_no'];
           
      $hostel=$row['hostel_add'];
      $freetime=$row['free_time'];
      $alternate=$row['alternate_mob_no'];
      $edition=$row['edition']; 
      $posttime=$row['time_of_post'];   
   
      echo '<div style="background-color:#FFFDD0" class=" zz overflow-auto mx-auto   my-5  col-md-4 my-2" >
      <div class="card border-warning " style="width: 50rem;">
    
                   <div style="background-color:#FFFDD0" class=" text-dark  card-body" >
              <h5 class="card-title"><b>Book Name :  </b>' . $name  . '</h5>
              <p class="card-text"><b>Price Rs:</b>' . $price .'<br>
              <b >Author: </b>' . $author .'<br>
              <b>Mobile No: </b> ' . $mobile .'<br>
              <b>Alternate Mobile No : </b> ' . $alternate .'<br>
              <b>Hostel Address To Pick Up Book :  </b>' . $hostel .'<br>
              <b>Book Edition : </b> ' . $edition .'<br>

              <b>Seller Name : </b> ' . $seller .'<br>

              <b>(Free Time to Pick Up Book) : </b> ' . $freetime .'<br>
              <b>Date And Time of Post : </b> ' . $posttime .'<br>
              </p>
              <div class="footer" >
             <br>
             <a href="buynsellbook.php"   class="mx-auto btn btn-outline-warning  btn-lg" >Close</a>
          </div>
      </div>
      </div>
      </div>';
    
   
   
   }
   
      
}
?>













<?php  require'footer.php';  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  
   
  </body>

</html>

