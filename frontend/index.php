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
    <link href="css/font-awesome.min.css" rel="stylesheet">
 <link href="css/animate.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"> -->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Buy and Sell</a>
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
echo '<li class="nav-item "><a class="navbar-brand" href="'. $reco['link'] .'">'. $reco['menus'];'</a></li>'; 
  }
    echo '<li class="nav-item"><a class="navbar-brand" href=product.php >Product</a>';
    echo '<li class="nav-item active"><a class="navbar-brand" href=logout.php >logout</a>';

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
  </nav>

  <!-- Masthead -->

  <header class="masthead">
    <?php
  if($username==true || $cookie==true )
{
  ?>
    <div class="container h-100"> <form action="verify.php" method="POST">
        <button class="btn btn-primary" style="margin-left: 1100px;"><i class="fa fa-cog" aria-hidden="true"></i>
</button>
      </form>
      <?php
    }
    ?>
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">

          <h1 class="text-uppercase text-white font-weight-bold">Your Favorite Source of Free Selling and Buying</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Start to Buy and Sell right here, no strings attached!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </div>
  </header>
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Buy and sell has everything what you need !</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="product.php">Get Started!</a>
        </div>
      </div>
    </div>
  </section>
  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
              Musical Instruments
              </div>
            </div>
          </a>
        </div>
      
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                PElectronics Item
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
               Vehicles
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">About Buy and Sell!</h2>
      <a class="btn btn-light btn-xl" href="about.php">Find out More!</a>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Have any queries regarding this website! Contact with Us!!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>Phone number</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <a class="d-block" href="contact.php">Contact us</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Buy and Sell</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>
<?php 

?>

setcookie('username',"" time()-3600)