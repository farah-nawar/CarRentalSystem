<!DOCTYPE html>
<html>
<?php

@include 'connection.php';
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAR RENTAL SYSTEM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    
<style type="text/css">
       body {
    background-image: url("background.jpeg");
    height: 100%;
    background-position: absolute;
  background-repeat: no-repeat;
  background-size: cover;
   

}
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" >

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="homepage.php">
                    APOLLO </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">

                        <li>
                            <br>
                            <form action="search.php" class="search" style="margin:auto;max-width:300px">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <li>
                            <a href="homepage.php">Home</a>
                        </li>
                        <li>
                            <a href="SIGNINPAGE.php">Customer</a>
                        </li>
                        <li>
                            <a href="SigninAdmin.php">Admin</a>
                        </li>
                    </ul>
                </div>
                        <!-- /.navbar-collapse -->
        </div>
       <!-- /.container -->
    </nav>
    <div class="bgimg-1">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <p class="brand-heading" style="color: white">
                              Welcome to APOLLO
                            </p>
                            <p class="intro-text">
                                Online car rental service
                            </p>
                            <a href="#sec2" class="btn btn-circle page-scroll blink">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Currently Available Cars</h3>
        <br>
        <section class="menu-content">
                    </section>

        <section class="menu-content">
        <?php
            // session_start(); 
            if (isset($_SESSION['Email'])) {
                $Email = $_SESSION["Email"];
                $sql1 = "SELECT c.PlateID, c.Model, c.Year, c.Status, c.InService, c.Color, c.Rental_price_per_day, c.car_img, c.LocID
             FROM customer  as cu JOIN location as l ON cu.LocID=l.LocID JOIN Car as c ON c.LocID=l.LocID 
             WHERE cu.Email='$Email'";

                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        $PlateID = $row1["PlateID"];
                        $Model = $row1["Model"];
                        $Year = $row1["Year"];
                        $Status = $row1["Status"];
                        $InService = $row1["InService"];
                        $Color = $row1["Color"];
                       $Rental_price_per_day = $row1["Rental_price_per_day"];
                        $LocID = $row1["LocID"];
                        $car_img = $row1["car_img"];
            ?>
                        <a href="details2.php?id=<?php echo ($PlateID) ?>">
                            <div class="sub-menu">


                                <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
                                <h5> <?php echo $Model; ?> </h5>


                            </div>
                        </a>
                    <?php }
                } else {
                    ?>
                    <h1> No cars available :( </h1>
                <?php
                }
            } else {
                ?>
        </section>

        <section class="menu-content">
            <?php
                $sql1 = "SELECT * FROM car WHERE InService=1 ||status=1";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $PlateID = $row1["PlateID"];
                        $Model = $row1["Model"];
                        $Year = $row1["Year"];
                        $Status = $row1["Status"];
                        $InService = $row1["InService"];
                        $Color = $row1["Color"];
                       $Rental_price_per_day = $row1["Rental_price_per_day"];
                        $LocID = $row1["LocID"];
                        $car_img = $row1["car_img"];
            ?>
                   <a href="details2.php?id=<?php echo ($PlateID) ?>">
                    
                        <div class="sub-menu">


                            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
                            <h5> <?php echo $Model; ?> </h5>


                        </div>
                    </a>
                <?php }
                } else {
                ?>
                <h1> No cars available :( </h1>
        <?php
                }
            }
        ?>
        </section>

    </div>
                              

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>

</html>