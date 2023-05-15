<?php 
@include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Search</title>
        <link rel="stylesheet" href="style.css">  
       <style>

form.search input[type=text] {
  padding: 6px;
  font-size: 10px;
  border: 1px solid grey;
  float: left;
  width: 60%;
  background: #f1f1f1;
}

form.search button {
  float: left;
  width: 20%;
  padding: 6px;
  background: #2196F3;
  color: white;
  font-size: 10px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

</style>
    </head>

    <body>

   
    <?php 
    if((isset($_REQUEST["search"]))&&(isset($_REQUEST["choice"]))){
       $search= $_REQUEST["search"];
       $choice= $_REQUEST["choice"]; 
       $status="4";
        $inservice="4";
        if(!strcasecmp($search,"available"))
        $status="1";
        if(!strcasecmp($search,"reserved"))
        $status="0";
        if(!strcasecmp($search,"active"))
        $inservice="1";
        if(!strcasecmp($search,"inactive"))
        $inservice="0";
       if(!strcasecmp($choice,"Car")){
        

        $sth ="SELECT distinct * FROM Car as c JOIN Location as l ON c.LocID=l.LocID  left join reservation as r on r.PlateID=c.PlateID left JOIN Customer as cu on cu.CID=r.CID
        WHERE Color Like '$search%' OR Year Like '$search%' OR Country Like '$search%' or City Like '$search' OR InService Like '$inservice%' Or Status Like '$status%' or Model like '$search%'"; 
        //or Color Like '$search%' or PlateID Like '$search%' 
       //echo "$search  ";
       $query=mysqli_query($conn,$sth);
         $res=mysqli_num_rows($query);

                  if( $res> 0 ) {
                    echo "Search result of: " . $search . "</h2>";
                    ?>
                  
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
                    <th id="sqra">Address</th>
                    <th id="sqra">Image</th>
                    <th id="sqra">Customer ID</th>
                    <th id="sqra">Firstname</th>
                    <th id="sqra">Lastname</th>
                    <th id="sqra">Phone number</th>
                    <th id="sqra">Email</th>
                    <th id="sqra">Drive Licence</th>
                    
        
                    </tr>

                  <?php
                     while($row=mysqli_fetch_assoc($query)){
                       ?>
                <!--fetch data from each row of every column-->
                <tr id="td">
            <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
            <td id="sqrd"><?php echo $row['Model']; ?></td>
            <td id="sqrd"><?php echo $row['Year']; ?></td>
            <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
            <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
            <td id="sqrd"><?php echo $row['Color']; ?></td>
            <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
            <td id="sqrd"><?php echo $row['Country']; ?></td>
            <td id="sqrd"><?php echo $row['City']; ?></td>
            <td id="sqrd"><?php echo $row['Address']; ?></td>
            <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
            <td id="sqrd"><?php echo $row['CID']; ?></td>    
            <td id="sqrd"><?php echo $row['fname']; ?></td>
            <td id="sqrd"><?php echo $row['lname']; ?></td>
            <td id="sqrd"><?php echo $row['phone'] ;?></td>
            <td id="sqrd"><?php echo $row['Email'] ;?></td>
            <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
            
           

            </tr><?php
                  } ?>
                   </table>
                   

<a id="btn" style="width:70px;height:20px;" href="updatecar.php"> Go Back </a>

<?php
   }
     else {
       echo "there are no results matching your search";
        //die('Could not get data: ' . mysql_error());
     }
   
 }

   if(!strcasecmp($choice,"Reservation")){

       
    $sth ="SELECT distinct * FROM reservation as r JOIN  Car as c on c.PlateID=r.PlateID join Location as l on l.LocID=c.LocID join Customer as cu on cu.CID=r.CID
    WHERE Payment_way Like '$search%' OR Start_date Like '$search%' OR End_date Like '$search%'  "; 
    // 
    //or Color Like '$search%' or PlateID Like '$search%' 
   //echo "$search  ";
   $query=mysqli_query($conn,$sth);
     $res=mysqli_num_rows($query);

              if( $res> 0 ) {
                echo "Search result of: " . $search . "</h2>";
                ?>
              
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
                <th id="sqra">Address</th>
                <th id="sqra">Image</th>
                <th id="sqra">Customer ID</th>
                <th id="sqra">Firstname</th>
                <th id="sqra">Lastname</th>
                <th id="sqra">Phone number</th>
                <th id="sqra">Email</th>
                <th id="sqra">Drive Licence</th>
                <th id="sqra">Reservation ID</th>
                    <th id="sqra">Payment way</th>
                    <th id="sqra">Start date</th>
                    <th id="sqra">End date</th>
                
    
                </tr>

              <?php
                 while($row=mysqli_fetch_assoc($query)){
                   ?>
            <!--fetch data from each row of every column-->
            <tr id="td">
        <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
        <td id="sqrd"><?php echo $row['Model']; ?></td>
        <td id="sqrd"><?php echo $row['Year']; ?></td>
        <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
        <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
        <td id="sqrd"><?php echo $row['Color']; ?></td>
        <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
        <td id="sqrd"><?php echo $row['Country']; ?></td>
        <td id="sqrd"><?php echo $row['City']; ?></td>
        <td id="sqrd"><?php echo $row['Address']; ?></td>
        <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
        <td id="sqrd"><?php echo $row['CID']; ?></td>    
        <td id="sqrd"><?php echo $row['fname']; ?></td>
        <td id="sqrd"><?php echo $row['lname']; ?></td>
        <td id="sqrd"><?php echo $row['phone'] ;?></td>
        <td id="sqrd"><?php echo $row['Email'] ;?></td>
        <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
        <td id="sqrd"><?php echo $row['ResID']; ?></td> 
          <td id="sqrd"><?php echo $row['Payment_way'] ;?></td>
          <td id="sqrd"><?php echo $row['Start_date'] ;?></td>
          <td id="sqrd"><?php echo $row['End_date']; ?></td>
        
       

        </tr><?php
              } ?>
               </table>
               

<a id="btn" style="width:70px;height:20px;" href="updatecar.php"> Go Back </a>

<?php
}
 else {
   echo "there are no results matching your search";
    //die('Could not get data: ' . mysql_error());
 }



        
     }
     if(!strcasecmp($choice,"Customer")){

       
      $sth ="SELECT distinct * FROM Customer as cu JOIN Location as l ON cu.LocID=l.LocID  left join reservation as r on r.CID=cu.CID left JOIN Car as c on c.PlateID=r.PlateID
      WHERE fname Like '$search%' OR lname Like '$search%' OR Country Like '$search%' or City Like '$search%' or Email Like '$search%' or phone Like '$search%' "; 
      // 
      //or Color Like '$search%' or PlateID Like '$search%' 
     //echo "$search  ";
     $query=mysqli_query($conn,$sth);
       $res=mysqli_num_rows($query);
  
                if( $res> 0 ) {
                  echo "Search result of: " . $search . "</h2>";
                  ?>
                
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
                  <th id="sqra">Address</th>
                  <th id="sqra">Image</th>
                  <th id="sqra">Customer ID</th>
                  <th id="sqra">Firstname</th>
                  <th id="sqra">Lastname</th>
                  <th id="sqra">Phone number</th>
                  <th id="sqra">Email</th>
                  <th id="sqra">Drive Licence</th>
                  <th id="sqra">Reservation ID</th>
                    <th id="sqra">Payment way</th>
                    <th id="sqra">Start date</th>
                    <th id="sqra">End date</th>
                  
      
                  </tr>
  
                <?php
                   while($row=mysqli_fetch_assoc($query)){
                     ?>
              <!--fetch data from each row of every column-->
              <tr id="td">
          <td id="sqrd"><?php echo $row['PlateID']; ?></td>    
          <td id="sqrd"><?php echo $row['Model']; ?></td>
          <td id="sqrd"><?php echo $row['Year']; ?></td>
          <td id="sqrd"><?php if( $row['Status']==1) echo"available"; else echo"reserved";?></td>
          <td id="sqrd"><?php if($row['InService'] ==1) echo"active"; else echo"out of service";?></td>
          <td id="sqrd"><?php echo $row['Color']; ?></td>
          <td id="sqrd"><?php echo $row['Rental_price_per_day']; ?></td>
          <td id="sqrd"><?php echo $row['Country']; ?></td>
          <td id="sqrd"><?php echo $row['City']; ?></td>
          <td id="sqrd"><?php echo $row['Address']; ?></td>
          <td id="sqrd"><img src="<?php echo $row['car_img']?> "width="70" height="50"></td>
          <td id="sqrd"><?php echo $row['CID']; ?></td>    
          <td id="sqrd"><?php echo $row['fname']; ?></td>
          <td id="sqrd"><?php echo $row['lname']; ?></td>
          <td id="sqrd"><?php echo $row['phone'] ;?></td>
          <td id="sqrd"><?php echo $row['Email'] ;?></td>
          <td id="sqrd"><?php echo $row['Drive_licence']; ?></td>
          <td id="sqrd"><?php echo $row['ResID']; ?></td> 
          <td id="sqrd"><?php echo $row['Payment_way'] ;?></td>
          <td id="sqrd"><?php echo $row['Start_date'] ;?></td>
          <td id="sqrd"><?php echo $row['End_date']; ?></td>
         
  
          </tr><?php
                } ?>
                 </table>
                 
  
  <a id="btn" style="width:70px;height:20px;" href="updatecar.php"> Go Back </a>
  
  <?php
  }
   else {
     echo "there are no results matching your search";
      //die('Could not get data: ' . mysql_error());
   }
  
  
  
          
       }

       }?>
       

    
    <form method="POST" action="Advancedsearch.php" name="form"> 
           <input id="btn" style="width:90px;height:30px;" type="submit" value="back ->" name="submit"/>
           </form>
</body>
  
</html>