<?php require APPROOT . '/views/inc_corporate/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
$get_all_scholarship = $data['get_all_scholarship'];
$get_all_promotion = $data['get_all_promotion'];

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Add Promotions</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Criteria</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Promotions</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
			

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
																<th>  Name </th>
																<th>  URL </th>
																<th>  File </th>
																<th>  Start Date </th>
																<th>  End Date </th>
																<th>  Status </th>
															

															</tr>
														</thead>

														<tbody>
															<?php foreach ($data['get_all_promotion'] as $promotion) { ?>
																<tr class="odd gradeX">
																	<td class="left"><?php echo $promotion->id ?></td>

																	<td> <?php echo $promotion->name; ?> </td>
																	<td> <a href="<?php echo $promotion->url; ?>" target="_blank"><i class="fa fa-link"></i> </td>
																	<td> <a href="<?php echo URLROOT?>/uploads/<?php echo $promotion->file; ?>" target="_blank"><i class="fa fa-image"></i> </td>
																	<td> <?php echo $promotion->start_date; ?> </td>
																	<td> <?php echo $promotion->end_date; ?> </td>
																	<td> 
																		<?php if($promotion->status==1){ ?>
																			<button type="button" class="btn btn-warning">Disable</button>
																	<?php 	}else{ ?>
																	<button type="button" class="btn btn-primary">Active</button>
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
<?php require APPROOT . '/views/inc_corporate/footer.php'; ?>
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