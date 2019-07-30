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
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
 <section id="main-content">
      <section class="wrapper site-min-height">
         <h3> Edit Teaching Experience and Length of Service </h3>
        <div class="row mt">
          <div class="col-lg-12">

         <?php

    if (isset($_POST['submit']))
      {
          $message = NULL;

          if (empty($_POST['level']))
          {
              $el_id = "";
              $message.='<p>You forgot to select your level!';
          }
          else
              $el_id = $_POST['level'];
          
          if (empty($_POST['INSTITUTION_ID']))
          {
              $institution_id = "";
              $message.='<p>You forgot to enter the institution!';
          }
          else
              $institution_id = $_POST['INSTITUTION_ID'];

          
          if (empty($_POST['no_years']))
          {
              $years = "";
              $message.='<p>You forgot to enter year!';
          }
          else
              $years = $_POST['no_years'];


          if (empty($_POST['start_date']))
          {
              $start_date = "";
              $message.='<p>You forgot to select the Start Date !';
          }
          else
              $start_date = $_POST['start_date'];


          if (empty($_POST['end_date']))
          {
              $end_date = "";
          }
          else
              $end_date = $_POST['end_date'];

          if (empty($_POST['POSITION_ID']))
          {
              $position = "";
          }
          else
              $position = $_POST['POSITION_ID'];


          if(!isset($message))
          {
            
              $query = "UPDATE teaching_experience 
                           SET el_id = '$el_id', 
                               no_years = '$years', 
                               institution_id = '$institution_id', 
                               start_date = '$start_date', 
                               end_date = '$end_date',
                               position_id = '$position' 
                         WHERE te_id = {$_SESSION['te_id']}";


              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b> Teaching Experience Successfully edited!</b></div>";
          }    
          
      }

    if (isset($message)) {
    echo '<font color="red">'.$message.'</font>';
  }
    ?> 
        <?php 

        $tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";

                    $ttr = mysqli_query($dbc, $tt);

                    $fid = mysqli_fetch_array($ttr);

                    $fidd= $fid['fid'];


            $_SESSION['te_id'] = $_GET['id'];

            $q="SELECT te.te_id as id, el.el_title, i.institution_name, te.start_date, te.end_date, te.no_years, p.position_id ,p.position_title
                                  FROM teaching_experience te, educ_level el, position p , institution i 
                                  WHERE te.fid = $fidd 
                                  AND el.el_id = te.el_id
                                  AND te.position_id = p.position_id 
                                  AND te.institution_id = i.institution_id
                                  AND te.te_id= {$_GET['id']} ";


            $qr = mysqli_query($dbc, $q);
            while($row = mysqli_fetch_array($qr)):
          ?>



          <div class="form-panel">

          <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Educational Level</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="level" name="d" value='<?php echo $row['el_id'];?>'>
                        <?php
                          $query8="select   * 
                                  from educ_level  
                                    limit 30;";
                          $result8=mysqli_query($dbc,$query8);
                          while($row8=mysqli_fetch_array($result8,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row8['EL_ID']}>{$row8['EL_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Academic Institution</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="INSTITUTION_ID" name="INSTITUTION_ID">
                        <?php
                          $query3="select   * 
                                  from Institution  limit 30
                                    ;";
                          $result3=mysqli_query($dbc,$query3);

                          while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row3['INSTITUTION_ID']}>{$row3['INSTITUTION_NAME']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. of Years</label>
                  <div class="col-sm-10">
                    
                    <input type="text" class="form-control" name="no_years" value="<?php echo $row['no_years'];?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                    <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="start_date" value="<?php echo $row['start_date'];?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">End Date</label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="end_date" value="<?php echo $row['end_date'];?>">
                    <span class="help-block">Select date or on going?</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Position</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="position_id" name="POSITION_ID" value='<?php echo $row['position_id'];?>'> 
                        <?php
                        echo "<option value={$row['position_id']}>{$row['position_title']}</option>";
                          $query4="select   * 
                                  from position  limit 30
                                    ;";
                          $result4=mysqli_query($dbc,$query4);
                          
                          while($row4=mysqli_fetch_array($result4,MYSQLI_ASSOC))
                          {
                              
                              echo "<option value={$row4['POSITION_ID']}>{$row4['POSITION_TITLE']}</option>";
                          }


                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" name="submit" type="submit">Save Changes</button>
                    <a href="FTeachingExperience.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>
              </form>
              <?php endwhile; ?> 
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
$("#5").addClass("active");
$("#5d").addClass("active");
    </script>
</body>

</html>
