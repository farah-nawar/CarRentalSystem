<?php 
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./addnewcar.css">
       <style>
* {
    box-sizing: border-box;
  }
  
  body, html {
    height: 100%;
  }
.text{
    
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
        color: white;
        font-weight: bold;
        border: 3px solid #f1f1f1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 60%;
        padding: 20px;
        text-align: center;  
      
}
.text2{
    border-radius: 10px;
    border: none;
}
.background{
    background-image: url(./background.jpeg);
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    

}
.title{
    background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
        color: white;
        font-weight: bold;
        border: 3px solid #f1f1f1;
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        width: 60%;
        padding: 20px;
        text-align: center;

}
div{
padding:20px;
}
#btn{
    padding:0px;
    width:100px;
    height:30px;
  border-radius:5px;
    border: 3px solid #f1f1f1;
}
#search{
width:200px;
height:30px;
margin:30px;
border: 3px solid #f1f1f1;
border-radius:5px;

}
</style>
    </head>
    <body class="background">
    <div class="text">
    <h1>Advanced Search by:</h1>
    <form  action="AdvancedSearchBack.php" name="form1" class="search"> 
  <input id="car"type="radio" name="choice" value="Car">
  <label for="car">Car</label><br>
  <input id="cus"type="radio"  name="choice" value="Customer">
  <label for="cus">Customer</label><br>
  <input id="res"type="radio"  name="choice" value="Reservation">
  <label for="res" >Reservation</label><br>
  <input id="search" type="text" placeholder="Search.." name="search">
 <input id="btn"   type="submit" />  
</form>
    <div>
       
</div>
</div>
    
</body>
  
</html>