<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
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
<?php $studentMod = New students; ?>
<script>
	// new



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
	/* input{
		text-transform:uppercase;
	} */
</style>
<br />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Start Apply</div>
				</div>

				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Profile</li>
				</ol>
			</div>
		</div>

		<!-- demo start -->
		<?php
		$student_detail_auth = $data['get_current_user_auth'] ?>
		<form method="post" action="<?php echo URLROOT; ?>/student/create_profile" enctype="multipart/form-data" autocomplete="OFF">
			<div class="tab-pane active fontawesome-demo" id="tab1">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-box">
							<div class="card-head">
								<!-- <header>Add Student Personal Details


								</header> -->
								<header>COMPLETE YOUR PROFILE DETAIL TO PLAY QUIZ & EARN SCHOLARSHIPS</header>
								<span class="mdl-chip" style="float:right;">
								<?php if(isset($_SESSION['rexkod_oodles_quiz_play_session'])){ 


									$quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
                                    // echo $quiz_id;
                                    // die();
                                    $get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);
                                      $quiz_type = $get_quiz_detail->type;
                                    // echo $quiz_type;
                                    // die();
                                      $category = $get_quiz_detail->category;
                                      $subject = $get_quiz_detail->subject_name;
                               
                                    // redirect('student/all_quiz/1/4/0');
?>
									<a href="<?php echo URLROOT; ?>/student/all_quiz/<?php echo $quiz_type; ?>/<?php echo $category; ?>/<?php echo $subject; ?>">	<span class="mdl-chip__text">Skip All</span></a>

								<?php }else{ ?>
									<a href="<?php echo URLROOT; ?>/student">	<span class="mdl-chip__text">Skip All</span></a>
									<?php } ?>
								
										</span>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body ">

								<!-- <h4><strong>Personal Information:</strong></h4> -->
								<div class="row">
									<div class="text-center">
										<img src="<?php echo URLROOT; ?>/assets_home/images/about/profile_picture.png" class="avatar img-circle img-thumbnail" alt="avatar" style="height:100px; width:100px">
										<h6>Upload Applicant's Passport Size Photo<span>*</span></h6>
										<input type="file" class="text-center center-block file-upload" name="student_image" required>
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
											<input type="text" class="form-control mdl-textfield__input" id="l_name" name="l_name" placeholder="Enter Last Name" required>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Email ID<span>*</span></label>
											<input type="text" class="form-control mdl-textfield__input" placeholder="<?php echo $student_detail_auth->email ?>" readonly>
										</div>
									</div>




									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Mobile Number<span>*</span></label>
											<input type="number" class="form-control mdl-textfield__input" id="phone_no" name="phone_no" placeholder="<?php echo $student_detail_auth->phone ?>" value="<?php echo $student_detail_auth->phone ?>" oninput="numberOnly(this.id);" maxlength="10" readonly>
										</div>
									</div>


									<div class="col-md-5 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label></label>
											<input type="number" class="form-control mdl-textfield__input" id="whatsapp_no" name="whatsapp_no" oninput="numberOnly(this.id);" maxlength="10" placeholder="Tick  if Whatsapp Number same as your Mobile Number">

										</div>
									</div>
									<div class="col-md-1 col-sm-12">
										<br>
										<br>


										<input type="checkbox" id="checkbox1" name="same_as_phone" class="larger">
									</div>


									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>DOB as Aadhar<span>*</span></label>
											<input id="checkbox1" class="form-control mdl-textfield__input" name="dob" id="dob" type="date" max="2017-01-01" required>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Gender<span>*</span></label>
											<select class="form-control mdl-textfield__input" name="gender" id="select_change" placeholder="" required>
												<option value="">-Select-</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Transgender">Transgender</option>
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
											<select class="form-control mdl-textfield__input" name="religion" id="select_change" placeholder="" required>
												<option value="">-Select-</option>
												<option value="Buddhism">Buddhism</option>
												<option value="Christian">Christian</option>
												<option value="Hindu">Hindu</option>
												<option value="Jain">Jain</option>
												<option value="Parsi">Parsi</option>
												<option value="Sikh">Sikh</option>
												<option value="Muslim">Muslim</option>
												<option value="Others">Others</option>
											</select>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Category<span>*</span></label>

											<select class="form-control mdl-textfield__input" name="category" id="select_change" placeholder="Enter Category" required>
												<option value="">-Select-</option>
												<option value="General">General</option>
												<option value="NTDNT">NTDNT</option>
												<option value="OBC-C">OBC-C</option>
												<option value="OBC-NC">OBC-NC</option>
												<option value="SC">SC</option>
												<option vlaue="ST">ST</option>
												<option value="ST">VJ/NT</option>
												<option value="Other Reservations">Other Reservations</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Physically Challenged<span>*</span></label>
											<select class="form-control mdl-textfield__input" name="physically" id="select_change" placeholder="" required>
												<option value="No">No</option>
												<option value="Yes">Yes</option>

											</select>

										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Aadhar Number<span>*</span></label>
											<input type="number" class="form-control mdl-textfield__input" name="aadhar" id="aadhar" oninput="numberOnly(this.id);" maxlength="12" placeholder="XXXXXXXXXXXX" required>
										</div>

									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Proof of Address<span>*</span></label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="address_proof" title=" " required>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Proof of Identity</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="identity_proof">
										</div>
									</div>

									<div class="row">
										<div class="col-lg-6 col-lg-6">



											<?php if(isset($_SESSION['rexkod_oodles_quiz_play_session'])){ 


$quiz_id  = $_SESSION['rexkod_oodles_quiz_play_session'];
// echo $quiz_id;
// die();
$get_quiz_detail = $studentMod->get_quiz_detail($quiz_id);
  $quiz_type = $get_quiz_detail->type;
// echo $quiz_type;
// die();
  $category = $get_quiz_detail->category;
  $subject = $get_quiz_detail->subject_name;

// redirect('student/all_quiz/1/4/0');
?>
<a class="btn btn-primary"  href="<?php echo URLROOT; ?>/student/all_quiz/<?php echo $quiz_type; ?>/<?php echo $category; ?>/<?php echo $subject; ?>">	<span class="mdl-chip__text">Skip All</span></a>

<?php }else{ ?>
<a class="btn btn-primary"  href="<?php echo URLROOT; ?>/student">	<span class="mdl-chip__text">Skip All</span></a>
<?php } ?>



										</div>

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

			<br>
			<!-- end div -->
			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab1">
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

											<select name="academic_type" class="form-control mdl-textfield__input" id="select_change" >
											<option readonly value="">--Select--</option>
												<option value="1">School</option>
												<option value="2">College</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->
											<label for="list2">Select Institute Name</label>
											<select name="academic_name" class="form-control mdl-textfield__input" onchange="academic_other_input(this);">
											<option readonly value="">--Select--</option>
											<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
													<option value="1<?php echo $school_detail->school_id; ?>"><?php echo $school_detail->school_name; ?></option>
													<?php } ?>
											<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="2<?php echo $college_detail->id; ?>"><?php echo $college_detail->college_name; ?></option>
													<?php } ?>
													<option value="0">Other</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6" style="display:none;" id="academic_other_name">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Institute Name</label>
											<input type="textr" class="form-control mdl-textfield__input" name="academic_other_name"  placeholder="Enter your Institute Name">
										</div>
									</div>
<!-- old version of school and college, where on selecting school and college was getting popped up. and clicking on the other in the school and college respectively , an empty different input box was displaying for school and collge which was storing  in school_temp and college_temp. -->
									<!-- <div class="col-md-12 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										

											<label for="list2" class="l">Select Academic Level</label>

											<select name="academic_type" class="form-control mdl-textfield__input" id="dbType">
												<option value="1">School</option>
												<option value="2">College</option>

											</select>

										</div>
									</div>

									<div class="col-md-6 col-sm-6" id="school_college_div" style="display:none;">

										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="school" style="display:none;">
										

											<label>Select School</label>
											<select name="school" class="action form-control mdl-textfield__input" onchange="school_input_temp(this);" id="school1">
												<option value="">-Select-</option>
												<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
													<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
												<?php } ?>
												<option value="0">Other</option>
											</select>


										</div>

										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="college" style="display:none;">
											<label>Select College</label>
											<select name="college" class="action1 form-control" onchange="college_input_temp(this);" id="college1">
												<option value="">-Select-</option>
												<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="<?php echo $college_detail->id; ?>"><?php echo $college_detail->college_name; ?></option>
												<?php } ?>
												<option value="0">Other</option>
											</select>
										</div>
									</div>

									<div class="col-md-6 col-sm-6" style="display:none;" id="empty_temp_div">
									</div>

									<div class="col-md-6 col-sm-6" style="display:none;" id="school_div">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>School Name</label>
											<input type="textr" class="form-control mdl-textfield__input" name="school_temp" id="school_temp" placeholder="Enter your School Name">
										</div>
									</div>
									<div class="col-md-6 col-sm-6" style="display:none;" id="college_div">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>College Name</label>
											<input type="textr" class="form-control mdl-textfield__input" name="college_temp" id="college_temp" placeholder="Enter your College Name">
										</div>
									</div> -->

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Present Class / Course</label>
											<select class="form-control mdl-textfield__input" name="course" id="select_change" disabled>
												<option  readonly>-Select-</option>
												<?php foreach ($data['get_all_class'] as $class_detail) { ?>
													<option value="<?php echo $class_detail->id; ?>" <?php if ($student_detail_auth->class == $class_detail->id) {
																											echo "selected";
																										} ?>><?php echo $class_detail->class_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-4">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Select Board</label>
											<select class="form-control mdl-textfield__input" name="board" id="select_change">
											<option readonly value="">--Select--</option>

												<?php foreach ($data['get_all_boards'] as $hobby) { ?>
													<option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<input type="text" value="<?php echo $student_detail_auth->class ?>" name="course" hidden>
									<div class="col-md-4 col-sm-4">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>City</label>
											<input type="textr" class="form-control mdl-textfield__input" name="institute_city" id="institute_city" placeholder="Enter your City">
										</div>
									</div>


									<div class="col-md-4 col-sm-4">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">State</label>
											<select name="institute_state" class="form-control mdl-textfield__input">
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

									<!-- Tuition fees commenting out -->
									<!-- <div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Tuition Fees</label>
											<input type="number" class="form-control mdl-textfield__input" name="tuition_fees" id="tuition_fees" placeholder="Enter your Tuition Fees">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Non Tuition Fees</label>
											<input type="number" class="form-control mdl-textfield__input" name="non_tuition_fees" id="non_tuition_fees" placeholder="Enter Non Tuition Fees">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Total Current Fees</label>
											<input type="text" class="form-control mdl-textfield__input" name="total_fees" id="total_fees" placeholder="Enter Total Current Fees">
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Tuition Fees Receipt/Fees Structure*
											</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="tuition_fees_receipt">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<br>
											<label>Have you already secured admission in Institute?</label>
											<input id="admission_toggle" class="admission_toggle" type="checkbox" class="  myCheckbox" name="admission_toggle" onclick="fonctionTest()">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="course_span" style="display:none;">
											<label>Number of Years Completed for the Current Course</label>
											<select class="form-control mdl-textfield__input" name="course_span" id="course_span">
												<option value="Null">-Select-</option>
												<option value="0">None</option>
												<option value="1">First Year</option>
												<option value="2">Second Year</option>
												<option value="3">Third Year</option>
												<option value="4">Fourth Year</option>
												<option value="5">Fifth Year</option>
												<option value="6">Sixth Year</option>

											</select>
										</div>
									</div>

									<div class="col-md-12 col-sm-6">
										<div class="form-group ">
											<label>Are you in receipt of any other Scholarship from Government or any other Institution?</label>
											<input type="checkbox" name="scholarship_verification_toggle" data-on="Yes" data-off="No" onclick="toggle(this)">

										</div>
									</div> -->
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
			<!-- end div -->
			<!-- new div -->
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
							<div class="card-body">
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
											<tr id="section0" class="row">
												<td class="col-md-6 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Academic  Name<span>*</span></label>
													<input type="text" class="form-control mdl-textfield__input" name="p_academic_name[]"  placeholder="Enter Name" >
													</div>
                                                </td>
												<td class="col-md-5 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Class<span>*</span></label>
												
													<select class="form-control mdl-textfield__input" name="p_class[]"  >
														<option  readonly>-Select-</option>
														<?php foreach ($data['get_all_class'] as $class_detail) { ?>
															<option value="<?php echo $class_detail->id; ?>" ><?php echo $class_detail->class_name; ?></option>
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
													<input type="number" class="form-control mdl-textfield__input" name="p_cgpa[]"  placeholder="Enter % or CGPA" >
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> Start Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_start_date[]"  placeholder="Enter Class" >
													</div>
                                                </td>
												<td class="col-md-4 col-sm-3">
													<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label> End Date<span>*</span></label>
													<input type="date" class="form-control mdl-textfield__input" name="p_end_date[]"  placeholder="Enter Class" >
												</div>
                                                </td>
											</tr>
											<tr id="section1" class="row"></tr>
										</tbody>
									</table>
									
									<!-- <div class="col-md-6 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> Academic  Name</label>
											<input type="textr" class="form-control mdl-textfield__input" name="dfdfdf"  placeholder="Enter Name">
										</div>
									</div>
									<div class="col-md-5 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> Class</label>
										
											<select class="form-control mdl-textfield__input" name="cour22se"  >
												<option  readonly>-Select-</option>
												<?php foreach ($data['get_all_class'] as $class_detail) { ?>
													<option value="<?php echo $class_detail->id; ?>" ><?php echo $class_detail->class_name; ?></option>
												<?php } ?>
											</select>

										</div>
									</div>
									<div class="col-md-1 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label></label><br>
											<button type="button" class="btn btn-primary text-white" style="float: right;" id="delete_section"><i class="fa-solid fa-trash-can"></i></button>
										</div>
									</div>
									<div class="col-md-4 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> % or CGPA Acquired</label>
											<input type="text" class="form-control mdl-textfield__input" name="academic_otdfdfdfher_name"  placeholder="Enter % or CGPA">
										</div>
									</div>
									<div class="col-md-4 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> Start Date</label>
											<input type="date" class="form-control mdl-textfield__input" name="academdfsfsfsic_other_name"  placeholder="Enter Class">
										</div>
									</div>
									<div class="col-md-4 col-sm-3">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> End Date</label>
											<input type="date" class="form-control mdl-textfield__input" name="academic_ofsfsfsther_name"  placeholder="Enter Class">
										</div>
									</div> -->


								
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
			<!-- end div -->
			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab1">
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
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Number of Siblings</label>
											<input type="number" id="siblings" name="siblings" class="form-control mdl-textfield__input" placeholder="Enter Number of Siblings">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Family Annual Income</label>
											<input type="number" class="form-control mdl-textfield__input" name="annual_income" id="annual_income" placeholder="Enter Annual Income" oninput="numberOnly(this.id);" maxlength="12">
										</div>
									</div>
									<div class="">
										<strong> <u><span style="word-spacing:3px;letter-spacing: 3px;">Father/Guardian Detail's</span></u></strong>

									</div>
									<!-- <h4><strong>Father/Guardian Detail's</strong></h4> -->
									<div class="col-md-6 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Name as per Aadhar</label>
											<input type="text" name="father_name" id="father_name" class="form-control mdl-textfield__input" placeholder="Enter Fathers Name as per Aadhar">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Aadhar Number</label>
											<input type="number" id="f_aadhar" name="f_aadhar" class="form-control mdl-textfield__input" placeholder="XXXXXXXXXXXX" oninput="numberOnly(this.id);" maxlength="12">
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Mobile Number</label>
											<input type="number" id="f_phone" name="f_phone" class="form-control mdl-textfield__input" oninput="numberOnly(this.id);" maxlength="10" placeholder="Enter Mobile Number">
										</div>
									</div>
									<div class="col-md-4  col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Enter Email Id</label>
											<input class="form-control mdl-textfield__input" type="email" id="maxStu" name="f_email_id" placeholder="Enter Father's Email Id">
										</div>
									</div>
									<div class="col-md-4  col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Aadhar Card</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="father_aadhar_doc">
										</div>
									</div>
									<div class="">
										<strong> <u><span style="word-spacing: 3px;letter-spacing: 3px;">Mother/Guardian Detail's</span></u></strong>
									</div>
									<!-- <h4><strong>Mother/Guardian Detail's</strong></h4> -->
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> Name as per Aadhar</label>
											<input type="text" id="mother_name" name="mother_name" class="form-control mdl-textfield__input" placeholder="Enter Mothers Name as per Aadhar">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label> Aadhar Number</label>
											<input type="number" id="m_aadhar" name="m_aadhar" class="form-control mdl-textfield__input" oninput="numberOnly(this.id);" maxlength="12" placeholder="XXXXXXXXXXXX">
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Mobile Number</label>
											<input type="number" id="m_phone" name="m_phone" class="form-control mdl-textfield__input" oninput="numberOnly(this.id);" maxlength="10" placeholder="Enter Mobile Number">
										</div>
									</div>
									<div class="col-md-4  col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Enter Email Id</label>
											<input class="form-control mdl-textfield__input" type="email" id="maxStu" name="m_email_id" placeholder="Enter Mother's Email Id">
										</div>
									</div>
									<div class="col-md-4  col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Aadhar Card</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mother_aadhar_doc">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
									</div>
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
			<!-- div end -->
			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab1">
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
											<input type="text" class="form-control mdl-textfield__input" name="comm_address" id="comm_address" placeholder="Provide Address (Not more than 200 characters)">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>PIN Code</label>
											<input type="number" class="form-control mdl-textfield__input" name="comm_pin_code" id="comm_pin_code" onkeyup="find_pincode_c(this.value)" placeholder="Enter Pin Code" oninput="numberOnly(this.id);" maxlength="6" minlength="6">
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label class="form-control-label ">Village/Area/Locality(Select Any)</label>
											<select type="text" class="form-control text1" id="comm_village" name="comm_village">
												<option value="">-Select-</option>
												<option disabled hidden>...................................</option>
											</select>
										</div>
									</div>
									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Block/Taluk/Town</label>
											<input type="text" class="form-control mdl-textfield__input" name="comm_block" id="comm_block" value=" " readonly placeholder="Enter Block/Taluk/Town">

										</div>
									</div>


									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <label for="exampleInputname1">State</label> -->
											<!-- <select name="comm_state" id="comm_state" class="form-control mdl-textfield__input" > -->
											<label class="form-control-label">State</label>
											<input type="text" class="form-control" name="comm_state" id="comm_state" value=" " readonly placeholder="Enter State">
										</div>
									</div>
									<p style="margin-top:3px;color:red;" id="from_nonpincode"></p>
									<div class="col-md-12 col-sm-12">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<input type="checkbox" id="checkbox2" class="medium" name="same_as_comm_address">
											<label>Are the Permanent Address same as Communication Address?</label>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Permanent Address</label>
											<input type="textr" class="form-control mdl-textfield__input" name="perm_address" id="perm_address" placeholder="Provide Address (Not more than 200 characters)">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>PIN Code</label>
											<input type="number" class="form-control mdl-textfield__input" name="perm_pin_code" id="perm_pin_code" onkeyup="find_pincode(this.value)" placeholder="Enter Pin Code">
										</div>
									</div>
									<div class="col-md-4 col-sm-6" id="main_perm_village">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label class="form-control-label">Village/Area/Locality(Select Any)</label>
											<select type="text" class="form-control " id="perm_village" name="perm_village">
												<option disabled hidden>...................................</option>
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
											<input type="text" class="form-control mdl-textfield__input" name="perm_block" id="perm_block" value=" " readonly placeholder="Enter Block/Taluk/Town">

										</div>
									</div>



									<div class="col-md-4 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<!-- <label for="exampleInputname1">State</label> -->
											<!-- <select name="perm_state" id="perm_state" class="form-control mdl-textfield__input" > -->
											<label class="form-control-label">State</label>
											<input type="text" class="form-control" name="perm_state" id="perm_state" value=" " readonly placeholder="Enter State">
										</div>
									</div>

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
			<!-- div end -->

			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab1">
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
											<input type="text" id="bank_name" name="bank_name" class="form-control mdl-textfield__input" placeholder="Enter Bank Name">
										</div>
									</div>



									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Bank's Branch Name</label>
											<input type="text" id="bank_branch" name="bank_branch" class="form-control mdl-textfield__input" placeholder="Enter Bank's Branch Name">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>IFSC Code</label>
											<input type="text" id="ifsc_code" name="ifsc_code" class="form-control mdl-textfield__input" placeholder="Enter IFSC Code" oninput="numberOnly(this.id);" maxlength="11">
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

											<label for="files">Upload Bank Passbook/Statement/Cancelled Cheque</label>
											<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="passbook_statement">




										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Savings Bank Account Number</label>
											<input type="number" name="account_no" id="account_no" class="form-control mdl-textfield__input" placeholder="Enter Bank Account Number" oninput="numberOnly(this.id);" maxlength="18">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<!-- text input -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Re-enter Savings Bank Account Number</label><span>&nbsp;</span><span id='message'></span>
											<input type="number" name="re_account_no" id="re_account_no" class="form-control mdl-textfield__input" placeholder="Re-Enter Bank Account Number" oninput="numberOnly(this.id);" maxlength="18">


										</div>
									</div>
									<div class="col-md-12 col-sm-6">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Enter name as per Passbook</label>
											<input type="text" id="name_as_per_bank" name="name_as_per_bank" class="form-control mdl-textfield__input" placeholder="Enter name as per Passbook">
										</div>
									</div>
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
			<!-- div end -->
			<!-- new div -->
			<div class="tab-pane active fontawesome-demo" id="tab1">
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
											<textarea name="description" class="form-control" rows="3" placeholder="Enter few words about yourself"></textarea>

										</div>
									</div>


									<div class="col-md-6 col-sm-6">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="exampleInputname1">Hobbies<span>&nbsp;(Select multiple which ever is applicable)*</label>
											<select name="hobby[]" multiple class="form-control select2" style="height:200px !important">
												<option value="" readonly>-Select Type-</option>
												<?php foreach ($data['get_all_hobbies'] as $hobby) { ?>
													<option value="<?php echo $hobby->id; ?>"><?php echo $hobby->name; ?></option>
												<?php } ?>
											</select>

										</div>
									</div>
									<div class="col-md-6 col-sm-6">

										<div class="form-group">
											<label class="control-label">Add Achievements</label>
											<input type="text" class="tags tags-input" data-type="tags" name="achievements[]" />
										</div>


									</div>
									<div class="col-md-6 col-sm-6">

										<div class="form-group">
											<label class="control-label">Enter Mother Tongue</label>
											<input type="text" class="form-control" name="mother_tongue"  placeholder="Enter Mother Tongue"/>
										</div>


									</div>






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
			<!-- div end -->



			<!-- <div class="row">
				<div class="col-lg-6 col-lg-6">
					<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
				</div>

				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
				</div>
												</div> -->
		</form>
	</div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>

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

	$('#account_no, #re_account_no').on('keyup', function() {
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
				$('#perm_village option:selected').val("");
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

<script>
	$('#dbType').on('click', function() {
		if ($(this).val() === "1") {
			$("#school").show()
			$("#college").hide()
			$("#school_college_div").show()
			$("#empty_temp_div").show()
		} else if ($(this).val() === "2") {
			$("#college").show()
			$("#school").hide()
			$("#school_college_div").show()
			$("#empty_temp_div").show()
		} else {
			$("#school").show()
			$("#college").hide()
			$("#empty_temp_div").hide()
		}
	});
</script>

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
				$("#whatsapp_no").attr("placeholder", "Tick  if Whatsapp Number same as your Mobile Number");
			}

		});

	});
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
	function school_input_temp(that) {
		if (that.value == "0") {

			document.getElementById("school_div").style.display = "block";
			document.getElementById("college_div").style.display = "none";
			document.getElementById("empty_temp_div").style.display = "none";
		} else {
			document.getElementById("school_div").style.display = "none";
			document.getElementById("empty_temp_div").style.display = "block";
		}
	}
</script>
<script>
	function college_input_temp(that) {
		if (that.value == "0") {

			document.getElementById("college_div").style.display = "block";
			document.getElementById("school_div").style.display = "none";
			document.getElementById("empty_temp_div").style.display = "none";
		} else {
			document.getElementById("college_div").style.display = "none";
			document.getElementById("empty_temp_div").style.display = "block";
		}
	}
</script>

<!-- add / delete academic -->
<script>
	$(document).ready(function() {
            // alert($academic_count);
            
        
			var i = 1;
        $("#add_section").click(function() {

			// console.log("clicked");
			// $('#section' + i).html("<td class='col-md-6 col-sm-3'>abcd</td>");
            $('#section' + i).html("<td class='col-md-6 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Academic  Name<span>*</span></label><input type='text' class='form-control mdl-textfield__input' name='p_academic_name[]'  placeholder='Enter Name' required></div></td><td class='col-md-5 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Class<span>*</span></label><select class='form-control mdl-textfield__input' name='p_class[]' required ><option  readonly>-Select-</option><?php foreach ($data['get_all_class'] as $class_detail) { ?><option value='<?php echo $class_detail->id; ?>' ><?php echo $class_detail->class_name; ?></option><?php } ?></select></div></td><td class='col-md-1 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label></label><br><button type='button' class='btn btn-primary text-white' style='float: right;' id='delete_section' onclick='removeSection(" + i + ")'><i class='fa-solid fa-trash-can'></i></button></div> </td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> % or CGPA Acquired<span>*</span></label><input type='text' class='form-control mdl-textfield__input' name='p_cgpa[]'  placeholder='Enter % or CGPA' required></div></td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> Start Date<span>*</span></label><input type='date' class='form-control mdl-textfield__input' name='p_start_date[]'  placeholder='Enter Class' required></div></td><td class='col-md-4 col-sm-3'><div class='form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width'><label> End Date<span>*</span></label><input type='date' class='form-control mdl-textfield__input' name='p_end_date[]'  placeholder='Enter Class' required></div></td>");

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