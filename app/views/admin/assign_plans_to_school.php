<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!--select2-->
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


<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Assign School Plan</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">School</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Assign School Plan</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Subscription Information</header>
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

					<form method="post" action="<?php echo URLROOT; ?>/admin/assign_subscription_plans_to_school" enctype="multipart/form-data" autocomplete="OFF">


						<div class="card-body row">
							<!-- BANK DETAILS -->

							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Name</label>
									<select class="form-control" name="plan">
										<option value="" readonly>--Select Plan--</option>
										<?php foreach ($data['get_school_plan'] as $plan) { ?>
											<option value="<?php echo $plan->id; ?>"><?php echo $plan->name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>School Name</label>
									<select class="form-control" name="school">
									<option value="" readonly>--Select School--</option>

										<?php foreach ($data['get_school_detail'] as $school) { ?>
											<option value="<?php echo $school->school_id; ?>"><?php echo $school->school_name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Start Date</label>
									<input type="date" id="start_date" name="start_date" class="form-control mdl-textfield__input" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>End Date</label>
									<input type="date" id="end_date" name="end_date" class="form-control mdl-textfield__input" required>
								</div>
							</div>
							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Amount Collected</label>
									<input type="number" id="offer_price" name="amount" class="form-control mdl-textfield__input" placeholder="Enter Amount to be collected from school" required>
								</div>
							</div>



							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Enable/Disable<span>*</span></label>
									<br>
									<select name="status" class="form-control" required>
										<option value="" disabled>-Select Status--</option>
										<option value="1">Enable</option>
										<option value="0">Disable</option>

									</select>
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
<br>
		<!-- table -->
		<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>All Premium Schools</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body ">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">

								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
								<thead>
									<tr>
										<!-- <th></th> -->
										<th> Id</th>
										<th>School Name </th>
										<th> Teacher Bal.</th>
										<th> Quiz Bal.</th>
										<th> Teacher Created</th>
										<th> Quiz Created</th>
										<th> Action </th>
									</tr>
								</thead>

								<tbody>
									<?php $count_wallet =0;
									foreach ($data['get_all_school_wallet'] as $school_wallet) { 
										$count_wallet++;?>
										
<?php 
$adminMod = New admins;
$get_school_detail_ind  = $adminMod->get_ind_school($school_wallet->school_id);


											?>
										<tr class="odd gradeX">
											<!-- <td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td> -->
											<td class="left"><?php echo $count_wallet ?></td>
										

											<td class="left"><?php echo $get_school_detail_ind->school_name ; ?></td>

											
										
										
										
											<td class="left"><?php echo $school_wallet->teacher_balance ?></td>
											<td class="left"><?php echo $school_wallet->quiz_balance ?></td>
											<td class="left"><?php echo $school_wallet->teacher_created ?></td>
											<td class="left"><?php echo $school_wallet->quiz_created ?></td>



											<td><?php if($school_wallet->status==0){?> <a href="<?php echo URLROOT; ?>/admin/update_school_wallet_status/<?php echo $school_wallet->school_id;?>/1"><button class="btn btn-secondary m-r-10" type="button">Approve</button></a> <?php }else{?> <a href="<?php echo URLROOT; ?>/admin/update_school_wallet_status/<?php echo $school_wallet->school_id;?>/0"><button class="btn btn-secondary m-r-10" type="button">Dis-Approve</button></a> <?php }?></td>
										</tr>
									<?php } ?>
									<!-- <tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user10.jpg" alt="">
																	</td>
																	<td class="left">5</td>
																	<td>Pooja Patel</td>
																	<td class="left">Science</td>
																	<td><a href="tel:444786876">
																			444786876 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			pooja@gmail.com </a></td>
																	<td class="left">27 Aug 2005</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																
															 -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- table -->
		<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>All Assigned Plans to School</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body ">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">

								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
								<thead>
									<tr>
										<!-- <th></th> -->
										<th> Id</th>
										<th>Plan Name </th>
										<th>School Name </th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Amount</th>
										<!-- <th> Teacher Bal.</th>
										<th> Quiz Bal.</th> -->
											
										<th> Status </th>
										<!-- <th> Action </th> -->

									</tr>
								</thead>

								<tbody>
									<?php 
									$count_of_school_subscription  = 0;
									foreach ($data['premium_school'] as $premium) { 
										$count_of_school_subscription++;?>
										
<?php 
$adminMod = New admins;
$get_school_detail_ind  = $adminMod->get_ind_school($premium->school);
$get_selected_school_plan = $adminMod->get_selected_school_plan($premium->plan);
$get_school_wallet = $adminMod->get_school_wallet($premium->school);
											?>
										<tr class="odd gradeX">
											<!-- <td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td> -->
											<td class="left"><?php echo $count_of_school_subscription ?></td>
											<td class="left"><?php echo $get_selected_school_plan->name ?></td>

											<td class="left"><?php echo $get_school_detail_ind->school_name ; ?></td>

											
											<td class="left"><?php echo date("d/m/Y", strtotime( $premium->start_date )); ?></td>
											<td class="left"><?php echo date("d/m/Y", strtotime( $premium->end_date )); ?></td>
										
											<td class="left"><?php echo $premium->amount ?></td>
											<!-- <td class="left"><?php echo $get_school_wallet->teacher_balance ?></td>
											<td class="left"><?php echo $get_school_wallet->quiz_balance ?></td> -->


											<td class="left"><?php if ($premium->status == 1) {
																	echo "Active";
																} else {
																	echo "Inactive";
																} ?></td>

											<!-- <td> -->
												<!-- <a href="<?php echo URLROOT ?>/admin/update_assigned_plans_to_school/<?php echo $premium->id; ?>" class="tblEditBtn">
													<i class="fa fa-pencil"></i>
												</a> -->
												<!-- <a href="<?php echo URLROOT ?>/admin/delete_assigned_plans_to_school/<?php echo $premium->id; ?>" class="tblDelBtn">
													<i class="fa fa-trash-o"></i>
												</a> -->
											<!-- </td> -->
										</tr>
									<?php } ?>
									<!-- <tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user10.jpg" alt="">
																	</td>
																	<td class="left">5</td>
																	<td>Pooja Patel</td>
																	<td class="left">Science</td>
																	<td><a href="tel:444786876">
																			444786876 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			pooja@gmail.com </a></td>
																	<td class="left">27 Aug 2005</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																
															 -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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