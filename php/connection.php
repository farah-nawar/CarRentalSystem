<?php 

$conn = mysqli_connect('localhost','root','','Car_rental_system');
// Check connection
//Create Connection
if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	  }
    
	return $conn;

?>