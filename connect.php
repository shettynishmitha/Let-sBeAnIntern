<?php
$servername="localhost";
$username="root";
$password="";
$database="let'sbeanintern";
$connection=mysqli_connect($servername,$username,$password,$database);
if(!$connection){
    echo "Error:" .mysqli_connect_error();
}