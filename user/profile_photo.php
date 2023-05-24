<?php
  session_start();
  require "../login_check.php";
  require "../db_connect.php";
  // print_r($_FILES);
  // die();
  $id = $_SESSION["id"];

  $photo = $_FILES['photo'];
  $after_explode = explode('.', $photo['name']);
  $extension = end($after_explode);
  $allowed_ext = array('jpg', 'png', 'gif', 'webp');
  

  // if(!$photo){
  //   $_SESSION["photo_select_err"]= "Please upload a photo";
  // }

if(in_array($extension, $allowed_ext)){
    if($photo['size'] <= 1000000){
      $file_name = $id.".".$extension;
      $new_location ="../uploads/users/".$file_name ;
      move_uploaded_file($photo['tmp_name'], $new_location);

      $update = "UPDATE users SET photo ='$file_name' WHERE id = $id";
      mysqli_query($db_connect, $update);
      $_SESSION["photo_sucess"] = "Photo Updated";
      header("location:profile.php");

      }
      else{
            $_SESSION["size_err"] = "Maximum Size 1 MB";
            header("location:profile.php");
      }
    
}else{
    $_SESSION["ext_err"] = "Photo must be type of (jpg, png, gif, webp)";
    header("location:profile.php");

}


  
?>