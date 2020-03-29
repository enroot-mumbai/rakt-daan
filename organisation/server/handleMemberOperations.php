<?php 

    require 'connect.php';
    $orgEmail = $_SESSION['orgEmail'];
    $orgid = $_SESSION["orgUserID"];
    $memberID = $_POST['memberID'];
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `users` SET `memberStatus`='active' where `organisationID`= '$orgid' AND `id`= '$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
    
    if(isset($_POST['reject'])){
        $sql = "UPDATE `users` SET `memberStatus`='disabled' where `organisationID`= '$orgid' AND `id`='$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
?>