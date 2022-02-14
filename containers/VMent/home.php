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
		<div id="profile" style="display: inline-block; margin: 0px; margin-right: 10px; float: left;">
			<a href="<?php echo $user_data["username"]; ?>">
				<img style="border-radius: 15px;" id="profilepicfortopbar" src="<?php echo $user_data["profile"] ?>" alt="<?php echo $user_data["username"] ?>'s profile pic">
			</a>
		</div>
		<h4 style="display: inline-block; margin: 0px; float: left;"> Vat up
			<?php
			echo $user_data["username"];
			?>?</h4>
		<div id="menu">
			<li>
				<div href="#" class="buttons" style="float: left; font-size: 30px; margin-right: 10px; margin-left: 20px; padding-right: 10px; padding-left: 10px;">+
				</div>
		</div>
		<div class="submenu">
			<li><a href="#" class="buttons" onclick="newGeneralPost();">GPost</a></li>
			<li><a href="#" class="buttons" onclick="">VPic</a></li>
		</div>
		<a href="settings.php" class="buttons" style="margin-top: 6px; float: left; margin-right: 10px; margin-left: 10px;">Settings</a>
		<a href="friends.php" id="friends" class="buttons" style="margin-top: 6px; float: left; margin-right: 10px; margin-left: 10px;">Friends</a>
		<a href="#" style="margin-left: -250px;" onclick="this.style.display = 'none'; document.getElementById('searchdiv').style.display = 'inline-block'" id="searchIcon" class="buttons">
			<img style="width: 40px;" src="http://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Magnifying_glass_icon.svg/490px-Magnifying_glass_icon.svg.png">
		</a>
		<div id="searchdiv" class="fields" style="margin: 0; display: inline-block;">
			<form action="home.php" class="fields" method="post">
				<input id="search" class="fields" type="text" name="search" placeholder="Search..." autocomplete="off" />
				<p id="searchdrop">
				<div id="search_results"></div>
			</form>
		</div>
		<span id="searchText">Search</span>
		<a href="logout.php" class="buttons" style="float: right; margin-top: 7.5px;">Logout</a>
		<a href="<?php echo $user_data["username"] ?>" class="buttons" style="margin-top: 7.5px; float: right; margin-right: 10px; margin-left: 10px;"> <?php echo $user_data["first_name"]; ?> </a>
		<a href="myvment.php" style="margin-top: 7.5px; float: right; margin-right: 10px; margin-left: 10px;" class="buttons">MyVMENT</a>
	</div>
	<br>
	<br>
	<br>
	<p id="readBetter" style="z-index: 1;">
		<!--General POSTS! -->
	<h3 id="newText" style="visibility: hidden;">
		New general post:
	</h3>
	<form id="form" action="home.php" method="post">
	</form>
	<?php
	if (isset($_GET["no"]) === true && empty($_GET["no"]) === false) {
		poststuff($session_user_id, "no", $_GET["no"]);
		header("Location: home.php");
		exit();
	}
	$n = 0;
	while (post_count($session_user_id) > $n) {
		$query = mysqli_query($connect, "SELECT `post_id` FROM `posts` WHERE $session_user_id = `to_id` ORDER BY  `posts`.`post_id` DESC LIMIT $n, 100");
		$num_rows = mysqli_num_rows($query);
		if ($num_rows > 0) {
			$post_id = mysqli_data_seek($query, 0);
		} else {
			echo "No data recieved! WEIRD -,-";
		}
		$post_data = post_data($post_id, "from_id", "to_id", "content", "content_type", "no", "cool", "date", "vments");
		$from_data = user_data($post_data["from_id"], "username", "first_name");
		update_post($post_id, $session_user_id);
	?>
		<div class="post" style="background-color: #19C7A6; border-style: dashed; border-color: #009A7D; border-width: 1px; text-align: center;">
			<h3>
				|| <?php echo $from_data["username"]; ?> ||<br>
				<?php $date = $post_data["date"];
				if ($date === date("Y-m-d")) {
					echo "Today";
				} else if ($date === date("Y-m-d", strtotime("-1 days"))) {
					echo "Yesterday";
				} else {
					echo $date;
				}
				?><br>
			</h3>
			<?php echo stripslashes($post_data["content"]); ?>
			<br>
			<br>
			<a href="?cool=<?php echo $post_id; ?>">
				<div class="buttons" name="cool"><?php echo $post_data["cool"]; ?> Cool</div>
			</a>
			<a href="?no=<?php echo $post_id; ?>">
				<div class="buttons" name="no"><?php echo $post_data["no"];
												$check = mysqli_data_seek(mysqli_query($connect, "SELECT `type` FROM `poststuff` WHERE `user_id` = $session_user_id AND `post_id` = $post_id"), 0);
												//doesnt work
												if ($check === "") {
													echo " No<br></div></a>";
												} else {
													echo " Unno<br></div></a>";
												}
												?>
					<a href="?vment=<?php echo $post_id; ?>">
						<div class="buttons" name="vment"><?php echo $post_data["vments"]; ?> VMENTS<br></div>
					</a>
				</div>
				<br>
				<br>
			<?php
			$n++;
			if ($n > 10) {
				break;
			}
		}
		if (empty($_POST) === false) {
			if (empty($_POST["general"]) === false) {
				$content = $_POST["general"];
				make_post($session_user_id, $session_user_id, $content, "general");
				header("Location: home.php");
				exit();
			} //else stuff!
		}
			?>
			<h4>
				Don't worry, this sucky chatbox is just for now, coming soon, a new way to communicate with friends!
			</h4>
			<embed wmode="transparent" src="http://www.xatech.com/web_gear/chat/chat.swf" quality="high" width="540" height="405" name="chat" FlashVars="id=207371890" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://xat.com/update_flash.php" /><br><small><a target="_BLANK" href="http://vment.comli.com"></a>Back in BLACK! <a target="_BLANK" href="http://xat.com/web_gear/chat/go_large.php?id=207371890">Go Large!</a></small><br>
			<?php
			include("./all/includes/footer.php")
			?>
			<marquee behavior="scroll" direction="left" scrollamount="16">DCV</marquee>
			<marquee behavior="scroll" direction="left" scrollamount="17">Will allways</marquee>
			<marquee behavior="scroll" direction="left" scrollamount="18">Be there</marquee>
			<marquee behavior="scroll" direction="left" scrollamount="19">For you!</marquee>
			<script src="jquery-2.1.0.min.js"></script>
			<script src="script.js"></script>
</body>

</html>