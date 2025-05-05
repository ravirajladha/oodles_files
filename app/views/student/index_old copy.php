<?php require APPROOT . '/views/inc_student/header.php'; ?> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
 <?php if(!isset($_SESSION['show_refferal_modal'])) {?> 
<script>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
<?php unset($_SESSION['show_refferal_modal']); ?>
<?php } ?> 
<style>
.modal .modal-popout-bg {
    background-image: url("<?php echo URLROOT?>/assets/img/pages/referral.jpg");
}
	</style>
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content modal-popout-bg">
								<div class="modal-header">
									<h5 class="modal-title" id="addEventTitle">Welcome to OodlesIN Portal</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>

								<?php if(($data['get_auth_detail']->referred_by)==0){?>
								<div class="modal-body">
									<form class="" action="<?php echo URLROOT?>/student/redeem_referral_code/index" method="POST">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Enter Referral Code"
															name="referral_code" id="title" style="opacity:0.8;">
													</div>
												</div>
											</div>
										</div>
					
				
										
										<div class="modal-footer bg-whitesmoke pr-0">
											<button type="submit" class="btn btn-round btn-primary" id="add-event">Verify</button>
										
										</div>

									</form>
								</div>

								<?php }else{ ?>
									<h3 class="glow"> You have already redemmed the referral code once! <br/> Refer your friends to earn free coins</h4>
									<?php  } ?>
							</div>
						</div>
					</div>
					<!-- Modal end -->
					<?PHP 
				unset($_session['show_refferal_modal']);
?>
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Dashboard</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT?>/student">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- start widget -->
					<div class="row">
						<div class="col-xl-5">
							<div class="w-100">
								<div class="row">

									<div class="col-sm-6">
										<div class="card bg-b-green">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title ">Total Score</h4>
													</div>
													<div class="col-auto">
														<div class="l-bg-green info-icon">
															<i class="fa fa-users pull-left col-orange font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">4,586</h1>
												<div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														10.32%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card bg-b-yellow">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Rank India</h4>
													</div>
													<div class="col-auto">
														<div class="col-indigo info-icon">
															<i class="fa fa-book pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">103</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i
															class="material-icons col-red align-middle">trending_down</i>
														-10.64%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card bg-b-blue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">My Scholarship</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">32</h1>
												<div class="mb-0">
													
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
										<div class="card bg-b-pink">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Total Quizes</h4>
													</div>
													<div class="col-auto">
														<div class="col-pink info-icon">
															<i class="fa fa-coffee pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">2,352</h1>
												<div class="mb-0">
													<span class="text-danger m-r-10"><i
															class="material-icons col-red align-middle">trending_down</i>
														-4.27%
													</span>
													<span class="text-muted">Since last week</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<div class="card card-box">
								<div class="card-head">
									<header>Analytical Chart</header>
									<div class="tools">
										<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
										<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
										<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
									</div>
								</div>
								<div class="card-body no-padding height-9">
									<div class="row">
										<canvas id="bar-chart" height="300"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- end widget -->
					
				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_student/footer.php'; ?> 