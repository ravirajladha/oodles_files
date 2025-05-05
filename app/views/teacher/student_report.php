<?php require APPROOT . '/views/inc_teacher/header.php'; ?>




<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Graph</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Student Report Subjectwise</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card card-box">

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="">
								<div class="card-head">
									<header>REPORT</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body " id="bar-parent1">
									<div class="row">
										<div class="col-md-9 col-sm-9 col-9">
											<div class="tab-content">
												<div class="tab-pane active" id="tab_7_1">
													<form method="POST" action="<?php echo URLROOT; ?>/teacher/search_each_student_subjectwise" enctype="multipart/form-data" autocomplete="OFF">

														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Select Student </label>
																	<div class="input-group">
																		<select class="form-control" name="student_id">
																			<?php foreach ($data['get_all_students'] as $student) { ?>
																				<option value="<?php echo $student->student_id; ?>"><?php echo $student->f_name; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<button class="btn btn-primary" type="submit">Search</button>
													</form>
												</div>
												<div class="tab-pane fade" id="tab_7_2">
													<form method="POST" action="<?php echo URLROOT; ?>/teacher/search_each_student_each_subject_all_quizes" enctype="multipart/form-data" autocomplete="OFF">

														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label>Select Student </label>
																	<div class="input-group">
																		<select class="form-control" name="student_id">
																			<?php foreach ($data['get_all_students'] as $student) { ?>
																				<option value="<?php echo $student->student_id; ?>"><?php echo $student->f_name; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<label>Select Subject </label>
																	<div class="input-group">
																		<select class="form-control" name="subject_id">
																			<?php foreach ($data['get_subject_from_class'] as $all_subject) { ?>
																				<option value="<?php echo $all_subject->id; ?>"><?php echo $all_subject->subject_name; ?></option>
																			<?php } ?>
																		</select>
																	</div>
																</div>
															</div>
														</div>
														<button class="btn btn-primary" type="submit">Search</button>
													</form>
												</div>
												<div class="tab-pane fade" id="tab_7_3">
												<form method="POST" action="<?php echo URLROOT; ?>/teacher/search_all_student_subject_wise" enctype="multipart/form-data" autocomplete="OFF">

<div class="row">

	<div class="col-md-12">
		<div class="form-group">
			<label>Select Subject </label>
			<div class="input-group">
				<select class="form-control" name="subject_id">
					<?php foreach ($data['get_subject_from_class'] as $all_subject) { ?>
						<option value="<?php echo $all_subject->id; ?>"><?php echo $all_subject->subject_name; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
</div>
<button class="btn btn-primary" type="submit">Search</button>
</form>
												</div>
												<!-- <div class="tab-pane fade" id="tab_7_4">
													<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem
														accusantium doloremque laudantium,
														totam rem aperiam eaque ipsa, quae ab illo inventore veritatis
														et quasi architecto beatae vitae dicta
														sunt, explicabo.</p>
												</div> -->
											</div>
										</div>
										<div class="col-md-3 col-sm-3 col-3">
											<ul class="nav nav-tabs tabs-right">
												<li class="nav-item">
													<a href="#tab_7_1" data-bs-toggle="tab" class="active"> STUDENT/ALL SUBJECT </a>
												</li>
												<li class="nav-item">
													<a href="#tab_7_2" data-bs-toggle="tab"> SUBJECT/ALL QUIZES </a>
												</li>
												<li class="nav-item dropdown">
													<a href="#tab_7_3" data-bs-toggle="tab"> SUBJECT/ALL STUDENTS </a>
												</li>
												<!-- <li class="nav-item">
													<a href="#tab_7_4" data-bs-toggle="tab"> Settings </a>
												</li> -->
											</ul>
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
<!-- end page content -->

<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>