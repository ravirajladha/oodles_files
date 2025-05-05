<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>

    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Subcategory</h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              <!-- <select class="form-select" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                <option selected>Short by</option>
                <option value="1">Newest</option>
                <option value="2">Popular</option>
                <option value="3">Ratings</option>
              </select> -->
            </div>
          </div>
          <div class="product-catagories">
            
          </div>
          <div class="row g-3">
            <!-- Single Weekly Product Card-->

            <?php
            $curModel = New Admins; 
            foreach ($data['get_all_subcategory'] as $k)
            {
              // $cursubcat  = $curModel->getSubcategoryById($k->vendor_subcategory_id);
            ?>

                <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/vendor_forSubcategoryId/<?php echo $k->subcategory_id; ?>">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $k->subcategory_img; ?>" alt="" style="height:50px;">
                    </a>
                  </div>
                  <div class="product-description">
                    <?php
                    //  if($k->vendor_plan){
                    //   echo "<img src='".URLROOT."/assets3/images/pp.png' width='60' class='pull-right' />";
                    // } 
                    ?>
                    <a class="product-title d-block" href="<?php echo URLROOT; ?>/api/vendor_forSubcategoryId/<?php echo $k->subcategory_id; ?>"><?php echo ucwords($k->subcategory_name); ?></a>
                    <p class="sale-price"> <br>Shipping Cost <?php echo $k->shipping_cost; ?> 
                    
                  </div>
                </div>
              </div>
            </div>

            <?php
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