<!DOCTYPE html>

<?php
session_start(); 
if (!isset($_GET['c_name']) || $_GET['c_name'] === null || $_GET['c_name'] == ""){
    echo $_SESSION['c_name'];
} 
else{
$_SESSION['c_name'] = $_GET['c_name'];
  
   $company=$_SESSION['c_name'];
  
}
include('insert.php')



?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Services</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
	<style>
	.card-text
{
    color: white;
}
.coursetooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.coursetooltip .coursetooltiptext {
visibility: hidden;
  width: 400px;
  word-wrap:break-word;
  background-color: rgb(231, 219, 219);
  color: rgb(0, 0, 0);
  text-align: center;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 0%
}

.coursetooltip:hover .coursetooltiptext {
  visibility: visible;
  opacity: 1;
}
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
							<a class="nav-link" href="index.php">Home</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="#courses">Courses</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contact">Contact</a>
						</li>
						<li>
                        <a href="" class="btn btn-primary btn-lg" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal">REGISTER</a>
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
                <?php
					echo '<img src="'.$company.'/slide1.jpg">';?>
					<div class="carousel-caption">
                    <h1 class="display-2"><?php echo $company;?></h1>
						
						
					</div>
				</div>
				<div class="carousel-item">
                    <?php
					echo '<img src="'.$company.'/slide2.jpg">';?>
				</div>
				<div class="carousel-item">
                <?php
					echo '<img src="'.$company.'/slide3.jpg">';?>
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

	

	<div id="courses">

	<!-- Three column section-->

	<div class="container-fluid padding">
		<div class="row welcome text-center">
			<div class="col-12">
				<h1 class="display-4">Courses</h1>
			</div>
			<hr>
		</div>
	</div>

		<div class="container-fluid padding">
			<div class="row text-center padding">
			<?php
				include('connect.php');
				
				
				$sql="select * from compcourse where company='$company'";
				$res = mysqli_query($connection, $sql);
				if (mysqli_num_rows($res) > 0) {
					while( $row = mysqli_fetch_assoc($res)){
                
					echo '<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="card">
						<div class="coursetooltip">
						<img class="card-img-top img-circle" src="courses/'.$row["course_name"].'.png">
							<div class="card-body">
							<a  class="card-title" style="font-size:2em;" >'.$row["course_name"].'</a>
							<p class="card-title">Amount:'.$row["price"].'</p>
							<p class="card-title">Slots:'.$row["slots"].'</p>
						<span class="coursetooltiptext"> <a  class="card-title" style="font-size:2em;" >'.$row["course_name"].'</a><hr>'.$row["details"].'</span>
						
						</div>
							
						</div>
					</div>
					</div>';
					}}?>
					
							
				
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
						
					</div>
				</div>
	

				<!-- Two column section -->
	
				<div class="container-fluid padding">
					<div class="row padding">
						<div class="col-lg-6">
						<img src="<?php echo $company;?>/about.png" class="img-fluid">
						</div>
						<div class="col-lg-6">
							
							<br><br>
							<br><?php
							include('connect.php');
     
      
							$sql="SELECT details FROM company where c_name='$company'";
							$res = mysqli_query($connection, $sql);
							if (mysqli_num_rows($res) > 0) {
								while( $row = mysqli_fetch_assoc($res)){
							echo '<p>“'.$row["details"].'”</p>';}}?>
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
				<a target="_blank" class="social" href=""><i class="fab fa-twitter"></i></a>
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
    

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       <div class="modal-body">
           <form method="post" action="services.php?c_name=<?php echo $company;?>">
               <label>First Name</label>
               <input type="text" name="fname" id="name" class="form-control" required />
			   <br />
			   <label>Last Name</label>
               <input type="text" name="lname" id="name" class="form-control"/>
               <br />
              <label>Semester</label>
               <select name="semester" id="semester" class="form-control">
               <option value="1">1</option>  
               <option value="2">2</option>
               <option value="3">3</option>  
              <option value="4">4</option>
              <option value="5">5</option>  
              <option value="6">6</option>
              <option value="7">7</option>  
              <option value="8">8</option> 
              </select>
              <br /> 
              <label>Course</label>
              <select name="c_name" class="form-control"> 
             <?php
                 $connection = mysqli_connect("localhost", "root", "", "let'sbeanintern");
      
                   $sql="SELECT course_name FROM courses where company='$company'";
                     $res = mysqli_query($connection, $sql);
                   if (mysqli_num_rows($res) > 0) {
                    while( $row = mysqli_fetch_assoc($res)){
                       echo ' <option value="'.$row["course_name"].'">'.$row["course_name"].'</option>';
                      }}
               ?>
                </select><br />
               <label>College Name</label>
                 <input type="text" name="college" id="college" class="form-control" required />

                <br />  
                <label>Branch</label>
                <input type="text" name="branch" id="branch" class="form-control" required />
                <br />
                <label>Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required />
                <br />
                <label>Phone Number</label>
                <input type="tel" name="phone" id="phone" class="form-control" required/>
                <br />
                <input type="submit" name="reg_user" id="insert" value="Register" class="btn btn-primary btn-lg" />
          
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
      
   
  
</body>
</html>
