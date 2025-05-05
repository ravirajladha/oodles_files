<?php require APPROOT . '/views/inc_hr/header.php'; ?>

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


	td:nth-child(8),
	td:nth-child(15),
	td:nth-child(22),
	td:nth-child(29) {
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
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_november">November</a>
								<div role="separator" class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_october">October</a>
								<a class="dropdown-item" href="<?php echo URLROOT ?>/hr/p_attendance_september">September</a>
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
						<div class="table-responsive att-table subreddit-table-wrapper">
							<table class="table table-striped custom-table table-nowrap mb-0" id="tbl_exporttable_to_xls">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee</th>
										<th claass="bg-success">1<br>Tu</th>
										<th>2<br>We</th>
										<th>3<br>Th</th>
										<th>4<br>Fr</th>
										<th>5<br>Sa</th>
										<th>6<br>Su</th>
										<th>7<br>Mo</th>
										<th>8<br>Tu</th>
										<th>9<br>We</th>
										<th>10<br>Th</th>
										<th>11<br>Fr</th>
										<th>12<br>Sa</th>
										<th>13<br>Su</th>
										<th>14<br>Mo</th>
										<th>15<br>Tu</th>
										<th>16<br>We</th>
										<th>17<br>Th</th>
										<th>18<br>Fr</th>
										<th>19<br>Sa</th>
										<th>20<br>Su</th>
										<th>21<br>Mo</th>
										<th>22<br>Tu</th>
										<th>23<br>We</th>
										<th>24<br>Th</th>
										<th>25<br>Fr</th>
										<th>26<br>Sa</th>
										<th>27<br>Su</th>
										<th>28<br>Mo</th>
										<th>29<br>Tu</th>
										<th>30<br>We</th>

										<th>Working Day's</th>
										<th>Total Sunday's</th>
										<th>Total Holiday's</th>
										<th>Casual Leave</th>
										<th>Sick Leave</th>
										<th>Earned Leave</th>
										<th>OD</th>
										<th>LOP</th>
										<th>Payable Days</th>
										<th>Location</th>
										<th>Punch In Time</th>
										<th>Punch Out Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$model = new Page;
									foreach ($data['users'] as $user) { ?>
										<tr>
											<td style="max-width:300px">
												<h2 class="table-avatar"> <?php echo $user->mec_id; ?></h2>
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
											$begin = new DateTime("2022-11-01");
											// $end= new DateTime( "2022-10-31" );
											$end   = new DateTime(date("Y-m-d"));
											$match = 0;
										


											// getting attendnace time end
											for ($i = $begin; $i <= $end; $i->modify('+1 day')) {

												$cur_date = $i->format("Y-m-d");
												$attend = $model->get_attendance_date($user->mec_id, $cur_date);
												if ($attend && (strtotime($attend->start_time) > strtotime("08:35:00"))) { 
													$absent_days = $absent_days+0.5;
													$present_days = $present_days+0.5;
													$today_date = date("Y-m-d");
													if ($cur_date == $today_date) {
														$match = 1;
													} else {
														$match = 0;
													}
													
													?>
												
													<td><a href="<?php echo URLROOT; ?>/hr/delete_attendance/<?php echo $attend->id; ?>" data-bs-target="#attendance_info"><i class="text-success">A<sup>P</sup></i></a></td>
											
												<?php }elseif ($attend && (strtotime($start_time) < strtotime("08:35:00"))) { 
													$present_days++;
													$today_date = date("Y-m-d");
													if ($cur_date == $today_date) {
														$match = 1;
													} else {
														$match = 0;
													}
													?>
												
												<td><a href="<?php echo URLROOT; ?>/hr/delete_attendance/<?php echo $attend->id; ?>" data-bs-target="#attendance_info"><i class="text-success">P</i></a></td>
											
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
													<?php } elseif ($lop_accepted = $model->select_lop_date($user->mec_id, $cur_date)) {
													$present_days++;
												?>
													<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-primary">LOP</i></a></td>
													<?php } else {
													if (date('w', strtotime($cur_date)) % 7 == 0) {
														$sunday_days++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">S</i></a></td>
													<?php 	} else {
														$absent_days++; ?>
														<td><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#attendance_info"><i class="text-danger">A</i></a></td>
													<?php } ?>
												<?php } ?>

											<?php }
											for ($i = 0; $i < 22; $i++) {
												echo "<td></td>";
											}
											?>

											<?php $working_days = 30; ?>
											<td><?php echo $working_days; ?></td>
											<td><?php echo 4; ?></td>
											<td><?php echo $holiday ?></td>

											<?php $salary_detail = $model->get_salary($user->mec_id) ?>

											<?php
											$start_date = '2022-11-01';
											$end_date = '2022-11-30';
											?>
											<td><?php echo $cl_days ?></td>
											<td><?php echo $sl_days ?></td>
											<td><?php echo $el_days ?></td>
											<td><?php echo $od_days ?></td>
											<td><?php echo $absent_days ?></td>
											<td><?php echo ($working_days - $absent_days) ?></td>
											<td><?php if ($match == 1) {
													echo "Bangalore West";
												} else {
													echo "Nill";
												} ?></td>
											<td>
												<?php
												$pageMod = new Page;
												$attendance_count = 0;
												$last_attendance_time = "Nill";
												// Any last attendance will give the punch out detail
												$get_today_attendance = $pageMod->get_today_attendance($user->mec_id);
												// This will give the first attendance of the day
												$get_first_attendance = $pageMod->get_first_attendance($user->mec_id);
												foreach ($get_today_attendance as $today_attendance) {
													$attendance_count++;
													$last_attendance_time = $today_attendance->start_time;
												}

												if (!empty($get_first_attendance)) {
													echo $get_first_attendance->start_time;
												} else {
													echo "Nill";
												}

												?>
											</td>
											<td>

												<?php
												if ($attendance_count % 2 == 0) {
													echo $last_attendance_time;
												} else {
													echo "Nill";
												} ?>
											</td>
										</tr>

									<?php
									}
									?>

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

<?php require APPROOT . '/views/inc_hr/footer.php'; ?>


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