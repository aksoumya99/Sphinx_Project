<?php
session_start();
if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
 $_SESSION['name']=$_GET['name'];
 $_SESSION['email']=$_GET['email'];
 //echo "Welcome <b>'".$_SESSION['name']."'</b>";
 header('location:regfb.php');
?>