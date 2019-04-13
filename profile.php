<?php
	session_start();
	if (isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	else{
		header('location:homepage.php');
	}

	if(isset($_GET['username'])){
		$username = $_GET['username'];
	}
	else{
		$username = $_SESSION['username'];
	}

	$con=mysqli_connect("localhost", "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_array($result);

	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$email = $row['email'];
	$phone = $row['phone'];
	$pic = $row['pic'];


?>
<div style="margin-left:40px; margin-bottom: 20px">
	<div>
		<?php if($pic == '0'){
			echo "<form action='add_pic.php' method='POST' enctype='multipart/form-data'>".
			"<input type='file' name='file'>".
			"<input type='submit' value='upload image'>".
			"</form>";
		}
		else{
			?>
			<br>
			<h1 align="center" style="font-weight: bold; text-transform: uppercase; font-style: italic; font-size: 3.0rem;">PROFILE</h1>
			<hr>
			<br>
			<?php
			$pic_name = $username.".".$pic;
			echo "<img src='images/$pic_name' width=200 height=200><br><br>";
			echo "<form action='add_pic.php' method='POST' enctype='multipart/form-data'>".
			"<input type='file' name='file'>".
			"<input type='submit' value='upload image'>".
			"</form>"."<br><br>";
		} 

		?>


		Name : <?php echo "$fname $lname" ?> <br>
		email : <?php echo "$email" ?>		 <br>
		phone : <?php echo "$phone" ?>		 <br>
	</div>

	<?php

		$query = "SELECT * FROM marks WHERE username='$username'";
		$result = mysqli_query($con,$query);
		//$row_result = mysqli_fetch_array($result);

	?>

	<div>
		<br><br>
		Score :
		<br>
	</div>

	<?php
		echo "<table border=2>";
		echo "<tr>
				<th>quiz code</th>
				<th>marks </th>
			</tr>";
		while($rows = mysqli_fetch_array($result)){
			$quiz = $rows['qcode'];
			$marks = $rows['marks'];

			if($rows['eva_status'] == 1){
			echo "<tr> <th> $quiz </th>".
							   "<th> $marks </th>".	
				"</tr>";
			}
			else{
				echo "<tr> <th> $quiz </th>".
							   "<th> yet to be evaluated. </th>".	
				"</tr>";
			}
		}	
		echo "</table>";

	?>
</div>