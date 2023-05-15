<?php 
@include 'connection.php';
session_start();
?>
 <!DOCTYPE html>
<html>
    <head>
        <title>Update Car</title>
        <link rel="stylesheet" href="style1.css">  
         <link rel="stylesheet" href="assets/images/">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <style >
        body{
            text-align:center;
            padding:50px;
            
        }

#frmd{
    margin:10px;
    border-style: solid;
    display: inline-block;

}
#frm{
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
}
input{
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
}
#btn{

    height:30px;
    width:70px;
    margin:40px;
    color:blue;
    border-style:groove;

}
   </style>
</head>
<body>
    <?php
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from Car as c JOIN Location as l ON c.LocID=l.LocID  where PlateID='$id'");
    $row=mysqli_fetch_array($query);

    if(isset($_POST['submit'])){
        $model=$_POST['model'];
        $year=$_POST['year'];
        $status=$_POST['status'];
        $inservice=$_POST['inservice'];
        $color=$_POST['color'];
        $rprice=$_POST['rprice'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $carimg=$_POST['carimg'];


        // echo "<h2>" . $id . "</h2>";

       $edit= mysqli_query($conn,"update Location as l JOIN Car as c ON c.LocID=l.LocID 
       SET Model='$model', Year='$year',Status='$status',InService='$inservice',Color='$color', 
       Rental_price_per_day='$rprice', Country='$country',City='$city',car_img='$carimg' WHERE c.PlateID='$id'");
        
        if($edit)
        {
            header("location:updatecar.php"); // redirects to all records page
            mysqli_close($conn); // Close connection
            exit;
        }
        else
        {
            echo "<script>Details used Before</script>";
            // echo mysqli_error();
        }  
    }
    ?>

    <h2 id="h1">Edit Car</h2>
    <form id="frm" method="POST">

    <div >
   <label>Model:</label> <input  id="frmd" type="text" value ="<?php echo $row['Model'];?>" name="model">
</div>

<div>
    <label>Year:</label><input id="frmd" type="text" value ="<?php echo $row['Year'];?>" name="year">
</div>
    <div>
    <label>Status:</label><input id="frmd" type="text" value ="<?php echo $row['Status'];?>" name="status">
</div>
    <div>
    <label>InService:</label><input id="frmd" type="text" value ="<?php echo $row['InService'];?>" name="inservice">
</div>
<div>
    <label>Color:</label><input id="frmd" type="text" value ="<?php echo $row['Color'];?>" name="color">
</div>
        <div>
    <label>Rental price:</label><input id="frmd" type="text" value ="<?php echo $row['Rental_price_per_day'];?>" name="rprice">
</div>
<div>
    <label>Country:</label><input id="frmd" type="text" value ="<?php echo $row['Country'];?>" name="country">
</div>
    <div>
    <label>City:</label><input id="frmd" type="text" value ="<?php echo $row['City'];?>" name="city">
</div>
<div>
    <label>Image:</label><input id="frmd" type="text" value ="<?php echo $row['car_img'];?>" name="carimg">
</div>
    <input id="btn" type="submit" name="submit" value="Submit">
    <a href="updatecar.php"> Go Back </a>
</form>


</body>
</html>