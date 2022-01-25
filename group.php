<?php 
include_once 'config.php';
include_once 'header.php';
if ($_SESSION["admin"] == TRUE){

}else{
    $user_id = $_SESSION['user_id'];
    //echo "......................".$user_id;
    $file = $_GET['file'];
?>      
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Group <small>List</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Group <small>List</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="  table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Group Name</th>
                                <th>Total</th>
                                <th>Show</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'config.php';
                                    $sqlm = "SELECT DISTINCT (group_name) FROM `valid_contact` WHERE user_id = $user_id AND file_name = '$file'";
                                        $resultm=$conn->query($sqlm);
                                        while($rowm = mysqli_fetch_assoc($resultm))
                                        {
                                            
                                            $group_name = $rowm['group_name'];
                                            
                                            
                                            
                                ?>
                              <tr>
                                <td><?php echo $group_name ?></td>
                                <td>
                                    <?php
                                        
                                        $check_database_query2 = mysqli_query($conn, "SELECT COUNT(*) FROM valid_contact WHERE user_id = $user_id AND file_name = '$file' AND group_name = '$group_name';");
                                        //$check_login_query2 = mysqli_num_rows($check_database_query2);
                                        $row = mysqli_fetch_assoc($check_database_query2);
                                        $d=0;
                                        foreach($row as $x){
                                            $d=$x;
                                        }
                                        echo $d;
                                    ?>
                                </td>
                    
                                
                        
                                <td><a href="contact.php?file=<?php echo $file; ?>&group_name=<?php echo $group_name; ?>"><button class="btn btn-primary">Show</button></a></td>
                              </tr>
                              <?php
                                        }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                    </section>
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
    