<?php require APPROOT . '/views/inc_counsellor/header.php'; ?> 
			<!-- end sidebar menu -->
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							
						</div>
					</div>
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i data-feather="users"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Students</span>
										<span class="info-box-number">450</span>
										<div class="progress">
											<div class="progress-bar" style="width: 45%"></div>
										</div>
										<span class="progress-description">
											45% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i data-feather="user"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Scholarships</span>
										<span class="info-box-number">155</span>
										<div class="progress">
											<div class="progress-bar" style="width: 40%"></div>
										</div>
										<span class="progress-description">
											40% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-blue">
									<span class="info-box-icon push-bottom"><i data-feather="book"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Quizes</span>
										<span class="info-box-number">52</span>
										<div class="progress">
											<div class="progress-bar" style="width: 85%"></div>
										</div>
										<span class="progress-description">
											85% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12">
								<div class="info-box bg-b-pink">
									<span class="info-box-icon push-bottom"><i
											class="material-icons">monetization_on</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Revenue</span>
										<span class="info-box-number">13,921</span><span><i class="fa fa-inr"></i></span>
										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
											50% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
					</div>
					<!-- end widget -->
					<!-- chart start -->
					<div class="row">
						<div class="col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Quiz Usage</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body">
									<div class="recent-report__chart">
										<div id="chart1"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card card-box">
								<div class="card-head">
									<header>Scholarship Usage</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body">
									<div class="recent-report__chart">
										<div id="chart2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Chart end -->
					<div class="row">
						<div class="col-lg-9 col-md-12 col-sm-12 col-12">
							<div class="card-box">
								<div class="card-head">
									<header>School Onboardings</header>
								</div>
								<div class="card-body ">
									<div class="table-responsive">
										<table class="table table-hover dashboard-task-infos">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Type</th>
													<th>Email</th>
													<th>Plan</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												
												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>

												<tr>
													<td class="patient-img">
														<i class="fa fa-graduation-cap"></i>
													</td>
													<td>National School</td>
													<td>High School</td>
													<td>xyz@email.com</td>
													<td>Plan A</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									<div class="box-title"><small class="pull-right small-lbl-green"><i
												class="far fa-arrow-alt-circle-up"></i> Good</small> Student Performance
									</div>
									<div class="mt-3">
										<div class="stat-item">
											<div class="h6">Overall Growth</div> <b>35.80%</b>
										</div>
										<div class="stat-item">
											<div class="h6">Montly</div> <b>45.20%</b>
										</div>
										<div class="stat-item">
											<div class="h6">Day</div> <b>5.50%</b>
										</div>
									</div>
									<div id="schart1">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card-box">
								<div class="card-head">
									<header>Quiz Toppers</header>
									<button id="panel-button5"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button5">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something
											else
											here</li>
									</ul>
								</div>
								<div class="card-body ">
									<div class="table-responsive">
										<table class="table table-striped custom-table table-hover">
											<thead>
												<tr>
													<th>Roll No</th>
													<th>Name</th>
													<th>Graph</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>23</td>
													<td>John Smith</td>
													<td>
														<div id="sparkline"></div>
													</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>12</td>
													<td>Rakesh R</td>
													<td>
														<div id="sparkline1"></div>
													</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>45</td>
													<td>Sarah Smith</td>
													<td>
														<div id="sparkline2"></div>
													</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>34</td>
													<td>John Deo</td>
													<td>
														<div id="sparkline3"></div>
													</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>15</td>
													<td>Jay Soni</td>
													<td>
														<div id="sparkline4"></div>
													</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-12">
							<div class="card-box">
								<div class="card-head">
									<header>Recent Transactions</header>
									<button id="panel-button8"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button8">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body ">
									<div class="table-responsive">
										<table class="table table-hover">
											<tbody>
												<tr>
													<th>#</th>
													<th>Order No</th>
													<th>Student Name</th>
													<th>Status</th>
													<th>Amount</th>
													<th>Receipt</th>
													<th>Edit</th>
												</tr>
												<tr>
													<td class="patient-img">
														<img src="<?php echo URLROOT; ?>/assets/img/user/user10.jpg" alt="">
													</td>
													<td>XY56987</td>
													<td>John Deo</td>
													<td><i class="fas fa-circle col-green me-2"></i>Confirm</td>
													<td>₹955</td>
													<td><i class="fas fa-file-pdf col-red"></i></td>
													<td>
														<a data-toggle="tooltip" title="" data-bs-original-title="Edit"
															aria-label="Edit"><i class="fas fa-pencil-alt"></i></a>
													</td>
												</tr>
												<tr>
													<td class="patient-img">
														<img src="<?php echo URLROOT; ?>/assets/img/user/user3.jpg" alt="">
													</td>
													<td>XY12587</td>
													<td>Sarah Smith</td>
													<td><i class="fas fa-circle col-orange me-2"></i>Payment Failed
													</td>
													<td>₹215</td>
													<td><i class="fas fa-file-pdf col-red"></i></td>
													<td>
														<a data-toggle="tooltip" title="" data-bs-original-title="Edit"
															aria-label="Edit"><i class="fas fa-pencil-alt"></i></a>
													</td>
												</tr>
												<tr>
													<td class="patient-img">
														<img src="<?php echo URLROOT; ?>/assets/img/user/user7.jpg" alt="">
													</td>
													<td>XY58987</td>
													<td>John Doe</td>
													<td><i class="fas fa-circle col-green me-2"></i>Confirm</td>
													<td>₹125</td>
													<td><i class="fas fa-file-pdf col-red"></i></td>
													<td>
														<a data-toggle="tooltip" title="" data-bs-original-title="Edit"
															aria-label="Edit"><i class="fas fa-pencil-alt"></i></a>
													</td>
												</tr>
												<tr>
													<td class="patient-img">
														<img src="<?php echo URLROOT; ?>/assets/img/user/user2.jpg" alt="">
													</td>
													<td>XY87452</td>
													<td>Sagar Patel</td>
													<td><i class="fas fa-circle col-green me-2"></i>Confirm</td>
													<td>₹498</td>
													<td><i class="fas fa-file-pdf col-red"></i></td>
													<td>
														<a data-toggle="tooltip" title="" data-bs-original-title="Edit"
															aria-label="Edit"><i class="fas fa-pencil-alt"></i></a>
													</td>
												</tr>
												<tr>
													<td class="patient-img">
														<img src="<?php echo URLROOT; ?>/assets/img/user/user8.jpg" alt="">
													</td>
													<td>XY87452</td>
													<td>Sagar Patel</td>
													<td><i class="fas fa-circle col-green me-2"></i>Confirm</td>
													<td>₹498</td>
													<td><i class="fas fa-file-pdf col-red"></i></td>
													<td>
														<a data-toggle="tooltip" title="" data-bs-original-title="Edit"
															aria-label="Edit"><i class="fas fa-pencil-alt"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				

					<!-- start new student list -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card  card-box">
								<div class="card-head">
									<header>New Student List</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body ">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table">
												<thead>
													<tr>
														<th>No</th>
														<th>Name</th>
														<th>Assigned Professor</th>
														<th>Date Of Admit</th>
														<th>Purchase</th>
														<th>Branch</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Jens Brincker</td>
														<td>Kenny Josh</td>
														<td>27/05/2016</td>
														<td>
															<span class="label label-sm label-success">paid</span>
														</td>
														<td>Mechanical</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Mark Hay</td>
														<td> Mark</td>
														<td>26/05/2017</td>
														<td>
															<span class="label label-sm label-warning">unpaid
															</span>
														</td>
														<td>Science</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Anthony Davie</td>
														<td>Cinnabar</td>
														<td>21/05/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>Commerce</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>4</td>
														<td>David Perry</td>
														<td>Felix </td>
														<td>20/04/2016</td>
														<td>
															<span class="label label-sm label-danger">unpaid</span>
														</td>
														<td>Mechanical</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Anthony Davie</td>
														<td>Beryl</td>
														<td>24/05/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>M.B.A.</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Alan Gilchrist</td>
														<td>Joshep</td>
														<td>22/05/2016</td>
														<td>
															<span class="label label-sm label-warning ">unpaid</span>
														</td>
														<td>Science</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>7</td>
														<td>Mark Hay</td>
														<td>Jayesh</td>
														<td>18/06/2016</td>
														<td>
															<span class="label label-sm label-success ">paid</span>
														</td>
														<td>Commerce</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
														</td>
													</tr>
													<tr>
														<td>8</td>
														<td>Sue Woodger</td>
														<td>Sharma</td>
														<td>17/05/2016</td>
														<td>
															<span class="label label-sm label-danger">unpaid</span>
														</td>
														<td>Mechanical</td>
														<td>
															<a href="javascript:void(0)" class="tblEditBtn">
																<i class="fa fa-pencil"></i>
															</a>
															<a href="javascript:void(0)" class="tblDelBtn">
																<i class="fa fa-trash-o"></i>
															</a>
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
					<!-- end new student list -->
				</div>
			</div>
			<!-- end page content -->
			<!-- start chat sidebar -->
			
<?php require APPROOT . '/views/inc_counsellor/footer.php'; ?> 