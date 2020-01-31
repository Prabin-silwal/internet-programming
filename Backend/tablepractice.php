<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ipdatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
  $sql="SELECT * FROM contact";

$query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr class="success">
      <th scope="col">id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
       <th scope="col">Phone Number</th> 
       <th scope="col">Feedback</th>
       <th>Actions</th>
       <th> </th>
      </tr>
    </thead>
   
    <?php 
    
   if(mysqli_num_rows($query)>0)
    {
      while($rows=mysqli_fetch_assoc($query))
      {
   echo '<tr class="info">';
  echo '<td>'.$rows['id'].'</td>';        
  echo '<td>'.$rows['firstname'].'</td>';
  echo '<td>'.$rows['lastname'].'</td>';
  echo '<td>'.$rows['email'].'</td>';
  echo '<td>'.$rows['phonenumber'].'</td>';
  echo '<td>'.$rows['feedback'].'</td>';
  echo '<td><a href="delete.php ?id='.$rows['id'].'">Delete</a></td>';
  echo '<td></td>';
    echo '</tr>';
      }
    } 
    ?>
 ?>

    //   }
    // } 
   
  </table>
</div>

</body>
</html>

