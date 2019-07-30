<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');

        $flag=0;   
    
    if(isset($_POST['submit'])){
        $message=NULL;
        
        if (!empty($_POST['specialization'])){
            $specialization = $_POST['specialization'];
            mysqli_query("UPDATE degree_earned
                             SET specialization = '$specialization' 
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['year_obtained'])){
            $year_obtained = $_POST['year_obtained'];
            mysqli_query("UPDATE degree_earned
                             SET year_obtained = '$year_obtained' 
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['institution_id'])){
            $institution_id = $_POST['institution_id'];
            mysqli_query("UPDATE degree_earned
                             SET institution_id = '$institution_id'
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['location_id'])){
            $location_id = $_POST['location_id'];
            mysqli_query("UPDATE degree_earned
                             SET location_id = '$location_id'
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['so_num'])){
            $so_num = $_POST['so_num'];
            mysqli_query("UPDATE degree_earned
                             SET so_num = '$so_num'
                           WHERE de_id = $id"); 
        }
        
        $degLevel = $_POST['degree_level'];
        mysqli_query("UPDATE degree_earned
                        SET dlevel_id = '$degLevel'
                      WHERE dlevel_id = $id");
        
        $degEarned = $_POST['degreeEarned'];
        mysqli_query("UPDATE degree_earned
                        SET degree_id = '$degEarned'
                      WHERE de_id = $id");
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
  <link rel="stylesheet" type="text/css" href="../../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../../lib/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <script src="../../lib/chart-master/Chart.js"></script>

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
        <h3>
          <i class="fa fa-angle-right"></i> Edit Degree Earned   
          </a>
        </h3>
        <div class="row mt">
          <div class="col-lg-12">



          <?php

            require_once('../mysql_connect.php');

     

            $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

            $ttr = mysqli_query($dbc, $tt);

            $fid = mysqli_fetch_array($ttr);

            $fidd= $fid['fid'];

            $q ="SELECT de.de_id as id, dl.dlevel_title as dlevel_title, CONCAT (dl.dlevel_desc, ' ', d.degree_title) as degree_title, de.specialization as specialization, de.year_obtained, de.institution_id, de.location_id, de.so_num  
                                    FROM degree_level dl, degree d, degree_earned de
                                    WHERE de.de_id = ".$_GET['id']."
                                    AND dl.dlevel_id = de.dlevel_id
                                    AND de.degree_id = d.degree_id"; 

                                                  

            $results=mysqli_query($dbc,$q);

                        while ($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){
                                $specialization = $row["specialization"];
                                $year_obtained = $row["year_obtained"];
                                $institution_id = $row["institution_id"];
                                $location_id = $row["location_id"];
                                $so_num = $row["so_num"];

                         }
            ?>

          <div class="form-panel">
            <form class="form-horizontal style-form" method="get">


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Level</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="degree_level" name="degree_level">
                        <?php
                          $query1="select   * 
                                  from degree_level  
                                    limit 9;";
                          $result1=mysqli_query($dbc,$query1);

                          while($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row2['DLEVEL_ID']}>{$row2['DLEVEL_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Earned</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="degreeEarned" name="degreeEarned">
                        <?php
                          $query="select   * 
                                  from degree  
                                    limit 7;";
                          $result=mysqli_query($dbc,$query);

                          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row['DEGREE_ID']}>{$row['DEGREE_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Area of Specialization</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $specialization; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Year Obtained</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $year_obtained;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Educational Institution</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $institution_id;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Location</label>
                  <div class="col-sm-10"> 
                    <input type="text" class="form-control" placeholder="<?php  echo $location_id;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">S.O. Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $so_num;?>">
                  </div>
                </div>

                *Note: Foreign universities are exempt from S.O. Number.
                <br>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <input class="btn btn-theme" type="submit" name="submit" value="Save Changes">
                    <a href="FDegreesEarned.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>

                </form>
          </div>

    
         
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">

      <!--
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">

        -->
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
        </div>
        <a href="../../index.html#" class="go-top">
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
  <script src="../../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../../lib/sparkline-chart.js"></script>
  <script src="../../lib/zabuto_calendar.js"></script>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
<script>
$("#5").addClass("active");
$("#5a").addClass("active");
    </script>
</body>

</html>
