<?php include'po_nav.php'
?>
<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add property form</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="contrainer">
        <div class="row">
          <div class="col-lg-5">
            <img src="property.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h4>Add Your Property</h4>
            <form action="insertProperty.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-lg-7">
              <?php  if(isset($_SESSION['message'])) 
                {echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                //session_unset($_SESSION['message']);
              }
                       ?>

                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Property Name" name="pname" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" value="<?php echo $_SESSION['user'];?>" placeholder="Property Owner Name" name="poname" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7 " >
                  <select name="potype" class="form-control">
                  <option value="House">House</option>
                  <option value="Shop">Shop</option>
                  <option value="Office">Office</option>
                  </select>    
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Floor" name="floor" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Area" name="area" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Rooms" name="room" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Location" name="location" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Price" name="price" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="file" name="image" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" class="btn1">
                    Submit
                  </button>     
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
      
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>