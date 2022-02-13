<!doctype html>
<html lang="en">
<?php
include("./all/init.php");
include("./all/includes/head.php");
if (logged_in() === true) {
header("Location: home.php");	
exit();
} else {
	?>
<title>VMENT-Anytime, anywhere, anything!</title>
</head>
<body>
	<h1 style="color: white; font-size: 100px; text-align: center; margin: 1px;">VMENT</h1>
	<p style="text-align:center; display:block;"><img style="padding: 0px;" src="Logo.png" heigth="10%" width="10%"/> </p>
	<div id="subtitle" style="text-align: center;"></div>
	<script src="script.js"></script>

	<div id="topbar" style="text-align: center; font-size: 25px;">
      <a href="#" id="buttonL" class="buttons"onClick="jsFilter('L.php')">Log In</a> 
<a href="#" id="buttonH" class="buttons" onClick="document.getElementById('display').src='showH.html'">Huh?</a>
		<a href= "#" id="buttonS" class="buttons" onClick="jsFilter('S.php')">Sign Up</a>

	</div>

	<h2 style="text-align: center;">HI KIDS!</h2>
	<iframe id="display" width="100%" height="240px" frameborder="0" marginwidth="0" marginheight="0" src="showH.html"></iframe>
  <p style="font-family: cursive;">"We shouldn't express who we are and what we feel with ONLY text" <br>
    -Diego Chuman <br>
    Founder and Creator of VMENT and DCV</p>
	<?php
include("./all/includes/footer.php");
?>
</body>
</html>
<?php } ?>
<!--Beta first uploaded 21/02/14-->
<!--UI Completely changed! 6/03/14-->
<!--You can login! (If you have a user -,-) 11/03/14-->
<!--YOU CAN REGISTER :D Also change password and look at user details! 13/03/14-->
<!--(dubstep online remix idea)FRIENDS AND PICTURE UPLOAD WORKS! CHANGE YOUR OWN DETAILS, USERNAME AND PASSWORD OTHER STUFF YAY 28/03/14-->
<!--http://stackoverflow.com/questions/12032120/can-node-js-edit-video-files
https://developer.mozilla.org/en-US/docs/HTML/Manipulating_video_using_canvas
http://www.reddit.com/r/learnprogramming/comments/19f2cb/can_javascript_edit_video_files/´ -->