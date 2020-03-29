<?php
include('connect.php');
session_start();

$file = $_GET['location'];
$location = "../../organisation/server/uploads/aadharUpload/".$file;
$dir ='';
$fsize = filesize($location);
    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header("Content-Type: image/jpg");
    header("Content-Disposition: attachment; filename=\"".basename($file)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);

    ob_clean();
    flush();
    readfile( $location );

?>

