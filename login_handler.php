<?php  
include_once 'config.php';

$_SESSION["authen"] = False; /*!<put user authen false before login. */
$_SESSION["admin"] = False; /*!<put admin authen false before login. */
if(isset($_POST['login_button'])) { /*!<varibale of form POST metod */

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); /*sanitize email */

	$_SESSION['log_email'] = $email; /*Store email into session variable */
	$password = md5($_POST['log_password']); /*Get password */
	$_SESSION['log_password'] = $password; /* password */
	$status =  "Active";
	$check_database_query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status= '$status'"); /* read email & password */
	$check_login_query = mysqli_num_rows($check_database_query);

	//echo $check_login_query;
	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$reg_name = $row['name']; /* email */
		$reg_id = $row['id']; /* email */
		$_SESSION['name'] = $reg_name; /*put name in seesion varible */
		$_SESSION['user_id'] = $reg_id; /*put id in seesion varible */
		$_SESSION["authen"] = True; /*if user login then authen become true */
		//echo $_SESSION["authen"];
	}
	else {
		$_SESSION["authen"] = False; /*if user login not found then authen become false */
		$message = "Your Password or Email is wrong!";
        echo "<script type='text/javascript'>alert('$message');</script>";
	}
	$change = $_SESSION["authen"]; /*for destination page after login */
	if($change == True){ 
	    header("Location: index.php"); // destination page after login
	    ob_end_flush(); //to clean the buffer, we will use the ob_end_flush() function
	}
	$admin = $_SESSION["log_email"];
        $adminemail = "admin@admin.com"; /* take fixed admin email for profile */

        if($admin == $adminemail){
            $_SESSION["admin"] = True; /*if admin login then admin authen become true */
            $_SESSION["authen"] = False; /*if admin login then user authen become false */
        } else {
            $_SESSION["admin"] = False; /*if admin not login then admin authen become false */
        }


}

?>
