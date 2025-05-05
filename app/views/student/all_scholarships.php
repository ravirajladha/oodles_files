<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<style>
	hr {
		height: 7px;
		color: white;

	}
</style>
<?php

$get_scholarships  = $data['get_classwise_scholarships'];

?>

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
		<div class="inbox">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body no-padding height-9">
							<div class="row">
								<div class="col-md-2">
									<div class="inbox-sidebar">
										<div class="d-grid gap-2">
											<a href="email_compose.html" class="btn red" type="button"><i class="fa fa-edit"></i>My Profile</a>
										</div>
										<img class="img-responsive rounded-circle" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
										<br>
										<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope active">
											<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%;"></div>
										</div>
										25% Completed
										<!-- <ul class="inbox-nav inbox-divider">
											<li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox
													<span class="label mail-counter-style label-danger pull-right">2</span></a>
											</li>
											<li><a href="#"><i class="fa fa-envelope"></i> Sent Mail</a>
											</li>
											<li><a href="#"><i class="fa fa-briefcase"></i> Important</a>
											</li>
											<li><a href="#"><i class="fa fa-star"></i> Starred </a>
											</li>
											<li><a href="#"><i class=" fa fa-external-link"></i> Drafts
													<span class="label mail-counter-style label-info pull-right">30</span></a>
											</li>
											<li><a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
											</li>
										</ul> -->
										<ul class="nav nav-pills nav-stacked labels-info inbox-divider">
											<li>
												<h4>Details</h4>
											</li>
											<li><a href="#"><i class="fa fa-tags text-info"></i> My Profile</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-tags text-warning"></i> Matched Scholarships
												</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-tags text-danger text-success"></i>
													Applied Scholarships
												</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-tags text-purple"></i> My Favourites
												</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-tags "></i> Awards & Achievements
												</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-tags "></i> Questions & Answers
												</a>
											</li>
										</ul>
										<ul class="nav nav-pills nav-stacked labels-info inbox-divider ">
											<li>
												<h4>Live Scholarships</h4>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-book text-success"></i> Scholarship Name
													<span class="online-status">Till 24/05/2023</span>
												</a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-book text-danger"></i> Scholarship Name
													<span class="online-status">Till 24/05/2023</span> </a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-book text-purple "></i> Scholarship Name

													<span class="online-status">Till 24/05/2023</span> </a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-book text-success "></i>
													Scholarship Name
													<span class="online-status">Till 24/05/2023</span> </a>
											</li>
											<li>
												<a href="#">
													<i class=" fa fa-book text-info "></i> Scholarship Name
													<span class="online-status">Till 24/05/2023</span> </a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-8">
									<div class="row">
										<?php 
if (!empty($get_scholarships)) {
    foreach ($get_scholarships as $scholarship) { ?>
											<div class="col-lg-6 col-md-6 col-6 col-sm-6">
												<div class="blogThumb">
													<div class="row" style="background-color:#E9F4FF;">
														<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
															<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file; ?>" style="height:80px;width:100%;"></div>
														</div>
														<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
															<div class="thumb-center" style="margin-top:10px;background-color:#e9e9d7;vertical-align:center;">

																<?php

                            $start_date = $scholarship->start_date; // Replace this with your start date
        $end_date = $scholarship->end_date; // Replace this with your end date
        $current_date = date("Y-m-d");

        if (strtotime($start_date) > strtotime($current_date)) {
            // Start date is in the future
            $days_to_go = round((strtotime($start_date) - strtotime($current_date)) / (60 * 60 * 24));
            echo '<i class="material-icons f-left">&#xe8df;</i>';
            echo "Starts in $days_to_go days";
        } elseif (strtotime($end_date) >= strtotime($current_date)) {
            // Scholarship is live
            echo "Start date : $start_date<br>";
            echo "End date : $end_date";
        } else {
            // Scholarship has expired
            echo "Expired";
        }
        ?></div>
														</div>
													</div>

													<div class="course-box">
														<h6 style="text-align:center;"><b><u><?php echo ucwords($scholarship->name); ?></u></b></h6>


													</div>
													<center>
														<a href="<?php echo URLROOT; ?>/student/scholarship/<?php echo $scholarship->id; ?>"> <button type="button" class="btn btn-primary">
																Read More</button></a>
													</center>
													<br>
													<div class="row" style="background-color:#46aaeb;">
														<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
															<div class="thumb-center">
																<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Prize Offer</span><br>
																	<p style="font-size:12px;">
																		Rs <?php echo $scholarship->scholarship_amount; ?> prize<BR>
																	</p>
																</div>

															</div>
														</div>
														<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
															<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Eligibility</span><br>
																<p style="font-size:12px;">
																	<?php echo $scholarship->class_display; ?>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php }
    }else{
    echo "No scholarship available";
} ?>

									</div>
								</div>
								<div class="col-md-2">
									<div class="inbox-sidebar">
										<div class="d-grid gap-2">
											<a href="email_compose.html" class="btn dark" type="button"><i class="fa fa-edit"></i>Featured Scholarships</a>
										</div>
										<div class="row">
											<div class="col-md-6">
												<img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
											</div>
											<div class="col-md-6" style="font-size:12px;">
												Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
											</div>
										</div>
										<hr style="height: 7px;color: white;">
										<div class="row">
											<div class="col-md-6">
												<img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
											</div>
											<div class="col-md-6" style="font-size:12px;">
												Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
											</div>
										</div>
										<hr style="height: 7px;color: white;">
										<div class="row">
											<div class="col-md-6">
												<img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
											</div>
											<div class="col-md-6" style="font-size:12px;">
												Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
											</div>
										</div>
										<hr style="height: 7px;color: white;">
										<div class="row">
											<div class="col-md-6">
												<img class="img-responsive" alt="user" src="../assets/img/course/course2.jpg" style="height:80px;width:100%;margin-top:5vh;">
											</div>
											<div class="col-md-6" style="font-size:12px;">
												Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates impedit exercitationem est.
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
<?php require APPROOT . '/views/inc_student/footer.php'; ?>