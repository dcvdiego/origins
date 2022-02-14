<!doctype html>
<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
include("./all/includes/notificationcheck.php");
	?>
	<title>VMENT-Anytime, Anywhere, Anything!-Welcome!</title>
</head>

<body>
	<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="home.php" class="buttons">Home</a>
		<a href="logout.php" class="buttons" style="margin-top: 7.5px;">Logout</a>
		<a href="<?php echo $user_data["username"] ?>" class="buttons" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;"> <?php echo $user_data["first_name"]; ?> </a>
		<a href="myvment.php" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;" class="buttons">MyVMENT</a>
		<a href="friends.php" id="friends" class="buttons" style="margin-top: 6px; margin-right: 10px; margin-left: 10px;">Friends</a>
	</div>
	<h1>
		Settings
	</h1>
	<h2>
	<?php 
	if (block_count($session_user_id) > 0) {
?>
		Blocked users:
	</h2>
	<?php 
	} else {
	?>
	No blocked users!
	<?php
$n = 0;
while (block_count($session_user_id) > $n) {
	$query = mysqli_query("SELECT `user_id` FROM `friends` WHERE `active` = 2 AND $session_user_id != `user_id` AND `friend_id` = $session_user_id LIMIT $n, 100");
	$num_rows = mysqli_num_rows($query);
	$beforeid = $friend_data["user_id"];
  if ($num_rows > 0) {
	 $friend_id = mysqli_data_seek($query, 0);
	 } else {
	 $query = mysqli_query("SELECT `friend_id` FROM `friends` WHERE `active` = 2 AND `user_id` = $session_user_id");
	 $num_rows = mysqli_num_rows($query);
	 if ($num_rows > $n) {
	 $friend_id = mysqli_data_seek($query, $n);
	 } else {
	  $friend_id = mysqli_data_seek($query, $n-1);
	  if ($friend_data = $friend_id) {
	  $friend_id = mysqli_data_seek($query, 0);
	  }
	  }
	 }
	$friend_data = user_data($friend_id, "user_id", "username", "first_name", "last_name", "profile");
	?><br> <div class="frienddiv">
	<div class="frienddiv">
		Profile:<div class="frienddiv"><a id="profilepic" href="<?php echo $friend_data['username']; ?>">
		<img style='border-radius: 15px;' id='profilepic' heigth='10%' width='10%' src="<?php echo $friend_data['profile'] ?>" alt="<?php echo $friend_data['username'] ?>'s profile pic">
		</a>
		</div>	
	</div>
	</div>
	<div class="frienddiv" id="details">First name:  <?php echo $friend_data['first_name'];?></div>
	<div class="frienddiv" id="details">Last name: <?php echo $friend_data['last_name'];?> </div>
	<div class="frienddiv" id="details">Username: <?php echo $friend_data['username'];?></div>
	<div></div>
	<a href="friendrequest.php?unblock=<?php echo $friend_data['user_id']; ?>" class='buttons'>Unblock</a>
	<br>
	<br>
	<br><?php
$n++;
}
?>
</body>
</html>