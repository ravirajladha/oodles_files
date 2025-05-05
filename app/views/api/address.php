<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>


<div class="page-content-wrapper">
      <div class="container"><br>

            <div class="cart-table card mb-3">
            <div class="table-responsive card-body">
            <div class="single-profile-data d-flex align-items-center justify-content-between">
                <div class="title d-flex align-items-center"><i style='color:white;background:green;' class="lni lni-map-marker"></i><span>Address</span></div>
                <div class="data-content"><?php echo $data['get_user_details']->user_address; ?>, <?php echo $data['get_user_details']->user_city; ?>, <?php echo $data['get_user_details']->user_state; ?>, <?php echo $data['get_user_details']->user_country; ?>,<?php echo $data['get_user_details']->user_pincode; ?></div>
              </div>
            </div>
          </div>

          
          <!-- Cart Amount Area-->
          <div class="card cart-amount-area">
            <div class="card-body d-flex align-items-center justify-content-between">


              <h5 class="total-price mb-0" style="color:white;">Proceed </h5><a class="btn btn-success" href="<?php echo URLROOT;?>/api/checkout" >Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <script type="text/javascript">
      
      function active_func() 
      {
        var radioValue = $("input[name='selector']:checked").val();

        

        // pay now
        if(radioValue == 1)
        {
            $('#out_form').submit();
        }
        else if(radioValue == 2) // pay later
        {
          alert("Please Select Pay now");
        }

      }
    </script>


    <!-- Footer Nav-->
    <?php 
  $cart_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>

