
<?php
include 'config/config.php';
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	 mysqli_query($conn, "DELETE FROM menu WHERE id=$id");
	 header("location:menusshow.php");

}

?>