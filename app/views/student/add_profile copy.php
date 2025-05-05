<?php require APPROOT . '/views/inc_student/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
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
						<header>Add Student Personal Details</header>
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
					<?php 
					$student_detail_auth = $data['get_current_user_auth'] ?>
					<form method="post" action="<?php echo URLROOT; ?>/student/create_profile" enctype="multipart/form-data" autocomplete="OFF">

						<div class="card-body" id="bar-parent2">

							<!-- <h4><strong>Personal Information:</strong></h4> -->
							<div class="row">
								<div class="text-center">
									<img src="<?php echo URLROOT; ?>/assets_home/images/about/profile_picture.png" class="avatar img-circle img-thumbnail" alt="avatar" style="height:100px; width:100px">
									<h6>Upload Applicant's Passport Size Photo</h6>
									<input type="file" class="text-center center-block file-upload" name="student_image" required>
								</div>
								</hr><br>
								<div class="col-md-4 col-sm-6">
									<!-- text input -->
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>First Name as per Aadhar<span>*</span></label>
										<input type="text" class="form-control mdl-textfield__input" id="f_name" name="f_name" placeholder="Enter First Name" required="required">
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
										<label>Email ID</label>
										<input type="text" class="form-control mdl-textfield__input" placeholder="<?php echo $student_detail_auth->email?>" readonly >
									</div>
								</div>


								<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Mobile Number<span>*</span></label>
										<input type="number" class="form-control mdl-textfield__input" id="phone_no" name="phone_no" placeholder="<?php echo $student_detail_auth->phone?>" value="<?php echo $student_detail_auth->phone?>"  readonly>
									</div>
								</div>


								<div class="col-md-5 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label></label>
									<input type="number" class="form-control mdl-textfield__input" id="whatsapp_no" name="whatsapp_no" placeholder="Tick Whatsapp No. same as Mobile No." required>

								</div>
								</div>
								<div class="col-md-1 col-sm-12">
									<br>
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

								<!-- <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<input type="checkbox" id="watsapp_no" id="watsapp_no" value="agree" />
										<label for="watsapp_no">Watsapp Number<span>(same as mobile number)</span>
										</label>

									</div> -->

								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>DOB as Aadhar<span>*</span></label>
										<input id="checkbox1" class="form-control mdl-textfield__input" name="dob" id="dob" type="date" required>
									</div>
								</div>

								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Gender</label>
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
										<label>State<span>*</span></label>
										<input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
									</div>
								</div> -->
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Religion<span>*</span></label>
										<select class="form-control mdl-textfield__input" name="religion" id="select_change" placeholder="Enter Religion" required>
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
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Category<span>*</span></label>

										<select class="form-control mdl-textfield__input" name="category" id="select_change" placeholder="Enter Category" required>
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
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Physically Challenged</label>
										<select class="form-control mdl-textfield__input" name="physically" id="select_change" placeholder="" required>
											<option value="No">No</option>
											<option value="Yes">Yes</option>

										</select>

									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Aadhar Number<span>*</span></label>
										<input type="number" class="form-control mdl-textfield__input" name="aadhar" id="aadhar" placeholder="XXXXXXXXXXXX"  maxlength="12" required>
									</div>

								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label for="files">Upload Proof of Address<span>*</span></label>
										<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="address_proof" required>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

										<label for="files">Upload Proof of Identity</label>
										<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="identity_proof" >
									</div>
								</div>
							
							</div>
						</div>
				</div>



				<div class="card-box">
					<div class="card-head">
						<header>Communication Address</header>

					</div>
					<div class="card-body row">
		

						<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Communication Address<span>*</span></label>
										<input type="textr" class="form-control mdl-textfield__input" name="comm_address" id="comm_address" placeholder="Provide Address (Not more than 200 characters)" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>PIN Code<span>*</span></label>
										<input type="number" class="form-control mdl-textfield__input" name="comm_pin_code" id="comm_pin_code" onkeyup="find_pincode_c(this.value)"  placeholder="Enter Pin Code" required>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										
										<label class="form-control-label ">Village/Area/Locality(Select Any)</label> 
										<select type="text" class="form-control text1" id="comm_village" name="comm_village" required>
                            <option disabled hidden>...................................</option>
                            </select>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Block/Taluk/Town<span>*</span></label>
										<input type="text" class="form-control mdl-textfield__input" name="comm_block" id="comm_block" value=" " readonly placeholder="Enter Block/Taluk/Town" >
									
									</div>
								</div>
						


								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<!-- <label for="exampleInputname1">State<span>*</span></label> -->
										<!-- <select name="comm_state" id="comm_state" class="form-control mdl-textfield__input" required> -->
										<label class="form-control-label">State</label> 
										<input type="text" class="form-control" name="comm_state" id="comm_state" value=" " readonly>

                           

											
									</div>
								</div>
								<p style="margin-top:3px;color:red;" id="from_nonpincode"></p>
								<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<input type="checkbox" id="checkbox2" class="medium">
									<label>Are the Permanent Address same as Communication Address?</label>
								</div>
								</div>


					</div>
				</div>
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
				<div class="card-box">
					<div class="card-head">
						<header>Permanent Address</header>

					</div>
					<div class="card-body row">
		

						<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Permanent Address<span>*</span></label>
										<input type="textr" class="form-control mdl-textfield__input" name="perm_address" id="perm_address" placeholder="Provide Address (Not more than 200 characters)" required>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>PIN Code<span>*</span></label>
										<input type="number" class="form-control mdl-textfield__input" name="perm_pin_code" id="perm_pin_code" onkeyup="find_pincode(this.value)"  placeholder="Enter Pin Code" required>
									</div>
								</div>
								<div class="col-md-4 col-sm-6" id="main_perm_village">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									
										<label class="form-control-label">Village/Area/Locality(Select Any)</label> 
										<select type="text" class="form-control " id="perm_village" name="perm_village">
                            <option  hidden>...................................</option>
                            </select>
								</div>
								</div>
							
							<div class="col-md-4 col-sm-6" id="perm_village_2" style="display:none;">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"  >
										<label>Village<span>*</span></label>
										<input type="text" class="form-control mdl-textfield__input " name="perm_village1" id="perm_village1" value=" " readonly placeholder="Enter village/Taluk/Town" >
									
									</div>
								</div>
								<script>
$('#checkbox2').click(function() {
   if($(this).is(":checked")){
      $("#perm_village_2").show();
   }
   else{
      $("#perm_village_2").hide();
   }
});
$('#checkbox2').click(function() {
   if($(this).is(":checked")){
      $("#main_perm_village").hide();
   }
   else{
      $("#main_perm_village").show();
   }
});
									</script>
							<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Block/Taluk/Town<span>*</span></label>
										<input type="text" class="form-control mdl-textfield__input" name="perm_block" id="perm_block" value=" " readonly placeholder="Enter Block/Taluk/Town" >
									
									</div>
								</div>
						


								<div class="col-md-4 col-sm-6">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<!-- <label for="exampleInputname1">State<span>*</span></label> -->
										<!-- <select name="perm_state" id="perm_state" class="form-control mdl-textfield__input" required> -->
										<label class="form-control-label">State</label> 
										<input type="text" class="form-control" name="perm_state" id="perm_state" value=" " readonly>

                           

											
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
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Savings Bank Account Number<span>*</span></label>
								<input type="number" name="account_no" id="account_no" class="form-control mdl-textfield__input" placeholder="Enter Bank Account Number" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<!-- text input -->
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Re-enter Savings Bank Account Number<span>*</span></label>
								<input type="number" name="re_account_no" id="re_account_no" class="form-control mdl-textfield__input" placeholder="Re-Enter Bank Account Number" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Bank Name</label>
								<input type="text" id="bank_name" name="bank_name" class="form-control mdl-textfield__input" placeholder="Enter Bank Name" required>
							</div>
						</div>



						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Bank's Branch Name<span>*</span></label>
								<input type="text" id="bank_branch" name="bank_branch" class="form-control mdl-textfield__input" placeholder="Enter Bank's Branch Name" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>IFSC Code<span>*</span></label>
								<input type="text" id="ifsc_code" name="ifsc_code" class="form-control mdl-textfield__input" placeholder="Enter IFSC Code" required>
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label for="files">Upload Bank Passbook/Statement/Cancelled Cheque</label>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="passbook_statement" required>




							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Full Name as per Aadhar<span>*</span></label>
								<input type="text" id="name_as_per_bank" name="name_as_per_bank" class="form-control mdl-textfield__input" placeholder="Enter name as per aadhar" required>
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
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Number of Siblings<span>*</span></label>
								<input type="number" id="siblings" name="siblings" class="form-control mdl-textfield__input" placeholder="Enter Number of Siblings" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Family Annual Income<span>*</span></label>
								<input type="number" class="form-control mdl-textfield__input" name="annual_income" id="annual_income" placeholder="Enter Annual Income" required>
							</div>
						</div>
						<div class="">
							<strong> <u>Father/Guardian Detail's</u></strong>

						</div>
						<!-- <h4><strong>Father/Guardian Detail's</strong></h4> -->
						<div class="col-md-3 col-sm-6">
							<!-- text input -->
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name as per Aadhar<span>*</span></label>
								<input type="text" name="father_name" id="father_name" class="form-control mdl-textfield__input" placeholder="Enter Fathers Name as per Aadhar" required>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Aadhar Number<span>*</span></label>
								<input type="number" id="f_aadhar" name="f_aadhar" class="form-control mdl-textfield__input" placeholder="XXXXXXXXXXXX" required required>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Mobile Number<span>*</span></label>
								<input type="number" id="f_phone" name="f_phone" class="form-control mdl-textfield__input" placeholder="Enter Mobile Number" required>
							</div>
						</div>
						<div class="col-md-3  col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label for="files">Upload Aadhar Card</label>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="father_aadhar_doc" required>
							</div>
						</div>
						<div class="">
							<strong> <u>Mother/Guardian Detail's</u></strong>

						</div>
						<!-- <h4><strong>Mother/Guardian Detail's</strong></h4> -->
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label> Name as per Aadhar<span>*</span></label>
								<input type="text" id="mother_name" name="mother_name" class="form-control mdl-textfield__input" placeholder="Enter Mothers Name as per Aadhar" required>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label> Aadhar Number<span>*</span></label>
								<input type="number" id="m_aadhar" name="m_aadhar" class="form-control mdl-textfield__input" placeholder="XXXXXXXXXXXX" required>
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Mobile Number<span>*</span></label>
								<input type="number" id="m_phone" name="m_phone" class="form-control mdl-textfield__input" placeholder="Enter Mobile Number" required>
							</div>
						</div>
						<div class="col-md-3  col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

								<label for="files">Upload Aadhar Card</label>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mother_aadhar_doc" required>
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

						




							<!-- school div start -->
							<!-- <div class="col-md-6 col-sm-6">
								
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
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
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<!-- <input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1"> -->

									<label for="list2" class="l">Select Academic Level<span>*</span></label>

									<select name="academic_type" class="form-control mdl-textfield__input" id="dbType" required>



										<option value="1">School</option>
										<option value="2">College</option>

									</select>

								</div>
							</div>



							<div class="col-md-6 col-sm-6">
							
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="school" style="display:none;">
										<!-- <fieldset id="school" style="display:none;"> -->
								
										<label>Select School</label>
										<select name="school" class="action form-control mdl-textfield__input" required>
										
											<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
												<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->institute_name; ?></option>
											<?php } ?>
											<option value="0">Other</option>
										</select>
										<!-- 									
</fieldset> -->

									</div>
								
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" id="college" style="display:none;">
								<label>Select College</label>
									<select name="college" class="action1 form-control" required>
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
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="exampleInputname1">Present Class / Course<span>*</span></label>
									<select class="form-control mdl-textfield__input" name="course" id="select_change" required>
										<option value="">-Select-</option>
										<option value="KG">KG</option>
										<option value="Class 1">Class 1</option>
										<option value="Class 2">Class 2</option>
										<option value="Class 3">Class 3</option>
										<option value="Class 4">Class 4</option>
										<option value="Class 5">Class 5</option>
										<option value="Class 6">Class 6</option>
										<option value="Class 7">Class 7</option>
										<option value="Class 8">Class 8</option>
										<option value="Class 9">Class 9</option>
										<option value="Class 10">Class 10</option>
										<option value="Class 11">Class 11</option>
										<option value="Class 12">Class 12</option>
										<option value="Polytechnic / Diploma">Polytechnic / Diploma</option>
										<option value="ITI">ITI</option>
										<option value="Vocational Training">Vocational Training</option>
										<option value="Coaching Classes">Coaching Classes</option>
										<option value="Graduation">Graduation</option>
										<option value="Post Graduation">Post Graduation</option>
										<option value="Post Gradudation Diploma">Post Graduation Diploma</option>
										<option value="Phd">Phd</option>
										<option value="Post Doctral">Post Doctral</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label >City<span>*</span></label>
									<input type="textr" class="form-control mdl-textfield__input" name="institute_city" id="institute_city" placeholder="Enter your City" required>
								</div>
							</div>


							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="exampleInputname1">State<span>*</span></label>
									<select name="institute_state" class="form-control mdl-textfield__input" required>
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
									<label>Tuition Fees<span>*</span></label>
									<input type="number" class="form-control mdl-textfield__input" name="tuition_fees" id="tuition_fees" placeholder="Enter your Tuition Fees" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Non Tuition Fees<span>*</span></label>
									<input type="number" class="form-control mdl-textfield__input" name="non_tuition_fees" id="non_tuition_fees" placeholder="Enter Non Tuition Fees" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Total Current Fees<span>*</span></label>
									<input type="text" class="form-control mdl-textfield__input" name="total_fees" id="total_fees" placeholder="Enter Total Current Fees" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label for="files">Upload Tuition Fees Receipt/Fees Structure*
									</label>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="tuition_fees_receipt" required>





								</div>
							</div>

							<!-- <div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Upload Non-Tuition Fee Receipt (Any Bills/Receipts/ Invoices then please upload)


									</label>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="non_tuition_fees_receipt">


								</div>
							</div> -->
						
							<div class="col-md-6 col-sm-6" >
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<br>
									<label>Have you already secured admission in Institute?<span>*</span></label>
									<input type="checkbox" class="form-control mdl-textfield__input  myCheckbox"  data-toggle="toggle" name="admission_toggle" data-on="Yes" data-off="No" id="ele" >
								
								</div>
							</div>
							<div class="col-md-6 col-sm-6" >
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" style="display:none;" id="tgl_div">
									<label>Number of Years Completed for the Current Course<span>*</span></label>
									<select class="form-control mdl-textfield__input" name="course_span" id="course_span" required="required" >
										<option value="Null">-Select-</option>
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
									<label>Are you in receipt of any other Scholarship from Government or any other Institution?<span>*</span></label>
									<input type="checkbox" data-toggle="toggle" name="scholarship_verification_toggle" data-on="Yes" data-off="No" onclick="toggle(this)">
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
<script>
    // function toggle(ele) {
    //     var tgl_div = document.getElementById('tgl_div');
    //     if (tgl_div.style.display == 'block') {
    //         tgl_div.style.display = 'none';

    //         document.getElementById(ele.id).value = 'Show DIV';
    //     }
    //     else {
    //         tgl_div.style.display = 'block';
    //         document.getElementById(ele.id).value = 'Hide DIV';
    //     }
    // }
</script>

<script>
// var ele  = document.getElementById("ele");
// var content = document.getElementById("tgl_div");

// toggle.addEventListener("click", function() {
//   tgl_div.style.display = (tgl_div.dataset.toggled ^= 1) ? "block" : "none";
// });

</script>
<script>
$('.myCheckbox').on('click',function(){

if ($('.myCheckbox').is(':checked'))
{
  $("div#tgl_div").show();
  $("div#tgl_div ").prop('disabled', false);
 
}
else {
  
   $("div#tgl_div").hide();
   $("div#tgl_div ").prop('disabled', true);
}
});
	</script>
	<!-- script to search pin code -->
      <script type="text/javascript">
function find_pincode_c(pin){
                  if(pin.length==6){
                      $.ajax({
                      url  : '<?php echo URLROOT; ?>/student/check_pincode',
                      type : 'POST',
                      data : {pin},

                      success : function(res)
                      {
                          var detail = res.split(',');
                          document.getElementById("comm_block").value = detail[0];
                          document.getElementById("comm_state").value = detail[1];
                          var area_detail = detail[2].split('*');

                          if(detail[3] == "0"){
                              document.getElementById("from_nonpincode").innerHTML = "Non Serviceable Pincode";
                          }else {
                              document.getElementById("from_nonpincode").innerHTML = "";
                          }


                          document.getElementById("comm_village").innerHTML = "";
                          for (const area_val of area_detail) { 
                              document.getElementById("comm_village").innerHTML += "<option value='"+area_val+"'>"+area_val+"</option>";
                          }

                      }

                  });
                  }else {
                      document.getElementById("comm_block").value = "";
                          document.getElementById("comm_state").value = "";
                  }
              }

</script>

<script type="text/javascript">
              
              function find_pincode(pin){
                  if(pin.length==6){
                      $.ajax({
                      url  : '<?php echo URLROOT; ?>/student/check_pincode',
                      type : 'POST',
                      data : {pin},

                      success : function(res)
                      {
                          var detail = res.split(',');
                          document.getElementById("perm_block").value = detail[0];
                          document.getElementById("perm_state").value = detail[1];
                          var area_detail = detail[2].split('*');

                          if(detail[3] == "0"){
                              document.getElementById("from_nonpincode").innerHTML = "Non Serviceable Pincode";
                          }else {
                              document.getElementById("from_nonpincode").innerHTML = "";
                          }


                          document.getElementById("perm_village").innerHTML = "";
                          for (const area_val of area_detail) { 
                              document.getElementById("perm_village").innerHTML += "<option value='"+area_val+"'>"+area_val+"</option>";
                          }

                      }

                  });
                  }else {
                      document.getElementById("perm_block").value = "";
                          document.getElementById("perm_state").value = "";
                  }
              }

</script>