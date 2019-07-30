 <!DOCTYPE html>
<html lang="en">



<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0001") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
  if (isset($_GET['check_task']))
  {

     $id = $_GET['check_task'];
     $date = date('Y-m-d');

     $yes = "UPDATE task 
                SET statusid = 4 , datecompleted = now()
                WHERE taskid =".$id;

      mysqli_query($dbc, $yes);

  }
    $flag=0;
    

       
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
        <a><i class="fa fa-angle-right"></i> Pending Evidence for Approval   
          </a>
        </h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <div class="form">
                
                <thead>
                  <tr>
                    <th> Faculty </th>
                    <th><i class="fa fa-bullhorn"></i> Task</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Priority  </th>
                    <th><i class="fa fa-bookmark"></i> Date Completed by Faculty </th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php
                $nickjonas ="SELECT fid 
                    FROM faculty 
                    WHERE username = '{$_SESSION['username']}'";

                  $nickjonashart = mysqli_query($dbc, $nickjonas);

                  $fid = mysqli_fetch_array($nickjonashart);

                  $fidd= $fid['fid'];

                  $jonas = "SELECT 
                                  t.taskdescription,
                                  t.tasktitle, 
                                  t.taskid,
                                  s.active,
                                  t.duedate,
                                  tp.Priority,
                                  t.dateassigned,
                                  t.datecompleted,
                                  tt.type,
                                  f.ffname,
                                  f.flname
                              FROM
                                  task t,
                                  status s,
                                  faculty f,
                                  taskpriority tp,
                                  tasktype tt
                              WHERE
                                    t.statusid = s.id
                                      AND t.faculty_FID = f.fid
                                      AND t.priorityid = tp.id
                                      AND t.tasktypeID = tt.id
                                      AND t.statusid = 6;";
                                                            
                $brothers = mysqli_query($dbc, $jonas);

                  while($row = mysqli_fetch_array($brothers)):
                    ?>

                  <tr>
                    <td> <?php echo $row['ffname'];echo $row['flname']; ?></td>  
                    <td>
                      <?php echo $row['tasktitle'];?>
                    </td>
                    <td><span class="label label-success label-mini">
                        <?php echo $row['Priority'];?></span>
                    </td> 
                    <td>
                      <?php echo $row['datecompleted'];?>
                    </td>
                      <?php $taskidforreject =  $row['taskid']; ?>
                    <td>
                      
                        <?php
                        
                            echo "<a href='QaoApproval.php?check_task=".$row['taskid']."'>";
                        ?> 
                        <button class="btn btn-success btn-xs" name="check"><i class="fa fa-check"></i></button> </a>
                    <?php
                        
                            echo "<a href='QaoApprovalDetails.php?taskid=".$row['taskid']."'>";
                        ?> 
                    <button class="btn btn-primary btn-xs">View</button></a>
                <?php
                        
                            echo "<a href='QaoRejectApproval.php?rejecttaskid=".$row['taskid']."'>";
                        ?>
                  <button type="button" class="btn btn-danger btn-xs" name="reject">reject</button> </a>
                    </td>
                  </tr>

                    <?php endwhile;?>
                </tbody>
            </div>
              </table>

            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
          
        
    
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
$("#4").addClass("active");

</script>
</body>

</html>
