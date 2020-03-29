<?php 
 require 'server/connect.php';
    
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

            $email = mysqli_real_escape_string($conn,$_GET['email']); // Set email variable
            $hashnew = mysqli_real_escape_string($conn,$_GET['hash']); // Set hash variable
           
            $email = stripslashes($email);
            $hashnew = stripslashes($hashnew);
    
            $table = 'users';
            
            $zero ='0';
    
            $query = "select * from $table where userEmail= $email AND emailHash='$hashnew' AND verified=$zero";
    
            $search = mysqli_query($conn,$query) or die(mysqli_error($conn)); 
    
            $match  = mysqli_num_rows($search);
    
            if($match > 0){
                mysqli_query($conn,"UPDATE $table SET verified='1' WHERE userEmail=$email AND emailHash='$hashnew' AND verified=$zero") or die(mysqli_error($conn));
                echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Congratulations. Your account is verified !!!&msg2=You can now login with your email."</script>';
            }
            else{
                echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Could not verify account&msg2=The url is either invalid or you already have activated your account."</script>';
            }
        }
        else{
            echo '<script>window.location="http://esa.enrootmumbai.in/userMessage.php?msg=Invalid approach&msg2=Please use the link that has been send to your email."</script>';
        }
    

?>

