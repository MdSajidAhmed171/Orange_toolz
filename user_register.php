
<?php 

include_once 'config.php';
include_once 'header.php';

if (isset($_SESSION["admin"])){     
?>       
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <!-- form input mask -->
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users Input</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li> -->
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" action="Action/user_reg_action.php" method="post">

                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">User Name:</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="text" name="u_name" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">User Email:</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="email" name="u_email" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">User Password:</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="password" name="u_password" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        
                        <div class="col-md-6 col-sm-6 col-xs-6">
                          <input type="hidden" name="u_status" value="Active" class="form-control">
                        </div>
                      </div>
                      
                     
                      <div class="ln_solid"></div>

                      <div class="form-group row">
                        <div class="col-md-9 offset-md-3">
                          
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

            

              </div>
              
          </div>
        </div>
        <!-- /page content -->
<?php

} else{
  header("Location: login.php");
  
}
include 'footer.php'; 
?>     
    