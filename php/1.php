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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="addnewcar.css">
    <title>Document</title>
</head>
<body >
    
    <form method="POST">

    <div>
        <h1> All Reservations
        </h1>
        <label><b>From:</b></label>
        <label for="Startdate">Start date</label>
        <input type="date" name="Startdate" id="Startdate" required>
        <label><b>To:<b> </label>
        <label for="Enddate">End date</label>
        <input type="date" name="Enddate" id="Enddate" required>
        <br>
        <input type="submit" name="submit" class="button2" value="Search"><br>
    </div>
</form>
<?php 
 if(isset($_REQUEST['submit'])){
     
 $start=$_POST["Startdate"];
 //echo ($start);
 $end=$_POST["Enddate"];
 $sql="SELECT
 *
FROM
 `Reservation`
JOIN Customer ON Reservation.CID = Customer.CID
JOIN Car ON Reservation.PlateID = Car.PlateID
WHERE
 Reservation.Start_date='$start' AND Reservation.End_date='$end';";
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
            <td id="sqrd"><img src="./<?php echo $row['car_img']?> "width="70" height="50"></td>
            
            </tr>
             </table>
 <?php     
  }
 }
}
 ?>
</body>
</html>