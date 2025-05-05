
<?php require APPROOT . "/views/inc/header.php"; ?>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?php echo URLROOT; ?>/assets2/img/white.png" alt="" style="width: 200px;margin-top:-100px;margin-bottom:100px">
            <!-- Register Form-->
            <?php
$otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);
// session_start();
?>

            <div class="register-form mt-5 px-4">
              <form method="post" action="<?php echo URLROOT;?>/api/user_login" autocomplete="off">
              <div class="form-group text-start mb-4"><span>Phone Number</span>
                  <label for="username"><i class="lni lni-phone"></i></label>
                  <input type="number" class="form-control text-white" name="user_phone" id="phone_otp" onkeyup="checkphn(this.value);">
                </div>
                <div class="form-group text-start mb-4"><span>Enter OTP</span>
                <input id="otp_fill" type="number" class="form-control text-white" onkeyup="checkotp(this.value,<?php echo $otp_new;?>);">
                                
                </div>
                <button class="btn btn-success btn-lg w-100" id="login_btn" style="display:none;color:#333;background:#eee;border-color:#eee" type="submit">Log In</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <!-- <a class="forgot-password d-block mt-3 mb-1" href="forget-password.html">Forgot Password?</a> -->
              <p class="mb-0 mt-3">Didn't have an account?<a class="ms-1" href="<?php echo URLROOT;?>/api/register">Register Now</a></p>
            </div>
            <!-- View As Guest-->
            <!-- <div class="view-as-guest mt-3"><a class="btn" href="home.html">View as Guest</a></div> -->
          </div>
        </div>
      </div>
    </div>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>

<?php 
  require APPROOT . '/views/inc/footer.php'; 
  ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
            url  : "<?php echo URLROOT; ?>/api/send_otp/"+phn+"/<?php echo $otp_new; ?>",
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