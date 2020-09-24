<?php
  include 'db_con.php';
  $id=$_GET['id'];
  $accque="update rental_table set status='rejected' where r_id=$id";
  $query=mysqli_query($mysqli,$accque);
  
 	echo '<meta http-equiv="refresh" content="0; url=pending_property_req.php" />';
?>