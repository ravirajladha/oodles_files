<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Oodles" />
	<meta name="author" content="Kods" />
	<title>Oodles - Login</title>

	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
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
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form" style="margin-top:50px">
						<h2 class="form-title"> <img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="" width="300"></h2>
						<form method="post" action="<?php echo URLROOT; ?>/home/counsellor_login" autocomplete="off" class="register-form">

							<p style="text-align:center;font-size:24px;">Counsellor Login</p>
							<br>
							<div class="form-group">
								<div class="">
									<input type="text" name="username" placeholder="Your Email" class="form-control input-height" />
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<input type="password" name="password" placeholder="Password" class="form-control input-height" />
								</div>
							</div>

							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" type="submit">Login</button>
								
							</div>
					
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="<?php echo URLROOT; ?>/assets/img/pages/signup.jpg" alt="sing up image"></figure>

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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if (isset($_SESSION['success'])) { ?>
	<script type="text/javascript">
		swal("<?php echo $_SESSION['success']; ?>");
	</script>
<?php }
unset($_SESSION['success']); ?>