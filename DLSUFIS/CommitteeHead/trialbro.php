<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
     
       
?>

<style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          width: 80%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
          -webkit-animation-name: animatetop;
          -webkit-animation-duration: 0.4s;
          animation-name: animatetop;
          animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }

        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
          color: white;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }

        .modal-header {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        </style>


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

</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="sadashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">DLSU Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../login.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h2 class="centered" ><a href="facultymanageaccount.php"></h2>

     
            <h5 class="centered">Committee Head Mode</h5>
          <li class="mt">
            <a class="" href="CHdashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="CHViewDocuments.php">
              <i class="fa fa-dashboard"></i>
              <span>View Documents</span>
              </a>
          </li>

          <li class="mt">
            <a class="active" href="CHTasks.php">
              <i class="fa fa-dashboard"></i>
              <span>Delegate Tasks</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="CHCalendar.php">
              <i class="fa fa-dashboard"></i>
              <span>Calendar</span>
              </a>
          </li>



          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

            <!-- Trigger/Open The Modal -->

            <?php


            $flag=0;

            if(isset($_POST['submit']))
            {

              $message = NULL;       
              if (empty($_POST['taskdescription']))
              {
                  $taskdescription = FALSE;
                  $message.='<p>You forgot to enter your task!';
              }
              else
                  $taskdescription = $_POST['taskdescription'];


              if (empty($_POST['yolo']))
              {
                  $yolo = FALSE;
                  $message.='<p>You forgot to select who you want to assign your task to!';
              }
              else
                  $yolo = $_POST['yolo'];


              if (empty($_POST['taskpriority']))
              {
                  $taskpriority = FALSE;
                  $message.='<p>You forgot to select your task priority!';
              }
              else
                  $taskpriority = $_POST['taskpriority'];
              

              if (empty($_POST['duedate']))
              {
                  $duedate = FALSE;
                  $message.='<p>You forgot to select your task due date!';
              }
              else
                  $duedate = $_POST['duedate'];
              

              if (empty($_POST['tasktype']))
              {
                  $tasktype = FALSE;
                  $message.='<p>You forgot to select your task type!';
              }
              else
                  $tasktype = $_POST['tasktype'];

              $status = 3; 
              $assigner = 3 ; 
              $date = date('Y-m-d');


            if(!isset($message))
            {
              $insert ="INSERT INTO task 
                        (taskdescription, statusid, faculty_FID, priorityID, duedate, dateassigned, datecompleted, tasktypeID, assignerID)
                        VALUES 
                        ('$taskdescription', '$status','$yolo', '$taskpriority', '$duedate', '$date', NULL, '$tasktype', '$assigner')";


              $result = mysqli_query($dbc, $insert);

              $message ="<div class='alert alert-success'> <b> Task:  {$taskdescription} Successfully added!</b></div>";

              $flag = 1; 
            }
          }
          if (isset($message))
          echo '<font color="red">'.$message.'</font>';

            ?>
           
        
        <body>

        <h2> TASKS </h2>

        <!-- Trigger/Open The Modal -->
        <button type="button" id="myBtn" class="btn btn-theme03"> Create New Task</button>


        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Create New Task</h2>
            </div>
       
            <div class="modal-body">
              <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                    <div class="form">
                      <form class="cmxform form-horizontal style-form" method="post" action="">
                        <div class="form-group ">
                          <label class="control-label col-lg-2">Task Description</label>
                          <div class="col-lg-10">
                            <input class=" form-control" type="text" name="taskdescription" value="<?php if (isset($_POST['taskdescription']) && !$flag) echo $_POST['taskdescription']; ?>"/>
                          </div>
                        </div>

                        <!-- yeeeet section -->
                        
                          <div class="form-group ">
                          <label class="control-label col-md-2"> Assigned to : </label>
                            <div class="col-lg-3">
                            <select class="form-control" id="yolo" name="yolo">
                            <option> ------Please select a person --------</option>
                            <?php 
                            $query1 = "SELECT fid, flname, ffname 
                                      FROM FACULTY;";
                            $result1=mysqli_query($dbc,$query1);

                            while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row1['fid']}>{$row1['flname']}, {$row1['ffname']}</option>";
                          }

                            ?>
                            </select>
                            </div>

                          <label class="control-label col-md-2"> Priority </label>
                            <div class="col-lg-3">
                            <select class="form-control" name="taskpriority">
                            <option> ------Please select a priority --------</option>
                            <?php 

                            $query2 ="SELECT *
                                            FROM taskpriority";
                            $result2 = mysqli_query ($dbc,$query2);

                            

                            while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                            {
                              echo "<option value={$row2['id']}>{$row2['priority'] }</option>";
                            

                            }

                            ?>
                          
                            </select>
                            </div>
                          </div>
                        

                        <div class="form-group">
                        <label class="control-label col-md-2">Due Date</label>
                        <div class="col-md-3 col-xs-11">
                          <input class="form-control form-control-inline input-medium" size="16" type="date" name="duedate" value="<?php if (isset($_POST['duedate']) && !$flag) echo $_POST['duedate']; ?>">
                          <span class="help-block">Select date</span>
                        </div>
                      </div>

                    <div class="form-group">  
                    <label class="control-label col-md-2"> Task Type </label>
                            <div class="col-lg-2">
                            <select class="form-control" style="width: 50px" name="tasktype">
                            <option> ------Please select a task type --------</option>
                            <?php 

                            $query3 ="SELECT *
                                            FROM tasktype";
                            $result3 = mysqli_query ($dbc,$query3);

                            while ($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                            {
                              echo "<option value={$row3['id']}>{$row3['type'] }</option>";
                            }
                            ?>
                            </select> 
                            </div>
                            </div>

                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" name="submit" type="submit">Add</button>
                          </div>
                        </div>


                      </form>
                    </div>
                  </div>
                  <!-- /form-panel -->
                </div>
          <!-- /col-lg-12 -->
        </div>
            </div>

          </div>

        </div>


        <div class="row mt">
          <div class="col-lg-12">

          <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Task</th>
                    <th class="hidden-phone"><i class=""></i>Status</th>
                    <th class="hidden-phone"><i class=""></i>Assigned to : </th>
                    <th class="hidden-phone"><i class=""></i>Priority</th>
                    <th class="hidden-phone"><i class=""></i> Due Date </th>
                    <th class="hidden-phone"><i class=""></i>Date Assigned</th>
                    <th class="hidden-phone"><i class=""></i>Date Completed</th>
                    <th class="hidden-phone"><i class=""></i>Task Type</th>
                    <th class="hidden-phone"><i class=""></i>Assigner</th>
                    </tr>
                </thead>
                <tbody>

                <?php 

                $jonas = "SELECT 
                          t.taskID, t.taskdescription, s.active, f.flname, tp.priority, 
                          t.duedate, 
                          t.dateassigned, t.datecompleted, tt.type, getFacultyName(t.assignerID) as assignerName
                           FROM task t, status s, faculty f, taskpriority tp,tasktype tt
                           WHERE t.statusid= s.id
                           AND t.faculty_FID = f.fid
                           AND t.priorityid =tp.id
                           AND t.tasktypeID =tt.id ;";

                $brothers = mysqli_query($dbc, $jonas);

                while($row=mysqli_fetch_array($brothers)):?>
                <tr>
                  <td><?php echo $row['taskdescription'];?></div></td>
                  <td><?php echo $row['active'];?></div></td>
                  <td><?php echo $row['flname'];?></div></td>
                  <td><?php echo $row['priority'];?></div></td>
                  <td><?php echo $row['duedate'];?></div></td>
                  <td><?php echo $row['dateassigned'];?></div></td>
                  <td><?php echo $row['datecompleted'];?></div></td>
                  <td><?php echo $row['type'];?></div></td>
                  <td><?php echo $row['flname'];?></div></td>
                </tr>

                <?php endwhile; ?>  
                </tbody>

                </table>
                </div>
                </div>
                </div>


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
    <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
      <script src="../../lib/advanced-form-components.js"></script>



  <script type="application/javascript">
    var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");

    checkboxes.click(function() {
        submitButt.attr("disabled", !checkboxes.is(":checked"));
    });
      
      
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
</body>

</html>
