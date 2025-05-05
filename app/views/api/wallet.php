<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>

<?php $wallet = $data['get_wallet_detail']  ?>
    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                
               
                <h3 class="mb-0 text-white"><span style="font-weight:0.2px !important;font-size:15px;">Balance:</span> <i class="fa fa-inr"> <?php echo $wallet->balance_amount?></i></h3>
                <p class="mb-0 text-white" style="font-size:11px">
                 


                </p>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
           
          
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni l  ni-list"></i><span>Recharge</span></div>
                <div class="data-content">0.00</div>
              </div>

              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni l  ni-list"></i><span>Transactions</span></div>
                <div class="data-content">0</div>
              </div>

              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni l  ni-list"></i><span>Referal Bonus</span></div>
                <div class="data-content">0</div>
              </div>

              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni l  ni-list"></i><span>Joining Bonus</span></div>
                <div class="data-content">0</div>
              </div>
           
             
             
              <!-- Edit Profile-->
              <!-- <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="edit-profile.html"><i class="lni lni-pencil me-2"></i>Edit Profile</a></div> -->
            </div>

         


        </div>
          </div> <p style="color:#333">Payment gateway, Not Enabled</p>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php 
  $profile_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>