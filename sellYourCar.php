<?php
        session_start();
        error_reporting(0);
        if(!isset($_SESSION['username'])){
            header("Location: index.php");
        }
        
        $host_name="localhost";
        $user_name="root";
        $password="";
        $db_name="used_car";
        $conn= mysqli_connect($host_name,$user_name,$password,$db_name);
        if(!$conn){
            die("Connection Failed". mysqli_connect_error());
        }

        $id=$_SESSION['id'];
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

         //  echo $city,$km,$number,$email;

                $query= "INSERT INTO `sell_your_car` (city,pincode,mfg,make,model,km,no_of_owners,expected_prize,name,mobile,email,regstratn_id) VALUES 
                ('$city',$pincode,'$mfg','$make','$model',$km,$owners,$prize,'$name',$number,'$email',$id)";
                $result=mysqli_query($conn,$query);
                
                if($result)
                {
                    header("Location: carDetails.php");

                }  else {
                    echo "<script>alert('Something Went Wrong.')</script>";
                }
                $query1="SELECT id FROM sell_your_car WHERE email='$email'";
                $resultt=mysqli_query($conn,$query1);
                if(mysqli_num_rows($resultt)>0)
                {
                    while($row=mysqli_fetch_assoc($resultt))
                    {
                        $_SESSION['idd']=$row['id'];
                    }
            
                }
                
        }
        

?>
<html>
    <head>
        <title>Sell Your Car</title>
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
        <a href="logout.php">Logout</a></center><br><br>
        <center><i style="font-size:20px;font-family:verdana;color:#228ca1;">Just Fill Your Information and Get Started </i></center><br><br>

      <form name="RegForm" action="sellYourCar.php" method="post">
        <table style="color: rgb(188, 230, 74);" width="100px" align="center" border-spacing="10px">
            <tr>
                <th>City</th>
                <td><input type="text" name="city" required></td>
            </tr>
            <tr>
                <th>Pincode</th>
                <td><input type="text" name="pincode" required></td>
            </tr>
            <tr>
                <th colspan="2"><h3 style="color: cornflowerblue;"><u>Car Information</u></h3></th>
            </tr>
            <tr>
                <th>MFG Year</th>
                <td><input type="text" name="mfg" required></td>
            </tr>
            <tr>
                <th>Make</th>
                <td><select name="make" id="make" required >
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
                <td><input type="text" name="model" required></td>
            </tr>
            <tr>
                <th>KM's Driven</th>
                <td><input type="text" name="km" required></td>
            </tr>
            <tr>
                <th>No of Owners</th>
                <td><input type="text" name="owners" required></td>
            </tr>
            <tr>
                <th>Expected Prize</th>
                <td><input type="text" name="prize" required></td>
            </tr>
            <tr>
                <th colspan="2"><h3 style="color: rgb(188, 230, 74);"><b><u>Contact Information</u></b></h3></th>
            </tr>
            <tr>
                <th>Name</th>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><input type="text" name="number" required></td>
            </tr>
            <tr>
                <th>Email ID</th>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <th><input type="checkbox" name="chckbox" required></th>
                <td><p style="font-family:verdana;color:#228ca1;"> I agree with terms and conditions </p></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit"  name="btn" value="POST LISTING"></td>
            </tr>
        </table>
     </form>  
    </body>

</html>