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

                      <td style="word-wrap:break-word;width:100px;"><a href="<?php echo  URLROOT; ?>/api/single_product/<?php echo $s->item_id;?>">
                      <?php echo $s->item_name; ?>
                      <span>&#8377; <?php echo $s->item_price; ?> &nbsp; </span></a></td>
<td></td>
                    <td>
                      
                        <a href="#">Qty 
                            <span>
                                 
                               <?php echo (int)$s->item_qty;  ?>
                              
                        
                             
                              
                            </span>
                        </a>
                    </td>
                    <td>
                      
                        <a href="#">Product Id
                            <span>
                                 
                           
                               <?php echo $s->item_id; 
                              ?>
                             
                              
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
            <div class="card-body d-lex align-items-center justify-content-between">
            <div class="card cart-amount-area" style='background-color: #eee;'>
            <div class="card-body d-lex algn-items-center jutify-content-between">
              <p class="total-price mb-0 pull-right">Sub Total : <i class='fa fa-inr'></i> <?php echo $data['get_order']->sub_total; ?></span></p><br>
              <p class="total-price mb-0 pull-right">Discount : <i class='fa fa-inr'></i> <?php echo $data['get_order']->coupon_value; ?></span></p><br>
              <p class="total-price mb-0 pull-right">Tax : <i class='fa fa-inr'></i> <?php echo $data['get_order']->tax_value; ?></span></p><br>
              <p class="total-price mb-0 pull-right">Shipping : <i class='fa fa-inr'></i> <?php echo $data['get_order']->shipping; ?></span></p><br>
               <h6 class="total-price mb-0 pull-right">Total : <i class='fa fa-inr'></i> <?php echo $data['get_order']->net_total; ?></span></h6>
             
            </div>
            </div>
            </div>
        </div>



        </div>




          
<style>
    .bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
</style>

<style>
  .row>* {
    width: 25%;}
</style>
<div class="container">
		
        
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($data['get_order']->status >=0){
                  echo 'complete';
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Placed</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($data['get_order']->status >=1){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Packed</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                 </div>
                
                 <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($data['get_order']->status >=2){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Shipped</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                    </div>
                
                    <div class="col-xs-1 bs-wizard-step 
                <?php 
                if($data['get_order']->status >=3){
                  echo 'complete';
                }else{
                  echo "disabled";
                }
                ?>">
                  <div class="text-center bs-wizard-stepnum">Delivered</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                   </div>
            </div>
        
        
        
        
        
	</div>

  <div class="card cart-amount-area">
            <div class="card-body d-lex align-items-center justify-content-between">
            <div class="card cart-amount-area" style='background-color: #eee;'>
            <div class="card-body d-lex algn-items-center jutify-content-between">
             
               <p class="total-price mb-0" style="font-size:15px;">Delivery By - <?php echo $data['get_order']->delivery_agent; ?></span><br>Tracking ID - <?php echo $data['get_order']->tracking_id; ?></span></p>
             
            </div>
            </div>
            </div>
        </div><br>
  
<?php
$date1 = strtotime($data['get_order']->created_at);
$date2 = strtotime(date('Y-m-d H:i:s'));
$hour = abs($date2 - $date1)/(60*60);
$order_hour = (int) $hour;
?>



          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">
            <a class="btn btn-success" href="<?php echo URLROOT; ?>/api/invoice/<?php echo $data['get_order']->id; ?>">View Invoice</a>
            
            <?php 
            if($data['get_order']->return_status==1){ 
              echo "<a class='btn btn-warning' href='#'>Return Requested</a>";
            }else if($data['get_order']->return_status==0 && $order_hour<=48){ 
              echo "<a class='btn btn-warning' href='".URLROOT."/api/return_order/".$data['get_order']->id."'>Return Order</a>";
            
            }else if($data['get_order']->return_status==2){ 
              echo "<a class='btn btn-danger' href='".URLROOT."/api/orders/"."'>Return Accepted</a>";
            }
            ?>




            </div>
          </div>

        <br>
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