<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }
     // the message
            $msg = "First line of text\nSecond line of text";

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            mail("kirstenmiranda14@gmail.com","My subject",$msg);
       
?>

<style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          width: 80%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
          -webkit-animation-name: animatetop;
          -webkit-animation-duration: 0.4s;
          animation-name: animatetop;
          animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }

        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
          color: white;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }

        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }

        .modal-header {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        </style>


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
      require_once("CHsidetopbar.php");
      ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

            <!-- Trigger/Open The Modal -->

            <?php


            $flag=0;

            if(isset($_POST['submit']))
            {

              $message = NULL;       
              if (empty($_POST['taskdescription']))
              {
                  $taskdescription = FALSE;
                  $message.='<p>You forgot to enter your task!';
              }
              else
                  $taskdescription = $_POST['taskdescription'];
             
            if (empty($_POST['tasktitle']))
              {
                  $tasktitle = FALSE;
                  $message.='<p>You forgot to enter your task Title!';
              }
              else
                  $tasktitle = $_POST['tasktitle'];



              if (empty($_POST['yolo']))
              {
                  $yolo = FALSE;
                  $message.='<p>You forgot to select who you want to assign your task to!';
              }
              else
                  $yolo = $_POST['yolo'];


              if (empty($_POST['taskpriority']))
              {
                  $taskpriority = FALSE;
                  $message.='<p>You forgot to select your task priority!';
              }
              else
                  $taskpriority = $_POST['taskpriority'];
              

              if (empty($_POST['duedate']))
              {
                  $duedate = FALSE;
                  $message.='<p>You forgot to select your task due date!';
              }
              else
                  $duedate = $_POST['duedate'];
              
              if (empty($_POST['category']))
              {
                  $category = FALSE;
                  $message.='<p>You forgot to select your category!';
              }
              else
                  $category = $_POST['category'];
              

              if (empty($_POST['tasktype']))
              {
                  $tasktype = FALSE;
                  $message.='<p>You forgot to select your task type!';
              }
              else
                  $tasktype = $_POST['tasktype'];
                
            $nickjonas ="SELECT fid 
                        FROM faculty 
                        WHERE username = '{$_SESSION['username']}'";

                  $nickjonashart = mysqli_query($dbc, $nickjonas);

                  $fid = mysqli_fetch_array($nickjonashart);

                  $fidd= $fid['fid'];

              $status = 3; 
              $assigner = $fidd ; 
              $date = date('Y-m-d');


            if(!isset($message))
            {
              $insert ="INSERT INTO task 
                        (tasktitle, taskdescription, statusid, faculty_FID, priorityID, duedate, dateassigned, datecompleted, tasktypeID, assignerID, categoryID)
                        VALUES 
                        ('$tasktitle', '$taskdescription','$status','$yolo', '$taskpriority', '$duedate', '$date', NULL, '$tasktype', '$assigner','$category')";
                
              $result = mysqli_query($dbc, $insert);

              $message ="<div class='alert alert-success'> <b> Task:  {$tasktitle} Successfully added!</b></div>";
                
               
              $flag = 1; 
            
           $queryemail = "SELECT EMAIL FROM FACULTY WHERE FID = '$yolo'";
                
            $resultemail = mysqli_query($dbc, $queryemail);
            
            $rowemail=mysqli_fetch_array($resultemail);
            
            $emailaddress = $rowemail['EMAIL'];
            
            
            require 'phpmailer/PHPMailerAutoload.php';
            require 'credentials.php';

            $mail = new PHPMailer;

            //$mail->SMTPDebug = 4;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username =  EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'DLSU CCS ACCREDITATION MANAGEMENT SYSTEM');
            $mail->addAddress($emailaddress);     // Add a recipient

            $mail->addReplyTo(EMAIL);

            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'NEW TASK ALERT';
            $mail->Body    = 'A NEW TASK HAS BEEN SENT TO YOU <br> TASK: '. $tasktitle .'<br> Please log in to the system to view more details.';
            $mail->AltBody = ' NEW TASK HAS BEEN SENT TO YOU TASK: '. $tasktitle .'Please log in to the system to view more details.';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo "<div class='alert alert-success'> <b> Message has been sent to ". $emailaddress . "</b></div>";
            }
            }
          }
          if (isset($message))
          echo '<font color="red">'.$message.'</font>';

            ?>
           
        
        <body>

        <h2> TASKS </h2>

        <!-- Trigger/Open The Modal -->
        <button type="button" id="myBtn" class="btn btn-theme03"> Create New Task</button>


        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Create New Task</h2>
            </div>
       
            <div class="modal-body">
              <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                    <div class="form">
                      <form class="cmxform form-horizontal style-form" method="post" action="" onsubmit="return confirm('Are you sure you want to submit your form? Select OK to confirm.');">
                        <div class="form-group ">
                          <label class="control-label col-lg-2">Task Title</label>
                          <div class="col-lg-5">
                            <input class=" form-control" type="text" name="tasktitle" value="<?php if (isset($_POST['tasktitle']) && !$flag) echo $_POST['tasktitle']; ?>"/>
                          </div>
                        </div>
                          
                          
                          
                        <div class="form-group ">
                          <label class="control-label col-lg-2">Task Description</label>
                          <div class="col-lg-10">
                            <input class=" form-control" type="text" name="taskdescription" value="<?php if (isset($_POST['taskdescription']) && !$flag) echo $_POST['taskdescription']; ?>"/>
                          </div>
                        </div>

                        <!-- yeeeet section -->
                        
                          <div class="form-group ">
                          <label class="control-label col-md-2"> Assigned to : </label>
                            <div class="col-lg-3">
                            <select class="form-control" id="yolo" name="yolo">
                            <option> ------Please select a person --------</option>
                            <?php 
                            $query1 = "SELECT fid, flname, ffname 
                                      FROM FACULTY;";
                            $result1=mysqli_query($dbc,$query1);

                            while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                          {
                              echo "<option value={$row1['fid']}>{$row1['flname']}, {$row1['ffname']}</option>";
                          }

                            ?>
                            </select>
                            </div>

                          <label class="control-label col-md-2"> Priority </label>
                            <div class="col-lg-3">
                            <select class="form-control" name="taskpriority">
                            <option> ------Please select a priority --------</option>
                            <?php 

                            $query2 ="SELECT *
                                            FROM taskpriority";
                            $result2 = mysqli_query ($dbc,$query2);

                            

                            while ($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                            {
                              echo "<option value={$row2['id']}>{$row2['priority'] }</option>";
                            

                            }

                            ?>
                          
                            </select>
                            </div>
                          </div>
                        

                        <div class="form-group">
                        <label class="control-label col-md-2">Due Date</label>
                        <div class="col-md-3 col-xs-11">
                          <input class="form-control form-control-inline input-medium" size="16" type="date" name="duedate" value="<?php if (isset($_POST['duedate']) && !$flag) echo $_POST['duedate']; ?>">
                          <span class="help-block">Select date</span>
                        </div>
                            
                            
                        <label class="control-label col-md-2"> Category </label>
                            <div class="col-lg-3">
                            <select class="form-control" name="category">
                            <option> ------Please select a category --------</option>
                            <?php 

                            $query11 ="SELECT *
                                            FROM category";
                            $result11 = mysqli_query ($dbc,$query11);

                            

                            while ($row11=mysqli_fetch_array($result11,MYSQLI_ASSOC))
                            {
                              echo "<option value={$row11['idcategory']}>{$row11['categoryname'] }</option>";
                            

                            }

                            ?>
                          
                            </select>
                            </div>
                      </div>

                    <div class="form-group">  
                    <label class="control-label col-md-2"> Task Type </label>
                            <div class="col-lg-2">
                            <select class="form-control" style="width: 50px" name="tasktype">
                            <option> ------Please select a task type --------</option>
                            <?php 

                            $query3 ="SELECT *
                                            FROM tasktype";
                            $result3 = mysqli_query ($dbc,$query3);

                            while ($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC))
                            {
                              echo "<option value={$row3['id']}>{$row3['type'] }</option>";
                            }
                            ?>
                            </select> 
                            </div>
                            </div>

                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" name="submit" type="submit">Add</button>
                          </div>
                        </div>
                          



                      </form>
                    </div>
                  </div>
                  <!-- /form-panel -->
                </div>
          <!-- /col-lg-12 -->
        </div>
            </div>

          </div>

        </div>


        <div class="row mt">
          <div class="col-lg-12">

          <div class="content-panel">
              <table id="sampleTable" class="table table-striped table-advance table-hover">
                
                <thead>
                  <tr>
                    <th><i class=""></i> Task</th>
                    <th class="hidden-phone"><i class=""></i>Status</th>
                    <th class="hidden-phone"><i class=""></i>Assigned to : </th>
                    <th class="hidden-phone"><i class=""></i>Priority</th>
                    <th class="hidden-phone"><i class=""></i> Due Date </th>
                    <th class="hidden-phone"><i class=""></i>Date Assigned</th>
                    <th class="hidden-phone"><i class=""></i>Date Completed</th>
                    <th class="hidden-phone"><i class=""></i>Task Type</th>
                    <th class="hidden-phone"><i class=""></i>Assigner</th>
                    </tr>
                </thead>
                <tbody>

                <?php 

   
                    
                $jonas = "SELECT 
                          t.taskID, t.tasktitle, s.active, f.flname, tp.priority, 
                          t.duedate, 
                          t.dateassigned, t.datecompleted, tt.type, getFacultyName(t.assignerID) as assignerName
                           FROM task t, status s, faculty f, taskpriority tp,tasktype tt
                           WHERE t.statusid= s.id
                           AND t.faculty_FID = f.fid
                           AND t.priorityid =tp.id
                           AND t.tasktypeID =tt.id ;";

                $brothers = mysqli_query($dbc, $jonas);

                while($row=mysqli_fetch_array($brothers)):?>
                <tr>
                  <td><?php echo $row['tasktitle'];?></div></td>
                  <td><?php echo $row['active'];?></div></td>
                  <td><?php echo $row['flname'];?></div></td>
                  <td><?php echo $row['priority'];?></div></td>
                  <td><?php echo $row['duedate'];?></div></td>
                  <td><?php echo $row['dateassigned'];?></div></td>
                  <td><?php echo $row['datecompleted'];?></div></td>
                  <td><?php echo $row['type'];?></div></td>
                  <td><?php echo $row['assignerName'];?></div></td>
                </tr>

                <?php endwhile; ?>  
                </tbody>

                </table>
                </div>
                </div>
                </div>


      </section>
    </section>

  
    <!--main content end-->
    <!--footer start-->

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
    <script type="text/javascript" src="../../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
      <script src="../../lib/advanced-form-components.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


  <script type="application/javascript">
    var checkboxes = $("input[type='checkbox']"),
    submitButt = $("input[type='submit']");

    checkboxes.click(function() {
        submitButt.attr("disabled", !checkboxes.is(":checked"));
    });
      
      
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
$(document).ready(function() {
   $('#sampleTable').DataTable();
});
</script>
<script>
$("#2").addClass("active");
</script>


</body>

  
</html>
