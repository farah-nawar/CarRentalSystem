<!DOCTYPE html>
<html>
<?php 
@include'connection.php';
session_start(); 
?>
<head>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
<style>
#btn{

height:30px;
width:70px;
margin:40px;
float:left;
color:blue;
}

</style>
</head>
 <?php
    $PlateID=$_GET['id'];
    $query1=mysqli_query($conn,"update Car set Status=1 where PlateID='$PlateID'");
    $query3=mysqli_query($conn,"Delete from reservation where PlateID='$PlateID'");
    
    
    ?>
<h2 class="text-center"> Car is returned Successfully! </h2>
<form method="POST" action="CustomerReservations.php" name="form"> 
           <input id="btn" type="submit" value="back ->" name="submit"/>
           </form>
</body>

</html>