
<?php


require "database_conn.php";


?>










<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


  <title>Search Results </title>
</head>

<!------navbar-->

<?php require 'navbar.php';      ?>


<style>
body{
  margin: 0px;
        padding: 0px;
        background-image: url('images/search.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
}

</style>
<?php

if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){ }
    else{
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>   Alert!</strong>    You Are Not Logged In Please Login Sell 2nd Hand Books !
                                          <button type="button" class="close mx-5" data-dismiss="alert" aria-label="Close">
          <span  aria-hidden="true">×</span>
      </button>
  </div> ';
    }

?>





<!-- Button trigger modal -->
<section class=" my-5 text-center">
  <button type="button" class="btn btn-info btn-outline-warning  mx-auto btn-lg" data-toggle="modal" data-target="#upload">
    Sell 2nd hand Book
  </button>

</section>



<!----search box-->
<section class="text-center container">
  <h1 class="text-dark"> Search Book</h1>
  <p>
  <form  action="searchbook.php" method="GET" class="d-flex mb-4">
    <input name="search" class="form-control me-2" type="search" placeholder="Search By Book Name Or Author Name" aria-label="Search">
    <button class="btn btn-primary btn-outline-warning" type="submit">GO</button>
  </form>
  </p>
</section>>



<section  class=" t container my-3 mx-auto  ">


        <div class="row my-3 ">


        <?php
       $error=true;
      $query=$_GET['search'];
         
      $query=str_replace("<","&lt;",$query);
      $query=str_replace(">","&gt;",$query);

      $query=str_replace("'","&apos",$query);

      $query=str_replace(`"`,"&quot",$query);

    $sql = "SELECT * FROM books WHERE match(book_name, author_name) against ('$query')";

    $result = mysqli_query($conn, $sql);

       

             
    
        
    
    while ($row = mysqli_fetch_assoc($result)) {

       $error=false;

      $name = $row['book_name'];
      $price = $row['price'];
      $author = $row['author_name'];
       
      $image=$row['image'];
      
      echo '<div class=" col-md-4 my-2">
      <div class="card border-warning " style="width: 18rem;">
      <img width="285px"  height="300px" src="data:image/jpg;base64,' .base64_encode($row['image'] ) . '" /> 
                   <div tyle="background-color:#FFFDD0" class="text-dark card-body">
              <h5 class="text-dark card-title">Book Name : ' . $name  . '</h5>
              <p class="text-dark card-text"><b>Price Rs: ' . $price .'</b><br>
              <b>Author: ' . $author .'</b></p>
              <button   class="view btn btn-success bg-" id=' .$row["book_id"] . '> More Details</button>
          </div>
      </div>
      </div>';
      
      
      
      
      
    }

     if($error)
        {
          echo '<div style="background-color:gray" class="jumbotron container mx-auto">
          <h1 class=" mx-auto display-4 text-dark"><b> No Search Result Found For '.substr($query,0,6) . ' ...</b></h1>
          <p class=" text-center text-dark">  <h2>    Suggestions:</h2> 
        <ul>
        <li class="text-dark mx-auto">
                <b> Make sure that all words are spelled correctly.</b>
        </li>
        <li  class="mx-auto text-dark"><b> different keywords.</b></li>
        <li  class="mx-auto text-dark"><b>Try more general keywords.</b></li>
        <ul>
        </p>
        </div>';
        }
  



    ?>

        </div>
  </div>

</section>




<?php require'sellbookmodal.php';?>

<?php  require'footer.php';  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  

 
<script>

view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
      element.addEventListener("click", (e) => {
        
        book_id = e.target.id;

       
          window.location = `bookdetails.php?view=${book_id}`;




        })
    })



</script>
  </body>

</html>


