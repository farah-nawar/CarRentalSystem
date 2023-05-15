<?php 
session_start();
require './connection2.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./addnewcar.css">
    <title>car-rental</title>
</head>
<body class="background">
    
    <h1 class="title">Add New Car</h1>
    <div >
        <form class="text" action="addnewcar.php" method="post">
                <label for="PlateId">PlateID:</label><br>
                <input type="text" name="PlateId" id="PlateId" class="text2"><br>
                <label for="Model">Model:</label><br>
                <input type="text" name="model" id="model"class="text2"><br>
                <label for="Year">Year:</label><br>
                <input type="text" name="year" id="year"class="text2" ><br>
                <label for="color">Color:</label><br>
                <input type="text" name="color" id="color" class="text2"><br>
                <label for="transmission_type">transmission type:</label><br>
                <input type="text" name="transmission_type" id="transmission_type" class="text2"><br>
                <label for="Rental_price_per_day">Rental price/day:</label><br>
                <input type="text" name="Rental_price_per_day" id="Rental_price_per_day" class="text2"><br>
                <label for="country">country:</label><br>
                <select id="country" name="country">
                    <option selected="">Select one...</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="China">China</option>
                    <option value="Turkey">Turkey</option>
                </select><br>
                <label for="city">city:</label><br>
                <select id="city" name="city">
                    <option selected="">Select one...</option>
                    <option value="Alexandria">Alexandria</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Beijing">Beijing</option>
                    <option value="Cairo">Cairo</option>
                </select><br>
                <label for="car_img">Select image:</label><br>      
   <input type="file" id="car_img" name="car_img" accept="image/*"><br>
        <input type="submit" class="button" value="Add" name="submit"><br>
    </form>
    
    </div>

    <?php
if(isset($_POST['submit'])){
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
}
?>
</body>
</html>
