<?php
include('connect.php');



 // REGISTER USER
 if (isset($_POST['cadd'])) {
   // receive all input values from the form
   $cname = mysqli_real_escape_string($connection, $_POST["cname"]); 
   $city= mysqli_real_escape_string($connection, $_POST["city"]);   
   $about = mysqli_real_escape_string($connection, $_POST["details"]);  
  
   
   // first check the database to make sure 
   // a user does not already exist with the same phone
 
   $user_check_query = "SELECT * FROM company WHERE c_name='$cname'";
   $result = mysqli_query($connection, $user_check_query);
   $user = mysqli_fetch_assoc($result);
   
 if ($user) { // if user exists
     
 
   if ($user['c_name'] === $cname) {
     echo '<script language="javascript">';
     echo 'alert("Company already exists!!")';
     echo '</script>';
        
     }
   }
 
 else{
     $query = "INSERT INTO company(c_name, city, details) VALUES('$cname','$city', '$about')";
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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Table with Add and Delete Row Feature</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
	<link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #404E67;
        background: #F5F7FA;
		font-family: 'Open Sans', sans-serif;
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
            var cname = $row.find("td:nth-child(1)").text().toLowerCase();
            console.log(cname);
            if(cname.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
							<div class="input-group">								
								<input type="text" id="search" class="form-control" placeholder="Search by Company Name">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a  class="btn btn-info add-new" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>City</th>
                        <th>About</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include('connect.php');
                     $query = "SELECT * from company";
                     $results = mysqli_query($connection, $query);
                     if (mysqli_num_rows($results) > 0) {
                       while( $row = mysqli_fetch_assoc($results)){
                    
                    echo '<tr>
                        <td>'.$row["c_name"].'</td>
                        <td>'.$row["city"].'</td>
                        <td>'.$row["details"].'</td>
                        <td>
                            <a class="delete" href="compdelete.php?id=' . $row['c_id'] .'" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
           <form method="post" action="">
    <label>Company Name</label>
                 <input type="text" name="cname"  class="form-control" required />

                <br />  
                <label>City</label>
                <input type="text" name="city"  class="form-control" required />
                <br />
                <label>About</label>
                <textarea class="form-control" rows="5" name="details"></textarea>
                <br />
                <input type="submit" name="cadd" id="insert" value="Insert" class="btn  btn-lg" />
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div> 
</body>
</html>                            