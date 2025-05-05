<?php require APPROOT . '/views/inc_college/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
						
							<div class=" pull-left">
								<div class="page-title">All Scholarships List</div>
							</div>

							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
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
								<?php foreach($data['get_all_scholarship'] as $scholarship){ ?>
									<div class="col-lg-4 col-md-6 col-12 col-sm-6">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													img src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file ?>" alt="<?php echo URLROOT; ?>/assets/img/course/course2.jpg"></div>
											<div class="course-box">
	
									<?php $string =  $scholarship->name ?>
<?php
if (strlen($string) > 6) {
$trimstring = substr($string, 0, 12). '...';
} else {
$trimstring = $string;

} ?>
												<h4> Scholarship Name: <?php echo $trimstring ?></h4>
												<!-- <div class="text-muted"><span class="m-r-10">Eligibile Candidates: <?php if( $scholarship->type == 1){?>All type of candidates allowed.<?php }elseif( $scholarship->type == 2){?>Girl candidates allowed.<?php }elseif( $scholarship->type == 3){?>Boy candidates allowed.<?php }?></span>
													
												</div> -->
												<p><span><i class="ti-alarm-clock"></i>Eligibile Candidates:  <?php if( $scholarship->type == 0){?>All <?php }  elseif( $scholarship->type == 1){?>Government Scholarship<?php }elseif( $scholarship->type == 2){?>Private Scholarship<?php }elseif( $scholarship->type == 3){?>OodlesIn Scholarship<?php }?></span>
											</p>
												<p><span><i class="ti-alarm-clock"></i>Category: <?php if( $scholarship->type == 1){?>All type of candidates allowed.<?php }elseif( $scholarship->type == 2){?>Girl candidates allowed.<?php }elseif( $scholarship->type == 3){?>Boy candidates allowed.<?php }?></span></p>
												
												
												<a href="<?php echo URLROOT ?>/corporate/scholarship/<?php echo $scholarship->id ?>">	<button type="button"
													class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
													More</button></a>
											</div>
										</div>
									</div>
									<?php } ?>
									<!-- <div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
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
				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_college/footer.php'; ?> 