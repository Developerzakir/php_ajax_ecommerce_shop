<?php 


$host     = "localhost";
$username = "root";
$password = "";
$database = "phpEcom";


//database connection 
$conn = mysqli_connect($host,$username,$password, $database);

if (!$conn) {
	die("connection falied" . mysqli_connect_error());
	
}
 

 ?>