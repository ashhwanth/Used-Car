<?php
 session_start();
 error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }
        $lgn_id=$_SESSION['id'];
        $sellcar_id=$_SESSION['idd'];
        // echo $sellcar_id;
            $host_name="localhost";
            $user_name="root";
            $password="";
            $db_name="used_car";
            $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
            if(!$conn){
                die("Connection Failed". mysqli_connect_error());
            }

            if(isset($_POST['delete']))
            {
                $query="DELETE FROM sell_your_car WHERE id=$sellcar_id";
                $result=mysqli_query($conn,$query);
                if($result)
                        {
                            echo "<script>alert('Data Deleted!')</script>";

                        } 
            }
?>        
<html>
    <head>
        <title>My Used Car Listing</title>
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
           
     <?php   
        $query="SELECT car_details.image,sell_your_car.city,sell_your_car.mfg,sell_your_car.model
        FROM car_details,sell_your_car WHERE sell_your_car.id=car_details.car_id AND regstratn_id=$lgn_id";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                 <table style="color: rgb(188, 230, 74);" width="100px" border-spacing="10px">
            <tr>
                <th colspan="2"><img src="<?php echo $row['image']; ?>" height="150" width="150" alt="Image"></th>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $row['city']; ?></td>
            </tr>    
            <tr>
                <th>Year</th>
                <td><?php echo $row['mfg']; ?></td>
            </tr>
            <tr>
                <th>Model</th>
                <td><?php echo $row['model']; ?></td>
            </tr>
             
            <tr>
                <th><a href="carEdit.php"><input type="button" value="Edit"></a></th>
                <th><input type="submit" name="delete" value="Delete"></th>
            </tr>
            <?php
                }
            } else {
                echo "<script>alert('No Records Found.')</script>";
            } 
            ?>    
        </table>
         
    </body>

</html>