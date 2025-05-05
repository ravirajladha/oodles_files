<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>




    
    <div class="page-content-wrapper" >
      <div class="container">
        <div class="pt-3">
          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->
            <!-- <div class="single-hero-slide" style="background-image: url('<?php echo URLROOT; ?>/assets2/img/bg-img/1.jpg')"> -->

             

              <div class="single-hero-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->ban1; ?>')">

              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <!-- <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Amazon Echo</h4> -->
                  <!-- <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a> -->
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->ban2; ?>')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <!-- <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Light Candle</h4> -->
                  <!-- <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">Now only $22</p><a class="btn btn-success btn-sm" href="#" data-animation="fadeInUp" data-delay="500ms" data-duration="1000ms">Buy Now</a> -->
                </div>
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->ban3; ?>')">
              <div class="slide-content h-100 d-flex align-items-center">
                <div class="slide-text">
                  <!-- <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Best Furniture</h4> -->
                  <!-- <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3 years warranty</p><a class="btn btn-danger btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-duration="1000ms">Buy Now</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="top-products-area clearfix py-3"> 
        <div class="container">
          
          <div class="row g-3">

            <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3" >
              <!-- <div class="card top-product-card">
                <div class="card-body"> -->

                    <a class="wishlist-btn" href="#">
                    </a>

                    <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/vendors">

                    <img class="mb-2" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->ban4; ?>" alt="" style="height:125px;border-radius:10px;">

                    </a> 


               <!--  </div>
              </div> -->
            </div>
            <!-- Single Top Product Card-->


             <!-- Single Top Product Card-->
            <div class="col-6 col-md-4 col-lg-3">
             <!--  <div class="card top-product-card">
                <div class="card-body"> -->

                    <a class="wishlist-btn" href="#">
                    </a>

                    <a class="product-thumbnail d-block" href="<?php echo URLROOT; ?>/api/vendors">

                    <img class="mb-2" src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->ban5; ?>" alt="" style="height:125px;border-radius:10px;">

                    </a> 


               <!--  </div>
              </div> -->
            </div>
            <!-- Single Top Product Card-->
            
            
            
          </div>
        </div>
      </div>

            <!-- Flash Sale Slide-->
      <div class="flash-sale-wrapper" style="margin-top:-10px!important;">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              
                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
            Popular Categories
            </h6>

            <a href="<?php echo URLROOT; ?>/api/category  ">
            <button class='btn btn-light btn-sm '><h6>View</h6></button>    
                    <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
          </a>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">

           <?php 
					     foreach($data['get_category'] as $category) :
             ?>
                    <a href="<?php echo URLROOT; ?>/api/subcategory_forCategoryId/<?php echo $category->category_id ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $category->category_img ?>" alt="" style="border-radius:10px;height:105px;">
                        <div class="product-title justify-content-center text-center" style="color:black;"><?php echo $category->category_name; ?></div>
                    </a>

                 <?php
                 endforeach;
                 ?>

          </div>
        </div>
      
      </div>



      <!-- Product Catagories-->
      <div class="product-catagories-wrapper py-1" style="margin-top:-1px!important;">
        <div class="container">
          <div class="section-heading">
            <h6>Deals</h6>
          </div>
          <div class="product-catagory-wrap">
            <div class="row g-3">
              <!-- Single Catagory Card-->
              <div class="col-4">
                <!-- <div class="card catagory-card">
                  <div class="card-body"> -->
                    <a class="text-danger" href="<?php echo URLROOT; ?>/api/vendors">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->deal1; ?>" alt="" style="border-radius:10px;height:80px;">
                        <!-- <span style="color:black;">Women's</span> -->
                    </a>
                <!-- </div>
                </div> -->
              </div>
              <!-- Single Catagory Card-->
              <div class="col-4">
                <!-- <div class="card catagory-card">
                  <div class="card-body"> -->
                    <a class="text-danger" href="<?php echo URLROOT; ?>/api/vendors">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->deal2; ?>" alt="" style="border-radius:10px;height:80px;">
                        <!-- <span style="color:black;">Women's</span> -->
                    </a>
                <!-- </div>
                </div> -->
              </div>
              <!-- Single Catagory Card-->
              <div class="col-4">
                <!-- <div class="card catagory-card">
                  <div class="card-body"> -->
                    <a class="text-danger" href="<?php echo URLROOT; ?>/api/vendors">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_banner']->deal3; ?>" alt="" style="border-radius:10px;height:80px;">
                        <!-- <span style="color:black;">Women's</span> -->
                    </a>
                <!-- </div>
                </div> -->
              </div>
              <!-- Single Catagory Card-->

              <!-- Single Catagory Card-->
             
              <!-- Single Catagory Card-->
     
            </div>
          </div>
        </div>
      </div>

                  <!-- Flash Sale Slide-->
        <div class="flash-sale-wrapper" style="margin-top:10px!important;">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              
                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
            Popular  Sub-category
            </h6>
            <a href="<?php echo URLROOT; ?>/api/subcategory ">
            <button class='btn btn-light btn-sm '><h6>View</h6></button>
                        <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
          </a>
            
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">

           <?php 
         
					     foreach($data['get_subcategory'] as $subcategory) :
             ?>
                    <a href="<?php echo URLROOT; ?>/api/vendor_forSubcategoryId/<?php echo $subcategory->subcategory_id; ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $subcategory->subcategory_img ?>" alt="" style="border-radius:10px;height:105px;">
                        <div class="product-title text-center" style="color:black;"><?php echo $subcategory->subcategory_name; ?></div>
                    </a>
                 <?php
                 endforeach;
                 ?>

          </div>
        </div>

        
      
      </div><br>

      <div class="flash-sale-wrapper" style="margin-top:-11px!important;">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              
                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
            Popular  Products
            </h6>

            <a href="<?php echo URLROOT; ?>/api/products ">
            <button class='btn btn-light btn-sm '><h6>View</h6></button>  
                      <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
          </a>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">

           <?php 
         
					     foreach($data['get_product'] as $products) :
             ?>
                    <a href="<?php echo URLROOT; ?>/api/single_product/<?php echo $products->id ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $products->p_desc_img ?>" alt="" style="border-radius:10px;height:105px;">
                        
                        <?php
                        $p_name = $products->p_name;
                        // echo($title);
                      ?>
                  
                        <div class="product-title text-center" style="color:black;"><?php 
                        echo truncate($p_name,"3");
                         ?></div>
                    </a>
                 <?php
                 endforeach;
                 ?>

          </div>
        </div>

        
      
      </div><br>


            <!-- Flash Sale Slide-->
            <div class="flash-sale-wrapper" style="margin-top:-11px!important;">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6 class="me-1 d-flex align-items-center">
              
                <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
            Flagship Brands
            </h6>

            <a href="<?php echo URLROOT; ?>/api/product_fb ">
            
            <button class='btn btn-light btn-sm '><h6>View</h6></button>
            <!-- <button type="button" class="btn btn-dark">View</button> -->
            <!-- <i class="fa fa-eye" aria-hidden="true"></i> -->
          </a>
          </div>
          <!-- Flash Sale Slide-->
          <div class="flash-sale-slide owl-carousel">

           <?php 
					     foreach($data['get_admin_product'] as $product) :
             ?>
                    <a href="<?php echo URLROOT; ?>/api/single_product/<?php echo $product->id ?>">
                        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $product->p_desc_img ;?>" alt="" style="border-radius:10px;height:105px;">
                        <div class="product-title text-center" style="color:black;"><?php echo $products->p_name; ?></div>
                    </a>

                 <?php
                 endforeach;
                 ?>

          </div>
        </div>
      
      </div>


      
      <!-- Featured Products Wrapper-->
      <div class="featured-products-wrapper py-3">
 
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
  <?php } unset($_SESSION['success']); ?>
<?php
  function truncate($text, $limit) {
if (str_word_count($text, 0) > $limit) {
    $words = str_word_count($text, 2);
    $pos = array_keys($words);
    $text = substr($text, 0, $pos[$limit]) . '...';
}
return $text;
}
?>
  <?php 
  $home_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>

    