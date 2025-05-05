<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">School List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">School</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">School List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-bs-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-bs-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
								<ul class="nav customtab nav-tabs" role="tablist">
									<li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">List
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
											View</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>All School</header>
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
															<div class="col-md-6 col-sm-6 col-6">
																<div class="btn-group">
																

																</div>
															</div>
														</div>
														
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th></th>
																	<th>Id</th>
																	<th> Institute Name </th>
																	<th> Address </th>
															
																	<th>  Website Link </th>
																	
																	<!-- <th> Degree </th> -->
																	
																	<th>Contact No</th>
																	<th> Action </th>
																	<th> View </th>
																	
																	
																	
																</tr>
															</thead>
															<tbody>
															<?php foreach($data['get_school_detail'] as $school_detail){ ?>
																<tr class="odd gradeX">
																<td class="patient-img">
																<img src="<?php echo URLROOT?>/uploads/<?php echo $school_detail->school_image?>" alt="">

																		</td>
																
																	
																	<td><a href="#">
																	<?php echo $school_detail->id?>
																	</a></td>
																	<td><a href="#">
																	<?php echo $school_detail->school_name?>
																	</a></td>
																	
																	<td class="left"><?php echo $school_detail->school_address?></td>
													
																	
																<td class="left"><?php echo $school_detail->website_link?></td>
																<td><a href="#">
																<?php echo $school_detail->auth_contact_number?></a></td>
																<td>
																		<a href="<?php echo URLROOT?>/admin/update_school/<?php echo $school_detail->id ?>"
																			class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a href="<?php echo URLROOT; ?>/admin/reject_school/<?php echo $school_detail->id?>" class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td> 
																	<td><a href="<?php echo URLROOT; ?>/admin/view_teacher/<?php echo $school_detail->school_id?>" class="tblDelBtn">View Teachers</a></td>
																	<!-- <td>
																		<a href="edit_School.html"
																			class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td> -->
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
										<?php foreach($data['get_school_detail'] as $school_detail){ ?>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="<?php echo URLROOT?>/uploads/<?php echo $school_detail->school_image ?>" style="width:200px;height:200px;">
															<div class="profile-usertitle">
																<div class="doctor-name"><?php echo $school_detail->school_name?>
																	 </div>
																<div class="name-center"> <?php echo $school_detail->school_address?>
																	  </div>
															</div>
															<p><?php echo $school_detail->website_link?>
																	</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="<?php echo $school_detail->school_contact_no?>"><?php echo $school_detail->school_contact_no?></a></p>
															</div>
															<p><?php echo $school_detail->auth_email?>
																	</p>
															<div class="profile-userbuttons">
																<a href="#"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										</div>
										<div class="row">
									
										
									
										</div>
										<div class="row">
										
							
										</div>
										<div class="row">
								
					
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