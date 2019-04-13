<?php
date_default_timezone_set('Asia/Kolkata');

include 'comments.inc.php';
include 'dbh.inc.php';
if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
if(isset($_SESSION['username'])){
		include 'loggedin.php';
	}

	else{
		include 'loggedout.php';
		die("you need to be logged in");
	}
$quiz_code = $_SESSION['quiz_code'];
$quiz_name = $_SESSION['quiz_name'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Discussion Forum</title>
	<link rel="stylesheet" type="text/css" href="commentstyle.css">
</head>
<body>
	<h1>
	<?php
	echo "<h2>".$quiz_name."</h2>";
	echo "<div class='comment-system'><form method='POST' action='".setComments($conn)."'>
		<input type='hidden' name='uid' value='".$_SESSION['username']."'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<textarea name='message' required></textarea><br>
		<button type='submit' name='commentSubmit'>Comment</button>
	</form></div>";
	getComments($conn);
	?>
</body>
</html>