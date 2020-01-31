<?php 
include 'config/config.php';
if(isset($_POST['submit']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];
$number=$_POST['phonenumber'];

$sql = "INSERT INTO contact(firstname, lastname, email, phonenumber, feedback)
VALUES ('$firstname','$lastname','$email','$number','$feedback')";
if ($conn->query($sql) === TRUE) {
      header("location:index.php");
} 
else 
{
	header("location:contact.php");
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

?>