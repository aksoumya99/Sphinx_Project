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
?>

	 <br>
	 <br>
	 
	 
	 <h1 align="center">QUIZZES</h1>
	<hr>
<?php
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT DISTINCT qcode FROM marks WHERE eva_status='0'";
	$result = mysqli_query($con,$query);
	$num = mysqli_num_rows($result);
	?>
		<br>
		<br>
		
		
	<?php
	if($num > 0){
	?>
	<h4 style="padding-left: 90px; font-weight: bold;">ENTER THE QUIZ TO BE EVALUATED:</h4>
	<br>
	<br>
	<?php
	echo "<div id='quizzes1' style='margin-left: 90px;'><ul>";
	while($rows = mysqli_fetch_array($result)){
		$quiz_code = $rows['qcode'];
		$query = "SELECT name FROM quizes WHERE qcode='$quiz_code'";
		$qname_result = mysqli_query($con,$query);
		$qname_row = mysqli_fetch_array($qname_result);
		$quiz_name = $qname_row['name'];

		echo "<li> $quiz_name <form method='GET' action='check_sub_user.php'>".
								"<input type='hidden' value='$quiz_code' name='quiz_code'>".
								"<input type='submit' value='Evaluate Quiz'>".
						   "</form>".
		"</li><br>";
	}	
	echo "</ul>";
	}
	else{
		?>
		<br>
		<br>
		<h2 style="text-align: center; font-weight: bold; font-style: italic;"><?php echo "NO QUIZZES LEFT TO BE EVALUATED"; ?></h2>
		<br>
		<h2 style="text-align: center; font-weight: bold; font-style: italic; color:black;"><?php echo "<a href='homepage.php'>RETURN TO HOMEPAGE</a>"; ?></h2>
		<?php
	}
?>