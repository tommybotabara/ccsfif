<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
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
4
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
            <a class="" href="Fworkload.php">
              <i class="fa fa-book"></i>
              <span>Faculty WorkLoad</span>
              </a>
          </li>

          <li class="mt">
            <a class="" href="FacultyTasksList.php">
              <i class="fa fa-tasks"></i>
              <span>Task Lists</span>
              </a>
          </li>

            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Profile and Experience</span>
              </a>
            <ul class="sub">
              <li><a href="FDegreesEarned.php">Degrees Earned</a></li>
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
            <a class="active" href="javascript:;">
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
              <li class="active"><a  href="FConferencesAttended.php">Conferences, workshops, and etc. attended</a></li>
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

       <?php

      $tt ="SELECT fid 
            FROM faculty 
            WHERE username = '{$_SESSION['username']}' ";

      $ttr = mysqli_query($dbc, $tt);

      $fid = mysqli_fetch_array($ttr);

      $fidd= $fid['fid'];


      $flag = 0;

      if (isset($_POST['submit']))
      {


         //choice1
       if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="error no file";
            echo "hi";
        }
        else{
          echo "hello";
          $target1 ="uploads/".basename($_FILES['file']['name']);
          $choice1pic = addslashes(file_get_contents($_FILES['file']['tmp_name']));
          $file_uploaded = $_FILES['file']['name'];

           if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                  $msg = "{$file_uploaded} uploaded<br>";
           }
           else{
                  $msg = "Failed to upload image<br>";
           }
        }


          $message = NULL;

       
          if (empty($_POST['seminar_title']))
          {
              $seminar_title = "";
          }
          else
              $seminar_title = $_POST['seminar_title'];

          if (empty($_POST['venue_performance']))
          {
              $venue_performance = "";
          }
          else
              $venue_performance = $_POST['venue_performance'];



          if (empty($_POST['start_date']))
          {
              $start_date = "";
          }
          else
              $start_date = $_POST['start_date'];

          if (empty($_POST['end_date']))
          {
              $loend_datecal = "";
          }
          else
              $end_date = $_POST['end_date'];



           if (empty($_POST['publication_type']))
          {
              $local = "";
          }
          else
              $local = $_POST['publication_type'];


          if(!isset($message))
          {




             $query10="select FFNAME, FLNAME 
                       from faculty 
                       where username = '{$_SESSION['username']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);

              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$seminar_title."_".$start_date."_"."ConferenceAttended";
              echo "$combineName";








            $date_modified =date("M d, Y");

          $file_parts=pathinfo($target1);
          $file_size=File_Size(filesize($target1));
          $file_type = $file_parts["extension"];
          $date_modified=date("M d, Y",filemtime($target1));

          $query="INSERT INTO document       (file_name,
                                              file_size,
                                              file_type,
                                              date_modified,
                                              file_uploaded,
                                              isArchived)

                                            VALUES ('{$combineName}',
                                                    '{$file_size}',
                                                    '{$file_type}',
                                                    '{$date_modified}',
                                                    '{$file_uploaded}',
                                                    0)";
          $result=mysqli_query($dbc,$query);

          $message="{$choice1pic} added!<br>";



          //get the last insterted document ID
          $lastValueQuery = "SELECT *
                             FROM   document
                             ORDER BY ID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);
          while($row = mysqli_fetch_array($lastValueResult)){
              $documentID =$row[0];
          }
            
              $query = "INSERT INTO publication
                             (pub_type, 
                              fid, 
                              seminar_title, 
                              venue_performance, 
                              start_date, 
                              end_date, 
                              local,
                              documentID)

                             VALUES 
                            ('PT011', 
                             '$fidd', 
                             '$seminar_title', 
                             '$venue_performance', 
                             '$start_date', 
                             '$end_date', 
                             '$local',
                            '$documentID')";

              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b>  Your Conference Attended has been Successfully added!</b></div>";
              $flag = 1;
          }    
          
      }

          if (isset($message))
    echo '<font color="red">'.$message.'</font>';
 
  
?>

        <h3>
          Add New Conferences, workshops, seminars, and training programs attended 
        </h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Conferences, Workshops <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="seminar_title" value="<?php if (isset($_POST['seminar_title']) && !$flag) echo $_POST['seminar_title']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Venue <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="venue_performance" value="<?php if (isset($_POST['venue_performance']) && !$flag) echo $_POST['venue_performance']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Start Date <font color="red">*</font></label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="start_date" value="<?php if (isset($_POST['start_date']) && !$flag) echo $_POST['start_date']; ?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">End Date <font color="red">*</font></label>
                  <div class="col-md-3 col-xs-11">
                   <input class="form-control form-control-inline input-medium" size="16" type="date" name="end_date" value="<?php if (isset($_POST['end_date']) && !$flag) echo $_POST['end_date']; ?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type <font color="red">*</font></label>
                  <div class="col-sm-10">
                      <select class="form-control" id="publication_type" name="publication_type">
                        <?php
                          $query3="select   * 
                                  from pub_local 
                                    ;";
                          $result3=mysqli_query($dbc,$query3);

                          while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row3['id']}>{$row3['local_type']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>


                <div class="form-group">

                  <label class="col-sm-2 col-sm-2 control-label">Evidence <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="file" name="file"/>
                  </div>
                </div> 
            

               
                
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" name="submit" type="submit" onclick="return confirm('Are you sure?')">Add New</button>
                    <a href="FConferencesAttended.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>
              </form>

            </div>
          
          </div>
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
  <script src="../../lib/zabuto_calendar.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../../lib/advanced-form-components.js"></script>

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
$("#7").addClass("active");
$("#7i").addClass("active");
    </script>
</body>

</html>
