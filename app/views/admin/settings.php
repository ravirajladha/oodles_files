<?php require APPROOT . '/views/inc_admin/header.php'; ?>


<style>
.radio_animated {
    position: relative;
    margin: 0 2rem 0 1rem;
}
</style>


        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="page-header-left">
                                <h3>Update Login Details
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card tab2-card">
                          
                       

                            <div class="card-body">
                                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Login Details</a></li>
                                  
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        
                            




                                           
                        <form action="<?php echo URLROOT; ?>/admin/update_login" method="post" enctype="multipart/form-data">                     


                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Email</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control"  type="email" 
                                                    value=""
                                                   name="email_id">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Phone</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" name="phone_no" value="" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> New Password</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" name="new_password" type="password" required="">
                                                    <br>
                                                    <div class="pull-right">  <input type="submit" class="btn btn-primary pull-right" value="Update">
                                                </div>
                                                
                                            </div>


                                           
                                       
                                    
                                </div>
                            </form> 
                                    </div>
                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>