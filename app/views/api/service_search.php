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
            
            if(!empty($data['result']))
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
            if(!empty($data['result']))
            {
           
           
            foreach ($data['result'] as $k)
           
            {
             
  
    
             
            ?>
          
                <div class="col-12 col-md-6">
              <div class="card weekly-product-card">
                <div class="card-body d-flex align-items-center">
                  <div class="product-thumbnail-side">
                    <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/single_service/<?php echo $k->id;?>">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $k->p_image; ?>" width="50">
                    </a>
                  </div>
                  <div class="product-description">
              
                    <a class="product-title d-block" href="<?php echo URLROOT; ?>/api/single_service/<?php echo $k->id; ?>"><?php echo ucwords($k->p_name); ?></a>
                    <p class="sale-price" style="color:indigo;">Starts @ &#8377;<?php echo $k->p_price; ?> </p>
                    
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
  $search_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>