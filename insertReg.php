<?php
session_start();
$_SESSION['message']='';
 	
 	$servername = "localhost";
    $dbusername = "root";
   	$dbpassword = "";
    $dbname = "houserental";
 $mysqli = new mysqli($servername,$dbusername,$dbpassword,$dbname);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$fname=$mysqli->real_escape_string($_POST['fname']);
		$lname=$mysqli->real_escape_string($_POST['lname']);
		$username=$mysqli->real_escape_string($_POST['username']);
		$password=md5($_POST['password']);
		$select=$mysqli->real_escape_string($_POST['select']);
		$email=$mysqli->real_escape_string($_POST['email']);
		$mobile=$mysqli->real_escape_string($_POST['mobile']);

		if (empty($fname)) {
			$_SESSION['message'] = "First Name can not be blank";
		}
		else  if (empty($lname)) {
			$_SESSION['message'] = "Last Name can not be blank";
		}
		else  if ($password <= '6') {
			$_SESSION['message'] = "Your Password Must Contain At Least 6 Characters";
		}
		else  if (empty($select)) {
			$_SESSION['message'] ="Select a user Type";
		}
		else  if (empty($email)) {
			$_SESSION['message'] = "email can not be blank";
		}
		else  if (empty($email)) {
			$_SESSION['message'] = "email can not be blank";
		}
		else  if (empty($mobile)) {
			$_SESSION['message'] = "Mobile number can not be blank";
		}

		else if($_POST['password']==$_POST['cpassword']){
			$que="select * from reg_table ";
		$result=mysqli_query($mysqli,$que);
		if(( mysqli_num_rows ( $result ) <=0 ))
		{	

		$sql="INSERT INTO reg_table (First_name,Last_name,Username,Password,userType,Email,Mobile_number) "
		. "VALUES ('$fname','$lname','$username','$password','$select','$email','$mobile') ";

		if($mysqli->query($sql)== true) {
			$_SESSION['message'] = "Registration successful! added $username to the database";

		}
	}
		else {
			$_SESSION['message'] = "User Name is already register";
			}
			
	}
	else {
		$_SESSION['message'] = "Two Password do not match";
		}
	}
	
	header("Location:registrationform.php");

?>