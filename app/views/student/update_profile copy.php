<?php require APPROOT . '/views/inc_student/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
	$(document).ready(function() {

    
var readURL = function(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('.avatar').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}


$(".file-upload").on('change', function(){
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
<?php echo $student->student_id ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Profile</div>
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

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Student Details</header>
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
					<form method="post" action="<?php echo URLROOT; ?>/student/create_profile" enctype="multipart/form-data" autocomplete="OFF">

						<div class="card-body" id="bar-parent2">

							<!-- <h4><strong>Personal Information:</strong></h4> -->
							<div class="row">

							
								<div class="text-center">
        <img src="<?php echo URLROOT; ?>/uploads/<?php echo $student->student_image?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload Applicant's Passport Size Photo</h6>
        <input type="file" class="text-center center-block file-upload" name="student_image" >
      </div></hr><br>
	  <div class="col-md-6 col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>First Name as per Aadhar<span>*</span></label>
										<input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name" placeholder="<?php echo $student->f_name ?>" value="<?php echo $student->f_name ?>">
									</div>
								</div>
								<!-- <div class="col-md-6 col-sm-6">
									<div class="form-group">
									
										<label for="files">Upload Applicant's Passport Size Photo </label> <input class="mdl-textfield__input " type="file" id="maxStu" name="student_image">


										</div>
									</div> -->
						
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Last Name as per Aadhar<span>*</span></label>
										<input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name" placeholder="<?php echo $student->l_name ?>" value="<?php echo $student->l_name ?>" >
									</div>
								</div>
							

								<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

			<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Mobile Number<span>*</span></label>
										<input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Mobile Number" placeholder="<?php echo $student->phone_no ?>" value="<?php echo $student->phone_no ?>" >
									</div>
								</div>
							

								<div class="col-md-5 col-sm-6">
									<label>Check (Whatsapp Number same as Mobile Number)</label>
									<input type="number" class="form-control" id="whatsapp_no" name="whatsapp_no" placeholder="Enter Whatsapp Number"  placeholder="<?php echo $student->l_whatsapp_no ?>" value="<?php echo $student->l_whatsapp_no ?>" >
									
								</div>
								<div class="col-md-1 col-sm-12">
<br>

							<input type="checkbox" id="checkbox1" class="larger">
						</div>
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
												$("#whatsapp_no").attr("placeholder", "Enter Whatsapp Number");
											}

										});

									});
								</script>

						

								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>DOB as Aadhar<span>*</span></label>
										<input id="checkbox1" class="form-control" name="dob" id="dob" type="date" placeholder="<?php echo $student->dob ?>" value="<?php echo $student->dob ?>" >
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Gender</label>
										<select class="form-control" name="gender" id="select_change" placeholder="" >
											<?php if($student->gender=="Male"){ ?>
											<option value="Male" selected="selected">Male</option> 
											<?php } else { ?>

												<option value="Male">Male</option> 
											<?php } ?>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Communication Address<span>*</span></label>
										<input type="textr" class="form-control" name="communication_address" id="communication_address" placeholder="Provide Address (Not more than 200 characters)"  >
									</div>
								</div>

								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Village/Area/Locality<span>*</span></label>
										<input type="text" class="form-control" name="village" id="village" placeholder="Enter village name"  >
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Block/Taluk/Sub-District/Town<span>*</span></label>
										<input type="text" class="form-control" name="sub_district" id="sub_district" placeholder="Enter Block/Taluk/Sub-District/Town"  >
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>District<span>*</span></label>
										<input type="text" class="form-control" name="district" id="district" placeholder="Enter District" >
									</div>
								</div>
								

								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label for="exampleInputname1">State<span>*</span></label>
										<select name="state" class="form-control" >
											<option value="">-Select-</option>
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
									<div class="form-group">
										<label>PIN Code<span>*</span></label>
										<input type="number" class="form-control" name="pin_code" id="pin_code" placeholder="Enter Pin Code" >
									</div>
								</div>
								<!-- 
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>State<span>*</span></label>
										<input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
									</div>
								</div> -->
								<div class="col-md-4 col-sm-6">
									<div class="form-group">
										<label>Religion<span>*</span></label>
										<select class="form-control" name="religion" id="select_change" placeholder="Enter Religion" >
											<option value="Null">-Select-</option>
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
									<div class="form-group">
										<label>Category<span>*</span></label>

										<select class="form-control" name="category" id="select_change" placeholder="Enter Category" >
											<option value="Null">-Select-</option>
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
									<div class="form-group">
										<label>Physically Challenged</label>
										<select class="form-control" name="physically" id="select_change" placeholder="" >
											<option value="No">No</option>
											<option value="Yes">Yes</option>

										</select>

									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Aadhar Number<span>*</span></label>
										<input type="number" class="form-control" name="aadhar" id="aadhar" placeholder="Enter Aadhar Number" >
									</div>

								</div>

								<div class="col-md-6 col-sm-6">
									<div class="form-group">

										<label for="files">Upload Proof of Identity</label>
										<input class="mdl-textfield__input" type="file" id="maxStu" name="identity_proof" >
									</div>
								</div>
								</div>
								</div>
								</div>


							
								<div class="card-box">
								<div class="card-head">
									<header>Bank Details of Parent/Guardian</header>

								</div>
								<div class="card-body row">
								<!-- BANK DETAILS -->

								<!-- <h4><strong>Parent Information:</strong></h4> -->
								


								<div class="col-lg-6 col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Savings Bank Account Number<span>*</span></label>
											<input type="number" name="account_no" id="account_no" class="form-control" placeholder="Enter Bank Account Number" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Re-enter Savings Bank Account Number<span>*</span></label>
											<input type="number" name="re_account_no" id="re_account_no" class="form-control" placeholder="Re-Enter Bank Account Number" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Bank Name</label>
											<input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name" >
										</div>
									</div>
									

								
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Bank's Branch Name<span>*</span></label>
											<input type="text" id="bank_branch" name="bank_branch" class="form-control" placeholder="Enter Bank's Branch Name" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>IFSC Code<span>*</span></label>
											<input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="Enter IFSC Code" >
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="form-group">

											<label for="files">Upload Bank Passbook/Statement/Cancelled Cheque</label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="passbook_statement" >




										</div>
										</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Full Name as per Aadhar<span>*</span></label>
											<input type="text" id="name_as_per_bank" name="name_as_per_bank" class="form-control" placeholder="Enter name as per bank passbook" >
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
									<header>Family Information</header>

								</div>
<div class="card-body row">
								<!-- <h4><strong>Parent Information:</strong></h4> -->
								<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Number of Siblings<span>*</span></label>
											<input type="number" id="siblings" name="siblings" class="form-control" placeholder="Enter Number of Siblings" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Family Annual Income<span>*</span></label>
											<input type="number" class="form-control" name="annual_income" id="annual_income" placeholder="Enter Annual Income" >
										</div>
									</div>
									<div class="">
									<strong>	<u>Father/Guardian Detail's</u></strong>

								</div>
								<!-- <h4><strong>Father/Guardian Detail's</strong></h4> -->
									<div class="col-md-5 col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Name as per Aadhar<span>*</span></label>
											<input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Fathers Name as per Aadhar" >
										</div>
									</div>
									<div class="col-md-5 col-sm-6">
										<div class="form-group">
											<label>Aadhar Number<span>*</span></label>
											<input type="number" id="f_aadhar" name="f_aadhar" class="form-control" placeholder="Enter Aadhar Number"  >
										</div>
									</div>

									<div class="col-md-2 col-sm-6">
										<div class="form-group">
											<label>Mobile Number<span>*</span></label>
											<input type="number" id="f_phone" name="f_phone" class="form-control" placeholder="Enter Mobile Number" >
										</div>
									</div>
									<div class="">
								<strong>	<u>Mother/Guardian Detail's</u></strong>

								</div>
								<!-- <h4><strong>Mother/Guardian Detail's</strong></h4> -->
									<div class="col-md-5 col-sm-6">
										<div class="form-group">
											<label> Name as per Aadhar<span>*</span></label>
											<input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Enter Mothers Name as per Aadhar" >
										</div>
									</div>
									<div class="col-md-5 col-sm-6">
										<div class="form-group">
											<label> Aadhar Number<span>*</span></label>
											<input type="number" id="m_aadhar" name="m_aadhar" class="form-control" placeholder="Enter Aadhar Number" >
										</div>
									</div>

									<div class="col-md-2 col-sm-6">
										<div class="form-group">
										<label>Mobile Number<span>*</span></label>
											<input type="number" id="m_phone" name="m_phone" class="form-control" placeholder="Enter Mobile Number" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
								</div>
									
								</div>
								</div>

								<div class="card-box">
								<div class="card-head">
									<header>Current Academic Information</header>

								</div>
								<div class="card-body row">
								<!-- <div class="card-body" id="bar-parent2">
								<h4><strong>Current AcademicInformation:</strong></h4> -->

								<div class="row">




									<!-- school div start -->
									<!-- <div class="col-md-6 col-sm-6">
								
										<div class="form-group">
											<label>Select anyone: </label>
											<label>
												<input type="radio" class="check" name="check" value="Yes" />
												School
											</label>
											<label>
												<input type="radio" class="check" name="check" value="No" checked />
												College
											</label>

											<select name="school" class="action form-control" disabled>
												<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
													<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->institute_name; ?></option>
												<?php } ?>
												<option value="1">Other</option>
											</select>
											<select name="college" class="action1 form-control" disabled>
												<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="<?php echo $college_detail->id; ?>"><?php echo $college_detail->institute_name; ?></option>
												<?php } ?>
												<option value="1">Other</option>
											</select>
										</div>
									</div> -->
									<!-- select school finished div -->



									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->

											<label for="list2" class="l">Select Academic Level<span>*</span></label>

											<select name="academic_type" class="form-control" id="dbType" >



												<option value="1">School</option>
												<option value="2">College</option>

											</select>

										</div>
									</div>



									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="school" style="display:none;">
												<!-- <fieldset id="school" style="display:none;"> -->
											
												<select name="school" class="action form-control" >
													<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
														<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->institute_name; ?></option>
													<?php } ?>
													<option value="0">Other</option>
												</select>
												<!-- 									
</fieldset> -->

											</div>
										</div>
										<div id="college" style="display:none;">
											<select name="college" class="action1 form-control" >
												<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="<?php echo $college_detail->id; ?>"><?php echo $college_detail->institute_name; ?></option>
												<?php } ?>
												<option value="0">Other</option>
											</select>
										</div>




									</div>

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




									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Present Class / Course<span>*</span></label>
											<select class="form-control" name="course" id="select_change" >
												<option value="Null">-Select-</option>
												<option>KG</option>
												<option>Class 1</option>
												<option>Class 2</option>
												<option>Class 3</option>
												<option>Class 4</option>
												<option>Class 5</option>
												<option>Class 6</option>
												<option>Class 7</option>
												<option>Class 8</option>
												<option>Class 9</option>
												<option>Class 10</option>
												<option>Class 11</option>
												<option>Class 12</option>
												<option>Polytechnic / Diploma</option>
												<option>ITI</option>
												<option>Vocational Training</option>
												<option>Coaching Classes</option>
												<option>Graduation</option>
												<option>Post Graduation</option>
												<option>Post Graduation Diploma</option>
												<option>Phd</option>
												<option>Post Doctral</option>
												<option>Others</option>
											</select>
										</div>
									</div>

									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<label>City<span>*</span></label>
											<input type="textr" class="form-control" name="institute_city" id="institute_city" placeholder="Enter your City" >
										</div>
									</div>



									<!-- <div class="col-md-3 col-sm-6">
									<div class="form-group">
										<label>State<span>*</span></label>
										<input type="text" class="form-control" name="institute_state" id="institute_state" placeholder="Enter your Institute State">
									</div>
								</div> -->


									<div class="col-md-3 col-sm-6">
										<div class="form-group">
											<label for="exampleInputname1">State<span>*</span></label>
											<select name="institute_state" class="form-control" >
												<option value="">-Select-</option>
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
										<div class="form-group">
											<label>Tuition Fees<span>*</span></label>
											<input type="number" class="form-control" name="tuition_fees" id="tuition_fees" placeholder="Enter your Tuition Fees" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Non Tuition Fees<span>*</span></label>
											<input type="number" class="form-control" name="non_tuition_fees" id="non_tuition_fees" placeholder="Enter Non Tuition Fees" >
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">

											<label for="files">Upload Tuition Fees Receipt/Fees Structure*
											</label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="tuition_fees_receipt" >





										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group">

											<label>Upload Non-Tuition Fee Receipt (Any Bills/Receipts/ Invoices then please upload)


											</label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="non_tuition_fees_receipt">






										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Total Current Fees<span>*</span></label>
											<input type="text" class="form-control" name="total_fees" id="total_fees" placeholder="Enter Total Current Fees" >
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="form-group">
											<label>Number of Years Completed for the Current Course<span>*</span></label>
											<input type="number" class="form-control" name="course_span" id="course_span" placeholder="Enter number of years completed for the current course" >
										</div>
									</div>
									<div class="col-md-12 col-sm-6">
										<div class="form-group">
											<label>Have you already secured admission in Institute?<span>*</span></label>
											<input type="checkbox" data-toggle="toggle" name="admission_toggle" data-on="Yes" data-off="No">
											<!-- <input type="number" id="siblings" name="siblings" class="form-control" placeholder="Enter Number of Siblings"> -->
										</div>
									</div>
									<div class="col-md-12 col-sm-6">
										<div class="form-group">
											<label>Are you in receipt of any other Scholarship from Government or any other Institution?<span>*</span></label>
											<input type="checkbox" data-toggle="toggle" name="scholarship_verification_toggle" data-on="Yes" data-off="No">
											<!-- <input type="number" id="siblings" name="siblings" class="form-control" placeholder="Enter Number of Siblings"> -->
										</div>
									</div>
								</div>


							</div>
							</div>




							<div class="row">
								<div class="col-lg-6 col-lg-6">
									<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
								</div>
								<div class="col-lg-6 col-lg-6">
									<button type="submit" class="btn btn-primary" style="float: right;">Save</button>
								</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script>
						jQuery($ => {
							$('.action').prop('disabled', true);

							let $checkBox = $('.check').on('change', e => {
								var $select = $(e.target).closest('.form-group').find('.action');
								$select.prop('disabled', e.target.value !== 'Yes' && e.target.checked);
							});
						});
						jQuery($ => {
							$('.action1').prop('disabled', true);

							let $checkBox = $('.check').on('change', e => {
								var $select = $(e.target).closest('.form-group').find('.action1');
								$select.prop('disabled', e.target.value !== 'No' && e.target.checked);
							});
						});

						$('#d-checkbox').click(function() {
							if ($(this).prop('checked') == false) $('#color').attr("disabled", "disabled");
							else $('#color').removeAttr("disabled");
						});
					</script>
					<script>
						$('#e-checkbox').click(function() {
							if ($(this).prop('checked') == false) {
								$('#color1').attr("disabled", "disabled");
							} else {
								$('#color1').removeAttr("disabled");
							}
						});
					</script> -->
<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>








































<?php require APPROOT . '/views/inc_student/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php $student = $data['get_current_student'] ?>
<?php echo $student->student_id ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Profile</div>
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

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Add Details</header>
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
					<form method="post" action="<?php echo URLROOT; ?>/student/update_profile_data" enctype="multipart/form-data" autocomplete="OFF">



						<div class="card-body" id="bar-parent2">
							<h4><strong>Personal Information:</strong></h4>
							<div class="row">

								<div class="col-md-6 col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>First Name as per Aadhar<span>*</span></label>
										<input type="text" class="form-control" id="f_name" name="f_name" placeholder="<?php echo $student->f_name ?>" value="<?php echo $student->f_name ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Last Name as per Aadhar<span>*</span></label>
										<input type="text" class="form-control" id="l_name" name="l_name" placeholder="<?php echo $student->l_name ?>" value="<?php echo $student->l_name ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="files">Upload Applicant's Photo</label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="student_image">




										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>DOB as Aadhar<span>*</span></label>
										<input id="checkbox1" class="form-control" name="dob" id="dob" type="date" value="<?php echo $student->dob ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Mobile Number<span>*</span></label>
										<input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="<?php echo $student->phone_no ?>" value="<?php echo $student->phone_no ?>">
									</div>
								</div>


								<!-- <div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input type="checkbox" name="others" onclick="enable_text(this.checked)" class="medium" />



									<label>Whatsapp Number(Not same as Mobile Number)</label><input  type="number" class="form-control" name="whatsapp_no" class="medium" disabled="disabled" id="testing" placeholder="<?php echo $student->whatsapp_no ?>" value="<?php echo $student->whatsapp_no ?>" />

								</div>
								</div>
								<script>
									$("input:checkbox").click(function() {
										$("#testing").attr("disabled", !this.checked);
									});
								</script> -->

								<div class="col-md-6 col-sm-6">
									<input type="checkbox" name="others" onclick="disabled_text(this.checked)" class="medium" />
									<!-- <input type="text" disabled="disabled" /> -->


									<label>Whatsapp Number(Same as Mobile Number)</label> <input id="text_box" type="number" name="whatsapp_no" class="medium" placeholder="<?php echo $student->whatsapp_no ?>" value="<?php echo $student->whatsapp_no ?>"/>

								</div>


								<script>
									$("input:checkbox").click(function() {
										$("#text_box").attr("disabled", this.checked);
									});
								</script>

						

						
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Aadhar Number<span>*</span></label>
										<input type="number" class="form-control" name="aadhar" id="aadhar" placeholder="<?php echo $student->aadhar ?>" value="<?php echo $student->aadhar ?>">
									</div>

								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Gender</label>
										<select class="form-control" name="gender" id="select_change" placeholder="">
											<option value="<?php echo $student->gender ?>"><?php echo $student->gender ?></option>
											
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Transgender">Transgender</option>
										</select>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Communication Address<span>*</span></label>
										<input type="textr" class="form-control" name="communication_address" id="communication_address" placeholder="<?php echo $student->communication_address ?>" value="<?php echo $student->communication_address ?>">
									</div>
								</div>

								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Village/Area/Locality<span>*</span></label>
										<input type="text" class="form-control" name="village" id="village" placeholder="<?php echo $student->village ?>" value="<?php echo $student->village ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Block/Taluk/Sub-District/Town<span>*</span></label>
										<input type="text" class="form-control" name="sub_district" id="sub_district" placeholder="<?php echo $student->sub_district ?>" value="<?php echo $student->sub_district ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>District<span>*</span></label>
										<input type="text" class="form-control" name="district" id="district" placeholder="<?php echo $student->district ?>" value="<?php echo $student->district ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>PIN Code<span>*</span></label>
										<input type="number" class="form-control" name="pin_code" id="pin_code" placeholder="Enter Pin Code">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>State<span>*</span></label>
										<input type="text" class="form-control" name="state" id="state" placeholder="<?php echo $student->state ?>" value="<?php echo $student->state ?>">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Religion<span>*</span></label>
										<select class="form-control" name="religion" id="select_change" placeholder="Enter Religion">
											<option value="<?php echo $student->religion ?>"><?php echo $student->religion ?> (Currently Selected)</option>
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

								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Category<span>*</span></label>

										<select class="form-control" name="category" id="select_change" placeholder="Enter Category">
											<option value="<?php echo $student->category ?>"><?php echo $student->category ?> (Currently Selected)</option>
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
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Physically Challenged</label>
										<select class="form-control" name="physically" id="select_change" placeholder="">
											<?php if ($student->physically == 'No') { ?>
												<option value="No" selected>No</option>
												<option value="Yes">Yes</option>
											<?php } else { ?>
												<option value="No">No</option>
												<option value="Yes" selected>Yes</option>
											<?php } ?>
										</select>

									</div>
								</div>


								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label for="files">Upload Proof of Identity<span>*</span></label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="identity_proof">



										</div>
									</div>
								</div>




								<div class="card-head">
									<header>Bank Details</header>

								</div>
								<!-- BANK DETAILS -->
								<div class="card-body" id="bar-parent2">
									<!-- <h4><strong>Parent Information:</strong></h4> -->
									<div class="row">


										<div class="col-md-6 col-sm-6">
											<!-- text input -->
											<div class="form-group">
												<label>Savings Bank Account Number<span>*</span></label>
												<input type="number" name="account_no" id="account_no" class="form-control" placeholder="<?php echo $student->account_no ?>" value="<?php echo $student->account_no ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<!-- text input -->
											<div class="form-group">
												<label>Re-enter Savings Bank Account Number<span>*</span></label>
												<input type="number" name="re_account_no" id="re_account_no" class="form-control" placeholder="<?php echo $student->re_account_no ?>" value="<?php echo $student->re_account_no ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>IFSC Code<span>*</span></label>
												<input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="<?php echo $student->ifsc_code ?>" value="<?php echo $student->ifsc_code ?>">
											</div>
										</div>

										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Bank Name</label>
												<input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="<?php echo $student->bank_name ?>" value="<?php echo $student->bank_name ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Bank's Branch Name<span>*</span></label>
												<input type="text" id="bank_branch" name="bank_branch" class="form-control" placeholder="<?php echo $student->bank_branch ?>" value="<?php echo $student->bank_branch ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Full Name<span>* (As per Bank Passbook)</span></label>
												<input type="text" id="name_as_per_bank" name="name_as_per_bank" class="form-control" placeholder="<?php echo $student->name_as_per_bank ?>" value="<?php echo $student->name_as_per_bank ?>">
											</div>
										</div>


										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label for="files">Upload Bank Passbook/Statement</label>
													<input class="mdl-textfield__input" type="file" id="maxStu" name="passbook_statement">



												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PARENT INFORMATION -->
								<!-- <div class="card-body" id="bar-parent2">
								<h4><strong>Parent Information:</strong></h4>
								<div class="row">-->
								<div class="card-head">
									<header>Parent Information</header>

								</div>
								<div class="card-body" id="bar-parent2">
									<!-- <h4><strong>Parent Information:</strong></h4> -->
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<!-- text input -->
											<div class="form-group">
												<label>Father Name as per Aadhar<span>*</span></label>
												<input type="text" name="father_name" id="father_name" class="form-control" placeholder="<?php echo $student->father_name ?>" value="<?php echo $student->father_name ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Father Aadhar Number<span>*</span></label>
												<input type="number" id="f_aadhar" name="f_aadhar" class="form-control" placeholder="<?php echo $student->f_aadhar ?>" value="<?php echo $student->f_aadhar ?>">
											</div>
										</div>

										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Mobile Number</label>
												<input type="number" id="f_phone" name="f_phone" class="form-control" placeholder="<?php echo $student->f_phone ?>" value="<?php echo $student->f_phone ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Mother Name as per Aadhar<span>*</span></label>
												<input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="<?php echo $student->mother_name ?>" value="<?php echo $student->mother_name ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Mother Aadhar Number<span>*</span></label>
												<input type="number" id="m_aadhar" name="m_aadhar" class="form-control" placeholder="<?php echo $student->m_aadhar ?>" value="<?php echo $student->m_aadhar ?>">
											</div>
										</div>

										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Mobile Number</label>
												<input type="number" id="m_phone" name="m_phone" class="form-control" placeholder="<?php echo $student->m_phone ?>" value="<?php echo $student->m_phone ?>">
											</div>
										</div>

										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Number of Siblings<span>*</span></label>
												<input type="number" id="siblings" name="siblings" class="form-control" placeholder="<?php echo $student->siblings ?>" value="<?php echo $student->siblings ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Family Annual Income<span>*</span></label>
												<input type="number" class="form-control" name="annual_income" id="annual_income" placeholder="<?php echo $student->annual_income ?>" value="<?php echo $student->annual_income ?>">
											</div>
										</div>
								
									</div>
								</div>
<!-- new start -->
<div class="card-head">
									<header>Current Academic Information</header>
								</div>
<div class="card-body" id="bar-parent2">
									<div class="row">



									<?php if(!empty($student->school)  && !empty($student->college)){ ?>

								
										
<div class="col-md-6 col-sm-6">
<div class="form-group">
								<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->

<label for="list2" class="l">Select Academic Level</label>

<select name="academic_type" class="form-control" id="dbType">


	
	<option value="1">School</option>
	<option value="2">College</option>
	
</select>
							
							</div>
							</div>
							
					

							<div class="col-md-6 col-sm-6">
									<div class="form-group">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="school" style="display:none;">
<!-- <fieldset id="school" style="display:none;"> -->
<select name="school" class="action form-control">
												<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
													<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->institute_name; ?></option>
												<?php } ?>
												<option value="0">Other</option>
											</select>
<!-- 									
</fieldset> -->

</div>
</div>
<div id="college" style="display:none;">
<select name="college" class="action1 form-control">
												<?php foreach ($data['get_college_detail'] as $college_detail) { ?>
													<option value="<?php echo $college_detail->id; ?>"><?php echo $college_detail->institute_name; ?></option>
												<?php } ?>
												<option value="0">Other</option>
											</select>
</div>




</div>

<script>    
 $('#dbType').on('click',function(){
    if( $(this).val()==="1"){
    $("#school").show()
	$("#college").hide()

    }else if($(this).val()==="2"){

    $("#college").show()

	$("#school").hide()

	}else{
	$("#school").show()
	$("#college").hide()

    }
});
</script>


<?php } ?>


<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Present Class / Course</label>
												<select class="form-control" name="course" id="select_change">
													<option value="<?php echo $student->course ?>"><?php echo $student->course ?> (Currently Selected)</option>
													<option>KG</option>
													<option>Class 1</option>
													<option>Class 2</option>
													<option>Class 3</option>
													<option>Class 4</option>
													<option>Class 5</option>
													<option>Class 6</option>
													<option>Class 7</option>
													<option>Class 8</option>
													<option>Class 9</option>
													<option>Class 10</option>
													<option>Class 11</option>
													<option>Class 12</option>
													<option>Polytechnic / Diploma</option>
													<option>ITI</option>
													<option>Vocational Training</option>
													<option>Coaching Classes</option>
													<option>Graduation</option>
													<option>Post Graduation</option>
													<option>Post Graduation Diploma</option>
													<option>Phd</option>
													<option>Post Doctral</option>
													<option>Others</option>
												</select>
											</div>
										</div>

										<!-- <div class="col-md-3 col-sm-6">
											<div class="form-group">
												<label>City<span>*</span></label>
												<input type="textr" class="form-control" name="institute_city" id="state" placeholder="<?php echo $student->state ?>" value="<?php echo $student->state ?>">
											</div>
										</div> -->

										<div class="col-md-3 col-sm-6">
											<div class="form-group">
												<label>State<span>*</span></label>
												<input type="text" class="form-control" name="institute_state" id="institute_state" placeholder="<?php echo $student->state ?>" value="<?php echo $student->state ?>">
											</div>
										</div>
						
								<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Tuition Fees<span>*</span></label>
												<input type="number" class="form-control" name="tuition_fees" id="tuition_fees" placeholder="<?php echo $student->tuition_fees ?>" value="<?php echo $student->tuition_fees ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Non Tuition Fees<span>*</span></label>
												<input type="number" class="form-control" name="non_tuition_fees" id="non_tuition_fees" placeholder="<?php echo $student->non_tuition_fees ?>" value="<?php echo $student->non_tuition_fees ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
													<label for="files">Upload Tuition Fees Receipt/Fees Structure*
													</label>
													<input class="mdl-textfield__input" type="file" id="maxStu" name="tuition_fees_receipt">




												</div>
											</div>
										</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
							
											<label >Upload Non-Tuition Fee Receipt (Any Bills/Receipts/ Invoices then please upload)


</label>
											<input class="mdl-textfield__input" type="file" id="maxStu" name="non_tuition_fees_receipt">





									
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Total Current Fees<span>*</span></label>
										<input type="text" class="form-control" name="total_fees" id="total_fees" placeholder="Enter Total Current Fees">
									</div>
								</div>
						
								<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Number of years completed for the current course<span>*</span></label>
												<input type="number" class="form-control" name="course_span" id="course_span" placeholder="<?php echo $student->course_span ?>" value="<?php echo $student->course_span ?>">
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Have you already secured admission in Institute?<span>*</span></label>
												<?php if ($student->admission_toggle == 1) { ?>
													<input type="checkbox" data-toggle="toggle" name="admission_toggle" checked>
												<?php } else { ?>
													<input type="checkbox" data-toggle="toggle" name="admission_toggle">
												<?php } ?>
											</div>
										</div>
								
										<div class="col-md-6 col-sm-6">
											<div class="form-group">
												<label>Are you in receipt of any other Scholarship from Govt. or any other institution?<span>*</span></label>
												<?php if ($student->scholarship_verification_toggle == 1) { ?>
													<input type="checkbox" data-toggle="toggle" name="scholarship_verification_toggle" checked>
												<?php } else { ?>
													<input type="checkbox" data-toggle="toggle" name="scholarship_verification_toggle">
												<?php } ?>
											</div>
										</div>
								</div>
								</div>
							</div>
							</div>

<!-- new end -->

							


						<div class="card-body" id="bar-parent2">
							<div class="row">
								<div class="col-lg-6 col-lg-6">
									<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
								</div>
								<div class="col-lg-6 col-lg-6">
									<button type="submit" class="btn btn-primary" style="float: right;">Save</button>
								</div>

					</form>
				</div>

			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- <script>
		jQuery($ => {
			$('.action').prop('disabled', true);

			let $checkBox = $('.check').on('change', e => {
				var $select = $(e.target).closest('.form-group').find('.action');
				$select.prop('disabled', e.target.value !== 'Yes' && e.target.checked);
			});
		});
		jQuery($ => {
			$('.action1').prop('disabled', true);

			let $checkBox = $('.check').on('change', e => {
				var $select = $(e.target).closest('.form-group').find('.action1');
				$select.prop('disabled', e.target.value !== 'No' && e.target.checked);
			});
		});

		$('#d-checkbox').click(function() {
			if ($(this).prop('checked') == false) $('#color').attr("disabled", "disabled");
			else $('#color').removeAttr("disabled");
		});
	</script>
	<script>
		$('#e-checkbox').click(function() {
			if ($(this).prop('checked') == false) {
				$('#color1').attr("disabled", "disabled");
			} else {
				$('#color1').removeAttr("disabled");
			}
		});
	</script> -->
	<!-- end page content -->
	<?php require APPROOT . '/views/inc_student/footer.php'; ?>