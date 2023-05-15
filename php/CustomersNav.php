<?php 
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Navigate Customers</title>
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
</style>
    </head>

    <body>
        <?php

        $sql = "SELECT * FROM Customer as c JOIN Location as l ON c.LocID=l.LocID ";
        // $result = $conn->query($sql);
        $result=mysqli_query($conn,$sql);
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
        
   ?> 

    <section>
        <h1 id="h1">View Customers</h1>

        <form action="searchCustomers.php" class="search" style="margin:auto;max-width:300px"> <!-- action="action_page.php" -->
        <input type="text" placeholder="Search.." name="search">
             <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        </br></br>


        <!-- Construct table-->
        <table id="table">
            <tr>
            <th id="sqra">ID</th>
            <th id="sqra">Firstname</th>
            <th id="sqra">Lastname</th>
            <th id="sqra">Phone number</th>
            <th id="sqra">Email</th>
            <th id="sqra">Drive Licence</th>
            <th id="sqra">Country</th>
            <th id="sqra">City</th>
            </tr>
            <!-- etch data from rows ,loop till end of data-->
            <?php  
                while($row = mysqli_fetch_array($result))
                {
             ?>
            <tr id="td">
                <!--fetch data from each row of every column-->
            <td id="sqrd"><?php echo $row['CID']; ?></td>    
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['phone'] ;?></td>
            <td id="sqrd"><?php echo $row['Email'] ;?></td>
            <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>


    <form method="POST" action="admin.php" name="form"> 
           <input id="btn" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>