<?php
include '../config.php';

    $id = $_GET['id'];
    $u_name = $_POST['u_name'];
    $u_email = $_POST['u_email'];
    $u_password = md5($_POST['u_password']);
    $u_status = $_POST['u_status'];

 
    $insert = "Update user SET name = '$u_name',email = '$u_email',password='$u_password', status='$u_status' WHERE id = $id;";
    if(mysqli_query($conn,$insert)){
        header("refresh:0; url=../user_list.php");
    }else{
      echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
?>