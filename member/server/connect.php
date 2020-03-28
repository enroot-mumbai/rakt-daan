
<?php

// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");

session_start();
$servername = "localhost";
$username = "root";
$password = "";

//session_start();
// var_dump($_POST);
// print_r($_POST);

// Create connection
$conn = mysqli_connect($servername, $username,$password);

$database = "ekseanek";
mysqli_select_db($conn, $database) or die(mysql_error());

// // Check connection
if ($conn->connect_error) {
    die('Could not connect: ' . mysqli_error());
}
?>