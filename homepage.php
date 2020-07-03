<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link rel="stylesheet" href="css/homeuser.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
   
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home

              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
         <img src="images/logo2.png" width="80px" height="60px" alt="logo">
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<section id="home">
<div class="jumbotron text-center" style="background-color:#e3e3e3">

<img src="images/logo3.png" width="50%" height="120px" alt=""> 
  <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
      <div class="search">
  <form action="homepage.php" method="post">
  <input type="text"  name="search" placeholder="search by company name">&nbsp;&nbsp;
  <button type="submit" name="submit" class="btn1">Search</button>
</form>
</div>
</div>
</div>
</div></section>
<section id="services">
<div class="container">
  <div class="row">
  
    <?php
      include('connect.php');
     
      
          $sql="SELECT im1,c_name,city,details FROM company";
          $res = mysqli_query($connection, $sql);
          if (mysqli_num_rows($res) > 0) {
              while( $row = mysqli_fetch_assoc($res)){
                    
  echo '  <div class="col-sm-4">
  <div id="cmain">
  
    <div id="cright">
              
        <div id="cimage1" >
         <img height="100%" width="100%" src="images/'.$row["im1"].' ">
        
        </div>
        <div id="ctext1">
          <a >  <p id="cname"><a href="user.php?c_name='. $row['c_name'] . '">' .$row["c_name"].'</a><br>City:'.$row["city"].'</p>
          </a><br>
          
        </div>
    </div>
  </div>
    </div>';
              }}
              ?></div></div><br><br>
</section>
<section id="about">
<div class="container-fluid h-100 text-center">    
    <div class="row ">
    <div class="col-sm-12 bg-light">
    <img src="images/internicon.png" width="180px" height="200px" alt="logo">
  <h1>About Us</h1>
  <p>Let's Be an Intern is a platform where students find meaningful Internships with a great organizations.We like to change things. We believe in human potential. We believe in opportunities. Lets Be an Intern is a culmination of these believes. Through the word "Lets" we want to drive the positivity of action. We are focused on building the future where students can experience real opportunities while they continue their education and build a smarter future. Future at letsintern lies in perfecting this industry -student interaction platform.

</p> 
</div></div></div>
</section>
<section id="contact">
<div class="container-fluid text-center">    
    <div class="row ">
    <div class="col-sm-4 bg-light">
  <h1>Contact Us</h1>
  
</div>
<div class="col-sm-4 bg-light">
  <h1>Contact Us</h1>
</div><div class="col-sm-4 bg-light">
  <h1>Contact Us</h1>
</div></div></div>

            </section>
</body>
</html>
