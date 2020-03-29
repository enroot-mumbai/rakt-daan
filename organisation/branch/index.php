<?php require 'server/connect.php'; 


    if(!isset($_SESSION["branchUserName"]) && empty($_SESSION["branchUserName"])){ 
        echo '<script>window.location="./login.php"</script>';
    }
    else {

    $userEmail = $_SESSION['branchEmail'];

    $search = mysqli_query($conn,"SELECT * FROM branch WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
    
    $search = mysqli_fetch_assoc($search);
?>

<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2><?php echo $search['branchName']; ?></h2>    
        </div>

        <div class="row ml-3 mt-3 pt-1">
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"  style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $search['totalPlastic']; ?> kgs</h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Plastic</p>
                  </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"   style="background-image: linear-gradient( 108deg,  rgba(0,166,81,1) 9.3%, rgba(0,209,174,1) 118.3% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $search['totalFootwear']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Pairs of Footwear</p>
                  </div>
              </div>
            </div>
            
            <!--<div class="col-md-3 grid-margin stretch-card pt-3">-->
            <!--  <div class="card">-->
            <!--    <div class="card-body align-items-center  pt-5">-->
            <!--    <h1 style="text-align:center">5</h1><br/>-->
            <!--      <p class="text-muted" style="text-align:center">Events participated</p>-->
            <!--      </div>-->
            <!--  </div>-->
            <!--</div>-->

        </div>

        

        <div class="row ml-3">
            <form  action="server/addCollectionDate.php" method="POST" class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Select Date</label>
                      <input type="number" name="orgId" style="display:none" value="<?php echo $search['id']  ?>" />
                      <input name="collectionDate" required type="date" class="form-control" id="exampleInputUsername1" placeholder="Date">
                    </div>
            
            <input type="submit" value="Add Collection Date" class="btn btn-primary" />
            </form>
          </div>
          
        </div>
        <!-- content-wrapper ends -->

<?php include("./components/footer.php") ?>
<?php } ?>
