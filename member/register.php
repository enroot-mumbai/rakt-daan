
<!DOCTYPE html>
<html lang="en">
<?php

if(isset($_GET['msg']) && !empty($_GET['msg']) AND isset($_GET['msg2']) && !empty($_GET['msg2'])){
    $msg1 = $_GET['msg'];
    $msg2 = $_GET['msg2'];
}
?>

<head>
   <!--Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ek se Anek</title>
   <!--plugins:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
   <!--endinject -->
   <!--plugin css for this page -->
   <!--End plugin css for this page -->
   <!--inject:css -->
  <link rel="stylesheet" href="../css/style.css">
   <!--endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <style>
    .content-wrapper-gradient {
      background: -webkit-gradient(linear, left top, right top, from(#6c63ff), to(#4641ff));
      background: linear-gradient(90deg, #6c63ff, #4641ff);
      opacity: .8;
    }
  </style>
  
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper content-wrapper-gradient d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <h4>New to Ek se Anek?</h4>
              </div>
              <p class="text-danger"><?php echo $msg1 ?></p>
                  <p class="text-primary"><?php echo $msg2 ?></p>
              <!--<h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>-->
              <form action="server/register.php" method="POST" class="pt-3">
                <div class="form-group">
                  <input name="userName" required type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Full Name">
                </div>
                <div class="form-group">
                  <input name="userEmail" required type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                
                <div class="form-group">
                  <input onkeyup='check();' required name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input onkeyup='check();' required type="password" class="form-control form-control-lg" id="confirm_password" placeholder="Confirm Password">
                </div>
                <span id='message'></span>
                  <br/>
                  <br/>

                <div class="form-group">
                  <select name="organisationName" required type="text" class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>--Select Organization--</option>
                    <?php
                        include "server/connect.php";

                        $sql = "select organisationName from organization";
                        $result = mysqli_query($conn, $sql);
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['organisationName'] ."'>" . $row['organisationName'] ."</option>";
                        }

                    ?>
                  </select>
                </div>
                <br/>
                <br/>
                <div class="mt-3">
                  <input type="submit" id="submit" value="SIGN UP" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
       <!--content-wrapper ends -->
    </div>
     <!--page-body-wrapper ends -->
  </div>
   <!--container-scroller -->
   <!--plugins:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></script>
   <!--endinject -->
   <!--inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
   <!--endinject -->
  
    <script>
    
    var check = function() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password Matches';
        document.getElementById('submit').removeAttribute("disabled");
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password is not matching';
        document.getElementById('submit').setAttribute("disabled", "disabled");
      }
    }
    
    
  </script>
</body>

</html>
