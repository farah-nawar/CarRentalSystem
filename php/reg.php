<?php
$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "registration";
$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];
// Create connection
$conn = new mysqli($servername, $username, $password1, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//checking for duplicates
$sql = "SELECT * FROM `user` where email='$email';";
$result = $conn->query($sql);
if ($result->num_rows == 0) 
    {
       //inserting data
     $sql = "INSERT INTO user ( name ,password ,email)
      VALUES ('$name','$password','$email')";
      
      if ($conn->query($sql) === TRUE) {
        echo "Welcome $name";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } 
    else {
        echo "<script>
alert('The email you have entered already exists');
window.location.href='index.html';
</script>";
    }


$conn->close();
?>
