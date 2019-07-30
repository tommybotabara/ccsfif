<?php








session_start();

require_once('mysql_connect.php');
$query = "UPDATE login SET dateTimeOut = NOW() WHERE loginID = {$_SESSION['loginNo']}";
echo $query;

$result=mysqli_query($dbc,$query);

if (!$result) {
    printf("Error: %s\n", mysqli_error($dbc));
    exit();
}


 $_SESSION=array();
 session_destroy();
 setcookie('PHPSESSID','',time()-300,'/','',0);

     header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/login.php");

?>




