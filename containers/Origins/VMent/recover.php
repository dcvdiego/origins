<?php
include("./all/init.php");
include("./all/includes/head.php");
if (logged_in() === true) {
	header("Location: home.php");
	exit();
}
?>
	<title>VMENT-Anytime, Anywhere, Anything!-Welcome!</title>
</head>

<body>
<h2 id="readBetter">Recover RIGHT NOW!</h2>
<?php
if (isset($_GET["yay"]) === true && empty($_GET["yay"]) === true) {
	?> 
	<p>
		YAY! We successfully recovered your username/password, we've sent you an email with your forgotten username. <br>
		After you check your inbox, please <a href="loginform.php">login</a>! We miss you!
	</p>
	<?php	
} else {
$mode_allowed = array("username", "password");
if (isset($_GET["mode"]) === true && in_array($_GET["mode"], $mode_allowed) === true) {
	if (isset($_POST["email"]) === true && empty($_POST["email"]) === false) {
		if (email_exists($_POST["email"]) === true)
		recover($_GET["mode"], $_POST["email"]);
		header("Location: recover.php?yay");
	} else {
		echo "<p>Oops, we couldn't find that email! DID YOU REGISTER?</p>";
	}
?>
	<h2>
		Currently, the password recover does not work for some reason (really weird stuff happening). I apologize for this and hopefully this will work soon! Thanks for the patience!
	</h2>
	<p>
		I guess you forgot your username or password? Wow, you should pay more attention to what you do!
	</p>
	<form action="" method="post">
		Please enter your email that you used in the register <br><a href="fail.php">Forgot!?</a><br>
		<input class="fields" type="email" name="email" placeholder="YoEmail!">
		<input type="submit" value="GO!" class="buttons">
	</form>
	<?php
} else {
	header("Location: beta.php");
	exit();
}
}	?>
</body>
<?php
include("./all/includes/footer.php")
?>