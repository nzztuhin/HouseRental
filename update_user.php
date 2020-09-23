<?php
  
  include 'db_con.php';
  $id=$_GET['id'];
  $selectque="select * from reg_table where Id=$id";
  $query=mysqli_query($mysqli,$selectque);

  $result = mysqli_fetch_assoc($query);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fname=$mysqli->real_escape_string($_POST['fname']);
    $lname=$mysqli->real_escape_string($_POST['lname']);
    $username=$mysqli->real_escape_string($_POST['username']);
    $password=md5($_POST['password']);
    $select=$mysqli->real_escape_string($_POST['select']);
    $email=$mysqli->real_escape_string($_POST['email']);
    $mobile=$mysqli->real_escape_string($_POST['mobile']);

    if (empty($fname)) {
      $_SESSION['message'] = "First Name can not be blank";
    }
    else  if (empty($lname)) {
      $_SESSION['message'] = "Last Name can not be blank";
    }
    else  if ($password <= '6') {
      $_SESSION['message'] = "Your Password Must Contain At Least 6 Characters";
    }
    else  if (empty($select)) {
      $_SESSION['message'] ="Select a user Type";
    }
    else  if (empty($email)) {
      $_SESSION['message'] = "email can not be blank";
    }
    else  if (empty($email)) {
      $_SESSION['message'] = "email can not be blank";
    }
    else  if (empty($mobile)) {
      $_SESSION['message'] = "Mobile number can not be blank";
    }

    else if($_POST['password']==$_POST['cpassword']){
      $que="select * from reg_table ";
    $result=mysqli_query($mysqli,$que);
    if(( mysqli_num_rows ( $result ) <=0 ))
    { 
     $id=$_Get['id']; 
    $sql="update reg_table set Id=$id, First_name='$fname,,Last_name='$lname',Username='$username',Password='$password',userType='$select',Email='$email',Mobile_number='$mobile' where Id=$id ) "
    ;

    if($mysqli->query($sql)== true) {
      $_SESSION['message'] = "Update successful!";

    }
  }
    else {
      $_SESSION['message'] = "User Name is already register";
      }
      
  }
  else {
    $_SESSION['message'] = "Two Password do not match";
    }
  }
  
  

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

    <title>Update user</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="contrainer">
        <div class="row">
          <div class="col-lg-5">
            <img src="user_reg.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h4>Update User Info</h4>
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-7">
              <?php  if(isset($_SESSION['message'])) 
                {echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';}
                ?>
               </div>
              </div>

              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="First Name" name="fname" value="<?php echo $result['First_name']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Last Name" name="lname" value="<?php echo $result['Last_name']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="User Name" name="username" value="<?php echo $result['Username']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="******" name="password" value="<?php echo $result['Password']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="password" placeholder="******" name="cpassword" value="<?php echo $result['Password']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7 " >
                  <select name="select"  class="form-control">
                  <option value="2">Property Owner</option>
                  <option value="3">Rent Taker</option>
                  </select>    
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Email" name="email" value="<?php echo $result['Email']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <input type="text" placeholder="Mobile Number" name="mobile" value="<?php echo $result['Mobile_number']; ?>" class="form-control my-2 p-3">      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" name="Submit" class="btn1">
                    Update
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
