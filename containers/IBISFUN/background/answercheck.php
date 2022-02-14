<?php
if (isset($_POST['answer']) && $_POST['user_id'] !== 1) {
  include 'database.php';
  $answer = mysqli_real_escape_string($connection, $_POST['answer']);
  $question_id = mysqli_real_escape_string($connection, $_POST['question_id']); 
  $sql = "SELECT * FROM questions WHERE question_id = $question_id";
  $result_sql = mysqli_query($connection, $sql);
  if ($row_ans = mysqli_fetch_assoc($result_sql)) {
    if ($row_ans['answer'] === $answer) {
      $questiondone_id = $_POST['question_id'];
      $user_id = $_POST['user_id'];
     $sql_done_add = "INSERT INTO done_questions (user_id, questiondone_id) VALUES ('$user_id', '$questiondone_id')";
  mysqli_query($connection, $sql_done_add);
      $sql_done = "SELECT * FROM done_questions WHERE user_id = '$user_id' AND questiondone_id = '$questiondone_id'";
      $sql_done_query = mysqli_query($connection, $sql_done);
      $timesdone = mysqli_num_rows($sql_done_query);
      if ($timesdone < 11) {
      $sql_addp = "UPDATE users SET points = points + 1/$timesdone WHERE user_id = $user_id";
      mysqli_query($connection, $sql_addp);
      }
      echo "C"; 
    } else {
      $questiondone_id = $_POST['question_id'];
      $user_id = $_POST['user_id'];
     $sql_done_add = "INSERT INTO done_questions (user_id, questiondone_id) VALUES ('$user_id', '$questiondone_id')";
  mysqli_query($connection, $sql_done_add);
    echo "W";
    }
  }
if ($_POST['points'] > 10 && $_POST['user_id'] !== 1) {
  $sql_rankup_10 = "UPDATE users SET rank = 'Study-er' WHERE user_id = $user_id";
  mysqli_query($connection, $sql_rankup_10);
} else if ($_POST['points'] > 100 && $_POST['user_id'] !== 1) {
 $sql_rankup_100 = "UPDATE users SET rank = 'Beast' WHERE user_id = $user_id"; 
  mysqli_query($connection, $sql_rankup_100);
} else if ($_POST['points'] > 500 && $_POST['user_id'] !== 1) {
 $sql_rankup_100 = "UPDATE users SET rank = 'Brainiac' WHERE user_id = $user_id"; 
  mysqli_query($connection, $sql_rankup_100);
} else if ($_POST['points'] > 1068 && $_POST['user_id'] !== 1) {
 $sql_rankup_100 = "UPDATE users SET rank = 'Genius' WHERE user_id = $user_id"; 
  mysqli_query($connection, $sql_rankup_100);
} else if ($_POST['points'] > 2048 && $_POST['user_id'] !== 1) {
 $sql_rankup_100 = "UPDATE users SET rank = 'Rick' WHERE user_id = $user_id"; 
  mysqli_query($connection, $sql_rankup_100);
} 
} else {
  header: "Location: ../index.php";
  exit();
}