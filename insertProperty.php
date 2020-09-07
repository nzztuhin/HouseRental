<?php
session_start();
$_SESSION['message']='';
 	
 	$servername = "localhost";
    $dbusername = "root";
   	$dbpassword = "";
    $dbname = "houserental";
 $mysqli = new mysqli($servername,$dbusername,$dbpassword,$dbname);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$pname=$mysqli->real_escape_string($_POST['pname']);
		$poname=$mysqli->real_escape_string($_POST['poname']);
		$potype=$mysqli->real_escape_string($_POST['potype']);
		$floor=$mysqli->real_escape_string($_POST['floor']);
		$area=$mysqli->real_escape_string($_POST['area']);
		$room=$mysqli->real_escape_string($_POST['room']);
		$location=$mysqli->real_escape_string($_POST['location']);
		$price=$mysqli->real_escape_string($_POST['price']);
		$location=$mysqli->real_escape_string($_POST['location']);
        $image = basename($_FILES["image"]["name"]);
       
		
		if (empty($pname)) {
			$_SESSION['message'] = "property Name can not be blank";
		}
		else  if (empty($poname)) {
			$_SESSION['message'] = "Property Owner Name can not be blank";
		}
		else  if (empty($potype)) {
			$_SESSION['message'] ="Select a user Type";
		}
		else  if (empty($floor)) {
			$_SESSION['message'] = "floor can not be blank";
		}
		else  if (empty($area)) {
			$_SESSION['message'] = "Area can not be blank";
		}
		else  if (empty($location)) {
			$_SESSION['message'] = "Location can not be blank";
		}
		else  if (empty($price)) {
			$_SESSION['message'] = "Price can not be blank";
		}

 		$target_dir = "uploads/";
	    $target_file = $target_dir . basename($_FILES["image"]["name"]);
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    	$_SESSION['message'] = "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";

    	$sql="INSERT into property_table (Property_name, PropertyOwnerName, Property_Type, Floor, Area, Rooms, Location, Price, photo)
			VALUES ('$pname','$poname', '$potype', '$floor', '$area', '$room', '$location', '$price','$image')";
		

		if($mysqli->query($sql)== true) {
			$_SESSION['message'] = "Registration successful! added to the database";

		}
	
		else {
			$_SESSION['message'] = "You are not allowed to access this page.";
			}

  		} else {
    	echo "Sorry, there was an error uploading your file.";
  		}	
			
	}
	
	
	header("Location:propertyRegForm.php");

?>