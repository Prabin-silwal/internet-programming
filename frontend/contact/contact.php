<?php
session_start();
error_reporting(0);
include 'config/config.php';
 $username=$_SESSION['email'];
 $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];
if($username==true){
}
else 
{
  header("location:../signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact V6</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


  <div class="container-contact100">
    <button class="contact100-btn-show">
      <i class="fa fa-envelope-o" aria-hidden="true"></i>
    </button>

    <div class="wrap-contact100">
      <button class="contact100-btn-hide">
        <i class="fa fa-close" aria-hidden="true"></i>
      </button>

      <form class="contact100-form validate-form" action="" method="POST">
        <span class="contact100-form-title">
          Contact Us
        </span>

        <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
          <span class="label-input100">Your Name</span>
          <input class="input100" type="text" name="name" placeholder="Enter your name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <span class="label-input100">Email</span>
          <input class="input100" type="text" name="email" placeholder="Enter your email addess">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Message is required">
          <span class="label-input100">Message</span>
          <textarea class="input100" name="feedback" placeholder="Your message here..."></textarea>
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
           <br>
          <button class="contact100-form-btn" type="submit" name="submit">
            <span>
              Submit
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
          <a href="../index.php" class="contact100-form-btn" style="margin-left: 400px;" >
            <span>
              Back
              <i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
            </span>
         </a>
        </div>
      </form>
    </div>
  </div>
  <div id="dropDownSelect1"></div>

<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
  <script src="js/map-custom.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

<?php 
include 'config/config.php';
if(isset($_POST['submit']))
{
$firstname=$_POST['name'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];

$sql = "INSERT INTO contact(firstname,email,feedback) VALUES ('$firstname','$email','$feedback')";
mysqli_query($conn,$sql);
 header("location:../index.php");
$conn->close();
}

?>