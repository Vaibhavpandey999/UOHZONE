
<?php 
  
  session_start();
  
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
    $loggedin = false;
  }
  
  
  
  ?>
  
  
  
  
  
  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  
      
      
      <title></title>
    </head>
    <body>
  <!------navbar-->
  
  
  
    <nav style="background-color:#000000 " class="navbar ttt navbar-expand-lg navbar- bg-">
          <div class="container-fluid">
          <img src="images/logo11.png" width="80px" height="70px" style="background-color:gray" >
            <a class="navbar-brand text-light" href="index.php"><b>UOH Zone</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active text-light " aria-current="page" href="index.php"><b>Home</b></a>
                </li>
                
                  </ul>
                </li>
                
              </ul>
              <?php
              if(!$loggedin){
              
               require 'adminbabalogin.php';
               
               
              
        
               
              echo '<button  class=" text-success nav-link btn btn-info btn-outline-warning mx-2 " data-toggle="modal" data-target="#adminlogin">Login</button>';
              }
            if($loggedin){
            echo '<form class="text-light  my-2" >
                 <b>Welcome Admin  '.   $_SESSION['admin'] .'</b>
            
            </form>';   
            
  
              echo '<a href="logout.php" class="nav-link btn btn-outline-warning mx-2 ">Logout</a>';
            }
            ?>
            </div>
          </div>
        </nav>
  
  

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


  </body>
</html>






