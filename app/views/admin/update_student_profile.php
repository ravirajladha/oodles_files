<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
<script>
	$(document).ready(function() {


		var readURL = function(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('.avatar').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


		$(".file-upload").on('change', function() {
			readURL(this);
		});
	});
</script>
<style>
	input.larger {
		width: 35px;
		height: 35px;
	}
</style>
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
echo $count;
$percentage_filled_column  = ($count / 56) * 100;
echo $percentage_filled_column;
?>
<script></script>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<!-- <div class="page-title-breadcrumb">
				<div class=" pull-left">
					<?php

					?>
					<?php ($data['empty_column_in_student']) ?>

					<div class="page-title">Update Profile

					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT ?>/student?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Update Profile</li>
				</ol>


			</div> -->

		</div>






		<div class="card-body">

			<div class="row">
				<!-- <div class="progress">

	<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style=" width: <?php echo $percentage_filled_column; ?>%">Profile Completed: <?php echo round($percentage_filled_column); ?>%</div>
</div> -->
				<!-- new progress bar testing -->
				<div class="col-md-12 col-sm-12 col-12">
					<div class="card">
						<div class="panel-body">

							<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $percentage_filled_column; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage_filled_column; ?>%;"></div>
							</div>
							<span class="text-small margin-top-10 full-width"><?php echo round($percentage_filled_column, 0); ?>% Profile Completed</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $student_detail_auth = $data['get_current_user_auth'] ?>
		<form method="post" action="<?php echo URLROOT; ?>/admin/update_profile_data/<?php echo $data['student_id']; ?>" enctype="multipart/form-data" autocomplete="OFF" id="form">
			<input type="text" name="url" value="student" hidden>
			<div class="tab-pane active fontawesome-demo" id="tab1">
				<div class="row">
					<div class=" col-sm-12">
						<div class="card card-box">
							<div class="card-head">
								<!-- <header>Update Student Personal Details</header> -->
								<header>COMPLETE YOUR PROFILE DETAIL TO PLAY QUIZ & EARN SCHOLARSHIPS</header>
								<span class="mdl-chip" style="float:right;">
									<a href="<?php echo URLROOT; ?>/admin/students"> <span class="mdl-chip__text">Skip All</span></a>
								</span>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body">

								<div class="row">

									<!-- <div class="col-md-12 col-sm-12 col-12">
										<div class="card">
											<div class="panel-body">

												<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
													<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $percentage_filled_column; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage_filled_column; ?>%;"></div>
												</div>
												<span class="text-small margin-top-10 full-width"><?php echo round($percentage_filled_column, 0); ?>% Profile Completed</span>
											</div>
										</div>
									</div> -->
									<!-- end progress bar -->
									<div class="text-center">
										<?php if (!empty($student->student_image)) { ?>
											<img src="<?php echo URLROOT; ?>/uploads/<?php echo $student->student_image ?>" class="avatar img-circle img-thumbnail" alt="avatar" style="height:100px; width:100px">
											<h6>Update Applicant's Passport Size Photo<span>*</span></h6>
											<input type="file" class="text-center center-block file-upload" name="student_image">
										<?php } else { ?>
											<img src="<?php echo URLROOT; ?>/assets_ho
											me/images/about/profile_picture.png" class="avatar img-circle img-thumbnail" alt="avatar" style="height:100px; width:100px">
											<h6>Upload Applicant's Passport Size Photo<span>*</span></h6>
											<input type="file" class="text-center center-block file-upload" name="student_image">
										<?php } ?>
									</div>
									</hr><br>
									<div class="col-md-4 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>First Name as per Aadhar<span>*</span></label>
											<input type="text" class="form-control mdl-textfield__input" id="f_name" name="f_name" placeholder="<?php echo $student_detail_auth->name ?>" value="<?php echo ucwords($student_detail_auth->name) ?>" readonly>
										</div>
									</div>


									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Last Name as per Aadhar<span>*</span></label>
											<input type="text" class="form-control mdl-textfield__input" id="l_name" name="l_name" <?php if (!empty($student->l_name)) { ?>placeholder="<?php echo $student->l_name ?>" <?php } else { ?> placeholder="Enter Last Name" <?php } ?> value="<?php echo $student->l_name ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Email ID<span>*</span></label>
											<input type="email" name="email_id" class="form-control mdl-textfield__input" placeholder="<?php echo $student_detail_auth->email ?>" value="<?php echo $student_detail_auth->email ?>">
										</div>
									</div>




									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Mobile Number<span>*</span></label>
											<input type="number" class="form-control mdl-textfield__input" id="phone_no" name="phone_no" oninput="numberOnly(this.id);" maxlength="10" placeholder="<?php echo $student_detail_auth->phone ?>" value="<?php echo $student_detail_auth->phone ?>" readonly>
										</div>
									</div>

									<div class="col-md-5 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Whatsapp Number<span>*</span></label>
											<input type="number" class="form-control mdl-textfield__input" id="whatsapp_no" name="whatsapp_no" placeholder="Tick if Whatsapp Number same as your Mobile Number" oninput="numberOnly(this.id);" maxlength="10" value="<?php echo $student->whatsapp_no ?>">

										</div>
									</div>
									<div class="col-md-1 col-sm-12">
										<br>
										<br>


										<input type="checkbox" id="checkbox1" name="same_as_phone" <?php if ($student->same_as_phone == 1) {
																										echo "checked";
																									} ?> class="larger">
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>DOB as Aadhar<span>*</span></label>
											<input id="myDate" class="form-control mdl-textfield__input" type="date" name="dob" value="<?php echo $student->dob ?>" max="2017-01-01">
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Gender<span>*</span></label>
											<select class="form-control mdl-textfield__input" name="gender" id="select_change" placeholder="">
												<?php if ($student->gender == "Male") { ?>
													<option value="Male" selected="selected">Male</option>
												<?php } else { ?>
													<option value="Male">Male</option>
												<?php } ?>

												<?php if ($student->gender == "Female") { ?>
													<option value="Female" selected="selected">Female</option>
												<?php } else { ?>
													<option value="Female">Female</option>
												<?php } ?>
												<?php if ($student->gender == "Transgender") { ?>
													<option value="Transgender" selected="selected">Transgender</option>
												<?php } else { ?>
													<option value="Transgender">Transgender</option>
												<?php } ?>

											</select>
										</div>
									</div>

									<!-- 
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>State</label>
										<input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
									</div>
								</div> -->
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Religion<span>*</span></label>
											<select class="form-control mdl-textfield__input" name="religion" id="select_change" placeholder="Enter Religion">
												<option value="">--Select--</option>

												<?php if ($student->religion == "Buddhism") { ?>
													<option value="Buddhism" selected="selected">Buddhism</option>
												<?php } else { ?>
													<option value="Buddhism">Buddhism</option>
												<?php } ?>
												<?php if ($student->religion == "Christian") { ?>
													<option value="Christian" selected="selected">Christian</option>
												<?php } else { ?>
													<option value="Christian">Christian</option>
												<?php } ?>
												<?php if ($student->religion == "Hindu") { ?>
													<option value="Hindu" selected="selected">Hindu</option>
												<?php } else { ?>
													<option value="Hindu">Hindu</option>
												<?php } ?>
												<?php if ($student->religion == "Jain") { ?>
													<option value="Jain" selected="selected">Jain</option>
												<?php } else { ?>
													<option value="Jain">Jain</option>
												<?php } ?>
												<?php if ($student->religion == "Parsi") { ?>
													<option value="Parsi" selected="selected">Parsi</option>
												<?php } else { ?>
													<option value="Parsi">Parsi</option>
												<?php } ?>
												<?php if ($student->religion == "Sikh") { ?>
													<option value="Sikh" selected="selected">Sikh</option>
												<?php } else { ?>
													<option value="Sikh">Sikh</option>
												<?php } ?>
												<?php if ($student->religion == "Muslim") { ?>
													<option value="Muslim" selected="selected">Muslim</option>
												<?php } else { ?>
													<option value="Muslim">Muslim</option>
												<?php } ?>
												<?php if ($student->religion == "Others") { ?>
													<option value="Others" selected="selected">Others</option>
												<?php } else { ?>
													<option value="Others">Others</option>
												<?php } ?>

											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Category<span>*</span></label>

											<select class="form-control mdl-textfield__input" name="category" id="select_change" placeholder="Enter Category">
												<?php if ($student->gender == "General") { ?>
													<option value="General" selected="selected">General</option>
												<?php } else { ?>
													<option value="General">General</option>
												<?php } ?>
												<?php if ($student->gender == "NTDNT") { ?>
													<option value="NTDNT" selected="selected">NTDNT</option>
												<?php } else { ?>
													<option value="NTDNT">NTDNT</option>
												<?php } ?>
												<?php if ($student->gender == "OBC-C") { ?>
													<option value="OBC-C" selected="selected">OBC-C</option>
												<?php } else { ?>
													<option value="OBC-C">OBC-C</option>
												<?php } ?>
												<?php if ($student->gender == "OBC-NC") { ?>
													<option value="OBC-NC" selected="selected">OBC-NC</option>
												<?php } else { ?>
													<option value="OBC-NC">OBC-NC</option>
												<?php } ?>
												<?php if ($student->gender == "SC") { ?>
													<option value="SC" selected="selected">SC</option>
												<?php } else { ?>
													<option value="SC">SC</option>
												<?php } ?>
												<?php if ($student->gender == "ST") { ?>
													<option value="ST" selected="selected">ST</option>
												<?php } else { ?>
													<option value="ST">ST</option>
												<?php } ?>
												<?php if ($student->gender == "VJ/NT") { ?>
													<option value="VJ/NT" selected="selected">VJ/NT</option>
												<?php } else { ?>
													<option value="VJ/NT">VJ/NT</option>
												<?php } ?>
												<?php if ($student->gender == "Other Reservations") { ?>
													<option value="Other Reservations" selected="selected">Other Reservations</option>
												<?php } else { ?>
													<option value="Other Reservations">Other Reservations</option>
												<?php } ?>

											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Physically Challenged<span>*</span></label>
											<select class="form-control mdl-textfield__input" name="physically" id="select_change" placeholder="">
												<option value="No">No</option>
												<option value="Yes">Yes</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Aadhar Number<span>*</span></label>
											<input type="number" class="form-control mdl-textfield__input" name="aadhar" id="aadhar" <?php if (!empty($student->aadhar)) { ?>placeholder="<?php echo $student->aadhar ?>" <?php } else { ?> placeholder="XXXXXXXXXXXX" <?php } ?> value="<?php echo $student->aadhar ?>" oninput="numberOnly(this.id);" maxlength="12">
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Update Proof of Address<span>*
													<?php if (isset($student->address_proof)) { ?>
														<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->address_proof ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
													<?php } ?>
												</span></label>
											<input class="form-control mdl-textfield__input" type="file" id="address_proof" name="address_proof" <?php if (!isset($student->address_proof)) { ?> <?php } ?>>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Update Proof of Identity <?php if (isset($student->identity_proof)) { ?>
													<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->identity_proof ?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
												<?php } ?></label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="identity_proof">
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-lg-6">
											<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
										</div>
										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" name="personal_submit" value="1">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane active fontawesome-demo" id="tab2">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Current Academic Information</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body collapse">
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->

											<label for="list2">Select Academic Level</label>

											<select name="academic_type" class="form-control mdl-textfield__input">
												<option readonly value="">--Select--</option>
												<option value="1" <?php if ($student->academic_type == 1) {
																		echo "selected";
																	} ?>>School</option>
												<option value="2" <?php if ($student->academic_type == 2) {
																		echo "selected";
																	} ?>>College</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->

											<?php
											$academic_type = substr(($student->academic_name), 0, 1);
											$academic_name = substr($student->academic_name, 1);
											?>
											<label for="list2">Select Institute Name<?php echo $academic_name; ?></label>
											<select name="academic_name" class="form-control mdl-textfield__input" onchange="academic_other_input(this);">
												<option readonly value="">--Select--</option>

												<?php
												$school = 0;
												$college = 0;
												if (!empty($student->academic_name) || ($student->academic_name !== 0)) {

													$academic_type = substr(($student->academic_name), 0, 1);
													$academic_name = substr($student->academic_name, 1);
													if ($academic_type == 1) {
														$school = 1;
														$college = 0;
													} elseif ($academic_type == 2) {
														$college = 1;
														$school = 0;
													}
												} elseif ($student->academic_name !== 0) {
													$school = 0;
													$college = 0;
												} else {
													$school = "xyz1";
													$college = "xyz2";
												}
												?>

												<?php foreach ($data['get_school_detail'] as $school_detail) { ?>

													<option value="1<?php echo $school_detail->school_id; ?>" <?php if ($school == 1) {
																													if ($academic_name == $school_detail->school_id) {
																														echo "selected";
																													}
																												} ?>><?php echo $school_detail->school_name; ?></option>
												<?php } ?>
												<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="2<?php echo $college_detail->id; ?>" <?php if ($college == 1) {
																											if ($academic_name == $college_detail->id) {
																												echo "selected";
																											}
																										} ?>><?php echo $college_detail->college_name; ?></option>
												<?php } ?>
												<option value="0" <?php if ($student->academic_name == "0") {
																		echo "selected";
																	} ?>>Other</option>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-6" style="display:none;" id="academic_other_name">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Institute Name</label>
											<input type="textr" class="form-control mdl-textfield__input" name="academic_other_name" placeholder="<?php echo $student->academic_other_name ?>" value="<?php echo $student->academic_other_name ?>">
										</div>
									</div>


									<div class="col-md-3 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Present Class / Course</label>
											<select class="form-control mdl-textfield__input" name="course" id="select_change" disabled>
												<option value="" readonly>-Select-</option>
												<?php foreach ($data['get_all_class'] as $class_detail) { ?>
													<option value="<?php echo $class_detail->id; ?>" <?php if ($student_detail_auth->class == $class_detail->id) {
																											echo "selected";
																										} ?>><?php echo $class_detail->class_name; ?></option>
												<?php } ?>

											</select>

										</div>
									</div>
									<input type="text" value="<?php echo $student_detail_auth->class ?>" name="course" hidden>

									<div class="col-md-4 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Boards</label>
											<select class="form-control mdl-textfield__input" name="board" id="select_change">
												<option value="" readonly>-Select-</option>
												<?php foreach ($data['get_all_boards'] as $boards) { ?>
													<option value="<?php echo $boards->id; ?>" <?php if ($student->board == $boards->id) {
																									echo "selected";
																								} ?>><?php echo $boards->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>City</label>
											<input type="textr" class="form-control mdl-textfield__input" name="institute_city" id="institute_city" <?php if (!empty($student->institute_city)) { ?>placeholder="<?php echo $student->institute_city ?>" <?php } else { ?> placeholder="Enter your City" <?php } ?> value="<?php echo $student->institute_city ?>">
										</div>
									</div>


									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">State</label>
											<select name="institute_state" class="form-control mdl-textfield__input">

												<?php $institute_state = $student->institute_state; ?>
												<option value="">--Select State--</option>
												<option value="Andhra Pradesh" <?php if ($institute_state == "Andhra Pradesh") {
																					echo "selected";
																				} ?>>Andhra Pradesh</option>
												<option value="Andaman and Nicobar Islands" <?php if ($institute_state == "Andaman and Nicobar Islands") {
																								echo "selected";
																							} ?>>Andaman and Nicobar Islands</option>
												<option value="Arunachal Pradesh" <?php if ($institute_state == "Arunachal Pradesh") {
																						echo "selected";
																					} ?>>Arunachal Pradesh</option>
												<option value="Assam" <?php if ($institute_state == "Assam") {
																			echo "selected";
																		} ?>>Assam</option>
												<option value="Bihar" <?php if ($institute_state == "Bihar") {
																			echo "selected";
																		} ?>>Bihar</option>
												<option value="Chandigarh" <?php if ($institute_state == "Chandigarh") {
																				echo "selected";
																			} ?>>Chandigarh</option>
												<option value="Chhattisgarh" <?php if ($institute_state == "Chhattisgarh") {
																					echo "selected";
																				} ?>>Chhattisgarh</option>
												<option value="Dadar and Nagar Haveli" <?php if ($institute_state == "Dadar and Nagar Haveli") {
																							echo "selected";
																						} ?>>Dadar and Nagar Haveli</option>
												<option value="Daman and Diu" <?php if ($institute_state == "Daman and Diu") {
																					echo "selected";
																				} ?>>Daman and Diu</option>
												<option value="Delhi" <?php if ($institute_state == "Delhi") {
																			echo "selected";
																		} ?>>Delhi</option>
												<option value="Lakshadweep" <?php if ($institute_state == "Lakshadweep") {
																				echo "selected";
																			} ?>>Lakshadweep</option>
												<option value="Puducherry" <?php if ($institute_state == "Puducherry") {
																				echo "selected";
																			} ?>>Puducherry</option>
												<option value="Goa" <?php if ($institute_state == "Goa") {
																		echo "selected";
																	} ?>>Goa</option>
												<option value="Gujarat" <?php if ($institute_state == "Gujarat") {
																			echo "selected";
																		} ?>>Gujarat</option>
												<option value="Haryana" <?php if ($institute_state == "Haryana") {
																			echo "selected";
																		} ?>>Haryana</option>
												<option value="Himachal Pradesh" <?php if ($institute_state == "Himachal Pradesh") {
																						echo "selected";
																					} ?>>Himachal Pradesh</option>
												<option value="Jammu and Kashmir" <?php if ($institute_state == "Jammu and Kashmir") {
																						echo "selected";
																					} ?>>Jammu and Kashmir</option>
												<option value="Jharkhand" <?php if ($institute_state == "Jharkhand") {
																				echo "selected";
																			} ?>>Jharkhand</option>
												<option value="Karnataka" <?php if ($institute_state == "Karnataka") {
																				echo "selected";
																			} ?>>Karnataka</option>
												<option value="Kerala" <?php if ($institute_state == "Kerala") {
																			echo "selected";
																		} ?>>Kerala</option>
												<option value="Madhya Pradesh" <?php if ($institute_state == "Madhya Pradesh") {
																					echo "selected";
																				} ?>>Madhya Pradesh</option>
												<option value="Maharashtra" <?php if ($institute_state == "Maharashtra") {
																				echo "selected";
																			} ?>>Maharashtra</option>
												<option value="Manipur" <?php if ($institute_state == "Manipur") {
																			echo "selected";
																		} ?>>Manipur</option>
												<option value="Meghalaya" <?php if ($institute_state == "Meghalaya") {
																				echo "selected";
																			} ?>>Meghalaya</option>
												<option value="Mizoram" <?php if ($institute_state == "Mizoram") {
																			echo "selected";
																		} ?>>Mizoram</option>
												<option value="Nagaland" <?php if ($institute_state == "Nagaland") {
																				echo "selected";
																			} ?>>Nagaland</option>
												<option value="Odisha" <?php if ($institute_state == "Odisha") {
																			echo "selected";
																		} ?>>Odisha</option>
												<option value="Punjab" <?php if ($institute_state == "Punjab") {
																			echo "selected";
																		} ?>>Punjab</option>
												<option value="Rajasthan" <?php if ($institute_state == "Rajasthan") {
																				echo "selected";
																			} ?>>Rajasthan</option>
												<option value="Sikkim" <?php if ($institute_state == "Sikkim") {
																			echo "selected";
																		} ?>>Sikkim</option>
												<option value="Tamil Nadu" <?php if ($institute_state == "Tamil Nadu") {
																				echo "selected";
																			} ?>>Tamil Nadu</option>
												<option value="Telangana" <?php if ($institute_state == "Telangana") {
																				echo "selected";
																			} ?>>Telangana</option>
												<option value="Tripura" <?php if ($institute_state == "Tripura") {
																			echo "selected";
																		} ?>>Tripura</option>
												<option value="Uttar Pradesh" <?php if ($institute_state == "Uttar Pradesh") {
																					echo "selected";
																				} ?>>Uttar Pradesh</option>
												<option value="Uttarakhand" <?php if ($institute_state == "Uttarakhand") {
																				echo "selected";
																			} ?>>Uttarakhand</option>
												<option value="West Bengal" <?php if ($institute_state == "West Bengal") {
																				echo "selected";
																			} ?>>West Bengal</option>
											</select>
										</div>
									</div>


									<!-- <div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Tuition Fees</label>
											<input type="number" class="form-control mdl-textfield__input" name="tuition_fees" id="tuition_fees" placeholder="<?php echo $student->tuition_fees ?>" value="<?php echo $student->tuition_fees ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Non Tuition Fees</label>
											<input type="number" class="form-control mdl-textfield__input" name="non_tuition_fees" id="non_tuition_fees" placeholder="<?php echo $student->non_tuition_fees ?>" value="<?php echo $student->non_tuition_fees ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Total Current Fees</label>
											<input type="text" class="form-control mdl-textfield__input" name="total_fees" id="total_fees" placeholder="<?php echo $student->total_fees ?>" value="<?php echo $student->total_fees ?>">
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Update Tuition Fees Receipt/Fees Structure<span>* <?php if (isset($student->tuition_fees_receipt)) { ?>
														<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->tuition_fees_receipt ?>" target="_blank"><i class='fa-solid fa-eye'></i>
														<?php } ?>
														</a>
												</span>
											</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="tuition_fees_receipt">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label>Have you already secured admission in Institute?</label>
											<input type="checkbox" name="admission_toggle" id="admission_toggle" class="admission_toggle" <?php if ($student->admission_toggle == 1) { ?> checked <?php } ?>>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="course_span" <?php if ($student->admission_toggle == "0") { ?> style="display:none;" <?php } ?>>
											<label>Number of Years Completed for the Current Course</label>
											<select class="form-control mdl-textfield__input" name="course_span" id="course_span">
												<?php if (empty($student->course_span)) { ?>
													<option value="" selected="selected">-Select-</option>
												<?php } else { ?>
													<option value="">-Select-</option>
												<?php } ?>
												<?php if ($student->course_span == "0") { ?>
													<option value="0" selected="selected">None</option>
												<?php } else { ?>
													<option value="0">None</option>
												<?php } ?>
												<?php if ($student->course_span == "1") { ?>
													<option value="1" selected="selected">First Year</option>
												<?php } else { ?>
													<option value="1">First Year</option>
												<?php } ?>
												<?php if ($student->course_span == "2") { ?>
													<option value="2" selected="selected">Second Year</option>
												<?php } else { ?>
													<option value="2">Second Year</option>
												<?php } ?>
												<?php if ($student->course_span == "3") { ?>
													<option value="3" selected="selected">Third Year</option>
												<?php } else { ?>
													<option value="3">Third Year</option>
												<?php } ?>
												<?php if ($student->course_span == "4") { ?>
													<option value="4" selected="selected">Fourth Year</option>
												<?php } else { ?>
													<option value="4">Fourth Year</option>
												<?php } ?>
												<?php if ($student->course_span == "5") { ?>
													<option value="5" selected="selected">Fifth Year</option>
												<?php } else { ?>
													<option value="5">Fifth Year</option>
												<?php } ?>
												<?php if ($student->course_span == "6") { ?>
													<option value="6" selected="selected">Sixth Year</option>
												<?php } else { ?>
													<option value="6">Sixth Year</option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="col-md-12 col-sm-6">
										<div class="form-group">
											<label>Are you in receipt of any other Scholarship from Government or any other Institution?</label>
											<input type="checkbox" name="scholarship_verification_toggle" <?php if ($student->scholarship_verification_toggle == 1) { ?> checked <?php } ?>>
										
										</div>
									</div> -->
									<div class="row">

										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" name="academic_submit" value="1">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="tab-pane active fontawesome-demo" id="tab7">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Previous Academic Information</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body collapse">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<button type="button" class="btn btn-primary text-white" style="float: right;" id="add_section"><i class="fa-solid fa-plus"></i></button>
									</div>
								</div>
								<div class="row">
									<table id="myTable">
                                        <thead>
                
                                        </thead>
                                        <tbody>

										<?php if(!empty($student-> p_academic_name)) {?>
											<?php $p_academic_name=explode(',',$student->p_academic_name);
																					$p_class=explode(',',$student->p_class);
																					$p_cgpa=explode(',',$student->p_cgpa);
																					$p_start_date=explode(',',$student->p_start_date);
																					$p_end_date=explode(',',$student->p_end_date);
																					?>

											<?php $count=0; foreach ($p_academic_name as $name) { ?>
											<tr id="section<?php echo $count; ?>" class="row">
												<td class="col-md-6 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Academic  Name<span>*</span></label>
													<input type="text" class="form-control mdl-textfield__input" value="<?php echo  $p_academic_name[$count]?>" name="p_academic_name[]"  placeholder="Enter Name" requiredp>
													</div>
                                                </td>
												<td class="col-md-5 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Class<span>*</span></label>
												
													<select class="form-control mdl-textfield__input" name="p_class[]"  requiredp>
														<option  readonly>-Select-</option>
														<?php foreach ($data['get_all_class'] as $class_detail) { ?>
															<option value="<?php echo $class_detail->id; ?>" <?php if($p_class[$count]==$class_detail->id){echo "selected";} ?> ><?php echo $class_detail->class_name;?></option>
														<?php } ?>
													</select>

													</div>
                                                </td>
												<td class="col-md-1 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label></label><br>
													<button type="button" class="btn btn-primary text-white" style="float: right;" id="delete_section" onclick="removeSection(<?php echo $count; ?>)"><i class="fa-solid fa-trash-can"></i></button>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> % or CGPA Acquired<span>*</span></label>
													<input type="number" class="form-control mdl-textfield__input" name="p_cgpa[]" value="<?php echo  $p_cgpa[$count]?>" placeholder="Enter % or CGPA" requiredp>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Start Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_start_date[]" value="<?php echo  $p_start_date[$count]?>"  placeholder="Enter Class" requiredp>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> End Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_end_date[]" value="<?php echo  $p_end_date[$count]?>" placeholder="Enter Class" requiredp>
												</div>
                                                </td>
											</tr>
											<?php $count++; }?>
											<tr id="section<?php echo $count; ?>" class="row"></tr>

											<?php }else {?>

												<tr id="section0" class="row">
												<td class="col-md-6 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Academic  Name<span>*</span></label>
													<input type="text" class="form-control mdl-textfield__input"     name="p_academic_name[]"  placeholder="Enter Name" requiredp>
													</div>
                                                </td>
												<td class="col-md-5 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Class<span>*</span></label>
												
													<select class="form-control mdl-textfield__input" name="p_class[]"  requiredp>
														<option  readonly>-Select-</option>
														<?php foreach ($data['get_all_class'] as $class_detail) { ?>
															<option value="<?php echo $class_detail->id; ?>" ><?php echo $class_detail->class_name;?></option>
														<?php } ?>
													</select>

													</div>
                                                </td>
												<td class="col-md-1 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label></label><br>
													<button type="button" class="btn btn-primary text-white" style="float: right;" id="delete_section" onclick="removeSection(0)"><i class="fa-solid fa-trash-can"></i></button>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> % or CGPA Acquired<span>*</span></label>
													<input type="number" class="form-control mdl-textfield__input" name="p_cgpa[]"  placeholder="Enter % or CGPA" requiredp>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Start Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_start_date[]"  placeholder="Enter Class" requiredp>
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> End Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_end_date[]"  placeholder="Enter Class" requiredp>
												</div>
                                                </td>
											</tr>
											<tr id="section1" class="row"></tr>
											<?php }?>
										</tbody>
									</table>
									
								
									<div class="row">
										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="tab-pane active fontawesome-demo" id="tab3">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Family Information</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body collapse">
								<div class="row">
									<div class="card-body row">
										<!-- <h4><strong>Parent Information:</strong></h4> -->
										<div class="col-md-6 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Number of Siblings</label>
												<input type="number" id="siblings" name="siblings" class="form-control mdl-textfield__input" <?php if (!empty($student->siblings)) { ?>placeholder="<?php echo $student->siblings ?>" <?php } else { ?> placeholder="Enter Number of Siblings" <?php } ?> value="<?php echo $student->siblings ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Family Annual Income</label>
												<input type="number" class="form-control mdl-textfield__input" name="annual_income" id="annual_income" <?php if (!empty($student->annual_income)) { ?>placeholder="<?php echo $student->annual_income ?>" <?php } else { ?> placeholder="Enter Annual Income" <?php } ?> value="<?php echo $student->annual_income ?>" oninput="numberOnly(this.id);" maxlength="12">
											</div>
										</div>
										<div class="">
											<strong> <u>Father/Guardian Detail's</u></strong>

										</div>
										<!-- <h4><strong>Father/Guardian Detail's</strong></h4> -->
										<div class="col-md-6 col-sm-6">
											<!-- text input -->
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Name as per Aadhar</label>
												<input type="text" name="father_name" id="father_name" class="form-control mdl-textfield__input" <?php if (!empty($student->father_name)) { ?>placeholder="<?php echo $student->father_name ?>" <?php } else { ?> placeholder="Enter Fathers Name as per Aadhar" <?php } ?> value="<?php echo $student->father_name ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Aadhar Number</label>
												<input type="number" id="f_aadhar" name="f_aadhar" class="form-control mdl-textfield__input" <?php if (!empty($student->f_aadhar)) { ?>placeholder="<?php echo $student->f_aadhar ?>" <?php } else { ?> placeholder="XXXXXXXXXXXX" <?php } ?> value="<?php echo $student->f_aadhar ?>" oninput="numberOnly(this.id);" maxlength="12">
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Mobile Number</label>
												<input type="number" id="f_phone" name="f_phone" class="form-control mdl-textfield__input" oninput="numberOnly(this.id);" maxlength="10" <?php if (!empty($student->f_phone)) { ?>placeholder="<?php echo $student->f_phone ?>" <?php } else { ?> placeholder="Enter Mobile Number" <?php } ?> value="<?php echo $student->f_phone ?>">
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Enter Email Id</label>
												<input type="email" id="f_email_id" name="f_email_id" class="form-control mdl-textfield__input" <?php if (!empty($student->f_email_id)) { ?>placeholder="<?php echo $student->f_email_id ?>" <?php } else { ?> placeholder="Enter Father's Email Id" <?php } ?> value="<?php echo $student->f_email_id ?>">
											</div>
										</div>
										<div class="col-md-6  col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

												<label for="files">Update Aadhar Card<span>* <?php if (isset($student->father_aadhar_doc)) { ?>
															<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->father_aadhar_doc ?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
														<?php } ?></span></label>
												<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="father_aadhar_doc">
											</div>
										</div>
										<div class="">
											<strong> <u>Mother/Guardian Detail's</u></strong>

										</div>
										<!-- <h4><strong>Mother/Guardian Detail's</strong></h4> -->
										<div class="col-md-6 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label> Name as per Aadhar</label>
												<input type="text" id="mother_name" name="mother_name" class="form-control mdl-textfield__input" <?php if (!empty($student->mother_name)) { ?>placeholder="<?php echo $student->mother_name ?>" <?php } else { ?> placeholder="Enter Mothers Name as per Aadhar" <?php } ?> value="<?php echo $student->mother_name ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label> Aadhar Number</label>
												<input type="number" id="m_aadhar" name="m_aadhar" class="form-control mdl-textfield__input" <?php if (!empty($student->m_aadhar)) { ?>placeholder="<?php echo $student->m_aadhar ?>" <?php } else { ?> placeholder="XXXXXXXXXXXX" <?php } ?> value="<?php echo $student->m_aadhar ?>" oninput="numberOnly(this.id);" maxlength="12">
											</div>
										</div>

										<div class="col-md-3 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Mobile Number</label>
												<input type="number" id="m_phone" name="m_phone" class="form-control mdl-textfield__input" oninput="numberOnly(this.id);" maxlength="10" <?php if (!empty($student->m_phone)) { ?>placeholder="<?php echo $student->m_phone ?>" <?php } else { ?> placeholder="Enter Mobile Number" <?php } ?> value="<?php echo $student->m_phone ?>">
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
												<label>Enter Email Id</label>
												<input type="email" id="m_email_id" name="m_email_id" class="form-control mdl-textfield__input" <?php if (!empty($student->m_email_id)) { ?>placeholder="<?php echo $student->m_email_id ?>" <?php } else { ?> placeholder="Enter Mother's Email Id" <?php } ?> value="<?php echo $student->m_email_id ?>">
											</div>
										</div>
										<div class="col-md-6  col-sm-6">
											<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

												<label for="files">Update Aadhar Card<span>* <?php if (isset($student->mother_aadhar_doc)) { ?>
															<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->mother_aadhar_doc ?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
														<?php } ?></span></label>
												<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mother_aadhar_doc">
											</div>
										</div>
										<div class="row">

											<div class="col-lg-6 col-lg-6">
												<button type="submit" class="btn btn-primary" style="float: right;" name="family_submit" value="1">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="tab-pane active fontawesome-demo" id="tab4">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Communication Address</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>

							<div class="card-body collapse">
								<div class="row">

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Communication Address</label>
											<input type="text" class="form-control mdl-textfield__input" name="comm_address" id="comm_address" placeholder="Provide Address (Not more than 200 characters)" placeholder="<?php echo $student->comm_address ?>" value="<?php echo $student->comm_address ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>PIN Code</label>
											<input type="number" class="form-control mdl-textfield__input" name="comm_pin_code" id="comm_pin_code" onkeyup="find_pincode_c(this.value)" oninput="numberOnly(this.id);" maxlength="6" minlength="6" placeholder="<?php echo $student->comm_pin_code ?>" value="<?php echo $student->comm_pin_code ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label class="form-control-label ">Village/Area/Locality(Select Any)</label>
											<select type="text" class="form-control text1" id="comm_village" name="comm_village">
												<option value="">-Select-</option>
												<option disabled hidden>...................................</option>
												<?php if (!empty($student->comm_village)) { ?>
													<option value=<?php echo $student->comm_village; ?> selected><?php echo $student->comm_village; ?>
													<option>
													<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Block/Taluk/Town</label>
											<input type="text" class="form-control mdl-textfield__input" name="comm_block" id="comm_block" readonly placeholder="<?php echo $student->comm_block ?>" value="<?php echo $student->comm_block ?>">


										</div>
									</div>



									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <label for="exampleInputname1">State</label> -->
											<!-- <select name="comm_state" id="comm_state" class="form-control mdl-textfield__input" > -->
											<label class="form-control-label">State</label>
											<input type="text" class="form-control" name="comm_state" id="comm_state" readonly placeholder="<?php echo $student->comm_state ?>" value="<?php echo $student->comm_state ?>">
										</div>
									</div>
									<p style="margin-top:3px;color:red;" id="from_nonpincode"></p>
									<div class="col-md-12 col-sm-12">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<input type="checkbox" id="checkbox2" class="medium" name="same_as_comm_address" <?php if ($student->same_as_comm_address == 1) {
																																	echo "checked";
																																} ?>>
											<label>Are the Permanent Address same as Communication Address?</label>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Permanent Address</label>
											<input type="textr" class="form-control mdl-textfield__input" name="perm_address" id="perm_address" placeholder="Provide Address (Not more than 200 characters)" placeholder="<?php echo $student->perm_address ?>" value="<?php echo $student->perm_address ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>PIN Code</label>
											<input type="number" class="form-control mdl-textfield__input" name="perm_pin_code" id="perm_pin_code" onkeyup="find_pincode(this.value)" placeholder="Enter Pin Code" placeholder="<?php echo $student->perm_pin_code ?>" value="<?php echo $student->perm_pin_code ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-6" id="main_perm_village">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label class="form-control-label">Village/Area/Locality(Select Any)</label>
											<select type="text" class="form-control " id="perm_village" name="perm_village">
												<option disabled hidden>...................................</option>
												<?php if (!empty($student->perm_village)) { ?>
													<option value=<?php echo $student->perm_village; ?> selected><?php echo $student->perm_village; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6" id="perm_village_2" style="display:none;">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Village</label>
											<input type="text" class="form-control mdl-textfield__input " name="perm_village1" id="perm_village1" value=" " readonly placeholder="Enter village/Taluk/Town">

										</div>
									</div>


									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Block/Taluk/Town</label>
											<input type="text" class="form-control mdl-textfield__input" name="perm_block" id="perm_block" placeholder="<?php echo $student->perm_block ?>" value="<?php echo $student->perm_block ?>" readonly>

										</div>
									</div>



									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <label for="exampleInputname1">State</label> -->
											<!-- <select name="perm_state" id="perm_state" class="form-control mdl-textfield__input" > -->
											<label class="form-control-label">State</label>
											<input type="text" class="form-control" name="perm_state" id="perm_state" readonly placeholder="<?php echo $student->perm_state ?>" value="<?php echo $student->perm_state ?>">
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" id="submit" name="address_submit" value="1">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>





			<div class="tab-pane active fontawesome-demo" id="tab5">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>Bank Details of Parent/Guardian</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body collapse">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Bank Name</label>
											<input type="text" id="bank_name" name="bank_name" class="form-control mdl-textfield__input" <?php if (!empty($student->bank_name)) { ?>placeholder="<?php echo $student->bank_name ?>" <?php } else { ?> placeholder="Enter Bank Name" <?php } ?> value="<?php echo $student->bank_name ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Bank's Branch Name</label>
											<input type="text" id="bank_branch" name="bank_branch" class="form-control mdl-textfield__input" <?php if (!empty($student->bank_branch)) { ?>placeholder="<?php echo $student->bank_branch ?>" <?php } else { ?> placeholder="Enter Bank's Branch Name" <?php } ?> value="<?php echo $student->bank_branch ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>IFSC Code</label>
											<input type="text" id="ifsc_code" name="ifsc_code" class="form-control mdl-textfield__input" <?php if (!empty($student->ifsc_code)) { ?>placeholder="<?php echo $student->ifsc_code ?>" <?php } else { ?> placeholder="Enter IFSC Code" <?php } ?> oninput="numberOnly(this.id);" maxlength="11">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Update Bank Passbook/Statement/Cancelled Cheque<span>* <?php if (isset($student->passbook_statement)) { ?>
														<a href="<?php echo URLROOT ?>/uploads/<?php echo $student->passbook_statement ?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
													<?php } ?></span></label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="passbook_statement">
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Savings Bank Account Number</label>
											<input type="number" name="account_no" id="account_no" class="form-control mdl-textfield__input" <?php if (!empty($student->account_no)) { ?>placeholder="<?php echo $student->account_no ?>" <?php } else { ?> placeholder="Enter Bank Account Number" <?php } ?> value="<?php echo $student->account_no ?>">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Re-enter Savings Bank Account Number</label><span>&nbsp;</span><span id='message'></span>
											<input type="number" name="re_account_no" id="re_account_no" class="form-control mdl-textfield__input" <?php if (!empty($student->re_account_no)) { ?>placeholder="<?php echo $student->re_account_no ?>" <?php } else { ?> placeholder="Re-Enter Bank Account Number" <?php } ?> value="<?php echo $student->re_account_no ?>">

										</div>
									</div>
									<div class="col-md-12 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Enter name as per Passbook</label>
											<input type="text" id="name_as_per_bank" name="name_as_per_bank" class="form-control mdl-textfield__input" <?php if (!empty($student->name_as_per_bank)) { ?> placeholder="<?php echo $student->name_as_per_bank ?>" <?php } else { ?> placeholder="Enter name as per Passbook" <?php } ?> value="<?php echo $student->name_as_per_bank ?>">
										</div>
									</div>
									<div class="row">

										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" name="bank_submit" value="1">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab6">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<header>About Yourself</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body collapse">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Say about yourself</label>
											<textarea name="description" class="form-control" rows="3" value="<?php echo $student->description ?>" placeholder="Enter few words about yourself"><?php echo $student->description; ?></textarea>

										</div>
									</div>


									<div class="col-md-6 col-sm-6">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Hobbies<span>&nbsp;(Select multiple which ever is applicable)*</label>
											<select name="hobby[]" multiple class="form-control select2" style="height:200px !important">
												<option value="" disabled="disabled">-Select Type-</option>
												<?php foreach ($data['get_all_hobbies'] as $hobby) { ?>
													<option value="<?php echo $hobby->id; ?>" <?php
																								$hobbies = explode(',', $student->hobby);
																								if (in_array("$hobby->id", $hobbies)) {


																									echo "selected";
																								} ?>><?php echo $hobby->name; ?></option>
												<?php } ?>
											</select>

										</div>
									</div>
									<div class="col-md-6 col-sm-6">

										<div class="form-group">
											<label class="control-label">Add Achievements</label>
											<input type="text" class="tags tags-input" data-type="tags" name="achievements[]" value="<?php echo $student->achievements; ?>" placeholder="<?php echo $student->achievements; ?>" />
										</div>


									</div>
									<div class="col-md-6 col-sm-6">

										<div class="form-group">
											<label class="control-label">Enter Mother Tongue</label>
											<input type="text" class="form-control" name="mother_tongue" value="<?php echo $student->mother_tongue; ?>" <?php if (!empty($student->mother_tongue)) { ?> placeholder="<?php echo $student->mother_tongue ?>" <?php } else { ?> placeholder="Enter Mother Tongue" <?php } ?> />
										</div>


									</div>






									<div class="row">
										<div class="col-lg-6 col-lg-6">
											<button type="submit" class="btn btn-primary" style="float: right;" name="about_submit" value="1">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- div end -->




		</form>
	</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	$("#checkbox1").click(function() {
		$("#whatsapp_no").attr("disabled", this.checked);
	});
</script>
<script>
	$(document).ready(function() {
		$("#checkbox1").on("change", function() {

			if (this.checked) {
				$("#whatsapp_no").val($("#phone_no").val());

			} else {

				$('#whatsapp_no').val("");
				$("#whatsapp_no").attr("placeholder", "Tick Whatsapp No. same as Mobile No.");
			}

		});

	});
</script>

<script>
	// $(document).ready(function() {
	// 	$('.readonly').find('input, textarea, select').attr('readonly', 'readonly');
	// });
</script>
<script>
	$("#checkbox2").click(function() {
		$("#perm_address").attr("disabled", this.checked);
		$("#perm_village").attr("disabled", this.checked);
		$("#perm_block").attr("disabled", this.checked);
		$("#perm_state").attr("disabled", this.checked);
		$("#perm_pin_code").attr("disabled", this.checked);
	});
</script>
<script>
	$(document).ready(function() {
		$("#checkbox2").on("change", function() {

			if (this.checked) {
				$("#perm_address").val($("#comm_address").val());
				$("#perm_block").val($("#comm_block").val());
				$("#perm_state").val($("#comm_state").val());
				$("#perm_pin_code").val($("#comm_pin_code").val());
				$("#perm_village1").val($("#comm_village").val());

			} else {

				$('#perm_address').val("");
				$("#perm_address").attr("placeholder", "Enter Address");
				$('#perm_village').val("");
				$("#perm_village").attr("placeholder", "Enter Village/Area/Locality");
				$('#perm_block').val("");
				$("#perm_block").attr("placeholder", "Enter Block/Taluk/Town");
				$('#perm_state').val("");
				$("#perm_state").attr("placeholder", "Enter State");
				$('#perm_pin_code').val("");
				$("#perm_pin_code").attr("placeholder", "Enter Pin Code");
			}

		});

	});
</script>
<!-- script to auto load the state,village,area through pincode -->
<script type="text/javascript">
	function find_pincode_c(pin) {
		if (pin.length == 6) {
			$.ajax({
				url: '<?php echo URLROOT; ?>/student/check_pincode',
				type: 'POST',
				data: {
					pin
				},

				success: function(res) {
					var detail = res.split(',');
					document.getElementById("comm_block").value = detail[0];
					document.getElementById("comm_state").value = detail[1];
					var area_detail = detail[2].split('*');

					if (detail[3] == "0") {
						document.getElementById("from_nonpincode").innerHTML = "Non Serviceable Pincode";
					} else {
						document.getElementById("from_nonpincode").innerHTML = "";
					}


					document.getElementById("comm_village").innerHTML = "";
					for (const area_val of area_detail) {
						document.getElementById("comm_village").innerHTML += "<option value='" + area_val + "'>" + area_val + "</option>";
					}

				}

			});
		} else {
			document.getElementById("comm_block").value = "";
			document.getElementById("comm_state").value = "";
		}
	}
</script>

<script type="text/javascript">
	function find_pincode(pin) {
		if (pin.length == 6) {
			$.ajax({
				url: '<?php echo URLROOT; ?>/student/check_pincode',
				type: 'POST',
				data: {
					pin
				},

				success: function(res) {
					var detail = res.split(',');
					document.getElementById("perm_block").value = detail[0];
					document.getElementById("perm_state").value = detail[1];
					var area_detail = detail[2].split('*');

					if (detail[3] == "0") {
						document.getElementById("from_nonpincode").innerHTML = "Non Serviceable Pincode";
					} else {
						document.getElementById("from_nonpincode").innerHTML = "";
					}


					document.getElementById("perm_village").innerHTML = "";
					for (const area_val of area_detail) {
						document.getElementById("perm_village").innerHTML += "<option value='" + area_val + "'>" + area_val + "</option>";
					}

				}

			});
		} else {
			document.getElementById("perm_block").value = "";
			document.getElementById("perm_state").value = "";
		}
	}
</script>

<script>
	$('#dbType').on('click', function() {
		if ($(this).val() === "1") {
			$("#school").show()
			$("#college").hide()

		} else if ($(this).val() === "2") {

			$("#college").show()

			$("#school").hide()

		} else {
			$("#school").show()
			$("#college").hide()

		}
	});
</script>


<script>
	// $('input[type=submit]').click(function(e){
	//     if ($('#account_no').attr('value') != $('#re_account_no').attr('value')) {
	//     alert('Same Value'); return false;
	//     } else { return true; }
	// });
</script>
<script>
	$("#form").submit(function() {
		if ($("#account_no").val() != $("#re_account_no").val()) {
			alert("Account number should be same!");
			return false;
		}
	})

	$('#account_no, #re_account_no').on('keyup', function() {
		if ($('#account_no').val() == $('#re_account_no').val()) {
			$('#message').html('&#x2714').css('color', 'green');
		} else
			$('#message').html('&#x2718').css('color', 'red');
	});



	$(function() {
		$('.admission_toggle').change(function() {
			if ($(this).is(':checked')) {

				$("div#course_span").show();
				$("div#course_span").children().prop('disabled', false);

			} else {

				$("div#course_span").hide();
				$("div#course_span").children().prop('disabled', true);
			}
		});
	});

	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
</script>
<script>
	function academic_other_input(that) {
		if (that.value == "0") {

			document.getElementById("academic_other_name").style.display = "block";
		} else {
			document.getElementById("academic_other_name").style.display = "none";
		}
	}
</script>
<script>
	$('#checkbox2').click(function() {
		if ($(this).is(":checked")) {
			$("#perm_village_2").show();
		} else {
			$("#perm_village_2").hide();
		}
	});
	$('#checkbox2').click(function() {
		if ($(this).is(":checked")) {
			$("#main_perm_village").hide();
		} else {
			$("#main_perm_village").show();
		}
	});
</script>
<!-- add / delete academic -->
<script>
	$(document).ready(function() {
            // alert($academic_count);
			var i;
            <?php if(!empty($student-> p_academic_name)) {?>
				var i=<?php echo $count; ?>
				
			<?php }else { ?>
				var i = 1;
			<?php } ?>
			console.log(i);
			// var i = 1;
        $("#add_section").click(function() {

			// console.log("clicked");
			// $('#section' + i).html("<td class='col-md-6 col-sm-3'>abcd</td>");
            $('#section' + i).html("<td class='col-md-6 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Academic  Name<span>*</span></label><input type='text' class='form-control mdl-textfield__input' name='p_academic_name[]'  placeholder='Enter Name' requiredp></div></td><td class='col-md-5 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Class<span>*</span></label><select class='form-control mdl-textfield__input' name='p_class[]' requiredp ><option  readonly>-Select-</option><?php foreach ($data['get_all_class'] as $class_detail) { ?><option value='<?php echo $class_detail->id; ?>' ><?php echo $class_detail->class_name; ?></option><?php } ?></select></div></td><td class='col-md-1 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label></label><br><button type='button' class='btn btn-primary text-white' style='float: right;' id='delete_section' onclick='removeSection(" + i + ")'><i class='fa-solid fa-trash-can'></i></button></div> </td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> % or CGPA Acquired<span>*</span></label><input type='text' class='form-control mdl-textfield__input' name='p_cgpa[]'  placeholder='Enter % or CGPA' requiredp></div></td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Start Date<span>*</span></label><input type='date' class='form-control mdl-textfield__input' name='p_start_date[]'  placeholder='Enter Class' requiredp></div></td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> End Date<span>*</span></label><input type='date' class='form-control mdl-textfield__input' name='p_end_date[]'  placeholder='Enter Class' required></div></td>");

            $('#myTable').append('<tr class="row" id="section' + (i + 1) + '"></tr>');
            i++;
           
            
            // $("#no_of_rows").val(i);
        });


        // $("#delete_section").click(function() {
        //     i--;
        //     $('#section' + i).remove();

        //     // $('#myTable').append('<tr class="row" id="section' + (i + 1) + '"></tr>');
            
           
            
        //     // $("#no_of_rows").val(i);
        // });

        
 
    });

    function removeSection(index) {
            var section = document.getElementById("section" + index);
            section.parentNode.removeChild(section);
        }
</script>