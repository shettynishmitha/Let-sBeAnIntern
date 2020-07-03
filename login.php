
<?php
if(isset($_POST["submit"]))
{

	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$con = mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($con,'intern') or die("cannot select DB");

		$results= mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."' AND user_access='U'");
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
				header("Location: user.html");
			}
		}
		$results= mysqli_query($con,"SELECT * FROM users WHERE username='".$username."' AND password='".$password."' AND user_access='A'");
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
				header("Location: admin.html");
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
        <div class="wrapper">
    <nav>
        <a href=""><img src="./images/logo1.png" alt=""></a>
        <ul class="right">
            <li><a href="login.php" ><button class="button button2">Login</button></a></li>
            <li><a href="signup.php" ><button  class="button button2">SignUp</button></a></li>
            
        </ul>
    </nav>
    
        <div class="main-container">
            <div class="container-left">
                <img src="./images/logo.png" alt="logo" />
            </div>
            <div class="container-right">
                <h5>Login</h5>
                <form class="" action="" method="POST">
                    <input type="text" name="username" placeholder="Username" required/>
                    <input type="password" name="password" placeholder="Password" required/><br>
                 
                    <button name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
</body>

</html>