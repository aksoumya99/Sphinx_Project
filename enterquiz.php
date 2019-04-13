<?php
	session_start();
	if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
	if(isset($_SESSION['username'])){
		include 'loggedin.php';
	}

	else{
		include 'loggedout.php';
		?>
		<br><br><br><br><br>
		<h1 style="text-align: center; font-weight: bold; font-size: 30px; font-family: Arial, Helvetica, sans-serif;"><?php die("YOU NEED TO BE LOGGED IN!"); ?></h1>
		<?php
		die("you need to be logged in");
	}


	$quiz_code = $_GET['quiz_code'];
	$_SESSION['quiz_code'] = $quiz_code;

	$con=mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT * FROM quizes WHERE qcode='$quiz_code'";
	$result = mysqli_query($con,$query);

	$row = mysqli_fetch_array($result);
	$_SESSION['quiz_name'] = $row[0];
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="enterquiz.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Enter Quiz</title>
</head>
<body>


	<div class="jumbotron jumbotron-fluid">
		<h2 class="display-4"><?php echo "$row[0]"; ?></h2>
	</div>
	
		
		<p id="P1">THE QUIZ IS SCHEDULED ON: <span id="r1"><?php echo " $row[2]"; ?></span></p>
	<p id="P1">DURATION : <span id="r1"><?php echo " $row[3]"; ?></span></p>
    <p id="P1">TYPE : <span id="r1"><?php echo " $row[4]"; ?></span></p>
    
	<div >
    	<p id="P2" >ABOUT <br> 
    			
    			<div class="row">
					  <div class="column">
					    <div class="card">
					     
					     
					      <p id="p1"><?php echo " $row[5]"; ?></p>
					    </div>
					  </div>
    		
    	</p>
  	</div>
	
   
      

  	<h1 id="bt">
      <form method="GET" action="reg_for_quiz.php">
		 <a href="commentindex.php" class="btn btn-info btn-lg" role="button" id="n1">Discussion Forum</a>
		<input type="hidden" name="quiz_code" value="<?php echo "$row[1]"; ?>"> 
		<!-- <button type="hidden" name="quiz_code" value="<?php echo "$row[1]"; ?>"></button> -->
		<!-- <input type="submit" value="Register for Quiz"> -->
		<button type="submit" value="Register for Quiz" class="btn btn-info btn-lg" role="button" id="n1">Register for Quiz</button>
		</form>
	</h1>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>