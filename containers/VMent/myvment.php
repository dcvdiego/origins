<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
?>
<title>MyVMENT</title>
</head>

<body>
	<div id="topbarUI" style="text-align: center; font-size: 25px;">
		<a href="#" class="buttons">New</a>
		<a href="#" class="buttons">Settings</a>
		<a href="friends.php" class="buttons">Friends</a>
		<a href="logout.php" class="buttons">Logout</a>
		<a href="home.php" class="buttons">Home</a>
	</div>
	<div id="readBetter">
		<h2 id="readBetter">
			Here is your information, to change it, click on the "Edit" button!
		</h2>
		First Name: <?php echo $user_data["first_name"]; ?> <a href="edit.php">Edit!</a>
		<br>
		Last Name: <?php echo $user_data["last_name"]; ?> <a href="edit.php">Edit!</a>
		<br>
		Username: <?php echo $user_data["username"]; ?>
		<br>
		Birthday: <?php echo $user_data["bday"]; ?>
		<br>
		About Me: <?php echo $user_data["aboutme"]; ?> <a href="edit.php">Edit!</a>
		<br>
		Password(Encoded!) <?php echo $user_data["password"]; ?> <a href="changepassword.php">Edit!</a>
		<br>
		Rank: <?php echo rank_check($user_data["rank"]); ?> <br>
		Vment picture:<br>
		<a href="<?php echo $user_data["username"]; ?>">
			<img style="border-radius: 15px;" id="profilepic" heigth="10%" width="10%" src="<?php echo $user_data["profile"] ?>" alt="<?php echo $profile_data["username"] ?>'s profile pic">
		</a> <a href="edit.php">Edit!</a>
	</div>
	<?php
	include("./all/includes/footer.php")
	?>
</body>

</html>