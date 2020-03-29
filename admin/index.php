<?php 

    require 'server/connect.php';


        if(!isset($_SESSION["orgUserName"]) && empty($_SESSION["orgUserName"])){ 
            echo '<script>window.location="./login.php"</script>';
        }
        
        else {
    
        $userEmail = $_SESSION['orgEmail'];

        $search = mysqli_query($conn,"SELECT * FROM admin WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        
        $sql = mysqli_query($conn,"SELECT SUM(totalPlastic) FROM organization") or die(mysqli_error($conn)); 
        
        $que = mysqli_fetch_assoc($sql);
        
        $sql2 = mysqli_query($conn,"SELECT SUM(totalFootwear) FROM organization") or die(mysqli_error($conn)); 
        
        $que2 = mysqli_fetch_assoc($sql2);
        
        $sql3 = mysqli_query($conn,"SELECT COUNT(id) FROM organization WHERE organiserVerified=1") or die(mysqli_error($conn)); 
        
        $que3 = mysqli_fetch_assoc($sql3);
        
        $sql4 = mysqli_query($conn,"SELECT COUNT(id) FROM users WHERE verified=1") or die(mysqli_error($conn)); 
        
        $que4 = mysqli_fetch_assoc($sql4);


 ?>
 
<?php include("./components/header.php") ?>
<?php include("./components/sidebar.php") ?>
      

<div class="main-panel">
        <div class="content-wrapper">
          
        <div class="row ml-3">
        <h2>Total Collection</h2>    
        </div>

        <div class="row ml-3 mt-3 pt-1">
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"  style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $que['SUM(totalPlastic)']; ?> kgs</h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">of Plastic</p>
                  </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"  style="background-image: linear-gradient( 156.8deg,  rgba(30,144,231,1) 27.1%, rgba(67,101,225,1) 77.8% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $que2['SUM(totalFootwear)']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Pairs of Footwear</p>
                  </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"  style="background-image: linear-gradient( 108deg,  rgba(0,166,81,1) 9.3%, rgba(0,209,174,1) 118.3% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $que3['COUNT(id)']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Total Organisations</p>
                  </div>
              </div>
            </div>
            
            <div class="col-md-3 grid-margin stretch-card pt-3">
              <div class="card"  style="background-image: linear-gradient( 108deg,  rgba(0,166,81,1) 9.3%, rgba(0,209,174,1) 118.3% );">
                <div class="card-body align-items-center  pt-5">
                <h1 style="text-align:center;color:white!important;"><?php echo $que4['COUNT(id)']; ?></h1><br/>
                  <p class="text-muted" style="text-align:center;color:white!important;">Total Members</p>
                  </div>
              </div>
            </div>

        </div>

        
        </div>
        <!-- content-wrapper ends -->

<?php include("./components/footer.php") ?>
<?php } ?>
