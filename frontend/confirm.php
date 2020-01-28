<?php 
include 'config/config.php';
session_start();
 $name=$_SESSION['email'];
?>
		 <form action="" method="POST">
		<label>New Password</label> <input type="password" name="password">
		<br>
		<label>Confirm Password</label> <input type="password" name="cpassword">
		 <input type="submit" name="sub" value="submit">
		 </form>
		<?php
if($_SESSION['email']==true){
		 if(isset($_POST['sub'])){
		 	$password=$_POST['password'];
		 	$cpassword=$_POST['cpassword'];
		 	if($password==$cpassword){
		 		$encrypt=sha1($password);
		 		$sql="UPDATE  login SET password='$encrypt' WHERE email='$name'";
		 		mysqli_query($conn,$sql);
		 		session_destroy();
		 		header("location:index.php");
		 	}
		 	else
		 	{
		 	?>
<script type="text/javascript">
	alert("password not changed");
	header("location:signin.php");
</script>
<?php
		 	
		 	}
		 }
		}
		else
		{
			header("location:forgot.php?message=enter the email first");
		}
?>