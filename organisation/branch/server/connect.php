
<?php
session_start();
// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");

$servername = "localhost";
$username = "ekseanekAdmin";
$password = "ekseanek!pW";



// Create connection
$conn = mysqli_connect($servername, $username,$password);

$database = "ekseanek";
mysqli_select_db($conn, $database) or die(mysql_error());

// // Check connection
if ($conn->connect_error) {
    die('Could not connect: ' . mysqli_error());
}



?>