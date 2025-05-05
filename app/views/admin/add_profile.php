<?php

require APPROOT . '/views/inc_admin/header.php';
?>


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
                                <h3>Add details
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
                               
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <form class="needs-validation user-add" action="<?php echo URLROOT; ?>/admin/add_profile" enctype="multipart/form-data" method="POST" autocomplete="nope">
                                     
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Name</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom0" type="text" name="name"  required="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Address</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" name="address" required="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> City</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="city" type="text" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> State</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="state" type="text" required="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Pin Code</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="pincode" type="number" pattern="[0-9]{6}" required="">
                                                </div>
                                            </div>
                                            <!-- EXPRESSION HANDLING FOR GST -->
 <!-- pattern="[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9]{1}[Z][0-9]{1}" -->
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> GST</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="gst" type="text" 
                                                   
                                                     required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Upload GST Certificate</label>
                                                <div class="col-xl-8 col-md-7">
                                                    
                                            <input placeholder="gst cert" type="file" name="gst_cert" class="form-control" required>
                                                </div>
                                            </div>

                                            
                  

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Will dispatch in (Days)</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="timing" type="number" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Minimum Order Value</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="minval" type="number" required="">
                                                </div>
                                            </div>
                        <div class="form-group row">
                                <label for="validationCustom1" class="col-xl-3 col-md-4">Sub Category</label>
                            <div class="col-xl-8 col-md-7">
                               <select  class="form-control"  id="select_change" required="" name="subcat_id">
                                <option disabled="" selected="" value="">-SELECT-</option>
                                <?php foreach($data['all_subcategory'] as $subcat) { ?>
                                <option value="<?php echo $subcat->subcategory_id; ?>"><?php echo ucwords($subcat->subcategory_name); ?></option>
                                <?php } ?>
                                </select>
                          </div>
                        
                       </div> 


                                            <div class="pull-right">  <input type="submit" class="btn btn-primary pull-right" value="Add">
                                       
                                    
                                </div>
                                </form>  
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <?php 
        require APPROOT . '/views/inc_admin/footer.php'; ?>