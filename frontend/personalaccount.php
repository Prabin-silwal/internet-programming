
<?php 
session_start();
error_reporting(0);
include 'config/config.php';
$sq="SELECT * FROM menu";
 $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];


if($username==true){
}
else 
{
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color: white;">
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
 foreach($record as $reco) 
  {   
echo '<li class="nav-item "><a class="navbar-brand" href="'. $reco['link'] .'">'. $reco['menus'];'</a></li>'; 
  }

  } 
    if($username==true || $cookie==true )
{
    echo '<li class="nav-item"><a class="navbar-brand" href=product.php >Product</a>';
    echo '<li class="nav-item active"><a class="navbar-brand" href=logout.php >logout</a>';
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
 <?php
  $sql="SELECT * FROM images where email='$username'";

$query=mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0)
    {
      while($row=mysqli_fetch_assoc($query))
      {
        ?>
        <form action="" method="POST">
        <div class="container" style="float: center">
        <div class="col-md-4">
     <div class="thumbnail">
    <br><br><br>
    <?php 
    if($row['sold']==1){
      ?>
      <img  class="img-responsive" src="<?php echo $row['name'];?>".height="400" width="400">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger" style="font-size: 20px;">    
      <input type="submit" name="unsold" value="Unsold" class="btn btn-success" style="font-size: 20px;">
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">  
      <a href="edit1.php?id=<?php echo $row['id']?>" class="btn btn-primary" style="font-size: 20px;">Edit</a>
      <?php
    }
    else
    {
      ?>
      <img  class="img-responsive" src="<?php echo $row['name'];?>".height="400" width="400">  
 <div class="caption">
      <input type="submit" name="delete" value="Delete" class="btn btn-danger" style="font-size: 20px;">  
      <input type="submit" name="sold" value="Sold" class="btn btn-success" style="font-size: 20px;">
       <a href="edit1.php?id=<?php echo $row['id']?>" class="btn btn-primary" style="font-size: 20px;">Edit</a>
      <input type="hidden" name="id" value="<?php echo $row['id'];?>">     
     </div>
    <?php
    }
    ?>

   </div>
 </div>
 </div>
        </form>
    <?php
      }
     
}

  ?>
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
if(isset($_POST['delete']))
{
  $id=$_POST['id'];
  $sqli="DELETE FROM images WHERE id=$id";
  mysqli_query($conn,$sqli);
  echo $sqli;
  die();
  header("location:personalaccount.php");
} 
if(isset($_POST['sold']))
{
  $id=$_POST['id'];
  $value=1;
 $sq="UPDATE images
      SET sold='$value'
      WHERE id=$id";
  mysqli_query($conn,$sq);
    header("location:personalaccount.php");


}
if(isset($_POST['unsold']))
{
  $id=$_POST['id'];
  $value=0;
 $sq="UPDATE images
      SET sold='$value'
      WHERE id=$id";
  mysqli_query($conn,$sq);
    header("location:personalaccount.php");


}
?>

    
     
   

   
  