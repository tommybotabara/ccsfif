<!DOCTYPE html>
<html lang="en">


<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0005") {
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
            <a href="Fworkload.php">
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
              <li><a class="active" href="FDegreesEarned.php">Degrees Earned</a></li>
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

          if (empty($_POST['paper_title']))
          {
              $paper_title = "";
              $message.='<p>You forgot to select the  Title !';
          }
          else
              $paper_title = $_POST['paper_title'];


          if (empty($_POST['journal']))
          {
              $journal = "";
          }
          else
              $journal = $_POST['journal'];

          if (empty($_POST['date_publication']))
          {
              $date_publication = "";
          }
          else
              $date_publication = $_POST['date_publication'];

          if (empty($_POST['volume_no']))
          {
              $volume_no = "";
          }
          else
              $volume_no = $_POST['volume_no'];

          if (empty($_POST['issue_no']))
          {
              $issue_no = "";
          }
          else
              $issue_no = $_POST['issue_no'];

          if (empty($_POST['pages']))
          {
              $pages = "";
          }
          else
              $pages = $_POST['pages'];

          if (empty($_POST['isbn']))
          {
              $publication_type = "";
          }
          else
              $publication_type = $_POST['isbn'];

          if (empty($_POST['publication_type']))
          {
              $local = "";
          }
          else
              $local = $_POST['publication_type'];



           if (empty($_POST['co_author']))
          {
              $co_author = "";
          }
          else
              $co_author = $_POST['co_author'];
          
          $fidd = $_POST['faculty'];


          if(!isset($message))
          {

             $query10="select FFNAME, FLNAME 
                       from faculty 
                       where fid = '{$_POST['faculty']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);

              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$paper_title."_".$date_publication."_"."JournalPublication";
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
                                paper_title, 
                                journal, 
                                date_publication, 
                                volume_no, 
                                issue_no, 
                                pages, 
                                publication_type, 
                                local, 
                                co_author,
                                documentID)
                        VALUES 
                       ('PT001', 
                        '$fidd', 
                        '$paper_title', 
                        '$journal', 
                        '$date_publication', 
                        '$volume_no', 
                        '$issue_no', 
                        '$pages', 
                        '$publication_type', 
                        '$local', 
                        '$co_author',
                        '$documentID')";

              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b>  Your Journal Publication has been Successfully added!</b></div>";
              $flag = 1;

            
          }    
          
      }

          if (isset($message))
    echo '<font color="red">'.$message.'</font>';
 
  
?>

        <h2> Add New Journal Publication </h2>
        <div class="row mt">
          <div class="col-lg-12">
             <div class="form-panel">
              <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                
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
                  <label class="col-sm-2 col-sm-2 control-label">Title <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="paper_title" value="<?php if (isset($_POST['paper_title']) && !$flag) echo $_POST['paper_title']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Journal Name <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="journal" value="<?php if (isset($_POST['journal']) && !$flag) echo $_POST['journal']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Publication Date <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="date_publication" value="<?php if (isset($_POST['date_publication']) && !$flag) echo $_POST['date_publication']; ?>">
                    <span class="help-block">Select date</span>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Volume Number <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="volume_no" value="<?php if (isset($_POST['volume_no']) && !$flag) echo $_POST['volume_no']; ?>">
                  </div>
                </div><div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Issue Number <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="issue_no" value="<?php if (isset($_POST['issue_no']) && !$flag) echo $_POST['issue_no']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pages <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pages" value="<?php if (isset($_POST['pages']) && !$flag) echo $_POST['pages']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ISI/ISBN</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="isbn" value="<?php if (isset($_POST['isbn']) && !$flag) echo $_POST['isbn']; ?>">
                        <?php
                          $query3="select   journalpub_id, journalpub_type 
                                  from journal_publication 
                                    ;";
                          $result3=mysqli_query($dbc,$query3);

                          while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row3['journalpub_id']}>{$row3['journalpub_type']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>
                

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type</label>
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
                  <label class="col-sm-2 col-sm-2 control-label">Co-author </label>
                  <div class="col-sm-10">
                    <select class="form-control" id="co_author" name="co_author">
                        <?php
                          $query3="select   id, author_val 
                                  from co_author 
                                    ;";
                          $result3=mysqli_query($dbc,$query3);

                          while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row3['id']}>{$row3['author_val']}</option>";
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
                    <a href="FJournalPublication.php"><button class="btn btn-theme04" type="button">Back</button></a>
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
</body>

</html>
