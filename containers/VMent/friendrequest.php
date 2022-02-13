<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";

if (isset($_GET["request"]) === true && empty($_GET["request"]) === false) {
	friend_request($session_user_id, $_GET["request"], $_GET["username"]);
	header("Location: friendrequest.php?yay");
	exit();
} else if (isset($_GET["accept"]) === true && empty($_GET["accept"]) === false) {
	friend_accept($session_user_id, $_GET["accept"]);
	echo "<h1>YOU ARE NOW FRIENDS!</h1><br><a href='friends.php'>Go back!</a>";
}
else if (isset($_GET["ignore"]) === true && empty($_GET["ignore"]) === false) {
	friend_ignore($session_user_id, $_GET["ignore"]);
	echo "<h1>YOU ARE NOT FRIENDS!</h1><br><a href='friends.php'>Go back!</a>";
}
else if (isset($_GET["unfriend"]) === true && empty($_GET["unfriend"]) === false) {
	unfriend($session_user_id, $_GET["unfriend"]);
	echo "<h1>YOU ARE NOT FRIENDS ANYMORE!</h1><br><a href='friends.php'>Go back!</a>";
}
else if (isset($_GET["block"]) === true && empty($_GET["block"]) === false) {
	block($session_user_id, $_GET["block"]);
	echo "<h1>YOU ARE UNKNOWN TO EACH OTHER NOW!</h1><br><a href='friends.php'>Go back!</a>";
}
else if (isset($_GET["unblock"]) === true && empty($_GET["unblock"]) === false) {
	unblock($session_user_id, $_GET["unblock"]);
	echo "<h1>YOU ARE KNOWN TO EACH OTHER NOW!</h1><br><a href='settings.php'>Go back!</a>";
}
else if (isset($_GET["yay"]) === true && empty($_GET["yay"]) === true) {
	?> 
<h1>
	Your friend request has been sent!
</h1>
<p>
	Unless you typed that link yourself :(
</p>
<a href="home.php" class="buttons">Go BACK HOME!</a>
<?php
} else {
	header("Location: beta.php");
	exit();
  }
?>