


<?php

require 'database_conn.php';
$alert=false;


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

    
    
    <title> Add Interview Experience</title>
  </head>
<body>  


  <!--navbar--->
  <?php 
require 'navbar.php';

?>

<?php

if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){ }
    else{
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>   Warning!</strong>    You Are Not Logged In Please Login To Add Interview Experience !
                                          <button type="button" class="close mx-5" data-dismiss="alert" aria-label="Close">
          <span  aria-hidden="true">×</span>
      </button>
  </div> ';
    }

?>



<?php
    if($alert)
    {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You Have Submitted Your Interview Experience !
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div> ';
    }

?>

<style>
body{
  margin: 0px;
        padding: 0px;
        background-image: url('images/not.jpg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;




}
</style>












<!----Interview- --Modal -->

<?php 
     $login=false;

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 


echo '<div id="interview" style="background-color: black; " class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div  style="background-color: black;" class="border border-warning modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-warning"  style="background-color: black;" width="800px">
      <div class="modal-header">
        <h5 class=" text-light modal-title mx-auto" id="exampleModalScrollableTitle">Add Interview  Experiance</h5>
        <button type="button" style="background-color: black;" class=" border border-warning text-warning close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  role="form" action="interview.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
        <label  class="text-light" for="post_title">Candidate Name</label></label>
        <input type="text" name="candidate" class="form-control" placeholder="Name" maxlength="30"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-light" for="post_title">UOH Reg No</label>
        <input type="text" name="registration" class="form-control" placeholder="Reg NO" maxlength="10"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-light" for="post_title">Course</label>
        <input type="text" name="course" class="form-control" placeholder="Course" maxlength="8" value = "" required="">
      </div>
      <div class="form-group">
        <label  class="text-light" for="post_tags">Company Name</label>
        <input type="text" name="company" class="form-control" placeholder="Company" maxlength="10" value=""required="">    
      </div>
    
      <div class="form-group">
        <label class="text-light" for="post_tags">Job Profile</label>
        <input type="text" name="job_profile" class="form-control" placeholder="Job Profile" value=""required="">    
  </div>



      <div class="form-group">
        <label class="text-light" for="post_tags">Elaborate Interview Experience</label>
        <textarea name="interview" type="text" class="  inputs mx-auto form-control"  rows="7"></textarea>
  </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning  " data-dismiss="modal">Close</button><button type="submit" name="login" class="btn btn-outline-warning mx-1" value="">Submit</button>
      </div>
     </form>
    </div>
  </div>
</div>
</div>';
    }
    
    ?>
 





<?php require'footer.php';?>







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
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#myTable').DataTable();

  });
</script>

<script>

view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("view");
        sno = e.target.id;

       
          window.location = `view.php?view=${sno}`;




        })
    })



</script>
<script src="javascript/uploadnotes.js"></script>

  </body>
</html>










