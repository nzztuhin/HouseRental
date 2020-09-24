 <?php include'rt_nav.php'
?>
<?php
session_start();

if(isset($_SESSION['user'])) {
		echo "welcome " . $_SESSION['user'];
	
}else{
	 echo '<meta http-equiv="refresh" content="0; url=loginform.php" />';
}


 ?>
 <?php include'footer.php'?>