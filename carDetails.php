<?php
 session_start();
 error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }
        $iddd=$_SESSION['idd'];
        // echo $iddd;
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
            
            $image=$_POST['file'];
            $fuel=$_POST['fuel'];
            $colour=$_POST['colour'];
            $reg=$_POST['reg'];
            $insurance=$_POST['insurance'];
            $reason=$_POST['reason'];
            

            $query= "INSERT INTO `car_details` (image,fuel,colour,reg_no,insurance,reason,car_id) VALUES 
            ('$image','$fuel','$colour','$reg','$insurance','$reason',$iddd)";
            $result=mysqli_query($conn,$query);
                if($result)
                {
                    header("Location: home.php");

                } else {
                    echo "<script>alert('Something Went Wrong.')</script>";
                }



        }

?>        
<html>
    <head>
        <title>Car Details</title>
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
                    color:#95c046;
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
                <br><br><br><br>
        <form name="RegForm" action="carDetails.php" method="post">    
            <table style="color: rgb(188, 230, 74);" width="100px" align="center" border-spacing="10px">
                <tr>
                    <th>Upload Image</th>
                    <td><input type="file" name="file" required></td>
                </tr>
                <tr>
                    <th colspan="2"><h6 style="font-size:25px ; color: rgb(63, 109, 170);"><br>LISTING DETAILS</h6></th>
                </tr>
                <tr>
                    <th>Fuel Type</th>
                    <td><select name="fuel" id="fuel" required >
                        <option value="Petrol">Petrol</option>
                        <option value="Diesal">Diesal</option>
                    </select></td>
                </tr>
                <tr>
                    <th>Colour</th>
                    <td><select name="colour" id="colour" required >
                        <option value="Red">Red</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Black">Black</option>
                        <option value="Grey">Grey</option>
                        <option value="Brown">Brown</option>
                        <option value="Other">Other</option>
                    </select></td>
                </tr>
                <tr>
                    <th>Registration No</th>
                    <td><input type="text" name="reg" required></td>
                </tr>
                <tr>
                    <th>Insurance Valid Till</th>
                    <td><input type="text" name="insurance" required></td>
                </tr>
                <tr>
                    <th>Tell the buyer why you should buy your car</th>
                    <td><textarea name="reason" rows="9" cols="23" required></textarea></td>
                </tr>
                <tr>
                    <th></th>
                    <td><br><input name="btn" type="submit" value="POST LISTING"></td>
                </tr>
            </table>
        </form></center>
    </body>

</html>