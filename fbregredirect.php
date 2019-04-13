<?php
  session_start();
  if(isset($_SESSION['posthour']))
  {
    include 'unsetquiztimer.php';
  }
  include 'register.php';
  $name=$_SESSION['name'];
  $arr=explode(" ",$name);
  $fname=$arr[0];
  $lname=$arr[1];
  $email=$_SESSION['email'];
  $username=$_SESSION['username'];
  $mobile=$_SESSION['mobile'];
  $password=rand(100001,999999);
  $var=mysqli_connect("localhost" , "root" , "");
  mysqli_select_db($var,"sphinx");


  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($var,$query);
  $con = mysqli_num_rows($result);
  // echo $email;
  // echo $con;

  if($con == 0){

    $query1 = "SELECT * FROM users WHERE username='$username'";
    $result1 = mysqli_query($var,$query1);
    $con1 = mysqli_num_rows($result1);

    if($con1 == 0){
      $query = "INSERT INTO users (firstname,lastname,password,username,email,phone,rating,admin) VALUES ('$fname','$lname','$password','$username','$email','$mobile','0','0')";
      mysqli_query($var,$query);
      $_SESSION['username'] = $username;
     header('location:homepage.php');
    }

    else{
      echo '<script>alert("Username already exisits");</script>';
      session_destroy();
    }
  }
  else{
    echo '<script>alert("email already exisits");</script>';
    session_destroy();
  }
?>