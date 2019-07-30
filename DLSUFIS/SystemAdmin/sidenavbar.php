 <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

         <?php
              $query1="select FFNAME, FLNAME from faculty where username = '{$_SESSION['username']}'";
              $check1 = mysqli_query($dbc,$query1);
              $row1 = mysqli_fetch_assoc($check1);
                  echo "<center>";
              echo "<h3> {$row1['FFNAME']} {$row1['FLNAME']} </h3>";
              echo "</center>";                
            ?>
          <h5 class="centered">System Administrator Mode</h5>

          <li class="mt">
            <a id="sadashboard" class="" href="sadashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

           <li class="mt">
            <a id=2a class="" href="SAsetdeadline.php">
              <i class="fa fa-bell-o"></i>
              <span>Set Deadline/Reminder</span>
              </a>
          </li>

          <li class="mt">
            <a id="saevent" class="" href="saEvent.php">
              <i class="fa fa-dashboard"></i>
              <span>FIF</span>
              </a>
          </li>

          <li class="mt">
            <a id=accounts href="SaAccounts.php">
              <i class="fa fa-cogs"></i>
              <span>Manage Accounts</span>
              </a>
          </li>

            <li class="sub-menu">
            <a  id="dlsudata" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>DLSU DATA</span>
              </a>
            <ul class="sub">
              <li id="fr"><a  href="SaFacultyRank.php">Faculty Rank</a></li>
              <li id="department"><a class="" href="SaDeparment.php">Departments</a></li>
              <li id="Units"><a class="" href="SaUnits.php">Units/College</a></li>
              <li id="Position"><a class="" href="SaPosition.php">Position and Classification</a></li>
              <li id="at"><a class="" href="SaSystemAccountType.php">System Account Type</a></li>
              <li id="sy"><a class="" href="SaSchoolYear.php">School Year</a></li>
            </ul>
          </li>

            <li class="sub-menu">
            <a id=4 href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Degrees, Institution& Location</span>
              </a>
            <ul class="sub">
              <li id=4a><a class="" href="SaDegreeRecords.php">Degree Records</a></li>
              <li id=4b><a class="" href="SaDegreeLevel.php">Degree Level Info</a></li>
              <li id=4c><a class="" href="SaAcademicInstRecords.php">Academic Institutions Records</a></li>
              <li id=4d><a class="" href="SaIndustryRecords.php">Industry Records</a></li>
              <li id=4e><a class="" href="SaOrganizationRecords.php">Organization Records</a></li>
              <li id=4f><a class="" href="SaLocationRecords.php">Location Records</a></li>
              <li id=4g><a class="" href="SaCountryRecords.php">Country Records</a></li>
            </ul>
          </li>


            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Publication Data</span>
              </a>
            <ul class="sub">
              <li><a href="SaJournalRecords.php">Journal Records Section</a></li>
              <li><a href="SaJournalPublicationType.php">Journal Publication Type</a></li>
               <li><a class="" href="SaCurrency.php">Currency</a></li>
            </ul>
          </li>
    
      
          <li class="sub-menu">
            <a id=accreditation href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Accreditation</span>
              </a>
            <ul class="sub">
              <li id=AP ><a href="SaAccreditationPeriod.php">Accreditation Period</a></li>
              <li id=Archive ><a href="SAarchive.php">Archive</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a id=wd href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Workload Data</span>
              </a>
            <ul class="sub">
              <li id=course ><a href="SaCourses.php">Courses</a></li>
              <li id=cm ><a href="SaCourseMaterials.php">Course Materials</a></li>
            </ul>
          </li>
        <!-- sidebar menu end-->
      </div>
    </aside>