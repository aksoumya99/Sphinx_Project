<?php

	$conn=mysqli_connect('localhost','root','','sphinx');
	if(!$conn)
	{
		die("Connection failed:".mysqli_connect_error());
	}

?>