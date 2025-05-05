<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<?php
if (isset($_SESSION['quiz_category'])) {
	$quiz_category = $_SESSION['quiz_category'];
} else {
	$quiz_category = 1;
}
?>

<style>
	tr:hover {
		background-size: 100% 100%;
		transform: scale(1.01, 1.01);
		transform-origin: center;
		background-color: yellow;
	}
</style>
<style>
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
		.fullscreen-btn{
			display: none !important;
		}
		
		.page-header-inner {
			display: flex !important;
			justify-content: space-between !important;
		}
		.page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu {
    margin-right: -48px;
}
.page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu:after, .page-header.navbar .top-menu .navbar-nav > li.dropdown-notification .dropdown-menu:before {
    margin-right: 58px;
}
.page-header.navbar .page-logo {
    width: auto;
}

	}
</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Overall Rankings</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/student/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>

					<li class="active">Overall Rankings</li>
				</ol>
			</div>
		</div>
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

									foreach($data['quiz_ranking_course_wise'] as $ranking3) {
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
					</div>
				</div>
			</div>

		</div>
		<div class="state-overview">

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="panel tab-border card-box">
						<header class="panel-heading panel-heading-gray custom-tab ">
							<ul class="nav nav-tabs">
								<li class="nav-item"><a href="#home" data-bs-toggle="tab" <?php if ($quiz_category == 1) { ?>class="active" <?php } ?>>Practice Level Ranking</a>
								</li>
								<!-- hide the merit and rapid fire -->
								<!-- <li class="nav-item"><a href="#about" data-bs-toggle="tab" <?php if ($quiz_category == 2) { ?>class="active" <?php } ?>>Merit Level Ranking</a>
								</li>
								<li class="nav-item"><a href="#profile" data-bs-toggle="tab" <?php if ($quiz_category == 3) { ?>class="active" <?php } ?>>Rapid Fire</a>
								</li> -->
								<li class="nav-item"><a href="#contact" data-bs-toggle="tab" <?php if ($quiz_category == 4) { ?>class="active" <?php } ?>>Contest</a>
								</li>
							</ul>
						</header>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane <?php if ($quiz_category == 1) { ?> active <?php } ?>" id="home">
									<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
										<thead>
											<tr>
												<!-- <th></th> -->
												<th>RANK</th>
												<th>NAME</th>
												<th>POINTS</th>
												<th>ATTEMPT</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$studentMod = new Students;
											$get_category_wise_result1 = $studentMod->get_quiz_score_category_wise(1);
											$count4 = 0;
											$flag1 = 0;
											?>
											<?php foreach ($get_category_wise_result1 as $ranking) { ?>
												<?php $count4++; ?>
												<tr>
													<td><?php echo $count4;?></td>
													<?php
													$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
												
													if($ranking->user_id == $_SESSION['rexkod_oodles_student_id']) {
														$user_rank  = $count4;
														$user_score  = $ranking->total_score;
														$user_attempt = $ranking->total_attempt;
														$user_name = $get_user_detail->f_name;
														$flag1 = 1;
													}
													$adminMod = new admins;
													$get_user_detail_from_auth = $adminMod->get_auth_detail($ranking->user_id);
													?>

													<td style="font-size:13px;"><?php echo strtoupper($get_user_detail_from_auth->name); ?></td>
													<td> <?php echo $ranking->total_score ?></td>
													<?php $total_attempt =  $studentMod->get_total_attempt($ranking->user_id);?>
													<td><?php echo $total_attempt->total_attempt ?></td>
												</tr>
											<?php } ?>
											<?php if ($count4 < 10) {
												for ($i = $count4; $i < 10; $i++) { ?>
													<tr>
														<td>--</td>
														<td>--</td>
														<td>--</td>
														<td>--</td>
													</tr>
												<?php 		}
												?>

											<?php 	} ?>
											<?php if ($flag1 == 1) { ?>
												<tr style="background-color:#0d6efd;height:15px;font-size:15px;">
													<td ><?php echo $user_rank ?></td>
<?php
													$get_user_detail_from_auth1 = $adminMod->get_auth_detail($_SESSION['rexkod_oodles_student_id']);
													?>
													<td><?php echo strtoupper($get_user_detail_from_auth1->name); ?></td>
													<td><?php echo $user_score ?></td>
													<td> <?php echo $user_attempt  ?></td>
												</tr>

											<?php } ?>

										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if ($quiz_category == 2) { ?> active <?php } ?>" id="about">
									<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
										<thead>
											<tr>
												<!-- <th></th> -->
												<th>RANK</th>
												<th>NAME</th>
												<th>POINTS</th>
												<th>ATTEMPT</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$studentMod = new Students;
											$get_category_wise_result = $studentMod->get_quiz_score_category_wise(2);
											$count5 = 0;
											$flag2 = 0;
											?>
											<?php foreach ($get_category_wise_result as $ranking) { ?>
												<?php $count5++; ?>
												<tr>
													<td><?php echo $count5; ?></td>
													<?php
													$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
													
													if ($ranking->user_id == $_SESSION['rexkod_oodles_student_id']) {
														$user_rank  = $count5;
														$user_score  = $ranking->total_score;
														$user_attempt = $ranking->total_attempt;
														$user_name = $get_user_detail->f_name;
														$flag2 = 1;
													}
													$adminMod = new admins;
													$get_user_detail_from_auth = $adminMod->get_auth_detail($ranking->user_id);
													?>

													<td style="font-size:13px;"><?php echo strtoupper($get_user_detail_from_auth->name); ?></td>
													<td> <?php echo $ranking->total_score ?></td>
													<td><?php echo $ranking->total_attempt ?></td>
												</tr>
											<?php } ?>
											<?php if ($count5 < 10) {
												for ($i = $count5; $i < 10; $i++) { ?>
													<tr>
														<td>--</td>
														<td>--</td>
														<td>--</td>
														<td>--</td>
													</tr>
												<?php 		}
												?>

											<?php 	} ?>
											 <?php if ($flag2 == 1) { ?>
												<tr style="background-color:#0d6efd;height:15px;">
													<td><?php echo $user_rank ?></td>
													<td>
													<?php
													$get_user_detail_from_auth2 = $adminMod->get_auth_detail($_SESSION['rexkod_oodles_student_id']);
													echo strtoupper($get_user_detail_from_auth2->name);?>
													</td>

													<td><?php echo $user_score ?></td>
													<td> <?php echo $user_attempt  ?></td>
												</tr>

											<?php } ?> 

										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if ($quiz_category == 3) { ?> active <?php } ?>" id="profile">
									<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
										<thead>
											<tr>
												<th>RANK</th>
												<th>NAME</th>
												<th>POINTS</th>
												<th>ATTEMPT</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$studentMod = new Students;
											$get_category_wise_result = $studentMod->get_quiz_score_category_wise(3);
											$count6 = 0;
											$flag3 = 0;
											?>
											<?php foreach ($get_category_wise_result as $ranking) { ?>
												<?php $count6++; ?>
												<tr>
													<td><?php echo $count6; ?></td>
													<?php
													$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
												
													if ($ranking->user_id == $_SESSION['rexkod_oodles_student_id']) {
														$user_rank  = $count6;
														$user_score  = $ranking->total_score;
														$user_attempt = $ranking->total_attempt;
														$user_name = $get_user_detail->f_name;
														$flag3 = 1;
													}
													$adminMod = new admins;
													$get_user_detail_from_auth = $adminMod->get_auth_detail($ranking->user_id);
													?>

													<td style="font-size:13px;"><?php echo strtoupper($get_user_detail_from_auth->name); ?></td>
													<td> <?php echo $ranking->total_score ?></td>
													<td><?php echo $ranking->total_attempt ?></td>
												</tr>
											<?php } ?>
											<?php if ($count6 < 10) {
												for ($i = $count6; $i < 10; $i++) { ?>
													<tr>
														<td>--</td>
														<td>--</td>
														<td>--</td>
														<td>--</td>
													</tr>
												<?php 		}
												?>

											<?php 	} ?>
											 <?php if ($flag3 == 1) { ?>
												<tr style="background-color:#0d6efd;height:15px;">
													<td><?php echo $user_rank ?></td>
													<td><?php
													$get_user_detail_from_auth2 = $adminMod->get_auth_detail($_SESSION['rexkod_oodles_student_id']);
													echo strtoupper($get_user_detail_from_auth2->name);?>
												
													
												</td>
													<td><?php echo $user_score ?></td>
													<td> <?php echo $user_attempt  ?></td>
												</tr>

											<?php } ?>

										</tbody>
									</table>
								</div>
								<div class="tab-pane <?php if ($quiz_category == 4) { ?> active <?php } ?>" id="contact">
									<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
										<thead>
											<tr>
												<!-- <th></th> -->
												<th>RANK</th>
												<th>NAME</th>
												<th>Contest Score</th>
												<th>Winning Amount </th>
											</tr>
										</thead>
										<tbody>
										<?php
											$studentMod = new Students;
											$get_contest_result = $studentMod->get_contest_result(4);
											$count4 = 0;
											$flag1 = 0;
											?>
											<?php foreach ($get_contest_result as $ranking) { ?>
												<?php $count4++; ?>
												<tr>
													<td><?php echo $count4;?></td>
													<?php
													$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
												
													if($ranking->user_id == $_SESSION['rexkod_oodles_student_id']) {
														$user_rank  = $count4;
														$user_score  = $ranking->total_score;
														$user_attempt = $ranking->total_amount;
														$user_name = $get_user_detail->f_name;
														$flag1 = 1;
													}
													$adminMod = new admins;
													$get_user_detail_from_auth = $adminMod->get_auth_detail($ranking->user_id);
													?>

													<td style="font-size:13px;"><?php echo strtoupper($get_user_detail_from_auth->name); ?></td>
													<td> <?php echo $ranking->total_score ?></td>
													
													<td><?php echo $ranking->total_amount ?></td>
												</tr>
											<?php } ?>
											<?php if ($count4 < 10) {
												for ($i = $count4; $i < 10; $i++) { ?>
													<tr>
														<td>--</td>
														<td>--</td>
														<td>--</td>
														<td>--</td>
													</tr>
												<?php 		}
												?>

											<?php 	} ?>
											<?php if ($flag1 == 1) { ?>
												<tr style="background-color:#0d6efd;height:15px;font-size:15px;">
													<td ><?php echo $user_rank ?></td>
<?php
													$get_user_detail_from_auth1 = $adminMod->get_auth_detail($_SESSION['rexkod_oodles_student_id']);
													?>
													<td><?php echo strtoupper($get_user_detail_from_auth1->name); ?></td>
													<td><?php echo $user_score ?></td>
													<td> <?php echo $user_attempt  ?></td>
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
</div>
<?php require APPROOT . '/views/inc_student/footer.php'; ?>