<html>
  <head>
    <title>Profile-IBISFUN!</title>
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
   <?php
     echo $_SESSION['first_name'];
     echo " ";
     echo $_SESSION['last_name'];
     ?>
     </h1>
     <h3>
       Username : <?php echo $_SESSION['username']; ?> <br>
       Birthday : <?php echo $_SESSION['bday']; ?> <br>
       Email : <?php echo $_SESSION['email']; ?>
     </h3>
               <h3>
    Points : <?php echo $_SESSION['points']; ?>
      </h3>
              <h3>
    Rank : <?php echo $_SESSION['rank']; ?>
      </h3>
    <?php if (isset($_GET['email'])) { 
     if ($_GET['email'] === "true") { ?>
     <form action="background/user_stuff.php" method="POST">
     <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
     <input type="email" name="email_change" placeholder="Type your new email here...">
       <button type="submit" name="submit" id="formbutton">
         Change your email
       </button>
     </form>
     <?php } 
     } ?>
           <form action="background/user_stuff.php" method="POST" onsubmit="return confirm('Are you sure?');">
       <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
            
             <button id="formbutton" name="email" type="submit">
          Change Email
        </button>
        <button id="formbutton" name="delete" type="submit">
          Delete account
        </button>
       </form>
              <a id="formbutton" onclick="make_visible('topics')" href="#">
         Select topics for each subject
        </a>
 <form id="topics" style="visibility: hidden;" action="background/selection.php" method="POST">
  <h3>
    Physics
   </h3>
   <input type="checkbox" name="phselectall" onclick="toggle(this, 'phtopic[]')">Select all<br>
   <input type="checkbox" name="phtopic[]" value="t1">Topic 1<br>
   <input type="checkbox" name="phtopic[]" value="t2">Topic 2<br>
   <input type="checkbox" name="phtopic[]" value="t3">Topic 3<br>
   <input type="checkbox" name="phtopic[]" value="t4">Topic 4<br>
   <input type="checkbox" name="phtopic[]" value="t5">Topic 5<br>
   <input type="checkbox" name="phtopic[]" value="t6">Topic 6<br>
   <input type="checkbox" name="phtopic[]" value="t7">Topic 7<br>
   <input type="checkbox" name="phtopic[]" value="t8">Topic 8<br>
   <h3>
     HL
   </h3>
   <input type="checkbox" name="phtopic[]" value="t9">Topic 9<br>
   <input type="checkbox" name="phtopic[]" value="t10">Topic 10<br>
   <input type="checkbox" name="phtopic[]" value="t11">Topic 11<br>
   <input type="checkbox" name="phtopic[]" value="t12">Topic 12<br>
   <input type="radio" name="phoption[]" value="opA">Option A<br>
   <input type="radio" name="phoption[]" value="opB">Option B<br>
   <input type="radio" name="phoption[]" value="opC">Option C<br>
   <input type="radio" name="phoption[]" value="opD">Option D<br>
     <h3>
    Chemistry
   </h3>
   <input type="checkbox" name="chselectall" onclick="toggle(this, 'chtopic[]')">Select all<br>
   <input type="checkbox" name="chtopic[]" value="t1">Topic 1 (Stoichiometric Relationships)<br>
   <input type="checkbox" name="chtopic[]" value="t2">Topic 2 (Atomic structure)<br>
   <input type="checkbox" name="chtopic[]" value="t3">Topic 3 (Periodicity)<br>
   <input type="checkbox" name="chtopic[]" value="t4">Topic 4 (Chemical bonding and structure)<br>
   <input type="checkbox" name="chtopic[]" value="t5">Topic 5 (Energetics/Thermochemistry)<br>
   <input type="checkbox" name="chtopic[]" value="t6">Topic 6 (Chemical Kinetics)<br>
   <input type="checkbox" name="chtopic[]" value="t7">Topic 7 (Equilibrium)<br>
   <input type="checkbox" name="chtopic[]" value="t8">Topic 8 (Acids and bases)<br>
   <input type="checkbox" name="chtopic[]" value="t9">Topic 9 (Redox processes)<br>
   <input type="checkbox" name="chtopic[]" value="t10">Topic 10 (Organic chemistry)<br>
   <input type="checkbox" name="chtopic[]" value="t11">Topic 11 (Measurement and data processing)<br>
      <h3>
     HL
   </h3>
   <input type="checkbox" name="chtopic[]" value="t12">Topic 12 (Atomic structure)<br>
   <input type="checkbox" name="chtopic[]" value="t13">Topic 13 (The periodic table - the transition metals)<br>
   <input type="checkbox" name="chtopic[]" value="t14">Topic 14 (Chemical bonding and structure)<br>
   <input type="checkbox" name="chtopic[]" value="t15">Topic 15 (Energetics/Thermochemistry)<br>
   <input type="checkbox" name="chtopic[]" value="t16">Topic 16 (Chemical kinetics)<br>
   <input type="checkbox" name="chtopic[]" value="t17">Topic 17 (Equilibrium)<br>
  <input type="checkbox" name="chtopic[]" value="t18">Topic 18 (Acids and bases)<br>
   <input type="checkbox" name="chtopic[]" value="t19">Topic 19 (Redox processes)<br>
   <input type="checkbox" name="chtopic[]" value="t20">Topic 20 (Organic chemistry)<br>
   <input type="checkbox" name="chtopic[]" value="t21">Topic 21 (Measurement and analysis)<br>
   <input type="radio" name="choption[]" value="opA">Option A - Materials<br>
   <input type="radio" name="choption[]" value="opB">Option B - Biochemistry<br>
   <input type="radio" name="choption[]" value="opC">Option C - Energy<br>
   <input type="radio" name="choption[]" value="opD">Option D - Medicinal chemistry<br>
   <h3>
    Business and Management
   </h3>
   <input type="checkbox" name="bisneselectall" onclick="toggle(this, 'bisnetopic[]')">Select all<br>
   <input type="checkbox" name="bisnetopic[]" value="t1">Unit 1 (Business organization and environment)<br>
   <input type="checkbox" name="bisnetopic[]" value="t2">Unit 2(Human resource management)<br>
   <input type="checkbox" name="bisnetopic[]" value="t3">Unit 3(Finance and accounts)<br>
   <input type="checkbox" name="bisnetopic[]" value="t4">Unit 4 (Marketing)<br>
   <input type="checkbox" name="bisnetopic[]" value="t5">Unit 5(Operations management)<br>
    <h3>
    Economics
   </h3>
   <input type="checkbox" name="econselectall" onclick="toggle(this, 'econtopic[]')">Select all<br>
   <input type="checkbox" name="econtopic[]" value="t1">Topic 1.1 (Stoichiometric Relationships)<br>
   <input type="checkbox" name="econtopic[]" value="t2">Topic 1.2 (Atomic structure)<br>
   <input type="checkbox" name="econtopic[]" value="t3">Topic 1.3 (Periodicity)<br>
   <input type="checkbox" name="econtopic[]" value="t4">Topic 1.4 (Chemical bonding and structure)<br>
   <input type="checkbox" name="econtopic[]" value="t5">Topic 1.5 (Energetics/Thermochemistry)<br>
   <input type="checkbox" name="econtopic[]" value="t6">Topic 2.1 (Chemical Kinetics)<br>
   <input type="checkbox" name="econtopic[]" value="t7">Topic 2.2 (Equilibrium)<br>
   <input type="checkbox" name="econtopic[]" value="t8">Topic 2.3 (Acids and bases)<br>
   <input type="checkbox" name="econtopic[]" value="t9">Topic 2.4 (Redox processes)<br>
   <input type="checkbox" name="econtopic[]" value="t10">Topic 2.5 (Organic chemistry)<br>
   <input type="checkbox" name="econtopic[]" value="t11">Topic 2.6 (Measurement and data processing)<br>
   <input type="checkbox" name="econtopic[]" value="t12">Topic 3.1 (Atomic structure)<br>
   <input type="checkbox" name="econtopic[]" value="t13">Topic 13 (The periodic table - the transition metals)<br>
   <input type="checkbox" name="econtopic[]" value="t14">Topic 14 (Chemical bonding and structure)<br>
   <input type="checkbox" name="econtopic[]" value="t15">Topic 15 (Energetics/Thermochemistry)<br>
   <input type="checkbox" name="econtopic[]" value="t16">Topic 16 (Chemical kinetics)<br>
   <input type="checkbox" name="econtopic[]" value="t17">Topic 17 (Equilibrium)<br>
  <input type="checkbox" name="econtopic[]" value="t18">Topic 18 (Acids and bases)<br>
   <input type="checkbox" name="econtopic[]" value="t19">Topic 19 (Redox processes)<br>
   <input type="checkbox" name="econtopic[]" value="t20">Topic 20 (Organic chemistry)<br>
   <input type="checkbox" name="econtopic[]" value="t21">Topic 21 (Measurement and analysis)<br>     
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; //there are 24 topics in econ?>"> 
   <button id="formbutton" type="submit" name="submit">
     Submit!
   </button>
     </form>
   </div>
   <?php
   } else {
     header("Location: home.php");
     exit();
   }
      ?>
  </body>