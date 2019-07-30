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


          if (empty($_POST['description']))
          {
              $description = "";
              $message.='<p>You forgot to enter description !';
          }
          else
              $description = $_POST['description'];

          if (empty($_POST['gov_name']))
          {
              $gov_name = "";
              $message.='<p>You forgot to enter org_name !';
          }
          else
              $gov_name = $_POST['gov_name'];


          if (empty($_POST['project_site']))
          {
              $project_site = "";
              $message.='<p>You forgot to enter the project site!';
          }
          else
              $project_site = $_POST['project_site'];


          if (empty($_POST['start_date']))
          {
              $start_date = "";
          }
          else
              $start_date = $_POST['start_date'];

           if (empty($_POST['end_date']))
          {
              $end_date = "";
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

              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$description."_".$start_date."_"."CommServiceInGovOrgs";
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
            
            
              $query = "INSERT INTO community_service
                        (cs_type, 
                         fid, 
                         description, 
                         gov_name, 
                         project_site, 
                         start_date, 
                         end_date,
                         documentID)

                                VALUES 
                        ('CS003', 
                         '$fidd', 
                         '$description', 
                         '$gov_name', 
                         '$project_site', 
                         '$start_date', 
                         '$end_date',
                       '$documentID')";


              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b>  Community Service in Government Orh and Agencies Successfully added!</b></div>";
              $flag = 1;



            
          }    
          
      }

          if (isset($message))
    echo '<font color="red">'.$message.'</font>';
 
  

      ?>
        <h2>  Add New Community Service With Government Organizations and Agencies </h2>
        <div class="row mt">
          <div class="col-lg-12">

          <div class="form-panel">
            <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Description of Involvement/Service/Work Done <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" value="<?php if (isset($_POST['description']) && !$flag) echo $_POST['description']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Government Organzation and Agencies <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="gov_name" value="<?php if (isset($_POST['gov_name']) && !$flag) echo $_POST['gov_name']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"> Project/ Activity Site <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="project_site" value="<?php if (isset($_POST['project_site']) && !$flag) echo $_POST['project_site']; ?>">
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

                  <label class="col-sm-2 col-sm-2 control-label">Evidence <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="file" name="file"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" name="submit" type="submit" onclick="return confirm('Are you sure?')">Add New</button>
                    <a href="FCSinGovOrgsAndAgencies.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>

              </form>
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
$("#8").addClass("active");
$("#8c").addClass("active");
    </script>
</body>

</html>
