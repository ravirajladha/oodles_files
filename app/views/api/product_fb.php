
    <?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>Products</h6>
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
                   foreach ($data['all_pro'] as $k) {?>
            <div class="col-6 col-md-4 col-lg-3">
              <div class="card top-product-card">
                <div class="card-body">
                  <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/single_product/<?php echo $k->id; ?>">
                    <img class="mb-2" src="<?php echo URLROOT; ?>/uploads/<?php echo $k->p_image; ?>" alt="">
                  </a>

                  <a class="product-title d-block" href="<?php echo URLROOT; ?>/api/single_product/<?php echo $k->id; ?>"><?php echo $k->p_name; ?>
                    
                  </a>

                  <span>&#8377;<?php echo $k->price1; ?></span></p>

                  <div class="product-rating">

                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                  </div>

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
     require APPROOT . '/views/inc/nav-footer.php';
    require APPROOT . '/views/inc/footer.php'; ?>