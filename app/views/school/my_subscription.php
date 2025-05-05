<?php require APPROOT . '/views/inc_school/header.php'; ?> 
<?php $my_plan = $data['get_subscribed_plan_detail'];
$adminMod = new Admins;
$get_school_plan = $adminMod->get_selected_school_plan($my_plan->plan);
$get_school_wallet= $data['get_school_wallet'];
?>

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">My Subscription</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Students</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">My Subscription</li>
							</ol>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<!-- <div class="profile-sidebar"> -->
					<div class="card">
									<div class="card-head">
										<header>Plan Details</header>
									</div>
									<div class="card-body no-padding height-9">
										<div class="profile-desc text-center" >
									<h3>
										
									<?php if(isset($get_school_plan->name)){echo ucwords($get_school_plan->name);}else{ echo "Please contact Admin to buy Premium Membership!";}?>
										</h3>
										</div>
										<ul class="list-group list-group-unbordered">
											<li class="list-group-item">
												<b>Start Date </b>
												<div class="profile-desc-item pull-right">
													<?php if(isset($my_plan->start_date)){ ?>
														<?php echo date("d/m/Y", strtotime( $my_plan->start_date )); ?>
												<?php 	}else{ ?>
													<?php echo 'N/A' ?>
											<?php 	} ?>
												</div>
											</li>
											<li class="list-group-item">
												<b>End Date </b>
												<div class="profile-desc-item pull-right">
												<?php if(isset($my_plan->end_date)){ ?>
												<?php echo date("d/m/Y", strtotime( $my_plan->end_date )); ?>
												<?php 	}else{ ?>
													<?php echo 'N/A' ?>
											<?php 	} ?>
											</div>
											</li>
											<li class="list-group-item">
												<b>Amount Collected</b>
												<div class="profile-desc-item pull-right">Rs.
												<?php if(isset($my_plan->amount)){ ?>
												<?php echo $my_plan->amount; ?>
											<?php }else{ 
												 echo 'N/A' ;
											} ?>
											</div>
											</li>
											<li class="list-group-item">
												<b>Subscribed At</b>
												<div class="profile-desc-item pull-right">
													
												<?php if(isset($my_plan->created_at)){ ?>
												<?php echo  date('d M Y, H.i.s A', strtotime($my_plan->created_at)); ?>
												<?php 	}else{ ?>
													<?php echo 'N/A' ?>
											<?php 	} ?>
											
											</div>
											</li>
										</ul>
										<div class="row list-separated profile-stat">
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title">
												<?php if(isset($get_school_wallet->quiz_balance)){
												 echo $get_school_wallet->quiz_balance; 
												}else{
													echo '0';
												}
													?> </div>
												<div class="uppercase profile-stat-text"> Quiz Balance </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> <?php if(isset($get_school_wallet->teacher_balance)){
												 echo $get_school_wallet->teacher_balance; 
												}else{
													echo '0';
												} ?></div>
												<div class="uppercase profile-stat-text"> Teacher Balance </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"><?php if(isset($get_school_wallet->quiz_created)){
												 echo $get_school_wallet->quiz_created; 
												}else{
													echo '0';
												} ?> </div>
												<div class="uppercase profile-stat-text"> Quiz Created </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> <?php if(isset($get_school_wallet->teacher_created)){
												 echo $get_school_wallet->teacher_created; 
												}else{
													echo '0';
												} ?> </div>
												<div class="uppercase profile-stat-text"> Teacher Created </div>
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
			<?php require APPROOT . '/views/inc_school/footer.php'; ?> 