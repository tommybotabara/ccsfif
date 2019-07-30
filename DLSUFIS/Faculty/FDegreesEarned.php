<!DOCTYPE html>
<html lang="en">


<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
       
       $query10="select FFNAME, FLNAME 
                       from faculty 
                       where username = '{$_SESSION['username']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);


              $combineName = $row10['FLNAME']."_".$row10['FFNAME'];
             
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

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
      <?php
      require_once("sidetopbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
 <section id="main-content">
      <section class="wrapper site-min-height">
        <h3>
          <i class="fa fa-angle-right"></i> Degrees Earned   
          <a href="FCreateDegreesEarned.php"> 
          <button type="button" class="btn btn-success">Add New </button> 
          </a>
        </h3>
        <div class="row mt">
          <div class="col-lg-12">

          <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Degree[s] Earned</th>
                    <th class="hidden-phone"><i class=""></i>Title of Degree</th>
                    <th class="hidden-phone"><i class=""></i>Area of Specialization</th>
                    <th class="hidden-phone"><i class=""></i>Year Obtained</th>
                    <th class="hidden-phone"><i class=""></i> Educational Institution</th>
                    <th class="hidden-phone"><i class=""></i>Location</th>
                    <th class="hidden-phone"><i class=""></i>S.O. Number</th>
                    <th class="hidden-phone"><i class=""></i>Evidence</th>

                    </tr>
                </thead>


                <tbody>
                           <?php

                    $tt ="SELECT fid 
                          FROM faculty 
                          where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];


                      $q="SELECT de.de_id as id, 
                                 dl.dlevel_title, 
                                 CONCAT (dl.dlevel_desc, ' ', d.degree_title) as degree_title, 
                                 de.specialization, 
                                 de.year_obtained, 
                                 l.location_name, 
                                 i.institution_name , 
                                 de.so_num,
                                 doc.file_name,
                                 doc.file_uploaded  

                            FROM degree_level dl, 
                                 degree d, 
                                 degree_earned de , 
                                 institution i, 
                                 location l,
                                 document doc


                           WHERE fid = $fidd
                            AND dl.dlevel_id = de.dlevel_id
                            AND de.degree_id = d.degree_id
                            AND de.institution_id = i.institution_id
                            AND de.location_id = l.location_id
                            AND de.documentID = doc.ID
                            "; 
                        

                      $qr = mysqli_query($dbc, $q);

                     while($row = mysqli_fetch_array($qr)):?>
                     <tr>
                      <td><?php echo $row['dlevel_title'];?></div></td>
                      <td><?php echo $row['degree_title'];?></div></td>
                      <td><?php echo $row['specialization'];?></div></td>
                      <td><?php echo $row['year_obtained'];?></div></td>
                      <td><?php echo $row['institution_name'];?></div></td>
                      <td><?php echo $row['location_name'];?></div></td>
                      <td><?php echo $row['so_num'];?></div></td>
                      
                     <td>
                          <?php
                            echo "<a href='FDegreesEarnedViewEvidence.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-success btn-m">View</button> </a>
                    
                    </td>
                      <td>
                          <?php
                            echo "<a href='FEditDegreesEarned.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-primary btn-m"><i class="fa fa-pencil"></i></button> </a>
                    
                    </td>
                </tr>
                 <?php endwhile; ?>            
                </tbody>
              </table>
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

      <!--
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">

        -->
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
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

                <?php 

function File_Size($size)
{
    if($size > 104876){
        return $return_size=sprintf("%01.2f",$size / 1048576)." Mb";
    }elseif($size > 1024){
        return $return_size=sprintf("%01.2f",$size / 1024)." Kb";
    }else{
        return $return_size=$size." Bytes";
    }

}
            ?>

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
<script>
$("#5").addClass("active");
$("#5a").addClass("active");
    </script>
</body>

</html>
