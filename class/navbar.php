<!DOCTYPE html>
<html>
<head>
  <title></title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">
  * {margin: 0; padding: 0;}
body {
  background: hsl(120, 40%, 60%);
  padding-top: 150px;
  font: normal 18px Sniglet; color: white; text-align: center;
}

/*general styles*/
h1 {font-weight: normal; font-size: 36px; margin-bottom: 75px;}
.fun-cube i {transform: scale(10); opacity: 0.1;}

#cuboid {
  width: 400px; margin: 0 auto;
  /*this also makes #cuboid a container for absolutely positioned descendants*/
  perspective: 1000px;
}
#cuboid form {
  /*counter translate*/
  transform: translateZ(-20px);
  /*propogate 3d space for children*/
  transform-style: preserve-3d;
  /*prevent height collapse as children are absolutely positioned*/
  height: 40px;
  /*for smooth animations*/
  transition: all 0.35s;
}

/*faces*/
.cuboid-text {
  /*each face will be 40px high*/
  line-height: 40px; height: 40px;
  background: hsl(120, 40%, 20%);
}
.loader {
  background: hsl(120, 40%, 30%);
  animation: phase 1s infinite;
}
/*Lets create a pulsating animation for the loader face*/
@keyframes phase {
  50% {background: hsl(120, 70%, 30%);}
}
#email {
  background: white; outline: none; border: 0 none;
  font: inherit; text-align: left; color: hsl(120, 40%, 30%);
  display: block; width: 100%; padding: 0 10px;
  box-sizing: border-box;
}
#submit {display: none;}

.submit-icon, .reset-icon {
  position: absolute; top: 0; right: 0;
  color: rgba(0, 0, 0, 0.25);
  line-height: 40px; padding: 0 10px;
  /*smooth transitions when user activates input and types something*/
  transition: all 0.5s;
  /*to make the icons feel like buttons*/
  cursor: pointer;
}
/*.active = when the user is typing something*/
.submit-icon.active {color: hsl(120, 40%, 30%);}
.reset-icon {color: rgba(255, 255, 255, 0.25); font-size: 14px;}

#cuboid div {position: absolute; top: 0; left: 0; width: 100%;}
/*3D transforms. Each face will be rotated in multiples of -90deg and moved 20px(half of their 40px height) out*/
#cuboid div:nth-child(1) {transform: rotateX(0deg) translateZ(20px);}
#cuboid div:nth-child(2) {transform: rotateX(-90deg) translateZ(20px);}
#cuboid div:nth-child(3) {transform: rotateX(-180deg) translateZ(20px);}
#cuboid div:nth-child(4) {transform: rotateX(-270deg) translateZ(20px);}

/*the form will have 4 states/classes(default+3) for rotation*/
#cuboid form:hover, 
#cuboid form.ready {transform: translateZ(-20px) rotateX(90deg);}
#cuboid form.loading {transform: translateZ(-20px) rotateX(180deg);}
#cuboid form.complete {transform: translateZ(-20px) rotateX(270deg);}
 </style>
 <script type="text/javascript">
   //jQuery time

//add '.ready' to form when user focuses on it
$("#email").focus(function(){
  $("#cuboid form").addClass("ready");
})
//remove '.ready' when user blus away but only if there is no content
$("#email").blur(function(){
  if($(this).val() == "")
    $("#cuboid form").removeClass("ready");
})

//If the user is typing something make the arrow green/.active
$("#email").keyup(function(){
  //this adds .active class only if the input has some text
  $(".submit-icon").toggleClass("active", $(this).val().length > 0);
})

//on form submit remove .ready and add .loading to the form
$("#cuboid form").submit(function(){
  $(this).removeClass("ready").addClass("loading");
  //finish loading in 3s
  setTimeout(complete, 3000);
  //prevent default form submisson
  return false;
})
function complete()
{
  $("#cuboid form").removeClass("loading").addClass("complete");
}
//reset/refresh functionality
$(".reset-icon").click(function(){
  $("#cuboid form").removeClass("complete");
})
 </script>
</head>
<body>
<div class="fun-cube"><i class="fa fa-cube"></i></div>
<h1>Forgot Your Password</h1>
<div id="cuboid">
  <form action="" method="POST">
    <div>
      <p class="cuboid-text">Enter email</p>
    </div>
    <div>
      <label for="submit" class="submit-icon">
        <a href="recovery.php"> <i class="fa fa-chevron-right"></i></a>

      </label>
      <input type="text" id="email" class="cuboid-text" placeholder="Your Email" autocomplete="off"/>
    
    </div>
  </form>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  echo "hello";
}
?>