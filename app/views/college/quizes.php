<?php require APPROOT . '/views/inc_college/header.php'; ?>
<br>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">

				<div class=" pull-left">
					<div class="page-title">All Quizes List</div>
				</div>

				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quizes</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Quizes List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="card-box">
				<div class="card-head">
					<header>All Quizes </header>
				</div>
				<div class="card-body ">
					<!-- start course list -->
					<div class="row">
						<?php if(empty($data['get_all_quiz'])){ ?>
							<h1> No Quiz Found</h1>
							<?php  } ?>
							<?php foreach ($data['get_all_quiz'] as $quiz) { ?>
							<div class="col-lg-12 col-md-12 col-12 col-sm-12">
								<div class="blogThumb">
									<div class="row">
										<div class="col-md-3">
											<div class="thumb-center"><img class="img-responsive" alt="user" img src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" alt="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="height:200px;vertical-align:middle"></div>
										</div>
										<div class="col-md-9">
											<div class="course-box" style="text-align:center;">
												<?php $string = $quiz->name ?>
												<?php
												if (strlen($string) > 15) {
													$trimstring = substr($string, 0, 16) . '...';
												} else {
													$trimstring = $string;
												} ?>
												<h4> Quiz Name: <strong><?php echo $trimstring ?></strong></h4>
												<!-- <?php if (isset($quiz->topic)) { ?>
													<p><span><i class="ti-alarm-clock"></i>Topic: <?php echo $quiz->topic ?></span>
													</p>
												<?php } ?> -->
												<?php if (isset($quiz->chapter)) { ?>
													<p><span><i class="ti-alarm-clock"></i>Chapter:
													<?php 
													$array = explode(',', $quiz->chapter);
							foreach ($array as $value) {
								$adminMod = New admins;
								$get_chapter_detail = $adminMod->get_single_chapter($value);
								echo "| ".$get_chapter_detail->name." | ";
								
												} 
												} ?>
												</span>
													</p>
													

												<?php if (isset($quiz->start_date) && isset($quiz->end_date)) { ?>
													<p><span><i class="ti-alarm-clock"></i>Quiz Timeline: <?php echo $quiz->start_date ?> : <?php echo $quiz->end_date ?></span>
													</p>
												<?php } ?>

												</p>
												<p><span><i class="ti-alarm-clock"></i>Duration: <?php echo $quiz->duration_min ?><span>&nbsp;min</span><?php echo $quiz->duration_sec ?><span>&nbsp;sec</span></span>
												</p>


												<a href="<?php echo URLROOT ?>/admin/view_quiz/<?php echo $quiz->id ?>"> <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-info">Read
														More</button></a>
												<a href="<?php echo URLROOT ?>/admin/edit_quiz/<?php echo $quiz->id ?>"> <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-warning">Edit</button></a>
												<a href="<?php echo URLROOT ?>/admin/reject_quiz/<?php echo $quiz->id ?>"> <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary" data-type="dialog7">DELETE</button></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
						<!-- <div class="col-lg-3 col-md-6 col-12 col-sm-6 ">
										<div class="blogThumb">
											<div class="thumb-center"><img class="img-responsive" alt="user"
													src="../assets/img/course/course2.jpg"></div>
											<div class="course-box">
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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
												<h4>quiz Name</h4>
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