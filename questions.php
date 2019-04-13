
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
	if(isset($_GET['quiz_code'])){
		$_SESSION['quiz_code'] = $_GET['quiz_code'];
		$code = $_SESSION['quiz_code'];
		// echo "quiz code : $code";
	}
	
?> 








<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="questions.css">
    <title>Hello, world!</title>
	<title>QUESTIONS</title>
</head>
<body>
		<br>
	<br>
	
	<script type="text/javascript">

		function empty() {
				var ch1 = document.getElemenetById('ch1');
				var ch2 = document.getElemenetById('ch2');
				var ch3 = document.getElemenetById('ch3');
				var ch4 = document.getElemenetById('ch4');
				var type = document.form1.type.value;

				if(ch1 == null && ch2 == null && ch3 == null && ch4 == null && type == "multi_c_q"){
					alert('fill atleast one option !!!');
					document.form1.setAttribute("action","#");
				}
				else{
					document.form1.setAttribute("action","#");
				}
		}
		function check() {
			var type = document.form1.type.value;

			if(type == 'subjective'){
				document.getElementById('ans1').required = false;
				document.getElementById('ans2').required = false;
				document.getElementById('ans3').required = false;
				document.getElementById('ans4').required = false;

				document.form1.option1.required = false;
				document.form1.option2.required = false;
				document.form1.option3.required = false;
				document.form1.option4.required = false;
			}

			if(type == 'multi_c_q'){
				document.getElementById('ans1').required = false;
				document.getElementById('ans2').required = false;
				document.getElementById('ans3').required = false;
				document.getElementById('ans4').required = false;

				document.form1.option1.required = true;
				document.form1.option2.required = true;
				document.form1.option3.required = true;
				document.form1.option4.required = true;
			}
		}
		function display_it() {
			var type = document.form1.type.value;
			if(type == "mcq"){
				document.getElementById('options').style.display = 'inherit';
				document.getElementById('multi_c_q').style.display = 'none';
				document.getElementById('mcq_ans').style.display = 'inherit';

				// document.getElementById('ans1').style.display = 'inherit';
				// document.getElementById('ans2').style.display = 'none';
				// document.getElementById('ans3').style.display = 'none';
				// document.getElementById('ans4').style.display = 'none';
				

			}

			else if(type == "multi_c_q"){
				document.getElementById('options').style.display = 'inherit';
				document.getElementById('multi_c_q').style.display = 'inherit';
				document.getElementById('mcq_ans').style.display = 'none';	
				// var num_of_ans = document.getElementById('value').value;


				// if(num_of_ans == '1'){
				// 	document.getElementById('ans1').style.display = 'inherit';
				// 	document.getElementById('ans2').style.display = 'none';
				// 	document.getElementById('ans3').style.display = 'none';
				// 	document.getElementById('ans4').style.display = 'none';

				// }
				// if(num_of_ans == '2'){
				// 	document.getElementById('ans1').style.display = 'inherit';
				// 	document.getElementById('ans2').style.display = 'inherit';
				// 	document.getElementById('ans3').style.display = 'none';
				// 	document.getElementById('ans4').style.display = 'none';

				// }
				// if(num_of_ans == '3'){
				// 	document.getElementById('ans1').style.display = 'inherit';
				// 	document.getElementById('ans2').style.display = 'inherit';
				// 	document.getElementById('ans3').style.display = 'inherit';
				// 	document.getElementById('ans4').style.display = 'none';

				// }
				// if(num_of_ans == '4'){
				// 	document.getElementById('ans1').style.display = 'inherit';
				// 	document.getElementById('ans2').style.display = 'inherit';
				// 	document.getElementById('ans3').style.display = 'inherit';
				// 	document.getElementById('ans4').style.display = 'inherit';

				// }	
			}

			else{
				document.getElementById('options').style.display = 'none';
				document.getElementById('multi_c_q').style.display = 'none';
				document.getElementById('mcq_ans').style.display = 'none';
				// document.getElementById('ans1').style.display = 'none';
				// document.getElementById('ans2').style.display = 'none';
				// document.getElementById('ans3').style.display = 'none';
				// document.getElementById('ans4').style.display = 'none';
			}
		}
	</script>


	<h1 align="center">QUESTIONS</h1>
	<hr>
	



	<div id="form1">
		<form method="GET" action="reg_ques.php" name="form1" onsubmit="empty();">
		<textarea name="ques" placeholder="enter question" required></textarea>
		<br><br>
		<select name="type" onchange="display_it();check()" required>
			<option disabled selected value>-- SELECT TYPE --</option>
			<option value="mcq">MCQ</option>
			<option value="multi_c_q">MULTI CORRECT TYPE</option>
			<option value="subjective">SUBJECTIVE</option>
		</select>
		<br><br>

		<div id="options" style="display: none;">
			<strong >OPTION A:</strong>
			<input type="text" name="option1" required class="opt">
			<strong>OPTION B:</strong>
			<input type="text" name="option2" required class="opt">
			<strong>OPTION C:</strong>
			<input type="text" name="option3" required class="opt">
			<strong>OPTION D:</strong>
			<input type="text" name="option4" required class="opt">
		</div>
		<br>
		<br>
		<br>
		<div id="mcq_ans" style="display: none;">
			<strong>CORRECT OPTION:</strong> <br>
			<input type="hidden" name="ans" value="off">
			   <strong> A)   </strong>  <input type="radio" id="ans1" name="ans" value="a" required>
			   <br>

			   <strong> B)   </strong>  <input type="radio" id="ans2" name="ans" value="b" required>
			   <br>
			  	<strong> C)   </strong>  <input type="radio" id="ans3" name="ans" value="c" required>
			  	<br>
			  <strong> D)</strong>  <input type="radio" id="ans4" name="ans" value="d" required>
			  <br>
		</div>

		<div id="multi_c_q" style="display: none;">
			<strong>CORRECT OPTION:</strong> <br>
			<input type="hidden" id="ch1" name="ch1" value="off">
			<strong>A)  </strong><input type="checkbox" name="ch1" value="a">
			<br>
			<input type="hidden" id="ch2" name="ch2" value="off">
			<strong>B) </strong><input type="checkbox" name="ch2" value="b">
			<br>
			<input type="hidden" id="ch3" name="ch3" value="off">
			<strong>C)  </strong><input type="checkbox" name="ch3" value="c">
			<br>
			<input type="hidden" id="ch4" name="ch4" value="off">
			<strong>D) </strong><input type="checkbox" name="ch4" value="d">
			<br>
		</div>
	 
		<!-- <div id="num_of_ans" onchange="display_it()" style="display: none;">
			<br><br>
			number of right answers :
			<select name="numofans" id="value">
				<option disabled selected value>-- select --</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option> 
			</select>
		</div> -->

		<!-- <div id="mcq_ans" style="display: none;">
			<br><br>
			Answers :
		<input type="text" id="ans1" name="ans1" placeholder="answer 1" style="display: inherit;">
		<input type="text" id="ans2" name="ans2" placeholder="answer 2" style="display: none;">
		<input type="text" id="ans3" name="ans3" placeholder="answer 3" style="display: none;">
		<input type="text" id="ans4" name="ans4" placeholder="answer 4" style="display: none;">
		</div> -->
	</div>
		<br><br>
		<h4 style="font-weight: bold; margin-left: 28%;">      ENTER MARKS FOR THIS QUESTION:  </h4>
		<input type="number" name="marks" required>
		<br><br>
		<input type="submit" name="submit">
		<br>
		<br>
		<a href="homepage.php" id="done" type="button"><h6 align="center">Done</h6></a>

	</form>
	<br>

	



	</div>

	</div>














		


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
</body>
</html>




