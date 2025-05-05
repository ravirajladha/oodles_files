<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;
$quiz_results = $data['quiz_results'];
$get_distinct_user_results = $data['get_distinct_user_results'];

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
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quiz_practice_result">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
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
  	<div class="uppercase profile-stat-title"> Total Students: <span style="color:#000;"><?php echo $get_distinct_user_results->distinct_count; ?></span>
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
									
									<!-- <th>Entry Fee</th> -->
									<th>Quiz %</th>
									<th>Quiz Score</th>
									<th>Quiz Taken At</th>
									<th>Time Used</th>
                                    <th>Attempts</th>
									<th>Points Earned</th>
									<th>Coins Earned</th>
									<th>Pass/Fail</th>
									<!-- <th>Won/Lost</th> -->
									<!-- <th>Amount Won</th> -->
									<!-- <th>Amount Dispersed At</th> -->
									<th>IP Address</th>
									<!-- <th>Status</th> -->
								




								</tr>
							</thead>
							<tbody>
								<?php
								$count = 0;
								foreach ($quiz_results as $quiz_result) {

									$get_transactions = $adminMod->get_transactions($quiz_result->user_id,$quiz_result->quiz_id,$quiz_result->created_by); 
									$count++;
									
									?>
										<tr>
											<td><?php echo $count; ?></td>
											<td><?php  $get_student_detail= $adminMod->get_auth_detail($quiz_result->user_id); 
											echo ucwords($get_student_detail->name);?></td>
											
									
											<td><?php echo  ($quiz_result->score_per); ?></td>
											<td><?php echo $quiz_result->total_score; ?></td>

											<td><?php echo $quiz_result->created_by; ?></td>
                                            
											<td><?php echo $quiz_result->time_taken; ?></td>
                                            <td><?php echo $quiz_result->current_attempt; ?></td>
											
											<td><?php echo  ($quiz_result->coins_earned); ?></td>
											<td><?php
											$coins_earned = (intval($quiz_result->coins_earned)*5)/100;
											echo  ($coins_earned); ?></td>
											<td><?php if ($quiz_result->pass == 1) {
													echo "Pass";
												} else {
													echo "Fail";
												} ?></td>
                                                <td>
												<?php if($quiz_result->ip != Null || $quiz_result->ip != ''){echo $quiz_result->ip;}else{
    echo "--";
} ?> </td>
											

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