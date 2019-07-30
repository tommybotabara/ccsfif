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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
      <a href="QaoDashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
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
                    <div class="desc">Dashio Admin Panel</div>
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
          <h5 class="centered"></h5>
          
          <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>
          <h5 class="centered">QAO Mode</h5>



          <li class="mt">
            <a  href="QaoDashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>


          <li class="sub-menu">
            <a  class="" href="QaoFacultySummaryEvidence.php">
              <i class="fa fa-desktop"></i>
              <span>View Faculty Evidence</span>
              </a>
          </li>
          </li>

          <li class="sub-menu">
          <a href="QaoApproval.php">
            <i class="fa fa-check-circle-o"></i>
              <span>Approval</span>
              </a>
          </li>
          
          <li class="sub-menu">
          <a class="active" href="FacultyEvaluation.php">
            <i class="fa fa-check-circle-o"></i>
              <span>Faculty Evaluation</span>
              </a>
          </li>
            
        <li class="sub-menu">
          <a href="instructionEvaluation.php">
            <i class="fa fa-check-circle-o"></i>
              <span>Instruction Evaluation</span>
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
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <H1><center> FACULTY EVALUATION FORM</center></H1>
              

          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview"> Overview</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#a">
                      A</a>
                  </li>
                  <li><a data-toggle="tab" href="#b">B</a></li>
                  <li><a data-toggle="tab" href="#c">C</a></li>
                  <li><a data-toggle="tab" href="#d">D</a></li>
                  <li><a data-toggle="tab" href="#e">E</a></li>
                  <li><a data-toggle="tab" href="#f">F</a></li>
                  <li><a data-toggle="tab" href="#g">G</a></li>
                  <li><a data-toggle="tab" href="#h">H</a></li>
                  <li><a data-toggle="tab" href="#i">I</a></li>
                  <li><a data-toggle="tab" href="#j">J</a></li>
                  <li><a data-toggle="tab" href="#k">K</a></li>
                    
                    
                </ul>
              </div>
                
                
              
                <div class="panel-body">
                <div class="tab-content">
                <!-- /panel-heading -->
              
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-12">
                          <h2 class="centered"><font color="black">CONTENTS </font></h2>
                          <p class="centered"> <font color="black">A. Academic Qualifications</font></p>
                          <p class="centered"> <font color="black">B.	Educational and Professional Experience and Length of Service</font></p>
                          <p class="centered"> <font color="black">C.	Selection of Faculty Members</font></p>
                          <p class="centered"> <font color="black">D.	Ranking and Promotion</font></p>
                          <p class="centered"> <font color="black">E.	Teaching Assignments</font></p>
                          <p class="centered"> <font color="black">F.	Research</font></p>
                          <p class="centered"> <font color="black">G.	Community Service</font></p>
                          <p class="centered"> <font color="black">H.	Performance Evaluation</font></p>
                          <p class="centered"> <font color="black">I.	Faculty Development</font></p>
                          <p class="centered"> <font color="black">J.	Faculty Relationships</font></p>
                          <p class="centered"> <font color="black">K.	Salaries and Fringe Benefits</font></p>
                          
               
                <div class="row mt">
                  <div class="col-lg-12">
                  <div class="form-panel">                  
                    <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Name of Institution</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="institution" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="location" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Program(s) under survey</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="programsunderesurvey" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Program(s) under survey</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="programsunderesurvey" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Analysis Made By: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="analysisby" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Evaluation Made By:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="programsunderesurvey" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Date Completed</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="programsunderesurvey" value="">
                  </div>
                </div>
            
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" name="submit" type="submit">Submit</button>
                  </div>
                </div>
                </form>
                </div>
              </div>
            </div>
                          
                        </div>
                      </div>
                    </div>


                  <!-- /tab-pane -->
                  <div id="a" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>A. ACADEMIC QUALIFICATIONS </strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                      
                </div>
                    
                <!-- /tab-pane -->
                  <div id="b" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>B. EDUCATIONAL AND PROFESSIONAL EXPERIENCE AND LENGTH OF SERVICE</strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>

                </div>
                <!-- /tab-pane -->
                <div id="c" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>C. SELECTION OF FACULTY MEMBERS</strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>

                </div>
                <!-- /tab-pane -->
    
            <div id="d" class="tab-pane">
                <h2><center><font><strong>D. RANKING AND PROMOTION</strong></font></center></h2>
                <div class="row mt">
                      <div class="col-md-12">
                          <div class="form-panel">
                              <H4><pull-right><font color="black"><i class="fa fa-angle-right"></i>ANALYSIS</font></pull-right></H4>
                              <hr>

                            <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                              <div class="col-sm-10">
                                  <p> 1.	Describe the ranking system used by the college (Attach a copy or indicate where this can be found). Specify the criteria for ranking and associated points for promotion. </p>
                                  
                                    <textarea rows="5" cols="15" class="form-control"></textarea>
                              </div>
                                
                                
                            </div>                            

                            <br>
                            <div class="form-group">
                              <div class="col-sm-10">
                                  <p>2.	Describe the promotion system and the frequency of the promotion process (Attach a copy or indicate where this can be found). </p>
                                    <textarea rows="5" cols="20" class="form-control"></textarea>
                              </div>
                                
                                
                            </div>  
                           
                            <p><font color="black"> 3. The criteria for ranking and promotion include the following:</font></p>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>a. industry certification and trainings</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3a value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3a value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3a value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3a value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3a value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>b.	teaching competency</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3b value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3b value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3b value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3b value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3b value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>c.	research and publications</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3c value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3c value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3c value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3c value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3c value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>d.	special services to the college and/or department</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3d value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3d value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3d value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3d value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3d value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>e.	further educational attainment</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3e value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3e value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3e value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3e value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3e value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>f.	community involvement</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3f value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3f value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3f value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3f value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3f value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>h.	practice of profession</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3h value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3h value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3h value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3h value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3h value="option5"> O
                                    </label>
                                    </div>
                                </div>
                                  
                                 <div class="form-group">
                                  <div class="col-sm-10">
                                    <p>i.	student evaluation of faculty</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3i value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3i value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d3i value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d3i value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d3i value="option5"> O
                                    </label>
                                    </div>
                                </div>
                           
 
                            <div class="form-group">
                              <div class="col-sm-10">
                            <P>4.	The following participate in the determination of ranks and promotions: (check) </P>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" value="">
                                  a.	the dean
                                  </label>
                                <label>
                                  <input type="checkbox" value="">
                                  b.	the chairperson of the department
                                  </label>
                                <label>
                                  <input type="checkbox" value="">
                                  c.	other faculty members
                                  </label>
                                <label>
                                  <input type="checkbox" value="">
                                  d.	others : 
                                    <input type="text">
                                  </label>
                              </div>
                            </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-10">
                                <p> 5. The length of the probationary period is adequate.</p>
                                  <div class="col-sm-10">
                                    <p>i.	student evaluation of faculty</p>
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d5 value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d5 value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d5 value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d5 value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d5 value="option5"> O
                                    </label>
                                    </div>
                            </div>
                            </div>
                                
                            <div class="form-group">
                              <div class="col-sm-10">
                                <p> 6.Describe the procedures for termination of employment.</p>
                                  <div class="col-sm-10">
                                    
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d6 value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d6 value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d6 value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d6 value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d6 value="option5"> O
                                    </label>
                                    </div>
                            </div>
                            </div>
                                
                            <div class="form-group">
                              <div class="col-sm-10">
                                <p>7.	Describe the procedures for resignation from employment.</p>
                                  <div class="col-sm-10">
                                    
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d7 value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d7 value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d7 value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d7 value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d7 value="option5"> O
                                    </label>
                                    </div>
                            </div>
                            </div>    
                            
                                <div class="form-group">
                              <div class="col-sm-10">
                                <p>8.	Describe the procedure followed in the dismissal of a faculty member, including due process. </p>
                                  <div class="col-sm-10">
                                    
                                    <label class="checkbox-inline"> 

                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d7 value="option1"> E
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d7 value="option2"> S
                                </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox3" class="radio" name=d7 value="option3"> L
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" class="radio" name=d7 value="option4"> M
                                    </label>
                                  <label class="checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox2" class="radio" name=d7 value="option5"> O
                                    </label>
                                    </div>
                            </div>
                            </div>  
                          
                            <H4><pull-right>EVALUATION</pull-right></H4>
                 

                            <p>On the basis of the above analysis of D. Ranking and Promotion, rate the following:</p>
                            
                            <div class="form-group">
                              <div class="col-sm-10">
                            <p>a. Ranking System</p>
                            <label class="checkbox-inline"> 
                                
                                <input type="checkbox" id="inlineCheckbox1" class="radio" name=rs value="option1"> 1
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" class="radio" name=rs value="option2"> 2
                            </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" class="radio" name=rs value="option3"> 3
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" class="radio" name=rs value="option1"> 4
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" class="radio" name=rs value="option2"> 5
                                </label>
                                </div>
                                </div>
                            
                        
                            <div class="form-group">
                              <div class="col-sm-10">
                            <p>b. Procedure for promotion</p>
                            <label class="checkbox-inline"> 
                                
                                <input type="checkbox" id="inlineCheckbox1" class="radio" name=pfp value="option1"> 1
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" class="radio" name=pfp value="option2"> 2
                            </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" class="radio" name=pfp value="option3"> 3
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" class="radio" name=pfp value="option4"> 4
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" class="radio" name=pfp value="option5"> 5
                                </label> 
                            
                                </div>
                                </div>
                                
                            
                            <div class="form-group">
                              <div class="col-sm-10">
                            <p>c. Resignation Procedure</p>
                            <label class="checkbox-inline"> 
                                
                                <input type="checkbox" id="inlineCheckbox1" class="radio" name=rp value="option1"> 1
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" class="radio" name=rp value="option2"> 2
                            </label>
                              <label class="checkbox-inline">
                                <input type="checkbox"  id="inlineCheckbox3" class="radio" name=rp value="option3"> 3
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox"  id="inlineCheckbox1" class="radio" name=rp value="option1"> 4
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox"  id="inlineCheckbox2" class="radio" name=rp value="option2"> 5
                                </label> 
                                  
                                </div>
                                </div>
                            
                            
                    
                            
                            
                            <div class="form-group">
                              <div class="col-sm-10">
                            <p>d.	Dismissal/Termination procedure</p>
                        
            
                            <label class="checkbox-inline"> 
                                
                                <input type="checkbox" class="check" id="inlineCheckbox1" value="option1"> 1
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" class="check" id="inlineCheckbox2" value="option2"> 2
                            </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" class="check" id="inlineCheckbox3" value="option3"> 3
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" class="check" id="inlineCheckbox1" value="option1"> 4
                                </label>
                              <label class="checkbox-inline">
                                <input type="checkbox" class="check" id="inlineCheckbox2" value="option2"> 5
                                </label> 
                            
                                </div>
                                </div>
                            
                            <div class="form-group">
                              <div class="col-sm-10">
                            <label class="col-lg-2 control-label">Comments</label>
                            <div class="col-lg-10">
                            <textarea rows="10" cols="30" class="form-control"></textarea>
                            </div>
                                </div>
                                </div>

                              
                    
                              </form>
                          </div>
                      <!-- /col-md-6 -->
                    </div>
                    </div>
                              
                              
                
                <!-- /tab-pane -->
                <div id="e" class="tab-pane">
                <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>E. TEACHING ASSIGNMENTS</strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                </div>
                <!-- /tab-pane -->
                <div id="d" class="tab-pane">
                <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>F. RESEARCH</strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                </div>
                <!-- /tab-pane -->
                <div id="d" class="tab-pane">
                <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                            <h2><center><font><strong>G. COMMUNITY SERVICE</strong></font></center></h2>
                      <hr/>

    
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                </div>
                <!-- /tab-pane -->


                </div>
                <!-- /tab-content -->
                    
            
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->

    
         
            
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
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
$(document).ready(function(){
    $('.check').click(function() {
        $('.check').not(this).prop('checked', false);
    });
});
</script>
<script>
    
    $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>


</body>

</html>
