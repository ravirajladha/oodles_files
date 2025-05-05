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
                                <h3> Vendor Penalty
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
                                    <li class="nav-item"><a class="nav-link active show" id="account-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true" data-original-title="" title="">Penalty Details</a></li>
                                  
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        
                                           
                        <form action="<?php echo URLROOT; ?>/admin/add_vendor_penalty" method="post" >                     

                             <div class="form-group row">
                             <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Select Vendor</label>
                             <div class="col-xl-8 col-md-7">
                            <select  class="form-control"  id="select_change" required="" name="penalty_vendor">
                            <option disabled="" selected="" value="">-SELECT-</option>
                            <?php  
                            foreach($data['all_vendors'] as $vendor) {  
                            ?>
                            <option value="<?php echo $vendor->vendor_id; ?>"><?php echo ucwords($vendor->vendor_name); ?></option>
                            <?php } ?>
                         </select>
                            </div>
                         </div> 

                        

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Amount</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="penalty_amount" type="number" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span> Remarks</label>
                                                <div class="col-xl-8 col-md-7">
                                                    <input class="form-control" id="validationCustom1" name="penalty_remark" type="text" required="">
                                                </div>
                                            </div>



                                            <div class="pull-right">  <input type="submit" class="btn btn-primary pull-right" value="Create">
                                       
                                    
                                </div>
                                </form>  
                                    </div>
                                    <div class="tab-pane fade" id="permission" role="tabpanel" aria-labelledby="permission-tabs">
                                     
                                           
                                            <input type="submit" class="btn btn-primary pull-right" value="Create">
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

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>