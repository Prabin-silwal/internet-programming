<!DOCTYPE html>
<html>
<head>
  <title>Signin</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style >
@import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');

body{
  background-image: url("https://images.pexels.com/photos/891252/pexels-photo-891252.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
  background-position: center;
    background-origin: content-box;
    background-repeat: no-repeat;
    background-size: cover;
  min-height:100vh;
  font-family: 'Noto Sans', sans-serif;
}
.text-center{
  color:#fff; 
  text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;
    display: block;
    text-align: center;
}
.box{
  position:absolute;
  left:50%;
  top:50%;
  transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
  border-radius:3px;
  padding:70px 100px;
}
.input-container{
  position:relative;
  margin-bottom:25px;
}
.input-container label{
  position:absolute;
  top:0px;
  left:0px;
  font-size:16px;
  color:#fff; 
    pointer-event:none;
  transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.input-container input:focus{ 
 border:none; 
 outline:none;
 border-bottom:1px solid #e74c3c; 
}
.btn{
  color:#fff;
  background-color:#e74c3c;
  outline: none;
    border: 0;
    color: #fff;
  padding:10px 20px;
  text-transform:uppercase;
  margin-top:50px;
  border-radius:2px;
  cursor:pointer;
  position:relative;
}
.input-container input:focus ~ label,
.input-container input:valid ~ label{
  top:-12px;
  font-size:12px;
  
}

</style>
</head>
<body>
<div class="box">
  <form action="" method="POST">
    <span class="text-center">login</span>
    <div class="text-danger"><?php  if(isset($_GET['message'])) {$message=$_GET['message'];echo $message;}?></div>
    <br>
  <div class="input-container">
    <input type="email" name="email" required=""/>
    <label>Email</label>    
  </div>
  <div class="input-container">   
    <input type="password" name="password"required=""/>
    <label>Password</label>
  </div>
  <div class="input-container">
    <label>Remember me</label>
    <input id="remember-me" name="remember" type="checkbox" >
     <input type="submit" class="btn" name="submit" value="Login">
<a href="forgot.php" class="btn btn-info btn-md" style="margin-left: 20px;">Forgot </a>
  <a href="signup.php" class="btn btn-info btn-md" >Sign Up</a>
  </div>
</form> 
</div>
</body>
</html>
<?php 
session_start();
include 'config/config.php';
if(isset($_POST['submit']))
{
$password=sha1($_POST['password']);
$email=$_POST['email'];
$sql="SELECT * FROM login WHERE email='$email'AND password='$password'";
$s="SELECT verified from login where email='$email'";
$query=mysqli_query($conn,$s);
$rows=mysqli_fetch_array($query);
$select=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($select);
if($row['email']==$email && $row['password']==$password)
{

  $_SESSION['email']=$email;
  if(!empty($_POST['remember'])) 
  {
  setcookie ("username",$_POST['email'],time()+ 3600*30);
  }
  if($rows['verified']==0)
  {
  $code=rand(10000,99000);
  $sql="INSERT INTO recoverykeys(recovery,email) VALUES('$code','$email') ";
    mysqli_query($conn,$sql);
  $sub = "Verification Code";
  mail($email,$sub,$code);
   header("location:verify.php"); 
}
else {
  header("location:sirproduct.php");
}
  
}
else
{
   header("location:signin.php?message=username or password Error!!");
}
}
$conn->close();
?>



                            