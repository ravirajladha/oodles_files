<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:title" content="Jobie : jobie Job Portal Admin  Bootstrap 5 Template" />
	<meta property="og:description" content="Jobie : Job Portal  Admin  Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobie.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>MecWin Technologies</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT; ?>/assets_admin/icon.png">
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets_admin/vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?php echo URLROOT; ?>/assets_admin/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
	<link href="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/assets_admin/css/style.css" rel="stylesheet">
	<script src="<?php echo URLROOT; ?>/assets_admin/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT; ?>/assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-4">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img width="100" src="<?php echo URLROOT; ?>/assets_retail/mecwin_white.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form method="post" action="<?php echo URLROOT;?>/hr/user_login" autocomplete="off">
                                        <div class="form-group">
                                            <label class="mb-1 text-white">Email</label>
                                            <input type="email" class="form-control" value="" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white">Password</label>
                                            <input type="password" class="form-control" value="" name="password"> 
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <!-- <div class="form-group">
                                               <div class="custom-control custom-checkbox ms-1 text-white">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot Password?</a>
                                            </div> -->
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign In</button>
                                        </div>
                                    </form>
                                    <!-- <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="./page-register.html">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo URLROOT?>/assets_admin/vendor/global/global.min.js"></script>
	<script src="<?php echo URLROOT?>/assets_admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo URLROOT?>/assets_admin/js/custom.min.js"></script>
    <script src="<?php echo URLROOT?>/assets_admin/js/deznav-init.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>

    
</body>

</html>