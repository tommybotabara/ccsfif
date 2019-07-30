<!DOCTYPE html>
<html lang="en">

<?php
         session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0001") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
		if(isset($_POST['Submit']))
		{
			$ID = $_POST['Submit'];
		}
		if(isset($_POST['Go']))
		{
			$ID = $_POST['ID'];
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
    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
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
    <!--main content start-->

    <section id="main-content">
      <section class="wrapper site-min-height">
          <h2>
          <center> Evidences  </center>
          
        </h2>
          <table id="sampleTable" class="table table-striped table-advance table-hover">
		<thead>
                  <tr>
                    <th><i class=""></i>File Name</th>
                    <th class="hidden-phone"> File Type</th>
                    <th class="hidden-phone">Date Uploaded</th>
                    <th class="hidden-phone">Approval Status</th>
                    <th class="hidden-phone">Evidence Type</th>
                    <th></th>

                    </tr>
                </thead>
		<tbody>
            <?php
                $q="SELECT 
                        doc.file_name,
                        doc.file_type,
                        doc.file_uploaded,
                        s.active,
                        et.et_name, s.id
                    FROM
                        document doc
                            JOIN
                        status s ON s.id = doc.status
                            JOIN
                        evidence_type et ON doc.type = et.et_id"; 
                                
                 $qr = mysqli_query($dbc, $q);

                while($row = mysqli_fetch_array($qr)):?>
                    <tr>
                      <td><?php echo $row['file_name'];?></div></td>
                      <td><?php echo $row['file_type'];?></div></td>
                      <td><?php echo $row['file_uploaded'];?></div></td>
                      <td><?php echo $row['et_name'];?></div></td>


                     <?php
                            $status = $row['id'];

                            if ($status == '8')
                            { 
                                     echo '<td><span class="label label-success label-small"> '.$row["active"].' </span></td>';
                                     echo '<td></td>';

                            }
                            elseif ($status == '6'){
                                echo '<td><span class="label label-warning label-small"> Pending </span></td>';
                                echo '<td><button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                         <button class="btn btn-danger btn-xs">Reject</button></td>';
                            }
?>     
                    </tr>
            
        </tbody>
<?php endwhile; ?>   
                                    
              
          </table>


        
 
      </section>
      
    </section>
 
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">


        </div>
        <a href="../../index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
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
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
</script>
<script>
$("#1").addClass("active");
</script>
</body>

</html>
