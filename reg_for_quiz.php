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

	$con = mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($con,"sphinx");

	$username = $_SESSION['username'];
	$quiz_code = $_SESSION['quiz_code'];

	$query1 = "SELECT * FROM marks WHERE username='$username' AND qcode='$quiz_code'";
	$result = mysqli_query($con,$query1);
	if(mysqli_num_rows($result) == 0){
		$query = "INSERT INTO marks (username,qcode,marks,eva_status) VALUES ('$username','$quiz_code','0','false')";
		if(true){
			mysqli_query($con,$query);
			$query_ques = "SELECT * FROM questions WHERE qcode='$quiz_code'";
			$result = mysqli_query($con,$query_ques);
			$num_of_ques = mysqli_num_rows($result);

			$num_array = array('1');
			for ($i=2; $i <= $num_of_ques; $i++) { 
				array_push($num_array,$i);
			}
			shuffle($num_array);
			$_SESSION['ques_seq'] = $num_array;
			$_SESSION['quiz_status'] = "off";
			$_SESSION['num_of_ques'] = $num_of_ques;
			$_SESSION['curr_q_index'] = 0;


			header('location:thequiz.php');
		}
	}

	else{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Already Registered!</title>
		</head>
		<body style="background-color: #fffef3;">
			<br><br><br><br><br>
			<p style="font-size: 3.0rem; 
						font-weight: bold; text-align: center; "><?php
			die("YOU HAVE ALREADY ATTEMPTED THE QUIZ !!!");
			?>
			</p>
		</body>
		</html>
		<?php
	}
?>
