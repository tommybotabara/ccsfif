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
		$q = "SELECT ID, RANK_TITLE, RANK_CODE, ACTIVE FROM ccsfif.RANK where ID = '".$ID."';";
		$qr = mysqli_query($dbc, $q);
		while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
		{
			$ID = $row["ID"];
			$code = $row["RANK_CODE"];
			$title = $row["RANK_TITLE"];
			$stat = $row["ACTIVE"];
		}
	}
	if (isset($_POST['Update']))
	{

	$code = $_POST["code"];
	$title = $_POST["title"];
	$stat = $_POST["stat"];
	$ID = $_POST["ID"];
	$message = NULL;
	if (empty($_POST['code']))
	{
		$_POST['code']=FALSE;
		$message.='<p>Please enter the RANK CODE';
	} 
	if (empty($_POST['title']))
	{
		$_POST['title']=FALSE;
		$message.='<p>Please enter the RANK TITLE';
	} 
	if(!isset($message))
	{
		$query = "UPDATE `ccsfif`.`rank` SET `RANK_CODE`='{$_POST['code']}', `RANK_TITLE`='{$_POST['title']}',`ACTIVE`='{$_POST['stat']}' WHERE `id`='{$_POST['ID']}';";
		$result=mysqli_query($dbc,$query);
		$success = "Rank (".$_POST['code']." ".$_POST['title'].") has been updated.";
	}					
	}
?>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
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
      <section class="wrapper">
              <h3>
                <i class="fa fa-angle-right"></i> Edit Faculty Rank     
               
                </h3>

        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
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
                  <label class="col-sm-2 col-sm-2 control-label">Rank Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "code" value="<?php echo $code;?>">
					<input class="form-control" name = "ID" id="disabledInput" value = "<?php echo $ID;?>" type="hidden">
                  </div>
                </div>

            <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Rank Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name = "title" value="<?php echo $title;?>">
                  </div>
                </div>
			<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Status </label>
                  <div class="col-sm-10">
                      <select class="form-control"name = "stat">
                        <option value = 1>Active</option>
                        <option value = 0>Inactive</option>
                      </select>

                  </div>
                </div>


                <input class="btn btn-theme" type="submit" name="Update" value="Update">
                <a href="SaFacultyRank.php"><button type="button" class="btn btn-primary">Back</button>

          </form>

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
$("#fr").addClass("active");
$("#dlsudata").addClass("active");
    </script>
    </script>
</body>

</html>
