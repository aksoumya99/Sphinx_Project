<?php
session_start();
$_SESSION['posthour']= $_POST['posthour'];
$_SESSION['postmin']= $_POST['postmin'];
$_SESSION['postsec']= $_POST['postsec'];
//header('location:newpage.php');
?>