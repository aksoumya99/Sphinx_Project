
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

	$name = $_GET['name'];
	$date = $_GET['date'];
	$type = $_GET['type'];
	$about = $_GET['about'];
	$duration=$_GET['duration'];

	if($name=="" || $duration=="" || $date=="" || $type=="" || $about==""){

	}

	$con = mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($con,"sphinx");

	$search_dupli = "SELECT * FROM quizes WHERE name='$name'";
	$result = mysqli_query($con,$search_dupli);
	$num = mysqli_num_rows($result);

	if($num == 0){
		$query = "INSERT INTO quizes (name,date,duration,type,about) VALUES ('$name','$date','$duration','$type','$about')";
		// $create_query = "CREATE TABLE $name (Q_no int(3) primary key not null AUTO_INCREMENT,
		// 				 Question text,marks int(2),type varchar(50),answer varchar(200),options 
		// 				 varchar(200))";
		
		if(mysqli_query($con,$query)){ 
	?>
		

			<div>
				quiz successfully registered !!!<br>
				<a href="addquesquiz.php">click</a> to add questions to your quiz.
			</div>


	<?php 
		}
		else{ 
	?>


			<div>
				quiz could not be registered.<br>
				<a href="newquiz.php">try again</a>
			</div>


	<?php	
		}
	}
	else{
	?>

			<div>
				Quiz name already Exists.<br>
				<a href="newquiz.php">try again</a>
			</div>

	<?php
	}
	?>

