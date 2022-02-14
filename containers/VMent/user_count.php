<div style="text-align:center;">
	<?php
$user_count = user_count();
$suffix = ($user_count != 1) ? "are" : "is";
$suffix_2 = ($user_count != 1) ? "s" : "";
	?>
	There <?php echo $suffix; ?> currently <?php echo $user_count; ?> user<?php echo $suffix_2; ?> using VMENT! Be one too!
</div>