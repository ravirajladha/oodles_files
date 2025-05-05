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
                        <h5> Add Service</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel" aria-labelledby="account-tab">

                                <form method="post" action="<?php echo URLROOT; ?>/admin/create_service" enctype="multipart/form-data" autocomplete="OFF">
                                    
                                        
                    <div class="row">

                    
                    
                    <div class="col-md-6">
                       <div class="form-group">
                          <label >Service Name</label>
                          <input placeholder="Service Name" type="text" name="name" class="form-control" required>
                       </div>
                    </div>


                    
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label >Service Subcategory</label>
                            

                            <select  class="form-control"  id="select_change" required="" name="subcat">
                            <option disabled="" selected="" value="">-SELECT-</option>
                            <?php foreach($data['all_subcategory'] as $subcat) {  ?>
                            <option value="<?php echo $subcat->subcategory_id; ?>"><?php echo ucwords($subcat->subcategory_name); ?></option>
                            <?php } ?>
                        </select>

                       </div> 
                    </div>

                    <div class="col-md-4" >
                       <div class="form-group">
                          <label >Service Image 1</label>
                          <input placeholder="service Image" type="file" name="pro_img1" class="form-control" required>
                       </div>
                    </div>


                    <div class="col-md-4" >
                       <div class="form-group">
                          <label >Service Image 2</label>
                          <input placeholder="service Image" type="file" name="pro_img2" class="form-control">
                       </div>
                    </div>

                    <div class="col-md-4" >
                       <div class="form-group">
                          <label >service Image 3</label>
                          <input placeholder="service Image" type="file" name="pro_img3" class="form-control" >
                       </div>
                    </div>

                    
                    <div class="col-md-8">
                        <div class="form-group">
                            <label >Service Details</label>
                            <textarea placeholder="Enter Service Details" name="p_details" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-4" >
                       <div class="form-group"><br>
                          <label >Description Image </label>
                          <input placeholder="service Image" type="file" name="desc_img" class="form-control">
                       </div>
                    </div>

                    

                </div>

             
                    <div class="form-group row">
                   

                        <div class="col-xl-12">
                            <label for="validationCutom0" ><span style="color:white;">*</span>Price</label>
                            <input class="form-control" id="validationCstom0" type="number" name="price">
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



        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets3/js/jquery.czMore-latest.js"></script>
    <script type="text/javascript">
        //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.
        $("#czContainer").czMore({
            max: 5
        });


    function updateInput(mid,val){
        mid_val = mid.slice(-1);
        mid_val = parseInt(mid_val) + 1;
        mid = "min" + mid_val;
        val=parseInt(val)+1;
        document.getElementById(mid).value = val;
    }
    </script>

    