<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
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
.visible {
    width: auto;
}
.container{
	padding-left: 0;
	padding-right: 0;
}
div.bhoechie-tab-container {
	margin-left: 0 !important;
	padding-left: 0; 	
}
.row>*{
	padding-right:0;
}
	}
	.info-box {
		width: 92%;
	}
	.card-body {
		/* padding:0; */
	}
	div.bhoechie-tab-content {
    
    padding-left: 0 !important;
    
}
</style>
<?php

$get_all_quiz = $data['get_my_quizes'];
$studentMod = new Students();
$adminMod = new Admins();
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">My Quizzes</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/student/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Quizzes</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li class="active">Result</li> -->
				</ol>
			</div>
		</div>


		<?php if (count($get_all_quiz) > 0) { ?>


			<div class="card-body">
				<!-- start course list -->
				<div class="row">
					<?php
					$count = 0;
					foreach ($get_all_quiz as $quiz) {
						$count++;
						$quiz = $studentMod->get_quiz_detail($quiz->quiz_id);
						if ($quiz->question != null || $quiz->question != '') {
					?>
							<?php $studentMod = new Students();
							$get_count = $studentMod->get_no_of_attempt($quiz->id);
							?>
							<div class="col-lg-3 col-md-6 col-12 col-sm-6">
								<div class="blogThumb" style="height:580px;">
									<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" style="height:200px;width:100%;"></div>
									<div class="white-box" style="padding:3px;">
										<div class="text-muted"><span class="m-r-10" style="font-size:14px;">
												<?php $out = strlen($quiz->name) > 33 ? substr($quiz->name, 0, 33) . "..." : $quiz->name; ?>
												<h5 style="color:black;"><?php echo strtoupper($out); ?></h5>
											</span></div>
										<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
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
												<span class="m-r-10" style="float:right;font-size:12px;">
													END: <span style="color:red;"><?php echo $quiz->end_time; ?></span>
												</span>

											</div>
										<?php } ?>
										<?php if ($quiz->category == 4) { ?>
											<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
													TOTAL SLOTS: <span style="color:green;"></span>
												</span>
												<span class="m-r-10" style="float:right;font-size:12px;">
													<span style="color:green;">

														<a href="<?php echo URLROOT ?>/admin/view_participants_for_contest_quiz/<?php echo $quiz->id; ?>"><?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
																																							echo $contest_prize->no_of_participants;
																																							?></a>
													</span>
												</span>
											</div>
										<?php } ?>
										<?php if ($quiz->category == 4) { ?>
											<div class="text-muted"><span class="m-r-10" style="font-size:12px;">
													SLOT AVAILABLE: <span style="color:green;"></span>
												</span>
												<span class="m-r-10" style="float:right;font-size:12px;">
													<span style="color:green;">

														<?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
														if (isset($contest_prize->no_of_participants)) {
															$total_participant_allowed =  $contest_prize->no_of_participants;
														}

														$get_slot_booked =     $adminMod->get_contest_registration($quiz->id);
														$slot_avialable = $total_participant_allowed - count($get_slot_booked);
														echo $slot_avialable;
														?>
													</span>
												</span>
											</div>
										<?php } ?>


										<div class="text-muted"><span class="m-r-10" style="color:black;font-size:12px;">
												<?php if ($quiz->category == 1) { ?>
													<i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
												<?php } elseif ($quiz->category == 2) { ?>
													<i class="fa fa-coins"></i>&nbsp; <?php echo $quiz->quiz_cost ?>

												<?php } elseif ($quiz->category == 3) { ?>
													<i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
												<?php } elseif ($quiz->category == 4) { ?>
													<!-- <a href="<?php echo URLROOT ?>/student/contest_prize_detail/<?php echo $quiz->prize_calc_data_id; ?>"> -->
													<button type="button" class="btn btn-sm rounded-pill btn-outline-info mb-2"><i class="fa fa-inr"></i>&nbsp;
														<?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
														echo $contest_prize->entry_fee; ?>

													</button>
													<!-- </a> -->


												<?php	}
												?>
												<!-- <?php if ($quiz->duration_min <= 9) {
															echo "00:0";
														} ?><?php echo $quiz->duration_min ?>:<?php if ($quiz->duration_sec == 0) {
																									echo "0";
																								} elseif ($quiz->duration_sec <= 9) {
																									echo "0";
																								} ?><?php echo $quiz->duration_sec ?><span>&nbsp;min</span> -->

												<span style="font-size:12px;float:right;"><i class="fa fa-clock"></i>&nbsp;<?php echo intval(($quiz->duration_min)) * 60 + intval($quiz->duration_sec); ?>&nbsp;sec</span>
												<!-- </span> -->
												<!-- <a class="text-muted m-l-10" href="#"><i class="fa fa-heart-o"></i> 56</a> -->
												<!-- </div> -->
												<!-- <div class="row">
												
													<div class="col-md-12 col-sm-12"> -->

												<?php if ($quiz->category == 1) { ?>
													<?php $studentMod = new Students();
													$check_pass_status = $studentMod->check_quiz_pass_status($quiz->id);

													if (($get_count < $quiz->attempt) || $quiz->attempt == 0) { ?>

														<?php
														$get_student_detail = $data['get_current_student']; ?>

														<?php
														$quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
														$quiz_end_datetime = date('Y-m-d H:i:s', strtotime($quiz->end_date . ' ' . $quiz->end_time));
														$present_datetime = date('Y-m-d H:i:s');

														if (($present_datetime >= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>



															<a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $quiz->id ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Play Now</a>


														<?php } elseif (($present_datetime <= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Coming Soon</a>
														<?php } else { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Expired</a>
														<?php }
														?>
													<?php
													} else { ?>
														<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Attempts Finished</a>
													<?php
													}
													?>

												<?php } elseif ($quiz->category == 2) { ?>

													<?php if ($get_count < 2) { ?>


														<?php
														$get_student_detail = $data['get_current_student']; ?>

														<?php
														$quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
														$quiz_end_datetime = date('Y-m-d H:i:s', strtotime($quiz->end_date . ' ' . $quiz->end_time));
														$present_datetime = date('Y-m-d H:i:s');

														if (($present_datetime >= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
															<a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $quiz->id ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Play Now</a>
														<?php } elseif (($present_datetime <= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Coming Soon</a>
														<?php } else { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Expired</a>
														<?php }
														?>



													<?php
													} else { ?>
														<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Already Played</a>
													<?php
													}

													?>

												<?php } elseif ($quiz->category == 4) { ?>
													<?php
													$check_contest_registration = $studentMod->get_contest_registration_detail($quiz->id, $_SESSION['rexkod_oodles_student_id']);
													$get_single_student = $studentMod->get_single_student($_SESSION['rexkod_oodles_student_id']);

													$quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
													$quiz_end_datetime = date('Y-m-d H:i:s', strtotime($quiz->end_date . ' ' . $quiz->end_time));
													$present_datetime = date('Y-m-d H:i:s');
													if ($get_count < 1) { ?>


														<?php
														$get_student_detail = $data['get_current_student']; ?>

														<?php


														if (($present_datetime >= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
															<?php if ($check_contest_registration) { ?>

																<?php
																$get_contest_reg_quiz_status = $studentMod->get_contest_reg_quiz_status($quiz->id);
																if (!$get_contest_reg_quiz_status) { ?>


																	<a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $quiz->id ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Play Now</a>
																<?php } else { ?>
																	<a href="" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Quiz Already Taken, Wait for Result</a>
																<?php } ?>

															<?php } else { ?>
																<a href="" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Registration Closed</a>
															<?php 	} ?>
														<?php } elseif (($present_datetime <= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
															<?php if ($check_contest_registration) { ?>
																<a href="" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Starts In
																	<?php
																	$quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
																	echo '<script>var quizStartTime' . 'b' . $count . ' = new Date("' . $quiz_start_datetime . '");</script>';
																	echo '<span id="timer' . 'b' . $count . '"></span>';
																	echo '<script>
																	 function updateTimer' . 'b' . $count . '() {
																		 var now = new Date();
																		 var remainingTime = quizStartTime' . 'b' . $count . ' - now;
																		 if (remainingTime < 0) {
																			 // Quiz has already started
																			 document.getElementById("timer' . 'b' . $count . '").innerHTML = "Quiz has started";
																		 } else {
																			 // Calculate remaining time
																			 var seconds = Math.floor(remainingTime / 1000);
																			 var minutes = Math.floor(seconds / 60);
																			 var hours = Math.floor(minutes / 60);
																			 var days = Math.floor(hours / 24);
																 
																			 hours %= 24;
																			 minutes %= 60;
																			 seconds %= 60;
																 
																			 // Output remaining time to HTML element
																			 document.getElementById("timer' . 'b' . $count . '").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
																		 }
																	 }
																 
																	 setInterval(updateTimer' . 'b' . $count . ', 1000);
																 </script>';

																	?>
																</a>

																<?php } else {
																if ($get_single_student) { ?>
																	<a href="<?php echo URLROOT; ?>/student/initiate_contest_registration/<?php echo $quiz->id ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Pre-Register Yourself!</a>
																<?php } else { ?>
																	<a href="<?php echo URLROOT; ?>/student/initiate_session_for_preregister/<?php echo $quiz->id; ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Complete Profile Detail to Register</a>


																<?php } ?>
															<?php } ?>
														<?php } else { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Registration Closed</a>
														<?php }
														?>
													<?php
													} else { ?>
														<?php if ($quiz->disperse == 1) { ?>
															<a href="<?php echo URLROOT; ?>/student/generate_detail/<?php echo $quiz->id; ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">View Result</a>
														<?php } else { ?>
															<a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Waiting for Result</a>
													<?php
														}
													}
													?>
													<center>
														<a href="<?php echo URLROOT ?>/student/contest_prize_detail/<?php echo $quiz->id; ?>/<?php echo $quiz->prize_calc_data_id; ?>" target="_blank">
															<button type="button" class="btn btn-sm rounded-pill btn-outline-info mb-0" style="color:#000000;background-color:#66fc6f;">PRIZE POOL: <i class="fa fa-inr"></i>&nbsp;

																<?php
																$end_datetime = $quiz->start_date . ' ' . $quiz->start_time;

																// convert end datetime to UNIX timestamp
																$end_timestamp = strtotime($end_datetime);

																// calculate the timestamp for 10 minutes before the end time
																$ten_minutes_before = $end_timestamp - (10 * 60);

																// get the current UNIX timestamp
																$current_timestamp = time();

																// check if the current time is less than 10 minutes before the end time
																if ($current_timestamp  < $ten_minutes_before) {
																	// the button should be enabled

																	$contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
																	echo $contest_prize->prize_pool_amount;
																} else {
																	// $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
																	// echo ($contest_prize->entry_fee * count($get_slot_booked) * (100 - $contest_prize->expenses)) / 100;
																	// addjusted prize pool data

																	// assuming that $contest_prize_data is already defined and contains the JSON object

																	// decode the JSON object into a PHP associative array
																	$prize_data = json_decode($contest_prize->levels_data, true);
																	$count_of_quiz_registration = count($get_slot_booked);


																	// initialize the counters
																	$start = 1;
																	$end = 0;
																	$total_amount = 0;

																	// iterate over the prize levels and add up the number of winners
																	foreach ($prize_data as $level) {
																		$end += $level['no_of_winners'];
																		$individual_amount = 'Rs ' . $level['individual_amount'];

																		// combine end date and time into a single string
																		$end_datetime = $quiz->start_date . ' ' . $quiz->start_time;
																		$start_datetime = $quiz->end_date . ' ' . $quiz->end_time;


																		// convert end datetime to UNIX timestamp
																		$end_timestamp = strtotime($end_datetime);

																		// calculate the timestamp for 10 minutes before the end time
																		$ten_minutes_before = $end_timestamp - (10 * 60);

																		// get the current UNIX timestamp
																		$current_timestamp = time();

																		// check if the current time is less than 10 minutes before the end time
																		if ($current_timestamp  < $ten_minutes_before) {
																			// the button should be enabled
																			$individual_amount_int = intval($level['individual_amount']);
																		} else {
																			// the button should be disabled
																			$count_of_quiz_registration = count($get_slot_booked);
																			$get_amount_registered_for_quiz = $count_of_quiz_registration * $contest_prize->entry_fee;
																			if ($contest_prize->no_of_participants != $count_of_quiz_registration) {
																				$individual_amount_int =  ($get_amount_registered_for_quiz * (100 - $contest_prize->expenses) * intval($level['prize_amount_percentage'])) / ($level['no_of_winners'] * 100 * 100);
																			} else {
																				$individual_amount_int = intval($level['individual_amount']);
																			}
																			// $individual_amount_int = floor($individual_amount_int);
																		}

																		// calculate the total amount
																		$total_amount += intval($level['no_of_winners']) * $individual_amount_int;

																		// update the starting point for the next level
																		$start = $end + 1;
																	}

																	echo  $total_amount;
																} ?>
															</button>
														</a>
													</center>
												<?php
												}
												?>
											</span>
										</div>
										<!-- </div>
												</div> -->
										<!-- <h6 class="m-t-20 m-b-20">Notie:</h6> -->

										<p><i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#exampleModalCenter">
												<span style="color:#32c5d2;">View T&C</span>
											</a>
											<span class="tool" data-tip="<?php if ($quiz->category == 1) { ?>
													<?php $studentMod = new Students();
																				$check_pass_status = $studentMod->check_quiz_pass_status($quiz->id);
																				if (empty($check_pass_status)) { ?>
												<?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.
													<?php
																				} else { ?>
												 <?php echo strtoupper('You have already cleared the test, you can Replay the quiz') ?> 
													<?php } ?>
													<?php if (($get_count < $quiz->attempt) || $quiz->attempt == 0) { ?>
													<?php
																				}
													?>
												<?php } elseif ($quiz->category == 2) { ?>
													<?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.
													<?php if ($get_count < 2) { ?>
														<?php
																					$get_student_detail = $data['get_current_student'];
														?>
													<?php
																				}
													?>
												<?php } elseif ($quiz->category == 3) { ?>
													<?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.
													<?php if ($get_count < 8) { ?>
														<?php
																					$get_student_detail = $data['get_current_student'];
														?>
													<?php
																				}
													?>
												<?php } elseif ($quiz->category == 4) { ?>
													Please refresh the page at the start time of the quiz.
													<?php if ($get_count < 1) { ?>
														<?php
																					$get_student_detail = $data['get_current_student'];
														?>
												<?php
																				}
																			}
												?>" style='float:right;'><i class='fa fa-info-circle'></i></span>

										</p>
										<!-- <p><span><i class='ti-alarm-clock'></i>Attempted:

														<?php echo ($get_count); ?><span>&nbsp;times</span></span>
												</p> -->

										<hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
										<p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?></p>
									</div>
								</div>
							</div>
					<?php }
					}
					?>

				</div>







			</div>
		<?php } else { ?>
			<style>
				.card {
					border: 1px solid #ccc;
					box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
					max-width: 400px;
					margin: auto;
					text-align: center;
					padding: 20px;
				}

				.card p {
					font-size: 18px;
					line-height: 1.5;
				}
			</style>
			<div class="card">
				<p>No quiz registered. Please visit Contest Quiz Section to enroll.</p>
			</div>

		<?php } ?>


	</div>
</div>
<!-- end page content -->
<!-- Modal -->
<div class="modal show " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">View T&C</h5>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
			</div>
			<div class="modal-body">
				<div class="form-group">
					<!-- <h2 class="form-title">Login</h2><br> -->
					<div class="">
						<ol style="font-size:12px;">
							<li>
								PARTICIPANTS FROM ALL OVER THE WORLD AND
								OF ALL NATIONALITIES ARE ELIGIBLE TO ENTER THE QUIZ.
							</li>
							<li>
								THE QUIZ WILL BE AVAILABLE FOR ALL
								CONTESTANTS FOR THE PERIOD MENTIONED ACCORDINGLY IN THE QUIZ, IN WHICH THEY
								HAVE TO SCORE/ACHEIVE MINIMUM/PASS CRITERIA
							</li>
							<li>
								THESE QUESTIONS WILL BE BASED ON NCERT,
								CBSE, STATE AND BOARDS CURRICULUM. THE QUIZ WILL START AS SOON AS THE
								PARTICIPANT CLICKS THE START QUIZ BUTTON.
							</li>
							<li>
								YOU WILL BE REQUIRED TO PROVIDE YOUR
								NAME, CLASS EMAIL ADDRESS, TELEPHONE NUMBER AND POSTAL ADDRESS. BY SUBMITTING
								YOUR CONTACT DETAILS, YOU WILL GIVE CONSENT TO THESE DETAILS BEING USED FOR THE
								PURPOSE OF THE QUIZ. YOU NEED TO COMPLETE THE PROFILE TO GET MATCHED QUIZ /
								POCKET SCHOLARSHIPS.
							</li>
							<li>
								DISCOVERY/DETECTION/NOTICING OF USE OF
								ANY UNFAIR/SPURIOUS MEANS/ MALPRACTICES, INCLUDING BUT NOT LIMITED TO
								IMPERSONATION, DOUBLE PARTICIPATION ETC. DURING THE PARTICIPATION IN THE QUIZ,
								WILL RESULT IN THE PARTICIPATION BEING DECLARED NULL AND VOID AND HENCE,
								REJECTED. THE ORGANIZERS OF THE QUIZ
								COMPETITION OR ANY AGENCY ACTING ON THEIR BEHALF RESERVES THE RIGHT IN THIS
								REGARD.
							</li>
							<li>
								ONCE SUBMITTED AN ENTRY CANNOT BE
								WITHDRAWN.
							</li>
							<li>
								ENTRY
								FEES IN CASE OF A PAID QUIZ, ONCE PAID IS NON-REFUNDABLE.
							</li>
							<li>
								ORGANIZERS WILL NOT ACCEPT ANY
								RESPONSIBILITY FOR ENTRIES THAT ARE LOST, ARE LATE OR INCOMPLETE OR HAVE NOT
								BEEN TRANSMITTED DUE TO COMPUTER ERROR OR ANY OTHER ERROR BEYOND THE
								ORGANIZER’S REASONABLE CONTROL. PLEASE NOTE PROOF OF SUBMISSION OF THE ENTRY IS
								NOT PROOF OF RECEIPT OF THE SAME.
							</li>
							<li>
								IN THE EVENT OF UNFORESEEN
								CIRCUMSTANCES, ORGANIZERS RESERVE THE RIGHT TO AMEND OR WITHDRAW THE QUIZ AT
								ANY TIME. FOR THE AVOIDANCE OF DOUBT THIS INCLUDES THE RIGHT TO AMEND THESE
								TERMS AND CONDITIONS.
							</li>
							<li>

								THE
								PARTICIPANT SHALL ABIDE BY ALL THE RULES AND REGULATIONS OF PARTICIPATING IN
								THE QUIZ FROM TIME TO TIME.
							</li>
							<li>
								ORGANISERS
								RESERVE ALL RIGHTS TO DISQUALIFY OR REFUSE PARTICIPATION TO ANY PARTICIPANT IF
								THEY DEEM PARTICIPATION OR ASSOCIATION OF ANY PARTICIPANT WHICH IS DETRIMENTAL
								TO THE QUIZ OR THE ORGANIZERS OR PARTNERS OF THE QUIZ. THE REGISTRATIONS SHALL
								BE VOID IF THE INFORMATION RECEIVED BY THE ORGANIZERS IS ILLEGIBLE, INCOMPLETE,
								DAMAGED, FALSE OR ERRONEOUS.
							</li>
							<li>
								ORGANISER’S
								DECISION ON THE QUIZ SHALL BE FINAL AND BINDING AND NO CORRESPONDENCE WILL BE
								ENTERED INTO REGARDING THE SAME.
							</li>
							<li>
								THESE
								TERMS AND CONDITIONS SHALL BE GOVERNED BY THE LAWS OF THE INDIAN JUDICIARY.
							</li>
							<li>
								BY
								ENTERING THE QUIZ, THE PARTICIPANT ACCEPTS AND AGREES TO BE BOUND BY THESE
								TERMS AND CONDITIONS, MENTIONED ABOVE.
							</li>
						</ol>
					</div>
				</div>

				<div class="form-group">
					<div class="">

					</div>
				</div>
				<input type="text" readonly class="form-control" name="quiz_id" id="add_quiz_id" hidden>
				<div class="form-group form-button" style="text-align: center;">

				</div>


				<div class="social-login" style="text-align: center;">
					<br>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc_student/footer.php'; ?>