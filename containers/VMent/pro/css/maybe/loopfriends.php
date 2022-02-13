<?php
$n = 0;
while (post_count($session_user_id) > $n) {
	$query = mysql_query("SELECT `post_id` FROM `friends` WHERE $session_user_id == `to` LIMIT $n, 100");
	$num_rows = mysql_num_rows($query);
  if ($num_rows > 0) {
	 $post_id = mysql_result($query, 0);
	 } 
	$post_data = post_data($post_id, "from", "to", "content", "content_type", "no", "cool", "date");
	?>
	<div id="general_post">
	<h4>
		<?php echo post_data["from"]; 
		echo post_data["date"];?>
		</h4>
		<?php echo post_data["content"]; 
		echo post_data["cool"];
		echo post_data["no"];
		?>
</div>
<?php
	$n++;
	if ($n > 10) {
break;
	}
}
?>