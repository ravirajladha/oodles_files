<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="" />
	<meta name="author" content="Kods" />
	<title>OodlesIN</title>
	<!-- google font -->

	<!-- icons -->
	<link href="<?php echo URLROOT; ?>/assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="<?php echo URLROOT; ?>/assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- Material Design Lite CSS -->
	<!-- inbox style -->
	<link href="<?php echo URLROOT; ?>/assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js" rel="stylesheet"> -->
	<!-- favicon -->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?php echo URLROOT; ?>/assets/fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="<?php echo URLROOT; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/plugins/summernote/summernote.css" rel="stylesheet">
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/material_style.css">
	<!-- inbox style -->
	<link href="<?php echo URLROOT; ?>/assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="<?php echo URLROOT; ?>/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Theme Styles -->

	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />
	<link href="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

	<link href="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

</head>
<!-- END HEAD -->


<?php $current_student_id = $_SESSION['rexkod_oodles_student_id']; ?>


<style>
	.table-wrapper {
		overflow-x: visible;
		overflow-y: visible;
	}
</style>
<style>
	strong {
		color: #ffb64d;
	}

	.circle,
	.circle:before,
	.circle:after {
		border-radius: 50%;
	}

	.menunav {

		display: block;


		min-width: 10em;
		max-width: 30em;
	}

	.menunav ul {
		position: relative;
		padding: 50%;
		max-width: 0;
		max-height: 0;
		list-style: none;
	}

	.menunav li {
		position: absolute;
	}

	.slice {
		overflow: hidden;
		position: absolute;
		top: 0;
		left: 0;
		width: 50%;
		height: 50%;
		transform-origin: 100% 100%;
	}

	/* Cell orientation */
	.coconut {
		transform: rotate(13deg) skewX(40deg);
	}

	.vanilla {
		transform: rotate(64.43deg) skewX(40deg);
	}

	.orange {
		transform: rotate(115.86deg) skewX(40deg);
	}

	.almond {
		transform: rotate(167.29deg) skewX(40deg);
	}

	.yellow {
		transform: rotate(218.71deg) skewX(40deg);
	}

	.grape {
		transform: rotate(270.14deg) skewX(40deg);
	}

	.blackberry {
		transform: rotate(321.57deg) skewX(40deg);
	}

	.cherry {
		transform: rotate(373deg) skewX(40deg);
	}


	.menunav label {
		cursor: pointer;
	}

	.slice label {
		display: block;
		width: 200%;
		height: 200%;
		transform: skew(-40deg) rotate(-65deg);
		line-height: 1.9;
		text-align: center;
	}

	.slice label span {
		display: block;
	}

	.slice label:hover {
		color: white;
		border: 2px solid black;
		transition: all 0.5s ease;
	}

	.circle .menuname:hover {
		color: white;
		transition: color 0.5s ease;
	}

	.menudesc {
		width: 2800px;
	}

	/* Cell background colors */
	.coconut label,
	.ococonut:checked~nav .unsel {
		background: #2ed8b6;
	}

	.vanilla label,
	.ovanilla:checked~nav .unsel {
		background: #2ed8b6;
	}

	.orange label,
	.oorange:checked~nav .unsel {
		background: #ffb64d;
	}

	.almond label,
	.oalmond:checked~nav .unsel {
		background: #4099ff;
	}

	.grape label,
	.ogrape:checked~nav .unsel {
		background: #ace600;
	}

	.blackberry label,
	.oblackberry:checked~nav .unsel {
		background: #ff5370;
	}

	.cherry label,
	.ocherry:checked~nav .unsel {
		background: #ff0000;
	}

	.yellow label,
	.oyellow:checked~nav .unsel {
		background: #fffc00;
	}


	.slice label {
		font-weight: 700;
		line-height: 5;
	}

	.circle label {
		font-weight: 700;
		line-height: 5;
	}

	.slice p {
		width: 100px;
		margin-left: 185px;
	}

	.unsel {
		z-index: 2;
		top: 25%;
		left: 25%;
		width: 32%;
		height: 32%;
		text-align: center;
		background-color: #ffffff;
	}

	.unsel label {
		display: block;
		width: 100%;
		height: 100%;
		line-height: 9;
	}

	.middle {
		z-index: 1;
		top: 15%;
		left: 15%;
		width: 70%;
		height: 70%;
		text-align: center;
		background-color: white;
	}

	/* .menunav {} */

	.visible {
		display: block;
		/* text-decoration: underline; */
	}

	.hidden {
		display: none;
	}

	.visible ul {
		list-style-type: none;
	}

	.visible details ul {
		list-style-type: square;
	}

	.visible a {
		font-size: 120%;
		text-decoration: none;
		color: purple;
	}

	.Reseau a {
		font-size: 160%;
	}

	.Reseau a:hover {
		color: red;
	}

	.circle label span {
		-webkit-transform: rotate(-180deg);
		-moz-transform: rotate(-180deg);
		-o-transform: rotate(-180deg);
		transform: rotate(-180deg);
	}

	@media(max-width:640px) {
		.visible {
			display: block !important;
			width: 95% !important;
		}

		.circle label {
			font-weight: 700 !important;
			line-height: 4 !important;
		}

		.menunav {

			display: block !important;
			left: 0% !important;

		}

		.unsel img {
			width: 150px;
		}

		h1 {
			font-size: 20px !important;
		}

		.fullscreen-btn {
			display: none !important;
		}

		.menu-toggler {
			display: none !important;
		}

		.page-header-inner {
			display: flex !important;
			justify-content: space-between !important;
		}

		.page-header.navbar .top-menu .navbar-nav>li.dropdown-notification .dropdown-menu {
			margin-right: -48px;
		}

		.page-header.navbar .top-menu .navbar-nav>li.dropdown-notification .dropdown-menu:after,
		.page-header.navbar .top-menu .navbar-nav>li.dropdown-notification .dropdown-menu:before {
			margin-right: 58px;
		}

		.page-header.navbar .page-logo {
			width: auto;
		}

		.visible {
			width: auto;
		}

		.container {
			padding-left: 0;
			padding-right: 0;
		}

		div.bhoechie-tab-container {
			margin-left: 0 !important;
			padding-left: 0;
		}

		.row>* {
			padding-right: 0;
		}
	}

	.info-box {
		width: 92%;
	}

	.card-body {
		/* padding:0; */
	}

	div.bhoechie-tab-content {

		padding-left: 0 !important;

	}
</style>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="<?php echo URLROOT ?>/student">
						<img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo_white.png" alt="" width="143">
						<span class="logo-default"></span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
				</ul>

				<!-- <form class="search-form-opened" action="#" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="query">
						<span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
					</div>
				</form> -->
				<!-- start mobile menu -->
				<a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li><a class="fullscreen-btn"><i data-feather="maximize"></i></a></li>

						<!-- start language menu -->

						<!-- end language menu -->
						<!-- start notification dropdown -->
						<?php $studentMod = new Students;
						$notifications = $studentMod->get_notifications($_SESSION['rexkod_oodles_student_id']);
						$count_of_unread_message = 0;
						foreach ($notifications as $notification1) {
							if ($notification1->flag == 0) {
								$count_of_unread_message++;
							}
						}
						?>


						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i data-feather="bell"></i>
								<span class="badge headerBadgeColor1"> <?php echo $count_of_unread_message; ?> </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
									<span class="notification-label purple-bgcolor">New <?php echo $count_of_unread_message; ?></span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<?php
										$count_for_limiting_message = 0;
										foreach ($notifications as $notification) {

											// $message_visible should be 0 else its deleted from user side.
											// Its a delete flag
											$message_visible = $notification->flag_delete;
											if ($message_visible == 0) {
												$count_for_limiting_message++;
												if ($count_for_limiting_message < 7) { ?>
													<li>
														<a href="javascript:;">
															<!-- <span class="time">3 mins</span> -->
															<span class="details">
																<span class="notification-icon circle purple-bgcolor"><i class="fa fa-user o"></i></span>
																<?php echo $notification->message; ?></span>
														</a>
													</li>
										<?php }
											}
										}
										?>
										<!-- <li>
											<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-check"></i></span>
													Notification Message 1</span>
											</a>
										</li>
										
										<li>
											<a href="javascript:;">
												<span class="time">7 mins</span>
												<span class="details">
													<span class="notification-icon circle blue-bgcolor"><i class="fa fa-comments-o"></i></span>
													<b>Notification </b> Message 3</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">12 mins</span>
												<span class="details">
													<span class="notification-icon circle pink"><i class="fa fa-heart"></i></span>
													<b>Notification </b> Message 4</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">10 hrs</span>
												<span class="details">
													<b>Notification </b> Message 5</span>
											</a>
										</li> -->
									</ul>
									<div class="dropdown-menu-footer">
										<a href="<?php echo URLROOT ?>/student/notifications"> All notifications </a>
									</div>
								</li>
							</ul>
						</li>

						<!-- end notification dropdown -->
						<!-- start message dropdown -->

						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<img alt="" class="img-circle " src="<?php echo URLROOT; ?>/assets/img/dp.jpg" />
								<span class="username username-hide-on-mobile"> <?php
																				if (isset($_SESSION['rexkod_oodles_student_name'])) {
																					echo $_SESSION['rexkod_oodles_student_name'];
																				} ?>
							</a>
							<?php
							$studentModel = new Students;
							$user_detail = $studentModel->get_current_student();
							// $student_detail = $studentModel->get_current_student($_SESSION['rexkod_oodles_student_id']) 
							?>
							<ul class="dropdown-menu dropdown-menu-default">



								<?php if (!isset($user_detail->id)) { ?>
									<a href="<?php echo URLROOT; ?>/student/add_profile">
										<li>
											<i class="icon-user"></i> Add Profile
									</a>
						</li>
					<?php } else { ?>
						<a href="<?php echo URLROOT; ?>/student/update_profile">
							<li>
								<i class="icon-user"></i> Update Profile
						</a>
						</li>
					<?php 	} ?>

					<!-- <li>
									<a href="#">
										<i class="icon-settings"></i> Settings
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-directions"></i> Help
									</a>
								</li>
								<li class="divider"> </li>
								<li>
									<a href="lock_screen.html">
										<i class="icon-lock"></i> Lock
									</a>
								</li> -->
					<li>
						<a href="<?php echo URLROOT; ?>/student/logout">
							<i class="icon-logout"></i> Log Out </a>
					</li>
					</ul>

					<!-- end manage user dropdown -->
					<li class="dropdown dropdown-quick-sidebar-toggler">
						<a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded="MaterialButton">

						</a>
					</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- end header -->
		<!-- start color quick setting -->

		<!-- end color quick setting -->


		<style>
			.page-content-white .page-bar {
				padding: 20px;
			}
		</style>
		<div class="page-contet-wrapper">
			<div class="page-content">
				<div class="page-bar">
					<!-- <div class="page-title-breadcrumb">
						<div class=" pull-left">
							<div class="page-title">Dashboard</div>
						</div>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
							</li>
							<li class="active">Dashboard</li>
						</ol>
					</div> -->
				</div>
				<!-- start widget -->
				<div class="row">

					<div class="col-xl-12">
						<div class="card card-box">

							<div class="card-body no-padding height-9">
								<div class="row">


									<?php $student = $data['user_detail'] ?>
									<?php
									$count = 0;
									if (!empty($data['user_detail'])) {
										if ($student->f_name != Null) {
											$count++;
										}
										if ($student->l_name != Null) {
											$count++;
										}
										if ($student->phone_no != Null) {
											$count++;
										}
										if ($student->whatsapp_no != Null) {
											$count++;
										}
										if ($student->dob != Null) {
											$count++;
										}
										if ($student->aadhar != Null) {
											$count++;
										}
										if ($student->gender != Null) {
											$count++;
										}
										if ($student->comm_state != Null) {
											$count++;
										}
										if ($student->religion != Null) {
											$count++;
										}
										if ($student->category != Null) {
											$count++;
										}
										if ($student->father_name != Null) {
											$count++;
										}
										if ($student->f_email_id != Null) {
											$count++;
										}
										if ($student->f_aadhar != Null) {
											$count++;
										}
										if ($student->f_phone != Null) {
											$count++;
										}
										if ($student->father_aadhar_doc != Null) {
											$count++;
										}
										if ($student->mother_name != Null) {
											$count++;
										}
										if ($student->m_email_id != Null) {
											$count++;
										}
										if ($student->m_aadhar != Null) {
											$count++;
										}
										if ($student->m_phone != Null) {
											$count++;
										}
										if ($student->mother_aadhar_doc != Null) {
											$count++;
										}
										if ($student->siblings != Null) {
											$count++;
										}
										if ($student->course != Null) {
											$count++;
										}
										if (($student->academic_name != Null)) {
											$count++;
										}

										if ($student->annual_income != Null) {
											$count++;
										}
										if ($student->physically != Null) {
											$count++;
										}
										if ($student->student_image != Null) {
											$count++;
										}
										if ($student->comm_address != Null) {
											$count++;
										}
										if ($student->comm_village != Null) {
											$count++;
										}
										if ($student->comm_block != Null) {
											$count++;
										}
										if ($student->comm_pin_code != Null) {
											$count++;
										}
										if ($student->perm_address != Null) {
											$count++;
										}
										if ($student->perm_village != Null) {
											$count++;
										}
										if ($student->perm_block != Null) {
											$count++;
										}
										if ($student->perm_state != Null) {
											$count++;
										}
										if ($student->perm_pin_code != Null) {
											$count++;
										}
										if ($student->account_no != Null) {
											$count++;
										}
										if ($student->re_account_no != Null) {
											$count++;
										}
										if ($student->ifsc_code != Null) {
											$count++;
										}
										if ($student->bank_name != Null) {
											$count++;
										}
										if ($student->bank_branch != Null) {
											$count++;
										}
										if ($student->name_as_per_bank != Null) {
											$count++;
										}
										if ($student->admission_toggle != Null) {
											$count++;
										}
										if ($student->institute_city != Null) {
											$count++;
										}
										if ($student->institute_state != Null) {
											$count++;
										}

										if ($student->identity_proof != Null) {
											$count++;
										}
										if ($student->passbook_statement != Null) {
											$count++;
										}

										if ($student->academic_type != Null) {
											$count++;
										}

										if ($student->board != Null) {
											$count++;
										}
										if ($student->hobby != Null) {
											$count++;
										}
										if ($student->achievements != Null) {
											$count++;
										}
										if ($student->description != Null) {
											$count++;
										}
										if ($student->mother_tongue != Null) {
											$count++;
										}
										if ($student->p_academic_name != Null) {
											$count++;
										}
										if ($student->p_cgpa != Null) {
											$count++;
										}
										if ($student->p_class != Null) {
											$count++;
										}
										if ($student->p_start_date != Null) {
											$count++;
										}
										if ($student->p_end_date != Null) {
											$count++;
										}
									}
									$percentage_filled_column  = ($count / 56) * 100;
									// echo $percentage_filled_column;
									?>




									<div class="row">
										<div class="col-md-4">
											<nav class="menunav"><br>
												<ul class='circle'>

													<li class='vanilla light slice'>
														<label for='ovanilla' class='circle over' id="2">PROFILE</label>
													</li>
													<li class='orange light slice'>
														<label for='oorange' class='circle over' id="3">QUIZZES</label>
													</li>
													<li class='yellow light slice'>
														<label for='oyellow' class='circle '><span class="over" id="7">TEST</span></label>
													</li>
													<li class='almond light slice'>
														<label for='oalmond' class='circle'><span class="over" id="4">SCHOLARSHIP</span></label> <!-- Some menu labels have to be flipped with a span -->
													</li>
													<li class='grape light slice'>
														<label for='ogrape' class='circle'><span class="over" id="5">WALLET</span></label>
													</li>
													<li class='blackberry light slice'>
														<label for='oblackberry' class='circle'><span class="over" id="6">SUBSCRIPTION</span></label>
													</li>
													<li class='cherry light slice' >
														<label for='ocherry' class='circle' style="line-height: 2;"><span class="over" id="9" style="transform: rotate(0deg);">Career <br> Assesments Test</span></label>
													</li>

													<li class='unsel circle'>

														<?php if (!empty($data['get_current_student']->student_image)) { ?><label for='unsel' class="clicky menuname img-responsive"><img src="<?php echo URLROOT; ?>/uploads/<?php echo $data['get_current_student']->student_image ?>" style="border-radius: 50%;height:160%;width:160%;padding:5px 0 0 0;" alt=""></label> <?php } else { ?> <label for='unsel' class="clicky menuname"><img src="<?php echo URLROOT; ?>/assets/img/dp.jpg" style="border-radius:50%;height:100%;width:160%;padding:5px 0 0 0;" alt="" class="img-responsive"></label> <?php } ?>
													</li>
													<li class='middle circle'></li>
												</ul>
											</nav>

										</div>

										<div class="col-md-8" style="background:white;">
											<div class='hidden' id="menu1">
											</div>
											<!-- Menu tab start -->
											<div class='hidden' id="menu2">


												<?php $student = $data['user_detail']; ?>
												<?php
												function check($data, $value)
												{
													if (!isset($data->$value) == true) {
														echo ('Nil');
													} elseif (empty($data->value) == true) {
														echo ('Nil');
													} else {
														echo ($data->$value);
													}
												}

												?>
												<!-- start page content -->
												<!-- <div class="page-content-wrapper"> -->
												<!-- <div class="page-content"> -->



												<div class="row">
													<div class="col-md-12">

														<div class="profile-sidebar" style="width:322px;">
															<div class="card">
																<div class="card-head">
																	<header style="text-align:center;"> <?php echo strtoupper($data['get_auth_detail']->name); ?> <?php if (!empty($student->l_name)) {
																																										echo strtoupper($student->l_name);
																																									} else {
																																									} ?></header>
																	<p style="text-align:center;"> <?php echo strtoupper($data['get_auth_detail']->email); ?> </p>
																</div>
																<div class="card-body no-padding height-9">
																	<div class="profile-desc">
																		<?php if (!empty($student->description)) {
																			echo $student->description;
																		} else {
																		?>

																			<?php
																			$studentModel = new Students;
																			$user_detail = $studentModel->get_current_student();
																			// $student_detail = $studentModel->get_current_student($_SESSION['rexkod_oodles_student_id']) 
																			?>




																			<?php if (!isset($user_detail->id)) { ?>
																				<a href="<?php echo URLROOT; ?>/student/add_profile">

																					<span class="text-center" style="color:#0d6efd;"> <i class="icon-user"></i> Complete your Profile</span>
																				</a>

																			<?php } else { ?>
																				<a href="<?php echo URLROOT; ?>/student/update_profile">

																					<span class="text-center"> <i class="icon-user"></i> Complete your Profile</span>
																				</a>

																			<?php 	} ?>



																			<!-- I am Amogh, born and brought up in Bandra. Thank you for allowing me to introduce myself. I scored 77% in my school at Little Flowers Montessori English Medium High School. -->
																			<!-- I scored 77.7% in SSWN junior college, and currently, I'm in my final year at Xavier Institute of Technology and Science, Bandra.
I believe my strength is my attitude, and I like to take up challenges and think to accept both success and failure in a balanced way to move forward. I want to say that I don't leave any questions altogether as I believe in myself and my work.
My short-term goal is to find a platform to expand my learning  academic and non academics and get good grades in my academics. And my long-term goal is to be complete my engineering, I always challenge myself to improve my progress and steady growth. -->
																		<?php 		} ?>

																	</div>
																	<ul class="list-group list-group-unbordered">
																		<!-- make it as a button with the name of th studnet -->
																		<li class="list-group-item">
																			<b style="color:#ffb64d;">Gender </b>
																			<div class="profile-desc-item pull-right"><?php if (!empty($student->gender)) {
																															echo $student->gender;
																														} else {
																															echo "Nill";
																														} ?></div>
																		</li>

																		<li class="list-group-item">
																			<b style="color:#ffb64d;">Religion </b>
																			<div class="profile-desc-item pull-right"><?php if (!empty($student->religion)) {
																															echo $student->religion;
																														} else {
																															echo "Nill";
																														} ?></div>
																		</li>
																		<li class="list-group-item">
																			<b style="color:#ffb64d;">Category </b>
																			<div class="profile-desc-item pull-right"><?php if (!empty($student->category)) {
																															echo $student->gender;
																														} else {
																															echo "Nill";
																														} ?></div>
																		</li>
																		<?php if (!empty($student->mobile_no)) {
																			$mobile_no = $student->mobile_no;
																		} else {
																			$mobile_no = "Nill";
																		}
																		if (!empty($student->whatsapp_no)) {
																			$whatsapp_no = $student->whatsapp_no;
																		} else {
																			$whatsapp_no = "Nill";
																		}
																		?>
																		<li class="list-group-item">
																			<b style="color:#ffb64d;">Mobile No </b>
																			<div class="profile-desc-item pull-right"><?php if (!empty($student->phone_no)) {
																															echo $student->phone_no;
																														} else {
																															echo "Nill";
																														} ?></div>
																		</li>
																		<!-- if whatsapp no is duplicate to mobile no -->
																		<?php if ($mobile_no != $whatsapp_no) { ?>
																			<li class="list-group-item">
																				<b style="color:#ffb64d;">Whatsapp No </b>
																				<div class="profile-desc-item pull-right"><?php if (!empty($student->whatsapp_no)) {
																																echo $student->whatsapp_no;
																															} else {
																																echo "Nill";
																															} ?></div>
																			</li>
																		<?php } ?>
																		<li class="list-group-item">
																			<b style="color:#ffb64d;">DOB </b>
																			<div class="profile-desc-item pull-right"><?php if (empty($student->dob)) {
																															$dob = "dd/mm/yy";
																															echo $dob;
																														} else {
																															echo $dob = date("d/m/y", strtotime($student->dob));
																															# procedural
																															// echo date_diff(date_create($student->dob), date_create('03/11/2023'))->y;
																														}
																														?></div>
																		</li>

																	</ul>

																</div>
															</div>

														</div>

														<div class="profile-content">
															<div class="row">
																<div class="progress progress-xs">
																	<div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage_filled_column; ?>%">
																		<span class="sr-only"></span>
																	</div>
																</div>
																<div class="card">
																	<!-- <div class="card-topline-aqua">
																			<header></header>
																		</div> -->
																	<div class="white-box">

																		<div class="p-rl-20">
																			<ul class="nav customtab nav-tabs" role="tablist">
																				<li class="nav-item" style="font-size:10px;"><a href="#tab1" class="nav-link active" data-bs-toggle="tab"><strong style="color:black;">Education</strong></a></li>
																				<li class="nav-item"><a href="#tab6" class="nav-link" data-bs-toggle="tab"><strong style="color:black;">Former Education</strong></a></li>
																				<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab"><strong style="color:black;">Parent Details</strong></a></li>
																				<li class="nav-item"><a href="#tab3" class="nav-link" data-bs-toggle="tab"><strong style="color:black;">Address</strong></a></li>
																				<li class="nav-item"><a href="#tab4" class="nav-link" data-bs-toggle="tab"><strong style="color:black;">Bank Details</strong></a></li>
																				<li class="nav-item"><a href="#tab5" class="nav-link" data-bs-toggle="tab"><strong style="color:black;">Documents</strong></a></li>
																			</ul>
																		</div>

																		<div class="tab-content">
																			<div class="tab-pane active fontawesome-demo" id="tab1">
																				<div id="biography">
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong> Class/Course</strong>
																							<br>
																							<p class="text-muted">
																								<?php if (isset($student->course)) {
																									$studentMod = new Students;
																									$get_class_detail = $studentMod->get_class_detail_single($student->course);
																									echo ucwords($get_class_detail->class_name);
																								} else {
																									echo "Nill";
																								}
																								?>


																							</p>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Boards</strong>
																							<br>
																							<p class="text-muted">
																								<?php if (!empty($student->board)) {
																									$studentMod = new Students;
																									$get_board_detail = $studentMod->get_board_detail_single($student->board);
																									echo $get_board_detail->name;
																								} else {
																									echo "Nill";
																								}
																								?>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>City</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->institute_city)) {
																														echo $student->institute_city;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																						<div class="col-md-3 col-6"> <strong>State</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->institute_state)) {
																														echo $student->institute_state;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																					</div>
																					<hr>

																					<div class="row">
																						<div class="col-md-6 col-6 b-r">

																							<strong>Institute Name</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php
																								if (isset($student->academic_name)) {
																									if (($student->academic_name != 0) && ($student->academic_name != Null)) {
																										$academic_type = substr(($student->academic_name), 0, 1);
																										$academic_name = substr($student->academic_name, 1);

																										$get_school_detail  = $studentMod->get_school_detail_single($academic_name);


																										$studentMod = new Students;
																										if ($academic_type == 1) {
																											$get_school_detail  = $studentMod->get_school_detail($academic_name);
																											echo ucwords($get_school_detail->school_name);
																										} elseif ($academic_type == 2) {
																											$get_college_detail  = $studentMod->get_ind_college_detail($academic_name);
																											echo $get_college_detail->college_name;
																										} else {
																											echo "dfdfdf";
																										}
																									} elseif ($student->academic_name == 0) {
																										echo ucwords($student->academic_other_name);
																									} else {
																										echo  "Nill";
																									}
																								} else {
																									echo "Nill";
																								}
																								?>
																								<?php



																								?>

																							</span>
																						</div>
																					</div>
																					<br>
																					<!-- show school and college type -->
																					<!-- <h4 class="font-bold">School or College: <span><?php check($student, $value = 'school') ?></span></h4> -->






																				</div>
																			</div>

																			<div class="tab-pane" id="tab2">
																				<div id="biography">
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong>No of Siblings</strong>
																							<br>
																							<p class="text-muted">
																								<?php if (!empty($student->siblings)) {
																									echo $student->siblings;
																								} else {
																									echo "Nill";
																								} ?>
																							</p>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Familly Annual Income</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->annual_income)) {
																														echo $student->annual_income;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>


																					</div>

																					<h4 class="font-bold">Father / Guardian Details</h4>
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong>Name as per aadhar</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->father_name)) {
																									echo $student->father_name;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Aadhar Number</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->f_aadhar)) {
																									echo $student->f_aadhar;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Mobile No</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->f_phone)) {
																									echo $student->f_phone;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Email Id</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->f_email_id)) {
																									echo $student->f_email_id;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>

																					</div>

																					<br>
																					<h4 class="font-bold">Mother / Guardian Details</h4>
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong>Name as pe aadhar</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->mother_name)) {
																									echo $student->mother_name;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Aadhar Number</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->m_aadhar)) {
																									echo $student->m_aadhar;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Mobile No</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->m_phone)) {
																									echo $student->m_phone;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Email Id</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (!empty($student->m_email_id)) {
																									echo $student->m_email_id;
																								} else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>

																					</div>

																					<br>


																				</div>
																			</div>
																			<div class="tab-pane" id="tab3">
																				<div id="biography">
																					<div class="row">
																						<div class="col-md-12 col-12 b-r"> <strong>Communication Address</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->comm_address)) {
																														echo $student->comm_address;
																													} else {
																														echo "Nill";
																													} ?>&nbsp;<?php if (!empty($student->comm_village)) {
																																	echo $student->comm_village;
																																} else {
																																	echo "Nill";
																																} ?>&nbsp;<?php if (!empty($student->comm_block)) {
																																				echo $student->comm_block;
																																			} else {
																																				echo "Nill";
																																			} ?>&nbsp;<?php if (!empty($student->comm_pin_code)) {
																																							echo $student->comm_pin_code;
																																						} else {
																																							echo "Nill";
																																						} ?></p>
																						</div>
																						<div class="col-md-12 col-12 b-r"> <strong>Permanent Address</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->perm_address)) {
																														echo $student->perm_address;
																													} else {
																														echo "Nill";
																													} ?>&nbsp;<?php if (!empty($student->perm_village)) {
																																	echo $student->perm_village;
																																} else {
																																	echo "Nill";
																																} ?>&nbsp;<?php if (!empty($student->perm_block)) {
																																				echo $student->perm_block;
																																			} else {
																																				echo "Nill";
																																			} ?>&nbsp;<?php if (!empty($student->perm_pin_code)) {
																																							echo $student->perm_pin_code;
																																						} else {
																																							echo "Nill";
																																						} ?></p>
																						</div>

																					</div>

																				</div>
																			</div>
																			<div class="tab-pane" id="tab4">
																				<div id="biography">
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong>Account Number</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->account_no)) {
																														echo $student->account_no;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>IFSC CODE</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->ifsc_code)) {
																														echo $student->ifsc_code;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Bank Name</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->bank_name)) {
																														echo $student->bank_name;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																						<div class="col-md-6 col-6"> <strong>Bank's Branch Name</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->bank_branch)) {
																														echo $student->bank_branch;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																						<div class="col-md-6 col-6"> <strong>Name as per Passbook</strong>
																							<br>
																							<p class="text-muted"><?php if (!empty($student->name_as_per_bank)) {
																														echo $student->name_as_per_bank;
																													} else {
																														echo "Nill";
																													} ?></p>
																						</div>
																					</div>



																				</div>
																			</div>
																			<div class="tab-pane" id="tab5">
																				<div id="biography">
																					<div class="row">
																						<div class="col-md-6 col-6 b-r"> <strong>Proof of Adress</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (isset($student->address_proof)) { ?>
																									<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->address_proof ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																								<?php } else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Proof of Identity</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (isset($student->identity_proof)) { ?>
																									<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->identity_proof ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																								<?php } else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Father Aadhar Card</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (isset($student->father_aadhar_doc)) { ?>
																									<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->father_aadhar_doc ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																								<?php } else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Mother Aadhar Card</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (isset($student->mother_aadhar_doc)) { ?>
																									<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->mother_aadhar_doc ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																								<?php } else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>
																						<div class="col-md-6 col-6 b-r"> <strong>Parent's Bank/Passbook/Statement/Cancelled Cheque</strong>
																						</div>
																						<div class="col-md-6 col-6 b-r">
																							<span class="text-muted">
																								<?php if (isset($student->passbook_statement)) { ?>
																									<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->passbook_statement ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																								<?php } else {
																									echo "Nill";
																								} ?>
																							</span>
																						</div>

																					</div>

																				</div>
																			</div>
																			<div class="tab-pane " id="tab6">
																				<div id="biography">
																					<div class="row">

																						<div class="table-responsive">


																							<table class="table">
																								<thead>
																									<tr>
																										<th scope="col"><strong>Academic name</strong></th>
																										<th scope="col"><strong>Class</strong></th>
																										<th scope="col"><strong>%/cgpa</strong></th>
																										<th scope="col"><strong>Start Date</strong></th>
																										<th scope="col"><strong>End Date</strong></th>
																									</tr>
																								</thead>
																								<tbody>
																									<?php if (
																										isset($student->p_academic_name) && !empty($student->p_academic_name)
																										&& isset($student->p_class) && !empty($student->p_class)
																										&& isset($student->p_cgpa) && !empty($student->p_cgpa)
																										&& isset($student->p_start_date) && !empty($student->p_start_date)
																										&& isset($student->p_end_date) && !empty($student->p_end_date)
																									) { ?>
																										<?php $p_academic_name = explode(',', $student->p_academic_name);
																										$p_class = explode(',', $student->p_class);
																										$p_cgpa = explode(',', $student->p_cgpa);
																										$p_start_date = explode(',', $student->p_start_date);
																										$p_end_date = explode(',', $student->p_end_date);
																										?>
																										<?php $count = 0;
																										foreach ($p_academic_name as $name) {
																											// $studentMod = new Students;
																											$get_class_detail = $studentMod->get_class_detail_single($p_class[$count]);
																										?>
																											<tr>
																												<td>
																													<p class="text-muted" style="font-size: 10px;"><?php echo $p_academic_name[$count] ?></p>
																												</td>
																												<td>
																													<p class="text-muted" style="font-size: 10px;"><?php
																																									$get_class_detail = $studentMod->get_class_detail_single($p_class[$count]);
																																									echo $get_class_detail->class_name;
																																									?></p>
																												</td>
																												<td>
																													<p class="text-muted" style="font-size: 10px;"><?php echo $p_cgpa[$count] ?></p>
																												</td>
																												<td>
																													<p class="text-muted" style="font-size: 10px;"><?php echo $p_start_date[$count] ?></p>
																												</td>
																												<td>
																													<p class="text-muted" style="font-size: 10px;"><?php echo $p_end_date[$count] ?></p>
																												</td>
																											</tr>

																										<?php $count++;
																										} ?>
																									<?php } else { ?>
																										<tr>
																											<td>Nill</td>
																											<td>Nill</td>
																											<td>Nill</td>
																											<td>Nill</td>
																											<td>Nill</td>
																										</tr>

																									<?php } ?>
																								</tbody>
																							</table>

																						</div>
																					</div>



																					<!-- show school and college type -->
																					<!-- <h4 class="font-bold">School or College: <span><?php check($student, $value = 'school') ?></span></h4> -->
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>




											<!-- </div> -->
											<!-- Menu tab end -->
											<!-- <div class='hidden' id="menu2">
												<h1>Basic Information</h1>

											</div> -->
											<div class='hidden' id="menu3">

												<?php
												$studentMod = new Students;
												$get_practice_quiz = $studentMod->get_quiz_for_category(1);
												$get_practice_quiz_count = 0;
												foreach ($get_practice_quiz as $get_practice_quiz) {
													$get_practice_quiz_count++;
												}

												$get_merit_quiz = $studentMod->get_quiz_for_category(2);
												$get_merit_quiz_count = 0;
												foreach ($get_merit_quiz as $get_merit_quiz) {
													$get_merit_quiz_count++;
												}
												$get_speed_quiz = $studentMod->get_quiz_for_category(3);
												$get_speed_quiz_count = 0;
												foreach ($get_speed_quiz as $get_speed_quiz) {
													$get_speed_quiz_count++;
												}
												$get_contest_quiz = $studentMod->get_quiz_for_category(4);
												$get_contest_quiz_count = 0;
												foreach ($get_contest_quiz as $get_contest_quiz) {
													$get_contest_quiz_count++;
												}
												$get_practice_pass_quiz = $studentMod->get_quiz_result_count_of_student(1, 1, $current_student_id);
												$get_practice_pass_count = 0;
												$get_total_practice_quiz_score = 0;
												foreach ($get_practice_pass_quiz as $get_practice_pass) {
													$get_practice_pass_count++;
													$get_total_practice_quiz_score += $get_practice_pass->coins_earned;
												}
												$get_merit_pass_quiz = $studentMod->get_quiz_result_count_of_student(2, 1, $current_student_id);
												$get_merit_pass_count = 0;
												foreach ($get_merit_pass_quiz as $get_merit_pass) {
													$get_merit_pass_count++;
												}
												$get_speed_pass_quiz = $studentMod->get_quiz_result_count_of_student(3, 1, $current_student_id);
												$get_speed_pass_count = 0;
												$get_total_speed_quiz_score = 0;
												foreach ($get_speed_pass_quiz as $get_speed_pass) {
													$get_speed_pass_count++;
													$get_total_speed_quiz_score += $get_speed_pass->coins_earned;
												}
												$get_contest_pass_quiz = $studentMod->get_quiz_result_count_of_student(4, 1, $current_student_id);
												$get_contest_pass_count = 0;
												foreach ($get_contest_pass_quiz as $get_contest_pass) {
													$get_contest_pass_count++;
												}
												$get_practice_fail_quiz = $studentMod->get_quiz_result_count_of_student(1, 0, $current_student_id);
												$get_practice_fail_count = 0;
												foreach ($get_practice_fail_quiz as $get_practice_fail) {
													$get_practice_fail_count++;
												}
												$get_merit_fail_quiz = $studentMod->get_quiz_result_count_of_student(2, 0, $current_student_id);
												$get_merit_fail_count = 0;
												foreach ($get_merit_fail_quiz as $get_merit_fail) {
													$get_merit_fail_count++;
												}
												$get_speed_fail_quiz = $studentMod->get_quiz_result_count_of_student(3, 0, $current_student_id);
												$get_speed_fail_count = 0;

												foreach ($get_speed_fail_quiz as $get_speed_fail) {
													$get_speed_fail_count++;
												}
												$get_contest_fail_quiz = $studentMod->get_quiz_result_count_of_student(4, 0, $current_student_id);
												$get_contest_fail_count = 0;
												foreach ($get_contest_fail_quiz as $get_contest_fail) {
													$get_contest_fail_count++;
												}
												$total_practice_match_played = $get_practice_pass_count + $get_practice_fail_count;
												if ($total_practice_match_played == 0) {
													$practice_pass_per = 0;
													$practice_fail_per = 0;
												} else {
													$practice_pass_per = ($get_practice_pass_count / $total_practice_match_played) * 100;
													$practice_fail_per = ($get_practice_fail_count / $total_practice_match_played) * 100;
												}
												$total_speed_match_played = $get_speed_pass_count + $get_speed_fail_count;
												if ($total_speed_match_played == 0) {
													$speed_pass_per = 0;
													$speed_fail_per = 0;
												} else {
													$speed_pass_per = ($get_speed_pass_count / $total_speed_match_played) * 100;
													$speed_fail_per = ($get_speed_fail_count / $total_speed_match_played) * 100;
												}





												?>
												<!-- <h1>Quizzes</h1> -->

												<!-- <div class="page-content"> -->

												<div class="row">
													<div class="col-sm-12">
														<div class="card-box">

															<div class="card-body  row">

																<div class="col-sm-1 col-lg-1 col-md-2" style="margin: left 10px;">
																	<!-- Basic Chip -->
																	<span class="mdl-chip">
																		<a href="<?php echo URLROOT ?>/student/quiz_result"> <span class="mdl-chip__text">Score</span></a>
																	</span>
																</div>
																<!-- <div class="col-lg-4">
									
										
									</div> -->
																<div class="col-sm-1 col-lg-1 col-md-2" style="margin: left 10px;">
																	<!-- Button Chip -->
																	<span class="mdl-chip">
																		<a href="<?php echo URLROOT ?>/student/ranking"> <span class="mdl-chip__text">Rank</span></a>

																	</span>
																</div>
																<!-- &nbsp;
																&nbsp;
																&nbsp; -->
																<div class="col-sm-1 col-lg-1 col-md-2" style="margin: left 10px;">
																	<!-- Button Chip -->
																	<span class="mdl-chip">
																		<a href="<?php echo URLROOT ?>/student/my_quizes"> <span class="mdl-chip__text">My Quizes</span></a>

																	</span>
																</div>



															</div>

														</div>
													</div>

												</div>


												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>

																					<th>Played</th>
																					<th>Won</th>
																					<th>Winning</th>
																					<th>Action</th>

																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;">Contest </td>
																					<td> <?php echo $get_contest_pass_count + $get_contest_fail_count; ?> </td>
																					<td><?php echo $get_contest_pass_count; ?> </td>
																					<td> <?php echo $get_contest_fail_count; ?> </td>
																					<td style="width:20%;"><a href="<?php echo URLROOT ?>/student/all_quiz/1/4/0">
																							<button type="button" class="btn btn-circle " style="background-color: #2196f3;color:#ffffff;"> <i class="fa fa-certificate"></i>PLAY NOW</button>
																							<!-- WIN MORE -->
																						</a> </td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																<!-- </div> -->
															</div>

														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">

																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category </th>
																					<th>Played</th>
																					<th>Pass</th>
																					<th>Fail</th>
																					<th>Points Earned</th>
																					<th>Coins Earned</th>
																					<th>Action</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;"> Practice </td>
																					<td> <?php echo $total_practice_match_played; ?> </td>

																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $practice_pass_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $practice_pass_per ?>" role="progressbar" class="progress-bar progress-bar-success"></div>
																						</div>
																					</td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $practice_fail_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $practice_fail_per ?>" role="progressbar" class="progress-bar progress-bar-warning"></div>
																						</div>
																					</td>
																					<td> <?php echo $get_total_practice_quiz_score; ?> </td>
																					<td> <?php echo round((($get_total_practice_quiz_score * 5) / 100), 0) ?> </td>
																					<td style="width:20%;"><a href="<?php echo URLROOT ?>/student/all_quiz/1/1/0">
																							<button type="button" class="btn btn-circle" style="background-color:#a979d1;color:#ffffff;"> <i class="fa fa-certificate"></i>PLAY NOW</button>
																							<!-- LEARN MORE -->
																						</a> </td>
																				</tr>

																			</tbody>
																		</table>
																		<!-- </div> -->
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>


												<!-- <div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>

																					<th>Played</th>
																					<th>Pass</th>
																					<th>Fail</th>
																					<th>Points Earned</th>
																					<th>Coins Earned</th>

																					<th>Action</th>

																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;">Rapid Fire</td>
																					<td> <?php echo $get_speed_pass_count + $get_speed_fail_count; ?> </td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $speed_pass_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $speed_pass_per ?>" role="progressbar" class="progress-bar progress-bar-success"></div>
																						</div>
																					</td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $speed_fail_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $speed_fail_per ?>" role="progressbar" class="progress-bar progress-bar-warning"></div>
																						</div>
																					</td>
																					<td> <?php echo round($get_total_speed_quiz_score, 0); ?> </td>
																					<td> <?php echo round((($get_total_speed_quiz_score * 5) / 100), 0) ?> </td>
																					<td style="width:20%;"><a href="<?php echo URLROOT ?>/student/all_quiz/1/3/0">
																							<button type="button" class="btn btn-circle " style="background-color:#e91e63;color:#ffffff;"> <i class="fa fa-bolt"></i>PLAY NOW</button>
																							
																						</a> </td>
																					
																				</tr>

																			</tbody>
																		</table>
																	</div>
																</div>
																
															</div>

														</div>
													</div>
												</div> -->
												<!-- <div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
															

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>
																					<th>Played</th>
																					<th>Won</th>
																					<th>Awarded</th>
																					<th>Action</th>


																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;"> Merit </td>
																					<td> <?php echo $get_merit_pass_count + $get_merit_fail_count; ?> </td>
																					<td><?php echo $get_merit_pass_count; ?> </td>
																					<td> <?php echo $get_merit_fail_count; ?> </td>
																					<td style="width:20%;"><a href="<?php echo URLROOT ?>/student/all_quiz/1/2/0">
																							<button type="button" class="btn btn-circle" style="background-color:#e67d21;color:#ffffff;"> <i class="fa fa-rupee"></i>PLAY NOW</button>
																						
																						</a> </td>
																					
																				</tr>

																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>

													
													</div>
												</div> -->


											</div>
											<div class='hidden' id="menu4">
												<div class="row">
													<div class="col-lg-8 col-md-8  col-sm-12">
														<!-- <div class="blogThumb"> -->
														<div class="card tab2-card">

															<div class="row">
																<div class="col-lg-4 col-md-4  col-sm-4">

																	<div class="thumb-center">
																		<button type="button" class="btn btn-circle btn-default" style="margin-top:40px;">Matched Scholarship</button>
																	</div>


																</div>
																<div class="col-lg-8 col-md-8 col-8 col-sm-8">

																	<div class="thumb-center"></div>
																	<div class="course-box">
																		<div class="row">
																			<div class="col-lg-6">
																				<h4 style="font-weight:bold;">Scholarship Name</h4>
																			</div>

																		</div>
																		<div class="text-muted"><span class="m-r-10">
																				<ul>
																					<?php foreach ($data['get_classwise_scholarships'] as $scholarship) { ?>
																						<li class="scholarship-name" data-id="<?php echo $scholarship->id; ?>"><?php echo $scholarship->name; ?></li>
																					<?php } ?>

																					<!-- <u>Read More</u> -->
																				</ul>
																			</span>
																		</div>
																	</div>

																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4 col-md-4  col-sm-12">
														<!-- <div class="blogThumb"> -->
														<div class="card tab2-card">

															<div class="row">

																<div class="col-lg-8 col-md-8 col-8 col-sm-8">
																	<div class="course-box">
																		<div class="row">
																			<div class="col-lg-12">
																				<h4 style="font-weight:bold;">More Scholarship</h4>
																				<a href="<?php echo URLROOT; ?>/home/scholarships">
																					<p><u>Visit Website</u></p>
																				</a>
																			</div>

																		</div>

																	</div>

																</div>
															</div>
														</div>
													</div>
													<div id="scholarship-details"></div>



													<!-- Infographic card template, the same code is sent in controller and called from ajax -->
													<!-- <div class="col-lg-12 col-md-12 col-12 col-sm-12">
							
							<div class="card tab2-card">
								<div class="card-header" style="background-color:orange;">
									<h5><?php echo $scholarship->name; ?></h5>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4  col-sm-4">

										<div class="thumb-center">
										<a href="<?php echo URLROOT; ?>/student/all_scholarships">	<button type="button" class="btn btn-circle btn-default" style="margin-top:40px;">View Details</button></a>
											<br>
											<a href="<?php echo URLROOT; ?>/student/all_scholarships">	<button type="button" class="btn btn-circle btn-success" style="margin-top:20px;">Apply Now</button></a>
										</div>


									</div>
									<div class="col-lg-8 col-md-8 col-8 col-sm-8">

										<div class="thumb-center"></div>
										<div class="course-box">
											<div class="row">
												<div class="col-lg-6">
													<h4 style="font-weight:bold;">Eligibility</h4>
												</div>
												<div class="col-lg-6">
													<p style="color:blue;font-size:16px;text-decoration: underline;margin-top:15px;"><i class="material-icons f-left" style="font-size: 16px;">today</i>Deadline: <?php echo $scholarship->end_date; ?></p>
												</div>
											</div>
											<div class="text-muted"><span class="m-r-10">
											<?php echo $scholarship->name; ?>
												
												</span>

											</div>

											<p><span><i class="fa fa-graduation-cap"></i> Benefits: <?php echo $scholarship->course; ?>.</span></p>
										
										</div>

									</div>
								</div>
							</div>
						</div> -->

													<!-- <div class="col-xl-12">
														<div class="w-100">
															<div class="row">
																<div class="col-sm-12 col-md-12" style="padding:20px 0 20px;">
																	<div class="card bg-b-green">
																		<div class="card-body" style="height:250px;">
																			<div class="row">
																				<div class="col mt-0">
																					<br>
																					<p class="info-box-title" style="font-size:60px;vertical-align:center;text-align:center;">COMING <br><br>SOON...</p>
																				</div>

																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div> -->
												</div>

											</div>
											<!-- Wallet tab start -->
											<div class='hidden' id="menu5">

												<style>
													/*  bhoechie tab */
													div.bhoechie-tab-container {
														z-index: 10;
														background-color: #ffffff;
														padding: 0 !important;
														border-radius: 4px;
														-moz-border-radius: 4px;
														border: 1px solid #ddd;
														margin-top: 20px;
														margin-left: 50px;
														-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
														box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
														-moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
														background-clip: padding-box;
														opacity: 0.97;
														filter: alpha(opacity=97);
													}

													div.bhoechie-tab-menu {
														padding-right: 0;
														padding-left: 0;
														padding-bottom: 0;
													}

													div.bhoechie-tab-menu div.list-group {
														margin-bottom: 0;
													}

													div.bhoechie-tab-menu div.list-group>a {
														margin-bottom: 0;
													}

													div.bhoechie-tab-menu div.list-group>a .glyphicon,
													div.bhoechie-tab-menu div.list-group>a .fa {
														color: #5A55A3;
													}

													div.bhoechie-tab-menu div.list-group>a:first-child {
														border-top-right-radius: 0;
														-moz-border-top-right-radius: 0;
													}

													div.bhoechie-tab-menu div.list-group>a:last-child {
														border-bottom-right-radius: 0;
														-moz-border-bottom-right-radius: 0;
													}

													div.bhoechie-tab-menu div.list-group>a.active,
													div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
													div.bhoechie-tab-menu div.list-group>a.active .fa {
														background-color: #5A55A3;
														background-image: #5A55A3;
														color: #ffffff;
													}

													div.bhoechie-tab-menu div.list-group>a.active:after {
														content: '';
														position: absolute;
														left: 100%;
														top: 50%;
														margin-top: -13px;
														border-left: 0;
														border-bottom: 13px solid transparent;
														border-top: 13px solid transparent;
														border-left: 10px solid #5A55A3;
													}

													div.bhoechie-tab-content {
														background-color: #ffffff;
														/* border: 1px solid #eeeeee; */
														padding-left: 20px;
														padding-top: 10px;
													}

													div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
														display: none;
													}
												</style>
												<style>
													.glow {
														font-size: 90px;
														color: #1158AC;
														text-align: center;
														font-weight: 100px;
														-webkit-animation: glow 1s ease-in-out infinite alternate;
														-moz-animation: glow 1s ease-in-out infinite alternate;
														animation: glow 1s ease-in-out infinite alternate;
													}

													@keyframes glow {
														from {
															text-shadow: 0 0 10px #eeeeee, 0 0 20px #1AC4FA, 0 0 30px #1AC4FA, 0 0 40px #1AC4FA,
																0 0 50px #9554b3, 0 0 60px #9554b3, 0 0 70px #9554b3;
														}

														to {
															text-shadow: 0 0 20px #eeeeee, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6,
																0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
														}
													}
												</style>
												<?php $get_wallet_detail = $data['get_wallet_detail']; ?>
												<div class="container">
													<div class="row">
														<div class="row col-lg-11 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
															<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
																<div class="list-group">
																	<a href="#" class="list-group-item active text-center">
																		<i class="fa-solid fa-indian-rupee-sign"></i><br />Wallet
																	</a>
																	<a href="#" class="list-group-item text-center">
																		<i class="fa-solid fa-bolt"></i><br />Recharge
																	</a>
																	<a href="#" class="list-group-item text-center">
																		<i class="fa-solid fa-magnifying-glass-dollar"></i><br />Transactions
																	</a>
																	<a href="#" class="list-group-item text-center">
																		<i class="material-icons f-left">person_add</i><br />Referrals
																	</a>
																	<a href="#" class="list-group-item text-center">
																		<i class="fa-sharp fa-solid fa-circle-info"></i><br />Info
																	</a>
																</div>
															</div>
															<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
																<!-- flight section -->
																<div class="bhoechie-tab-content active">
																	<div class="state-overview"><br>
																		<div class="row">
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-blue">
																					<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
																					<div class="info-box-content">
																						<span class="info-box-text">Balance</span>
																						<?php $balance = $get_wallet_detail->balance_amount; ?>
																						<span class="info-box-number"><?php echo $balance; ?></span>

																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-blue">
																					<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
																					<div class="info-box-content">
																						<span class="info-box-text">Awarded</span>
																						<span class="info-box-number">
																							<?php
																							// $total_awarded_amount = 0;
																							// foreach($data['get_awarded_transaction'] as $awarded_transaction){
																							// 	$total_awarded_amount+= $awarded_transaction->amount;
																							// }
																							// echo $total_awarded_amount;
																							echo $total_awarded_amount = $get_wallet_detail->awarded_amount; ?>

																						</span>

																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-orange">
																					<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
																					<div class="info-box-content">
																						<span class="info-box-text">Withdrawal Amount</span>
																						<span class="info-box-number" style="">

																							<?php if ($practice_pass_per == 100) {
																								echo $total_awarded_amount + $balance;
																							} else {
																								echo "Complete KYC";
																							}
																							?>
																						</span>

																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-orange">
																					<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
																					<div class="info-box-content">
																						<!-- <span class="info-box-text">Spent</span> -->
																						<span class="info-box-text">Points Earned</span>
																						<span class="info-box-number">
																							<?php
																							// $total_spent_amount = 0;
																							// foreach($data['get_spent_transaction'] as $spent_transaction){
																							// 	$total_spent_amount+= $spent_transaction->amount;
																							// }
																							// echo $total_spent_amount;
																							echo $get_wallet_detail->point;
																							?>
																						</span>
																						&ensp;
																						<!-- <form action="<?php echo URLROOT ?>/student/redeem_coins_earned" method="POST" style="display:inline-block;">
											<?php if (($get_wallet_detail->point) > 1000) { ?>
												<span>
											<button type="submit" class="form-control sucess">Redeem</button>
											</span>
											<?php } ?>
											</form> -->
																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-success">
																					<span class="info-box-icon push-bottom"><i class="fa fa-coins"></i></span>
																					<div class="info-box-content">
																						<!-- <span class="info-box-text">Spent</span> -->
																						<span class="info-box-text">Coins Earned</span>
																						<span class="info-box-number">
																							<?php
																							// $total_spent_amount = 0;
																							// foreach($data['get_spent_transaction'] as $spent_transaction){
																							// 	$total_spent_amount+= $spent_transaction->amount;
																							// }
																							// echo $total_spent_amount;
																							echo $get_wallet_detail->coins;
																							?>
																						</span>
																						&ensp;
																						<form action="<?php echo URLROOT ?>/student/redeem_coins_earned" method="POST" style="display:inline-block;">
																							<?php if (($get_wallet_detail->coins) > 1000) { ?>
																								<span>
																									<button type="submit" class="form-control sucess">Redeem</button>
																								</span>
																							<?php } ?>
																						</form>
																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																			<div class="col-xl-6 col-md-12 col-12">
																				<div class="info-box bg-success">
																					<span class="info-box-icon push-bottom"><i class="fa fa-coins"></i></span>
																					<div class="info-box-content">
																						<!-- <span class="info-box-text"> Recharged</span> -->
																						<span class="info-box-text"> Bonus Coins</span>
																						<span class="info-box-number">
																							<?php
																							echo $get_wallet_detail->bonus_coins;
																							?>
																						</span>

																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																			<div class="col-xl-12 col-md-12 col-12">
																				<div class="info-box bg-purple">
																					<span class="info-box-icon push-bottom"><i class="fa fa-inr"></i></span>
																					<div class="info-box-content">
																						<!-- <span class="info-box-text"> Recharged</span> -->
																						<span class="info-box-text"> Transferred to Bank A/c</span>
																						<span class="info-box-number">
																							<?php
																							echo "0";
																							?>
																						</span>

																					</div>
																					<!-- /.info-box-content -->
																				</div>
																				<!-- /.info-box -->
																			</div>
																			<!-- /.col -->
																		</div>
																	</div>
																</div>
																<!-- train section -->
																<div class="bhoechie-tab-content">
																	<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																		<div class="white-box border-gray">
																			<div class="user-bg">
																				<div class="overlay-box">
																					<form method="post" action="<?php echo URLROOT; ?>/student/pay" enctype="multipart/form-data" autocomplete="OFF">
																						<div class="user-content">
																							<a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo URLROOT; ?>/assets/images/payments/coin.webp"></a>
																							<div class="input-group input-group-sm">
																								<br><br><br><br><br>
																								<input style="margin-top:80px" type="number" class="form-control" name="amount" placeholder="Enter Amount">
																								<span style="margin-top:80px" class="input-group-btn">
																									<button type="submit" class="btn btn-success btn-flat">Go!</button>
																								</span>
																							</div>
																						</div>
																					</form>
																				</div>
																			</div>

																		</div>
																	</div>

																</div>

																<!-- hotel search -->
																<div class="bhoechie-tab-content">
																	<div>
																		<div>
																			<div>
																				<div class="card-head">
																					<header>Transactions</header>

																				</div>
																				<div class="card-body ">
																					<div class="table-wrap ">
																						<div class="table-responsive scrollable">
																							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
																								<thead>
																									<tr>
																										<th>Id</th>
																										<th>Type</th>
																										<th>Balance</th>
																										<th>Awarded Amount</th>
																										<th>Points</th>
																										<th>Coins</th>
																										<th>Date</th>
																										<th>Time</th>
																										<th>Status</th>
																									</tr>
																								</thead>
																								<tbody>
																									<?php foreach ($data['get_transaction'] as $transaction) {

																									?>
																										<tr>
																											<td><?php echo $transaction->id ?></td>
																											<td>
																												<?php if ($transaction->type == 1) {
																													echo "Credited By Recharge";
																												} elseif ($transaction->type == 2) {
																													echo "Credited By Admin";
																												} elseif ($transaction->type == 3) {
																													echo "Credited By Referral";
																												} elseif ($transaction->type == 4) {
																													echo "Credited By Quiz";
																												} elseif ($transaction->type == 5) {
																													echo "Debited By Quiz";
																												} elseif ($transaction->type == 6) {
																													echo "Credited By Admin";
																												} elseif ($transaction->type == 7) {
																													echo "Debited In Quiz By School";
																												} elseif ($transaction->type == 8) {
																													echo "Credited on Bonus Coins on First Recharge";
																												} elseif ($transaction->type == 9) {
																													echo "Credited By Redeeming Coins";
																												} elseif ($transaction->type == 10) {
																													echo "Points Credited By Quiz";
																												} elseif ($transaction->type == 11) {
																													echo "Awarded amount Credited on Redeeminc Coins";
																												} elseif ($transaction->type == 12) {
																													echo "Points Debited on Redeeming";
																												} elseif ($transaction->type == 13) {
																													echo "Bonus Coins Credited On Referring";
																												} elseif ($transaction->type == 14) {
																													echo "Bonus Coins Credited on Using Referral Code";
																												} elseif ($transaction->type == 15) {
																													echo $transaction->transaction_id;
																												} elseif ($transaction->type == 16) { ?>
																													<a href="<?php echo URLROOT; ?>/student/contest_winning_amount_transactions"><?php echo $transaction->transaction_id; ?></a>

																												<?php 		} elseif ($transaction->type == 17) {
																													echo $transaction->transaction_id;
																												} elseif ($transaction->type == 18) {
																													echo  $transaction->transaction_id;
																												} elseif ($transaction->type == 19) {
																													echo  $transaction->transaction_id;
																												} else {
																													echo  $transaction->transaction_id;
																												}

																												?>

																											</td>
																											<td><?php echo $transaction->amount ?></td>
																											<td><?php echo $transaction->awarded_amount ?></td>
																											<td><?php echo $transaction->point ?></td>
																											<td><?php echo $transaction->coins ?></td>
																											<!-- <td><?php echo $transaction->datetime ?></td> -->
																											<td>
																												<?php
																												$timestamp = $transaction->datetime;
																												$datetime = explode(" ", $timestamp);
																												$date = $datetime[0];
																												echo $newDate = date("d-m-Y", strtotime($date));
																												?>
																											</td>
																											<td><?php echo $time = $datetime[1]; ?></td>
																											<td>
																												<span class="label label-sm label-success">Success</span>
																											</td>

																										</tr>
																									<?php } ?>
																									<!-- <tr>
														<td>1</td>
															<td>xxxx</td>
															<td>xxxx</td>
															<td>xxxx</td>
															<td>
																<span class="label label-sm label-warning">Failed </span>
															</td>
															
														</tr> -->

																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="bhoechie-tab-content">
																	<div>
																		<div>
																			<div class="card-head">
																				<header></header>


																			</div>
																			<div class="card-body ">
																				<div class="row">
																					<div class="col-xl-12 col-md-12 col-12">
																						<!-- <div class="info-box bg-success">
																							<span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
																							<div class="info-box-content">
																								<span class="info-box-text"> Referral ID</span>
																								<span class="info-box-number" style="font-size:60px;">
																									<?php echo strtoupper(substr($_SESSION['rexkod_oodles_student_name'], 0, 3)) ?><?php echo $_SESSION['rexkod_oodles_student_id'] ?>
																								</span>

																							</div>
																							
																						</div> -->
																						<div class="info-box bg-success">
																							<span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
																							<div class="info-box-content">
																								<span class="info-box-text">Referral ID</span>
																								<span class="info-box-number">
																									<?php echo strtoupper(substr($_SESSION['rexkod_oodles_student_name'], 0, 3)) ?><?php echo $_SESSION['rexkod_oodles_student_id'] ?>
																								</span>

																							</div>
																							<!-- /.info-box-content -->
																						</div>

																						<form action="<?php echo URLROOT ?>/student/redeem_referral_code/wallet" method="POST">
																							<div class="info-box bg-danger" style="background-image: url('<?php echo URLROOT ?>/assets/img/pages/referral.jpg');height:250px;">
																								<span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
																								<?php if (($data['get_auth_detail']->referred_by) == 0) { ?>
																									<div class="info-box-content">
																										<span class="info-box-text"> Referral ID</span>
																										<span class="info-box-number" style="font-size:60px;opacity:0.7">
																											<input class="form-control" type="text" name="referral_code">
																										</span>
																										<button type="submit" class="btn btn-round btn-primary" id="add-event">Verify</button>
																									</div>
																								<?php } else { ?>
																									<h3 class="glow"> You have already redemmed the referral code once! <br /> Refer your friends to earn free coins</h4>
																									<?php  } ?>
																							</div>
																						</form>
																						<!-- /.info-box -->
																					</div>
																					<!-- <ul class="docListWindow" style="height:300px">
												<li>
													<div class="prog-avatar">
														<img src="../assets/img/user/user1.jpg" alt="" width="40"
															height="40">
													</div>
													<div class="details">
														<div class="title">
															<a href="#">Name</a> School
														</div>
														<div>
															<span class="clsAvailable">Success</span>
														</div>
													</div>
												</li>
												<li>
													<div class="prog-avatar">
														<img src="../assets/img/user/user2.jpg" alt="" width="40"
															height="40">
													</div>
													<div class="details">
														<div class="title">
															<a href="#">Name</a> School
														</div>
														<div>
															<span class="clsAvailable">Success</span>
														</div>
													</div>
												</li>
											
												<li>
													<div class="prog-avatar">
														<img src="../assets/img/user/user4.jpg" alt="" width="40"
															height="40">
													</div>
													<div class="details">
														<div class="title">
															<a href="#">Name</a> School
														</div>
														<div>
															<span class="clsOnLeave">Failed</span>
														</div>
													</div>
												</li>
											</ul> -->

																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="bhoechie-tab-content">
																	<div>
																		<div>
																			<div class="card-head">
																				<header>Documents</header>
																			</div>
																			<div class="card-body no-padding height-9">
																				<div class="row">
																					<div class="noti-information notification-menu">
																						<div class="notification-list mail-list not-list small-slimscroll-style">
																							<a href="javascript:;" class="single-mail"> <span class="icon bg-primary"> <i class="fa fa-box"></i>
																								</span> <span class="text-purple">Document Name</span> Document Type

																							</a>

																						</div>

																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<h6>MARKET PLACE PRODUCTS</h6>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div id="owl-demo2" class="owl-carousel">
															<?php foreach ($data['get_active_market_place'] as $market_place) { ?>

																<div class="carousel-text">
																	<div class="card" style="margin-left:10pxpx;">
																		<div class="card-body text-center">
																			<div class="item"><img src="<?php echo URLROOT; ?>/uploads/<?php echo  $market_place->image; ?>" alt="" style="width:100%;height:200px;"></div>
																			<h5 class="card-title"><?php echo  $market_place->name; ?></h5>
																			<h6 class="card-subtitle mb-0 text-muted">Offer Price: <?php echo  $market_place->offer_price; ?> coins</h6>
																			<p class="card-text">Price: <s><?php echo  $market_place->price; ?> coins</s></p>
																			<p class="card-text"><?php echo  $market_place->description; ?></p>

																			<?php $check_purchased_market_place_orders = $studentMod->check_purchased_market_place_orders($market_place->id);
																			$check_comm_flag = 0;
																			if ($data['student_detail'] != null) {
																				if ($data['student_detail']->comm_address != null) {
																					$check_comm_flag = 1;
																				}
																			}
																			if ($check_comm_flag == 0) { ?>
																				<?php if ($data['student_detail'] == null) { ?>
																					<a href="<?php echo URLROOT; ?>/student/add_profile"><button class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;font-size:9px;">Complete Profile Details to Claim extensive products.</button></a>
																				<?php } else {  ?>
																					<a href="<?php echo URLROOT; ?>/student/update_profile"><button class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%; font-size:9px;">Complete Profile Details to Claim extensive products.</button>
																					<?php }	 ?></a>
																					<?php } elseif ($check_purchased_market_place_orders == null) {
																					if ($market_place->quantity > 0) {
																					?>

																						<a onclick='buy_product(<?php echo $market_place->id; ?>)' class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Claim Now</a>
																					<?php } else { ?>
																						<button class="btn btn-warning btn-outline btn-circle m-b-10" style="width:100%;">Out of Stock</button>
																					<?php } ?>
																				<?php } else { ?>
																					<button class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Status: <?php if ($check_purchased_market_place_orders->status == 0) {
																																													echo "Order Placed";
																																												} elseif ($check_purchased_market_place_orders->status == 1) {
																																													echo "In Trnasit";
																																												} elseif ($check_purchased_market_place_orders->status == 2) {
																																													echo "Delivered";
																																												} elseif ($check_purchased_market_place_orders->status == 3) {
																																													echo "Rejected";
																																												}; ?> </button>
																				<?php } ?>
																		</div>
																	</div>
																</div>
																<!-- &nbsp; -->
															<?php } ?>

														</div>
													</div>
												</div>
												<div class="row">
													<ul>
														<li># The student communication address should be filled, else it show to complete the profile details.</li>
														<li># The Claim Now will give the popup of debit coins, if the user has low coins, it will give the popup of Low Balance.</li>
														<li># On purchase the quantity will be reduced by one.</li>
														<li># Zero quantity will show out of stock</li>
														<li># The student cant buy the product if the product is already ordered before.</li>
														<li># If the product is ordered, they can check there product status in the place of button.</li>
														<li># If the admin changes the status to reject, the user will gets the coins back and admin cant change the status again. And the quantity will regain 1 qty back.</li>
														<li># All the process are shown in notification. So the student has better clarity of the purchase.</li>
														<!-- <li># Synchronization error checked.</li> -->
														<li>#Transactions added for the same.</li>
													</ul>
												</div>
											</div>
											<!-- Wallet Tab End -->
											<!-- subscription tab started -->
											<div class='hidden' id="menu6">

												<!-- <div class="page-title-breadcrumb">
													<div class=" pull-left">
														<div class="page-title"></div>
													</div>
													<ol class="breadcrumb page-breadcrumb pull-right">
														<li>Balance Amount: Rs50
														</li>


													</ol>
												</div>
												<br> -->
												<div class="row">
													<?php foreach ($data['get_all_subscription_plan'] as $subscription) { ?>
														<div class="col-lg-3 col-md-6 col-12 col-sm-6">
															<div class="blogThumb">
																<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $subscription->image; ?>" style="height:200px;width:100%;"></div>
																<div class="white-box text-center" style="padding:0px;margin:10px 0 10px;font-size:10px;">
																	<h6 class="m-t-10 m-b-10 fw-bold"><?php echo strtoupper($subscription->name); ?></h6>
																	<div class="text-muted">
																		<a class="text-muted m-l-10" href="#">
																			<i class="fa fa-inr"></i>
																			<del><?php echo $subscription->price; ?></del>&nbsp;&nbsp;
																			<span style="font-size:15px;">
																				<i class="fa fa-inr"></i>
																				<?php echo $subscription->offer_price; ?>
																			</span>
																		</a>
																	</div>

																	<p><?php echo $subscription->content; ?> </p>
																	<?php if ($subscription->status == 1) { ?>
																		<!-- <a href="<?php echo URLROOT ?>/student/pay1/<?php echo $subscription->offer_price; ?>"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><?php echo $subscription->btn_on_enable; ?>
																			</button></a> -->
																		<a href="<?php echo URLROOT ?>/student/subscription_pay/<?php echo $subscription->offer_price; ?>/<?php echo $subscription->package_id; ?>"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><?php echo $subscription->btn_on_enable; ?>
																			</button></a>
																	<?php } else { ?>
																		<button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><?php echo $subscription->btn_on_disable; ?>
																		</button>
																	<?php } ?>
																</div>
															</div>
														</div>
													<?php } ?>
												</div>


											</div>


											<!-- subscription tab end -->
											<div class='hidden' id="menu7">
												<h1>Tests</h1>
												<a href="https://learn.oodlesin.com/" class="btn btn-circle btn-success mb-2">
																						<span class="over_click">Go to Test</span></a>

																						<div class="row">
													<?php foreach ($data['get_all_subscription_plan'] as $subscription) { ?>
														<div class="col-lg-3 col-md-6 col-12 col-sm-6">
															<div class="blogThumb">
																<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $subscription->image; ?>" style="height:200px;width:100%;"></div>
																<div class="white-box text-center" style="padding:0px;margin:10px 0 10px;font-size:10px;">
																	<h6 class="m-t-10 m-b-10 fw-bold"><?php echo strtoupper($subscription->name); ?></h6>
																	<div class="text-muted">
																		<a class="text-muted m-l-10" href="#">
																			<i class="fa fa-inr"></i>
																			<del><?php echo $subscription->price; ?></del>&nbsp;&nbsp;
																			<span style="font-size:15px;">
																				<i class="fa fa-inr"></i>
																				<?php echo $subscription->offer_price; ?>
																			</span>
																		</a>
																	</div>

																	<p><?php echo $subscription->content; ?> </p>
																	<?php if ($subscription->status == 1) { ?>
																		<a href="#"><button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><?php echo $subscription->btn_on_enable; ?>
																			</button></a>
																	<?php } else { ?>
																		<button class="btn btn-success btn-rounded waves-effect waves-light m-t-20"><?php echo $subscription->btn_on_disable; ?>
																		</button>
																	<?php } ?>
																</div>
															</div>
														</div>
													<?php } ?>
												</div>
											</div>
											<div class='hidden' id="menu9">
												<h1>Career Assesments Test</h1>
												<a href="https://www.careertest.oodlesin.com/general/careerTest" class="btn btn-circle btn-success ">
																						<span class="over_click">Assesments</span></a>
											</div>
											<div class='visible' id="menu8">
												<div class="row">
													<div class="col-xl-12">
														<div class="w-100">
															<div class="row">
																<div class="col-sm-4">
																	<div class="card bg-b-green">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title ">All India Rank</h4>
																				</div>
																				<div class="col-auto">
																					<div class="l-bg-green info-icon">
																						<i class="fa fa-users pull-left col-orange font-30"></i>
																					</div>
																				</div>
																			</div>
																			<?php
																			$count1 = 0;
																			foreach ($data['quiz_ranking_country_wise'] as $ranking) {

																				$count1++;
																				if ($ranking->user_id == $_SESSION['rexkod_oodles_student_id']) {
																					$rank1 = $count1;
																				}
																			}
																			?>
																			<h1 class="mt-1 mb-3 info-box-title"><?php if (isset($rank1)) {
																														echo $rank1;
																													} else {
																														echo "0";
																													}

																													?></h1>
																			<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														10.32%
													</span>
													<span class="text-muted">Since last week</span>
												</div> -->
																		</div>
																	</div>

																</div>
																<div class="col-sm-4">
																	<div class="card bg-b-blue">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title">State Wise Rank</h4>
																				</div>
																				<div class="col-auto">
																					<div class="col-teal info-icon">
																						<i class="fa fa-user pull-left card-icon font-30"></i>
																					</div>
																				</div>
																			</div>
																			<?php
																			$count2 = 0;
																			foreach ($data['quiz_ranking_state_wise'] as $ranking2) {
																				$count2++;
																				if ($ranking2->user_id == $_SESSION['rexkod_oodles_student_id']) {
																					$rank2 = $count2;
																				}
																			}
																			?>
																			<h1 class="mt-1 mb-3 info-box-title"><?php if (isset($rank2)) {
																														echo $rank2;
																													} else {
																														echo "0";
																													} ?></h1>
																			<!-- <div class="mb-0">
													
													<span class="text-muted">Since last week</span>
												</div> -->
																		</div>
																	</div>

																</div>
																<div class="col-sm-4">
																	<div class="card bg-b-pink">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title">Class Wise Rank</h4>
																				</div>
																				<div class="col-auto">
																					<div class="col-teal info-icon">
																						<i class="fa fa-user pull-left card-icon font-30"></i>
																					</div>
																				</div>
																			</div>
																			<?php
																			$count3 = 0;

																			foreach ($data['quiz_ranking_course_wise'] as $ranking3) {
																				// echo $ranking3->user_id;
																				$count3++;
																				if ($ranking3->user_id == $_SESSION['rexkod_oodles_student_id']) {
																					$rank3 = $count3;
																				}
																			}

																			?>
																			<h1 class="mt-1 mb-3 info-box-title"><?php if (isset($rank3)) {
																														echo $rank3;
																													} else {
																														echo "0";
																													} ?></h1>

																		</div>
																	</div>

																</div>

																<div class="col-lg-12 col-md-12 col-sm-12 col-12">
																	<div class="white-box border-gray text-center">
																		<img class="img-fluid" src="<?php echo URLROOT ?>/assets/images/logo-1.png" style="height:120px;width:500px;">
																	</div>
																</div>

																<!-- <div class="col-lg-3 col-md-12 col-sm-12 col-12"> </div> -->

																<div class="col-lg-4 col-md-4 col-sm-12 ">
																	<div class="white-box border-gray" style="padding:0;">

																		<?php $wallet = $data['get_wallet']; ?>
																		<div class="user-btm-box">
																			<div class="row">

																				<div class="col-md-12 col-sm-12 text-center">
																					<p class="text-success">Wallet Balance</p>
																					<h1 style="color:#5cb85c;"><i class="fa fa-rupee" style="color:#5cb85c;"></i> <?php echo $wallet->balance_amount; ?></h1>
																					<!-- <button>Recharge Now</button> -->

																					<!-- <label for='ogrape' class='circle'><span class="over" id="5">Wallet</span></label> -->

																					<button type="button" class="btn btn-circle btn-success "><i class="fa fa-paypal"></i>
																						<span class="over_click" id="5">RECHARGE NOW</span></button>
																				</div>

																			</div>

																		</div>
																	</div>
																</div>

																<div class="col-lg-4 col-md-4 col-sm-12 ">
																	<div class="white-box border-gray" style="padding:0;">

																		<?php $wallet = $data['get_wallet']; ?>
																		<div class="user-btm-box">
																			<div class="row">

																				<div class="col-md-12 col-sm-12 text-center">
																					<p style="color:#f0ad4e;">Bonus Coins</p>
																					<h1 style="color:#f0ad4e;"><i class='fas fa-coins'></i> <?php echo $wallet->bonus_coins; ?></h1>
																					<button type="button" class="btn btn-circle btn-warning "><i class='fas fa-coins'></i><span class="over_click" id="5">BUY MORE COINS</span></button>
																				</div>
																			</div>

																		</div>
																	</div>
																</div>
																<div class="col-lg-4 col-md-4 col-sm-12">
																	<div class="white-box border-gray" style="padding:0;">

																		<?php $wallet = $data['get_wallet']; ?>
																		<div class="user-btm-box">
																			<div class="row">
																				<div class="col-md-12 col-sm-12 text-center">
																					<p style="color:#0275d8;">Withdrawal Amount</p>
																					<h1 style="color:#0275d8;"><i class="fa fa-rupee" style="color:#0275d8;"></i> <?php echo $wallet->awarded_amount + $wallet->balance_amount ?></h1>
																					<button type="button" class="btn btn-circle btn-primary "><i class="fa fa-rupee"></i> <span class="over_click" id="5">WITHDRAW</span></button>
																				</div>

																			</div>

																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</div>


											</div>
										</div>

									</div>

								</div>


								<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

								<script type="text/javascript">
									var _gaq = _gaq || [];
									_gaq.push(['_setAccount', 'UA-36251023-1']);
									_gaq.push(['_setDomainName', 'jqueryscript.net']);
									_gaq.push(['_trackPageview']);

									(function() {
										var ga = document.createElement('script');
										ga.type = 'text/javascript';
										ga.async = true;
										ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
										var s = document.getElementsByTagName('script')[0];
										s.parentNode.insertBefore(ga, s);
									})();


									$(document).ready(function() {
										var previous = document.getElementById("menu8"); //The last opened menu, "menu8" by default since it is opened on page load
										var original = "menu"; //Concatenate this with the element id
										var toOpen = ""; //Store the concatenated value
										var over; //Boolean: is the move over the element or not?

										var delay = function(elem, callback) { //Delay the execution of the "callback" argument on the "elem" argument
											var timeout = null; //Store the timer
											timeout = setTimeout(function() { //Set a timer
												if (over) { //If the mouse is still over the element, do:
													callback(elem); //Call the function that was passed as an argument
												}
											}, 150); //Time in milliseconds before the timer triggers

											$(elem).mouseout(function() { //If the mouse leaves the element, do:
												over = false; //Set the boolean to false
												clearTimeout(timeout); //Clear the timer
											});
										};

										$(".over").mouseenter(function(event) { //When the mouse enters one of the menu's elements, do:
											over = true; //Set the boolean to true
											delay(document.getElementById(event.target.id), function(context) { //Call the timer function
												toOpen = document.getElementById(original.concat(context.id)); //When the timer is done, get the menu to open
												openMenu(toOpen); //Open it
												previous = toOpen; //Set it as the "previous" menu for the next instance of this function
											});
										});
										$(".over_click").click(function(event) { //When the anyone clicks one of the menu's elements, do:
											over = true; //Set the boolean to true
											delay(document.getElementById(event.target.id), function(context) { //Call the timer function
												toOpen = document.getElementById(original.concat(context.id)); //When the timer is done, get the menu to open
												openMenu(toOpen); //Open it
												previous = toOpen; //Set it as the "previous" menu for the next instance of this function
											});
										});

										$(".clicky").click(function() {
											openMenu(document.getElementById("menu8"));
											previous = document.getElementById("menu8");
										});

										function openMenu(context) { //Open the specified menu
											closeMenu(previous);
											$(context).toggleClass("visible"); //Toggle the visibility of the element
											$(context).toggleClass("hidden");
										}

										function closeMenu(context) { //Close the specified menu
											$(context).toggleClass("visible"); //Toggle the visibility of the element
											$(context).toggleClass("hidden");
										}
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- end widget -->

		</div>
	</div>

	<!-- end page content -->
	<?php
	require APPROOT . '/views/inc_student/footer.php';
	?>
	<script>
		$(document).ready(function() {
			$("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
				e.preventDefault();
				$(this).siblings('a.active').removeClass("active");
				$(this).addClass("active");
				var index = $(this).index();
				$("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
				$("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
			});
		});
	</script>


	<script>
		$(document).ready(function() {
			$('.scholarship-name').click(function() {
				// Get the scholarship ID from the data attribute
				var scholarshipId = $(this).data('id');


				// Make an AJAX request to fetch the scholarship details
				$.ajax({
					url: '<?php echo URLROOT; ?>/student/find_matched_scholarship',
					method: 'POST',
					data: {
						id: scholarshipId
					},
					success: function(data) {
						// Update the details div with the fetched data
						$('#scholarship-details').html(data);
					}
				});
			});
		});
	</script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		function buy_product(id) {
			Swal.fire({
				title: 'Coins will be debited from wallet?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Continue the transaction!'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = "<?php echo URLROOT; ?>/student/buy_market_product/" + id;
				}
			})
		}
	</script>


	<script src="<?php echo URLROOT; ?>/assets/plugins/owl-carousel/owl.carousel.js"></script>
	<script src="<?php echo URLROOT; ?>/assets/js/pages/owl-carousel/owl_data.js"></script>
	<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
	<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>