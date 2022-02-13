<?php
function doc_data($doc_id) {
	$data = array();
	$doc_id = (int)$doc_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', (array)$func_get_args) . '`';
		$data =  mysql_fetch_assoc(mysql_query("SELECT $fields FROM `docs` WHERE `doc_id` = $post_id"));
		return $data;
	}
}
function post_count($user_id) {
	return mysql_num_rows(mysql_query("SELECT `post_id` FROM `posts` WHERE `to` = $user_id"));
  }
function post_data($post_id) {
	$data = array();
	$post_id = (int)$post_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', (array)$func_get_args) . '`';
		$data =  mysql_fetch_assoc(mysql_query("SELECT $fields FROM `posts` WHERE `post_id` = $post_id"));
		return $data;
	}
}
function vment_data($post_id) {
	$data = array();
	$user_id = (int)$user_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', (array)$func_get_args) . '`';
		$data =  mysql_fetch_assoc(mysql_query("SELECT $fields FROM `vments` WHERE `post_id` = $post_id"));
		return $data;
	}
}
function block_count($user_id) {
	return mysql_num_rows(mysql_query("SELECT `id` FROM `friends` WHERE `active` = 2 AND `user_id` = $user_id OR `friend_id` = $user_id"));
  }
function unblock($user_id, $friend_id) {
	mysql_query("DELETE FROM `friends` WHERE `user_id` = $user_id AND `friend_id` = $friend_id");
}
function block_check($user_id, $friend_id) {
$mysql_num_rows = mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `active` = 2 AND `user_id` = $user_id OR `friend_id` = $friend_id"));
if ($mysql_num_rows == 0) {
return mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `active` = 2 AND `user_id` = $friend_id OR `friend_id` = $user_id"));
} else if ($mysql_num_rows > 0) {
return $mysql_num_rows;
}
}
function make_post($user_id, $friend_id, $content, $content_type) {
$post_data = array(
	"from" 		=> $user_id,
	"to" 		=> $friend_id,
	"content" 	=> $content,
	"content_type" => $content_type,
	"date" 		=> date("Y/m/d")
	);
	make_post_apply($post_data);
}
function make_post_apply($post_data) {
	array_walk($post_data, 'array_sanitize');
	$fields = '`' . implode('`, `', array_keys($post_data)) . '`';
	$data = "'" . implode("', '", $post_data) . "'";
	mysql_query("INSERT INTO `posts` ($fields) VALUES ($data)");
}
function change_profile_image($user_id, $file_temp, $file_extn) {
	$file_path = "upload/profile/" .  substr(md5(time()), 0, 10) . "." . $file_extn;
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` SET `profile` = '$file_path' WHERE `user_id` = " . (int)$user_id);
}
function block($user_id, $friend_id) {
function exist_check($friend_id, $user_id) { 
return (mysql_result(mysql_query("SELECT COUNT(`id`) FROM `friends` WHERE `friend_id` = $friend_id AND `user_id` = $user_id OR `friend_id` = $user_id AND `user_id` = $friend_id"), 0) == 1) ? true : false;
}
if (exist_check($friend_id, $user_id) === false) {
$request_data = array(
	"user_id" 		=> $user_id,
	"friend_id" 	=> $friend_id,
	"date" 			=> date("Y/m/d"),
	"active"		=> 2
	);
	friend_request_apply($request_data);
} else {
	mysql_query("DELETE FROM `friends` WHERE `user_id` = $user_id AND `friend_id` = $friend_id OR `user_id` = $friend_id AND `friend_id` = $user_id");
	$request_data = array(
	"user_id" 		=> $user_id,
	"friend_id" 	=> $friend_id,
	"date" 			=> date("Y/m/d"),
	"active"		=> 2
	);
	friend_request_apply($request_data);
}
}
function friend_accept($friend_id, $user_id) {
	mysql_query("UPDATE `friends` SET `active` = 1 WHERE `user_id` = $user_id AND `friend_id` = $friend_id");
}
function friend_ignore($friend_id, $user_id) {
	mysql_query("DELETE FROM `friends` WHERE `user_id` = $user_id AND `friend_id` = $friend_id");
}
function unfriend($friend_id, $user_id) {
	mysql_query("DELETE FROM `friends` WHERE `user_id` = $user_id AND `friend_id` = $friend_id OR `user_id` = $friend_id AND `friend_id` = $user_id");
}
function friend_request_apply($request_data) {
array_walk($request_data, 'array_sanitize');
	$fields = '`' . implode('`, `', array_keys($request_data)) . '`';
	$data = "'" . implode("', '", $request_data) . "'";
	mysql_query("INSERT INTO `friends` ($fields) VALUES ($data)");
}
function friend_requests_count($friend_id) {
error_reporting(1);
 	return mysql_num_rows(mysql_query("SELECT `id` FROM `friends` WHERE `active` = 0 AND `friend_id` = $friend_id")); 
}
error_reporting(1);
function friend_count($user_id) {
	return mysql_num_rows(mysql_query("SELECT `id` FROM `friends` WHERE `active` = 1 AND `user_id` = $user_id OR `friend_id` = $user_id"));
  }
function friend_request($user_id, $friend_id, $username) {
    $request_data = array(
	"user_id" 		=> $user_id,
	"friend_id" 	=> $friend_id,
	"date" 			=> date("Y/m/d"),
	"friend_username" => $username	
	);
	  friend_request_apply($request_data);
  }
function recover($mode, $email) {
	$mode = sanitize($mode);
	$email = sanitize($email);
	$user_data = user_data(user_id_from_email($email), "first_name", "username");
	if ($mode === "username") {
		email($email, "Your username!", "Hello" . $user_data["first_name"] ."\n\nYour username is:" . $user_data["username"] ."\n\n Thanks,\n\n -The VMENT Team (Basically Diego :D) DCV.Inc!");
	} else if ($mode === "password") {
		$generated_password = substr(md5(rand(999, 999999)), 0, 8);
		change_password($user_data["user_id"], $generated_password);
		update_user($user_data["user_id"], array("password_recover" => 1));
		email($email, "Your new password!", "Hello" . $user_data["first_name"] ."\n\nYour new password is:" . $generated_password ."\n\n Thanks,\n\n -The VMENT Team (Basically Diego :D) DCV.Inc!");
	}
}
function update_user($user_id, $update_data) {
	$update = array();
	array_walk($update_data, 'array_sanitize');
	$register_data["password"] = md5($register_data["password"]);
	foreach($update_data as $field=>$data) {
	$update[] = "`" . $field . "` = '" . $data . "'";
	}
	mysql_query("UPDATE `users` SET" . implode(", ", $update) . " WHERE `user_id` = $user_id");
}
function activate($email, $email_code) {
	$email = mysql_real_escape_string($email);
	$email_code = mysql_real_escape_string($email_code);
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"), 0) == 1) {
		mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
		return true;
	} else {
		return false;
	}
}
function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);
	mysql_query("UPDATE `users` SET `password` = '$password', `password_recover` = 0 WHERE `user_id` = $user_id");
}
function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data["password"] = md5($register_data["password"]);
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = "'" . implode("', '", $register_data) . "'";
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	email($register_data["email"], "Activate your ACCOUNT!", "Hello" . $register_data["firstname"] . ", \n\nYou need to activate your ACCOUNT! Thanks for actually taking your time (and now I know you are not a robot) Alright, to activate your account, click on the link BELOW:\n\n http://vment.comli.com/activate.php?email=" . $register_data["email"] . "&email_code=" . $register_data["email_code"] . "\n\n -The VMENT Team (Basically Diego :D) DCV.Inc!");
}
function user_count() {
return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);
}
function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', (array)$func_get_args) . '`';
		$data =  mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		return $data;
	}
}
function logged_in() {
	return (isset($_SESSION["user_id"])) ? true : false;
}
function user_exists($username) {
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'"), 0) == 1) ? true : false;
}
function email_exists($email) {
	$email = sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'"), 0) == 1) ? true : false;
}
function user_active($username) {
	$username = sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1"), 0) == 1) ? true : false;
}
function user_id_from_username($username) {
	$username = sanitize($username);
    return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0, "user_id");
}
function user_id_from_email($email) {
	$email = sanitize($email);
    return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"), 0, "user_id");
}
function login($username, $password) {
	$user_id = user_id_from_username($username);
	$username = sanitize($username);
	$password = md5($password);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>

