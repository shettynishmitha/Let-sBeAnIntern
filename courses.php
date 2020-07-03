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





if(isset($_POST['cadd'])){
   // receive all input values from the form
   $cname = mysqli_real_escape_string($connection, $_POST["cname"]); 
   $company= mysqli_real_escape_string($connection, $_POST["company"]);   
   $slots = mysqli_real_escape_string($connection, $_POST["slots"]);  
   $details = mysqli_real_escape_string($connection, $_POST["details"]);  
   $amount = mysqli_real_escape_string($connection, $_POST["amount"]);  
   

   $user_check_query = "SELECT * FROM courses WHERE company='$company'";
   $result = mysqli_query($connection, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   
 if ($user) { 
     
 
   if ($user["course_name"] === $cname) {
     echo '<script language="javascript">';
     echo 'alert("Course already exists!!")';
     echo '</script>';
        
     }
     else{
        $query = "INSERT INTO courses(course_name, company, slots,price,details) VALUES('$cname','$company', '$slots','$amount','$details')";
       $res= mysqli_query($connection, $query);
        if($res){
          
          echo '<script language="javascript">';
          echo 'alert("Data Insertion successfull!")';
          echo '</script>';
       
       }
    }
}
 else{
     $query = "INSERT INTO courses(course_name, company, slots,price,details) VALUES('$cname','$company', '$slots','$amount','$details')";
    $res= mysqli_query($connection, $query);
     if($res){
       
       echo '<script language="javascript">';
       echo 'alert("Data Insertion successfull!")';
       echo '</script>';
    
    }
        else{
       echo '<script language="javascript">';
       echo 'alert("Data Not Inserted!")';
       echo '</script>';
      }
   }
 
 
 }

}
 
 ?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta id="viewport" content="width=device-width, initial-scale=1">
	<title>Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
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
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    

.input-group-addon {
    width:40px;
    background-color: #5bc0de;
}
    .table-title .add-new {
        float: right;
		height: 30px;
		font-weight: bold;
		font-size: 12px;
		text-shadow: none;
		min-width: 100px;
		border-radius: 50px;
		line-height: 13px;
    }
	.table-title .add-new i {
		margin-right: 4px;
	}
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
	table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table td a.add i {
        font-size: 24px;
    	margin-right: -1px;
        position: relative;
        top: 3px;
    }    
 
.input-group .form-control {
    height: 50px;
   
}
	table.table .form-control.error {
		border-color: #f50000;
	}
	table.table td .add {
		display: none;
    }
i.material-icons
{
    padding:10px;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltips
	$('[data-toggle="tooltip"]').tooltip();
    
	// Filter table rows based on searched term
    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var cid = $row.find("td:nth-child(1)").text().toLowerCase();
            console.log(cid);
            if(cid.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});
$('#update_data_Modal').on('show.bs.modal', function (event) {
  let courseid= $(event.relatedTarget).data('bookid') 
  $(this).find('.modal-body input').val(courseid)
})
// $(document).on("click", ".add", function(){
// 		var empty = false;
// 		var input = $(this).parents("tr").find('input[type="text"]');
//         input.each(function(){
// 			if(!$(this).val()){
// 				$(this).addClass("error");
// 				empty = true;
// 			} else{
//                 $(this).removeClass("error");
//             }
// 		});
// 		$(this).parents("tr").find(".error").first().focus();
// 		if(!empty){
// 			input.each(function(){
// 				$(this).parent("td").html($(this).val());
// 			});			
// 			$(this).parents("tr").find(".add, .edit").toggle();
// 			$(".add-new").removeAttr("disabled");
// 		}		
//     });
// $(document).on("click", ".edit", function(){		
//         $(this).parents("tr").find("td:not(:last-child)").each(function(){
// 			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
// 		});		
// 		$(this).parents("tr").find(".add, .edit").toggle();
// 		$(".add-new").attr("disabled", "disabled");
//     });
</script>
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
                        <a href="admin.php" class="btn btn-primary btn-lg">LOGOUT</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>


		
                    <div class="table-responsive">
                    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4"><h2>Course <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
							<div class="input-group">								
								<input type="text" id="search" class="form-control" placeholder="Search by Course Name">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a  class="btn btn-info add-new" id="add" id="add" data-toggle="modal" data-target="#add_data_Modal"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course name</th>
                        <th>Company</th>
                        <th>Slots</th>
                        <th>Amount</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connect.php');
                     $query = "SELECT * from courses";
                     $results = mysqli_query($connection, $query);
                     if (mysqli_num_rows($results) > 0) {
                       while( $row = mysqli_fetch_assoc($results)){
                    
                    echo '<tr>
                        <td>'.$row["course_name"].'</td>
                        <td>'.$row["company"].'</td>
                        <td>'.$row["slots"].'</td>
                        <td>'.$row["price"].'</td>
                        <td>'.$row["details"].'</td>
                        <td>
                         
                        <a class="edit"  href="courseupdate.php?course_id=' . $row["course_id"] .'" title="Edit"  ><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" href="coursedelete.php?course_id=' . $row["course_id"] .'" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>';
                       }
                    }
                    ?>
                       
                </tbody>
            </table>
        </div>
    </div>    
    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       <div class="modal-body">
           <form method="post" action="courses.php">
    <label>Course Name</label>
                 <input type="text" name="cname"  class="form-control" required />

                <br />  
                <label>Company</label>
                <select class="form-control" name="company">
                <?php
                include('connect.php');
                $query="select c_name from company";
                 $result = mysqli_query($connection, $query);
                 if (mysqli_num_rows($result) > 0) {
                    while( $row = mysqli_fetch_assoc($result)){
                       echo ' <option value="'.$row["c_name"].'">'.$row["c_name"].'</option>';
                      }}
               ?>
               </select>
               <br>
               <label>Slots</label>
                 <input type="number" name="slots"  class="form-control" required />

                <br />
                <label>Amount</label>
                 <input type="number" name="amount"  class="form-control" required />

                <br />
                <label>Details</label>
                <textarea class="form-control" rows="5" name="details" required></textarea>
                        <br>
                <input type="submit" name="cadd" value="Insert" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
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