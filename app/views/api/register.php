
<?php require APPROOT . "/views/inc/header.php"; ?>
<?php
$otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);

?> 

     <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" src="<?php echo URLROOT; ?>/assets2/img/white.png" alt="" style="width: 200px;margin-top:-100px;margin-bottom:100px">
            <!-- Register Form-->
            <div class="register-form mt-5 px-4">
              <form action="<?php echo URLROOT; ?>/api/user_register" method="post" autocomplete="off">
               
                
              <div class="form-group text-start mb-4"><span>Email</span>
                  <label for="email"><i class="lni lni-envelope"></i></label>
                  <input class="form-control" id="email" type="email" placeholder="Enter Email" name="email">
                </div>
                <div class="form-group text-start mb-4"><span>Phone Number</span>
                  <label for="email"><i class="lni lni-phone"></i></label>
                  <input type="number" class="form-control text-white" name="phno" id="phone_otp" onkeyup="checkphn(this.value);">
                </div>


                <p class="text-left"><span class='pull-left' id="countdown"></span><a href="#" id='genOTP' style='display:none;' class="text-white">Generate OTP</a> </p>
<br>
                <div class="form-group text-start mb-4"><span>Enter OTP</span>
                <input id="otp_fill" type="number" class="form-control text-white" onkeyup="checkotp(this.value,<?php echo $otp_new;?>);">
                                
                </div>


                </div>
                <button class="btn btn-success btn-lg w-100" style="display:none;color:#333;background:#eee;border-color:#eee" type="submit" id='signup_btn'>Sign Up</button>
              </form>
            </div>
            <!-- Login Meta-->
            <div class="login-meta-data">
              <p class="mt-3 mb-0">Already have an account?<a class="ms-1" href="<?php echo URLROOT;?>/api/login">Sign In</a></p>
            </div>
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
  <script>
    function numberOnly(id) {
    let input = document.getElementById(id);
    let value = input.value;
    if (value.length > input.maxLength) {
    input.value = value.substring(0, input.maxLength);
  }
}
  </script>
   
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
$("#signup_btn").click();
}
}

function checkphn(phn){
if(phn.length == 10){

var timeleft = 20;
$.ajax({
            url  : "<?php echo URLROOT; ?>/api/send_otp/"+phn+"/<?php echo $otp_new; ?>",
            type : 'POST',

        }); 

var downloadTimer = setInterval(function function1(){
document.getElementById("countdown").innerHTML = "Resend OTP (" + timeleft + "s)";

timeleft -= 1;
if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = ""
}
}, 1000);



var ThisIt = $(this);
ThisIt.addClass('invisible');
setTimeout(function(){
    ThisIt.removeClass('invisible');
} , 20000);

document.getElementById("otp_val").style.display = "block";
$('#otp_fill').focus().select()      
}
}

</script>