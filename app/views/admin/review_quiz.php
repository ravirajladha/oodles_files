<?php require APPROOT . '/views/inc_admin/header.php'; ?>



<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Profile</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Quiz Profile</li>
				</ol>
			</div>
		</div>


		<?php foreach ($data['last_added_quiz'] as $quiz_detail) { ?>
			<div class="row">

				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<div class="card">
							<div class="card-body no-padding height-9">
								<div class="row">
									<div class="profile-userpic">
										<!-- <i class="fa fa-graduation-cap"></i> -->
										<img src="<?php echo URLROOT ?>/uploads/<?php echo $quiz_detail->image ?>">
									</div>
								</div>
								<div class="profile-usertitle">
									<div class="profile-usertitle-name"> <?php echo $quiz_detail->name; ?> </div>
									<!-- <div class="profile-usertitle-job"> Jr. quiz </div> -->
								</div>
								<ul class="list-group list-group-unbordered">
								<?php if(isset($quiz_detail->start_date)){ ?>
									<li class="list-group-item">
										<b>Start Date</b> <a class="pull-right"><?php echo $quiz_detail->start_date; ?> </a>
									</li>
									<?php } ?>
									<?php if(isset($quiz_detail->end_date)){ ?>
									<li class="list-group-item">
										<b>End Date</b> <a class="pull-right"><?php echo $quiz_detail->end_date; ?> </a>
									</li>
									<?php } ?>
									<?php if(isset($quiz_detail->duration)){ ?>
									<li class="list-group-item">
										<b>Duration</b> <a class="pull-right"><?php echo $quiz_detail->duration; ?> min </a>
									</li>
									<?php } ?>
									<li class="list-group-item">
										<b>Paid/Unpaid: </b> <a class="pull-right">
											<?php if ($quiz_detail->paid == 1) { ?>
												Paid <?php } elseif ($quiz_detail->paid == 2) { ?>
												Unpaid
											<?php } ?>
										</a>
									</li>
								</ul>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->

								<!-- END SIDEBAR BUTTONS -->
							</div>
						</div>


						<!-- <div class="card">
									<div class="card-head">
										<header>Address</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<p> <?php echo $quiz_detail->branch_address ?> 
													</p>
											</div>
										</div>
									</div>
								</div> -->
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
									<header></header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->

									<?php
									$adminMod = new admins;

									$school_detail = $adminMod->get_school_detail_single_name($quiz_detail->school_name);
									$class_detail = $adminMod->get_class_detail_single($quiz_detail->class_name);
									$subject_detail = $adminMod->get_subject_detail_single($quiz_detail->subject_name);


									?>

									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												<div class="row">
												<?php if(isset($quiz_detail->school_name)){ ?>
													<div class="col-md-3 col-6 b-r"> <strong>School Name</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->school_name == 0) { ?>
																All School
															<?php } else { ?>
																<?php echo $school_detail->school_name ?>
															<?php } ?>
														</p>
													</div>
<?php } ?>
													<?php if(isset($quiz_detail->class_name)){ ?>
													<div class="col-md-3 col-6 b-r"> <strong>Class Name</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->class_name == 0) { ?>
																All Class<?php } else { ?>
																<?php echo $class_detail->class_name ?>
															<?php } ?>
														</p>
													</div>
													<?php } ?>
													<?php if(isset($quiz_detail->subject_name)){ ?>
													<div class="col-md-3 col-6 b-r"> <strong>Subject Name</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->subject_name == 0) { ?>
																All Subject<?php } else { ?>
																<?php echo $subject_detail->subject_name ?>
															<?php } ?>
													</div>
													<?php  } ?>
													<?php if(isset($quiz_detail->topic)){ ?>
													<div class="col-md-3 col-6 b-r"> <strong>Topic Name</strong>
														<br>
														<p class="text-muted">
															<?php echo $quiz_detail->topic ?>
														</p>
													</div>
													<?php  } ?>
<?php if(isset($quiz_detail->chapter)){ ?>
													<div class="col-md-3 col-6 b-r"> <strong>Chapter Name</strong>
														<br>
														<p class="text-muted">
															<?php echo $quiz_detail->chapter ?>
														</p>
													</div>
<?php } ?>
													<!-- <div class="col-md-3 col-6"> <strong>Registered Address</strong>
																<br>
																<p class="text-muted"><?php echo $quiz_detail->registered_address; ?></p>
															</div> -->
												</div>
												<hr>
												<!-- <div class="col-md-3 col-6 b-r"> <strong>Website link</strong></div>
														<p class="m-t-30"><?php echo $quiz_detail->website_link; ?></p>
														<br> -->


												<!-- <li class="list-group-item">
												<b>Quizes Done </b>
												<div class="profile-desc-item pull-right">30+</div>
											</li> -->
												<?php
												$adminMod = new admins;
												$questions = explode(',', $quiz_detail->question);
												foreach ($questions as $single_question_id) {
													$get_question_detail = $adminMod->get_single_question($single_question_id);

												?>
													<ul class="list-group list-group-unbordered">
														<li class="list-group-item">
															<b>Question</b>

															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->question ?> </div>
															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->question_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->question_img ?>" style="height:40px;" style="width:40px;" alt="No Image">
																<?php } ?>
															</div>
														</li>
														<li class="list-group-item">
															<b>Option1</b>
															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->option1 ?> </div>

															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->option1_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option1_img ?>" style="height:40px;" style="width:40px;">
																<?php } ?>
															</div>
														</li>
														<li class="list-group-item">
															<b>Option2</b>

															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->option2 ?> </div>

															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->option2_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option2_img ?>" style="height:40px;" style="width:40px;">
																<?php } ?>
															</div>
														</li>
														<li class="list-group-item">
															<b>Option3</b>
															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->option3 ?> </div>
															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->option3_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option3_img ?>" style="height:40px;" style="width:40px;">
															</div>
														<?php } ?>

														</li>
														<li class="list-group-item">
															<b>Option4</b>

															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->option4 ?> </div>
															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->option4_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option4_img ?>" style="height:40px;" style="width:40px;">
																<?php } ?>
															</div>
														</li>

														<li class="list-group-item">
															<b>Answer</b>
															<div class="profile-desc-item pull-right">
																<?php if (strtolower($get_question_detail->answer) == strtolower("option1")) {
																	echo $get_question_detail->option1;
																} elseif (strtolower($get_question_detail->answer) == strtolower("option2")) {
																	echo $get_question_detail->option2;
																} elseif (strtolower($get_question_detail->answer) == strtolower("option3")) {
																	echo $get_question_detail->option3;
																} elseif (strtolower($get_question_detail->answer) == strtolower("option4")) {
																	echo $get_question_detail->option4;
																} ?>
														</li>
														<li class="list-group-item">
															<b>Explanation</b>
															<div class="profile-desc-item pull-right"> <?php echo $get_question_detail->explanation ?> </div>
															<div class="profile-desc-item pull-right">
																<?php if (!empty($get_question_detail->explanation_img)) { ?>
																	<img src="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->explanation_img ?>" style="height:40px;" style="width:40px;">
																<?php } ?>
															</div>
														</li>


													</ul>
													<hr>
												<?php } ?>
												<!-- <h4 class="font-bold">Details</h4>
														<hr>
														<ul>
															<li>PAN:<?php echo $quiz_detail->pan; ?> </li>
															<li>M.A.,Gujarat University, Ahmedabad, India.</li>
															<li>P.H.D., Shaurashtra University, Rajkot</li>
														</ul>
														<br>
														<h4 class="font-bold">Options</h4>
														<hr>
														<ul>
															
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
														</ul>
														<br>
														<h4 class="font-bold">Options
														</h4>
														<hr>
														<ul>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
														</ul>  -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>

			</div>

			<a class="btn btn-success" href="<?php echo URLROOT; ?>/admin/approve_quiz/<?php echo $quiz_detail->id ?>" role="button"><span>Approve</a>

			<a class="btn btn-danger" href="<?php echo URLROOT; ?>/admin/reject_quiz/<?php echo $quiz_detail->id ?>" role="button"><span>Reject</a>
			<a class="btn btn-warning" href="<?php echo URLROOT; ?>/admin/edit_quiz/<?php echo $quiz_detail->id ?>" role="button"><span>Edit</a>
		<?php } ?>
	</div>
	<!-- end page content -->
	<?php require APPROOT . '/views/inc_admin/footer.php'; ?>