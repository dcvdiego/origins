<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
if (isset($_GET["force"]) === true && empty($_GET["force"]) === true) {
?> 
<p>
	You must change your password in order to use VMENT again!
</p>
<?php
}
if (empty($_POST) === false) {
	$required_fields = array("current_password", "password", "password_again");
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = "Fields marked with an asterisk are required, yes just like any other website";
			break 1;
		}
	}
	if (md5($_POST["current_password"]) === $user_data["password"]) {
		if (trim($_POST["password"]) !== trim($_POST["password_again"])){
			$errors[] = "Your new passwords do NOT match, make sure you are not computer dislexic and try again";
		} else if (strlen($_POST["password"]) < 6) {
			$errors[] = "Your new password must ALSO be at least 6 characters, you REALLY want to get hacked right?";	
		}
	} else {
		$errors[] = "Your current password does not match with the password you submitted before, please concentrate more and try again";
	}
	
}
?>
<title>MyVMENT-Change Password</title>
</head>
<body>
	<?php
if (empty($_POST) === false && empty($errors) === true) {
	change_password($session_user_id, $_POST["password"]);
	header("Location: pwdyay.php");
} else if (empty($errors) === false) {
	echo output_errors($errors);
}
	?>
<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="#" class="buttons">Settings</a>
		<a href="#" class="buttons">Friends</a>
		<a href="logout.php" class="buttons">Logout</a>
	<a href="myvment.php" class="buttons"> Back to: MyVMENT</a>
	</div>	
<form action="" method="post">
	Current Password*: <input class="fields" type="password" name="current_password"><br>
	New Password*: <input class="fields"  type="password" name="password"><br>
	New Password(AGAIN!)*: <input class="fields" type="password" name="password_again"><br>
	<input type="submit" value="CHANGE YO PASSWORD!" class="buttons">
	</form>	

</body>
<?php
include("./all/includes/footer.php");
?>