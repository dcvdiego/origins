<html>
  <head>
    <title>Home-IBISFUN!</title>
    <?php
    session_start();
    ?>
    <script src="javascript.js"></script>
    <script src="jquery.js"></script>
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
  <a href="profile.php">Profile</a>
  <a href="createaquestion.php">Create-A-Question</a>
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
  <h1>
    Welcome <?php echo $_SESSION['username'];?>!
  </h1>
   <h2>
     To begin a random quiz, select the topic and the level!
   </h2>
     <h3>
      Make sure you have customized what topics you are being tested on by going to your <a href="profile.php">profile</a> (default is none)
     </h3>
     <div class="dropdown">
  <button class="dropbtn_physics">Physics</button>
  <div class="dropdown-content">
    <a href="game.php?subject=physics&level=sl">SL</a>
    <a href="game.php?subject=physics&level=hl">HL</a>
  </div>
     </div>
     <div class="dropdown">
       <button class="dropbtn_chemistry">Chemistry</button>
  <div class="dropdown-content">
    <a href="game.php?subject=chem&level=sl">SL</a>
    <a href="game.php?subject=chem&level=hl">HL</a>
  </div>
</div>
     <div class="dropdown">
       <button class="dropbtn_math">Math</button>
  <div class="dropdown-content">
    <a href="game.php?subject=math&level=studies">Math Studies</a>
    <a href="game.php?subject=math&level=sl">SL</a>
    <a href="game.php?subject=math&level=hl">HL</a>
  </div>
</div>
     <div class="dropdown">
       <button class="dropbtn_econ">Economics</button>
  <div class="dropdown-content">
    <a href="game.php?subject=econ&level=sl">SL</a>
    <a href="game.php?subject=econ&level=hl">HL</a>
  </div>
</div>
      <div class="dropdown">
       <button class="dropbtn_bisne">Business Studies</button>
  <div class="dropdown-content">
    <a href="game.php?subject=bisne&level=sl">SL</a>
    <a href="game.php?subject=bisne&level=hl">HL</a>
  </div>
</div>     
   </div>
   
   <?php
   } else {
   ?>
   <h1>Welcome!
</h1>
 <?php
     if (isset($_GET['register'])) {
     if ($_GET['register'] === "success") {
     echo "<h3>You have been registered successfully!<a href='login_iframe.php' target='src'> Log in </a>now!</h3>";
     } else if ($_GET['register'] === "empty") {
       echo "<h3>You have left empty spaces, don't do it :)</h3>";
     } else if ($_GET['register'] === "invalid") {
       echo "<h3>You have entered invalid characters, try again (basically don't use tildes and stuff)</h3>";
     } else if ($_GET['register'] === "email") {
       echo "<h3>You have entered an invalid email address, try again (must have @ and a domain)</h3>";
     } else if ($_GET['register'] === "usertaken") {
       echo "<h3>The username you chose has already been taken, try again. (Creativity hours must be lacking eh?)</h3>";
     } else if ($_GET['register'] === "emailtaken") {
       echo "<h3>Email already taken! Try logging in...</h3>";
     }
     } else if (isset($_GET['login'])) {
       if ($_GET['login'] === "empty") {
         echo "<h3>You have left empty spaces, don't do it :)</h3>";
       } else if ($_GET['login'] === "error") {
         echo "<h3>Your username or email or password is incorrect. Wow.</h3>";
       }
     }
     ?>
<h2><a href="login_iframe.php" target="src">Log in</a> or <a href="register_iframe.php" target="src">register</a></h2>
<iframe src="register_iframe.php" height="500" width="500" style="border:none;" id="src" name="src">
   </iframe>
  <?php
   }
   ?>
  </body>
</html>