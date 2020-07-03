<?php

session_start();
include('connect.php');
 if(isset($_GET['course_id']))
 {
     $id=$_GET['course_id'];
     $result="DELETE from courses where course_id='$id'";
     	mysqli_query($connection, $result);
         echo 'alert("Data is deleted")';
        header('location: courses.php');
 
 }
 else
 {
    echo '<script language="javascript">';
    echo 'alert("Data is not deleted")';
    echo '</script>';
 }
?>