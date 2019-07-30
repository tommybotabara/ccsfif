<!DOCTYPE html>
<html lang="en">
    <?php
     session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0000") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
    
    $flag=0;
    if(isset($_POST['submit']))
            {

              $message = NULL;       
              if (empty($_POST['reminder']))
              {
                  $reminder = FALSE;
                  $message.='<p>You forgot to enter your days!';
              }
              else
                  $reminder = $_POST['reminder'];
             
            
            if(!isset($message))
            {
              $insert ="INSERT INTO task 
                        (tasktitle, taskdescription, statusid, faculty_FID, priorityID, duedate, dateassigned, datecompleted, tasktypeID, assignerID, categoryID)
                        VALUES 
                        ('$tasktitle', '$taskdescription','$status','$yolo', '$taskpriority', '$duedate', '$date', NULL, '$tasktype', '$assigner','$category')";
                

              $result = mysqli_query($dbc, $insert);

              $message ="<div class='alert alert-success'> <b> Task:  {$tasktitle} Successfully added!</b></div>";
                
               
              $flag = 1; 
    
    ?>

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
      <section class="wrapper site-min-height">
      <h3>
          <i class="fa fa-angle-right"></i> FACULTY INFORMATION FORM  
           
        </h3>
                        <!-- Button trigger modal -->
              <button align="right" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                Schedule FIF Reminder
                </button>
          <br>
              <!-- Modal -->
              
              
              
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Schedule Notification</h4>
                    </div>
                      
                    <div class="modal-body">
                     <div class="form-group ">
                          <label class="control-label col-lg-6">Set Schedule Reminder</label>
                          <div class="col-lg-10">
                            <input class=" form-control" type="number" name="reminder" value="<?php if (isset($_POST['reminder']) && !$flag) echo $_POST['reminder']; ?>"/>
                          </div>
                        </div> 
                    </div>
                      <br>
                      
                    <div class="modal-footer">
                        <label class="control-label col-lg-2"><button type="submit" name="submit" class="btn btn-primary">Set</button></label>
                    </div>
                      
                  </div>
                </div>
              </div>
          
          <table id="sampleTable" class="table table-striped table-advance table-hover">
		<thead>
                  <tr>
                    <th><i class=""></i> Last Name</th>
                    <th class="hidden-phone">First Name</th>
                    <th class="hidden-phone">Department</th>
                    <th class="hidden-phone">Unit</th>
                    <th></th>

                    </tr>
                </thead>
		<tbody>

                <?php

                    $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];

                    

                      

                        $q="SELECT FID as id,
                                   FFNAME,
                                   FLNAME,
                                   DEPT,
                                   UNIT_CODE

                            FROM faculty
                                    "; 

                                
                      $qr = mysqli_query($dbc, $q);

                     while($row = mysqli_fetch_array($qr)):?>
                     <tr>
                      <td><?php echo $row['FLNAME'];?></div></td>
                      <td><?php echo $row['FFNAME'];?></div></td>
                      <td><?php echo $row['DEPT'];?></div></td>
                      <td><?php echo $row['UNIT_CODE'];?></div></td>
                      <td>
                          <?php
                            echo "<a href='SadivFIF.php?id=".$row['id']."'>";
                          ?>
                      <button class="btn btn-primary btn-xs">View</button> </a>
                    </td>
                  </tr>
                
                 <?php endwhile; ?>   
                                    

	           </table>
        
    
        
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
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  

  <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../lib/jquery.scrollTo.min.js"></script>
  <script src="../../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../../lib/gritter-conf.js"></script>
    <script src="../../lib/advanced-form-components.js"></script>
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
<script>
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
</script>
    
    
    <script>
$("#saevent").addClass("active");
    </script>   
</body>

</html>
