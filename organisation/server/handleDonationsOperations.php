<?php 

    require 'connect.php';
    $orgEmail = $_SESSION['orgEmail'];
    $orgid = $_SESSION["orgUserID"];
    $donationID = $_POST['donationID'];
    
    $getMemberDonations = mysqli_query($conn,"SELECT * FROM memberDonations WHERE id='$donationID'") or die(mysqli_error($conn)); 
    $getMemberDonations = mysqli_fetch_assoc($getMemberDonations);
    
    $totalPlastic = $getMemberDonations['plasticWeight'];
    $totalFootwear = $getMemberDonations['footwearQuantity'];
    $orgid = $getMemberDonations['organisationID'];
    $memberID = $getMemberDonations['memberID'];
    $collectionDateID= $getMemberDonations['collectionDateID'];
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `memberDonations` SET `donationApproved`='yes' where `id`= '$donationID' ";
        //echo $sql;
        $conn->query($sql);
        
        $sql1 = "UPDATE `organization` SET `totalPlastic`=`totalPlastic`+'$totalPlastic',`totalFootwear`=`totalFootwear`+'$totalFootwear' where `id`= '$orgid' ";
        $conn->query($sql1);
        
        $sql2 = "UPDATE `collectionDates` SET `totalPlastic`=`totalPlastic`+'$totalPlastic',`totalFootwear`=`totalFootwear`+'$totalFootwear' where `id`= '$collectionDateID' ";
        $conn->query($sql2);
        
        $sql3 = "UPDATE `users` SET `totalPlastic`=`totalPlastic`+'$totalPlastic',`totalFootwear`=`totalFootwear`+'$totalFootwear' where `id`= '$memberID' ";
        $conn->query($sql3);
        
?>
<script>
     window.location="../collectionDateDonation.php?date=<?php echo $getMemberDonations['collectionDateID'] ?>";
</script>
<?php } ?>