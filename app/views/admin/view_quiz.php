<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<br>
<?php $quiz_detail = $data['get_quiz_detail']; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Profile</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/<?php echo $quiz_detail->category; ?>/<?php echo $quiz_detail->subject_name; ?>">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Quiz Profile</li>
				</ol>
			</div>
		</div>



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
									<div class="profile-usertitle-name"> <?php echo strtoupper($quiz_detail->name); ?> </div>
									<!-- <div class="profile-usertitle-job"> Jr. quiz </div> -->
								</div>
								<ul class="list-group list-group-unbordered">
									<li class="list-group-item">
										<b>Start Date</b> <a class="pull-right"><?php echo $quiz_detail->start_date; ?> </a>
									</li>
									<li class="list-group-item">
										<b>End Date</b> <a class="pull-right"><?php echo $quiz_detail->end_date; ?> </a>
									</li>
									<li class="list-group-item">
										<b>Start Time</b> <a class="pull-right"><?php echo $quiz_detail->start_time; ?> </a>
									</li>
									<li class="list-group-item">
										<b>End Time</b> <a class="pull-right"><?php echo $quiz_detail->end_time; ?> </a>
									</li>
									<li class="list-group-item">
										<b>Duration</b> <a class="pull-right"> <?php echo $quiz_detail->duration_min ?><span>&nbsp;min&nbsp;</span><?php echo $quiz_detail->duration_sec ?><span>&nbsp;sec </a>
									</li>


								</ul>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->

								<!-- END SIDEBAR BUTTONS -->
							</div>
						</div>


						<!-- <div class="card"> -->
						<div class="row">
							<div class="col-md-12" style="width:100%;">
								<?php if ($quiz_detail->publish == 0) { ?>
									<a href="<?php echo URLROOT ?>/admin/update_quiz_first/<?php echo $quiz_detail->id; ?>">
										<button type="button" class="btn btn-primary btn-lg m-b-10" style="width:100%;">Edit Quiz
										</button>
									</a>
								<?php } else { ?>

									<button type="button" class="btn btn-danger btn-lg m-b-10" style="width:100%;">Edit N/A
									</button>

								<?php } ?>


								<?php
								$quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz_detail->start_date . ' ' . $quiz_detail->start_time));

								$present_datetime = date('Y-m-d H:i:s');
								$ten_minutes_before_start = date('Y-m-d H:i:s', strtotime('-10 minutes', strtotime($quiz_start_datetime)));
								if ($present_datetime < $ten_minutes_before_start) { ?>
									<a href="<?php echo URLROOT ?>/admin/schedule_contest_quiz/<?php echo $quiz_detail->id; ?>">
										<button type="button" class="btn btn-warning btn-lg m-b-10" style="width:100%;">Reschedule Quiz
										</button>
									</a>
								<?php } else { ?>
									<button type="button" class="btn btn-default btn-lg m-b-10" style="width:100%;">Reschedule N/A
									</button>
								<?php } ?>
								<?php if ($quiz_detail->publish == 0) { ?>

									<a href="<?php echo URLROOT ?>/admin/publish_quiz/<?php echo $quiz_detail->id; ?>">
										<button type="button" class="btn btn-warning btn-lg m-b-10" style="width:100%;">Publish Quiz
										</button>
									</a>
								<?php } else { ?>

									<button type="button" class="btn btn-success btn-lg m-b-10" style="width:100%;">Published Quiz
									</button>
								<?php } ?>
							</div>
						</div>
						<!-- </div> -->
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
													<div class="col-md-3 col-6 b-r"> <strong>Class Name</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->class_name == 0) { ?>
																All Class<?php } else { ?>
																<?php echo $class_detail->class_name ?>
															<?php } ?>
														</p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Subject Name</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->subject_name == 0) { ?>
																All Subject<?php } else { ?>
																<?php echo $subject_detail->subject_name ?>
															<?php } ?>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Category</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->category == 1) { ?>
																Practice<?php } elseif ($quiz_detail->category == 2) {
																		echo "Merit";
																	} elseif ($quiz_detail->category == 3) {
																		echo "Rapid Fire";
																	} else {
																		echo "Contest";
																	}

																		?>
													</div>
													<!-- <div class="col-md-3 col-6 b-r"> <strong>Chapter</strong>
														<br>
														<p class="text-muted">
															<?php
															$array = (explode(',', $quiz_detail->chapter));
															foreach ($array as $value) {
																$adminMod = new Admins;
																$get_chapter = $adminMod->get_single_chapter($value);
																echo $get_chapter->name . " | ";
															}
															?>
													</div> -->
													<?php if ($quiz_detail->category == 1) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Attempts</strong>
															<br>
															<p class="text-muted">
																<?php if ($quiz_detail->attempt == 0) {
																	echo "Unlimited";
																} else {
																	echo $quiz_detail->attempt;
																} ?>
															</p>
														</div>
													<?php  } ?>

													<?php if (($quiz_detail->category == 1) || ($quiz_detail->category == 2) || ($quiz_detail->category == 3) || ($quiz_detail->category == 4)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Passing %</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->passing_per; ?>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 2) || ($quiz_detail->category == 4)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Coins Per Attempt(1)</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->coins_per_point1; ?>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 1) || ($quiz_detail->category == 3)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Points Per Question</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->coins_per_point1; ?>&nbsp;<i class="fa fa-coins"></i>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 2)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Coins Per Attempt(2)</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->coins_per_point2; ?>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 3)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Coins Per Second</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->coins_per_sec1; ?>&nbsp;<i class="fa fa-coins"></i>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 2) || ($quiz_detail->category == 3)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Quiz Cost</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->quiz_cost; ?>&nbsp;<i class="fa fa-coins"></i>
															</p>
														</div>
													<?php  } ?>
													<?php if (($quiz_detail->category == 4)) { ?>
														<!-- <div class="col-md-3 col-6 b-r"> <strong>Quiz Cost</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->quiz_cost; ?>&nbsp;<i class="fa fa-inr"></i>
															</p>
														</div> -->
													<?php  } ?>
													<!-- <?php if (($quiz_detail->category == 4)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>No of users for Prize distribution</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->user_limit; ?>
															</p>
														</div>
													<?php  } ?> -->
													<?php if (($quiz_detail->category == 4)) { ?>
														<!-- <div class="col-md-3 col-6 b-r"> <strong>Prize for Contest</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->contest_prize; ?>&nbsp;<i class="fa fa-inr"></i>
															</p>
														</div> -->
													<?php  } ?>
													<?php if (!empty($quiz_detail->remarks)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Remarks</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->remarks; ?>
															</p>
														</div>
													<?php  } ?>



													<div class="col-md-3 col-6 b-r"> <strong>Created By</strong>
														<br>
														<p class="text-muted">
															<?php if ($quiz_detail->created_by == 1) {
																echo "Admin";
															} else {
																$adminMod = new Admins;
																$get_creator_detail = $adminMod->get_auth_detail($quiz_detail->created_by);
																echo $get_creator_detail->name;
																echo "(" . $get_creator_detail->type . ")";
															} ?>
														</p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>No of questions</strong>
														<br>
														<p class="text-muted">
															<?php
															$question = $quiz_detail->question;
															if (!empty($question)) {
																$words = explode(',', $question);
																$count = count($words);
																echo  $count . " Questions";
															} else {
																echo "0 Questions";
															}
															?>
														</p>
													</div>

													<!-- ====================== -->
													<?php if (($quiz_detail->category == 4)) { ?>
														<div class="col-md-3 col-6 b-r"> <strong>Prize pool data ID</strong>
															<br>
															<p class="text-muted">
																<?php echo $quiz_detail->prize_calc_data_id ?>

															</p>
														</div>
													<?php } ?>
													<!-- ====================== -->
													<?php if (!empty($quiz_detail->quiz_audio)) { ?>
														<audio controls autoplay muted>
															<source src="<?php echo URLROOT ?>/uploads/<?php echo $quiz_detail->quiz_audio ?>" type="audio/mpeg">
														</audio>
													<?php  }  ?>
													<!-- <div class="col-md-3 col-6"> <strong>Registered Address</strong>
																<br>
																<p class="text-muted"><?php echo $quiz_detail->registered_address; ?></p>
															</div> -->
													<?php $adminMod = new admins;
													?>
													<?php if (($quiz_detail->category == 4)) {


														$get_contest_pool_detail = $adminMod->get_contest_prize_calculations($quiz_detail->prize_calc_data_id);
													?>

														</p>
												</div>
												<div class="tab-content">
													<!-- <div class="tab-pane active fontawesome-demo" id="tab1"> -->
													<!-- <div class="container"> -->

													<div class="card" style="margin-left:10px;">
														<!-- <div class="card-body"> -->
														<h2>Contest Information</h2>
														<table style="margin-left:10px;">
															<tr>
																<td>ID</td>
																<td><?php echo $get_contest_pool_detail->id; ?></td>
															</tr>
															<tr>
																<td>No of Participants</td>
																<td><?php echo $get_contest_pool_detail->no_of_participants; ?></td>
															</tr>
															<tr>
																<td>Entry Fee</td>
																<td>Rs. <?php echo $get_contest_pool_detail->entry_fee; ?></td>
															</tr>
															<tr>
																<td>Total Amount Collected</td>
																<td>Rs. <?php echo $get_contest_pool_detail->total_amount_collected; ?></td>
															</tr>
															<tr>
																<td>Expenses %</td>
																<td><?php echo $get_contest_pool_detail->expenses; ?></td>
															</tr>
															<tr>
																<td>Total Expenses</td>
																<td>Rs. <?php echo $get_contest_pool_detail->total_expenses; ?></td>
															</tr>
															<tr>
																<td>Prize Pool Amount</td>
																<td>Rs. <?php echo $get_contest_pool_detail->prize_pool_amount; ?></td>
															</tr>
															<tr>
																<td>No of Winners %</td>
																<td><?php echo $get_contest_pool_detail->no_of_winners_percentage; ?></td>
															</tr>
															<tr>
																<td>Total No of Winners</td>
																<td><?php echo $get_contest_pool_detail->total_no_of_winners; ?></td>
															</tr>
															<tr>
																<td>Total No of Levels</td>
																<td><?php echo $get_contest_pool_detail->total_no_of_levels; ?></td>
															</tr>
														</table>

														<!-- <h2>Levels Data</h2>
  <table>
    <tr>
      <th>Level No</th>
      <th>Winners %</th>
      <th>No of Winners</th>
      <th>Individual Amount</th>
      <th>Total Amount</th>
      <th>Prize Amount %</th>
    </tr>


                <?php $levels = json_decode(json_encode($get_contest_pool_detail->levels_data), true); ?>
<?php echo $levels; ?>
				<table>
    <thead>
        <tr>
            <th>Level No.</th>
            <th>Winners Percentage</th>
            <th>No. of Winners</th>
            <th>Individual Amount</th>
            <th>Total Amount</th>
            <th>Prize Amount Percentage</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($levels) || is_object($levels)) {
															foreach ($levels as $level) : ?>
        <tr>
            <td><?php echo $level->level_no; ?></td>
            <td><?php echo $level->winners_percentage; ?></td>
            <td><?php echo $level->no_of_winners; ?></td>
            <td><?php echo $level->individual_amount; ?></td>
            <td><?php echo $level->total_amount; ?></td>
            <td><?php echo $level->prize_amount_percentage; ?></td>
        </tr>
        <?php endforeach;
														}
		?>
    </tbody>
</table>
            
  </table> -->

														<div class="created-at">
															&nbsp;&nbsp; Created at: <?php echo $get_contest_pool_detail->created_at; ?>
														</div>
													</div>
												</div>
												<!-- </div> -->
											</div>






										<?php } ?>


										</div>

										<br>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE CONTENT -->


			<div class="row">
				<!-- start page content -->
				<?php
				$count = 0;

				$questions = explode(',', $quiz_detail->question);
				foreach ($questions as $single_question_id) {
					$get_question_detail = $adminMod->get_single_question($single_question_id);
					$count++;
				?>
					<?php if (!empty($quiz_detail->question)) { ?>


						<div class="col-sm-6">
							<div class="card card-topline-red">
								<div class="card-head">
									<header>Question <?php echo $count; ?></header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">

									<div class="row">
										<!-- #6673fc -->
										<div class="col-lg-12">
											<div class="panel">
												<div class="panel-body" style="background-color:#6673fc;color:#ffffff">
													Q. <?php echo $get_question_detail->question ?>
													<?php if (!empty($get_question_detail->question_img)) { ?> <a href="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->question_img ?>" id="blah" target="_blank"><i class='fa-solid fa-image'></i></a><?php } ?>
													<br>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="panel">
												<div class="panel-body" <?php if (strtolower($get_question_detail->answer) == strtolower("option1")) {
																			echo 'style="background-color:#64eb34;color:#ffffff"';
																		} else {
																			echo 'style="background-color:#eb4934;color:#ffffff"';
																		} ?>>
													1. <?php echo $get_question_detail->option1 ?>
													<?php if (!empty($get_question_detail->option1_img)) { ?> <a href="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option1_img ?>" id="blah" target="_blank"><i class='fa-solid fa-image'></i></a><?php } ?></div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="panel">
												<div class="panel-body" <?php if (strtolower($get_question_detail->answer) == strtolower("option2")) {
																			echo 'style="background-color:#64eb34;color:#ffffff"';
																		} else {
																			echo 'style="background-color:#eb4934;color:#ffffff"';
																		} ?>>2. <?php echo $get_question_detail->option2 ?>
													<?php if (!empty($get_question_detail->option2_img)) { ?> <a href="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option2_img ?>" id="blah" target="_blank"><i class='fa-solid fa-image'></i></a><?php } ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="panel">
												<div class="panel-body" <?php if (strtolower($get_question_detail->answer) == strtolower("option3")) {
																			echo 'style="background-color:#64eb34;color:#ffffff"';
																		} else {
																			echo 'style="background-color:#eb4934;color:#ffffff"';
																		} ?>>3. <?php echo $get_question_detail->option3 ?>
													<?php if (!empty($get_question_detail->option3_img)) { ?> <a href="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option3_img ?>" id="blah" target="_blank"><i class='fa-solid fa-image'></i></a><?php } ?>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="panel">
												<div class="panel-body" <?php if (strtolower($get_question_detail->answer) == strtolower("option4")) {
																			echo 'style="background-color:#64eb34;color:#ffffff"';
																		} else {
																			echo 'style="background-color:#eb4934;color:#ffffff"';
																		} ?>>4. <?php echo $get_question_detail->option4 ?>
													<?php if (!empty($get_question_detail->option4_img)) { ?> <a href="<?php echo URLROOT ?>/uploads/<?php echo $get_question_detail->option4_img ?>" id="blah" target="_blank"><i class='fa-solid fa-image'></i></a><?php } ?>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

					<?php } else {
					?>
						<h2> Please add questions to the corresponding quiz</h2>
					<?php  } ?>

				<?php } ?>
				<!-- end page content -->
			</div>



	</div>

</div>


</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>