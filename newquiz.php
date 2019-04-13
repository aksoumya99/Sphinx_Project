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


<script type="text/javascript">
	function check_empty(){
		var f1 = document.form1.name.value;
		var f2 = document.form1.duration.value;
		var f3 = document.form1.date.value;
		var f4 = document.form1.type.value;
		var f5 = document.form1.about.value;

		if (f1==="" || f2==="" || f3==="" || f4==="" || f5==="") {
			alert("Fill all the fields !!!");
			document.form1.setAttribute("action" , "newquiz.php");
		}
		else{
			document.form1.setAttribute("action" , "generate_quiz.php");
		}
	}
</script>



<br><br><br>



<form method="GET" action="generate_quiz.php" name="form1" onsubmit="check_empty()">
	Quiz name :
	<input type="text" name="name"><br><br>
	duration :
	<!-- <br> -->
	<!-- Hours: -->
	<!-- <input type="number" name="hours"><br><br>
	Minutes:
	<input type="number" name="minutes"><br><br>
	Seconds:
	<input type="number" name="seconds"><br><br> -->
	<input id="appt-time" type="time" name="duration" step="1">
	date :
	<input type="date" name="date"><br><br>
	type :
	<select name="type">
		<option value="mcq">MCQ type</option>
		<option value="multi_c_q">multi correct type</option>
		<option value="subjective">Subjective type</option>
		<option value="mixed">Mixed type</option>
	</select>
	<br><br>
	About :<br>
	<textarea name="about" placeholder="Write something about the quiz..."></textarea><br><br>
	<input type="submit" value="generate quiz">
</form>