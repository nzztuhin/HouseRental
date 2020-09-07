<?php 

session_start();


if (isset($_SESSION['user'])) {
		echo "welcome " . $_SESSION['user'];
	echo '<a href="logout.php?logout">Logout</a>';
	echo '<a href="propertyRegForm.php?">Add Property</a>';
}else{
	 echo '<meta http-equiv="refresh" content="0; url=loginform.php" />';
}


 ?>