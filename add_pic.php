<?php
	session_start();
	if (isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	else{
		header('location:homepage.php');
	}

	$username = $_SESSION['username'];
	$file = $_FILES['file'];

	$file_name = $file['name'];echo "$file_name <br>";
	$file_location = $file['tmp_name'];echo "$file_location <br>";
	$file_size = $file['size'];

	$expl_name = explode('.',$file_name);
	$file_ext = end($expl_name);echo "$file_ext <br>";

	$new_file_name = $username.".".$file_ext;echo "$new_file_name <br>";
	$file_dest = "images/"."$new_file_name";echo "$file_dest <br>";

	

		move_uploaded_file($file_location,$file_dest);

		$con=mysqli_connect("localhost", "root" , "");
		mysqli_select_db($con,"sphinx");
		
		$query = "UPDATE users SET pic='$file_ext' WHERE username='$username'";
		mysqli_query($con,$query);
	
	
	header('location:profile.php');

?>