<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>



    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">


        


            

            <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                <?php
                $total=0;
            foreach ($data['get_order_detail'] as $s)
            {
                
            $total=$total+$s->item_total_price;
               
            ?>
                    
                  <tr>
                    
                    <td style="word-wrap:break-word;width:10px;"><a href="#">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $s->p_img; ?>" alt="">
                      </a></td>

                      <td style="word-wrap:break-word;width:100px;"><a href="#">
                      <?php echo $s->item_name; ?>
                      <span>&#8377; <?php echo $s->item_price; ?> &nbsp; </span></a></td>

                    <td>
                      
                        <a href="#">Qty 
                            <span>
                                 
                                <?php echo (int)$s->item_qty; ?>
                            </span>
                        </a>
                    </td>

                    <td><a href="#">Total<span>&#8377; <?php echo (float)$s->item_total_price; ?></span></a></td>
                    
                   

                  </tr>

                  <?php } ?>
                  
                  
                </tbody>
              </table>
              <div class="card cart-amount-area" style='background-color: #eee;'>
            <div class="card-body d-lex algn-items-center jutify-content-between">
              <h6 class="total-price mb-0 pull-right">Total : <i class='fa fa-inr'></i> <?php echo $total; ?></span></h6>
             
            </div>
          </div>
            </div>
          </div>

         

         
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
            <a class="btn btn-success" href="<?php echo URLROOT; ?>/api/address">View Invoice</a>
              <a class="btn btn-warning" href="<?php echo URLROOT; ?>/api/address">Cancel Order</a>
            </div>
          </div>

        
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
  $order_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?> 