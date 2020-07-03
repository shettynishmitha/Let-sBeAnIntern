<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Let'sBeAnIntern</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
	<style>
	.social{
  font-size: 2em;
  padding: .4rem;
  }
  </style>
</head>
<body data-spy="scroll" data-target="#navbarResposive">

	<div id="home">

		<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-center fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><h1>Let'sBeAnIntern</h1></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResposive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="#home">Home</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="#service">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contact">Contact</a>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>

	<!-- image slider-->
		<div id="slides" class="carousel slide" data-ride="carousel" data-interval="12000">
			<ol class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1"></li>
				<li data-target="#slides" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/technology.jpg">
					<div class="carousel-caption">
						
						<h3>Education+Internship=GreatEmployment</h3>
						
					</div>
				</div>
				<div class="carousel-item">
					<img src="img/computer.jpg">
				</div>
				<div class="carousel-item">
					<img src="img/coding.jpg">
				</div>
				<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

	</div>

	

	<div id="service">

	<!-- Three column section-->

	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Services</h1>
			</div>
			<hr>
		</div>
	</div>

		<div class="container-fluid padding">
			<div class="row text-center padding">
			<?php
				include('connect.php');
				
				
				$sql="SELECT * FROM company";
				$res = mysqli_query($connection, $sql);
				if (mysqli_num_rows($res) > 0) {
					while( $row = mysqli_fetch_assoc($res)){
					echo '<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="card">
						<img class="card-img-top" src="'.$row["c_name"].'/about.png">
							<div class="card-body">
							<a  class="card-title" style="font-size:2em;" href="services.php?c_name='.$row["c_name"].'">'.$row["c_name"].'</a>
							<p class="card-text">City:'.$row["city"].'</p>
							<a target="_blank" href="https://en.wikipedia.org/wiki/'.$row["c_name"].'" class="btn btn-outline-secondary">Learn More</a>
							</div>
						</div>
					</div>';
					}
				}?>
					
					
							
				
			</div>
			<hr class="my-4">
		</div>
		<div id="about">

			<!-- Welcome Section-->
	
				<div class="container-fluid padding">
					<div class="row welcome text-center">
						<div class="col-12">
							<h1 class="display-4">About Us</h1>
						</div>
						<hr>
						<div class="col-12">
							<p class="lead">Let's Be an Intern is a platform where students find meaningful Internships with a great organizations.  Through the word "Lets" we want to drive the positivity of action. Future at Let'sBeAnIntern lies in perfecting this industry-student interaction platform.
							</p>
						</div>
					</div>
				</div>
	

				<!-- Two column section -->
	
				<div class="container-fluid padding">
					<div class="row padding">
						<div class="col-lg-6">
								<img src="img/Ai.jpg" class="img-fluid">
						</div>
						<div class="col-lg-6">
							<h2>Our Philosophy</h2><br><br>
							<p>“We like to change things. We believe in human potential. We believe in opportunities. Lets Be an Intern is a culmination of these believes.” </p>
							<br><p>“We are focused on building the future where students can experience real opportunities while they continue their education and build a smarter future. ”</p>
							<br>
						</div>
					</div>
				</div>
				<hr class="my-4">
	
			</div>
	
			<!-- Two column section-->
	
				
		</div>
	
<!-- footer -->
<div id="contact">
	<footer>
		<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<h1>Let'sBeAnIntern</h1>
				<hr class="light">
				<p>+91 0000000000</p>
				<p>let'sbeanintern@gmail.com</p>
				<p>Bantakal</p>
				<p>Udupi, Karnataka, 576101</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Connect Us</h5>
				<hr class="light">
				<a target="_blank" class="social" href=" "><i class="fab fa-twitter"></i></a>
				<a target="_blank" class="social" href=" "><i class="fab fa-instagram"></i></a>
				<a target="_blank" class="social" href=" "><i class="fab fa-linkedin"></i></a>
				
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Our Services</h5>
				<hr class="light">
				<p>Infosys</p>
				<p>Wipro</p>
				<p>TCS</p>
				
			</div>
			<div class="col-12">
				<hr class="light-100">
				<h5>Copyright&copy; Let'sBeAnIntern.All Rights Reserved</h5>
			</div>
		</div>
	</div>
	</footer>

</div>
</body>
</html>
