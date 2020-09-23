<?php 

$mysqli = new mysqli('localhost','root',"",'houserental');
session_start();
if (isset($_POST['submit'])) {

	if(empty($_POST['uname']) || empty($_POST['pass'])){
		echo "<script>alert('uname or pass incorrect!')</script>";
		echo "<script>location.href='login.php'</script>";
      	}

else{
		$que="select * from reg_table where active_status='1' and Username='".$_POST['uname']."' and password='".md5($_POST['pass'])."'";
		$result=mysqli_query($mysqli,$que);
		if(( mysqli_num_rows ( $result ) == 1 ))
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($row["userType"] == '1'){

			$_SESSION['user']=$_POST['uname'];
			$_SESSION['user_id']=$_POST['Id'];
			
			header("Location:welcome.php");}

			
			elseif ($row["userType"] == '2') {
			$_SESSION['user']=$_POST['uname'];
			$_SESSION['user_id']=$_POST['Id'];
			
			header("Location:welcome_po.php");
			}
			elseif($row["userType"] == '3'){
			$_SESSION['user']=$_POST['uname'];
			$_SESSION['user_id']=$_POST['Id'];
			
			header("Location:welcome_rt.php");
			}
		 	}
			
		}
	}
}
	else{
		echo "<script>alert('username or password incorrect!')</script>";
		echo "<script>location.href='login.php'</script>";

	}


 ?>