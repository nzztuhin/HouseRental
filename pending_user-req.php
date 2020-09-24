<?php
  
  include 'db_con.php';
  $id=$_GET['id'];
  $reqque="update reg_table set active_status=1 where Id=$id";
  $query=mysqli_query($mysqli,$reqque);
  
 	echo '<meta http-equiv="refresh" content="0; url=pending_user.php" />';
?>