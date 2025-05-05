<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<style>
	.subreddit-table-wrapper {
		overflow: auto;
		height: 600px;
	}

	.subreddit-table-wrapper thead th {
		box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.05);
		position: sticky;
		top: 0;
		background: white;
	}

	.subreddit-table-wrapper td:first-child,
	.subreddit-table-wrapper th:first-child {
		position: sticky;
		left: 0;
		z-index: 1;
	}


	td:nth-child(9),
	td:nth-child(16),
	td:nth-child(23),
	td:nth-child(30) {
		background-color: #ff8080 !important;
	}
</style>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<div class="page-titles">
			<div class="row">
				<!-- <div class="col-md-3">
						<h4>Attendance</h4>
						</div> -->
				<div class="col-md-3">
					<div class="basic-form">

						<div class="input-group mb-3">
							<button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Attendance</button>
							<div class="dropdown-menu">
							<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_september">September</a>
								<div role="separator" class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_august">August</a>
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_june">June</a>
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_july">July</a>


							</div>

						</div>


					</div>
				</div>
				<div class="col-md-9">
					<button style="float:right" class="btn btn-success btn-search" onclick="ExportToExcel('xlsx')">Export</button>
				</div>
			</div>



		</div>
		<!-- row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">

					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-striped custom-table table-nowrap mb-0" id="tbl_exporttable_to_xls">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee</th>
										<th claass="bg-success">1<br>Mo</th>
										<th>2<br>Tu</th>
										<th>3<br>We</th>
										<th>4<br>Th</th>
										<th>5<br>Fr</th>
										<th>6<br>Sa</th>
										<th>7<br>Su</th>
										<th>8<br>Mo</th>
										<th>9<br>Tu</th>
										<th>10<br>We</th>
										<th>11<br>Th</th>
										<th>12<br>Fr</th>
										<th>13<br>Sa</th>
										<th>14<br>Su</th>
										<th>15<br>Mo</th>
										<th>16<br>Tu</th>
										<th>17<br>We</th>
										<th>18<br>Th</th>
										<th>19<br>Fr</th>
										<th>20<br>Sa</th>
										<th>21<br>Su</th>
										<th>22<br>Mo</th>
										<th>23<br>Tu</th>
										<th>24<br>We</th>
										<th>25<br>Th</th>
										<th>26<br>Fr</th>
										<th>27<br>Sa</th>
										<th>28<br>Su</th>
										<th>29<br>Mo</th>
										<th>30<br>Tu</th>
										<th>31<br>We</th>


										<th>Working Day's</th>
										<th>Total Sunday's</th>
										<th>Total Holiday's</th>
										<th>Casual Leave</th>
										<th>Sick Leave</th>
										<th>Earned Leave</th>
										<th>OD</th>
										<th>LOP</th>
										<th>Payable Days</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$model = new Page;
									foreach ($data['users'] as $user) { ?>
										<tr>
											<td style="max-width:300px">
												<?php echo $user->mec_id; ?>
											</td>
											<td style="max-width:300px">
												<?php echo $user->employee_name ?>
											</td>
											<?php
											$present_days = 0;
											$absent_days = 0;
											$cl_days = 0;
											$sl_days = 0;
											$el_days = 0;
											$od_days = 0;
											$holiday = 0;
											$sunday_days = 0;
											$begin = new DateTime("2022-08-01");
											$end= new DateTime( "2022-08-31" );
											// $end   = new DateTime(date("Y-m-d"));

											for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
												$cur_date = $i->format("Y-m-d");
												$attend = $model->get_attendance_date($user->mec_id, $cur_date);
												if ($attend && !(date('w', strtotime($cur_date)) % 7 == 0)) {
													$present_days++;
											?>
													<td><a href="<?php echo URLROOT; ?>/hr/delete_attendance/<?php echo $attend->id; ?>" data-bs-target="#attendance_info"><i class="text-success">P</i></a></td>
													<!-- <td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-success">P</i></a></td> -->
												<?php } elseif ($cl_accepted = $model->select_cl_date($user->mec_id, $cur_date)) {
													$cl_days++;
												?>
													<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">CL</i></a></td>
												<?php } elseif ($el_accepted = $model->select_el_date($user->mec_id, $cur_date)) {
													$el_days++;
												?>
													<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">EL</i></a></td>
												<?php } elseif ($sl_accepted = $model->select_sl_date($user->mec_id, $cur_date)) {
													$sl_days++;
												?>
													<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">SL</i></a></td>
												<?php } elseif ($od_accepted = $model->select_od_date($user->mec_id, $cur_date)) {
													$od_days++;
												?>
													<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">OD</i></a></td>
													<?php } else {
													if (date('w', strtotime($cur_date)) % 7 == 0) {
														$sunday_days++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">S</i></a></td>
													<?php 	} elseif (strtotime($cur_date) == strtotime("2022-08-15")) {
														$holiday++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">H</i></a></td>
													<?php 	} elseif (strtotime($cur_date) == strtotime("2022-08-30")) {
														$holiday++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">H</i></a></td>
													<?php 	} elseif (strtotime($cur_date) == strtotime("2022-08-31")) {
														$holiday++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">H</i></a></td>
													<?php 	} else {

														$absent_days++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">A</i></a></td>
													<?php } ?>
												<?php } ?>

											<?php }
											for ($i = 0; $i < 0; $i++) {
												echo "<td></td>";
											}
											?>

											<?php $working_days = 31; ?>
											<td><?php echo $working_days; ?></td>
											<td>4</td>
											<td><?php echo $holiday ?></td>

											<?php $salary_detail = $model->get_salary($user->mec_id) ?>

											<?php
											$start_date = '2022-08-01';
											$end_date = '2022-08-31';
											?>
											<td><?php echo $cl_days ?></td>
											<td><?php echo $sl_days ?></td>
											<td><?php echo $el_days ?></td>
											<td><?php echo $od_days ?></td>
											<td><?php echo $absent_days ?></td>
											<td><?php echo ($working_days - $absent_days) ?></td>

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
<!--**********************************
            Content body end
        ***********************************-->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>


<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
	function ExportToExcel(type, fn, dl) {
		var elt = document.getElementById('tbl_exporttable_to_xls');
		var wb = XLSX.utils.table_to_book(elt, {
			sheet: "sheet1"
		});
		return dl ?
			XLSX.write(wb, {
				bookType: type,
				bookSST: true,
				type: 'base64'
			}) :
			XLSX.writeFile(wb, fn || ('mecwin_attendance.' + (type || 'xlsx')));
	}
</script>