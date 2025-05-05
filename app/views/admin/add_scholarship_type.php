<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php
$get_all_scholarship_type = $data['get_all_scholarship_type'];

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Scholarship Type</div>
				</div>
				<!-- <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Class</li>
							</ol> -->
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<!-- <header>Basic Information</header> -->
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<!-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->
					</div>
					<form method="post" action="<?php echo URLROOT; ?>/admin/create_scholarship_type" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Add Scholarship Type</label><br>
									<input class="mdl-textfield__input" type="text" name="scholarship_type">

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label> Select Image
										<input class="mdl-textfield__input" type="file" id="maxStu" name="scholarship_type_image" required style="width:500px;">


								</div>
							</div>
							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
								<!-- <button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button> -->
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>




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
											<header>All Scholarship Type </header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<!-- <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> -->
											</div>
										</div>
										<!-- <div class="card-body collapse"> -->
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">

												</div>
											</div>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>

														<th> Id </th>
														<!-- <th> Category Name </th> -->
														<th> Name </th>
														<th> Image </th>
														<th>Created At </th>
														<th>Created By</th>

														<th> Action </th>

														<th> Edit </th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($get_all_scholarship_type as $scholarship_type) { ?>
														<tr class="odd gradeX">
															<td class="left"><?php echo $scholarship_type->id ?></td>


															<td> <?php echo $scholarship_type->scholarship_type ?> </td>
															<td class="patient-img">
																<img src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship_type->scholarship_image ?>" alt="No data">
															</td>
															<td><?php echo $scholarship_type->created_at; ?></td>
															<td>Admin</td>
															<?php if ($scholarship_type->status == 0) {?>
																		
																		<td><a href="<?php echo URLROOT; ?>/admin/update_scholarship_type_status/<?php echo $scholarship_type->id ?>/1">	<button type="button"
												class="btn blue-bgcolor btn-outline m-b-10">Active</button></a></td>
																	
																	<?php } else{?>
																		<td><a href="<?php echo URLROOT; ?>/admin/update_scholarship_type_status/<?php echo $scholarship_type->id ?>/0">	<button type="button" class="btn deepPink btn-outline m-b-10">
																		Inactive</button> </a></td>
																	<?php }?>
																	<td>
															<a href="<?php echo URLROOT; ?>/admin/edit_scholarship_type/<?php echo $scholarship_type->id;?>" class="tblEditBtn">
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
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>