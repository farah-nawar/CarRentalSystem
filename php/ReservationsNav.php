<?php
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <title>Add New Car</title>
        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">

</head>
<form method="POST">
<div >
    <label><b>Report for spefic period</b><label>
    <br><br>
    <label><b>From:</b></label>
    <input type="date"name="Startdate" required >
    <label><b>To:<b> </label>
    <input type="date" name="Enddate" required >
    <input type="submit" name="submit"value="get all reservations and cars">
 </div> 
</form>
 <?php 
 if(isset($_REQUEST['submit'])){
     
 $start=$_POST["Startdate"];
 //echo ($start);
 $end=$_POST["Enddate"];
 $sql=" SELECT * FROM reservation AS R NATURAL JOIN Car AS c JOIN Customer AS CU 
        WHERE R.Start_date='$start' AND R.End_date='$end'";
        //echo"done";
 $result=mysqli_query($conn,$sql);
 $queryresults=mysqli_num_rows($result);
  if($queryresults>0){
   // echo"mariette";
  while($row = mysqli_fetch_assoc($result)){

      ?>
  <table id="table"> 
                <tr id="td">
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
            <td id="sqrd"><?php echo $row['fname']; ?></td>

            
        
            <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
            </tr>
             </table>
 <?php     
  }
 }
}
 ?>
 </html>
 
 