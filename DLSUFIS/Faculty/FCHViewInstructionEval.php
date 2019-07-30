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
      <section class="wrapper">
        <div class="row mt">
          <div class="col-lg-12">
            <H1><center> VIEW INSTRUCTION EVALUATION FORM</center></H1>
              
            <div class="col-lg-12 mt">
             <div class="row content-panel">
              <div class="panel-heading">
               <ul class="nav nav-tabs nav-justified">
                 <li class="active">
                   <a data-toggle="tab" href="#overview"> Overview</a>
                  </li>
              <li><a data-toggle="tab" href="#a">A</a> </li>
              <li><a data-toggle="tab" href="#b">B</a></li>
              <li><a data-toggle="tab" href="#c">C</a></li>
              <li><a data-toggle="tab" href="#d">D</a></li>
              <li><a data-toggle="tab" href="#e">E</a></li>
              <li><a data-toggle="tab" href="#f">F</a></li>
              <li><a data-toggle="tab" href="#g">G</a></li>


            </ul>
          </div>
        
          <div class="panel-body">
            <div class="tab-content">
                <!-- /tab-pane -->
                <div id="overview" class="tab-pane active">
                <div class="row">
                <h2><center>ANALYSIS</center></h2>
                    <p><center>Within the parentheses (  ) preceding the items given under Analysis, place one of the following letters:</center></p>
                    
                    <p><center>E  	provision or condition exists extensively</center></p>
                    <p><center>S  	provision or condition exists moderately</center></p>
                    <p><center>L  	provision or condition is very limited</center></p>
                    <p><center>M  	provision or condition is missing but needed</center></p>
                    <p><center>O  	provision or condition does not apply</center></p>
                    <p></p>
                    <p></p>

                    <h2><center>EVALUATION</center></h2>
                    <p><center>Evaluations represent the best judgment of the effectiveness of the implementation of the provisions after all the evidence has been considered. The evaluators should use the rating scale given below:</center></p>
                    
                    <p><center>5 – Excellent	the provisions or conditions are effectively implemented and are functioning excellently</center></p>
                    <p><center>4 ‑ Very Good	provisions or conditions are implemented and are functioning well</center></p>
                    <p><center>3 – Good	provisions or conditions are moderately implemented and are functioning satisfactorily</center></p>
                    <p><center>2 – Fair	provisions or conditions are implemented to a limited extent and are functioning minimally</center></p>
                    <p><center>1 ‑ Poor	provisions or conditions are not implemented and are not functioning</center></p>
                    <p><center>O ‑ Does not apply	provisions or conditions are not applicable</center></p>

                </div>
                </div>                              
            
        <!-- /tab-pane -->
                <div id="a" class="tab-pane">
                <div class="row">
                <table class="table table-striped table-advance table-hover">
                <h2><center><font><strong>A. CURRICULUM </strong></font></center></h2>
                
                <thead>
                  <tr>
                    <th><i class=""></i> Analysis</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>

                    <th></th>
                  </tr>
                </thead>
                  
                  <tbody>
                 <?php
                    
                    $ChairEFA = "SELECT * FROM ChairEFA ORDER BY idChairEFA DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $ChairEFA);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                      
                  <tr>
                  <td>1.	There is a clear description of the degree programs.</td>
                    <td><?php echo $rowc['A1'];?></td>
                  </tr>
                  
                  <tr>
                  <td>2.  There is a set of clear objectives for each degree program.</td>
                    <td><?php echo $rowc['A2'];?></td>
                  </tr>
                      
                  <tr>
                  <td>3.	Students are provided orientation about the degree programs and the objectives.</td>
                    <td><?php echo $rowc['A3'];?></td>
                  </tr>
                      
                  <tr>
                  <td>4.  The curricular goals and objectives are aligned with: </td>
                      <td><?php echo $rowc['A4'];?></td>
                  </tr>
                      
                  <tr>
                  <td>5.	Curricular goals include the following essential purposes of undergraduate education: (check)</td>
                    <td><?php echo $rowc['A5'];?></td>
                  </tr>
                      
                  <tr>
                  <td>6.	The school has a well-defined theoretical or conceptual framework (i.e. constructivist, student-centered, transformative) upon which its teaching-learning process is anchored.</td>
                    <td><?php echo $rowc['A6'];?></td>
                  </tr>
                      
                <tr>
                  <td>7. There is an appropriate set of general education courses, basic ITE core subjects, ITE professional/major subjects, ITE electives, and free electives.</td>
                <td><?php echo $rowc['A7'];?></td>
                  </tr>
                      
                <tr>
                  <td>8. Students are given choices for ITE and free electives.</td>
                    <td><?php echo $rowc['A8'];?></td>
                  </tr>
                      
                <tr>
                  <td>9. Course codes and titles match the course description and contents.</td>
                <td><?php echo $rowc['A9'];?></td>
                  </tr>
                      
                <tr>
                  <td>10.	In each area of major concentration, the courses are arranged in logical sequence.  There is no omission or needless overlapping of content.  Moreover, each subject contributes effectively to the development of the objectives in the area of concentration.</td>
                    <td><?php echo $rowc['A10'];?></td>
                  </tr>
                
                <tr>
                  <td>11.	There is evidence that the required prerequisites of the program of studies are clearly defined and strictly implemented.</td>
                <td><?php echo $rowc['A11'];?></td>
                  </tr>
                      
                <tr>
                  <td>12.	There is evidence of the connectedness between and among the different course clusters (i.e. General Education courses with professional/major courses and electives).</td>
                <td><?php echo $rowc['A12'];?></td>
                  </tr>
                
                <tr>
                  <td>13.	There are provisions for adequate and relevant internships/field experience or practicum that support student learning and facilitate the achievement of learning outcomes.</td>
                <td><?php echo $rowc['A13'];?></td>
                  </tr>
                      
                      
                <tr>
                  <td>14. There are provisions for appropriate and relevant thesis/capstone project/portfolio that support student learning and facilitate the achievement of learning outcomes.</td>
                    <td><?php echo $rowc['A14'];?></td>
                  </tr>
                      <tr>
                  <td>15.	There is a standard format used for course syllabi.</td>
                          <td><?php echo $rowc['A15'];?></td>
                  </tr>
                
                    <tr>
                  <td>16.	Course descriptions in the syllabi are consistent with those contained in the Bulletin of Information and other official school documents.</td>
                    <td><?php echo $rowc['A16'];?></td>
                  </tr>
                      
                <tr>
                <td>17.	The course syllabi clearly define the intended/expected learning outcomes.
                </td>
                <td><?php echo $rowc['A17'];?></td>
                </tr>
                      
                <tr>
                <td>18. The course syllabi should indicate list of topics and schedule, grading scheme, and updated list of references.
                </td>
                    <td><?php echo $rowc['A18'];?></td>
                </tr>
                      
                
                <tr>
                <td>19.	Initiatives are undertaken to foster inter-departmental collaboration to enrich curricular programs.
                </td>
                <td><?php echo $rowc['A19'];?></td>
                </tr>
                      
                <tr>
                <td>20.	A system is in place for curriculum development, evaluation, and management.
                </td>
                    <td><?php echo $rowc['A20'];?></td>
                </tr>
                      
                <tr>
                <td> 21.	There is evidence of a planned and regular assessment of the curriculum.
                </td>
                    <td><?php echo $rowc['A21'];?></td>
                </tr>
                
                <tr>
                <td> 22. Various stakeholders are involved in the evaluation of the curriculum: (check)
                </td>
                    <td><?php echo $rowc['A22'];?></td>
                </tr>
                      
                <tr>
                <td> 23.	Curriculum review/assessment data are disseminated to concerned sectors and used for continuous instructional and program improvement.   
                </td>
                    <td><?php echo $rowc['A23'];?></td>
                </tr>
                      
                <tr>
                <td> 24.	There is evidence of sustained interest in curricular innovations from both faculty and administrators.
                </td>
                <td><?php echo $rowc['A24'];?></td>
                </tr>
                      
                <tr>
                <td> 25.	The program of studies reflects initiatives to introduce/expose students to international/global perspectives.
                </td>
                    <td><?php echo $rowc['A25'];?></td>
                </tr>
                      
                      
                    <?php endwhile; ?>
                      
                  </tbody>
              
              
              
                  </table>
                    
                <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Evaluation</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>

                    <th></th>
                  </tr>
                </thead>
                  
                  <tbody>
                       <?php
                    
                    $ChairEFA = "SELECT * FROM ChairEFA ORDER BY idChairEFA DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $ChairEFA);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                       <tr>
                           <td>a.	Alignment of curriculum with institutional vision-mission-goals and program goals/objectives </td>
                           <td><?php echo $rowc['AEa'];?></td>
                        </tr>
                      <tr>
                           <td>b.	Well-defined theoretical or conceptual framework of the teaching-learning process</td>
                          <td><?php echo $rowc['AEb'];?></td>
                        </tr>
                      <tr>
                           <td>c.	Clearly defined learning outcomes </td>
                          <td><?php echo $rowc['AEc'];?></td>
                        </tr>
                      <tr>
                           <td>d.	Breadth and depth of the curriculum  </td>
                          <td><?php echo $rowc['AEd'];?></td>
                        </tr>
                      <tr>
                           <td>e.	Choices for electives  </td>
                          <td><?php echo $rowc['AEe'];?></td>
                        </tr>
                      <tr>
                           <td>f.	Quality of field experience and thesis/project/portfolios </td>
                          <td><?php echo $rowc['AEf'];?></td>
                        </tr>
                      <tr>
                           <td> g.	System for evaluating the curriculum </td>
                          <td><?php echo $rowc['AEg'];?></td>
                        </tr>
                    
                      
                      <?php endwhile; ?>
                    </tbody>
                    </table>
                
                        
                </div>
                </div>                              
               
        <!-- /tab-pane -->
                <div id="b" class="tab-pane">
                <div class="row">
                    
                    <h2><center><font><strong>B.	TEACHING-LEARNING PROCESS</strong></font></center></h2>
                    
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                          <tr>
                            <th><i class=""></i> Analysis</th>
                            <th class="hidden-phone"><i class=""></i>Rating</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                  <?php
                    
                    $FacultyEvalB = "SELECT * FROM ChairEFB ORDER BY idChairEFB DESC limit 1";
                    
                    $a = mysqli_query($dbc, $FacultyEvalB);
                    
                    while($row = mysqli_fetch_array($a)):?>
                      <tr>
                      <td>1. The syllabi reflect the expected learning outcomes and the means to achieve them.</td>
                      <td><?php echo $row['A1'];?></td>
                      </tr>
                      <tr>
                      <td>2.	Integrated lecture and lab mode of delivery, rather than separate sessions for lecture and lab, is used.</td>
                      <td><?php echo $row['A2'];?></td>
                      </tr>
                      <tr>
                      <td>3.	Individual and group design/development projects are required in the courses.</td>
                      <td><?php echo $row['A3'];?></td>
                      </tr>
                      <tr>
                      <td>4.	Students are provided detailed specifications about the required projects for the courses.</td>
                      <td><?php echo $row['A4'];?></td>
                            </tr><tr>
                      <td>5.	The medium of instruction prescribed by the school is followed in classes.</td>
                      <td><?php echo $row['A5'];?></td>
                            </tr><tr>
                            
                      <td>6.	Topics in the course syllabi are followed as scheduled.</td>
                      <td><?php echo $row['A6'];?></td>
                            </tr><tr>
                      <td>7.	The syllabi include appropriate and up-to-date bibliography of references, including journals and web sources.</td>
                      <td><?php echo $row['A7'];?></td>
                            </tr><tr>
                      <td>8.	There is a person assigned to plan, implement, and coordinate with the work sites of the students’ on-the-job trainings, practicum or internship programs.</td>
                            <td><?php echo $row['A8'];?></td>
                            </tr><tr>
                      <td>9. There are faculty members assigned to advise and monitor students doing thesis/capstone projects/portfolios.</td>
                            <td><?php echo $row['A9'];?></td>
                            </tr><tr>
                      <td>10. Written examinations follow the principles of test construction.</td>
                            <td><?php echo $row['A10'];?></td>
                            </tr><tr>
                      <td>12. Student assessment supports the program design in     terms of its objectives, underlying philosophy and learning outcomes.</td>
                            <td><?php echo $row['A12'];?></td>
                            </tr><tr>
                      <td>13.	Instructors personally rate examinations and other  requirements submitted by students.</td>
                            <td><?php echo $row['A13'];?></td>
                            </tr><tr>
                      <td>14.	Students are informed at the beginning of the course regarding the basis for rating their performance. </td>
                            <td><?php echo $row['A14'];?></td>
                            </tr><tr>
                      <td>15.	The method of arriving at the final mark is well-defined and known to students.</td>
                            <td><?php echo $row['A15'];?></td>
                            </tr><tr>
                      <td>16.	Final marks are a fair and objective appraisal of the students’ performance throughout the entire         course.</td>
                            <td><?php echo $row['A16'];?></td>
                            </tr><tr>
                      <td>17.	Final marks on the grading sheets can be changed only by the instructor concerned, following        standard procedures.</td>
                            <td><?php echo $row['A17'];?></td>
                            </tr><tr>
                      <td>18. Students are informed of their class standing regularly.</td>
                            <td><?php echo $row['A18'];?></td>
                            </tr>
                          
                          
                      
                    <?php endwhile; ?> 
                  </tbody>
                  </table>
                    
                <table class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Evaluation</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>

                    <th></th>
                  </tr>
                </thead>
                  
                  <tbody>
                       <?php
                    
                    $ChairEFA = "SELECT * FROM ChairEFB ORDER BY idChairEFB DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $ChairEFA);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                      
                      <tr>
                      <td>a.	Quality of instructional processes</td>
                      <td><?php echo $row['Ea'];?></td>
                      </tr>
                      <tr>
                      <td>b.	Effectiveness of teaching methods</td>
                      <td><?php echo $row['Eb'];?></td>
                      </tr>
                      <tr>
                      <td>c.	Use of instructional resources and ICT</td>
                      <td><?php echo $row['Ec'];?></td>
                      </tr>
                      <tr>
                      <td>d.	Evaluation of student performance</td>
                      <td><?php echo $row['Ed'];?></td>
                      </tr>
                      <tr>
                      <td>e.	Quality of exams, projects, and thesis/portfolios</td>
                      <td><?php echo $row['Ee'];?></td>
                      </tr>
                      <tr>
                      <td>f.	System of student assessment</td>
                      <td><?php echo $row['Ef'];?></td>
                      </tr>
                      <tr>
                      <td>g.	Support for students with academic difficulties</td>
                      <td><?php echo $row['Eg'];?></td>
                      </tr>
                      
                      <?php endwhile; ?> 
                    </tbody>
                    </table>
                        
                </div>
                </div> 
                  
        <!-- /tab-pane -->
                
                <div id="c" class="tab-pane">
                <div class="row">
                
                <h2><center><font><strong>C. TEACHING-LEARNING ENVIRONMENT </strong></font></center></h2>

                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> ANALYSIS</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    
                    $FacultyEvalC = "SELECT * FROM ChairEFC ORDER BY idChairEFC DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalC);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                      <tr>
                      <td><bold>1.	Schedule of classes are conducive to the students’ learning.</bold> </td>
                      <td><?php echo $rowc['CA1'];?></td>
                      </tr>
                      <tr>
                      <td>2.	The teaching-learning environment is conducive to effective instruction.</td>
                      <td><?php echo $rowc['CA2'];?></td>
                      </tr>
                      <tr>
                      <td>3.	Adequate measures are taken to ensure punctual attendance of faculty and students in all scheduled instructional activities.</td>
                      <td><?php echo $rowc['CA3'];?></td>
                      </tr>
                      <tr>
                      <td>4.	Rules concerning class attendance are strictly enforced. A record is kept of the daily attendance of students. </td>
                      <td><?php echo $rowc['CA4'];?></td>
                      </tr> 
                      <tr>
                      <td>5.	There is a provision for teachers to make up for missed classes.</td>
                      <td><?php echo $rowc['CA5'];?></td>
                      </tr>
                      <tr>
                      <td>6.	There is a system of substitution or special arrangements in cases of teacher absences.</td>
                      <td><?php echo $rowc['CA6'];?></td>
                      </tr> 
                      <tr>
                      <td>7.	The teacher implements institutional policies and practices to ensure effective instruction. </td>
                      <td><?php echo $rowc['CA7'];?></td>
                      </tr> 
                      <tr>
                      <td>8. Classroom layout encourages collaboration and group discussion.</td>
                      <td><?php echo $rowc['CA8'];?></td>
                      </tr> 
                      <tr>
                      <td>9.	Class sizes (in classrooms and laboratories) are conducive to effective teaching and learning.</td>
                      <td><?php echo $rowc['CA9'];?></td>
                      </tr> 
                      <tr>
                      <td>10.	The room sizes and acoustics are appropriate to the number of students.</td>
                      <td><?php echo $rowc['CA10'];?></td>
                      </tr> 
                      <tr>
                          <td>11. Classrooms are well-lighted and properly ventilated.</td>
                          <td><?php echo $rowc['CA11'];?></td>
                      </tr> 
                      <tr>
                          <td>12.	Venues for instruction are well-equipped, appropriate to the subject, and properly maintained.</td>
                          <td><?php echo $rowc['CA12'];?></td>
                          </tr> 
                      
                    <?php endwhile; ?>   
                    
                  </tbody>
                  </table>
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> EVALUATION</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $FacultyEvalC = "SELECT * FROM ChairEFC ORDER BY idChairEFC DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalC);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>a.	Class atmosphere</td>
                    <td><?php echo $rowc['CEa'];?></td>
                    </tr>
                    <tr>
                    <td>b.	Class attendance of students and faculty</td>
                    <td><?php echo $rowc['CEb'];?></td>
                    
                    </tr>
                    <tr>
                    <td>c.	Classroom layout</td>
                    <td><?php echo $rowc['CEc'];?></td>
                    
                    </tr>
                    <tr>
                    <td>d.	Appropriateness of instructional venues to class size</td>
                    <td><?php echo $rowc['CEd'];?></td>
                    
                    </tr>
                    
                    <?php endwhile; ?> 
                    </tbody>
                    </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="d" class="tab-pane">
                <h2><center><font><strong>D. ASSESSMENT OF LEARNING OUTCOMES</strong></font></center></h2>
                <div class="row">
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> ANALYSIS</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $FacultyEvalD = "SELECT * FROM ChairEFD ORDER BY idChairEFD DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalD);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1.	The learning outcomes of each program define the knowledge, skills, competencies, and values that students acquire from their educational experience. </td>
                    <td><?php echo $rowc['DA1'];?></td>
                    
                    </tr>
                    <tr>
                     <td>2.	Policies are in place to screen out students whose performance does not meet program standards.</td>
                    <td><?php echo $rowc['DA2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	Failure and attrition rates of students are monitored.</td>
                        <td><?php echo $rowc['DA3'];?></td>
                    </tr>
                    <?php endwhile; ?> 
                </tbody>
                  </table>
                    <table class="table table-striped table-advance table-hover">
                    <thead>
                      <tr>
                        <th><i class=""></i> EVALUATION</th>
                        <th class="hidden-phone"><i class=""></i>Rating</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php

                        $FacultyEvalD = "SELECT * FROM ChairEFD ORDER BY idChairEFD DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalD);

                        while($rowc = mysqli_fetch_array($c)):?>
                        <tr>
                        <td>a.	Articulation of program learning outcomes</td>
                        <td><?php echo $rowc['DEa'];?></td>
                        </tr>
                        <tr>
                        <td>b.	Admission and retention policies</td>
                        <td><?php echo $rowc['DEb'];?></td>
                        </tr>
                        <tr>
                        <td>c.	Recognition of outstanding students</td>
                        <td><?php echo $rowc['DEcc'];?></td>
                        </tr>
                        <tr>
                        <td>d.	Systems and procedures for determining attainment of learning outcomes</td>
                        <td><?php echo $rowc['DEd'];?></td>
                        </tr>
                        <?php endwhile; ?> 
                    </tbody>
                    </table>
                        
                </div>
                </div> 
                
                
                <!-- /tab-pane -->
                <div id="e" class="tab-pane">
                <h2><center><font><strong>E.	SUPERVISION OF INSTRUCTIONAL PROGRAM</strong></font></center></h2>
                <div class="row">
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> ANALYSIS</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                        $FacultyEvalE = "SELECT * FROM ChairEFE ORDER BY idChairEFE DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalE);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1.	The academic administrator exercises supervision over the selection of textbooks and other instructional materials.</td>
                        <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Instructors submit a syllabus for each subject to the academic administrator for approval.  This is updated periodically.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	There is a budget for instructional materials and equipment.</td>
                    <td><?php echo $rowc['A3'];?></td>
                    </tr>
                     <tr>
                     <td>4.	The organizational structure of the institution facilitates effective instruction.</td>
                        <td><?php echo $rowc['A4'];?></td>
                    </tr>
                  
                    <?php endwhile; ?>              
                </tbody>
                  </table>
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> EVALUATION</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                        $FacultyEvalE = "SELECT * FROM ChairEFE ORDER BY idChairEFE DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalE);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>a.	Implementation of the instructional supervision program</td>
                        <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b.	Faculty evaluation mechanisms</td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                     <td>c.	Budget in support of instruction</td>
                    <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                  
                    <?php endwhile; ?>              
                </tbody>
                  </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="f" class="tab-pane">
                <h2><center><font><strong>F. RESEARCH </strong></font></center></h2>
                <div class="row">
                 <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> ANALYSIS</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php

                        $FacultyEvalF = "SELECT * FROM ChairEFF ORDER BY idChairEFF DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalF);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1.	Co-curricular activities contribute to the effectiveness of the teaching-learning process and the realization of learning outcomes.</td>
                        <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Programs are in place to encourage active participation of all students in co-curricular activities.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	Academic requirements are not relaxed in favor of participation in co-curricular activities.</td>
                    <td><?php echo $rowc['A3'];?></td>
                    </tr>
                    <tr>
                     <td>4.	Instructional schedules are not unduly interrupted by co-curricular functions.</td>
                    <td><?php echo $rowc['A4'];?></td>
                    </tr>
                    <tr>
                     <td>5. 	Students play an active role in the design and implementation of the co-curricular program.</td>
                    <td><?php echo $rowc['A5'];?></td>
                    </tr>
                    <tr>
                     <td>6.	Recognition is given to excellence in co-curricular activities.</td>
                    <td><?php echo $rowc['A6'];?></td>
                    </tr>
                    <tr>
                     <td>6.	Recognition is given to excellence in co-curricular activities.</td>
                    <td><?php echo $rowc['A7'];?></td>
                    </tr>
                    
                    <?php endwhile; ?>              
                </tbody>
                  </table>
                 <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> EVALUATION</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                     <?php

                        $FacultyEvalF = "SELECT * FROM ChairEFF ORDER BY idChairEFF DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalF);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>a. Complementation between curricular and co-curricular programs</td>
                        <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b.	Extent of student involvement in co-curricular programs</td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                 <?php endwhile; ?>       
                </tbody>
                </table>
                        
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="g" class="tab-pane">
                <h2><center><font><strong>G. COMMUNITY SERVICE </strong></font></center></h2>
                <div class="row">
                <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> ANALYSIS</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $FacultyEvalG = "SELECT * FROM ChairEFG ORDER BY idChairEFG DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalG);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1.	The rationale for academic consultation/advising is clearly articulated and disseminated to faculty and students.</td>
                        <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Faculty members and/or advisers refer students to the Guidance Office when warranted.</td>
                        <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	There is a system of monitoring the effectiveness of the academic consultation/advising program.</td>
                        <td><?php echo $rowc['A3'];?></td>
                    </tr>
                    
                   <?php endwhile; ?>
                </tbody>
                  </table>
                    
                    <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=""></i> EVALUATION</th>
                    <th class="hidden-phone"><i class=""></i>Rating</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $FacultyEvalG = "SELECT * FROM ChairEFG ORDER BY idChairEFG DESC limit 1;";

                        $c = mysqli_query($dbc, $FacultyEvalG);

                        while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>a.	Availability of academic consultation/advising services</td>
                        <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b.	Effectiveness of academic consultation/advising services</td>
                        <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                   <?php endwhile; ?>
                </tbody>
                  </table>
                        
                </div>
                </div> 
                
               
                
                <!-- /tab-pane -->
                        </div>
                    </div>          
                </div>   
            </div>    
        </div>
    </div>
        <!-- /row -->
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

      <!--custom switch-->
  <script src="../../lib/bootstrap-switch.js"></script>

    <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
      <script src="../../lib/form-component.js"></script>
<script src="../../lib/jquery.tagsinput.js"></script>

  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>




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
$("#5").addClass("active");
</script>
</body>


</html>
