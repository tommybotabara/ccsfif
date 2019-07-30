<!DOCTYPE html>
<html lang="en">

<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) 
		{
			header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
		if (isset($_POST['Submit']))
		{


      //choice1
       if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
            $message="error no file";
           
        }
        else{
        
        
          $target1 ="uploads/".basename($_FILES['file']['name']);
          $choice1pic = addslashes(file_get_contents($_FILES['file']['tmp_name']));
          $file_uploaded = $_FILES['file']['name'];

           if (move_uploaded_file($_FILES['file']['tmp_name'], $target1)) {
                 
           }
           else{
                  $msg = "Failed to upload image<br>";
           }
        } 







			$tt ="SELECT fid FROM faculty where username = '{$_SESSION['username']}' ";
			$ttr = mysqli_query($dbc, $tt);
			$fid = mysqli_fetch_array($ttr);
            $fidd= $fid['fid'];
			
			$qct ="SELECT count(id) as count FROM ccsfif.workload";
			$qtr = mysqli_query($dbc, $qct);
			$ctrr = mysqli_fetch_array($qtr);
            $ctr= $ctrr['count'];
			$ctr = $ctr + 1;
			
			if (empty($_POST['workload']))
			{
				$_POST['PW']=FALSE;
				$message.='<p>Please enter the workload/activity name';
			} 
			if (empty($_POST['hours']))
			{
				$_POST['FN']=FALSE;
				$message.='<p>Please enter the workload/activty hours (per week)';
			}
			
			if(!isset($message))
			{








             $query10="select FFNAME, FLNAME 
                       from faculty 
                       where username = '{$_SESSION['username']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);




              $query12="select schoolyearstart
                       from schoolyear 
                       where syid = '{$_POST['sychoose']}'";
              $check12 = mysqli_query($dbc,$query12);
              $row12 = mysqli_fetch_assoc($check12);

              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$_POST["workload"]."_".$row12['schoolyearstart']."_"."Workload";
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

         



          //get the last insterted document ID
          $lastValueQuery = "SELECT *
                             FROM   document
                             ORDER BY ID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);
          while($row = mysqli_fetch_array($lastValueResult)){
              $documentID =$row[0];
          }









				$query="insert into workload (id,
                                      name,
                                      hours,
                                      fid,
                                      termid,
                                      schoolyearid,
                                      documentID) 


                            values ('{$ctr}',
                                    '{$_POST["workload"]}',
                                    '{$_POST["hours"]}',
                                    '{$fidd}',
                                    '{$_POST["termchoose"]}',
                                    '{$_POST["sychoose"]}',
                                    '$documentID')";
				$result=mysqli_query($dbc,$query);
				$success = "New Workload/activity added.";
			}					
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
   
          <h2> <center>Add Non-Academic Workload</center> </h2>  
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <div class="form-horizontal style-form">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <?php
					if(isset($message))
					{
						echo '<font color="red">'.$message. '</font>';
					}
					if(isset($success))
					{
						echo '<font color="green">'.$success. '</font>';
					}
				?>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Workload/Activity Name <font color="red">*</font></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="workload">
                  </div>
                </div> 
                    
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Hours (per week) <font color="red">*</font></label>
                  <div class="col-sm-2">
                    <input type="number" step="0.1" class="form-control" name="hours">
                  </div>
                </div> 
                    
                    
                <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">School Year <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="sychoose" name="sychoose">
						<?php
						$query="SELECT * FROM ccsfif.schoolyear;";
						$result=mysqli_query($dbc,$query);

						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
						  echo "<option value={$row['syid']}>".$row['schoolyearstart']."-".$row['schoolyearend']."</option>";
						}
						?>
						</select>
					</div>
                    </div>
                    
                    <div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Term <font color="red">*</font></label>
					<div class="col-sm-2">
						<select class="form-control" id="termchoose" name="termchoose">
						<?php
						$query1="SELECT * FROM ccsfif.term;";
						$result1=mysqli_query($dbc,$query1);

						while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
						{
						  echo "<option value={$row1['termid']}>".$row1['term']."</option>";
						}
						?>
						</select>
					</div>
                        </div>
					<?php 
						if(isset($_POST['Go']))
						{
							$termchoose = $_POST['termchoose'];
							$sychoose = $_POST['sychoose'];
						}
					
					?>


          <div class="form-group">

                  <label class="col-sm-2 col-sm-2 control-label">Evidence <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="file" name="file"/>
                  </div>
                </div>
                    
                    
						
					<div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
					<button class="btn btn-theme" name="Submit" type="Submit" value="Submit" onclick="return confirm('Are you sure?')">Add </button>
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
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
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
