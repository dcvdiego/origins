<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
require "./all/includes/sessioncheck.php";
?>
</head>
<body>
<div id="topbarUI" style="text-align: center; font-size: 25px;">
<a href="#" class="buttons" style="margin-top: 6px; margin-right: 10px; margin-left: 10px;">Settings</a>
		<a href="friends.php" id="friends" class="buttons" style="margin-top: 6px; margin-right: 10px; margin-left: 10px;">Friends</a>
		<a href="logout.php" class="buttons" style="margin-top: 7.5px;">Logout</a>
		<a href="<?php echo $user_data["username"] ?>" class="buttons" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;"> <?php echo $user_data["first_name"]; ?> </a>
		<a href="myvment.php" style="margin-top: 7.5px; margin-right: 10px; margin-left: 10px;" class="buttons">MyVMENT</a>
</div>
<h1>VFriend Vsearch!</h1>
<p>To remember their usernames, you must only search for their usernames :D</p>
<div id="friendsearchdiv" class="fields" style="margin: 0; display: inline-block;">
			<form action="friendsearch.php" method="post">
				<input id="friendsearch" class="fields" type="text" name="search" placeholder="Search..." autocomplete="off" />		
				<p id="searchdrop"><div id="search_results"></div>
			</form>
		</div>
		<script src="jquery-2.1.0.min.js"></script>
	<script src="script.js"></script>
</body>
</html>