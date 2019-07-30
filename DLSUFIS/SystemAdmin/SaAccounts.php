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
        <h3>
          <i class="fa fa-angle-right"></i> User Account Records     
          <a href="SaCreateNewAccount.php"> 
          <button type="button" class="btn btn-success">Add New Account</button> 
          </a>
		  <a href="SaDeactivatedAccounts.php"> 
		  <button type="button" class="btn btn-success">View Deactivated Accounts</button> 
		  </a>
		  <a href="SaCommitteeAccounts.php"> 
		  <button type="button" class="btn btn-success">View Committee Head Accounts</button> 
		  </a>
        </h3>

        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Last Name</th>
                    <th class="hidden-phone"></i> First Name</th>
                    <th><i class="fa fa-bookmark"></i> Department/Unit</th>
                    <th><i class=" fa fa-edit"></i> Account Type</th>
					<th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$q = "SELECT FID, FFNAME,FLNAME,DEPT,UNIT_CODE,ACCOUNT_ID, ACTIVE FROM ccsfif.faculty where active='1';";
					$qr = mysqli_query($dbc, $q);
					while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
					{ 
						echo '
						<tr>
							<td>
								'.$row["FLNAME"].'
							</td>
							<td class="hidden-phone">
								'.$row["FFNAME"].'
							</td>
							<td>';
							$q2 = "SELECT dept_name FROM ccsfif.department where dept_code = '".$row['DEPT']."'";
							$qr2 = mysqli_query($dbc, $q2);
							while($row2=mysqli_fetch_array($qr2,MYSQLI_ASSOC))
							{
								$dept = $row2["dept_name"];
							}
							$q3 = "SELECT unit_title FROM ccsfif.unit where unit_code = '".$row['UNIT_CODE']."'";
							$qr3 = mysqli_query($dbc, $q3);
							while($row3=mysqli_fetch_array($qr3,MYSQLI_ASSOC))
							{
								$unit = $row3["unit_title"];
							}
							echo $dept."/".$unit;
							echo '					</td>
									<td>';
										$q4 = "SELECT ACCOUNT_ROLE FROM ccsfif.account where account_ID = '".$row['ACCOUNT_ID']."'";
										$qr4 = mysqli_query($dbc, $q4);
										while($row4=mysqli_fetch_array($qr4,MYSQLI_ASSOC))
										{
											$account = $row4["ACCOUNT_ROLE"];
										}
										echo $account;
							echo '			</td>';
							if ($row["ACTIVE"] == 1)
							{
								echo	"<td>Active</td>";
							}
							else
							{
								echo	"<td>Inactive</td>";
							}	
							
							echo'		<td>
									<form action="SaEditAccounts.php" method="post" class="form-horizontal style-form">
									<button class="btn btn-primary btn-xs" type="submit" name="Submit" value="'.$row["FID"].'">edit</button>									</td>
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
