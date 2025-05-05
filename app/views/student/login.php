<?php require APPROOT . "/views/inc_home/header.php"; ?>
<script>
	// $(window).on('load', function() {
	//     $('#myModal').modal('show');
	// });
	/*  */
</script>
<style>
	.pass {
		height: 50px;
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
	}

	.scrollit {
		overflow-y: scroll;
		height: 300px;
	}

	.valo {
		height: 45px;
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
	@media (max-width: 767px) {
		.signin-image{
			display: none;
		}
	}
</style>

<body>

	<hr>


	<!-- modal start -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content modal-popout-bg">
				<div class="modal-header">
					<h5 class="modal-title" id="addEventTitle">Disclaimer</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="signup-image col-md-12" style=" border: 1px solid black;">

						<table>

							<tr>
								<td>
									<ul>
										<li>OodlesIN is a platform for applying for various corporate scholarships.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>OodlesIN does not charge students any fees for scholarship applications.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Scholarships are awarded at the sole discretion of the Company.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Applying for a scholarship does not guarantee that you will be awarded a scholarship.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>OodlesIN reserves the right to cancel or change any scholarship listed at any time without notice.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>Scholarships are available based on funding and availability.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>OodlesIN shall not be liable for any loss or damage incurred or suffered by applicants in dealing with any unauthorized individuals/entities or any person/officer/director/employee associated with such unauthorized entities, whether directly or indirectly.</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td>
									<ul>
										<li>OodlesIN is also not responsible for providing personal information to such entities or their agents or providing payment credentials on such websites/portals or making online/physical payments using tools to such unauthorized individuals/entities.</li>
									</ul>
								</td>
							</tr>

						</table>



					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal end -->
	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in" style="margin-top:100px !important;margin-bottom:100px !important" s>
			<div class="container">
				<div class="signin-content row">
					<div class="signin-image col-md-6">
						<figure><img src="<?php echo URLROOT; ?>/assets/img/pages/signin.jpg" alt="sign up image"></figure>

					</div>

					<div class="signin-form col-md-1">
					</div>
					<div class="signin-form col-md-4">
						<h2 class="form-title">Login</h2><br>
						<form method="post" action="<?php echo URLROOT; ?>/student/login" autocomplete="off" class="register-form">


							<div class="form-group">
								<div class="">
									<input type="text" name="username" placeholder="Your Email ID / Mobile No" class="valo form-control input-height" />
								</div>
							</div>


							<div class="form-group">
								<div class="">
									<input type="password" name="password" placeholder="Password" class="valo form-control input-height" />
								</div>
							</div>


							<div class="form-group form-button" style="text-align:right;">
								<a href="<?php echo URLROOT; ?>/student/forgot_password" class="signup-image-link">Forgot Password?</a>

							</div>
							<!-- style="float:right"  -->
							<div class="form-group form-button" style="text-align: center;">
								<!-- <button class="thm-btn comment-form__btn" type="submit">Login</button> -->
								<button class="btn btn-round btn-primary" type="submit">Login</button>
								<!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
							</div>
							<div class="form-group " style="text-align: center;">
								<input type="checkbox" id="chk1" />Are you a Teacher? &ensp;&ensp;
								<!-- <input type="checkbox" id="chk2" />Are you a student? -->

								<script type="text/javascript">
									$(document).ready(function() {
										$('#chk1').click(function() {
											window.location = '<?php echo URLROOT ?>/teacher/login'; // link of your desired page.  
										});
									});
								</script>
								<script type="text/javascript">
									$(document).ready(function() {
										$('#chk2').click(function() {
											window.location = '<?php echo URLROOT ?>/student/login'; // link of your desired page.  
										});
									});
								</script>
							</div>

						</form>
						<div class="social-login" style="text-align: center;">
							<br>
							<a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account</span></a>


						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php require APPROOT . "/views/inc_home/footer.php"; ?>