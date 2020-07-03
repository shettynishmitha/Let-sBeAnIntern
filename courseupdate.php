<?php

session_start();
include('connect.php');
 if(isset($_GET['course_id']))
 {
     $id=$_GET['course_id'];
     if (isset($_POST['update'])) {
        // receive all input values from the form
        $opt= mysqli_real_escape_string($connection, $_POST["opt"]); 
        $val= mysqli_real_escape_string($connection, $_POST["val"]);   
         
        $query = "Update courses set $opt='$val' WHERE course_id='$id'";
        $result = mysqli_query($connection, $query);
        
        if($result){
          
          echo '<script language="javascript">';
          echo 'alert("Data Updation is successfull!")';
          echo '</script>';
          header('location: courses.php');
        }
        else
        {
            echo '<script language="javascript">';
          echo 'alert("Data Updation Failed!")';
          echo '</script>';
        }
     }
     
    }
    else
    {
        echo '<script language="javascript">';
      echo 'alert("Data Updation Failed!")';
      echo '</script>';
    }
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Update Course</title>
<style>
body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
        margin-top:100px;
        background-image:url('admin/reg.png');
        background-repeat:no-repeat;

  background-position: center center;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #464646;
	}
    .table-wrapper {
		width: 500px;
        height:300px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .form-control{
        width:200px;
        padding-left:10px;
    }
    select{
        margin-left:130px;
    }
    input{
        margin-left:130px;
    }
    input[type='submit']{
        margin-left:180px;
        width:100px;
    }

    </style>
</head>
<body>
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
               
                <div class="col-sm-12"><h2 style="text-align:center">Course Update</b></h2></div><hr/>
                
                </div>
                </div>
                   <!-- <label class="label">City:</Label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text"placeholder="enter city"><br><br> -->
                   <div class="row">
               
                <div class="col-sm-12">
                   <form method="post" action=" ">
                   
                 
               <select name="opt" class="form-control" >
                   <option value="slots" class="form-control">Slots</option>
                   <option value="price" class="form-control">Amount</option>
                   <option value="details" class="form-control">Details</option>
                   
                   </select>
               <br />
              
               <input type="text" class="form-control" name="val" required></textarea>
               <br />
               <input type="submit" id="update" name="update"  class="btn btn-primary center" />
                    
               </form>
               </div>
               </div>
        </div>
</div>
</body>
</html>

   