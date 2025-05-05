<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php $adminMod = New admins; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Update Criteria</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
				<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Update Criteria</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Criteria</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul>
					</div>


					<form method="post" action="<?php echo URLROOT; ?>/admin/update_criteria/<?php echo $data['get_single_criteria']->id ?>" enctype="multipart/form-data">
						<div class="card-body row">

							<!-- <div class="col-lg-4 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<select name="category_name" class="form-control">

										<option value="4">All Scholarship</option>
										<option value="1">Government Scholarship</option>
										<option value="2">Private Scholarship</option>
										<option value="3">OodlesIn Scholarship</option>


									</select>
								</div>
							</div> -->
							<div class="col-lg-4 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtTimeLength" value="<?php echo $data['get_single_criteria']->criteria_name; ?>" name="criteria_name" required>
									<label class="mdl-textfield__label" name="db">Criteria Name</label>

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Select Class</label>
									<div class="input-group">
										<select class="form-control" id="class" name="class" required>
											<option readonly>--Select--</option>
											<?php foreach ($data['get_all_class'] as $class) { ?>
												<option value="<?php echo $class->id; ?>" <?php if($class->id == $data['get_single_criteria']->class){ echo "selected" ;} ?>><?php echo $class->class_name; ?></option>
											<?php   } ?>

										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-12 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">

									<label for="list2" class="mdl-textfield__label">Criteria Level</label>

									<select name="criteria_type" class="form-control" id="dbType">
										<option value="1" <?php if($data['get_single_criteria']->criteria_type == 1){ echo "selected" ;} ?>>Yes/No</option>
										<option value="2" <?php if($data['get_single_criteria']->criteria_type == 2){ echo "selected" ;} ?>>Date Based</option>
										<option value="3" <?php if($data['get_single_criteria']->criteria_type == 3){ echo "selected" ;} ?>>Range Based</option>
									</select>
								</div>
							</div>



							<!-- <div class="col-lg-12 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"> -->
							<fieldset id="yes_no_based">
								<input type="radio" id="affirmative" name="yes_no_based" value="1" checked>
								<label for="affirmative">Yes</label><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<input type="radio" id="not_affirmative" name="yes_no_based" value="0">
								<label for="affirmative_not">No</label>
							</fieldset>

							<!-- </div> -->

							<div id="date_based_start" style="display:none;" class="col-lg-3 p-t-20">
								<label for="start_date">Provide Start Date: </label>
								<input type="date" name="start_date" class="form-control" placeholder="Provide Start Date" />
							</div>
							<div id="date_based_end" style="display:none;" class="col-lg-3 p-t-20">
								<label for="end_date">Provide End Date: </label>
								<input type="date" name="end_date" class="form-control" placeholder="Provide End Date " />
								<!-- </div> -->
							</div>
							<div id="range_based_start" style="display:none;" class="col-lg-3 p-t-20">
								<label for="range_based_start">Starting Range: </label>
								<input type="number" name="start_range" class="form-control" placeholder="Provide Starting Range" />

							</div>
							<div id="range_based_end" style="display:none;" class="col-lg-3 p-t-20">
								<label for="range_based_end">Ending Range: </label>
								<input type="number" name="end_range" class="form-control" placeholder="Provide Ending Range" />
							</div>


							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
								<a href="<?php echo URLROOT; ?>/admin/add_criteria"><button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-dark">View All Criteria</button></a>
							</div>

						</div>
					</form>

				</div>
				<script>
					$('#dbType').on('change', function() {
						if ($(this).val() === "1") {
							$("#yes_no_based").show()
							$("#date_based_start").hide()
							$("#date_based_end").hide()
							$("#range_based_start").hide()
							$("#range_based_end").hide()
						} else if ($(this).val() === "2") {

							$("#date_based_start").show()
							$("#date_based_end").show()
							$("#yes_no_based").hide()
							$("#range_based_start").hide()
							$("#range_based_end").hide()
						} else if ($(this).val() === "3") {
							$("#range_based_start").show()
							$("#range_based_end").show()
							$("#yes_no_based").hide()
							$("#date_based_start").hide()
							$("#date_based_end").hide()
						} else {
							$("#yes_no_based").show()
							$("#date_based_start").hide()
							$("#date_based_end").hide()
							$("#range_based_start").hide()
							$("#range_based_end").hide()
						}
					});
				</script>
				<!-- display of all criterias start
 -->
				<!-- <div class="row">
					<div class="col-md-12">
						<div class="tabbable-line">
							<ul class="nav customtab nav-tabs" role="tablist">
								<!- - <li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">List
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
											View</a></li> - ->
							</ul>
							<div class="tab-content">
								<div class="tab-pane active fontawesome-demo" id="tab1">
									<div class="row">
										<div class="col-md-12">
											<div class="card card-box">
												<div class="card-head">
													<header>All criterias List</header>
													<div class="tools">
														<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
														<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
														<!- - <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> - ->
													</div>
												</div>
												<div class="card-body collapse">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6">

														</div>
													</div>
													<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
														<thead>
															<tr>

																<th> Id </th>
																<!- - <th> Category Name </th> - ->
																<th> Criterna Name </th>
																<th> Criteria Type </th>
																<th> Class </th>
																<th> Edit </th>

															</tr>
														</thead>

														<tbody>
															<?php foreach ($data['get_all_criteria'] as $criteria) { ?>
																<tr class="odd gradeX">
																	<!- - <td class="patient-img">
																		<img src="<?php echo URLROOT; ?>/uploads/<?php echo $criteria->image ?>" alt="No data">

																		
																	</td> - ->
																	<td class="left"><?php echo $criteria->id ?></td>


<!- - 
																	<?php if ($criteria->category_id == 1) { ?>
																		<td>Government Scholarship</td>
																	<?php } elseif ($criteria->category_id == 2) { ?>
																		<td>Private Scholarship</td>
																	<?php } elseif ($criteria->category_id == 3) { ?>
																		<td>OodlesIn Scholarship</td>
																	<?php } elseif ($criteria->category_id == 4) { ?>
																		<td>OodlesIn Scholarship</td>

																	<?php } else { ?>
																		<td>Scholarship Not Selected</td>
																	<?php } ?> - ->

																	<td> <?php echo $criteria->criteria_name ?> </td>



																	<?php if ($criteria->criteria_type == 1) { ?>
																		<td>Yes/No</td>
																	<?php } elseif ($criteria->criteria_type == 2) { ?>
																		<td>Date Based</td>
																	<?php } elseif ($criteria->criteria_type == 3) { ?>
																		<td>Range Based</td>
																	<?php } else { ?>
																		<td>Criteria Type Not Selected</td>

																	<?php } ?>
																	<td> <?php 
																	
																	$get_class_detail = $adminMod->get_class_detail_single($criteria->class);
																	echo $get_class_detail->class_name; ?> </td>
																	<td>
																		<a href="#" class="tblEditBtn">
																					<i class="fa fa-pencil"></i>
																				</a>
																				<a class="tblDelBtn">
																					<i class="fa fa-trash-o"></i>
																				</a>
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
				</div> -->



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
	(function($) {
		$(function() {

			var addFormGroup = function(event) {
				event.preventDefault();

				var $formGroup = $(this).closest('.form-group');
				var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
				var $formGroupClone = $formGroup.clone();

				$(this)
					.toggleClass('btn-default btn-add btn-danger btn-remove')
					.html('–');

				$formGroupClone.find('input').val('');
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

			var countFormGroup = function($form) {
				return $form.find('.form-group').length;
			};

			$(document).on('click', '.btn-add', addFormGroup);
			$(document).on('click', '.btn-remove', removeFormGroup);

		});
	})(jQuery);
</script>