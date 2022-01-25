<?php 

include_once 'config.php';
include_once 'header.php';
//session_start();
if (isset($_SESSION["authen"])){  
  
  
?>       
<!-- page content -->
<div class="right_col" role="main">
  <div class="container">
    <P>Welcome to Home Page</p>
  </div>
</div>
<!-- /page content -->
<?php
} else{
  ob_end_flush();
  header("refresh:0; url=../login.php");
}
include 'footer.php'; 
?>     
    