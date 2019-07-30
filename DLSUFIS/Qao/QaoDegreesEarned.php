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

      <h3>
          <i class="fa fa-angle-right"></i> Faculty Degrees Earned Evidences    
          
        </h3>
<br>
	
	<table id="sampleTable" class="table table-striped table-advance table-hover">
		<thead>
                  <tr>
                    <th><i class=""></i> Faculty Name</th>
                    <th class="hidden-phone"> dept</th>
                    
                    <th class="hidden-phone">Degree</th>
                    <th class="hidden-phone">Specialization</th>
                    <th class="hidden-phone">Year Obtained</th>
                    <th class="hidden-phone">Status</th>
                    <th></th>

                    </tr>
                </thead>
		<tbody>

                <?php
                        $q="SELECT 
                                de.de_id AS id,
                                GETFACULTYNAME(f.fid) AS 'name',
                                CONCAT(dl.dlevel_title,' ',d.degree_title ) AS degree,
                                f.DEPT,
                                de.specialization,
                                dl.dlevel_title,
                                d.degree_title,
                                de.year_obtained,
                                s.active, s.id as sid
                                
                            FROM
                                degree_Earned de
                                    JOIN
                                faculty f ON de.fid = f.fid
                                    JOIN
                                degree_level dl ON de.dlevel_id = dl.dlevel_id
                                    JOIN
                                degree d ON de.degree_id = d.degree_id
                                    JOIN
                                document doc 
                                    ON
                                de.documentID = doc.ID
                                    JOIN 
                                status S ON doc.status = s.id
                                ; 
                                    "; 
                                
                      $qr = mysqli_query($dbc, $q);

                     while($row = mysqli_fetch_array($qr)):?>
                     <tr>
                      <td><?php echo $row['name'];?></div></td>
                      <td><?php echo $row['DEPT'];?></div></td>
                      <td><?php echo $row['degree'];?></div></td>
                      <td><?php echo $row['specialization'];?></div></td>
                      <td><?php echo $row['year_obtained'];?></div></td>
                      

                        <?php
                    $status = $row['sid'];
                  
                    if ($status == '8')
                    { 
                             echo '<td><span class="label label-success label-small"> '.$row["active"].' </span></td>';

                    }
                    elseif ($status == '6'){
                        echo '<td><span class="label label-warning label-small"> Pending </span></td>';
                    }
?>
                      
                      <td>
                          <?php
                            echo "<a href='QaoDegreesEarnedDetails.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-primary btn-xs">View</button> </a>
                    </td>
                  </tr>
                
                 <?php endwhile; ?>   
                                    

	</table>
	</section>
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