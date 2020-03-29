<?php 

    require 'connect.php';

    $orgid = $_SESSION["branchUserID"];
    $memberID = $_POST['memberID'];
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `users` SET `memberStatus`='active' where `branchID`= '$orgid' AND `id`= '$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
    
    if(isset($_POST['reject'])){
        $sql = "UPDATE `users` SET `memberStatus`='disabled' where `branchID`= '$orgid' AND `id`='$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
?>