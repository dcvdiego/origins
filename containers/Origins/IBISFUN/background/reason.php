<?php
if (isset($_POST['question_id'])) {
  include 'database.php';
  $question_id = mysqli_real_escape_string($connection, $_POST['question_id']); 
   $sql = "SELECT * FROM questions WHERE question_id = $question_id";
  $result_sql = mysqli_query($connection, $sql);
  if ($row_reason = mysqli_fetch_assoc($result_sql)) {
  echo $row_reason['reason'];
  }
}