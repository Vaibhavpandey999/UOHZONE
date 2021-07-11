
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
require 'adminnav.php';

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
    

    $sql="SELECT * FROM `interview` WHERE `interview`.`reported_interview`=1";

    
      $result = mysqli_query($conn, $sql);
    
      while($row = mysqli_fetch_assoc($result)){
      
        echo "<tr>
        
        <td class='text-dark' style='background-color:lightblue'>". $row['uoh_no'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['candidate_name'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['course'] . "</td>
        <td class='text-dark' style='background-color:lightblue' >". $row['company_name'] . "</td>
        <td class='text-dark' style='background-color:lightblue'>". $row['job_profile'] . "</td>
        <td style='background-color:lightblue' > <button   class='view btn btn-md  btn btn-outline-warning btn btn-dark ' id=".$row['s_no'].">View</button> <button   class='delete btn btn-md  btn btn-outline-danger btn btn-dark ' id=".$row['s_no'].">Delete</button>   </td>
      </tr>";
    } 
      ?>


  </tbody>
</table>
</div>





<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
if(isset($_GET['delete'])){
  $s_no = $_GET['delete'];

  $sql_report ="DELETE FROM `interview` WHERE `interview`.`s_no` = $s_no" ;

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








<script>

view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("view");
        sno = e.target.id;

       
          window.location = `adminview.php?view=${sno}`;




        })
    })
</script>


    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  
echo '<script>
    download = document.querySelectorAll(".delete");
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        s_no = e.target.id;
       if(confirm("Are U You Sure U Want To Delete ?  "))
{
        window.location = `deleteinterview.php?delete=${s_no}`;

        alert(" U have  Sucessfully Deleted the Content !");
}
      })
    })
  </script>';
}
else{
  echo '<script>
      download = document.querySelectorAll(".delete");
      Array.from(download).forEach((element) => {
        element.addEventListener("click", (e) => {
  
        
         alert(" U Are Not Logged In Please Login To Delete  !");
        })
      })
    </script>';}



?>






</script>
<script src="javascript/uploadnotes.js"></script>

  </body>
</html>










