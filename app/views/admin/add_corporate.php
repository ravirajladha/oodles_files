<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!--select2-->
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Corporate</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Corporate</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Corporate Information</header>
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

					<form method="post" action="<?php echo URLROOT; ?>/admin/add_corporate_elements" enctype="multipart/form-data" autocomplete="OFF">

						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Type of Entity<span>*</span></label>
									<br>
									<select name="entity_type" class="form-control">
										<option value="">-Select Type-</option>
										<option value="1">Education Fund Provider</option>
										<option value="2">Individual</option>
									</select>
								</div>
							</div>


							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Name</label>
									<input type="text" id="name" name="name" class="form-control mdl-textfield__input" placeholder="Enter Name" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Description</label>
									<input type="text" id="description" name="description" class="form-control mdl-textfield__input" placeholder="Enter Description">

								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Type of Organization<span>*</span></label>
									<br>
									<select name="organization" class="form-control">
										<option value="">-Select Type-</option>
										<option value="1">Artificial Juridical Person</option>
										<option value="2">Associate of Persons</option>
										<option value="3">Body of Individuals</option>
										<option value="4">Government Organization</option>
										<option value="5">Hindu Undivided Family</option>
										<option value="6">Institute</option>
										<option value="7">LLP</option>
										<option value="8">Local Authority</option>
										<option value="9">Partnership Firm</option>
										<option value="10">Private Limited Company</option>
										<option value="11">Propreitor</option>
										<option value="12">Public Limited Company</option>
										<option value="13">Trust</option>
										<option value="14">Others</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Trust Type</label>
									<input type="text" id="bank_name" name="trust_type" class="form-control mdl-textfield__input" placeholder="Enter Trust Type">

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Trust Name</label>
									<input type="text" id="ba_name" name="trust_name" class="form-control mdl-textfield__input" placeholder="Enter Trust Name">

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Choose Photo<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="image">

								</div>
							</div>



							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Address Line 1<span>*</span></label><br>
									<input type="text" id="branch_address" name="address_1" class=" form-control mdl-textfield__input" placeholder="Enter Address Line 1">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Address Line 2<span>*</span></label><br>
									<input type="text" id="branch_address" name="address_2" class=" form-control mdl-textfield__input" placeholder="Enter Address Line 2">
								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Pin Code<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="pincode" placeholder="Enter Pin Code">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>City<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="city" placeholder="Enter City">

								</div>
							</div>

							<div class="col-md-3 col-sm-6">
								<!-- text input -->
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">State<span>*</span></label>
									<br>



									<select name="state" class="form-control">
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
							<div class="col-md-4 col-sm-4">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Website Link<span>*</span></label>&nbsp;<input type="checkbox" id="vehicle1" name="website_check" value="1" checked><br>
									<input class="form-control mdl-textfield__input" type="text" name="url" placeholder="Enter Website Link">
								</div>
							</div>
						</div>
				</div>


				<div class="card-box">
					<div class="card-head">
						<header>Corporate Information</header>

					</div>
					<div class="card-body row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label> Upload MOU<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="mou">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label> Upload NDA<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="nda">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Declaration Form<span>*</span></label><br />
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="declaration_form">
							</div>
						</div>


						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Other Documents<span>*</span></label><br />
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

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_name" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_designation" placeholder="Enter Designation">
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Aadhar Number<span>*</span> </label><br>
								<input class="form-control mdl-textfield__input" type="number" id="auth_aadhar_no" name="auth_aadhar_no" placeholder="Enter Aadhar Number" oninput="numberOnly(this.id);" maxlength="12">
							</div>
						</div>

						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Email ID<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="email" id="txtPwd" name="auth_email" placeholder="Enter Email ID" required>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Enter Password<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="password" id="txtPwd" name="password" placeholder="Confirm Password" required>
							</div>
						</div>

						<div class="col-md-9 col-sm-9">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" id="auth_contact_number" name="auth_contact_number" placeholder="Enter Contact Number" required oninput="numberOnly(this.id);" maxlength="10">
							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>First Contact Person(Name)<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="auth_contact_person" placeholder="Enter First Contact Person Name">


							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Designation<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_designation" placeholder="Enter Contact Person Designation">
							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Contact Person Details<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="contact_person_details" placeholder="Contact Person Details">
							</div>
						</div>

					</div>
				</div>


				<div class="card-box">
					<div class="card-head">
						<header>Authorized Signatory Documents</header>

					</div>
					<div class="card-body row">

						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Aadhar Copy of Authorized Signatory<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="signatory_aadhar">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Image of Authorized Signatory <span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="auth_image">
							</div>
						</div>



					</div>
				</div>
				<div class="card-box">
					<div class="card-head">
						<header>Bank Details</header>

					</div>
					<div class="card-body row">


						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Bank Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="bank_name" placeholder="Enter Bank Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Branch Name<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="branch_name" placeholder="Enter Branch Name">
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>IFSC<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="text" name="ifsc" placeholder="Enter IFSC Code">
							</div>
						</div>


						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Account Number<span>*</span></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="account_no" id="account_no" placeholder="Enter Account Number">
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Re-Account Number<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="re_account_no" id="re_account_no" placeholder="Enter the Account Number to Verify">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Name of Institute as per Bank Records<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="number" name="corporate_name_as_per_bank" id="" placeholder="Enter the Name of Institute as per Bank Records">
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Cancelled Cheque/ Bank statement<span>*</span><span id='message'></label><br>
								<input class="form-control mdl-textfield__input" type="file" name="cancelled_cheque" id="" placeholder="Enter the Upload Cancelled Cheque/ Bank Statement">
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
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
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
	// $('.myCheckbox').on('click',function(){

	// if ($('.myCheckbox').is(':checked'))
	// {
	//   $("div#tgl_div").show();
	//   $("div#tgl_div ").prop('disabled', false);

	// }
	// else {

	//    $("div#tgl_div").hide();
	//    $("div#tgl_div ").prop('disabled', true);
	// }
	// });
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
	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
</script>

<script>
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
	//     placeholder: "Select Multiple"
	// });
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<!--select2-->
<script src="<?php echo URLROOT ?>/assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/select2/select2-init.js"></script>