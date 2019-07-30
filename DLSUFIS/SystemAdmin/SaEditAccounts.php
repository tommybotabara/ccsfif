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
	$FID = $_POST['Submit'];
	$q = "SELECT FID, FFNAME, FMNAME, FLNAME, USERNAME, PASSWORD, UNIT_CODE, DEPT, RANK, POSITION_ID, ACCOUNT_ID,ID_COMMITTEEHEAD, ACTIVE FROM ccsfif.faculty where FID = '".$FID."';";
	$qr = mysqli_query($dbc, $q);
	while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
	{
		$FID = $row["FID"];
		$FN = $row["FFNAME"];
		$MN = $row["FMNAME"];
		$LN = $row["FLNAME"];
		$UN = $row["USERNAME"];
		$PW = $row["PASSWORD"];
		$college = $row["UNIT_CODE"];
		$dept = $row["DEPT"];
		$rank = $row["RANK"];
		$pos = $row["POSITION_ID"];
		$accttype = $row["ACCOUNT_ID"];
		$ch = $row["ID_COMMITTEEHEAD"];
		$stat = $row["ACTIVE"];
	}
}
if (isset($_POST['Update']))
{
	$UN = $_POST["UN"];
	$FN = $_POST["FN"];
	$MN = $_POST["MN"];
	$LN = $_POST["LN"];
	$FID = $_POST["FID"];
	$PW = $_POST["PW"];
	$college = $_POST["college"];
	$dept = $_POST["dept"];
	$rank = $_POST["rank"];
	$pos = $_POST["pos"];
	$accttype = $_POST["accttype"];
	$stat = $_POST["stat"];
	$ch = $_POST["ch"];
	$message = NULL;
	if (empty($_POST['PW']))
	{
		$_POST['PW']=FALSE;
		$message.='<p>Please enter the PASSWORD';
	} 
	if (empty($_POST['FN']))
	{
		$_POST['FN']=FALSE;
		$message.='<p>Please enter the FIRST NAME';
	} 
	if (empty($_POST['MN']))
	{
		$_POST['MN']=FALSE;
		$message.='<p>Please enter the MIDDLE NAME';
	} 
	if (empty($_POST['LN']))
	{
		$_POST['LN']=FALSE;
		$message.='<p>Please enter the LAST NAME';
	}
	if(!isset($message))
	{
		$query = "UPDATE `ccsfif`.`faculty` SET `PASSWORD`='{$_POST['PW']}', `ACCOUNT_ID`='{$_POST['accttype']}',`UNIT_CODE`='{$_POST['college']}', `FFNAME`='{$_POST['FN']}', `FLNAME`='{$_POST['LN']}', `FMNAME`='{$_POST['MN']}', `DEPT`='{$_POST['dept']}', `RANK`='{$_POST['rank']}', `POSITION_ID`='{$_POST['pos']}', `ID_COMMITTEEHEAD`='{$_POST['ch']}', `ACTIVE`='{$_POST['stat']}' WHERE `FID`='{$_POST['FID']}';";
		$result=mysqli_query($dbc,$query);
		$success = "Account for (".$_POST['FN']." ".$_POST['LN'].") has been updated.";
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
        <h3><i class="fa fa-angle-right"></i> Edit User Account Records</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> User : <?php echo $LN.", ".$FN." ".$MN;?></h4>

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
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input class="form-control" name = "UN" id="disabledInput" type="text" placeholder="<?php echo $UN;?>" disabled>
					<input class="form-control" name = "UN" id="disabledInput" value = "<?php echo $UN;?>" type="hidden">
					<input class="form-control" name = "FID" id="disabledInput" value = "<?php echo $FID;?>" type="hidden">
					<input class="form-control" name = "FN" id="disabledInput" value = "<?php echo $FN;?>" type="hidden">
					<input class="form-control" name = "MN" id="disabledInput" value = "<?php echo $MN;?>" type="hidden">
					<input class="form-control" name = "LN" id="disabledInput" value = "<?php echo $LN;?>" type="hidden">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name = "PW"class="form-control" value="<?php echo $PW;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" name = "LN"class="form-control"value="<?php echo $LN;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" name = "FN" class="form-control" value="<?php echo $FN;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" name = "MN"class="form-control"value="<?php echo $MN;?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> College</label>
                  <div class="col-sm-10">
                      <select name = "college"class="form-control">
                        <?php 
							$query = "SELECT unit_code, unit_title FROM ccsfif.unit;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['unit_code'] == $college)
								{
									echo 'selected="selected"';
								}
								echo "value=".$row['unit_code'].">".$row['unit_title']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Department </label>
                  <div class="col-sm-10">
                      <select name = "dept"class="form-control">
                        <?php 
							$query = "SELECT dept_code, dept_name FROM ccsfif.department;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['dept_code'] == $dept)
								{
									echo 'selected="selected"';
								}
								echo "value=".$row['dept_code'].">".$row['dept_name']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Position </label>
                  <div class="col-sm-10">
                      <select name = "pos"class="form-control">
                        <?php 
							$query = "SELECT position_id, position_title FROM ccsfif.position;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['position_id'] == $pos)
								{
									echo 'selected="selected"';
								}
								echo "value=".$row['position_id'].">".$row['position_title']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Rank </label>
                  <div class="col-sm-10">
                      <select name = "rank"class="form-control">
                        <?php 
							$query = "SELECT rank_code, rank_title FROM ccsfif.rank;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option ";
								if($row['rank_code'] == $rank)
								{
									echo 'selected="selected"';
								}
								echo " value=".$row['rank_code'].">".$row['rank_title']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Account Type </label>
                  <div class="col-sm-10">
                      <select class="form-control" name = "accttype">
                        <?php 
							$query = "SELECT account_id, account_role FROM ccsfif.account;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value='".$row['account_id']."' ";
								
								if($row['account_id'] == $accttype)
								{
									echo 'selected="selected"';
								}
								echo '">';
								echo $row['account_role'];
								echo "</option>";
							} 
						?> 
                      </select>
                      </select>

                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Committee Head </label>
                  <div class="col-sm-10">
                      <select class="form-control"name = "ch">
                        <option 
							<?php
							if($ch == 1)
									{
										echo 'selected="selected "';
									}
							
							?> 
						value = 1>Yes</option>
                        <option <?php
							if($ch == 0)
									{
										echo 'selected="selected "';
									}
							
							?> value = 0>No</option>
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Status </label>
                  <div class="col-sm-10">
                      <select class="form-control"name = "stat">
                        <option <?php
							if($stat == 1)
									{
										echo 'selected="selected "';
									}
							
							?> value = 1>Active</option>
                        <option <?php
							if($stat == 0)
									{
										echo 'selected="selected "';
									}
							
							?>value = 0>Inactive</option>
                      </select>

                  </div>
                </div>

                <input class="btn btn-theme" type="submit" name="Update" value="Update">
                <a href="SaAccounts.php"><button type="button" class="btn btn-primary">Back</button>
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
