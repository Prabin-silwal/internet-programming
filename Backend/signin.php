<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style >
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 350px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
</head>
<body>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                              <div class="text-danger"><?php  if(isset($_GET['message'])) {$message=$_GET['message'];echo $message;}?></div>
                                <label for="email" class="text-info">Username:</label><br>
                                <input type="text" name="email" id="username" class="form-control" placeholder="username(eg xyz@gmail.com)">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="password" >
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember" type="checkbox"></span></label><br>
                        
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                                &nbsp;<a href="forgot.php" class="btn btn-info btn-md">Forgot </a>
                            </div>
                            <br>
                            <div id="register-link" class="text-right">
                    <strong></strong>Don't have account!
                 <a href="signup.php" class="btn btn-info btn-md" >Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php 
include 'config/config.php';
if(isset($_POST['submit'])){
session_start();
$password=sha1($_POST['password']);
$email=$_POST['email'];
$sql="SELECT * FROM admin WHERE email='$email'AND password='$password'";
$select=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($select);
if($row['email']==$email && $row['password']==$password)
{

  $_SESSION['admin']=$email;
  if(!empty($_POST['remember'])) 
  {
  setcookie ("admin",$_POST['email'],time()+ 3600*30);
  $_COOKIE['admin']=$cookie;
  }
   header("location:index.php"); 
}
else
{

}
}
$conn->close();
?>