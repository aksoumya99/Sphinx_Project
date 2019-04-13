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
	<h1 align="center" style="border: 2px solid black; border-radius: 20%; font-weight: bold; font-style: italic; padding-top: 20px; padding-bottom: 20px; ">LEADERBOARD</h1>
	
	<br>
	<br>
	<h2 style="font-weight: bold; font-style: italic; margin-left: 90px;">ENTER THE QUIZ TO VIEW ITS LEADERBOARD:</h2>
	<h2 style="font-weight: bold; font-style: italic; margin-left: 90px;">--------------------------------------></h2>
	<?php
	$con=mysqli_connect("localhost", "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT name,qcode FROM quizes";
	$result = mysqli_query($con,$query);

	echo "<div id='quizzes1' style='margin-left: 600px;'><ul>";
	while($rows = mysqli_fetch_array($result)){
		echo "<li> $rows[0] <form method='GET' action='lb_display.php'>".
								"<input type='hidden' value='$rows[1]' name='quiz_code'>".
								"<input type='submit' value='Enter Quiz'>".
						   "</form>".
		"</li><br>";
	}	
	echo "</ul></div>";
?>