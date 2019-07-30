<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0001") {
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
      require_once("sidenavbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->

    <section id="main-content">
      <section class="wrapper site-min-height">

      <h2> <center> EVIDENCES   </center></h2>
        <div class="col-lg-12 main-chart">
            <div class="showback">
            <h3 class="mb"><i class="fa fa-angle-right"></i> Profile and Experience</h3>    
            
            <div class="row">
            <a href='QaoDegreesEarned.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                      <?php 
                      $rv ="SELECT 
                                COUNTAPPROVEDDEGREES() AS 'approved',
                                COUNTDEGREESEARNED() AS 'total',
                                COUNTPENDINGDEGREES() AS 'pending' ";
                        $rvf = mysqli_query($dbc, $rv);
                        $countdegrees= mysqli_fetch_array($rvf);
                      ?>
                      <h4 style="color: white"> <center>Total : <?php echo $countdegrees['total']; ?> </center></h4>
                  </div>
                    <img src="img/degreesearnedd.png" height = "100" width ="100">
                    <h3 style="color: white">Degrees Earned</h3>
                    
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countdegrees['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countdegrees['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                <a href='QaoBeingPursued.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
				  <?php 
                      $rv ="SELECT 
								COUNTDEGREEPURSUE() AS 'total',
								COUNTDEGREEPURSUEAPPROVED() AS 'approved',
								COUNTDEGREEPURSUEPENDING() AS 'pending';";
                        $rvf = mysqli_query($dbc, $rv);
                        $countdegreespursue= mysqli_fetch_array($rvf);
                      ?>
                      <h4 style="color: white"> <center>Total : <?php echo $countdegreespursue['total']; ?> </center></h4>
                  </div>
                    <img src="img/degreebeingpursued.png" height = "100" width ="100">
                    <h3 style="color: white">Degrees Being Pursued</h3>
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countdegreespursue['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countdegreespursue['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<?php 
						$rv ="SELECT 
								COUNTSPECIALTRAINING() AS 'total',
								COUNTSPECIALTRAININGPENDING() AS 'pending',
								COUNTSPECIALTRAININGAPPROVED() AS 'approved'";
                        $rvf = mysqli_query($dbc, $rv);
                        $countspecialtraining= mysqli_fetch_array($rvf);
                      ?>
                    <h4 style="color: white"> <center>Total : <?php echo $countspecialtraining['total']; ?> </center></h4>
                  </div>
                    
                    <img src="img/Specialtrainings.png" height = "100" width ="100">
                    <h3 style="color: white">Special Training</h3>
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countspecialtraining['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countspecialtraining['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<?php 
						$rv ="SELECT 
								COUNTTEACHINGEXPERIENCE() AS 'total',
								COUNTTEACHINGEXPERIENCEPENDING() AS 'pending',
								COUNTTEACHINGEXPERIENCEAPPROVED() AS 'approved'";
                        $rvf = mysqli_query($dbc, $rv);
                        $countteachingexperience= mysqli_fetch_array($rvf);
                      ?>
                    <h4 style="color: white"> <center>Total : <?php echo $countteachingexperience['total']; ?> </center></h4>
                  </div>
                    <img src="img/profexperience.png" height = "100" width ="100">
                    <h4 style="color: white"> Teaching Experience and Length of Service</h4>
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countteachingexperience['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countteachingexperience['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
            </div>
<!---------------------------------------------------------- 2nd row ---------------------------------------------------->
            <div class="row">
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<?php 
						$rv ="SELECT 
								COUNTPROFESSIONALEXPERIENCE() AS 'total',
								COUNTPROFESSIONALEXPERIENCEPENDING() AS 'pending',
								COUNTPROFESSIONALEXPERIENCEAPPROVED() AS 'approved'";
                        $rvf = mysqli_query($dbc, $rv);
                        $countprofessionalexperience= mysqli_fetch_array($rvf);
                      ?>
                    <h4 style="color: white"> <center>Total : <?php echo $countprofessionalexperience['total']; ?> </center></h4>
                  </div>
                    <img src="img/professionalexperience.png" height = "100" width ="100">
                    <h3 style="color: white">Professional Experience</h3>
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countprofessionalexperience['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countprofessionalexperience['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<?php 
						$rv ="SELECT 
								COUNTPROFESSIONALPRACTICE() AS 'total',
								COUNTPROFESSIONALPRACTICEPENDING() AS 'pending',
								COUNTPROFESSIONALPRACTICEAPPROVED() AS 'approved'";
                        $rvf = mysqli_query($dbc, $rv);
                        $countprofessionalpractice= mysqli_fetch_array($rvf);
                      ?>
                    <h4 style="color: white"> <center>Total : <?php echo $countprofessionalpractice['total']; ?> </center></h4>
                  </div>
                    <img src="img/profpractice.png" height = "100" width ="100">
                    <h3 style="color: white">Professional Practice</h3>
                    <footer>
                    <div class="pull-left">   
                        <p> &nbsp; <i class="fa fa-check-square-o"></i> Approved : <?php echo $countprofessionalpractice['approved']; ?></p>    
                    </div>
                    <div class="pull-right">
                      <p>For Approval : <?php echo $countprofessionalpractice['pending']; ?> &nbsp; </p>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <br>

            </div>
            </div>
<!-----------------------------------------------Professional Activities 1 -------------------------------------------------->
            <div class="showback">
            <h3 class="mb"><i class="fa fa-angle-right"></i> Professional Activities 1</h3>    
            
            <div class="row">
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Leadership in Professional Org</h3>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Membership in Professional Org</h3>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Outstanding Achievements</h3>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                </div>   
            </div>
                
 <!-----------------------------------------------Professional Activities 2 -------------------------------------------------->
        <div class="showback">
            <h3 class="mb"><i class="fa fa-angle-right"></i> Professional Activities 2  </h3>    
            <div class="row">
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i><br>
                    <h4 style="color: white">Journal and Publication</h4>
                    <footer>
                    <br><br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Prototype</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Patent</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
               <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Books and Textbooks</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
            </div>
            <div class="row">
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h4 style="color: white">Papers published in conference proceeding</h4>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h4 style="color: white">Published short stories, novel, poetry, play, screenplay, creative work</h4>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h4 style="color: white">Play, screenplay, film, creative work performed or presented</h4>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
               <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">Other research outputs</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                 <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h4 style="color: white">Conferences/ Workshops Attended</h4>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
            </div>
            
            
            </div><!-- For Show back -->
            
<!-----------------------------------------------Community Service -------------------------------------------------->
            <div class="showback">
            <h3 class="mb"><i class="fa fa-angle-right"></i> Community Service</h3>    
            
            <div class="row">
                <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">In DLSU</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                 <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">In Professional Organizzation</h3>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                 <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h3 style="color: white">With Government</h3>
                    <footer>
                    <br><br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
                    <a href='QaoDashboard.php'>
              <div class="col-md-3 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h4 class="mt" style="color: white"></h4>
                  </div>
                    <i class="fa fa-check-square-o fa-4x" style="color: white"></i>
                    <h2 style="color: white">Others</h2>
                    <footer>
                    <br><br>
                    <div class="pull-left">
                      <h5><i class="fa fa-inbox"></i> Total :</h5>
                    </div>
                    <div class="pull-right">
                      <h5>10</h5>
                    </div>
                  </footer>
                </div>
              </div>
                </a>
                
            
                
                
            </div>
            </div>

            
            
            
            
        </div>  
          

	</section>  
</section>


 <!-- js placed at the end of the document so the pages load faster -->

  <script src="../../lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../../lib/jquery.sparkline.js"></script>

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
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
</script>
<script>
$("#qve").addClass("active");

</script>
</tbody>

</html>