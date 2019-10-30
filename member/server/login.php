<?php 
    require 'connect.php';

    if(isset($_POST['memberEmail']) && !empty($_POST['memberEmail']) AND isset($_POST['password']) && !empty($_POST['password'])){
   
        $username = stripslashes($_POST['memberEmail']);
        $password = stripslashes($_POST['password']);
    
        $search = mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$username'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
    
        if($search['userEmail']){
            if($search['verified']==1){
                if (password_verify($password, $search['password'])) {
                    $_SESSION["userName"]=$search['userName'];
                    $_SESSION["Email"]=$search['userEmail'];
                    $_SESSION["userID"]=$search['id'];
                    $_SESSION["memberLoggedIn"] = 1;
                    $_SESSION['mOrganisationID']=$search['organisationID'];
                    $_SESSION['mBranchID']=$search['branchID'];

                    echo '<script>window.location="http://esa.enrootmumbai.in/member/"</script>';
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