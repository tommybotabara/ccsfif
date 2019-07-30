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
		$ID = $_POST['Submit'];
		$q = "SELECT institution_id, institution_name ,location, country FROM ccsfif.institution where institution_id = '".$ID."';";
		$qr = mysqli_query($dbc, $q);
		while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
		{
			$ID = $row["institution_id"];
			$title = $row["institution_name"];
			$loc = $row["location"];
			$country = $row["country"];
			
			
		}
	}
	if (isset($_POST['Update']))
	{
	$ID = $_POST["ID"];
	$title = $_POST["title"];
	$loc = $_POST["loc"];
	$country = $_POST["country"];
	$message = NULL;

	if (empty($_POST['title']))
	{
		$_POST['title']=FALSE;
		$message.='<p>Please enter the INSTITUTION NAME';
	} 
	if (empty($_POST['loc']))
	{
		$_POST['desc']=FALSE;
		$message.='<p>Please enter the INSTITUTION LOCATION';
	}
	if (empty($_POST['country']))
	{
		$_POST['desc']=FALSE;
		$message.='<p>Please enter the INSTITUTION COUNTRY';
	} 
	if(!isset($message))
	{
		$query = "UPDATE `ccsfif`.`institution` SET `INSTITUTION_NAME`='{$_POST['title']}', `INSTITUTION_id`='{$_POST['ID']}',`location`='{$_POST['loc']}',`country`='{$_POST['country']}' WHERE `institution_id`='{$_POST['ID']}';";
		$result=mysqli_query($dbc,$query);
		$success = "Degree Level (".$_POST['ID']."-".$_POST['title'].") has been updated.";
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
      
     
      require_once("sidenavbar.php");
      ?>
   
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
   



    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Edit Units</h3>

        <div class="row mt">
          <div class="col-lg-12">

             <div class="form-panel">
			<h3>Academic Institution ID: <?php echo $ID;?></h3>
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
                  <label class="col-sm-2 col-sm-2 control-label">Institution Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
					<input class="form-control" name = "ID" id="disabledInput" value = "<?php echo $ID;?>" type="hidden">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Location </label>
                  <div class="col-sm-10">
                      <select class="form-control" name="loc">
                        <?php 
							$query = "SELECT location_id, location_name FROM ccsfif.location;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['location_id'] == $loc)
								{
									echo 'selected="selected"';
								}
								echo "value=".$row['location_id'].">".$row['location_name']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Country</label>
                  <div class="col-sm-10">
                      <select class="form-control" name="country">
                        <?php 
							$query = "SELECT country_code, country_name FROM ccsfif.country;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['country_code'] == $country)
								{
									echo 'selected="selected"';
								}
								echo "value=".$row['country_code'].">".$row['country_name']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <input class="btn btn-theme" type="submit" name="Update" value="Update">
                    <a href="SaAcademicInstRecords.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>

            </form>

             </div>

    
          <!-- /col-lg-12 -->
          
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
        <p>
<!--          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved -->
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a> -->
        </div>
        <a href="index.html#" class="go-top">
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
$("#4").addClass("active");
$("#4c").addClass("active");        
    </script> 
</body>

</html>
