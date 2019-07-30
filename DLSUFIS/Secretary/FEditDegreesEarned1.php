<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');

        $flag=0;   
    
    if(isset($_POST['submit'])){
        $message=NULL;
        
        if (!empty($_POST['specialization'])){
            $specialization = $_POST['specialization'];
            mysqli_query("UPDATE degree_earned
                             SET specialization = '$specialization' 
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['year_obtained'])){
            $year_obtained = $_POST['year_obtained'];
            mysqli_query("UPDATE degree_earned
                             SET year_obtained = '$year_obtained' 
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['institution_id'])){
            $institution_id = $_POST['institution_id'];
            mysqli_query("UPDATE degree_earned
                             SET institution_id = '$institution_id'
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['location_id'])){
            $location_id = $_POST['location_id'];
            mysqli_query("UPDATE degree_earned
                             SET location_id = '$location_id'
                           WHERE de_id = $id"); 
        }
        
        if (!empty($_POST['so_num'])){
            $so_num = $_POST['so_num'];
            mysqli_query("UPDATE degree_earned
                             SET so_num = '$so_num'
                           WHERE de_id = $id"); 
        }
        
        $degLevel = $_POST['degree_level'];
        mysqli_query("UPDATE degree_earned
                        SET dlevel_id = '$degLevel'
                      WHERE dlevel_id = $id");
        
        $degEarned = $_POST['degreeEarned'];
        mysqli_query("UPDATE degree_earned
                        SET degree_id = '$degEarned'
                      WHERE de_id = $id");
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
      <a href="facultydashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
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
    <!-- *********************************************************************** MAIN SIDEBAR MENU******************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <h2 class="centered" ><a href="facultymanageaccount.php"></h2>

          <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>          
            <h5 class="centered">Faculty Mode</h5>


          <li class="mt">
            <a class="" href="facultydashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="FIF.php">
              <i class="fa fa-cogs"></i>
              <span>Faculty Information Form</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="FacultyTasksList.php">
              <i class="fa fa-tasks"></i>
              <span>Task Lists</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="FDocumentUpload.php">
              <i class="fa fa-upload"></i>
              <span>Documents Upload</span>
              </a>
          </li>
          <li class="mt">
            <a class="" href="Fworkload.php">
              <i class="fa fa-upload"></i>
              <span>Faculty WorkLoad</span>
              </a>
          </li>

            <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Profile and Experience</span>
              </a>
            <ul class="sub">
              <li class="active"><a href="FDegreesEarned.php">Degrees Earned</a></li>
               <li><a class="" href="FDegreeBeingPursued.php">Degree being pursued</a></li>
              <li><a class="" href="FSpecialTraining.php">Special Training</a></li>
              <!-- (e.g. post-doctoral work, post-baccalaureate diploma, post-baccalaureate certificate, etc.) -->

              <li><a class="" href="FTeachingExperience.php">Teaching Experience and Length of Service</a></li>
              <li><a class="" href="FProfessionalExperience.php">Professional Experience</a></li>
              <li><a class="" href="FProfessionalPractice.php">Professional Practice Outside
              <!--  Professional Practice, Industrial Practice, or Employment outside DLSU other than teaching
-->         </a></li>

            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-group"></i>
              <span>Professional Activities 1</span>
              </a>
            <ul class="sub">
              <li><a href="FleadershipInProfOrg.php">Leadership in professional orgs</a></li>
               <li><a class="" href="FMembershipInProfOrg.php">Membership in Professional orgs</a></li>
              <li><a class="" href="FOutstandingAchievement.php">Outstanding Achievement/Awards</a></li>
              <!--  Outstanding Achievements/Awards/Recognition Received since 2005 -->
         </a></li>

            </ul>
          </li>

            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-group"></i>
              <span>Professional Activities 2</span>
              </a>
            <ul class="sub">
            <!-- since 2005 -->
              <li><a class="" href="FJournalPublication.php">Journal Publication</a></li>
              <li><a class="" href="FPrototype.php">Prototype</a></li>
              <li><a class="" href="Patents.php">Patents</a></li>
              <li><a class="" href="FBooksAndTextbooks.php">Books and Textbooks</a></li>
              <li><a class="" href="FPublishedPapers.php">Papers Published in conference proceedings</a></li>
              <li><a class="" href="FPublishedShortStories.php">Published Short stories and etc.</a></li>
              <!--  Published short stories, novel, poetry, play, screenplay, creative work (since 2005)-->

              <li><a class="" href="FPlayScreenplay.php">Play, screenplay, film & etc.</a></li>
              <li><a class="" href="FOtherResearchOutputs.php">Other research outputs</a></li>
              <li><a class="" href="FConferencesAttended.php">Conferences, workshops, and etc. attended</a></li>
              <!--
               Play, screenplay, film, creative work performed or presented (since 2005)
               Other research outputs (working papers; research reports; conference papers/posters, etc) since 2005
               Conferences, workshops, seminars, and training programs attended (since 2005)
              -->
            </ul>
          </li>


            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Community service</span>
              </a>
            <ul class="sub">
              <li><a href="FCSinDLSU.php">In DLSU</a></li>
              <!-- (Department, Unit, College, University) Activities (since 2005) -->
              <li><a href="FCSinProfOrg.php">In Professional Organization</a></li>
              <!--  In Professional Organizations (Local and International) since 2005 -->
               <li><a class="" href="FCSinGovOrgsAndAgencies.php">With Government Organizations and Agencies</a></li>
               <!-- With Government Organizations and Agencies (since 2005) x -->
                <li><a class="" href="FCSinOthers.php">Others</a></li>
                <!-- Others (e.g. NGOs, advocacy groups, neighborhood associations, local communities, Rotary, Lions, church, faith, and community) since 2005 -->

            </ul>
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
        <h3>
          <i class="fa fa-angle-right"></i> Edit Degree Earned   
          </a>
        </h3>
        <div class="row mt">
          <div class="col-lg-12">



          <?php

            require_once('../mysql_connect.php');

     

            $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

            $ttr = mysqli_query($dbc, $tt);

            $fid = mysqli_fetch_array($ttr);

            $fidd= $fid['fid'];

            $q ="SELECT de.de_id as id, dl.dlevel_title as dlevel_title, CONCAT (dl.dlevel_desc, ' ', d.degree_title) as degree_title, de.specialization as specialization, de.year_obtained, de.institution_id, de.location_id, de.so_num  
                                    FROM degree_level dl, degree d, degree_earned de
                                    WHERE de.de_id = ".$_GET['id']."
                                    AND dl.dlevel_id = de.dlevel_id
                                    AND de.degree_id = d.degree_id"; 

                                                  

            $results=mysqli_query($dbc,$q);

                        while ($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){
                                $specialization = $row["specialization"];
                                $year_obtained = $row["year_obtained"];
                                $institution_id = $row["institution_id"];
                                $location_id = $row["location_id"];
                                $so_num = $row["so_num"];

                         }
            ?>

          <div class="form-panel">
            <form class="form-horizontal style-form" method="get">


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Level</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="degree_level" name="degree_level">
                        <?php
                          $query1="select   * 
                                  from degree_level  
                                    limit 9;";
                          $result1=mysqli_query($dbc,$query1);

                          while($row2=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row2['DLEVEL_ID']}>{$row2['DLEVEL_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Earned</label>
                  <div class="col-sm-10">
                      <select class="form-control" id="degreeEarned" name="degreeEarned">
                        <?php
                          $query="select   * 
                                  from degree  
                                    limit 7;";
                          $result=mysqli_query($dbc,$query);

                          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row['DEGREE_ID']}>{$row['DEGREE_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Area of Specialization</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $specialization; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Year Obtained</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $year_obtained;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Educational Institution</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $institution_id;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Location</label>
                  <div class="col-sm-10"> 
                    <input type="text" class="form-control" placeholder="<?php  echo $location_id;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">S.O. Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="<?php  echo $so_num;?>">
                  </div>
                </div>

                *Note: Foreign universities are exempt from S.O. Number.
                <br>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <input class="btn btn-theme" type="submit" name="submit" value="Save Changes">
                    <a href="FDegreesEarned.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>

                </form>
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

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
