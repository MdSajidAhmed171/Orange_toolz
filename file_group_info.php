<?php 
include_once 'config.php';
include_once 'header.php';
if ($_SESSION["admin"] == TRUE){

}else{
    $user_id = $_SESSION['user_id'];
    echo "......................".$user_id;
?>      
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Invoice <small>Some examples to get you started</small></h3>
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
                    <h2>Invoice Design <small>Sample user invoice design</small></h2>
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
                                <th>File Name</th>
                                <th>Total Uploaded</th>
                                <th>Total Process</th>
                                <th>Group</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                include 'config.php';
                                    $sqlm = "SELECT * FROM `contact_file` WHERE user_id = $user_id";
                                        $resultm=$conn->query($sqlm);
                                        while($rowm = mysqli_fetch_assoc($resultm))
                                        {
                                            $id = $rowm['id'];
                                            $name = $rowm['name'];
                                            $file = $rowm['file'];
                                            $user_id = $rowm['user_id'];
                                            
                                            
                                ?>
                              <tr>
                                <td><?php echo $file ?></td>
                                <td>
                                    <?php
                                        
                                        $check_database_query3 = mysqli_query($conn, "SELECT * FROM `main_contacts` WHERE file_name = '$file';");
                                        $check_login_query3 = mysqli_num_rows($check_database_query3);
                                        echo $check_login_query3;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        
                                        $check_database_query3 = mysqli_query($conn, "SELECT * FROM `valid_contact` WHERE file_name = '$file';");
                                        $check_login_query3 = mysqli_num_rows($check_database_query3);
                                        echo $check_login_query3;
                                    ?>
                                </td>
                                
                        
                                <td><a href="group.php?file=<?php echo $file; ?>"><button class="btn btn-primary">Group</button></a></td>
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
    