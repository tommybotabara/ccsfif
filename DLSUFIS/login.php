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
  <link href="../img/logodlsu.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
    <form class='form-login' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <?php
        session_start();
        require_once('mysql_connect.php');
       
        if (isset($_POST['submit']))
        {
          $q = "SELECT username, password FROM faculty;";
          $qr = mysqli_query($dbc, $q);
          
          $message=NULL;

          if (empty($_POST['username']))
          {
            $_POST['username']=FALSE;
            $message.='<p>Please enter your username.';
          } 
          else 
          {
            $_POST['username']=$_POST['username']; 
          }

          if (empty($_POST['password']))
          {
            $_POST['password']=FALSE;
            $message.='<p>Please enter your password';
          } 
          else 
          {
            $_SESSION['password']=$_POST['password']; 
          }
            
            $check1 = mysqli_query($dbc,$query1);
            $row1 = mysqli_fetch_assoc($check1);
            $_SESSION['loginNo'] = $row1['loginNumber']+1;
            

                    while($row=mysqli_fetch_array($qr,MYSQLI_ASSOC))
                    {
                         
                        if($row["username"] == $_POST['username'])
                        {
                            $user= $row["username"];
                            
                            if($row["password"] == $_POST['password'])
                            {
                                $pass = $row["password"];
                                $q1 = "SELECT POSITION_ID FROM faculty where username = '".$row['username']."';";
                      $qr1 = mysqli_query($dbc, $q1);

                                while($row2=mysqli_fetch_array($qr1,MYSQLI_ASSOC))
                                {
                                    $_SESSION['POSITION_ID'] = $row2["POSITION_ID"];
                                    $_SESSION['username'] = $row["username"];
                                    $_SESSION['password'] = $row["password"];
                                }
                
                if($_SESSION['POSITION_ID'] == "P0000"){
                    
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";

                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];

                  $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                    
                        
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/SystemAdmin/sadashboard.php");
                }
                                
                                

                else if($_SESSION['POSITION_ID'] == "P0001"){
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";
                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];
                    $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Qao/QaoDashboard.php");
                }
                
                else if($_SESSION['POSITION_ID'] == "P0002"){
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";
                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];
                    $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Chair/chairdashboard.php");
                }
                    
                else if($_SESSION['POSITION_ID'] == "P0003"){
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";
                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];
                    $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Faculty/facultydashboard.php");}
                
                else if($_SESSION['POSITION_ID'] == "P0004"){
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";
                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];
                    $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Faculty/facultydashboard.php");}
                            
                   else if($_SESSION['POSITION_ID'] == "P0005"){
                    $getlogin="select FID from faculty where username = '{$_SESSION['username']}'";
                    $check2 = mysqli_query($dbc,$getlogin);
                    $row2 = mysqli_fetch_assoc($check2);
                    $userID = $row2['FID'];
                    $getlogin2 ="INSERT INTO `login` (`fid`, `dateTimeIn`) VALUES ('{$userID}',NOW())";
                    $result=mysqli_query($dbc,$getlogin2);
                    
                    $loginNO="select MAX(loginID) as 'loginNumber' from login";
                    $check3 = mysqli_query($dbc,$loginNO);
                    $row4 = mysqli_fetch_assoc($check3);
                    $_SESSION['loginNo']=$row4['loginNumber'];
                  header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/Secretary/secretarydashboard.php");}
                            }
                        }
                    }
        }

      ?>

      
        <h2 class="form-login-heading">sign in</h2>
        <div class="login-wrap">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">
      <br>
      <?php
              if (isset($message))
        {
          echo '<font color="red">'.$message. '</font>';
        }
      ?>


            </span>
<br>
            </label>
          <input class="btn btn-theme btn-block" name="submit" value="SIGN IN" type="submit">
          
      
      
          </div>
    </form>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../img/patience.png", {
      speed: 500
    });
  </script>
</body>

</html>
