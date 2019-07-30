<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0005") 
		{
			header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
		if (isset($_POST['Submit']))
		{ //choice1
       if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="error no file";
           
        }
        else{
        

          $target1 ="uploads/".basename($_FILES['file']['name']);
          $choice1pic = addslashes(file_get_contents($_FILES['file']['tmp_name']));
          $file_uploaded = $_FILES['file']['name'];

           if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                 
           }
           else{
                  $msg = "Failed to upload image<br>";
           }
        }	


        







			$message = null;
			$tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";
			$ttr = mysqli_query($dbc, $tt);
			$fid = mysqli_fetch_array($ttr);
            $fidd= $fid['fid'];
			
			$qct ="SELECT count(classid) as count FROM ccsfif.class;";
			$qtr = mysqli_query($dbc, $qct);
			$ctrr = mysqli_fetch_array($qtr);
            $ctr= $ctrr['count'];
			$ctr = $ctr + 1;
			
			if (empty($_POST['num']))
			{
				$_POST['num']=FALSE;
				$message.='<p>Please enter the section count';
			} 
			
			if(!isset($message))
			{





             $query10="select FFNAME, FLNAME 
                       from faculty 
                       where fid = '{$_POST['faculty']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);



              $query11="select coursename 
                       from course 
                       where courseid = '{$_POST['coursechoose']}'";
              $check11 = mysqli_query($dbc,$query11);
              $row11 = mysqli_fetch_assoc($check11);



              $query12="select schoolyearstart
                       from schoolyear 
                       where syid = '{$_POST['sychoose']}'";
              $check12 = mysqli_query($dbc,$query12);
              $row12 = mysqli_fetch_assoc($check12);

              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$row11['coursename']."_".$row12['schoolyearstart']."_"."Workload";
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
                                              isArchived,
                                              apid)

                                            VALUES ('{$combineName}',
                                                    '{$file_size}',
                                                    '{$file_type}',
                                                    '{$date_modified}',
                                                    '{$file_uploaded}',
                                                    0,
                                                    1)";
          $result=mysqli_query($dbc,$query);

     



          //get the last insterted document ID
          $lastValueQuery = "SELECT *
                             FROM   document
                             ORDER BY ID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);
          while($row = mysqli_fetch_array($lastValueResult)){
              $documentID =$row[0];
          }



				$query="insert into class (
                    classid,
                    fid,
                    courseid,
                    termid,
                    schoolyear,
                    number,
                    documentID) 


              values ('{$ctr}',
                      '{$_POST["faculty"]}',
                      '{$_POST["coursechoose"]}',
                      '{$_POST["termchoose"]}',
                      '{$_POST["sychoose"]}',
                      '{$_POST["num"]}',
                      '$documentID')";
				$result=mysqli_query($dbc,$query);
				$success = "New Workload/activity added.";
			}					
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
         
                
             <?php
              $nickjonas ="SELECT fid 
                        FROM faculty 
                        WHERE username = '{$_SESSION['username']}'";

                  $nickjonashart = mysqli_query($dbc, $nickjonas);

                  $fid = mysqli_fetch_array($nickjonashart);

                  $fidd= $fid['fid'];
                  ?>


          </ul>
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
          <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>
          <h5 class="centered">Secretary Account</h5>


          <li class="mt">
            <a href="secretarydashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

         
          <li class="mt">
            <a class="active"  href="Fworkload.php">
              <i class="fa fa-book"></i>
              <span>Faculty WorkLoad</span>
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
   
          <h2> <center>Add Academic Workload</center> </h2>  
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <div class="form-horizontal style-form">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <?php
					if(isset($message))
					{
						echo '<font color="red">'.$message. '</font>';
					}
					if(isset($success))
					{
						echo '<font color="green">'.$success. '</font>';
					}
				?>
                <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Faculty <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="faculty" name="faculty">
						<?php
						$query="SELECT fid, FLName, FFName, FMName FROM ccsfif.faculty WHERE POSITION_ID='P0003' || POSITION_ID='P0004' ORDER BY FLName";
						$result=mysqli_query($dbc,$query);

						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
						  echo "<option value={$row['fid']}>".$row['FLName'].", ".$row['FFName']." ".$row['FMName']."</option>";
						}
						?>
						</select>
					</div>
				</div>
                    
                <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Course Name <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="coursechoose" name="coursechoose">
						<?php
						$query="SELECT courseid, coursename, units, hours, coursecode FROM ccsfif.course";
						$result=mysqli_query($dbc,$query);

						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
						  echo "<option value={$row['courseid']}>".$row['coursecode']."-".$row['coursename']."</option>";
						}
						?>
						</select>
					</div>
				</div>
                    
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Number of Sections (per week) <font color="red">*</font> </label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" name="num">
                  </div>
                </div> 
                    
                    
                <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">School Year <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="sychoose" name="sychoose">
						<?php
						$query="SELECT * FROM ccsfif.schoolyear;";
						$result=mysqli_query($dbc,$query);

						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
						  echo "<option value={$row['syid']}>".$row['schoolyearstart']."-".$row['schoolyearend']."</option>";
						}
						?>
						</select>
					</div>
				</div>
                    
                    <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Term <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="termchoose" name="termchoose">
						<?php
						$query1="SELECT * FROM ccsfif.term;";
						$result1=mysqli_query($dbc,$query1);

						while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
						{
						  echo "<option value={$row1['termid']}>".$row1['term']."</option>";
						}
						?>
						</select>
					</div>
                        </div>
					<?php 
						if(isset($_POST['Go']))
						{
							$termchoose = $_POST['termchoose'];
							$sychoose = $_POST['sychoose'];
						}
					
					?>

          <div class="form-group">

                  <label class="col-sm-2 col-sm-2 control-label">Evidence <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="file" name="file"/>
                  </div>
                </div>
                    
                    
						
					<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
					<button class="btn btn-theme" name="Submit" type="Submit" value="Submit" onclick="return confirm('Are you sure?')">Add </button>
					</div>
                    </div>
                    </form>
                  
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
    
			  
			  
		
			
			  
              
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
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
