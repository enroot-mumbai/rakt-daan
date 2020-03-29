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
        
        $getUsers = mysqli_query($conn,"SELECT * FROM users WHERE organisationID='$orgID'") or die(mysqli_error($conn)); 
        $usersArray = array();
                    
    	while($singleUser = mysqli_fetch_array($getUsers))
        $usersArray[] = $singleUser; 
      
      
?>
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Members</h2>    
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

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Branch Name</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic Collected</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Collected</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Status</th>

                        </tr>
                      </thead>
                      <tbody>

                        
                     

                        <?php foreach($usersArray as $singleUser){  ?>
                        <tr role="row" class="odd<?php if($singleUser['memberStatus']=='disabled'){echo ' table-danger'; } ?>">
                            <td><?php echo $singleUser['userName'] ?></td>  
                           
                            <!--Getting Members Branch-->
                            <?php if($singleUser['branchID']!=null){ 
                                $branchID = $singleUser['branchID'];
                                $searchBranch = mysqli_query($conn,"SELECT * FROM branch WHERE id='$branchID'") or die(mysqli_error($conn)); 
                                $searchBranch = mysqli_fetch_assoc($searchBranch);
                            ?> 
                                <td><?php echo $searchBranch['branchName'] ?></td>     
                            <?php }else{ ?>
                                <td>No Branch</td>
                            <?php }?>
                            
                            <td><?php echo $singleUser['totalPlastic'] ?> kgs</td>
                            <td><?php echo $singleUser['totalFootwear'] ?></td>
                            
                            <!--Member Status Operations-->
                            <td>
                            <?php if($singleUser['memberStatus']=='inactive'){ ?>
                            <form  action="server/handleMemberOperations.php" method="POST">
                                <input type="text" name="memberID" style="display:none" value="<?php echo $singleUser['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success mr-2" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleUser['memberStatus']=='active'){ ?>
                            <form  action="server/handleMemberOperations.php" method="POST">
                                Active
                                <input type="text" name="memberID" style="display:none" value="<?php echo $singleUser['id'] ?>" />
                                <input type="submit" name="reject" value="Reject" class="btn btn-danger">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleUser['memberStatus']=='disabled'){ ?>
                            <form  action="server/handleMemberOperations.php" method="POST">
                                Disabled
                                <input type="text" name="memberID" style="display:none" value="<?php echo $singleUser['id'] ?>" />
                                <input type="submit" name="approve" value="Approve" class="btn btn-success">
                            </form>
                            </td>   
                            <?php } ?>
                            
                            
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
