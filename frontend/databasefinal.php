<?php 
session_start();
include 'config/config.php';
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
$conn->close();
?>