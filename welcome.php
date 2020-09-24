<?php include'admin_nav.php'
?>
<?php 
session_start();

if(isset($_SESSION['user'])) {
		echo "welcome " . $_SESSION['user'];
	echo '<a href="logout.php?logout">Logout</a>';
	
}else{
	 echo '<meta http-equiv="refresh" content="0; url=loginform.php" />';
}
 ?>