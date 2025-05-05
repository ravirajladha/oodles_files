<?php require APPROOT . '/views/inc_admin/header.php'; ?>



        <div class="page-body">

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
                            <div class="card-header">
                                <h5> Edit Category</h5>
                            </div>
                            <div class="card-body">
                                
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">

                                        <form action="<?php echo URLROOT; ?>/admin/update_category/<?php echo $data['category']->category_id ?>" method="post" enctype="multipart/form-data">
                                            
                                           <div class="form-group">
                            <label >Category Name</label>
                            <?php if($data['category']->status==0){ ?>
                            <label class="checkbox-inline" style="float: right;">
                            <input type="checkbox" checked data-toggle="toggle" style="float: right;" name="status"> Enabled
                                </label>
                            <?php }else{ ?>
                                <label class="checkbox-inline" style="float:right;">
                                <input type="checkbox"  checked data-toggle="toggle" style="float: right;" name="status"> Disabled
                                    </label>
                            <?php } ?>
                            
                            <input placeholder="enter category name" type="text" name="category_name" class="form-control" value="<?php echo $data['category']->category_name; ?>" required>
                            
                       </div>


                       <div class="row">
                           <div class="col-md-2">
                               <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['category']->category_img; ?>" alt="" width="100">
                           </div>
                           <div class="col-md-10">

                           <div class="form-group">
                               <br>
                          <label >Select a new Image (To keep the existing image dont select a new image)</label>
                          <input placeholder="Category Image" type="file" name="cat_img" class="form-control">
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
