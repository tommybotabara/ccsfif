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
  <script type="text/javascript">
         $(function() {
            $( "#dateee" ).datepicker({dateFormat: 'yy'});
         });
      </script>

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

        }
        else{
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
          if (empty($_POST['degree_level']))
          {
              $dlevel_id = FALSE;
              $message.='<p>You forgot to select degree Level!';
          }
          else
              $dlevel_id = $_POST['degree_level'];


          if (empty($_POST['degreeEarned']))
          {
              $DEGREE_ID = FALSE;
              $message.='<p>You forgot to select degree Earned!';
          }
          else
              $DEGREE_ID = $_POST['degreeEarned'];

          if (empty($_POST['specialization']))
          {
              $specialization = "";
              $message.='<p>You forgot to enter your specialization!';
          }
          else
              $specialization = $_POST['specialization'];
          
          if (empty($_POST['year_obtained']))
          {
              $year_obtained = "";
              $message.='<p>You forgot to enter the year you obtained your degree!';
          }
          else
              $year_obtained = $_POST['year_obtained'];

          if (empty($_POST['INSTITUTION_ID']))
          {
              $INSTITUTION_ID = "";
              $message.='<p>You forgot to enter Institution !';
          }
          else
              $INSTITUTION_ID = $_POST['INSTITUTION_ID'];

          if (empty($_POST['LOCATION_ID']))
          {
              $LOCATION_ID = "";
              $message.='<p>You forgot to select the location !';
          }
          else
              $LOCATION_ID = $_POST['LOCATION_ID'];


          if (empty($_POST['so_num']))
          {
              $so_num = "";
          }
          else
              $so_num = $_POST['so_num'];

          if(!isset($message))
          {
            $query10="select FFNAME, FLNAME 
                       from faculty 
                       where username = '{$_SESSION['username']}'";
              $check10 = mysqli_query($dbc,$query10);
              $row10 = mysqli_fetch_assoc($check10);
              

              $combineName = $row10['FLNAME']."_".$row10['FFNAME']."_".$specialization."_"."Y".$year_obtained."_"."DE";
			
			
			//AP SEARCH START
			$apq = "SELECT syid FROM ccsfif.schoolyear where schoolyearstart = '{$year_obtained}'";
			$apqr = mysqli_query($dbc, $apq);
			while($syrow = mysqli_fetch_array($apqr,MYSQLI_ASSOC))
			{
				$apsysid = $syrow['syid'];
			}
			
			$apq2 = "SELECT ap_id, schoolyearstart, schoolyearend FROM ccsfif.accreditation_period";
			$apqr2 = mysqli_query($dbc, $apq2);
			while($accp = mysqli_fetch_array($apqr2,MYSQLI_ASSOC))
			{
				$accperiodstart = $accp['schoolyearstart'];
				$accperiodend = $accp['schoolyearend'];
				$apCTR = $accperiodstart;
				while($apCTR != $accperiodend)
				{
					if($apCTR == $apsysid)
					{
						$docAP = $accp['ap_id'];
					}
					$apCTR = $apCTR + 1;
				}
			}
			//AP SEARCH END
			
            $date_modified =date("M d, Y");
          $file_parts=pathinfo($target1);
          $file_size=File_Size(filesize($target1));
          $file_type = $file_parts["extension"];
          $date_modified=date("M d, Y",filemtime($target1));

		  if(!isset($docAP))
		  {
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
                                                    0)";
          $result=mysqli_query($dbc,$query);
		  $message="{$choice1pic} added!<br>";
		  }
		  else 
			  {
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
                                                    0)";
          $result=mysqli_query($dbc,$query);
		  $message="{$choice1pic} added!<br>";
		  }
          

          //get the last insterted document ID
          $lastValueQuery = "SELECT *
                             FROM   document
                             ORDER BY ID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);
          while($row = mysqli_fetch_array($lastValueResult)){
              $documentID =$row[0];
          }

$query1010 = "SELECT schoolyearstart,
                     schoolyearend

              FROM accreditation_period ap,
                   schoolyear sy

              WHERE ap.schoolyearstart = sy.syid
              AND   ap.schoolyearend = sy.syid";

         
              $query = " INSERT INTO degree_earned 
                        (fid, 
                         dlevel_id, 
                         degree_id, 
                         specialization, 
                         year_obtained, 
                         institution_id, 
                         location_id, 
                         so_num,
                         documentID)

                        VALUES 
                        ('$fidd',
                         '$dlevel_id', 
                         '$DEGREE_ID', 
                         '$specialization', 
                         '$year_obtained', 
                         '$INSTITUTION_ID', 
                         '$LOCATION_ID',  
                         '$so_num',
                         '$documentID')";

              $result = mysqli_query($dbc, $query);
              $message="<div class='alert alert-success'> <b>  Degree Earned {$specialization} Successfully added!</b></div>";
              $flag = 1;

              

           


            
          }    
          
      }

    if (isset($message))
    echo '<font color="red">'.$message.'</font>';
 
  
 

    ?>


      <h2> Create Degree Earned </h2>
        <div class="row mt">
          <div class="col-lg-12">
          <div class="form-panel">

            <form class="form-horizontal style-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Degree Level <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <select class="form-control" id="degree_level" name="degree_level">
                        <?php
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
                          $query="select   * 
                                  from degree  
                                    limit 7;";
                          $result=mysqli_query($dbc,$query);

                          while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row['DEGREE_ID']}>{$row['DEGREE_TITLE']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Area of Specialization <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="specialization" value="<?php if (isset($_POST['specialization']) && !$flag) echo $_POST['specialization']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Year Obtained <font color="red">*</font></label>
                  <div class="col-sm-10">
        						<select class="form-control" id="year_obtained" name="year_obtained">
              						<?php
              						$query="SELECT * FROM ccsfif.schoolyear WHERE schoolyearstart < year(CURRENT_TIMESTAMP) order by schoolyearstart desc;";
              						$result=mysqli_query($dbc,$query);

              						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
              						{
              						  echo "<option value={$row['schoolyearstart']}>".$row['schoolyearstart']."</option>";
              						}
              						?>
        						</select>
                  </div>
                </div>  
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Education Institution <font color="red"> *</font></label>
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
                  <label class="col-sm-2 col-sm-2 control-label">Location <font color="red">*</font></label>
                  <div class="col-sm-10">
                      <select class="form-control" id="LOCATION_ID" name="LOCATION_ID">
                        <?php
                          $query2="select   * 
                                  from location  limit 30
                                    ;";
                          $result2=mysqli_query($dbc,$query2);

                          while($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row2['LOCATION_ID']}>{$row2['LOCATION_NAME']}</option>";
                          }
                        ?>
                    </select>
                  </div>
                </div>    




                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">S.O. Number</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="so_num" value="<?php if (isset($_POST['so_num']) && !$flag) echo $_POST['so_num']; ?>">
                  </div>
                </div>

                <div class="form-group">

                  <label class="col-sm-2 col-sm-2 control-label">Evidence <font color="red">*</font></label>
                  <div class="col-sm-10">
                    <input type="file" name="file"/>
                  </div>
                </div>

                *Note: Foreign universities are exempt from S.O. Number.
                <br>

                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" name="submit" type="submit" onclick="myFunction()">Add New</button>
                    <a href="FDegreesEarned.php"><button class="btn btn-theme04" type="button">Back</button></a>
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
function myFunction() {
  var txt;
  var r = confirm("Are you sure you want to submit your form? Select OK to confirm.");
  if (r == true) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;

}
</script>

    <script>
$("#5").addClass("active");
$("#5a").addClass("active");
    </script>

</body>

</html>
