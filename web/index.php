<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BANKEND INDEX</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <!-- <a href="index.html"><img src="images/logo.png" alt=""/></a> -->
  </div>
  <h2 class="form-heading">Admin login</h2>
  <div class="app-cam">
	  <form method="post">
		<input type="text"  name="email"  placeholder="Enter Email" >
		<input type="password" name="password"  placeholder="Enter Password" >
		<div class="submit"><input type="submit"  value="Login" name="login"></div>
	</form>
  </div>
   <div class="copy_layout login">
      <p>Copyright &copy; 2022 Admin. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
   </div>
</body>
</html>
<?php

include "config.php";

    if(isset($_POST['login']))
    {
        extract($_POST);

        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        
        $log=mysqli_query($conn,"select * from admin where Email='$email' and Password='$password'") or die (mysqli_error($conn));
            
        if(mysqli_num_rows($log)>0)
        {
            $fetch=mysqli_fetch_array($log);
            
            $_SESSION['id']=$fetch['id'];
            $_SESSION['email']=$fetch['Email'];
            
            
            echo "<script>";
            //echo "alert('Login Successfull');";
            echo 'window.location.href="index1.html";';
            echo "</script>";
        }else
        {
            echo "<script>";
            echo "alert('Login Failed');";
            echo "</script>";
            
        }
        
    }

?>