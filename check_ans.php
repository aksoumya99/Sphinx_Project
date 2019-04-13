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

	if($_SESSION['enter_check'] == "false"){
		$username = $_GET['username'];
		$quiz_code = $_GET['quiz_code'];
		$_SESSION['temp_username'] = $username;
		$_SESSION['temp_qcode'] = $quiz_code;
		$_SESSION['enter_check'] = "true";
	}

	$username = $_SESSION['temp_username'];
	$quiz_code = $_SESSION['temp_qcode'];

	

	$query = "SELECT * FROM sub_ans WHERE qcode='$quiz_code' AND username='$username' AND eva_status='false'";
	$result = mysqli_query($con,$query);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

	if($count == 0){
		$query = "UPDATE marks SET eva_status='1' WHERE username='$username' AND qcode='$quiz_code'";
		mysqli_query($con,$query);
		?>
		<br>
		<br>
		<h4 align="center" style="font-weight: bold; font-size: 3.0rem;">ALL QUESTIONS CHECKED !!!</h4>
		<h4 align="center" style="font-weight: bold; font-size: 2.0rem;"><?php echo "<a href='check_sub.php'>RETURN</a>"; ?></h4>
		
		<?php
	}
	else{
		$Q_no = $row['Q_no'];

		$_SESSION['Q_no'] = $Q_no;

		$Q_query = "SELECT Question,marks FROM questions WHERE qcode='$quiz_code' AND Q_no='$Q_no'";
		$result = mysqli_query($con,$Q_query);
		$Q_row = mysqli_fetch_array($result);
		$ques = $Q_row['Question'];
		$ans = $row['answer'];
		$max_marks = $Q_row['marks'];
		?>
		<h2 style="padding-top: 20px; padding-left: 40px; font-weight: bold;"><?php echo "Question : $ques ( MAXIMUM MARKS: $max_marks)"; ?></h2>
		<h2 style="padding-top: 20px; padding-left: 40px; font-weight: bold;"><?php echo "Answer : $ans"; ?></h2>
		<?php
		
?>

<form method="GET" action="up_marks.php" style="margin-left: 40px;">
	<br>
	<h2 style="font-weight: bold;">Enter Marks: </h2> <br>
	<input type="number" name="marks" required>
	<input type="submit" name="submit">
</form>
<br>
<h6 align="center">*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*</h6>
<?php
	}
?>