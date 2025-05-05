<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<?php
$adminMod = new Admins;
if(isset($_SESSION['quiz_category'])){
	$quiz_category = $_SESSION['quiz_category'];
}else{
	$quiz_category = 1;
}
?>
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
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Result</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/student/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Result</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel tab-border card-box">
					<header class="panel-heading panel-heading-gray custom-tab " >
						<ul class="nav nav-tabs">
							<li class="nav-item"><a href="#home" data-bs-toggle="tab" <?php if($quiz_category==1){ ?>class="active" <?php } ?>>Practice</a>
							</li>
							<!-- <li class="nav-item"><a href="#about" data-bs-toggle="tab" <?php if($quiz_category==2){ ?>class="active" <?php } ?>>Merit</a>
							</li>
							<li class="nav-item"><a href="#profile" data-bs-toggle="tab" <?php if($quiz_category==3){ ?>class="active" <?php } ?>>Rapid Fire</a>
							</li> -->
							<li class="nav-item"><a href="#contact" data-bs-toggle="tab" <?php if($quiz_category==4){ ?>class="active" <?php } ?>>Contest</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane <?php if($quiz_category==1){ ?> active <?php } ?>" id="home">
							<div class="table-responsive">

							
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<!-- <th></th> -->
											<th> Quiz Name </th>
											<th> Points Earned</th>
											<th> Coins Earned</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Date</th>
											<th> Time</th>
								
										</tr>
									</thead>

									<tbody>
										<?php $quiz_score_practice = $adminMod->get_particular_quiz_result_by_user_id(1) ?>
										<?php foreach ($quiz_score_practice as $quiz_score) { ?>
											<tr class="odd gradeX">
												<?php
												$quiz_id = $quiz_score->quiz_id;

												$studentMod = new Students;
												$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);
												?>
												<td class="left"><?php echo $get_quiz_detail->name; ?></td>
												<td class="left"><?php 
												
												if(empty($quiz_score->coins_earned)){ echo "0";}else{
													echo (round(($quiz_score->coins_earned),2));
												}
												?></td>

												<?php $coins1 = $quiz_score->coins_earned;
												$coins1 = intval($coins1);
												?>
												<td class="left"><?php echo (($coins1*5)/100); ?></td>
												<td class="left" style=<?php if($quiz_score->pass==0){ ?>color:#FF0000; <?php }else{ ?>
													color:#1e921e;
											<?php 	} ?>><?php echo round($quiz_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_score->current_attempt ?></td>
												

												<td class="left"><?php echo date('d/m/y', strtotime($quiz_score->created_by)) ?></td>
												<td class="left"><?php echo date('H:i:s a', strtotime($quiz_score->created_by)) ?></td>

										

											</tr>
										<?php } ?>

									</tbody>
								</table>
								</div>
							</div>
							<div class="tab-pane <?php if($quiz_category==2){ ?> active <?php } ?>" id="about">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<!-- <th></th> -->
											<th>Quiz Name</th>
											<th> Points</th>
											<th> Coins Earned</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Date</th>
											<th> Time</th>
											<th> Cost</th>
										</tr>
									</thead>

									<tbody>
										<?php $quiz_score_practice = $adminMod->get_particular_quiz_result_by_user_id(2) ?>
										<?php foreach ($quiz_score_practice as $quiz_score) { ?>
											<tr class="odd gradeX">

											<?php
												$quiz_id = $quiz_score->quiz_id;

												$studentMod = new Students;
												$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);

												?>
												<td class="left"><?php echo $get_quiz_detail->name; ?></td>

												<td class="left"><?php 
												if(empty($quiz_score->coins_earned)){ echo "0";}else{
													echo (round(($quiz_score->coins_earned),2));
												}
												?></td>
												<?php $coins2 = $quiz_score->coins_earned;
												$coins2 = intval($coins2);?>
												<td class="left"><?php echo (($coins2*5)/100); ?></td>
												<td class="left" style=<?php if($quiz_score->pass==0){ ?>color:#FF0000; <?php }else{ ?>
													color:#1e921e;
											<?php 	} ?>><?php echo round($quiz_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_score->current_attempt ?></td>

												<td class="left"><?php echo date('d/m/y', strtotime($quiz_score->created_by)) ?></td>
												<td class="left"><?php echo date('H:i:s a', strtotime($quiz_score->created_by)) ?></td>

												
												<td class="left">
													<i class="fa fa-inr"></i><?php
																				$get_quiz_detail = $adminMod->get_single_quizes_i($quiz_score->quiz_id);
																				echo $get_quiz_detail->quiz_cost;
																				?>
												</td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
								</div>
							</div>
							<div class="tab-pane <?php if($quiz_category==3){ ?> active <?php } ?>" id="profile">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<th> Quiz Name </th>
											<th> Points</th>
											<th> Coins Earned</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Date</th>
											<th> Time</th>
											<th> Cost</th>
										</tr>
									</thead>

									<tbody>
										<?php $quiz_score_practice = $adminMod->get_particular_quiz_result_by_user_id(3) ?>
										<?php foreach ($quiz_score_practice as $quiz_score) { ?>
											<tr class="odd gradeX">
											<?php
												$quiz_id = $quiz_score->quiz_id;

												$studentMod = new Students;
												$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);

												?>
												<td class="left"><?php echo $get_quiz_detail->name; ?></td>
												<td class="left"><?php
												
												if(empty($quiz_score->coins_earned)){ echo "0";}else{
													echo (round(($quiz_score->coins_earned),2));
												}
												?></td>
												
												<?php $coins3 = $quiz_score->coins_earned;
												$coins3  = intval($coins3); ?>
												<td class="left"><?php echo round((($coins3*5)/100),2); ?></td>
												<td class="left" style=<?php if($quiz_score->pass==0){ ?>color:#FF0000; <?php }else{ ?>
													color:#1e921e;
											<?php 	} ?>><?php echo round($quiz_score->score_per, 2) ?>%</td>
												<td class="left"><?php echo $quiz_score->current_attempt ?></td>

												<td class="left"><?php echo date('d/m/y', strtotime($quiz_score->created_by)) ?></td>
												<td class="left"><?php echo date('H:i:s a', strtotime($quiz_score->created_by)) ?></td>


												
												<td class="left">
													<i class="fa fa-inr"></i><?php
																				$get_quiz_detail = $adminMod->get_single_quizes_i($quiz_score->quiz_id);
																				echo $get_quiz_detail->quiz_cost;
																				?>
												</td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
							</div>
							<div class="tab-pane <?php if($quiz_category==4){ ?> active <?php } ?>" id="contact">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<!-- <th></th> -->
											<th> Quiz Name</th>
											<th> Coins Earned</th>
											<th> % Scored</th>
											<th> Attempt</th>
											<th> Date</th>
											<th> Cost</th>
										</tr>
									</thead>
									<tbody>
										<?php $quiz_score_practice = $adminMod->get_particular_quiz_result_by_user_id(4) ?>
										<?php foreach ($quiz_score_practice as $quiz_score) { ?>
											<tr class="odd gradeX">
												<?php
												$quiz_id = $quiz_score->quiz_id;
												$studentMod = new Students;
												$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);
												?>
												<td class="left"><?php echo ucwords($get_quiz_detail->name); ?></td>
												<td class="left"><?php 
												
												if($quiz_score->coins_earned==null || $quiz_score->coins_earned=''){
													echo "0";
												}else{
													echo ($quiz_score->coins_earned);
												}
											 ?></td>
												<td class="left" style=<?php if($quiz_score->pass==0){ ?>color:#FF0000; <?php }else{ ?>
													color:#1e921e.;
											<?php 	} ?>><?php echo round($quiz_score->score_per) ?>%</td>

												<td class="left"><?php echo $quiz_score->current_attempt ?></td>

												<td class="left"><?php echo date('d/m/y', strtotime($quiz_score->created_by)) ?></td>

											
												<td class="left">
													<i class="fa fa-inr"></i><?php





																				$get_quiz_detail = $adminMod->get_single_quizes_i($quiz_score->quiz_id);

																				$contest_prize = $adminMod->get_contest_prize_calculations($get_quiz_detail->prize_calc_data_id);
																				
																				echo $contest_prize->entry_fee;

																				
																				?>
												</td>

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
<?php unset($_SESSION['quiz_category']); ?>
<?php require APPROOT . '/views/inc_student/footer.php'; ?>