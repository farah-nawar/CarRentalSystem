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
        <h1> All Reservations for a specific customer
        </h1>
        <input type="text" placeholder="enter customer's name" name="search" id="search" required>
        <input type="submit" name="submit" class="button2" value="search"><br>
    </div>
</form>
<?php 
 if(isset($_REQUEST['submit'])){
     
 $fname=$_POST["search"];
 //echo ($start);
 $sql="SELECT
 *
FROM
 `Reservation`
JOIN Customer ON Customer.CID = Reservation.CID
JOIN Car ON car.PlateID=Reservation.PlateID
WHERE
 Customer.fname = '$fname';";
        //echo"done";
 $result=mysqli_query($conn,$sql);
 $queryresults=mysqli_num_rows($result);
  if($queryresults>0){
   // echo"mariette";
  while($row = mysqli_fetch_assoc($result)){

       ?>
      <table id="table"> 
            <tr id="td">
            <th id="sqra">Res-ID</th>
            <th id="sqra">payment-way</th>
            <th id="sqra">start-date</th>
            <th id="sqra">end-date</th>
            <th id="sqra">CID</th>
            <th id="sqra">Firstname</th>
            <th id="sqra">Lastname</th>
            <th id="sqra">Phone number</th>
            <th id="sqra">Email</th>
            <th id="sqra">Drive Licence</th>
            <th id="sqra">Address</th>
            <th id="sqra">LocID</th>
            <th id="sqra">Model</th>
            <th id="sqra">Plate-ID</th>
            </tr>
            <tr>
            <td id="sqrd"><?php echo $row['ResID']; ?></td> 
            <td id="sqrd"><?php echo $row['Payment_way']; ?></td>  
            <td id="sqrd"><?php echo $row['Start_date']; ?></td>  
            <td id="sqrd"><?php echo $row['End_date']; ?></td>  
            <td id="sqrd"><?php echo $row['CID']; ?></td>    
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['phone']?></td>
            <td id="sqrd"><?php echo $row['Email']; ?></td>
            <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
            <td id="sqrd"><?php echo $row['address']; ?></td>
            <td id="sqrd"><?php echo $row['LocID']; ?></td>
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>
            
            </tr>
             </table>
 <?php     
  }
 }
}
 ?>
</body>
</html>