<?php require APPROOT . "/views/inc_home/header.php"; ?>  
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
                    <h2 class="form-title">Welcome to OodlesIn.<br>(Beta version) </h2>
						<!-- <figure><img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="" > -->
					</div>
					<div class="signin-form">
                    <figure><img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" alt="" ></figure>
						<!-- <h2 class="form-title">Welcome to OodlesIn.<br>(App is in beta version) </h2> -->
						<form method="post" action="<?php echo URLROOT;?>/home/login_access" autocomplete="off" class="register-form" >
							
							<!-- <div class="form-group">
								<div class="">
									<input type="email" name="username" placeholder="Your Email"
										class="form-control input-height" /> </div>
							</div> -->
							<div class="form-group">
								<div class="">
									<input type="password" name="passcode" placeholder="Please Enter Password"
										class="form-control input-height" /> </div>
								
							</div>
						
							
							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" type="submit">Login</button>
							
					
							</div>
						</form>
						<!-- <div class="social-login">
							<a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Sign Up!</span></a>
							
						</div> -->
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
<?php require APPROOT . "/views/inc_home/footer.php"; ?>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>