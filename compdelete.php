<?php

session_start();
include('connect.php');
 if(isset($_GET['id']))
 {
     $id=$_GET['id'];
     $result="DELETE from company where c_id='$id'";
     	mysqli_query($connection, $result);
         echo 'alert("Data is deleted")';
        header('location: company.php');
 
 }
 else
 {
    echo '<script language="javascript">';
    echo 'alert("Data is not deleted")';
    echo '</script>';
 }
?>