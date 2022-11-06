<?php
 session_start();
 error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }
        $id=$_SESSION['idd'];
        // echo $id;
            $host_name="localhost";
            $user_name="root";
            $password="";
            $db_name="used_car";
            $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
            if(!$conn){
                die("Connection Failed". mysqli_connect_error());
            }

           



?>  
<html>
    <head>
        <title>Car Edit</title>
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
            <br><br>
        <center><i style="font-size:20px;font-family:verdana;color:#228ca1;">Just Fill Your Information and Get Started </i></center><br><br>

        <?php   
        $query="SELECT sell_your_car.city,pincode,mfg,make,model,km,no_of_owners,expected_prize,name,
        mobile,email,car_details.image,fuel,colour,reg_no,insurance,reason FROM car_details,sell_your_car 
        WHERE sell_your_car.id=car_details.car_id";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
      <form name="RegForm" action="carEdit.php" method="post">
        <table style="color: rgb(188, 230, 74);" width="100px" align="center" border-spacing="10px">
            <tr>
                <th>City</th>
                <td><input type="text" name="city" value="<?php echo $row['city']; ?>" required></td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td><input type="text" name="pincode" value="<?php echo $row['pincode']; ?>" required></td>
            </tr>
            <tr>
                <th colspan="2"><h3 style="color: cornflowerblue;"><u>Car Information</u></h3></th>
            </tr>
            <tr>
                <th>MFG Year</th>
                <td><input type="text" name="mfg" value="<?php echo $row['mfg']; ?>" required></td>
            </tr>
            <tr>
                <th>Make</th>
                <td><select name="make" id="make" selected="<?php echo $row['make']; ?>" required >
                    <option value="Tata">Tata</option>
                  <option value="Ford">Ford</option>
                  <option value="Benz">Benz</option>
                  <option value="Audi">Audi</option>
                  <option value="Maruthi">Maruthi</option>
                  <option value="Hyundai">Hyundai</option>
                </select></td>
            </tr>
            <tr>
                <th>Model</th>
                <td><input type="text" name="model" value="<?php echo $row['model']; ?>" required></td>
            </tr>
            <tr>
                <th>KM's Driven</th>
                <td><input type="text" name="km" value="<?php echo $row['km']; ?>" required></td>
            </tr>
            <tr>
                <th>No of Owners</th>
                <td><input type="text" name="owners" value="<?php echo $row['no_of_owners']; ?>" required></td>
            </tr>
            <tr>
                <th>Expected Prize</th>
                <td><input type="text" name="prize" value="<?php echo $row['expected_prize']; ?>" required></td>
            </tr>
            <tr>
                <th>Upload Image</th>
                <td><img src="<?php echo $row['image']; ?>" height="150" width="150" alt="Image" required><br>
                <input type="file" name="file"></td>
            </tr>
            <tr>
                <th colspan="2"><h3 style="color: rgb(188, 230, 74);"><b><u>Contact Information</u></b></h3></th>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><input type="text" name="number" value="<?php echo $row['mobile']; ?>" required></td>
            </tr>
            <tr>
                <th>Email ID</th>
                <td><input type="text" name="email" value="<?php echo $row['email']; ?>" required></td>
            </tr>
            <tr>
                <th colspan="2"><h6 style="font-size:25px ; color: rgb(63, 109, 170);"><br>LISTING DETAILS</h6></th>
            </tr>
            <tr>
                <th>Fuel Type</th>
                <td><select name="fuel" id="fuel" selected="<?php echo $row['fuel']; ?>" required >
                    <option value="Petrol">Petrol</option>
                    <option value="Diesal">Diesal</option>
                </select></td>
            </tr>
            <tr>
                <th>Colour</th>
                <td><select name="colour" id="colour" selected="<?php echo $row['colour']; ?>" required >
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
                <td><input type="text" name="reg" value="<?php echo $row['reg_no']; ?>" required></td>
            </tr>
            <tr>
                <th>Insurance Valid Till</th>
                <td><input type="text" name="insurance" value="<?php echo $row['insurance']; ?>" required></td>
            </tr>
            <tr>
                <th>Tell the buyer why you should buy your car</th>
                <td><textarea name="reason" rows="6" cols="20" placeholder="<?php echo $row['reason']; ?>"></textarea></td>
            </tr>
            <tr>
                <th></th>
                <td><br><input name="btn" type="submit" value="UPDATE"></td>
            </tr>
            <?php
                }
            } 
            ?>
        </table>
     </form>
     <?php
      if(isset($_POST['btn']))
      {
            $city=$_POST['city'];
            $pincode=$_POST['pincode'];
            $mfg=$_POST['mfg'];
            $make=$_POST['make'];
            $model=$_POST['model'];
            $km=$_POST['km'];
            $owners=$_POST['owners'];
            $prize=$_POST['prize'];  
            $name=$_POST['name'];
            $number=$_POST['number'];
            $email=$_POST['email'];
            $image=$_POST['file'];
            $fuel=$_POST['fuel'];
            $colour=$_POST['colour'];
            $reg=$_POST['reg'];
            $insurance=$_POST['insurance'];
            $reason=$_POST['reason'];

        $query="UPDATE sell_your_car SET city='$city',pincode=$pincode,mfg='$mfg',make='$make',
        model='$model',km=$km,no_of_owners=$owners,expected_prize=$prize,name='$name',mobile=$number,email='$email' WHERE id=$id";
        $result=mysqli_query($conn,$query);
        $query1="UPDATE car_details SET image='$image',fuel='$fuel',colour='$colour',reg_no='$reg',insurance='$insurance',reason='$reason' WHERE car_id=$id";
        $resultt=mysqli_query($conn,$query1);
        if($result || $resultt){
            // echo "<script>alert('Data Updated!!.')</script>";
            header("Location: myUsedCarListing.php");
        } else {
            echo "<script>alert('Something Went Wrong.')</script>";
        }
      }
      
     ?>
    </body>
</html>