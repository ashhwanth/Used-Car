<?php
    error_reporting(0);

    session_start();
    if(isset($_SESSION['username'])){
        header("Location:index.php");
    }
    if(isset($_POST['submitbtn']))
    {
        $host_name="localhost";
        $user_name="root";
        $pas="";
        $db_name="used_car";
        $conn= mysqli_connect($host_name,$user_name,$pas,$db_name);
        if(!$conn){
            die("Connection Failed". mysqli_connect_error());
        }
        
         $username=$_POST['username'];
         $email=$_POST['confirm_email'];
         $password=$_POST['password'];
         $cpassword=$_POST['cpassword'];
         $mobile_number=$_POST['mobile'];
         $phone=$_POST['phone'];
         $postalcode=$_POST['postalcode'];
         $state=$_POST['state'];
         $address=$_POST['address'];

         if($password == $cpassword)
         {
            $query="SELECT * FROM registration WHERE email='$email'"; 
            $result=mysqli_query($conn,$query);
            if(!mysqli_num_rows($result > 0)){
                $sql = "INSERT INTO registration(name,email,password,mobile_number,phone,postalcode,state,address) VALUES 
                ('$username','$email','$password',$mobile_number,$phone,$postalcode,'$state','$address')";
                $result=mysqli_query($conn,$sql);
                
                if($result){
                    header("Location: index.php");
                    // echo "<script>alert('Registration Success!!.')</script>";
                    $username= "";
                    $email= "";
                    $_POST['password']= "";
                    $_POST['cpassword']= "";
                } else {
                    echo "<script>alert('Something Went Wrong.')</script>";
                }
               } else {
                echo "<script>alert('Email Already Exists!.')</script>";
            }
         } else {
             echo "<script>alert('Password not Matched.')</script>";
         }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body {
                 background-image: url('carr.jpg');
                 background-repeat: no-repeat;
                 background-attachment: fixed;  
                 background-size: cover;
                 
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
     <script>
                function validation() {
            var name =
                document.forms["RegForm"]["name"];
            var email =
                document.forms["RegForm"]["email"];
            var confirm_email =
                document.forms["RegForm"]["confirm_email"]; 
            var password =
                document.forms["RegForm"]["Password"];
            var password1 =
                document.forms["RegForm"]["Password1"];     
            var mobile =
                document.forms["RegForm"]["mobile"];
            var phone =
                document.forms["RegForm"]["phone"];
            var postalcode =
                document.forms["RegForm"]["postalcode"];
            var address =
                document.forms["RegForm"]["address"];

            if (name.value == "") {
                window.alert("Please enter your name.");
                name.focus();
                return false;
            }

            if (email.value == "") {
                window.alert(
                "Please enter a valid e-mail address.");
                email.focus();
                return false;
            }
            if (email.value !=confirm_email.value) {
                window.alert("Email doesnt match!");
                email.focus();
                return false;
            } 
            if (password.value == "") {
                window.alert("Please enter your password");
                password.focus();
                return false;
            }
            
            if (password.value !=cpassword.value) {
                window.alert("Password doesnt match!");
                password.focus();
                return false;
            }
            if (mobile.value == "") {
                window.alert(
                "Please enter your mobile number.");
                phone.focus();
                return false;
            }
            if (phone.value == "") {
                window.alert(
                "Please enter your phone number.");
                phone.focus();
                return false;
            }
            if (postalcode.value == "") {
                window.alert("Please enter your Postal Code.");
                postalcode.focus();
                return false;
            }
            if (address.value == "") {
                window.alert("Please enter your address.");
                address.focus();
                return false;
            }
            
            return true;
        }
     </script>
     </head>
<body>

    <center><h1 style="font-size:60px;font-family:verdana;color:#22464d;">USED CAR</h1>
        <p style="font-size:60px;font-family:'Times New Roman';color:#22464d;"><b><tt>Register Now ?</tt></b></p><br>

        <form name="RegForm" action="register.php" onsubmit="return validation()" method="post">
            <table style="color: rgb(188, 230, 74);" width="100px" border-spacing="10px">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <th>Confirm Email</th>
                    <td><input type="email" name="confirm_email" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <th>Confirm Password</th>
                    <td><input type="password" name="cpassword" required></td>
                </tr>
                <tr>
                    <th>Mobile Number</th>
                    <td><input type="text" name="mobile" required></td>
                </tr>
                <tr>
                    <th>Phone No</th>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <th>Postalcode</th>
                    <td><input type="text" name="postalcode" required></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><select name="state" name="state" required >
                        <option value="Calicut">Calicut</option>
                      <option value="Kannur">Kannur</option>
                      <option value="Kasaragod">Kasaragod</option>
                      <option value="Malappuram">Malappuram</option>
                      <option value="Kochi">Kochi</option>
                      <option value="Allappi">Allappi</option>
                      <option value="Trivandrum">Trivandrum</option>
                      <option value="Kollam">Kollam</option>
                      <option value="Pathanamthitta">Pathanamthitta</option>
                      <option value="Kottayam">Kottayam</option>
                      <option value="Thrissur">Thrissur</option>
                      <option value="Palakkad">Palakkad</option>
                      <option value="Wayanadu">Wayanadu</option>

                    </select></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" rows="6" cols="20" required></textarea></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input name="submitbtn" type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
        <p style="font-size:60px;font-family:'Times New Roman';color:#ffffff;"><b>Already a User?
             <a href="index.php">Login</a></b></p><br>
</body>
</html>