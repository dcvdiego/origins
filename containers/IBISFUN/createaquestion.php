<html>
  <head>
    <title>Create-a-Question-IBISFUN!</title>
    <?php
    session_start();
    ?>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
 <body>
       <?php
   if (isset($_SESSION['user_id'])) {
      ?>
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <h3>
    Points : <?php echo $_SESSION['points']; ?>
      </h3>
              <h3>
    Rank : <?php echo $_SESSION['rank']; ?>
      </h3>
  <a href="home.php">Home</a>
  <a href="profile.php">Profile</a>
  <a href="#">Leaderboards</a>
  <a href="#">Friends</a>
  <form action="background/logout.php" method="POST">
     <button type="submit" name="submit">
       Logout
     </button>
   </form>
      
</div>

<!-- Use any element to open the sidenav -->
<span onclick="openNav()">
  <div id="menubutt"></div>
<div id="menubutt"></div>
<div id="menubutt"></div></span>

   <div id="main">
     <button id="formbutton" onclick="underline()">Underline Text</button>
    <button id="formbutton" onclick="link()">Link</button>
    <button id ="formbutton" onclick="displayhtml()">Display HTML</button>
     <button id ="formbutton" onclick="sub()">X<sub>2</sub></button>
     <button id ="formbutton" onclick="sup()">X<sup>2</sup></button>
    <!-- Make it content editable attribute true so that we can edit inside the div tag and also enable execCommand to edit content inside it.-->
    <div placeholder="Write question here..." class="editor" contenteditable="true" spellcheck="false">
    
    </div>
   
    <div class="codeoutput">
        <!-- <pre> tags reserves whitespace and newline characters. -->
        <pre class="htmloutput">
        </pre>
    </div>
</body>
<script>
    window.addEventListener("load", function(){
        //first check if execCommand and contentEditable attribute is supported or not.
        if(document.contentEditable != undefined && document.execCommand != undefined)
       {
           alert("HTML5 Document Editing API Is Not Supported");
        }
        else
        {
            document.execCommand('styleWithCSS', false, true);
        }
    }, false);
   
    //underlines the selected text
    function underline()
    {
        document.execCommand("underline", false, null);
    }
   
    //makes the selected text as hyperlink.
    function link()
    {
        var url = prompt("Enter the URL");
        document.execCommand("createLink", false, url);
    }
   function sub() {
     document.execCommand("subscript", false, null);
   }
  function sup() {
     document.execCommand("superscript", false, null);
   }
    //displays HTML of the output
    function displayhtml()
    {
        //set textContent of pre tag to the innerHTML of editable div. textContent can take any form of text and display it as it is without browser interpreting it. It also preserves white space and new line characters.
        document.getElementsByClassName("htmloutput")[0].textContent = document.getElementsByClassName("editor")[0].innerHTML;
    }
  function next() {
    alert("I haven't finished yet");
  }
</script>
<a id="formbutton" href="#" onclick="next()">Next</a>
   </div>
   <?php 
      } else {
     header("Location: index.php");
     exit();
   }
   ?>
  </body>
</html>