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

	$quiz_code = $_SESSION['quiz_code'];

	$result = mysqli_query($con,"SELECT MAX(Q_no) AS last_ques FROM questions WHERE qcode='$quiz_code'");
	$row = mysqli_fetch_array($result);
	$_SESSION['last_ques'] = $row['last_ques'];
	

	
	$question = $_GET['ques'];

	$type = $_GET['type'];

	$option1 = $_GET['option1'];
	$option2 = $_GET['option2'];
	$option3 = $_GET['option3'];
	$option4 = $_GET['option4'];

	$op_array = array($option1,$option2,$option3,$option4);

	$mcq_ans = $_GET['ans'];

	$ch1 = $_GET['ch1'];
	$ch2 = $_GET['ch2'];
	$ch3 = $_GET['ch3'];
	$ch4 = $_GET['ch4'];

	$ans_array = array($ch1,$ch2,$ch3,$ch4);

	$marks = $_GET['marks'];

	echo "$mcq_ans $ch1 $ch2 $ch3 $ch4";

	if($type == "mcq"){
		$ser_options = serialize($op_array);
		$Q_no = $_SESSION['last_ques']+1;
		$query_mcq = "INSERT INTO questions (qcode,Q_no,Question,marks,type,answer,options) VALUES('$quiz_code','$Q_no','$question','$marks','$type','$mcq_ans','$ser_options')";

		if(mysqli_query($con,$query_mcq)){
			++$_SESSION['last_ques'];
			header('location:questions.php');
		}
		else{
			echo "question could not be registered !!!<br> <a href='questions.php'>try again</a>";
		}
	}

	if($type == "multi_c_q"){
		$ser_options = serialize($op_array);
		$ser_ans = serialize($ans_array);
		$Q_no = $_SESSION['last_ques']+1;

		$query_multi_c_q = "INSERT INTO questions (qcode,Q_no,Question,marks,type,answer,options) VALUES('$quiz_code','$Q_no','$question','$marks','$type','$ser_ans','$ser_options')";

		if(mysqli_query($con,$query_multi_c_q)){
			++$_SESSION['last_ques'];
			header('location:questions.php');
		}
		else{
			echo "question could not be registered !!!<br> <a href='questions.php'>try again</a>";
		}
	}

	if($type == "subjective"){
		$Q_no = $_SESSION['last_ques']+1;
		$query_sub = "INSERT INTO questions (qcode,Q_no,Question,marks,type) VALUES('$quiz_code','$Q_no','$question','$marks','$type')";

		if(mysqli_query($con,$query_sub)){
			++$_SESSION['last_ques'];
			header('location:questions.php');
		}
		else{
			echo "question could not be registered !!!<br> <a href='questions.php'>try again</a>";
		}
	}


?> 



