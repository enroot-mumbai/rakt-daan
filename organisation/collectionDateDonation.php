<?php 

    require 'server/connect.php';

        if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        else {
    
        $userEmail = $_SESSION['orgEmail'];
        $dateid = $_GET["date"];

        $search = mysqli_query($conn,"SELECT * FROM organization WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        
        if($search['hasBranches']=='yes'){
            echo '<script>window.location="./index.php"</script>';
        }

        $OrgnisationID = $search['id'];
        
        $getMemberDonations = mysqli_query($conn,"SELECT * FROM memberDonations WHERE organisationID='$OrgnisationID' AND collectionDateID='$dateid'") or die(mysqli_error($conn)); 
        
        $donationsArray = array();
    	while($singleDonation = mysqli_fetch_array($getMemberDonations))
        $donationsArray[] = $singleDonation; 
        
 ?>

<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Donations for <?php
            $searchDate = mysqli_query($conn,"SELECT * FROM collectionDates WHERE id='$dateid'") or die(mysqli_error($conn)); 
        
            $searchDate = mysqli_fetch_assoc($searchDate);
            
            echo $searchDate['date'];
        ?></h2>    
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
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Member Name</th>
                        
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Donation Status</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic Amount</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Amount</th>
                        
                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Type</th>
                        

                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($donationsArray as $singleDonation){
                            
                            
                            
                         ?>
                        
                        <tr role="row" class="odd">
                            <!--Getting Member Name using Member id-->
                            <?php
                            $memberID = $singleDonation['memberID'];
                            $searchMember = mysqli_query($conn,"SELECT * FROM users WHERE id='$memberID'") or die(mysqli_error($conn)); 
                            $searchMember = mysqli_fetch_assoc($searchMember);
                            ?>
                            <td class="sorting_1"><?php echo $searchMember['userName'] ?></td>

                           
                            <?php if($singleDonation['donationApproved']=='no'){ ?>
                            <td>
                            <form action="server/handleDonationsOperations.php" method="POST">
                                <input type="text" name="donationID" style="display:none" value="<?php echo $singleDonation['id'] ?>" />
                                <input  type="submit" id="approveDonation" name="approve" value="Accept Donation" class="btn btn-success mr-2" />
                            </form>
                            </td>   
                            <?php } ?>
                            
                            <?php if($singleDonation['donationApproved']=='yes'){ ?>
                            <td>Received</td>   
                            <?php } ?>
                            
                            
                            <td><?php echo $singleDonation['plasticWeight'] ?> Kgs</td>
                            <td><?php echo $singleDonation['footwearQuantity'] ?> Kgs</td>
                            <td><?php echo $singleDonation['footwearType'] ?></td>
                        </tr>
                        
                        <?php   } ?>
                        
                        
                        
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

