<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
<?php 
$view_participants = $data['view_participants'];
$adminMod = New admins;

?>
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Participants List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/4/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Participants List</li>
							</ol>
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
														<header>All Participants List</header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
															<a class="t-collapse btn-color fa fa-chevron-down"
																href="javascript:;"></a>
															<!-- <a class="t-close btn-color fa fa-times"
																href="javascript:;"></a> -->
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
															<div class="col-md-6 col-sm-6 col-6">
															
															</div>
														</div>
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																
																	<th> Sl No. </th>
																	<th> Student Name </th>
																	<th> Registered At </th>
															
																
																</tr>
															</thead>
														
															<tbody>
															<?php 
															$count = 0;
															foreach ($view_participants as $user){
																$count++; ?>
																<tr class="odd gradeX">
																

																		
																
																	<td class="left"><?php echo $count ?></td>
																	<td class="left"><?php 
																	$get_auth_detail = $adminMod->get_auth_detail($user->student_id);
																	echo $get_auth_detail->name ?></td>
																	<td class="left"><?php echo $user->created_at ?></td>
																
														
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
			<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 