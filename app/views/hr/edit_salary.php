<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$employee = $data['employee'];
$salary = $data['salary'];
?>

<?php
function check($data, $value)
{
	if (!isset($data->$value) == true) {
		echo ('Nil');
	} else {
		echo ($data->$value);
	}
}

?>

<form action="<?php echo URLROOT; ?>/hr/update_salary/<?php echo ($employee->mec_id) ?>" method="post">
	<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12 col-xxl-12 col-lg-12">
					<div class="row">
						<div class="col-xl-12">
							<div class="card profile-card">
								<div class="card-header flex-wrap border-0 pb-0">
									<h3 class="fs-24 text-black font-w600 me-auto mb-2 pe-3">Edit Bank & Statutory</h3>
									<div class="d-sm-flex d-block">

										<a href="<?php echo URLROOT ?>/hr/employee/<?php echo ($employee->mec_id) ?>" class="btn btn-dark light btn-rounded me-3 mb-2">Cancel</a>
										<input type="submit" class="btn btn-primary btn-rounded mb-2">
									</div>
								</div>
								<div class="card-body">
									<form>
										<div class="mb-5">
											<div class="title mb-4"><span class="fs-18 text-black font-w600">Earnings</span></div>
											<div class="row">
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Basic DA</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Basic_DA'); ?>"  value="<?php check($salary,$value='Basic_DA'); ?>" 
												 name="Basic_DA">
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Washing Allowance</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Washing_Allowance'); ?>" value="<?php check($salary,$value='Washing_Allowance'); ?>" name="Washing_Allowance" >
													</div>

												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Telephonic Allowance</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Telephonic_Allowance'); ?>" value="<?php check($salary,$value='Telephonic_Allowance'); ?>" name="Telephonic_Allowance">
													</div>
												</div>

												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Other Allowance</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Other_Allowance'); ?>" value="<?php check($salary,$value='Other_Allowance'); ?>" name="Other_Allowance">
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Incentives</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Incentive'); ?>" value="<?php check($salary,$value='Incentive'); ?>" name="Incentive" >
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Arrears</label>
														<input type="text" class="form-control" placeholder="<?php check($salary,$value='Arrears'); ?>" value="<?php check($salary,$value='Arrears'); ?>" name="Arrears">
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Earned Gross</label>
														<input type="number" class="form-control" placeholder="<?php check($salary,$value='Earned_Gross'); ?>"  value="<?php check($salary,$value='Earned_Gross'); ?>" name="Earned_Gross" readonly>
													</div>
												</div>
										

											</div>
										</div>
										<div class="mb-5">
											<div class="title mb-4"><span class="fs-18 text-black font-w600">Deductions</span></div>
											<div class="row">
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Provident Fund</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='PF'); ?>" value="<?php check($salary,$value='PF'); ?>" name="PF" readonly>
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Professional Tax</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='PT'); ?>" value="<?php check($salary,$value='PT'); ?>" name="PT"  readonly>
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>ESI</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='ESI'); ?>" value="<?php check($salary,$value='ESI'); ?>"  name="ESI" readonly>
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Advance</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='Advance'); ?>" value="<?php check($salary,$value='Advance'); ?>" name="Advance" >
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Loan</label>
														<div class="input-group">
															<input type="number" class="form-control" pplaceholder="<?php check($salary,$value='Loan'); ?>" value="<?php check($salary,$value='Loan'); ?>" name="Loan">
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>TDS</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='TDS'); ?>" value="<?php check($salary,$value='TDS'); ?>" name="TDS" >
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Canteen</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='Canteen'); ?>" value="<?php check($salary,$value='Canteen'); ?>" name="Canteen">
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Other Deduction</label>
														<div class="input-group">
															<input type="number" class="form-control" pplaceholder="<?php check($salary,$value='Other_Deduction'); ?>" value="<?php check($salary,$value='Other_Deduction'); ?>" name="Other_Deduction" >
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>Total Deduction</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='Total_Deduction'); ?>" value="<?php check($salary,$value='Total_Deduction'); ?>" name="Total_Deduction" readonly>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="mb-5">
											<div class="title mb-4"><span class="fs-18 text-black font-w600">Employment Detail</span></div>
											<div class="row">
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>PAN</label>
														<div class="input-group">
															<input type="text" class="form-control" placeholder="<?php check($salary,$value='PAN'); ?>"  value="<?php check($salary,$value='PAN'); ?>" 
												 name="PAN">
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>ESI Number</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='ESI_No'); ?>" value="<?php check($salary,$value='ESI_No'); ?>" name="ESI_No" >
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-sm-6">
													<div class="form-group">
														<label>UAN</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='UAN'); ?>" value="<?php check($salary,$value='UAN'); ?>" name="UAN" >
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="mb-5">
											<div class="title mb-4"><span class="fs-18 text-black font-w600">Leaves and OD</span></div>
											<div class="row ">
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>Casual Leave</label>
														<div class="input-group">
															<input type="text" class="form-control" placeholder="<?php check($salary,$value='cl'); ?>" value="<?php check($salary,$value='cl'); ?>" name="cl" >
														</div>
													</div>
												</div>
									
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>CL Date</label>
														<div class="input-group">
															<input type="date" class="form-control" placeholder="Select Date" value="" name="cl_date">
														</div>
													</div>
												</div>
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>Sick Leave</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='sl'); ?>" value="<?php check($salary,$value='sl'); ?>" name="sl" >
														</div>
													</div>
												</div>
									
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>SL Date</label>
														<div class="input-group">
															<input type="date" class="form-control" placeholder="Select Date" value="" name="sl_date" >
														</div>
													</div>
												</div>
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>Earned Leave</label>
														<div class="input-group">
															<input type="number" class="form-control" placeholder="<?php check($salary,$value='el'); ?>" value="<?php check($salary,$value='el'); ?>" name="el" >
														</div>
													</div>
												</div>
									
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>EL Date</label>
														<div class="input-group">
															<input type="date" class="form-control" placeholder="Select Date" value="" name="el_date" >
														</div>
													</div>
												</div>
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>Outside Duty</label>
														<div class="input-group">
															<input type="number" class="form-control" pplaceholder="<?php check($salary,$value='od'); ?>" value="<?php echo  $salary->od?>"  name="od" >
														</div>
													</div>
												</div>
									
												<div class="col-xl-6 col-sm-6">
													<div class="form-group">
														<label>OD Date</label>
														<div class="input-group">
															<input type="date" class="form-control" placeholder="Select Date" value="" name="od_date" >
														</div>
													</div>
												</div>
									
												
											

											</div>
										</div>
									</form>
								</div>
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


	