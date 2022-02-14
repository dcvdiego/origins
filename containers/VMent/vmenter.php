<!doctype html>
<html>
<?php
include("./all/init.php");
include("./all/includes/head.php");
	?>
	<title>VMENT-Anytime, Anywhere, Anything!-The VMENTer</title>


</head>

<body>
	<h1 style="color: white; font-size: 100px;">VMENT<em>er</em></h1>
	<canvas style="border-style: groove; border-color: blue; display: block;" id="canvas" width="600px" height="500px">
	Sorry, your browser does not support my app, you suck, try updating with the world and getting a better browser (Recommended Google Chrome and Safari)
	</canvas> 
	<div id="toolbar">
	<div id="strk">
		Stroke: <span id="strkval">10</span>
		<div id="decstrk" style="padding: 5px; text-align: center; margin: 3px;" class="strkcontrol buttons"> - </div>
		<div id="incstrk" style="padding: 5px; text-align; center; margin: 3px;" class="strkcontrol buttons"> + </div>
	</div>
		<div id="clearbar">
			<input type="button" value="Clear!" id="clear" class="buttons" style="margin: 0px;">	
		</div>
		<div id="colors">
		</div>
		<div id ="undo">
			<input type="button" value="<-" id="undoButton" class="buttons" style="margin: 0.5px;">
		</div>
	</div>

	<div style="display: inline-block; position: absolute;">
Select a file to upload: <br />
<form action="vmenter.php?upload" method="post"
enctype="multipart/form-data">
<label for="file">File Name:</label>
<input type="file" name="file" id="file"><br>
<input class="buttons" type="submit" name="submit" value="Submit">
</form>
	</div>
<p>YAY you can draw, change stroke and color as well as uploading your own picture!! ALMOST DONE! Working on saving it to your computer!</p>
	 <script type="text/javascript" 
    src="scriptvmenter.js"></script>
<?php
error_reporting(0);
if (isset($_GET["upload"]) === true && empty($_GET["upload"]) === true)  {
error_reporting(1);
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	  //instead echo script with changing background of canvas
	?> <script type="text/javascript">
	document.getElementById("canvas").style.backgroundImage = "url('upload/<?php echo $_FILES["file"]["name"]; ?>')";
	document.getElementById("canvas").style.backgroundRepeat = "no-repeat";
	document.getElementById("canvas").style.backgroundSize = "100% 100%";
	</script>
	<?php
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
		echo $_FILES["file"]["name"] . " already exists. BUT WE'LL PUT IT AS YOUR BACKGROUND ANYWAYS! (though this should'nt happen :( ) ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      }
    }
  }
else
  {
  echo "Invalid file";
  }
} else { ?>
<script type="text/javascript">
	document.getElementById("canvas").style.background = "white";
	document.getElementById("canvas").style.height = "500px";
	document.getElementById("canvas").style.width = "500px";
	</script>
<?php	
	$files = glob("upload/*"); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
	echo "You haven't uploaded any files YET!";
}
include("./all/includes/footer.php");
	?>	