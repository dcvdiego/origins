<?php
if (isset($_POST['submit'])) {
  include_once 'database.php';
  $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $bday = mysqli_real_escape_string($connection, $_POST['birthday']);
  
  if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($bday)) {
     header("Location: ../home.php?register=empty");
     exit();
  } else {
    if(!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
      header("Location: ../home.php?register=invalid");
      exit();
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../home.php?register=email");
        exit(); 
      } else {
        $sql_username = "SELECT * FROM users WHERE username='$username'";
        $result_username = mysqli_query($connection, $sql_username);
        $resultCheck_username = mysqli_num_rows($result_username);
        if ($resultCheck_username > 0) {
          header("Location: ../home.php?register=usertaken");
          exit();
        } else {
           $sql_email = "SELECT * FROM users WHERE email='$email'";
        $result_email = mysqli_query($connection, $sql_email);
        $resultCheck_email = mysqli_num_rows($result_email);
        if ($resultCheck_email > 0) {
          header("Location: ../home.php?register=emailtaken");
          exit();
        } else {
          $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
          $sql_insert = "INSERT INTO users (first_name, last_name, email, username, password, bday) VALUES ('$first_name', '$last_name', '$email', '$username', '$hashedpwd', '$bday' );";
          mysqli_query($connection, $sql_insert);
           header("Location: ../home.php?register=success");
           exit();
          }
        }
      }
    }
  }
  
} else {
  header("Location: ../home.php");
  exit();
}