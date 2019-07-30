 <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="QaoDashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
                
            <?php
              $nickjonas ="SELECT fid 
                        FROM faculty 
                        WHERE username = '{$_SESSION['username']}'";

                  $nickjonashart = mysqli_query($dbc, $nickjonas);

                  $fid = mysqli_fetch_array($nickjonashart);

                  $fidd= $fid['fid'];

                  $jonas = "SELECT 
                                  taskdescription
                              FROM
                                  task
                                  
                              WHERE
                                      statusid = 6;";
                

                  $notifCountquery = "SELECT taskid
                                    FROM
                                        task 
                                    WHERE
                                    statusid = 6;";
                  $resultnotifCount = mysqli_query($dbc,$notifCountquery);
                  $notifCount = $resultnotifCount->num_rows;
                
                  $brothers = mysqli_query($dbc, $jonas);

                  ?>

              <span class="badge bg-theme"><?php echo $notifCount;?></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have <?php echo $notifCount;?> pending tasks approval</p>
              </li>
                
            <?php while($row = mysqli_fetch_array($brothers)):?>
                <li>
                <a href="index.html#">
                  <div class="task-info">
                <div class="desc"><?php echo $row['taskdescription'];?> </div>
                  </div>

                </a>
              </li>
                <?php endwhile; ?>
              <li class="external">
                <center><a href="QaoApproval.php">See Approval Page</a></center>
              </li>
            </ul>
          </li>
 
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../login.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered"></h5>
          <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>
          <h5 class="centered">QAO Mode</h5>



          <li class="mt">
            <a id=1 class="" href="QaoDashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
            
          <li class="sub-menu">
            <a id=1a class="" href="Qaosetdeadline.php">
              <i class="fa fa-calendar"></i>
              <span>Set Reminder</span>
              </a>
          </li>   
            
          <li class="sub-menu">
            <a id=qve href="QaoViewEvidences.php">
              <i class="fa fa-desktop"></i>
              <span>View Faculty Evidence</span>
              </a>
          </li>  


          <li class="sub-menu">
            <a id=2 href="QaoFacultySummaryEvidence.php">
              <i class="fa fa-desktop"></i>
              <span>View Faculty Information</span>
              </a>
          </li>
            
        <li class="sub-menu">
            <a id=3 href="QaoFacultyWorkload.php">
              <i class="fa fa-desktop"></i>
              <span>View Faculty Workload</span>
              </a>
          </li>

          <li class="sub-menu">
          <a id=4 href="QaoApproval.php">
            <i class="fa fa-check-circle-o"></i>
              <span>Approval</span>
              </a>
          </li>
            
          <li class="sub-menu">
            <a id=5 href="QaoSetAP.php">
              <i class="fa fa-calendar-o"></i>
              <span>Set Accreditation Period</span>
              </a>
          </li>


          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>