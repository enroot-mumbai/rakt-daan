<?php 

    require 'server/connect.php';
    
    if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['orgEmail'];

        $search = mysqli_query($conn,"SELECT * FROM organization WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        $orgID = $search['id'];
        
        $getBranches = mysqli_query($conn,"SELECT * FROM branch WHERE organisationID='$orgID'") or die(mysqli_error($conn)); 
        $branchesArray = array();
                    
    	while($singleBranch = mysqli_fetch_array($getBranches))
        $branchesArray[] = $singleBranch; 
        
        
?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Branches</h2>    
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
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branch Name</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branch Organizer</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Status</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Members</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branch Address</th>


                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($branchesArray as $singleBranch){  ?>
                        
                        <tr role="row" class="odd<?php if($singleBranch['branchStatus']=='disabled'){echo ' table-danger'; } ?>">
                            <td class="sorting_1"><?php echo $singleBranch['branchName']; ?></td>
                            <td><?php echo $singleBranch['organiserName']; ?></td> 
                            <td>
                                
                            <?php if($singleBranch['branchStatus']=='inactive'){ ?>
                            <form  action="server/handleBranchOperations.php" method="POST">
                                <input type="text" name="branchID" style="display:none" value="<?php echo $singleBranch['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success mr-2" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleBranch['branchStatus']=='active'){ ?>
                            <form  action="server/handleBranchOperations.php" method="POST">
                                Active
                                <input type="text" name="branchID" style="display:none" value="<?php echo $singleBranch['id'] ?>" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleBranch['branchStatus']=='disabled'){ ?>
                            <form  action="server/handleBranchOperations.php" method="POST">
                                Disabled
                                <input type="text" name="branchID" style="display:none" value="<?php echo $singleBranch['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <td><?php echo $singleBranch['totalPlastic']; ?> kgs</td>
                            <td><?php echo $singleBranch['totalFootwear']; ?></td>
                            <td><?php echo $singleBranch['totalMembers']; ?></td>
                            
                            <td><?php echo $singleBranch['addressLine1'].', '.$singleBranch['addressLine2'].', '.$singleBranch['landmark'].", \n ".  $singleBranch['city'].', '.$singleBranch['zipcode'].', '.$singleBranch['state']; ?></td>
                        </tr>
                        <?php } ?>
                        
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