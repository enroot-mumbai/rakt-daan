<?php 

    require 'connect.php';

        $userName=addslashes($_POST['userName']);
        $userEmail=addslashes($_POST['userEmail']);
        $password=addslashes($_POST['password']);
        $organisationName=addslashes($_POST['organisationName']);
        
        $options = [
            'cost' => 8,
        ];
        
        $hashPassword =  password_hash($password, PASSWORD_BCRYPT, $options);
        
        $emailHash = password_hash($userEmail,PASSWORD_BCRYPT, $options );
        
        $sql2 = "select id from organization where organisationName='$organisationName'";
        
        $org_id = mysqli_query($conn, $sql2);
        $org_id = mysqli_fetch_assoc($org_id);
        $org_id = $org_id['id'];
        
        $table = 'users';
        
        $sql = "select userEmail from $table where userEmail= '$userEmail'";
        $result = mysqli_query($conn, $sql);
        //echo "fetched from users table";
         if (mysqli_num_rows($result) > 0) {
             //echo "if loop";
            while($row = mysqli_fetch_assoc($result)) {
                // Finding email exists in database
                echo '<script>window.location="../register.php?msg=User already exists with this email account&msg2=Kindly login or register with another email account."</script>';
            }
         } else {
             //echo "else loop";
            $sqlnew = "insert into $table(userName,userEmail,password,emailHash,organisationID) 
            values ('$userName','$userEmail','$hashPassword','$emailHash',$org_id)";
            //echo $sqlnew;
            $result = mysqli_query($conn, $sqlnew);
            //echo $result;
            
            $to      = $userEmail; // Send email to our user
            $subject = 'Verify your email at Ek se Anek'; // Give the email a subject 
            $message = "
             
            Thanks for signing up! \n
            Your account has been created.
            You can login with the following email id after you have activated your account by pressing the url below.
             
            ------------------------
            Email: '.$userEmail.'
            ------------------------
             
            Please click this link to activate your account:
            http://esa.enrootmumbai.in/member/verifyEmail.php?email='$userEmail'&hash=$emailHash"; 

            $headers = array("From: contact@enrootmumbai.in",
                "Reply-To: contact@enrootmumbai.in",
                "X-Mailer: PHP/" . PHP_VERSION,
                'Cc: contact@enrootmumbai.in' . "\r\n"
            );
            $headers = implode("\r\n", $headers);
            if(mail($to, $subject, $message, $headers)){
                echo '<script>window.location="userMessage.php?msg=Thank you for Registering, please verify your email&msg2=We have sent a verification email to your account kindly verify and login.(During high traffic it might take 2-3 minutes for mail) "</script>';
            }
            else{
                echo '<script>window.location="userMessage.php?msg=We could not send email&msg2=Kindly check the email id or try again in 2 minutes"</script>';
            }

         }


?>