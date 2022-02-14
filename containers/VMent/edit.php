<!doctype html>
<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
if (empty($_POST) === false) {
	$required_fields = array("first_name", "email");
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = "Fields marked with an asterisk are required, yes just like any other website";
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (email_exists($_POST["email"]) === true && $user_data["email"] !== $_POST["email"]) {
			"Sorry, the email '" . $_POST["email"] . "' already in use, please insert ANOTHER one";
		}
	}
}
	?>
	<title>MyVMENT-Edit!</title>


</head>

<body>
<?php	
if (empty($_POST) === false && empty($errors) === true) {
	$update_data = array(
		"first_name" => $_POST["first_name"],
		"last_name" => $_POST["last_name"],
		"email" => $_POST["email"],
		"aboutme" => $_POST["aboutme"]
	);
	update_user($session_user_id, $update_data);
	header("Location: edityay.php");
} else if (empty($errors) === false) {
	echo output_errors($errors);
}
if (isset($_FILES["profile"]) === true) {
	if (empty($_FILES["profile"]["name"]) === true) {
	echo "Please upload an image (#duh)";
} else {
	$allowed = array("jpg", "jpeg", "gif", "png");
	$file_name = $_FILES["profile"]["name"];
	$file_extn = strtolower(end(explode(".", $file_name)));
	$file_temp = $_FILES["profile"]["tmp_name"];
	$file_size = $_FILES["profile"]["size"];
	$maxsize    = 2097152;
	if ($maxsize<$file_size) {
	echo "Incorrect file size, must be maximum 2MB";
	} else {
	if (in_array($file_extn, $allowed) === true) {
		change_profile_image($session_user_id, $file_temp, $file_extn);
		header("Location: edityay.php");
		exit();
	} else {
	echo "Incorrect file type, must be:";
	echo implode(", ", $allowed);
	}
	}
}
}
?>
	<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="#" class="buttons">Settings</a>
		<a href="#" class="buttons">Friends</a>
		<a href="logout.php" class="buttons">Logout</a>
	<a href="myvment.php" class="buttons"> Back to: MyVMENT</a>
	</div>	
	<h2>Your details!</h2>
	<form action="" method="post">
		First Name:* <input class="fields" type="text" name="first_name" value=<?php echo $user_data["first_name"]; ?> ><br>
		Last Name: <input class="fields" type="text" name="last_name" value=<?php echo $user_data["last_name"]; ?> ><br>
		Email:* <input class="fields" type="email" name="email" value= <?php echo $user_data["email"]; ?>><br>
		About Me: <textarea class="fields" name="aboutme"><?php echo $user_data["aboutme"]; ?></textarea><br>
		<input type="submit" value="GO!" class="buttons"><br>
	</form>
	<h2>Profile Pic</h2>
	<form action="" method="post" enctype="multipart/form-data">
	VProfile Image:<div class="profileedit">
		<input type="file" name="profile" ><br>
		<input type="submit" value="Change Profile Pic" class="buttons">
		</div>
	</form>
</body>
</html>