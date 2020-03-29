<?php 

    require 'connect.php';


        $organiserName=addslashes($_POST['organiserName']);
        $organiserEmail=addslashes($_POST['organiserEmail']);
        $organiserPassword=addslashes($_POST['organiserPassword']);
        $organiserPhone=addslashes($_POST['organiserPhone']);
        $organisationName =addslashes($_POST['organisationName']);
        $organiserDesignation =addslashes($_POST['organiserDesignation']);
        $branchName =addslashes($_POST['branchName']);
       
        $addressLine1 =addslashes($_POST['addressLine1']);
        $addressLine2 =addslashes($_POST['addressLine2']);
        $state =addslashes($_POST['state']);
        $city =addslashes($_POST['city']);
        $zipcode =addslashes($_POST['zipcode']);
        $landmark =addslashes($_POST['landmark']);
        
        
        $options = [
            'cost' => 8,
        ];
        $hashPassword =  password_hash($organiserPassword, PASSWORD_BCRYPT, $options);
        
        $hashEmail = password_hash($organiserEmail,PASSWORD_BCRYPT, $options );
        
        $table = 'branch';
        
        $sql = "select organiserEmail from $table where organiserEmail= '$organiserEmail'";
        $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                // Finding email exists in database
                echo '<script>window.location="../register.php?msg=User already exists with this email account&msg2=Kindly login or register with another email account."</script>';
            }
         } else {
            $sql = "insert into $table (branchName,organiserDesignation,organiserName,organiserEmail,organiserPassword,organisationEmailHash,organiserPhone,addressLine1,addressLine2,state,city,zipcode,landmark,organisationID) 
            values ('$branchName','$organiserDesignation','$organiserName','$organiserEmail','$hashPassword','$hashEmail','$organiserPhone','$addressLine1','$addressLine2','$state','$city','$zipcode','$landmark','$organisationName')";

            $conn->query($sql);
            

            $to      = $organiserEmail; // Send email to our user
            $subject = 'Verify your email at Ek se Anek'; // Give the email a subject 
            $message = "
             
            Thanks for signing up! \n
            Your account has been created.
            You can login with the following email id after you have activated your account by pressing the url below.
             
            ------------------------
            Email: '.$organiserEmail.'
            ------------------------
             
            Please click this link to activate your account:
            http://esa.enrootmumbai.in/organisation/branch/verifyEmail.php?email='$organiserEmail'&hash=$hashEmail"; 

            $headers = array("From: contact@esa.enrootmumbai.in",
                "Reply-To: contact@esa.enrootmumbai.in",
                "X-Mailer: PHP/" . PHP_VERSION,
                'Cc: contact@esa.enrootmumbai.in' . "\r\n"
            );
            $headers = implode("\r\n", $headers);
            if(mail($to, $subject, $message, $headers)){
                echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Thank you for Registering, please verify your email&msg2=We have sent a verification email to your account kindly verify and login.(During high traffic it might take 2-3 minutes for mail) "</script>';
            }
            else{
                echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=We could not send email&msg2=Kindly check the email id or try again in 2 minutes"</script>';
            }

         }


?>