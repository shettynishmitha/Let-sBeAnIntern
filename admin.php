<?php
if(isset($_POST["log_user"]))
{

	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$con = mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($con,"let'sbeanintern") or die("cannot select DB");

		
		$results= mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
		$numrows = mysqli_num_rows($results);
		if($numrows != 0)
		{
			while($row = mysqli_fetch_assoc($results))
			{
				$dbusername = $row[username];
				$dbpassword = $row[password];
			}

			if($username == $dbusername && $password == $dbpassword)
			{
				session_start();
				$_SESSION['sess_user']=$username;
				

				/* Redirect browser */
				header("Location: registrations.php");
			}
		}
		
		else
		{
			$message = "Invalid username or password";
			echo "<script type='text/javascript'>
				alert('$message');
			</script>";
		}
	}
}
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
</head>
<body>
<body data-spy="scroll" data-target="#navbarResposive">

	<div id="home">

		<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-center fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><h1>Intern</h1></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResposive">
					<ul class="navbar-nav ml-auto">
						
						<li>
                        <a href="#about" class="btn btn-primary btn-lg" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal">LOGIN</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>


		<div id="slides" class="carousel slide" data-ride="carousel" data-interval="12000">
			<ol class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1"></li>
				<li data-target="#slides" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner">
				<div class="carousel-item active">
               <img src="admin/slide1.jpg">
					<div class="carousel-caption">

						
						
					</div>
				</div>
				<div class="carousel-item">
               
					<img src="admin/slide2.jpg">
				</div>
				<div class="carousel-item">
               <img src="admin/slide3.jpg">
				</div>
				<!-- <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a> -->
			</div>
		</div>

	</div>
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       <div class="modal-body">
           <form method="post" action="">
    <label>Admin Id</label>
                 <input type="text" name="username"  class="form-control" required />

                <br />  
                <label>Password</label>
                <input type="password" name="password"  class="form-control" required />
                <br />
                <input type="submit" name="log_user" id="insert" value="LOGIN" class="btn btn-primary btn-lg" />
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
	</body>
    </html>