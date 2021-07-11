<?php

$alert=false;

require 'database_conn.php';   ?>





<!doctype html>
<html lang="en">

<head>
<body>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">



  <title>Notes</title>
</head>

<?php require 'adminnav.php'; ?>


<?php

if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){ }
    else{
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Alert!</strong>   You Are Not Logged In Please Login To Upload Notes/Free E-Books !
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
        background-image: url('images/notes1.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
}

#upload{
  margin: 0px;
        padding: 0px;
        background-image: url('images/search.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
}





</style>



<div   style='background-color:lightblue' class="container my-4 border border-warning">
  <table class='text-dark' style='background-color:lightblue' class="table" id="myTable">
    <thead>
      <tr>
        <th class='text-dark'  scope="col">Book Name</th>
        <th class='text-dark'  scope="col">Author Name</th>
        
        <th class='text-dark'  scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      

      $sql="SELECT * FROM `books` WHERE `books`.`reported_books`=1";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
        
        <td   class='text-dark' style='background-color:lightblue'  >" . $row['book_name'] . "</td>
       
        <td  class='text-dark' style='background-color:lightblue'>" . $row['author_name'] . "</td>
        <td  class='text-dark' style='background-color:lightblue' > <button   class='mx-1 btn-md view btn btn-dark btn btn-outline-warning  my-2 ' id=" . $row['book_id'] . ">MoreDetails</button> <button   class='btn-md delete btn btn-dark btn btn-outline-danger ' id=" . $row['book_id'] . ">Delete</button> 
          </td>
      </tr>";
      }
      ?>


    </tbody>





  </table>
</div>






<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
if(isset($_GET['delete'])){
  $bookid = $_GET['delete'];

  $sql_report ="DELETE FROM `books` WHERE `books`.`book_id` = $bookid" ;

  $result= mysqli_query($conn, $sql_report);

  


  }
}
 
  ?>




<?php  require'footer.php';  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>


<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  
echo '<script>
    download = document.querySelectorAll(".delete");
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        notesid = e.target.id;
       if(confirm("Are U You Sure U Want To Delete ?  "))
{
        window.location = `deletebooks.php?delete=${notesid}`;
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
  
        
         alert(" U Are Not Logged In Please Login To Delete The Content !");
        })
      })
    </script>';}



?>

  <script>
    download = document.getElementsByClassName('view');
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        bookid = e.target.id;


        window.location = `adminbookdetails.php?view=${bookid}`;

      })
    })
  </script>











  <script src="javascript/uploadnotes.js"></script>

  </body>

</html>