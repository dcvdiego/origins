<?php
include("./all/init.php");
//Search code!
//Uncontinued, will take a long time since have to add all data from user and from friend :(
if (isset($_POST["search_term"])) {
	$search_term = sanitize($_POST["search_term"]);
	if (!empty($search_term)) {
	$search = mysqli_query("SELECT * FROM `friends` WHERE `user_id` = $session_user_id OR `friend_id` = $session_user_id AND `friend_username` LIKE '%$search_term%' AND `active` = 1 OR `user_name` LIKE '%$search_term%' AND `active` = 1");	
	$result_count = mysqli_num_rows($search);
	$suffix = ($result_count != 1) ? "s" : "";
		echo "<p id='dropdown'>Your search for <em>", $search_term, "</em> returned <em>", $result_count, "</em> result" , $suffix, "</p>";
		while ($results_row = mysqli_fetch_assoc($search)) {
			echo "<div id='dropdown'><a href='", $results_row["username"], "'>", $results_row["first_name"], " ", $results_row["last_name"], " (", $results_row["username"], ")</a></div>";
		}
	}
}
?>