<?php
date_default_timezone_set('Asia/Kolkata');
include 'comments.inc.php';
include 'dbh.inc.php';
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
	$cid=$_POST['cid'];
	$uid=$_POST['uid'];
	echo "<form method='POST' action='".makeReplies($conn)."'>
		<input type='hidden' name='cid' value='".$cid."'>
		<input type='hidden' name='uid' value='".$uid."'>
		<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
		<textarea name='message' required></textarea><br>
		<button type='submit' name='makeReply'>Reply</button>
	</form>";
	?>
</body>
</html>