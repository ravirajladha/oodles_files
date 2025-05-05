<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Edit Document</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Document</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Document</header>
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


					<form method="post" action="<?php echo URLROOT; ?>/admin/update_document/<?php echo $data['get_single_document']->id ?>" enctype="multipart/form-data">
						<div class="card-body row">

							<!-- <div class="col-lg-4 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								<label class="mdl-textfield__label" name="db">Type</label>

<br>
									<select name="category_name" class="form-control" required>

										<option value="4">All Scholarship</option>
										<option value="1">Government Scholarship</option>
										<option value="2">Private Scholarship</option>
										<option value="3">OodlesIn Scholarship</option>


									</select>
								</div>
							</div> -->
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								<label class="mdl-textfield__label" name="db">Document Name</label>

								<!-- <br> -->
									<input class="mdl-textfield__input" type="text" value="<?php echo $data['get_single_document']->name; ?>" id="txtTimeLength" name="name" required>

								</div>
							</div>
							<div class="col-lg-6  p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								<label class="mdl-textfield__label" name="db">Add Expiry Date</label>
<!-- <br> -->
									<input class="mdl-textfield__input" type="date" value="<?php echo $data['get_single_document']->expiry_date; ?>" id="txtTimeLength" name="expiry_date" required>

								</div>
							</div>
						
							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>

								<a href="<?php echo URLROOT; ?>/admin/add_document">	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-dark">View all</button></a>

							</div>


						</div>
					</form>
				</div>

				<!-- display of all dcouments start
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
													<header>All Documents List</header>
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
																<!- - <th> Document Name </th> - ->
																<th> Document Name </th>
																<th> Expiry Date </th>
																<th> Status </th>
																<th> Edit </th>

															</tr>
														</thead>

														<tbody>
															<?php foreach ($data['get_all_document'] as $document) { ?>
																<tr class="odd gradeX">
																	<td class="left"><?php echo $document->id ?></td>
																	<!- - <?php if ($document->category_id == 1) { ?>
																		<td>Government Scholarship</td>
																	<?php } elseif ($document->category_id == 2) { ?>
																		<td>Private Scholarship</td>
																	<?php } elseif ($document->category_id == 3) { ?>
																		<td>OodlesIn Scholarship</td>
																	<?php } elseif ($document->category_id == 4) { ?>
																		<td>OodlesIn Scholarship</td>

																	<?php } else { ?>
																		<td>Scholarship Not Selected</td>
																	<?php } ?> - ->

																	<td> <?php echo $document->name ?> </td>
																	<td> <?php echo  $document->expiry_date ?> </td>


																	<?php if ($document->status == 0) {?>
																		
																		<td><a href="<?php echo URLROOT; ?>/admin/update_document_status/<?php echo $document->id ?>/1">Active</a></td>
																	
																	<?php } else{?>
																		<td><a href="<?php echo URLROOT; ?>/admin/update_document_status/<?php echo $document->id ?>/0">Inactive</a></td>
																	<?php }?>

																	<td>
																		<a href="<?php echo URLROOT; ?>/admin/edit_document/<?php echo $document->id ?>" class="tblEditBtn">
																					<i class="fa fa-pencil"></i>
																				</a>
																				
																	</td>

																<?php } ?>
																
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