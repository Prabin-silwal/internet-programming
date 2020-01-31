<?php 
include 'config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<?php
	if(isset($_POST['buynow']))
	{
	$id=$_POST['id'];
	$sql="SELECT email FROM images where id=$id";
	
	$query=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_assoc($query);
	$email=$rows['email'];
	$sq="SELECT phonenumber FROM login where email='$email'";
	$select=mysqli_query($conn,$sq);
	$row=mysqli_fetch_assoc($select);
	echo $row['phonenumber'];

}
	?>
</body>
</html>