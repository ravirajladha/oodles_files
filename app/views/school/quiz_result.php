<?php require APPROOT . '/views/inc_school/header.php'; ?>
	
    <?php 
$adminMod = New Admins;
$schoolMod = New Schools;

	?>
    <!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Quiz Result</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li>
								<li class="active">Result</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="panel tab-border card-box">
								<header class="panel-heading panel-heading-gray custom-tab ">
									<ul class="nav nav-tabs">
										<li class="nav-item"><a href="#home" data-bs-toggle="tab"
												class="active">Practice</a>
										</li>
										
										<li class="nav-item"><a href="#profile" data-bs-toggle="tab">Rapid Fire</a>
										</li>
										
									</ul>
								</header>
								<div class="panel-body">
									<div class="tab-content">
										<div class="tab-pane active" id="home">
										<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
														<!-- <th></th> -->
														<th> Id</th>
														<th> User ID </th>
														<th> User Name </th>
														<th> Score</th>
														<th> % Scored</th>
														<th> Attempt</th>
														<th> Date</th>
														<th> Time</th>
														<th> Action </th>
													</tr>
												</thead>

												<tbody>
													<?php $quiz_score_practice = $schoolMod->get_all_quiz_score(1) ?>
													<?php foreach($quiz_score_practice as $quiz_score) { ?>
														<tr class="odd gradeX">

															<!-- <td class="patient-img">
															<img src="<?php echo URLROOT?>/uploads/<?php echo $webinar->image?>" alt="">
															</td> -->
															<td class="left"><?php echo $quiz_score->id ?></td>
															<td class="left"><?php echo $quiz_score->user_id ?></td>
															<td class="left"><?php
															$user_detail = $adminMod->get_single_student1($quiz_score->user_id);
															
															echo $user_detail->name;?></td>
														
															<td class="left"><?php echo $quiz_score->score ?></td>
															<td class="left"><?php echo round($quiz_score->score_per,2)?>%</td>
															<td class="left"><?php echo $quiz_score->attempt?></td>
														
															<td class="left"><?php echo date('Y-m-d', strtotime( $quiz_score->created_by  ) ) ?></td>
															
															<td class="left"><?php echo date('h:i a', strtotime( $quiz_score->created_by  ) ) ?></td>
															<td>
																<a href="#" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a>
															</td>
														</tr>
													<?php } ?>
															
												</tbody>
											</table>
										</div>
										

										<div class="tab-pane" id="profile">
										<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
														<!-- <th></th> -->
														<th> Id</th>
														<th> User ID </th>
														<th> User Name </th>
														<th> Score</th>
														<th> % Scored</th>
														<th> Attempt</th>
														<th> Date</th>
														<th> Time</th>
														<th> Cost</th>
														<th> Action </th>
													</tr>
												</thead>

												<tbody>
													<?php $quiz_score_practice = $schoolMod->get_all_quiz_score(3) ?>
													<?php foreach($quiz_score_practice as $quiz_score) { ?>
														<tr class="odd gradeX">

															<!-- <td class="patient-img">
															<img src="<?php echo URLROOT?>/uploads/<?php echo $webinar->image?>" alt="">
															</td> -->
															<td class="left"><?php echo $quiz_score->id ?></td>
															<td class="left"><?php echo $quiz_score->user_id ?></td>
															<td class="left"><?php
															$user_detail = $adminMod->get_single_student1($quiz_score->user_id);
															
															echo $user_detail->name;?></td>
														
															<td class="left"><?php echo $quiz_score->score ?></td>
															<td class="left"><?php echo round($quiz_score->score_per,2)?>%</td>
															<td class="left"><?php echo $quiz_score->attempt?></td>
														
															<td class="left"><?php echo date('Y-m-d', strtotime( $quiz_score->created_by  ) ) ?></td>
															
															<td class="left"><?php echo date('h:i a', strtotime( $quiz_score->created_by  ) ) ?></td>
															<td class="left">
																<i class="fa fa-inr"></i><?php
																$get_quiz_detail = $adminMod->get_single_quizes_i($quiz_score->quiz_id);
															echo $get_quiz_detail->quiz_cost; 
																?>
															</td>
															<td>
																<a href="#" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a>
															</td>
														</tr>
													<?php } ?>
															
												</tbody>
											</table>
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
