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
	<!-- <link href="<?php echo URLROOT; ?>/assets/css/theme/full/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" /> -->
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/css/theme/full/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT; ?>/assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo URLROOT; ?>/assets/img/favicon.ico" />

	<script language="JavaScript">
		function clp_clear() {
			var content = window.clipboardData.getData("Text");
			if (content == null) {
				window.clipboardData.clearData();
			}
			setTimeout("clp_clear();", 1000);
		}
	</script>
	<!-- body tag -->
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo" onload='clp_clear()'>
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="index">
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
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i data-feather="bell"></i>
								<span class="badge headerBadgeColor1"> 6 </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3><span class="bold">Notifications</span></h3>
									<span class="notification-label purple-bgcolor">New 6</span>
								</li>
								<li>
									<ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
										<li>
											<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i class="fa fa-check"></i></span>
													Notification Message 1</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i class="fa fa-user o"></i></span>
													<b>Notification </b> Message 2</span>
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
										</li>
									</ul>
									<div class="dropdown-menu-footer">
										<a href="javascript:void(0)"> All notifications </a>
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
								<span class="username username-hide-on-mobile">
								<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>
											Admin
										<?php } elseif ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_quiz') { ?>
											Subadmin
										<?php } elseif ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship') { ?>
											Subadmin
										<?php } ?>
								</span>
									
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="#">
										<i class="icon-user"></i> Profile </a>
								</li>
								<li>
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
								</li>
								<li>
									<a href="<?php echo URLROOT; ?>/admin/logout">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
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
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->

			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px;">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							<li class="sidebar-user-panel">
								<div class="sidebar-user">
									<div class="sidebar-user-picture">
										<img alt="image" src="<?php echo URLROOT; ?>/assets/img/dp.jpg">
									</div>
									<div class="sidebar-user-details">
										<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>
											<div class="user-name">Rakesh R</div>
											<div class="user-role">Administrator</div>
										<?php } elseif ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_quiz') { ?>
											<div class="user-name">Quiz Handler</div>
											<div class="user-role">Subadmin </div>
										<?php } elseif ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship') { ?>
											<div class="user-name">Scholarship Handler</div>
											<div class="user-role">Subadmin</div>
										<?php } ?>
									</div>
								</div>
							</li>


							<li class="nav-item">

								<a href="#" class="nav-link nav-toggle">
									<i data-feather="airplay"></i>
									<span class="title">Home</span>
									<span class="selected"></span>
									<span class="arrow open"></span>
								</a>
								<ul class="sub-menu">
								<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin')) { ?>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/admin/index" class="nav-link ">
											<span class="title">Main Dashboard</span>
											<span class="selected"></span>
										</a>
									</li>
									<?php } ?>
									<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_quiz')) { ?>
										<li class="nav-item ">
											<a href="<?php echo URLROOT; ?>/admin/quiz_dash" class="nav-link ">
												<span class="title">Quiz Dashboard</span>
											</a>
										</li>
									<?php } ?>
									<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship')) { ?>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/admin/scholarship_dash" class="nav-link ">
											<span class="title">Scholarship Dashboard</span>
										</a>
									</li>
									<?php } ?>
								</ul>
							</li>
							<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>
								<!-- college start -->
								<li class="nav-item ">

									<a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
										<span class="title">Colleges</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/colleges" class="nav-link "> <span class="title">All
													Colleges</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_college" class="nav-link "> <span class="title">Add
													College</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_college_type" class="nav-link "> <span class="title">Add
													College Curriculum</span>
											</a>
										</li>
										<!-- <li class="nav-item">
										<a href="<?php echo URLROOT; ?>/admin/school" class="nav-link "> <span class="title">School Profile</span>
										</a>
									</li> -->
									</ul>
								</li>
								<!-- college end -->


								<li class="nav-item ">
									<a href="#" class="nav-link nav-toggle"> <i data-feather="smile"></i>
										<span class="title">Corporate</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/corporates" class="nav-link "> <span class="title">All
													Corporates</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_corporate" class="nav-link "> <span class="title">Add Corporate</span>
											</a>
										</li>

									</ul>
								</li>

								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle"> <i class="fa fa-question"></i>
										<span class="title">Enquiry</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/csr_enquiry" class="nav-link "> <span class="title">CSR Enquiries</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/home_enquiry" class="nav-link "> <span class="title">Home Enquiries</span>
											</a>
										</li>

									</ul>
								</li>
								<li class="nav-item ">
									<a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
										<span class="title">Schools</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/schools" class="nav-link "> <span class="title">All
													Schools</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_school" class="nav-link "> <span class="title">Add
													School</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_class" class="nav-link "> <span class="title">Add
													Class</span>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_school_type" class="nav-link "> <span class="title">Add
													School Type</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_plans_for_school" class="nav-link "> <span class="title">Subscription Plan</span>
												</span>
											</a>

										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/assign_plans_to_school" class="nav-link "> <span class="title">Assign Plan</span>
												</span>
											</a>

										</li>

									</ul>
								</li>




								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
										<span class="title">Students</span><span class="arrow"></span></a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/students" class="nav-link "> <span class="title">All
													Students</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/parents" class="nav-link "> <span class="title">All
													Parents</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/representatives" class="nav-link "> <span class="title">All
													Representatives</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_boards" class="nav-link "> <span class="title">Add Boards</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_hobbies" class="nav-link "> <span class="title">Add Hobbies</span>
											</a>
										</li>


									</ul>
								</li>


							<?php } ?>


							<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship')) { ?>
								<li class="nav-item">
									<a href="javascript:;" class="nav-link nav-toggle">
										<i data-feather="alert-octagon"></i> Scholarship
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship')) { ?>
											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="aperture"></i> Main
													<span class="arrow "></span>
												</a>
												<ul class="sub-menu">
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/all_scholarships" class="nav-link "> <span class="title">All
																Scholarships</span>
														</a>
													</li>
													<!-- <li class="nav-item">
													<a href="<?php echo URLROOT; ?>/admin/scholarships" class="nav-link "> <span class="title">All
															Scholarships(old)</span>
													</a>
												</li> -->
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_scholarship" class="nav-link "> <span class="title">Add
																Scholarship</span>
														</a>
													</li>
													<!-- <li class="nav-item">
													<a href="<?php echo URLROOT; ?>/admin/scholarship_application" class="nav-link "> <span class="title">
															Scholarship Application</span>
													</a>
												</li> -->
												</ul>
											</li>
										<?php } ?>
										<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>

											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="aperture"></i> Support
													<span class="arrow "><span class="label label-rouded label-menu label-success">new</span></span>
												</a>
												<ul class="sub-menu">

													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_criteria" class="nav-link "> <span class="title">
																Criteria</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_document" class="nav-link "> <span class="title">
																Document</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_scholarship_promotion" class="nav-link "> <span class="title">
																Promotions</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_scholarship_type" class="nav-link "> <span class="title">
																Scholarship Type</span>
														</a>
													</li>
													<!-- <li class="nav-item">
													<a href="<?php echo URLROOT; ?>/admin/student_scholarship_view" class="nav-link "> <span class="title">
															student view</span>
													</a>
												</li> -->
												</ul>
											</li>


										<?php } ?>
									</ul>
								</li>
							<?php } ?>
							<!-- <?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>

								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle"><i data-feather="users"></i>
										<span class="title">Students</span><span class="arrow"></span></a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/students" class="nav-link "> <span class="title">All
													Students</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/parents" class="nav-link "> <span class="title">All
													Parents</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/representatives" class="nav-link "> <span class="title">All
													Representatives</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_boards" class="nav-link "> <span class="title">Add Boards</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_hobbies" class="nav-link "> <span class="title">Add Hobbies</span>
											</a>
										</li>
									</ul>
								</li>
							<?php } ?> -->


							<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>

								<li class="nav-item ">
									<a href="#" class="nav-link nav-toggle"> <i data-feather="smile"></i>
										<span class="title">Subscription</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/subscription_plan" class="nav-link "> <span class="title">All
													Subscriptions</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_subscription" class="nav-link "> <span class="title">Add Subscription</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/subscriptions_taken" class="nav-link "> <span class="title">Subscriptions Taken</span>
											</a>
										</li>

									</ul>
								</li>

								<li class="nav-item ">
									<a href="#" class="nav-link nav-toggle"> <i data-feather="smile"></i>
										<span class="title">Market Place</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<!-- <li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/all_market_places" class="nav-link "> <span class="title">All
													Market Place</span>
											</a>
										</li> -->
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_market_place" class="nav-link "> <span class="title">Add Market Place</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/market_place_orders" class="nav-link "> <span class="title"> Market Place Orders</span>
											</a>
										</li>
									</ul>
								</li>

							<?php } ?>


							<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_quiz')) { ?>
								<li class="nav-item">
									<a href="javascript:;" class="nav-link nav-toggle">
										<i data-feather="chevrons-down"></i>
										<span class="title">Quiz</span>
										<span class="arrow "></span>
									</a>
									<ul class="sub-menu">

										<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>

											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="folder"></i> Quiz master
													<span class="arrow"></span>
												</a>
												<ul class="sub-menu">

													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quiz_master/0/0/0/0" class="nav-link ">
															<span class="title">Quiz Master</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_question" class="nav-link">
															<span class="title">Add Question</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/add_category" class="nav-link "> <span class="title">Add
																Category</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/all_category" class="nav-link "> <span class="title">All
																Category</span>
														</a>
													</li>

													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/question_bank" class="nav-link ">
															<span class="title">Question Bank</span>
															<!-- <span class="label label-rouded label-menu label-success">new</span> -->
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/question_bank_pending" class="nav-link ">
															<span class="title">Question Bank Pending</span>
															<!-- <span class="label label-rouded label-menu label-success">new</span> -->
														</a>
													</li>
												</ul>
											</li>
										<?php } ?>
										<?php if (($_SESSION['rexkod_oodles_login_type'] == 'admin') ||  ($_SESSION['rexkod_oodles_login_type'] == 'subadmin_quiz')) { ?>

											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="folder"></i> Quizes
													<span class="arrow"></span>
												</a>
												<ul class="sub-menu">
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/create_quiz_first" class="nav-link ">
															<span class="title">Create Quiz</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quizes/1/0" class="nav-link ">
															<span class="title">All Quizes</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/contest_pool_amount" class="nav-link ">
															<span class="title">Add Prize Pool</span>
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/prize_pool_calculations" class="nav-link ">
															<span class="title">All Prize Pools</span>
														</a>
													</li>
												</ul>
											</li>

											<li class="nav-item">
												<a href="javascript:;" class="nav-link nav-toggle">
													<i data-feather="folder"></i> Result
													<span class="arrow"></span>
												</a>
												<ul class="sub-menu">
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quiz_contest_result" class="nav-link">
															<i data-feather="heart"></i> Contest Quiz
														</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quiz_practice_result" class="nav-link">
															<i data-feather="film"></i> Practice Quiz</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quiz_merit_result" class="nav-link">
															<i data-feather="file"></i>Merit</a>
													</li>
													<li class="nav-item">
														<a href="<?php echo URLROOT; ?>/admin/quiz_rapid_fire_result" class="nav-link">
															<i data-feather="heart"></i> Rapid quiz
														</a>
													</li>


												</ul>
											</li>


										<?php } ?>
									</ul>
								</li>

							<?php } ?>
							<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin') { ?>

								<li class="nav-item ">
									<a href="#" class="nav-link nav-toggle">
										<i class="fa fa-inr"></i>
										<span class="title"> Wallet</span>
										<span class="arrow"></span>

									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/wallet" class="nav-link ">
												<span class="title">Wallet</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/transactions_details" class="nav-link ">
												<span class="title">Transactions</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/student_wallet" class="nav-link ">
												<span class="title">Student Wallet</span>
											</a>
										</li>

									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle"> <i data-feather="users"></i>
										<span class="title">Webinar</span> <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/add_webinar" class="nav-link "> <span class="title">
													Add Webinar</span>
											</a>
										</li>

										<li class="nav-item">
											<a href="<?php echo URLROOT; ?>/admin/webinars" class="nav-link "> <span class="title">
													All Webinar</span>
											</a>
										</li>

									</ul>
								</li>




								<li class="nav-item ">
									<a href="javascript:;" class="nav-link nav-toggle"> <i data-feather="anchor"></i>
										<span class="title">Settings</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item  ">
											<a href="<?php echo URLROOT; ?>/admin/add_subadmin" class="nav-link "> <span class="title">Add Subadmin</span>
											</a>
										</li>
										<li class="nav-item  ">
											<a href="<?php echo URLROOT; ?>/admin/add_faq" class="nav-link "> <span class="title">Add FAQ's</span>
											</a>
										</li>

									</ul>
								</li>
								
								<li class="nav-item ">
									<a href="javascript:;" class="nav-link nav-toggle"> <i data-feather="anchor"></i>
										<span class="title">Courses</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item  ">
											<a href="<?php echo URLROOT; ?>/admin/courses" class="nav-link "> <span class="title">Course Price</span>
											</a>
										</li>
									</ul>
								</li>

							<?php } ?>

							<li class="nav-item ">
								<a href="<?php echo URLROOT; ?>/admin/logout">
									<i class="icon-logout"></i> Log Out</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>


	<style>
		.slimScrollBar {
			width: 25px;
		}
	</style>

	<style>
		.page-content-white .page-bar {
			padding: 20px;
		}
	</style>
	<!--select2-->
	<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />