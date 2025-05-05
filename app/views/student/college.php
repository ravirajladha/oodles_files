<?php require APPROOT . '/views/inc_student/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">College Detail</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">College</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">College Detail</li>
							</ol>
						</div>
					</div>
				

					<?php foreach ($data['get_college_detail']  as $college_detail) { ?>
					<div class="row">
					
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<div class="card">
									<div class="card-body no-padding height-9">
										<div class="row">
											<div class="profile-userpic">
											<!-- <i class="fa fa-graduation-cap"></i> -->
											<img src="<?php echo URLROOT?>/uploads/<?php echo $college_detail->college_image ?>">
											</div>
										</div>
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?php echo $college_detail->institute_name ;?>   </div>
											<!-- <div class="profile-usertitle-job"> Jr. college </div> -->
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>No of Students</b> <a class="pull-right"><?php echo $college_detail->no_of_students ;?>  </a>
											</li>
											<li class="list-group-item">
												<b>No of Branches</b> <a class="pull-right"><?php echo $college_detail->no_of_branches;?>  </a>
											</li>
											<li class="list-group-item">
												<b>Average Fee</b> <a class="pull-right"><?php echo $college_detail->average_fee ;?>  </a>
											</li>
											<li class="list-group-item">
												<b>Mode of Admission </b> <a class="pull-right"><?php echo $college_detail->mode_of_admission ;?>  </a>
											</li>
											<li class="list-group-item">
												<b>Admission Status </b> <a class="pull-right"><?php echo $college_detail->admission_status ;?>  </a>
											</li>
										</ul> 
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
									
									 <!-- END SIDEBAR BUTTONS -->
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header>About </header>
									</div>
									<div class="card-body no-padding height-9">
										<!-- <div class="profile-desc">
										
										</div> -->
										<ul class="list-group list-group-unbordered">
											
											<!-- <li class="list-group-item">
												<b>Quizes Done </b>
												<div class="profile-desc-item pull-right">30+</div>
											</li> -->
											<li class="list-group-item">
												<b>Affiliation Board</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->affiliation_board?> </div>
											</li>
											<li class="list-group-item">
												<b>Date of Establishment</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->date_of_establishment?></div>
											</li>
											<li class="list-group-item">
												<b>University Affiliated</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->university_affiliated?></div>
											</li>
											<li class="list-group-item">
												<b>Website Link</b>
												<div class="profile-desc-item pull-right"> <a href="<?php echo $college_detail->website_link?>" target="_blank"><?php echo $college_detail->website_link?></a></div>
											</li>
											<!-- <li class="list-group-item">
												<b>Typen</b>
												<div class="profile-desc-item pull-right">Jr. college</div>
											</li> -->
										</ul>
										<!-- <div class="row list-separated profile-stat">
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 37 </div>
												<div class="uppercase profile-stat-text"> Teachers </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 51 </div>
												<div class="uppercase profile-stat-text"> Students </div>
											</div>
											<div class="col-md-4 col-sm-4 col-6">
												<div class="uppercase profile-stat-title"> 61 </div>
												<div class="uppercase profile-stat-text"> Quizes</div>
											</div>
										</div> -->
									</div>
								</div>
								<div class="card">
									<div class="card-head">
										<header>Address</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center m-t-10">
											<div class="col-md-12">
												<p> <?php echo $college_detail->branch_address?> 
													</p>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="card">
									<div class="card-head">
										<header>Active Quizes</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="work-monitor work-progress">
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Degree</div>
													<div class="percent pull-right">50%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-danger progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 70%">
														<span class="sr-only">50% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Subject</div>
													<div class="percent pull-right">85%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-success progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 45%">
														<span class="sr-only">85% </span>
													</div>
												</div>
											</div>
											<div class="states">
												<div class="info">
													<div class="desc pull-left">Monthly</div>
													<div class="percent pull-right">20%</div>
												</div>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar-info progress-bar-striped active"
														role="progressbar" aria-valuenow="40" aria-valuemin="0"
														aria-valuemax="100" style="width: 35%">
														<span class="sr-only">20% </span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>  -->
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
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div id="biography">
														<div class="row">
															<div class="col-md-3 col-6 b-r"> <strong>Authorized Name</strong>
																<br>
																<p class="text-muted"><?php echo $college_detail->legal_name ;?> </p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Contact Number</strong>
																<br>
																<p class="text-muted"><?php echo $college_detail->contact_number ;?></p>
															</div>
															<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
																<br>
																<p class="text-muted"><a href="mailto:<?php echo $college_detail->authorized_email;?>"> <?php echo $college_detail->authorized_email;?></a></p>
															</div>
															<div class="col-md-3 col-6"> <strong>Registered Address</strong>
																<br>
																<p class="text-muted"><?php echo $college_detail->registered_address;?></p>
															</div>
														</div>
														<hr>
														<div class="col-md-6 col-6 b-r"> <strong>About College</strong></div>
														<p class="m-t-30"><?php echo $college_detail->description ;?></p>
														<br>
														<div class="col-md-6 col-6 b-r"> <strong>Course Offered</strong></div>
														<p class="m-t-30"><?php echo $college_detail->course_offered ;?></p>
														<br>
														<br>
														<div class="col-md-6 col-6 b-r"> <strong>Fees Course Wise</strong></div>
														<p class="m-t-30"><?php echo $college_detail->fees_course_wise ;?></p>
														<br>
														<div class="col-md-6 col-6 b-r"> <strong>Eligibility Course Wise</strong></div>
														<p class="m-t-30"><?php echo $college_detail->eligibility_course_wise;?></p>
														<br>
														<ul class="list-group list-group-unbordered">
											
											<!-- <li class="list-group-item">
												<b>Quizes Done </b>
												<div class="profile-desc-item pull-right">30+</div>
											</li> -->
											<li class="list-group-item">
												<b>PAN</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->pan?> </div>
											</li>
											<li class="list-group-item">
												<b>CIN</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->cin?> </div>
											</li>
											<li class="list-group-item">
												<b>GSTIN</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->gstin?> </div>
											</li>
											<li class="list-group-item">
												<b>TAN</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->tan?> </div>
											</li>
											<li class="list-group-item">
												<b>Bank Name</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->bank_name?> </div>
											</li>
											<li class="list-group-item">
												<b>IFSC</b>
												<div class="profile-desc-item pull-right"> <?php echo $college_detail->ifsc?> </div>
											</li>
					</ul>
													 <!-- <h4 class="font-bold">Details</h4>
														<hr>
														<ul>
															<li>PAN:<?php echo $college_detail->pan;?> </li>
															<li>M.A.,Gujarat University, Ahmedabad, India.</li>
															<li>P.H.D., Shaurashtra University, Rajkot</li>
														</ul>
														<br>
														<h4 class="font-bold">Options</h4>
														<hr>
														<ul>
															
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
														</ul>
														<br>
														<h4 class="font-bold">Options
														</h4>
														<hr>
														<ul>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
															<li>Lorem Ipsum is simply dummy text of the printing and
																typesetting industry. </li>
														</ul>  -->
														<br>
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
					<?php } ?>
				</div>
				<!-- end page content -->
				<?php require APPROOT . '/views/inc_student/footer.php'; ?> 