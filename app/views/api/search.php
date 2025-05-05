<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 

?>



    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">

            <?php
            if(!empty($data['res']))
            {
            ?>
                <h6>Showing results for "<?php echo $data['search_input']; ?>" </h6>
            <?php
            }
            else
            {
            ?>
                <h6>No results Found Try agin</h6>
            <?php
            }
            ?>
            
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              
            </div>
          </div>
            
              <div class="row g-3">
            <!-- Single Weekly Product Card-->

            <?php
            if(!empty($data['res']))
            {
            $pageMod = new Apis; 
            foreach ($data['res'] as $k)
            {
              $curvendor  = $pageMod->getVendorById($k->created_byId);
              $curcat  = $pageMod->getCategoryById($curvendor->vendor_category_id);
              $cursubcat  = $pageMod->getSubcategoryById($curvendor->vendor_subcategory_id);

            ?>

                <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/find_productsFor_vendorId/<?php echo $curvendor->vendor_id; ?>">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $cursubcat->subcategory_img; ?>" width="50">
                    </a>
                  </div>
                  <div class="product-description">
                  <?php if($curvendor->vendor_plan){
                      echo "<i class='fa fa-check-circle pull-right' style='color:green;'></i>";
                    } ?>
                    <a class="product-title d-block" href="<?php echo URLROOT; ?>/api/find_productsFor_vendorId/<?php echo $curvendor->vendor_id; ?>"><?php echo ucwords($curvendor->vendor_name); ?></a>
                    <p class="sale-price"><?php echo $curvendor->vendor_state; ?> <br>Delivers in <?php echo $curvendor->vendor_timing; ?> Days</p>
                    
                  </div>
                </div>
              </div>
            </div>

            <?php
            }
            }
            ?>
               
            
            
          </div>


        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php 
  $vendor_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>