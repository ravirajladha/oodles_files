<?php require APPROOT . "/views/inc/header.php"; ?>
<?php require APPROOT . "/views/inc/nav-header.php"; ?>
  
<?php $pageMod = New Apis; ?>


    
    <div class="page-content-wrapper">
      <!-- Top Products-->
      <div class="top-products-area py-3">
        <div class="container">
          <div class="section-heading d-flex align-items-center justify-content-between">
          
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

         
                <div class="col-12 col-md-6">
              <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                <div class="container">
    
    
				<div class="row">

				<div class="col-xs-12">
		<address class="pull-right">
						<h3>Order # <?php echo $data['get_order']->id;?></h3>
    					<?php echo date("M jS Y, h:m A", strtotime($data['get_order']->created_at)); ?>
						
                        
    				</address>
    		<div class="invoice-title">
				
    			<h2>Invoice</h2>
				
    		</div>
    		<hr>
            <br>
         
          


                <div class="row">
				  <div class="col-md-8">
					<div>
    				<address style="color:#555">
    				<strong>Billed By:</strong><br>
					<?php echo $data['get_vendor']->user_name;?><br>
					GST: <?php echo $data['get_vendor']->user_gst;?><br>
					<?php echo $data['get_vendor']->user_address;?><br>
					<?php echo $data['get_vendor']->user_city;?>, <?php echo $data['get_vendor']->user_state?><br>
    				India, <?php echo $data['get_vendor']->user_pincode;?>
    				</address>
    				</div>
			      </div>
				  <div class="col-md-4">
					<div>
    				<address style="color:#555">
    				<strong>Billed To:</strong><br>
					<?php echo $data['get_order']->name;?><br>
					GST: <?php echo $data['get_user']->user_gst;?><br>
					<?php echo $data['get_order']->address;?><br>
					<?php echo $data['get_order']->city;?>, <?php echo $data['get_order']->state?><br>
    				<?php echo $data['get_order']->country;?>, <?php echo $data['get_order']->zipcode;?><br>
					Place of Supply: <?php echo $data['get_order']->state;?>
    				</address>
    				</div>
			      </div>
				</div>    
    			

    			
    			<div>
				<address style="color:#555">
    					<strong>Payment Method:</strong><br>
    					Cash on Delivery
    				</address>
    			</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-left"><strong>Unit Price</strong></td>
        							<td class="text-left"><strong>Quantity</strong></td>
									<td class="text-left"><strong>SGST</strong></td>
									<td class="text-left"><strong>CGST</strong></td>
									<td class="text-left"><strong>IGST</strong></td>
        							<td class="text-left"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							


							<?php foreach ($data['get_order_detail'] as $item):
							$sgst = 0;
							$cgst = 0;
							$igst = 0;
							$qty =$item->item_qty;
							$tax_percentage = $data['get_order']->tax_percentage;
							if($data['get_vendor']->user_state == $data['get_order']->state){
								$taxval = ( ($tax_percentage) / 100 )*$item->item_price;
								$tax_percentage = $tax_percentage / 2;
								$sgst = (( ($tax_percentage) / 100 ) * $item->item_price) * $qty." (".$tax_percentage."%)";
								$cgst = (( ($tax_percentage) / 100 ) * $item->item_price) * $qty." (".$tax_percentage."%)";
							}else {
								$taxval = ( ($tax_percentage) / 100 )*$item->item_price;
								$igst = (( ($tax_percentage) / 100 ) * $item->item_price) * $qty." (".$tax_percentage."%)";
							}
							?>
    							<tr>
    								<td><?php echo $item->item_name;?></td>
									<td><?php echo $item->item_price - $taxval;?></td>
									<td><?php echo $item->item_qty;?></td>
									<td><?php echo $sgst;?></td>
									<td><?php echo $cgst;?></td>
									<td><?php echo $igst;?></td>
									<td><?php echo $item->item_total_price;?></td>
    							</tr>
							<?php endforeach; ?>



    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
									<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class='thick-line'></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right"><i class='fa fa-inr'></i><?php echo $data['get_order']->sub_total?></td>
    							</tr>

								<?php
								if($data['get_order']->coupon_value){
								echo "<tr>
    								<td class='thick-line'></td>
    								<td class='thick-line'></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
    								<td class='thick-line text-center'><strong>Discount</strong></td>
    								<td class='thick-line text-right'><i class='fa fa-inr'></i>".$data['get_order']->coupon_value."</td>
    							</tr>";}
							
								if($data['get_order']->tax_value){
								echo "<tr>
    								<td class='thick-line'></td>
    								<td class='thick-line'></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
    								<td class='thick-line text-center'><strong>Tax</strong></td>
    								<td class='thick-line text-right'><i class='fa fa-inr'></i>".$data['get_order']->tax_value."</td>
    							</tr>";}

								if($data['get_order']->buyer_protection){
									echo "<tr>
										<td class='thick-line'></td>
										<td class='thick-line'></td>
										<td class='thick-line'></td>
										<td class='thick-line'></td>
										<td class='thick-line'></td>
										<td class='thick-line text-center'><strong>Buyer Protect</strong></td>
										<td class='thick-line text-right'><i class='fa fa-inr'></i>".$data['get_order']->buyer_protection."</td>
									</tr>";}

									if($data['get_order']->shipping){
										echo "<tr>
											<td class='thick-line'></td>
											<td class='thick-line'></td>
											<td class='thick-line'></td>
											<td class='thick-line'></td>
											<td class='thick-line'></td>
											<td class='thick-line text-center'><strong>Buyer Protect</strong></td>
											<td class='thick-line text-right'><i class='fa fa-inr'></i>".$data['get_order']->shipping."</td>
										</tr>";}

								?>

    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
									<td class='thick-line'></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right"><i class='fa fa-inr'></i><?php echo $data['get_order']->net_total?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>


		  
</div>
	</div>
	<!-- Container-fluid Ends-->

</div>

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
    <!-- Footer Nav-->
    <?php 
  $order_active=1;
  require APPROOT . '/views/inc/nav-footer.php';
  require APPROOT . '/views/inc/footer.php'; 
  ?>