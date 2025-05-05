<?php require APPROOT . "/views/inc/header.php"; ?>
<?php require APPROOT . "/views/inc/nav-header.php"; ?>
<?php $pageMod = new Apis; ?>
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Product Orders</h6>
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
$count = 0;
$curModel = new Apis;
foreach ($data['get_orders_user'] as $k) {
  $count++;
  $curorder = $curModel->getOrderById($k->id);
?>
                <div class="col-12 col-md-6">
              <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <div class="product-description">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><b>Order ID</b>: #<?php echo $curorder->id; ?></td>
                                    <?php if (!($curorder->return_status == 2)) { ?> 
                                    <td><b>Status</b>: &nbsp;&nbsp;<span style="background-color: #28B463;padding: 1px;border-radius: 4px;color: white;">
                                    <?php
    if ($curorder->status == 0) {
      echo "Placed";
    }
    else if ($curorder->status == 1) {
      echo "Packed";
    }
    else if ($curorder->status == 2) {
      echo "Shipped";
    }
    else if ($curorder->status == 3) {
      echo "Delivered";
    }
?></span></td>
                                    <?php
  }?>
                                </tr>
                                <tr>
                                <?php if ($curorder->return_status == 1 || $curorder->return_status == 2 || $curorder->return_status == 3) { ?>
                                    <td><b>Total</b>: &#8377; <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $curorder->net_total); ?></td>
                                    <td><b></b> &nbsp;&nbsp;<span style="background-color: #E02837;padding: 5px;border-radius: 5px;color: yellow;">
                                    <?php
    if ($curorder->return_status == 0) {
      echo "#";
    }
    else if ($curorder->return_status == 1) {
      echo "Return Requested";
    }
    else if ($curorder->return_status == 2) {
      echo "Return Accepted";
    }
    else if ($curorder->return_status == 3) {
      echo "Return Rejected";
    }
?></span></td>
                                <?php
  }?>
                                </tr>
                                <tr>
                                    <td><b>Booked At</b>: <?php echo date("M jS Y", strtotime("$curorder->created_at")); ?>
                                </td>
                                <td><b></b> <a href="<?php echo URLROOT; ?>/api/order_detail/<?php echo $k->id; ?>  "><button class='btn btn-warning btn-sm'>View Details</button></a>
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
if ($count == 0) { ?>
<p> No orders placed!
          <?php
}
?>
               <div class="container">  <br><br>
                 <!-- <button class="btn btn-success">Upload Order Requirement</button> -->
               </div>
          </div>
        </div>
        <br>
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
            <h6>All Service Orders</h6>
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
$curModel = new Apis;
$service_count = 0;
foreach ($data['get_bookings_user'] as $k) {
  $service_count++;
  $curservice = $curModel->get_bookings_by_id($k->id);
?>
                <div class="col-12 col-md-6">
              <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <div class="product-description">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><b>Order ID</b>: #<?php echo $curservice->id; ?></td>
                                    <?php if (!($curservice->return_status == 2)) { ?> 
                                    <td><b>Status</b>: &nbsp;&nbsp;<span style="background-color: #28B463;padding: 1px;border-radius: 4px;color: white;">
                                    <?php
    if ($curservice->status == 0) {
      echo "Placed";
    }
    else if ($curservice->status == 1) {
      echo "Packed";
    }
    else if ($curservice->status == 2) {
      echo "Shipped";
    }
    else if ($curservice->status == 3) {
      echo "Delivered";
    }
?></span></td>
                                    <?php
  }?>
                                </tr>
                                <tr>
                                <?php if ($curservice->return_status == 1 || $curservice->return_status == 2 || $curservice->return_status == 3) { ?>
                                    <td><b>Total</b>: &#8377; <?php echo preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $curservice->net_total); ?></td>
                                    <td><b></b> &nbsp;&nbsp;<span style="background-color: #E02837;padding: 5px;border-radius: 5px;color: yellow;">
                                    <?php
    if ($curservice->return_status == 0) {
      echo "#";
    }
    else if ($curservice->return_status == 1) {
      echo "Return Requested";
    }
    else if ($curservice->return_status == 2) {
      echo "Return Accepted";
    }
    else if ($curservice->return_status == 3) {
      echo "Return Rejected";
    }
?></span></td>
                                <?php
  }?>
                                </tr>
                                <tr>
                                    <td><b>Booked At</b>: <?php echo date("M jS Y", strtotime("$curservice->created_at")); ?>
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
if ($service_count == 0) { ?>
              <p> No service booked!
                        <?php
}
?>
               <div class="container">  <br><br>
                 <button class="btn btn-success">Upload Order Requirement</button>
               </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if (isset($_SESSION['success'])) { ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php
}
unset($_SESSION['success']); ?>
    <?php
$order_active = 1;
require APPROOT . '/views/inc/nav-footer.php';
require APPROOT . '/views/inc/footer.php';
?>