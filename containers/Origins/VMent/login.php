<?php
include("./all/init.php");
if (empty($_POST) === false) {
	$username = $_POST["username"];
	$password = $_POST["password"];
}
	if (empty($username) === true || empty($password) === true) {
		$errors[] = "You need to enter a username AND a password, yes, you are retarded";
	} else if (user_exists($username) === false) {
	$errors[] = "We can't find your username, please register first (I thought you knew this already)";	
	} else if (user_active($username) === false) {
	$errors[] = "You have to activate your account through email, yes, I told you this before...";	
	} else {
		if (strlen($password) > 32) {
			$errors[] = "Password is too long, do you know how to count?";
		}
		
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = "That username/password combination is incorrect, make sure you know how to spell and write as well as not trying to hacking into other users!";
		} else if ($login === false && user_data("password_recover") == 1) {
			$errors[] = "That username/password combination is incorrect, you've requested a new password, if you didn't receive an email please click on the forgot password link again.";
		}
		else {
		$_SESSION["user_id"] = $login;
			mysql_query("UPDATE `users` SET `log_in` = `log_in`+1 WHERE `user_id` = '" . $login . "'");
			update_rank($session_user_id);
			header("Location: home.php");
			exit();
		}
	}
if (empty($errors) === false) {
?>
<h1>
	WHOOPS!
</h1>
<h2>
	We tried to log you in but....
</h2>
<?php
echo output_errors($errors);
	?>
<h6>
<a href="beta.php" class="buttons">Go Back</a>	
</h6>
<?php
}
?>