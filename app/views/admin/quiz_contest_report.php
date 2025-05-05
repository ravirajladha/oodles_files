<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;
$get_all_registered_student = $data['get_all_registered_student'];
$quiz_id = $data['quiz_id'];
$get_quiz_detail = $data['get_quiz_detail'];
$get_prize_pool_detail = $data['get_prize_pool_detail'];
$count_of_registered_student = $data['count_of_registered_student'];

?>
<link href="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Result</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quiz_contest_result">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Result</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card">
					<div class="card-head">
						<header>Quiz</header>
					</div>
					<div class="card-body no-padding height-9" style="border: 3px groove;">
					

						<div class="row list-separated profile-stat">

						<div class="center" style="text-align: center;">
  	<div class="uppercase profile-stat-title"> Total Slots: <span style="color:#000;"><?php echo $count_of_registered_student; ?>/ <?php echo $get_prize_pool_detail->no_of_participants; ?> </span></div>
  	<div class="uppercase profile-stat-title"> Amount Collected: <span style="color:#000;"><?php echo $get_prize_pool_detail->entry_fee*$count_of_registered_student; ?></span></div>

</div>
							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title">  Money Dispersed At</div>
								<div class="uppercase profile-stat-text"> <span style="color:#000;"><?php if($get_quiz_detail->disperse==0){ 
									echo "Pending";
								}else{
									echo $get_quiz_detail->dispersed_at; 
								 } ?>
									</span>
									</div>
							</div>
							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title"> Total Amount Dispersed </div>
						
								<div class="uppercase profile-stat-text"> <span style="color:#000;"><?php if($get_quiz_detail->disperse==0){ 
									echo "Pending";
								}else{
									echo "Rs. ".$get_quiz_detail->total_amount_dispersed; 
									 } ?></span>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title"> Total Students Won </div>
					
								<div class="uppercase profile-stat-text"> <span style="color:#000;"><?php if($get_quiz_detail->disperse==0){ 
									echo "Pending";
								}else{
									echo $get_quiz_detail->student_count; 
									} ?></span>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Quiz Report</header>
					</div>
					<div class="card-body " id="bar-parent">
						<div class="table-responsive">

						
						<table id="exportTable" class="display nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Id </th>
									<th>Student Name</th>
									<th>Registered At</th>
									<th>Entry Fee</th>
									<th>Quiz %</th>
									<th>Quiz Score</th>
									<th>Quiz Taken At</th>
									<th>Time Used</th>

									<th>Pass/Fail</th>
									<th>Won/Lost</th>
									<th>Amount Won</th>
									<th>Amount Dispersed At</th>
									<th>IP Address</th>
									<th>Status</th>
								




								</tr>
							</thead>
							<tbody>
								<?php
								$count = 0;
								foreach ($get_all_registered_student as $get_all_student) {

									$count++;
									$get_student_result = $adminMod->get_quiz_result_studentwise($get_all_student->student_id, $quiz_id);
									if (($get_student_result)) { ?>
										<tr>
											<td><?php echo $count; ?></td>
											<td><?php  $get_student_detail= $adminMod->get_auth_detail($get_all_student->student_id); 
											echo ucwords($get_student_detail->name);?></td>
											<td><?php echo $get_all_student->created_at; ?></td>
											<td><?php echo $get_prize_pool_detail->entry_fee; ?></td>
									
											<td><?php echo  ($get_student_result->score_per); ?></td>
											<td><?php echo $get_student_result->accumulated_score; ?></td>

											<td><?php echo $get_student_result->created_by; ?></td>
											<td><?php echo $get_student_result->time_taken; ?></td>
											<td><?php if ($get_student_result->pass == 1) {
													echo "Pass";
												} else {
													echo "Fail";
												} ?></td>
											<?php if ($get_quiz_detail->disperse == 0) { ?>
												<td><?php echo 'Pending' ?></td>
												<td><?php echo 'Pending' ?></td>
												<td><?php echo "Pending" ?></td>
											<?php } else { ?>
												<?php if($get_student_result->contest_won==1){ ?>
													<td style="color:green;"><?php echo 'Won'; ?></td>
												<td><?php echo $get_student_result->contest_amount; ?></td>
												<td><?php echo $get_quiz_detail->dispersed_at; ?></td>
													<?php }else{ ?>
														<td><?php echo 'Lost'; ?></td>
											<td>0</td>
											<td>0000-00-00 00:00:00</td>
										
												
												<?php  } ?>
												
											<?php } ?>

											<td>
												<?php if($get_student_result->ip != Null || $get_student_result->ip != ''){echo $get_student_result->ip;}else{
    echo "--";
} ?> </td>
												<td><?php if($get_student_result->ip != Null || $get_student_result->ip != ''){echo "Verified";}else{
    echo "Unattended";
} ?>
													</td>

										</tr>
									<?php } else { ?>
										<tr>
											<td><?php echo $count; ?></td>
											<td><?php  $get_student_detail= $adminMod->get_auth_detail($get_all_student->student_id); 
											echo ucwords($get_student_detail->name);?></td>
											<td><?php echo $get_all_student->created_at; ?></td>
											<td><?php echo $get_prize_pool_detail->entry_fee; ?></td>
											<td>-</td>
											<td>-</td>

											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
										</tr>
									<?php } ?>


								<?php } ?>



							</tbody>
							<!-- <tfoot>
														<tr>
															<th>Id</th>
															<th>Title</th>
															<th>File Present</th>
															<th>Created Date</th>
														</tr>
													</tfoot> -->
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>



	</div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone-call.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/dataTables.buttons.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.flash.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/jszip.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/pdfmake.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/vfs_fonts.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.html5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.print.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>