
<?php 
 error_reporting(0);
session_start();
include 'confing/config.php';
$sql="SELECT * FROM menu";
$username=$_SESSION['email'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <style >
    body{
      background-color: lightblue;
    }
    *{
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;

    }
   .nav-item{
    list-style-type: none;
    margin-left: 90px;
    padding-right: 20px;
   }
  .paddingTB60 {padding:60px 0px 60px 0px;}
.gray-bg {background: #F1F1F1 !important;}
.about-title {}
.about-title h1 {color: #535353; font-size:45px;font-weight:600;}
.about-title span {color: #AF0808; font-size:45px;font-weight:700;}
.about-title h3 {color: #535353; font-size:23px;margin-bottom:24px;}
.about-title p {color: #7a7a7a;line-height: 1.8;margin: 0 0 15px;}
.about-paddingB {padding-bottom: 12px;}
.about-img {padding-left: 57px;}
.middle{
  position: absolute;
  top: 100%;
  transform: translateY(100%);
  width: 100%;
  text-align: center;

}
.btn{
  display: inline-block;
  width: 90px;
  height: 90px;
  background:#f1f1f1;
  margin: 10px;
  border-radius: 30%;
  box-shadow: 0 5px 15px -5px #00000070;
  color:#3498db;
  overflow: hidden;
  position: relative;
  
}
.btn i{
  line-height: 90px;
  font-size: 26px;
  transition: 0.2s linear;
}
.btn:hover i{
  transform: scale(1.3);
  color:#f1f1f1;
}
.btn::before{
  content: " ";
  position: absolute;
  width: 120%;
  height: 120%;
  background:#3498db;
  transform:rotate(45deg);
  left: -110%;
  top: 90%;

}
.btn:hover::before{
  animation: aaa 0.7s 1;
  top:-10%;
  left: -10%;
}
@keyframes aaa{
  0%{
    left: -110%;
    top: 90%;
  }
  50%{
    left: 10%;
    top: -30%;
  }
  100%{
    top: -10%;
    left: -10%;
  }
}
  </style>
</head>
<body>
	    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Buy and sell</a>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="nav nav-pills mb-3">
      <?php
       $query=mysqli_query($conn,$sql);
      if(mysqli_num_rows($query)>0)
    {
       while($rows=mysqli_fetch_assoc($query))
       {
           $record[] = $rows;  
         }
 foreach($record as $rec) 
  {
    
echo '<li class="nav-item active"><a class="navbar-brand" href="'. $rec['link'] .'">'. $rec['menus'];'</a></li>';  
  }

  }
  if($username==true)
{
    echo '<li class="nav-item"><a class="navbar-brand" href=product.php >Product</a>';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
   echo "$username" ;
   echo '<li class="nav-item "><a class="navbar-brand" href=logout.php >logout</a>';
 }
 else
 {
     echo '<li class="nav-item active"><a class="navbar-brand" href=signin.php >Login</a>';

 } 
   ?>
</ul>
 </div>
</nav>
<div class="about-section paddingTB60 gray-bg">
                <div class="container">
                    <div class="row">
						<div class="col-md-7 col-sm-6">
							<div class="about-title clearfix">
								<h1>About <span>Buy and Sell</span></h1>
								<p class="about-paddingB">This page is created so that you can sell what is unwanted to you. This website helps you to find the buyers around you which you dont know. </p>

                <!--  -->
						<div class ="middle">
    <a class="btn" href="https://www.facebook.com">
      <i class="fa fa-facebook"></i>
    </a>
    <a class="btn" href="https://www.instagram.com">
    <i class="fa fa-instagram"></i>
    </a>  
    <a class="btn" href="#">
      <i class="fa fa-youtube"></i>
    </a>
    <a class="btn" href="#">
      <i class="fa fa-phone"></i>
    </a>
    
  </div>
						              	</div>
						            </div>
                    </div>
                </div>
            </div>
</body>
</html>