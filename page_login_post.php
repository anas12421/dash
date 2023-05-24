<?php
session_start();
require "db_connect.php";

$email = $_POST["email"];
$password = $_POST["password"];


$email_exist = "SELECT COUNT(*) AS total FROM users WHERE email = '$email'";
$email_exist_result = mysqli_query($db_connect, $email_exist);
$email_assoc = mysqli_fetch_assoc($email_exist_result);


if($email_assoc["total"] == 1){
  $pass_check = "SELECT * FROM users WHERE email= '$email'";
  $pass_check_result = mysqli_query($db_connect, $pass_check);
  $pass_assoc = mysqli_fetch_assoc($pass_check_result);
  
  if(password_verify($password , $pass_assoc["password"])){
    $_SESSION ["login_check"] = "";
    $_SESSION ["id"] = $pass_assoc["id"];
    header("location:dashboard.php");
  }else{
    $_SESSION["old_email"]= $email;
     $_SESSION["old_pass"] = $password;
     $_SESSION["wrong_pass"] = "Wrong password";
    header('location:page-login.php');
  }

}else{
  $_SESSION["old_email"]= $email;
  $_SESSION["old_password"]= $password;
  $_SESSION["email_exist_err"]="Email does not exist or not Registered yet";
  header("location:page-login.php");
}

?>