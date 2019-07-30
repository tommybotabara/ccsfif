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
      require_once("CHsidetopbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <!-- /row -->
          </div>

          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Tab 1</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Tab 2</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Tab 3</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#tabfour">Tab 4</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-12">
                      <?php

                    $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];

                    $_SESSION['fid'] = $_GET['id'];


                    
                  $q="SELECT f.fid as id,f.flname, f.ffname, f.fmname, f.unit_code ,u.unit_title, f.dept, d.dept_name, p.position_title, r.rank_title, p.position_id, f.account_id, a.account_role, a.read_only, a.access_type 
                            FROM faculty f, unit u, department d, rank r, position p, account a 
                            WHERE f.fid = {$_GET['id']}
                            AND f.unit_code = u.unit_code 
                            AND f.dept = d.dept_code 
                            AND f.rank = r.rank_code
                            AND f.position_id = p.position_id
                            AND f.account_id = a.account_id"; 

                                              
                                        $qr = mysqli_query($dbc, $q);
                                        $yo =mysqli_fetch_array($qr);

                                        $firstname= $yo['ffname'];
                                        $Lastname= $yo['flname'];
                                        $middlename=$yo['fmname'];
                                        $department=$yo['dept_name'];
                                        $rank=$yo['rank_title'];
                                        $unit=$yo['unit_title'];
                                        $unit_code=$yo['unit_code'];
                                        $position = $yo['position_title'];
                                        
                                        ?>                 
                
      
                        <div class="detailed mt">
                       <h3 align="center"><font color="#009900">FACULTY INFORMATION</font></h3>
                      <hr/>
                      <font color="#009900"><strong>FACULTY INFORMATION</strong></font>
                      <hr/>
                      <p></p>
                      <table>
                      <tr>
                      <td><strong>Faculty ID Number</strong></td><td class="facultyInfo" data-column-name="id"></td>
                      <td><?php echo  $fidd;?></div></td>
                      </tr>
                      <tr>
                      <td><strong>NAME</strong></td><td class="facultyInfo" data-column-name="name"></td>
                      <td><?php echo $firstname; echo " "; echo $middlename;echo " "; echo $Lastname ?></td>
                      </tr>
                      <tr>
                      <td><strong>College/School/Unit</strong></td><td class="facultyInfo" data-column-name="college"></td>
                      <td><?php echo $unit_code; echo " "; echo $unit; ?></td>
                      </tr>
                      <tr>
                      <td><strong>Department/Office</strong></td><td class="facultyInfo" data-column-name="dept_name"></td>
                      <td><?php echo $department; ?></td>
                      </tr>
                      <tr>
                      <td><strong>Faculty Classification</strong>  </td><td class="facultyInfo" data-column-name="position_title"></td>
                      <td><?php  echo " "; echo $position; ?></td>

                      </tr>
                      <tr>
                      <td><strong>Rank</strong></td><td class="facultyInfo" data-column-name="rank_title"></td>
                      <td><?php echo $rank; ?></td>

                      </tr>
                      <tr>
                      <td><strong>Date Submitted</strong></td><td></td>
                      </tr>
                      </table>
                      <p></p>
                      <hr/>


                      <font color="#009900"><strong>ACADEMIC BACKGROUND</strong></font>
                      <hr/>
                      <p></p>
                      <table class="table" id="facDegreeEraned">

                      <thead>
                        <tr id="facDegreeEarnedData">
                          <th class="degreeLvl" data-column-name="dlevel_title">Degree(s) Earned</th>
                          <th class="degreeTitle" data-column-name="degree_title">Title of Degree</th>
                          <th class="areaSpec" data-column-name="specialization">Area of Specialization</th>
                          <th class="yearObtained" data-column-name="year_obtained">Year Obtained</th>
                          <th class="instName" data-column-name="institution_id">Educational Institution</th>
                          <th class="locName" data-column-name="location_id">Location (City, Country)</th>
                          <th class="soNum" data-column-name="so_num">S.O. Number</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facDegreeEarnedRow">
                      <?php

                      $a="SELECT de.de_id as id, 
                                 dl.dlevel_title, CONCAT (dl.dlevel_desc,
                                  ' ', 
                                 d.degree_title) as degree_title, 
                                 de.specialization, 
                                 de.year_obtained, 
                                 de.institution_id, 
                                 de.location_id, 
                                 de.so_num,
                                 doc.file_name,
                                 doc.file_uploaded 

                            FROM degree_level dl, 
                                 degree d, 
                                 degree_earned de,
                                 document doc

                          WHERE fid = {$_GET['id']}
                          AND de.documentID = doc.ID
                          AND dl.dlevel_id = de.dlevel_id
                          AND de.degree_id = d.degree_id"; 

                      $ar = mysqli_query($dbc, $a);

                     while($row = mysqli_fetch_array($ar)):?>
                     <tr>
                     <td><?php echo $row['dlevel_title'];?></div></td>
                      <td><?php echo $row['degree_title'];?></div></td>
                      <td><?php echo $row['specialization'];?></div></td>
                      <td><?php echo $row['year_obtained'];?></div></td>
                      <td><?php echo $row['institution_id'];?></div></td>
                      <td><?php echo $row['location_id'];?></div></td>
                      <td><?php echo $row['so_num'];?></div></td>
                      <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                      
                  </tr>
                
                 <?php endwhile; ?>   
                      </tbody>
                      </table>


                      <p>
                      <font color="#000099"><strong>Note:</strong> Foreign universities are exempt from S.O. Number. <br />
                      For Philippines Universities the S.O. Number is indicated in the T.O.R. Some are EXEMPTED (e.g. UP). </font></p>
                      <br>
                      <p>IF <strong>PURSUING GRADUATE STUDIES,</strong> please fill up the following table:</p>

                      <table class="table" id="facPursueDegree">
                      <thead>
                        <tr id="facPursueDegreeData">
                          <th class="degreeTitle" data-column-name="degree_title">Degree being pursued</th>
                          <th class="instName" data-column-name="institution_id">University</th>
                          <th class="degreeStages" data-column-name="ds_name">Stage of Graduate Studies</th>
                          <th class="unitsEarned" data-column-name="earned_units">No. of units completed</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                        <th class="endDate" data-column-name="end_date">End Date</th>
                        <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facDegreePursueRow">
                      <?php

                      $a="SELECT dp.dp_id as id, 
                                 CONCAT(dl.dlevel_desc,
                                 ' ',
                                 d.degree_title) as degree_title, 
                                 dp.institution_id, 
                                 ds.ds_name, 
                                 dp.earned_units, 
                                 dp.start_date, 
                                 dp.end_date,
                                 doc.file_name,
                                 doc.file_uploaded 


                          FROM degree_pursue dp, 
                               degree d, 
                               degree_level dl, 
                               degree_stages ds,
                               document doc  

                          WHERE dp.fid = {$_GET['id']}
                          AND dp.documentID = doc.ID
                          AND dp.degree_id = d.degree_id 
                          AND dp.dlevel_id = dl.dlevel_id
                          AND dp.degree_stages = ds.ds_code"; 

                      $ar = mysqli_query($dbc, $a);

                     while($row = mysqli_fetch_array($ar)):?>
                     <tr>
                     <td><?php echo $row['degree_title'];?></div></td>
                      <td><?php echo $row['institution_id'];?></div></td>
                      <td><?php echo $row['ds_name'];?></div></td>
                      <td><?php echo $row['earned_units'];?></div></td>
                      <td><?php echo $row['start_date'];?></div></td>
                      <td><?php echo $row['end_date'];?></div></td>
                      <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                      
                  </tr>
                
                 <?php endwhile; ?>  
                      </tbody>
                      </table>
                      <br>
                      <p><strong>SPECIAL TRAINING (e.g. post-doctoral work, post-baccalaureate diploma, post-baccalaureate certificate, etc.)</strong></p>
                      <table class="table" id="facSpecialTraining">
                      <thead>
                        <tr id="facSpecialTrainingData">
                          <th class="trainingTitle" data-column-name="training_title">Training Title</th>
                          <th class="instName" data-column-name="institution">Organization / Institution<br />Offering the Training</th>
                          <th class="trainingVenue" data-column-name="venue">Venue (City, Country)</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                          <th class="endDate" data-column-name="end_date">End Date</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facSpecialTrainingRow">
                      <?php

                      $c="SELECT st.training_title, 
                                 st.institution, 
                                 st.venue, 
                                 st.start_date, 
                                 st.end_date,
                                 doc.file_name,
                                 doc.file_uploaded   

                                      FROM special_training st,
                                           document doc

                                      WHERE fid={$_GET['id']}
                                      AND st.documentID = doc.ID";

                      $cr = mysqli_query($dbc, $c);

                     while($row = mysqli_fetch_array($cr)):?>
                     <tr>
                     <td><?php echo $row['training_title'];?></div></td>
                      <td><?php echo $row['institution'];?></div></td>
                      <td><?php echo $row['venue'];?></div></td>
                      <td><?php echo $row['start_date'];?></div></td>
                      <td><?php echo $row['end_date'];?></div></td>
                      <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                      </tr>
                
                      <?php endwhile; ?>

                      </tbody>
                      </table>

                      <br>
                      <p></p>
                      <hr/>

                      <font color="#009900"><strong>EDUCATIONAL AND PROFESSIONAL EXPERIENCE</strong></font>
                      <hr/>
                      <p><strong>1. Teaching Experience and Length of Service</strong></p>
                      <table class="table" id="facTeachingExperience">
                      <thead>
                        <tr id="facTeachingExperienceDLSUData">
                          <th class="educLevel" data-column-name="el_title"><strong>Level</strong></th>
                          <th class="noOfYears" data-column-name="no_years"><strong>No. of years</strong></th>
                          <th class="instName" data-column-name="institution_id"><strong>Name of school</strong></th>
                        <th class="startDate" data-column-name="start_date"><strong>Start Date</strong></th>
                          <th class="endDate" data-column-name="end_date"><strong>End Date</strong></th>
                          <th class="positionTitle" data-column-name="position_title"><strong>Position</strong></th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>

                        </tr>
                      </thead>
                      <tbody id="facTeachingExperienceRow">
                      <?php

                      $c="SELECT te.te_id AS id, el.el_title, te.institution_id, te.start_date, te.end_date, te.no_years, p.position_title
                              FROM teaching_experience te, educ_level el, position p  
                              WHERE te.fid = {$_GET['id']}
                              AND te.institution_id = 'De La Salle University' 
                              AND el.el_id = te.el_id
                              AND te.position_id = p.position_id
                          UNION
                                SELECT te.te_id AS id, el.el_title, te.institution_id, te.start_date, te.end_date, te.no_years, p.position_title
                                                FROM teaching_experience te, educ_level el, position p  
                              WHERE te.fid = {$_GET['id']}
                              AND te.institution_id != 'De La Salle University' 
                              AND el.el_id = te.el_id
                              AND te.position_id = p.position_id ";

                      $cr = mysqli_query($dbc, $c);

                     while($row = mysqli_fetch_array($cr)):?>
                     <tr>
                     <td><?php echo $row['el_title'];?></div></td>
                     <td><?php echo $row['no_years'];?></div></td>
                      <td><?php echo $row['institution_id'];?></div></td>
                      <td><?php echo $row['start_date'];?></div></td>
                      <td><?php echo $row['end_date'];?></div></td>
                      <td><?php echo $row['position_title'];?></div></td>


                      </tr>
                
                      <?php endwhile; ?>

                      </tbody>
                      </table>
                      <br>
                      <p><strong>2. Professional Experience</strong></p>
                      <table class="table" id="facProfessionalExperience">
                      <thead>
                        <tr id="facProfessionalExperienceData">
                          <th class="yearPassed" data-column-name="year_passed">Year Passed</th>
                          <th class="licensureName" data-column-name="licensure_title">Licensure Examination Passed <br/>(i.e. Government and other Professional Examinations)</th>
                          <th class="licenseNo" data-column-name="license_no">License Number</th>
                          <th class="dateValidity" data-column-name="date_validity">Valid Until</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facProfessionalExperienceRow">
                      <?php

                      $c="SELECT pe_id AS id, year_passed, licensure_title, license_no, date_validity
                                      FROM professional_exp   
                                       WHERE fid = {$_GET['id']}";

                      $cr = mysqli_query($dbc, $c);

                     while($row = mysqli_fetch_array($cr)):?>
                     <tr>
                     <td><?php echo $row['year_passed'];?></div></td>
                     <td><?php echo $row['licensure_title'];?></div></td>
                      <td><?php echo $row['license_no'];?></div></td>
                      <td><?php echo $row['date_validity'];?></div></td>
                      </tr>
                
                      <?php endwhile; ?>
                      </tbody>
                      </table>
                      <p><strong>3. Professional Practice, Industrial Practice, or Employment outside DLSU other than teaching <br /> (including consultancy or self-employment)</strong></p>
                      <table class="table" id="facIndustryExperience">
                      <thead>
                        <tr id="facIndustryExperienceData">
                          <th class="workDesc" data-column-name="work_nature">Nature of Practice/Project</th>
                          <th class="instName" data-column-name="institution">Organization/Institution</th>
                          <th class="noOfYears" data-column-name="no_years">No. of Years</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                          <th class="endDate" data-column-name="end_date">End Date</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facIndustryExperienceRow">
                      <?php

                      $c="SELECT pp_id AS id, work_nature, institution, no_years, start_date, end_date
                            FROM professional_prac  
                           WHERE fid = {$_GET['id']}";

                      $cr = mysqli_query($dbc, $c);

                     while($row = mysqli_fetch_array($cr)):?>
                     <tr>
                     <td><?php echo $row['work_nature'];?></div></td>
                     <td><?php echo $row['institution'];?></div></td>
                      <td><?php echo $row['no_years'];?></div></td>
                      <td><?php echo $row['start_date'];?></div></td>
                      <td><?php echo $row['end_date'];?></div></td>
                      </tr>
                
                      <?php endwhile; ?>
                      </tbody>
                      </table>
                        </div>
                        <!-- /detailed -->
                      </div>
                
                    </div>
                    <!-- /OVERVIEW -->
                  </div>

              

       <!----------------- /TAB-PANE-2 -------------------->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                          <font color="#009900"><strong>PROFESSIONAL ACTIVITIES</strong></font>
                        <hr/>
                        <p></p>
                        <p><strong>1. Leadership in Professional Organization </strong></p>
                        <table class="table" id="facLeadershipProfOrg">
                        <thead>
                           <tr id="facLeadershipProfOrgData">
                             <th class="desigRole" data-column-name="designation">Designation / Role</th>
                             <th class="orgName" data-column-name="org_name">Professional Organization</th>
                             <th class="startDate" data-column-name="start_date">Start Date</th>
                           <th class="endDate" data-column-name="end_date">End Date</th>
                           <th class="soNum" data-column-name="so_num">Evidence</th>
                           </tr>
                        </thead>
                        <tbody id="facLeadershipProfOrgRow">
                        <?php

                          $c="SELECT pa.pa_id AS id, 
                                     pa.designation, 
                                     pa.org_name, 
                                     pa.start_date, 
                                     pa.end_date,
                                     doc.file_name,
                                     doc.file_uploaded 

                                FROM professional_acty pa,
                                     document doc

                               WHERE fid = {$_GET['id']} 
                               AND pa.documentID = doc.ID
                               AND leader_type='1'";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['designation'];?></div></td>
                         <td><?php echo $row['org_name'];?></div></td>
                          <td><?php echo $row['start_date'];?></div></td>
                          <td><?php echo $row['end_date'];?></div></td>
                           <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>
                        </tbody>
                        </table>
                        <p><strong>2. Membership in Professional Organization</strong></p>
                        <table class="table" id="facMembershipProfOrg">
                        <thead>
                          <tr id="facMembershipProfOrgData">
                            <th class="desigRole" data-column-name="designation">Designation / Role</th>
                            <th class="orgName" data-column-name="org_name">Professional Organization</th>
                            <th class="startDate" data-column-name="start_date">Start Date</th>
                          <th class="endDate" data-column-name="end_date">End Date</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                          </tr>
                        </thead>
                        <tbody id="facMembershipProfOrgRow">
                          <?php

                          $c="SELECT pa.pa_id AS id, 
                                     pa.designation, 
                                     pa.org_name, 
                                     pa.start_date,
                                     pa.end_date,
                                     doc.file_name,
                                     doc.file_uploaded 

                                FROM professional_acty pa,
                                     document doc 

                                WHERE fid = {$_GET['id']}
                                AND pa.documentID = doc.ID 
                                AND leader_type = '0'";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['designation'];?></div></td>
                         <td><?php echo $row['org_name'];?></div></td>
                          <td><?php echo $row['start_date'];?></div></td>
                          <td><?php echo $row['end_date'];?></div></td>
                           <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>
                        </tbody>
                        </table>
                        <p><strong>3. Outstanding Achievements / Awards / Recognition Received (since 2005) </strong></p>
                        <table class="table" id="facAwards">
                        <thead>
                           <tr id="facAwardsData">
                             <th class="awardName" data-column-name="award_title">Outstanding Achievements / Awards / Recognition</th>
                             <th class="awardingBody" data-column-name="award_body">Awarding Body</th>
                             <th class="awardDate" data-column-name="award_date">Date</th>
                             <th class="soNum" data-column-name="so_num">Evidence</th>
                           </tr>
                        </thead>
                        <tbody id="facAwarsRow"> 
                        <?php

                          $c="SELECT a.award_id AS id, 
                                     a.award_title, 
                                     a.award_body, 
                                     a.award_date,
                                     doc.file_name,
                                     doc.file_uploaded 

                                FROM awards a,
                                     document doc 
                               WHERE fid = {$_GET['id']}
                               AND a.documentID = doc.ID 

                            ORDER BY award_date DESC";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['award_title'];?></div></td>
                         <td><?php echo $row['award_body'];?></div></td>
                          <td><?php echo $row['award_date'];?></div></td>
                           <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>

                        </tbody>

                        </table>
                        <p><strong>4. Internally Funded Research projects/activities (since 2005) </strong></p>
                        <table class="table" id="facInternalResearch">
                        <thead>
                           <tr id="facInternalResearchData">
                             <th class="researchTitle" data-column-name="research_title">Research Projects/Activities</th>
                             <th class="fundingUnit" data-column-name="funding_unit">Funding Agency/Unit <br />(as applicable)</th>
                             <th class="researchAmt" data-column-name="amount">Amount of Research Grant (Php)</th>
                             <th class="startDate" data-column-name="year_start">Start Date</th>
                           <th class="endDate" data-column-name="year_end">End Date</th>
                           <th class="soNum" data-column-name="so_num">Evidence</th>
                           </tr>
                        </thead>
                        <tbody id="facInternalResearchRow"> 
                        <?php 

                          $c="SELECT research_id AS id, research_title, funding_unit, amount, start_date, end_date 
                                FROM research_internal
                                WHERE fid = {$_GET['id']} 
                            ORDER BY start_date DESC";

                          $cr = mysqli_query($dbc, $c);

                          

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['research_title'];?></div></td>
                         <td><?php echo $row['funding_unit'];?></div></td>
                          <td><?php echo $row['amount'];?></div></td>
                          <td><?php echo $row['year_start'];?></div></td>
                          <td><?php echo $row['year_end'];?></div></td>

                          </tr>


                
                      <?php endwhile; ?>
                        </tbody>   
                        </table>
                        <p><strong>5. Externally Funded Research projects/activities (since 2005) </strong></p>
                        <table class="table" id="facExternalResearch">
                        <thead>
                          <tr id="facExternalResearchData">
                            <th class="researchTitle" data-column-name="research_title">Research Projects/Activities</th>
                            <th class="fundingAgency" data-column-name="fagency">Funding Agency</th>
                            <th class="moneyCurrency" data-column-name="currency_name">Currency</th>
                            <th class="researchAmt" data-column-name="amount">Amount of Research Grant</th>
                            <th class="startDate" data-column-name="year_start">Start Date</th>
                          <th class="endDate" data-column-name="year_end">End Date</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                          </tr>
                        </thead>  
                        <tbody id="facExternalResearchRow"> 
                        <?php 

                          $d="SELECT re.research_id AS id, re.research_title, re.fagency, c.currency_name, re.amount, re.start_date, re.end_date 
                                FROM research_external re, currency c
                               WHERE fid = {$_GET['id']} 
                                AND research_type = 'External'";

                          $dr = mysqli_query($dbc, $d);

                         while($row = mysqli_fetch_array($dr)):?>
                         <tr>
                         <td><?php echo $row['research_title'];?></div></td>
                         <td><?php echo $row['fagency'];?></div></td>
                          <td><?php echo $row['currency_name'];?></div></td>
                          <td><?php echo $row['amount'];?></div></td>
                          <td><?php echo $row['start_date'];?></div></td>
                          <td><?php echo $row['end_date'];?></div></td>
                          </tr>
                
                      <?php endwhile; ?>
                        
                        </tbody>
                        </table>
                        <p><strong>6. Research grants, fellowships, scholarships received (since 2005) </strong></p>
                        <table class="table" id="facResearchGrants">
                        <thead>
                           <tr id="facResearchGrantsData">
                            <th class="researchTitle" data-column-name="research_title">Research Projects/Activities</th>
                            <th class="fundingAgency" data-column-name="fagency">Funding Agency</th>
                            <th class="startDate" data-column-name="year_start">Start Date</th>
                          <th class="endDate" data-column-name="year_end">End Date</th>
                          <th class="soNum" data-column-name="so_num">Evidence</th>
                           </tr>
                        </thead>   
                        <tbody id="facResearchGrantsRow"> 
                        <?php 

                          $c="SELECT research_id AS id, research_title, fagency, start_date, end_date 
                                FROM research_external 
                                WHERE fid = {$_GET['id']} 
                                   AND research_type = 'Grants'
                                  ORDER BY start_date DESC";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['research_title'];?></div></td>
                         <td><?php echo $row['fagency'];?></div></td>
                          <td><?php echo $row['start_date'];?></div></td>
                          <td><?php echo $row['end_date'];?></div></td>
                          </tr>
                
                      <?php endwhile; ?>
                        


                        </tbody>
                        </table>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>


                  <!-- /tab-pane 3-->

                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-12 detailed">
                      <div class="col-md-12">
                       <font color="#009900"><strong>PROFESSIONAL ACTIVITIES</strong></font>
                          <hr/>
                          <p><strong>7. Journal Publication (since 2005)</strong></p>
                          <table class="table" id="facJournalPublication">
                          <thead>
                            <tr id="facJournalPublicationData">
                             <th class="authorName" data-column-name="flname">Author(s)</th>
                             <th class="paperTitle" data-column-name="paper_title">Title</th>
                             <th class="journalTitle" data-column-name="journal">Journal Name</th>
                             <th class="datePublished" data-column-name="date_publication">Date</th>
                             <th class="volumeNo" data-column-name="volume_no">Volume</th>
                             <th class="issueNo" data-column-name="issue_no">Issue Number</th>
                             <th class="noPages" data-column-name="pages">Pages</th>
                             <th class="journalType" data-column-name="journalpub_type">Type</th>
                             <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>  
                          <tbody id="facJournalPublicationRow">

                          <?php 

                                $c="SELECT p.pub_code AS id, 
                                           f.flname, 
                                           p.paper_title, 
                                           p.journal, 
                                           p.date_publication, 
                                           p.volume_no, 
                                           p.issue_no, 
                                           p.pages, 
                                           jp.journalpub_type, 
                                           pl.local_type,
                                            doc.file_name,
                                            doc.file_uploaded 

                                       FROM faculty f, 
                                            publication p, 
                                            journal_publication jp, 
                                            pub_local pl,
                                            document doc 

                                       WHERE p.fid = {$_GET['id']} 
                                       AND p.documentID = doc.ID
                                       AND pub_type='PT001' 
                                       AND p.fid = f.fid
                                       AND p.publication_type = jp.journalpub_id 
                                       AND p.local = pl.id
                                                       ORDER BY p.date_publication DESC";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['flname'];?></div></td>
                         <td><?php echo $row['paper_title'];?></div></td>
                          <td><?php echo $row['journal'];?></div></td>
                          <td><?php echo $row['date_publication'];?></div></td>
                          <td><?php echo $row['volume_no'];?></div></td>
                          <td><?php echo $row['issue_no'];?></div></td>
                          <td><?php echo $row['journalpub_type'];?></div></td>
                          <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>
                        


                          </tbody>
                          </table>
                          <p><strong>8. Prototypes (since 2005)</strong></p>
                          <table class="table" id="facPrototypes">
                          <thead>
                            <tr id="facPrototypesData">
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="paperTitle" data-column-name="paper_title">Title</th>
                              <th class="journalTitle" data-column-name="journal">Journal Name</th>
                              <th class="datePublished" data-column-name="date_publication">Date</th>
                              <th class="volumeNo" data-column-name="volume_no">Volume</th>
                              <th class="issueNo" data-column-name="issue_no">Issue Number</th>
                              <th class="noPages" data-column-name="pages">Pages</th>
                              <th class="issnNo" data-column-name="isbn">ISSN/ISBN</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facPrototypesRow">

                           <?php 

                                $c="SELECT p.pub_code AS id, 
                                          f.flname, 
                                          p.paper_title, 
                                          p.journal, 
                                          p.date_publication, 
                                          p.volume_no, 
                                          p.issue_no, 
                                          p.pages, 
                                          p.isbn,
                                            doc.file_name,
                                            doc.file_uploaded  

                                     FROM faculty f, 
                                          publication p, 
                                          publication_type pt,
                                          document doc

                                     WHERE p.fid = {$_GET['id']} 
                                     AND p.documentID = doc.ID
                                   AND f.fid = p.fid 
                                   AND p.pub_type = pt.pt_id
                                   AND p.pub_type = 'PT002'
                                   ORDER BY p.date_publication DESC";

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['flname'];?></div></td>
                         <td><?php echo $row['paper_title'];?></div></td>
                          <td><?php echo $row['journal'];?></div></td>
                          <td><?php echo $row['date_publication'];?></div></td>
                          <td><?php echo $row['volume_no'];?></div></td>
                          <td><?php echo $row['issue_no'];?></div></td>
                          <td><?php echo $row['pages'];?></div></td>
                          <td><?php echo $row['isbn'];?></div></td>
                          <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>
                            


                          </tbody>  
                          </table>
                          <p><strong>9. Patents (since 2005)</strong></p>
                          <table class="table" id="facPatents">
                          <thead>
                            <tr id="facPatentsData">
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="patentTitle" data-column-name="paper_title">Title</th>
                              <th class="datePublished" data-column-name="date_publication">Date</th>
                              <th class="issuingCountry" data-column-name="issuing_country">Issuing Country</th>
                              <th class="patentNo" data-column-name="patent_no">Patent Number</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facPatentsRow">
                            <?php 

                                $c="SELECT p.pub_code AS id, 
                                           f.flname, 
                                           p.paper_title, 
                                           p.date_publication, 
                                           c.country_name, 
                                           p.patent_no,
                                            doc.file_name,
                                            doc.file_uploaded 

                                      FROM faculty f, 
                                           publication p, 
                                           publication_type pt, 
                                           country c,
                                           document doc

                                    WHERE p.fid = {$_GET['id']} 
                                    AND p.documentID = doc.ID
                                  AND f.fid = p.fid 
                                  AND p.pub_type = pt.pt_id
                                  AND c.country_code = p.issuing_country
                                  AND p.pub_type = 'PT003'
                  ORDER BY p.date_publication DESC";

                  

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['flname'];?></div></td>
                         <td><?php echo $row['paper_title'];?></div></td>
                          <td><?php echo $row['date_publication'];?></div></td>
                          <td><?php echo $row['country_name'];?></div></td>
                          <td><?php echo $row['patent_no'];?></div></td>
                           <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>
                          </tr>
                
                      <?php endwhile; ?>

                          </tbody>
                          </table>
                          <p><strong>10. Books and Textbooks (since 2005)</strong></p>
                          <table class="table" id="facAuthoredBooks">
                          <thead>
                            <tr id="facAuthoredBooksData">
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="bookTitle" data-column-name="paper_title">Title</th>
                              <th class="publisherName" data-column-name="publisher">Publisher</th>
                              <th class="publicationPlace" data-column-name="place_publication">Place of Publication</th>
                              <th class="publicationDate" data-column-name="date_publication">Date of Publication</th>
                              <th class="isbnNo" data-column-name="isbn">ISBN</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facAuthoredBooksRow">
                            <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.paper_title, p.publisher, p.place_publication, p.date_publication, p.isbn 
                                      FROM faculty f, publication p, publication_type pt
                                      WHERE p.fid = {$_GET['id']} 
                                      AND f.fid = p.fid 
                                      AND p.pub_type = pt.pt_id
                                      AND p.pub_type='PT005'
                                      ORDER BY p.date_publication DESC";

                  

                          $cr = mysqli_query($dbc, $c);

                         while($row = mysqli_fetch_array($cr)):?>
                         <tr>
                         <td><?php echo $row['flname'];?></div></td>
                         <td><?php echo $row['paper_title'];?></div></td>
                          <td><?php echo $row['publisher'];?></div></td>
                          <td><?php echo $row['place_publication'];?></div></td>
                          <td><?php echo $row['date_publication'];?></div></td>
                          <td><?php echo $row['isbn'];?></div></td>
                          </tr>
                
                      <?php endwhile; ?>

                          </tbody>
                          </table>
                          <p><strong>11. Chapter in Edited Books (since 2005)</strong></p>
                          <table class="table" id="facChapterEditedBooks">
                          <thead>
                            <tr id="facChapterEditedBooksData">
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="workTitle" data-column-name="work_title">Title of Work</th>
                              <th class="paperTitle" data-column-name="paper_title">Title of Book</th>
                              <th class="bookEditor" data-column-name="editors">Editor(s)</th>
                              <th class="bookPublisher" data-column-name="publisher">Publisher</th>
                              <th class="publicationPlace" data-column-name="place_publication">Place of Publication</th>
                              <th class="publicationDate" data-column-name="date_publication">Date of Publication</th>
                              <th class="noPages" data-column-name="pages">Pages</th>
                              <th class="isbnNo" data-column-name="isbn">ISBN</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facChapterEditedBooksRow">
                            <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.work_title, p.paper_title, p.editors, p.publisher, p.place_publication, p.date_publication, p.pages, p.isbn 
                                     FROM faculty f, publication p, publication_type pt
                                     WHERE p.fid = {$_GET['id']} 
                                   AND f.fid = p.fid 
                                   AND p.pub_type = pt.pt_id
                                   AND p.pub_type='PT006'
                                   ORDER BY p.date_publication DESC";

                          

                                  $cr = mysqli_query($dbc, $c);

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['flname'];?></div></td>
                                 <td><?php echo $row['work_title'];?></div></td>
                                 <td><?php echo $row['paper_title'];?></div></td>
                                 <td><?php echo $row['editors'];?></div></td>
                                  <td><?php echo $row['publisher'];?></div></td>
                                  <td><?php echo $row['place_publication'];?></div></td>
                                  <td><?php echo $row['date_publication'];?></div></td>
                                  <td><?php echo $row['pages'];?></div></td>
                                  <td><?php echo $row['isbn'];?></div></td>
                                  </tr>
                        
                              <?php endwhile; ?>


                          </tbody>
                          </table>
                          <p><strong>12. Paper published in conference proceedings (since 2005)</strong></p>
                          <table class="table" id="facConfPaperContent">
                          <thead>
                            <tr id="facConfPaperContentData">
                             <th class="authorName" data-column-name="flname">Author(s)</th>
                             <th class="paperTitle" data-column-name="paper_title">Title of Paper</th>
                             <th class="conferenceTitle" data-column-name="conf_title">Title of Conference Proceedings</th>
                             <th class="publisherName" data-column-name="publisher">Publisher</th>
                             <th class="publicationPlace" data-column-name="place_publication">Place of Publication</th>
                             <th class="noPages" data-column-name="pages">Pages</th>
                             <th class="publicationDate" data-column-name="date_publication">Date</th>
                             <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facConfPaperContentRow"> 

                          <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.work_title, p.paper_title, p.editors, p.publisher, p.place_publication, p.date_publication, p.pages, p.isbn 
                                     FROM faculty f, publication p, publication_type pt
                                     WHERE p.fid = {$_GET['id']} 
                                   AND f.fid = p.fid 
                                   AND p.pub_type = pt.pt_id
                                   AND p.pub_type='PT006'
                                   ORDER BY p.date_publication DESC";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['flname'];?></div></td>
                                 <td><?php echo $row['work_title'];?></div></td>
                                 <td><?php echo $row['conf_title'];?></div></td>
                                  <td><?php echo $row['publisher'];?></div></td>
                                  <td><?php echo $row['place_publication'];?></div></td>
                                  
                                  <td><?php echo $row['pages'];?></div></td>
                                  <td><?php echo $row['date_publication'];?></div></td>
                                  </tr>
                        
                              <?php endwhile; ?>

                          </tbody>
                          </table>
                          <p><strong>13. Published short stories, novel, poetry, play, screenplay, creative work (since 2005)</strong></p>
                          <table class="table" id="facCreativeWorkContent">
                          <thead>
                             <tr id="facCreativeWorkContentData">
                               <th class="authorName" data-column-name="flname">Author(s)</th>
                               <th class="paperTitle" data-column-name="paper_title">Title</th>
                               <th class="publishedIn" data-column-name="published_in">Published In</th>
                               <th class="publisherName" data-column-name="publisher">Publisher</th>
                               <th class="publicationPlace" data-column-name="place_publication">Place of Publication</th>
                               <th class="noPages" data-column-name="pages">Pages</th>
                               <th class="publicationDate" data-column-name="date_publication">Date</th>
                               <th class="soNum" data-column-name="so_num">Evidence</th>
                             </tr>
                          </thead>
                          <tbody id="facCreativeWorkContentRow">
                             <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.paper_title, p.published_in, p.publisher, p.place_publication , p.pages, p.date_publication 
                                      FROM faculty f, publication p, publication_type pt
                                      WHERE p.fid = {$_GET['id']} 
                                  AND f.fid = p.fid
                                  AND p.pub_type = pt.pt_id
                                  AND p.pub_type='PT008'
                                  ORDER BY p.date_publication DESC";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['flname'];?></div></td>
                                 <td><?php echo $row['paper_title'];?></div></td>
                                 <td><?php echo $row['published_in'];?></div></td>
                                  <td><?php echo $row['publisher'];?></div></td>
                                  <td><?php echo $row['place_publication'];?></div></td>
                                  <td><?php echo $row['pages'];?></div></td>
                                  <td><?php echo $row['date_publication'];?></div></td>
                                  </tr>
                        
                              <?php endwhile; ?>


                          </tbody>
                          </table>
                          <p><strong>14. Play, screenplay, film, creative work performed or presented (since 2005)</strong></p>
                          <table class="table" id="facScreenPlayContent">
                          <thead>
                            <tr id="facScreenPlayContentData"> 
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="paperTitle" data-column-name="paper_title">Title</th>
                              <th class="venuePerform" data-column-name="venue_performance">Venue of Performance</th>
                              <th class="publicationDate" data-column-name="date_publication">Date</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facScreenPlayContentRow">

                          <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.paper_title, p.venue_performance, p.date_publication 
                                      FROM faculty f, publication p, publication_type pt
                                      WHERE p.fid = {$_GET['id']}
                                AND f.fid = p.fid 
                                AND p.pub_type = pt.pt_id
                                AND p.pub_type='PT009'
                                ORDER BY p.date_publication DESC ";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['flname'];?></div></td>
                                 <td><?php echo $row['paper_title'];?></div></td>
                                 <td><?php echo $row['venue_performance'];?></div></td>
                                  <td><?php echo $row['date_publication'];?></div></td>
                                  </tr>
                        
                              <?php endwhile; ?>



                          </tbody>
                          </table>
                          <p><strong>15. Other research outputs (working papers; research reports; conference papers/posters, etc) since 2005</strong></p>
                          <table class="table" id="facOtherResearchContent">
                          <thead>
                             <tr id="facOtherResearchContentData">
                              <th class="authorName" data-column-name="flname">Author(s)</th>
                              <th class="paperTitle" data-column-name="paper_title">Title</th>
                              <th class="paperType" data-column-name="paper_type">Type</th>
                              <th class="publicationDate" data-column-name="date_publication">Date</th>
                              <th class="researchRemarks" data-column-name="remarks">Remarks</th>
                              <th class="soNum" data-column-name="so_num">Evidence</th>
                             </tr>
                          </thead>
                          <tbody id="facOtherResearchContentRow">
                            
                            <?php 

                                $c="SELECT p.pub_code AS id, f.flname, p.paper_title, p.paper_type, p.date_publication, p.remarks 
                                      FROM faculty f, publication p, publication_type pt
                                     WHERE p.fid = {$_GET['id']} 
                                 AND f.fid = p.fid 
                                 AND p.pub_type = pt.pt_id
                                 AND p.pub_type='PT010'
                                 ORDER BY p.date_publication DESC ";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['flname'];?></div></td>
                                 <td><?php echo $row['paper_title'];?></div></td>
                                
                                  <td><?php echo $row['paper_type'];?></div></td>
                                  <td><?php echo $row['date_publication'];?></div></td>
                                  <td><?php echo $row['remarks'];?></div></td>
                                  </tr>
                        
                              <?php endwhile; ?>


                          </tbody>
                          </table>
                          <p><strong>16. Conferences, workshops, seminars, and training programs attended (since 2005)</strong></p>
                          <table class="table" id="facConferenceSeminar">
                          <thead>
                            <tr id="facConferenceSeminarData">
                              <th class="seminarName" data-column-name="seminar_title">Conferences, Workshops, Seminars, and Training Programs</th>
                              <th class="venuePerform" data-column-name="venue_performance">Venue</th>
                              <th class="startDate" data-column-name="start_date">Start Date</th>
                            <th class="endDate" data-column-name="end_date">End Date</th>
                            <th class="soNum" data-column-name="so_num">Evidence</th>
                            </tr>
                          </thead>
                          <tbody id="facConferenceSeminarRow">
                            

                            <?php 

                                $c="SELECT p.pub_code AS id, 
                                           p.seminar_title, 
                                           p.venue_performance, 
                                           p.start_date, 
                                           p.end_date,
                                            doc.file_name,
                                            doc.file_uploaded 


                                     FROM faculty f, 
                                          publication p, 
                                          publication_type pt,
                                          document doc
                                     WHERE p.fid = {$_GET['id']} 
                                     AND p.documentID = doc.ID
                                   AND f.fid = p.fid 
                                   AND p.pub_type = pt.pt_id
                                   AND p.pub_type='PT011'
                                   ORDER BY p.start_date DESC ";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['seminar_title'];?></div></td>
                                 <td><?php echo $row['venue_performance'];?></div></td>
                                
                                  <td><?php echo $row['start_date'];?></div></td>
                                  <td><?php echo $row['end_date'];?></div></td>
                                   <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                                  </tr>
                        
                              <?php endwhile; ?>


                          </tbody>
                          </table>
                      </div>
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="tabfour" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12 detailed">
                        <div class="col-md-12">
                          <font color="#009900"><strong>COMMUNITY SERVICE</strong></font>
                      <hr/>
                      <p></p>
                      <p><strong>1. In DLSU (Department, Unit, College, University) Activities since 2005</strong></p>
                      <table class="table" id="facComServeDLSU">
                      <thead>
                        <tr id="facComServeDLSUData">
                          <th class="comSrvDesc" data-column-name="description">Description of Involvement / Service / Work Done</th>
                          <th class="committeeName" data-column-name="committee">Unit/Committee</th>
                        <th class="startDate" data-column-name="start_date">Start Date</th>
                        <th class="endDate" data-column-name="end_date">End Date</th>
                        <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facComServeDLSURow">
                        
                        <?php 

                                $c="SELECT cs.cs_id AS id, 
                                           cs.description, 
                                           cs.committee, 
                                           cs.start_date, 
                                           cs.end_date,
                                            doc.file_name,
                                            doc.file_uploaded 

                                      FROM community_service cs, 
                                           faculty f, 
                                           cs_type cst,
                                           document doc

                                     WHERE cs.fid = {$_GET['id']}
                                       AND cs.documentID = doc.ID
                                       AND cs.fid = f.fid
                                       AND cs.cs_type = cst.cstype_code
                                       AND cs.cs_type = 'CS001'
                                       ORDER BY cs.start_date DESC";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['description'];?></div></td>
                                 <td><?php echo $row['committee'];?></div></td>
                                
                                  <td><?php echo $row['start_date'];?></div></td>
                                  <td><?php echo $row['end_date'];?></div></td>
                                   <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                                  </tr>
                        
                              <?php endwhile; ?>

                      </tbody>
                      </table>
                      <p><strong>2. In Professional Organizations (Local and International) since 2005</strong></p>
                      <table class="table" id="facComServeProfOrg">
                      <thead>
                        <tr id="facComServeProfOrgData">
                          <th class="comSrvDesc" data-column-name="description">Description of Involvement/Service/Work Done</th>
                          <th class="orgName" data-column-name="org_name">Professional Organization</th>
                          <th class="projectSite" data-column-name="project_site">Project / Activity Site</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                        <th class="endDate" data-column-name="end_date">End Date</th>
                        <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facComServeProfOrgRow">
                        <?php 

                                $c="SELECT cs.cs_id AS id, 
                                           cs.description, 
                                           cs.org_name, 
                                           cs.project_site, 
                                           cs.start_date, 
                                           cs.end_date,
                                            doc.file_name,
                                            doc.file_uploaded  

                                      FROM community_service cs, 
                                           cs_type cst,
                                           document doc

                                      WHERE cs.fid = {$_GET['id']} 
                                      AND cs.documentID = doc.ID
                                    AND cs.cs_type = cst.cstype_code
                                    AND cs.cs_type ='CS002'";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['description'];?></div></td>
                                 <td><?php echo $row['org_name'];?></div></td>
                                 <td><?php echo $row['project_site'];?></div></td>
                                  <td><?php echo $row['start_date'];?></div></td>
                                  <td><?php echo $row['end_date'];?></div></td>
                                  <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                                  </tr>
                        
                              <?php endwhile; ?>

                      </tbody>
                      </table>
                      <p><strong>3. With Government Organizations and Agencies (since 2005)</strong></p>
                      <table class="table" id="facComServeGovt">
                      <thead>
                        <tr id="facComServeGovtData">
                          <th class="comSrvDesc" data-column-name="description">Description of Involvement / Service / Work Done</th>
                          <th class="govAgency" data-column-name="gov_name">Government Organization and Agencies</th>
                          <th class="projectSite" data-column-name="project_site">Project / Activity Site</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                        <th class="endDate" data-column-name="end_date">End Date</th>
                        <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facComServeGovtRow">
                        <?php 

                                $c="SELECT cs.cs_id AS id, 
                                           cs.description, 
                                           cs.gov_name, 
                                           cs.project_site, 
                                           cs.start_date, 
                                           cs.end_date,,
                                            doc.file_name,
                                            doc.file_uploaded  


                                     FROM community_service cs, 
                                          cs_type cst,
                                          document doc

                                    WHERE cs.fid = {$_GET['id']} 
                                    AND cs.documentID = doc.ID
                                   AND cs.cs_type = cst.cstype_code
                                   AND cs.cs_type = 'CS003'";

                          

                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['description'];?></div></td>
                                 <td><?php echo $row['gov_name'];?></div></td>
                                 <td><?php echo $row['project_site'];?></div></td>
                                  <td><?php echo $row['start_date'];?></div></td>
                                  <td><?php echo $row['end_date'];?></div></td>
                                  <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                                  </tr>
                        
                              <?php endwhile; ?>

                      </tbody>
                      </table>
                      <p><strong>4. Others (e.g. NGOs, advocacy groups, neighborhood associations, local communities, Rotary, Lions, church, faith, and community) since 2005</strong></p>
                      <table class="table" id="facComServeOthers">
                      <thead>
                        <tr id="facComServeOthersData">
                          <th class="comSrvDesc" data-column-name="description">Description of Involvement / Service / Work Done</th>
                          <th class="orgName" data-column-name="others">Professional Organization</th>
                          <th class="projectSite" data-column-name="project_site">Project / Activity Site</th>
                          <th class="startDate" data-column-name="start_date">Start Date</th>
                        <th class="endDate" data-column-name="end_date">End Date</th>
                        <th class="soNum" data-column-name="so_num">Evidence</th>
                        </tr>
                      </thead>
                      <tbody id="facComServeOthersRow">
                        <?php 

                                $c="SELECT cs.cs_id AS id, 
                                           cs.description, 
                                           cs.others, 
                                           cs.project_site, 
                                           cs.start_date, 
                                           cs.end_date,
                                           doc.file_name,
                                            doc.file_uploaded 

                                     FROM community_service cs, 
                                          cs_type cst,
                                          document doc

                                     WHERE cs.fid = {$_GET['id']} 
                                     AND cs.documentID = doc.ID
                                   AND cs.cs_type = cst.cstype_code
                                   AND cs.cs_type = 'CS004'";

                        
                                  $cr = mysqli_query($dbc, $c);

                                  

                                 while($row = mysqli_fetch_array($cr)):?>
                                 <tr>
                                 <td><?php echo $row['description'];?></div></td>
                                 <td><?php echo $row['others'];?></div></td>
                                 <td><?php echo $row['project_site'];?></div></td>
                                  <td><?php echo $row['start_date'];?></div></td>
                                  <td><?php echo $row['end_date'];?></div></td>
                                  <td>
                      <a download="<?php echo $row['file_uploaded'] ?>" href="uploads/<?php echo $row['file_uploaded'] ?>"> <?php echo $row['file_name'] ?> </a>
                    </td>

                                  </tr>
                        
                              <?php endwhile; ?>

                      </tbody>
                      </table>
                      <p></p>
                      <table class="table">
                      <tr>
                       <td><strong>Next steps:</strong><br />
                       (1) Please save this file as:  <font color="#cc0000"><strong><your Lastname.your Firstname.AY12-13></strong></font><br />
                       (2) Send to:  <font color="#cc0000"><strong>iaa_passcu@dlsu.edu.ph</strong></font><br />
                       (3) Click this box to open mailto: iaa_passcu@dlsu.edu.ph<br />
                      <br /> 
                      For further inquiries, please contact IAA Office at loc. 567 or email iaa_passcu@dlsu.edu.ph <br /><br />
                      <strong>Thank you for accomplishing this form</strong>
                       </td>
                      </tr>
                      </table>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>


                  <!-- /tab-pane -->
         
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
$("#1a").addClass("active");

    </script>

</body>


</html>
