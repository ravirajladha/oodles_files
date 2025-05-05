<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Forgot Password School OodlesIn" />
	<meta name="author" content="OodlesIn" />
	<title>OodlesIn - Forgot Password School</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link rel="stylesheet" href="../assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="<?php echo URLROOT?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="<?php echo URLROOT?>/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo URLROOT?>/assets/css/pages/login.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT?>/assets/img/favicon.ico" />
</head>
<?php
// $otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);
$otp_new = 5555;

 $_SESSION['cur_otp'] = $otp_new;
  ?>
<body>
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure><img src="<?php echo URLROOT?>/assets/img/pages/forgot.jpg" alt="sing up image"></figure>
						<a href="<?php echo URLROOT?>/school/login" class="signup-image-link">Login here</a>
					</div>
					<div class="signin-form">
						<h2 class="form-title">Forgot Password?</h2>
						<p>Enter your phone number bellow to receive otp for reset password</p>
						<p>Our system checks whether the user is a school and his mobile number exists or not, else the user will not get the otp.</p>
            <br>
            <form method="post" action="<?php echo URLROOT;?>/school/update_password" autocomplete="off" class="register-form" >

							<div class="form-group">
								<div class="">
									<input name="phone" type="number"  id ="phone_new" placeholder="Phone Number*"
										class="form-control input-height" /> </div>
							</div>


              <div class="form-group">
              <div class="comment-form__input-box" id="new_password" style="display:none;" >
								<input type="password" placeholder="Enter New Password" class="form-control" name="password" required>
								</div>
                </div>


							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" name="send" id="signup_btn" style="display:none;"  type="submit">Update Password</button>
							</div>
						</form>

            <div class="row">
                  <div class="col-md-12">
                     <div class="form-group pull-left">
                     <button onclick="this.disabled=true;" class="btn btn-primary" id="getOTP" style="width:100%;margin-bottom:6px;">Generate OTP</button>
                     </div> 
                  </div>

                  <div class="col-md-12">
                     <div class="form-group">
                     <input type="number" placeholder="Enter OTP sent to your phone" id="postOTP" class="form-control" onkeyup="checkotp(this.value)" oninput="numberOnly(this.id);" maxlength="4">
                     </div> 
                  </div>
               </div>
               <p id="phone_email_error" class="text-left pull-left"></p>
						<!-- <div class="social-login">
							<span class="social-label">Or login with</span>
							<ul class="socials">
								<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
							</ul>
						</div> -->
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- start js include path -->
	<script src="<?php echo URLROOT?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo URLROOT?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- end js include path -->
</body>

</html>
<script>


$(document).ready(function(){
        $('#getOTP').click(function(){

         var phone = document.getElementById("phone_new").value;
         var phn = document.getElementById("phone_new").value;
		 alert(phn);

         if (phn.length == 10) {
alert (phn);
		$.ajax({
							url  : '<?php echo URLROOT; ?>/school/check_phone_live_and_school',
							type : 'POST',
							data : {phn},
							success : function(res)
							{
							
								if(res == "1"){
									// valid = 1;
						document.getElementById("phone_email_error").innerHTML = "";
            $.ajax({
                        url  : "<?php echo URLROOT; ?>/admin/send_otp_forgot/"+phone+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    });
						

					}else{
						document.getElementById("phone_email_error").innerHTML = "<span style='color:red;'>Unauthorized Attempt, contact admin!</span>";
					}
				}

			});


//   }
} else{
			document.getElementById("phone_email_error").innerHTML ="";
			document.getElementById("countdown").innerHTML=" ";

}

if(res == "1"){



                  $.ajax({
                        url  : "<?php echo URLROOT; ?>/admin/send_otp_forgot/"+phone+"/<?php echo $otp_new; ?>",
                        type : 'POST',

                    });

                  }
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
