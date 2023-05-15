<?php

function Connect()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Car_Rental_System";

	//Create Connection
	$conn = new mysqli($servername, $username, $password, $dbname); 
	// Check connection
	if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	  }
    
	return $conn;
}
?>