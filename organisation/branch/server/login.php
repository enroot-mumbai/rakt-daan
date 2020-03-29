<?php 
   require 'connect.php';

    if(isset($_POST['organiserEmail']) && !empty($_POST['organiserEmail']) AND isset($_POST['password']) && !empty($_POST['password'])){
   
        $username = stripslashes($_POST['organiserEmail']);
        $password = stripslashes($_POST['password']);
    
        $search = mysqli_query($conn,"SELECT * FROM branch WHERE organiserEmail='$username'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
    
        if($search['organiserEmail']){
            if($search['organiserVerified']==1){
                if (password_verify($password, $search['organiserPassword'])) {
                    $_SESSION["branchUserName"]=$search['organiserName'];
                    $_SESSION["branchEmail"]=$search['organiserEmail'];
                    $_SESSION["branchUserID"]=$search['id'];
                    $_SESSION["branchLoggedIn"] = 1;

                    echo '<script>window.location="http://esa.enrootmumbai.in/organisation/branch/"</script>';

                } else {
                    echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Incorrect Password&msg2=Kindly enter correct password"</script>';
                }
            }
            else{
                echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Account not verified&msg2=Kindly verify your account from email"</script>';
            }
            
        }
        else{
            echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Login Failed!&msg2=Please make sure that you enter the correct Email ID."</script>';

        }

    }

?>