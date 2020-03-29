<?php 

        $userEmail = $_SESSION['orgEmail'];

        $search = mysqli_query($conn,"SELECT * FROM organization WHERE organiserEmail='$userEmail'") or die(mysqli_error($conn)); 
        
        $search = mysqli_fetch_assoc($search);
        ?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

        <?php if($search['hasBranches']=='no'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="collectionDates.php">
              <i class="mdi mdi-calendar menu-icon"></i>
              <span class="menu-title">Collection Dates</span>
            </a>
          </li>
          <?php } ?>
          
          <?php if($search['hasBranches']=='yes'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="branches.php">
              <i class="mdi mdi-heart menu-icon"></i>
              <span class="menu-title">Branches</span>
            </a>
          </li>
          <?php } ?>
          
          
            <?php if($search['hasBranches']=='no'){ ?>
          <li class="nav-item">
            <a class="nav-link" href="members.php">
              <i class="mdi mdi-heart menu-icon"></i>
              <span class="menu-title">Members</span>
            </a>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a class="nav-link" href="pastDonations.php">
              <i class="mdi mdi-clock menu-icon"></i>
              <span class="menu-title">Past Donations</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->