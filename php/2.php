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
<?php

$sql = "SELECT * FROM Reservation as r JOIN Customer as c ON r.CID=c.CID ";
$result=mysqli_query($conn,$sql);
if(! $result ) {
    die('Could not get data: ' . mysql_error());
 }

?>  
 <section>
        <h1 id="h1">View Reservations</h1>

        <!-- Construct table-->
        <table id="table">
            <tr>
            <th id="sqra">Reservation ID</th>
            <th id="sqra">Customer ID</th>
            <th id="sqra">Customer firstname</th>
            <th id="sqra">Customer lastname</th>
            <th id="sqra">Plate ID</th>
            <th id="sqra">Payment way</th>
            <th id="sqra">Start date</th>
            <th id="sqra">End date</th>
            </tr>
            <!-- fetch data from rows ,loop till end of data-->
            <?php 
                while($row = mysqli_fetch_array($result))
                {
             ?>
            <tr id="td">
              <!--fetch data from each row of every column -->
            <td id="sqrd"><?php echo $row['ResID']; ?></td>    
            <td id="sqrd"><?php echo $row['CID']; ?></td>
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>
            <td id="sqrd"><?php echo $row['Payment_way'] ;?></td>
            <td id="sqrd"><?php echo $row['Start_date'] ;?></td>
            <td id="sqrd"><?php echo $row['End_date']; ?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>


    <form method="POST" action="report.html" name="form"> 
           <input id="btn" type="submit" value="back" name="submit"/>
           </form>
</body>
</html>