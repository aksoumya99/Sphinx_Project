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

<br><br><br>

 <section class="container-fluid px-0">
    	<div class="row align-items-center content ">
            <div class="col-md-6 text-center order-2 order-md-1" id="p1" >
                <div class="row justify-content-center">
                    <div class="col-10 col-lg-8 blurb mt-5 mb-5">
               			<h1>                                     </h1>
                         <h2 >AVISHKAR 2018</h2>
                        <p class="lead">The end of September will corroborate another confluence in the city of Sangam- a conflux of every field of technology and quizzing arenas along with inspirational talks from people representing different walks of life . This is the concoction level of Avishkar that inspires every brain out there to ideate ,innovate and create. Whether it's about quenching your thirst of exploring the cyber world or your mania of electronics, your idea of building the world or the surge of power that leads this world, Another Sophia or Jarvis or maybe your own Mendel's experiment ....the idea of flying in the air or a chase in the chemical world and who would manage everything while the technicalities are being taken care of. With this plethora of events, we have gnosiomania- the ultimate quiz battle and gnoTalks-an open panel discussion to people of great intellect inspiring young minds and leaving them in awe. So unleash your minds and dive into this pool as we have something for each one of you. Step up and get ready for this extravaganza!!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-1 order-md-2 id="Avishkar_image">
                <img src="images4.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </section>

<br>
<br>
<br>

<hr>
<br>
<br>
<span style="margin-left: 20px;">
	<h4 style="padding-left: 80px; font-weight: bold;">QUIZZES TO PARTICIPATE IN:</h4>

</span>

<?php
	$con=mysqli_connect("localhost", "root" , "");
	mysqli_select_db($con,"sphinx");

	$query = "SELECT name,qcode FROM quizes";
	$result = mysqli_query($con,$query);

	echo "<div id='quizzes1' style='margin-left: 80px;'><ul>";
	while($rows = mysqli_fetch_array($result)){
		echo "<li> $rows[0] <form method='GET' action='enterquiz.php'>".
								"<input type='hidden' value='$rows[1]' name='quiz_code'>".
								"<input type='submit' value='Enter Quiz'>".
						   "</form>".
		"</li> <br>";
	}	
	echo "</ul></div>";

?>