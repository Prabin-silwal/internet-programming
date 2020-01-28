<?php
include 'config/config.php';
session_start();
$username=$_SESSION['admin'];
// echo $username;
if($username==true)
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
         <div class="pull-left info">
              <p><?php echo $username?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
      </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="menusshow.php" class="list-group-item list-group-item-action bg-light">Menus</a>
        <a href="databaseshow.php" class="list-group-item list-group-item-action bg-light">Contact</a>
        <a href="catagories.php" class="list-group-item list-group-item-action bg-light">Catagories</a>
        <a href="users.php" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="products.php" class="list-group-item list-group-item-action bg-light">Products</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle" ><i class="fas fa-align-justify"></i></button>
      <form action="logout.php" method="POST">
       <button class="btn" style="margin-left: 1000px;"><i class="fa fa-sign-out" aria-hidden="true"></i></button> 
      </form> 

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
      </div>
    </div>
   

  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
