<!doctype html>
<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
if (isset($_GET["success"]) === true && empty($_GET["success"]) === true) {
?>
<h2>
	Yay, we've activated your account!!!!! Now you can <a href="loginform.php">LOGIN!</a>
	</h2>	
<?php	
}
else if (logged_in() === true) {
	header("Location: home.php");
	exit();
} 
if (isset($_GET["email"], $_GET["email_code"]) === true) {
	$email = trim($_GET["email"]);
	$email_code = trim($_GET["email_code"]);
	if (email_exists($email) === false) {
		$errors[] = "Oops, something went wrong and we couldn't find that EMAIL! WOW!";
	} else if (activate($email, $email_code) === false) {
		$errors[] = "We had problems activating your account!";
	}
	if (empty($errors) === false) {
	?>
	<h2>
		OOOPS!
	</h2>
<?php
	echo output_errors($errors);
	}	
	else {
		header("Location: activate.php?success");
		exit();
	}
} else {
	header("beta.php");
	exit();
}
	?>
	<title>VMENT-Anytime, Anywhere, Anything!-Activate yo Account!</title>


</head>

<body>
	<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="loginform.php" class="buttons">Login!</a>
	</div>
<?php
include("./all/includes/footer.php")
	?>
</body>
</html>	