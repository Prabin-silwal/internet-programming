<?php  session_start(); 
include 'config/config.php';
$mail=$_SESSION['email'];
$s="SELECT verified from login where email='$mail'";
$query=mysqli_query($conn,$s);
$rows=mysqli_fetch_assoc($query);
if($rows['verified']==1)
{
	header("location:sirproduct.php");
}
else
{
	?>

<script type="text/javascript">
	alert("Email has been sent");
</script>
	<?php
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="" method="POST">
	<div class="form-group">
  <label for="usr">Enter the Code:</label>
  <input type="number"  class="form-control" id="usr" name="code">
  <input type="submit" name="submit" value="Verify" class="btn btn-primary">
</div>
</form>
<a href="sirproducts.php" class="btn btn-primary"></i>Skip</a>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$email=$_SESSION['email'];
	$code=$_POST['code'];
	$sql="SELECT recovery from recoverykeys where email='$email'";
	$select=mysqli_query($conn,$sql);
	$rows=mysqli_fetch_assoc($select);
	$value=1;
	if($rows['recovery']==$code)
	{
		$sq="UPDATE login
      SET verified='$value'
      WHERE email='$email'";
     
      mysqli_query($conn,$sq);
      mysqli_query($conn, "DELETE FROM recoverykeys WHERE email='$email'");
      header("location:sirproduct.php");
	}

}
?>