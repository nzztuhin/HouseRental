<?php
  
  include 'db_con.php';
  $id=$_GET['id'];
  $deleteque="delete from reg_table where Id=$id";
  $query=mysqli_query($mysqli,$deleteque);
  
 	echo '<meta http-equiv="refresh" content="0; url=userinfo.php" />';
?>