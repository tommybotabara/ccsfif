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

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<?php
				session_start();
				require_once('../mysql_connect.php');
				
				if(isset($_POST['ap']))
				{
					$ap = $_POST['ap'];
					$query = "SELECT * FROM document where apid = '".$ap."' and isArchived = '0'";					
					$result = mysqli_query($dbc, $query);
					while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
					{
						$id = $row['ID'];
						$query1 ="UPDATE `ccsfif`.`document` SET `isArchived`='1' WHERE `ID`='{$id}';";
						$result1=mysqli_query($dbc,$query1);
						$success = "Accreditation Period Documents and Information Has Been Archived";
					}
				}
?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
<?php
      require_once("topnavbar.php");
      
      ?>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
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
		<i class="fa fa-angle-right"></i> ARCHIVE
		</h3>
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
					<label class="col-sm-2 col-sm-2 control-label"> Accreditation Period</label>
						<div class="col-sm-10">
							<select name="ap" class="form-control">
							<?php
							
							$query = "SELECT * FROM ccsfif.accreditation_period;";	
							$result = mysqli_query($dbc, $query);
							while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) 
							{
								$idstart = $row['schoolyearstart'];
								$idend = $row['schoolyearend'];
								
								$query1 = "SELECT * FROM ccsfif.schoolyear where syid = {$idstart};";	
								$result1 = mysqli_query($dbc, $query1);
								while ($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC)) 
								{
									$start = $row2['schoolyearstart'];
								}
								
								$query2 = "SELECT * FROM ccsfif.schoolyear where syid = {$idend};";	
								$result2 = mysqli_query($dbc, $query2);
								while ($row3=mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
								{
									$end = $row3['schoolyearstart'];
								}

								echo "<option value=".$row['ap_id'].">".$start."-".$end."</option>";
							} 
							?> 
							</select>
						</div>
					</div>

					<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					<input class="btn btn-theme" type="submit" name="Submit" value="Archive">
					<button class="btn btn-theme04" type="button">Back</button>
					</div>
					</div>






					</form>
				</div>
			<!-- /form-panel -->
			</div>
			<!-- /col-lg-12 -->
			</div>
		<!-- row -->

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
$("#accreditation").addClass("active");
$("#Archive").addClass("active");
    </script>
</body>

</html>
