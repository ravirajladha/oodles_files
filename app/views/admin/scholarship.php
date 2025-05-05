<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
<?php $adminMod = New admins; ?>
			<!-- start page content -->
			<?php foreach($data['get_all_scholarship'] as $detail) {?>
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Scholarship Details</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/all_scholarships">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Scholarship Details</li>
							</ol>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="Scholarship-picture">
											<a class="Scholarship-likes m-l-10" href="#">
											<img src="<?php echo URLROOT; ?>/uploads/<?php echo $detail->scholarship_file?>" class="img-responsive"></div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header>About Scholarship</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="profile-desc">
										<b>Scholarshp Name </b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->name ?></div>
										</div>
										<ul class="list-group list-group-unbordered">
											
											<li class="list-group-item">
												<b>Body</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->body ?></div>
											</li>
											<li class="list-group-item">
												<b>Offered By</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->offered_by ?></div>
											</li>
											<li class="list-group-item">
												<b>Type</b>
												<div class="profile-desc-item pull-right"><?php if( $detail->type == 0){?>All <?php }  elseif( $detail->type == 1){?>Government Scholarship<?php }elseif( $detail->type == 2){?>Private Scholarship<?php }elseif( $detail->type == 3){?>OodlesIn Scholarship<?php }?></div>
											</li>
										
											<li class="list-group-item">
												<b>Website Link</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->url ?></div>
											</li>
											<!-- <li class="list-group-item">
												<b>Student Fee</b>
												<?php $get_auth_detail = $adminMod->get_auth_detail($detail->offered_by); ?>
												<div class="profile-desc-item pull-right">	<?php echo $get_auth_detail->name ?></div>
											</li> -->
											<li class="list-group-item">
												<b>No of Scholarship</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->no_of_scholarships ?></div>
											</li>
											<li class="list-group-item">
												<b>Contact Number</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->contact_number ?></div>
											</li>
											<li class="list-group-item">
												<b>Query Related Email id</b>
												<div class="profile-desc-item pull-right">	<?php echo $detail->email_id ?></div>
											</li>
											<li class="list-group-item">
												<b>Student Charge</b>
												<div class="profile-desc-item pull-right">Rs.	<?php echo $detail->student_charge ?></div>
											</li>
											<li class="list-group-item">
												<b>Subadmin</b>
												<?php $get_auth_detail = $adminMod->get_auth_detail($detail->subadmin); ?>

												<div class="profile-desc-item pull-right">	<?php echo $get_auth_detail->name ?></div>

											</li>
											<!-- <li class="list-group-item">
											<a href="<?php echo $detail->detailed_eligibility_url ?>">	<b>Click here for detailed eligibility information</b></a>
												
											</li> -->
										</ul>
										<!-- <div class="row list-separated profile-stat">
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 1 </div>
												<div class="uppercase profile-stat-text"> Years </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 1045 </div>
												<div class="uppercase profile-stat-text"> Applications </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 61 </div>
												<div class="uppercase profile-stat-text"> Rewarded</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="card">
										<div class="card-topline-aqua">
											<header></header>
										</div>
										<div class="white-box">
											<!-- Nav tabs -->
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane active fontawesome-demo">
													<div id="biography">
														<p><?php echo $detail->description;?></p>
														<h4 class="font-bold">Scholarship Availability</h4>
														<p><?php echo $detail->minimum_eligibility;?></p>
													<br>
														<h4 class="font-bold">Reservations</h4>
														<p><?php echo $detail->reservation;?></p>
														
														<br>
														<h4 class="font-bold">Documents Required to Apply</h4>
														<p><?php echo $detail->documents_required?></p>
														
														<br>
														<h4 class="font-bold">Application Process</h4>
														<p><?php echo $detail->application_process;?></p>
														
														<br>
														<h4 class="font-bold">Scholarship Availability</h4>
													
														
																<p> Scholarship Valid From: <?php echo date('d-m-Y', strtotime($detail->start_date)) ; ?> </p>
																<p> Scholarship Valid Till: <?php echo date('d-m-Y', strtotime($detail->end_date)) ;?></p>
															
														
														<br>
														<!-- <h4 class="font-bold">Scholarship rewards to the student</h4>
														<hr>
														<ul>
															
															<li>Create and develop a presentation.</li>
															<li>Understand basic concepts in Networking and
																Troubleshooting.</li>
															<li>Develop the skills for effective compose of E-mails and
																its features.</li>
															<li>Create and develop forms, queries and reports.</li>
															<li>Understand the concepts of multimedia and its
																applications.</li>
															<li>Develop the understanding of HTML.</li>
															<li>Understand the concepts of Tally and its applications.
															</li>
															<li>Maintenance of PC.</li>
														</ul> -->
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						</div>
					</div>
				</div>
				</div>
				<?php } ?>
				<!-- end page content -->
				<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 