<?php
include '../config.php';
 
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_password = md5($_POST['u_password']);
    $u_status = $_POST['u_status'];

 
    $insert = "INSERT into user (name,email,password,status) 
    values ('$u_name','$u_email','$u_password','$u_status');";
    if(mysqli_query($conn,$insert)){
        header("refresh:0; url=../user_list.php");
    }else{
      echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
?>