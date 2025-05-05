<?php require APPROOT . '/views/inc_retail/header.php'; ?>
<?php
$otp_new = 5555;
// session_start();
?>

    <!-- Page Content -->

    <div class="page-content">
        
        <!-- Banner -->
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper">
                <h2 class="dz-title">Sign In</h2>
                <p class="mb-0">Please sign in to your registered account</p>
            </div>
        </div>
        <!-- Banner End -->
        <center><img style="margin-top:100px" src="<?php echo URLROOT; ?>/assets_retail/mecwin.png" alt="" width="200"></center>
        <div class="container" style="margin-top:75px">
			<div class="account-area">
            <form class="multisteps_form" id="wizard" method="POST" action="<?php echo URLROOT?>/retail/user_login">
					<div class="input-group">
						<input type="number" placeholder="User Phone" class="form-control" name="user_phone" id="phone_otp" onkeyup="checkphn(this.value);">
					</div>
					<div class="input-group">
						<input type="password" placeholder="Enter OTP" id="dz-password otp_fill" class="form-control be-0" onkeyup="checkotp(this.value,<?php echo $otp_new;?>);">
						<span class="input-group-text show-pass"> 
							<i class="fa fa-eye-slash"></i>
							<i class="fa fa-eye"></i>
						</span>
					</div>
                    <!-- <a href="forgot-password.html" class="btn-link d-block text-center">Forgot your password?</a> -->
				
                    <div class="input-group">
          
          <input class="btn btn mt-2 btn-primary w-100 btn-rounded" id="login_btn" type="submit" vvalue="Mail Me" style="display:none;" />


</div>

				</form>
                <!-- <div class="text-center p-tb20">
                    <span class="saprate">Or sign in with</span>
                </div>
                <div class="social-btn-group text-center">
                    <a href="https://www.google.com/" target="_blank" class="social-btn"><img src="assets/images/social/google.png" alt="socila-image"></a>
                    <a href="https://www.facebook.com/" target="_blank" class="social-btn ms-3"><img src="assets/images/social/facebook.png" alt="social-image"></a>
                </div> -->
			</div>
		</div>
    </div>
    <!-- Page Content End -->
    
    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
            <a href="<?php echo URLROOT?>/retail/register" class="btn btn-primary light btn-rounded text-primary d-block">Create account</a>
        </div>
    </footer>
    <!-- Footer End -->
    

	<?php require APPROOT . '/views/inc_retail/footer.php'; ?>


    <script type="text/javascript">

   


        document.addEventListener('keypress', function (e) {
            if (e.keyCode === 13 || e.which === 13) {
                e.preventDefault();
                return false;
            }
            
        });



function checkotp(val,otp){
 
if(val == otp){
$("#login_btn").click();
}
}

function checkphn(phn){
if(phn.length == 10){
  
  $.ajax({
            url  : "<?php echo URLROOT; ?>/user/send_otp/"+phn+"/<?php echo $otp_new; ?>",
            type : 'POST',

        }); 

var timeleft = 20;

var downloadTimer = setInterval(function function1(){
document.getElementById("countdown").innerHTML = "Resend OTP (" + timeleft + "s)";

timeleft -= 1;
if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").style.display = "none";
    document.getElementById("genOTP").style.display = "block";
}
}, 1000);



var ThisIt = $(this);
ThisIt.addClass('invisible');
setTimeout(function(){
    ThisIt.removeClass('invisible');
} , 20000);

document.getElementById("otp_val").style.display = "block";
document.getElementById("genOTP").style.display = "none";
document.getElementById("countdown").style.display = "block";
$('#otp_fill').focus().select()




}
}

</script>
