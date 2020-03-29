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

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Plastic Amount</th>

                        <th class="sorting_asc" tabindex="0" aria-controls="recent-purchases-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 122px;">Footwear Amount</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php foreach($datesArray as $singleDate){  
                             
                            $date = $singleDate['id'];
                            $member_id = $_SESSION["userID"];
                            $table = 'memberDonations';
                            $sql = "select * from $table where memberID= '$member_id' AND collectionDateID='$date'";
                            $result = mysqli_query($conn, $sql);
                             if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $today = date("Y-m-d");
                                    if($singleDate['date'] < $today){
                         ?>
                        
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo date('l, jS \of F Y ',strtotime($singleDate['date'])); ?></td>
                            <td><?php echo $row['plasticWeight'] ?> Kgs</td>
                            <td><?php echo $row['footwearQuantity'] ?> Pairs</td>
                        </tr>
                        
                        <?php } } } } ?>
                        
                        
                        
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

