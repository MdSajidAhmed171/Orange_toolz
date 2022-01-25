<?php 
include_once 'config.php';
include_once 'header.php';
if ($_SESSION["admin"] == TRUE){

}else{
    $user_id = $_SESSION['user_id']; 
    //echo "......................".$user_id;
?>      
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>DashBoard</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon">
                          </div>
                          <?php
                            $check_database_query = mysqli_query($conn, "SELECT * FROM contact_file WHERE user_id = $user_id");
	                        $check_login_query = mysqli_num_rows($check_database_query);
                        ?>
                          <div class="count"><?php echo $check_login_query ?></div>

                          <h3>Total Files</h3>
                          
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon">
                          </div>
                          <?php
                            $check_database_query2 = mysqli_query($conn, "SELECT COUNT(DISTINCT group_name , file_name) FROM valid_contact WHERE user_id = $user_id ;");
	                        //$check_login_query2 = mysqli_num_rows($check_database_query2);
                            $row = mysqli_fetch_assoc($check_database_query2);
                            $d=0;
                            foreach($row as $x){
                                $d=$x;
                            }
                        ?>
                          <div class="count"><?php echo $d ?></div>

                          <h3>Total Groups</h3>
                          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="icon">
                          </div>
                          <?php
                            $check_database_query3 = mysqli_query($conn, "SELECT * FROM valid_contact WHERE user_id = $user_id;");
	                        $check_login_query3 = mysqli_num_rows($check_database_query3);
                            ?>
                          <div class="count"><?php echo $check_login_query3 ?></div>

                          <h3>Total Contacts</h3>
                          <!-- <p>Lorem ipsum psdea itgum rixt.</p> -->
                        </div>
                      </div>
                      
                    </div>      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php

}
include 'footer.php'; 
?>     
    