<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>
  

    <div class="page-content-wrapper">
      <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
          <!-- User Information-->
          <div class="card user-info-card">
            <div class="card-body p-4 d-flex align-items-center">
             
              <div class="user-info">
                
                <h5 class="mb-0"><?php 
                // echo  ucwords($data['get_user_details']->name); 
                ?></h5>
                <p class="mb-0 text-white">Add Product</p>
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
   <style>
     label{
       color:#333;
       margin-top:5px;
     }
   </style>           
      <form method="post" action="<?php echo URLROOT; ?>/api/create_product" enctype="multipart/form-data" autocomplete="OFF">
              <div class="row">
        

<div class="col-md-6">
<div class="form-group">
    <label >Product Name</label>
    <input placeholder="Product Name" type="text" name="name" class="form-control" required>
</div>
</div>



<div class="col-md-6" >
    <div class="form-group">
        <label >Product Subcategory</label>
        

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
    <label >Product Image 1</label>
    <input placeholder="Product Image" type="file" name="pro_img1" class="form-control" required>
</div>
</div>


<div class="col-md-4" >
<div class="form-group">
    <label >Product Image 2</label>
    <input placeholder="Product Image" type="file" name="pro_img2" class="form-control">
</div>
</div>

<div class="col-md-4" >
<div class="form-group">
    <label >Product Image 3</label>
    <input placeholder="Product Image" type="file" name="pro_img3" class="form-control" >
</div>
</div>


<div class="col-md-8">
    <div class="form-group">
        <label >Product Details</label>
        <textarea placeholder="Product details" name="p_details" class="form-control"></textarea>
    </div>
</div>

<div class="col-md-4" >
<div class="form-group"><br>
    <label >Description Image </label>
    <input placeholder="Product Image" type="file" name="desc_img" class="form-control">
</div>
</div>



</div>


<div class="form-group row">


    <div class="col-xl-12">
        <label for="validationCutom0" ><span style="color:white;">*</span>Price</label>
        <input class="form-control" id="validationCstom0" type="number" name="price">
    </div>
    
    
</div>
<br>




                <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                
                
            </form>
</div>

</div>
<div class="pull-right">

</div>
</div>
              
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
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>