<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#2196f3">
	<meta name="author" content="DexignZone" /> 
    <meta name="keywords" content="" /> 
    <meta name="robots" content="" /> 
	<meta name="description" content="MecwinTech"/>
	<meta property="og:title" content="MecwinTech" />
	<meta property="og:description" content="MecwinTech" />
	<meta property="og:image" content="mecwintech.com"/>
	<meta name="format-detection" content="telephone=no">
    
    <!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT; ?>/assets_retail/logo.png" />
    
    <!-- Title -->
	<title>Mecwintech Retail</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo URLROOT?>/assets_retail/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT?>/assets_retail/css/style.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Racing+Sans+One&display=swap" rel="stylesheet">

</head>   

<body>
<?php
$otp_new = str_pad(rand(1111,9999), 4, "0", STR_PAD_LEFT);

?> 
<div class="page-wraper">
    
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader end-->
    
    <!-- Page Content -->
    <div class="page-content">
    
        <!-- Banner -->
        <div class="banner-wrapper shape-1">
            <div class="container inner-wrapper">
                <h2 class="dz-title">Create an Account</h2>
                <p class="mb-0">Please fill registration form below</p>
            </div>
        </div>
        <!-- Banner End -->    
        
        <center><img style="margin-top:75px" src="<?php echo URLROOT; ?>/assets_retail/mecwin.png" alt="" width="200"></center>
        <div class="container" style="margin-top:25px">
			<div class="account-area">
            <form class="multisteps_form" id="wizard" method="POST" action="<?php echo URLROOT?>/retail/user_register">
                    <div class="input-group">
                        <input type="text" placeholder="User Name" class="form-control" name="name">
                    </div>
                    <div class="input-group">
                        <input type="email" placeholder="User Email" class="form-control" name="email">
                    </div>
                    <div class="input-group">
                        <input type="number" placeholder="User Phone" class="form-control" name="phno" id="phone_otp" onkeyup="checkphn(this.value);">
                    </div>
                    <p class="text-left"><span class='pull-left' id="countdown"></span><a href="#" id='genOTP' style='display:none;' class="text-white">Generate OTP</a> </p>

                    <div class="input-group">
                        <input type="password" placeholder="Enter Otp" id="dz-password otp_fill" class="form-control be-0" onkeyup="checkotp(this.value,<?php echo $otp_new;?>);">
                        <span class="input-group-text show-pass"> 
                            <i class="fa fa-eye-slash"></i>
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    <div class="input-group">
          
								<input class="btn btn mt-2 btn-primary w-100 btn-rounded" type="submit"/>
					
                    
                    </div>
                    <p class="text-center">By tapping “Sign Up” you accept our <a href="javascript:void(0);" class="text-primary font-w700">terms</a> and <a href="javascript:void(0);" class="text-primary font-w700">condition</a></p>
                </form>
			</div>
		</div>
    </div>
    <!-- Page Content End -->
    
    <!-- Footer -->
    <footer class="footer fixed">
        <div class="container">
            <a href="<?php echo URLROOT; ?>/retail/login" class="btn btn-primary light btn-rounded text-primary d-block">Login</a>
        </div>
    </footer>
    <!-- Footer End -->
    
    <!-- Theme Color Settings -->
	<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom">
        <div class="offcanvas-body small">
            <ul class="theme-color-settings">
                <li>
                    <input class="filled-in" id="primary_color_8" name="theme_color" type="radio" value="color-primary" />
					<label for="primary_color_8"></label>
                    <span>Default</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_2" name="theme_color" type="radio" value="color-green" />
					<label for="primary_color_2"></label>
                    <span>Green</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_3" name="theme_color" type="radio" value="color-blue" />
					<label for="primary_color_3"></label>
                    <span>Blue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_4" name="theme_color" type="radio" value="color-pink" />
					<label for="primary_color_4"></label>
                    <span>Pink</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_5" name="theme_color" type="radio" value="color-yellow" />
					<label for="primary_color_5"></label>
                    <span>Yellow</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_6" name="theme_color" type="radio" value="color-orange" />
					<label for="primary_color_6"></label>
                    <span>Orange</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_7" name="theme_color" type="radio" value="color-purple" />
					<label for="primary_color_7"></label>
                    <span>Purple</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_1" name="theme_color" type="radio" value="color-red" />
					<label for="primary_color_1"></label>
                    <span>Red</span>
                </li>
                <li>
					<input class="filled-in" id="primary_color_9" name="theme_color" type="radio" value="color-lightblue" />
					<label for="primary_color_9"></label>
                    <span>Lightblue</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_10" name="theme_color" type="radio" value="color-teal" />
					<label for="primary_color_10"></label>
                    <span>Teal</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_11" name="theme_color" type="radio" value="color-lime" />
					<label for="primary_color_11"></label>
                    <span>Lime</span>
                </li>
                <li>
                    <input class="filled-in" id="primary_color_12" name="theme_color" type="radio" value="color-deeporange" />
					<label for="primary_color_12"></label>
                    <span>Deeporange</span>
                </li>
            </ul>
        </div>
    </div>
	<!-- Theme Color Settings End -->
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="<?php echo URLROOT?>/assets_retail/js/jquery.js"></script>
<script src="<?php echo URLROOT?>/assets_retail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT?>/assets_retail/js/settings.js"></script>
<script src="<?php echo URLROOT?>/assets_retail/js/custom.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if (isset($_SESSION['success'])) { ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php }
  unset($_SESSION['success']); ?>
</body>
</html>

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
            url  : "<?php echo URLROOT; ?>/retail/send_otp/"+phn+"/<?php echo $otp_new; ?>",
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