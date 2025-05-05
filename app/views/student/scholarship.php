<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<?php $studentMod = new students;
$scholarship_id = $data['scholarship_id'];
$get_scholarship_detail  = $data['get_single_scholarship'];
$check_scholarship_eligiblity = $data['check_scholarship_eligibility_status'];
$get_coprorate_detail = $studentMod->get_corporate_detail($get_scholarship_detail->offered_by);
$get_scholarship_application = $data['get_scholarship_application'];
?>

<!-- $checking the percentage of profile added -->

<?php $student = $data['get_current_student'] ?>
<?php
$count = 0;
if (!empty($data['get_current_student'])) {
	if ($student->f_name != Null) {
		$count++;
	}
	if ($student->l_name != Null) {
		$count++;
	}
	if ($student->phone_no != Null) {
		$count++;
	}
	if ($student->whatsapp_no != Null) {
		$count++;
	}
	if ($student->dob != Null) {
		$count++;
	}
	if ($student->aadhar != Null) {
		$count++;
	}
	if ($student->gender != Null) {
		$count++;
	}
	if ($student->comm_state != Null) {
		$count++;
	}
	if ($student->religion != Null) {
		$count++;
	}
	if ($student->category != Null) {
		$count++;
	}
	if ($student->father_name != Null) {
		$count++;
	}
	if ($student->f_email_id != Null) {
		$count++;
	}
	if ($student->f_aadhar != Null) {
		$count++;
	}
	if ($student->f_phone != Null) {
		$count++;
	}
	if ($student->father_aadhar_doc != Null) {
		$count++;
	}
	if ($student->mother_name != Null) {
		$count++;
	}
	if ($student->m_email_id != Null) {
		$count++;
	}
	if ($student->m_aadhar != Null) {
		$count++;
	}
	if ($student->m_phone != Null) {
		$count++;
	}
	if ($student->mother_aadhar_doc != Null) {
		$count++;
	}
	if ($student->siblings != Null) {
		$count++;
	}
	if ($student->course != Null) {
		$count++;
	}
	if (($student->academic_name != Null)) {
		$count++;
	}

	if ($student->annual_income != Null) {
		$count++;
	}
	if ($student->physically != Null) {
		$count++;
	}
	if ($student->student_image != Null) {
		$count++;
	}
	if ($student->comm_address != Null) {
		$count++;
	}
	if ($student->comm_village != Null) {
		$count++;
	}
	if ($student->comm_block != Null) {
		$count++;
	}
	if ($student->comm_pin_code != Null) {
		$count++;
	}
	if ($student->perm_address != Null) {
		$count++;
	}
	if ($student->perm_village != Null) {
		$count++;
	}
	if ($student->perm_block != Null) {
		$count++;
	}
	if ($student->perm_state != Null) {
		$count++;
	}
	if ($student->perm_pin_code != Null) {
		$count++;
	}
	if ($student->account_no != Null) {
		$count++;
	}
	if ($student->re_account_no != Null) {
		$count++;
	}
	if ($student->ifsc_code != Null) {
		$count++;
	}
	if ($student->bank_name != Null) {
		$count++;
	}
	if ($student->bank_branch != Null) {
		$count++;
	}
	if ($student->name_as_per_bank != Null) {
		$count++;
	}
	if ($student->admission_toggle != Null) {
		$count++;
	}
	if ($student->institute_city != Null) {
		$count++;
	}
	if ($student->institute_state != Null) {
		$count++;
	}

	if ($student->identity_proof != Null) {
		$count++;
	}
	if ($student->passbook_statement != Null) {
		$count++;
	}

	if ($student->academic_type != Null) {
		$count++;
	}
	if ($student->board != Null) {
		$count++;
	}
	if ($student->hobby != Null) {
		$count++;
	}
	if ($student->achievements != Null) {
		$count++;
	}
	if ($student->description != Null) {
		$count++;
	}
	if ($student->mother_tongue != Null) {
		$count++;
	}
	if ($student->p_academic_name != Null) {
		$count++;
	}
	if ($student->p_cgpa != Null) {
		$count++;
	}
	if ($student->p_class != Null) {
		$count++;
	}
	if ($student->p_start_date != Null) {
		$count++;
	}
	if ($student->p_end_date != Null) {
		$count++;
	}
}

$percentage_filled_column  = ($count / 56) * 100;

?>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<?php $detail = $data['get_single_scholarship']; ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarship Details</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Scholarship Details</li>
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
								<div class="Scholarship-picture">
									<a class="Scholarship-likes m-l-10" href="#"></a>
									<img src="<?php echo URLROOT; ?>/uploads/<?php echo $detail->scholarship_file ?>" class="img-responsive">
								</div>
							</div>
							<div class="profile-usertitle">
								<div class="profile-usertitle-name"> </div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
						</div>
					</div>
					<div class="card">
						<div class="card-head">
							<header>About Scholarship</header>
						</div>
						<div class="card-body no-padding height-9">

							<ul class="list-group list-group-unbordered">

								<li class="list-group-item">
									<b>Scholarshp Name</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->name ?></div>
								</li>
								<!-- <li class="list-group-item">
									<b>Body</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->body ?></div>
								</li> -->
								<li class="list-group-item">
									<b>Offered By</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->offered_by ?></div>
								</li>
								<li class="list-group-item">
									<b>Type</b>
									<div class="profile-desc-item pull-right"><?php if ($detail->type == 0) { ?>All <?php } elseif ($detail->type == 1) { ?>Government Scholarship<?php } elseif ($detail->type == 2) { ?>Private Scholarship<?php } elseif ($detail->type == 3) { ?>OodlesIn Scholarship<?php } ?></div>
								</li>

								<li class="list-group-item">
									<b>Website Link</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->url ?></div>
								</li>
								<li class="list-group-item">
									<b>Offered By</b>
									<div class="profile-desc-item pull-right"> <?php echo $get_coprorate_detail->name ?></div>
								</li>
								<li class="list-group-item">
									<b>No of Scholarship</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->no_of_scholarships ?></div>
								</li>
								<li class="list-group-item">
									<b>Contact Number</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->contact_number ?></div>
								</li>
								<li class="list-group-item">
									<b>Email id</b>
									<div class="profile-desc-item pull-right"> <?php echo $detail->email_id ?></div>
								</li>
								<!-- <li class="list-group-item">
											<a href="<?php echo $detail->detailed_eligibility_url ?>">	<b>Click here for detailed eligibility information</b></a>
												
											</li> -->
							</ul>
							<!-- <div class="row list-separated profile-stat">
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 1 </div>
												<div class="uppercase profile-stat-text"> Years </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 1045 </div>
												<div class="uppercase profile-stat-text"> Applications </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 61 </div>
												<div class="uppercase profile-stat-text"> Rewarded</div>
											</div>
										</div> -->
						</div>
					</div>
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
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo">
										<div id="biography">
											<h4 class="font-bold">Scholarship Description</h4>
											<p><?php echo $detail->description; ?></p>
											<h4 class="font-bold">Scholarship Availability</h4>
											<p><?php echo $detail->minimum_eligibility; ?></p>
											<br>
											<h4 class="font-bold">Reservations</h4>
											<p><?php echo $detail->reservation; ?></p>

											<br>
											<h4 class="font-bold">Documents Required to Apply</h4>
											<p>
												<?php
												$studentMod = new Students;
												$array = explode(',', $detail->documents_required);
												foreach ($array as $document_id) {
													$get_document_detail = $studentMod->get_scholarship_document_detail($document_id);
													echo "| " . $get_document_detail->name . "  ";
												}
												?>
											</p>

											<br>
											<h4 class="font-bold">Application Process</h4>
											<p><?php echo $detail->application_process; ?></p>

											<br>
											<h4 class="font-bold">Scholarship Availability</h4>


											<p> Scholarship Valid From: <?php echo $detail->start_date; ?> </p>
											<p> Scholarship Valid Till: <?php echo $detail->end_date; ?></p>


											<br>
											<?php
											if (($detail->start_date <= date('Y-m-d')) && ($detail->end_date >= date('Y-m-d'))) {
												$scholarship_valid = 1;
											} else {
												$scholarship_valid = 0;
											}
											?>
										</div>
									</div>
								</div>
							</div>

						</div>
						<style>
							.modal-content {
								width: 80%;
								/* Adjust this value to your desired width */
								margin: 0 auto;
							}
						</style>


						<?php
						$flag = 0;
						$startdate = $detail->start_date;
						$enddate = $detail->end_date;
						$today = date('Y-m-d');

						if ($today < $startdate) {
							// Scholarship has not started yet
							$date1 = DateTime::createFromFormat('Y-m-d', $startdate);
							$date2 = DateTime::createFromFormat('Y-m-d', $today);
							$diff = $date1->diff($date2);
							$message = $diff->format('%a days, %h hours, %i minutes') . ' until start'; // Outputs "X days, X hours, X minutes until start"
						} elseif ($today <= $enddate) {
							// Scholarship is ongoing
							$date1 = DateTime::createFromFormat('Y-m-d', $enddate);
							$date2 = DateTime::createFromFormat('Y-m-d', $today);
							$diff = $date1->diff($date2);
							$message = $diff->format('%a days, %h hours, %i minutes') . ' to end'; // Outputs "X days, X hours, X minutes to end"
							$flag = 1;
						} else {
							// Scholarship has already expired
							$message = "Expired";
						}

						?>
						<?php if (empty($get_scholarship_application)) { ?>

							<div class="alert alert-success text-center" role="alert">
								<?php echo $message; ?>
							</div>
						<?php } ?>
						<?php if ($flag == 1) { ?>

							<?php if (!($check_scholarship_eligiblity)) { ?>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Check Eligibility Test</button>
							<?php } elseif ($check_scholarship_eligiblity->status == 0) { ?>
								<button type="button" class="btn btn-danger">Criteria does not match</button>
							<?php } elseif ($check_scholarship_eligiblity->status == 1) { ?>
								<div class="alert alert-success" role="alert">
									You are eligibile for the scholarship! Please proceed...
								</div>
							<?php } ?>
						<?php } ?>

						<hr>

						<?php if ($check_scholarship_eligiblity) {
							if ($check_scholarship_eligiblity->status == 1) {

								if ($percentage_filled_column == 100) {
						?>
									<?php if (empty($get_scholarship_application)) { ?>
										<!-- <a href="<?php echo URLROOT; ?>/student/final_process_scholarship/<?php echo $detail->id; ?>"> <button type="button" class="btn btn-success" style="width:100%;">Read Instructions & Pay</button></a> -->
										<a href="<?php echo URLROOT; ?>/student/final_process_scholarship/<?php echo $detail->id; ?>"> <button type="button" class="btn btn-success" style="width:100%;">Upload Documents</button></a>
									<?php } else { ?>

										<a href="<?php echo URLROOT; ?>/student/scholarship_status/<?php echo $get_scholarship_application->id; ?>"> <button type="button" class="btn btn-warning" style="width:100%;">View Progress of Application --- >>></button></a>

									<?php } ?>
									<?php
								} else {
									if (!empty($data['get_current_student'])) {
									?>
										<a href="<?php echo URLROOT; ?>/student/update_profile"> <button type="button" class="btn btn-success" style="width:100%;">Update Profile</button></a>
									<?php } else { ?>
										<a href="<?php echo URLROOT; ?>/student/add_profile"> <button type="button" class="btn btn-success" style="width:100%;">Add Profile</button></a>

									<?php } ?>
						<?php   }
							}
						}
						?>
						<div class="modal fade" id="myModal">
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<div class="modal-content">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title">Check your eligibility</h4>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<div class="card">
											<div class="card-topline-aqua">
												<header></header>
											</div>
											<div class="white-box">
												<!-- Nav tabs -->
												<!-- Tab panes -->
												<div class="tab-content">
													<div class="tab-pane active fontawesome-demo">
														<div id="biography">

															<!-- Criteria answering div -->
															<form action="<?php echo URLROOT ?>/student/submit_criteria_answers/<?php echo $detail->id ?>" method='POST'>
																<div class="" <?php if ($scholarship_valid == 0) {
																					echo "style='display:none;'";
																				} ?>>
																	<div class="card-topline-aqua">
																		<header></header>
																	</div>
																	<div class="white-box">
																		<!-- Nav tabs -->
																		<!-- Tab panes -->
																		<div class="tab-content">
																			<div class="tab-pane active fontawesome-demo">
																				<div id="biography">
																					<?php
																					$studentMod = new Students;
																					$array = explode(',', $detail->criteria);
																					$student_class = $_SESSION['rexkod_oodles_student_class'];
																					foreach ($array as $criteria_id) {
																						$get_criteria_detail = $studentMod->get_criteria_detail($criteria_id);
																						// echo $get_criteria_detail->criteria_name;
																						if ($get_criteria_detail->class == $student_class) {
																							if ($get_criteria_detail->criteria_type == 1) { ?>
																								<div class="form-group row">
																									<label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
																									<div class="col-sm-6"> <label class="switchToggle" style="float:right;">
																											<input type="checkbox" name="<?php echo $criteria_id; ?>" value="1">
																											<span class="slider aqua"></span>
																										</label>
																									</div>
																								</div>
																							<?php
																							} elseif ($get_criteria_detail->criteria_type == 2) { ?>

																								<div class="form-group row">
																									<label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
																									<div class="col-sm-6">
																										<input type="date" name="<?php echo $criteria_id; ?>" class="form-control" required>
																									</div>
																								</div>
																							<?php
																							} elseif ($get_criteria_detail->criteria_type == 3) { ?>

																								<div class="form-group row">
																									<label class="col-sm-6 control-label"><?php echo $get_criteria_detail->criteria_name; ?></label>
																									<div class="col-sm-6">
																										<input type="text" name="<?php echo $criteria_id; ?>" class="form-control" required>

																									</div>
																								</div>
																					<?php
																							}
																						}
																					}
																					?>
																					<center><button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="buttonId1" data-toggle="modal" data-target="#exampleModal1">Submit</button></center>
																				</div>
																			</div>
																		</div>
																	</div>

																</div>
															</form>
															<!-- Criteria answering div end-->
															<!-- Documents uploadation div -->
														</div>
													</div>
												</div>
											</div>

										</div>
									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>
						<!-- modal ends -->




					</div>
				</div>
				<!-- END PROFILE CONTENT -->
			</div>
		</div>
	</div>
</div>



<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>