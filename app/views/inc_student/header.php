<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<?php if(!isset($_SESSION['rexkod_oodles_student_id'])) header("Location: ".URLROOT."/student/login"); ?>
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
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />



</head>
<!-- END HEAD -->

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
											if($message_visible==0){ 
												$count_for_limiting_message++;
											if($count_for_limiting_message < 7 ){ ?>
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
										<a href="<?php echo URLROOT?>/student/notifications"> All notifications </a>
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
								<!-- <img alt="" class="img-circle " src="<?php echo URLROOT; ?>/assets/img/dp2.jpg" /> -->

								<span class="username username-hide-on-mobile"> <?php
																				if (isset($_SESSION['rexkod_oodles_student_name'])) {
																					echo strtoupper($_SESSION['rexkod_oodles_student_name']);
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
						<a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">

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