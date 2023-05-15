<?php
// include('login');


@include 'connection.php';
session_start();
?>
<?php
            $ResID=$_GET['id'];       
            $result = mysqli_query($conn,"SELECT * from Reservation  WHERE ResID='$ResID'");
            $row = mysqli_fetch_array($result);
             if($row['Pay_status']==0){
                $sql2="UPDATE Reservation SET Pay_status=1 where ResID='$ResID'";
                if ($conn->multi_query($sql2)=== TRUE) {
                   
                  } else {
                    echo "Error: $pay_status" ;
                  }
             }
                
            

            
           
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
                           <a href="homepage.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
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
            
            <?php
             if($row['Pay_status']==0){
                ?>
               <</div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Payment Confirmed.</h1>
        </div>
    </div>
    <br>

    <h2 class="text-center"> Thank you for paying! </h2>
    <a href="homepage.php?id=<?php echo ($PlateID) ?>">
    <p style="text-align:center;"><input id="btn" type="submit"  value="back to home page" class="btn btn-success pull-center"></p>
                  <?php }
   
                   else {

               ?>
               </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center" style="color: green;"><span class="glyphicon glyphicon-ok-circle"></span> Already paid</h1>
        </div>
    </div>
    <br>

   
    <?php   }
            ?>
                   
            <!-- /.navbar-collapse -->
        
   
</body>