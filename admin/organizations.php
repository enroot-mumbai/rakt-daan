<?php 
    require 'server/connect.php';


        if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
            
        $userEmail = $_SESSION['orgEmail'];

        $search = mysqli_query($conn,"SELECT * FROM organization WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        
        $getOrg = mysqli_query($conn,"SELECT * FROM organization WHERE organiserVerified='1'") or die(mysqli_error($conn)); 
        
        $orgArray = array();
                    
    	while($singleOrg = mysqli_fetch_array($getOrg))
        $orgArray[] = $singleOrg; 
?>

<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Organizations</h2>    
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
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Name</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Head Organizer</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Status</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Members</th>
                        <!--<th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branches</th>-->


                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Address</th>


                        </tr>
                      </thead>
                      <tbody>
                         <?php foreach($orgArray as $singleOrg){  ?>
                        <tr role="row" class="odd<?php if($singleOrg['organisationStatus']=='disabled'){echo ' table-danger'; } ?>">
                            <td><?php echo $singleOrg['organisationName'] ?></td>  
                            
                            <td><?php echo $singleOrg['organiserName'] ?> </td>
                            
                            <!--Member Status Operations-->
                            <td>
                            <?php if($singleOrg['organisationStatus']=='inactive'){ ?>
                            <form  action="server/handleOrgOperations.php" method="POST">
                                <input type="text" name="orgID" style="display:none" value="<?php echo $singleOrg['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success mr-2" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleOrg['organisationStatus']=='active'){ ?>
                            <form  action="server/handleOrgOperations.php" method="POST">
                                Active
                                <input type="text" name="orgID" style="display:none" value="<?php echo $singleOrg['id'] ?>" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                           
                            <?php } ?>
                            
                            <?php if($singleOrg['organisationStatus']=='disabled'){ ?>
                            <form  action="server/handleOrgOperations.php" method="POST">
                                Disabled
                                <input type="text" name="orgID" style="display:none" value="<?php echo $singleOrg['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <td><?php echo $singleOrg['totalPlastic'] ?> kgs</td>
                            <td><?php echo $singleOrg['totalFootwear'] ?></td>
                            <td><?php $orgID = $singleOrg['id']; $search2 = mysqli_query($conn,"SELECT COUNT(id) FROM users WHERE organisationID='$orgID'") or die(mysqli_error($conn)); $search2 = mysqli_fetch_assoc($search2); echo $search2['COUNT(id)'] ?></td>
                            <td><?php echo $singleOrg['addressLine1'].', '.$singleOrg['addressLine2'].', '.$singleOrg['landmark'].', '.$singleOrg['city'].', '.$singleOrg['zipcode'] ?></td>

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
