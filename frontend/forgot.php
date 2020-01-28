
<?php 
include 'config/config.php';
session_start();
if (isset($_POST['submit']))
{
	
	$username=$_POST['email'];
	$_SESSION['email']=$username;
	$recovery=rand(10000,99000);
	$sq="SELECT * FROM login where email='$username'";
 $query=mysqli_query($conn,$sq);
   if(mysqli_num_rows($query)>0)
    {
      $rows=mysqli_fetch_assoc($query);
      	if($rows['email']==$username)
      	{	
      		$sql="INSERT INTO recoverykeys(recovery,email) VALUES('$recovery','$username') ";
      		$echo =mysqli_query($conn,$sql);
		    	$sub = " Do not reply!!Recovery Password";
		    	mail($username,$sub,$recovery);
		    	header("location:recovery.php?name=$name");
          die();
      		
      	}
      	else 
        {
  			 echo "no email address found!";
      		
      	}


}
else
{
  echo "No email Address Found";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recovery</title>
</head>
<body>
	<form method="POST" action="">
 <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
              <div class="text-danger"><?php  if(isset($_GET['message'])) {$user=$_GET['message'];echo $user;}?></div> 

		 <label>Enter Your Email Address:</label>
        <input name="email" class="form-control" placeholder="Email address" type="email" id="email">
      
    </div> 
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>