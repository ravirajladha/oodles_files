<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!--select2-->
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

<?php

$get_all_subadmin = $data['get_all_subadmin'];
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Subadmin</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Settings</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Subadmin</li>
				</ol>
			</div>
		</div>
		<form action="<?php echo URLROOT; ?>/admin/create_subadmin" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class=" col-sm-12">




					<div class="card-box">
						<div class="card-head">
							<header>Login Creation For Subadmin</header>

						</div>
						<div class="card-body row">

							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Name<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="text" name="auth_name" placeholder="Enter Name" required>
								</div>
							</div>




							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Email ID<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="email" id="txtPwd" name="auth_email" placeholder="Enter Email ID" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Enter Password<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="password" id="txtPwd" name="password" placeholder="Confirm Password" required>
								</div>
							</div>

							<div class="col-md-4 col-sm-9">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Contact Number<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="number" id="auth_contact_number" name="auth_contact_number" placeholder="Enter Contact Number" required oninput="numberOnly(this.id);" maxlength="10">
								</div>
							</div>

							<div class="col-md-4 col-sm-4">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Category<span>*</span></label><br>
									<select class="form-control mdl-textfield__input" name="type" placeholder="Enter First Contact Person Name" required>
										<option readonly>--Select--</option>
										<option value="1">Quiz</option>
										<option value="2">Scholarship</option>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-4">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Choose Photo<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="image" accept=".jpg, .jpeg, .png" required>
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


				</div>

			</div>
		</form>


		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					<ul class="nav customtab nav-tabs" role="tablist">
						<!-- <li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">List
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
											View</a></li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Subadmin List</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<!-- <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> -->
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">

												</div>
											</div>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
														<th></th>
														<th> Id </th>
														<!-- <th> Category Name </th> -->

														<th> Type </th>
														<th> Name</th>
														<th> Email </th>
														<th> Created At </th>

														<th> Status </th>
														<th> Edit </th>

													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_all_subadmin'] as $subadmin) { ?>
														<tr class="odd gradeX">
															<td class="patient-img">
																<img src="<?php echo URLROOT; ?>/uploads/<?php echo $subadmin->image ?>" alt="No data">


															</td>
															<td class="left"><?php echo $subadmin->id ?></td>



															<?php if ($subadmin->type == 'subadmin_quiz') { ?>
																<td>Quiz</td>
															<?php } elseif ($subadmin->type == 'subadmin_scholarship') {  ?>
																<td>Scholarship</td>
															<?php } ?>

															<td> <?php echo $subadmin->name ?> </td>
															<td> <?php echo $subadmin->email ?> </td>
															<td> <?php echo $subadmin->created_at ?> </td>






															<?php if ($subadmin->status == 0) { ?>

																<td><a href="<?php echo URLROOT; ?>/admin/update_subadmin_status/<?php echo $subadmin->id ?>/1"><button type="button" class="btn btn-warning">Active</button></a></td>

															<?php } else { ?>
																<td><a href="<?php echo URLROOT; ?>/admin/update_subadmin_status/<?php echo $subadmin->id ?>/0"><button type="button" class="btn btn-warning">Inactive</button></a></td>
															<?php } ?>

															<td>
																<a href="<?php echo URLROOT; ?>/admin/edit_subadmin/<?php echo $subadmin->id ?>" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<!-- <a class="tblDelBtn">
																					<i class="fa fa-trash-o"></i>
																				</a> -->
															</td>
														<?php } ?>


														</tr>


												</tbody>
											</table>
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