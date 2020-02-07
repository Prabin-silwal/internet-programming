<?php 
session_start();
error_reporting(0);
include 'config/config.php';
$sq="SELECT * FROM menu";
  $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];
  if($username==true || $cookie==true)
  {

}
else
{
  header("location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Products</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	  <link href="css/font-awesome.min.css" rel="stylesheet">
 <link href="css/animate.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
	<!-- carasoul -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!-- end -->
   <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- navbar -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="css/creative.min.css" rel="stylesheet">

</head><!--/head-->

<body>
	<!-- <body id="page-top"> -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color: orange;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php" style="font-size: 20px; color: black;">Buy and Sell</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <?php
       $select=mysqli_query($conn,$sq);
      if(mysqli_num_rows($select)>0)
    {
       while($rows=mysqli_fetch_assoc($select))
       {
           $record[] = $rows;  
         }
 

  } 
    if($username==true || $cookie==true )
{
    foreach($record as $reco) 
  {   
echo '<li class="nav-item "><a class="navbar-brand" style="font-size:20px;   color:black; padding:5px;" href="'. $reco['link'] .'">'. $reco['menus'];'</a></li>'; 
  }
    echo '<li class="nav-item"><a class="navbar-brand" style="font-size:20px;   color:black;  padding:5px;" href=product.php >Product</a>';
    echo '<li class="nav-item active"><a class="navbar-brand" style="font-size:20px;   padding:5px; color:black;" href=logout.php >logout</a>';

 }		
 else
 {
  ?>
  <form action="signin.php" method="POST">
       <button class="btn btn-primary">Login</button> 
      </form>
      <?php
     
}
 
   ?>

</ul>
   
      </div>
    </div>
   
    <form action="search.php" method="GET">
					<div class="col-sm-3" style="margin-left: 200px;">
						<div class="search_box pull-right" >
							<input type="text" name="search" placeholder="Search" name="search" />
							<button><i class="fa fa-search"></i></button>

						</div>
					</div>
					</form>
	
  </nav>
		<!--  -->
		<br><br><br>		
	<section id="slider" style="height: 500px;">

		<?php
$queryImages = "SELECT * FROM images ORDER BY rand() LIMIT 5";

$result = mysqli_query($conn,$queryImages);
$count=mysqli_num_rows($result);

?>
        <div class="container">
			<div class="row" >
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">

                                        <?php

                                            for($j=0;$j<$count;$j++)
                                            {

                                                    if($j==0){
                    echo ' <li data-target="#myCarousel" data-slide-to="'.$j.'" class="active"></li>';

                                                    }
                                                    else{

                                      echo ' <li data-target="#myCarousel" data-slide-to="'.$j.'"></li>';

                                                    }
                                            }
                                        ?>

                                        </ol>
                                       <div class="carousel-inner" style="height: 1000px width:2000px;">
  <?php
                                          for($j=0;$j<$count;$j++)
                                          {
                                          	$row=mysqli_fetch_assoc($result);
                                   
                                          	if($row['sold']==0){
                                                  if($j==0)
                                                  {
                                                  	?>
                                <div class="item active">                 
                               	<img class="slideimage" src="<?php echo $row['name'];?>" style="width: 1500px; height: 500px; margin-right: 40px;"> 
                                                           
                                </div>
                                                            <?php 
                                                  }

                                                  else {
                                                  	?>

                   	<div class="item">					
                                <img class="slideimage" src="<?php echo $row['name'];?>" style="width: 1500px; height: 500px; margin-right: 40px;"> 
                                                         
                                                        </div>
                                                            <?php 
                                                  }
                                          }
                                       else
                                      {
                                      	
                                      }
                                      }


                                            ?>
                                             </div>
                                    </div>
                                </div>
                            </div>
	</section>
	<section  >
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar" >
						<br><br><br>
						<br><br><br><br>
						<br><br><br><br>
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian">
		<form action="catagories.php" method="POST">
			<?php 
			$sq="SELECT * from catagories";
			$query=mysqli_query($conn,$sq);
 if(mysqli_num_rows($query)>0)
    {
    	 while($row=mysqli_fetch_assoc($query))
      {
	?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagories.php?id=<?php echo $row['id'];?>"><?php echo $row['catagory'];?></a></h4>
								</div>
							</div>
			<?php 
		}
	}
	?>
</form>
						</div>	
						<div class="shipping text-center"><!--shipping-->
							<!-- shipping -->
						</div><!--/shipping-->
					
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<br><br><br><br><br><br>
						<br><br><br><br>
						<h2 class="title text-center">Latest Items</h2>
						<?php
						$q = "SELECT * FROM images ORDER BY id DESC";

$res = mysqli_query($conn,$q);
$count=mysqli_num_rows($res);
for ($i=0;$i<6;$i++){
	$rows=mysqli_fetch_assoc($res);
	if($rows['sold']==0)
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
												<h2 align="text-center">Price:<?php echo $rows['price']?></h2>
											<p align="text-center"><?php echo $rows['imagename']?></p>
												<a href="display.php?id=<?php echo $rows['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>See Details</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php
					}
					else
				{
					$i=$i-1;	
				}
				}

					?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>Buy</span>& Sell</h2>
							<p>This is buy and sell</p>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="../images/location.jpg" alt="" />
							<p>Balaju,Kathmandu Nepal</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Order Status</a></li>
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Buy and Sell</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Buy and Sell</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 Buy & Sell. All rights reserved.</p>
					<p class="pull-right">Designed by <span><br>Prabin Silwal <br> Anamol Khanal</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>