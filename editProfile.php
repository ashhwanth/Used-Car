<?php
    session_start();
    error_reporting(0);
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
    }
    $id=$_SESSION['id'];
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
        <title>Edit Profile</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function()
            {
                $("#paswdbtn").click(function(){
                    $("#pashide").show();
                });
                $("#emlbtn").click(function(){
                    $("#emlshow").show();
                });
            });
        </script>
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
                 #data
                 {
                     display: none;
                 }
                 #show
                 {
                     display: true;
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

        <!-- <p style="font-size:60px;font-family:'Times New Roman';color:#22464d;"><b><tt>Register Now ?</tt></b></p><br> -->
        <center><br><br><br>
        <?php
            $query="SELECT name,mobile_number,phone,postalcode,state,address,password,email FROM registration WHERE user_id=$id"; 
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result))
                {
        ?>
        <form name="RegForm" action="editProfile.php" method="post">
            <table style="color: rgb(188, 230, 74);" width="100px" border-spacing="10px">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                </tr>
                    <th>Mobile Number</th>
                    <td><input type="text" name="mobile" value="<?php echo $row['mobile_number']; ?>" required></td>
                </tr>
                <tr>
                    <th>Phone No</th>
                    <td><input type="text" name="phone" value="<?php echo $row['phone']; ?>" required></td>
                </tr>
                <tr>
                    <th>Postalcode</th>
                    <td><input type="text" name="postalcode" value="<?php echo $row['postalcode']; ?>" required></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><select name="state" id="state" selected="<?php echo $row['state']; ?>" required >
                        <option value="Calicut">Calicut</option>
                      <option value="Kannur">Kannur</option>
                      <option value="Kasaragod">Kasaragod</option>
                      <option value="Malappuram">Malappuram</option>
                      <option value="Kochi">Kochi</option>
                      <option value="Iduki">Iduki</option>
                    </select></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" rows="6" cols="20" placeholder="<?php echo $row['address']; ?>" ></textarea></td>
                </tr>
                <tr>
                    <th colspan="2"><br><h2 style="color: rgb(188, 230, 74);">Your Login Information</h2></th>
                </tr>
                <tr>
                    <th><input type="radio" id="paswdbtn" name="lgn" value="Password"></th>
                    <td>Password</td>
                </tr>
                <tr><th><input type="text" name="password" value="<?php echo $row['password']; ?>" id="pashide" style="display: none;" ></th></tr>
                <tr>
                    <th><input type="radio" id="emlbtn" name="lgn" value="email"></th>
                    <td>Email ID</td>
                    <tr><th ><input type="email" name="email" value="<?php echo $row['email']; ?>"  id="emlshow" style="display: none;" ></th></tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" name="btn" value="Submit"></td>
                    </tr>
                </tr>
                <?php
                }
            } 
            ?>
            </table>
        </form></center>
        <?php
      if(isset($_POST['btn']))
      {
        $name=$_POST['name'];
        $mobile_number=$_POST['mobile'];
        $phone=$_POST['phone'];
        $postalcode=$_POST['postalcode'];
        $state=$_POST['state'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        
        $query="UPDATE registration SET name='$name',email='$email',password='$password',mobile_number=$mobile_number,phone=$phone,
        postalcode=$postalcode,state='$state',address='$address'  WHERE user_id=$id";
        $result=mysqli_query($conn,$query);
        if($result){
            // echo "<script>alert('Data Updated!!.')</script>";
            header("Location: home.php");
        } else {
            echo "<script>alert('Something Went Wrong.')</script>";
        }
      }
     ?>
      }

    </body>

</html>