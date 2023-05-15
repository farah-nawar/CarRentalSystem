<?php
include('SIGNIN.php'); // Includes Login Script
if(isset($_SESSION['SIGNIN.php'])){
    header("location: homepage.php"); //Redirecting
}
?>
<html>
<style type = "text/css">
        
       body {
    background: #3e4144;
    text-align: center;
    font-family: "Lucida Console", "Courier New", monospace;
}

form {
    float:left;
    font-family:"Lucida Console", "Courier New", monospace;
    display: flex;
    flex-direction:column;
  justify-content: space-evenly;
}
.form1 {

    font-family: "Lucida Console", "Courier New", monospace;
    width: 500px;
    height:400px;
    padding: 30px 25px;
    background: rgba(100,100, 100, 0.6);
    border: black;
    border-width: 20px;
    border-radius: 10px;
    height:100%;

}
input{

    border-radius: 10px;
    padding:10px;
    margin:5px;
    width:60%;



}
.login-input {
  
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
label{
    color:white;
    font-size:20px;
    text-align:center;

}

.button {
    margin-left:180px;
    align-items:center;
    font-family:"Lucida Console", "Courier New", monospace;
    color: white;
    background-color: skyblue;
    border: 0;
    outline: 0;
    width: 30%;
    height: 30px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
    border-radius: 10px;

    
    
    
}



.button:hover{
    background-color:#002ead;
      transition: 0.7s;

}
p{

    color:white;
    font-size:20px;
}
a{

    color:skyblue;
}
    </style>
  <head>
         <title>Login Page</title>
        <script src="loginvalidation.js"></script>
    <style type="text/css">
       body {
    background-image: url("car2.png ");
    height: 100%;
    background-position: absolute;
  background-repeat: no-repeat;
  background-size: cover;
   

}
    </style>
  </head>
<body>
<form action="SIGNIN.php" id = "form1" method="POST" onsubmit="return validation()" name="form" class="form1" > 
           
           <div>
                <label>Email</label><br>
               <input type="text" placeholder="example@gmail.com" name="email" >
           </div>
           <div>
                <label>UserName</label><br>
               <input type="text" placeholder="username" name="username" >
           </div>
            <div>
                 <label>Password</label><br>
                <input type="password" placeholder="******"name="password" >
            </div>
            
           <button class="button" type="submit" value =" Log in" name="login" />Login</button>

          
          </form> 
         
    </body>
</body>
</html>