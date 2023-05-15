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
<body>
<form method="POST">

<div>
    <h1> Status of all cars</h1>
    <label for="date">enter the required day</label>
    <input type="date"  name="date" id="date" required>
    <input type="submit" name="submit" class="button2" value="search"><br>
</div>
</form>
<?php 
 if(isset($_REQUEST['submit'])){
 $date=$_POST["date"];
 //query1
 $sql="SELECT * FROM `Reservation` WHERE 1;";
 $result=mysqli_query($conn,$sql);
 $queryresults=mysqli_num_rows($result);
 //query2
 $sql2="SELECT * FROM `Car` WHERE car.Status= 1;";
 $result2=mysqli_query($conn,$sql2);
 $queryresults2=mysqli_num_rows($result2);
 if($queryresults2>0){
    // echo"mariette";
   while($row = mysqli_fetch_assoc($result2)){
 
        ?>
       <table id="table"> 
             <tr id="td">
             <th id="sqra">PlateID</th>
             <th id="sqra">Status</th>
             </tr>
             <tr>
             <td id="sqrd"><?php echo $row['PlateID']; ?></td> 
             <td id="sqrd"><?php echo $row['Status']; ?></td>  
             
             </tr>
              </table>

              <?php
   }}
             if($queryresults>0){
              // echo"mariette";
              while($row = mysqli_fetch_assoc($result)){

               ?>
              <table id="table"> 
             <tr id="td">
             <th id="sqra">PlateID</th>
             <th id="sqra">Status</th>
             </tr>
             <tr>
             <td id="sqrd"><?php echo $row['PlateID']; ?></td> 
             <td id="sqrd"><?php 
             if(($date > $row["Start_date"]) && ($date <$row["End_date"]) ) echo'0'; else echo'1';
             ?></td>
             </tr>
             </table>
 <?php     
  }
 }
}
 ?>
</body>
</html>