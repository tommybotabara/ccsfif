<header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="facultydashboard.php" class="logo"><b>DLSU<span>CCS</span></b></a>
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
                                  tasktitle
                              FROM
                                  task
                                  
                              WHERE
                                  FACULTY_FID = $fidd
                                      AND statusid = 3 order by taskid DESC limit 5;";
                
                

                  $notifCountquery = "SELECT taskid
                                    FROM
                                        task 
                                    WHERE
                                  FACULTY_FID = $fidd
                                      AND statusid = 3;";
                
                  $resultnotifCount = mysqli_query($dbc,$notifCountquery);
                  $notifCount = $resultnotifCount->num_rows;
                
                  $brothers = mysqli_query($dbc, $jonas);

                  ?>

              <span class="badge bg-theme"><?php echo $notifCount;?></span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have <?php echo $notifCount; ?> pending tasks</p>
              </li>

           <?php while($row = mysqli_fetch_array($brothers)):?> 
              <li>
                <a href="index.html#">
                  <div class="task-info">
                <div class="desc"><?php echo $row['tasktitle'];?> </div>
                  </div>

                </a>
              </li>
                
            <?php endwhile; ?>
              <li class="external">
                <center><a href="FacultyTasksList.php">See Task Page</a></center>
              </li>
            </ul>
          </li>

        
        <!--  notification end -->

         <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">1</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 1 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
      </div>
      </ul>
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
          <h5 class="centered">Faculty Mode</h5>


          <li class="mt">
            <a id=1 href="facultydashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          <li class="mt">
            <a id=2 class="" href="FIF.php">
              <i class="fa fa-cogs"></i>
              <span>Faculty Information Form</span>
              </a>
          </li>

         

          <li class="mt">
            <a id=3 class="" href="FacultyTasksList.php">
              <i class="fa fa-tasks"></i>
              <span>Task Lists</span>
              </a>
          </li>

         
          <li class="mt">
            <a id=4 class="" href="Fworkload.php">
              <i class="fa fa-book"></i>
              <span>Faculty WorkLoad</span>
              </a>
          </li>
            <li class="sub-menu">
            <a id=5 href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Profile and Experience</span>
              </a>
            <ul class="sub">
              <li id=5a><a href="FDegreesEarned.php">Degrees Earned</a></li>
               <li id=5b><a class="" href="FDegreeBeingPursued.php">Degree being pursued</a></li>
              <li id=5c><a class="" href="FSpecialTraining.php">Special Training</a></li>
              <!-- (e.g. post-doctoral work, post-baccalaureate diploma, post-baccalaureate certificate, etc.) -->

              <li id=5d><a class="" href="FTeachingExperience.php">Teaching Experience and Length of Service</a></li>
              <li id=5e><a class="" href="FProfessionalExperience.php">Professional Experience</a></li>
              <li id=5f><a class="" href="FProfessionalPractice.php">Professional Practice Outside
              <!--  Professional Practice, Industrial Practice, or Employment outside DLSU other than teaching
-->         </a></li>

            </ul>
          </li>

          <li class="sub-menu">
            <a id=6 href="javascript:;">
              <i class="fa fa-group"></i>
              <span>Professional Activities 1</span>
              </a>
            <ul class="sub">
              <li id=6a><a href="FleadershipInProfOrg.php">Leadership in professional orgs</a></li>
               <li id=6b><a class="" href="FMembershipInProfOrg.php">Membership in Professional orgs</a></li>
              <li id=6c><a class="" href="FOutstandingAchievement.php">Outstanding Achievement/Awards</a></li>
              <!--  Outstanding Achievements/Awards/Recognition Received since 2005 -->
         </a></li>

            </ul>
          </li>

            <li class="sub-menu">
            <a id=7 href="javascript:;">
              <i class="fa fa-group"></i>
              <span>Professional Activities 2</span>
              </a>
            <ul class="sub">
            <!-- since 2005 -->
              <li id=7a><a class="" href="FJournalPublication.php">Journal Publication</a></li>
              <li id=7b><a class="" href="FPrototype.php">Prototype</a></li>
              <li id=7c><a class="" href="Patents.php">Patents</a></li>
              <li id=7d><a class="" href="FBooksAndTextbooks.php">Books and Textbooks</a></li>
              <li id=7e><a class="" href="FPublishedPapers.php">Papers Published in conference proceedings</a></li>
              <li id=7f><a class="" href="FPublishedShortStories.php">Published Short stories and etc.</a></li>
              <!--  Published short stories, novel, poetry, play, screenplay, creative work (since 2005)-->

              <li id=7g><a class="" href="FPlayScreenplay.php">Play, screenplay, film & etc.</a></li>
              <li id=7h><a class="" href="FOtherResearchOutputs.php">Other research outputs</a></li>
              <li id=7i><a class="" href="FConferencesAttended.php">Conferences, workshops, and etc. attended</a></li>
              <!--
               Play, screenplay, film, creative work performed or presented (since 2005)
               Other research outputs (working papers; research reports; conference papers/posters, etc) since 2005
               Conferences, workshops, seminars, and training programs attended (since 2005)
              -->
            </ul>
          </li>


            <li class="sub-menu">
            <a id=8 href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Community service</span>
              </a>
            <ul class="sub">
              <li id=8a><a href="FCSinDLSU.php">In DLSU</a></li>
              <!-- (Department, Unit, College, University) Activities (since 2005) -->
              <li id=8b><a href="FCSinProfOrg.php">In Professional Organization</a></li>
              <!--  In Professional Organizations (Local and International) since 2005 -->
               <li id=8c><a class="" href="FCSinGovOrgsAndAgencies.php">With Government Organizations and Agencies</a></li>
               <!-- With Government Organizations and Agencies (since 2005) x -->
                <li id=8d><a class="" href="FCSinOthers.php">Others</a></li>
                <!-- Others (e.g. NGOs, advocacy groups, neighborhood associations, local communities, Rotary, Lions, church, faith, and community) since 2005 -->

            </ul>
          </li>
        
        <!-- sidebar menu end-->
      </div>
    </aside>