<?php 

    require 'connect.php';


        $organiserName=addslashes($_POST['organiserName']);
        $organiserEmail=addslashes($_POST['organiserEmail']);
        $organiserPassword=addslashes($_POST['organiserPassword']);
        $organiserPhone=addslashes($_POST['organiserPhone']);
        $organisationName =addslashes($_POST['organisationName']);
        $organiserDesignation =addslashes($_POST['organiserDesignation']);
        // $hasBranches =addslashes($_POST['hasBranches']);
        $hasBranches = "no";
        $aadharnumber = addslashes($_POST['organiserAadharNum']);
        $targetdir = "uploads/aadharUpload/";
        $filename = md5($organiserEmail)."/aadharCard_".basename($_FILES['organiserAadharCard']['name']);
        // $upload = 1;
        // $location = getcwd();
        $targetFile = $targetdir . $filename;
        $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        // echo $targetFile; exit();
        // echo $targetFile; exit();
        mkdir("uploads/aadharUpload/".md5($organiserEmail),0777,true);
        // if($hasBranches == 'no'){
            $addressLine1 =addslashes($_POST['addressLine1']);
            $addressLine2 =addslashes($_POST['addressLine2']);
            $state =addslashes($_POST['state']);
            $city =addslashes($_POST['city']);
            $zipcode =addslashes($_POST['zipcode']);
            $landmark =addslashes($_POST['landmark']);
        // }
        // else{
        //     $addressLine1 ="";
        //     $addressLine2 ="";
        //     $state ="";
        //     $city ="";
        //     $zipcode ="";
        //     $landmark ="";
        // }
        
        $options = [
            'cost' => 8,
        ];
        $hashPassword =  password_hash($organiserPassword, PASSWORD_BCRYPT, $options);
        
        $hashEmail = password_hash($organiserEmail,PASSWORD_BCRYPT, $options );
        
        $table = 'organization';
        
        if($_FILES['organiserAadharCard']['size']>3000000){
            // echo "Sorry file is too large.";
            header("Location: ../register.php?msg=Upload file less than 3MB size");
        }

        $sql = "select organiserEmail from $table where organiserEmail= '$organiserEmail'";
        $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                // Finding email exists in database
                echo '<script>window.location="../register.php?msg=User already exists with this email account&msg2=Kindly login with this email or register with another email account."</script>';
            }
         } else {

            if(move_uploaded_file($_FILES['organiserAadharCard']['tmp_name'],$targetFile)){
                $sql = "insert into $table (organisationName,organiserDesignation,organiserName,organiserEmail,organiserPassword,organisationEmailHash,organiserPhone,hasBranches,addressLine1,addressLine2,state,city,zipcode,aadharNumber,aadharLocation,landmark) 
                values ('$organisationName','$organiserDesignation','$organiserName','$organiserEmail','$hashPassword','$hashEmail','$organiserPhone','$hasBranches','$addressLine1','$addressLine2','$state','$city','$zipcode','$aadharnumber','$filename','$landmark')";
           
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
                127.0.0.1/ek-se-anek/organisation/verifyEmail.php?email='$organiserEmail'&hash=$hashEmail"; 

                $headers = array("From: contact@enrootmumbai.in",
                    "Reply-To: contact@enrootmumbai.in",
                    "X-Mailer: PHP/" . PHP_VERSION,
                    'Cc: contact@enrootmumbai.in' . "\r\n"
                );
                $headers = implode("\r\n", $headers);
                if(mail($to, $subject, $message, $headers)){
                    echo '<script>window.location="../../userMessage.php?msg=Thank you for Registering, please verify your email&msg2=We have sent a verification email to your account kindly verify and login.(During high traffic it might take 2-3 minutes for mail) "</script>';
                }
                else{
                    echo '<script>window.location="../../userMessage.php?msg=We could not send email&msg2=Kindly check the email id or try again in 2 minutes"</script>';
                }
            }
         }


?>