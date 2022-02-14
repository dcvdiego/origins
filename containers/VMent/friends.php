<!DOCTYPE html>
<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";

include $_SERVER['DOCUMENT_ROOT'] . "/origins/containers/VMent/all/database/connect.php";
?>
<title>VMENT-Anytime, Anywhere, Anything!-VFriends!</title>
</head>

<body>
	<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="settings.php" class="buttons" style="margin-top: 6px; margin-right: 10px; margin-left: 10px;">Settings</a>
		<a href="home.php" class="buttons">Home</a>
		<a href="logout.php" class="buttons" style="margin-top: 7.5px;">Logout</a>
		<a href="<?php echo $user_data["username"] ?>" class="buttons" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;"> <?php echo $user_data["first_name"]; ?> </a>
		<a href="myvment.php" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;" class="buttons">MyVMENT</a>
	</div>
	<?php
	//not showing anything for some reason!
	if (friend_requests_count($session_user_id) > 0 || friend_count($session_user_id) > 0) {
		$check_query = mysqli_query($connect, "SELECT `user_id` FROM `friends` WHERE `active` = 0");
		$num_rows = mysqli_num_rows($connect, $check_query);
		if ($num_rows != 0) {
			$check_user = mysqli_data_seek($check_query, 0);
			if ($session_user_id == $check_user) {
				echo "Your vrequests have been sent successfully";
			}
		} else {
			echo "You have " . friend_count($session_user_id) . " vfriends and " . friend_requests_count($session_user_id) . " vrequests";
			//friends!
	?>
			<h1>VFriends</h1>
			<h3>Showing first 10, if you have more than 10 friends, you can search them up on the Home search bar, friend search bar coming soon!</h3>
			<?php
			$n = 0;
			while (friend_count($session_user_id) > $n) {
				$query = mysqli_query($connect, "SELECT `user_id` FROM `friends` WHERE `active` = 1 AND $session_user_id != `user_id` AND `friend_id` = $session_user_id LIMIT $n, 100");
				$num_rows = mysqli_num_rows($query);
				if ($num_rows > 0) {
					$friend_id = mysqli_data_seek($query, 0);
				} else {
					$query = mysqli_query($connect, "SELECT `friend_id` FROM `friends` WHERE `active` = 1 AND `user_id` = $session_user_id");
					$num_rows = mysqli_num_rows($query);
					if ($num_rows > $n) {
						$friend_id = mysqli_data_seek($query, $n);
					} else {
						$friend_id = mysqli_data_seek($query, $n - 1);
						if ($friend_data = $friend_id) {
							$friend_id = mysqli_data_seek($query, 0);
						}
					}
				}
				$friend_data = user_data($friend_id, "username", "first_name", "last_name", "profile");
			?><br>
				<div class="frienddiv">
					<div class="frienddiv">
						Profile:<div class="frienddiv"><a id="profilepic" href="<?php echo $friend_data['username']; ?>">
								<img style='border-radius: 15px;' id='profilepic' heigth='10%' width='10%' src="<?php echo $friend_data['profile'] ?>" alt="<?php echo $friend_data['username'] ?>'s profile pic">
							</a>
						</div>
					</div>
				</div>
				<div class="frienddiv" id="details">First name: <?php echo $friend_data['first_name']; ?></div>
				<div class="frienddiv" id="details">Last name: <?php echo $friend_data['last_name']; ?> </div>
				<div class="frienddiv" id="details">Username: <?php echo $friend_data['username']; ?></div>
				<div></div>
				<a href="<?php echo $friend_data['username']; ?>" class='buttons'>Look at profile!</a>
				<a href="friendrequest.php?unfriend=<?php echo $friend_data['user_id']; ?>" class='buttons'>Unfriend</a>
				<br>
				<br>
				<br><?php
					if ($n > 8) {
						break;
					}
					$n++;
				}
				//friend requests!
			} //WORKING ON WHILE LOOP FOR FRIEND REQUESTS :D
					?>
		<?php
		if (friend_requests_count($session_user_id) !== false && friend_requests_count($session_user_id) > 0) {
			$friend_id = mysqli_data_seek(mysqli_query($connect, "SELECT `user_id` FROM `friends` WHERE `active` = 0"), 0);
			$friend_data = user_data($friend_id, "user_id", "username", "first_name", "last_name", "profile");
		?>
			<h1>VRequests:</h1>

			<h4>Showing first two, if you have more than two friend requests, they will show after you've dealt with these.<br>
				I find that more organized and simple!
			</h4>
			<div>Profile:<br><a href="<?php echo $friend_data["username"]; ?>">
					<img style="border-radius: 15px;" id="profilepic" heigth="10%" width="10%" src="<?php echo $friend_data["profile"] ?>" alt="<?php echo $friend_data["username"] ?>'s profile pic">
				</a></div>
			<div>First name: <?php echo $friend_data["first_name"]; ?></div>
			<div>Last name: <?php echo $friend_data["last_name"]; ?> </div>
			<div>Username: <?php echo $friend_data["username"]; ?></div>
			<a href="friendrequest.php?accept=<?php echo $friend_data["user_id"]; ?>" class="buttons">Add as VFriend!</a>
			<a href="friendrequest.php?ignore=<?php echo $friend_data["user_id"]; ?>" class="buttons">Ignore as VFriend!</a>
			<a href="<?php echo $friend_data["username"]; ?>" class="buttons">Look at profile!</a>
			<br>
			<br>
			<?php
			if (friend_requests_count($session_user_id) > 1) {
				$friend_id = mysqli_data_seek(mysqli_query($connect, "SELECT `user_id` FROM `friends` WHERE `active` = 0"), 1);
				$friend_data = user_data($friend_id, "user_id", "username", "first_name", "last_name", "profile");
			?>
				<div>Profile:<br><a href="<?php echo $friend_data["username"]; ?>">
						<img style="border-radius: 15px;" id="profilepic" heigth="10%" width="10%" src="<?php echo $friend_data["profile"] ?>" alt="<?php echo $friend_data["username"] ?>'s profile pic">
					</a></div>
				<div>First name: <?php echo $friend_data["first_name"]; ?></div>
				<div>Last name: <?php echo $friend_data["last_name"]; ?> </div>
				<div>Username: <?php echo $friend_data["username"]; ?></div>
				<a href="friendrequest.php?accept=<?php echo $friend_data["user_id"]; ?>" class="buttons">Add as VFriend!</a>
				<a href="friendrequest.php?ignore=<?php echo $friend_data["user_id"]; ?>" class="buttons">Ignore as VFriend!</a>
				<a href="<?php echo $friend_data["username"]; ?>" class="buttons">Look at profile!</a> <?php
																									}
																								}
																							} else {
																								echo "You have no friends<br> Look for more friends in the general <a href='home.php'>home</a> search!";
																							}
																										?>
</body>