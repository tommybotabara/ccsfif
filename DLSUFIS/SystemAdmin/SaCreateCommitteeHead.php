<!DOCTYPE html>
<html lang="en">

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

</head>

<body>
<?php
				session_start();
				require_once('../mysql_connect.php');
				if (isset($_POST['Submit']))
				{
					$startq = "select schoolyearstart from schoolyear where syid = {$_POST['start']};";
					$sqr = mysqli_query($dbc, $startq);
					$faculty = $_POST['faculty'];
					while($srow = mysqli_fetch_array($sqr,MYSQLI_ASSOC))
					{
						$start = $srow["schoolyearstart"];
					}
					$starte = "select schoolyearstart from schoolyear where syid = {$_POST['end']};";
					$sqe = mysqli_query($dbc, $starte);
					while($erow = mysqli_fetch_array($sqe,MYSQLI_ASSOC))
					{
						$end = $erow["schoolyearstart"];
					}
					if ($start > $end)
					{
						$_POST['PW']=FALSE;
						$message.='<p>Start cannot be greater than end';
					} 
					if(!isset($message))
					{
						
						$q = "SELECT count(idcommittee_head) as id FROM ccsfif.committee_head;";
						$qr = mysqli_query($dbc, $q);
						while($row = mysqli_fetch_array($qr,MYSQLI_ASSOC))
						{
							$count = $row["id"] + 1;
						}
						
						$query="INSERT INTO `ccsfif`.`committee_head` (`idcommittee_head`, `startYear`, `fid`, `endYear`, `status`) VALUES ('{$count}','{$start}', '{$faculty}', '{$end}', '1');
";
						$result=mysqli_query($dbc,$query);
					$success = "New Committee Head Has Been Added.";
					}					
				}
				
?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
 
    <!--sidebar end-->
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
    <!--main content start-->


 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Create New Committee Head</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal style-form">
				<?php
					if(isset($message))
					{
						echo '<font color="red">'.$message. '</font>';
					}
					if(isset($success))
					{
						echo '<font color="green">'.$success. '</font>';
					}

				?>
				
				<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Faculty </label>
                  <div class="col-sm-10">
						<select name="faculty" class="form-control">
                        <option>-----------------------------------Select a faculty------------------------------------</option>
                        <?php 
							$query = "SELECT * FROM faculty;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['FID'].">".$row['FLNAME'].", ".$row['FFNAME']."</option>";
							} 
						?> 
						</select>

                  </div>
                </div>
				
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> School year start </label>
                  <div class="col-sm-10">
						<select name="start" class="form-control">
                            <option>-----------------------------------Select a school year start------------------------------------</option>
                        <?php 
							$query = "SELECT * FROM ccsfif.schoolyear;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['syid'].">".$row['schoolyearstart']."</option>";
							} 
						?> 
						</select>
                  </div>
                </div>

               <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> School year end </label>
                  <div class="col-sm-10">
						<select name="end" class="form-control">
                        <option>-----------------------------------Select a school year end------------------------------------</option>
                        <?php 
							$query = "SELECT * FROM ccsfif.schoolyear;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['syid'].">".$row['schoolyearstart']."</option>";
							} 
						?> 
						</select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <input class="btn btn-theme" type="submit" name="Submit" value="Submit">
                      <a href="SaAccounts.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>





               
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->

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
$("#accounts").addClass("active");

    </script>
</body>

</html>
