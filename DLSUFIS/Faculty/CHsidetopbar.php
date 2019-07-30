  <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="CHdashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout</a></li>
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
          <h2 class="centered" ><a href="facultymanageaccount.php"></h2>
          <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>
            <h5 class="centered">Committee Head Mode</h5>

          <li class="mt">
            <a id=1 class="" href="FCHdashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="mt">
            <a id=1a class="" href="FCHFIF.php">
              <i class="fa fa-dashboard"></i>
              <span>View FIF</span>
              </a>
          </li>



          <li class="mt">
            <a id=2  class="" href="FCHTasks.php">
              <i class="fa fa-tasks"></i>
              <span>Delegate Tasks</span>
              </a>
          </li>

          <li class="mt">
            <a id=3 class="" href="CHCalendar.php">
              <i class="fa fa-calendar"></i>
              <span>Calendar</span>
              </a>
          </li>
              
        <li class="mt">
            <a id=4 class="" href="FCHViewFacultyEval.php">
              <i class="fa fa-group"></i>
              <span>View Faculty Evaluation</span>
              </a>
          </li>
        <li class="mt">
            <a id=5 class="" href="FCHViewInstructionEval.php">
              <i class="fa fa-file-text-o"></i>
              <span>View Instruction Evaluation</span>
              </a>
          </li>



          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>