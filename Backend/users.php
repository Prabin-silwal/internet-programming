<?php include 'config/config.php';

 $sql="SELECT * FROM login";
 $query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
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
      <div class="sidebar-heading">Users</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Home</a>
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
        <!-- <h1 class="mt-4">Dashboard</h1> -->
        <div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="success">
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      </tr>
    </thead>
   
    <?php 
    
   if(mysqli_num_rows($query)>0)
    {
      while($rows=mysqli_fetch_assoc($query))
      {
  
    echo '<tr class="info">';
  echo '<td>'.$rows['id'].'</td>';        
  echo '<td>'.$rows['name'].'</td>';
  echo '<td>'.$rows['email'].'</td>';
  echo '<td>'.$rows['password'].'</td>';
      }
    } 
 ?>
  </table>

</div>
      </div>
    </div>
   

  </div>

</body>
</html>