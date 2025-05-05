<?php require APPROOT . "/views/inc_home/header.php"; ?>
<hr>

<style>
	.valo {
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
		margin-bottom: 5px;
	}
	.scrollit {
    overflow-y:scroll;
    height:600px;

	}
	.neonText {
  animation: flicker 2.5s infinite alternate;
  color: #000000;
}
	@keyframes flicker {
    
	0%, 18%, 22%, 25%, 53%, 57%, 100% {
  
		text-shadow:
		0 0 4px #FFA500,
		0 0 11px #FFA500,
		0 0 19px #FFA500,
		0 0 40px #FFA500,
		0 0 80px #00A4FF,
		0 0 90px #00A4FF,
		0 0 100px #00A4FF,
		0 0 150px #00A4FF;
	
	}
	
	20%, 24%, 55% {        
		text-shadow: none;
	}    
  
  
}
@media (max-width: 767px) {
		.signup-image{
			display: none;
		}
	}

	.myModal {
		width: 1000px;
	}

	@media (max-width: 767px) {
		.modal-body{
			width:100vw !important;
		}
		.modal-content{
			width:100vw !important;
		}
		.signup{
			margin-top:10px !important;
		}
	}
</style>

<body>
	<!-- modal start -->
	<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="left: -6px;">
		<div class="modal-dialog modal-dialog-centered modal-xl myModal" role="document" >
			<div class="modal-content modal-popout-bg">
				<div class="modal-header">
					<h5 class="modal-title" id="addEventTitle">Applicant Information</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class=" col-md-12 col-sm-12" style=" border: 1px solid black;">
						<!-- <figure><img src="../assets/img/pages/signup.jpg" alt="sign up image"></figure> -->

						<!-- <p><a href="<?php echo URLROOT; ?>/student/login" class="signup-image-link btn btn-success">I am already member</a></p> -->
						<!-- <h4 class="form-title" style="text-align: left;">Applicant Information,</h2><br> -->
						<h4 class="" style="text-align: center; padding:20px;">Welcome to the OodlesIN Portal!</h4>
						<!-- <div class="signin-form col-md-6 scrollit"> -->
						
						<table style="justify-content: center;">
							<tr>
								<td style="padding:5px;">I/we hereby grant permission for my/our child to use the
									OodlesIN Pocket scholarship application to take quizzes, learn, and win
									scholarships. In exchange, I will not allow, promote, or use any unfair means
									to assist my child in obtaining Pocket scholarships or while taking quizzes.</td>

							</tr>
							<tr>
								<td style="padding:5px;">I/we declare that all demographic and personal information
									voluntarily provided by my/our child is true, correct, and complete, and that
									it has been provided under my/our supervision, and that OodlesIN is not liable
									for any incorrect information provided by me/us.</td>
							</tr>
							<tr>
								<td style="padding:5px;">I grant OodlesIN permission to use the information provided,
									and the pocket scholarship will be transferred to my bank account following
									their approval.</td>
							</tr>
							<tr>
								<td style="text-align: left; vertical-align: middle;"><strong>Important Instructions</strong></td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Please make sure that the registration details are correct.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Please enter the password in the required format.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td style="text-align:left; vertical-align: middle;"><strong>Guidelines for registering on OodlesIN Portal</strong></td>

							</tr>
							<hr>
							<tr>
								<td>
									<ul>
										<li>Name - Please enter the applicant's name the same everywhere in your scholarship application</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Mobile Number - Enter a valid mobile phone number. Applicant can provide mobile number of parent/guardians</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Email ID- Enter a valid email ID. Email ID will not be able to be changed. All necessary communication will be sent to this email id.
										</li>
									</ul>
								</td>
							</tr>




						</table>

					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center" >
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Accept</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal end -->
	<div class="main">
		<!-- Sign up form -->
		<section class="signup" style="margin-top:100px !important;margin-bottom:100px !important">
			<div class="container">
				<div class="signup-content row">
					<div class="signup-form col-md-5">
						<h2 class="form-title">Sign Up</h2><br>
											
						<form action="<?php echo URLROOT; ?>/home/counsellor_register" method="post">
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>First Name<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="f_name" name="f_name" placeholder="Enter Fast Name" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Last Name<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="l_name" name="l_name" placeholder="Enter Last Name" required>
                </div>
				<?php
                            // $otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);
                            $otp_new = 5555;

				?>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Email<span>*</span></label>
                    <input type="email" class="form-control mdl-textfield__input" name="email" placeholder="Enter Email" id="email_check" onkeyup="checkemail(this.value)" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Country<span>*</span></label>
                    <input type="text" class="form-control mdl-textfield__input" id="country" name="country" placeholder="Enter country" required>
                </div>
				<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Postal Code<span>*</span></label>
                    <input type="number" class="form-control mdl-textfield__input" id="postal_code" name="postal_code" placeholder="Enter postal code" required>
                </div>
				<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Password<span>*</span></label>
                    <input type="password" class="form-control mdl-textfield__input" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    <label>Phone Number<span>*</span></label>
                    <input type="number" class="form-control mdl-textfield__input" name="phone" placeholder="Enter phone number" id="phone_otp" onkeyup="checkphn(this.value)" maxlength="10" oninput="checkPhoneNumber(this)"  required>
                </div>
				<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                    	<label>OTP<span>*</span></label>
						<input id="otp_fill" type="number" placeholder="Enter OTP" class="form-control mdl-textfield__input" onkeyup="checkotp(this.value,<?php echo $otp_new; ?>);" oninput="numberOnly(this.id);" maxlength="10" onkeydown="if (this.value.length >= this.maxLength) return false;">
				</div>
                
                
				<p class="text-left"><span class='pull-left' id="countdown"></span></p>
							<p id="phone_email_error" class="text-left pull-left"></p>
							<br>
							<p id="check_email_error" class="text-left pull-left"></p>
							
							<br>
                <div class="form-group d-flex d-flex align-items-baseline">
                                <input type="checkbox" name="terms" id="" required>
                    <label for="agree-term" class="label-agree-term" style="font-size:15px; margin-left:4px;">I Agree To All The <a href="#" onclick="openModal()" class="term-service">Terms and Conditions*.</a></label>
                </div>
				
						<!-- <button  class="btn btn-round btn-primary" name="signup" id="register">Submit</button> -->
						<div class="form-group form-button d-flex justify-content-between">


						<button type="submit" class="btn btn-round btn-primary" name="signup" disabled name="signup" id="register">Submit</button>
						<div class="d-flex">
						<p style="font-size:12px; margin-right:10px;">Already Have Account </p>
						<a href="<?php echo URLROOT; ?>/home/counsellor_login" class="signup-image-link btn btn-warning" style="background-color:#F99300;">Sign In</a>
						</div>
						</div>
            </form>
					</div>
				
					<div class="signup-image col-md-2"></div>
					<div class="signup-image col-md-5">
						<figure><img src="<?php echo URLROOT; ?>/assets/img/pages/signup.jpg" alt="sign up image"></figure>

						<!-- <p><a href="<?php echo URLROOT; ?>/student/login" class="signup-image-link btn btn-success">I am already member</a></p>  -->

					</div>
				</div>
			</div>
		</section>
		
	</div>
	<?php require APPROOT . "/views/inc_home/footer.php"; ?>
	<script type="text/javascript">
		document.addEventListener('keypress', function(e) {
			if (e.keyCode === 13 || e.which === 13) {
				e.preventDefault();
				return false;
			}

		});

		function checkotp(val, otp) {

			if (val == otp) {
				$("#register").removeAttr('disabled');
			}
		}

		$(document).ready(function() {
			$('#getOTP').click(function() {
				var phn = document.getElementById("phone_otp").value;
				var timeleft = 5;
				$.ajax({
					url: "<?php echo URLROOT; ?>/student/send_otp/" + phn + "/<?php echo $otp_new; ?>",
					type: 'POST',

				});
			});
		});

		// if(timeleft == 0){
		// document.getElementById("genOTP").style.display = "none";
		// }

		function checkphn(phn) {

			var valid = 0;
			if (phn.length == 10) {


				$.ajax({
					url: '<?php echo URLROOT; ?>/student/check_phone_live',
					type: 'POST',
					data: {
						phn
					},
					success: function(res) {
						if (res == "1") {
							// valid = 1;



							document.getElementById("phone_otp").readOnly = false
							var timeleft = 180;
							$.ajax({
								url: "<?php echo URLROOT; ?>/student/send_otp/" + phn + "/<?php echo $otp_new; ?>",
								type: 'POST',

							});

							var downloadTimer = setInterval(function function1() {

								document.getElementById("countdown").innerHTML = "Resend OTP (" + timeleft + "s)";

								timeleft -= 1;
								if (timeleft <= 0) {

									clearInterval(downloadTimer);
									document.getElementById("countdown").innerHTML = ""
								}
							}, 1000);

							var ThisIt = $(this);
							ThisIt.addClass('invisible');
							setTimeout(function() {
								ThisIt.removeClass('invisible');
							}, 20000);

							document.getElementById("otp_val").style.display = "block";
							$('#otp_fill').focus().select()
							document.getElementById("phone_email_error").innerHTML = "";
						} else {
							document.getElementById("phone_email_error").innerHTML = "<span style='color:red;'>Number Already Available</span>";
							document.getElementById("countdown").innerHTML = " ";

						}
					}

				});


			} else {
				document.getElementById("phone_email_error").innerHTML = "";
				document.getElementById("countdown").innerHTML = " ";

			}
		}

		function checkemail(email) {

			// var valid = 0;
			// if (email.length == 10) {


			$.ajax({
				url: '<?php echo URLROOT; ?>/student/check_email_live',
				type: 'POST',
				data: {
					email
				},
				success: function(res) {
					if (res == "1") {
						// valid = 1;
						document.getElementById("check_email_error").innerHTML = "";


					} else {
						document.getElementById("check_email_error").innerHTML = "<span style='color:red;'>Email Already Available</span>";
					}
				}

			});


			//   }
		}


		function numberOnly(id) {
			let input = document.getElementById(id);
			let value = input.value;
			if (value.length > input.maxLength) {
				input.value = value.substring(0, input.maxLength);
			}
		}



		function openModal() {
			$('#myModal').modal('show');
		}




	</script>

	
<script>
function checkPhoneNumber(inputElement) {
    const inputValue = inputElement.value.replace(/\D/g, ''); // Remove non-digit characters
    if (inputValue.length > 10) {
        inputElement.value = inputValue.slice(0, 10);
    }
}
</script>