<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
	.select2-container .select2-search--inline .select2-search__field {
		border: 0.7px solid #aaa;
		padding: 10px;
		width: 325px !important;
		height: 34px;
	}

	.select2-container .select2-selection--multiple .select2-selection__rendered {
		display: flex;
		padding: 10px;
	}

	.select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
		border: none;
	}

	.select2-selection__choice {
		background-color: #eee !important;
		border: 1px solid #eee !important;
		padding-right: 10px;
	}

	focus-visible {
		outline: 10px !important;
	}
</style>
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<style>
	.button {
		display: inline-block;
		border: 1px solid;
		border-color: #012766;
		background: #012766;
		padding: 10px 16px;
		border-radius: 4px;
		color: #ffffff;
	}

	[id^=modal] {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
	}

	[id^=modal]:target {
		display: block;
	}

	/* input[type=checkbox] {
    position: absolute;
    clip: rect(0 0 0 0);
} */
	.popup {
		width: 100%;
		height: 100%;
		z-index: 99999;
	}

	.popup__overlay {
		position: fixed;
		z-index: 1;
		display: block;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		background: #000000b3;
	}

	.popup__wrapper {
		position: fixed;
		z-index: 9;
		width: 80%;
		max-width: 1200px;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		border-radius: 8px;
		padding: 58px 32px 32px 32px;
		background: #fff;
	}

	.popup__close {
		position: absolute;
		top: 16px;
		right: 26px;
	}
</style>
<?php $detail = $data['last_added_college'] ?>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Update College</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Update College</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>College Information</header>
						<!-- <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button3">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul> -->
					</div>

					<form method="post" action="<?php echo URLROOT; ?>/admin/update_college_elements/<?php echo $detail->id ?>" enctype="multipart/form-data" autocomplete="OFF">







						<div class="card-body row">
							<!-- BANK DETAILS -->

							<!-- <h4><strong>Parent Information:</strong></h4> -->




							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Name of the College</label>
									<input type="text" id="bank_name" name="college_name" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->college_name ?>" value="<?php echo $detail->college_name ?>">

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->college_image)) { ?>
									<label>Update College Photo<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->college_image ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload College Photo<span>*</span></label><br>
								<?php } ?>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="college_image">

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Contact No<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="number" id="college_contact_no" name="college_contact_no" placeholder="<?php echo $detail->college_contact_no ?>" value="<?php echo $detail->college_contact_no ?>" oninput="numberOnly(this.id);" maxlength="10">

								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Location / Address<span>*</span></label><br>
									<input type="text" id="branch_address" name="college_address" class=" form-control mdl-textfield__input" placeholder="<?php echo $detail->college_address ?>" value="<?php echo $detail->college_address ?>">
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Pin Code<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" id="college_pin_code" type="number" name="college_pin_code" placeholder="<?php echo $detail->college_pin_code ?>" value="<?php echo $detail->college_pin_code ?>" oninput="numberOnly(this.id);" maxlength="6">

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>City<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="college_city" placeholder="<?php echo $detail->college_city ?>" value="<?php echo $detail->college_city ?>">

								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<!-- text input -->
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">State<span>*</span></label>
									<br>



									<select name="state" class="form-control">
									<?php $college_state = $detail->state; ?>
							
							<option value="Andhra Pradesh" <?php if($college_state == "Andhra Pradesh"){echo "selected";} ?> >Andhra Pradesh</option>
							<option value="Andaman and Nicobar Islands" <?php if($college_state == "Andaman and Nicobar Islands"){echo "selected";} ?> >Andaman and Nicobar Islands</option>
							<option value="Arunachal Pradesh" <?php if($college_state == "Arunachal Pradesh"){echo "selected";} ?> >Arunachal Pradesh</option>
							<option value="Assam" <?php if($college_state == "Assam"){echo "selected";} ?> >Assam</option>
							<option value="Bihar" <?php if($college_state == "Bihar"){echo "selected";} ?> >Bihar</option>
							<option value="Chandigarh" <?php if($college_state == "Chandigarh"){echo "selected";} ?> >Chandigarh</option>
							<option value="Chhattisgarh" <?php if($college_state == "Chhattisgarh"){echo "selected";} ?> >Chhattisgarh</option>
							<option value="Dadar and Nagar Haveli" <?php if($college_state == "Dadar and Nagar Haveli"){echo "selected";} ?> >Dadar and Nagar Haveli</option>
							<option value="Daman and Diu" <?php if($college_state == "Daman and Diu"){echo "selected";} ?> >Daman and Diu</option>
							<option value="Delhi" <?php if($college_state == "Delhi"){echo "selected";} ?> >Delhi</option>
							<option value="Lakshadweep" <?php if($college_state == "Lakshadweep"){echo "selected";} ?> >Lakshadweep</option>
							<option value="Puducherry" <?php if($college_state == "Puducherry"){echo "selected";} ?> >Puducherry</option>
							<option value="Goa" <?php if($college_state == "Goa"){echo "selected";} ?> >Goa</option>
							<option value="Gujarat" <?php if($college_state == "Gujarat"){echo "selected";} ?> >Gujarat</option>
							<option value="Haryana" <?php if($college_state == "Haryana"){echo "selected";} ?> >Haryana</option>
							<option value="Himachal Pradesh" <?php if($college_state == "Himachal Pradesh"){echo "selected";} ?> >Himachal Pradesh</option>
							<option value="Jammu and Kashmir" <?php if($college_state == "Jammu and Kashmir"){echo "selected";} ?> >Jammu and Kashmir</option>
							<option value="Jharkhand" <?php if($college_state == "Jharkhand"){echo "selected";} ?> >Jharkhand</option>
							<option value="Karnataka" <?php if($college_state == "Karnataka"){echo "selected";} ?> >Karnataka</option>
							<option value="Kerala" <?php if($college_state == "Kerala"){echo "selected";} ?> >Kerala</option>
							<option value="Madhya Pradesh" <?php if($college_state == "Madhya Pradesh"){echo "selected";} ?> >Madhya Pradesh</option>
							<option value="Maharashtra" <?php if($college_state == "Maharashtra"){echo "selected";} ?> >Maharashtra</option>
							<option value="Manipur" <?php if($college_state == "Manipur"){echo "selected";} ?> >Manipur</option>
							<option value="Meghalaya" <?php if($college_state == "Meghalaya"){echo "selected";} ?> >Meghalaya</option>
							<option value="Mizoram" <?php if($college_state == "Mizoram"){echo "selected";} ?> >Mizoram</option>
							<option value="Nagaland" <?php if($college_state == "Nagaland"){echo "selected";} ?> >Nagaland</option>
							<option value="Odisha" <?php if($college_state == "Odisha"){echo "selected";} ?> >Odisha</option>
							<option value="Punjab" <?php if($college_state == "Punjab"){echo "selected";} ?> >Punjab</option>
							<option value="Rajasthan" <?php if($college_state == "Rajasthan"){echo "selected";} ?> >Rajasthan</option>
							<option value="Sikkim" <?php if($college_state == "Sikkim"){echo "selected";} ?> >Sikkim</option>
							<option value="Tamil Nadu" <?php if($college_state == "Tamil Nadu"){echo "selected";} ?> >Tamil Nadu</option>
							<option value="Telangana" <?php if($college_state == "Telangana"){echo "selected";} ?> >Telangana</option>
							<option value="Tripura" <?php if($college_state == "Tripura"){echo "selected";} ?> >Tripura</option>
							<option value="Uttar Pradesh" <?php if($college_state == "Uttar Pradesh"){echo "selected";} ?> >Uttar Pradesh</option>
							<option value="Uttarakhand" <?php if($college_state == "Uttarakhand"){echo "selected";} ?> >Uttarakhand</option>
							<option value="West Bengal" <?php if($college_state == "West Bengal"){echo "selected";} ?> >West Bengal</option>
									</select>


								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Year of Establishment<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="number" min="1900" max="2025" step="1" placeholder="<?php echo $detail->year_of_establishment ?>" value="<?php echo $detail->year_of_establishment ?>" name="year_of_establishment">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="mdl-textfield__label">Select College Type<span>*</span></label>
									<br>
									<select name="college_type" class="form-control">
										<?php if ($detail->college_type == 1) { ?>
											<option value="1" selected>Private</option>
										<?php	} else { ?>
											<option value="1">Private</option>
										<?php } ?>
										<?php if ($detail->college_type == 2) { ?>
											<option value="2" selected>Government</option>
										<?php	} else { ?>
											<option value="2">Government</option>
										<?php } ?>
										<?php if ($detail->college_type == 3) { ?>
											<option value="3" selected>OodlesIN</option>
										<?php	} else { ?>
											<option value="3">OodlesIN</option>
										<?php } ?>
									</select>
								</div>
							</div>






							<!-- <div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Student<strong> : </strong> Teacher<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="student_teacher_ratio" placeholder="<?php echo $detail->student_teacher_ratio ?>" value="<?php echo $detail->student_teacher_ratio ?>">
								</div>
							</div> -->
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Legal Name<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="legal_name" placeholder="<?php echo $detail->legal_name ?>" value="<?php echo $detail->legal_name ?>">
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Registered Office Address<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="registered_address" placeholder="<?php echo $detail->registered_address ?>" value="<?php echo $detail->registered_address ?>">

								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Website Link<span>*</span></label>&nbsp;
									<?php if ($detail->website_check == 1) { ?>
										<input type="checkbox" id="vehicle1" name="website_check" value="1" checked><br>
									<?php } else { ?>
										<input type="checkbox" id="vehicle1" name="website_check" value="0"><br>
									<?php	} ?>

									<input class="form-control mdl-textfield__input" type="text" name="website_link" placeholder="<?php echo $detail->website_link ?>" value="<?php echo $detail->website_link ?>">

								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Accredited By<span>*</span></label>
									<br>
									<select name="accredited_by" class="form-control">
										<?php if ($detail->accredited_by == 1) { ?>
											<option value="1" selected>A</option>
										<?php } else { ?>
											<option value="1">A</option>
										<?php } ?>
										<?php if ($detail->accredited_by == 2) { ?>
											<option value="2" selected>B</option>
										<?php } else { ?>
											<option value="2">B</option>
										<?php } ?>
										<?php if ($detail->accredited_by == 3) { ?>
											<option value="3" selected>C</option>
										<?php } else { ?>
											<option value="3">C</option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Accreditation Number<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" id="accreditation_no" type="number" name="accreditation_no" placeholder="<?php echo $detail->accreditation_no ?>" value="<?php echo $detail->accreditation_no ?>" oninput="numberOnly(this.id);" maxlength="20">
								</div>
							</div>



							<script>

							</script>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="" class="">Facilities<span>&nbsp;(Select multiple which ever is applicable)*</span></label>
									<br>
									<select name="facility[]" class="form-control select2 js-example-placeholder-multiple " multiple>
										<?php $facilites = explode(',', $detail->facility) ?>
										<?php if (in_array("1", $facilites)) { ?>
											<option value="1" selected>Library</option>
										<?php 	} else { ?>
											<option value="1">Library</option>
										<?php } ?>

										<?php if (in_array("2", $facilites)) { ?>
											<option value="2" selected>Medical</option>
										<?php 	} else { ?>
											<option value="2">Medical</option>
										<?php } ?>

										<?php if (in_array("3", $facilites)) { ?>
											<option value="3" selected>Hostel</option>
										<?php 	} else { ?>
											<option value="3">Hostel</option>
										<?php } ?>

										<?php if (in_array("4", $facilites)) { ?>
											<option value="4" selected>Medical Ventilated</option>
										<?php 	} else { ?>
											<option value="4">Medical Ventilated</option>
										<?php } ?>


									</select>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="" class="">Recognized By<span>&nbsp;(Select multiple which ever is applicable)*</span></label>
									<br>


									<select name="recognized_by[]" class="form-control select2 js-example-placeholder-multiple " multiple>
										<?php $recognized_by = explode(',', $detail->recognized_by) ?>
										<?php if (in_array("1", $recognized_by)) { ?>
											<option value="1" selected>AICTE</option>
										<?php 	} else { ?>
											<option value="1">AICTE</option>
										<?php } ?>

										<?php if (in_array("2", $recognized_by)) { ?>
											<option value="2" selected>PCI</option>
										<?php 	} else { ?>
											<option value="2">PCI</option>
										<?php } ?>

										<?php if (in_array("3", $recognized_by)) { ?>
											<option value="3" selected>NBA</option>
										<?php 	} else { ?>
											<option value="3">NBA</option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-12 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>College Info<span>*</span></label>
									<br>
									<textarea id="oodles_editor7" rows="3" cols="60" name="college_info"> <?php echo $detail->college_info ?></textarea>

								</div>
							</div>
						</div>
				</div>


				<div class="card-box">
					<div class="accordion" id="accordionExample">
						<div class="card-head">

							<header>Courses & Fees</header>

						</div>
					</div>
					<div class="card-body row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="" class="">College Stream<span>&nbsp;(Select multiple which ever is applicable)*</span></label>
								<select name="college_course[]" class="form-control select2" multiple>
									<?php $college_exploded_course = explode(',', $detail->college_course) ?>

									<?php foreach ($data['get_college_course'] as $college_course) { ?>
										<option value="<?php echo $college_course->id ?>" <?php if (in_array($college_course->id, $college_exploded_course)) {
																								echo "selected";
																							} ?>><?php echo $college_course->college_course ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Courses & Fees Offered<span>*</span></label>
								<br>
								<textarea id="oodles_editor11" rows="1" cols="10" name="course_offered"><?php echo $detail->course_offered ?></textarea>
							</div>
						</div>


					</div>





				</div>

				<div class="card-box">
					<div class="card-head">
						<header>Admission & Procedure</header>

					</div>
					<div class="card-body row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="" class="">University Entrance Exam<span></span></label>
								<input class="form-control mdl-textfield__input" type="text" name="entrance_exam" placeholder="<?php echo $detail->entrance_exam ?>" value="<?php echo $detail->entrance_exam ?>">
							</div>
						</div>



						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Application Mode<span>*</span></label><br>

								<select name="mode_of_admission" class="form-control">
									<option value="" readonly>-Select Type-</option>
									<option value="1" <?php if ($detail->mode_of_admission == 1) {
															echo "selected";
														} ?>>Online</option>
									<option value="2" <?php if ($detail->mode_of_admission == 2) {
															echo "selected";
														} ?>>Offline</option>
									<option value="3" <?php if ($detail->mode_of_admission == 3) {
															echo "selected";
														} ?>>Both</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Admission Criteria<span>*</span></label><br>

								<textarea id="oodles_editor9" rows="2" cols="60" name="admission_criteria"> <?php echo $detail->admission_criteria; ?></textarea>
							</div>
						</div>

						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>How to apply?<span>*</span></label>
								<br>
								<textarea id="oodles_editor2" rows="2" cols="60" name="how_to_apply"><?php echo $detail->how_to_apply; ?></textarea>
							</div>
						</div>

					</div>
				</div>



				<div class="card-box">
					<div class="card-head">
						<header>Review</header>

					</div>
					<div class="card-body row">

						<div>Select following parameters for visibility.</div>
						<div class="row form-group multiple-form-group input-group">
							</br>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_academic" value="1" <?php if ($detail->review_academic == 1) {
																							echo "checked";
																						} ?>>
								<label>Academic</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_accomodation" value="1" <?php if ($detail->review_accomodation == 1) {
																								echo "checked";
																							} ?>>
								<label>Accomodation </label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_faculty" value="1" <?php if ($detail->review_faculty == 1) {
																							echo "checked";
																						} ?>>
								<label>Faculty </label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_infra" value="1" <?php if ($detail->review_infra == 1) {
																							echo "checked";
																						} ?>>
								<label>Infrastructure</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_placement" value="1" <?php if ($detail->review_placement == 1) {
																								echo "checked";
																							} ?>>
								<label>Placement</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_social" value="1" <?php if ($detail->review_social == 1) {
																							echo "checked";
																						} ?>>
								<label>Social Life</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_course" value="1" <?php if ($detail->review_course == 1) {
																							echo "checked";
																						} ?>>
								<label>Course</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_campus" value="1" <?php if ($detail->review_campus == 1) {
																							echo "checked";
																						} ?>>
								<label>Campus Life</label>
							</div>
						</div>
					</div>
				</div>



				<div class="card-box">
					<div class="card-head">
						<header>Cutoff</header>

					</div>
					<div class="card-body row">
						<!-- <div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Year </label>

								<div class="form-group input-group">
									<?php $cut_off_year = explode(',', $detail->cut_off_year); ?>
									<?php $count_comma = 0;
									$count_comma = substr_count($detail->cut_off_year, ",");
									for ($x = 0; $x <= $count_comma; $x++) { ?>
										<input type="number" name="cut_off_year[]" id="cut_off_year" multiple class="form-control" placeholder="<?php echo $cut_off_year[$x] ?>" oninput="numberOnly(this.id);" maxlength="4">
									<?php } ?>
								</div>
							</div>
						</div> -->


						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Cutoff Marks<span>*</span></label><br>
								<textarea id="oodles_editor10" rows="2" cols="60" name="cut_off_marks"><?php echo $detail->cut_off_marks ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Placement</header>
					</div>
					<div class="card-body row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Placement<span>*</span></label><br>
								<textarea id="oodles_editor8" rows="2" cols="60" name="placement"><?php echo $detail->placement ?></textarea>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<!-- first modal -->
								<label>
									<?php if ((!empty($detail->placement_images))) { ?>
										Update Multiple Images <a class="" href="#modal1"><i class='fa-solid fa-eye'></i></a>
									<?php } else { ?>
										Insert Multiple Images
									<?php } ?>

									<div class="popup" id="modal1">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>
											<?php if (!empty($detail->placement_images)) { ?>
												<div class="card-body">
													<!-- <div class="row"> -->
														<?php $array = explode(',', $detail->placement_images);
														foreach ($array as $value) //loop over values
														{ ?>
															<div class="col-md-3">
																<img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
															</div>
														<?php } ?>
													<!-- </div> -->
												</div>
											<?php } ?>
										</div>
									</div>
								</label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="placement_images[]" multiple>

								<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->

							</div>
						</div>
					</div>


				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Gallery</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

							<label>
									<?php if ((!empty($detail->gallery))) { ?>
										Update Multiple Images <a class="" href="#modal2"><i class='fa-solid fa-eye'></i></a>
									<?php } else { ?>
										Insert Multiple Images
									<?php } ?>

									<div class="popup" id="modal2">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>
											<?php if (!empty($detail->gallery)) { ?>
												<div class="card-body">
													<div class="row">
														<?php $array = explode(',', $detail->gallery);
														foreach ($array as $value) //loop over values
														{ ?>
															<div class="col-md-3">
																<img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
															</div>
														<?php } ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</label>

								<input class="form-control mdl-textfield__input" type="file" name="gallery[]" multiple>

								<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->

							</div>
						</div>


					</div>
				</div>

				<div class="card-box">
					<div class="card-head">
						<header>Scholarship</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Scholarship<span>*</span></label>
								<br>
								<textarea id="oodles_editor3" rows="4" cols="100" name="scholarship"><?php echo $detail->scholarship ?></textarea>

							</div>
						</div>
					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Faculty</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Faculty<span>*</span></label>
								<br>
								<textarea id="oodles_editor4" rows="4" cols="60" name="faculty"><?php echo $detail->faculty ?></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

							<label>
									<?php if ((!empty($detail->faculty_images))) { ?>
										Update Multiple Images <a class="" href="#modal3"><i class='fa-solid fa-eye'></i></a>
									<?php } else { ?>
										Insert Multiple Images
									<?php } ?>

									<div class="popup" id="modal3">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>
											<?php if (!empty($detail->faculty_images)) { ?>
												<div class="card-body">
													<div class="row">
														<?php $array = explode(',', $detail->faculty_images);
														foreach ($array as $value) //loop over values
														{ ?>
															<div class="col-md-3">
																<img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
															</div>
														<?php } ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</label>

								<input class="form-control mdl-textfield__input" type="file" name="faculty_images[]" multiple>

								<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->

							</div>
						</div>
					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Hostel</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Hostel<span>*</span></label>
								<br>
								<textarea id="oodles_editor5" rows="4" cols="60" name="hostel"><?php echo $detail->hostel ?></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

							<label>
									<?php if ((!empty($detail->hostel_images))) { ?>
										Update Multiple Images <a class="" href="#modal4"><i class='fa-solid fa-eye'></i></a>
									<?php } else { ?>
										Insert Multiple Images
									<?php } ?>

									<div class="popup" id="modal4">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>
											<?php if (!empty($detail->hostel_images)) { ?>
												<div class="card-body">
													<div class="row">
														<?php $array = explode(',', $detail->hostel_images);
														foreach ($array as $value) //loop over values
														{ ?>
															<div class="col-md-3">
																<img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
															</div>
														<?php } ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</label>

								<input class="form-control mdl-textfield__input" type="file" name="hostel_images[]" multiple>

								<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->

							</div>
						</div>
					</div>
				</div>

				<div class="card-box">
					<div class="card-head">
						<header>FAQ's</header>

					</div>
					<div class="card-body row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>FAQ's </label>

								<div class="form-group input-group">
									<?php $question_faq = explode(',', $detail->question_faq); ?>
									<?php $count_comma = 0;
									$count_comma = substr_count($detail->question_faq, ",");
									for ($x = 0; $x <= $count_comma; $x++) { ?>
										<input type="text" name="question_faq[]" multiple class="form-control" placeholder="<?php echo $question_faq[$x] ?>">
										<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
											</button></span> -->
									<?php } ?>
								<!--	<input type="text" name="question_faq[]" multiple class="form-control">
									 <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->
								</div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Year </label>

								<div class="form-group input-group">
									<?php $answer_faq = explode(',', $detail->answer_faq); ?>
									<?php $count_comma = 0;
									$count_comma = substr_count($detail->answer_faq, ",");
									for ($x = 0; $x <= $count_comma; $x++) { ?>
										<input type="text" name="answer_faq[]" multiple class="form-control" placeholder="<?php echo $answer_faq[$x] ?>">
										<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
											</button></span> -->
									<?php } ?>
								<!-- 	<input type="text" name="answer_faq[]" multiple class="form-control">
									<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->
								</div>
							</div>
						</div>
					</div>


				</div>


				<div class="card-box">
					<div class="card-head">
						<header>Alumni</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Alumni<span>*</span></label>
								<br>
								<textarea id="oodles_editor6" rows="4" cols="100" name="alumni"><?php echo $detail->alumni ?></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label>
									<?php if ((!empty($detail->alumni_images))) { ?>
										Update Multiple Images <a class="" href="#modal5"><i class='fa-solid fa-eye'></i></a>
									<?php } else { ?>
										Insert Multiple Images
									<?php } ?>
									<div class="popup" id="modal5">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>
											<?php if (!empty($detail->alumni_images)) { ?>
												<div class="card-body">
													<div class="row">
														<?php $array = explode(',', $detail->alumni_images);
														foreach ($array as $value) //loop over values
														{ ?>
															<div class="col-md-3">
																<img src="<?php echo URLROOT ?>/uploads/<?php echo $value ?>" class="card-img-top" alt="...">
															</div>
														<?php } ?>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="alumni_images[]" multiple>



							</div>
						</div>
					</div>
				</div>

				<div class="card-box">
					<div class="card-head">
						<header>College Documents</header>

					</div>
					<div class="card-body row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->mou)) { ?>
									<label>Update MOU<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->mou ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload MOU<span>*</span></label><br>
								<?php } ?>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mou">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->nda)) { ?>
									<label>Update NDA<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->nda ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload NDA<span>*</span></label><br>
								<?php } ?>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="nda">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->declaration_form)) { ?>
									<label>Update Declaration Form<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->declaration_form ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Declaration Form<span>*</span></label><br>
								<?php } ?>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="declaration_form">
							</div>
						</div>


						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->other_document)) { ?>
									<label>Update Other Documents<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->other_document ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Other Documents<span>*</span></label><br>
								<?php } ?>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="other_document">
							</div>
						</div>
					</div>
				</div>


				<div class="card-box">
					<div class="card-head">
						<header>Personal Information of Authorized Signatory</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_signature" placeholder="<?php echo $detail->auth_signature ?>" value="<?php echo $detail->auth_signature ?>" readonly>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_designation" placeholder="<?php echo $detail->auth_designation ?>" value="<?php echo $detail->auth_designation ?>">
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Aadhar Number<span>*</span> </label><br>
								<input class="form-control mdl-textfield__input" id="auth_aadhar_no" type="number" name="auth_aadhar_no" placeholder="<?php echo $detail->auth_aadhar_no ?>" value="<?php echo $detail->auth_aadhar_no ?>" oninput="numberOnly(this.id);" maxlength="12">
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Email ID<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="email" id="txtPwd" name="auth_email" placeholder="<?php echo $detail->auth_email ?>" value="<?php echo $detail->auth_email ?>" readonly>
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" id="auth_contact_number" type="number" name="auth_contact_number" placeholder="<?php echo $detail->auth_contact_number ?>" value="<?php echo $detail->auth_contact_number ?>" oninput="numberOnly(this.id);" maxlength="10" readonly>
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>First Contact Person(Name)<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_contact_person" placeholder="<?php echo $detail->auth_contact_person ?>" value="<?php echo $detail->auth_contact_person ?>" >


							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_designation" placeholder="<?php echo $detail->contact_person_designation ?>" value="<?php echo $detail->contact_person_designation ?>">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Details<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_details" placeholder="<?php echo $detail->contact_person_details ?>" value="<?php echo $detail->contact_person_details ?>">
							</div>
						</div>

					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Authorized Signatory Documents</header>

					</div>
					<div class="card-body row">
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<?php if (!empty($detail->signatory_aadhar)) { ?>
									<label>Update Aadhar Copy of Authorized Signatory<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->signatory_aadhar ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Aadhar Copy of Authorized Signatory<span>*</span></label><br>
								<?php } ?>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="signatory_aadhar">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<?php if (!empty($detail->auth_image)) { ?>
									<label>Update Image of Authorized Signatory<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->auth_image ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Image of Authorized Signatory<span>*</span></label><br>
								<?php } ?>


								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="auth_image">
							</div>
						</div>



					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Bank Details of College</header>

					</div>
					<div class="card-body row">


						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Bank Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="bank_name" placeholder="<?php echo $detail->bank_name ?>" value="<?php echo $detail->bank_name ?>">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Branch Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="branch_name" placeholder="<?php echo $detail->branch_name ?>" value="<?php echo $detail->branch_name ?>">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>IFSC<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="ifsc" placeholder="<?php echo $detail->ifsc ?>" value="<?php echo $detail->ifsc ?>">
							</div>
						</div>


						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Account Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="account_no" id="account_no" placeholder="<?php echo $detail->account_no ?>" value="<?php echo $detail->account_no ?>">
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Re-Account Number<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="re_account_no" id="re_account_no" placeholder="<?php echo $detail->re_account_no ?>" value="<?php echo $detail->re_account_no ?>">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name of Institute as per Bank Records<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="college_name_as_per_bank" id="" placeholder="<?php echo $detail->college_name_as_per_bank ?>" value="<?php echo $detail->college_name_as_per_bank ?>">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<?php if (!empty($detail->cancelled_cheque)) { ?>
									<label>Update Cancelled Cheque / Bank Statement<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->cancelled_cheque ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Cancelled Cheque / Bank Statement<span>*</span></label><br>
								<?php } ?>


								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="cancelled_cheque">
							</div>
						</div>


					</div>
				</div>

				<div class="card-box">
					<div class="card-head">
						<header>Billing Detail</header>

					</div>
					<div class="card-body row">


						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Package Name<span>*(Renewal<span></span></label>&nbsp;<input type="checkbox" id="vehicle1" name="package_renewal" value="1" <?php if($detail->package_renewal ==1){echo "checked";} ?>>)</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="package_name" placeholder="<?php echo $detail->package_name ?>" value="<?php echo $detail->package_name ?>">
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Cost<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="package_cost" placeholder="<?php echo $detail->package_cost ?>" value="<?php echo $detail->package_cost ?>">
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Start Date<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="date" name="package_start_date"  value="<?php echo $detail->package_start_date ?>" >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>End Date<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="date" name="package_end_date"   value="<?php echo $detail->package_end_date ?>">
							</div>
						</div>

						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Description<span>*</span></label>
								<br>
								<textarea id="oodles_editor12" rows="4" cols="100" name="package_description"><?php echo $detail->package_description?></textarea>
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="mdl-textfield__label">Select Number of Year<span>*</span></label>
										<br>
										<select name="package_validity" class="form-control">
											<option value="">-Select Year-</option>
											<option value="1" <?php if($detail->package_validity == "1"){echo "selected";} ?>>1</option>
											<option value="2" <?php if($detail->package_validity == "2"){echo "selected";} ?>>2</option>
											<option value="3" <?php if($detail->package_validity == "3"){echo "selected";} ?>>3</option>
											<option value="4" <?php if($detail->package_validity == "4"){echo "selected";} ?>>4</option>
											<option value="5" <?php if($detail->package_validity == "5"){echo "selected";} ?>>5</option>
										</select>
									</div>
								</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Add-ons<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="package_other_detail" id="package_other_detail" placeholder="<?php echo $detail->package_other_detail ?>" value="<?php echo $detail->package_other_detail ?>">
							</div>
						</div>
<!-- 					
						<div class="col-md-3 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>Renewal<span>*</span></label><br><input type="checkbox" id="vehicle1" name="package_renewal" value="1" <?php if($detail->package_renewal ==1){echo "checked";} ?>><br>
									</div>
									</div> -->
					

						<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->package_invoice)) { ?>
									<label>Update Document / Invoice <span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->package_invoice ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
								<?php } else { ?>
									<label>Upload Documnet / Invoice<span>*</span></label><br>
								<?php } ?>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="package_invoice">
								</div>
							</div>

					</div>
				</div>

			</div>



			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->

				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
					<a class="btn btn-danger" href="<?php echo URLROOT; ?>/admin/reject_college/<?php echo $detail->id?>" role="button"><span>Reject</a>
				</div>

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

</script>
<!-- script to search pin code -->
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
	$("#form").submit(function() {
		if ($("#account_no").val() != $("#re_account_no").val()) {
			alert("Account number should be same!");
			return false;
		}
	})

	$('#re_account_no').on('keyup', function() {
		if ($('#account_no').val() == $('#re_account_no').val()) {
			$('#message').html('&#x2714').css('color', 'green');
		} else
			$('#message').html('&#x2718').css('color', 'red');
	});



	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}

	}

	$(function() {
		$('.admission_toggle').change(function() {
			if ($(this).is(':checked')) {
				document.getElementById("course_span").style.display = "block";
				$("div#course_span").show();
				$("div#course_span").children().prop('disabled', false);

			} else {

				$("div#course_span").hide();
				$("div#course_span").children().prop('disabled', true);
			}
		});
	});

</script>







<script>
	(function($) {
		$(function() {

			var addFormGroup = function(event) {
				event.preventDefault();

				var $formGroup = $(this).closest('.form-group');
				var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
				var $formGroupClone = $formGroup.clone();

				$(this)
					.toggleClass('btn-success btn-add btn-danger btn-remove')
					.html('–');

				$formGroupClone.find('input').val('');
				$formGroupClone.find('.concept').text('Phone');
				$formGroupClone.insertAfter($formGroup);

				var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
				if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
					$lastFormGroupLast.find('.btn-add').attr('disabled', true);
				}
			};

			var removeFormGroup = function(event) {
				event.preventDefault();

				var $formGroup = $(this).closest('.form-group');
				var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

				var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
				if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
					$lastFormGroupLast.find('.btn-add').attr('disabled', false);
				}

				$formGroup.remove();
			};

			var selectFormGroup = function(event) {
				event.preventDefault();

				var $selectGroup = $(this).closest('.input-group-select');
				var param = $(this).attr("href").replace("#", "");
				var concept = $(this).text();

				$selectGroup.find('.concept').text(concept);
				$selectGroup.find('.input-group-select-val').val(param);

			}

			var countFormGroup = function($form) {
				return $form.find('.form-group').length;
			};

			$(document).on('click', '.btn-add', addFormGroup);
			$(document).on('click', '.btn-remove', removeFormGroup);
			$(document).on('click', '.dropdown-menu a', selectFormGroup);

		});
	})(jQuery);

	$(document).ready(function() {

		var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
			removeItemButton: true,
			maxItemCount: 5,
			searchResultLimit: 5,
			renderChoiceLimit: 5
		});


	});
</script>


<!-- <textarea id="oodles_editor" name="oodles_editor">Oodles</textarea> -->
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
<script>
	CKEDITOR.replace('oodles_editor2', {
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
<script>
	CKEDITOR.replace('oodles_editor3', {
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
<script>
	CKEDITOR.replace('oodles_editor4', {
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
<script>
	CKEDITOR.replace('oodles_editor5', {
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
<script>
	CKEDITOR.replace('oodles_editor6', {
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
<script>
	CKEDITOR.replace('oodles_editor7', {
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
<script>
	CKEDITOR.replace('oodles_editor8', {
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
<script>
	CKEDITOR.replace('oodles_editor11', {
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
<script>
	CKEDITOR.replace('oodles_editor9', {
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
<script>
	CKEDITOR.replace('oodles_editor10', {
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

	CKEDITOR.replace('oodles_editor11', {
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
	CKEDITOR.replace('oodles_editor12', {
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


	$(document).ready(function() {
		$('.select2').select2({
			closeOnSelect: false,
			allowClear: false
		});
	});

	// $('select').select2({
	// 	templateSelection: function(data) {
	// 		if (data.id === '') { // adjust for custom placeholder values
	// 			return 'Custom styled placeholder text';
	// 		}

	// 		return data.text;
	// 	}
	// });


	// $(".js-example-placeholder-multiple").select2({
	// 	placeholder: "Select Multiple"
	// });
</script>
<!-- script to limit the input  -->
<script>
function numberOnly(id) {
    let input = document.getElementById(id);
    let value = input.value;
    if (value.length > input.maxLength) {
    input.value = value.substring(0, input.maxLength);
  }
}
	</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>