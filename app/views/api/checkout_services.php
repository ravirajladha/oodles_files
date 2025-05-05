
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
               
                  <tr>
                    
                    <td style="word-wrap:break-word;width:10px;"><a href="#">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['service']->p_image; ?>" width="40" alt="">
                      </a></td>

                      <td style="word-wrap:break-word;width:100px;"><a href="#">

                      <?php echo $data['service']->p_price?>

                      <span>&#8377;  &nbsp; </span></a></td>

                    <td style="word-wrap:break-word;width:10px;">
                      
                        <a href="#">Qty 
                       
                        </a>
                    </td>

        

                    <td style="word-wrap:break-word;width:100px;"><a href="#">Total<span>&#8377; 
                      
                    <?php 
                    echo $data['service']->p_price 

                    
                    
                    ?></span></a></td>
                 

                  </tr>

       
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </form>
          <!-- Coupon Area-->

          <!-- Cart Amount Area-->
      

          
<style>
  .cart-table img {
    max-width: 100px;
    border: none;
  }
</style>



</div</div>
         
<br>

<?php $service_id = $data['service']->id?>
<form action="<?php echo URLROOT?>/api/add_to_booking/<?php echo $service_id ?>" method="post">
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
                    <?php if ($balance_amount> $data['service']->p_price) { ?>
                    <li>
                      <?php $option_present = 1 ?>
                      <input id="fastShipping" type="radio" name="selector" value="1" checked="">
                      <label for="fastShipping">Pay Through Wallet</label>
                      <div class="check"></div>
                    </li>
                 <?php } ?>
                    <?php  
                    $s1 = $data['service'];
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


              <h5 class="total-price mb-0">Total : &#8377;<span class="">

              <input type="hidden" id="GFG" name="time_data"
                value="<?php echo $_SESSION['time_data']?>"> 
              <input type="hidden" id="GFG" name="date_data"
                value="<?php echo $_SESSION['date_data']?>"> 
                <?php 


    
 
        

              echo $data['service']->p_price; ?></span></h5>
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
 <?php
  $cart_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>
    