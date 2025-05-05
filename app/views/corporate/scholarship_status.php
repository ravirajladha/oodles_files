<?php require APPROOT . '/views/inc_corporate/header.php'; ?>
<?php
$get_scholarship_application = $data['get_scholarship_application'];
$corporateMod = new Corporates;
$get_scholarship = $corporateMod->get_ind_scholarship($get_scholarship_application->scholarship_id);



$get_scholarship_application = $data['get_scholarship_application'];

$corporateMod = new Corporates;
$get_scholarship = $corporateMod->get_ind_scholarship($get_scholarship_application->scholarship_id);
$page_id = $data['id'];
$application_id = $data['application_id'];
$scholarship_id = $data['scholarship_id'];

$studentMod = new Students;
$adminMod = new Admins;
$get_auth_detail = $adminMod->get_auth_detail($get_scholarship_application->student_id);
$student_detail = $adminMod->get_current_student($get_scholarship_application->student_id);
$student_id = $get_scholarship_application->student_id;
$student = $studentMod->get_class_by_id($get_scholarship_application->student_id);
$get_criteria_detail = $studentMod->get_criteria();
$critieria_for_class = array();
foreach ($get_criteria_detail as $criteria_detail) {
	# code...
	if ($criteria_detail->class == $student->class) {
		// echo $student->class;
		array_push($critieria_for_class, $criteria_detail->id);
	}
}
$all_critieria = array();
foreach ($critieria_for_class as $critieria) {
	# code...
	foreach (explode(',', $get_scholarship->criteria) as $critieria2) {
		# code...
		if ($critieria == $critieria2) {
			# code...
			array_push($all_critieria, $critieria2);
		}
	}
}

$status_detail = $adminMod->get_single_default_scholarship_status($get_scholarship_application->status);

$get_class_detail_single = $adminMod->get_class_detail_single($student->class);
// print_r($status_detail);
// die();
$get_scholarship_data = $data['get_scholarship_data'];
$get_student_detail_from_auth = $data['get_student_detail_from_auth'];
$get_scholarship_student_status = $data['get_scholarship_student_status'];
$get_scholarship_document_status = $data['get_scholarship_document_status'];


?>
	<link href="<?php echo URLROOT?>/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<link href="<?php echo URLROOT?>/assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarship Status</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Status</li>
				</ol>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<div class="borderBox light bordered card-box">
					<div class="borderBox-title tabbable-line">
						<div class="caption">
							<span class="caption-subject font-dark bold uppercase">Check status</span>
						</div>
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#borderBox_tab1" data-bs-toggle="tab" <?php if ($page_id == Null) {
																					echo "class='active'"; }?>> Applied </a>
							</li>
							<li class="nav-item">
								<a href="#borderBox_tab2" data-bs-toggle="tab"> Application </a>
							</li>
							<li class="nav-item">
								<a href="#borderBox_tab3" data-bs-toggle="tab"> Interview </a>
							</li>
							<!-- <li class="nav-item">
								<a href="#borderBox_tab7" data-bs-toggle="tab"> Operations </a>
							</li> -->
							<!-- <li class="nav-item">
								<a href="#borderBox_tab6" data-bs-toggle="tab"> Recordings </a>
							</li> -->

							<li class="nav-item">
								<a href="#borderBox_tab4" data-bs-toggle="tab" <?php if ($page_id == 4) {
																					echo "class='active'"; }?>>Verification </a>
							</li>
						
							<!-- <li class="nav-item">
								<a href="#borderBox_tab4" data-bs-toggle="tab"> Granted </a>
							</li> -->
						</ul>
					</div>
					<div class="borderBox-body">
						<div class="tab-content">
							<div class="tab-pane <?php if ($page_id == Null) {
																					echo 'active'; }?>" id="borderBox_tab1">

							<h6>Student Log of Status</h6>
								<style>
									table {
										border-collapse: collapse;
										width: 100%;
									}

									thead {
										background-color: #ddd;
									}

									th,
									td {
										border: 1px solid #ddd;
										padding: 8px;
										text-align: left;
									}

									th {
										font-weight: bold;
									}

									tr:nth-child(even) {
										background-color: #f2f2f2;
									}
								</style>
								<table>
									<thead>
										<tr>
											<th>No.</th>
											<th>Action</th>
											<th>Created by</th>
											<th>Comment</th>
											<th>Created At</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 1; ?>
										<tr>
											<td><?php echo $count ?></td>
											<td>The student status has been changed to Registered</td>
											<td>System</td>

											<td>Pending</td>
											<td><?php echo $formatted_time = date('d-m-Y H:i:s', strtotime($get_scholarship_application->created_at)); ?></td>
										</tr>
										<?php foreach ($get_scholarship_student_status as $student_status) {
											$count++;
											$get_default_scholarship_status = $adminMod->get_single_default_scholarship_status($student_status->status);
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td>The student status has been changed to <?php echo $get_default_scholarship_status->name; ?></td>
												<td><?php if ($student_status->created_by == 1) {
														echo "Admin";
													} else {
														$get_auth_detail = $adminMod->get_auth_detail($student_status->created_by);
														if ($get_auth_detail->type == "subadmin_scholarship") {
															echo "Subadmin";
														} elseif ($get_auth_detail->type == "corporate") {
															echo "Corporate";
														}
													}; ?></td>

												<td><?php echo $student_status->message; ?></td>
												<td><?php


													echo $formatted_time = date('d-m-Y H:i:s', strtotime($student_status->created_at));  ?></td>




											</tr>
										<?php } ?>
									</tbody>
								</table>

							</div>
							<div class="tab-pane" id="borderBox_tab3">


								<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Interview Details</header>
									
								
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="card card-box">
											<div class="card-head">
												<header>Interview Details</header>
											</div>
											<div class="card-body " id="bar-parent">
												<table id="exportTable" class="display nowrap" style="width:100%">
													<thead>
														<tr>
															<th>Id</th>
															<th>Levels</th>
															<th>Date</th>
															<th>Time</th>
															<th>Comment</th>
															<th>Phone Number</th>
															<th>Disposition</th>
															<th>File(Only mp3 & mp4)</th>
															<th>Comments</th>
															<th>Action</th>

															<!-- <th>Title</th>
															<th>File Present</th>
															<th>Created Date</th> -->

														</tr>
													</thead>
													<tbody>

														<?php
														$count = 0;
														foreach ($data['get_scholarship_status_interview'] as $interview_status) {
															$count++;
														?>
															<tr class="text-center">
																<form action="<?php echo URLROOT; ?>/admin/update_interview_status/<?php echo $interview_status->id; ?>" method="post" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal">
																	<input type="hidden" name="student_id" value="<?php echo $get_scholarship_application->student_id; ?>">
																	<input type="hidden" name="application_id" value="<?php echo $get_scholarship_application->id; ?>">
																	<input type="hidden" name="scholarship_id" value="<?php echo $get_scholarship_application->scholarship_id; ?>">

																	<td style="width:5%;"><?php echo $count; ?></td>
																	<td><?php if ($interview_status->interview_levels == 1) {
																			echo "Telephonic";
																		} elseif ($interview_status->interview_levels == 2) {
																			echo "Video Call";
																		} elseif ($interview_status->interview_levels == 3) {
																			echo "Face to Face";
																		} ?></td>
																	<td><?php echo $interview_status->interview_date; ?></td>
																	<td><?php echo $interview_status->interview_time; ?></td>
																	<td><?php echo $interview_status->interview_comments; ?></td>
																	<td><?php echo $interview_status->interview_phone_number; ?></td>
																	<?php if (empty($interview_status->recording_disposition)) { ?>
																		<td>
																			Pending
																		</td>
																		<td>Pending</td>
																		<td>Pending</td>
																		<td style="width:5%;">Pending</td>
																	<?php } else {
																	?>

																		<td>
																			<?php echo $interview_status->recording_disposition; ?>
																		</td>
																		<td><?php if (!empty($interview_status->recording_file)) { ?>
																				<!-- <audio controls>
																					<source src="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" type="audio/mp3">
																					Your browser does not support the audio element.
																				</audio> -->
																				<!-- <a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"><i class="fa fa-eye"></i></a> -->


																				<?php
																				// $file_name = $interview_status->recording_file;
																				// $file_type = mime_content_type($file_name);
																				$extension_1 = pathinfo($interview_status->recording_file, PATHINFO_EXTENSION);
																				// $extension_2 = pathinfo($file_name_2, PATHINFO_EXTENSION);
																				if ($extension_1 == 'mp4') { ?>
																					<a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"> <i class="fa fa-video"></i></a>
																				<?php } elseif ($extension_1 == 'mp3') { ?>
																					<a href="<?php echo URLROOT; ?>/uploads/<?php echo $interview_status->recording_file; ?>" target="_blank"> <i class="fa fa-music"></i></a>
																				<?php }
																				?>
																			<?php } else { ?>
																				<i class="fa fa-eye-slash"></i>
																			<?php } ?>
																		</td>
																		<td>
																			<?php echo $interview_status->recording_comments; ?>
																		</td>
																		<td><?php if ($interview_status->recording_updated_by == 1) {
																				echo "Admin";
																			} else {
																				$get_auth_detail = $adminMod->get_auth_detail($interview_status->recording_updated_by);
																				if ($get_auth_detail->type == "subadmin_scholarship") {
																					echo "Subadmin";
																				} elseif ($get_auth_detail->type == "corporate") {
																					echo "Corporate";
																				}
																			}; ?></td>



																	<?php } ?>

																</form>
															</tr>



														<?php } ?>



													</tbody>
													<!-- <tfoot>
														<tr>
															<th>Id</th>
															<th>Title</th>
															<th>File Present</th>
															<th>Created Date</th>
														</tr>
													</tfoot> -->
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



								<!-- <p>
										<button class="btn red" type="submit"> Proceed </button>
									</p> -->

							</div>
							<div class="tab-pane" id="borderBox_tab7">
				<!-- empty application -->

							</div>
							<div class="tab-pane" id="borderBox_tab6">

<!-- Empty -->

							</div>

							<div class="tab-pane <?php if ($page_id == 4) {
																					echo 'active'; }?>" id="borderBox_tab4" >
							<?php if ($get_scholarship_application->documents !== Null) { ?>
									<?php
									$all_documents_required = explode(',', $get_scholarship->documents_required);
									$get_document_to_be_uploaded_by_user = $get_scholarship_application->document_ids;
									$explode_get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$explode_get_document_uploaded_by_user = explode(',', $get_scholarship_application->documents);

									// $combine = array_combine($all_critieria,$get_criteria_answer_by_user);
									$student_class = $student->class;
									$get_document_to_be_uploaded_by_user = explode(',', $get_document_to_be_uploaded_by_user);
									$document_count = 0;

									?>
									<table>
										<tr>
											<th>Name</th>
											<th>Doc</th>
											<th>Subadmin Status</th>
											<th>Admin Status</th>
											<th>Corporate Status</th>
											<th>Status</th>
											<th>Comment</th>
											<th>Action</th>
										</tr>
										<?php
										$count = 0;
										foreach ($get_document_to_be_uploaded_by_user as $document_id) {
											$get_document_detail = $corporateMod->get_ind_scholarship_doc($document_id);

											// echo $get_criteria_detail->criteria_name;
											if ($get_document_detail->class == $student_class) {
												$get_document_detail = $studentMod->get_scholarship_document_detail($get_document_detail->id);
										?>

												<form method="post" action="<?php echo URLROOT; ?>/admin/scholarship_document_status/<?php echo $get_scholarship_application->id; ?>/<?php echo $document_id; ?>" enctype="multipart/form-data" autocomplete="OFF" class="form-horizontal" id="form_sample_1">
													<?php

													$document_status_by_subadmin = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'subadmin');
													$document_status_by_admin = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'admin');
													$document_status_by_corporate = $adminMod->get_last_scholarship_document_status_by_type($application_id, $document_id, 'corporate');

													if (!empty($document_status_by_subadmin)) {
														$document_status_by_subadmin_value = $document_status_by_subadmin->status;
													} else {
														$document_status_by_subadmin_value = 0;
													}
													if (!empty($document_status_by_admin)) {
														$document_status_by_admin_value = $document_status_by_admin->status;
													} else {
														$document_status_by_admin_value = 0;
													}
													if (!empty($document_status_by_corporate)) {
														$document_status_by_corporate_value = $document_status_by_corporate->status;
													} else {
														$document_status_by_corporate_value = 0;
													}
													?>
													<tr>
														<th><?php echo $get_document_detail->name; ?></th>
														<th><a href="<?php echo URLROOT ?>/uploads/<?php echo $explode_get_document_uploaded_by_user[$document_count] ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a></th>
														<th>
															<?php if ($document_status_by_subadmin_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_subadmin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_subadmin_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_subadmin_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_subadmin_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_subadmin_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_subadmin_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_subadmin_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php if ($document_status_by_admin_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_admin_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_admin_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_admin_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_admin_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_admin_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_admin_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_admin_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php if ($document_status_by_corporate_value == 1) { ?>
																<button type="button" class="btn btn-circle btn-success"><i class=" fa fa-plus-circle"></i> Verified </button>
															<?php } elseif ($document_status_by_corporate_value == 7) { ?>
																<button type="button" class="btn btn-circle btn-danger"><i class=" fa fa-plus-circle"></i> Rejected </button>
															<?php } else { ?>
																<button type="button" class="btn btn-circle btn-secondary"><i class=" fa fa-plus-circle"></i> NotVerified <i class="fas fa-arrow-right"></i>


																	<?php if ($document_status_by_corporate_value == 0) {
																		echo "Pending";
																	} elseif ($document_status_by_corporate_value == 2) {
																		echo "InCorrect";
																	} elseif ($document_status_by_corporate_value == 3) {
																		echo "Missing";
																	} elseif ($document_status_by_corporate_value == 4) {
																		echo "Blurred";
																	} elseif ($document_status_by_corporate_value == 5) {
																		echo "Verified";
																	} elseif ($document_status_by_corporate_value == 6) {
																		echo "Ineligible";
																	}  ?>


																</button>
															<?php } ?>

														</th>
														<th>
															<?php
															if ($_SESSION['rexkod_oodles_login_type'] == "subadmin_scholarship") {
																$document_status_value = $document_status_by_subadmin_value;
															} elseif ($_SESSION['rexkod_oodles_login_type'] == "admin") {
																$document_status_value = $document_status_by_admin_value;
															} elseif ($_SESSION['rexkod_oodles_login_type'] == "corporate") {
																$document_status_value = $document_status_by_corporate_value;
															}
															?>

															<select name="document_status" class="form-control">
																<option value="0" <?php if ($document_status_value == 0) {
																						echo "selected";
																					} ?>>Pending</option>
																<option value="1" <?php if ($document_status_value == 1) {
																						echo "selected";
																					} ?>>Correct</option>
																<option value="2" <?php if ($document_status_value == 2) {
																						echo "selected";
																					} ?>>InCorrect</option>
																<option value="3" <?php if ($document_status_value == 3) {
																						echo "selected";
																					} ?>>Missing</option>
																<option value="4" <?php if ($document_status_value == 4) {
																						echo "selected";
																					} ?>>Blurred</option>
																<option value="5" <?php if ($document_status_value == 5) {
																						echo "selected";
																					} ?>>Not Verified</option>
																<option value="6" <?php if ($document_status_value == 6) {
																						echo "selected";
																					} ?>>Ineligible</option>
																<option value="7" <?php if ($document_status_value == 7) {
																						echo "selected";
																					} ?>>Rejected</option>
															</select>
														</th>
														<th> <input type="text" name="document_comment" placeholder="Your comment" class="form-control input-height" /></th>
														<th><button type="submit" name="submit" class="btn btn-primary">Submit</button></th>
													</tr>

												</form>


										<?php

											}

											$count++;
											$document_count++;
										}
										?>
									</table>
								<?php } else {  ?>
									<p>Pending</p>
								<?php } ?>





								<h6>Document Verfication Log Status</h6>
								<style>
									table {
										border-collapse: collapse;
										width: 100%;
									}

									thead {
										background-color: #ddd;
									}

									th,
									td {
										border: 1px solid #ddd;
										padding: 8px;
										text-align: left;
									}

									th {
										font-weight: bold;
									}

									tr:nth-child(even) {
										background-color: #f2f2f2;
									}
								</style>
								<table>
									<thead>
										<tr>
											<th>No.</th>
											<th>Action</th>
											<th>Created by</th>
											<th>Comment</th>
											<th>Created At</th>
										</tr>
									</thead>
									<tbody>
										<?php $count = 0; ?>

										<?php foreach ($get_scholarship_document_status as $student_status) {
											$get_document_by_id = $adminMod->get_document_by_id($student_status->doc_id);
											$count++;
											// $get_default_scholarship_status = $adminMod->get_single_default_scholarship_status($student_status->status);
										?>
											<tr>
												<td><?php echo $count; ?></td>




												<td><?php echo $get_document_by_id->name; ?> status has been changed to <?php if ($student_status->status == 1) {
																															echo "Correct";
																														} elseif ($student_status->status == 2) {
																															echo "InCorrect";
																														} elseif ($student_status->status == 0) {
																															echo "Pending";
																														} elseif ($student_status->status == 3) {
																															echo "Missing";
																														} elseif ($student_status->status == 4) {
																															echo "Blurred";
																														} elseif ($student_status->status == 5) {
																															echo "Not Verified";
																														} elseif ($student_status->status == 6) {
																															echo "Ineligible";
																														} elseif ($student_status->status == 7) {
																															echo "Rejected";
																														} ?>. </td>

												<td><?php if ($student_status->created_by == 1) {
														echo "Admin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "admin")) {
														echo "Admin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "subadmin")) {
														echo "Subadmin";
													} elseif (($student_status->created_by == 0) && ($student_status->created_by_type == "corporate")) {
														echo "Corporate";
													} else {
														$get_auth_detail = $adminMod->get_auth_detail($student_status->created_by);
														if ($get_auth_detail->type == "subadmin_scholarship") {
															echo "Subadmin";
														} elseif ($get_auth_detail->type == "corporate") {
															echo "Corporate";
														}
													}; ?></td>
												<td><?php echo $student_status->comment; ?></td>
												<td><?php


													echo $formatted_time = date('d-m-Y H:i:s', strtotime($student_status->created_at));  ?></td>




											</tr>
										<?php } ?>
									</tbody>
								</table>


								<!-- <p>
										<button class="btn red" type="submit"> Proceed </button>
									</p> -->
						
							</div>
							<div class="tab-pane" id="borderBox_tab2">
					
							<div class="white-box">

<!--| ABOUT |--------------------------------------------------->
<section id="about" class="container">
	<div class="row">
		<div class="col-md-6">
			<img src="<?php echo URLROOT; ?>/uploads/<?php echo $student_detail->student_image; ?>" style="height:200px;width:200px;">
			<!-- <h6 class="display-4"><?php echo $student_detail->f_name . " " . $student_detail->l_name; ?></h6> -->
		</div>
		<div class="col-md-6">
			<address style="float:right;">
				<p class="addr-font-h3">Student</p>
				<p class="font-bold addr-font-h4"><?php echo $student_detail->f_name . " " . $student_detail->l_name; ?></p>
				<p class="text-muted m-l-30">
					<?php if (!empty($student_detail->comm_address)) {
						echo $student_detail->comm_address;
					} else {
						echo "Nill";
					} ?>&nbsp;<?php if (!empty($student_detail->comm_village)) {
echo $student_detail->comm_village;
} else {
echo "Nill";
} ?>&nbsp;<?php if (!empty($student_detail->comm_block)) {
												echo $student_detail->comm_block;
											} else {
												echo "Nill";
											} ?>&nbsp;<?php if (!empty($student_detail->comm_pin_code)) {
														echo $student_detail->comm_pin_code;
													} else {
														echo "Nill";
													} ?></p>
				</p>
				<p class="m-t-30">
					<b>DOB :</b> <i class="fa fa-calendar"></i> <?php if (empty($student_detail->dob)) {
																	$dob = "dd/mm/yy";
																	echo $dob;
																} else {
																	echo $dob = date("d/m/y", strtotime($student_detail->dob));
																}
																?>
				</p>
				<p style="margin-bottom:0px;"><b>Gender :</b> <?php if (!empty($student_detail->gender)) {
																	echo $student_detail->gender;
																} else {
																	echo "Nill";
																} ?> </p>
				<p style="margin-bottom:0px;"><b>Religion :</b> <?php if (!empty($student_detail->religion)) {
																	echo $student_detail->religion;
																} else {
																	echo "Nill";
																} ?> </p>
				<p style="margin-bottom:0px;"><b>Category :</b> <?php if (!empty($student_detail->category)) {
																	echo $student_detail->gender;
																} else {
																	echo "Nill";
																} ?> </p>

			</address>
		</div>
		<p>
			<strong>About:</strong>

			<?php if (!empty($student_detail->description)) {
				echo ucwords($student_detail->description);
			} else {
				echo "Nill";
			}
			?>

		</p>
		<p>
			<strong>Achievements:</strong>
			<?php
			$values = explode(",", $student_detail->achievements);

			foreach ($values as $value) {
				if (empty($value)) {
					echo "Null\n";
				} else {
			?>
					<span class="badge badge-info"><?php echo ucwords($value); ?></span>
			<?php
				}
			}
			?>



		</p>
</section>

<div class="col-md-12">
	<div class="table-responsive m-t-40">
		<table class="table table-hover">
			<thead>
				<strong>Current Education</strong>

				<tr>
					<th scope="col"><strong>Institute Name</strong></th>
					<th scope="col"><strong>Class/Course</strong></th>
					<th scope="col"><strong>Boards</strong></th>
					<th scope="col"><strong>State</strong></th>
					<th scope="col"><strong>City</strong></th>


				</tr>
			</thead>
			<tbody>


				<tr>
					<td>
						<p class="text-muted text-center" style="font-size: 15px;"><?php
																					if (isset($student_detail->academic_name)) {
																						if (($student_detail->academic_name != 0) && ($student_detail->academic_name != Null)) {
																							$academic_type = substr(($student_detail->academic_name), 0, 1);
																							$academic_name = substr($student_detail->academic_name, 1);

																							$get_school_detail  = $student_detailMod->get_school_detail_single($academic_name);



																							if ($academic_type == 1) {
																								$get_school_detail  = $student_detailMod->get_school_detail($academic_name);
																								echo ucwords($get_school_detail->school_name);
																							} elseif ($academic_type == 2) {
																								$get_college_detail  = $student_detailMod->get_ind_college_detail($academic_name);
																								echo $get_college_detail->college_name;
																							} else {
																								echo "dfdfdf";
																							}
																						} elseif ($student_detail->academic_name == 0) {
																							echo ucwords($student_detail->academic_other_name);
																						} else {
																							echo  "Nill";
																						}
																					} else {
																						echo "Nill";
																					}
																					?></p>
					</td>
					<td>
						<p class="text-muted text-center" style="font-size: 15px;"> <?php if (isset($student_detail->course)) {
																						$student_detailMod = new Students;
																						$get_class_detail = $student_detailMod->get_class_detail_single($student_detail->course);
																						echo ucwords($get_class_detail->class_name);
																					} else {
																						echo "Nill";
																					}
																					?></p>
					</td>
					<td>
						<p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail->board)) {
																						$student_detailMod = new Students;
																						$get_board_detail = $student_detailMod->get_board_detail_single($student_detail->board);
																						echo $get_board_detail->name;
																					} else {
																						echo "Nill";
																					}
																					?></p>
					</td>
					<td>
						<p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail->institute_state)) {
																						echo $student_detail->institute_state;
																					} else {
																						echo "Nill";
																					} ?></p>
					</td>
					<td>
						<p class="text-muted text-center" style="font-size: 15px;"><?php if (!empty($student_detail->institute_city)) {
																						echo $student_detail->institute_city;
																					} else {
																						echo "Nill";
																					} ?></p>
					</td>


				</tr>


				<tr>

			</tbody>
		</table>
	</div>
</div>
<div class="col-md-12">
	<div class="table-responsive m-t-40">
		<table class="table table-hover">
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
				if (
					isset($student_detail->p_academic_name) && !empty($student_detail->p_academic_name)
					&& isset($student_detail->p_class) && !empty($student_detail->p_class)
					&& isset($student_detail->p_cgpa) && !empty($student_detail->p_cgpa)
					&& isset($student_detail->p_start_date) && !empty($student_detail->p_start_date)
					&& isset($student_detail->p_end_date) && !empty($student_detail->p_end_date)
				) {


					$p_academic_name = explode(',', $student_detail->p_academic_name);
					$p_class = explode(',', $student_detail->p_class);
					$p_cgpa = explode(',', $student_detail->p_cgpa);
					$p_start_date = explode(',', $student_detail->p_start_date);
					$p_end_date = explode(',', $student_detail->p_end_date);
				?>
					<?php $count = 0;
					foreach ($p_academic_name as $name) {
						$student_detailMod = new Students;
						$get_class_detail = $student_detailMod->get_class_detail_single($p_class[$count]);
					?>
						<tr>
							<td>
								<p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_academic_name[$count] ?></p>
							</td>
							<td>
								<p class="text-muted text-center" style="font-size: 15px;"><?php echo $get_class_detail->class_name ?></p>
							</td>
							<td>
								<p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_cgpa[$count] ?></p>
							</td>
							<td>
								<p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_start_date[$count] ?></p>
							</td>
							<td>
								<p class="text-muted text-center" style="font-size: 15px;"><?php echo $p_end_date[$count] ?></p>
							</td>
						</tr>

					<?php $count++;
					} ?>
				<?php } else {
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

<!-- CONTACT ----------------------------------------------------->

<section class="container" id="contact">
	<table class="table table-striped" style="background-color: #F2F2F2; border: none; border-collapse: collapse;">
		<thead>
			<thead>
				<tr>
					<th>Phone</th>

					<td><?php if (!empty($student_detail->f_phone)) {
							echo $student_detail->f_phone;
						} else {
							echo "Nill";
						} ?></td>
				</tr>
			</thead>
		<tbody>
			<tr>
				<th>Whatsapp</th>

				<td><?php if (!empty($student_detail->whatsapp_no)) {
						echo $student_detail->whatsapp_no;
					} else {
						echo "Nill";
					} ?></td>

			</tr>
			<tr>
				<th>Email</th>

				<td><a href="">student@gmail.com</a></td>

			</tr>
		</tbody>
	</table>

	<!-- <div class="row">
<div class="col-sm-12"><strong>Contact</strong></div>
</div>
<div class="row">
<div class="col-sm-6">Phone:</div>
<div class="col-sm-6"></div>
</div>
<div class="row">
<div class="col-sm-6">Whatsapp:</div>
<div class="col-sm-6"><?php if (!empty($student_detail->whatsapp_no)) {
	echo $student_detail->whatsapp_no;
} else {
	echo "Nill";
} ?></div>
</div>
<div class="row">
<div class="col-sm-6">Email:</div>
<div class="col-sm-6"><a href="">student@gmail.com</a></div>
</div> -->

</section>


<div class="text-right">

	<a href="<?php echo URLROOT; ?>/admin/resume_printout/<?php echo $student_id; ?>" target="_blank"> <button class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button></a>
</div>

</div>
							</div>
								</form>
							<div class="tab-pane" id="borderBox_tab4">
				<!-- empty -->
							</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_corporate/footer.php'; ?>

<script type="text/javascript">
  function noenter() {
  return !(window.event && window.event.keyCode == 13); }
</script>
<script src="<?php echo URLROOT?>/assets/plugins/dropzone/dropzone.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/dropzone/dropzone-call.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/buttons.flash.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/jszip.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/pdfmake.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/vfs_fonts.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/buttons.html5.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/plugins/datatables/export/buttons.print.min.js"></script>
	<script src="<?php echo URLROOT?>/assets/js/pages/table/table_data.js"></script>
	<script>
	CKEDITOR.replace('oodles_editor1', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>