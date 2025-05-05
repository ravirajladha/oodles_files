<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Enquiries</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="enquiry-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="enquiry-item" href="">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Enquiries List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					<ul class="nav customtab nav-tabs" role="tablist">
						<li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
								View</a></li>
						<!-- <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
								View</a></li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Enquiries List</header>
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
														<th> Name </th>
														<th> Company Name </th>
														<th> Business Email </th>
														<th> Phone Number </th>
														<th> Designation </th>
														<th> Comment </th>
														<th> Enquired At </th>
														<!-- <th>DOB</th> -->
														<!-- <th> Action </th> -->
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_all_enquiry'] as $enquiry) { ?>
														<tr class="odd gradeX">

															<td class="patient-img">
																<i class="fa fa-graduation-cap"></i>
															</td>



															<td class="left"><?php echo $enquiry->id ?></td>
															
															<td class="left"><?php echo $enquiry->name?></td>
															<td class="left"><?php echo $enquiry->company_name?></td>
															<td class="left"><?php echo $enquiry->business_email?></td>
															<td class="left"><?php echo $enquiry->phone_no?></td>
															<td class="left"><?php echo $enquiry->designation?></td>
															<td class="left"><?php echo $enquiry->comment?></td>
															<td class="left"><?php echo $enquiry->created_at?></td>
														

															<!-- <td>
																<a href="#" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a>
															</td> -->
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
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user2.jpg" alt="">
																	</td>
																	<td class="left">15</td>
																	<td>Sarah Smith</td>
																	<td class="left">M.C.A.</td>
																	<td><a href="tel:44455546456">
																			44455546456 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			sarah@gmail.com </a></td>
																	<td class="left">05 Jun 2011</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user3.jpg" alt="">
																	</td>
																	<td class="left">23</td>
																	<td>John Deo</td>
																	<td class="left">M.B.B.S.</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			john@gmail.com </a></td>
																	<td class="left">15 Feb 2012</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user4.jpg" alt="">
																	</td>
																	<td class="left">10</td>
																	<td>Jay Soni</td>
																	<td class="left">Arts</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			kenh@gmail.com </a></td>
																	<td class="left">12 Nov 2012</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user5.jpg" alt="">
																	</td>
																	<td class="left">14</td>
																	<td>Jacob Ryan</td>
																	<td class="left">Music</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			johnson@gmail.com </a></td>
																	<td class="left">03 Dec 2001</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user6.jpg" alt="">
																	</td>
																	<td class="left">7</td>
																	<td>Megha Trivedi</td>
																	<td class="left">Commerce</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			megha@gmail.com </a></td>
																	<td class="left">17 Mar 2013</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user3.jpg" alt="">
																	</td>
																	<td class="left">18</td>
																	<td>Rajesh</td>
																	<td class="left">Civil</td>
																	<td><a href="tel:4444565756">
																			4444565756 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			rajesh@gmail.com </a></td>
																	<td class="left">22 Feb 2000</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user10.jpg" alt="">
																	</td>
																	<td class="left">5</td>
																	<td>Pooja Patel</td>
																	<td class="left">Computer</td>
																	<td><a href="tel:444786876">
																			444786876 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			pooja@gmail.com </a></td>
																	<td class="left">27 Aug 2005</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user1.jpg" alt="">
																	</td>
																	<td class="left">18</td>
																	<td>Rajesh Bhatt</td>
																	<td class="left">Mechanical</td>
																	<td><a href="tel:4444565756">
																			4444565756 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			rajesh@gmail.com </a></td>
																	<td class="left">22 Feb 2010</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
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
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user2.jpg" alt="">
																	</td>
																	<td class="left">15</td>
																	<td>Sarah Smith</td>
																	<td class="left">M.C.A.</td>
																	<td><a href="tel:44455546456">
																			44455546456 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			sarah@gmail.com </a></td>
																	<td class="left">05 Jun 2011</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user3.jpg" alt="">
																	</td>
																	<td class="left">23</td>
																	<td>John Deo</td>
																	<td class="left">M.B.B.S.</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			john@gmail.com </a></td>
																	<td class="left">15 Feb 2012</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user4.jpg" alt="">
																	</td>
																	<td class="left">10</td>
																	<td>Jay Soni</td>
																	<td class="left">Arts</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			kenh@gmail.com </a></td>
																	<td class="left">12 Nov 2012</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user5.jpg" alt="">
																	</td>
																	<td class="left">14</td>
																	<td>Jacob Ryan</td>
																	<td class="left">Music</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			johnson@gmail.com </a></td>
																	<td class="left">03 Dec 2001</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user6.jpg" alt="">
																	</td>
																	<td class="left">7</td>
																	<td>Megha Trivedi</td>
																	<td class="left">Commerce</td>
																	<td><a href="tel:444543564">
																			444543564 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			megha@gmail.com </a></td>
																	<td class="left">17 Mar 2013</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user1.jpg" alt="">
																	</td>
																	<td class="left">18</td>
																	<td>Rajesh</td>
																	<td class="left">Civil</td>
																	<td><a href="tel:4444565756">
																			4444565756 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			rajesh@gmail.com </a></td>
																	<td class="left">22 Feb 2000</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																<tr class="odd gradeX">
																	<td class="patient-img">
																		<img src="../assets/img/user/user10.jpg" alt="">
																	</td>
																	<td class="left">5</td>
																	<td>Pooja Patel</td>
																	<td class="left">Computer</td>
																	<td><a href="tel:444786876">
																			444786876 </a></td>
																	<td><a href="mailto:shuxer@gmail.com">
																			pooja@gmail.com </a></td>
																	<td class="left">27 Aug 2005</td>
																	<td>
																		<a href="edit_enquiry.html" class="tblEditBtn">
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
						<div class="tab-pane" id="tab2">
							<div class="row">
								<?php foreach ($data['get_all_enquirys'] as $enquiry) { ?>
									<div class="col-md-4">

										<div class="card card-box">

											<div class="card-body no-padding ">

												<div class="doctor-profile">
													<!-- <img src="<?php echo URLROOT ?>/uploads/<?php echo $enquiry->image ?>" class="doctor-pic"
																alt=""> -->
													<i class="fa fa-graduation-cap"></i>
													<div class="profile-usertitle">
														<div class="doctor-name"><?php echo $enquiry->name ?> </div>
														<div class="name-center"> <?php echo $enquiry->email ?> </div>
													</div>

													<div>
														<p><i class="fa fa-phone"></i><a href="tel:<?php echo $enquiry->phone ?>"> <?php echo $enquiry->phone ?></a></p>
													</div>
													<div class="profile-userbuttons">
														<!-- <a href="<?php echo URLROOT; ?>/admin/enquiry/<?php echo $enquiry->id ?>"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a> -->
													</div>

												</div>

											</div>

										</div>

									</div>
								<?php } ?>
								<!-- <div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user1.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Rajesh </div>
																<div class="name-center"> Mathematics </div>
															</div>
															<p>45, Krishna Tower, Near Bus Stop, Satellite, <br />Mumbai
															</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user2.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Sarah Smith </div>
																<div class="name-center"> Commerce </div>
															</div>
															<p>456, Estern evenue, Courtage area, <br />New York</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user3.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">John Deo </div>
																<div class="name-center"> Arts </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user4.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Jay Soni </div>
																<div class="name-center"> M.B.A. </div>
															</div>
															<p>45, Krishna Tower, Near Bus Stop, Satellite, <br />Mumbai
															</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user5.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Jacob Ryan </div>
																<div class="name-center"> Urology </div>
															</div>
															<p>456, Estern evenue, Courtage area, <br />New York</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user6.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Megha Trivedi </div>
																<div class="name-center"> Electrical </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user1.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Rajesh </div>
																<div class="name-center"> Mathematics </div>
															</div>
															<p>45, Krishna Tower, Near Bus Stop, Satellite, <br />Mumbai
															</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user2.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Sarah Smith </div>
																<div class="name-center"> Commerce </div>
															</div>
															<p>456, Estern evenue, Courtage area, <br />New York</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user10.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Pooja Patel </div>
																<div class="name-center"> Science </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user1.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">Rajesh </div>
																<div class="name-center"> Mathematics </div>
															</div>
															<p>45, Krishna Tower, Near Bus Stop, Satellite, <br />Mumbai
															</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															<img src="../assets/img/user/user3.jpg" class="doctor-pic"
																alt="">
															<div class="profile-usertitle">
																<div class="doctor-name">John Deo </div>
																<div class="name-center"> Arts </div>
															</div>
															<p>A-103, shyam gokul flats, Mahatma Road <br />Mumbai</p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> (123)456-7890</a></p>
															</div>
															<div class="profile-userbuttons">
																<a href="professor_profile.html"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Read
																	More</a>
															</div> -->
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