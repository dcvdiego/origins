<?php
session_start();
if (isset($_POST['submit'])) {
  include 'database.php';
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  if (empty($email) || empty($password)) {
    header("Location: ../home.php?login=empty");
    exit(); 
  } else {
    $sql_email = "SELECT * FROM users WHERE email='$email' OR username='$email'";
    $result_email = mysqli_query($connection, $sql_email);
    $resultCheck_email = mysqli_num_rows($result_email);
    if ($resultCheck_email < 1) {
     header("Location: ../home.php?login=error1");
     exit(); 
    } else {
      if ($row = mysqli_fetch_assoc($result_email)) {
        $hashedpwdcheck = password_verify($password, $row['password']);
        if ($hashedpwdcheck == false) {
          header("Location: ../home.php?login=error2");
          exit(); 
        } elseif ($hashedpwdcheck == true) {
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['last_name'] = $row['last_name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['bday'] = $row['bday'];
          $_SESSION['points'] = $row['points'];
          $_SESSION['rank'] = $row['rank'];
         header("Location: ../home.php?login=success");
         exit();  
        }
      }
    }
  }
} else {
  header("Location: ../home.php?login=error3");
  exit();
}