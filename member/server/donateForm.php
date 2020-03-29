<?php 

    require 'connect.php';
    
    $userEmail = $_SESSION['Email'];

        $date=addslashes($_POST['date']);
        if(isset($_POST['totalPlastic'])){
            $totalPlastic= addslashes($_POST['totalPlastic']);
        }else{
            $totalPlastic=0;
        }
        
        if(isset($_POST['totalFootwear'])){
            $totalFootwear= addslashes($_POST['totalFootwear']);
            if(isset($_POST['footwearType'])){
                $footwearType= addslashes($_POST['footwearType']);
            }
            else{
                $footwearType= "none";
            }
        }
        else{
            $totalFootwear= 0;
            $footwearType= "none";
        }
        if(isset($_POST['plant'])){
            $plant= addslashes($_POST['plant']);
        }
       
        $sql2 = "select * from users where userEmail='$userEmail'";
        
        $userDetails = mysqli_query($conn, $sql2);
        $userDetails = mysqli_fetch_assoc($userDetails);
        $org_id = $userDetails['organisationID'];
        if($userDetails['branchID'] == '' ){
            $branch_id = -1;
        }
        else{
            $branch_id = $userDetails['branchID'];
        }
        
        $member_id = $userDetails['id'];
       
        $table = 'memberDonations';
        $sql = "select * from $table where memberID= '$member_id' AND collectionDateID='$date'";
        $result = mysqli_query($conn, $sql);
        //echo "fetched from users table";
         if (mysqli_num_rows($result) > 0) {
             //echo "if loop";
            while($row = mysqli_fetch_assoc($result)) {
                // Finding email exists in database
                echo '<script>window.location="../donateNow.php?msg=You already decided donation for this date&msg2=Please select another date."</script>';
            }
         } else {
             //echo "else loop";
            $sqlnew = "INSERT INTO `memberDonations`(`memberID`, `collectionDateID`, `branchID`, `organisationID`, `plasticWeight`, `footwearType`, `footwearQuantity`, `plantType`) 
            values ('$member_id','$date','$branch_id','$org_id','$totalPlastic','$footwearType','$totalFootwear','$plant')";
            //echo $sqlnew;
            $result = mysqli_query($conn, $sqlnew);
            //echo $result;
            
            echo '<script>window.location="../donateNow.php?msg=Thank you for adding your name to For Donation&msg2=Remember the date and give your donation to your organisation."</script>';

         }


?>