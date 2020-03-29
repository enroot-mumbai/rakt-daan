<?php 

    require 'connect.php';
    $orgid = $_SESSION["orgUserID"];
    $branchID = $_POST['branchID'];    
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `branch` SET `branchStatus`='active' where `organisationID`= '$orgid' AND `id`= '$branchID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../branches.php"</script>';
    }
    
    if(isset($_POST['reject'])){
        $sql = "UPDATE `branch` SET `branchStatus`='disabled' where `organisationID`= '$orgid' AND `id`= '$branchID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../branches.php"</script>';
    }
?>