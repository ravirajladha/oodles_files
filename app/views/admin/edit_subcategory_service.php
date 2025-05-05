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
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Vendors </li>
                                <li class="breadcrumb-item active">Create Vendor </li>
                            </ol>
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
                                <h5> Edit Subcategory</h5>
                            </div>
                            <div class="card-body">
                                
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">

                                        <form action="<?php echo URLROOT; ?>/admin/update_subcategory_service/<?php echo $data['subcategory']->subcategory_id; ?>" method="post" enctype="multipart/form-data">
                                            
                        <div class="form-group">
                            <label >Subcategory Name</label>
                            <input placeholder="Enter Subcategory Name" type="text" name="subcategory_name" class="form-control" value="<?php echo $data['subcategory']->subcategory_name; ?>" required>
                       </div>

                       <div class="form-group">
                            <label >Subcategory HSN</label>
                            <input placeholder="Enter Subcategory HSN" type="text" name="subcategory_hsn" class="form-control" value="<?php echo $data['subcategory']->subcategory_hsn; ?>" required>
                       </div>

                       <div class="form-group">
                            <label >Subcategory Tax</label>
                            <input placeholder="Enter Subcategory Tax" type="text" name="subcategory_tax" class="form-control" value="<?php echo $data['subcategory']->subcategory_tax; ?>" required>
                       </div>

                       <div class="row">
                           <div class="col-md-2">
                               <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['subcategory']->subcategory_img; ?>" alt="" width="100">
                           </div>
                           <div class="col-md-10">

                           <div class="form-group">
                              
                          <label >Select a new Image (To keep the existing image dont select a new image)</label>
                          <input placeholder="Product Image" type="file" name="subcat_img" class="form-control" >
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
