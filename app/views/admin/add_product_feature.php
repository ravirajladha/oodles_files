<?php require APPROOT . '/views/inc_admin/header.php'; ?>


<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <!-- <h3>Create Vendor
                            <small>Multikart Admin panel</small>
                        </h3> -->
                    </div>
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
                    <div class="card-header">
                        <h5> Add Product</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">

                                <form method="post" action="<?php echo URLROOT; ?>/admin/create_product_feature" >
                                    
                                        
                    <div class="row">

                    
                    
                    <div class="col-md-12">
                       <div class="form-group">
                          <label >Product Feature</label>
                          <input placeholder="Add product feature" type="text" name="feature1" class="form-control" required>
                       </div>
                    </div>
                   

                        
                        
                    </div>





                                    <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                                    
                                    
                                </form>
                            </div>

                        </div>
                        <div class="pull-right">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>



       