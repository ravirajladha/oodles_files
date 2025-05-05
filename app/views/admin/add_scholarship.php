<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<?php
$get_all_class = $data['get_all_class'];
$get_all_subadmin_scholarship = $data['get_all_subadmin_scholarship'];

?>
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Add Scholarship</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Scholarship</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Scholarship Details</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>

					</div>


					<form method="post" action="<?php echo URLROOT; ?>/admin/create_scholarship" enctype="multipart/form-data" autocomplete="OFF">

						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Scholarship Name<span>*</span></label>
									<br>
									<input class="form-control mdl-textfield__input" placeholder="Enter name" type="text" id="txtTimeLength" name="name">
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Class<span>*</span></label>
									<br>
									<select name="course[]"  multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
									<!-- <option value="" readonly>Select Class</option> -->
										<?php foreach ($get_all_class as $class) { ?>
											<option value="<?php echo $class->id; ?>"><?php echo $class->class_name; ?></option>
										<?php } ?>
									</select>

									
								</div>
							</div>

						

							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Add Image <span>*</span></label>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="scholarship_image" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>State <span>*</span></label>
									<select name="state" class="form-control mdl-textfield__input" required>
										<option value="">Select State</option>
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
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Application Start Date<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="date" min='<?php echo date('Y-m-d'); ?>' id="start_date" name="start_date">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Application End Date<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="date" min='<?php echo date('Y-m-d'); ?>' id="end_date" name="end_date">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Number of scholarships<span>*</span></label>
									<input class="form-control mdl-textfield__input" placeholder="Enter number" type="text" id="txtTimeLength" name="no_of_scholarships">

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Individual Participation Fee <span>*</span></label>
									<input class="form-control mdl-textfield__input" type="number" id="text5" name="student_charge" placeholder="Enter Student Participation Fee " required>

								</div>
							</div>

							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Type of Scholarship <span>*</span></label>
									<select name="type" class="form-control mdl-textfield__input" required>
										<option value="">Select Type</option>
										<?php foreach ($data['get_scholarship_type'] as $scholarship_type) { ?>
											<option value="<?php echo $scholarship_type->id ?>"><?php echo $scholarship_type->scholarship_type ?></option>
										<?php } ?>


									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Eligibile Candidates</label>
									<select name="eligible_candidates" class="form-control mdl-textfield__input">
										<option value="0">All candidates</option>
										<option value="1">Girl candidates only</option>
										<option value="2">Boy candidates only</option>


									</select>

								</div>
							</div>
						
							
							<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Scholarship Amount <span>*</span></label>
								<input class="form-control mdl-textfield__input" type="number" id="text5" name="scholarship_amount" placeholder="Enter Amount" required>

							</div>
						</div>
							<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Offered By<span>*</span></label>
								<select name="offered_by" class="form-control" required>
										<option value="" readonly>-Select-</option>
										<?php foreach ($data['get_all_corporate'] as $corporate) { ?>
											<option value="<?php echo $corporate->corporate_id ?>"><?php echo $corporate->name ?></option>
										<?php  } ?>
									</select>

							</div>
						</div>
						<?php if ($_SESSION['rexkod_oodles_login_type'] == 'admin')  { ?>
							<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Subadmin(Prototype)<span>*</span></label>
								<select name="subadmin" class="form-control" required>
<?php foreach($get_all_subadmin_scholarship as $all_subadmin){ ?>

										<option value=<?php echo $all_subadmin->id; ?>><?php echo $all_subadmin->name; ?></option>
									<?php } ?>
									</select>

							</div>
						</div>
<?php }elseif($_SESSION['rexkod_oodles_login_type'] == 'subadmin_scholarship'){ ?>
<input type="hidden" name="subadmin" value="<?php echo $_SESSION['rexkod_oodles_admin_id']; ?>">
	<?php } ?>

						</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Contact Details</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>

					</div>


					

						<div class="card-body row">
							<!-- BANK DETAILS -->
							
						
							
						
						
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Official Website</label>
									<input class="form-control mdl-textfield__input" type="text" placeholder="Enter offical website" id="text5" name="url">
									<label class="mdl-textfield__label" for="text5">

								</div>
							</div>
						




							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Contact number<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="number" placeholder="Enter contact number" id="text5" name="contact_number">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>URL for detailed eligibility<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" id="text5" placeholder="Enter URL" name="detailed_eligibility_url">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Query related Email Id<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" id="text5" placeholder="Enter Email (for assistance)" name="email_id">
									<label class="mdl-textfield__label" for="text5">
								</div>
							</div>
							<div class="col-md-9 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Provide URL link to directly apply<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" id="text5" placeholder="Enter direct link to apply" name="direct_link_to_apply">
								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Enable/Disable<span>*</span></label><br>
									<input type="checkbox" name="website_check" value="1" checked>
								</div>
							</div>
						
							


						</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Display Purpose</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>

					</div>
						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Class Display</label>
									<input class="form-control mdl-textfield__input" type="text" placeholder="Enter selected class to be displayed" id="text5" name="class_display">
									<label class="mdl-textfield__label" for="text5">

								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Provide Detailed Information</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>

					</div>
					<div class="card-body row">
						<!-- BANK DETAILS -->

					
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Description<span>*</span></label><br>
								<textarea rows="4" id="oodles_editor1" cols="200" style="max-width:100%;" name="description"></textarea>

							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Eligibility<span>*</span></label><br>
								<textarea rows="4" id="oodles_editor2" cols="200" style="max-width:100%;" name="minimum_eligibility"></textarea>

							</div>
						</div>



						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>How to apply?<span>*</span></label><br>
								<textarea rows="4" cols="200" id="oodles_editor3" name="application_process" style="max-width:100%;"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Reservation<span>*</span></label><br>
								<textarea rows="4" cols="200" id="oodles_editor4" name="reservation" style="max-width:100%;"></textarea>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Instructions<span>*</span></label><br>
								<textarea rows="4" cols="200" id="oodles_editor5" name="instructions" style="max-width:100%;"></textarea>
							</div>
						</div>
<!-- 
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="exampleInputname1">Documents required for Scholarship</label>
								<select name="documents_required[]" multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
									<?php foreach ($data['get_all_document'] as $document) { ?>
										<option value="<?php echo $document->id; ?>"><?php echo $document->name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="exampleInputname1">Select Criteria</label>
								<select name="checkbox[]" multiple class="form-control mdl-textfield__input select2" style="height:200px !important" required>
									<?php foreach ($data['get_all_criteria'] as $criteria) { ?>
										<option value="<?php echo $criteria->id; ?>"><?php echo $criteria->criteria_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div> -->

					</div>



					<div class="card-body row">




						<div class="col-lg-12 p-t-20 text-center">
							<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
						</div>

					</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if (isset($_SESSION['success'])) { ?>
	<script type="text/javascript">
		swal("<?php echo $_SESSION['success']; ?>");
	</script>
<?php }
unset($_SESSION['success']); ?>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>


<script>
	$(".checkbox").click(function() {
		if ($(".checkbox").is(':checked')) {
			$(this).parent().find('option').prop("selected", "selected");
			$(this).parent().find('option').trigger("change");
			$(this).parent().find('option').click();

		} else {
			$(this).parent().find('option').removeAttr("selected", "selected");
			$(this).parent().find('option').trigger("change");
		}
	});

	$("#button").click(function() {
		alert($("select").val());
	});

	$(document).ready(function() {
		$('.select2').select2({
			closeOnSelect: false,
			allowClear: false
		});
	});
</script>

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
<!-- --- -->
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

<script src="<?php echo URLROOT ?>/assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/select2/select2-init.js"></script>