<?php require APPROOT . '/views/inc_teacher/header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Score List</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="guardian-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="guardian-item" href="">Quiz Score</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Quiz Score List</li>
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
											<header>All Quiz Score List</header>
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
														<th> User ID </th>
														<th> Score</th>
														<th> Date</th>
														<th> Time</th>
														<!-- <th>DOB</th> -->
														<th> Action </th>
													</tr>
												</thead>

												<tbody>
													<?php foreach($data['get_quiz_score'] as $quiz_score) { ?>
														<tr class="odd gradeX">

															<!-- <td class="patient-img">
															<img src="<?php echo URLROOT?>/uploads/<?php echo $webinar->image?>" alt="">
															</td> -->
															<td class="left"><?php echo $quiz_score->id ?></td>
															<td class="left"><?php echo $quiz_score->user_id ?></td>
														
															<td class="left"><?php echo $quiz_score->score ?></td>
														
															<td class="left"><?php echo date('Y-m-d', strtotime( $quiz_score->created_by  ) ) ?></td>
															
															<td class="left"><?php echo date('h:i a', strtotime( $quiz_score->created_by  ) ) ?></td>
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
<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>