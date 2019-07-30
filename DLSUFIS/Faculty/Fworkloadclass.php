<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
		if(isset($_POST['delete']))
		{
		$query="UPDATE `ccsfif`.`document` SET `isArchived`='1' WHERE `ID`='{$_POST['delete']}';";
		$result=mysqli_query($dbc,$query);
		echo $query;
		}
       $titleid = $_GET['viewworkload'];
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
          <div class="row mt">
          <div class="col-lg-12">
            
             <?php 
            $title = "SELECT 
                            sy.schoolyearstart, sy.schoolyearend, cr.coursename, f.ffname, f.flname, cs.isArchived, cs.documentID, cs.documentid
                        FROM
                            class cs,
                            course cr,
                            schoolyear sy,
                            faculty f
                        WHERE
                            cr.courseid = cs.courseid
                                AND sy.syid = cs.schoolyear
                                AND cs.fid=f.fid
                                AND classid= $titleid";
              
               $qr = mysqli_query($dbc, $title);
            
            $display = mysqli_fetch_assoc($qr);
              
              echo "<center><h2> {$display['coursename']} </center></h2>";
              
              
            ?>
          
          <h1></h1>
        
            <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#a">Quizzes</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#b">Exam</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#c">Projects</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#d">Machine Project</a>
                  </li>
                </ul>
              </div>
             
            
                
            <div class="panel-body">
                <div class="tab-content">
                  <div id="a" class="tab-pane active">
                      <h2>QUIZZES
                      <a href="FWorkloadQuizUpload.php"><button class="btn btn-success btn-xs">+</button></a></h2>
                  <table class="table table-striped table-advance">
                    <thead>
                      <tr>
                          <th class="hidden-phone"><i class=""></i>Evidences</th>
                        <th class="hidden-phone"><i class=""></i>Date Uploaded</th>
                          <th class="hidden-phone"><i class=""></i>Uploaded By:</th>
                        </tr>
                    </thead>
                    <tbody>           
                    </tbody>
                      </table>
                </div>
                
            <!-- love-->    
            <div id="b" class="tab-pane">
			  <div class="row">
                  <h2>EXAMS
                      <a href="FWorkloadQuizUpload.php"><button class="btn btn-success btn-xs">+</button></a></h2>
              <table class="table table-striped table-advance">
                
                <thead>
                  <tr>
                    
                    <th class="hidden-phone"><i class=""></i>Evidences</th>
                    <th class="hidden-phone"><i class=""></i>Date Uploaded</th>
                    </tr>
                </thead>
                <tbody>           
                </tbody>
              </table>
                </div>
            </div>
            <!-- love-->
            <div id="c" class="tab-pane">
			  <div class="row">
                 <h2>PROJECTS
                     <a href="FWorkloadUpload.php"><button class="btn btn-success btn-xs">+</button></a></h2>
              <table class="table table-striped table-advance">
                
                <thead>
                  <tr>
                    
                    <th class="hidden-phone"><i class=""></i>Evidences</th>
                    <th class="hidden-phone"><i class=""></i>Date Uploaded</th>
                    </tr>
                </thead>
                <tbody>           
                </tbody>
              </table>
                </div>
            </div>  
            <!-- break-->
             <div id="d" class="tab-pane">
			  <div class="row">
                  <h2>MACHINE PROJECTS
                      <a href="FWorkloadQuizUpload.php"><button class="btn btn-success btn-xs">+</button></a></h2>
              <table class="table table-striped table-advance">
                <thead>
                  <tr>
                    
                    <th class="hidden-phone"><i class=""></i>Evidences</th>
                    <th class="hidden-phone"><i class=""></i>Date Uploaded</th>
                    </tr>
                </thead>
                <tbody>           
                </tbody>
              </table>
                </div>
            </div>         
                    
                    
          <!-- /col-lg-12 -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
                  <!-- /row -->
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
$("#4").addClass("active");
    </script>
</body>

</html>
