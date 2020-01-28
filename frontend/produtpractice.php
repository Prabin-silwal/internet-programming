<?php 
session_start();
error_reporting(0);
include 'config/config.php';
$sq="SELECT * FROM menu where menus='About'";
  $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home</title>
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="css/creative.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">



   <link href="../Backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 

  <!-- Custom styles for this template -->
  <link href="../Backend/css/simple-sidebar.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" style="margin-left: 95px; color: black;" href="#page-top">Buy and Sell</a>
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
 foreach($record as $reco) 
  {   
echo '<li class="nav-item "><a class="navbar-brand" style="color:black;" href="'. $reco['link'] .'">'. $reco['menus'];'</a></li>'; 
  }

  } 
    if($username==true || $cookie==true )
{
    echo '<li class="nav-item"><a class="navbar-brand" style="color:black;" href=product.php >Product</a>';
    if($username==false){
    $uname=$cookie;
    echo $uname;
  }
  else
  {
    echo $username;
  }
    // echo $ 
    echo '<li class="nav-item active"><a class="navbar-brand" style="color:black;" href=logout.php >logout</a>';
 }
 else
 {
       echo '<li class="nav-item active"><a class="navbar-brand" href=signin.php >Login</a>';

 }
   ?>
</ul>
   
      </div>
    </div>
  </nav>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Catagories</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="menusshow.php" class="list-group-item list-group-item-action bg-light">Menus</a>
        <a href="databaseshow.php" class="list-group-item list-group-item-action bg-light">Contact</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Products</a>
      </div>
    </div>
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-align-justify">=</i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Products</h1>
        <!-- box inside -->
        
</section>
          <div class="container">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/portfolio/fullsize/3.jpg" alt="Los Angeles" style="width:100%;">
      </div>
<div class="item active">
        <img src="img/portfolio/fullsize/5.jpg" alt="Los Angeles" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

        </section>

      </div>
    </div>
   

  </div>
 <!-- Bootstrap core JavaScript -->
  <script src="../Backend/vendor/jquery/jquery.min.js"></script>
  <script src="../Backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</body>
</html>
