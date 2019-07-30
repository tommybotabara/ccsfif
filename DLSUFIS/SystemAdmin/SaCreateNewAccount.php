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
					$q = "SELECT username FROM ccsfif.faculty;";
					$qr = mysqli_query($dbc, $q);
					
					$message=NULL;
					if (empty($_POST['UN']))
					{
						$_POST['UN']=FALSE;
						$message.='<p>Please enter the USERNAME.';
					}
					else
					{
						while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
						{
							 
							if($row["username"] == $_POST['UN'])
							{
								$message.='<p>USERNAME is already being used';
							}
						}
					}

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
						
						$q = "select count(username) as user from faculty;";
						$qr = mysqli_query($dbc, $q);
						while($row = mysqli_fetch_array($qr,MYSQLI_ASSOC))
						{
							$count = $row["user"] + 1;
						}
						
						$query="insert into faculty (FID,PASSWORD,USERNAME,ACCOUNT_ID,FFNAME,FMNAME,FLNAME,UNIT_CODE,DEPT,CLASSIFICATION,RANK,POSITION_ID,ID_COMMITTEEHEAD,ACTIVE) values ('{$count}','{$_POST["PW"]}','{$_POST["UN"]}','{$_POST["accttype"]}','{$_POST["FN"]}','{$_POST["MN"]}','{$_POST["LN"]}','{$_POST["college"]}','{$_POST["dept"]}','PPPPP','{$_POST["rank"]}','{$_POST["pos"]}','0','1')";
						$result=mysqli_query($dbc,$query);
					$success = "New account for (".$_POST['FN']." ".$_POST['LN'].") has been created.";
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
        <h3><i class="fa fa-angle-right"></i> Create New User Account Records</h3>
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
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="UN">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="" name="PW">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="LN">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="FN">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Middle Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="MN">
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> College </label>
                  <div class="col-sm-10">
						<select name="college" class="form-control">
                        <?php 
							$query = "SELECT unit_code, unit_title FROM ccsfif.unit;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['unit_code'].">".$row['unit_title']."</option>";
							} 
						?> 
						</select>

                  </div>
                </div>
				
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Department </label>
                  <div class="col-sm-10">
						<select name="dept" class="form-control">
                        <?php 
							$query = "SELECT dept_code, dept_name FROM ccsfif.department;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['dept_code'].">".$row['dept_name']."</option>";
							} 
						?> 
						</select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Position </label>
                  <div class="col-sm-10">
                      <select name="pos" class="form-control">
                        <?php 
							$query = "SELECT position_id, position_title FROM ccsfif.position;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['position_id'].">".$row['position_title']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Rank </label>
                  <div class="col-sm-10">
                      <select class="form-control" name="rank">
                        <?php 
							$query = "SELECT rank_code, rank_title FROM ccsfif.rank;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['rank_code'].">".$row['rank_title']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Account type </label>
                  <div class="col-sm-10">
                      <select name="accttype" class="form-control">
                        <?php 
							$query = "SELECT account_id, account_role FROM ccsfif.account;";	
							$result = mysqli_query($dbc, $query);
							
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['account_id'].">".$row['account_role']."</option>";
							} 
						?> 
                      </select>

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <input class="btn btn-theme" type="submit" name="Submit" value="Submit">
                      <a href="SaAccounts.php"> <button class="btn btn-theme04" type="button">Back</button></a>
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
