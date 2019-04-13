<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
function setComments($conn){
	if(isset($_POST['commentSubmit'])){
		$qcode = $_SESSION['quiz_code'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
		$sql="INSERT INTO comments (qcode, uid, date, message) VALUES ('$qcode', '$uid', '$date', '$message')";
		$result=$conn->query($sql);
		header('location:commentindex.php');
	}
}
function getComments($conn){
	$qcode = $_SESSION['quiz_code'];
	$sql="SELECT * FROM comments WHERE qcode= '$qcode' order by date DESC";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<div class='comment-box'><p>";
			echo $row['uid']."<br>";
			echo $row['date']."<br><br>";
			echo nl2br($row['message']);
			echo "</p><form method='POST' action='addreply.php'>
			<input type='hidden' name='cid' value='".$row['cid']."'>
			<input type='hidden' name='uid' value='".$_SESSION['username']."'>
			<button type=submit class='reply-button'>Reply</button>
		</form></p>";
			if($row['uid']==$_SESSION['username'])
		{echo "
		<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
			<input type='hidden' name='cid' value='".$row['cid']."'>
			<button name='commentDelete' type=submit>Delete</button>
		</form>
		<br>
		<form class='edit-form' method='POST' action='editcomment.php'>
			<input type='hidden' name='cid' value='".$row['cid']."'>
			<input type='hidden' name='uid' value='".$row['uid']."'>
			<input type='hidden' name='date' value='".$row['date']."'>
			<input type='hidden' name='message' value='".$row['message']."'>
			<button type=submit>Edit</button>
		</form>";}
		echo "</div>";
		showReplies($conn,$row['cid']);
	}
}
function editComments($conn){
	if(isset($_POST['commentEdit'])){
		$cid=$_POST['cid'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
		$sql="UPDATE comments SET message='$message' WHERE cid='$cid'";
		$result=$conn->query($sql);
		header('location:commentindex.php');
	}
}
function deleteComments($conn){
	if(isset($_POST['commentDelete'])){
		$cid=$_POST['cid'];
		$sql="DELETE FROM comments where cid='$cid'";
		$result=$conn->query($sql);
		header('location:commentindex.php');
	}
}
function makeReplies($conn){
	if(isset($_POST['makeReply'])){
		$qcode = $_SESSION['quiz_code'];
		$cid=$_POST['cid'];
		$uid=$_POST['uid'];
		$date=$_POST['date'];
		$message=$_POST['message'];
		$sql="INSERT INTO replies (cid, qcode, uid, date, message) VALUES ('$cid', '$qcode', '$uid', '$date', '$message')";
		//echo $sql;
		$result=$conn->query($sql);
		header('location:commentindex.php');
	}
}
function showReplies($conn,$cid)
{
	
	$qcode = $_SESSION['quiz_code'];
	$sql="SELECT * FROM replies WHERE qcode= '$qcode' AND cid= '$cid' order by date DESC";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc()){
		echo "<div class='reply-box'><p>";
			echo $row['uid']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']);
		echo "</p>";
		if($row['uid']==$_SESSION['username'])
		{echo "
		<form class='delete-reply-form' method='POST' action='".deleteReplies($conn)."'>
			<input type='hidden' name='rid' value='".$row['rid']."'>
			<button name='replyDelete' type=submit>Delete</button>
		</form>
		<br>
		<form class='edit-reply-form' method='POST' action='editreply.php'>
			<input type='hidden' name='rid' value='".$row['rid']."'>
			<input type='hidden' name='message' value='".$row['message']."'>
			<button type=submit>Edit</button>
		</form>
		</div>";}
}
}
function deleteReplies($conn){
	if(isset($_POST['replyDelete'])){
		$rid=$_POST['rid'];
		$sql="DELETE FROM replies where rid='$rid'";
		$result=$conn->query($sql);
		?>
		<script type="text/javascript">
			window.location.href="commentindex.php";
		</script>
		<?php
		//header('location:commentindex.php');
	}
}
function editReplies($conn){
	if(isset($_POST['replyEdit'])){
		$rid=$_POST['rid'];
		$message=$_POST['message'];
		$sql="UPDATE replies SET message='$message' WHERE rid='$rid'";
		$result=$conn->query($sql);
		header('location:commentindex.php');
	}
}
?>