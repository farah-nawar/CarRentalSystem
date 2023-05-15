<?php
//session_start(); // Starting Session
@include 'connection.php';
session_start();
if(isset($_POST['submit'])){
$Cid = $_POST['cid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$country=$_POST['country'];
$city=$_POST["city"];
$phone=$_POST['phone'];
$Drive_licence=$_POST['Drive_licence'];
$LocID=0;
$email = $_POST['email'];
$userpassword = $_POST['password'];


$query=  "SELECT Email FROM Customer  WHERE Email = '$email'";
                $select = mysqli_query($conn,$query); 
                if(mysqli_num_rows($select)>0)
                { 
                  echo "<script>
                   alert('The email you have entered already exists');
                   window.location.href='SIGNUPPAGE.php';
                   </script>";
                }
                else{
                    if($country=="Egypt" && $city=="Alexandria")
                        $LocID=1;
                    else if($country=="Egypt" && $city=="Cairo")
                        $LocID=2;
                    else if($country=="Lebanon"&& $city=="Beirut")
                        $LocID=3;
                    else if($country=="China"&& $city=="Beijing")
                        $LocID=4;
                        echo "<h2>" . $LocID . "</h2>";

                      $sql = "INSERT INTO Customer(Cid,fname,lname,phone,Email,password,address,Drive_licence,LocID) VALUES ($Cid,'$fname','$lname','$phone',
                      '$email','$userpassword','$country $city','$Drive_licence',$LocID);";
                     
                      if ($conn->multi_query($sql) === TRUE) {
                        session_start();
                        $_SESSION["email"]=$email;
                        header("location:availablecars.php");
                    
                      } 
                      else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                    
                     
                      
                      $conn->close();
          

                }}

?>