<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up </title>
  <link rel="stylesheet" href="../css/bootstrap.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style >
	body{
		background-color: #17a2b8;
	}
input:valid{
    background-color: white;
}
input:focus:invalid{
    border: 2px dashed red;
    background-color: pink;
}
table{
    margin-left: 150px;
    padding: 80px;
    margin-right: 70px;
    background-color: black;
}
.box1{
    border: 3px;
}
</style>
</head>
<body>




<div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<form role="form" method="POST" action=""  onsubmit="return validate()">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="Full name" type="text" id="uname">
        
    </div>
     <div class="text-danger"> 
     <p id="unerror"></p>
     </div>  
         <div class="text-danger"><?php  if(isset($_GET['user'])) {$user=$_GET['user'];echo $user;}?></div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
<input type="email"  name="email" class="form-control" placeholder="Email address" id="email" >
      
    </div> 
 <div class="text-danger"> 
     <p id="eerror"></p>
     </div>  
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Create password" type="password" name="password" id="password">
        <p id="perror"></p>
    </div> 
      <div class="text-danger"> 
     <p id="perror"></p>
     </div>  
     <div class="text-danger"><?php  if(isset($_GET['message'])) {$message=$_GET['message'];echo $message;}?></div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Repeat password" type="password" name="repassword" id="cpassword">
       <p id="pmatcherror"></p>
    </div>  
    <div class="text-danger"> 
        <!-- <p id="cerror"></p> -->
     <p id="pmatcherror"></p>
     </div>                               
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Create Account">  <!--  </button> -->
    </div>    
    <p class="text-center">Have an account? <a href="signin.php">Log In</a> </p>                                                                 
</form>
</article>
</div> 
</div> 
<script type="text/javascript">
    function h_validate(){
        alert("hello");
    }
    function validate()
    {
        var uname=document.getElementById('name').value;
        var email=document.getElementById('email').value;
        var password=document.getElementById('password').value;
        var cpassword=document.getElementById('cpassword').value;
        var number=document.getElementById('number').value;
        var unameExp=/^[a-zA-Z0-9_\.-]+$/;
        var emailExp=/^[a-zA-Z0-9_\.-]+\@[a-zA-Z0-9-]+\.[a-zA-Z0-9\.]{3.6}$/;
        if(!uname.match('unameExp')&& uname=='')
        {
            document.getElementById('unerror').innerHTML='****Please enter valid name******';
            document.getElementById('uname').focus();
            return false;
        }
        else if(!email.match(emailExp)|| email=="")
        {
            document.getElementById('eerror').innerHTML='***** Please enter valid email********';
            document.getElementById('email').focus();
            return false;
        }
        else if (password==''||cpassword=='')
        {
            document.getElementById('perror').innerHTML='***** Password field empty******';
            document.getElementById('cperror').innerHTML='**********confirm password field empty*******';
            document.getElementById('password').focus();
            return false;
        }
        else if(password!=cpassword)
        {
          
             document.getElementById('pmatcherror').innerHTML='***** Password doesnot match********';
            document.getElementById('cpassword').focus();
            return false;
        }
        else
        {
            confirm('Are you sure?');
            return true;
        }

    }
</script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$name=$_POST['name'];
$repassword=$_POST['repassword'];
$password=$_POST['password'];
$encrypt=sha1($password);
$email=$_POST['email'];
$sq="SELECT email FROM admin";
$select=mysqli_query($conn,$sq);
while($rows=mysqli_fetch_assoc($select))
{
	


	if($email!=$rows['email'])
	{
			
	}
	else 
	{
		  ?>
		  <script type="text/javascript">
		  	alert("Username already taken");
		  </script>
		  <?php
		die();
	}
}
if($password==$repassword)
			{
					$sql="INSERT into admin(username,email,password) values('$name','$email','$encrypt' )";
					mysqli_query($conn,$sql);
					$_SESSION['email']=$email;
					 header("location:index.php");
	}
	else 
			{
			 header("location:signup.php?message=password did not match");
			die();
			}
	}
	
 ?>