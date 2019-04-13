
<?php
	session_start();

	if (isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	else{
		header('location:homepage.php');
	}

?> 
<br>
<br>
<br>
<h1 align="center">QUIZZES</h1>
<hr>

<br><br>
<h3 style="padding-left: 80px; font-weight: bold;">SELECT QUIZ TO ADD QUESTIONS:</h3>
<br>

<?php
	
	$con = mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT * FROM quizes";
	$result = mysqli_query($con,$query);

	echo "<div id='quizzes1' style='margin-left: 80px;'><ul>";
	while($rows = mysqli_fetch_array($result)){
		echo "<li> $rows[0] <form display='inline' method='GET' action='questions.php'>".
								"<input type='hidden' value='$rows[1]' name='quiz_code'>".
								"<input type='submit' value='Select Quiz'>".
						   "</form>".
		"</li><br>";
	}
		echo "</ul></div><br>";

?>

<br><br>
<a href="newquiz.php">Add a new quiz</a> 
<br>

