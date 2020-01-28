<?php 
include 'config/config.php';
  $sql="SELECT * FROM contact";

$query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contacts</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  </head>
<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Contacts</div>
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
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
       <th scope="col">Phone Number</th> 
       <th scope="col">Feedback</th>
       <th>Actions</th>
       <th> </th>
      </tr>
    </thead>
   
    <?php 
    
   if(mysqli_num_rows($query)>0)
    {
      while($rows=mysqli_fetch_assoc($query))
      {
   echo '<tr class="info">';
  echo '<td>'.$rows['id'].'</td>';        
  echo '<td>'.$rows['firstname'].'</td>';
  echo '<td>'.$rows['lastname'].'</td>';
  echo '<td>'.$rows['email'].'</td>';
  echo '<td>'.$rows['phonenumber'].'</td>';
  echo '<td>'.$rows['feedback'].'</td>';
  echo '<td><a href="delete.php?id='.$rows['id'].'" class="btn btn-danger">Delete</a></td>';
  echo '<td></td>';
    echo '</tr>';
      }
    } 
 ?>
  </table>

</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>


</body>
</html>

