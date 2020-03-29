<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ek se Anek</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            
              <h4 style="line-height:1.5">Login as a branch of your Organisation</h4>
              <form  action="server/login.php" method="POST" class="pt-3">
                <div class="form-group">
                  <input name="organiserEmail" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input type="submit" id="submit" value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                </div>
                <br/>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                  <!--<a href="#" class="auth-link text-black">Forgot password?</a>-->
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
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
  <script src="./../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./../../js/off-canvas.js"></script>
  <script src="./../../js/hoverable-collapse.js"></script>
  <script src="./../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
