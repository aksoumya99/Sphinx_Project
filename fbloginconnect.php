<?php
	session_start();
	if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
	$name=$_GET['name'];
	$arr=explode(" ",$name);
	$fname=$arr[0];
	$lname=$arr[1];
	$email=$_GET['email'];
	$var=mysqli_connect("localhost","root","");
	mysqli_select_db($var,"sphinx");
	$query="SELECT * FROM users WHERE email='$email'";
	$result=mysqli_query($var,$query);
	$con=mysqli_num_rows($result);
	if($con==0)
	{
		echo "User not Registered";
	}
	else
	{
		//$query2="SELECT username FROM users WHERE email='$email'";
		$result=mysqli_query($var,$query);
		$row = mysqli_fetch_assoc($result);
		$value=$row["username"];
		$_SESSION['username']=$value;
      	header('location:homepage.php');
	}

?>