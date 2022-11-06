<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Home</title>
        <style>
            body {
                     background-image: url('carrr.jpg');
                     background-repeat: no-repeat;
                     background-attachment: fixed;  
                     background-size: cover;
                 }
                 a {
                    font-size:18px;
                    font-family:verdana;
                    color:#3fb845;
                 }
         </style>
    </head>
    <body>  
        


    <?php    
        $host_name="localhost";
        $user_name="root";
        $password="";
        $db_name="used_car";
        $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
        if(!$conn){
            die("Connection Failed". mysqli_connect_error());
        }
        
    ?>
        <center><h1 style="font-size:60px;font-family:verdana;color:#22464d;">USED CAR</h1>
        <a href="home.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="myUsedCarListing.php">My Used Car Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="sellYourCar.php">Sell Your Car</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="enquiries.php">Enquiries</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="editProfile.php">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewFullListing.php">View Full Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="logout.php">Logout</a></center>
        <br><br>
        
        <i><h4 style="font-size:30px;font-family:verdana;color:#3fb845;">
         <?php echo "Welcome " . $_SESSION['username']; ?>  ,</h4></i> 
        <center><p style="font-size:40px;font-family:verdana;color:#3fb845;"><tt>Sell or Buy Used Cars</tt></p></center>
      
    </body>

</html>