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
  <link rel="stylesheet" type="text/css" href="../../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../../lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datetimepicker/datertimepicker.css" />
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
          <i class="fa fa-angle-right"></i> Degrees Being Pursued   
          <a href="FCreateDegreeBeingPursued.php"> 
          <button type="button" class="btn btn-success">Add New </button> 
          </a>
        </h3>

    
        <div class="row mt">
          <div class="col-lg-12">

                                <div class="content-panel">
                      <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i>Degree being pursued</th>
                    <th class="hidden-phone"><i class=""></i>Name of Institution </th>
                    <th class="hidden-phone"><i class=""></i>Stages of Graduate Studies</th>
                    <th class="hidden-phone"><i class=""></i>No. of Units Completed</th>
                    <th class="hidden-phone"><i class=""></i>Start Date </th>
                    <th class="hidden-phone"><i class=""></i>End Date</th>
                    <th class="hidden-phone"><i class=""></i>Evidence</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                    $tt ="SELECT fid 
                          FROM faculty 
                          where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];


                      $q="SELECT dp.dp_id as id, 
                                 CONCAT(dl.dlevel_desc,' ',d.degree_title) as degree_title,
                                 dp.institution_id, 
                                 ds.ds_name, 
                                 dp.earned_units, 
                                 dp.start_date, 
                                 dp.end_date,
                                 doc.file_name,
                                 doc.file_uploaded

                              FROM degree_pursue dp, 
                                   degree d, 
                                   degree_level dl, 
                                   degree_stages ds,
                                   document doc

                              WHERE dp.fid = $fidd 
                              AND dp.degree_id = d.degree_id 
                              AND dp.dlevel_id = dl.dlevel_id
                              AND dp.degree_stages = ds.ds_code
                              AND dp.documentID = doc.ID"; 

                      $qr = mysqli_query($dbc, $q);

                     while($row = mysqli_fetch_array($qr)):?>
                     <tr>
                      <td><?php echo $row['degree_title'];?></div></td>
                      <td><?php echo $row['institution_id'];?></div></td>
                      <td><?php echo $row['ds_name'];?></div></td>
                      <td><?php echo $row['earned_units'];?></div></td>
                      <td><?php echo $row['start_date'];?></div></td>
                      <td><?php echo $row['end_date'];?></div></td>
                      
                        <td>
                          <?php
                            echo "<a href='FDegreesBeingPursuedViewEvidence.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-success btn-m">View</button> </a>
                    
                    </td>
                      
                      <td>
                          <?php
                            echo "<a href='FEditDegreeBeingPursued.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button> </a>
                  
                    </td>
                  </tr>
                
                 <?php endwhile; ?>   
                </tbody>
              </table>
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
  <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../../lib/advanced-form-components.js"></script>

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
$("#5b").addClass("active");
    </script>
</body>

</html>
