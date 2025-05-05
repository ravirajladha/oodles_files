<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>


    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                
                <h5 class="mb-0"><?php echo  ucwords($data['get_user_details']->user_name); ?></h5>
                <p class="mb-0 text-white">user</p>
                <p class="mb-0 text-white" style="font-size:11px">
                  <?php 
                  if($data['get_user_details']->user_verified){
                    echo " <i class='fa fa-check-circle' style='color:white'></i> Verified";
                } else {
                  if($data['get_user_details']->user_type==0){
                    echo " <i class='fa fa-times-circle' style='color:white'></i> Not Verified ";
                  }else {
                    echo " <i class='fa fa-check-circle' style='color:white'></i> Importing from India ";
                  }
                } 
                  ?>


                </p>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-user"></i><span>Name</span></div>
                <div class="data-content"><?php echo  ucwords($data['get_user_details']->user_name); ?></div>
              </div>
              <?php if($data['get_user_details']->user_type==0): ?>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-phone"></i><span>Phone Number</span></div>
                <div class="data-content"><?php echo $data['get_user_details']->phone; ?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-envelope"></i><span>Email Address</span></div>
                <div class="data-content"><?php echo $data['get_user_details']->email; ?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-map-marker"></i><span>Address</span></div>
                <div class="data-content"><?php echo $data['get_user_details']->user_address; ?>, <?php echo $data['get_user_details']->user_city; ?>, <?php echo $data['get_user_details']->user_state; ?>, <?php echo $data['get_user_details']->user_country; ?>, <?php echo $data['get_user_details']->user_pincode; ?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni l  ni-list"></i><span>GST</span></div>
                <div class="data-content"><?php echo $data['get_user_details']->user_gst; ?></div>
              </div>
              <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i class="lni lni-star"></i><span>My Orders</span></div>
                <div class="data-content"><a class="btn btn-danger btn-sm" href="<?php echo URLROOT; ?>/api/orders">View</a></div>
              </div>
              
              <?php endif; ?>
              <!-- Edit Profile-->
              <!-- <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="edit-profile.html"><i class="lni lni-pencil me-2"></i>Edit Profile</a></div> -->
            </div>
          </div>
<style>
  a {
    color: #fff;
  }
  .btn {
    color:#fff;
  }
</style>
        <div class="card mb-1 user-info-card">
            <div class="card-body p4 d-lex align-items-center">
              <div class="user-ifo">
             
                  <a href="<?php echo URLROOT; ?>/api/my_products">My Products</a>
                  <a href="<?php echo URLROOT; ?>/api/add_product"><button class="btn btn-success pull-right">Add</button></a>
             
              </div>
            </div>
          </div>

          <div class="card mb-1 user-info-card">
            <div class="card-body p- d-flx align-items-center">
              <div class="use-info">
             
                  <a href="<?php echo URLROOT; ?>/api/product_orders">Product Orders</a>
           
                
              </div>
            </div>
          </div>

          <div class="card mb-1 user-info-card">
            <div class="card-body p4 dflex align-items-center">
              <div class="usr-info">
          
                  <a href="<?php echo URLROOT; ?>/api/my_services">My Services</a>
                  <a href="<?php echo URLROOT; ?>/api/add_service"><button class="btn btn-success pull-right">Add</button></a>
           
              </div>
            </div>
          </div>

          <div class="card mb-1 user-info-card">
            <div class="card-body p4 d-flx align-items-center">
              <div class="use-info">
              <a href="<?php echo URLROOT; ?>/api/service_orders">Service Orders</a>
              </div>
            </div>
          </div>
       


        </div>
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