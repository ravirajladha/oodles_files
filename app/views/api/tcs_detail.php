<?php 
require APPROOT . "/views/inc/header.php"; 
require APPROOT."/views/inc/nav-header.php"; 
?>



    <div class="page-content-wrapper">
      <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">


        


            

        <div class="card cart-amount-area">
            <div class="card-body d-lex align-items-center justify-content-between">
            <div class="card cart-amount-area" style='background-color: #eee;'>
            <div class="card-body d-lex algn-items-center jutify-content-between">
            <embed src="<?php echo URLROOT; ?>/uploads/<?php echo $data['tcs_detail']->tcs_cert; ?>" width="100%" height="100%" />
             
            </div>
            </div>
            </div>
        </div><br>

        <div class="card cart-amount-area">
            <div class="card-body d-lex align-items-center justify-content-between">
            <div class="card cart-amount-area" style='background-color: #eee;'>
            <div class="card-body d-lex algn-items-center jutify-content-between">
            <p>Remark: <?php echo $data['tcs_detail']->tcs_remark; ?></p>
             
            </div>
            </div>
            </div>
        </div>



        </div>



        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <?php 
  $order_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>