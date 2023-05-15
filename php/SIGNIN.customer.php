<html>
<?php
@include 'connection.php';
session_start();

if(isset($_POST['login'])){
$email = $_POST['email'];
$password=$_POST['password'];


$query = "SELECT * FROM  Customer WHERE Email = '$email' and password = '$password'";

$select = mysqli_query($conn, $query); 
            if (mysqli_num_rows($select) > 0) {
                $array=mysqli_fetch_array($select);
                //session_start();
                $_SESSION["email"]=$email;
                header('location: availablecars.php');}
            else{
              echo "<script>
              alert ('Incorrect data');
              window.location.href='SIGNINPAGE.php';
              </script>";
              
              }
     
        
}

              
                
                 
               
?>
</html>