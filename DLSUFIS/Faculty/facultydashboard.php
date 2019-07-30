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
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <script src="../../lib/chart-master/Chart.js"></script>
    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


    
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
    <!-- ************************************************** MAIN CONTENT ************************************************************ -->
    <!--main content start-->
 <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
              
              
            <div class="border-head">
            <h4> SWITCH MODE</h4>
            </div>
            <div class="row centered mt mb">
            <div class="btn-group btn-group-justified">

                
              <div class="btn-group">
                  <a href="facultydashboard.php"><button type="button" class="btn btn-theme">Faculty</button></a>
              </div>

              <div class="btn-group">
                  

              <?php


                $tt ="SELECT fid 
                      FROM faculty 
                      WHERE username = '{$_SESSION['username']}' ";

                $ttr = mysqli_query($dbc, $tt);

                $fid = mysqli_fetch_array($ttr);

                $fidd= $fid['fid'];

              $checkcommitteehead = "SELECT 
                                          f.FID, f.ffname, f.flname, f.fmname
                                      FROM
                                          faculty f,
                                          committee_head ch
                                      WHERE
                                          ID_COMMITTEEHEAD = 1;";


              $check2 = mysqli_query($dbc,$checkcommitteehead);

              $rowch = mysqli_fetch_assoc($check2);
              $chfid = $rowch['FID']; 
              if ($fidd == $chfid){
                echo "<a href='FCHdashboard.php'><button type='button' class='btn btn-theme'>Committee Head</button></a>";
              }

              else{
                echo '<a href="FCHdashboard.php"><button type="button" class="btn btn-theme" disabled>Committee Head</button></a>';
              }

              ?>
            </div>
            
            </div>
            </div>
            <div class="border-head">
              <h3>Reminders</h3>
              </div>
              
             
              <?php
              $russ = "SELECT * FROM ccsfif.reminders WHERE Assignto=5 OR Assignto=7;";
              $russ1 = mysqli_query($dbc, $russ);

              while($row=mysqli_fetch_array($russ1)):?>
                <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b><?php echo $row['title']?></b> <?php echo $row['description'] ?></div>
                <?php endwhile; ?>  
              
            <div class="border-head">
              <h3>Tasks that were not acccepted (re-do)</h3>
            </div>  
              <div class="alert alert-danger">
            <table id="sampleTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th><center>Task</center></th>
                        <th><center>Reason For Disapproval</center></th>
                    </tr>
              </thead>
              <tbody>
            <?php

            $username ="SELECT fid 
                    FROM faculty 
                    WHERE username = '{$_SESSION['username']}'";

                  $usernameget = mysqli_query($dbc, $username);

                  $fid = mysqli_fetch_array($usernameget);

                  $fidd= $fid['fid'];

                  $query1 = " SELECT 
                                    t.tasktitle, t.RejectedReason
                                FROM
                                    task t
                                WHERE
                                    t.statusid = 3
                                    AND t.RejectedReason is not null
                                        AND faculty_fid = $fidd;";
                  
                

            $result1 = mysqli_query($dbc, $query1);



            while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
              echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
              echo "<tr>";
              echo "<td style='font-size:16px; text-align: center;'>{$row1['tasktitle']}</td>";  
              echo "<td style='font-size:16px; text-align: center;'>{$row1['RejectedReason']}</td>";          
              echo "</tr>";
              echo "</form>";

            }
                  ?>
    
              </tbody>
                  </table>
              </div>

              
            <div class="border-head">
              <h3>Overdue Tasks</h3>
            </div>
             <div class="alert alert-danger">
            <table id="sampleTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th><center>Task</center></th>
                        <th><center>Date due/days late</center></th>
                    </tr>
              </thead>
              <tbody>
            <?php

      

                  $query = " SELECT 
                                    t.tasktitle, t.duedate, f.flname
                                FROM
                                    task t,
                                    faculty f
                                WHERE
                                    duedate < NOW() AND t.statusid = 3
                                        AND t.faculty_FID = f.fid
                                        AND f.fid = $fidd; 
                                                            ";
                

            $result = mysqli_query($dbc, $query);



            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
              echo "<tr>";
              echo "<td style='font-size:16px; text-align: center;'>{$row['flname']}</td>";
              echo "<td style='font-size:16px; text-align: center;'>{$row['tasktitle']}</td>";  
              echo "<td style='font-size:16px; text-align: center;'>{$row['duedate']}</td>";          
              echo "</tr>";
              echo "</form>";

            }
                  ?>
    
              </tbody>

            </table>
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
              <h4>COMPLETED ACTIONS & PROGRESS</h4>
              <canvas id="newchart" height="130" width="130"></canvas>
              <script>
                var doughnutData = [{
                    value: 70,
                    color: "#4ECDC4"
                  },
                  {
                    value: 30,
                    color: "#fdfdfd"
                  }
                ];
                var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
              </script>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
              <div class="panel-body">
                <div class="chart">
                  <div class="centered">
                    <span>TASK PROGRESS</span>
                    <strong> 15%</strong>
                  </div>
                  <br>
                  <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
                </div>
              </div>
            </div>
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">RECENT ACTIVITY</h4>
            <!-- First Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>Just Now</muted>
                  <br/>
                  <a href="#">Paul Rudd</a> purchased an item.<br/>
                </p>
              </div>
            </div>
            <!-- Second Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>2 Minutes Ago</muted>
                  <br/>
                  <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                </p>
              </div>
            </div>
            <!-- Third Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>3 Hours Ago</muted>
                  <br/>
                  <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                </p>
              </div>
            </div>
            <!-- Fourth Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>7 Hours Ago</muted>
                  <br/>
                  <a href="#">Brando Page</a> purchased a year subscription.<br/>
                </p>
              </div>
            </div>

  
            <!-- CALENDAR-->
            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
            <!-- / calendar -->
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
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
    <!--custom switch-->
  <script src="../../lib/bootstrap-switch.js"></script>

    <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
      <script src="../../lib/form-component.js"></script>
<script src="../../lib/jquery.tagsinput.js"></script>

  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>




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
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
        
$(document).ready(function() {
   $('#exo').DataTable();
});
</script>
     
    <script>
$("#1").addClass("active");

    </script>
</body>

</html>
