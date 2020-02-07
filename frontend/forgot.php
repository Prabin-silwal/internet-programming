
<?php 
include 'config/config.php';
session_start();
if (isset($_POST['submit']))
{
  session_destroy();
  $username=$_POST['email'];
  $_SESSION['em']=$_POST['email'];
  $recovery=rand(10000,99000);
  $sq="SELECT * FROM login where email='$username'";
 $query=mysqli_query($conn,$sq);
   if(mysqli_num_rows($query)>0)
    {
      $rows=mysqli_fetch_assoc($query);
        if($rows['email']==$username)
        { 
          $sql="INSERT INTO recoverykeys(recovery,email) VALUES('$recovery','$username') ";
          $echo =mysqli_query($conn,$sql);
$to = $username; 
$from = 'psilwal50@gmail.com'; 
$fromName = 'Buy and Sell'; 
 
$subject = "Password Reset Code"; 
 
$htmlContent = '
 
   <html> 
    <head> 
        <title>Welcome to Buy and Sell</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>Buy and Sell</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>psilwal50@gmail.com</td> 
            </tr> 
            <tr> 
                <th>Website:</th><td><a href="localhost/finalproject/frontend">Buy and sell</a></td> 
            </tr> 
        </table> 
        <h1>Code:'.$recovery.'</h1>

    </body> 
    </html>';
 

$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
if(mail($to, $subject, $htmlContent, $headers))
{ 
    header("location:recovery.php?name=$username");
}
else
{ 
  ?>
<script type="text/javascript">
  alert("Email send Failed");
</script>
  <?php
}
}
}
else
 {       ?>
        <script type="text/javascript">
          alert("Entered email Not valid");
        </script>
        <?php
          
        }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Recovery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">
  
html,
body {
  background: #efefef;
  padding: 10px;
  font-family: 'Varela Round';
}

a {
  color: #aaaaaa;
  transition: all ease-in-out 200ms;
}
a:hover {
  color: #333333;
  text-decoration: none;
}
.etc-login-form {
  color: #919191;
  padding: 10px 20px;
}
.etc-login-form p {
  margin-bottom: 5px;
}
.login-form-1 {
  max-width: 300px;
  border-radius: 5px;
  display: inline-block;
}
.main-login-form {
  position: relative;
}
.login-form-1 .form-control {
  border: 0;
  box-shadow: 0 0 0;
  border-radius: 0;
  background: transparent;
  color: #555555;
  padding: 7px 0;
  font-weight: bold;
  height:auto;
}
.login-form-1 .form-control::-webkit-input-placeholder {
  color: #999999;
}
.login-form-1 .form-control:-moz-placeholder,
.login-form-1 .form-control::-moz-placeholder,
.login-form-1 .form-control:-ms-input-placeholder {
  color: #999999;
}
.login-form-1 .form-group {
  margin-bottom: 0;
  border-bottom: 2px solid #efefef;
  padding-right: 20px;
  position: relative;
}
.login-form-1 .form-group:last-child {
  border-bottom: 0;
}
.login-group {
  background: #ffffff;
  color: #999999;
  border-radius: 8px;
  padding: 10px 20px;
}
.login-group-checkbox {
  padding: 5px 0;
}
/*=== 5. Login Button ===*/
.login-form-1 .login-button {
  position: absolute;
  right: -25px;
  top: 50%;
  background: #ffffff;
  color: #999999;
  padding: 11px 0;
  width: 50px;
  height: 50px;
  margin-top: -25px;
  border: 5px solid #efefef;
  border-radius: 50%;
  transition: all ease-in-out 500ms;
}
.login-form-1 .login-button:hover {
  color: #555555;
  transform: rotate(450deg);
}
.login-form-1 .login-button.clicked {
  color: #555555;
}
.login-form-1 .login-button.clicked:hover {
  transform: none;
}



/*=== 7. Form - Main Message ===*/
.login-form-main-message {
  background: #ffffff;
  color: #999999;
  border-left: 3px solid transparent;
  border-radius: 3px;
  margin-bottom: 8px;
  font-weight: bold;
  height: 0;
  padding: 0 20px 0 17px;
  opacity: 0;
  transition: all ease-in-out 200ms;
}
.login-form-main-message.show {
  height: auto;
  opacity: 1;
  padding: 10px 20px 10px 17px;
}
.login-form-main-message.success {
  border-left-color: #2ecc71;
}
.login-form-main-message.error {
  border-left-color: #e74c3c;
}



/* hover style just for information */
label:hover:before {
  border: 1px solid #f6f6f6 !important;
}


 </style>
 <script type="text/javascript">
   (function($) {
    "use strict";
  
  // Options for Message
  //----------------------------------------------
  var options = {
    'btn-loading': '<i class="fa fa-spinner fa-pulse"></i>',
    'btn-success': '<i class="fa fa-check"></i>',
    'btn-error': '<i class="fa fa-remove"></i>',
    'msg-success': 'All Good! Redirecting...',
    'msg-error': 'Wrong login credentials!',
    'useAJAX': true,
  };

  // Forgot Password Form
  //----------------------------------------------
  // Validation
  $("#forgot-password-form").validate({
    rules: {
      fp_email: "required",
    },
    errorClass: "form-invalid"
  });
  
  // Form Submission
  $("#forgot-password-form").submit(function() {
    remove_loading($(this));
    
    if(options['useAJAX'] == true)
    {
      dummy_submit_form($(this));
      return false;
    }
  });
  function remove_loading($form)
  {
    $form.find('[type=submit]').removeClass('error success');
    $form.find('.login-form-main-message').removeClass('show error success').html('');
  }
 </script>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
   
<div class="text-center" style="padding:50px 0">
  <div class="logo" style="font-size: 20px; color: red; font-family: Arial, Helvetica, sans-serif;">Forgot password <i class="fal fa-lock-alt"></i> </div>
  
  <div class="login-form-1">
    <form id="forgot-password-form" class="text-left" action="" method="POST">
      <div class="etc-login-form">
        <p>When you fill in your registered email address, you will be sent code and you can reset your password.</p>
      </div>
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="fp_email" class="sr-only">Email address</label>
            <input type="email" class="form-control" id="fp_email" name="email" placeholder="email address">
            <div class="text-danger"><?php  if(isset($_GET['message'])) {$message=$_GET['message'];echo $message;}?></div>
          </div>
        </div>
        <button type="submit" class="login-button" name="submit"><i class="fa fa-chevron-right"></i></button>
      </div>
      <div class="etc-login-form">
        <p>already have an account? <a href="signin.php">login here</a></p>
        <p>new user? <a href="signup.php">create new account</a></p>
      </div>
    </form>
  </div>
</div>
</body>
</html>