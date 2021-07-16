
<!-- --Sell Book-- Modal -->
<?php 
     $login=false;

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 


echo '<div id="upload"   class="modal fade  "  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document" >
    <div class="modal-content border border-dark"  style="background-color: #FFFDD0;" width="800px">
      <div class="modal-header">
        <h5 class=" text-dark modal-title mx-auto" id="exampleModalScrollableTitle">Sell Books</h5>
        <button type="button" style="background-color: #FFFDD0;" class=" border border-dark text-dark close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     <form  name="myForm" role="form" action="buynsellbook.php"  method="POST" enctype="multipart/form-data">


     <div class="form-group">
            <label class="text-dark" for="post_title">Name Of Book</label>
            <input maxlength="30" type="text" name="book_name" class="form-control" placeholder="Book Name" value="" required="">
          </div>
          <div class="form-group">
            <label class="text-dark" for="post_title">Author</label>
            <input maxlength="30" type="text" name="author" class="form-control" placeholder="Author" value="" required="">
          </div>
          <div class="form-group">
            <label class="text-dark" for="post_title">Price</label>
            <input maxlength="7" type="text" name="price" class="form-control" placeholder="Price" value="" required="">
          </div>


          <div class="form-group">
            <label class="text-dark" for="post_title">Book Edition</label>
            <input maxlength="5" type="text" name="edition" class="form-control" placeholder="Book Edition" value="" required="">
          </div>


          <div class="form-group">
            <label class="text-dark" for="post_title">Seller Name</label>
            <input type="text" name="seller"   class="form-control" placeholder="Seller Name" value="" required="">
          </div>

          <div class="form-group">
            <label class="text-dark" for="post_title">Mobile NO</label>
            <input type="text" name="mobile" maxlength="10" minlength="10" class="form-control" placeholder="Mobile No" value="" required="">
          </div>
          <div class="form-group">
            <label class="text-dark" for="post_tags">Alternative Mobile No</label>
            <input type="text" maxlength="10" minlength="10" name="alt_mob" class="form-control" placeholder="Alternate Mobile No" value="" required="">
          </div>

          <div class="form-group">
            <label class="text-dark" for="post_tags">Upload Book Image</label>
            <input type="file" name="image" class="form-control"  value="" required="">
            <small id="emailHelp" class="text-light form-text text-muted"><b>Make sure to Upload (.jpj,.png,.jpeg) File Only </b></small>
          </div>
          <div class="form-group">
            <label class="text-dark"  for="post_tags">Hostel Address For Book Pick Up By Other Student</label>
            <input type="text" name="hostel_add" class="form-control" placeholder="Hostel Address" value="" required="">
          </div>

          <div class="form-group">
            <label class="text-dark" for="post_tags">Free Time(Book Pick Up Time) </label>
            <input type="text" name="free_time" class="form-control" placeholder="Free Time and Days" value="" required="">
          </div>


        <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark  " data-dismiss="modal">Close</button><button type="submit" name="login" class="btn btn-outline-dark mx-1" value="">Sell</button>
      </div>
     </form>
    </div>
  </div>
</div>
</div>';

    }
    
?>
