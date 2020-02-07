<?php
include 'config/config.php';
$sql="SELECT * FROM catagories";
$query=mysqli_query($conn,$sql);
$admin=$_SESSION['admin'];
if($admin==true)
{

}
else
{
  header("location:signin.php");
}
?>
<!DOCTYPE html>
<html>
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
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>
<body>

  <div class="d-flex" id="wrapper">

   
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Catgories</div>
      <div class="list-group list-group-flush">
<a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="menusshow.php" class="list-group-item list-group-item-action bg-light">Menus</a>
        <a href="databaseshow.php" class="list-group-item list-group-item-action bg-light">Contact</a>
        <a href="catagories.php" class="list-group-item list-group-item-action bg-light">Catagories</a>
        <a href="users.php" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="products.php" class="list-group-item list-group-item-action bg-light">Products</a>
      </div>
    </div>
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">==</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>

      <div class="container-fluid">
        <div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="success">
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col"> Action</th>
      </tr>
    </thead>
   
    <?php 
    
   if(mysqli_num_rows($query)>0)
    {
      while($rows=mysqli_fetch_assoc($query))
      {
  
    echo '<tr class="info">';
  echo '<td>'.$rows['id'].'</td>';        
  echo '<td>'.$rows['catagory'].'</td>';
  ?>
 <form action="delete.php" method="GET">

  <td>
  	<input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
  <input type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
  </form>
  <?php
      }
    } 
 ?>
  </table>

</div>
      </div>
    </div>
   <br><br>
<form action="" method="POST">
 <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Catagoris:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="catagory" placeholder="catagory Name" name="catagory">
    </div>
  </div>
  <input type="submit" name="submit"class="btn btn-primary" value="Add Catagoris" >
 </form>
     
  </div>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $catagory=$_POST['catagory'];
  $s="INSERT INTO catagories (catagory) VALUES ('$catagory')";
   mysqli_query($conn,$s);
    
}
?>