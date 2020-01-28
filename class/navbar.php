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

  $username=$_SESSION['email'];
  $cookie=$_COOKIE['username'];
}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
     <link href="../frontend/css/bootstrap.min.css" rel="stylesheet">
      <link href="../frontend/css/animate.css" rel="stylesheet">
	<link href="../frontend/css/main.css" rel="stylesheet">
	<link href="..frontend/css/responsive.css" rel="stylesheet">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- end -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
 	<title></title>
 </head>
 <body>
 
<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
                                   
                                        <?php
                                        $sq="SELECT * FROM menu";
       $select=mysqli_query($conn,$sq);
      if(mysqli_num_rows($select)>0)
    {
       while($rows=mysqli_fetch_assoc($select))
       {
           $record[] = $rows;  
         }
 foreach($record as $reco) 
  {  
  ?> 
<li class="nav-item "><a class="navbar-brand" href="<?php echo $reco['link']; ?>" style="margin-left: 50px;"> 
<?php echo $reco['menus']?></a></li> 
<?php 
  }

  } 
    if($username==true || $cookie==true )
{
	?>
    <li class="nav-item"><a class="navbar-brand" href=product.php style="margin-left: 50px;" >Product</a>
    <li class="nav-item active"><a class="navbar-brand" href=logout.php style="margin-left: 50px;">logout</a>
    	<?php
 }
 else
 { ?>
      <li class="nav-item active"><a class="navbar-brand" href=signin.php style="margin-left: 50px;">Login</a>
      	<?php

 }
   ?>		</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
 </body>
 </html>