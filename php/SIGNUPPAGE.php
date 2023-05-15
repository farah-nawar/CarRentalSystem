<?php
include('SIGNUP.php');
//session_start();

?>
<script  type="text/javascript">
    function validation(){
 
  
  var pass = document.forms["myform"]["password"].value;
  var confirm = document.forms["myform"]["cpassword"].value;
  if(pass!==confirm){

  alert("password not matched!");
  }
  }
  </script>
<html>
<style type = "text/css">
        
        body {
    background: #3e4144;
    text-align: center;
    font-family: "Lucida Console", "Courier New", monospace;

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
label{
    color:white;
    text-align:center;
}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}

.button {
    margin-left:25px;
    margin-top:20px;
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
margin-top:20px;
color:white;
}
a{

color:skyblue;
}
.dropbtn {
    font-family:"Lucida Console", "Courier New", monospace;
    color: black;
    background-color:white;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width:200px;
  border-radius: 10px;
padding:10px;
margin:5px;

}

.dropdown {
  position: relative;
  display: inline-block;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}


    </style>
  <head>
         <title>Sign_Up Page</title>
         <script src="regvalidation.js"></script>
         <style type="text/css">
       body {
    background-image: url("car2.png");
    height: 100%;
    background-position: absolute;
  background-repeat: no-repeat;
  background-size: cover;

}
    </style>
  </head>
<body>
<form action="SIGNUP.php" id = "myform" method="POST" onsubmit="return validation()" name="form" class="form1" > 

                <label>First Name</label><br>
               <input type="text" placeholder="First Name" name="fname" >
           </div>

           <div>
           <div>
                <label>Last Name</label><br>
               <input type="text" placeholder="Last Name" name="lname" required >
           </div>
           <div>
                <label>ID</label><br>
               <input type="text" placeholder="ID" name="cid" required>
           </div>
    
           <div>
                 <label>Phone Number</label><br>
                <input type="tel" placeholder="ex:12345.."name="phone" required >
            </div>
            <div>
                 <label>E_mail</label><br>
                <input type="email" placeholder="example@gmail.com"name="email" required >
            </div>

            
            <div>
                 <label>Password</label><br>
                <input type="password" placeholder="******"name="password" required>
            </div>
            <div>
                 <label>Confirm Password</label><br>
                <input type="password" placeholder="******"name="cpassword" required>
            </div>
            <div>
                 <label>Driving Licence</label><br>
                <input type="text" placeholder="ex:12345.."name="Drive_licence" required>
            </div>
            
            <select id="country" name="country">
                    <option selected="">Select one...</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="China">China</option>
                    <option value="Turkey">Turkey</option>
                </select><br>
                <label for="city">city:</label><br>
                <select id="city" name="city">
                    <option selected="">Select one...</option>
                    <option value="Alexandria">Alexandria</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Beijing">Beijing</option>
                    <option value="Cairo">Cairo</option>
                </select><br>
            
            <button class="button" type="submit" value="Sign Up" name="submit">Sign Up</button>
            <p>Have an account? <a href="SIGNINPAGE.php" > Sign In</a></p>


          </form>

    </body>
</body>
</html>