
<?php 
include 'config/config.php';
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];	
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM menu WHERE id=$id");	

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$menu = $n['menus'];
			$id1 = $n['id'];
			$link = $n['link'];
		
	if (isset($_POST['submit'])) {
	$menu1 = $_POST['menu'];
	$link1 = $_POST['link'];

	mysqli_query($conn, "UPDATE menu SET menus='$menu1', link='$link1' WHERE id=$id1");
	header("location: menusshow.php?message=successfully Updated!");
}
	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <form class="form-horizontal" action="" method="POST">
 	<br><br><br>
  <div class="form-group">
    <label class="control-label col-sm-2" for="menu">Menu:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="menu" placeholder="Enter menu" name="menu" value="<?php echo $menu; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pwd" placeholder="Enter link" name="link" value="<?php echo $link; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<button class="btn" type="submit" name="submit" style="background: #556B2F;" >update</button>
    </div>
  </div>
</form> 
</body>
</html>