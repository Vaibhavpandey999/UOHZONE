<?php


require "database_conn.php";
?>




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


  <title></title>
</head>

<!------navbar-->

<?php require 'navbar.php';     
 ?>



<style>
body{
  margin: 0px;
        padding: 0px;
        background-image: url('images/boook.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;
}

#upload{
  margin: 0px;
        padding: 0px;
        background-image: url('images/ind.jpeg');
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
        height: 100%;

}










</style>


<?php

if((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']==true){ }
    else{
      echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>   Alert!</strong>    You Are Not Logged In Please Login Sell 2nd Hand Books !
                                          <button type="button" class="close mx-5" data-dismiss="alert" aria-label="Close">
          <span  aria-hidden="true">×</span>
      </button>
  </div> ';
    }

?>



<?php
if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 06;
    $start_from = ($page-1)*06;
    
    $query = "select * from books limit {$start_from},{$num_per_page}";
    $result2 = mysqli_query($conn,$query);





?>


<?php




$addalert=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $book_name = $_POST['book_name'];
  $author = $_POST['author'];
  $price = $_POST['price'];
  
  $mobile = $_POST['mobile'];
  $alt_mobile = $_POST['alt_mob'];
  $hostel_add = $_POST['hostel_add'];
  $free_time = $_POST['free_time'];
  $edition = $_POST['edition'];
  if(!empty($_FILES["image"]["name"])) { 
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
     
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg'); 
    if(in_array($fileType, $allowTypes)){ 
        $image = $_FILES['image']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image));



  $sql = "INSERT INTO `books` (`book_name`, `author_name`, `price`, `image`, `mobile_no`, `hostel_add`, `free_time`, `alternate_mob_no`, `edition`) VALUES ( '$book_name', '$author', '$price', '$imgContent', '$mobile', '$hostel_add', '$free_time', '$alt_mobile', '$edition')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    
     
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Request To Sell Books Have been Submitted !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';


  }
}

  }
}
?>

<!-- Button trigger modal -->
<section class=" my-5 text-center">
  <button type="button" class=" buyy  btn btn-info btn-outline-warning  mx-auto btn-lg" data-toggle="modal" data-target="#upload">
    Sell 2nd hand Book
  </button>

</section>



<!----search box-->
<section class="text-center container">
  <h1 class="text-white"> Search Book</h1>
  <p>
  <form  action="searchbook.php" method="GET" class="d-flex mb-4">
    <input name="search" class="form-control me-2" type="search" placeholder="Search By Book Name or Author Name" aria-label="Search">
    <button class="btn btn-primary text-warning btn-outline-primary" type="submit">Go</button>
  </form>
  </p>
</section>




<!----pagination------------------>

<?php 
        
        $pr_query = "select * from books ";
        $pr_result = mysqli_query($conn,$pr_query);
        $total_record = mysqli_num_rows($pr_result );
        $limit=6;
        $total_page = ceil($total_record/$limit);
      
        if($page>1)
        {
            echo '<a href="buynsellbook.php?page='.($page-1).' " class=" mx-1 btn btn-danger">Previous</a>';
        }

        
        for($i=1;$i<$total_page;$i++)
        {
          
            echo '<a href="buynsellbook.php?page='.$i.' " class=" mx-1 btn btn-primary">' .$i .'</a>';
        }

        if($i>$page)
        {
            echo '<a href="buynsellbook.php?page='.($page+1).'" class="mx-1  btn btn-danger">Next</a>';
        }

?>
<!------Cards display----->

<div class="container my-3" id="ques">
        <div class="row my-3">





    <?php



  


  

    while ($row = mysqli_fetch_assoc($result2)) {



      $name = $row['book_name'];
      $price = $row['price'];
      $author = $row['author_name'];
       
      $image=$row['image'];

      echo '<div class=" col-md-4 my-2">
      <div class="card border-warning " style="width: 18rem;">
      <img width="285px"  height="300px" src="data:image/jpg;base64,' .base64_encode($row['image'] ) . '" /> 
                   <div style="background-color:#FFFDD0" class="text-dark card-body">
              <h5 class="text-dark card-title">Book Name : ' . $name  . '</h5>
              <p class="text-dark card-text"><b>Price Rs: ' . $price .' </b><br>
             <b> Author: ' . $author .'</b></p>
              <button   class="view btn btn-success  " id=' .$row["book_id"] . '> More Details</button>
              <button   class="report btn btn-danger    " id=' .$row["book_id"] . '> Report</button>
          </div>
      </div>
      </div>';
      
     
    }







    ?>

        </div>
  </div>













<!-- --Sell Book-- Modal -->

<?php  require 'sellbookmodal.php'; ?>




<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
if(isset($_GET['report'])){
  $bookid = $_GET['report'];

  
  $sql_report = "UPDATE `books` SET `reported_books` = '1' WHERE `books`.`book_id` = $bookid";

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
  
 
<script>

view = document.getElementsByClassName('view');
    Array.from(view).forEach((element) => {
      element.addEventListener("click", (e) => {
        
        book_id = e.target.id;

       
          window.location = `bookdetails.php?view=${book_id}`;




        })
    })



</script>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
  
echo '<script>
    report = document.querySelectorAll(".report");
    Array.from(report).forEach((element) => {
      element.addEventListener("click", (e) => {

        bookid = e.target.id;
       if(confirm("Are U You Sure U Want To Report ?  "))
{         window.location = `buynsellbook.php?report=${bookid}`; 
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

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 

}
else{
  echo '<script>
      download = document.querySelectorAll(".buyy");
      Array.from(download).forEach((element) => {
        element.addEventListener("click", (e) => {
  
        
         alert(" U Are Not Logged In Please Login To Post An Add To Sell 2nd Hand Books !");
        })
      })
    </script>';}



?>



<script src="javascript/uploadnotes.js"></script>
  </body>

</html>
