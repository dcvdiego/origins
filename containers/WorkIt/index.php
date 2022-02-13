<?php
include("./inc/connect.php");
?>
<!DOCTYPE html>
<head>
<title>
WorkIt-Share, view, edit
</title>
<?php
include "init.php";//it already does
?>
</head>
<body>
<div id = "startCloud"><h1 style="margin-right: -20px;">Hello, welcome to WorkIt</h1><span class='shadow'></span></div>
<div id="hidden">
<table>
<form method="POST" action="index.php">
<input type="email" name="email" placeholder="Email"/>
<input type="password" name="pass" placeholder="Password"/>
<input type="submit" name="login" value="login"/>
</form>
</table>
</div>
<p>Click the cloud to continue</p>
<?php
if(isset($_POST["login"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    
    if($email === "haganatra12345@gmail.com"){
        header("Location: welcome.php");
    }
    else if($email === "diegoundead.galaxy@gmail.com"){
        header("Location: welcome.php");
    }
    else {
        echo "Sorry, this website is only used by boss people";
    }
}
?>
</body>
