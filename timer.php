<?php
	//session_start();
	include 'loggedin.php';
	$var=mysqli_connect("localhost","root","");
	mysqli_select_db($var,"sphinx");
	$query= "SELECT * FROM quizes WHERE name='lola4'";
	$result=mysqli_query($var,$query);
	$row=mysqli_fetch_assoc($result);
	$duration=$row["duration"];
	$arr=explode(":",$duration);
	$hr=$arr[0];
	$min=$arr[1];
	$sec=$arr[2];
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
</head>
<body><!-- 
<h1>Countdown Clock</h1> -->
<div id="clockdiv">
  <div>
    
  </div>
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
<script type="text/javascript">
  
function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');
  var totalsecs = document.getElementById("totalsecs");
  total = totalsecs.textContent;
  function updateClock() {
    var seconds = total;
	var minutes = Math.floor(seconds / 60);
	var hours = Math.floor(minutes/ 60);
	hours %= 24;
	minutes %= 60;
	seconds %= 60;
    hoursSpan.innerHTML = ('0' + hours).slice(-2);
    minutesSpan.innerHTML = ('0' + minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + seconds).slice(-2);
    total=total-1;
    if (total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>
</body>
</html>