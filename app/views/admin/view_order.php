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
                                <h3>Order Details
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pull-right">
                            <a href="<?php echo URLROOT; ?>/admin/invoice/<?php echo $data['get_order']->id; ?>"><button class="btn btn-primary">Invoice</button></a>
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

            <div class="container-fluid">
                <div class="card">
            </div>
            <div class="product-page-details product-right mb-0">
                   <div class="row">
                       <div class="col-md-8">


                       <h6 class="product-title">Address</h6>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                                    <p style="font-size:15px;" id="demo"><?php echo $data['get_order']->address.", ".$data['get_order']->city.", ".$data['get_order']->state.", ".$data['get_order']->country.", ".$data['get_order']->zipcode;?> 
                                    </p>
                                   </div>
                                  </div>
                                </div>
<br>
                                <h6 class="product-title">Costing</h6>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                                    <p style="font-size:15px;" id="demo">Sub Total: <i class='fa fa-inr'></i><?php echo $data['get_order']->sub_total." | Discount: <i class='fa fa-inr'></i>".$data['get_order']->coupon_value. " | Total: <i class='fa fa-inr'></i>".$data['get_order']->total." | Tax: <i class='fa fa-inr'></i>".$data['get_order']->tax_value." | Shipping: <i class='fa fa-inr'></i>".$data['get_order']->shipping;?> 
                                    </p>
                                   </div>
                                  </div>
                                </div>


                                <br>
                                <h6 class="product-title">Net Total</h6>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                                    <p style="font-size:15px;" id="demo"> <i class='fa fa-inr'></i><?php echo $data['get_order']->net_total;?> 
                                    </p>
                                   </div>
                                  </div>
                                </div>


                       </div>
                       <div class="col-md-4">
                                                           <h6 class="product-title">Delivery Partner</h6>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                        <p style="font-size:15px;" id="demo"><?php echo $data['get_order']->delivery_agent;?> </p>
                                   </div>
                                  </div>
                                </div>
<br>
                                <h6 class="product-title">Tracking ID</h6>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                                   <p style="font-size:15px;" id="demo"><?php echo $data['get_order']->tracking_id;?> </p>
                                   </div>
                                  </div>
                                </div>


                                <br>
                                <h6 class="product-title">Shipping Label</h6>
                                <?php if($data['get_order']->shipping_label!==null){?>
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="timer">
                                   <p style="font-size:15px;" id="demo"><a target="_BLANK" href="<?php echo URLROOT."/uploads/".$data['get_order']->shipping_label;?>"><i class='fa fa-eye'></i>View</a> </p>
                                   </div>
                                  </div>
                                </div>
                                <?php }else{ ?>
                                    <p style="font-size:15px"> Still in process </p>

                               <?php } ?>
                       </div>
                   </div>             
                                
                                


                                




                                </div>


                                


                                </div>
                                </div>

                                
                            </div>
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