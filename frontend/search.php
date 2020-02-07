<?php 
include 'config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Catagories</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!-- carasoul -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- end -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
	
	<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!-- <h2 class="title text-center"></h2> -->
						<?php
							$search=$_GET['search'];
					$sql="SELECT * FROM images where imagename like '$search'";	
				

$res = mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
while($rows=mysqli_fetch_assoc($res))
{
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products" style="height: 300px; width: 300px;">
										<div class="productinfo text-center">
											<img src="<?php echo $rows['name']?>" alt="" style="width: 200px; height: 250px"/>
											<h2>Price:<?php echo $rows['price']?></h2>
											<p><?php echo $rows['imagename']?></p>
											<a href="display.php?id=<?php echo $rows['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>See Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Price:<?php echo $rows['price']?></h2>
											<p><?php echo $rows['imagename']?></p>
												<a href="display.php?id=<?php echo $rows['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>See Details</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>	
</body>
</html>
</div>