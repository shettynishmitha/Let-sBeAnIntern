<?php
include('connect.php');
if (isset($_POST['submit'])) {
    // receive all input values from the form
    
      $username = mysqli_real_escape_string($connection, $_POST['username']);
 
    $pass1 = mysqli_real_escape_string($connection, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($connection, $_POST['pass2']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    
    if ($pass1 != $pass2) {
      echo '<script language="javascript">';
          echo 'alert("The two passwords donot match!!")';
          echo '</script>';
          
         
    }
  else{
    // first check the database to make sure 
    // a user does not already exist with the same username
  
    $user_check_query = "SELECT * FROM users WHERE username='$username' ";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
  if ($user) { // if user exists
      
  
    if ($user['username'] === $username) {
      echo '<script language="javascript">';
      echo 'alert("Username already exists!!")';
      echo '</script>';
         
      }
      
    }
  
  else{
        $query = "INSERT INTO users (username, user_access, password) 
                  VALUES('$username', 'U',  '$pass1')";
     $res= mysqli_query($connection, $query);
      if($res){
        
        echo '<script language="javascript">';
      echo 'alert("SignUp successfull!!")';
      echo '</script>';
         
   
     }
         else{
        echo '<script language="javascript">';
        echo 'alert("Registraton failed!")';
        echo '</script>';
       }
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
    <title>SignUp</title>
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
                <h5>SignUp</h5>
                <form class="" action="" method="POST">
                    <input type="text" name="username" placeholder="Username" required />
                    
                    <input type="password" name="pass1" placeholder="Password" required/><br>
                    <input type="password" name="pass2" placeholder="Confirm Password" required/><br>
                    <button type="submit" name="submit">SignUp</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
</body>

</html>