<?php

  if(isset($_GET['create']))
  {
    session_start();
    if(isset($_SESSION['posthour']))
    {
      include 'unsetquiztimer.php';
    }
    //echo "Welcome <b>'".$_SESSION['name']."'</b>";
    $_SESSION['username']=$_GET['username'];
    $_SESSION['mobile']=$_GET['mobile'];
    //echo "Welcome <b>'".$_SESSION['mobile']."'</b>";
    header('location:fbregredirect.php');
    //exit();
  }

  ?>
<!DOCTYPE html>
<html>
<head>
  <title>One Last Step..</title>
  <link rel="stylesheet" type="text/css" href="regfb.css">
</head>
<body>

  <div class="login-page">
    <div class="form">
      <h3>ONE LAST STEP....</h3>
      <form class="register-form" method="GET" action="regfb.php">
        <input type="text" placeholder="USERNAME" name="username" required="required"/>
        <input type="number" name="mobile" required="required" placeholder="MOBILE NUMBER" />
        <button type="submit" name="create" value="submit">create</button>
      </form>
    </div>
  </div>

    <!-- <h2>One last step</h2>
    <br>
    <h4>fill these details</h4>
    <br>
  <div>
  <form method="GET" action="regfb.php">
  Username : <br>
  <input type="text" name="username" required="required">
  <br>
  Mobile number: <br>
  <input type="number" name="mobile" required="required"><br>
  <input type="submit" name="create" value="submit">
  </form> -->
<!-- </div> -->
</body>
</html>