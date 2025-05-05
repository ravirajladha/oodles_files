<?php 
require APPROOT . "/views/inc/header.php"; 
// require APPROOT."/views/inc/nav-header.php"; 
?>
  

    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
              <div class="user-profile me-3"><img src="<?php echo URLROOT; ?>/assets/images/user_grey.jpg" alt=""></div>
              <div class="user-info">
                
                <h5 class="mb-0"><?php 
                // echo  ucwords($data['get_user_details']->name); 
                ?></h5>
                <p class="mb-0 text-white">User</p>
              </div>
            </div>
          </div>
          <!-- User Meta Data-->
          <div class="card user-data-card">
            <div class="card-body">
              <div class="single-profile-data d-flex align-items-center justify-content-between">
             
                <div class="data-content"><?php
                //  echo  ucwords($data['get_user_details']->user_name);
                  ?></div>
              </div>
              
              <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/api/add_profile" enctype="multipart/form-data" method="POST" autocomplete="OFF">
                                     
                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>Name</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom0" name="name" type="text" required="">
                                                </div>
                                            </div>


                                          


                                            <div class="add_section">

                                            
                                            
                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>Address</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" name="address">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>City</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="city" type="text" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>State</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="state" type="text" >
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>Pincode</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="pincode" type="text" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>GST</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="gst" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <div class="col-md-4 title d-flex align-items-center"><span>Upload GST Certificate</span></div>
                                                <div class="col-xl-8 col-md-7">
                                                    
                                            <input placeholder="gst cert" type="file" name="gst_cert" class="form-control">
                                                </div>
                                            </div>

<br></div>
                                            <div class="pull-right" style="margin-top:5px;">  <input type="submit" class="btn btn-primary pull-right" value="Add">


                                </div>
                                </form> 
              
              <!-- Edit Profile-->
              <!-- <div class="edit-profile-btn mt-3"><a class="btn btn-info w-100" href="edit-profile.html"><i class="lni lni-pencil me-2"></i>Edit Profile</a></div> -->
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
//   require APPROOT . '/views/inc/nav-footer.php';
//   require APPROOT . '/views/inc/footer.php'; 
  ?>

  <script>
    // Jquery on check box for importing outside India
$(".add_section").show();
$(".import_check").click(function() {
    if($(this).is(":checked")) {
        $(".add_section").hide();
    } else {
        $(".add_section").show();
    }
});
   </script>