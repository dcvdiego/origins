<?php
if (isset($_POST['submit'])) {
  include 'database.php';
  if (!empty($_POST['phtopic'])) {
         $user_id = $_POST['user_id'];
     $sql_check = "SELECT * FROM selection WHERE subject='physics' AND user_id = $user_id";
    $query_check = mysqli_query($connection, $sql_check);
    $number_check = mysqli_num_rows($query_check);
    if ($number_check == 0 || $number_check === null) {
    $sql_new = "INSERT INTO selection (user_id, subject, t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, op) VALUES ($user_id, 'physics', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'n')"; 
    mysqli_query($connection, $sql_new);
    }
       $sql_set = "UPDATE selection SET t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0, t6 = 0, t7 = 0, t8 = 0, t9 = 0, t10 = 0, t11 = 0, t12 = 0 WHERE user_id = $user_id AND subject = 'physics' ";
    mysqli_query($connection, $sql_set);
   foreach($_POST['phtopic'] as $selected) {
     $sql_ph = "UPDATE selection SET $selected = 1 WHERE subject='physics' AND user_id=$user_id ";
     mysqli_query($connection, $sql_ph);
   } 
  } if (!empty($_POST['chtopic'])) {
           $user_id = $_POST['user_id'];
     $sql_check = "SELECT * FROM selection WHERE subject='chem' AND user_id = $user_id";
    $query_check = mysqli_query($connection, $sql_check);
    $number_check = mysqli_num_rows($query_check);
    if ($number_check == 0 || $number_check === null) {
    $sql_new = "INSERT INTO selection (user_id, subject, t1, t2, t3, t4, t5, t6, t7, t8, t9, t10, t11, t12, t13, t14, t15, t16, t17, t18, t19, t20, t21 op) VALUES ($user_id, 'chem', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'n')"; 
    mysqli_query($connection, $sql_new);
    }
   $sql_set = "UPDATE selection SET t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0, t6 = 0, t7 = 0, t8 = 0, t9 = 0, t10 = 0, t11 = 0, t12 = 0, t13 = 0, t14 = 0, t15 = 0, t16 = 0, t17 = 0, t18 = 0, t19 = 0, t20 = 0, t21 = 0 WHERE user_id = $user_id AND subject = 'chem' ";
    mysqli_query($connection, $sql_set);
   foreach($_POST['chtopic'] as $selected) {
     $sql_ph = "UPDATE selection SET $selected = 1 WHERE subject='chem' AND user_id=$user_id ";
     mysqli_query($connection, $sql_ph);  
  }
}  if (!empty($_POST['bisnetopic'])) {
         $user_id = $_POST['user_id'];
     $sql_check = "SELECT * FROM selection WHERE subject='bisne' AND user_id = $user_id";
    $query_check = mysqli_query($connection, $sql_check);
    $number_check = mysqli_num_rows($query_check);
    if ($number_check == 0 || $number_check === null) {
    $sql_new = "INSERT INTO selection (user_id, subject, t1, t2, t3, t4, t5) VALUES ($user_id, 'bisne', 0, 0, 0, 0, 0)"; 
    mysqli_query($connection, $sql_new);
    }
       $sql_set = "UPDATE selection SET t1 = 0, t2 = 0, t3 = 0, t4 = 0, t5 = 0 WHERE user_id = $user_id AND subject = 'bisne' ";
    mysqli_query($connection, $sql_set);
   foreach($_POST['bisnetopic'] as $selected) {
     $sql_ph = "UPDATE selection SET $selected = 1 WHERE subject='bisne' AND user_id=$user_id ";
     mysqli_query($connection, $sql_ph);
   } 
  } 
 header("Location: ../profile.php?topics=success");
  exit();
} else {
  header("Location: ../index.php");
  exit();
}