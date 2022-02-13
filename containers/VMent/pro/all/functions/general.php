<?php
function update_post($post_id, $user_id) {
	$result = mysql_result(mysql_query("SELECT `type` FROM `poststuff` WHERE `post_id` = $post_id AND `user_id` = $user_id"), 0);
	if ($result !== null) {
	if ($result === "no" ) {
	$actual_count = mysql_result(mysql_query("SELECT `'$result'` FROM `posts` WHERE `post_id` = $post_id"), 0);
	mysql_query("UPDATE `posts` SET `$result` = $actual_count+1 WHERE `post_id` = $post_id");
	} //else stuff
		//not working (doesnt delete)
		if ($result === null) {
		mysql_query("UPDATE `posts` SET `no` = 0 WHERE `post_id` = $post_id");	
		}
	} 
}
function make_poststuff($post_data) {
	array_walk($post_data, 'array_sanitize');
	$fields = '`' . implode('`, `', array_keys($post_data)) . '`';
	$data = "'" . implode("', '", $post_data) . "'";
	mysql_query("INSERT INTO `poststuff` ($fields) VALUES ($data)");

}
function poststuff($user_id, $type, $post_id) {
	$check_if_exists = mysql_result(mysql_query("SELECT `user_id` FROM `poststuff` WHERE `post_id` = $post_id AND `type` = $type"));
	if ($check_if_exists = null) {
$post_data = array(
	"post_id" 		=> $post_id,
	"user_id" 		=> $user_id,
	"type" 			=> $type
	);	
	make_poststuff($post_data);
	} else {
	mysql_query("DELETE FROM `poststuff` WHERE `user_id` = $user_id AND `type` = $type AND `post_id` = $post_id");
	}	
}
function email($to, $subject, $body) {
	mail($to, $subject, $body, "From: noreply@dcv.com");
}
function array_sanitize(&$item) {
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}
function sanitize($data) {
return htmlentities(strip_tags(mysql_real_escape_string($data)));	
}

function output_errors($errors) {
	return "<ul><li>" . implode("</li><li>", $errors) . "</li></ul";
}
function rank_check($rank) {
	if ($rank == 0) {
		return "N00B";
	}	else if ($rank == 1) {
		return "Less";
	}	else if ($rank == 2) {
		return "Random person";
	}	else if ($rank == 3) {
		return "Average";
	}	else if ($rank == 4) {
		return "Mayyybe";
	}	else if ($rank == 5) {
		return "OK";
	}		else if ($rank == 6) {
		return "More than OK";
	}	else if ($rank == 7) {
		return "More or less";
	}	else if ($rank == 8) {
		return "More";
	}	else if ($rank == 9) {
		return "Yeah";
	}	else if ($rank == 10) {
		return "Yay";
	}	else if ($rank == 11) {
		return "Cool";
	}	else if ($rank == 12) {
		return "Almost BOSS";
	}
	else if ($rank == 69) {
		return "BOSS";
	}
}
function update_rank($user_id) {
	if (mysql_result(mysql_query("SELECT `log_in` FROM `users` WHERE `user_id` = $user_id"), 0) == 10) {
	mysql_query("UPDATE `users` SET `rank` = 1 WHERE `user_id` = $id");
} else if (mysql_result(mysql_query("SELECT `log_in` FROM `users` WHERE `user_id` = $user_id"), 0) == 20) {
	mysql_query("UPDATE `users` SET `rank` = 2 WHERE `user_id` = $id");
} else if (mysql_result(mysql_query("SELECT `log_in` FROM `users` WHERE `user_id` = $user_id"), 0) == 31) {
	mysql_query("UPDATE `users` SET `rank` = 3 WHERE `user_id` = $id");
} else if (mysql_result(mysql_query("SELECT `log_in` FROM `users` WHERE `user_id` = $user_id"), 0) == 42) {
	mysql_query("UPDATE `users` SET `rank` = 4 WHERE `user_id` = $id");
} else if (mysql_result(mysql_query("SELECT `log_in` FROM `users` WHERE `user_id` = $user_id"), 0) == 55) {
	mysql_query("UPDATE `users` SET `rank` = 5 WHERE `user_id` = $user_id");
}
}

?>