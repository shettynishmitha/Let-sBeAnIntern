<?php
session_start();

if(!isset($_SESSION["sess_user"]))
{
  header("location:admin.php");
}
else
{
include('connect.php');
if(isset($_POST['passet'])){
   
    $id = $_POST['id'];
    $cpass =$_POST['cpass'];
      $npass =  $_POST['npass'];
    $user_check_query = "SELECT * FROM users WHERE username='$id' AND password='$cpass' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $id) {
        
  
  
        $query = "UPDATE users SET password='$npass' WHERE username='$id'";
        mysqli_query($connection, $query);
        if(mysqli_query($connection,$query)){
           
		
				
            echo '<script language="javascript">';
            echo 'alert("Password Updated Successfully!!")';
            echo '</script>';
          }
          else{
            echo '<script language="javascript">';
            echo 'alert("Password Updation Failed!!")';
            echo '</script>';
          } 
    }
}
else{
    echo '<script language="javascript">';
    echo 'alert("Invalid Data!!")';
    echo '</script>';
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
	
	<link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
        $(document).ready(function() {
          $('#example').DataTable();
      } );
</script>
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
		width: 1000px;
		margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
</style>
</head>
<body>
<body data-spy="scroll" data-target="#navbarResposive">

	<div id="home">

		<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-center fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><h1>Let'sBeAnIntern</h1></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResposive">
					<span class="navbar-toggler-icon"></span>
                </button>
                
				<div class="collapse navbar-collapse" id="navbarResposive">
					<ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a href="registrations.php" class="nav-link">Registrations</a>
                        </li>
						
						<li class="nav-item">
							<a class="nav-link" href="company.php">Company</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="courses.php">Courses</a>
						</li>
						<li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#pass_data_Modal">Change Password</a>
						</li>
						<li>
                        <a href="logout.php" class="btn btn-primary btn-lg">LOGOUT</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>


		<div class="table-responsive">
                    <div class="container">
        <div class="table-wrapper">
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-auto" width="100%   ">
                <thead>
                    <tr>
                            <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Course</th>
                                    <th>Company</th>
                                    <th>Semester</th>
                                    <th>Branch</th>
                                    <th>College</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                                </tr>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connect.php');
                     $query = "SELECT * from student";
                     $results = mysqli_query($connection, $query);
                     if (mysqli_num_rows($results) > 0) {
                       while( $row = mysqli_fetch_assoc($results)){
                    
                    echo '<tr>
                        <td>'.$row["fname"] .'</td>
                        <td>'.$row["lname"] .'</td>
                        <td>'.$row["email"] .'</td>
                        <td>'.$row["phone"] .'</td>
                        <td>'.$row["course_name"] .'</td>
                        <td>'.$row["company"] .'</td>
                        <td>'.$row["semester"] .'</td>
                        <td>'.$row["branch"] .'</td>
                        <td>'.$row["collegename"] .'</td>
                        <td>'.$row["date"] .'</td>
                        <td>'.$row["time"] .'</td>
                        <td>
							
                            <a class="delete" href="regdelete.php?id=' . $row['id'] .'" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>';
                       }
                    }
                    ?> 
                </tbody>
                <tfoot>
                    <tr>
                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Course</th>
                                    <th>Company</th>
                                    <th>Semester</th>
                                    <th>Branch</th>
                                    <th>College</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Delete</th>
                    </tr>
                </tfoot>
            </table>
						
					</div>
				</div>
				</div>
                <div id="pass_data_Modal" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       <div class="modal-body">
           <form method="post" action="">
    <label>User Id</label>
                 <input type="text" name="id"  class="form-control" required />

                <br />  
                <label>Current Password</label>
                <input type="password" name="cpass"  class="form-control" required />
               <br>
               <label>New Password</label>
                <input type="password" name="npass"  class="form-control" required />
               <br>
                <input type="submit" name="passet" id="passet" value="UPDATE" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div> 
					</div>
				</div>
               	
		
   
</body>
</html>      