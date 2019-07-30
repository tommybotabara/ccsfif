<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0000") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
       
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CCS- Accreditation Management System</title>

  <!-- Favicons -->
  <link href="../../img/logodlsu.png" rel="icon">
  <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <script src="../../lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<?php
				require_once('../mysql_connect.php');
?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->

   <?php
      require_once("topnavbar.php");
      
      ?>
      
    <!--header end-->
    <!-- ************************************************************************************************************
        MAIN SIDEBAR MENU
        ************************************************************************************************************ -->
    <!--sidebar start-->
   <?php
      require_once("sidenavbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   


<section id="main-content">
      <section class="wrapper">
              <h3>
                <i class="fa fa-angle-right"></i> Faculty Rank     
                <a href="SaCreateNewFacultyRank.php"> 
                <button type="button" class="btn btn-success">Add New </button> 
                </a>
                </h3>

        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">

            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i>Rank Code</th>
                    <th class="hidden-phone">Rank Title</th>
					<th class="hidden-phone">Active</th>
                  </tr>
                </thead>
                <tbody>
<?php
					$q = "SELECT ID,RANK_CODE, RANK_TITLE, ACTIVE FROM ccsfif.RANK;";
					$qr = mysqli_query($dbc, $q);
					while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
					{ 
						echo '
						<tr>
							<td>
								'.$row["RANK_CODE"].'
							</td>
							<td class="hidden-phone">
								'.$row["RANK_TITLE"].'
							</td>';
							if ($row["ACTIVE"] == 1)
							{
								echo	"<td>Active</td>";
							}
							else
							{
								echo	"<td>Inactive</td>";
							}	
							
							echo'		<td>
									<form action="SaEditFacultyrank.php" method="post" class="form-horizontal style-form">
									<button class="btn btn-primary btn-xs" type="submit" name="Submit" value="'.$row["ID"].'">edit</button>									</td>
								</tr>';
					}

				?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->

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
$("#dlsudata").addClass("active");
$("#fr").addClass("active");

    </script>
</body>

</html>
