<?php 
include 'config/config.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf/Dompdf;
$document=new Dompdf;

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
	$sql="SELECT * FROM images where id=$id";
	$query=mysqli_query($conn,$sql);

	$email=$rows['email'];
	$sq="SELECT phonenumber FROM login where email='$email'"; 
	$select=mysqli_query($conn,$sq);  
	$row=mysqli_fetch_assoc($select);
	

}
	?>
</body>
</html>