<!doctype html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>VMENT-Anytime, Anywhere, Anything!-Sign Up</title>
	<link type= "text/css" rel="stylesheet" href="./css/stylesheet.css" />
<?php
include ("./all/init.php");
if (empty($_POST) === false) {
$required_fields = array("first_name", "email", "username", "password", "password_again");
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = "Fields marked with an asterisk are required, yes just like any other website";
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (user_exists($_POST["username"]) === true) {
		$errors[] = "Sorry, the username '" . $_POST["username"] . "' is already taken, please be more creative and try again";	
		}
		if (preg_match("/\\s/", $_POST["username"]) == true) {
		$errors[] = "There must be NO SPACES IN YOUR USERNAME!";	
		}
		if (strlen($_POST["password"]) < 6) {
			$errors[] = "Your password must be at least 6 characters, HOW SECURE ARE YOU?";
		}
		if ($_POST["password"] !== $_POST["password_again"]) {
			$errors[] = "Your passwords do not match, make sure you don't have amnesia and try again";
		}
		if (email_exists($_POST["email"]) === true) {
			$errors[] = "Sorry, the email '" . $_POST["email"] . "' already in use, please insert ANOTHER one";
		}
		if (preg_match("/^[a-zA-Z'-]+$/",$_POST["bday"]) == true) {
			$errors[] = "The date must be in this format: dd/mm/yyyy";
		}
		if(preg_match("/[a-zA-Z'-]/",$_POST["first_name"]) == false) { 
			$errors[] = "Your name looks invalid, I don't think your parents will call you that";
		}
		if (preg_match("/\\s/", $_POST["first_name"]) == true) {
		$errors[] = "There must be NO SPACES in your first name, weirdo";
	}
}

?>
</head>

<body>
<?php
if (empty($_POST) === false && empty($errors) === true) {
	$register_data = array(
	"username" 		=> $_POST["username"],
	"password" 		=> $_POST["password"],
	"first_name" 	=> $_POST["first_name"],
	"last_name" 	=> $_POST["last_name"],
	"email" 		=> $_POST["email"],
	"email_code" 	=> md5($_POST["username"] + microtime()),	
	"bday" 			=> $_POST["bday"],
	"aboutme" 		=> $_POST["aboutme"],
	"date" 			=> date("Y/m/d")	
	);
	register_user($register_data);
	header("Location: yay.php");
} else if (empty($errors) === false) {
	echo output_errors($errors);
}
}
	?>	
		<form action="" method="post" target="_top">
		First Name*: <input class="fields" type="text" name="first_name" size="20" placeholder="YoFirstName..."><br>
		Last Name: <input class="fields" type="text" name="last_name" size="20"placeholder="YoLastName..."><br>
		Birthday: <input class="fields" type="date" name="bday"><br>
		E-mail*: <input class="fields" type="email" name="email" size="20" placeholder="YoEmail"><br>
		Username(Maximum 32 characters)*:  <input class="fields" type="text" name="username" maxlength="15" size="20" placeholder="YoUser"><br>
		Password(Min. 6)*: <input class="fields" type="password" name="password" placeholder="YoPassword"><br>
		Password (AGAIN!)*: <input class="fields" type="password" name="password_again" placeholder="Yes, again PLEASE!"><br>
		About Me! <textarea class="fields" name="aboutme" placeholder="Who are you?"></textarea>
			<input type="submit" value="GO!" class="buttons"/>
	</form>
	</body>
</html>