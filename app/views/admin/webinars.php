<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Webinars List</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="guardian-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="guardian-item" href="">Webinars</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Webinars List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Webinars List</header>
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
														<th> Subject/Topic </th>
														<th> Date</th>
														<th> Start Time</th>
														<!-- <th>DOB</th> -->
														<th> End Time </th>
														<th> Action </th>
													</tr>
												</thead>

												<tbody>
													<?php foreach($data['get_all_webinars'] as $webinar) { ?>
														<tr class="odd gradeX">

															<td class="patient-img">
															<img src="<?php echo URLROOT?>/uploads/<?php echo $webinar->image?>" alt="">
															</td>
															<td class="left"><?php echo $webinar->id ?></td>
															<td class="left"><?php echo $webinar->subject ?></td>
															<td class="left"><?php echo $webinar->webinar_date ?></td>
															<td class="left"><?php echo $webinar->start_time ?></td>
															<td class="left"><?php echo $webinar->end_time ?></td>
															<td>
																<a href="#" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a>
															</td>
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
																		<a href="edit_guardian.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr> -->
															
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
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>