<?php require APPROOT . "/views/inc_home/header.php"; ?>
<style>
       .bg-white {
  position: relative;
  display: block;
  background-color: #dee1d6;
  border-radius: var(--insur-bdr-radius);
  text-align: center;
  padding: 8px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}
    .bg-blue {
  background-color:  var(--insur-base);
  /* border-radius: var(--insur-bdr-radius); */
  text-align: center;
  padding: 20px;
  border-bottom: 3px solid transparent;
  margin-bottom: 30px;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
  margin: 20px 0 20px 0;
}
.card-title_main {
    color: #ffff;
    font-size: 30px;
    line-height: 50px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 1%;
}
.services-two__title {
    margin-top: 5px;
    margin-bottom: 5px;
}
@media (max-width: 768px) {
 .thm-btn-orange, .thm-btn{
    padding: 5px 14px 5px;
    font-size: 13px;
 }
 .bg-white {
    margin: 20px 10px 20px 10px !important;
 }
  
}
</style>
<Section>
    
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="bg-blue shadow-lg text-left">
                            
                    <h2 class="card-title_main">Confirm Your Details</h2>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white shadow-lg">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">Course Details</a></h3>
                    <p class="" style="font-size: 12px;color: #a1a4b0;">Details of your Booking with us</p>
                    </div>
                    <div class="bg-white shadow-lg" style="margin: 20px 40px 20px 40px;">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="" width="80%"  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/course_image.jpg" alt="dfa">
                            </div>
                            <div class="col-lg-8 text-left">
                                <div class="row" style="margin-top: 30px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; font-weight:bold;">Course Title</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;">Career Guidance Report with 1 Counseling</h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; font-weight:bold;">Vendor Name</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;">OodlesIn</h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; font-weight:bold;">Tentative Start Date</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;"><?php echo $data['start_date'] ?></h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; font-weight:bold;">Selected Time Slot</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;"><?php echo $data['time'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="bg-white shadow-lg" style="margin: 20px 40px 80px 40px;">
                        <div class="row text-left" style="margin-left:5px;">
                            <p class="" style="font-size: 15px;color: var(--insur-base);">Note: </p>
                            <p class="" style="font-size: 12px;color: #000;">There would be no cancellation possible for this purchase once the payment has been processed.</p>
                            
                        </div>
                       
                    </div>
                    <div class="card-footer" style="background-color: #ffff;">
                        <div class="d-flex justify-content-between">
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/additional_info" class="thm-btn-orange about-one__btn">Previous</a>
                            </div>
                            <div class="about-one__btn-box">
                                <a href="<?php echo URLROOT; ?>/home/pay1/2495" class="thm-btn about-one__btn">Make Payment</a>
                            </div>

                        </div>
                    </div>
                        
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="bg-white shadow-lg">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">Price Summary</a></h3>
                    <p class="" style="font-size: 12px;color: #a1a4b0;">Summary of charges</p>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 text-left">
                                <div class="row" style="margin-top: 30px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; ">Price</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;">₹2,114.41</h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; ">Goods & Services Tax (18%)</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000;">₹380.59</h5>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer text-left" style="background-color: #ffff;">
                                <div class="row"  style="margin-top: 10px;">
                                    <div class="col-6">
                                        <h5 style="font-size: 16px;color: var(--insur-base);font-weight:bold; ">Total Price</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 style="font-size: 16px;color: var(--insur-base);font-weight:bold;">₹2,495</h5>
                                    </div>
                                </div>
                    <p class="" style="font-size: 12px;color: #000;">Including taxes if applicable</p>

                       
                    </div>
                </div>
                <div class="bg-white shadow-lg">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">Apply Discount</a></h3>
                    <p class="" style="font-size: 12px;color: #a1a4b0;">Have a discount code to redeem</p>
                    </div>
                    <div class="row"  style="margin-top: 10px;">
                                    <div class="col-8">
                                        
                                        <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input type="text" class="form-control mdl-textfield__input" id="coupon_code" name="coupon_code" placeholder="Coupon Code" required>
										</div>
                                    </div>
                                    <div class="col-4">
                                    <div class="about-one__btn-box">
                                        <a href="#" class="thm-btn about-one__btn" style = "padding: 5px 14px 5px;">Apply</a>
                                    </div>
                                    </div>
                                </div>
                </div>
                <div class="bg-white shadow-lg" style="min-height:250px;">
                    <div class="card-header text-left" style="background-color: #ffff;">
                    <h3 class="services-two__title"><a href="#">OodlesIn Offers</a></h3>
                    <p class="" style="font-size: 12px;color: #a1a4b0;">There are no discount coupons applicable for this course</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php require APPROOT . "/views/inc_home/footer.php"; ?>
