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
						<form method="post" action="<?php echo URLROOT;?>/student/update_password" autocomplete="off" class="register-form" >
							
							
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
	<?php require APPROOT . "/views/inc_home/footer.php"; ?>

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