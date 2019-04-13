<?php
	session_start();
	if (isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	else{
		header('location:homepage.php');
	}

	$quiz_code = $_GET['quiz_code'];

	$con=mysqli_connect("localhost", "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT * FROM marks WHERE qcode='$quiz_code' ORDER BY marks DESC";
	$result = mysqli_query($con,$query);
?>
	<!-- echo "<table border=2>";
	echo "<tr>
			<th>username</th>
			<th>marks </th>
		</tr>"; -->


<!DOCTYPE html>
<html>
<head>
	<title>Display Leaderboard</title>
	<link rel="stylesheet" type="text/css" href="lb_display.css">
</head>
<body>
	<table border="8">
		<tr>
			<th>USERNAME (CLICK ON NAME FOR PROFILE)</th>
			<th>MARKS</th>
		</tr>


		<?php
		while($rows = mysqli_fetch_array($result)){
			$username = $rows['username'];
			$marks = $rows['marks'];

			if($rows['eva_status'] == 1){
			?>

			<tr><?php echo "<tr> <th>  <form method='GET' action='profile.php'>".
									"<input type='submit' value='$username' name='quiz_code'>".
							   "</form>"."</th>".
							   "<th> $marks </th>".	
				"</tr>"; ?></tr>
			
			<?php
			}
			else{
			?>
				<tr><?php echo "<tr> <th>  <form method='GET' action='profile.php'>".
									"<input type='submit' value='$username' name='quiz_code'>".
							   "</form>"."</th>".
							   "<th> yet to be evaluated. </th>".	
				"</tr>"; ?></tr>
				
				<?php
			}
		}	
		

?>







	</table>
</body>
</html>












<?php
	while($rows = mysqli_fetch_array($result)){
		$username = $rows['username'];
		$marks = $rows['marks'];

		if($rows['eva_status'] == 1){
		echo "<tr> <th>  <form method='GET' action='profile.php'>".
								"<input type='submit' value='$username' name='quiz_code'>".
						   "</form>"."</th>".
						   "<th> $marks </th>".	
			"</tr>";
		}
		else{
			echo "<tr> <th>  <form method='GET' action='profile.php'>".
								"<input type='submit' value='$username' name='quiz_code'>".
						   "</form>"."</th>".
						   "<th> yet to be evaluated. </th>".	
			"</tr>";
		}
	}	
	echo "</table>";

?>