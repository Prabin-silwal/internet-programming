
<?php
include 'config/config.php';
$admin=$_SESSION['admin'];
if($admin==true)
{

}
else
{
	header("location:signin.php");
}
if(isset($_GET['submit']))
{
$id=$_GET['id'];
	 mysqli_query($conn, "DELETE FROM contact WHERE id=$id");
	 header("location:databaseshow.php");

}
if(isset($_GET['delete']))
{
	 $id=$_GET['id'];
	 $sq="DELETE FROM catagories WHERE id=$id";
	$q=mysqli_query($conn,$sq);
	header("location:catagories.php");
}

if(isset($_POST['del']))
{
   $id=$_POST['id'];
   $sql="DELETE FROM menu WHERE id=$id";
    mysqli_query($conn,$sql);
   header("location:index.php");


}
?>