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
				
					<li class="active">Overall Rankings</li>
				</ol>
			</div>
		</div>
		<div class="row">
						<div class="col-xl-12">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-4">
										<div class="card bg-b-green">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title ">All India Rank</h4>
													</div>
													<div class="col-auto">
														<div class="l-bg-green info-icon">
															<i class="fa fa-users pull-left col-orange font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">4,586</h1>
												<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														10.32%
													</span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
								
									</div>
									<div class="col-sm-4">
										<div class="card bg-b-blue">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">State Wise Rank</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">32</h1>
												<!-- <div class="mb-0">
													
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
									
									</div>
									<div class="col-sm-4">
										<div class="card bg-b-pink">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h4 class="info-box-title">Class Wise Rank</h4>
													</div>
													<div class="col-auto">
														<div class="col-teal info-icon">
															<i class="fa fa-user pull-left card-icon font-30"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3 info-box-title">32</h1>
										
											</div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
					
					</div>
		<div class="state-overview">
		<div class="row">
		    <div class="col-md-4">
		        <div class="card border-info mb-3 text-center">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseSECOND">
                	<h5 class="card-title text-dark">State Level Ranking</h5>
                	<h6 class="card-subtitle mb-2 text-muted">Top 10</h6>
                	</a>
                  </div>
                  <div id="collapseSECOND" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                		<table class="table table-hover group table-striped">
                			<table class="table table-hover group table-striped">
                				<tbody>   
								<?php foreach ($data['quiz_ranking_state_wise'] as $ranking) { ?>
									<?php
									$studentMod = new Students;
									$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
									?>
									
                				  <tr>
                					<td>Title:<?php echo $get_user_detail->f_name; ?></td>
                					<td>Score: <?php echo $ranking->total_score; ?></td>
                				 </tr>
                						<?php } ?>
                						
                					<!-- <tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                				
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr> -->
                				</tbody>
                				</table>         
                		          
                	     <div class="card-footer text-muted">
                		 	
                		 </div>
                 	</div>
                  </div>
                </div>
		    </div>
		    <div class="col-md-4">
		        <div class="card border-info mb-3 text-center">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseSECOND">
                	<h5 class="card-title text-dark">Class Level Ranking</h5>
                	<h6 class="card-subtitle mb-2 text-muted">Top 10</h6>
                	</a>
                  </div>
                  <div id="collapseSECOND" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                		<table class="table table-hover group table-striped">
                			<table class="table table-hover group table-striped">
                				<tbody>   
								<?php foreach ($data['quiz_ranking_course_wise'] as $ranking) { ?>
									<?php
									$studentMod = new Students;
									$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
									?>
									
                				  <tr>
                					<td>Title:<?php echo $get_user_detail->f_name; ?></td>
                					<td>Score: <?php echo $ranking->total_score; ?></td>
                				 </tr>
                						<?php } ?>
                					<!-- <tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                				
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr> -->
                				</tbody>
                				</table>         
                		          
                	     <div class="card-footer text-muted">
                		 	
                		 </div>
                 	</div>
                  </div>
                </div>
		    </div>
		    <div class="col-md-4">
		        <div class="card border-info mb-3 text-center">
                  <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseSECOND">
                	<h5 class="card-title text-dark">All India Ranking</h5>
                	<h6 class="card-subtitle mb-2 text-muted">Top 10</h6>
                	</a>
                  </div>
                  <div id="collapseSECOND" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                		<table class="table table-hover group table-striped">
                			<table class="table table-hover group table-striped">
                				<tbody>   
                				<?php foreach ($data['quiz_ranking_country_wise'] as $ranking) { ?>
									<?php
									$studentMod = new Students;
									$get_user_detail  = $studentMod->get_single_student($ranking->user_id);
									?>
									
                				  <tr>
                					<td>Name:<?php echo $get_user_detail->f_name; ?></td>
                					<td>Score: <?php echo $ranking->total_score; ?></td>
                				 </tr>
                						<?php } ?>
                						
                					<!-- <tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                			
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr>
                				
                					<tr>
                					<td>Title:</td>
                					<td>Value</td>
                				 </tr> -->
                				</tbody>
                				</table>         
                		          
                	     <div class="card-footer text-muted">
                		 	
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
<?php require APPROOT . '/views/inc_student/footer.php'; ?>