<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
		Lastname
		<input type="text" name="fname">
		<br>
		Lasttname
		<input type="text" name="lname">
		<br>
		Address Line 1:
		<input type="text" name="address1">
		<br>
		Address line 2:
		<input type="text" name="address2">
		<br>
		TOwn
		<input type="text" name="city">
		<br>
		Postal COde:
		<input type="text" name="post">
		<br>
		Telephone
		<input type="number" name="number">
		<br>
		Email
		<input type="email" name="email">
		<input type="submit" name="submit" value="submit">
	</form>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	$number=$_POST['number'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$post=$_POST['post'];
	$ad1=$_POST['address1'];
	$ad2=$_POST['address2'];
	$tow=$_POST['city'];
	$email=$_POST['email'];

	?>

<table>
<tr>
	<td>label</td>
	<td>TextBox name</td>
</tr>
<tr><td>Lastname</td>
<td><?php echo $lname ?></td></tr>
<tr><td>First name</td><td><?php echo $fname ?></td></tr>
<tr><td>address line 1</td>
<td><?php echo $ad1 ?></td></tr>
<tr><td>address line 2</td><td><?php echo $ad2?></td></tr>

<tr><td>town/city</td>
<td><?php echo $tow ?></td></tr>
<tr><td>post code</td><td><?php echo $post ?></td></tr>
<tr><td>telephone</td>
<td><?php echo $number ?></td></tr>
<tr><td>email</td><td><?php echo $email ?></td></tr>
</table>
<?php	
}
?>