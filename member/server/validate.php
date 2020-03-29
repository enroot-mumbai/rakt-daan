<?php
include('connect.php');
// session_start();
$email = $_POST['validate'];
$sql = "update organization set organiserVerified=1 where organiserEmail='".$email."'";
$res = mysqli_query($conn,$sql);
header("Location: ../../member/")
;// echo $email;
?>