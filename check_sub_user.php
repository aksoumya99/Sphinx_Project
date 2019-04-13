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

	$quiz_code = $_GET['quiz_code'];
	$query = "SELECT * FROM marks WHERE qcode='$quiz_code' AND eva_status='false'";
	$result = mysqli_query($con,$query);

	$_SESSION['enter_check'] = "false";

	while($rows = mysqli_fetch_array($result)){
		$username = $rows['username'];

		echo "<li> $username <form method='GET' action='check_ans.php'>".
								"<input type='hidden' value='$username' name='username'>".
								"<input type='hidden' value='$quiz_code' name='quiz_code'>".
								"<input type='submit' value='evaluate Quiz'>".
						   "</form>".
		"</li>";
	}	
	echo "</ul>";
	

?>