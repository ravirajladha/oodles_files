
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
            <!-- min-height: 200px -->
            <?php
                $count = 1;
                   foreach ($data['all_pro'] as $k) {?>
            <div class="col-6 col-md-4 col-lg-3 ">

              <div class="card-deck top-product-card">
              <div class="card">
                <div class="card-body ;">
                <div class="embed-responsive embed-responsive-16by9">

                  <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/single_product/<?php echo $k->id; ?>">
                    <img style="width: 18rem; height: 15rem;" src="<?php echo URLROOT; ?>/uploads/<?php echo $k->p_image; ?>" alt="">
                  </a>

                  <a class="product-title d-block" href="<?php echo URLROOT; ?>/api/single_product/<?php echo $k->id; ?>">
                   <?php
                        $title = $k->p_name;
                        // echo($title);
                      ?>
                  
                        <div class="product-title text-center" style="color:black;"><?php 
                        echo truncate($title,2);
                         ?></div>
                    
                  </a>

                  <div class="text-center">&#8377;<?php echo $k->p_price; ?></div>
                  </p>
                  <div class="product-rating text-center">

                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                    <i class="lni lni-star-filled"></i>
                   
                  </div>
                  </div>
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
      function truncate($text, $limit=0) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, $limit);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
    }
?>
    <?php 
     require APPROOT . '/views/inc/nav-footer.php';
    require APPROOT . '/views/inc/footer.php'; ?>