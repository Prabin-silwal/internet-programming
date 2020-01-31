
<?php
include 'config/config.php';
$id=$_GET['id'];
	 mysqli_query($conn, "DELETE FROM contact WHERE id=$id");
	 header("location:databaseshow.php");



?>