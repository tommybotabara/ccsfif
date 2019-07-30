<!DOCTYPE html>
<html lang="en">
<?php
        session_start();
        require_once('../mysql_connect.php');
       
       
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
          background-color: #fefefe;a
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
      require_once("topnavbar.php");
      require_once("sidenavbar.php");
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
              if (empty($_POST['Remindertitle']))
              {
                  $Remindertitle = FALSE;
                  $message.='<p>You forgot to enter your reminder title!';
              }
              else
                  $Remindertitle = $_POST['Remindertitle'];
             
            if (empty($_POST['reminderdescription'])) //it should be optional here lol
              {
                  $reminderdescription = FALSE;
                  $message.='<p>You forgot to enter your Reminder Description!';
              }
              else
                  $reminderdescription = $_POST['reminderdescription'];



              if (empty($_POST['datereminder']))
              {
                  $datereminder = FALSE;
                  $message.='<p>You forgot to select your date reminder!';
              }
              else
                  $datereminder = $_POST['datereminder'];

              if (empty($_POST['intervalschedule']))
              {
                  $intervalschedule = FALSE;
                  $message.='<p>You forgot to select your task due date!';
              }
              else
                  $intervalschedule = $_POST['intervalschedule'];
                
            
              if (empty($_POST['assign']))
              {
                  $assign = FALSE;
                  $message.='<p>You forgot to select your task due date!';
              }
              else
                  $assign = $_POST['assign'];
               
              
            $date = date('Y-m-d');


            if(!isset($message))
            {
              $insert ="INSERT INTO Reminders 
                        (title, description, date, Assignto)
                        VALUES 
                        ('$Remindertitle', '$reminderdescription','$datereminder','$assign')";

              $result = mysqli_query($dbc, $insert);

              $message ="<div class='alert alert-success'> <b> Reminder :  {$Remindertitle} Successfully SET!</b></div>";
                
               
              $flag = 1;                 

           
         
                        }
          }
          if (isset($message))
          echo '<font color="red">'.$message.'</font>';

            ?>
           
        
        <body>

        <h2> Reminders </h2>

        <!-- Trigger/Open The Modal -->
        <button type="button" id="myBtn" class="btn btn-theme03"> Add New Reminder/ Deadline</button>


        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Add New Reminder/ Deadline</h2>
            </div>
       
            <div class="modal-body">
              <div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel">
                    <div class="form">
                      <form class="cmxform form-horizontal style-form" method="post" action="" onsubmit="return confirm('Are you sure you want to submit your form? Select OK to confirm.');">
                        <div class="form-group ">
                          <label class="control-label col-lg-2"> Reminders Title</label>
                          <div class="col-lg-5">
                            <input class=" form-control" type="text" name="Remindertitle" value="<?php if (isset($_POST['Remindertitle']) && !$flag) echo $_POST['Remindertitle']; ?>"/>
                          </div>
                        </div>
                          
                          
                          
                        <div class="form-group ">
                          <label class="control-label col-lg-2">Description</label>
                          <div class="col-lg-10">
                            <input class=" form-control" type="text" name="reminderdescription" value="<?php if (isset($_POST['reminderdescription']) && !$flag) echo $_POST['reminderdescription']; ?>"/>
                          </div>
                        </div>

                        <!-- yeeeet section -->
                        
                          <div class="form-group ">
                          <label class="control-label col-md-2">  Set date Reminder </label>

                          <div class="col-md-3 col-xs-11">
                              
                              
                          <input class="form-control form-control-inline input-medium" size="16" type="date" name="datereminder" value="<?php if (isset($_POST['datereminder']) && !$flag) echo $_POST['datereminder']; ?>">
                          <span class="help-block">Select date</span>
                        </div>
                         
                  

                          <label class="control-label col-md-2"> Every </label>
                            <div class="col-lg-3">
                            <select class="form-control" name="intervalschedule">
                            <option> ------Please select a schedule --------</option>
                            <option>Does not repeat</option>
                            <option>Daily</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Annually</option>
                            
                            </select>
                            </div>
                          </div>
                        

                        <div class="form-group">
                        <label class="control-label col-md-2">Assign to</label>
                        <div class="col-lg-3">
                        <select class="form-control" id="assign" name="assign">
                        <option value="0"> -----select group ---- </option>    
                        
                        <?php
                        $query11="Select position_title, id from position";
                        $result11=mysqli_query($dbc,$query11);
                            
                        while($row1=mysqli_fetch_array($result11,MYSQLI_ASSOC))
                        {
                            echo "<option value={$row1['id']}>{$row1['position_title']}</option>";
                        }
                            
                            
                            
                        ?>
                        <option value="7" >ALL</option>
                         
                            
                            </select>    
                            
                            
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" name="submit" type="submit">Save</button>
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
                    <th><i class=""></i> Title</th>
                    <th class="hidden-phone"><i class=""></i>Description</th>
                    <th class="hidden-phone"><i class=""></i> Date </th>
                    <th class="hidden-phone"><i class=""></i> Time</th>
                    <th class="hidden-phone"><i class=""></i> All day</th>
                    </tr>
                </thead>
                <tbody>

                <?php 

   
                    
                $jonas = "SELECT 
                                r.idreminders,
                                r.title,
                                r.description,
                                r.date,
                                r.time,
                                p.position_title
                            FROM
                                reminders r,
                                Position p
                            WHERE
                                r.Assignto = p.id;";

                    
                

                $brothers = mysqli_query($dbc, $jonas);

                while($row=mysqli_fetch_array($brothers)):?>
                <tr>
                  <td><?php echo $row['title'];?></div></td>
                  <td><?php echo $row['description'];?></div></td>
                  <td><?php echo $row['date'];?></div></td>
                  <td><?php echo $row['time'];?></div></td>
                  <td><?php echo $row['position_title'];?></div></td>
      
                  
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
$("#2a").addClass("active");
</script>


</body>

  
</html>
