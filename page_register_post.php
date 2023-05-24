<?php
session_start();
require "db_connect.php";

$usesr_name = $_POST["user_name"];
$email = $_POST["email"];
$password = $_POST["password"];

$form = false;

$uppercase = preg_match('@[A-Z]@' , $password);
$lowercase = preg_match('@[a-z]@' , $password);
$number = preg_match('@[0-9]@' , $password);
$sp_ch = preg_match('/[!,@,#,$,%,^,&,*,(,),_,-,+,=,.,,,<,>,?,{,},`,~,|]/' , $password);

if(!$usesr_name){
  $form = true;
  $_SESSION["user_name_err"]="Please enter a username";
}else{
  $_SESSION["old_user_name"]=$usesr_name;
}


if(!$email){
  $form = true;
  $_SESSION["email_error_message"] = "Please Enter a Valid Email";
  }
  else{
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $form= true;
      $_SESSION["old_email"] = $email;
      $_SESSION["email_error_message"] = "Valid email format 'name@example.com'";
  }else{
    $email_chcck = "SELECT COUNT(*) AS email_check FROM users WHERE email = '$email'";
    $email_chcck_result =mysqli_query($db_connect, $email_chcck);
    $email_chcck_assoc= mysqli_fetch_assoc($email_chcck_result);

    if(!$email_chcck_assoc['email_check'] == 0){ 
      $form = true;
      $_SESSION["email_error_message"] = "This email already taken'";
      $_SESSION["old_email"]=$email;
    }
    else{
      $_SESSION["old_email"]=$email;
    }
  }
}

if(!$password){
  $form = true;
  $_SESSION["password_error_message"] = "Please Enter a Strong Password";
  }
  else{
    if(!$uppercase){
  $form = true;
  $_SESSION["password_error_message"]= "Please input min 1 'UPPERCASE' charecter";
  $_SESSION["old_password"] = $password ;
    }
    if(!$lowercase){
  $form = true;
  $_SESSION["password_error_message"]= "Please input min 1 'lowercase' charecter";
  $_SESSION["old_password"] = $password ;
    }
    if(!$number){
  $form = true;
  $_SESSION["password_error_message"]= "Please input min 1 'number' 0-9";
  $_SESSION["old_password"] = $password ;
    }
    if(!$sp_ch){
  $form = true;
  $_SESSION["password_error_message"]= "Please input min 1 'Special Charecter'";
  $_SESSION["old_password"] = $password ;
    }
    if(strlen($password) < 8){
  $form = true;
  $_SESSION["password_error_message"]= "Min 8 character needed";
  $_SESSION["old_password"] = $password ;
    }
    else{
      $_SESSION["old_password"] = $password ;
    }
  }

if($form){
  header("location:page-register.php");
}
else{
  $_SESSION["old_user_name"] = "" ;
  $_SESSION["old_email"] = "" ;
  $_SESSION["old_password"] = "" ;

  $after_hash_pass = password_hash($password, PASSWORD_DEFAULT);

  $insert = "INSERT INTO users(name, email, password)VALUES('$usesr_name','$email', '$after_hash_pass')";
  
  mysqli_query($db_connect, $insert);

  $_SESSION ["register_success"]= "Registration Sucess";
  header("location:page-register.php");
}

?>