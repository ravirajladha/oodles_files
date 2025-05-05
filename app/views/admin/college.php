<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<style>
				.slimScrollBar{
					width:25px;
				}
				</style>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">College Detail</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">College</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">College Detail</li>
				</ol>
			</div>
		</div>


		<?php foreach ($data['get_college_detail']  as $college_detail) { ?>
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<div class="card">
							<div class="card-body no-padding height-9">
								<div class="row">
									<div class="profile-userpic">
										<!-- <i class="fa fa-graduation-cap"></i> -->
										<img src="<?php echo URLROOT ?>/uploads/<?php echo $college_detail->college_image ?>">
									</div>
								</div>
								<div class="profile-usertitle">
									<div class="profile-usertitle-name"> <?php echo $college_detail->college_name; ?> </div>
									<!-- <div class="profile-usertitle-job"> Jr. college </div> -->
								</div>
								<ul class="list-group list-group-unbordered">


									<li class="list-group-item">
										<b>Student:Teacher Ratio</b> <a class="pull-right"><?php echo $college_detail->student_teacher_ratio; ?> </a>
									</li>


								</ul>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->

								<!-- END SIDEBAR BUTTONS -->
							</div>
						</div>
						<div class="card">
							<div class="card-head">
								<header>About </header>
							</div>
							<div class="card-body no-padding height-9">
								<!-- <div class="profile-desc">
										
										</div> -->
								<ul class="list-group list-group-unbordered">

									<!-- <li class="list-group-item">
												<b>Quizes Done </b>
												<div class="profile-desc-item pull-right">30+</div>
											</li> -->
									<li class="list-group-item">
										<b>Accreditation Board</b>
										<div class="profile-desc-item pull-right"> <?php echo $college_detail->accreditation_no ?> </div>
									</li>
									<li class="list-group-item">
										<b>Year of Establishment</b>
										<div class="profile-desc-item pull-right"> <?php echo $college_detail->year_of_establishment ?></div>
									</li>
									<li class="list-group-item">
										<b>Recognized By</b>
										<div class="profile-desc-item pull-right"> <?php echo $college_detail->recognized_by ?></div>
									</li>
									<li class="list-group-item">
										<b>Website Link</b>
										<div class="profile-desc-item pull-right"> <a href="<?php echo $college_detail->website_link ?>" target="_blank"><?php echo $college_detail->website_link ?></a></div>
									</li>
									<!-- <li class="list-group-item">
												<b>Typen</b>
												<div class="profile-desc-item pull-right">Jr. college</div>
											</li> -->
								</ul>
								<!-- <div class="row list-separated profile-stat">
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 37 </div>
												<div class="uppercase profile-stat-text"> Teachers </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 51 </div>
												<div class="uppercase profile-stat-text"> Students </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 61 </div>
												<div class="uppercase profile-stat-text"> Quizes</div>
											</div>
										</div> -->
							</div>
						</div>
						<div class="card">
							<div class="card-head">
								<header>Address</header>
							</div>
							<div class="card-body no-padding height-9">
								<div class="row text-center m-t-10">
									<div class="col-md-12">
										<p> <?php echo $college_detail->college_address ?>
										</p>
										<p> <?php echo $college_detail->college_city ?>
										</p>
										<p> <?php echo $college_detail->state ?>
										</p>
										<p> <?php echo $college_detail->college_pin_code ?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="card">
									<div class="card-head">
										<header>Active Quizes</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="work-monitor work-progress">
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Degree</div>
													<div class="percent pull-right">50%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 70%">
														<span class="sr-only">50% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Subject</div>
													<div class="percent pull-right">85%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-success progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 45%">
														<span class="sr-only">85% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Monthly</div>
													<div class="percent pull-right">20%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-info progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 35%">
														<span class="sr-only">20% </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>  -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="card">
								<div class="card-topline-aqua">
									<header>About College</header>
								</div>
								<div class="white-box">
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												<!-- <div class="col-md-6 "> <strong>About College</strong></div> -->
												<p class="m-t-30"><?php echo $college_detail->college_info; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-topline-aqua">
									<header>Courses & Fees</header>
								</div>
								<div class="white-box">
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												<div class="col-md-6 "> <strong>About College</strong></div>
												<p class="m-t-30"><?php echo $college_detail->course_offered; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-topline-aqua">
									<header>Admision & Procedure</header>
								</div>
								<div class="white-box">
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												<div class="col-md-6 "> <strong>Admission Criteria</strong></div>
												<p class="m-t-30"><?php echo $college_detail->admission_criteria; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-topline-aqua">
									<header>Admision & Procedure</header>
								</div>
								<div class="white-box">
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												<div class="col-md-6 "> <strong>Admission Criteria</strong></div>
												<p class="m-t-30"><?php echo $college_detail->admission_criteria; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>



			<?php } ?>
			</div>
	</div>
</div>
<!-- END PROFILE CONTENT -->
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>