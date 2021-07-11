<?php  require 'database_conn.php'; ?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>AdminBaba</title>
  </head>
  <body>
<style>
#loading{
  margin: 0px;
        padding: 0px;
  background-color:orange;
  height:100%;
  background-position: center;

background-size: cover;
}
</style>
<div id="loading" >
  <div  class="d-flex justify-content-center" >
  <div class="spinner-border" role="status">
    <span class="sr-only"></span>
  </div>
</div>
 
</div>


<!--navbar-->




<?php require 'adminnav.php';  ?>    
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







    <div class="container  mx-auto  py-5  ">
   
      <div class="bb  card d-inline-block    mx-5" style="width: 20rem">
           <div  style="background-color:#FFFDD0	"  class="card-body text-dark ">
          <h5 class="card-title"> Delete Reported Interview</h5>
          <p class="card-text"></p>
          <a href="deleteinterview.php"   target="_self"     class=" text-light btn btn-primary btn-outline-success btn-lg  mx-auto ">Go</a>
        </div>
      </div>
     
      <div class=" bb card d-inline-block    mx-5 " style="width: 20rem">
         <div  style="background-color:#FFFDD0	" class="card-body  text-dark ">
          <h5 class="card-title">Delete Reported Notes</h5>
          <p class="card-text"></p>
          <a href="deletenotes.php" target="_self" class=" text-light btn btn-primary btn btn-outline-success  btn-lg  mx-auto ">Go </a>
        </div>
      </div>
      <div class="bb card d-inline-block  my-5 mx-5" style="width: 20rem">
       
        <div  style="background-color:#FFFDD0	" class="card-body  text-dark">
          <h5 class="card-title">Delete Reported Books</h5>
          <p class="card-text"></p>
          <a href="deletebooks.php" target="_self" class="text-light btn btn-primary btn-outline-success  btn-lg  mx-auto">Go</a>
        </div>
      </div>
      <div class="bb mx-5 card d-inline-block   " style="width: 20rem"  >
        
        <div  style="background-color:#FFFDD0	"  class=" my-2 card-body text-dark ">
          <h5 class="card-title">Delete Fake  Users </h5>
          
          <a href="deleteusers.php" target="_self" class=" text-light btn btn-primary btn-outline-success  btn-lg  mx-auto">Go </a>
        </div>
      </div>
    </div>













<?php require 'footer.php';?>

    <!-Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  <script>
  window.onload = function(){ document.getElementById("loading").style.display = "none" }
  
  </script>    

    

  </body>
</html>