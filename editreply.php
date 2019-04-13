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
	<title></title>
	<link rel="stylesheet" type="text/css" href="commentstyle.css">
</head>
<body>
	<?php
	$rid=$_POST['rid'];
	$message=$_POST['message'];
	echo "<form method='POST' action='".editReplies($conn)."'>
		<input type='hidden' name='rid' value='".$rid."'>
		<textarea name='message' required>".$message."</textarea><br>
		<button type='submit' name='replyEdit'>Edit</button>
	</form>";
	?>
</body>
</html>