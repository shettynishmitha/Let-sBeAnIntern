<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/user.css">
    <title>Document</title>
</head>
<body>
    
<section id="courses" class="content courses"><h1>Company</h1>
    <div class="comain">
      <?php
      include('connect.php');
     
      
          $sql="SELECT im1,c_name,city,details FROM company";
          $res = mysqli_query($connection, $sql);
          if (mysqli_num_rows($res) > 0) {
              while( $row = mysqli_fetch_assoc($res)){
                    
  echo '<div class="cmain">
  
    <div class="cright">
                <div class="tooltip">
        <div class="cimage1" >
         <img height="100%" width="100%" src="images/'.$row["im1"].' ">
        
        </div></div>
        <div class="ctext1">
          <a >  <p class="cname"><a href="user.php?c_name='. $row['c_name'] . '">' .$row["c_name"].'</a><br>City:'.$row["city"].'</p>
          </a><br>
          
        </div>
    </div>
  </div><br>';
 
              }
          }
      ?>
 
      </div>
    </section>

           
</body>
</html>