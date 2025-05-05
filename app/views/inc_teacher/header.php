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

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="<?php echo URLROOT?>/teacher/index.php">
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
							<a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
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
													<span class="notification-icon circle deepPink-bgcolor"><i
															class="fa fa-check"></i></span>
													Notification Message 1</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
													<span class="notification-icon circle purple-bgcolor"><i
															class="fa fa-user o"></i></span>
													<b>Notification </b> Message 2</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">7 mins</span>
												<span class="details">
													<span class="notification-icon circle blue-bgcolor"><i
															class="fa fa-comments-o"></i></span>
															<b>Notification </b> Message 3</span>
											</a>
										</li>
										<li>
											<a href="javascript:;">
												<span class="time">12 mins</span>
												<span class="details">
													<span class="notification-icon circle pink"><i
															class="fa fa-heart"></i></span>
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
							<a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<img alt="" class="img-circle " src="<?php echo URLROOT; ?>/assets/img/dp.jpg" />
								<span class="username username-hide-on-mobile"> Teacher
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
									<a href="<?php echo URLROOT; ?>/teacher/logout">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
						<li class="dropdown dropdown-quick-sidebar-toggler">
							<a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
								data-upgraded=",MaterialButton">
								
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
			<?php if(isset($_SESSION['rexkod_oodles_teacher_id'])){ ?>
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px;">
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
										<div class="user-name"><?php echo $_SESSION['rexkod_oodles_teacher_name']?></div>
										<div class="user-role">Teacher</div>
									</div>
								</div>
							</li>


				

							<li class="nav-item ">
							<!-- <?php if($_SESSION['nav']=="quiz"){ echo "start active open"; } ?> -->
								<a href="#" class="nav-link nav-toggle">
								<i class="material-icons f-left">question_answer</i>
									<span class="title">Quiz</span>
									<span class="arrow"></span>
									
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/quiz_library/1/0" class="nav-link ">
											<span class="title">Quiz Library</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/quiz_master/0/0/0/0" class="nav-link ">
											<span class="title">Quiz Master</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/add_question" class="nav-link">
											<span class="title">Add Question</span>
										</a>
									</li>
									<!-- <li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/add_question_beta" class="nav-link">
											<span class="title">Add Beta Question</span>
										</a>
									</li> -->
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/create_quiz_first" class="nav-link ">
											<span class="title">Create Quiz</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/question_bank_pending" class="nav-link ">
											<span class="title">Question Bank Pending</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/quizes/1/0" class="nav-link ">
											<span class="title">All Quizes</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/quiz_result_subject_wise" class="nav-link ">
											<span class="title">Quiz Result</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/resources" class="nav-link ">
											<span class="title">Resources</span></span>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/student_report" class="nav-link ">
											<span class="title">Student Report</span></span>
										</a>
									</li>
									<!-- <li class="nav-item">
										<a href="<?php echo URLROOT; ?>/teacher/quiz_result" class="nav-link ">
											<span class="title">Result</span>
										</a>
									</li> -->
								</ul>
							</li>
					
			
						
							
						
							
				
						
						</ul>
					</div>
				</div>
			</div>

			<?php }?>
			<style>
				.slimScrollBar{
					width:25px;
				}
				</style>
				<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>    .page-content-white .page-bar {
    padding: 20px;
}</style>
