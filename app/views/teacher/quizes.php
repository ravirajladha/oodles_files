<?php require APPROOT . '/views/inc_teacher/header.php'; ?>
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
					<div class="state-overview">
						<div class="row">
							<?php if ($data['category'] != 1) { ?>

								<div class="col-lg-12 col-sm-6">
									<a href="<?php echo URLROOT ?>/teacher/quizes/1/0">
										<div class="overview-panel purple">
											<div class="symbol">
												<i class="fa fa-book"></i>
											</div>
											<div class="value white">
												<p class="sbold addr-font-h1" data-counter="counterup">PRACTICE</p>
												<!-- <p><?php echo $data['get_count_of_practice_quiz'] ?> QUIZES</p> -->
											</div>
										</div>
									</a>
								</div>

							<?php } ?>
							<?php if ($data['category'] != 2) { ?>

								<!-- <div class="col-lg-4 col-sm-6">
									<a href="<?php echo URLROOT ?>/teacher/quizes/2/0">
										<div class="overview-panel orange">
											<div class="symbol">
												<i class="fa fa-certificate"></i>
											</div>
											<div class="value white">
												<p class="sbold addr-font-h1" data-counter="counterup" data-value="14">MERIT </p>
												<p><?php echo $data['get_count_of_merit_quiz'] ?> QUIZES</p>
											</div>
										</div>
									</a>
								</div> -->

							<?php } ?>
							<?php if ($data['category'] != 3) { ?>

								<div class="col-lg-12 col-sm-6">
									<a href="<?php echo URLROOT ?>/teacher/quizes/3/0">
										<div class="overview-panel deepPink-bgcolor">
											<div class="symbol">
												<i class="fa fa-bolt"></i>
											</div>
											<div class="value white">
												<p class="sbold addr-font-h1" data-counter="counterup">RAPID FIRE</p>
												<!-- <p><?php echo $data['get_count_of_speed_quiz'] ?> QUIZES</p> -->
											</div>
										</div>
									</a>
								</div>

							<?php } ?>
							<?php if ($data['category'] != 4) { ?>

								<!-- <div class="col-lg-4 col-sm-6">
									<a href="<?php echo URLROOT ?>/teacher/quizes/4/0">
										<div class="overview-panel blue-bgcolor">
											<div class="symbol">
												<i class="fa fa-rupee"></i>
											</div>
											<div class="value white">
												<p class="sbold addr-font-h1" data-counter="counterup"> CONTEST</p>
												<span></span>
												<p><?php echo $data['get_count_of_contest_quiz'] ?> QUIZES</p>
											</div>
										</div>
									</a>
								</div> -->

							<?php } ?>
						</div>
					</div>
					<!-- end widget -->

					<div class="row">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">
									<?php if ($data['category'] == 1) {
										echo "Category: Practice";
									} elseif ($data['category'] == 2) {
										echo "Category: Merit";
									} elseif ($data['category'] == 3) {
										echo "Category: Rapid Fire";
									} elseif ($data['category'] == 4) {
										echo "Category: Contest";
									} ?>
								</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT?>/teacher/index">Teacher</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>

								<li class="active">Quiz</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="card-head">
										<header>Select Any Subject To View the Quiz</header>
									</div>
									<div class="card-body  row">
										<?php
										$teacherMod = New Teachers;
										$get_teacher_detail   = $teacherMod->get_teacher_detail();
										$each_teacher_subject =explode(',', $get_teacher_detail->subject);

										// foreach ($data['all_subject'] as $subject) {
											foreach($each_teacher_subject as $each_subject){ 
											$studentMod = new students;
											$get_subject_detail = $studentMod->get_school_subject($each_subject);
										?>

											<div class="col-lg-2">
												<a href="<?php echo URLROOT ?>/teacher/quizes/<?php echo $data['category'] ?>/<?php echo $get_subject_detail->id; ?>">
													<!-- Contact Chip -->
													<span class="mdl-chip mdl-chip--contact">
														<span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><?php echo implode('', array_map(function ($v) {
																																	return $v[0];
																																}, explode(' ',  $get_subject_detail->subject_name))); ?></span>
														<span class="mdl-chip__text"><?php echo $get_subject_detail->subject_name; ?></span>
													</span>
												</a>
											</div>
										<?php } ?>

									</div>
								</div>
							</div>
						</div>

						<div class="card-body">
							<!-- start course list -->
							<div class="row">
								<?php foreach ($data['get_all_quiz'] as $quiz) { ?>
									
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
													<a href="<?php echO URLROOT?>/teacher/view_quiz/<?php echo $quiz->id;?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Read More</a>
													
													</span>
												</div>
												<!-- </div>
												</div> -->
												<!-- <h6 class="m-t-20 m-b-20">Notie:</h6> -->

												<p>
													<span>
													<i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#exampleModalCenter">
												<span style="color:#32c5d2;">View T&C</span>
													</a>
													</span>
													<?php
													$present_date = date('Y-m-d');
													$present_date = date('Y-m-d', strtotime($present_date));
													//echo $present_date; // echos today! 
													$quiz_start_date = date('Y-m-d', strtotime($quiz->start_date));
													$quiz_end_date = date('Y-m-d', strtotime($quiz->end_date));
													?>
													<span style="float:right;">Scheduled:
														<?php if (($present_date >= $quiz_start_date) && ($present_date <= $quiz_end_date)) {
															echo "Running";
														} elseif (($present_date <= $quiz_start_date) && ($present_date <= $quiz_end_date)) {
															echo "Coming Soon";
														} else {
															echo "Expired";
														}
														?>

													</span>
													<span style="float:right;">
													
												<?php if($quiz->status==1){ ?><span style="color:#1AA238;">
												
												Status: Approved</span>
												<?php }else{ ?>
													<span style="color:#EB531F;">
												
												Status: Pending</span>
												<?php } ?>
													</span>

												</p>
												<p></p>
												


												<hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
												<p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?>
												<span style="float:right;font-size:10px;">Scheduled:
														<?php if (($present_date >= $quiz_start_date) && ($present_date <= $quiz_end_date)) {
															echo "Running";
														} elseif (($present_date <= $quiz_start_date) && ($present_date <= $quiz_end_date)) {
															echo "Coming Soon";
														} else {
															echo "Expired";
														}
														?>

													</span></p>

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


<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>