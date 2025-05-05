<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;
$get_failed_score_data  = $data['get_failed_students'];
?>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Result</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo  URLROOT; ?>/admin/quiz_contest_result">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Result</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel tab-border card-box">
					<header class="panel-heading panel-heading-gray custom-tab ">
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="#home" data-bs-toggle="tab" class="active">Result</a>
							</li>
							<li class="nav-item">
							</li>
						</ul>
					</header>
					<?php if ($data['get_quiz_detail']->category == 4) { ?>
						<a href="<?php echo URLROOT; ?>/admin/generate_detail/<?php echo $data['get_quiz_detail']->id; ?>"><button type="button" class="form-control btn-warning">View Detail Ranks</button></a>
					<?php } ?>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane active" id="home">
								Passed Student Lists
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<!-- <th></th> -->
											<th> Id</th>
											<th> User ID1 </th>
											<th> User Name </th>
											<th> Score</th>
											<th> Accumulated Score</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Time Taken</th>
											<th> Time Left</th>
											<th> Date</th>
											<th> Time</th>
											<th> Points</th>
											<th> Coins</th>
										</tr>
									</thead>

									<tbody>
										<?php
										foreach ($data['get_quiz_score'] as $quiz_score) { ?>
											<tr class="odd gradeX">
												<!-- <td class="patient-img">
															<img src="<?php echo URLROOT ?>/uploads/<?php echo $webinar->image ?>" alt="">
															</td> -->
												<td class="left"><?php echo $quiz_score->id ?></td>

												<td class="left"><?php echo $quiz_score->user_id ?></td>
												<td class="left"><?php
																	$user_detail = $adminMod->get_single_student1($quiz_score->user_id);

																	echo $user_detail->name; ?></td>

												<td class="left"><?php echo $quiz_score->score ?></td>
												<td class="left"><?php echo $quiz_score->accumulated_score ?></td>
												<td class="left"><?php echo round($quiz_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_score->attempt ?></td>
												<td class="left"><?php echo $quiz_score->time_taken ?></td>
												<td class="left"><?php echo $quiz_score->time_balance ?></td>

												<td class="left"><?php echo date('Y-m-d', strtotime($quiz_score->created_by)) ?></td>

												<td class="left"><?php echo date('h:i a', strtotime($quiz_score->created_by)) ?></td>

												<?php if (empty($quiz_score->coins_earned)) {
													$coins_earned1 = 0;
												} else {
													$coins_earned1 = $quiz_score->coins_earned;
												}
												?>
												<td class="left"><?php echo $coins_earned1; ?></td>
												<?php $coins1 = $quiz_score->coins_earned; ?>
												<td class="left"><?php echo round((($coins1 * 5) / 100), 2); ?></td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
								</div>
								<br><br>
								Failed Student Lists
								<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">

									<thead>
										<tr>
											<!-- <th></th> -->


											<th> Id</th>
											<th> User ID</th>
											<th> User Name </th>
											<th> Score</th>
											<th> Accumulated Score</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Time Taken</th>
											<th> Time Left</th>
											<th> Date</th>
											<th> Time</th>
											<th> Points</th>
											<th> Coins</th>
										</tr>
									</thead>

									<tbody>


										<?php

										foreach ($get_failed_score_data as $quiz_failed_score) { ?>
											<tr class="odd gradeX">

												<!-- <td class="patient-img">
											<img src="<?php echo URLROOT ?>/uploads/<?php echo $webinar->image ?>" alt="">
											</td> -->
												<td class="left"><?php echo $quiz_failed_score->id ?></td>

												<td class="left"><?php echo $quiz_failed_score->user_id ?></td>
												<td class="left"><?php
																	$user_detail = $adminMod->get_single_student1($quiz_failed_score->user_id);

																	echo $user_detail->name; ?></td>

												<td class="left"><?php echo $quiz_failed_score->score ?></td>
												<td class="left"><?php echo $quiz_failed_score->accumulated_score ?></td>
												<td class="left"><?php echo round($quiz_failed_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_failed_score->attempt ?></td>
												<td class="left"><?php echo $quiz_failed_score->time_taken ?></td>
												<td class="left"><?php echo $quiz_failed_score->time_balance ?></td>

												<td class="left"><?php echo date('Y-m-d', strtotime($quiz_failed_score->created_by)) ?></td>

												<td class="left"><?php echo date('h:i a', strtotime($quiz_failed_score->created_by)) ?></td>

												<?php if (empty($quiz_failed_score->coins_earned)) {
													$coins_earned1 = 0;
												} else {
													$coins_earned1 = $quiz_failed_score->coins_earned;
												}
												?>
												<td class="left"><?php echo $coins_earned1; ?></td>
												<?php $coins1 = $quiz_failed_score->coins_earned; ?>
												<td class="left"><?php 
												if(!empty($coins1)){
													echo round((($coins1 * 5) / 100), 2); 
												}else{
													echo "0";
												}
												
												
												?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
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

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>