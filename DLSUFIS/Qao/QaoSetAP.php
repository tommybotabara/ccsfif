 <!DOCTYPE html>
<html lang="en">



<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0001") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
  if (isset($_GET['check_task']))
  {

     $id = $_GET['check_task'];
     $date = date('Y-m-d');

     $yes = "UPDATE task 
                SET statusid = 4 , datecompleted = now()
                WHERE taskid =".$id;

      mysqli_query($dbc, $yes);

  }
    $flag=0;
    

       
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
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../../lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">
    <!-- *********************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        ******************************************************************************* -->
    <!--header start-->
    <?php
      require_once("sidenavbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper ">
          <h3><i class="fa fa-angle-right"></i>Set Accreditation Period</h3>
          <div class="row mt">
              
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="#" class="form-horizontal style-form">  
                  
              <div class="form-group">
                  <label class="control-label col-md-3">Start Period Date<font color="red">*</font></label>
                  <div class="col-md-3 col-xs-11">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                      <input type="text" name="start_date" readonly="" value="<?php if (isset($_POST['start_date']) && !$flag) echo $_POST['start_date']; ?>" size="16" class="form-control">
                      <span class="input-group-btn add-on">
                        <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                    <span class="help-block">Select date</span>
                  </div>
                </div>
                  
                 <div class="form-group">
                      <label class="control-label col-md-3">Application Date</label>
                      <div class="col-md-3 col-xs-11">
                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                          <input type="text" name="application_date" readonly="" value="<?php if (isset($_POST['application_date']) && !$flag) echo $_POST['application_date']; ?>" size="16" class="form-control">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select date</span>
                      </div>
                    </div>
                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Submission Date</label>
                      <div class="col-md-3 col-xs-11">
                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                          <input type="text" name="submission_date" readonly="" value="<?php if (isset($_POST['submission_date']) && !$flag) echo $_POST['submission_date']; ?>" size="16" class="form-control">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select date</span>
                      </div>
                    </div>
                  
                  
                  <div class="form-group">
                      <label class="control-label col-md-3">Visitation Date</label>
                      <div class="col-md-3 col-xs-11">
                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                          <input type="text" name="visitation_date" readonly="" value="<?php if (isset($_POST['visitation_date']) && !$flag) echo $_POST['visitation_date']; ?>" size="16" class="form-control">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select date</span>
                      </div>
                    </div>
                  
                   <div class="form-group">
                      <label class="control-label col-md-3">End Period Date (Overall) <font color="red">*</font></label>
                      <div class="col-md-3 col-xs-11">
                        <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="01-01-2014" class="input-append date dpYears">
                          <input type="text" name="end_date" readonly="" value="<?php if (isset($_POST['end_date']) && !$flag) echo $_POST['end_date']; ?>" size="16" class="form-control">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                        <span class="help-block">Select date</span>
                      </div>
                    </div>
                  
                   
                   <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-2">
                    <button class="btn btn-theme" type="submit">Submit</button>
                  </div>
                  </div>
                  
                  
                </form>
              </div>
              </div>
          
          </div>
         

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
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    </script>
<script>
$("#5").addClass("active");

</script>
</body>

</html>
