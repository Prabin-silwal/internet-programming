<?php 
include 'config/config.php';
session_start();
 $name=$_SESSION['email'];

?><!DOCTYPE html>
<html>
<head>
	<title>Recovery</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="POST">
 		 <label for="creditcard">Enter the Code:</label> <input pattern="[0-9]*" type="text" name="recovery">
<input type="submit" name="submit" value="submit" class="btn btn-success">
</body>
</html>

 	
<?php
if(isset($_POST['submit']))
{
	$sql="SELECT * FROM recoverykeys where email='$name' ";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);
	$number=$_POST['recovery'];
	if($row['recovery']==$number){
		
		 mysqli_query($conn, "DELETE FROM recoverykeys WHERE email='$name'");
		 header("location:confirm.php");
		
	}
	else
	{
		echo "failed";
	}
}
?>
