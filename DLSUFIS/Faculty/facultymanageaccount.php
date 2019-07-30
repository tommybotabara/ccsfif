<!DOCTYPE html>
<html lang="en">


<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
       
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CCS Accreditation Management System </title>

  <!-- Favicons -->
  <link href="../../img/logodlsu.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">


</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
      <?php
      require_once("sidetopbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-1 profile-text">
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <?php
                $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
                $check1 = mysqli_query($dbc,$query1);
                $row1 = mysqli_fetch_assoc($check1);
                    
                echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
                               
                ?>
                <h6>Faculty</h6>

                <br>
              
              </div>
              <!-- /col-md-4 -->

              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Overview</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit" class="contact-map">Edit Password</a>
                  </li>

                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-6">
                      <?php

                    $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];


                    $q="SELECT f.fid as id,f.flname, f.ffname, f.fmname, f.unit_code ,u.unit_title, f.dept, d.dept_name, p.position_title, r.rank_title, p.position_id, f.account_id, a.account_role, a.read_only, a.access_type 
                            FROM faculty f, unit u, department d, rank r, position p, account a 
                            WHERE f.fid = $fidd
                            AND f.unit_code = u.unit_code 
                            AND f.dept = d.dept_code 
                            AND f.rank = r.rank_code
                            AND f.position_id = p.position_id
                            AND f.account_id = a.account_id"; 

                      $qr = mysqli_query($dbc, $q);
                      $yo =mysqli_fetch_array($qr);

                      $firstname= $yo['ffname'];
                      $Lastname= $yo['flname'];
                      $middlename=$yo['fmname'];
                      $department=$yo['dept_name'];
                      $rank=$yo['rank_title'];
                      $unit=$yo['unit_title'];
                      $unit_code=$yo['unit_code'];
                      $position = $yo['position_title'];
                      
                      ?>                 

                        <div class="detailed mt">
                          <div class="recent-activity">
                          <h4>Profile Information</h4>
                         <table>
                          <tr>
                          <td><strong>NAME</strong> </td><td class="facultyInfo" data-column-name="name"></td>
                          <td><?php echo $firstname; echo " "; echo $middlename;echo " "; echo $Lastname ?></td>
                          </tr>
                          <tr>
                          <td><strong>College/School/Unit </strong> </td><td class="facultyInfo" data-column-name="college"></td>
                          <td><?php echo $unit_code; echo " "; echo $unit; ?></td>
                          </tr>
                          <tr>
                          <td><strong>Department/Office</strong> </td><td class="facultyInfo" data-column-name="dept_name"></td>
                          <td><?php echo $department; ?></td>
                          </tr>
                          <tr>
                          <td><strong>Faculty Classification</strong> </td><td class="facultyInfo" data-column-name="position_title"></td>
                          <td><?php  echo "    "; echo $position; ?></td>

                          </tr>
                          <tr>
                          <td><strong>Rank</strong> </td><td class="facultyInfo" data-column-name="rank_title"></td>
                          <td><?php echo $rank; ?></td>
                          </tr>

                          </table>



                     
                           
                           

                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                                                

                  
                        
                        <!-- /row -->
                       
                   
                        <!-- /row -->
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>

                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Change password</h4>
                        <form role="form" class="form-horizontal">
                      
                          <p align="center">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Previous Password</label>
                            <div class="col-lg-10">
                              <input type="password" placeholder=" " id="password" class="password">
                            </div>
                          </div>
                          </p>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">New Password</label>
                            <div class="col-lg-10">
                              <input type="password" placeholder=" " id="password" class="password">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">New Password Again</label>
                            <div class="col-lg-10">
                              <input type="password" placeholder=" " id="password" class="password">
                            </div>
                          </div>


                          <p align="center">
                            <button type="button" class="btn btn-success">Save Changes</button>
                          </p>
                          
                 
                        </form>
                      </div>

                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>DLSU CCS</strong>. All Rights Reserved
        </p>
        <div class="credits">

        </div>
        <a href="profile.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="../../lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="../../lib/bootstrap-switch.js"></script>
  <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="../../lib/form-component.js"></script>

  <script src="../../lib/form-validation-script.js"></script>



</body>

</html>
