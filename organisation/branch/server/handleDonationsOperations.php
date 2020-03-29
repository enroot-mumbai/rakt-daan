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
    
    if(isset($_POST['approve'])){
        $sql = "UPDATE `memberDonations` SET `donationApproved`='yes' where `id`= '$donationID' ";
        //echo $sql;
        $conn->query($sql);
        
?>
<script>
    window.location="../collectionDateDonation.php?date=<?php echo $getMemberDonations['collectionDateID'] ?>";
</script>
<?php } ?>