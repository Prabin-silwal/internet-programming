<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<label>Enter your tanble</label>
	<input type="number" name="number">
	<input type="submit" name="submit" value="Table">
	</form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$number=$_POST['number'];
	for  ($i=1;$i<11;$i++) {
		$num="$number*$i";
		echo $num;
		
	}
}
?>