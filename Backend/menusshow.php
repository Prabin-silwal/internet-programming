<?php 
include 'config/config.php' ;
$sql="SELECT * FROM menu";
$query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<body>

  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Menus</div>
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
       
        <form action="" method="GET">
<div class="container">
  <table class="table table-hover">
   <thead>
      <tr class="success">
      <th scope="col">id</th>
      <th scope="col">Menu</th>
      <th scope="col">Link</th>
       <th scope="col">Action </th>
      </tr>
    </thead>

    <?php 
    
   if(mysqli_num_rows($query)>0)
    {
      while($rows=mysqli_fetch_assoc($query))
      {
        ?>
      
   <tr class="info">
  <td><?php echo  $rows['id']?>       
  <td><?php echo $rows['menus']?> 
  <td><?php echo  $rows['link']?> 
  <td>
     <a href="edit.php?edit=<?php echo $rows['id']; ?>" class="btn btn-primary" >Edit</a>
  <a href="delete.php?del=<?php echo $rows['id']; ?>" class="btn btn-danger">Delete</a>
    </a></td>
    <?php 
      }
    } 
 ?>
  </tr>
   
 </table>
  </div>
    </div>
  </div>
  </form>
<form action="" method="POST">
 <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Menu:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="menu" placeholder="Menu name" name="menu">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="link">link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="link" placeholder="Enter link" name="link">
    </div>
  </div>
  <input type="submit" name="submit"class="btn btn-primary" value="Add Menu" >
 </form>
     
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  $menu=$_POST['menu'];
  $link=$_POST['link'];
  $s="INSERT INTO menu (menus,link) VALUES ('$menu','$link')";
   $q=mysqli_query($conn,$s);
   header("location:menusshow.php");
}
?>
