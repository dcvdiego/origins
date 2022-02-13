<?php
include("./all/init.php");
//Search code!
if (isset($_POST["search_term"])) {
	$search_term = sanitize($_POST["search_term"]);
	if (!empty($search_term)) {
	$search = mysql_query("SELECT * FROM `users` WHERE `first_name` LIKE '%$search_term%' AND `active` = 1 OR `last_name` LIKE '%$search_term%' AND `active` = 1 OR `username` LIKE '%$search_term%' AND `active` = 1");	
	$result_count = mysql_num_rows($search);
	$suffix = ($result_count != 1) ? "s" : "";
		echo "<p id='dropdown'>Your search for <em>", $search_term, "</em> returned <em>", $result_count, "</em> result" , $suffix, "</p>";
		while ($results_row = mysql_fetch_assoc($search)) {
			echo "<div id='dropdown'><a href='", $results_row["username"], "'>", $results_row["first_name"], " ", $results_row["last_name"], " (", $results_row["username"], ")</a></div>";
		}
	}
}
?>
