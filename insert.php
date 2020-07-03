<?php
include('connect.php');



 // REGISTER USER
 if (isset($_POST['reg_user'])) {
   // receive all input values from the form
   $fname = mysqli_real_escape_string($connection, $_POST["fname"]); 
   $lname = mysqli_real_escape_string($connection, $_POST["lname"]);   
   $semester = mysqli_real_escape_string($connection, $_POST["semester"]);  
   $course_name = mysqli_real_escape_string($connection, $_POST["c_name"]);  
   $collegename = mysqli_real_escape_string($connection, $_POST["college"]);  
   $branch = mysqli_real_escape_string($connection, $_POST["branch"]);
   $email = mysqli_real_escape_string($connection, $_POST["email"]);
   $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
   
   // first check the database to make sure 
   // a user does not already exist with the same phone
 
   $user_check_query = "SELECT * FROM student WHERE phone='$phone' OR email='$email'";
   $result = mysqli_query($connection, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   
 if ($user) { // if user exists
     
 
   if ($user['phone'] === $phone) {
     echo '<script language="javascript">';
     echo 'alert("Phone Number already exists!!")';
     echo '</script>';
        
     }
     if ($user['email'] === $email) {
       echo '<script language="javascript">';
         echo 'alert("EmailId already exists!!")';
         echo '</script>';
        
     }
   }
 
 else{
     $query = "INSERT INTO student(fname,lname,semester, course_name, collegename, company,branch,email,phone,date,time)  
      VALUES('$fname','$lname', '$semester', '$course_name', '$collegename', 'infosys','$branch', '$email', '$phone',CURDATE(),CURTIME())";
    $res= mysqli_query($connection, $query);
     if($res){
       
       echo '<script language="javascript">';
       echo 'alert("Registraton successfull!")';
       echo '</script>';
    
    }
        else{
       echo '<script language="javascript">';
       echo 'alert("Registraton fails!")';
       echo '</script>';
      }
   }
 
 
 }
 ?>