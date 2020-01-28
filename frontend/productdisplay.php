<?php 
session_start();
error_reporting(0);
include 'config/config.php';
$sq="SELECT * FROM menu";
  $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];
  if($username==true)
  {

}
else
{
  header("location:signin.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  </style>
  <title>Products</title>
  <link rel="stylesheet" type="text/css" href="css/sidebar.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- <link href="css/creative.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <div id="wrapper" class="active">
      
      <!-- Sidebar -->
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
       
<?php
  $sql="SELECT * FROM images where category=$id";
$query=mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0)
    {
    
      while($row=mysqli_fetch_assoc($query))
      {
?>   <ul class="sidebar-nav" id="sidebar"> 
          <li><a><?php echo $row['catagory'];?><span class="sub_icon glyphicon glyphicon-link"></span></a></li>
         
        </ul>
        <?php 

      }
    }
      ?>
      </div>
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
              <div class="col-md-12">
             <!-- we have to write here -->
            </div>
          </div>
        </div>
      </div>
      
    </div>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top" style="margin-left: 50px;">Buy and Sell</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <?php
    
    if($username==true || $cookie==true )
{
    echo '<li class="nav-item"><a class="navbar-brand" href=product.php style="margin: 10px;" >Product</a>';
    echo '<li class="nav-item active"><a class="navbar-brand" href=logout.php  style="margin: 10px;">logout</a>';
 }
 else
 {
       echo '<li class="nav-item active"><a class="navbar-brand" href=signin.php >Login</a>';

 }
   ?>
</ul>
   
      </div>
    </div>
    <form >
      <div class="input-group md-form form-sm form-2 pl-0">
  <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Search" aria-label="Search">
  <div class="input-group-append" >
    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true" style="padding-right: 50px;"></i></span>
  </div>
</div>
</form>
  </nav>


<section style="">
 
 <?php
 if(isset($_POST['send'])){
$id=$_POST['id'];
$catagory=$_POST['catagory'];
  $sql="SELECT * FROM images where category=$id";
$query=mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0)
    {
    
      while($row=mysqli_fetch_assoc($query))
      {
       
        
    ?>
     <form method="POST" action="display.php?action=add&id=<?php echo $row['id'];?> " >
   <div class="container">

  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0"><?php echo $catagory;?></h1>

  <hr class="mt-2 mb-2">

  <div class="row text-center text-lg-right">
    <div class="col-lg-3 col-md-4 col-6">
                <img class="img-fluid img-thumbnail" src="<?php echo $row['name'];?>" alt="">
          
    </div>
  </div>
              <input type="hidden" name="price" value="<?php echo $row['price'];?><br>">
               <input type="hidden" name="imagename" value="<?php echo $row['imagename'];?>">
               <input type="hidden" name="image" value="<?php echo $row['name'];?>">
               <input type="hidden" name="email" value="<?php echo $row['email'];?>">
               <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <input type="submit" class="btn btn-primary" style="font-size: 10px;" name="submit" value="Buy Now">
</div>    
</form> 
    <?php  
}
}
}

  ?>
 
</section>
      </div>
    </div>
 <script>
   $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
});
  </script>
</body>
</html>