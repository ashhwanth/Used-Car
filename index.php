<?php
    $host_name="localhost";
    $user_name="root";
    $pas="";
    $db_name="used_car";
    $conn= mysqli_connect($host_name,$user_name,$pas,$db_name);
    if(!$conn){
        die("Connection Failed". mysqli_connect_error());
    }

    session_start();
    error_reporting(0);
    if(isset($_SESSION['username'])){
        header("Location: home.php");
    }

    if(isset($_POST['lgnbtn']))
     {    
     $email=$_POST['email'];
     $password=$_POST['pass'];

         $query="SELECT * FROM registration WHERE email='$email' AND password='$password'";
         $result=mysqli_query($conn,$query);
         
         if($result->num_rows > 0)
         {
            $row=mysqli_fetch_assoc($result);
            $_SESSION['username']=$row['name'];
            header("Location: home.php");
         }else {
            echo "<script> 
            alert('Invalid Email ID or Password');
            </script>";
         }
         $query1="SELECT user_id FROM registration WHERE email='$email'";
                $resultt=mysqli_query($conn,$query1);
                if(mysqli_num_rows($resultt)>0)
                 {
                while($row=mysqli_fetch_assoc($resultt))
                {
                    $_SESSION['id']=$row['user_id'];
                }
                
                 }
     }    
    //  if(isset($_POST['go_button'] || $_POST['search_button']))
    //  {
    //     echo "<script>alert('You must have an Account and Login to Access the Information.')</script>";
    //  }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Used Cars</title>
    <style>
       body {
                background-image: url('car.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;  
                background-size: cover;
                margin-left: 30px;
            }
            th, td {
                    padding-top: 10px;
                    padding-bottom: 20px;
                    padding-left: 10px;
                    padding-right: 10px;
                 }
    </style>    
</head>
<body>
     <center><h1 style="font-size:60px;font-family:verdana;color:#22464d;">USED CAR</h1>
          <p style="font-size:40px;color:#4d464c">Members Login</p></center>
        <form method="POST" action="index.php">
        <table align="center" style="font-size:20px;  width="100px" border-spacing="10px">
                <tr>
                    <th>Email ID</th>
                    <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="pass" value="<?php echo $_POST['pass']; ?>" required></td>
                </tr>
                <tr>
                    <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input name="lgnbtn" type="submit" value="Login" action="home.php">&nbsp;&nbsp;
                        <a href="register.php"><input name="regstr" type="button" value="Register Now"></a>
                    </th>
                </tr>    
        </table>
     
    <p style="font-size:60px; font-family:'Times New Roman';color:#241c03;"><b>Search ?</b></p>
    <b>Model <select name="cars" id="cars">
        <option value="Suzuki">Suzuki</option>
      <option value="Ford">Ford</option>
      <option value="Toyota">Toyota</option>
      <option value="Chevrolet">Chevrolet</option>
      <option value="Honda">Honda</option>
      <option value="Nissan">Nissan</option>
    </select>
    <!-- <form action ="index.php" method="post"> -->
    &nbsp;&nbsp;Year &nbsp;&nbsp;&nbsp;<input type="text">
    &nbsp;&nbsp;&nbsp;&nbsp;<a href="go_and_search.php"><input type="button" name="go_button" value="GO"></a><br><br>
    City &nbsp;&nbsp;&nbsp;&nbsp;<input type="text">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="go_and_search.php"><input type="button" name="search_button" value="Search"></a></b>
<!-- </form> -->

    
</body>
</html>