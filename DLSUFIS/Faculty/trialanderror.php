<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
if (isset($_GET['check_task']))
  {

    $date = date('Y-m-d');


     $id = $_GET['check_task'];


     $yes = "UPDATE task 
                SET statusid = 4 , datecompleted = $date
                WHERE taskid =".$id;


      mysqli_query($dbc, $yes);

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
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/to-do.css">
</head>

<body>
  <section id="container">
    <!-- ***********************************************  TOP BAR CONTENT & NOTIFICATIONS********************************************************** -->
    <!--header start-->
      <?php
      require_once("sidetopbar.php");
      ?>
    <!--sidebar end-->
    <!-- ****************************************************************** MAIN CONTENT ********************************************************** -->
    <!--main content start-->
      <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-check-square-o"></i> Pending To Do Lists</h3>
        <!-- practice -->
          <div class="row mt">
          <div class="col-md-12">
            <section class="task-panel tasks-widget">
             
              <div class="panel-body">
                <div class="task-content">
                  <ul class="task-list">
                  <div class="form">
                      <?php

                      

                  $nickjonas ="SELECT fid 
                        FROM faculty 
                        WHERE username = '{$_SESSION['username']}'";

                  $nickjonashart = mysqli_query($dbc, $nickjonas);

                  $fid = mysqli_fetch_array($nickjonashart);

                  $fidd= $fid['fid'];

                  $jonas = "SELECT 
                                  t.taskdescription,
                                  t.taskid,
                                  s.active,
                                  t.duedate,
                                  tp.Priority,
                                  t.dateassigned,
                                  t.datecompleted,
                                  tt.type
                              FROM
                                  task t,
                                  status s,
                                  faculty f,
                                  taskpriority tp,
                                  tasktype tt
                              WHERE
                                  FACULTY_FID = $fidd
                                      AND t.statusid = s.id
                                      AND t.faculty_FID = f.fid
                                      AND t.priorityid = tp.id
                                      AND t.tasktypeID = tt.id
                                      AND t.statusid = 3;";

                  $brothers = mysqli_query($dbc, $jonas);

                  while($row = mysqli_fetch_array($brothers)):?> 


                
                    <li>
                    <!--
                      <div class="task-checkbox">
                        <a href="todo.php?check_task=<?php echo $row['taskid'] ?>"><input type="checkbox" class="list-child" value="<?php echo $row['taskid']?>" name=checkbox/></a>
                      </div>
                      -->
                      
                      <div class="task-title">
                        <span class="task-title-sp"><?php echo $row['taskdescription'];?></span>
                        <span class="badge bg-success"><?php echo $row['duedate'];?></span>
                        <span class="badge bg-important"><?php echo $row['Priority'];?></span>

                        <div class="pull-right">
                          <button type="button" class="btn btn-round btn-primary">View Details</button>
                          

                          <?php
                            echo "<a href='trialanderror.php?check_task=".$row['taskid']."'>";
                          
                          ?>
                          <button class="btn btn-success btn-xs" name="check"><i class="fa fa-check"></i></button> </a>
                        </div>


                      </div>


                    </li>
                      <?php endwhile; ?>  

                      </form>
                      </div>
                  </ul>
                </div>
                <div class=" add-task-row">
                  <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">See All Tasks</a>
                </div>
              </div>
              </form>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>


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
  <script src="../../lib/zabuto_calendar.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../../lib/advanced-form-components.js"></script>

  <!--script for this page-->
  <script src="../../http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="../../lib/tasks.js" type="text/javascript"></script>
  <script>
    jQuery(document).ready(function() {
      TaskList.initTaskWidget();
    });

    $(function() {
      $("#sortable").sortable();
      $("#sortable").disableSelection();
    });
  </script>

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
</body>

</html>
