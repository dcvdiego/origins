<!DOCTYPE html>
<html>
<head>
    <title>Welcome to VMent Pro!</title>
    <?php
    include("./all/init.php");
	require "./all/includes/sessioncheck.php";
    ?>
</head>
<body>
<h1>Your Files</h1>
<?php
if (1==1) {
   echo "No Files Found<br>"; 
    }
?>
<a href="new.php"><div class="buttons">New File</div></a><br>
<a href="logout.php" class="buttons" style="float: right; margin-top: 7.5px;">Logout</a>
</body>
</html>