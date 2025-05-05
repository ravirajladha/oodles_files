<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">

				<div class=" pull-left">
					<div class="page-title">All Scholarships List</div>
				</div>

				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Scholarships List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="card-box">
				<div class="card-head">
					<header>All Scholarships </header>
				</div>
				<div class="card-body ">
					<!-- start course list -->
					<div class="row">
						<?php foreach ($data['get_all_scholarship'] as $scholarship) { ?>
							<div class="col-lg-4 col-md-6 col-12 col-sm-6">
								<div class="blogThumb">
									<div class="thumb-center"><img class="img-responsive" alt="user" img src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file ?>" alt="<?php echo URLROOT; ?>/assets/img/course/course2.jpg"></div>
									<div class="course-box">

										<?php $string =  $scholarship->name ?>
										<?php
										if (strlen($string) > 6) {
											$trimstring = substr($string, 0, 20) . '...';
										} else {
											$trimstring = $string;
										} ?>
										<h4> Scholarship Name: <br><?php echo strtoupper($trimstring) ?></h4>
										<!-- <div class="text-muted"><span class="m-r-10">Eligibile Candidates: <?php if ($scholarship->type == 1) { ?>All type of candidates allowed.<?php } elseif ($scholarship->type == 2) { ?>Girl candidates allowed.<?php } elseif ($scholarship->type == 3) { ?>Boy candidates allowed.<?php } ?></span>
													
												</div> -->
										<p><span><i class="ti-alarm-clock"></i>Eligibile Candidates: <?php if ($scholarship->type == 0) { ?>All <?php } elseif ($scholarship->type == 1) { ?>Government Scholarship<?php } elseif ($scholarship->type == 2) { ?>Private Scholarship<?php } elseif ($scholarship->type == 3) { ?>OodlesIn Scholarship<?php } ?></span>
										</p>
										<p><span><i class="ti-alarm-clock"></i>Category: <?php if ($scholarship->type == 1) { ?>All type of candidates allowed.<?php } elseif ($scholarship->type == 2) { ?>Girl candidates allowed.<?php } elseif ($scholarship->type == 3) { ?>Boy candidates allowed.<?php } ?></span></p>


										<a href="<?php echo URLROOT ?>/admin/scholarship/<?php echo $scholarship->id ?>"> <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read More</button></a>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="col-lg-4 col-md-6 col-12 col-sm-6 ">
							<div class="blogThumb">
								<div class="row" style="background-color:#E9F4FF;">
									<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
										<div class="thumb-center"><img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;"></div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
										<div class="thumb-center" style="margin-top:10px;background-color:yellow;vertical-align:center;"><i class="material-icons f-left">today</i> 31 Days<br>to go</div>
									</div>
								</div>

								<div class="course-box">
									<h6 style="text-align:center;"><b><u>SCHOLARSHIP TITLE ALLOTED</u></b></h6>


								</div>
								<div class="row" style="background-color:#46aaeb;">
									<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
										<div class="thumb-center">
											<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Prize Offer</span><br>
												<p style="font-size:12px;">
													Rs 50000, prize<BR>medal and future secure.
												</p>
											</div>

										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
										<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Eligibility</span><br>
											<p style="font-size:12px;">
												From Class 6 <br>to Class 12
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="col-lg-8 col-md-8 col-8 col-sm-8">
							<!-- <div class="blogThumb"> -->
							<div class="card tab2-card">
								<div class="card-header" style="background-color:orange;">
									<h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aliquid!</h5>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-4  col-sm-4">

										<div class="thumb-center">
											<button type="button" class="btn btn-circle btn-default" style="margin-top:40px;">View Details</button>
											<br>
											<button type="button" class="btn btn-circle btn-success" style="margin-top:20px;">Apply Now</button>
										</div>


									</div>
									<div class="col-lg-8 col-md-8 col-8 col-sm-8">

										<div class="thumb-center"></div>
										<div class="course-box">
											<div class="row">
												<div class="col-lg-6">
													<h4 style="font-weight:bold;">Eligibility</h4>
												</div>
												<div class="col-lg-6">
													<p style="color:blue;font-size:16px;text-decoration: underline;margin-top:15px;"><i class="material-icons f-left" style="font-size: 16px;">today</i>Deadline: 31/05/2023</p>
												</div>
											</div>
											<div class="text-muted"><span class="m-r-10">
													<ul>
														<li>Lorem ipsum dolor sit amet.</li>
														<li>Lorem ipsum dolor sit amet.</li>
														<li>Lorem ipsum dolor sit amet.</li>

														<!-- <u>Read More</u> -->
													</ul>
												</span>

											</div>

											<p><span><i class="fa fa-graduation-cap"></i> Benefits: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae.</span></p>
											<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
												More</button>
										</div>

									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-6 col-sm-6">
							<div class="blogThumb" style="background-color:#f3f0f0;">
								<!-- <div class="blogThumb"> -->
								<!-- <div class="card tab2-card" >
									<div class="card-header" style="background-color:orange;">
										<h5> Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, aliquid!</h5>
									</div> -->
								<div class="row">
									<div class="col-lg-2 col-md-2  col-sm-2">

										<img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:100%;width:100%;">


									</div>
									<div class="col-lg-4 col-md-4  col-sm-4">
										<h4 style="font-weight:bold;">Student Name</h4>
										<h5>Graduation:</h5>
										<h6 style="font-weight:bold;"> XX Yrs <br>Student Name</h6>



									</div>
									<!-- <div class="col-lg-2 col-md-2  col-sm-2">
									


										</div> -->
									<div class="col-lg-4 col-md-4 col-4 col-sm-4">
										<div class="text-muted" style="margin-top:20px;"><span class="m-r-10">
												Select Status
												<select class="form-control">
													<option>Level 1</option>
													<option>Level 2</option>
													<option>Level 3</option>
													<option>Level 4</option>
													<option>Level 5</option>
												</select>
											</span>

										</div>


									</div>
								</div>
							</div>
						</div>
						<!-- </div> -->


						<!--
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course3.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course4.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course1.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course2.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course3.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course4.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course1.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course2.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course3.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div> -->
						<!-- <div class="col-lg-3 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course4.jpg"></div>
											<div class="course-box">
												<h4>Scholarship Name</h4>
												<div class="text-muted"><span class="m-r-10">April 23</span>
													
												</div>
												<p><span><i class="ti-alarm-clock"></i> Duration: 6 Months</span></p>
												<p><span><i class="ti-user"></i> Type: Merit Students</span></p>
												<p><span><i class="fa fa-graduation-cap"></i> Applications 200+</span></p>
												<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button>
											</div>
										</div>
									</div> -->
					</div>
					<!-- End course list -->
				</div>
			</div>
		</div>
		<!-- start new card-body -->

		<!-- <end new card body -->

	</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>