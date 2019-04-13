<?php
	session_start();
	if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
	include 'login.php';

	$username = $_GET['username'];
	$password = $_GET['password'];

	$var=mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($var,"sphinx");

	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($var,$query);
	$_SESSION['userinfo'] = $result;
	$con = mysqli_num_rows($result);

	if($con == 0){
		echo "Wrong username or password !!!";
	}
	else{
		$_SESSION['username'] = $username;
		header('location:homepage.php');
	}

?>