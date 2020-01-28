<?php
session_start();
$username=$_SESSION['admin'];
setcookie("admin", "", time() - 3600);
session_unset();
header("location:index.php");
?>