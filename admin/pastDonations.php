<?php 

    require 'server/connect.php';
    
    if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['orgEmail'];

        // $search = mysqli_query($conn,"SELECT * FROM organization") or die(mysqli_error($conn)); 
        
        // $search = mysqli_fetch_assoc($search);

       
?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3 mb-3">
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
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Organisation</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic Amount</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Amount</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php 
                        
                        
                            $getOrg = mysqli_query($conn,"SELECT * FROM organization WHERE organisationStatus='active'") or die(mysqli_error($conn)); 
                            $orgArray = array();
                                        
                        	while($singleOrg = mysqli_fetch_array($getOrg))
                            $orgArray[] = $singleOrg;  
                            
                            foreach($orgArray as $singleOrg){ 
                                $orgID = $singleOrg['id'];
                                $getCollectionDates = mysqli_query($conn,"SELECT * FROM collectionDates WHERE organisationID='$orgID'") or die(mysqli_error($conn)); 
                                $datesArray = array();
                            	while($singleDate = mysqli_fetch_array($getCollectionDates))
                                $datesArray[] = $singleDate; 
                                
                                foreach($datesArray as $singleDate){ 
                        
                
                                    $today = date("Y-m-d");
                                    if($singleDate['date'] < $today){
                         ?>
                        
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></td>
                            <td><?php echo $singleOrg['organisationName']; ?></td>
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
