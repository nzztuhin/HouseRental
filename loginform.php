<?php include'home_nav.php'
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

    <title>login form</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="contrainer">
        <div class="row">
          <div class="col-lg-5">
            <img src="rent_house.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h4>Sign into your account</h4>
            <form action="loginprocess.php" method="post">
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="User Name" name="uname" class="form-control my-3 p-4">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="******" name="pass" class="form-control my-3 p-4">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" name="submit" class="btn1">
                    Login
                  </button>     
                </div>
              </div>
              <a href="#">Forgot password</a>
              <p>Don't have an account? <a href="registrationform.php">Register here</a> </p>
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
<?php include'footer.php'?>