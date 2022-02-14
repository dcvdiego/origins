<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
if (isset($_GET["username"]) === true && empty($_GET["username"]) === false) {
	$username = $_GET["username"];
	if (user_exists($username) === true) {
		$user_id = user_id_from_username($username);
		$profile_data = user_data($user_id, "first_name", "last_name", "email", "aboutme", "username", "rank", "user_id", "bday", "profile");
		//if (block_check($session_user_id, $profile_data["user_id"]) > 0) {
		//echo "This user DOES NOT EXIST! <a href='home.php'> Go Back </a>";
		//exit();
	}
?>
	<title><?php echo $profile_data["username"] . "'s VFile!" ?></title>
	</head>

	<body>
		<div id="topbarUI" style="text-align: center; font-size: 25px;">
			<div id="menu">
				<li>
					<div href="#" class="buttons" style="float: left; font-size: 30px; margin-right: 10px; margin-left: 10px; padding-right: 10px; padding-left: 10px;">+
					</div>
			</div>
			<div class="submenu">
				<li><a href="#" class="buttons" onclick="newGeneralPost();">GPost</a></li>
				<li><a href="#" class="buttons" onclick="">VPic</a></li>
			</div>
			<a href="settings.php" class="buttons">Settings</a>
			<a href="friends.php" class="buttons">Friends</a>
			<a href="myvment.php" class="buttons">MyVMENT</a>
			<a href="logout.php" class="buttons">Logout</a>
			<a href="home.php" class="buttons">Home</a>
		</div>
		<div id="readBetter">
			<h2>
				<?php echo $profile_data["first_name"] ?>'s Vfile<br>
			</h2>
			<p>
				Username: <?php echo $profile_data["username"] ?><br>
				Email: <?php echo $profile_data["email"] ?><br>
				Rank: <?php echo rank_check($profile_data["rank"]); ?><br>
				About me: <?php echo $profile_data["aboutme"] ?><br>
				Vment picture:
				<a href="<?php echo $profile_data["username"]; ?>">
					<img style="border-radius: 15px;" id="profilepic" heigth="10%" width="10%" src="<?php echo $profile_data["profile"] ?>" alt="<?php echo $profile_data["username"] ?>'s profile pic" />
				</a>
				<button class="buttons" value="Block" onClick="self.location='friendrequest.php?block=<?php echo $profile_data["user_id"]; ?>'">
					Block!
				</button>
				<?php
				$check_query = mysqli_query("SELECT `user_id` FROM `friends` WHERE `active` = 1");
				if (mysqli_num_rows($check_query) != 0) {
					$friend_check = mysqli_data_seek($check_query, 0);
				}
				if ($friend_check == $profile_data["user_id"]) {
				?>
					<br>
					First name: <?php echo $profile_data["first_name"] ?><br>
					Last name: <?php echo $profile_data["last_name"] ?><br>
					Bday: <?php echo $profile_data["bday"] ?><br>
			<p id="readBetter" style="z-index: 1;">
				<!--General POSTS! -->
			<h3 id="newText" style="visibility: hidden;">
				New general post:
			</h3>
			<form id="form" action="home.php" method="post">
			</form>
		<?php
				}
				if (empty($_POST) === false) {
					if (empty($_POST["general"]) === false) {
						$content = $_POST["general"];
						make_post($session_user_id, $session_user_id, $content, "general");
						echo "<br>Post submitted!";
					} //else stuff!
				}
				$check_request_query = mysqli_query("SELECT `user_id` FROM `friends` WHERE `active` = 0");
				if (mysqli_num_rows($check_request_query) != 0) {
					$check_request = mysqli_data_seek($check_request_query, 0);
				} else {
					$check_request = 0;
				}
				//if ($profile_data["user_id"] == $session_user_id) {
				//echo "";
				//} else if ($friend_check != $profile_data["user_id"]) {
		?>
		<button class="buttons" value="Add as VFriend!" onClick="self.location='friendrequest.php?request=<?php echo $profile_data["user_id"];
																											echo '&friend_username=' . $profile_data["username"];
																											echo '&user_name=' . $user_data["username"] ?>'">
			Add as VFRIEND!
		</button>
		<?php
		//} else if($profile_data["user_id"] == $check_request) {
		?>
		<button class="buttons" value="Accept REQUEST!" onClick="self.location='friendrequest.php?accept=<?php echo $profile_data["user_id"]; ?>'">
			Accept VREQUEST!
		</button>
		<?php // } else { 
		?>
		<button class="buttons" value="Unfriend" onClick="self.location='friendrequest.php?unfriend=<?php echo $profile_data["user_id"]; ?>'">
			Unfriend!
		</button>
		<?php //}
		$n = 0;
		while (post_count($profile_data["user_id"]) > $n) {
			$user_id = $profile_data["user_id"];
			$query = mysqli_query($connect, "SELECT `post_id` FROM `posts` WHERE $user_id = `to_id` LIMIT $n, 100");
			$num_rows = mysqli_num_rows($query);
			if ($num_rows > 0) {
				$post_id = mysqli_data_seek($query, 0);
			} else {
				echo "No data recieved!";
			}
			$post_data = post_data($post_id, "from_id", "to_id", "content", "content_type", "no", "cool", "date", "vments");
			$from_data = user_data($post_data["from_id"], "username", "first_name");
		?>
			<div class="post" style="background-color: #19C7A6; border-style: dashed; border-color: #009A7D; border-width: 1px; text-align: center;">
				<h3>
					|| <?php echo $from_data["username"]; ?> <br>
					<?php $date = $post_data["date"];
					if ($date = date("Y/m/d")) {
						echo "Today";
					} else if ($date = date('d.m.Y', strtotime("-1 days"))) {
						echo "Yesterday";
					} else {
						echo $date;
					}
					?><br>
				</h3>
				<?php echo $post_data["content"]; ?> <br>
				<br>
				<div class="buttons"><?php echo $post_data["cool"]; ?> Cool</div>
				<div class="buttons"><?php echo $post_data["no"]; ?> No<br></div>
				<div class="buttons"><?php echo $post_data["no"]; ?> VMENTS<br></div>
			</div>
			<br>
			<br>
		<?php
			$n++;
			if ($n > 10) {
				break;
			}
		}
		?>
		</div>
		<script src="script.js"></script>
		<?php
		include("./all/includes/footer.php")
		?>
	</body>

</html>
<?php
	if (user_exists($username) === false) {
		echo "That user DOES NOT exists!"; ?>
	<a href="home.php">Go BACK!</a>
<?php
	}
}
exit();
?>