<?php
$dbc=mysqli_connect('localhost','root', 'password' ,'ccsfif');

if (!$dbc) {
 die('Could not connect: '.mysql_error());
}

?>