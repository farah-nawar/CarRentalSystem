<?php
// include('login');


@include 'connection.php';
session_start();

if (!isset($_SESSION['email'])) {
    //session_destroy();
    header("location: SIGNINPAGE.php");
}
?>
<?php
        if(isset($_POST['submit'])){
            
            $paymentway=$_POST['payment-way'];
            $startdate=$_POST['start_date'];
            $enddate=$_POST['end_date'];
            $paystatus=$_POST['pay_status'];
            

            $email= $_SESSION['email'];
            $result = mysqli_query($conn,"SELECT CID FROM customer WHERE Email='$email'");
            $CID = mysqli_fetch_array($result);
          
            $PlateID=$_POST['id'];
            $result2 = mysqli_query($conn,"SELECT * FROM car WHERE PlateID='$PlateID'");
            $row1 = mysqli_fetch_array($result2);
            $result1 = mysqli_query($conn,"SELECT * FROM reservation WHERE PlateID='$PlateID'");
            $row = mysqli_fetch_array($result1);
            if($row1['Status']==0){
               if(($startdate >= $row["Start_date"])  ||   ($enddate <= $row["End_date"])   ){
                   echo "<script>
                   alert ('Car reserved in this date');
                   window.location.href='availablecars.php';
                   </script>";
                   
               }
               
            }
            
            
           
            
           $sql1="INSERT INTO Reservation( CID,PlateID,Payment_way,Start_date,End_date,Pay_status)
               VALUES('$CID[0]','$PlateID','$paymentway' ,'$startdate','$enddate','$paystatus');" ;
            $sql2="UPDATE Car SET Status='0' where PlateID='$PlateID'";
                if ($conn->multi_query($sql1)&&$conn->multi_query($sql2) === TRUE) {
                   
                  } else {
                    echo "Error: $paystatus" ;
                  }
        }
        else
          echo 'error';
        ?>
        <head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"> </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>

<body ng-app="">


    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="availablecars.php">
                    APOLLO CAR RENTAL </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
             if(isset($_SESSION['email'])){
                ?>
               <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                   <ul class="nav navbar-nav">
                   <li>
                           <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                       </li>
                   </ul>
           
               </div>
                  <?php }
   
                   else {
               ?>
   
               <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                   <ul class="nav navbar-nav">
                   
                       <li>
                           <br>
                           <input type="text" name="search"  placeholder="Search here...">
                       </li>
                       <li>
                           <a href="availablecars.php">Home</a>
                       </li>
                   </ul>
               </div>
                   <?php   }
            ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Booking Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for reserving from APOLLO Car Rental! </h2>
    <a href="availablecars.php?id=<?php echo ($PlateID) ?>">
    <p style="text-align:center;"><input id="btn" type="submit"  value="back to home page" class="btn btn-success pull-center"></p>
   
</body>