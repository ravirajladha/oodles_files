<?php if(!empty($data['s'])){ ?>
<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>


    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
          <form action="#" method="post" id="out_form"> 

            <input type="hidden" name="check_orderType" id="check_orderTypeId" value="0">

          <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
            <table class="table mb-0">
                <tbody>
                    <?php 
                    $total=0;
                    $total_tax=0;
                    $s1 = $data['s'];
                    $pageMod = new Apis;
                    foreach ($s1 as $s) {
                      
                    $total = $total + $s->item_total_price; 

                    $curproduct  = $pageMod->get_productById($s->item_id); 
                    // echo $s->item_id;
                    // echo $curproduct->created_byId;
                    $curvendor  = $pageMod->getVendorById($curproduct->created_byId);
                    $cursubcat  = $pageMod->getSubcategoryById($curproduct->p_subcat);  
                    $shipping_cost = $cursubcat->shipping_cost;
                    $tax_val = $cursubcat->subcategory_tax;

                    $coupon_applied = NULL;
                    $coup_val_final = 0;
                    $buyer_protect = NULL;

                    $coupon_applied = $s->coupon_id;
                    if($coupon_applied){
                     $coupon_active = $pageMod->cart_active_coupon($coupon_applied); 
                    }
                    ?>
                  <tr>
                    
                    <td style="word-wrap:break-word;width:10px;"><a href="#">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $s->img; ?>" width="40" alt="">
                      </a></td>

                      <td style="word-wrap:break-word;width:100px;"><a href="#">

                      <?php 

                      $cal_tax = ($tax_val / 100) * $s->item_price;
                      $item_tax_price = $s->item_price-$cal_tax;                      


                      $itm_name = $s->item_name;
                      if (strlen($itm_name) > 10){
                      $itm_name = substr($itm_name, 0,8).'..';
                      } echo $itm_name; 
                      ?>

                      <span>&#8377; <?php echo $item_tax_price; ?> &nbsp; </span></a></td>

                    <td style="word-wrap:break-word;width:10px;">
                      
                        <a href="#">Qty 
                            <span>
                                 
                                <?php echo (int)$s->item_qty; ?>
                            </span>
                        </a>
                    </td>

                    <td style="word-wrap:break-word;width:50px;">
                      
                        <a href="#">GST 
                            <span>
                                 
                                <?php 
                                $tax_cart_val = $cal_tax * $s->item_qty;
                                $total_tax = $total_tax + $tax_cart_val;
                               
                                echo $tax_val."% (&#8377;".$tax_cart_val.")"; ?>
                            </span>
                        </a>
                    </td>

                    <td style="word-wrap:break-word;width:100px;"><a href="#">Total<span>&#8377; 
                      
                    <?php 
                    $sub_total_cart = $s->item_price * $s->item_qty; 
                    echo $sub_total_cart;

                    
                    
                    ?></span></a></td>
                 

                  </tr>

                  <?php } ?>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </form>
          <!-- Coupon Area-->

          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body align-items-center justify-content-between">

                <p style='font-size:15px'>Available Coupons</p>
                
                <table class='table' style="border-color:white;background:#f2dede;">
                    <tbody>
                <?php
                    $curcoupons  = $pageMod->checkout_coupons($curproduct->created_byId,$cursubcat->subcategory_id); 
                    foreach($curcoupons as $curcoupon){
                      
                      $coupon_type = $curcoupon->coupon_type;
                      $coupon_val = $curcoupon->coupon_value;
                      
                      if($coupon_type == 1){
                        $coupon_dis = $coupon_val."%";
                      }else {$coupon_dis = "<i class='fa fa-inr'></i>".$coupon_val;}

                      if($coupon_applied==$curcoupon->coupon_id){                      
                      echo "<tr><td>".$curcoupon->coupon_title."<span style='font-size:11px'> ( ". $coupon_dis ." Discount )</span></td><td><button class='btn btn-sm btn-success pull-right'>Applied</button></td></tr>";
                      }
                      else {
                        echo "<tr><td>".$curcoupon->coupon_title."<span style='font-size:11px'> ( ". $coupon_dis ." Discount )</span></td><td><a href='".URLROOT."/api/update_cart_coupon/".$curcoupon->coupon_id."'><button class='btn btn-sm btn-warning pull-right'>Apply</button></a></td></tr>";
                      }
                    }
                     ?>
                         </tbody>
                         </table>
            </div>
          </div>

          
<style>
  .cart-table img {
    max-width: 100px;
    border: none;
  }
</style>



</div</div>
            <div class="cart-table card mb-12">
            <div class="table-responsive card-body">
              <table class="table mb-0">
                <tbody>
                    
                  <tr>
                    
                    
                    <?php
                    if(isset($curvendor->vendor_plan)){
                    echo "<td style='word-wrap:break-word;width:100px;'><img src='".URLROOT."/assets3/images/bp.png' width='80' class='pull-left' /> </td>";}
                    ?>
                    


                    <td><span><b>Sub-Total:</b> &nbsp;&nbsp; &#8377; <?php 
                    $sub_total_last = $total - $tax_cart_val;
                    echo $sub_total_last; ?></span>
                    <br>

                    

                    <?php
                    if(isset($coupon_applied)){
                      $active_ctype = $coupon_active->coupon_type;
                      $active_cvalue = $coupon_active->coupon_value;
                      $active_ccap = $coupon_active->coupon_cap;
                      $coup_val_final = $active_cvalue;
                      if($active_ctype==1){
                        $coup_val_temp = ($active_cvalue*$sub_total_last)/100;
                        if($coup_val_temp >= $active_ccap && $active_ccap != NULL){
                          $coup_val_final = $active_ccap;
                        } else {
                          $coup_val_final = $coup_val_temp;
                        }
                        echo "<span><b>Discount:</b> &nbsp;&nbsp;&#8377;".$coup_val_final." </span><br>";
                      }else {
                        echo "<span><b>Discount:</b> &nbsp;&nbsp;&#8377;".$coup_val_final."</span><br>";
                      }
                      
                    $total_new = $sub_total_last - $coup_val_final;
                    echo "<span><b>Total:</b> &nbsp;&nbsp;&#8377;".$total_new."</span><br>";
                    }else {
                      $total_new = $sub_total_last;
                    }
                    ?>


                    <?php
                    if(isset($curvendor->vendor_plan)){
                      $buyer_protect = 50;
                    echo "<span><b>Buyer Protection:</b> &nbsp;&#8377; 50</span><br>";
                    } ?>

                    <span><b>Tax:</b> <?php echo $tax_val; ?>% (&nbsp;&nbsp;&#8377;<?php echo $total_tax.' '; ?>) </span>

                    <br>

                    <span><b>Shipping:</b> &nbsp;&nbsp; &#8377; <?php echo $shipping_cost; ?> </span>

                    <br>

                    <span><b>Net Total:  &nbsp;&nbsp;&nbsp;</b>&#8377; <?php 

                  if(isset($curvendor->vendor_plan)){
                      $final_total = $total_new + $buyer_protect + $shipping_cost + $total_tax;
                  }else {
                    $final_total = $total_new + $shipping_cost + $total_tax;
                  }

                    echo $final_total;
                    
                    
                    ?></span>
                    
                    </td>
                    

                  </tr>

               
                  
                  
                </tbody>
              </table>
            </div>
          </div>
<br>
<form action="<?php echo URLROOT?>/api/pay_for_payment ?>" method="post">
            <div class="shipping-method-choose mb-3">
            <div class="card shipping-method-choose-title-card bg-success">
              <div class="card-body">
                <h6 class="text-center mb-0 text-white">Payment Method</h6>
              </div>
            </div>
            <?php 
            $balance_amount = $data['get_wallet_info']->balance_amount;
            
             ?>
            <div class="card shipping-method-choose-card">
              <div class="card-body">
                <div class="shipping-method-choose">
                  <ul class="ps-0">
                    <?php if ($balance_amount> $final_total) { ?>
                    <li>
                      <?php $option_present = 1 ?>
                      <input id="fastShipping" type="radio" name="selector" value="1" checked="">
                      <label for="fastShipping">Pay Through Wallet</label>
                      <div class="check"></div>
                    </li>
                 <?php } ?>
                    <?php  
                    $s1 = $data['s'];
                    $i=0;
                    foreach ($s1 as $s)  {
                      $i++;
                   
                      if($i<=1){
                    if($data['userinfo']->user_permission==1){
                       $option_present = 1;
                    echo "<li>
                      <input id='normalShipping' type='radio' name='selector' value='2' checked=''>
                      <label for='normalShipping'>Pay On Delivery</label>
                      <div class='check'></div>
                    </li>"; 
                    echo "<li>
                      <input id='instantShipping' type='radio' name='selector' value='3' checked=''>
                      <label for='instantShipping'>COD + Wallet</label>
                      <div class='check'></div>
                    </li>"; 
                    }
                  }
               
              }
               
                    ?> 
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">


              <h5 class="total-price mb-0">Total : &#8377;<span class=""><?php 

              $data_checkout = [
                'vendor_checkout' => $curproduct->created_byId,
                'subtotal_checkout' => $sub_total_last,
                'coupon_checkout' => $coupon_applied,
                'coupon_value_checkout' => $coup_val_final,
                'total_checkout' => $total_new,
                'buypro_checkout' => $buyer_protect,
                'tax_Percentage_checkout' => $tax_val, 
                'tax_value_checkout' => $total_tax, 
                'shipping_checkout' => $shipping_cost,
                'net_total' => $final_total 
              ];

              $_SESSION['data_checkout'] = serialize($data_checkout);

              echo $final_total; ?></span></h5>
              <?php if ($option_present==1){ ?>
                
              <button type="submit" class="btn btn-warning" style="float: right;">Proceed</button>
              <?php }else{ ?>
                <p class='text-secondary' >Please contact admin to enable  COD option or add money to wallet.</p>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div></div></div>
            </form>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <script type="text/javascript">
      
      function active_func() 
      {
        var radioValue = $("input[name='selector']:checked").val();

        
      }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
  <?php } unset($_SESSION['success']); ?>


    <!-- Footer Nav-->
      <?php } else{
        redirect('apis/cart');
      } ?>
    <?php 
  $cart_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>
    