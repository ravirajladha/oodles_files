<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php 
$employee = $data['employee'];
$salary = $data['salary'];
?>

<form action="<?php echo URLROOT; ?>/hr/update_profile/<?php echo($employee->mec_id) ?>" method="post">
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="row">
							<div class="col-xl-12">
								<div class="card profile-card">
									<div class="card-header flex-wrap border-0 pb-0">
										<h3 class="fs-24 text-black font-w600 me-auto mb-2 pe-3">Edit Profile</h3>
										<div class="d-sm-flex d-block">
										
											<a href="<?php echo URLROOT?>/hr/employee/<?php echo($employee->mec_id) ?>" class="btn btn-dark light btn-rounded me-3 mb-2">Cancel</a>
											<input type="submit" class="btn btn-primary btn-rounded mb-2">
										</div>
									</div>
									<div class="card-body">
										<form>
											<div class="mb-5">
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Profile</span></div>
												<div class="row">
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Employee Name</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->employee_name ?>"  value="<?php echo $employee->employee_name ?>" 
												 name="employee_name">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->designation ?>" value="<?php echo $employee->designation ?>" name="designation" >
														</div>
														
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Employee Department</label>
															<input type="date" class="form-control" placeholder="<?php echo $employee->department ?>" value="<?php echo $employee->department ?>" name="department" >
														</div>
													</div>
											
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Branch</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->branch ?>" value="<?php echo $employee->branch ?>" name="branch">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Date of Joining</label>
															<input type="date" class="form-control" placeholder="<?php echo $employee->date_of_joining?>" value="<?php echo $employee->date_of_joining?>" name="date_of_joining" >
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Employee Type</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->employment_type?>" value="<?php echo $employee->employment_type?>" name="employment_type">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Phone No</label>
															<input type="number" class="form-control" placeholder="<?php echo $employee->cell_number?>" value="<?php echo $employee->cell_number?>" name="cell_number">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Email</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->company_email?>" value="<?php echo $employee->company_email?>" name="company_email">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Date of Birth</label>
															<input type="date" class="form-control" placeholder="<?php echo $employee->date_of_birth?>" value="<?php echo $employee->date_of_birth?>"  name="date_of_birth">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Current Address</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->current_address?>" value="<?php echo $employee->current_address?>" name="current_address">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Gender</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->gender?>" value="<?php echo $employee->gender?>" name="gender">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Blood Group</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->blood_group?>" value="<?php echo $employee->blood_group?>" name="blood_group">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Reports To</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->reports_to?>" value="<?php echo $employee->reports_to?>" name="reports_to">
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


<?php require APPROOT . '/views/inc_admin/footer.php';?>