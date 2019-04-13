<?php
	session_start();
	if(isset($_SESSION['posthour']))
	{
		include 'unsetquiztimer.php';
	}
	if(isset($_SESSION['username'])) {
		include 'loggedin.php';
	}
	
	
	else{
		include 'loggedout.php';
	}
?>
<!doctype html>
<html lang="en">
  <head>

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="team.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">
    <title>TEAM</title>
  </head>
  <body>

  	


    <!-- <nav id="mainNavbar" class="navbar navbar-dark bg-dark navbar-expand-md py-0 fixed-top">
        <a href="#" class="navbar-brand">
          <img src="image1.jpg" width="40" height="40" alt="">
        SPHINX</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="homepage.html">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">LEADERBOARD</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">HELP</a>
                </li>
                <li class="nav-item">
                    <a href="homepage.html#bottom" class="nav-link">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">QUIZZES</a>
                </li>
            </ul>

            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
             <a class="nav-link" href="#"><span class="fas fa-user"></span> SIGN UP</a>
           </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fas fa-sign-in-alt"></span> LOGIN</a>
            </li>
          </ul>
        </div>


    </nav>
 -->





    <div id="z2">
      <div class="row">
  <div class="column">
    <div class="card btn btn-light">
      <img src="aditya.jpg" alt="ADITYA" style="border-radius: 50%; width: 50%;  display: block; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Aditya Gupta</h2>
        <p class="title">BackEnd Designer</p>
        <p>A second year undergraduate from CSE, NIT ALLAHABAD</p>
        <p><strong>Email ID:</strong>adityagupta4114@gmail.com</p>
        <p class="button">
        	<a href="https://stackoverflow.com" id="spaceanchor">
  			 <i class="fab fa-instagram fa-3x"></i>
	  		</a>

	  		 <a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-facebook-square fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-linkedin fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-github fa-3x"></i>
	  		</a>


        </p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card btn btn-light">
      <img src="soumyafinal.jpg" alt="Soumya" style="border-radius: 50%; width: 50%;  display: block; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Soumya Agrawal</h2>
        <p class="title">BackEnd Developer</p>
        <p>Second Year Undergraduate in Information Technology from NIT, Allahabad.</p>
        <p><strong>Email ID:</strong>soumyamayoor@gmail.com</p>
        
        <p class="button">
        	<a href="https://stackoverflow.com" id="spaceanchor">
  			 <i class="fab fa-instagram fa-3x"></i>
	  		</a>

	  		 <a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-facebook-square fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-linkedin fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-github fa-3x"></i>
	  		</a>


        </p>
        



      </div>
    </div>
  </div>

  <div class="column">
    <div class="card btn btn-light">
      <img src="pranjal.jpg" alt="Pranjal" style="border-radius: 50%; width: 50%;  display: block; margin-left: auto; margin-right: auto;">
      <div class="container">
        <h2>Pranjal Tripathi</h2>
        <p class="title">Designer &amp Front End Developer</p>
        <p>Second Year Undergraduate in Information Technology from NIT, Allahabad.</p>
        <p><strong>Email ID:</strong>pranjal.tripathi07@gmail.com</p>
        <p class="button" id="buttontab">
        	<a href="https://stackoverflow.com" id="spaceanchor">
  			 <i class="fab fa-instagram fa-3x"></i>
	  		</a>

	  		 <a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-facebook-square fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-linkedin fa-3x"></i>
	  		</a>

	  		<a href="https://stackoverflow.com" id="spaceanchor">
	  			<i class="fab fa-github fa-3x"></i>
	  		</a>


        </p>
      </div>
    </div>
  </div>
</div


    </div>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>