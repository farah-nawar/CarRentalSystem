<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Car_Rental_System";
$PlateId=$_POST['PlateId'];
$Model=$_POST['model'];
$year=$_POST['year'];
$color=$_POST['color'];
$Rental_price_per_day=$_POST['Rental_price_per_day'];
$transmission_type=$_POST['transmission_type'];
$car_img=$_POST['car_img'];
$country=$_POST['country'];
$city=$_POST['city'];
if($country=="Egypt" && $city=="Alexandria")
$LocId=1;
else if($country=="Egypt" && $city=="Cairo")
$LocId=2;
else if($country=="Lebanon" && $city=="Beirut")
$LocId=3;
else if($country=="China" && $city=="Beijing")
$LocId=4;
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `Car` where plateId='$plateId';";
$result = $conn->query($sql);
if ($result->num_rows == 0) 
    {
       //inserting data
    $sql="INSERT INTO `Car`( `PlateID`, `Model`, `Year`, `Color`, `Rental_price_per_day`, `LocID`, `transmission_type`,`car_img` ) VALUES( '$PlateId', '$Model', '$year', '$color', '$Rental_price_per_day', '$LocId', '$transmission_type','$car_img' );";
     if ($conn->query($sql) === TRUE) {
      echo "Car Added Successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    } 
$conn->close();
?>