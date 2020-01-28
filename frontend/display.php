
<?php include 'config/config.php'; ?>
<?php
session_start();
$username=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<form action="" method="POSTvb ">
		 <div class="container-fluid">
       
        <form action="" method="GET">
<div class="container">
  <table class="table table-hover">
   <thead>
      <tr class="success">
      <th scope="col">Price</th>
      <th scope="col">Negotiable</th>
      <th scope="col">Quality</th>
       <th scope="col">Product Description </th>
      <th scope="col">Brand Name</th>
      </tr>
    </thead>
		<?php 
		$id=$_GET['id'];
$sql="SELECT * from images where id='$id'";
$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)>0)
{
	while($rows=mysqli_fetch_assoc($query))
	{
		?>

		<tr class="info">
			<td><?php echo $rows['price'];?></td>
			<td><?php echo $rows['negotiable']?></td>
			<td><?php echo $rows['quality']?></td>
			<td><?php echo $rows['description']?></td>
			<td><?php echo $rows['brand']?></td>
		</tr>
		<tr class="info">
	<td><img src="<?php echo $rows['name']?>" style="width: 500px;" >
</td></tr>
			<?php 


}
}
else
{
	?>
	<script type="text/javascript">
		alert("No data found");
	</script>
	<?php
}

?>
</table>
<input type="submit" name="buynow" class="btn btn-primary" value="Buy Now">
</form>
</body>
</html>
<?php
if(isset($_POST['buynow'])){
		echo "prabin";
}
?>