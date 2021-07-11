
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
      <strong>   Alert!</strong>    You Are Not Logged In Please Login To Add Interview Experience !
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
        background-image: url('images/search.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;




}

#interview{
  margin: 0px;
        padding: 0px;
        background-image: url('images/ind.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;




}



</style>










      
<!-- Button trigger modal -->
<section class=" my-5 text-center">
        <button type="button" class="intt text-dark btn btn-info btn-outline-warning mx-auto btn-lg " data-toggle="modal" data-target="#interview">
  Write Interview Experience
</button>

</section>



<div style="background:lightblue" class=" container my-4 border border-warning">


<table class='text-dark'  style="background-color:lightblue" class=" table" id="myTable">
  <thead>
    <tr>
      <th class='text-dark' scope="col">UOH Reg No</th>
      <th class='text-dark' scope="col">Candidate Name</th>
      <th class='text-dark'  scope="col">Course</th>
      <th class='text-dark' scope="col">Company Name</th>
      <th class='text-dark' scope="col">Job Profile</th>
      <th class='text-dark' scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php 
      $sql = "SELECT * FROM `interview`";
      $result = mysqli_query($conn, $sql);
    
      while($row = mysqli_fetch_assoc($result)){
      
        echo "<tr>
        
        <td class='text-dark' style='background-color:lightblue'>". $row['uoh_no'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['candidate_name'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['course'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['company_name'] . "</td>
        <td class='text-dark' style='background-color:lightblue'>". $row['job_profile'] . "</td>
        <td style='background-color:lightblue' > <button   class='view btn btn-md  btn btn-outline-warning btn btn-dark ' id=".$row['s_no'].">View</button> <button   class='report btn btn-md  btn btn-outline-danger btn btn-dark ' id=".$row['s_no'].">Report</button>   </td>
      </tr>";
    } 
      ?>


  </tbody>
</table>
</div>




<!----Interview- --Modal -->

<?php 
     $login=false;

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 


echo '<div id="interview"  " class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div   class=" modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-dark"  style="background-color:#FFCCCB ;" width="800px">
      <div class="modal-header">
        <h5 class=" text-dark modal-title mx-auto" id="exampleModalScrollableTitle">Add Interview  Experiance</h5>
        <button type="button" style="background-color:#FFCCCB;" class=" border border-dark text-dark close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  role="form" action="interview.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
        <label  class="text-dark" for="post_title">Candidate Name</label></label>
        <input type="text" name="candidate" class="form-control" placeholder="Name" maxlength="30"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-dark" for="post_title">UOH Reg No</label>
        <input type="text" name="registration" class="form-control" placeholder="Reg NO" maxlength="10"  value = "" required="">
      </div>
      <div class="form-group">
        <label class="text-dark" for="post_title">Course</label>
        <input type="text" name="course" class="form-control" placeholder="Course" maxlength="8" value = "" required="">
      </div>
      <div class="form-group">
        <label  class="text-dark" for="post_tags">Company Name</label>
        <input type="text" name="company" class="form-control" placeholder="Company" maxlength="10" value=""required="">    
      </div>
    
      <div class="form-group">
        <label class="text-dark" for="post_tags">Job Profile</label>
        <input type="text" name="job_profile" class="form-control" placeholder="Job Profile" value=""required="">    
  </div>



      <div class="form-group">
        <label class="text-dark" for="post_tags">Elaborate Interview Experience</label>
        <textarea name="interview" type="text" class="  inputs mx-auto form-control"  rows="7"></textarea>
  </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark  " data-dismiss="modal">Close</button><button type="submit" name="login" class="btn btn-outline-dark mx-1" value="">Submit</button>
      </div>
     </form>
    </div>
  </div>
</div>
</div>';
    }
    
    ?>
 


 <?php



if($_SERVER["REQUEST_METHOD"]=="POST")
{




  $candidatename=$_POST["candidate"];

  $uoh_no=$_POST["registration"];
$course=$_POST["course"];

$company=$_POST["company"];

$job_profile=$_POST["job_profile"];

$interview_exp=$_POST["interview"];


$sql="INSERT INTO `interview` (`uoh_no`, `candidate_name`, `company_name`, `course`, `job_profile`, `description`) VALUES ('$uoh_no', '$candidatename', '$company', '$course', '$job_profile', '$interview_exp')";
$result=mysqli_query($conn,$sql);

if($result)
{
    $alert=true;
  
}

}

?>



<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
if(isset($_GET['report'])){
  $s_no = $_GET['report'];

  $sql_report = "UPDATE `interview` SET `reported_interview` = '1' WHERE `interview`.`s_no` = $s_no";

  $result= mysqli_query($conn, $sql_report);

  


  }
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





<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  
echo '<script>
    download = document.querySelectorAll(".report");
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        s_no = e.target.id;
       if(confirm("Are U You Sure U Want To Report ?  "))
{
        window.location = `interview.php?report=${s_no}`;
         alert(" U have  Sucessfully Reported the Content !");
}
        })
    })
  </script>';
}
else{
    
echo '<script>
download = document.querySelectorAll(".report");
Array.from(download).forEach((element) => {
  element.addEventListener("click", (e) => {

     alert(" U Are Not Logged In Please Log In  To Report the Content !");

    })
})
</script>';
}
?>




<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  
}
else{
echo '<script>
      download = document.querySelectorAll(".intt");
      Array.from(download).forEach((element) => {
        element.addEventListener("click", (e) => {
  
        
         alert(" U Are Not Logged In Please Login To Write An Interview Experience  !");
        })
      })
    </script>';}

?>

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










