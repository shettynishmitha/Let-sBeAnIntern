<html>
    <head>
         <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/user.css">
    <title>doc</title>
</head>
<section id="courses" class="content courses"><h1>Internship Offered</h1>
    <div class="comain">
    <?php
      include('connect.php');
     
      
      $sql="SELECT image,course_name,slots,price,details FROM courses where company='infosys'";
      $res = mysqli_query($connection, $sql);
      if (mysqli_num_rows($res) > 0) {
          while( $row = mysqli_fetch_assoc($res)){
                
echo '<div class="cmain">

<div class="cright">
            <div class="tooltip">
    <div class="cimage1" >
     <img height="100%" width="100%" src="images/'.$row["image"].'" alt="no img" >
     <span class="tooltiptext">'.$row["details"].'</span>
    </div></div>
    <div class="ctext1">
        <p class="cname">'.$row["course_name"].'<br>Amount:'.$row["price"].'<br>slots:'.$row["slots"].'</p>
      <br>
      
    </div>
</div>
</div>';

          }
      }
  ?>
 
      </div>
    </section>
        </body>
        </html>
