<?php include'admin_nav.php'
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

    <title>userinfo</title>
  </head>
  <body>
    <div class="main-div">
      <br><br>
      <h1 class="text-center">List of users</h1>
      <br>
      <input type="text" name="" id="myInput" placeholder="Search User" onkeyup="searchFun()" class="form-control my-2 p-3"><br>
      <div class="center-div">
        <table id="myTable" class="table table-striped table-hover tale-bordered">
          <thead class="bg-dark text-white text-center">
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>User Type</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Update</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
            include 'db_con.php';
            $selectque="SELECT a.`Id`,a.`First_name`,a.`Last_name`,a.`Username`,a.`Password`,a.`Email`,a.`Mobile_number`,a.`active_status`,b.name as userType FROM `reg_table` a,user_types b where a.`userType`=b.id";
            $query=mysqli_query($mysqli,$selectque);
            while($result=mysqli_fetch_array($query)){

            ?>
            <tr class="text-center">
              <td><?php echo $result['Id']; ?> </td>
              <td><?php echo $result['First_name']; ?></td>
              <td><?php echo $result['Last_name']; ?></td>
              <td><?php echo $result['Username']; ?></td>
              <td><?php echo $result['userType'];?> </td>
              <td><?php echo $result['Email'];?> </td>
              <td><?php echo $result['Mobile_number'];?> </td>
              <td><button class="btn-primary btn"><a href="update_user.php?id=<?php echo $result['Id'];?>" class="text-white">Update</a></button></td>
              <td><button onclick='return confirm("Delete user!?");' class="btn-danger btn"  ><a href="delete_user.php?id=<?php echo $result['Id'];?>"  class="text-white"  >Delete</a></button></td>        
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
</html>
        <script>
          function searchFun(){
            let filter = document.getElementById('myInput').value.toUpperCase();
            let myTable = document.getElementById('myTable');
            let tr = myTable.getElementsByTagName('tr');
            for(var i=0; i<tr.length; i++){
              let td=tr[i].getElementsByTagName('td')[3];
              if(td){
                let textvalue = td.textContent || td.innerHTML;
                if(textvalue.toUpperCase().indexOf(filter) > -1){
                  tr[i].style.display="";
                }else{tr[i].style.display="none";}
              }
            }

          }
        </script>
        <?php include'footer.php'?>