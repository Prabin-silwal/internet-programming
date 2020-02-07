<?php  include 'config/config.php'
session_start();
$admin=$_SESSION['admin'];
if($admin==true)
{

}
else
{
  header("location:sigin.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
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
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="menusshow.php" class="list-group-item list-group-item-action bg-light">Menus</a>
        <a href="databaseshow.php" class="list-group-item list-group-item-action bg-light">Contact</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
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
                         <th scope="col">Id</th>
                         <th scope="col">Name</th>
                         <th scope="col">Email</th>
                         <th scope="col">Image Name</th>
                         <th scope="col">Price</th>
                         <th scope="col">Description</th>
                          <th scope="col">Quality</th>
                         <th scope="col">Negotiable</th>
                          <th scope="col">Catagory</th>
                          <th scope="col">Action</th>
                         </tr></thead>
 <?php 
$sql="SELECT * from images";
 $query=mysqli_query($conn,$sql);
      if(mysqli_num_rows($query)>0)
    {
       while($rows=mysqli_fetch_assoc($query))
       {
        ?>
        <form action="" method="POST">
        <tr class="info">

            <td><?php echo $rows['id']?></td>
            <td><img src="<?php echo $rows['name']?>" style="height: : 60px; width: 70px;"> </td>
             <td><?php echo $rows['email']?></td>
              <td><?php echo $rows['imagename']?></td>
               <td><?php echo $rows['price']?></td>
                <td><?php echo $rows['description']?></td>
                 <td><?php echo $rows['negotiable']?></td>
                  <td><?php echo $rows['quality']?></td>
                   <td><?php echo $rows['category']?></td>
                     <td>
                      <input type="submit" class="btn btn-danger" name="submit" value="Delete">
</td>
                     
        </tr>
                             <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">

</form>
        <?php
        
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
<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];
  $sq="DELETE FROM images where id='$id'";
  mysqli_query($conn,$sq);
}

?>
