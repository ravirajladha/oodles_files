<?php require APPROOT . '/views/inc_admin/header.php'; ?>



        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Create Coupon
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/admin/index"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Coupons </li>
                                <li class="breadcrumb-item active">Create Coupon</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Discount Coupon Details</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <form action="<?php echo URLROOT; ?>/admin/create_coupon" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group row">
                                                <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span> Coupon Title</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom0" type="text" required="" name="coupon_title">
                                                </div>
                                            </div>

                                          


                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4">Subcategory</label>
                                                <div class="col-md-7">
                                                <select  class="form-control"  id="select_change" required="" name="coupon_subcat">
                            <option disabled="" selected="" value="">-SELECT-</option>
                            <?php foreach($data['all_subcategory'] as $subcat) {  ?>
                            <option value="<?php echo $subcat->subcategory_id; ?>"><?php echo ucwords($subcat->subcategory_name); ?></option>
                            <?php } ?>
                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Coupon Code</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_code">
                                                </div>
                                                <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                            </div>
                                           
                                            
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4"><span>*</span>Discount Type</label>
                                                <div class="col-md-7">
                                                    <select class="custom-select w-100 form-control" required="" name="coupon_type">
                                                        <option value="">--Select--</option>
                                                        <option value="1">Percent</option>
                                                        <option value="2">Fixed</option>
                                                    </select>
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Discount Value</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_value">
                                                </div>
                                                <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Discount Cap</label>
                                                <div class="col-md-7">
                                                    <input class="form-control" id="validationCustom1" type="text" required="" name="coupon_cap">
                                                </div>
                                                <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                            </div>
                                            
                                            

                                        </div>
                                    </div>
                                    <div class="pull-right">
                            <input type="submit" class="btn btn-primary" value="Create">
                        </div>

                                </form>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>
        
        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>