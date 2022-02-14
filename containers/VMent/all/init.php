<?php
session_start();
//error_reporting(0);
$current_file = explode("/", $_SERVER["SCRIPT_NAME"]);
$current_file = end($current_file);
require "database/connect.php";
require "functions/general.php";
require "functions/users.php";
if (logged_in() === true) {
	$session_user_id = $_SESSION["user_id"];
	$user_data = user_data($session_user_id, "user_id", "username", "password", "first_name", "last_name", "email", "bday", "aboutme", "active", "date", "password_recover", "rank", "profile");
	if (user_active($user_data["username"]) === false) {
		session_destroy();
		header("Location: beta.php");
		exit();
	}
	if ($current_file !== "changepassword.php" && $user_data["password_recover"] == 1) {
		header("Location: changepassword.php?force");
		exit();
	}
	$friend_requests_count = friend_requests_count($session_user_id);
}

$errors = array();
