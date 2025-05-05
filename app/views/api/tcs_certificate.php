<?php require APPROOT . "/views/inc/header.php"; ?>
<?php require APPROOT . "/views/inc/nav-header.php"; ?>
  
<?php $pageMod = New Apis; ?>


    
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Orders</h6>
            <!-- Select Product Catagory-->
            <div class="select-product-catagory">
              <!-- <select class="form-select" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                <option selected>Short by</option>
                <option value="1">Newest</option>
                <option value="2">Popular</option>
                <option value="3">Ratings</option>
              </select> -->
            </div>
          </div>
          <div class="product-catagories">
            
          </div>
          <div class="row g-3">
            <!-- Single Weekly Product Card-->

            <?php
            foreach ($data['all_tcs'] as $tcs)
            {
            ?>

                <div class="col-12 col-md-6">
              <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <div class="product-description">
                        <table class="table mb-0">
                            <tbody>
                              
                                <tr>
                                    <td><b>Remark:</b> <?php echo $tcs->tcs_remark; ?></td>

                                    
                                </tr>

                                <tr>
                                    <td><b>Uploaded On</b>: <?php echo date("M jS Y", strtotime("$tcs->created_at"));  ?>
                                </td>
                                <td><b></b> <a href="<?php echo URLROOT; ?>/api/tcs_detail/<?php echo $tcs->tcs_id;?>  "><button class='btn btn-warning btn-sm'>View Certificate</button></a>
                                </td>

                                    
                                </tr>

                            </tbody>
                        </table>                   
                    </div>
                </div>
              </div>
            </div>

            <?php
            }
            ?>
               
            
            
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



    <?php 
  $order_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>