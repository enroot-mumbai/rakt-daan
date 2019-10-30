<?php require 'server/connect.php'; 

        if(!isset($_SESSION["userName"]) && empty($_SESSION["userName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['Email'];

        $search = mysqli_query($conn,"SELECT * FROM users WHERE userEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        
        $mOrgnisationID = $_SESSION['mOrganisationID'];
        $searchOrgnisation = mysqli_query($conn,"SELECT * FROM organization WHERE id='$mOrgnisationID'") or die(mysqli_error($conn)); 
        $searchOrgnisation = mysqli_fetch_assoc($searchOrgnisation);
        
        $mBranchID = $_SESSION['mBranchID'];
        if($_SESSION['mBranchID']!=null){
            $searchBranch = mysqli_query($conn,"SELECT * FROM branch WHERE id='$mBranchID'") or die(mysqli_error($conn)); 
            $searchBranch = mysqli_fetch_assoc($searchBranch);
        }
        
?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Orgnisation - <?php echo $searchOrgnisation['organisationName']; ?> </h2>    
        </div>
        <?php //if(isset($searchBranch['branchName'])){echo $searchBranch['branchName']; } ?>

        <div class="row ml-3 mt-3 pt-1">
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card" style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white;"><?php echo $searchOrgnisation['totalPlastic']; ?> kgs</h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Plastic</p>
                  </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card" style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white;"><?php echo $searchOrgnisation['totalFootwear']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Pairs of Footwear</p>
                  </div>
              </div>
            </div>
            
            <!--<div class="col-md-3 grid-margin stretch-card pt-3">-->
            <!--  <div class="card" style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">-->
            <!--    <div class="card-body align-items-center  pt-5">-->
            <!--    <h1 style="text-align:center;color:white;">5</h1><br/>-->
            <!--      <p class="text-muted" style="text-align:center;color:white!important;">Events participated</p>-->
            <!--      </div>-->
            <!--  </div>-->
            <!--</div>-->

        </div>

        <div class="row ml-3">
        <h2>Self Collection</h2>    
        </div>

        <div class="row ml-3 mt-3 pt-1">
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card" style="background-image: linear-gradient( 108deg,  rgba(0,166,81,1) 9.3%, rgba(0,209,174,1) 118.3% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white;"><?php echo $search['totalPlastic']; ?> kgs</h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Plastic</p>
                  </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card" style="background-image: linear-gradient( 108deg,  rgba(0,166,81,1) 9.3%, rgba(0,209,174,1) 118.3% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white;"><?php echo $search['totalFootwear']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Pairs of Footwear</p>
                  </div>
              </div>
            </div>
            
            <!--<div class="col-md-3 grid-margin stretch-card pt-3">-->
            <!--  <div class="card">-->
            <!--    <div class="card-body align-items-center  pt-5">-->
            <!--    <h1 style="text-align:center">2</h1><br/>-->
            <!--      <p class="text-muted" style="text-align:center">Events participated</p>-->
            <!--      </div>-->
            <!--  </div>-->
            <!--</div>-->

        </div>

        <div class="row ml-3">
        <a href="./donateNow.php" class="btn btn-primary">Donate Now</a>
        </div>
        </div>
        <!-- content-wrapper ends -->

<?php include("./components/footer.php") ?>
<?php } ?>
