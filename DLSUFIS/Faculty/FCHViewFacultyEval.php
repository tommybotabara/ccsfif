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
            <H1><center> VIEW FACULTY EVALUATION FORM</center></H1>
              
            <div class="col-lg-12 mt">
             <div class="row content-panel">
              <div class="panel-heading">
               <ul class="nav nav-tabs nav-justified">
                 <li class="active">
                   <a data-toggle="tab" href="#overview"> Overview</a>
                  </li>
              <li><a data-toggle="tab" href="#a">A</a>
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
                  
                         <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>DEGREES COMPLETED</th>
                                  <th colspan="2" ><center>Full-time Faculty</center></th>
                                
                                  <th colspan="2" ><center>Part-Time Faculty</center></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td><center>No.</center></td>
                                <td><center>%</center></td>
                                <td><center>No.</center></td>
                                <td><center>%</center></td>
                              </tr>
                              <tr>
                                <td>Doctorate in discipline taught </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Doctorate in other fields</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            <tr>
                                <td>Master's in field of Specialization</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            <tr>
                                <td>Master's in other Fields</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                                
                                <tr>
                                <td>Bachelor's degree </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                                
                                <tr>
                                <td>total</td>
                                <td></td>
                                <td><center>100%</center></td>
                                <td></td>
                                <td><center>100%</center></td>
                                </tr>
                       

                            </tbody>
                          </table>
                        
                </div>
                </div>                              
               
        <!-- /tab-pane -->
                <div id="b" class="tab-pane">
                <div class="row">
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
                    
                    $FacultyEvalB = "SELECT * FROM FacultyEFB ORDER BY idFacultyEFB DESC limit 1;";
                    
                    $a = mysqli_query($dbc, $FacultyEvalB);
                    
                    while($row = mysqli_fetch_array($a)):?>
                      <tr>
                      <td>a.	Qualifications of the faculty </td>
                      <td><?php echo $row['Ea'];?></td>
                      </tr>
                      <tr>
                      <td>b.	Teaching experience of the faculty member</td>
                      <td><?php echo $row['Eb'];?></td>
                      </tr>
                      <tr>
                      <td>c.	Extent of practice of profession outside of teaching</td>
                      <td><?php echo $row['Ec'];?></td>
                      </tr>
                      <tr>
                      <td>d.	Overall stability vis-à-vis turnover ratio</td>
                      <td><?php echo $row['Ed'];?></td>
                      </tr>  
                    <?php endwhile; ?> 
                  </tbody>
                  </table>
                        
                </div>
                </div> 
                  
        <!-- /tab-pane -->
                
                <div id="c" class="tab-pane">
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
                    
                    $FacultyEvalC = "SELECT * FROM FacultyEFC ORDER BY idFacultyEFC DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalC);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                      <tr>
                      <td><bold>1.	Faculty selection gives due consideration to the following:</bold> </td>
                      <td>----</td>
                      </tr>
                      <tr>
                      <td>a.	academic qualifications</td>
                      <td><?php echo $rowc['A1a'];?></td>
                      </tr>
                      <tr>
                      <td>b.	passing board examination where applicable</td>
                      <td><?php echo $rowc['A1b'];?></td>
                      </tr>
                      <tr>
                      <td>c.	industry certification and special training & specialization</td>
                      <td><?php echo $rowc['A1c'];?></td>
                      </tr> 
                      <tr>
                      <td>d.	professional/industry experience</td>
                      <td><?php echo $rowc['A1d'];?></td>
                      </tr>
                      <tr>
                      <td>e.	competence in the field of specialization</td>
                      <td><?php echo $rowc['A1e'];?></td>
                      </tr> 
                      <tr>
                      <td>f.	competence in communication</td>
                      <td><?php echo $rowc['A1f'];?></td>
                      </tr> 
                      <tr>
                      <td>g.	teaching ability</td>
                      <td><?php echo $rowc['A1g'];?></td>
                      </tr> 
                      <tr>
                      <td>h.	research output</td>
                      <td><?php echo $rowc['A1h'];?></td>
                      </tr> 
                      <tr>
                      <td>i.	social awareness and concern</td>
                      <td><?php echo $rowc['A1i'];?></td>
                      </tr> 
                      <tr>
                          <td>j.	personality/character</td>
                          <td><?php echo $rowc['A1j'];?></td>
                      </tr> 
                      <tr>
                          <td>k.	health</td>
                          <td><?php echo $rowc['A1k'];?></td>
                          </tr> 
                      <tr>
                          <td>2. The contract clearly specifies the terms of appointment/employment.</td>
                          <td><?php echo $rowc['A2'];?></td>
                          </tr> 
                    
                    <tr>
                        <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                        
                    
                    </tr>
                    <tr>
                    <td>a.	Policies and procedures for faculty selection</td>
                    <td><?php echo $rowc['Ea'];?></td>
                    
                    </tr>
                      
                    <?php endwhile; ?> 
                  </tbody>
                  </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="d" class="tab-pane">
                <h2><center><font><strong>D. RANKING AND PROMOTION</strong></font></center></h2>
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
                    
                    $FacultyEvalD = "SELECT * FROM FacultyEFD ORDER BY idFacultyEFD DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalD);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td><bold>1. The criteria for ranking and promotion include the following:</bold> </td>
                    <td>----</td>
                    </tr>
                    <tr>
                     <td>a. industry certification and trainings</td>
                        <td><?php echo $rowc['A1a'];?></td>
                    </tr>
                    <tr>
                     <td>b.	teaching competency</td>
                        <td><?php echo $rowc['A1b'];?></td>
                    </tr>
                    <tr>
                     <td>c.	research and publications</td>
                        <td><?php echo $rowc['A1c'];?></td>
                    </tr>
                    <tr>
                     <td>d.	special services to the college and/or department</td>
                        <td><?php echo $rowc['A1d'];?></td>
                    </tr>
                    <tr>
                     <td>e.	further educational attainment</td>
                        <td><?php echo $rowc['A1e'];?></td>
                    </tr>
                    <tr>
                     <td>f.	community involvement</td>
                        <td><?php echo $rowc['A1f'];?></td>
                    </tr>
                    <tr>
                    <tr>
                     <td>g.	commitment to college's purposes and objectives</td>
                        <td><?php echo $rowc['A1g'];?></td>
                    </tr>
                    <tr>	

                     <td>h.	practice of profession</td>
                        <td><?php echo $rowc['A1h'];?></td>
                    </tr><tr>
                     <td>i.	student evaluation of faculty</td>
                    <td><?php echo $rowc['A1i'];?></td>
                    </tr>
                    <tr>
                     <td>2. The length of the probationary period is adequate.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                    <td>3.Describe the procedures for termination of employment.</td>
                    <td><?php echo $rowc['A3'];?></td>
                    
                    </tr>
                    <tr>
                    <td>4.	Describe the procedures for resignation from employment.</td>
                        <td><?php echo $rowc['A4'];?></td>
                    </tr>
                    <tr>
                    <td>5.	Describe the procedure followed in the dismissal of a faculty member, including due process. </td>
                    <td><?php echo $rowc['A5'];?></td>
                    </tr>
                    <tr>
                    <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                    <td>a. Ranking System</td>
                    <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                    <td>b. Procedure for promotion</td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                    <td>c. Resignation Procedure</td>
                    <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                    <tr>
                    <td>d.	Dismissal/Termination procedure</td>
                    <td><?php echo $rowc['Ed'];?></td>
                    </tr>
                </tbody>
                  </table>
                    <?php endwhile; ?> 
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="e" class="tab-pane">
                <h2><center><font><strong>E. TEACHING ASSIGNMENTS</strong></font></center></h2>
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
                    
                    $FacultyEvalE = "SELECT * FROM FacultyEFE ORDER BY idFacultyEFE DESC limit 1;";
                    
                    $c = mysqli_query($dbc, $FacultyEvalE);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1. The members of the faculty are given teaching assignments only in the field of their major or minor lines of specialization.</td>
                    <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                    <td>2. Class schedules are conducive to efficient teaching.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	Encouragement and provision are made for extra class responsibilities: </td>
                     <td>----</td>
                    </tr>
                     <tr>
                     <td>a. committee work</td>
                    <td><?php echo $rowc['A3a'];?></td>
                    </tr>
                     <tr>
                     <td>b.	student consultation/Advising</td>
                     <td><?php echo $rowc['A3b'];?></td>
                    </tr>
                    <tr>
                     <td>c.	research</td>
                    <td><?php echo $rowc['A3c'];?></td>
                    </tr>
                    <tr>
                     <td>d.	administrative work</td>
                    <td><?php echo $rowc['A3d'];?></td>
                    </tr>
                    <tr>
                     <td>e.	others </td>
                    <td><?php echo $rowc['A3e'];?></td>
                    </tr>
                    <tr>
                     <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a. Alignment of teaching assignment to degrees</td>
                    <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b. System for assigning teaching loads </td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                     <td>c. Scheduling</td>
                        <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                    <tr>
                    <td>d. Provision for extra class responsibilities</td>
                    <td><?php echo $rowc['Ed'];?></td>
                    
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
                    
                    $FacultyEvalF = "SELECT * FROM FacultyEFF ORDER BY idFacultyEFF DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $FacultyEvalF);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1. There is adequate support for basic/or applied research and publication.</td>
                        <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2. Faculty members conduct research and publish their research.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	The institution publishes a research journal.</td>
                        <td><?php echo $rowc['A3'];?></td>
                    </tr>
                     <tr>
                     <td>4. Faculty members publish in a peer reviewed or refereed journals.</td>
                         <td><?php echo $rowc['A4'];?></td>
                    </tr>
                     <tr>
                     <td>5. Faculty participates in conferences, conventions and fora.</td>
                         <td><?php echo $rowc['A5'];?></td>
                    </tr>
                    <tr>
                     <td>6.	Faculty produce commercial applications and products. </td>
                        <td><?php echo $rowc['A6'];?></td>
                    </tr>
                    <tr>
                     <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a. Research outputs </td>
                    <td><?php echo $rowc['Ea'];?></td>
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
                    
                    $FacultyEvalG = "SELECT * FROM FacultyEFG ORDER BY idFacultyEFG DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $FacultyEvalG);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1. Community involvement of faculty members is seen in:</td>
                        <td>------</td>
                    </tr>
                    <tr>
                     <td>a.	relating/integrating community needs in subject matter</td>
                        <td><?php echo $rowc['A1a'];?></td>
                    </tr>
                    <tr>
                     <td>b. research</td>
                        <td><?php echo $rowc['A1b'];?></td>
                    </tr>
                     <tr>
                     <td>c.	participation in community projects</td>
                         <td><?php echo $rowc['A1c'];?></td>
                    </tr>
                     <tr>
                     <td>d.	personal participation to community outreach project</td>
                         <td><?php echo $rowc['A1d'];?></td>
                    </tr>
                    <tr>
                     <td>e. others</td>
                        <td><?php echo $rowc['A1e'];?></td>
                    </tr>
                    <tr>
                     <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a. Teaching competence </td>
                        <td><?php echo $rowc['Ea'];?></td>
                    
                    </tr>
                   <?php endwhile; ?>
                </tbody>
                  </table>
                        
                </div>
                </div> 
                


                
                
                <!-- /tab-pane -->
                        
                 <div id="h" class="tab-pane">
                <h2><center><font><strong>H. PERFORMANCE EVALUATION </strong></font></center></h2>
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
                    
                    $FacultyEvalH = "SELECT * FROM FacultyEFH ORDER BY idFacultyEFH DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $FacultyEvalH);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>1. Teaching competence can be seen in: </td>
                    <td><?php echo $rowc['A1a'];?></td>
                    </tr>
                    <tr>
                     <td>b.	mastery of subject matter</td>
                    <td><?php echo $rowc['A1b'];?></td>
                    </tr>
                    <tr>
                     <td>c.	preparation for classes </td>
                    <td><?php echo $rowc['A1c'];?></td>
                    </tr>
                     <tr>
                     <td>d.	relevance of subject matter to current issues</td>
                    <td><?php echo $rowc['A1d'];?></td>
                    </tr>
                     <tr>
                     <td>e.	use of library resources</td>
                    <td><?php echo $rowc['A1e'];?></td>
                    </tr>
                    <tr>
                     <td>f. use of exams, quizzes, projects, student portfolios and other forms of assessments </td>
                    <td><?php echo $rowc['A1f'];?></td>
                    </tr>
                    <tr>
                        <td>g.	student evaluation</td>
                        <td><?php echo $rowc['A1g'];?></td>
                    </tr>
                    <tr>
                     <td>h.	professional involvement and updating</td>
                    <td><?php echo $rowc['A1h'];?></td>
                    </tr>
                    <tr>
                     <td>i.	attitudes and values</td>
                    <td><?php echo $rowc['A1i'];?></td>
                    </tr>
                    <tr>
                     <td>j.	compliance with administrative requirements</td>
                    <td><?php echo $rowc['A1j'];?></td>
                    </tr>
                    <tr>
                     <td>k.	attendance in classes</td>
                    <td><?php echo $rowc['A1k'];?></td>
                    </tr>
                    <tr>
                     <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a. Teaching competence </td>
                    <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b. Attitudes and Values </td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                    <td>c.	Compliance with administrative requirements</td>
                    <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                   <?php endwhile; ?>
                </tbody>
                  </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                <div id="i" class="tab-pane">
                <h2><center><font><strong>I. FACULTY DEVELOPMENT </strong></font></center></h2>
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
                    
                    $FacultyEvalI = "SELECT * FROM FacultyEFI ORDER BY idFacultyEFI DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $FacultyEvalI);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    
                    <tr>
                    <td>1.	The institution supports faculty participation in seminars, workshops, and industry certifications outside the school.</td>
                    <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	The institution encourages membership of faculty in professional organizations.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	Faculty and committee meetings are well-attended</td>
                    <td><?php echo $rowc['A3'];?></td>
                    </tr>
                     <tr>
                     <td> 4.	There is an item in the budget for faculty development.</td>
                        <td><?php echo $rowc['A4'];?></td>
                    </tr>
                     <tr>
                     <td> 5.	Innovative industry academic linkage to support faculty development.</td>
                        <td><?php echo $rowc['A5'];?></td>
                    </tr>
                    <tr>
                        <td> 6. Personal development of the faculty:</td>
                        <td>----</td>
                    </tr>
                    <tr>
                     <td>a. commitment to life long learning</td>
                        <td><?php echo $rowc['A6a'];?></td>
                    </tr>
                    <tr>
                        <td>b. commitment to professional practice</td>
                        <td><?php echo $rowc['A6b'];?></td>
                    </tr>
                    <tr>
                     <td>c. identifying personal interests and professional growth</td>
                        <td><?php echo $rowc['A6c'];?></td>
                    </tr>
                    
                    <tr>
                     <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a. commitment to life long learning</td>
                    <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b.	In-service training</td>
                    <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                     <td>c.	Formal study opportunities</td>
                    <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                    <tr>
                     <td>d.	Participation in professional organizations, seminars and meetings</td>
                    <td><?php echo $rowc['Ed'];?></td>
                    </tr>
                    <tr>
                    <td>e.	Institutional support</td>
                    <td><?php echo $rowc['Ee'];?></td>
                    </tr>
                    <tr>
                    <td>f.	Personal development</td>
                    <td><?php echo $rowc['Ef'];?></td>
                    </tr>
                    
                    <?php endwhile; ?>
                   
                </tbody>
                  </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
                 <div id="j" class="tab-pane">
                <h2><center><font><strong> J. FACULTY RELATIONSHIPS</strong></font></center></h2>
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
                    
                    $FacultyEvalJ = "SELECT * FROM FacultyEFJ ORDER BY idFacultyEFJ DESC limit 1;";
                    
                    
                    $c = mysqli_query($dbc, $FacultyEvalJ);
                    
                    while($rowc = mysqli_fetch_array($c)):?>
                    <tr>
                    <td>With Fellow Faculty Members </td>
                        <td>---</td>
                    </tr>
                    <tr>
                     <td>1.	The faculty observe a Code of Ethics.</td>
                    <td><?php echo $rowc['A1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	There is a faculty association.</td>
                    <td><?php echo $rowc['A2'];?></td>
                    </tr>
                     <tr>
                     <td>3.The faculty association</td>
                     <td>---</td>
                    </tr>
                     <tr>
                     <td>a.	provides for the personal and professional growth of its members</td>
                        <td><?php echo $rowc['A3a'];?></td>
                    </tr>
                    <tr>
                     <td>b.	promotes faculty welfare   </td>
                    <td><?php echo $rowc['A3b'];?></td>
                    </tr>
                    <tr>
                     <td>4.	There are interdisciplinary/intercollege faculty  discussions.</td>
                        <td><?php echo $rowc['A4'];?></td>
                    </tr>
                    <tr>
                     <td>5.	Collegial relationship among the faculty. </td>
                        <td><?php echo $rowc['A5'];?></td>
                    </tr>
                    <tr>
                     <td>With Administration</td>
                        <td>---</td>
                    </tr>
                    <tr>
                     <td>1. The faculty are involved in</td>
                        
                        <td>---</td>
                        
                                </tr>
                    <tr>
                     <td>a.	the formulation/revision of the institution's purposes and objectives</td>
                        <td><?php echo $rowc['WA1a'];?></td>
                        
                    </tr>
                    <tr>
                     <td>b.	policy‑making</td>
                        <td><?php echo $rowc['WA1b'];?></td>
                    </tr>
                    <tr>
                     <td>c.	evaluation of the program/s</td>
                        <td><?php echo $rowc['WA1c'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Academic committees include faculty members.</td>
                        <td><?php echo $rowc['WA2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	Communication lines between administration and faculty are open.</td>
                        <td><?php echo $rowc['WA3'];?></td>
                    </tr>
                    <tr>
                     <td>4.	The principle of academic freedom to which the institution subscribes is clear to the faculty.</td>
                        <td><?php echo $rowc['WA4'];?></td>
                    </tr>
                    <tr>
                     <td>5.	There is a provision for a grievance committee.</td>
                        <td><?php echo $rowc['WA5'];?></td>
                    </tr>
                    <tr>
                     <td>6.	There are opportunities for faculty‑administration dialogues.</td>
                        <td><?php echo $rowc['WA6'];?></td>
                    </tr>
                    <tr>
                     <td> With Students </td>
                        <td>---</td>
                    </tr>
                    <tr>
                     <td>1.	Faculty members are responsive to students' needs.</td>
                        <td><?php echo $rowc['WS1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Faculty members are available for academic advising and consultation.</td>
                        <td><?php echo $rowc['WS2'];?></td>
                    </tr>
                    <tr>
                     <td>3.	The faculty participate in co‑curricular/extra‑curricular activities.</td>
                        <td><?php echo $rowc['WS3'];?></td>
                    </tr>
                    <tr>
                     <td>4.	The faculty respond positively to grievances expressed by students.</td>
                        <td><?php echo $rowc['WS4'];?></td>
                    </tr>
                    <tr>
                     <td>5.	There is an atmosphere of accessibility of faculty to students.</td>
                        <td><?php echo $rowc['WS5'];?></td>
                    </tr>
                    <tr>
                     <td>With the other sectors of the school community</td>
                        <td>----</td>
                    </tr>
                    <tr>
                     <td>1.	Faculty members have healthy relationships with the non-academic personnel.</td>
                        <td><?php echo $rowc['WOSSC1'];?></td>
                    </tr>
                    <tr>
                     <td>2. Faculty members participate in school projects and services.</td>
                        <td><?php echo $rowc['WOSSC2'];?></td>
                    </tr>
                    <tr>
                     <td>With industry/professional organization </td>
                        <td>--</td>
                    </tr>
                    <tr>
                     <td>1.	Faculty member are members of professional organizations.</td>
                        <td><?php echo $rowc['WIPO1'];?></td>
                    </tr>
                    <tr>
                     <td>2.	Faculty members maintain collaborative relationships with industry partners.</td>
                        <td><?php echo $rowc['WIPO2'];?></td>
                    </tr>
                    <tr>
                      <td><center> <bold>----------------------------------------------------------------------------------------------------------------EVALUATION ------------------------------------------------------------------------------------------------------------------</bold></center></td>
                    </tr>
                    <tr>
                     <td>a.	Relationships with fellow faculty members </td>
                        <td><?php echo $rowc['Ea'];?></td>
                    </tr>
                    <tr>
                     <td>b.	Relationships with administration </td>
                        <td><?php echo $rowc['Eb'];?></td>
                    </tr>
                    <tr>
                    <td>c.	Relationships with students</td>
                        <td><?php echo $rowc['Ec'];?></td>
                    </tr>
                    <tr>
                    <td>d.	Relationships with other sectors of the school community</td>
                        <td><?php echo $rowc['Ed'];?></td>
                    </tr>
                    <tr>
                    <td>e.	Relationships with industry and professional organizations</td>
                        <td><?php echo $rowc['Ee'];?></td>
                    </tr>
                    
                   <?php endwhile; ?>
                </tbody>
                  </table>
                        
                </div>
                </div> 
                <!-- /tab-pane -->
               
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
$("#4").addClass("active");
</script>
</body>

</html>
