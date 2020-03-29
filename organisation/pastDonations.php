<?php 

    require 'server/connect.php';
    
    if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['orgEmail'];

        $search = mysqli_query($conn,"SELECT * FROM organization") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);

       
?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Past Donations</h2>    
        </div>

        <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <p class="card-title"></p> -->
                  <div class="table-responsive">
                    <div id="recent-purchases-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="recent-purchases-listing" class="table dataTable no-footer" role="grid">
                      <thead>
                        <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Collection Date</th>
                        
                        <?php 
                            if($search['hasBranches']=='yes'){
                        ?>
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branch Name</th>
                        <?php } ?>
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic Amount</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Amount</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php 
                         if($search['hasBranches']=='yes'){
                            $orgID = $search['id'];
                        
                            $getBranches = mysqli_query($conn,"SELECT * FROM branch WHERE organisationID='$orgID'") or die(mysqli_error($conn)); 
                            $branchesArray = array();
                                        
                        	while($singleBranch = mysqli_fetch_array($getBranches))
                            $branchesArray[] = $singleBranch;  
                            
                            foreach($branchesArray as $singleBranch){ 
                                $branchID = $singleBranch['id'];
                                $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE branchID='$branchID'") or die(mysqli_error($conn)); 
                                $datesArray = array();
                            	while($singleDate = mysqli_fetch_array($getCollectionDates))
                                $datesArray[] = $singleDate; 
                                
                                foreach($datesArray as $singleDate){ 
                        
                
                                    $today = date("Y-m-d");
                                    if($singleDate['date'] < $today){
                         ?>
                        
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></td>
                            <td><?php 
                                $branchID = $singleDate['branchID']; 
                                $searchBranch = mysqli_query($conn,"select * from branch where id= '$branchID'") or die(mysqli_error($conn));
                                $searchBranch = mysqli_fetch_assoc($searchBranch);
                                echo $searchBranch['branchName'];
                            ?></td>
                            <td><?php echo $singleDate['totalPlastic'] ?> Kgs</td>
                            <td><?php echo $singleDate['totalFootwear'] ?> Pairs</td>
                        </tr>

                         <?php } } } }
                         
                         else {
                             
                              $OrgnisationID = $_SESSION['orgUserID'];

                                $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE organisationID='$OrgnisationID' order by date") or die(mysqli_error($conn)); 
                        
                                $datesArray = array();
                            	while($singleDate = mysqli_fetch_array($getCollectionDates))
                                $datesArray[] = $singleDate; 
                                foreach($datesArray as $singleDate){ 
                        
                
                                    $today = date("Y-m-d");
                                    if($singleDate['date'] < $today){
                         ?>
                        
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></td>
                            <td><?php echo $singleDate['totalPlastic'] ?> Kgs</td>
                            <td><?php echo $singleDate['totalFootwear'] ?> Pairs</td>
                        </tr>
                        
                        <?php }}} ?>
                         
                        
                        </tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
        </div>
        <!-- content-wrapper ends -->

<?php include("./components/footer.php") ?>
<?php } ?>

