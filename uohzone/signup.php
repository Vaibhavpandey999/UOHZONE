
<?php
 




if($_SERVER["REQUEST_METHOD"]=="POST")
{

    require 'database_conn.php';
      
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    
    if (strpos($email,"@uohyd.ac.in") !== false) {
      
    
   
        
             



    $password= mysqli_real_escape_string($conn,$_POST['password']);
    

    $cnfpassword= mysqli_real_escape_string($conn,$_POST['cnfpassword']);

  

      $mobile= mysqli_real_escape_string($conn,$_POST['mobile']);
      $alt_mob= mysqli_real_escape_string($conn,$_POST['alt_mob']);
    $exist=false;
    $existSql = "SELECT * FROM `uohstudent` WHERE uohmail = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        
        $showerror = "Username Already Exists";
    }
    else{


    if (($password == $cnfpassword))
       {
        $hash = password_hash($password, PASSWORD_DEFAULT);
      
       $sql="INSERT INTO `uohstudent` (`uohmail`, `hashpass`, `mobile`, `alternate_mob`) VALUES ('$email', '$hash', '$mobile', '$alt_mob')";
       $result=mysqli_query($conn,$sql);
       if($result)
       {
        header("location: index.php?signup=true");
        exit; 
       }
      }
       else{
           
           header("location: index.php?password=false");
           exit;

       }

       }
      }
      else{
        header("location: index.php?invalidmail=true");
           exit;
      }
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
   


    <title>Sign Up</title>
  </head>
  <body>


   

<style>
#signup {
        margin: 0px;
        padding: 0px;
        background-image: url('images/search.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
    }


</style>



<!-- --Sign Up-- Modal -->
<div id="signup" class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-dark"  style="background-color:#FFCCCB ;" width="800px">
      <div class="modal-header">
        <h5 class=" text-dark modal-title mx-auto" id="exampleModalScrollableTitle">Sign Up</h5>
        <button type="button" style="background-color: #FFCCCB;" class=" border border-dark text-dark close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  role="form" action="signup.php" method="POST" enctype="multipart/form-data">


      <div class="form-group">
        <label class="text-dark" for="post_title"><b>University Email Id</b></label></label>
        <input type="email" name="email" class="form-control" placeholder="UOH Mail Id"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-dark" for="post_title"><b>Password</b></label>
        <input type="password" name="password" class="form-control" placeholder="Password"  value = "" required="">
      </div>
      
      <div class="form-group">
            <label  class="text-dark" for="  post_title"><b> Confirm Password</b></label>
            <input type="password" name="cnfpassword" class="  form-control" placeholder="Confirm Password" value="" required="">
          </div>

          <small id="emailHelp" class="text-light form-text text-muted"><b>Make sure to type the same password </b></small>

          <div class="form-group">
            <label class="text-dark"  for="post_title"><b>Mobile NO</b></label>
            <input type="text" name="mobile" minlength="10" maxlength="10" class="form-control" placeholder="Mobile No" value="" required="">
          </div>
          <div class="form-group">
            <label  class="text-dark"  for="post_tags"><b>Alternative Mobile No</b></label>
            <input type="text" name="alt_mob" minlength="10" maxlength="10" class="form-control" placeholder="Alternate Mobile No:" value="" required="">
          </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark  " data-dismiss="modal">Close</button><button type="submit" name="login" class="btn btn-outline-dark mx-1" value="">Sign Up</button>
      </div>
     </form>
    </div>
  </div>
</div>
</div>

















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
    <script src="javascript/uploadnotes.js"></script>
   
  </body>

</html>


