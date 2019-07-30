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

          $message = NULL;

          if (empty($_POST['paper_title']))
          {
              $paper_title = "";
              $message.='<p>You forgot to select the  Title !';
          }
          else
              $paper_title = $_POST['paper_title'];


          if (empty($_POST['paper_type']))
          {
              $paper_type = "";
          }
          else
              $paper_type = $_POST['paper_type'];

          if (empty($_POST['date_publication']))
          {
              $date_publication = "";
          }
          else
              $date_publication = $_POST['date_publication'];

          if (empty($_POST['remarks']))
          {
              $remarks = "";
          }
          else
              $remarks = $_POST['remarks'];

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

          
          if(!isset($message))
          {
            
              $query = "INSERT INTO publication
                           (pub_type, fid, paper_title, paper_type, date_publication, remarks, local, co_author)
                           VALUES 
                          ('PT010', '$fidd', '$paper_title', '$paper_type', '$date_publication', '$remarks', '$local', '$co_author')";

              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b>  Your Other Research Outputs has been Successfully added!</b></div>";
              $flag = 1;
          }    
          
      }

          if (isset($message))
    echo '<font color="red">'.$message.'</font>';
 
  
?>

        <h3> Add new Other research outputs (working papers; research reports; conference papers/posters, etc) since 2005 </h3>

        <div class="row mt">
          <div class="col-lg-12">

                    <div class="form-panel">

              <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="paper_title" value="<?php if (isset($_POST['paper_title']) && !$flag) echo $_POST['paper_title']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Type</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="paper_type" value="<?php if (isset($_POST['paper_type']) && !$flag) echo $_POST['paper_type']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Date</label>
                  <div class="col-md-3 col-xs-11">
                    <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" name="date_publication" value="<?php if (isset($_POST['date_publication']) && !$flag) echo $_POST['date_publication']; ?>">
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="remarks" value="<?php if (isset($_POST['remarks']) && !$flag) echo $_POST['remarks']; ?>">
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
                  <label class="col-sm-2 col-sm-2 control-label">Co-author</label>
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
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" name="submit" type="submit">Add New</button>
                    <a href="FOtherResearchOutputs.php"><button class="btn btn-theme04" type="button">Back</button></a>
                  </div>
                </div>

            </Form>

                       

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
$("#7").addClass("active");
$("#7h").addClass("active");
    </script>
</body>

</html>
