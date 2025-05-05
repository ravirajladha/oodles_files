<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Subject</div>
							</div>
							<!-- <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">School</a>&nbsp;<i class="fa fa-angle-right"></i>
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
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
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
								<form method="post" action="<?php echo URLROOT; ?>/admin/update_subject/<?php echo $data['get_school_class']->id?>" enctype="multipart/form-data">
								<div class="card-body row">
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Update Class</label><br>
											<input class="mdl-textfield__input" type="text"  name="class_name" placeholder="<?php echo $data['get_school_class']->class_name?>" value="<?php echo $data['get_school_class']->class_name?>">
											
										</div>
									</div>
									
								
							
								
								
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
										<!-- <button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button> -->
									</div>
									
								</div>
</form>
							</div>
						</div>
					</div>

					<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Class List</header>
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
														<th></th>
														<th> Id</th>
														<th> Class  </th>
														<th> Created At </th>
													
														<!-- <th>DOB</th> -->
														<th> Action </th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_all_school_class'] as $class) { ?>
														<tr class="odd gradeX">

															<td class="patient-img">
																<i class="fa fa-graduation-cap"></i>
															</td>



															<td class="left"><?php echo $class->id ?></td>
															
															<td class="left"><?php echo $class->class_name?></td>
															<td><a href="#">
																	<?php echo $class->created_at?> </a></td>


															<td>
																<a href="<?php echo URLROOT?>/admin/edit_school_class/<?php echo $class->id ?>" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<!-- <a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a> -->
															</td>
														</tr>
													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>


				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 