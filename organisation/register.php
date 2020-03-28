<!DOCTYPE html>
<html lang="en">
<?php

if(isset($_GET['msg']) && !empty($_GET['msg']) AND isset($_GET['msg2']) && !empty($_GET['msg2'])){
    $msg1 = $_GET['msg'];
    $msg2 = $_GET['msg2'];
}
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ek se Anek</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                  
              <h4>Register Your Organization</h4>
              </div>
              <p class="text-danger"><?php echo $msg1 ?></p>
                  <p class="text-primary"><?php echo $msg2 ?></p>
              <!-- <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6> -->
              <form  action="server/register.php" method="POST" class="pt-3" enctype="multipart/form-data">

                <div class="form-group">
                  <input name="organiserName" type="text" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Organiser Full Name *">
                </div>
                
                <div class="form-group">
                  <input name="organiserEmail" type="email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email *">
                </div>
                
                <div class="form-group">
                  <input onkeyup='check();' name="organiserPassword" type="password" required class="form-control form-control-lg" id="password" placeholder="Password *">
                </div>
                
                <div class="form-group">
                  <input onkeyup='check();' type="password" required class="form-control form-control-lg" id="confirm_password" placeholder="Confirm Password *">
                </div>
                
                  <span id='message'></span>
                  <br/>
                  <br/>


                <div class="form-group">
                  <input  name="organiserPhone" type="tel" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Phone No. *">
                </div>
                
                       
                       <!--organisationName	organiserDesignation organiserName	organiserEmail	organiserPassword	organiserVerified	organisationStatus	organisationEmailHash	organiserPhone	organiserType	hasBranches	addressLine1	addressLine2	state	city	zipcode	landmark-->
                        
                <div class="form-group">
                  <input name="organisationName" type="text" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Organization Name *">
                </div>

                <div class="form-group">
                  <input name="organiserDesignation" type="text" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Designation *">
                </div> 

                <div class="form-group">
                  <input name="organiserAadharNum" type="text" required class="form-control form-control-lg" id="exampleAadharNum" placeholder="Aadhar Card Number *">
                </div>

                <div class="form-group">
                Upload Aadhar Card: <input name="organiserAadharCard" type="file" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Upload Aadhar Card *">
                </div>
                <br/><br/>
    
                    <div id="addressBlock">
                      <p class="card-description">
                      Organisation Address to collect waste from
                    </p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <input name="addressLine1" type="text" class="form-control" placeholder="Address Line 1 *">
                          </div>
                        </div>
                      
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input name="addressLine2" type="text" class="form-control" placeholder="Address Line 2 *">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Landmark</label>
                          <div class="col-sm-9">
                            <input name="landmark" type="text" class="form-control" placeholder="Landmark *">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input name="zipcode" type="text" class="form-control" placeholder="Postcode *">
                          </div>
                        </div>
                        
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input name="city" type="text" class="form-control" placeholder="City *">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input name="state" type="text" class="form-control" placeholder="State *">
                          </div>
                        </div>

                    </div>
      
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
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./../js/off-canvas.js"></script>
  <script src="./../js/hoverable-collapse.js"></script>
  <script src="./../js/template.js"></script>
  <!-- endinject -->
  <script>
    function hideAddress() {
      var x = document.getElementById("addressBlock");
        x.style.display = "none";
    }
    
    function showAddress() {
      var x = document.getElementById("addressBlock");
        x.style.display = "block";
    }
    
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
