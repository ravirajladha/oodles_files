<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php if (!isset($_SESSION['rexkod_oodles_admin_id'])) header("Location: " . URLROOT . "/admin/login"); ?>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="" />
	<meta name="author" content="Kods" />
	<title>OodlesIN</title>
	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/plugins/iconic/css/material-design-iconic-font.min.css">
	<!-- bootstrap -->
	<link href="<?php echo URLROOT; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="<?php echo URLROOT; ?>/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/pages/login.css">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />
</head>

<body>
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content pb-5">
					<div class="signin-image">
						<figure><img src="<?php echo URLROOT; ?>/assets/img/pages/404.jpg" alt="sing up image"></figure>
					</div>
					<div class="signin-form">
						<h2 class="form-title">Error 404</h2>
						<p>The page you are looking for does't exist or an other error occurred.</p><br>
						<!-- <form class="register-form" id="login-form"> -->
							<div class="form-group form-button">
							<a href="<?php echo URLROOT; ?>/admin/index">	<button class="btn btn-round btn-primary" name="home" id="home">Go to home page</button></a>
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- start js include path -->
	<script src="<?php echo URLROOT; ?>/assets/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo URLROOT; ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- end js include path -->
</body>

</html>