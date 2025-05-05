<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<link href="<?php echo URLROOT?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<style>
	/* input.larger {
		width: 35px;
		height: 35px;
	}

	.mt-100 {
		margin-top: 100px
	}

	body {
		background: #ffffff;
		background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
		background: linear-gradient(to right, #0083B0, #00B4DB);
		color: #514B64;
		min-height: 100vh
	} */
</style>

<style>
	/* .select2 {
		width: 100% !important;
	} */
</style>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add College</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add College</li>
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

					<form method="post" action="<?php echo URLROOT; ?>/admin/add_college_elements" enctype="multipart/form-data" autocomplete="OFF">





					

							<div class="card-body row">
								<!-- BANK DETAILS -->

								<!-- <h4><strong>Parent Information:</strong></h4> -->




								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Name of the College</label>
										<input type="text" id="bank_name" name="college_name" class="form-control mdl-textfield__input" placeholder="Enter Name of the College" >

									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Choose College Photo<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="college_image" >

									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Contact No<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="number" id="college_contact_no" name="college_contact_no" placeholder="Enter Contact No" oninput="numberOnly(this.id);" maxlength="10" >

									</div>
								</div>



								<div class="col-md-3 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Location / Address<span>*</span></label><br>
										<input type="text" id="branch_address" name="college_address" class=" form-control mdl-textfield__input" placeholder="Enter Location / Address" >

									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>Pin Code<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" id="college_pin_code" type="number" name="college_pin_code"  placeholder="Enter Pin Code" oninput="numberOnly(this.id);" maxlength="6" >

									</div>
								</div>
								<div class="col-md-3 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>City<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="text" name="college_city" placeholder="Enter City" >

									</div>
								</div>

								<div class="col-md-3 col-sm-6">
									<!-- text input -->
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="">State<span>*</span></label>
										<br>



										<select name="state" class="form-control" >
											<option value="">-Select State-</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Puducherry">Puducherry</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Odisha">Odisha</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttarakhand">Uttarakhand</option>
											<option value="West Bengal">West Bengal</option>
										</select>


									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Year of Establishment<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="number" min="1900" max="2025" step="1" value="2022" name="year_of_establishment"  >
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="">Select College Type<span>*</span></label>
										<br>
										<select name="college_type" class="form-control" >
											<option value="">-Select Type-</option>
											<option value="1">Private</option>
											<option value="2">Government</option>
											<option value="3">OodlesIn</option>
										</select>
									</div>
								</div>
							





								<!-- <div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Student<strong> : </strong> Teacher<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="text" name="student_teacher_ratio" placeholder="Enter Student Teacher Ratio">
									</div>
								</div> -->
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Legal Name<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="text" name="legal_name" placeholder="Enter Legal Name" >
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>Registered Office Address<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="text" name="registered_address" placeholder="Enter Registered Office Address" >

									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>Website Link<span>*</span></label>&nbsp;<input type="checkbox" id="vehicle1" name="website_check" value="1" checked><br>
										<input class="form-control mdl-textfield__input" type="text" name="website_link" placeholder="Enter Website Link" >

									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="">Accredited By<span>*</span></label>
										<br>
										<select name="accredited_by" class="form-control" >
											<option value="">-Select Type-</option>
											<option value="1">A</option>
											<option value="2">B</option>
											<option value="3">C</option>
										</select>
									</div>
								</div>
								<div class="col-md-12 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Accreditation Number<span></span></label><br>
										<input class="form-control mdl-textfield__input" id="accreditation_no" type="number" name="accreditation_no" placeholder="Enter Accreditation Number" oninput="numberOnly(this.id);" maxlength="20">
									</div>
								</div>

						
								

								
								<div class="col-md-6 col-sm-6">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
							<label for="exampleInputname1">Facilities<span>&nbsp;(Select multiple which ever is applicable)*</label>
												<select  name="facility[]" multiple class="form-control select2" style="height:200px !important" required>
												<option value="" disabled="disabled">-Select Type-</option>
											<option value="1">Library</option>
											<option value="2">Medical</option>
											<option value="3">Hostel</option>
											<option value="4">Medical Ventilated</option>
												</select> 

						</div>
						</div>
					


								<div class="col-lg-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="" class="">Recognized By<span>&nbsp;(Select multiple which ever is applicable)*</span></label>
										<br>
										<select name="recognized_by[]" class="form-control select2 " multiple >
											<option value="">-Select Type-</option>
											<option value="1">AICTE</option>
											<option value="2">PCI</option>
											<option value="3">NBA</option>
										</select>
									</div>
								</div>

								<div class="col-md-12 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label>College Info<span>*</span></label>
										<br>
										<textarea id="oodles_editor7" rows="3" cols="60" name="college_info"  ></textarea>

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
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="" class="">College Stream<span>&nbsp;(Select multiple which ever is applicable)*</span></label>
								<select name="college_course[]" class="form-control select2" multiple >
									<option value="" disabled="disabled">-Select College Stream-</option>
									<?php foreach ($data['get_college_course'] as $college_course) { ?>
										<option value="<?php echo $college_course->id ?>"><?php echo $college_course->college_course ?></option>
									<?php } ?>
								</select>

							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Courses & Fees Offered<span>*</span></label>
								<br>
								<textarea id="oodles_editor11" rows="1" cols="10" name="course_offered" ></textarea>
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
								<label>University Entrance Exam<span>*</span></label><br>
										<input class="form-control mdl-textfield__input" type="text" name="entrance_exam" placeholder="Enter the entrance exam for college" >

							</div>
						</div>



						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Application Mode<span>*</span></label><br>

								<select name="mode_of_admission" class="form-control" >
									<option value="" readonly>-Select Type-</option>
									<option value="1">Online</option>
									<option value="2">Offline</option>
									<option value="3">Both</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Admission Criteria<span>*</span></label><br>

								<textarea id="oodles_editor9" rows="2" cols="60" name="admission_criteria" ></textarea>
							</div>
						</div>


						<!-- <div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Fee Description<span>*</span></label><br>

								<textarea id="oodles_editor1" rows="2" cols="60" name="admission_fee"></textarea>
							</div>
						</div> -->
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>How to apply?<span>*</span></label>
								<br>
								<textarea id="oodles_editor2" rows="2" cols="60" name="how_to_apply" ></textarea>
							</div>
						</div>

					</div>
				</div>


				<!-- PARENT INFORMATION -->
				<!-- <div class="card-body" id="bar-parent2">
								<h4><strong>Parent Information:</strong></h4>
								<div class="row">-->

		
	
	


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
								<input type="checkbox" name="review_academic" value="1">
								<label>Academic</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_accomodation" value="1">
								<label>Accomodation </label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_faculty" value="1">
								<label>Faculty </label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_infra" value="1">
								<label>Infrastructure</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_placement" value="1">
								<label>Placement</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_social" value="1">
								<label>Social Life</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_course" value="1">
								<label>Course</label>
							</div>
							<div class="col-md-3">
								<br>
								<input type="checkbox" name="review_campus" value="1">
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
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<!-- <div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Year <span>*</span></label>

								<div class="form-group input-group">
									<input type="number" name="cut_off_year[]" id="cut_off_year" multiple  class="form-control" oninput="numberOnly(this.id);" maxlength="4">
									<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span>
								</div>



							</div>
						</div> -->


						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Cutoff Marks<span>*</span></label><br>

								<textarea id="oodles_editor10" rows="2" cols="60" name="cut_off_marks"  ></textarea>
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

								<textarea id="oodles_editor8" rows="2" cols="60" name="placement"  ></textarea>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label>Insert Multiple Images </label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="placement_images[]" multiple  >


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

								<label>Insert Multiple Images </label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="gallery[]" multiple  >

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
								<textarea id="oodles_editor3" rows="4" cols="100" name="scholarship"  ></textarea>

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
								<textarea id="oodles_editor4" rows="4" cols="60" name="faculty"  ></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label>Insert Multiple Images </label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="faculty_images[]" multiple  >

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
								<textarea id="oodles_editor5" rows="4" cols="60" name="hostel"  ></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label>Insert Multiple Images </label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="hostel_images[]" multiple  >

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
						<!-- <h4><strong>Parent Information:</strong></h4> -->
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Question</label>

								<div class="form-group input-group">
									<input type="text" name="question_faq[]" multiple class="form-control" placeholder="Enter question"  >
									<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span>
								</div>
							</div>



						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Answers</label>

								<div class="form-group input-group">
									<input type="text" name="answer_faq[]" multiple class="form-control" placeholder="Enter answer"  >
									<span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span>

								</div>
							</div>

							"

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
								<textarea id="oodles_editor6" rows="4" cols="100" name="alumni"  ></textarea>

							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label>Insert Multiple Images </label>
								<br>

								<input class="form-control mdl-textfield__input" type="file" name="alumni_images[]" multiple  >

								<!-- <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
										</button></span> -->

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
								<label> Upload MOU<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mou"  >
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label> Upload NDA<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="nda"  >
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Declaration Form<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="declaration_form"  >
							</div>
						</div>


						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Other Documents<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="other_document"  >
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
								<input class="form-control mdl-textfield__input" type="text" name="auth_signature" placeholder="Enter Name" required >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_designation" placeholder="Enter Designation"  >
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Aadhar Number<span>*</span> </label><br>
								<input class="form-control mdl-textfield__input" id="auth_aadhar_no" type="number" name="auth_aadhar_no" placeholder="Enter Aadhar Number" oninput="numberOnly(this.id);" maxlength="12"  >
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Email ID<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="email" id="txtPwd" name="auth_email" placeholder="Enter Email ID" required >
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" id="auth_contact_number" type="number" name="auth_contact_number" placeholder="Enter Contact Number" oninput="numberOnly(this.id);" maxlength="10" required >
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Password<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" id="auth_contact_number" type="password" name="password" placeholder="Enter Password" required >
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>First Contact Person(Name)<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_contact_person" placeholder="Enter First Contact Person Name"  >


							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_designation" placeholder="Enter Contact Person Designation"  >
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Details<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_details" placeholder="Contact Person Details"  >
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
								<label>Upload Aadhar Copy of Authorized Signatory<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="signatory_aadhar"  >
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Image of Authorized Signatory <span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="auth_image"  >
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
								<input class="form-control mdl-textfield__input" type="text" name="bank_name" placeholder="Enter Bank Name"  >
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Branch Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="branch_name" placeholder="Enter Branch Name"  >
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>IFSC<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="ifsc" placeholder="Enter IFSC Code"  >
							</div>
						</div>

					
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Account Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="account_no" id="account_no" placeholder="Enter Account Number"  >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Re-Account Number<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="re_account_no" id="re_account_no" placeholder="Enter the Account Number to Verify"  >
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name of Institute as per Bank Records<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="college_name_as_per_bank" id="" placeholder="Enter the Name of Institute as per Bank Records"  >
							</div>
						</div>
					

						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Cancelled Cheque/ Bank statement <span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="cancelled_cheque"  >
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
								<label>Package Name<span><label>*(Renewal<span></span></label>&nbsp;<input type="checkbox" id="vehicle1" name="package_renewal" value="1">)</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="package_name" placeholder="Enter Package Name"  >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Cost<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="package_cost" placeholder="Enter Package Cost"  >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Start Date<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="date" name="package_start_date"   >
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>End Date<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="date" name="package_end_date"   >
							</div>
						</div>

						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Description<span>*</span></label>
								<br>
								<textarea id="oodles_editor12" rows="4" cols="100" name="package_description"  ></textarea>
							</div>
						</div>

						<div class="col-md-4 col-sm-4">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="">Select Number of Year<span>*</span></label>
										<br>
										<select name="package_validity" class="form-control"  >
											<option value="">-Select Year-</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
								</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Add-ons<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="package_other_detail" id="package_other_detail" placeholder="Additional service details"  >
							</div>
						</div>
					
					
						<div class="col-md-4 col-sm-4">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Document / Invoice <span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="package_invoice"  >
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
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Preview</button>
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

	// $(function()
	// {
	//     $("#submit").on("click",function()
	//     {
	//         let inputOne = $("#school1").val();
	//         let inputTwo = $("#college1").val();
	//         if (inputOne == "" || inputTwo == "")
	//         {
	//             alert("fill inputs");
	// 			return false;
	//         }
	//         else
	//         {
	//             // Ajax call goes here
	//         }
	//     })
	// })
</script>

<script>
	//     (function ($) {
	//     $(function () {

	//         var addFormGroup = function (event) {
	//             event.preventDefault();

	//             var $formGroup = $(this).closest('.form-group');
	//             var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
	//             var $formGroupClone = $formGroup.clone();

	//             $(this)
	//                 .toggleClass('btn-default btn-add btn-danger btn-remove')
	//                 .html('–');

	//             $formGroupClone.find('input').val('');
	//             $formGroupClone.insertAfter($formGroup);

	//             var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
	//             if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
	//                 $lastFormGroupLast.find('.btn-add').attr('disabled', true);
	//             }
	//         };

	//         var removeFormGroup = function (event) {
	//             event.preventDefault();

	//             var $formGroup = $(this).closest('.form-group');
	//             var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

	//             var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
	//             if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
	//                 $lastFormGroupLast.find('.btn-add').attr('disabled', false);
	//             }

	//             $formGroup.remove();
	//         };

	//         var countFormGroup = function ($form) {
	//             return $form.find('.form-group').length;
	//         };

	//         $(document).on('click', '.btn-add', addFormGroup);
	//         $(document).on('click', '.btn-remove', removeFormGroup);

	//     });
	// })(jQuery);
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


// 	$(document).ready(function() {
// 		$('.select2').select2({
// 			closeOnSelect: false,
// 			allowClear: false
// 		});
// 	});

// 	$('select').select2({
//   templateSelection: function (data) {
//     if (data.id === '') { 
//       return 'Custom styled placeholder text';
//     }

//     return data.text;
//   }
// });


// $(".js-example-placeholder-multiple").select2({
//     placeholder: "-Select Multiple-"
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
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
