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
    <h1> Daily payments</h1>
    <input type="date" name="date" id="date" required>
    <input type="submit" name="submit" class="button2" value="search"><br>
</div>
</form> 
<?php 
 if(isset($_REQUEST['submit'])){
     
 $date=$_POST["date"];
 $sql="SELECT
 SUM(Rental_price_per_day) as sum
FROM
 `Car`
JOIN Reservation ON Car.PlateID = Reservation.PlateID
WHERE
 '$date' BETWEEN Reservation.Start_date AND Reservation.End_date;";
        //echo"done";
 $result=mysqli_query($conn,$sql);
 $queryresults=mysqli_num_rows($result);
 if($queryresults>0){
    // echo"mariette";
   while($row = mysqli_fetch_assoc($result)){
 
        ?>
       <table id="table"> 
             <tr id="td">
             <th id="sqra">Daily Payments</th>
             </tr>
             <tr>
             <td id="sqrd"><?php echo $row['sum']; ?></td> 
             
             </tr>
              </table>
  <?php     
   }
 }
}
 ?>
</body>
</html>