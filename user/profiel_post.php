<?php
session_start();
require "../login_check.php";
require "../db_connect.php";

$name = $_POST["name"];
$old_pass = $_POST["old_password"];
$password = $_POST["password"];
$user_id = $_POST["user_id"];
$after_hash = password_hash($password,PASSWORD_DEFAULT);
$user_pass = "SELECT * FROM users WHERE id = $user_id";
$user_pass_result = mysqli_query($db_connect, $user_pass);
$user_pass_assoc = mysqli_fetch_assoc($user_pass_result);

if($password){
  if(password_verify($old_pass, $user_pass_assoc["password"])){
    $update = "UPDATE users SET name='$name', password='$after_hash' WHERE id = $user_id ";
    mysqli_query($db_connect, $update);
    $_SESSION["update"]="Profile Updated";
    header("location:profile.php");
  }
  else{
    $_SESSION["wrong_pass"]="Current Password Does not match";
    header("location:profile.php");
  }
}
else{
  $update = "UPDATE users SET name='$name' WHERE id = $user_id ";
  mysqli_query($db_connect, $update);
  $_SESSION["update"]="Profile Updated";
  header("location:profile.php");
}
?>