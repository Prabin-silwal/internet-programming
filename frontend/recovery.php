<?php 
include 'config/config.php';
error_reporting(0);
session_start();
$email=$_GET['name'];
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
	$name=$_SESSION['em'];
	$sql="SELECT * FROM recoverykeys where email=$email ";
	$query=mysqli_query($conn,$sql);
	
	$number=$_POST['recovery'];
	while($row=mysqli_fetch_array($query))
	{
	if($row['recovery']==$number)
	{
		$_SESSION['forgot']=$name;
		 mysqli_query($conn, "DELETE FROM recoverykeys WHERE email=$email");
		 header("location:confirm.php");
		
	}

	else
	{
		
		?>
		<script type="text/javascript">
			alert("Failed to change password");
		</script>

		<?php
	}
}
}
?>
