<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php 
$employee = $data['employee'];
$salary = $data['salary'];
?>

<form action="<?php echo URLROOT; ?>/hr/update_basic_profile/<?php echo($employee->mec_id) ?>" method="post">
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
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Personal Informations</span></div>
												<div class="row">
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Passport No</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->passport_number ?>"  value="<?php echo $employee->passport_number ?>" 
												 name="passport_number">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Passport DOI</label>
															<input type="date" class="form-control" placeholder="<?php echo $employee->date_of_issue ?>"  value="<?php echo $employee->date_of_issue ?>" name="date_of_issue">
														</div>
														
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Passport Valid Upto</label>
															<input type="date" class="form-control" placeholder="<?php echo $employee->valid_upto ?>" value="<?php echo $employee->valid_upto ?>" name="valid_upto">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
														<label>Phone No</label>
														<div class="input-group input-icon mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
																</div>
																<input type="number" class="form-control" placeholder="<?php echo $employee->cell_number ?>" value="<?php echo $employee->cell_number ?>" name="cell_number">
															</div>
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Permanent Address</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->permanent_address ?>" value="<?php echo $employee->permanent_address ?>" name="permanent_address">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Personal Email-Id</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->personal_email?>" value="<?php echo $employee->personal_email?>" name="personal_email">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Marital Status</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->marital_status?>" value="<?php echo $employee->marital_status?>" name="marital_status">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Education Information</label>
															<input type="text" class="form-control" placeholder="<?php echo $employee->qualification?>" value="<?php echo $employee->qualification?>" name="qualification">
														</div>
													</div>
												
												</div>
											</div>
											<div class="mb-5">
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Emergency Contact</span></div>
												<div class="row">
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Name</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->person_to_be_contacted?>" value="<?php echo $employee->person_to_be_contacted?>" name="person_to_be_contacted">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Relationship</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->relation?>" value="<?php echo $employee->relation?>" name="relation" >
															</div>
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Phone</label>
															<div class="input-group input-icon mb-3">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
																</div>
																<input type="text" class="form-control" placeholder="<?php echo $employee->emergency_phone_number?>" value="<?php echo $employee->emergency_phone_number?>"  name="emergency_phone_number" >
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="mb-5">
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Bank Information</span></div>
												<div class="row">
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Bank Name</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->person_to_be_contacted?>" value="<?php echo $employee->person_to_be_contacted?>" name="person_to_be_contacted">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Bank Account No</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->bank_name?>" value="<?php echo $employee->bank_name?>" name="bank_name">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Bank Account No</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->bank_ac_no?>"  value="<?php echo $employee->bank_ac_no?>" name="bank_ac_no" >
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>IFSC Code</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->ifsc_code?>" value="<?php echo $employee->ifsc_code?>" name="ifsc_code" >
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="mb-5">
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Employment Information</span></div>
												<div class="row ">
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Leave Policy</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->leave_policy?>" value="<?php echo $employee->leave_policy?>" name="leave_policy">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Default Shift</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->default_shift?>" value="<?php echo $employee->default_shift?>" name="default_shift">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Salary Mode</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->salary_mode?>" value="<?php echo $employee->salary_mode?>" name="salary_mode" >
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Casual Leave</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->cl?>" value="<?php echo $employee->cl?>" name="cl">
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Sick Leave</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->sl?>" value="<?php echo $employee->sl?>" name="sl" >
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Earned Leave</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->el?>" value="<?php echo $employee->el?>" name="el" >
															</div>
														</div>
													</div>
												<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Leave Approver</label>
															<div class="input-group">
																<input type="text" class="form-control" placeholder="<?php echo $employee->leave_approver?>" value="<?php echo $employee->leave_approver?>" name="leave_approver" >
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


<?php require APPROOT . '/views/inc_admin/footer.php';?>