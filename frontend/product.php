
<?php 
error_reporting(0);
session_start();
include 'config/config.php';
$sq="SELECT * FROM menu";
 $username=$_SESSION['email'];
 $cookie=$_COOKIE['username'];
if($username==true || $cookie==true){

 $uname=$cookie;
}
else 
{
  header("location:about.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  
  <link href="css/bootstrap-switch/bootstrap-switch.css" rel="stylesheet">
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color: white;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Buy and Sell</a>
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
    if($username==true || $cookie==true)
{
  foreach($record as $reco) 
  {   
    
echo '<li class="nav-item "><a class="navbar-brand" href="'. $reco['link'] .'">'. $reco['menus'];'</a></li>'; 
  }
    // echo '<li class="nav-item"><a class="navbar-brand" href=sirproduct.php >Products</a>';
    echo '<li class="nav-item active"><a class="navbar-brand" href=logout.php >logout</a>';
 }
 else
 {
      header("location:signin.php?message=create an account first");

 }
   ?>
</ul>
       </div>
    </div>
  </nav>
  <br><br><br>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
   <div class="text-danger"><?php  if(isset($_GET['alert'])) {$alert=$_GET['alert'];echo $alert;}?></div>
  <h3 >Detail of the product</h3>
<div class="form-group">
  <label for="usr"> Image Name:</label>
  <input type="text" class="form-control" id="usr" name="imagename" placeholder="image name" required="required">
</div>    
<div class="form-group">
  <label for="usr"> Brand Name:</label>
  <input type="text" class="form-control" id="usr" name="brandname" placeholder="Brand Name" >
</div> 
<div class="form-group">
  <label for="usr"> Price:</label>
  <input type="text" class="form-control" id="usr" name="price" placeholder="price" required="required">
</div> 
 <label>Negotiable: </label>
  <label class="radio-inline"><input type="radio" name="negotiable"  value="Yes">Yes</label>
<label class="radio-inline"><input type="radio" name="negotiable" checked value="No">No</label><br>
<div class="form-group">
  <label for="Catagory" class="taxt-info">Select Catagory</label>
        <div class="col-sm-12 col-lg-4 col-lg-6">
          <select class="form-control selcls" id="select" name="catagory">
               <?php
               $sqli="SELECT * from catagories";
       $query=mysqli_query($conn,$sqli);
      if(mysqli_num_rows($query)>0)
    {
       while($rows=mysqli_fetch_assoc($query))
       {
           
       ?>

  <option value="<?php echo $rows['id']; ?>"><?php echo $rows['catagory'];?> </option>
  <?php
    }

  } 
  ?>
   </select>  </span>
        </div>
        <label>If not in the list</label>
  <input type="text" class="form-control" id="usr" name="option" placeholder="Clearly mention your catagory">
</div>       
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="used" id="option1" autocomplete="off" value="used"> Used
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="used" id="option2" autocomplete="off" value="New"> New
  </label>
</div>
  
    <div class="form-group">
  <label for="comment">Description about the product:</label>
  <textarea class="form-control" rows="5" id="comment" name="description" placeholder="description" required="required"></textarea>
</div> 
    <input type="file" name="image" id="fileToUpload" class="btn btn-primary">
    <input type="submit" value="Add Product" name="submit" class="btn btn-primary">

</form>

</div>  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="js/creative.min.js"></script>
</body>
</html>
<?php

if(isset($_POST['submit'])){
  $imagename=$_POST['imagename'];
  $description=$_POST['description'];
  $negotiable=$_POST['negotiable'];
  $price=$_POST['price'];
  $brand=$_POST['brandname'];
  $quality=$_POST['used'];
  $catagory=$_POST['catagory'];
 
if(!empty($_FILES['image']))
{
  $path="../images/";
  $path=$path.basename($_FILES['image']['name']);
  if(move_uploaded_file($_FILES['image']['tmp_name'], $path))
  {
     $sql="INSERT into images(name,email,imagename,price,description,negotiable,quality,brand,category) VALUES('$path','$username','$imagename','$price','$description','$negotiable','$quality','$brand','$catagory')";
      mysqli_query($conn,$sql);
   header("location:index.php");

  }
  else 

  {
    header("location:product.php?alert=Unable to Upload image!!");
  }
}

}
?>
