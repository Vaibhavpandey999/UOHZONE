<?php  require 'database_conn.php'; ?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/spinkit/2.0.1/spinkit.min.css" rel="stylesheet">

    
    <title>Home</title>
  </head>
  <body>
<style>

</style>







<?php require 'navbar.php';  ?>    
<style>
 body {
        margin: 0px;
        padding: 0px;
        background-image: url('images/ind1.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
    }
.bb{

   border-style: solid;
  border-color: #FFB6C1;
}

.aaa{
  width:840px;
  height:360px;
  
}

.aa{
  height: 360px;
}
</style>


<?php
     if(isset($_GET['logout']) && $_GET['logout']=="false")
      {
        
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You Are Successfully Logged Out !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>


 
<!---alert-->
 
<?php
     if(isset($_GET['login'])&&($_GET['login']=="false"))
      {
        
        
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Alert!</strong> Unable to Login In due to Invalid Credentials !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>
 
 
 <?php
     if(isset($_GET['password'])&&($_GET['password']=="false"))
      {
        
        
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Alert!</strong> Password Mis-Match During Sign Up !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>


<?php
     if(isset($_GET['invalidmail'])&&($_GET['invalidmail']=="true"))
      {
        
        
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Sorry!</strong> We Only Serve to Students Of University Of Hyderabad  !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>




<?php
     if(isset($_GET['login'])&&($_GET['login']=="true"))
      {
        
        
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Hey you are now logged in  !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>



<?php
     if(isset($_GET['signup'])&&($_GET['signup']=="true"))
      {
        
        
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Hey You Have Signed Up Successfully  !
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

      }



?>

<div id="carouselExampleCaptions" class="aa carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/book.jpg" class="aaa d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3 class="text-light">Buy Or Sell 2nd hand Books</h3>
        <h5 class="text-light">U can Buy Or Post an add To Sell 2nd Hand Books With In The University Campus  .</h5>
        <a href="buynsellbook.php"   target="_self"     class=" text-light btn btn-primary btn-outline-success btn-lg   ">Proceed</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/search.jpeg" class="aaa d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3 class="text-dark">Interview Experiances</h3>
        <h5 class="text-dark">U Can View Or Add Interview Experiances Of The Companies.</h5>
        <a href="interview.php" target="_self" class="text-light btn btn-primary btn-outline-success  btn-lg  mx-auto">Proceed</a>

      </div>
    </div>
    <div class="carousel-item">
      <img src="images/nn.jpeg" class="aaa d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3 class="text-dark">Download Or Upload Notes/Free E-Books</h3>
        <h5 class="text-dark">U Can  Download Notes/Free E-Books Via Links Or Upload Links Of The Notes/Free E-Books By Uploading It In Your Drive Or Cloud And Proving Link Here And Making Link Public .</h5>
        <a href="uploadnotes.php" target="_self" class=" text-light btn btn-primary btn btn-outline-success  btn-lg  mx-auto ">Proceed </a>
      </div>
    </div>

    <div class="carousel-item">
      <img src="images/ind.jpeg" class="aaa d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3 class="text-dark">Placement Stuffs</h3>
        <h5 class="text-dark">Collection Of All Resources You Need For Placement Preapration.</h5>
        <a href="placementstuff.php" target="_self" class=" text-light btn btn-primary btn-outline-success  btn-lg  mx-auto">Proceed </a>

      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="text-info"><b>Previous</b></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class=" text-info"><b>Next</b></span>
  </button>
</div>






<section class="text-center container" id="about">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-dark mt-3">What U Can Do Here</h1>
                <p class="lead  mt-4">
                <ul>
  


              
              <li>  <h5>A place where you can sell your 2nd hand books to other students with in University Of Hyderabad Campus.</h5></li>
                       <li><h5>Write your Interview Experiances .</h5></li>
                       <li><h5>Upload Or Download Notes Or Free E-Books via Drive Links(U have to upload materials in your drive or cloud storage then provide the link and make it public.).</h5></li>
                         <li><h5>Free Resources of Placement Materials.</h5></li>

                         </ul>     
                </p>
            </div>
        </div>
    </section>






<?php require 'footer.php';?>

    <!-Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  

  </body>
</html>