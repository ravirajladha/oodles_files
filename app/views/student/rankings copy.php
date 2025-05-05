<?php require APPROOT . '/views/inc_student/header.php'; ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Overall Rankings</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">UI Elements</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Overall Rankings</li>
				</ol>
			</div>
		</div>
		<div class="state-overview">
			<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-3 col-3">
					<div class="card card-box">
						<div class="card-head">
							<header>Country Based</header>
						</div>
						<div class="card-body">
							<div class="row">
								<ul class="docListWindow small-slimscroll-style">
									<?php foreach ($data['quiz_ranking_country_wise'] as $ranking) { ?>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/user/user1.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#"><?php echo $ranking->user_id; ?>
												</div>
												<div>
													<span class="clsAvailable"><?php echo $ranking->total_score; ?></span>
												</div>
											</div>
										</li>
									<?php } ?>



								</ul>
								<!-- <div class="full-width text-center p-t-10">
											<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
										</div> -->
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-3">
					<div class="card card-box">
						<div class="card-head">
							<header>State Based</header>
						</div>
						<div class="card-body">
							<div class="row">
								<ul class="docListWindow small-slimscroll-style">
									<?php foreach ($data['quiz_ranking_state_wise'] as $ranking) { ?>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/user/user1.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#"><?php echo $ranking->user_id; ?>
												</div>
												<div>
													<span class="clsAvailable"><?php echo $ranking->total_score; ?></span>
												</div>
											</div>
										</li>
									<?php } ?>



								</ul>
								<!-- <div class="full-width text-center p-t-10">
											<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
										</div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-3">
					<div class="card card-box">
						<div class="card-head">
							<header>School/College Based</header>
						</div>
						<div class="card-body">
							<div class="row">
								<ul class="docListWindow small-slimscroll-style">
									<?php foreach ($data['quiz_ranking_academic_wise'] as $ranking) { ?>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/user/user1.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#"><?php echo $ranking->user_id; ?>
												</div>
												<div>
													<span class="clsAvailable"><?php echo $ranking->total_score; ?></span>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul>
								<!-- <div class="full-width text-center p-t-10">
											<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
										</div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-3">
					<div class="card card-box">
						<div class="card-head">
							<header>Class Based</header>
						</div>
						<div class="card-body">
							<div class="row">
								<ul class="docListWindow small-slimscroll-style">
									<?php foreach ($data['quiz_ranking_course_wise'] as $ranking) { ?>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/user/user1.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#"><?php echo $ranking->user_id; ?>
												</div>
												<div>
													<span class="clsAvailable"><?php echo $ranking->total_score; ?></span>
												</div>
											</div>
										</li>
									<?php } ?>



								</ul>
								<!-- <div class="full-width text-center p-t-10">
											<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
										</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc_student/footer.php'; ?>