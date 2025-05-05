<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
$get_all_scholarship = $data['get_all_scholarship'];
$get_all_promotion = $data['get_all_promotion'];
$admin_model = new admins;

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Add Scholarship Promotions</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Criteria</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Scholarship Promotions</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Scholarship Promotions</header>
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


					<form method="post" action="<?php echo URLROOT; ?>/admin/create_scholarship_promo" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtTimeLength" name="name" required>
									<label class="mdl-textfield__label" name="db">Promotion Name</label>

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtTimeLength" name="url" required>
									<label class="mdl-textfield__label" name="db">Promotion URL</label>

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<label>Upload File</label>
								<div class="input-group">
									<input class="mdl-textfield__input" type="file" id="txtTimeLength" name="file" required>
									<!-- <label class="mdl-textfield__label" name="db">Upload File</label> -->

								</div>
							</div>


							<div class="col-lg-6 p-t-20">
								<label>Select Scholarship</label>
								<div class="input-group">

									<select name="scholarship_id" class="form-control" required>
										<option value="" readonly>--Select--</option>
										<?php foreach ($get_all_scholarship as $all_scholarship) { ?>
											<option value="<?php echo $all_scholarship->id; ?>"><?php echo $all_scholarship->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6 p-t-20">
								<label>Start Date</label>
								<div class="input-group">
									<input class="mdl-textfield__input" type="date" id="txtTimeLength" name="start_date" required>
									<label class="mdl-textfield__label" name="db">Start Date</label>

								</div>
							</div>

							<div class="col-lg-6 p-t-20">
								<label>End Date</label>
								<div class="input-group">
									<input class="mdl-textfield__input" type="date" id="txtTimeLength" name="end_date" required>
									<label class="mdl-textfield__label" name="db">End Date</label>

								</div>
							</div>



							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
							</div>


						</div>
					</form>
				</div>

				<!-- display of all dcouments start
 -->
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
													<header>All Promotions List</header>
													<div class="tools">
														<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
														<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
														<!-- <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> -->
													</div>
												</div>
												<div class="card-body collapser">
													<div class="row">
														<div class="col-md-6 col-sm-6 col-6">

														</div>
													</div>
													<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
														<thead>
															<tr>

																<th> Id </th>
																<th> Name </th>
																<th> URL </th>
																<th> File </th>
																<th> Corporate </th>
																<th> Start Date </th>
																<th> End Date </th>
																<th> Status </th>


															</tr>
														</thead>

														<tbody>
															<?php foreach ($data['get_all_promotion'] as $promotion) { ?>
																<tr class="odd gradeX">
																	<td class="left"><?php echo $promotion->id ?></td>

																	<td> <?php echo $promotion->name; ?> </td>
																	<td> <a href="<?php echo $promotion->url; ?>" target="_blank"><i class="fa fa-link"></i> </td>
																	<td> <a href="<?php echo URLROOT ?>/uploads/<?php echo $promotion->file; ?>" target="_blank"><i class="fa fa-image"></i> </td>
																	<?php
																	$get_corporate = $admin_model->get_corporate_by_scholarship($promotion->scholarship_id);
																	?>

																	<td> <?php echo $get_corporate->name; ?> </td>
																	<td> <?php echo $promotion->start_date; ?> </td>
																	<td> <?php echo $promotion->end_date; ?> </td>
																	<td>
																		<?php if ($promotion->status == 1) { ?>
																			<a href="<?php echo URLROOT ?>/admin/update_scholarship_promotion_status/<?php echo $promotion->id; ?>/0"><button type="button" class="btn btn-warning">Disable</button></a>
																		<?php 	} else { ?>
																			<a href="<?php echo URLROOT ?>/admin/update_scholarship_promotion_status/<?php echo $promotion->id; ?>/1"><button type="button" class="btn btn-primary">Active</button></a>
																		<?php } ?>
																	</td>




																<?php } ?>
																<!-- <a href="#" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a> -->
																</td>
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