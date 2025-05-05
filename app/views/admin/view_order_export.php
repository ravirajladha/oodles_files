<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
    a {
        color:#333;
    }
</style>

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Products in Cart
                                </h3>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->




            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="row product-page-main card-body">
                     
                        <div class="col-xl-12">
                            <div class="product-page-details product-right mb-0">
                                <h2></h2>
                               
                                <hr>
                                <h6 class="product-title">product details</h6>
                                <table class="table mb-0">
                <tbody>
                <?php
                $total=0;
            foreach ($data['get_order_detail'] as $s)
            {
                
            $total=$total+$s->item_total_price;
               
            ?>
                    
                  <tr>
                    
                    <td style="word-wrap:break-word;width:50px;"><a href="#">
                      <img src="<?php echo URLROOT; ?>/uploads/<?php echo $s->p_img; ?>" width="100" alt="">
                      </a></td>

                      <td style="word-wrap:break-word;width:100px;"><a href="#">
                      <?php echo $s->item_name; ?>
                      <span>&#8377; <?php echo $s->item_price; ?> &nbsp; </span></a></td>

                    <td style="word-wrap:break-word;width:100px;">
                      
                        <a href="#">Qty 
                            <span>
                                 
                                <?php echo (int)$s->item_qty; ?>
                            </span>
                        </a>
                    </td>

                    <td style="word-wrap:break-word;width:100px;"><a href="#">Total<span>&#8377; <?php echo (float)$s->item_total_price; ?></span></a></td>
                    
                   

                  </tr>

                  <?php } ?>
                  
                  
                </tbody>
              </table>
            </div>


                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>



        <?php require APPROOT . '/views/inc_admin/footer.php'; ?>