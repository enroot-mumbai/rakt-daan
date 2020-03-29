<?php 

    require 'server/connect.php';

        if(!isset($_SESSION["userName"]) && empty($_SESSION["userName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['Email'];

        $mBranchID = $_SESSION['mBranchID'];
        $mOrgnisationID = $_SESSION['mOrganisationID'];
        
        if($mBranchID != null){
            $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE branchID='$mBranchID'") or die(mysqli_error($conn)); 
        }
        else{
            $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE organisationID='$mOrgnisationID' order by date") or die(mysqli_error($conn)); 
        }
        
        $datesArray = array();
    	while($singleDate = mysqli_fetch_array($getCollectionDates))
        $datesArray[] = $singleDate; 
        
        
        if(isset($_GET['msg']) && !empty($_GET['msg']) AND isset($_GET['msg2']) && !empty($_GET['msg2'])){
            $msg1 = $_GET['msg'];
            $msg2 = $_GET['msg2'];
        }
        
 ?>

<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Donate Now</h2> 
      
        </div>

        <div class="row ml-3 mt-3">
        <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                  <h4 class="card-title">Fill form to Donate</h4>
                  <p class="text-danger"><?php echo $msg1 ?></p>
                    <p class="text-primary"><?php echo $msg2 ?></p>
                  
                  <form class="forms-sample" method="POST" action="server/donateForm.php">
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Select Date</label>
                      <select required name="date" class="form-control" id="exampleInputUsername1" placeholder="Date">
                            <?php foreach($datesArray as $singleDate){ 
                            $today = date("Y-m-d");
                                if($singleDate['date'] >= $today){
                            ?>
                                  <option value="<?php echo $singleDate['id']; ?>"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></option>
                            <?php } } ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Plastic in Kgs (please enter the amount of plastic you will donate)</label>
                      <input name="totalPlastic" type="number" class="form-control" id="exampleInputEmail1" placeholder="Plastic in Kgs">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Footwear</label>
                      <input name="totalFootwear" type="number" class="form-control" id="exampleInputEmail1" placeholder="Number of Footwear">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Footwear Details</label>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="footwearType" id="optionsRadios1" value="adult">
                              Adult Footwear
                            <i class="input-helper"></i></label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="footwearType" id="optionsRadios2" value="child" checked="">
                              Child Footwear
                            <i class="input-helper"></i></label>
                          </div>
                    </div>

                    <!--    <div class="form-group">-->
                    <!--  <label>Footwear Image</label>-->
                    <!--  <input type="file" name="img[]" class="file-upload-default">-->
                    <!--  <div class="input-group col-xs-12">-->
                    <!--    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">-->
                    <!--    <span class="input-group-append">-->
                    <!--      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>-->
                    <!--    </span>-->
                    <!--  </div>-->
                    <!--</div>-->


                    

                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Plant</label>
                    <select name="plant" class="form-control" id="exampleFormControlSelect2">
                      <option value="Lily">Lily</option>
                      <option value="Aloe Vera">Aloe Vera</option>
                      <option value="Tulsi">Tulsi</option>
                      <option value="Spider Plant">Spider Plant</option>
                      <option value="Cypress">Cypress</option>
                      <option value="Money Plant">Money Plant</option>
                      <option value="Golden Fern">Golden Fern</option>
                    </select>
                  </div>
                    
                
                    <input value="Donate" type="submit" class="btn btn-primary mr-2" />
                  </form>
                </div>
              </div>
            </div>
        </div>
        
        </div>
        <!-- content-wrapper ends -->

<?php include("./components/footer.php") ?>
<?php } ?>
