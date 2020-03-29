<?php 

    require 'server/connect.php';

        if(!isset($_SESSION["branchUserName"]) && empty($_SESSION["branchUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['branchEmail'];

        $search = mysqli_query($conn,"SELECT * FROM branch WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        $orgID = $search['id'];
        
        $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE branchID='$orgID' order by date") or die(mysqli_error($conn)); 
        $datesArray = array();
                    
    	while($singleDate = mysqli_fetch_array($getCollectionDates))
        $datesArray[] = $singleDate; 
        
 ?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Collection Dates</h2>    
        </div>
         
        <div class="row ml-3 mt-3">
            <?php foreach($datesArray as $singleDate){  ?>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card"  style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center">
                  <h5 style="text-align:center;line-height:1.5;color:white!important;"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></h5>
                  </div>
              </div>
            </div>
            <?php } ?>

            
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
