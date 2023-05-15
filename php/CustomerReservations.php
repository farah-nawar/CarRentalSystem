<?php 
@include 'connection.php';
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Navigate Reservations</title>
        <link rel="stylesheet" href="style.css">  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/user.css">
        <link rel="stylesheet" href="assets/w3css/w3.css">
        <style>

body {


margin-left:50px;
  color: black;

 
  }
#sqra{
  margin:20px;
  padding:30px;
}

tr{

  border-style: solid;
}
#table{
  border-style: solid;

}
td{
 padding:10px;
  padding-left:30px;
}
#form1{
  margin-bottom:30px;
  display:float;
  float:right;

}

#search{
width:200px;
border-radius:5px;
height:30px;
  margin-bottom:30px;

}
#btn{

  height:30px;
  width:70px;
  margin:40px;
  float:right;
  color:blue;
}
#btn2{

height:30px;
width:70px;
margin:40px;
float:right;
color:blue;
}
#btn.hover{
  color:skyblue;
}

</style>
    </head>

    <body>
        <?php
        $email= $_SESSION['email'];
        $sql = "SELECT * FROM Reservation as r JOIN Customer as c ON r.CID=c.CID  where c.Email='$email'";
        $result=mysqli_query($conn,$sql);
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
        
        
   ?> 

    <section>
        <h1 id="h1">View Reservations</h1>

        <form action="ReservationSearch.php"  class="search" style="margin:auto;max-width:300px">
        <input type="text" placeholder="Search.." name="search">
             <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        </br></br>

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
            <th id="sqra">pay status</th>
           
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
            <td id="sqrd"><?php echo $row['Pay_status']; ?></td>
            <!-- <td id="sqrd"><?php if( $row['Pay_status']==1) echo"paid";else echo '<a href="pay.php?id= <?php echo ($ResID)?>">Not Paid</a>'?> </td> -->
            <td id="sqrd"><a href="pay.php?id=<?php echo $row['ResID']; ?>">Pay Now</a></td>
            <td id="sqrd"><a href="return.php?id=<?php echo $row['PlateID'];?>">Return</a></td>
            <td id="sqrd"><a href="pickup.php?id=<?php echo $row['ResID'];?>">Pick up</a></td>
            </tr>
            <?php
                }
                
             ?>
        </table>
    </section>


    <form method="POST" action="availablecars.php" name="form"> 
           <input id="btn" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>