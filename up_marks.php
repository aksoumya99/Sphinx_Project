<?php
	session_start();
	if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
	if (isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	else{
		header('location:homepage.php');
	}

	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"sphinx");

	$username = $_SESSION['temp_username'];
	$quiz_code = $_SESSION['temp_qcode'];
	$Q_no = $_SESSION['Q_no'];
	$marks = $_GET['marks'];

	$query = "UPDATE marks SET marks=marks+$marks WHERE username='$username' AND qcode='$quiz_code'";
	$query1 = "UPDATE sub_ans SET eva_status='1' WHERE Q_no='$Q_no' AND qcode='$quiz_code' AND username='$username'";

	echo "$username $quiz_code $Q_no $marks";

	mysqli_query($con,$query);
	mysqli_query($con,$query1);

	header('location:check_ans.php');

?>