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
  header("location:signin.php");
}
?>
<html>
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href="../css/bootstrap.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
 <link href="css/animate.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <!-- <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet"> -->
  <link href="css/creative.min.css" rel="stylesheet">

         <style >
    *{
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }
   .nav-item{
    list-style-type: none;
    margin-left: 100px;
    padding-right: 40px;
   }
    .carousel-inner img {
      width: 100%;
      height: 90vh;
  }
  </style>
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 py-5">
                    <h1>Contact Us <a href="#"></a></h1>
<form  method="POST" action="">
    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Firstname *</label>
                    <input id="form_name" type="text" name="firstname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Lastname *</label>
                    <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Phone Number *</label>
                    <input id="form_email" type="Phone" name="phonenumber" class="form-control" placeholder="Please enter your number *" required="required" data-error="Valid number is required.">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="feedback" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message" name="submit">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    <strong>*</strong> These fields are required.
                </p>
            </div>
        </div>
    </div>

</form>

                </div>

            </div>

        </div>
        <a class="btn btn-primary" href="index.php" style="margin-left: 1000px;">Go Back</a>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
        <script src="contact.js"></script>
    </body>
</html>
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