<?php 
include 'config/config.php';
?>
<?php
session_start();
if(isset($_POST['submit'])){
	echo "here";
	die();
$name=$_POST['name'];
$repassword=$_POST['repassword'];
$password=$_POST['password'];
$encrypt=sha1($password);
$email=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$sq="SELECT email FROM login";
$select=mysqli_query($conn,$sq);
while($rows=mysqli_fetch_assoc($select))
{
	$record[]=$rows;
}
foreach ($record as $key ) 
{
	if($email!=$key['email'])
	{
			
	}
	else 
	{
		 header("location:signup.php?user=username already taken!!");
		die();
	}
}
if($password==$repassword)
			{
					$sql="INSERT into login(name,email,phonenumber,password) values('$name','$email',
					'$phonenumber','$encrypt' )";
					mysqli_query($conn,$sql);
					$_SESSION['email']=$email;
					 header("location:sirproduct.php");
	}
	else 
			{
			 header("location:signup.php?message=password did not match");
			}
	}
	
 ?>