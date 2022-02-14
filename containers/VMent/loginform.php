<!doctype html>
<html>
<?php
include("./all/includes/head.php");
	?>
	<title>VMENT-Anytime, Anywhere, Anything!-Login</title>
	</head>
	<body>
		<h1>
			Login
		</h1>
		<form action="login.php" method="post" >
			Username(Maximum 32 characters):  <input class="fields" type="text" name="username" maxlength="15" placeholder="YoUser">
			<br>
			Password(Min. 6): <input class="fields" type="password" name="password"  minlength="6" placeholder="YoPassword">
			<input type="submit" value="GO!" class="buttons" id="submitButton">
		</form>
		<p>
			Not a member? <a href="beta.php">Join NOW!!</a><br>
			Forgotten your <a href="recover.php?mode=username">username</a> or <a href="recover.php?mode=password">password</a>?
		</p>
	</body>
</html>