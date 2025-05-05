<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<div class='page-body'>

                     <?php
         $curModel = New Apis;
         if(isset($_SESSION['rexkod_admin_id'])){
         $curvendor  = $curModel->getVendorById($_SESSION['rexkod_admin_id']);
         }
         else {
             $curvendor  = $curModel->getVendorById($_SESSION['rexkod_vendor_id']);
         }
         ?>

         <!-- Container-fluid starts-->
         <div class='container-fluid'>
         <style>
    .price-sec-wrap {
			width: 100%;
			float: left;
			padding: 60px 0;
			font-family: 'Lato', sans-serif;
		}
		.main-heading {
			text-align: center;
		    font-weight: 600;
		    padding-bottom: 15px;
		    position: relative;
		    text-transform: capitalize;
		    font-size: 24px;
		    margin-bottom: 25px;
		}
		.price-box {
			box-shadow: 0 0 35px rgba(0, 0, 0, 0.10);
			padding: 20px;
			background: #fff;
    		border-radius: 4px;
		}
		.price-box ul {
    		padding: 10px 0px 30px;
		    margin: 17px 0 0 0;
		    list-style: none;
		    border-top: solid 1px #e9e9e9;
		}
		.price-box ul li {
			padding: 7px 0;
		    font-size: 14px;
		    color: #808080;
		}
		.price-box ul li .fas {
			color: #68AE4A;
			margin-right: 7px; 
			font-size: 12px;
		}
		.price-label {
			font-size: 16px;
		    font-weight: 600;
		    line-height: 1.34;
		    margin-bottom: 0;
		    padding: 6px 15px;
		    display: inline-block;
		    border-radius: 3px; 
		}
		.price-label.basic {
		    background: #E8EAF6;
		    color: #3F51B5;
		}
		.price-label.value {
		    background: #E8F5E9;
		    color: #4CAF50;
		}
		.price-label.premium {
		    background: #FBE9E7;
		    color: #FF5722;
		}
		.price {
			font-size: 44px;
		    line-height: 44px;
		    margin: 15px 0 6px;
		    font-weight: 900;
		}
		.price-info {
			font-size: 14px;
		    font-weight: 400;
		    line-height: 1.67;
		    color: inherit;
		    width: 100%;
		    margin: 0;
		    color: #989898;
		}
		.plan-btn {
		  text-transform: uppercase;
		  font-weight: 600;
		  display: block;
		  padding: 11px 30px;
		  border: 2px solid #b3b3b3;
		  color: #000;
		  margin-top: 5px;
		  overflow: hidden;
		  position: relative;
		  z-index: 1;
		  margin: 0;
		  border-radius: 5px;
		  text-decoration: none;
		  width: 100%;
		  text-align: center;
		  font-size: 14px;
		}
		.plan-btn::after {
		  position: absolute;
		  left: -100%;
		  top: 0;
		  content: "";
		  height: 100%;
		  width: 100%;
		  background: #ff8084;
		  z-index: -1;
		  transition: all 0.35s ease-in-out;
		}
		.plan-btn:hover::after {
		  left: 0;
		}
		.plan-btn:hover, 
		.plan-btn:focus {
			text-decoration: none;
			color: #fff;
		  border: 2px solid #000;
		}
		@media (max-width: 991px) {
			.price-box {
				margin-bottom: 20px;
			}
		}
		@media (max-width: 575px) {
			.main-heading {
				font-size: 21px;
			}
			.price-box {
				margin-bottom: 20px;
			}
		}
</style>

<div class="price-sec-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="main-heading">PRICING</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="price-box">
                        <div class="">
                        	<div class="price-label basic">Basic Plan</div>
                        	<div class="price">Free</div>
                        	<div class="price-info">Per Month, Inlc GST.</div>
                        </div>
                        <div class="info">
                            <ul>
                                
								<li><i class="fas fa-check"></i>Unlimited Listings</li>
								<li><i class="fas fa-check"></i>Free Shipping (>1%) </li>
								<li><i class="fas fa-check"></i>Cash on Delivery </li>
								<li><i class="fas fa-check"></i>Fake Return Detection </li>
								<li><i class="fas fa-check"></i>On Time Settlement (D+5) </li>
								<li><i class="fas fa-check"></i>Global Reach(170 + Countries)</li>
								
                            </ul>
                            <a href="#" class="plan-btn">Current Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="price-box">
                        <div class="">
                        	<div class="price-label value">Best Value Plan</div>
                        	<div class="price"> 2,499</div>
                        	<div class="price-info">Per Month, Inlc GST.</div>
                        </div>
                        <div class="info">
                            <ul>
						
							<li><i class="fas fa-check"></i>Everything in Basic </li>
							<li><i class="fas fa-check"></i>On time settlement (D+3) </li>
							<li><i class="fas fa-check"></i>Store setup with cataloguing </li>
							<li><i class="fas fa-check"></i>Key account Manager </li>
							<li><i class="fas fa-check"></i>Corporate deals </li>
							<li><i class="fas fa-check"></i>Buyer Protection </li>
							<li><i class="fas fa-check"></i>Paylater Facility </li>
							<li><i class="fas fa-check"></i>Special disount </li>
							<li><i class="fas fa-check"></i>Coupons Sponsored </li>
							<li><i class="fas fa-check"></i>Store Gift Campaigns </li>
							<li><i class="fas fa-check"></i>Social Media Campaigns </li>
							<li><i class="fas fa-check"></i>Offline Reaach </li>
							<li><i class="fas fa-check"></i>Verified Business profile (Export) </li>
							<li><i class="fas fa-check"></i>Verified Export Leads </li>
							<li><i class="fas fa-check"></i>Export Process </li>
							<li><i class="fas fa-check"></i>24/7 customer support</li>
                            </ul>
                            <a href="<?php echo URLROOT; ?>/admin/update_vendor_plan/2" class="plan-btn">Join Value Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="price-box">
                        <div class="">
                        	<div class="price-label premium">Export Plan</div>
                        	<div class="price">9,999</div>
                        	<div class="price-info">Per Month, Inlc GST.</div>
                        </div>
                        <div class="info">
                            <ul>
					
							<li><i class="fas fa-check"></i>Verified Export Leads </li>
							<li><i class="fas fa-check"></i>Sample </li>
							<li><i class="fas fa-check"></i>Negotiations </li>
							<li><i class="fas fa-check"></i>Documentations </li>
							<li><i class="fas fa-check"></i>D2D Export Process </li>
							<li><i class="fas fa-check"></i>Paymwnt process </li>
							<li><i class="fas fa-check"></i>Gauranteed Setlements </li>
							<li><i class="fas fa-check"></i>Dedicated Manager</li>
                            </ul>
                            <a href="<?php echo URLROOT; ?>/admin/update_vendor_plan/3" class="plan-btn">Join Export Plan</a>
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
     


