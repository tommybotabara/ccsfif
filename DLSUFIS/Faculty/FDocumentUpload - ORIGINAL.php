<?php
session_start();
        require_once('../mysql_connect.php');
        if($_SESSION['POSITION_ID']!="P0004" && $_SESSION['POSITION_ID']!="P0003" ) {
          header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."../login.php"); 
        }

require_once(__DIR__.'/../mysql_connect.php');



if (isset($_POST['submit'])){
        $message=NULL;

        $file_name=$_POST['description_entered'];

    

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


        if(!isset($message)){
          $date_added =date("Y-m-d");
          $date_modified =date("Y-m-d");

    

          $query="INSERT INTO document       (filename,
                                              date_added,
                                              date_modified,
                                              file_uploaded)

                                            VALUES ('{$file_name}',
                                                    '{$date_added}',
                                                    '{$date_modified}',
                                                    '{$file_uploaded}')";
          $result=mysqli_query($dbc,$query);

          $message="{$choice1pic} added!<br>";





  }
  else{

  }
}

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



<!DOCTYPE html>
<html lang="en">

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
    <link href="../../lib/dropzone/css/dropzone.css" rel="stylesheet" />


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
        <div class="row mt">
          <div class="col-lg-12">
    
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Upload Documents</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map"> View Documents</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">

                      <div class="row mt">
                        <div class="white-panel mt">
                          <div class="panel-body">
                           <form action="#file" method='post' enctype="multipart/form-data">
                            Description of File: <input type="text" name="description_entered"/><br><br>
                            <input type="file" name="file"/><br><br>

                            <input type="submit" name="submit" value="Upload"/>

                            </form>
                          </div>
                        </div>
                      </div>
                  
                           
                    </div>
                    <!-- /OVERVIEW -->
                  </div>




                  <!-- /tab-pane -->
        <div id="contact" class="tab-pane">
          <div class="row">
            <div class="col-md-12">
            </div>
            <!-- /col-md-6 -->
            <div class="col-md-12 detailed">




                     <?php 
                            //
                            $query2 = "SELECT  *
                                       FROM    document";
                            $result2 = mysqli_query($dbc,$query2);


                            ?>
                   <table class="table table-striped table-advance table-hover">
                <hr>
                <thead>
                  <tr>
                    <th><i class=""></i>File Name</th>
                    <th><i class=""></i>File Size</th>
                    <th><i class=""></i>File Type</th>
                    <th><i class=""></i>Date Modified</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <?php
                    $files = scandir("uploads");
                      for ($a = 2; $a < count($files); $a++) {
                      $file =pathinfo($files[$a]);
                      $extension = $file['extension'];
                      $dateAdded = filemtime($files[$a]);
                      
                              
                    ?>
                    <td>
                      <a download="<?php echo $files[$a] ?>" href="uploads/<?php echo $files[$a] ?>"> <?php echo $files[$a] ?> </a>
                    </td>

                    <td> <?php echo $extension ?>
                    <td> <?php echo $files[$a] ?>
                      
                    </td>
                    

                      <!--<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> -->
                     
                    
                  </tr>
                  <?php
                            }


                            ?>


                </tbody>
              </table>
          


                       
                        </div>
                        <div class="col-md-8 col-md-offset-2 mt">
                       
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane CREATE NEW AACCOUNT-->
            
                      
                     
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
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
  <script src="../../lib/dropzone/dropzone.js"></script>


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
</body>

</html>
