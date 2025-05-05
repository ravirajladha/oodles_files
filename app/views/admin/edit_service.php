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
                        <h5> Edit Service</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">

                                <form method="post" action="<?php echo URLROOT; ?>/admin/update_service/<?php echo $data['service']->id; ?>" enctype="multipart/form-data">
                                    
                                        
                                <div class="row">
                   

                   <div class="col-md-12">
                      <div class="form-group">
                         <label >Service Name</label>
                         <input placeholder="service Name" type="text" value="<?php echo $data['service']->p_name; ?>" name="name" class="form-control" required>
                      </div>
                   </div>
                   
                   <div class="col-md-3">
                      <div class="form-group">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['service']->p_image; ?>" alt width="100">
                         
                      </div>
                   </div>


                   <div class="col-md-3" >
                      <div class="form-group">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['service']->p_image2; ?>" alt width="100">
                        
                      </div>
                   </div>

                   <div class="col-md-3" >
                      <div class="form-group">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['service']->p_image3; ?>" alt width="100">
                         
                      </div>
                   </div>

                   
                   <div class="col-md-3" >
                      <div class="form-group">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['service']->p_desc_img; ?>" alt width="100">
                         
                      </div>
                   </div>

                </div>
                
                
                
                
                <div class="row">
                   
                    
                    <div class="col-md-3">
                       <div class="form-group">
                    
                          <label >Service Image 1</label>
                          <input placeholder="service Image" type="file" name="pro_img1" class="form-control" >
                       </div>
                    </div>


                    <div class="col-md-3" >
                       <div class="form-group">
                    
                          <label >Service Image 2</label>
                          <input placeholder="service Image" type="file" name="pro_img2" class="form-control" >
                       </div>
                    </div>

                    <div class="col-md-3" >
                       <div class="form-group">
                      
                          <label >Service Image 3</label>
                          <input placeholder="service Image" type="file" name="pro_img3" class="form-control" >
                       </div>
                    </div>

                    
                    <div class="col-md-3" >
                       <div class="form-group">
                    
                          <label >Description Image </label>
                          <input placeholder="service Image" type="file" name="desc_img" class="form-control" >
                       </div>
                    </div>

                 </div>
                 
                 <div class="row">



                    <div class="col-md-12">
                        <div class="form-group">
                            <label >service Details</label>
                            <textarea placeholder="service details" name="p_details" class="form-control"><?php echo $data['service']->p_details; ?></textarea>
                        </div>
                    </div>



                </div>

               


                    <div class="form-group row">
                     

                        <div class="col-xl-12">
                            <label for="validationCustom0" ><span style="color:white;">*</span>Price</label>
                            <input class="form-control" type="number"  name="price" value="<?php echo $data['service']->p_price; ?>">
                        </div>
                        
                        
                    </div>



                                    <button type="submit" class="btn btn-primary" style="float: right;">Update</button>
                                    
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


<script>


$(document).ready(function(){
$('#validationCustom0as').attr('min', 100);

});
</script>