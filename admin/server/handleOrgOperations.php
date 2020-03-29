<?php 

    require 'connect.php';
    $orgEmail = $_SESSION['orgEmail'];
    $orgID = $_POST['orgID'];
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `organization` SET `organisationStatus`='active' where `id`= '$orgID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../organizations.php"</script>';
    }
    
    if(isset($_POST['reject'])){
        $sql = "UPDATE `organization` SET `organisationStatus`='disabled' where `id`='$orgID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../organizations.php"</script>';
    }
?>