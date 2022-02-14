<?php
include_once 'database.php';
if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];
  $delete_sql = "DELETE FROM users WHERE user_id = $user_id ";  
  mysqli_query($connection, $delete_sql);
  header("Location: ../index.php");
  exit();
} else if (isset($_POST['email'])) {
  header("Location: ../profile.php?email=true");
  exit();
} else if (isset($_POST['submit'])) {
  $user_id = $_POST['user_id'];
  $email = $_POST['email_change'];
  $email_sql = "UPDATE users SET email = '$email' WHERE user_id = $user_id";
  mysqli_query($connection, $email_sql);
  echo $_POST['email_change'];
} else {
  header("Location: ../index.php");
  exit();
}