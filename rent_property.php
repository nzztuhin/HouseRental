<?php
  session_start();

if(isset($_SESSION['user'])) {
    //header("location:rent_property.php");
 
}else{
   echo '<meta http-equiv="refresh" content="0; url=loginform.php" />';
}
   $id=$_GET['id'];
  include 'db_con.php';
 
  $selectque="SELECT * FROM `property_table` WHERE  PropertyID=$id";
  $query=mysqli_query($mysqli,$selectque);

  $result = mysqli_fetch_assoc($query);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $rtname=$mysqli->real_escape_string($_POST['rtname']);
    $pname=$mysqli->real_escape_string($_POST['pname']);
    $poname=$mysqli->real_escape_string($_POST['poname']);
    $potype=$mysqli->real_escape_string($_POST['potype']);
    $area=$mysqli->real_escape_string($_POST['area']);
    $location=$mysqli->real_escape_string($_POST['location']);
    $price=$mysqli->real_escape_string($_POST['price']);
    $from_date=$mysqli->real_escape_string($_POST['from_date']);
    $to_date=$mysqli->real_escape_string($_POST['to_date']);

      if (empty($from_date)) {
      $_SESSION['message'] = "Select a date when You want to shift";
    }
    else  if (empty($to_date)) {
      $_SESSION['message'] = "Select a date when You want to leave";
    }
    else{
      include 'db_con.php';
    $sql="INSERT into rental_table (Rant_taker,property_name, PropertyOwner, Property_Type, Area, Location, Price, From_date,To_date) VALUES ('$rtname','$pname','$poname', '$potype', '$area', '$location', '$price','$from_date','$to_date')";
    

    if($mysqli->query($sql)== true) {
      $_SESSION['message'] = "Request has been send";

    }
  
    else {
      $_SESSION['message'] = "You are not allowed to access this page.";
      }

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
  $(function(){
    $("#fromdate").datepicker({
      numberOfMonths:1,
      dateFormet:'DD,d MM,yy',
      onSelect:function(selectdate){
        dt=new Date(selectdate);
        dt.setDate(dt.getDate()+1)
        $("#todate").datepicker("option","minDate",dt);
        }
    });

    $("#todate").datepicker({
      numberOfMonths:1,
      dateFormet:'DD,d MM,yy',
      onSelect:function(selectdate){
        dt=new Date(selectdate);
        dt.setDate(dt.getDate()-1)
        $("#fromdate").datepicker("option","maxDate",dt);
        }
    });
  });
</script>
    <title>Request for rent</title>
  </head>
  <body>
    <section class="Form my-4 mx-5">
      <div class="contrainer">
        <div class="row">
          <div class="col-lg-5">
            <img src="uploads/<?php echo $result['photo']; ?>"class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 px-5 pt-5">
            <h4>Request for rent</h4>
            <form action="" method="POST">
              <div class="form-row">
                <div class="col-lg-7">
              <?php  if(isset($_SESSION['message'])) 
                {echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';}
                ?>
               </div>
              </div>

              <div class="form-row">
                <div class="col-lg-7">Rent taker
                  <input type="text" value="<?php echo $_SESSION['user'];?>" placeholder="Rent taker Name" name="rtname" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">property name
                  <input type="text" placeholder="Property Name" name="pname" value="<?php echo $result['Property_name']; ?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">property Owner
                  <input type="text"  placeholder="Property Owner Name" name="poname" value="<?php echo $result['PropertyOwnerName'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7 " >property type
                  <input type="text" name="potype" value="<?php echo $result['Property_Type'];?>" class="form-control my-2 p-3" readonly>
                      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">Floor
                  <input type="text" placeholder="Floor" name="floor" value="<?php echo $result['Floor'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">Area
                  <input type="text" placeholder="Area" name="area" value="<?php echo $result['Area'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">Rooms
                  <input type="text" placeholder="Rooms" name="room" value="<?php echo $result['Rooms'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">Location
                  <input type="text" placeholder="Location" name="location" value="<?php echo $result['Location'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">Price
                  <input type="text" placeholder="Price" name="price" value="<?php echo $result['Price'];?>" class="form-control my-2 p-3" readonly>      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">From
                  <input type="date" id="fromdate" name="from_date"  class="form-control my-2 p-3" >      
                </div>
              </div>
              <div class="form-row">
                <div class="col-lg-7">To
                  <input type="date" id="todate" name="to_date" class="form-control my-2 p-3" >      
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-lg-7">
                  <button type="submit" class="btn1" >
                    Request
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
