<?php require APPROOT . "/views/inc_home/header.php";
 $otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);
 $_SESSION['cur_otp'] = $otp_new;
  ?>


<body>
	
<hr>

<style>
	.pass {
    height: 60px;
    width: 100%;
    border: none;
    background-color: var(--insur-extra);
    padding-left: 30px;
    padding-right: 30px;
    outline: none;
    font-size: 14px;
    color: var(--insur-gray);
    display: block;
    border-radius: var(--insur-bdr-radius);
    font-weight: 500;
    letter-spacing: var(--insur-letter-spacing);
}
.no-arrows::-webkit-inner-spin-button,
.no-arrows::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
@media (max-width: 767px) {
		.signin-image{
			display: none;
		}
	}
</style>

	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in" style="margin-top:100px !important;margin-bottom:100px !important">
			<div class="container">
				<div class="signin-content row">
					<div class="signin-image col-md-6">
						<figure><img src="<?php echo URLROOT;?>/assets/img/pages/signin.jpg" alt="sing up image"></figure>
						
					</div>
					<div class="signin-form col-md-6">
						<h2 class="form-title">Forgot Password</h2><br>
						<form method="post" action="<?php echo URLROOT;?>/student/update_password_mobile" autocomplete="off" class="register-form" >
							
							
								<div class="comment-form__input-box" id="cur_phone">
									<input type="number"  placeholder="Enter Phone Number" id ="phone_new"
										class="form-control input-height no-arrows" name="phone" /> 
								</div>
					
							
								<div class="comment-form__input-box" id="new_password" style="display:none">
								<input type="password" placeholder="Enter New Password" class="form-control" name="password" required>
								</div>
						
						
							
							<div class="form-group form-button" >
								<button class="thm-btn comment-form__btn"  id="signup_btn" style="display:none;"  type="submit">Update Password</button>
								<!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
							</div>
						</form>
						<div class="row">
                  <div class="col-md-4">
                     <div class="form-group pull-left">
                     <button onclick="this.disabled=true;" class="btn btn-primary" id="getOTP">Generate OTP</button>
                     </div> 
                  </div>
				  <div class="col-md-2">
</div>
                  <div class="col-md-6">
                     <div class="form-group">
                     <input type="number" placeholder="Enter OTP sent to your phone" id="postOTP" class="form-control no-arrows" onkeyup="checkotp(this.value)" oninput="numberOnly(this.id);" maxlength="4">
                     </div> 
                  </div>
               </div>
						<div class="social-login"  style="text-align: center;">
							<br>
							<a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account!</span></a>
							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

    <div class="float-container">

    <a href="tel:+918151000945" class="icon two">+91 81510 00945</a>
    <!-- <a href="connect@oodlesin.com" class="icon three">connect@oodlesin.com</a> -->
    <a href="https://t.me/OodlesIn" target="_blank" class="icon three">Join Telegram!</a>
    <a href="<?php echo URLROOT?>/home/webinar" class="icon one">Webinar</a>
    </div>
    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo_white.png" width="143"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <div class="mobile-nav__contact row">
                <div class="col-sm-5 mt-2">
                 
                    <a href="<?php echo URLROOT?>/student/login" class="btn btn-primary">Sign in</a>
                </div>
                <div class="col-sm-6 mt-2">
                  
                    <a href="<?php echo URLROOT?>/student/register" class="btn btn-primary">Create an account!</a>
</div>
            </div><!-- /.mobile-nav__contact -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:connect@oodlesin.com">connect@oodlesin.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+918151000945">+91 81510 00945</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->


            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                <a href="https://twitter.com/OodlesIn" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/in/OodlesIn/" target="_blank"><i class="fab fa-linkedin"></i></a>
                                    <a href="https://in.pinterest.com/OodlesIn" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="https://www.instagram.com/oodlesin/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

	<script>


$(document).ready(function(){
        $('#getOTP').click(function(){
        
         var phone = document.getElementById("phone_new").value;

                  $.ajax({
                        url  : "<?php echo URLROOT; ?>/admin/send_otp_forgot/"+phone+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    });

            
        });
    });


function checkotp(val,otp = <?php echo $_SESSION['cur_otp']; ?>){
if(val == otp){
document.getElementById("signup_btn").style.display = "block";
document.getElementById("new_password").style.display = "block";
document.getElementById("getOTP").style.display = "none";
// document.getElementById("cur_phone").style.display = "readOnly";
document.getElementById("postOTP").style.display = "none";
document.getElementById("phone_new").readOnly = true
}
}

function numberOnly(id) {
    let input = document.getElementById(id);
    let value = input.value;
    if (value.length > input.maxLength) {
    input.value = value.substring(0, input.maxLength);
  }
}
</script>


    <!-- footer scripts -->

	
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jarallax/jarallax.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/nouislider/nouislider.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/odometer/odometer.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/swiper/swiper.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/wnumb/wNumb.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/wow/wow.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/isotope/isotope.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/countdown/countdown.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/vegas/vegas.min.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/timepicker/timePicker.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/circleType/jquery.circleType.js"></script>
    <script src="<?php echo URLROOT; ?>/assets_home/vendors/circleType/jquery.lettering.min.js"></script>
    




    <!-- template js -->
    <script src="<?php echo URLROOT; ?>/assets_home/js/insur.js"></script>
</body>

</html>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if(isset($_SESSION['success'])){ ?>
 <script type="text/javascript">
     swal("<?php echo $_SESSION['success']; ?>");
 </script>
<?php } unset($_SESSION['success']); ?>
