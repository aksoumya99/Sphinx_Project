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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit comments</title>
	<link rel="stylesheet" type="text/css" href="commentstyle.css">
</head>
<body>
	<?php
	$cid=$_POST['cid'];
	$uid=$_POST['uid'];
	$date=$_POST['date'];
	$message=$_POST['message'];
	echo "<form method='POST' action='".editComments($conn)."'>
		<input type='hidden' name='cid' value='".$cid."'>
		<input type='hidden' name='uid' value='".$uid."'>
		<input type='hidden' name='date' value='".$date."'>
		<textarea name='message' required>".$message."</textarea><br>
		<button type='submit' name='commentEdit'>Edit</button>
	</form>";
	?>
</body>
</html>