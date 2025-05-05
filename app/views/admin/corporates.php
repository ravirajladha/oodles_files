<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">All Corporate ash</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Corporate</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">All Corporate</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<ul class="nav customtab nav-tabs" role="tablist">
									<!-- <li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">List
											View</a></li> -->
									<!-- <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
											View</a></li> -->
								</ul>
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card">
													<div class="card-head">
														<header></header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
															<a class="t-collapse btn-color fa fa-chevron-down"
																href="javascript:;"></a>
															<a class="t-close btn-color fa fa-times"
																href="javascript:;"></a>
														</div>
													</div>
													<div class="card-body ">
														<div class="row">
														
														</div>
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th></th>
																	<th> Id</th>
																	<th> Name </th>
																	<th> Mobile </th>
																	<th> Email </th>
																	<th> Address </th>
																	<th> View </th>
																	<th> Status </th>
																	<th> Action </th>
																</tr>
															</thead>
															<tbody>
																<?php foreach($data['get_all_corporate'] as $corporate){ ?>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user1.jpg" alt="">
																	</td>
																	<td><?php echo $corporate->corporate_id?></td>
																	<td class="center"><?php echo $corporate->name?></td>
																	<td><a href="tel:4444565756">
																	<?php echo $corporate->auth_contact_number?> </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																	<?php echo $corporate->auth_email?> </a></td>
																	<td class="center"><?php echo $corporate->address_1?></td>
																	<td class="center"><a href="<?php echo URLROOT; ?>/admin/corporate/<?php echo $corporate->corporate_id; ?>" target="_blank"> View</td>
																	<td>Active or Inactive</td>
																	<td>
																		<a href="<?php echo URLROOT; ?>/admin/edit_corporate/<?php echo $corporate->corporate_id;?>" class="tblEditBtn">
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
									<div class="tab-pane" id="tab2">
										<div class="row">
											<div class="col-md-4">
												<div class="card">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user10.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Pooja Patel </div>
																<div class="name-center"> Dell </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="Corporate_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col-md-4">
												<div class="card">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user3.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">John Deo </div>
																<div class="name-center"> Microsoft </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="Corporate_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
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