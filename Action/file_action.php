<?php

    include '../config.php';
    $genarate_file= rand(100,1000000).$_FILES["u_file"]["name"];
    $file_title = $_POST['file_title'];
    $time = date("Y-m-d",time());

    
      if (file_exists("../File".$genarate_file)){
        // header("location:site_setting.php");
      }
      else{
        move_uploaded_file($_FILES["u_file"]["tmp_name"],"../File/" .$genarate_file);
      }
      $user_id = $_SESSION['user_id'];
      //echo $user_id;
        $insert = "INSERT into contact_file (name,file, user_id) 
        values ('$file_title','$genarate_file', '$user_id ');";
        if(mysqli_query($conn,$insert)){
            header("refresh:0; url=../file_group_info.php");
        }else{
            echo "Error: " . $insert . "<br>" . mysqli_error($conn);
        }


        $last_id="SELECT file FROM contact_file ORDER BY id DESC LIMIT 1"; 
        $result = mysqli_query($conn, $last_id);
        $row = mysqli_fetch_assoc($result);
        $d=0;
          foreach($row as $x){
          $d=$x;
        }
        
        $file = fopen("../File/"."$d", "r");
            
        $i=1;
        $count = 0;
        while(!feof($file)){
            $content = fgets($file);
            $carray = explode(",", $content);
            list($number, $first_name, $last_name, $email, $state, $zip) = $carray;

            $sql3 = "INSERT INTO `main_contacts` (`number`, `first_name`, `last_name`, `email`, `state`, `zip`,`file_name`, `user_id`, `time`) 
            VALUES ('$number', '$first_name', '$last_name', '$email', '$state', '$zip', '$d', '$user_id', '$time');";
            $res = mysqli_query($conn, $sql3);
            //$row3 = mysqli_fetch_assoc($res);

            //&& strlen($number) >= 10
            if(preg_match('/^(?=.{10,12}$)^(\+[1]{1,2}\s?)?1?\s?[0-9]{10}$/', $number )  ){
                $group_name = "sample". $i;
                $sql3 = "INSERT INTO `valid_contact` (`number`, `first_name`, `last_name`, `email`, `state`, `zip`, `file_name`, `group_name`, `user_id`, `time`) 
                VALUES ('$number', '$first_name', '$last_name', '$email', '$state', '$zip', '$d', '$group_name', '$user_id', '$time');";
                $res = mysqli_query($conn, $sql3);
                $count++;
                if($count == 100){
                    $count = 0;
                    $i++;
                }
            }

        }

                                            
                               
    
?>