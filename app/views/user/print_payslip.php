<?php require APPROOT . '/views/inc_user/header.php'; ?>
<!-- Preloader end-->

<!-- Header -->
<header class="header">
	<div class="main-bar">
		<div class="container">
			<div class="header-content">
				<div class="left-content">
					<a href="javascript:void(0);" class="back-btn">
						<svg width="18" height="18" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z" fill="#a19fa8" />
						</svg>
					</a>
				</div>
				<div class="mid-content">
					<h5 class="mb-0">Payslip</h5>
				</div>
				<div class="right-content">
					<a href="javascript:void(0);" class="menu-toggler">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8" />
							<path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8" />
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Header End -->

<!-- Sidebar -->
<!-- <?php require APPROOT . '/views/inc_user/navbar_user.php'; ?> -->
<!-- Sidebar End -->


<?php
$employee = $data['employee'];
$salary = $data['salary'];
?>


<?php
$model = new Page;
$start_date = '2022-08-01';
$end_date = '2022-08-31';
// $diff=abs( strtotime($end_date)-strtotime($start_date));
// $payable_days = "$diff[mday]";

$leave_cl_detail = $model->get_count_cl($employee->mec_id, $start_date, $end_date);
$leave_el_detail = $model->get_count_el($employee->mec_id, $start_date, $end_date);
$leave_sl_detail = $model->get_count_sl($employee->mec_id, $start_date, $end_date);
$leave_od_detail = $model->get_count_od($employee->mec_id, $start_date, $end_date);


$present_days = 0;
$absent_days = 0;
$cl_days = 0;
$sl_days = 0;
$el_days = 0;
$od_days = 0;
$sunday_days = 0;
$begin1 = new DateTime("2022-08-01");
$end1   = new DateTime("2022-08-31");
//  $payable_days = $end1-$begin1;
for ($i = $begin1; $i <= $end1; $i->modify('+1 day')) {
	$cur_date = $i->format("Y-m-d");
	$attend1 = $model->get_attendance_date($employee->mec_id, $cur_date);
	if ($attend1) {
		$present_days++;
?>
		<?php } elseif ($cl_accepted = $model->select_cl_date($employee->mec_id, $cur_date)) {
		$cl_days++;
	} elseif ($el_accepted = $model->select_el_date($employee->mec_id, $cur_date)) {
		$el_days++;
	} elseif ($sl_accepted = $model->select_sl_date($employee->mec_id, $cur_date)) {
		$sl_days++;
	} elseif ($od_accepted = $model->select_od_date($employee->mec_id, $cur_date)) {
		$od_days++;
	} else {
		if (date('w', strtotime($cur_date)) % 7 == 0) {
			$sunday_days++; ?>

		<?php     } else {

			$absent_days++; ?>

		<?php } ?>
	<?php } ?>
<?php } ?>
<?php $lop_days = $absent_days ?>
<?php
$payable_days = 31 - $lop_days;
$lop_amount = ($salary->Earned_Gross / 31) * ($lop_days);
$lop_amount = round($lop_amount);
$total_deduction = $salary->Total_Deduction + $lop_amount;
$net_pay = $salary->Earned_Gross - $total_deduction;
?>
<?php $salary_detail = $model->get_salary($employee->mec_id);
$remaining_cl = $salary_detail->cl;
$remaining_el = $salary_detail->el;
$remaining_sl = $salary_detail->sl;
$total_pending_leaves = $remaining_cl + $remaining_el + $remaining_sl;
?>



<div class="col-sm-6 p-md-0">
	<div class="welcome-text">
		<a target="_BLANK" href="<?php echo URLROOT; ?>/user/print_payslip/<?php echo $employee->mec_id; ?>"> <button type="button" class="btn btn-primary"><i class="fa fa-print fa-lg"></i>Print</button></a>
	</div>
</div>
<div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Employer</a></li>
		<li class="breadcrumb-item active"><a href="javascript:void(0)">Payslip</a></li>
	</ol>
</div>
</div>
<div class="row">
	<div class="col-lg-12">

		<div class="card">
			<div class="card-header center">
				<p style="text-align:center;"> Payslip for the month of August, 2022</p>
			</div>
			<div class="card-body">
				<div class="row mb-5">
					<div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
						<h6>From:</h6>
						<div> <strong>Mecwin Technologies</strong> </div>
						<div>91/1, Kanakadasa Layout</div>
						<div>3, Seegehally, Off Magadi Main Rd</div>
						<div>Bengaluru, Karnataka 560091</div>
					</div>
					<div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">

					</div>
					<div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
						<div class="row align-items-center">
							<div class="col-sm-9">
								<div class="brand-logo mb-3">
									<img class="logo-abbr me-2" src="<?php echo URLROOT; ?>/assets_admin/logo.webp" alt="">

								</div>


							</div>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div>
							<h5>Bank Details</h5>
							<div class="table">
								<table class="table header-border table-responsive-sm">
									<tbody>
										<tr>
											<td><strong>Employee Name</strong> <span class="float-end"><?php echo $salary->Name; ?></span></td>
										</tr>
										<tr>
											<td><strong>Employee ID</strong> <span class="float-end"><?php echo $salary->Emp_Id; ?></span></td>
										</tr>
										<tr>
											<td><strong>Designation</strong> <span class="float-end"><?php echo $salary->Designation; ?></span></td>
										</tr>
										<tr>
											<td><strong>Date of Joining</strong> <span class="float-end"><?php echo $salary->DOJ; ?></span></td>
										</tr>
										<tr>
											<td><strong>UAN</strong> <span class="float-end"><?php echo $salary->UAN; ?></span></td>
										</tr>
										<tr>
											<td><strong>ESI No.</strong> <span class="float-end"><?php echo $salary->ESI_No; ?></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div>
							<h5>Bank Details</h5>
							<div class="table">
								<table class="table header-border table-responsive-sm">
									<tbody>
										<tr>
											<td><strong>Bank Name</strong> <span class="float-end"><?php echo $employee->bank_name; ?></span></td>
										</tr>
										<tr>
											<td><strong>Account Number</strong> <span class="float-end"><?php echo $employee->bank_ac_no; ?></span></td>
										</tr>

										<tr>
											<td><strong>IFSC Code</strong> <span class="float-end"><?php echo $employee->ifsc_code; ?></span></td>
										</tr>
										<tr>
											<td><strong>No. of Working Days</strong> <span class="float-end">31

												</span></td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														<strong>Paid Days</strong> <span class="float-end"><?php echo $payable_days ?></span>
													</div>
													<div class="col-md-6">
														<strong>LOP Days</strong> <span class="float-end"><?php echo $lop_days; ?></span>
													</div>
												</div>
											</td>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-3">
														<strong>Casual Leaves</strong> <span class="float-end"><?php echo $cl_days; ?></span>
													</div>
													<div class="col-md-3">
														<strong>Sick Leaves</strong> <span class="float-end"><?php echo $sl_days; ?></span>
													</div>
													<div class="col-md-3">
														<strong>Earned Leaves</strong> <span class="float-end"><?php echo $el_days; ?></span>
													</div>
													<div class="col-md-3">
														<strong>Outside Duty</strong> <span class="float-end"><?php echo $od_days; ?></span>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-12">
														<strong>Pending Leaves</strong> <span class="float-end"><?php echo $total_pending_leaves; ?></span>
													</div>

												</div>


											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div>
							<h5>Earnings</h5>
							<div class="table">
								<table class="table header-border table-responsive-sm">
									<tbody>
										<tr>
											<td><strong>Basic DA</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Basic_DA; ?></span></td>
										</tr>
										<tr>
											<td><strong>House Rent Allowance (H.R.A)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->HRA; ?></span></td>
										</tr>
										<tr>
											<td><strong>Washing Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Washing_Allowance; ?></span></td>
										</tr>
										<tr>
											<td><strong>Telephonic Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Telephonic_Allowance; ?></span></td>
										</tr>
										<tr>
											<td><strong>Other Allowance</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Other_Allowance; ?></span></td>
										</tr>
										<tr>
											<td><strong>Incentives</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Incentive; ?></span></td>
										</tr>
										<tr>
											<td><strong>Earned Gross</strong> <span class="float-end"><strong><i class="fa fa-inr"></i><?php echo $salary->Earned_Gross; ?></strong></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div>
							<h5>Deductions</h5>
							<div class="table">
								<table class="table header-border table-responsive-sm">
									<tbody>
										<tr>
											<td><strong>Provident Fund</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->PF; ?></span></td>
										</tr>
										<tr>
											<td><strong>ESI</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->ESI; ?></span></td>
										</tr>
										<tr>
											<td><strong>Profesional Tax</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->PT; ?></span></td>
										</tr>
										<tr>
											<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->TDS; ?></span></td>
										</tr>
										<tr>
											<td><strong>Canteen</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $salary->Canteen; ?></span></td>
										</tr>
										<tr>
											<td><strong>Loss of Pay (Leave)</strong> <span class="float-end"><i class="fa fa-inr"></i><?php echo $lop_amount; ?></span></td>
										</tr>

										<tr>
											<td><strong>Total Deductions</strong> <span class="float-end"><strong><i class="fa fa-inr"></i><?php echo $total_deduction; ?></strong></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table header-border table-responsive-sm">
								<tbody>
									<tr>
										<td><strong>Reimbursement</strong> <span class="float-end"><i class="fa fa-inr"></i>0</span></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-sm-5"> </div>
					<div class="col-lg-4 col-sm-5 ms-auto">
						<table class="table table-clear">
							<tbody>
								<tr>
									<td class="left"><strong>Earned Gross</strong></td>
									<td class="right"><i class="fa fa-inr"></i><?php echo $salary->Earned_Gross; ?></td>
								</tr>
								<tr>
									<td class="left"><strong>Total Deduction </strong></td>
									<td class="right"><i class="fa fa-inr"></i><?php echo $total_deduction; ?></td>
								</tr>
								<tr>
									<td class="left"><strong>Total Reimbursement</strong></td>
									<td class="right"><i class="fa fa-inr"></i>0</td>
								</tr>
								<tr>
									<td class="left"><strong>Total Net Pay</strong></td>
									<td class="right"><strong><i class="fa fa-inr"></i><?php echo $net_pay; ?></strong><br>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!-- Menubar -->
		<?php require APPROOT . '/views/inc_user/navbar_footer.php'; ?>
		<!-- Menubar -->

	

	<!--**********************************
    Scripts
***********************************-->
	<?php require APPROOT . '/views/inc_user/footer.php'; ?>
	<script>
		window.onload = function() {
			window.print();
		}
	</script>