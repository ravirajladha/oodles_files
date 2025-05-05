<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
// $uri = $_SERVER['REQUEST_URI'];
// echo $uri;


?>


<body style="background-color:white">

    <?php 
    
    $s = $data['single_product']; 
    $item_tax = $data['subcategory']->subcategory_tax;
    // $item_cost = $s->price1;   
    $item_cost = $s->p_price;   
    $tax_val = ($item_tax / 100) * $item_cost; 
    $cost_val = $item_cost - $tax_val;
    $compare_price = $s->compare_price;
    $total=0;
    $incart=0;
    $cart_count =0;
    foreach ($data['cart_products'] as $cart) {
    $total = $total + $cart->item_total_price;
    $cart_count++;
    if($cart->item_id == $s->id){
      $incart=1;
      $item_qty=$cart->item_qty;
      $item_price=$cart->item_price;
    }
    }
    
    ?>
    
    
    <div class="page-content-wrapper">
    <div class="container">
      <!-- Product Slides-->
      <div class="product-slides owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $s->p_image; ?>')"></div>
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $s->p_image2; ?>')"></div>
        <!-- Single Hero Slide-->
        <div class="single-product-slide" style="background-image: url('<?php echo URLROOT; ?>/uploads/<?php echo $s->p_image3; ?>')"></div>
      </div>
      <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data mb-3 py-3">
          <div class="container d-flex justify-content-between">
            <div class="p-title-price">
              <hr>
              <span>
              <h6 class=mb-1 style="color:black;"><?php echo ucwords($s->p_name); ?></h6>
  </span>
              <p class="sale-price mb-0" style="color:indigo;">Starts @ &#8377; <?php echo $s->p_price;
              if(isset($compare_price)){echo "<span>&#8377;" .$compare_price."</span>"; }
              echo "<span style='text-decoration:none;'> (&#8377;".$cost_val." + &#8377;".$tax_val." GST)</span>"; ?>
              <!-- <span>&#8377; <?php echo $item_tax; ?></span> -->
            </p>
            </div>
            
          </div>
        
        <!-- Flash Sale Panel-->
        

        <!-- Add To Cart-->
        <div class="cart-form-wrapper  mb-3 py-3">
          <div class="container">

            <form class="cart-form" action="<?php echo URLROOT; ?>/api/checkout_services/<?php echo $s->id; ?>" method="post">

              <!-- <div class="order-plus-minus d-flex align-items-center">

                <div class="quantity-button-handler">-</div>
                <input class="form-control cart-quantity-input" type="text" step="1" name="quantity" value="3">
                <div class="quantity-button-handler">+</div>
              </div> -->

              <div class="input-group input-to cart-items-number">

         <style>
             .cart-form .form-control {
    max-width: 200px !important;
}
         </style>                 


                           <input name="date_data" type="date" class="form-control" style="margin-left:10px;width:80px !important" required>
                           <input name="time_data" type="time" class="form-control" style="margin-left:10px;width:80px !important" required>

                          


                           <input type="submit" class="btn btn-success ms-3"

                      

if($incart==0)
{
  echo value= 'Book Service';
  } else 
  {
    echo value= 'Update';
    } 
    
  
     ?>                     
                           
                        </div>
   
            </form>
            <!-- <hr> -->
              <?php 
               if($incart!=0){ echo "<h6 style='font-size:15px;'><br>Currently ".$item_qty." in Cart at <i class='fa fa-inr'></i>$item_price each </h6>";}
                ?>




                         <div class="p-specification">
          

            <ul class="ps-3" style="padding-left:0rem !important">




</ul>           
          

      

        </div>
        <!-- Product Specification-->
        
<!-- bd-white removed -->
        <div class="p-specification  mb-3 py-3">
          <div class="container">
          <h6>Description</h6>
          <div class="col-4 align-self-center"> <p><?php echo"<li><i class='lni '> </i> ". $s->p_details." </li>"; ?></p></div>
          <div class="row">
              
              <div class="col-8"><?php 
            if($s->p_desc_img){
              echo "<p><img src='".URLROOT."/uploads/".$s->p_desc_img."'></p>";
            }
            ?></div>
           
          </div>

            
            
           

            <ul class="mb-3 ps-3">
              <?php foreach($data['pp_points'] as $ppp){
                echo "<li><i class='lni lni-checkmark-circle'> </i> ". $ppp->ppp_content. " </li>";
              }?>
            </ul>

            
          </div>
        </div>

      </div>
    </div>
            </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->



     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
  <?php } unset($_SESSION['success']); ?>


<script type="text/javascript">
   function change_count(c) 
   {


       var count = $('#count').val();
       count = parseInt(count);
      if(c==1)
      {
         count =  parseInt(count) + 1;
      }else
      {
         if(count < 2)
         {

         }else
         {
            count = parseInt(count) - 1;   
         }
          
      }

      $('#count').val(count);
   }
   function add_to_booking() 
   {

      var product_id = $('#product_id').val();
      var count = $('#count').val();
       count = parseInt(count);

      $.ajax({
            url: "<?php echo URLROOT; ?>/api/cart1",
            type: "POST",
            data: {date_time,product_id},

            success: function(response)
            {   
               // swal("Item Added to cart");
            }
        });
   }
   function add_to_buy() 
   {
      var product_id = $('#product_id').val();
      var count = $('#count').val();
      count = parseInt(count);
      $.ajax({
            url: "<?php echo URLROOT; ?>/api/add_to_buy",
            type: "POST",
            data: {count,product_id},

            success: function(response)
            {   
               window.location.replace('<?php echo URLROOT; ?>/api/cart');
            }
        });
   }
</script>


<script type="text/javascript">

   // $('#heart2').hide();
   // $('#good2').hide();
   // $('#not_good2').hide();

   function change_heart(id)
   {
      // $('#heart1').hide();
      // $('#heart2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_heart_func",
                data:{prod_id},
                success:function(data)
                {

                  window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // swal("You rated the product Very Good"); 
                     // $('#good2').hide();
                     // $('#not_good2').hide();   
                }
            });

   }

   function change_good(id)
   {
      // $('#good1').hide();
      // $('#good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_good_func",
                data:{prod_id},
                success:function(data)
                {
                    // swal("You rated the product Good"); 

                     window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#not_good2').hide();        
                }
            });

   }


   function change_not_good(id)
   {
      // $('#not_good1').hide();
      // $('#not_good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_not_good_func",
                data:{prod_id},
                success:function(data)
                {
                     // swal("You rated the product Not Good");

                      window.location.href = '<?php  echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#good2').hide();
                          
                }
            });

   }

   function change_wishlist(id)
   {
      // $('#good1').hide();
      // $('#good2').show();

      var prod_id = id;

      $.ajax({
                type:"POST",
                url: "<?php echo URLROOT; ?>/api/change_wishlist",
                data:{prod_id},
                success:function(data)
                {
                    swal("Product added to wishlist"); 

                     // window.location.href = '<?php  //echo URLROOT;?>/api/product_details1/'+prod_id;
                     // $('#heart2').hide();
                     // $('#not_good2').hide();        
                }
            });

   }

</script>

<?php 
require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>