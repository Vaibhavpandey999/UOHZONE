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

<?php require 'navbar.php'; ?>


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




<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sub =  mysqli_real_escape_string($conn,$_POST['subject']);



  $sub=str_replace("<","&lt;",$sub);
  $sub=str_replace(">","&gt;",$sub);
  
  $sub=str_replace("'","&apos",$sub);
  
  $sub=str_replace(`"`,"&quot",$sub);










  $desc =  mysqli_real_escape_string($conn,$_POST['description']);



  $desc=str_replace("<","&lt;",$desc);
  $desc=str_replace(">","&gt;",$desc);
  
  $desc=str_replace("'","&apos",$desc);
  
  $desc=str_replace(`"`,"&quot",$desc);









  $book_name =  mysqli_real_escape_string($conn,$_POST['notes_name']);






  $book_name=str_replace("<","&lt;",$book_name);
  $book_name=str_replace(">","&gt;",$book_name);
  
  $book_name=str_replace("'","&apos",$book_name);
  
  $book_name=str_replace(`"`,"&quot",$book_name);








  $down_link =  mysqli_real_escape_string($conn,$_POST['link']);






  $author =  mysqli_real_escape_string($conn,$_POST['author']);





  $author=str_replace("<","&lt;",$author);
  $author=str_replace(">","&gt;",$author);
  
  $author=str_replace("'","&apos",$author);
  
  $author=str_replace(`"`,"&quot",$author);





  $uploader =  mysqli_real_escape_string($conn,$_POST['uploader']);



  $uploader=str_replace("<","&lt;",$uploader);
  $uploader=str_replace(">","&gt;",$uploader);
  
  $uploader=str_replace("'","&apos",$uploader);
  
  $uploader=str_replace(`"`,"&quot",$uploader);






  $sql = "INSERT INTO `notes` (`subject`, `description`, `notes_name`, `uploader`, `author`, `link`) VALUES ( '$sub', '$desc', '$book_name', '$uploader', '$author', '$down_link')";

  $result = mysqli_query($conn, $sql);
  if ($result) {
    

  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You Have Submitted Your Notes /Ebooks Details  !
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
</div> ';


    
  }
  else{

 
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> Some Details may be invalid Please Check !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
  </div> ';


  }
}

?>













<!-- Button trigger modal -->
<section class=" my-5 text-center">
  <button type="button" class="upp   text-dark btn btn-info text-success btn btn-outline-warning mx-auto btn-lg " data-toggle="modal" data-target="#upload">
    Upload Notes/Free Ebooks
  </button>

</section>

<div   style='background-color:lightblue' class="container my-4 border border-warning">
  <table class='text-dark' style='background-color:lightblue' class="table" id="myTable">
    <thead>
      <tr>
        <th class='text-dark'  scope="col">Subject</th>
        <th class='text-dark'  scope="col">Description</th>
        <th class='text-dark'  scope="col">Name of Book/Notes</th>
        <th class='text-dark'   scope="col">Uploaded by</th>
        <th class='text-dark'  scope="col">Author Name</th>

        <th class='text-dark'  scope="col">Drive Link/Website Link To Download it</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql1 = "SELECT * FROM `notes`";
      $result = mysqli_query($conn, $sql1);

      while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>
        
        <td   class='text-dark' style='background-color:lightblue'  >" . $row['subject'] . "</td>
        <td    class='text-dark' style='background-color:lightblue'>" . $row['description'] . "</td>
        <td   class='text-dark' style='background-color:lightblue'>" . $row['notes_name'] . "</td>
        <td  class='text-dark' style='background-color:lightblue'>" . $row['uploader'] . "</td>
        <td  class='text-dark' style='background-color:lightblue'>" . $row['author'] . "</td>
        <td  class='text-dark' style='background-color:lightblue' > <button   class=' btn-sm download btn btn-dark btn btn-outline-warning  my-2 ' id=" . $row['notes_id'] . ">Download</button> <button   class='btn-sm report btn btn-dark btn btn-outline-danger ' id=" . $row['notes_id'] . ">Report</button> 
          </td>
      </tr>";
      }
      ?>


    </tbody>





  </table>
</div>


<!----Upload Notes- --Modal -->

<?php 
    

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 


echo '<div id="upload"  class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div   class=" modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-dark"  style="background-color: #FFB6C1 ;" width="800px">
      <div class="modal-header">
        <h5 class=" text-dark modal-title mx-auto" id="exampleModalScrollableTitle">Upload Notes/Free E-boks</h5>
        <button type="button" style="background-color:  #FFB6C1;" class=" border border-dark text-dark close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  role="form" action="uploadnotes.php" method="POST" enctype="multipart/form-data">

     

     <div class="form-group ">
     <label class="text-dark" for="post_title">Notes/Ebook Subject</label>
     <input type="text" maxlength="15" name="subject" class="f1 t1 form-control" placeholder="Subject" value="" required="">
   </div>
   <div class="form-group">
     <label class="text-dark"  for="post_title">Notes/Ebook Description</label>
     <input type="text" maxlength="15"  name="description" class=" f1 form-control" placeholder="Description" required="">
   </div>
   <div class="form-group">
     <label class="text-dark" for="post_title">Name OF the Notes/Ebook </label>
     <input type="text" maxlength="15" name="notes_name" class=" f1 form-control" placeholder="Name" value="" required="">
   </div>


   <div class="form-group">
     <label   class="text-dark" for="post_title">Uploaded by</label>
     <input type="text" name="uploader" maxlength="10"  class="f1 form-control" placeholder="Your Reg No" value="" required="">
   </div>
   <div class="form-group">
     <label  class="text-dark" for="post_tags">Author</label>
     <input type="text" name="author" maxlength="15" class="f1 form-control" placeholder="Author" value="" required="">
   </div>

   <div class="form-group">
     <label  class="text-dark" for="post_tags">Drive Link/Website Link To Download it</label>
     <input type="text" name="link"  class=" f1 form-control" placeholder="Link of File on Drive" value="" required="">
   </div>

     
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark  " data-dismiss="modal">Close</button><button type="submit" name="aa" class="btn btn-outline-dark mx-1" value="">Submit</button>
      </div>
     </form>
    </div>
  </div>
</div>
</div>';
    }
    
    ?>





<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
if(isset($_GET['report'])){
  $notesid = $_GET['report'];
  $sql_report = "UPDATE `notes` SET `reported_notes` = '1' WHERE `notes`.`notes_id` = $notesid";
  


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
    download = document.querySelectorAll(".report");
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        notesid = e.target.id;
       if(confirm("Are U You Sure U Want To Report ?  "))
{
        window.location = `uploadnotes.php?report=${notesid}`;
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
  
        
         alert(" U Are Not Logged In Please Login To Report The Content !");
        })
      })
    </script>';}



?>

  <script>
    download = document.getElementsByClassName('download');
    Array.from(download).forEach((element) => {
      element.addEventListener("click", (e) => {

        notesid = e.target.id;


        window.location = `download.php?download=${notesid}`;

      })
    })
  </script>



<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 

}
else{
  echo '<script>
      download = document.querySelectorAll(".upp");
      Array.from(download).forEach((element) => {
        element.addEventListener("click", (e) => {
  
        
         alert(" U Are Not Logged In Please Login  To Upload Links Of Notes/Free E-Books !");
        })
      })
    </script>';}



?>










  <script src="javascript/uploadnotes.js"></script>

  </body>

</html>