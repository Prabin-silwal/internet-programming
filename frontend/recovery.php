<?php 
include 'config/config.php';
session_start();
 $name=$_SESSION['email'];

?>

 	<form action="" method="POST">
<label> Enter the code</label>
<input type="number" name="recovery">
<input type="submit" name="submit" value="submit">
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
