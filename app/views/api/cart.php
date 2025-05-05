<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>



    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
        
          <?php if(empty($data['s'])){ ?>

              <div class="cart-table card mb-3">
            <div class="card-body">

                There are no items in your cart
                

                <!-- <?php //echo $_SESSION['user_id']; ?> -->

            </div>
          </div>

          <?php }else{ $s1 = $data['s']; ?>


            

            <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                    <?php 
                    $total=0;
                    $pageMod = New Apis; 
                    foreach ($s1 as $s) {

                    $curproduct  = $pageMod->get_productById($s->item_id); 
                    // echo ($curproduct->created_byId);
                    // $curvendor  = $pageMod->getVendorById($curproduct->created_byId);
                    
                    $cust = $pageMod->get_custinfo($_SESSION['rexkod_user_id']);
                      

                    $total = $total + $s->item_total_price; ?>
                  <tr>
                    
                    <td style="word-wrap:break-word;width:10px;"><a href="#">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $s->img; ?>" alt="">
                      </a></td>

                      <td style="word-wrap:break-word;width:100px;"><a href="#">

                      <?php 
                      $itm_name = $s->item_name;
                      if (strlen($itm_name) > 10){
                      $itm_name = substr($itm_name, 0,8).'..';
                      } echo $itm_name; 
                      ?>

                      <span>&#8377; <?php echo $s->item_price; ?> &nbsp; </span></a></td>

                    <td style="word-wrap:break-word;width:30px;">
                      
                        <a href="#">Qty 
                            <span>
                                 
                                <?php echo (int)$s->item_qty; ?>
                            </span>
                        </a>
                    </td>

                    <td style="word-wrap:break-word;width:100px;"><a href="#">Total<span>&#8377; <?php echo (float)$s->item_total_price; ?></span></a></td>
                    
                    <td style="word-wrap:break-word;width:100px;">
                    <a href='delete_cart_item/<?php echo $s->id; ?>'><button class='btn btn-warning btn-sm'><i class='fa fa-times'></i></button></a>
                    <a href='single_product/<?php echo $s->item_id; ?>'><button class='btn btn-success btn-sm'><i class='fa fa-pencil'></i></button></a>
                    </td>

                  </tr>

                  <?php } ?>
                  
                  
                </tbody>
              </table>
            </div>
          </div>


          <?php if($cust->user_type==0): ?>

          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0"><i class='fa fa-inr'></i> <?php echo $total; ?></span></h5>

              <?php
              echo "<a class='btn btn-success' href='".URLROOT."/api/address'>Select Address</a>";
              // if($curvendor->vendor_minorder<=$total){
              //   echo "<a class='btn btn-success' href='".URLROOT."/api/address'>Select Address</a>";
              // }else {
              // $dif_min = $curvendor->vendor_minorder - $total;
              // echo "<a class=''>Add <i class='fa fa-inr'></i>". $dif_min ." more to checkout </a>";
              // }
              ?>
            </div>
          </div>

          <?php else: ?>

          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0"> </span></h5>

             <a class='btn btn-success' href='#'>Request Order</a>
            </div>
          </div>


          <?php endif; ?>




          <?php } ?>

        
          <!-- Coupon Area-->
          
          <!-- Cart Amount Area-->
          
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


    <script type="text/javascript">
         function change_count(c,p) 
         {

            
            var count = $('#count').val();
            count = parseInt(count);
            if(c==1)
            {
               count =  parseInt(count) + 1;
               add_to_cart(p,1);
            }
            else
            {

               if(count < 2)
               {
                  // alert(c);
                  delete_to_cart(p,1);
                  
               }else
               {
                  delete_to_cart(p,1);
                  // count = parseInt(count) - 1;    
               }
            }
            // $('#count').val(count);
         }

         function add_to_cart(p,c) 
         {
            var product_id = p;
            var count = c;
             count = parseInt(count);

            $.ajax({
                  url: "<?php echo URLROOT; ?>/api/cart1",
                  type: "POST",
                  data: {count,product_id},

                  success: function(response)
                  {   
                     window.location.replace('<?php echo URLROOT; ?>/api/cart');
                  }
              });
         }
         function delete_to_cart(p,c) 
         {
            var product_id = p;
            var count = c;
             count = parseInt(count);
            $.ajax({
                  url: "<?php echo URLROOT; ?>/api/cart_delete",
                  type: "POST",
                  data: {count,product_id},

                  success: function(response)
                  {   
                     window.location.replace('<?php echo URLROOT; ?>/api/cart');
                  }
              });
         }
      </script>   

    <!-- Footer Nav-->
    <?php 
  $cart_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>