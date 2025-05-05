<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<?php $student = $data['get_student_detail'] ;
$current_student_id= $data['student_id']?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Profile Detail</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Profile Detail</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-6">
				<div class="card card-box">
					<div class="card-head">
						<!-- <header>ACCORDIONS</header> -->
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body" id="line-parent">
						<div class="panel-group accordion" id="accordion3">
							<div class="panel panel-default">
								<div class="panel-heading panel-heading-gray">
									<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled" data-bs-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
											BASIC DETAILS </a>
									</h4>
								</div>
								<div id="collapse_3_1" class="panel-collapse in">
									<!-- <div class="panel-body"> -->
									<div class="row">
										<div class="col-md-3 col-sm-6">

											<!-- <div class="profile-sidebar"> -->
											<div class="card">
												<div class="card-head">
													<header style="text-align:center;"> <?php echo strtoupper($data['get_auth_detail']->name); ?> <?php if (!empty($student->l_name)) {
																																						echo strtoupper($student->l_name);
																																					} else {
																																					} ?></header>
													<p style="text-align:center;"> <?php echo strtoupper($data['get_auth_detail']->email); ?> </p>
												</div>
												<div class="card-body no-padding height-9">
													<div class="profile-desc">
														<?php if (!empty($student->description)) {
															echo $student->description;
														} else {
														?>

															<?php
															$studentModel = new Students;
															$user_detail = $studentModel->get_student_detail($data['get_auth_detail']->id);
															// $student_detail = $studentModel->get_current_student($_SESSION['rexkod_oodles_student_id']) 
															?>




													



															<!-- I am Amogh, born and brought up in Bandra. Thank you for allowing me to introduce myself. I scored 77% in my school at Little Flowers Montessori English Medium High School. -->
															<!-- I scored 77.7% in SSWN junior college, and currently, I'm in my final year at Xavier Institute of Technology and Science, Bandra.
I believe my strength is my attitude, and I like to take up challenges and think to accept both success and failure in a balanced way to move forward. I want to say that I don't leave any questions altogether as I believe in myself and my work.
My short-term goal is to find a platform to expand my learning  academic and non academics and get good grades in my academics. And my long-term goal is to be complete my engineering, I always challenge myself to improve my progress and steady growth. -->
														<?php 		} ?>

													</div>
													<ul class="list-group list-group-unbordered">
														<!-- make it as a button with the name of th studnet -->
														<li class="list-group-item">
															<b style="color:#ffb64d;">Gender </b>
															<div class="profile-desc-item pull-right"><?php if (!empty($student->gender)) {
																											echo $student->gender;
																										} else {
																											echo "Nill";
																										} ?></div>
														</li>

														<li class="list-group-item">
															<b style="color:#ffb64d;">Religion </b>
															<div class="profile-desc-item pull-right"><?php if (!empty($student->religion)) {
																											echo $student->religion;
																										} else {
																											echo "Nill";
																										} ?></div>
														</li>
														<li class="list-group-item">
															<b style="color:#ffb64d;">Category </b>
															<div class="profile-desc-item pull-right"><?php if (!empty($student->category)) {
																											echo $student->gender;
																										} else {
																											echo "Nill";
																										} ?></div>
														</li>
														<?php if (!empty($student->mobile_no)) {
															$mobile_no = $student->mobile_no;
														} else {
															$mobile_no = "Nill";
														}
														if (!empty($student->whatsapp_no)) {
															$whatsapp_no = $student->whatsapp_no;
														} else {
															$whatsapp_no = "Nill";
														}
														?>
														<li class="list-group-item">
															<b style="color:#ffb64d;">Mobile No </b>
															<div class="profile-desc-item pull-right"><?php if (!empty($student->phone_no)) {
																											echo $student->phone_no;
																										} else {
																											echo "Nill";
																										} ?></div>
														</li>
														<!-- if whatsapp no is duplicate to mobile no -->
														<?php if ($mobile_no != $whatsapp_no) { ?>
															<li class="list-group-item">
																<b style="color:#ffb64d;">Whatsapp No </b>
																<div class="profile-desc-item pull-right"><?php if (!empty($student->whatsapp_no)) {
																												echo $student->whatsapp_no;
																											} else {
																												echo "Nill";
																											} ?></div>
															</li>
														<?php } ?>
														<li class="list-group-item">
															<b style="color:#ffb64d;">DOB </b>
															<div class="profile-desc-item pull-right"><?php if (empty($student->dob)) {
																											$dob = "dd/mm/yy";
																											echo $dob;
																										} else {
																											echo $dob = date("d/m/y", strtotime($student->dob));
																										
																										}
																										?></div>
														</li>

													</ul>

												</div>
											</div>
										</div>

										<!-- </div> -->

										<!-- </div> -->


										<div class="col-md-9 col-sm-6">
											<div class="borderBox light bordered card-box">
												<div class="borderBox-title tabbable-line">
													<div class="caption">
														<span class="caption-subject font-dark bold uppercase">EXPLORE TABS</span>
													</div>
													<ul class="nav nav-tabs">
														<li class="nav-item">
															<a href="#borderBox_tab5" data-bs-toggle="tab"> Documents </a>
														</li>
														<li class="nav-item">
															<a href="#borderBox_tab4" data-bs-toggle="tab"> Bank Details</a>
														</li>
														<li class="nav-item">
															<a href="#borderBox_tab3" data-bs-toggle="tab"> Address </a>
														</li>
														<li class="nav-item">
															<a href="#borderBox_tab2" data-bs-toggle="tab">Parent Details </a>
														</li>
														<li class="nav-item">
															<a href="#borderBox_tab1" data-bs-toggle="tab" class="active"> Education</a>
														</li>
														<li class="nav-item">
															<a href="#borderBox_tab6" data-bs-toggle="tab" class="">Former Education</a>
														</li>
													</ul>
												</div>
												<div class="borderBox-body">
													<div class="tab-content">
														<div class="tab-pane active" id="borderBox_tab1">
															<div id="biography">
																<div class="row">
																	<div class="col-md-6 col-6 b-r"> <strong> Class/Course</strong>
																		<br>
																		<p class="text-muted">
																			<?php if (isset($student->course)) {
																				$studentMod = new Students;
																				$get_class_detail = $studentMod->get_class_detail_single($student->course);
																				echo ucwords($get_class_detail->class_name);
																			} else {
																				echo "Nill";
																			}
																			?>


																		</p>
																	</div>
																	<div class="col-md-6 col-6 b-r"> <strong>Boards</strong>
																		<br>
																		<p class="text-muted">
																			<?php if (!empty($student->board)) {
																				$studentMod = new Students;
																				$get_board_detail = $studentMod->get_board_detail_single($student->board);
																				echo $get_board_detail->name;
																			} else {
																				echo "Nill";
																			}
																			?>
																	</div>
																	<div class="col-md-6 col-6 b-r"> <strong>City</strong>
																		<br>
																		<p class="text-muted"><?php if (!empty($student->institute_city)) {
																									echo $student->institute_city;
																								} else {
																									echo "Nill";
																								} ?></p>
																	</div>
																	<div class="col-md-3 col-6"> <strong>State</strong>
																		<br>
																		<p class="text-muted"><?php if (!empty($student->institute_state)) {
																									echo $student->institute_state;
																								} else {
																									echo "Nill";
																								} ?></p>
																	</div>
																</div>
																<hr>

																<div class="row">
																	<div class="col-md-6 col-6 b-r">

																		<strong>Institute Name</strong>
																	</div>
																	<div class="col-md-6 col-6 b-r">
																		<span class="text-muted">
																			<?php
																			if (isset($student->academic_name)) {
																				if (($student->academic_name != 0) && ($student->academic_name != Null)) {
																					$academic_type = substr(($student->academic_name), 0, 1);
																					$academic_name = substr($student->academic_name, 1);

																					$get_school_detail  = $studentMod->get_school_detail_single($academic_name);


																					$studentMod = new Students;
																					if ($academic_type == 1) {
																						$get_school_detail  = $studentMod->get_school_detail($academic_name);
																						echo ucwords($get_school_detail->school_name);
																					} elseif ($academic_type == 2) {
																						$get_college_detail  = $studentMod->get_ind_college_detail($academic_name);
																						echo $get_college_detail->college_name;
																					} else {
																						echo "dfdfdf";
																					}
																				} elseif ($student->academic_name == 0) {
																					echo ucwords($student->academic_other_name);
																				} else {
																					echo  "Nill";
																				}
																			} else {
																				echo "Nill";
																			}
																			?>
																		</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane" id="borderBox_tab6">
															<div id="biography">
																<div class="row">
																			
																						<table class="table">
																							<thead>
																								<tr>
																								<th scope="col"><strong>Academic name</strong></th>
																								<th scope="col"><strong>Class</strong></th>
																								<th scope="col"><strong>%/cgpa</strong></th>
																								<th scope="col"><strong>Start Date</strong></th>
																								<th scope="col"><strong>End Date</strong></th>
																								</tr>
																							</thead>
																							<tbody>
																							<?php
																		if (isset($student->p_academic_name) && !empty($student->p_academic_name) 
																			&& isset($student->p_class) && !empty($student->p_class) 
																			&& isset($student->p_cgpa) && !empty($student->p_cgpa) 
																			&& isset($student->p_start_date) && !empty($student->p_start_date) 
																			&& isset($student->p_end_date) && !empty($student->p_end_date)) { 
																				
																				
																				$p_academic_name=explode(',',$student->p_academic_name);
																					$p_class=explode(',',$student->p_class);
																					$p_cgpa=explode(',',$student->p_cgpa);
																					$p_start_date=explode(',',$student->p_start_date);
																					$p_end_date=explode(',',$student->p_end_date);
																					?>
																								<?php $count=0;
																								foreach ($p_academic_name as $name) {
																								    // $studentMod = new Students;
																								    $get_class_detail = $studentMod->get_class_detail_single($p_class[$count]);
																								    ?>
																								 <tr>
																								<td><p class="text-muted" style="font-size: 10px;"><?php echo $p_academic_name[$count] ?></p></td>
																								<td><p class="text-muted" style="font-size: 10px;"><?php echo $get_class_detail->class_name ?></p></td>
																								<td><p class="text-muted" style="font-size: 10px;"><?php echo $p_cgpa[$count] ?></p></td>
																								<td><p class="text-muted" style="font-size: 10px;"><?php echo $p_start_date[$count] ?></p></td>
																								<td><p class="text-muted" style="font-size: 10px;"><?php echo $p_end_date[$count] ?></p></td>
																								</tr>
																								
																								<?php $count++;
																								}?>
<?php }else{
	?>
<tr>
																										<td>Nill</td>
																										<td>Nill</td>
																										<td>Nill</td>
																										<td>Nill</td>
																										<td>Nill</td>
																									</tr>
	<?php 
}
?>
																							</tbody>
																							</table>					


																</div>
															</div>
														</div>
														<div class="tab-pane" id="borderBox_tab2">
														<div id="biography">
																						<div class="row">
																							<div class="col-md-6 col-6 b-r"> <strong>No of Siblings</strong>
																								<br>
																								<p class="text-muted">
																									<?php if (!empty($student->siblings)) {
																										echo $student->siblings;
																									} else {
																										echo "Nill";
																									} ?>
																								</p>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Familly Annual Income</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->annual_income)) {
																															echo $student->annual_income;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>


																						</div>

																						<h4 class="font-bold">Father / Guardian Details</h4>
																						<div class="row">
																							<div class="col-md-6 col-6 b-r"> <strong>Name as per aadhar</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->father_name)) {
																										echo $student->father_name;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Aadhar Number</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->f_aadhar)) {
																										echo $student->f_aadhar;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Mobile No</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->f_phone)) {
																										echo $student->f_phone;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Email Id</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->f_email_id)) {
																										echo $student->f_email_id;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>

																						</div>

																						<br>
																						<h4 class="font-bold">Mother / Guardian Details</h4>
																						<div class="row">
																							<div class="col-md-6 col-6 b-r"> <strong>Name as pe aadhar</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->mother_name)) {
																										echo $student->mother_name;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Aadhar Number</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->m_aadhar)) {
																										echo $student->m_aadhar;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Mobile No</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->m_phone)) {
																										echo $student->m_phone;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Email Id</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (!empty($student->m_email_id)) {
																										echo $student->m_email_id;
																									} else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>

																						</div>

																						<br>


																					</div>
														</div>
														<div class="tab-pane" id="borderBox_tab3">
														<div class="row">
																							<div class="col-md-12 col-12 b-r"> <strong>Communication Address</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->comm_address)) {
																															echo $student->comm_address;
																														} else {
																															echo "Nill";
																														} ?>&nbsp;<?php if (!($student->comm_village)) {
																																		echo $student->comm_village;
																																	} else {
																																		echo "Nill";
																																	} ?>&nbsp;<?php if (!empty($student->comm_block)) {
																																					echo $student->comm_block;
																																				} else {
																																					echo "Nill";
																																				} ?>&nbsp;<?php if (!empty($student->comm_pin_code)) {
																														echo $student->comm_pin_code;
																													} else {
																														echo "Nill";
																													} ?></p>
																							</div>
																							<div class="col-md-12 col-12 b-r"> <strong>Permanent Address</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->perm_address)) {
																															echo $student->perm_address;
																														} else {
																															echo "Nill";
																														} ?>&nbsp;<?php if (!empty($student->perm_village)) {
																																		echo $student->perm_village;
																																	} else {
																																		echo "Nill";
																																	} ?>&nbsp;<?php if (!empty($student->perm_block)) {
																																					echo $student->perm_block;
																																				} else {
																																					echo "Nill";
																																				} ?>&nbsp;<?php if (!empty($student->perm_pin_code)) {
																														echo $student->perm_pin_code;
																													} else {
																														echo "Nill";
																													} ?></p>
																							</div>

																						</div>

																				
														</div>
														<div class="tab-pane" id="borderBox_tab4">
														<div id="biography">
																						<div class="row">
																							<div class="col-md-6 col-6 b-r"> <strong>Account Number</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->account_no)) {
																															echo $student->account_no;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>IFSC CODE</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->ifsc_code)) {
																															echo $student->ifsc_code;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Bank Name</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->bank_name)) {
																															echo $student->bank_name;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>
																							<div class="col-md-6 col-6"> <strong>Bank's Branch Name</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->bank_branch)) {
																															echo $student->bank_branch;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>
																							<div class="col-md-6 col-6"> <strong>Name as per Passbook</strong>
																								<br>
																								<p class="text-muted"><?php if (!empty($student->name_as_per_bank)) {
																															echo $student->name_as_per_bank;
																														} else {
																															echo "Nill";
																														} ?></p>
																							</div>
																						</div>



																					</div>
														</div>
														<div class="tab-pane" id="borderBox_tab5">
														<div id="biography">
																						<div class="row">
																							<div class="col-md-6 col-6 b-r"> <strong>Proof of Adress</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (isset($student->address_proof)) { ?>
																										<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->address_proof ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																									<?php } else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Proof of Identity</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (isset($student->identity_proof)) { ?>
																										<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->identity_proof ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																									<?php } else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Father Aadhar Card</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (isset($student->father_aadhar_doc)) { ?>
																										<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->father_aadhar_doc ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																									<?php } else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Mother Aadhar Card</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (isset($student->mother_aadhar_doc)) { ?>
																										<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->mother_aadhar_doc ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																									<?php } else {
																										echo "Nill";
																									} ?>
																								</span>
																							</div>
																							<div class="col-md-6 col-6 b-r"> <strong>Parent's Bank/Passbook/Statement/Cancelled Cheque</strong>
																							</div>
																							<div class="col-md-6 col-6 b-r">
																								<span class="text-muted">
																									<?php if (isset($student->passbook_statement)) { ?>
																										<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->passbook_statement ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
																									<?php } else {
																										echo "Nill";
																									} ?>
																								</span>
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
							<div class="panel panel-default">
								<div class="panel-heading panel-heading-gray">
									<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled collapsed" data-bs-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> QUIZ RANK & DETAIL</a>
									</h4>
								</div>
								<div id="collapse_3_2" class="panel-collapse collapse">
									<div class="panel-body" style="height:200px; overflow-y:auto;">
									<!-- quiz rank start -->
									<?php
												$studentMod = new Students;
												$get_practice_quiz = $studentMod->get_quiz_for_category(1);
												$get_practice_quiz_count = 0;
												foreach ($get_practice_quiz as $get_practice_quiz) {
													$get_practice_quiz_count++;
												}

												$get_merit_quiz = $studentMod->get_quiz_for_category(2);
												$get_merit_quiz_count = 0;
												foreach ($get_merit_quiz as $get_merit_quiz) {
													$get_merit_quiz_count++;
												}
												$get_speed_quiz = $studentMod->get_quiz_for_category(3);
												$get_speed_quiz_count = 0;
												foreach ($get_speed_quiz as $get_speed_quiz) {
													$get_speed_quiz_count++;
												}
												$get_contest_quiz = $studentMod->get_quiz_for_category(4);
												$get_contest_quiz_count = 0;
												foreach ($get_contest_quiz as $get_contest_quiz) {
													$get_contest_quiz_count++;
												}
												$get_practice_pass_quiz = $studentMod->get_quiz_result_count_of_student(1, 1,$current_student_id);
												$get_practice_pass_count = 0;
												$get_total_practice_quiz_score = 0;
												foreach ($get_practice_pass_quiz as $get_practice_pass) {
													$get_practice_pass_count++;
													$get_total_practice_quiz_score += $get_practice_pass->coins_earned;
												}
												$get_merit_pass_quiz = $studentMod->get_quiz_result_count_of_student(2, 1,$current_student_id);
												$get_merit_pass_count = 0;
												foreach ($get_merit_pass_quiz as $get_merit_pass) {
													$get_merit_pass_count++;
												}
												$get_speed_pass_quiz = $studentMod->get_quiz_result_count_of_student(3, 1,$current_student_id);
												$get_speed_pass_count = 0;
												$get_total_speed_quiz_score = 0;
												foreach ($get_speed_pass_quiz as $get_speed_pass) {
													$get_speed_pass_count++;
													$get_total_speed_quiz_score += $get_speed_pass->coins_earned;
												}
												$get_contest_pass_quiz = $studentMod->get_quiz_result_count_of_student(4, 1,$current_student_id);
												$get_contest_pass_count = 0;
												foreach ($get_contest_pass_quiz as $get_contest_pass) {
													$get_contest_pass_count++;
												}
												$get_practice_fail_quiz = $studentMod->get_quiz_result_count_of_student(1, 0,$current_student_id);
												$get_practice_fail_count = 0;
												foreach ($get_practice_fail_quiz as $get_practice_fail) {
													$get_practice_fail_count++;
												}
												$get_merit_fail_quiz = $studentMod->get_quiz_result_count_of_student(2, 0,$current_student_id);
												$get_merit_fail_count = 0;
												foreach ($get_merit_fail_quiz as $get_merit_fail) {
													$get_merit_fail_count++;
												}
												$get_speed_fail_quiz = $studentMod->get_quiz_result_count_of_student(3, 0,$current_student_id);
												$get_speed_fail_count = 0;
												
												foreach ($get_speed_fail_quiz as $get_speed_fail) {
													$get_speed_fail_count++;
												}
												$get_contest_fail_quiz = $studentMod->get_quiz_result_count_of_student(4, 0,$current_student_id);
												$get_contest_fail_count = 0;
												foreach ($get_contest_fail_quiz as $get_contest_fail) {
													$get_contest_fail_count++;
												}
												$total_practice_match_played = $get_practice_pass_count + $get_practice_fail_count;
												if ($total_practice_match_played == 0) {
													$practice_pass_per = 0;
													$practice_fail_per = 0;
												} else {
													$practice_pass_per = ($get_practice_pass_count / $total_practice_match_played) * 100;
													$practice_fail_per = ($get_practice_fail_count / $total_practice_match_played) * 100;
												}
												$total_speed_match_played = $get_speed_pass_count + $get_speed_fail_count;
												if ($total_speed_match_played == 0) {
													$speed_pass_per = 0;
													$speed_fail_per = 0;
												} else {
													$speed_pass_per = ($get_speed_pass_count / $total_speed_match_played) * 100;
													$speed_fail_per = ($get_speed_fail_count / $total_speed_match_played) * 100;
												}





												?>
												<!-- <h1>Quizzes</h1> -->

												<!-- <div class="page-content"> -->

						
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">

																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category </th>
																					<th>Played</th>
																					<th>Pass</th>
																					<th>Fail</th>
																					<th>Points Earned</th>
																					<th>Coins Earned</th>
																				
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;"> Practice </td>
																					<td> <?php echo $total_practice_match_played; ?> </td>

																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $practice_pass_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $practice_pass_per ?>" role="progressbar" class="progress-bar progress-bar-success"></div>
																						</div>
																					</td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $practice_fail_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $practice_fail_per ?>" role="progressbar" class="progress-bar progress-bar-warning"></div>
																						</div>
																					</td>
																					<td> <?php echo $get_total_practice_quiz_score; ?> </td>
																					<td> <?php echo round((($get_total_practice_quiz_score * 5) / 100), 0) ?> </td>
																				
																				</tr>

																			</tbody>
																		</table>
																		<!-- </div> -->
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>

																					<th>Played</th>
																					<th>Pass</th>
																					<th>Fail</th>
																					<th>Points Earned</th>
																					<th>Coins Earned</th>


																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;">Rapid Fire</td>
																					<td> <?php echo $get_speed_pass_count + $get_speed_fail_count; ?> </td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $speed_pass_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $speed_pass_per ?>" role="progressbar" class="progress-bar progress-bar-success"></div>
																						</div>
																					</td>
																					<td>

																						<div class="progress progress-striped progress-xs">
																							<div style="width: <?php echo $speed_fail_per ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $speed_fail_per ?>" role="progressbar" class="progress-bar progress-bar-warning"></div>
																						</div>
																					</td>
																					<td> <?php echo round($get_total_speed_quiz_score, 0); ?> </td>
																					<td> <?php echo round((($get_total_speed_quiz_score * 5) / 100), 0) ?> </td>
																				
																				</tr>

																			</tbody>
																		</table>
																	</div>
																</div>
																<!-- </div> -->
															</div>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>
																					<th>Played</th>
																					<th>Won</th>
																					<th>Awarded</th>
																				


																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;"> Merit </td>
																					<td> <?php echo $get_merit_pass_count + $get_merit_fail_count; ?> </td>
																					<td><?php echo $get_merit_pass_count; ?> </td>
																					<td> <?php echo $get_merit_fail_count; ?> </td>
																				
																				</tr>

																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>

														<!-- </div> -->
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="row">
															<div class="col-sm-12">
																<!-- <div class="card"> -->

																<div class="card-body" style="padding:0 0 0 0">
																	<div class="table-scrollable">
																		<table class="table table-striped table-hover">
																			<thead>
																				<tr>

																					<th>Category</th>

																					<th>Played</th>
																					<th>Won</th>
																					<th>Winning</th>
																			

																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td style="width:20%;">Contest </td>
																					<td> <?php echo $get_contest_pass_count + $get_contest_fail_count; ?> </td>
																					<td><?php echo $get_contest_pass_count; ?> </td>
																					<td> <?php echo $get_contest_fail_count; ?> </td>
																					
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
																<!-- </div> -->
															</div>

														</div>
													</div>
												</div>
												<!-- end quiz_rank card -->
									</div>
								</div>
							</div>
							<?php $get_wallet_detail = $data['get_wallet_detail']; ?>
							<div class="panel panel-default">
								<div class="panel-heading panel-heading-gray">
									<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled collapsed" data-bs-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> FINANCE & TRANSACTIONS </a>
									</h4>
								</div>
								<div id="collapse_3_3" class="panel-collapse collapse">
									<div class="panel-body">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<!-- <header>Professors List</header> -->
									<!-- <button id="prfList" class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button> -->
									<!-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="prfList">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-6">
										<ul class="docListWindow small-slimscroll-style">
											<li>
												<div class="prog-avatar">
												<i class="fa fa-inr" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Balance</a>
													</div>
													<div>
														<span class="clsAvailable"><?php $balance = $get_wallet_detail->balance_amount; 
														echo $balance;?></span>
													</div>
												</div>
											</li>
											<li>
												<div class="prog-avatar">
												<i class="fa fa-inr" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Awarded</a>
													</div>
													<div>
														<span class="clsAvailable"><?php echo $total_awarded_amount = $get_wallet_detail->awarded_amount; ?></span>
													</div>
												</div>
											</li>
											<li>
												<div class="prog-avatar">
												<i class="fa fa-inr" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Withdrawal Amount</a>
													</div>
													<div>
														<span class="clsAvailable"><?php echo $total_awarded_amount + $balance; ?></span>
													</div>
												</div>
											</li>
										
											<li>
												<div class="prog-avatar">
												<i class="fa fa-inr" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Transferred to Bank A/c</a>
													</div>
													<div>
														<span class="clsAvailable"><?php echo '0'?></span>
													</div>
												</div>
											</li>
										
										</ul>
											</div><div class="col-md-6"><ul class="docListWindow small-slimscroll-style">
											
											<li>
												<div class="prog-avatar">
												<i class="fa fa-coins" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Points Earned</a>
													</div>
													<div>
														<span class="clsAvailable"><?php	echo $get_wallet_detail->point; ?></span>
													</div>
												</div>
											</li>
											<li>
												<div class="prog-avatar">
												<i class="fa fa-coins" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Coins Earned</a>
													</div>
													<div>
														<span class="clsAvailable"><?php echo $get_wallet_detail->coins; ?></span>
													</div>
												</div>
											</li>
											<li>
												<div class="prog-avatar">
												<i class="fa fa-coins" ></i>
												</div>
												<div class="details">
													<div class="title">
														<a href="#">Bonus Coins</a>
													</div>
													<div>
														<span class="clsAvailable"><?php echo $get_wallet_detail->bonus_coins; ?></span>
													</div>
												</div>
											</li>
											
										
										</ul></div>
									</div>
								</div>
							</div>
						</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading panel-heading-gray">
									<h4 class="panel-title">
										<a class="accordion-toggle accordion-toggle-styled collapsed" data-bs-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4">SCHOLARSHIP </a>
									</h4>
								</div>
								<div id="collapse_3_4" class="panel-collapse collapse">
									<div class="panel-body">
										<p>COMING SOON </p>
									
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
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>