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
    <h1> Enter the plate Id of the car you want to delete</h1>
    <input type="text"  placeholder="Plate ID.." name="plateid" id="plateid" required>
    <input type="submit" name="submit" class="button2" value="Delete"><br>
</div>
</form> 
<?php 
 if(isset($_REQUEST['submit'])){
     
 $id=$_POST["plateid"];
 $sql="DELETE
 FROM
     `Car`
 WHERE
     PlateID='$id';";
        //echo"done";
 $result=mysqli_query($conn,$sql);
 $queryresults=mysqli_num_rows($result);
 echo 'deletion done successfully';
}
 ?>
</body>
</html>