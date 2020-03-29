<?php require 'connect.php';

    if(isset($_POST['organiserEmail']) && !empty($_POST['organiserEmail']) AND isset($_POST['password']) && !empty($_POST['password'])){
   
        $username = stripslashes($_POST['organiserEmail']);
        $password = stripslashes($_POST['password']);
        // echo $username; exit();
        $search = mysqli_query($conn,"SELECT * FROM organization WHERE organiserEmail='$username'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
    
        if($search['organiserEmail']){
            if($search['organiserVerified']==1){
                if (password_verify($password, $search['organiserPassword'])) {
                    $_SESSION["orgUserName"]=$search['organiserName'];
                    $_SESSION["orgEmail"]=$search['organiserEmail'];
                    $_SESSION["orgUserID"]=$search['id'];
                    $_SESSION["organizerLoggedIn"] = 1;
                    //echo $_SESSION["orgUserName"];
                    echo '<script>window.location="../index.php"</script>';

                } else {
                    echo '<script>window.location="../login.php?msg=Incorrect Password&msg2=Kindly enter correct password"</script>';
                }
            }
            else{
                echo '<script>window.location="../login.php?msg=Account not verified&msg2=Kindly verify your account from email"</script>';
            }
            
        }
        else{
            echo '<script>window.location="../login.php?msg=Login Failed!&msg2=Please make sure that you enter the correct Email ID."</script>';
        }

    }

?>