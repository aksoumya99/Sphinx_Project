<?php
	session_start();
	// if (isset($_SESSION['username'])) {
	// 	include 'loggedin.php';
	// }
	// else{
	// 	header('location:homepage.php');
	// }

	$num_of_ques = $_SESSION['num_of_ques'];
	$ques_seq = $_SESSION['ques_seq'];
	$quiz_code = $_SESSION['quiz_code'];
	$username = $_SESSION['username'];

	$con = mysqli_connect("localhost" , "root" , "");
	mysqli_select_db($con,"sphinx");
	//Timer Code
	//session_start();
	$query= "SELECT * FROM quizes WHERE qcode='$quiz_code'";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$duration=$row["duration"];
	$arr=explode(":",$duration);
	$hr=$arr[0];
	$min=$arr[1];
	$sec=$arr[2];
	if(isset($_SESSION['posthour']))
	{
		$hr=$_SESSION['posthour'];
		$min=$_SESSION['postmin'];
		$sec=$_SESSION['postsec'];
	}
	$rem=((int)$hr)*3600+((int)$min)*60+((int)$sec);
	?>
	<div id="totalsecs" style="display: none;">
    <?php
        echo htmlspecialchars($rem); 
    ?>
</div>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <link rel="stylesheet" type="text/css" href="thequiz.css">
</head>
<body><!-- 
<h1>Countdown Clock</h1> -->


<section class="container-fluid px-0">
	<div class="row content ">
		<div class="col-md-9 text-left">
			<div class="row justify-content-center">
				<div class="col-10 col-lg-11 blurb mt-5 mb-5">
					



	<?php
	if($_SESSION['curr_q_index'] > 0){
		$curr_ques = $ques_seq[$_SESSION['curr_q_index'] - 1];
		$ans_query = "SELECT * FROM questions WHERE Q_no='$curr_ques' AND qcode='$quiz_code'";
		$result = mysqli_query($con,$ans_query);
		$row = mysqli_fetch_array($result);

		$curr_q_index = $_SESSION['curr_q_index'];
		//echo "current index = $curr_q_index ";

		if($row['type'] == "mcq"){
			if(isset($_GET['ans'])){
			if($row['answer'] == $_GET['ans']){
					$_SESSION['marks'] += $row['marks'];
				}
			}
		}

		if($row['type'] == "multi_c_q"){
			$ser_answer = $row['answer'];
			$ans_array = unserialize($ser_answer);

			if(isset($_GET['status1']) && isset($_GET['status2']) && isset($_GET['status3']) && isset($_GET['status4'])){
				if($ans_array[0] == $_GET['status1'] && $ans_array[1] == $_GET['status2'] && $ans_array[2] == $_GET['status3'] && $ans_array[3] == $_GET['status4']){
					$_SESSION['marks'] += $row['marks'];
				}
			}
		}

		if(isset($_GET['sub_ans'])){
			if($row['type'] == "subjective"){
				$sub_ans = $_GET['sub_ans'];
				$query = "INSERT INTO sub_ans (qcode,Q_no,answer,eva_status,username) VALUES('$quiz_code','$curr_ques','$sub_ans','false','$username')";
				mysqli_query($con,$query);
			}
		}
	}

	if($_SESSION['quiz_status'] == "off"){
		$_SESSION['quiz_status'] = "on";
		$_SESSION['marks'] = 0;
		?>
		<h2 class="display-4 jumbotron-fluid"><?php echo "YOU ARE IN THE QUIZ:"; ?></h2>
		<?php
	}


	if($_SESSION['curr_q_index'] >= $num_of_ques){
?>
		
	
	<div id="complete1">
		<h1 class="display-6">YOU HAVE COMPLETED YOUR QUIZ</h1>
		<a href="homepage.php">GO TO HOME PAGE</a>		
	</div>

<?php
		$query = "SELECT type FROM quizes";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		$type = $row['type'];
		$marks = $_SESSION['marks'];
		if($type == "mcq" || $type == "multi_c_q"){
			$marks_update = "UPDATE marks SET marks='$marks',eva_status='true' WHERE username='$username' AND qcode='$quiz_code'";
			mysqli_query($con,$marks_update);
		}

		else{
			$marks_update = "UPDATE marks SET marks='$marks',eva_status='false' WHERE username='$username' AND qcode='$quiz_code'";
			mysqli_query($con,$marks_update);
		}
		$_SESSION['quiz_status'] = "off";
		die();
	}
	
	$curr_ques = $ques_seq[$_SESSION['curr_q_index']++];
	$result = mysqli_query($con,"SELECT * FROM questions WHERE Q_no='$curr_ques' AND qcode='$quiz_code'");
	$row = mysqli_fetch_array($result);
?> 

<div>
	<?php 
		$ser_options = $row['options'];
		$options = unserialize($ser_options);

		$curr_q_num = $_SESSION['curr_q_index'];
	?>
	<h2><?php echo "Question $curr_q_num :"; ?></h2> 
		<?php $question = $row['Question']; ?>
	<h2><?php	echo "$question"; ?></h2>
</div>

<!-- <div>
	Media related to ques :
</div> -->

<?php	
	if($row["type"] == 'mcq'){
?>

<div>
	<form method="GET" action="thequiz.php">
		<input type="hidden" name="ans" value="off">
		
		
		
		<input type="radio" name="ans" value="a">
		<h4 id="radio1"><?php echo "$options[0]"; ?></h4>
		<br>
		<input type="radio" name="ans" value="b">
		<h4 id="radio1"><?php echo "$options[1]"; ?></h4>
		<br>
		<input type="radio" name="ans" value="c">
		<h4 id="radio1"><?php echo "$options[2]"; ?></h4>
		<br>
		<input type="radio" name="ans" value="d">
		<h4 id="radio1"><?php echo "$options[3]"; ?></h4>
		<br>
		<button type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg">SUBMIT</button>
				<a href="homepage.php" class="btn btn-secondary btn-lg">QUIT</a>

	</form>
</div>

<?php 
	}
	else if($row["type"] == 'multi_c_q'){
?>

<div>
	<form method="GET" action="thequiz.php">
		<input type="hidden" name="status1" value="off">
		
		<input type="checkbox" name="status1" value="a">
		<h4 id="radio1"><?php echo "$options[0]"; ?></h4>
		<br>
		<input type="hidden" name="status2" value="off">

		<input type="checkbox" name="status2" value="b">

		<h4 id="radio1"><?php echo "$options[1]"; ?></h4>
		<br>
		<input type="hidden" name="status3" value="off">
		<input type="checkbox" name="status3" value="c">
		<h4 id="radio1"><?php echo "$options[2]"; ?></h4>
		<br>
		<input type="hidden" name="status4" value="off">
		<input type="checkbox" name="status4" value="d">
		<h4 id="radio1"><?php echo "$options[3]"; ?></h4>
		<br>
		<button type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg">SUBMIT</button>
				<a href="homepage.php" class="btn btn-secondary btn-lg">QUIT</a>

		
	</form>
</div>

<?php
	}
	else{
?>

<div>
	<form method="GET" action="thequiz.php">
		
			
		
		<textarea name="sub_ans" placeholder="Ans here ..."></textarea>
		<button type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg">SUBMIT</button>
		<a href="homepage.php" class="btn btn-secondary btn-lg">QUIT</a>
	</form>
</div>

<?php
	}
?>








				</div>

			</div>
			
		</div >
																<!-- clock goes here -->
		<div class="col-md-3 text-left">
					<div id="clockdiv" class="col-md-6">
 
					  <div>
					    <span class="hours"></span>
					    <div class="smalltext">Hours</div>
					  </div> 
					  <div>
					    <span class="minutes"></span>
					    <div class="smalltext">Minutes</div>
					  </div>
					  <div>
					    <span class="seconds"></span>
					    <div class="smalltext">Seconds</div>
					  </div>
					</div>	
		</div>
	</div>

</section>





<script type="text/javascript">
 function preventBack() {window.history.forward();}
	setTimeout("preventBack()",0);
	window.onunload = function(){null};
function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');
  var totalsecs = document.getElementById("totalsecs");
  total = totalsecs.textContent;
  function updateClock() {
  	if(total==0)
  	{
  		window.location.href="homepage.php";
  	}
    var seconds = total;
	var minutes = Math.floor(seconds / 60);
	var hours = Math.floor(minutes/ 60);
	hours %= 24;
	minutes %= 60;
	seconds %= 60;
	$.post('validatenew.php',{posthour:hours,postmin:minutes,postsec:seconds},
		function(data)
		{
			;
		});
    hoursSpan.innerHTML = ('0' + hours).slice(-2);
    minutesSpan.innerHTML = ('0' + minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + seconds).slice(-2);
    total=total-1;
    if (total < 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>


	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
	<!-- Timer Code Ends -->
