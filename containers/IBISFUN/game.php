<html>
  <head>
        <?php
    session_start();
    ?>
    <title><?php echo ucfirst($_GET['subject']) ?>-IBISFUN!</title>

    <script src="javascript.js"></script>
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
 <body>
    <?php
  $current_subject = $_GET['subject'];
  $current_level = $_GET['level'];
  $subjects = array("physics", "chem", "econ", "math", "bisne");
  $levels = array("sl", "hl", "studies");
   if (isset($_SESSION['user_id']) && in_array($current_subject, $subjects) && in_array($current_level, $levels)) {
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
  <?php
   echo "<h2>"; 
      echo ucfirst($current_subject); 
     echo " ";
      echo strtoupper($current_level);
     echo "</h2>";  
 include 'background/database.php';
    $user_id = $_SESSION['user_id'];
     $topics = array();
     $sql_topics = "SELECT * FROM selection WHERE subject='$current_subject' AND user_id = $user_id";
     $query_topics = mysqli_query($connection, $sql_topics);
     if ($row_t = mysqli_fetch_assoc($query_topics)) {
      for ($i = 1; $i<=12; $i++) {
       if ($row_t["t$i"] == 1) {
         $topics[] = "t$i";
       }
      }
     }
     $in = "('" . implode("', '",$topics) ."')";
if ($current_level === "hl") {
     $sql_questions = "SELECT * FROM questions WHERE subject='$current_subject' AND topic IN $in ORDER BY RAND() LIMIT 1";
} else {
     $sql_questions = "SELECT * FROM questions WHERE subject='$current_subject' AND level='$current_level' AND topic IN $in ORDER BY RAND() LIMIT 1";
}
     $result_sql_questions = mysqli_query($connection, $sql_questions);
     $result_check_questions = mysqli_num_rows($result_sql_questions);
     if ($result_check_questions < 1) {
       echo "<h3>Woops! No questions yet! Why don't you <a href='#'>add a question</a> or <a href='profile.php'>update your topics?</a></h3>";
     } else {
       if ($row_q = mysqli_fetch_assoc($result_sql_questions)) {
       
  ?>
<span id="countdowntimer"><?php echo $row_q['time']; ?> </span> Seconds
   <div id="question_box">
     <?php  echo "<h3>"; 
      echo $row_q['question']; 
     echo "</h3>";  ?>
     </div> 
     <div id="answer_box">
       <div class="buttonHolder"> <button type="button" class="btn_answerA" onclick="mcq('A')">A: <?php echo $row_q['A']; ?> </button></div> <br> 
       <div class="buttonHolder">    <button type="button" class="btn_answerB" onclick="mcq('B')">B: <?php echo $row_q['B'] ?> </button> </div> <br>
       <div class="buttonHolder">  <button type="button" class="btn_answerC" onclick="mcq('C')">C: <?php echo $row_q['C'] ?> </button> </div> <br>
       <div class="buttonHolder"> <button type="button" class="btn_answerD" onclick="mcq('D')">D: <?php echo $row_q['D'] ?> </button></div> <br>
     
     </div>
     <script type="text/javascript">
           var timeleft = <?php echo(json_encode($row_q['time'])); ?>;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
      if (timeleft == 0) {
                          $(".alertT").show();
         $(".btn_answerA").css({'opacity' : 1}).animate({'opacity' : 0});
         $(".btn_answerA").prop('disabled', true);
         $(".btn_answerB").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerB").prop('disabled', true);
         $(".btn_answerC").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerC").prop('disabled', true);
         $(".btn_answerD").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerD").prop('disabled', true);
           }
      if (timeleft === "answered") {
          $('#countdowntimer').hide();
          }
    },1000);
       function mcq(answer) {
      $.ajax({
        url:"background/answercheck.php", //the page containing php script
        type: "POST", //request type
        data: {'answer' : answer,
              'question_id' : <?php echo(json_encode($row_q['question_id'])); ?>,
              'user_id' : <?php echo(json_encode($_SESSION['user_id'])); ?>,
              'points' : <?php echo(json_encode($_SESSION['points'])); ?>
              },
        success:function(result){
          if (result === "C") {
         $(".alertR").show();
            var timeleft = "answered";
            clearInterval(downloadTimer);
         $(".btn_answerA").css({'opacity' : 1}).animate({'opacity' : 0});
         $(".btn_answerA").prop('disabled', true);
         $(".btn_answerB").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerB").prop('disabled', true);
         $(".btn_answerC").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerC").prop('disabled', true);
         $(".btn_answerD").css({'opacity' : 1}).animate({'opacity' : 0});
            $(".btn_answerD").prop('disabled', true);
        } else if (result === "W") {
         $(".alertW").show();
            var timeleft = "answered";
          clearInterval(downloadTimer);
         $(".btn_answerA").css({'opacity' : 1}).animate({'opacity' : 0});
          $(".btn_answerA").prop('disabled', true);
         $(".btn_answerB").css({'opacity' : 1}).animate({'opacity' : 0});
          $(".btn_answerB").prop('disabled', true);
         $(".btn_answerC").css({'opacity' : 1}).animate({'opacity' : 0});
          $(".btn_answerC").prop('disabled', true);
         $(".btn_answerD").css({'opacity' : 1}).animate({'opacity' : 0});
          $(".btn_answerD").prop('disabled', true);
              }
       }
     });
 }
</script>
      <div class="alertW" style="display: none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Wrong! <div id="reasonlink">Why?</div> <div id="reason"> </div> <br>  
        <a href="game.php?subject=<?php echo $current_subject ;?>&level=<?php echo $current_level; ?>">Next</a> 
</div> 
           <div class="alertR" style="display: none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Correct!
            <a href="game.php?subject=<?php echo $current_subject ;?>&level=<?php echo $current_level; ?>">Next</a> 
</div>
                <div class="alertT" style="display: none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Time's up!
            <a href="game.php?subject=<?php echo $current_subject ;?>&level=<?php echo $current_level; ?>">Next</a> 
</div> 
  <script type="text/javascript">
      $('#reasonlink').hover(function () {
    $.ajax({
        url:"background/reason.php", //the page containing php script
        type: "POST", //request type
        data: {'question_id' : <?php echo(json_encode($row_q['question_id'])); ?>
              },
               success:function(result) {
                 $('#reason').html(result);
                  $('#reason').stop().fadeIn();   
               }
    });    
}, function () {
    $('#reason').stop().fadeOut();
});
   </script>
     <?php
       }
     }
     ?> 
   </div>
   <?php
   } else {
     header("Location: index.php");
     exit();
   }
   ?>
  </body>
</html>