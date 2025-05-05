<?php require APPROOT . '/views/inc_school/header.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style>
	tr:hover {
		background-size: 100% 100%;
		transform: scale(1.2, 1.2);
		transform-origin: center;
		background-color: yellow;
	}


	.tool {
		cursor: help;
		position: relative;
	}

	.tool::before,
	.tool::after {
		position: absolute;
		left: 50%;
		opacity: 0;
		z-index: -100;
	}

	.tool:hover::before,
	.tool:focus::before,
	.tool:hover::after,
	.tool:focus::after {
		opacity: 1;
		z-index: 100;
	}

	.tool::before {
		border-style: solid;
		border-width: 1em .75em 0 .75em;
		border-color: #3e474f transparent transparent transparent;
		bottom: 100%;
		margin-left: -.5em;
		content: " ";
	}

	.tool::after {
		background: #32c5d2;
		border-radius: .25em;
		bottom: 180%;
		color: white;
		width: 17.5em;
		padding: 1em;
		margin-left: -8.75em;
		content: attr(data-tip);
	}
</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">

		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="w-100">

						<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab">
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a href="#home-2" data-bs-toggle="tab"> <i class="fa fa-home"></i>
											</a>
										</li>
										<li class="nav-item">
											<a href="#about-2" data-bs-toggle="tab" class="active">
												<i class="fa fa-user"></i> Practice
											</a>
										</li>
										<li class="nav-item">
											<a href="#contact-2" data-bs-toggle="tab">
												<i class="fa fa-envelope-o"></i> Rapid Fire
											</a>
										</li>
									</ul>
								</header>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane " id="home-2">Coming Soon</div>
										<div class="tab-pane active" id="about-2">
                                        <div class="row">
								<?php foreach ($data['get_all_quiz1'] as $quiz) { ?>
									
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb" style="height:480px;">
											<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" style="height:200px;width:100%;"></div>
											<div class="white-box" style="padding:3px;">
												<div class="text-muted"><span class="m-r-10" style="font-size:14px;">
											<?php 	$out = strlen($quiz->name) > 33 ? substr($quiz->name,0,33)."..." : $quiz->name; ?>
														<h5 style="color:black;"><?php echo strtoupper($out); ?></h5>
													</span></div>
												<div class="text-muted"><span class="m-r-10" style="font-size:12px;" >
														FROM: <span style="color:green;"><?php echo date("d/m/y", strtotime($quiz->start_date)) ?></span>
													</span>
													<span class="m-r-10" style="float:right;font-size:12px;">
														TO: <span style="color:red;"><?php echo date("d/m/y", strtotime($quiz->end_date)) ?></span>
													</span>

												</div>
												<?php if (isset($quiz->start_time) && isset($quiz->end_time)) { ?>
													<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
															START: <span style="color:green;"><?php echo $quiz->start_time; ?></span>
														</span>
														<span class="m-r-10"  style="float:right;font-size:12px;">
															END: <span style="color:red;"><?php echo $quiz->end_time; ?></span>
														</span>

													</div>
												<?php } ?>
											


												<div class="text-muted"><span class="m-r-10" style="color:black;font-size:12px;">
													<?php if ($quiz->category == 1) { ?>
															<i class="fa fa-coins"></i>&nbsp;	<?php echo $quiz->quiz_cost ?> 
												<?php } elseif ($quiz->category == 2) { ?>
													<i class="fa fa-coins"></i>&nbsp;		<?php echo $quiz->quiz_cost ?> 	
													
												<?php } elseif ($quiz->category == 3) { ?>
													<i class="fa fa-coins"></i>&nbsp;		<?php echo $quiz->quiz_cost ?>
												<?php } elseif ($quiz->category == 4) { ?>
													<i class="fa fa-inr"></i>&nbsp;		<?php echo $quiz->quiz_cost ;?>	
											<?php	}
												?> 
														<!-- <?php if ($quiz->duration_min <= 9) {
																															echo "00:0";
																														} ?><?php echo $quiz->duration_min ?>:<?php if ($quiz->duration_sec == 0) {
																														echo "0";
																													} elseif ($quiz->duration_sec <= 9) {
																														echo "0";
																													} ?><?php echo $quiz->duration_sec ?><span>&nbsp;min</span> -->
																												
																													<span style="font-size:12px;float:right;"><?php echo intval(($quiz->duration_min))*60 + intval($quiz->duration_sec); ?>&nbsp;sec</span>
														<!-- </span> -->
														<!-- <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 56</a> -->
														<!-- </div> -->
														<!-- <div class="row">
												
													<div class="col-md-12 col-sm-12"> -->
													<a href="<?php echO URLROOT?>/school/quiz_result_student_wise/<?php echo $quiz->id;?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">View Result</a>
													
													</span>
												</div>
												<!-- </div>
												</div> -->
												<!-- <h6 class="m-t-20 m-b-20">Notie:</h6> -->

												<p><i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#exampleModalCenter">
												<span style="color:#32c5d2;">View T&C</span>
													</a>
												

												</p>
												


												<hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
												<p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?></p>
											</div>
										</div>
									</div>
								<?php } ?>

							</div>
										</div>
										<div class="tab-pane " id="contact-2">
                                        <div class="row">
								<?php foreach ($data['get_all_quiz2'] as $quiz) { ?>
									
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb" style="height:480px;">
											<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" style="height:200px;width:100%;"></div>
											<div class="white-box" style="padding:3px;">
												<div class="text-muted"><span class="m-r-10" style="font-size:14px;">
											<?php 	$out = strlen($quiz->name) > 33 ? substr($quiz->name,0,33)."..." : $quiz->name; ?>
														<h5 style="color:black;"><?php echo strtoupper($out); ?></h5>
													</span></div>
												<div class="text-muted"><span class="m-r-10" style="font-size:12px;" >
														FROM: <span style="color:green;"><?php echo date("d/m/y", strtotime($quiz->start_date)) ?></span>
													</span>
													<span class="m-r-10" style="float:right;font-size:12px;">
														TO: <span style="color:red;"><?php echo date("d/m/y", strtotime($quiz->end_date)) ?></span>
													</span>

												</div>
												<?php if (isset($quiz->start_time) && isset($quiz->end_time)) { ?>
													<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
															START: <span style="color:green;"><?php echo $quiz->start_time; ?></span>
														</span>
														<span class="m-r-10"  style="float:right;font-size:12px;">
															END: <span style="color:red;"><?php echo $quiz->end_time; ?></span>
														</span>

													</div>
												<?php } ?>
											


												<div class="text-muted"><span class="m-r-10" style="color:black;font-size:12px;">
													<?php if ($quiz->category == 1) { ?>
															<i class="fa fa-coins"></i>&nbsp;	<?php echo $quiz->quiz_cost ?> 
												<?php } elseif ($quiz->category == 2) { ?>
													<i class="fa fa-coins"></i>&nbsp;		<?php echo $quiz->quiz_cost ?> 	
													
												<?php } elseif ($quiz->category == 3) { ?>
													<i class="fa fa-coins"></i>&nbsp;		<?php echo $quiz->quiz_cost ?>
												<?php } elseif ($quiz->category == 4) { ?>
													<i class="fa fa-inr"></i>&nbsp;		<?php echo $quiz->quiz_cost ;?>	
											<?php	}
												?> 
														<!-- <?php if ($quiz->duration_min <= 9) {
																															echo "00:0";
																														} ?><?php echo $quiz->duration_min ?>:<?php if ($quiz->duration_sec == 0) {
																														echo "0";
																													} elseif ($quiz->duration_sec <= 9) {
																														echo "0";
																													} ?><?php echo $quiz->duration_sec ?><span>&nbsp;min</span> -->
																												
																													<span style="font-size:12px;float:right;"><?php echo intval(($quiz->duration_min))*60 + intval($quiz->duration_sec); ?>&nbsp;sec</span>
														<!-- </span> -->
														<!-- <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 56</a> -->
														<!-- </div> -->
														<!-- <div class="row">
												
													<div class="col-md-12 col-sm-12"> -->
													<a href="<?php echO URLROOT?>/school/quiz_result_student_wise/<?php echo $quiz->id;?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">View Result</a>
													
													</span>
												</div>
												<!-- </div>
												</div> -->
												<!-- <h6 class="m-t-20 m-b-20">Notie:</h6> -->

												<p><i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#exampleModalCenter">
												<span style="color:#32c5d2;">View T&C</span>
													</a>
												

												</p>
												


												<hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
												<p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?></p>
											</div>
										</div>
									</div>
								<?php } ?>

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

	</div>
</div>
</div>





<?php require APPROOT . '/views/inc_school/footer.php'; ?>