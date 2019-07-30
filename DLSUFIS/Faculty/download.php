<?php
include "mysql_connect.php";
if(isset($_GET['ID'])){
    $id = $_GET['ID'];
    $stat = $dbc->prepare("select * 
                          from document 
                          where ID=?");
    $stat->bindParam(1, $id);
    $stat->execute();
    $data = $stat->fetch();

    $file = 'media/'.$data['filename'];

    if(file_exists($file)   ){
        header('Content-Description: '. $data['description']);
        header('Content-Type: '.$data ['type']);
        header('Content-Disposition: '.$data['disposition'].'; filename="'.basename($file).'"');
        header('Expires: '.$data['expires']);
        header('Cache-Control: '.$data['cache']);
        header('Pragma: '.$data['pragma']);
        header('Content-Length: '.filesize($file));
        readfile($file);
        exit;
    }
}