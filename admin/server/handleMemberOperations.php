<?php 

    require 'connect.php';
    $orgEmail = $_SESSION['orgEmail'];
    $memberID = $_POST['memberID'];
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `users` SET `memberStatus`='active' where `id`= '$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
    
    if(isset($_POST['reject'])){
        $sql = "UPDATE `users` SET `memberStatus`='disabled' where `id`='$memberID' ";
        //echo $sql;
        $conn->query($sql);
        echo '<script>window.location="../members.php"</script>';
    }
?>