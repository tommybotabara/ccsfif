<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0000") {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
        
    $flag=0;

$message = NULL;

$_SESSION['date'] = date("Y-m-d");
$_SESSION['itemID']=FALSE;

 if(!isset($_POST['date']))
    $date = $_SESSION['date'];
 else
    $date = $_POST['date'];


  if($date == date("Y-m-d"))
{
    $message="<div id='clockbox'></div>";
    $flag = 2;
}
    

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>CCS- Accreditation Management System</title>

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
 <script src="../../../assets/js/ie-emulation-modes-warning.js"></script>
        <script type="text/javascript">
        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

        function GetClock(){
        var d=new Date();
        var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
        var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds();
        if(nmin<=9) nmin="0"+nmin
        if(nsec<=9) nsec="0"+nsec;

        document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+"";
        }

        window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
        }
        </script>
       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
   <?php
      require_once("topnavbar.php");
      
      ?>
      
    <!--header end-->
    <!-- ************************************************************************************************************
        MAIN SIDEBAR MENU
        ************************************************************************************************************ -->
    <!--sidebar start-->
   <?php
      require_once("sidenavbar.php");
      ?>
    <!--sidebar end-->
    <!-- ***********************************************MAIN CONTENT ******************************************************** -->
    <!--main content start-->
      
    <section id="main-content">
      <section class="wrapper">
        <div class="row">    
          <div class="col-lg-12 main-chart">
              <div class="alert alert-info"><h2> <?php echo $message; ?></h2></div>
              <?php $id = $_GET['logDetails']; ?>

              <h1><center>LOGIN REPORT for <?php echo $id ?></center></h1>
              
              
        <table id="sampleTable" class="table table-bordered">
		  <thead>
			<tr>
			  <th style='font-size:20px; text-align: center;'>User</th>
			  <th style='font-size:20px; text-align: center;'>Time In</th>
			  <th style='font-size:20px; text-align: center;'>Time Out</th>
			</tr>	
	
              <tbody>
            <?php
                  
                  
                  
                  
                  $query = "SELECT username, time(dateTimeIn) as 'timeIn', time(dateTimeOut) as 'timeOut'
                            from login join faculty on login.fid = faculty.FID
                            where DATE(dateTimeIn) = '$id' order by timeIn";
                
                $result = mysqli_query($dbc, $query);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
                    echo "<tr>";
                    echo "<td style='font-size:20px; text-align: center;'>{$row['username']}</td>";
                    echo "<td style='font-size:20px; text-align: center;'>{$row['timeIn']}</td>";
                    echo "<td style='font-size:20px; text-align: center;'>{$row['timeOut']}</td>";
                    

                    

                    echo "</tr>";
                    echo "</form>";

                }

        

                ?>
		</tbody>
	   
</table>
        <a href="sadashboard.php"> <button class="btn btn-danger"> Back</button>      </a>
            </div>
          </div>
        </section>
      </section>

    
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
<!--          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved -->
        </p>
        <div class="credits">
          
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

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
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
</script>

    <script>
$("#sadashboard").addClass("active");
</script>
    
    </body>

</html>
