<?php
//harsh, here in parse.php I want you to save the data I put on the new.php onto the mySQL server, get it through $_POST[]...
//after u do that, I want you to make a new folder regarding the users' files, this folder will have their email as the name, and inside their files
//just get the name of the file from the title, I want you as well to header them to their file they were currently working on after finishing the saving process.
//that file, will have almost the same things that the new.php file has, though it won't redirect to this file, it will redirect to another file where it just updates info on the server
//make sure that users cant make 2 files with the same name and make sure they actually changed something in order to start the saving process again
?>
<!DOCTYPE html>
<html>
<head>
    <title>Processing,,,</title>
    <?php
    include("init.php");
    ?>
</head>
<body>
<p>Processing your file, please wait...</p>
	<?php
$data = $_POST["new"];
if ($data !== null) {
	//put data in mysql server
	//make it go to doc.php
} else {
	echo "Please write something! PLEASE";
}
?>
</body>
</html>