
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
		 <div class="container-fluid">      
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
$sql="SELECT * from images where id=$id";
$query=mysqli_query($conn,$sql);
		if(mysqli_num_rows($query)>0)
{
	while($rows=mysqli_fetch_assoc($query))
	{
		?>

		<tr class="info">
			<td style="width: 200px;"><?php echo $rows['price'];?></td>
			<td><?php echo $rows['negotiable']?></td>
			<td><?php echo $rows['quality']?></td>
			<td><?php echo $rows['description']?></td>
			<td><?php echo $rows['brand']?></td>
		</tr>
		<tr class="info">
			
	<td><img src="<?php echo $rows['name']?>" style="width: 200px;" >
</td></tr>
<tr>
	<td>
</td>
</tr>			
<?php 
}

?>
<tr>
	<td>
<div class="container">
 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Buy Now</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body">
           <table class="table table-hover">
   <thead>
      <tr class="success">
      <th scope="col">Owner name</th>
      <th scope="col">Phone number</th>
      
      </tr>
    </thead>
    <?php
    $id=$_GET['id'];
    $sql="SELECT * FROM images where id=$id";
	$query=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($query);
	$email=$r['email'];
	$sq="SELECT * FROM login where email='$email'"; 
	$select=mysqli_query($conn,$sq);  
	$row=mysqli_fetch_assoc($select);
?>
	<tr><td style="width: 50px;"><?php echo $row['name'];?></td>
		<td><?php echo $row['phonenumber'];?></tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</td>
</tr>
<?php
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
</body>
</html>