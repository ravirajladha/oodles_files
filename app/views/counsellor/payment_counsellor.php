<?php require APPROOT . "/views/inc_counsellor/header.php"; ?>
<script>
	$(window).on('load', function() {
		$('#myModal').modal('show');
	});
	/*  */
</script>
<style>
       .bg-white {
  position: relative;
  display: block;
  background-color: #dee1d6;
  border-radius: var(--insur-bdr-radius);
  /* text-align: center; */
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

.thm-btn-orange {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    -webkit-appearance: none;
    outline: none !important;
    background-color: orange;
    color: var(--bs-white);
    font-size: 16px;
    font-weight: 700;
    letter-spacing: var(--bs-letter-spacing);
    border-radius: 8px;
    padding: 17px 40px 17px;
    transition: all 0.5s linear;
    overflow: hidden;
    z-index: 1;
}
.thm-btn {
    position: relative;
    display: inline-block;
    vertical-align: middle;
    -webkit-appearance: none;
    outline: none !important;
    background-color: var(--bs-blue);
    color: var(--bs-white);
    font-size: 16px;
    font-weight: 700;
    letter-spacing: var(--bs-letter-spacing);
    border-radius: 8px;
    padding: 17px 40px 17px;
    transition: all 0.5s linear;
    overflow: hidden;
    z-index: 1;
}
a:focus, a:hover {
    color: #23527c;
}
</style>
<?php 
$course1 = $data['courses'][0];
$course2 = $data['courses'][1];

?>
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
                    <div class="cards-container">

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
                                            <h5 style="font-size: 14px;color: #000;">Advance Career Counselor Certification Program</h5>
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
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="bg-white shadow-lg" style="margin: 20px 40px 80px 40px;">
                        <div class="row text-left" style="margin-left:5px;">
                            <p class="" style="font-size: 15px;color: var(--bs-blue);">Note: </p>
                            <p class="" style="font-size: 12px;color: #000;">There would be no cancellation possible for this purchase once the payment has been processed.</p>
                            <p class="" style="font-size: 12px;color: #000;">This course is most suited for professionals with the following background who want to pursue career counseling as a profession - Psychologists & Counselling Psychologists, Teachers, Trainers & Educationalist, HR & Highly skilled Professionals or Corporate/Government Employees & Educational Consultants.</p>
                        </div>
                       
                    </div>
                    <div class="card-footer" style="background-color: #ffff;">
                        <div class="d-flex justify-content-between">
                            <div class="about-one__btn-box">
                                <!-- <a href="<?php echo URLROOT; ?>/home/programs" class="thm-btn-orange about-one__btn">Previous</a> -->
                                <a href="#" onclick="window.history.back();" class="thm-btn-orange about-one__btn">Previous</a>
                            </div>
                            <div class="about-one__btn-box">
                                <!-- Add this input field to your HTML form -->
                                <form action="<?php echo URLROOT; ?>/home/pay1" method="post">
                                    <input type="hidden" id="updatedTotalPrice" name="amount" value="<?php echo $course1->discounted_price + ($course1->discounted_price * 0.18);?>">

                                <!-- <a href="<?php echo URLROOT; ?>/home/pay1/1495" class="thm-btn about-one__btn">Make Payment</a> -->
                                <button type="submit" class="thm-btn about-one__btn">Make Payment</button>

                                </form>
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
                                        <h5 id="priceValue" style="font-size: 14px;color: #000;">&#x20B9;<?php echo $course1->price; ?></h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; ">Discount</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5  id="discountValue" style="font-size: 14px;color: #000;">&#x20B9;<?php echo ($course1->price -  $course1->discounted_price);?></h5>
                                    </div>
                                </div>
                                <div class="row"  style="margin-top: 20px;margin-left:auto;margin-right:auto;">
                                    <div class="col-6">
                                        <h5 style="font-size: 14px;color: #000; ">Goods & Services Tax (18%)</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 id="gstValue"  style="font-size: 14px;color: #000;">&#x20B9;<?php echo ($course1->discounted_price * 0.18);?></h5>
                                    </div>
                                </div>
                            </div>
                           
                    </div>
                    <div class="card-footer text-left" style="background-color: #ffff;">
                                <div class="row"  style="margin-top: 10px;">
                                    <div class="col-6">
                                        <h5 style="font-size: 16px;color:var(--bs-blue);font-weight:bold; ">Total Price</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5 id="totalPrice" style="font-size: 16px;color:var(--bs-blue);font-weight:bold;">&#x20B9;<?php echo $course1->discounted_price + ($course1->discounted_price * 0.18);?></h5>
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
                                    <div class="about-one__btn-box" style="padding: 20px 0;">
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
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">You can save upto 75% with this combo offer!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                    <div class="bg-white shadow-lg" style="margin: 20px 40px 20px 40px;">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="" width="80%"  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/course_image.jpg" alt="dfa">
                            </div>
                            <div class="col-lg-8 text-left">
                               
                                <p class="" style="font-size: 15px;color:#000;"><?php echo $course1->name; ?></p>
                        <div class="d-flex justify-content-between" style="margin:10px;">
                            <div class="" style="font-size: 15px;color:var(--bs-yellow);" >
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                <span class="" style="font-size: 15px;margin-left:4px;color:#000;">5</span>

                            </div>
                            <div class="text-right" style="color:#000;">
                                <p style="text-decoration: line-through; font-size:16px;margin-bottom:0;">&#x20B9;<?php echo $course1->price; ?></p><br>
                                <p style="font-size:24px;margin-bottom:0;margin-top:0;">&#x20B9;<?php echo $course1->discounted_price; ?></p>
                            </div>
                        </div>
                         
                            </div>
                        </div>
                       
                    </div>
                    <div class="text-center" style="color:var(--bs-blue);">
                    <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="bg-white shadow-lg" style="margin: 20px 40px 20px 40px;">
                        <div class="row">
                            <div class="col-lg-4">
                                <img class="" width="80%"  src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/course_image.jpg" alt="dfa">
                            </div>
                            <div class="col-lg-8 text-left">
                                <p class="" style="font-size: 15px;color:#000;"><?php echo $course2->name; ?></p>
                        <div class="d-flex justify-content-between" style="margin:10px;">
                            <div class="" style="font-size: 15px;color:var(--bs-yellow);" >
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                <span class="" style="font-size: 15px;margin-left:4px;color:#000;">5</span>

                            </div>
                            <div class="text-right" style="color:#000;">
                                <p style="text-decoration: line-through; font-size:16px;margin-bottom:0;">&#x20B9;<?php echo $course2->price; ?></p><br>
                                <p style="font-size:24px;margin-bottom:0;margin-top:0;">&#x20B9;<?php echo $course2->discounted_price; ?></p>
                            </div>
                        </div>
                         
                            </div>
                        </div>
                       
                    </div>
                    
      </div>
      <div class="modal-footer justify-content-around">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Skip</button>
            <button type="button" class="btn btn-primary" id="saveButton" data-bs-dismiss="modal">Claim</button>
            <div class="text-right" style="color:#000;">
                <p style="text-decoration: line-through; font-size:16px;margin-bottom:0;line-height: 1px;">&#x20B9;16034</p><br>
                <p style="font-size:24px;margin-bottom:0;margin-top:0;line-height: 1px;">&#x20B9;3999</p>
            </div>
        
      </div>
    </div>
  </div>
</div>

<?php require APPROOT . "/views/inc_counsellor/footer.php"; ?>

<script>
$(document).ready(function() {
  // Add a click event handler to the Save button
  $("#saveButton").on("click", function() {
    // Update the price and GST values when the Save button is clicked
    var totalPrice = updatePriceAndGST();
       // Set the updated total price in the hidden input field
       $("#updatedTotalPrice").val(totalPrice);
    addNewCard();
  });

  // Function to update the price and GST values
  function updatePriceAndGST() {
    // Set fixed values for the new price and GST
    var newPrice = <?php echo ($course1->price + $course2->price); ?>;
    var discount = <?php echo ($course1->price + $course2->price)-($course1->discounted_price + $course2->discounted_price); ?>;
    var discountedPrice = <?php echo ($course1->discounted_price + $course2->discounted_price); ?>;
    var newGST = (discountedPrice * 0.18).toFixed(2);
    var discountedPriceInt = parseInt(discountedPrice) + parseInt(newGST);

    // Update the price element with the new value
    $("#priceValue").html("₹"+newPrice);
    $("#discountValue").html("₹"+discount);

    // Update the GST element with the new value
    $("#gstValue").html("₹"+newGST);
    $("#totalPrice").html("₹"+discountedPriceInt);

    // Return the total price to the calling function
    return discountedPriceInt;
  }
 // Function to add a new card dynamically
 function addNewCard() {
    // Create a new card HTML
    var newCardHtml = `
      <div class="bg-white shadow-lg" style="margin: 20px 40px;">
        <!-- Contents of the new card with updated values -->
        <div class="row">
          <div class="col-lg-4">
            <img class="" width="80%" src="<?php echo URLROOT; ?>/assets_home/images/backgrounds/course_image.jpg" alt="dfa">
          </div>
          <div class="col-lg-8 text-left">
            <div class="row" style="margin-top: 30px;margin-left:auto;margin-right:auto;">
              <div class="col-6">
                <h5 style="font-size: 14px;color: #000; font-weight:bold;">Course Title</h5>
              </div>
              <div class="col-6">
                <h5 style="font-size: 14px;color: #000;">International Studies Career Counselor Program</h5>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;margin-left:auto;margin-right:auto;">
              <div class="col-6">
                <h5 style="font-size: 14px;color: #000; font-weight:bold;">Vendor Name</h5>
              </div>
              <div class="col-6">
                <h5 style="font-size: 14px;color: #000;">OodlesIN</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    `;

    // Append the new card HTML to the container div with class "cards-container"
    $(".cards-container").append(newCardHtml);
  }
});
</script>
