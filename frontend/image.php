
<?php
session_start();
  $msg = "";
  $msg_class = "";
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
$username=$_SESSION['email'];
  if (isset($_POST['save_profile'])) {
    
    // for the database
    $bio = stripslashes($_POST['bio']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "../userimage/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO profilepictures (email,image)values('$username','$target_dir')";
       
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <style type="text/css">
    .form-div { margin-top: 100px; border: 1px solid #e0e0e0; }
#profileDisplay { display: block; height: 210px; width: 60%; margin: 0px auto; border-radius: 50%; }
.img-placeholder {
  width: 60%;
  color: white;
  height: 100%;
  background: black;
  opacity: .7;
  height: 210px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <a href="profiles.php">View all profiles</a>
        <form action="image.php" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <img src="images/avatar.jpg" onClick="triggerClick()" id="profileDisplay">
            </span>
            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
            <label>Profile Image</label>
          </div>
          <div class="form-group">
            <label>Bio</label>
            <textarea name="bio" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save User</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="javascript.js"></script>