<?php 
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>View Cars</title>
        <link rel="stylesheet" href="style1.css">  
         <link rel="stylesheet" href="assets/images/">
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

        $sql = "SELECT * FROM Car as c JOIN Location as l ON c.LocID=l.LocID ";
        $result=mysqli_query($conn,$sql);
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
         }
        
   ?> 

    <section>
        <h1 id="h1" style="padding:30px;">View Cars</h1>
        <form method="POST" action="addnewcar.html" name="form"> 
          <input id="btn" style="width:100px;height:40px;" type="submit" value="Add Car" name="add"/>
          </form >

        <form id="form1" action="searchCars.php" class="search" style="margin:auto;max-width:300px"> 
        <input id="search" type="text" placeholder="Search.." name="search">
             <button type="submit"><i class="fa fa-search"></i></button>
        </form>



        <!-- Construct table-->
        <table id="table">
            <tr>
            <th id="sqra">Plate ID</th>
            <th id="sqra">Model</th>
            <th id="sqra">Year</th>
            <th id="sqra">Status</th>
            <th id="sqra">InService</th>
            <th id="sqra">Color</th>
            <th id="sqra">Rental price</th>
            <th id="sqra">Country</th>
            <th id="sqra">City</th>
           
            <th id="sqra">Image</th>
            <th id="sqra">Action</th>

            </tr>
            <!-- fetch data from rows ,loop till end of data-->
            <?php   
                while($row = mysqli_fetch_array($result))
                {
             ?>
            <tr id="td">
                <!--fetch data from each row of every column-->
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
        
            <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
            <td id="sqrd"><a href="editCar.php?id=<?php echo $row['PlateID']; ?>"><i class='fa fa-edit'></i></a></td>
            </tr>
          
            <?php
                }
             ?>
        </table>
    </section>
    
    <form method="POST" action="admin.html" name="form"> 
           <input id="btn2" style="width:90px;height:30px;" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>
<?php require "connect.php"?>
<?php
if(isset($_POST['update']))
{
    /*$plate = $_POST['plateno'];
	$modelc= $_POST['model'];
    $yearr = $_POST['year'];
    $colorr = $_POST['color'];
    $transm = $_POST['trans'];
    $stat= $_POST['purpose'];
	$office=$_POST['officeid'];
	$price=$_POST['priceperday'];
    $image=$_POST['imagel'];
    $platetemp=$_POST['plateno']; */ 
    $recipe_id= $_POST['recipe_id'];
    $user_id =$_POST['user_id'];
    $dish_type =$_POST['dish_type'];
    $description=$_POST['description'];
    $prep_time=$_POST['preptime'];
   $servings=$_POST['servings'];
   $image=$_POST['img_url'];
   $name=$_POST['name'];


    // $insert = $conn->prepare("INSERT INTO `car`(`plate_no`, `model`, `year`, `color`, `transmission`, `status`
    // , `office_id`, `priceperday`, `image`)
    //  VALUES(:plateno, :model, :year, :color, :trans,:purpose, :officeid, :priceperday, :imagel)");
    // $insert = $conn->prepare(");
   $sql = "UPDATE `recipe` SET recipe_id=?,user_id=?,dish_type=?,description=?,
   preptime=?,servings=?,img_url=?,name=?WHERE recipe_id=?";
   $stmt= $conn->prepare($sql);
   $stmt->execute([$recipe_id, $user_id, $dish_type, $description,$prep_time,$image,$name]);

     
     
      

        header('location:./adminlandpage.html');
    }
     


?>
<html>

<head>
<meta charset="UTF-8">
<title>
  update car
</title>
<link rel="stylesheet" href="../css/styleupdate.css">
<!-- <script defer src="register.js" > </script> -->

</head>

<body>
<div class="headers">
   
   <a href="../Adminlandpage.html" class ="sign" style="background: #000;
            color: #FFF;
            padding: 10px;
            margin-top: 70px;
            margin-left: 5px;
            border-radius: 3rem;">Admin Page</a>
 </div>
    <form id="updatecar" action="update.php"  method="post">
        <fieldset id="Databox" >
            <div id="error" style=" text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
            color: red;">
            <!-- <p><?php echo $output ?></p> -->
          
            <br>
            <label id="recipe_id">Recipe Id</label>
            <br>
            <input id="recipe_id" type="text" name="recipe_id" placeholder="recipe id" value="<?php echo $row["recipe_id"];?>">
            <br>
            <br>
            <label id="user_id">User Id</label>
            <br>
            <input id="user_id" type="text" name="user_id" placeholder="Uder id" value="<?php echo ["user_id"];?>">
            <br>
            
            <label id="dish_type">Dish Type</label>
            <br>
                <input id="dish_Type"  name="dish_type" placeholder="Dish type"  value="<?php echo $row["dish_type"];?>">
            <br>
            <label id="description">Description</label>
            <br>
                <input id="description"  name="description" placeholder="description" value="<?php echo $row["description"];?>">
            <br>
            <label id="preptime">Prep time</label>
            <br>
                <input id="preptime"  name="preptime" placeholder="prep-time"value="<?php echo $row["preptime"];?>">
            <br>
            <label id="servings">Servings</label>
            <br>
                <input id="servings"  name="servings" placeholder="servings" value="<?php echo $row["servings"];?>">
            <br>
            <label id="image">Image</label>
            <br>
                <input id="image"  name="image" placeholder="image" value="<?php echo $row["img_url"];?>">
            <br>
            <label id="name">Name</label>
            <br>
                <input id="name"  name="name" placeholder="recipe name" value="<?php echo $row["name"];?>">
            <br>
            
    
 
</select>
              
            <button id="Addbtn" name="update" type="submit " style="text-align: center;
            font-size: 24px;
            margin: auto;
          display: grid;
          margin-top: 16px;
            color: white;
            padding: 8px;
            background-color: #000000; ">Update Recipe </button>
            

  
    </fieldset>
    
            
</form>
       
    


</body>
</html>
