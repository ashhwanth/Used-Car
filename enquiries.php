<?php
 session_start();
 error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }

        $login_id=$_SESSION['id'];
        
        $host_name="localhost";
        $user_name="root";
        $password="";
        $db_name="used_car";
        $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
        if(!$conn){
            die("Connection Failed". mysqli_connect_error());
        }

        // if(isset($_POST['btn']))
        // {
        //    }
?>     
<html>
    <head>
        <title>Enquiries</title>
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
                 th {
                    font-size:18px;
                    font-family:verdana;
                    color:#a2ec16;
                 }
                 th, td {
                    padding-top: 10px;
                    padding-bottom: 20px;
                    padding-left: 30px;
                    padding-right: 40px;
                 }
         </style>
    </head>
    <body>  
        <center><h1 style="font-size:60px;font-family:verdana;color:#22464d;">USED CAR</h1>
        <a href="home.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="myUsedCarListing.php">My Used Car Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="sellYourCar.php">Sell Your Car</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="enquiries.php">Enquiries</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="editProfile.php">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="viewFullListing.php">View Full Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="logout.php">Logout</a></center>

        <br><br>
        <h1 style="font-size:30px;font-family:verdana;color:#188297;"><center>MESSAGES</center></h1><br>
        
        <table style="color: rgb(188, 230, 74);" width=60%" border-spacing="10px" align="center" border="1">
            <tr>
                <th>Sl. no</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>Message</th>
            </tr>  
            <?php
        $counter=0;  
        $query="SELECT registration.name,mobile_number,message.message FROM registration,message WHERE message.to_id=registration.user_id";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                  
        echo "<tr>
                <td>".  ++$counter . "</td>
                <td>".  $row['name'] ."</td>
                <td>".  $row['mobile_number'] ."</td>
                <td>".  $row['message'] ."</td>
            </tr>" ;   
            }
                echo "</table>" ;
            } else {
                echo "<script>alert('No Messages Found.')</script>";
            } 
            ?>
    </body>

</html>