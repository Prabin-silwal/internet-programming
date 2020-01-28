<?php
session_start();
$username=$_SESSION['email'];
setcookie("username", "", time() - 3600);
session_unset($_SESSION['email']);
header("location:index.php");
?>