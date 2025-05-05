<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
table
{
  table-layout:fixed;
}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Subscriptions</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="enquiry-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="enquiry-item" href="">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Subscriptions Plan</li>
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
											<header>All Subscriptions Plan</header>
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
														<th> Price </th>
														<th> Offer Price </th>
														<th> Validity</th>
														<th> Coins Offered</th>
														<th> Content</th>
														<th> Image</th>
														<th> Action </th>
														<th> Authorize </th>
											
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_all_subscription_plan'] as $subscription) { ?>
														<tr class="odd gradeX">
															<td class="patient-img">
																<i class="fa fa-graduation-cap"></i>
															</td>
															<td class="left"><?php echo $subscription->id ?></td>
															<td class="left"><?php echo $subscription->name?></td>
															<td class="left"><?php echo $subscription->price?></td>
															<td class="left"><?php echo $subscription->offer_price?></td>
															<td class="left"><?php echo $subscription->validity?></td>
															<td class="left"><?php echo $subscription->coins_offered?></td>
															<td class="left"><?php echo $subscription->content?></td>
															<td class="left"><a href="<?php echo URLROOT ?>/uploads/<?php echo $subscription->image;?>" target="_blank">View</a></td>
															<td class="left">
																<?php if($subscription->status==0){ ?>
															<a href="<?php echo URLROOT ?>/admin/update_student_subscription/<?php echo $subscription->id;?>/1"><button class="btn btn-primary">Approve</button></a>
														<?php }else{ ?>
															<a href="<?php echo URLROOT ?>/admin/update_student_subscription/<?php echo $subscription->id;?>/0"><button class="btn btn-warning">Disapprove</button></a>
														<?php } ?>
														</td>

															<td>
																<a href="<?php echo URLROOT?>/admin/edit_subscription/<?php echo $subscription->id;?>" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<!-- <a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a> -->
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
																		<a href="edit_enquiry.html" class="tblEditBtn">
																			<i class="fa fa-pencil"></i>
																		</a>
																		<a class="tblDelBtn">
																			<i class="fa fa-trash-o"></i>
																		</a>
																	</td>
																</tr>
																
															 -->
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<div class="row">
								<?php foreach ($data['get_all_enquirys'] as $subscription) { ?>
									<div class="col-md-4">

										<div class="card card-box">

											<div class="card-body no-padding ">

												<div class="doctor-profile">
													<!-- <img src="<?php echo URLROOT ?>/uploads/<?php echo $subscription->image ?>" class="doctor-pic"
																alt=""> -->
													<i class="fa fa-graduation-cap"></i>
													<div class="profile-usertitle">
														<div class="doctor-name"><?php echo $subscription->name ?> </div>
														<div class="name-center"> <?php echo $subscription->email ?> </div>
													</div>

													<div>
														<p><i class="fa fa-phone"></i><a href="tel:<?php echo $subscription->phone ?>"> <?php echo $subscription->phone ?></a></p>
													</div>
													<div class="profile-userbuttons">
														<!-- <a href="<?php echo URLROOT; ?>/admin/enquiry/<?php echo $subscription->id ?>"
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