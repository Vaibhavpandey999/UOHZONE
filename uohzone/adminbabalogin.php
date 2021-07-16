<?php

$login=false;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require 'database_conn.php';

    $admin = mysqli_real_escape_string($conn, $_POST["admin"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]); 
    

    $sql = "Select * from adminbaba where admin_user='$admin' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if ($password == $row['admin_password']){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['admin'] = $admin;
        header("location: adminbaba.php?login=true");
        
        }
    }

}
else{
    
    header("location: adminbaba.php?login=false");
    
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

    <title>login</title>
  </head>
  <body>
 

<style>
#login {
        margin: 0px;
        padding: 0px;
        background-image: url('images/log.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
    }


</style>


<!----login form---->

  
<!-- --Login-- Modal -->
<div   id="adminlogin"   class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-dark"  style="background-color: #FFFDD0;" width="800px" >
      <div class="modal-header">
        <h5 class=" text-dark modal-title mx-auto" id="exampleModalScrollableTitle">Login</h5>
        <button type="button" style="background-color: #FFFDD0;" class=" border border-dark text-dark close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  role="form" action="adminbabalogin.php" method="POST" enctype="multipart/form-data">


      <div class="form-group">
        <label class="text-dark" for="post_title"><b>Admin Id</b></label></label>
        <input type="text" name="admin" class="form-control" placeholder="Admin Id"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-dark" for="post_title"><b>Password</b></label>
        <input type="password" name="password" class="form-control" placeholder="Password"  value = "" required="">
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark  " data-dismiss="modal">Close</button><button type="submit" name="login" class="btn btn-outline-dark mx-1" value="">Login</button>
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