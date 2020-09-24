<?php include'rt_nav.php'
?>
<?php session_start();

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

    <title>pending userinfo</title>
  </head>
  <body>
    <div class="main-div">
      <br><br>
      <h1 class="text-center">List of pending property request</h1>
      <br>
      <div class="center-div">
        <table id="myTable" class="table table-striped table-hover tale-bordered">
          <thead class="bg-dark text-white text-center">
            <th>id</th>
            <th>PropertyOwner</th>
            <th>property_name</th>
            <th>Property_Type</th>
            <th>Area</th>
            <th>Location</th>
            <th>Price</th>
            <th>From_date</th>
            <th>To_date</th>
            <th>Status</th>
          </thead>
          <tbody>
            <?php
            include 'db_con.php';

            $selectque="SELECT * FROM `rental_table` WHERE `Rant_taker`='".$_SESSION['user']."'  ";
            $query=mysqli_query($mysqli,$selectque);
            while($result=mysqli_fetch_array($query)){

            ?>
            <tr class="text-center">
              <td><?php echo $result['r_id']; ?> </td>
              <td><?php echo $result['PropertyOwner']; ?></td>
              <td><?php echo $result['property_name']; ?></td>
              <td><?php echo $result['Property_Type']; ?></td>
              <td><?php echo $result['Area'];?> </td>
              <td><?php echo $result['Location'];?> </td>
              <td><?php echo $result['Price'];?> </td>
              <td><?php echo $result['From_date'];?> </td>
              <td><?php echo $result['To_date'];?> </td>
              <td><?php echo $result['status'];?> </td>
                      
            </tr>
           
            <?php
          }
          ?>
          </tbody>
        </table>

        
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
<?php include'footer.php'?>