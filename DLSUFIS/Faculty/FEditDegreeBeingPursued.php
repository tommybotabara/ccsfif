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
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datetimepicker/datertimepicker.css" />
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
        <h3>Edit Degree Being Pursued  </h3>
        <div class="row mt">
          <div class="col-lg-12">
        <?php
        $tt ="SELECT fid 
            FROM faculty 
            WHERE username = '{$_SESSION['username']}' ";

      $ttr = mysqli_query($dbc, $tt);

      $fid = mysqli_fetch_array($ttr);

      $fidd= $fid['fid'];

          if(isset($_POST['submit'])){

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

                  $message=NULL;
                  
                  if (empty($_POST['degree_level']))
                    {
                        $degree_level = "";
                        $message.='<p>You left degree_level blank!';
                    }
                  else
                      $degree_level = $_POST['degree_level'];

                  if (empty($_POST['degreeEarned']))
                    {
                        $degreeEarned = "";
                        $message.='<p>You left degree_earned blank!';
                    }
                  else
                      $degreeEarned = $_POST['degreeEarned'];

                  if (empty($_POST['degree_stages']))
                  {
                      $DS_CODE = "";
                      $message.='<p>You forgot to select the Degree Stages !';
                  }
                  else
                      $DS_CODE = $_POST['degree_stages'];


                 
                  if (empty($_POST['earned_units']))
                    {
                        $earned_units = "";
                        $message.='<p>You left earned_units blank!';
                    }
                  else
                      $earned_units = $_POST['earned_units'];

                  if (empty($_POST['INSTITUTION_ID']))
                    {
                        $institution_id = "";
                        $message.='<p>You left INSTITUTION_ID blank!';
                    }
                  else
                      $institution_id = $_POST['INSTITUTION_ID'];

                  

                  if (empty($_POST['start_date']))
                    {
                        $start_date = "";
                        $message.='<p>You left start_date blank!';
                    }
                  else
                      $start_date = $_POST['start_date'];

                  if (empty($_POST['end_date']))
                    {
                        $end_date = "";
                        $message.='<p>You left end_date blank!';
                    }
                  else
                      $end_date = $_POST['end_date'];
                  

                  if(!isset($message))
                    {


                      $query10="select FFNAME, FLNAME 
                               from faculty 
                               where username = '{$_SESSION['username']}'";
                      $check10 = mysqli_query($dbc,$query10);
                      $row10 = mysqli_fetch_assoc($check10);

                      $query11="select DEGREE_TITLE
                               from degree 
                               where degree_id = '$degreeEarned'";
                      $check11 = mysqli_query($dbc,$query11);
                      $row11 = mysqli_fetch_assoc($check11);

                      $query12="select DS_NAME
                               from degree_stages
                               where DS_CODE = '$DS_CODE'";
                      $check12 = mysqli_query($dbc,$query12);
                      $row12 = mysqli_fetch_assoc($check12);


                      $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$row11['DEGREE_TITLE']."_".$row12['DS_NAME']."_"."DP";
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


                        $query="UPDATE degree_pursue 
                                   SET dlevel_id = '$degree_level', 
                                       degree_id = '$degreeEarned', 
                                       institution_id = '$institution_id',
                                       degree_stages = '$DS_CODE', 
                                       earned_units = '$earned_units',
                                       start_date = '$start_date', 
                                       end_date = '$end_date',
                                       documentID = '$documentID'   


                                 WHERE dp_id = {$_SESSION['dp_id']}";
                                  
                        $result = mysqli_query($dbc, $query);
                        $message="<div class='alert alert-success'> <b> Degrees Being Pursued Successfully edited!</b></div>";
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

                $_SESSION['dp_id'] = $_GET['id'];


                $q= "SELECT DISTINCT dp.dp_id as id, d.degree_title, dp.institution_id, ds.ds_name, dp.earned_units, dp.start_date, dp.end_date, dl.dlevel_title, i.institution_name, dp.dlevel_id, dp.degree_id, i.institution_id, ds.ds_name, ds.ds_code, d.degree_id
                      FROM degree_pursue dp, degree d, degree_level dl, degree_stages ds  , Institution i
                      WHERE 
                       dp.degree_id = d.degree_id 
                      AND dp.dlevel_id = dl.dlevel_id
                      AND dp.institution_id = i.institution_id 
                      AND dp.degree_stages = ds.ds_code
                      AND dp.dp_id = {$_GET['id']}
                      ";

                    
                $qr = mysqli_query($dbc, $q);
                while($row = mysqli_fetch_array($qr)):
              ?>





               <p> *IF PURSUING GRADUATE STUDIES, please fill up the following table:</p>
               <br>

         <div class="form-panel">
                   <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET['id']; ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Level <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <select class="form-control" id="degree_level" name="degree_level" >
                        <?php

                          echo "<option value={$row['dlevel_id']}>{$row['dlevel_title']}</option>";
                          $query1="select   * 
                                  from degree_level  
                                    limit 9;";
                          $result1=mysqli_query($dbc,$query1);

                          while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row1['DLEVEL_ID']}>{$row1['DLEVEL_TITLE']}</option>";
                          }
                        ?>
                    </select>       
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Earned <font color="red">*</font></label>
                  <div class="col-sm-10">
                      <select class="form-control" id="degreeEarned" name="degreeEarned">
                        <?php
                          echo "<option value={$row['degree_id']}>{$row['degree_title']}</option>";
                          $query="select   * 
                                  from degree  
                                    limit 7;";
                          $result=mysqli_query($dbc,$query);

                          while($row14=mysqli_fetch_array($result,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row14['DEGREE_ID']}>{$row14['DEGREE_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Education Institution <font color="red">*</font></label>
                  <div class="col-sm-10">
                      <select class="form-control" id="INSTITUTION_ID" name="INSTITUTION_ID">
                        <?php
                          echo "<option value={$row['institution_id']}>{$row['institution_name']}</option>";
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
                  <label class="col-sm-2 col-sm-2 control-label">Stage of Graduation Studies <font color="red">*</font></label>
                  <div class="col-sm-10">
                      <select class="form-control" id="degree_stages" name="degree_stages">
                        <?php
                        echo "<option value={$row['ds_code']}>{$row['ds_name']}</option>";
                          $query4="select   * 
                                  from degree_stages  limit 30
                                    ;";
                          $result4=mysqli_query($dbc,$query4);
                          while($row4=mysqli_fetch_array($result4,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row4['DS_CODE']}>{$row4['DS_NAME']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. of Units Completed <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="earned_units" value="<?php echo $row['earned_units'];?>">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Start Date <font color="red">*</font></label>
                    <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="start_date" value="<?php echo $row['start_date'];?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">End Date <font color="red">*</font></label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium" size="16" type="date" name="end_date" value="<?php echo $row['end_date'];?>">
                    <span class="help-block">Select date or on going?</span>
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
                    <button class="btn btn-theme" name="submit" type="submit" onclick="return confirm('Are you sure?')">Save Changes</button>
                    <a href="FDegreeBeingPursued.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>
            

            </form>

            <?php endwhile; ?> 
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
  <script src="../../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
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
$("#5b").addClass("active");
    </script>
</body>

</html>
