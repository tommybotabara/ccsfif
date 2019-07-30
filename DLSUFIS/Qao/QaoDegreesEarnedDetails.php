<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0001"  ) {
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
    <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <script src="../../lib/chart-master/Chart.js"></script>

<body>
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

        <h3>
            <?php 
           $evidenceid= $_GET['id'];

            
          $displayevidence ="SELECT 
                                de.de_id AS id,
                                GETFACULTYNAME(f.fid) AS 'name',
                                CONCAT(dl.dlevel_title,' ',d.degree_title ) AS degree,
                                f.DEPT,
                                de.specialization,
                                dl.dlevel_title,
                                d.degree_title,
                                de.year_obtained,
                                s.active, s.id as sid,
                                doc.file_name, doc.file_type, doc.status, doc.type, et.et_name
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
                                JOIN evidence_type et ON
                                doc.type = et_id
                            WHERE de.de_id =$evidenceid;";
            
                $show = mysqli_query($dbc, $displayevidence);

                $show2 = mysqli_fetch_array($show);
     
            ?>
          <i class="fa fa-angle-right"></i> View Evidence for <?php echo $show2['name'], " - ", $show2['degree'] ?> </h3>
 
          
        <div class="row mt">
          <div class="col-lg-12">
              
              <div class="showback">
              <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Document Name </th>
                    <th class="hidden-phone"><i class=""></i>File Type</th>
                    <th class="hidden-phone"><i class=""></i>Evidence Type</th>
                    <th class="hidden-phone"><i class=""></i>Status</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                      <td><?php echo $show2['file_name']; ?></td>
                      <td><?php echo $show2['file_type']; ?> </td>
                      <td><?php echo $show2['et_name']; ?> </td>
                    
                         
                     <?php
                            $status = $show2['sid'];

                            if ($status == '8')
                            { 
                                     echo '<td><span class="label label-success label-small"> '.$show2["active"].' </span></td>';
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
            </table>
          <div class="">
                <a href="QaoDegreesEarned.php"><button class="btn btn-theme04" type="button">Back</button></a>    
            </div>
          

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

        </div>
        <a href="../../index.html#" class="go-top">
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
  <script src="../../lib/zabuto_calendar.js"></script> <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="../../lib/bootstrap-switch.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="../../lib/form-component.js"></script>


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
$("#qve").addClass("active");
    </script>
          <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
</body>

</html>
