
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">

    function validate()
    {
        var uname=document.getElementById('uname').value;
        var email=document.getElementById('email').value;
        var password=document.getElementById('password').value;
        var cpassword=document.getElementById('cpassword').value;
        var number=document.getElementById('number').value;
        var unameExp=/^[A-Za-z]+$/;
        var numberExp = /^[0-9]+$/;
        var emailExp= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!uname.match(unameExp)|| uname=='')
        {   
            document.getElementById('unerror').innerHTML='****Please enter valid username without space ******';
            document.getElementById('uname').focus();
            return false;
        }
        if(!email.match(emailExp)|| email=='')
        {
            document.getElementById('eerror').innerHTML='***** Please enter valid email********';
            document.getElementById('email').focus();
            return false;
        }
        if (password==''||cpassword=='')
        {
            document.getElementById('perror').innerHTML='***** Password field empty******';
            document.getElementById('cperror').innerHTML='**********confirm password field empty*******';
            document.getElementById('password').focus();
            return false;
        }
        if(password!=cpassword)
        {
          
            document.getElementById('pmatcherror').innerHTML='***** Password doesnot match********';
            document.getElementById('cpassword').focus();
            return false;
        }
        if(!number.match(numberExp))
        {
            document.getElementById('nerror').innerHTML='***** enter valid number******';
            document.getElementById('number').focus();
            return false;
        }
        else
        {
            return true;
        }

    }
</script>
	<title>Sign Up </title>
  <link rel="stylesheet" href="../css/bootstrap.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style >
	body{
		background-color: #17a2b8;
	}
	.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
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
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-envelope"></i>   Login via Gmail</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form role="form" onsubmit="return validate()" method="POST" action="logindatabase.php">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" class="form-control" placeholder="username" type="text" id="uname">
        
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
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;" name="code">
		    <option selected="+977">+977</option>
		    <option value="+972">+972</option>
		    <option value="+198">+198</option>
		    <option value="+701">+701</option>
		</select>
    	<input name="phonenumber" class="form-control" placeholder="Phone number" type="phone" autocomplete="off" id="number">

    </div> 
     <div class="text-danger"> 
        <p id="nerror"></p>
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
    </div>  
    <div class="text-danger"> 
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

<br><br>
<article class="bg-secondary mb-3">  
<div class="card-body text-center">
    <h3 class="text-white mt-3">Buy and Sell</h3>
<p class="h5 text-white">Welcome  <br> for Ecommerce, marketplace, buying 
and selling product landing pages</p>
</div>
<br><br>
</article>

</body>
</html>