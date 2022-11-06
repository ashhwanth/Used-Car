<?php
 session_start();
 error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }

        $login_id=$_SESSION['id'];
        $carDEtailsId=$_SESSION['cardetails_id'];
        // if(isset($_SESSION['cardetails_id']))
        //     {
        //         echo $carDEtailsId;
        //     } else {
        //         echo "not Set";
        //     }
        
        // if(isset($_POST['contact_seller']))
        // {
        //     $carDEtailsId = $_REQUEST['carDetails_id'];
        //     $carDEtailsId = $_POST['carDetails_id'];
        //     echo $carDEtailsId;
        // }

        if(isset($_POST['btn']))
        {
            $host_name="localhost";
            $user_name="root";
            $password="";
            $db_name="used_car";
            $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
            if(!$conn){
                die("Connection Failed". mysqli_connect_error());
            }

            $msg=$_POST['message'];

            $query= "INSERT INTO `message` (from_id,to_id,message) VALUES 
            ($login_id,$carDEtailsId,'$msg')";
            $result=mysqli_query($conn,$query);
            if($result){
                echo "<script>alert('Message Sent.')</script>";
            }



        }
?>      
<html>
    <head>
        <title>Send Message</title>
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
        <center><h1 style="font-size:60px;font-family:verdana;color:#22464d;">USED CAR</h1>
            <a href="home.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="myUsedCarListing.php">My Used Car Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="sellYourCar.php">Sell Your Car</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="enquiries.php">Enquiries</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="editProfile.php">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="viewFullListing.php">View Full Listing</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="logout.php">Logout</a></center>
        <br><br>
        <h1 style="font-size:30px;font-family:verdana;color:#188297;"><center>SEND MESSAGE</center></h1><br>
        <!-- <p style="color: #268ca0;"> Message</p> -->
        <form name="RegForm" action="sendMessage.php" method="post">
        <!-- <?php $query1="SELECT name,mobile_number FROM registration WHERE user_id=$login_id";
                $resultt=mysqli_query($conn,$query1);
                if(mysqli_num_rows($resultt)>0)
                 {
                while($row=mysqli_fetch_assoc($resultt))
                {
                    ?>
        
        <center><input type="text" name="username" value="<?php echo $row['name']; ?>">
        <input type="text" name="number" value="<?php echo $row['mobile_number']; ?>"></center>
        <?php            
                }
                
                 }
        ?> -->
            <center><textarea rows="20" cols="100" name="message"></textarea><br><br><br>
            <input type="submit" name="btn" value="SEND"></center>
        </form>
    </body>

</html>