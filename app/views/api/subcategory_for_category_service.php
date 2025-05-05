<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>



    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Subcategory: <?php 
            // echo ucwords($data['res']->category_name);
             ?></h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              
            </div>
          </div>
          <div class="product-catagories">
            
          </div>
          <div class="row g-3">
            <!-- Single Top Product Card-->

            <?php
                $count = 1;
                // $curModel = New Apis; 

                   foreach($data['subcategory_forCategoryId'] as $k) {?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body">
                  <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/services/<?php echo $k->subcategory_id; ?>">
                    <img class="mb-2" src="<?php echo URLROOT; ?>/uploads/<?php echo $k->subcategory_img; ?>" alt="" style="height:120px;">
                  </a>

                 <?php echo $k->subcategory_name; ?>
                    
                  </a>

                  <p class="sale-price">Shipping cost &#8377;<?php echo $k->shipping_cost; ?>
                 
                </p>

                 

                </div>
              </div>
            </div>

            <?php
              $count++;
               }?>

            
              
            
           
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