<!doctype html>
<html>
<head>
<?php 
include("./all/init.php");
if (isset($_GET["login"]) === true) {
?>
 <form action="login.php" method="post" target="_top">
			Username(Maximum 32 characters):  <input class="fields" type="text" name="username" maxlength="15" placeholder="YoUser">
			<br>
			Password(Min. 6): <input class="fields" type="password" name="password"  minlength="6" placeholder="YoPassword">
			<input type="submit" value="GO!" class="buttons" id="submitButton">
		</form>
  <?php
}  
  ?>
<title>VMENTPro-Anytime, anywhere, anything, anyone!</title>
</head>
<body>
	<h1>
		VMENT<em>Pro</em>
	</h1>
	<p>
		Working together shouldn't be a pain, no, it should be efficient, fast and simple.<br> All of what VMENTPro is capable of doing.<br>
      -Diego Chuman<br>
      Already developing! <a href="?login">LOG IN</a> with <a href="http://vment.comli.com">VMent</a> account to access beta version
	</p>
</body>