<?php 

    require 'connect.php';
    

        $collectionDate=addslashes($_POST['collectionDate']);
        $organisationID =addslashes($_POST['orgId']);
        

        // $sql = "select organiserEmail from $table where organiserEmail= '$organiserEmail'";
        // $result = mysqli_query($conn, $sql);
        
        $sql = "INSERT INTO `collectionDates` (`date`, `branchID`) VALUES ('$collectionDate',$organisationID)";
        //echo $sql;
        $conn->query($sql);
        
        echo '<script>window.location="../collectionDates.php"</script>';
        
        //  if (mysqli_num_rows($result) > 0) {
        //     while($row = mysqli_fetch_assoc($result)) {
        //         // Finding email exists in database
        //         echo '<script>window.location="../register.php?msg=User already exists with this email account&msg2=Kindly login or register with another email account."</script>';
        //     }
        //  } else {
        //     $sql = "insert into $table (organisationName,organiserDesignation,organiserName,organiserEmail,organiserPassword,organisationEmailHash,organiserPhone,hasBranches,addressLine1,addressLine2,state,city,zipcode,landmark) 
        //     values ('$organisationName','$organiserDesignation','$organiserName','$organiserEmail','$hashPassword','$hashEmail','$organiserPhone','$hasBranches','$addressLine1','$addressLine2','$state','$city','$zipcode','$landmark')";
           
        //     $conn->query($sql);
            

        //  }


?>