<?php require APPROOT . '/views/inc_college/header.php'; ?>
<!-- start page content -->
<?php foreach ($data['get_student_detail']  as $student) { ?>

	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Profile Detail</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="">Student</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Profile Detail</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<div class="card">
							<div class="card-body no-padding height-9">
								<div class="row">
									<div class="profile-userpic">
										<img src="<?php echo URLROOT?>/uploads/<?php echo $student->student_image?>" class="img-responsive" alt="">
									</div>
								</div>
								<div class="profile-usertitle">
									<div class="profile-usertitle-name"><?php echo $student->f_name ?> <?php echo $student->l_name ?> </div>
								</div>
								<ul class="list-group list-group-unbordered">

									<li class="list-group-item">
										<b>Scholarships</b> <a class="pull-right">--</a>
									</li>
								</ul>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->

								<!-- END SIDEBAR BUTTONS -->
							</div>
						</div>
						<div class="card">
							<div class="card-head">
								<header>About</header>
							</div>
							<div class="card-body no-padding height-9">
								<div class="profile-desc">
									Student
								</div>
								<ul class="list-group list-group-unbordered">
									<li class="list-group-item">
										<b>Name </b>
										<div class="profile-desc-item pull-right"><?php echo $student->f_name ?>.<?php echo $student->l_name ?></div>
									</li>
									<li class="list-group-item">
										<b>Mobile No </b>
										<div class="profile-desc-item pull-right"><?php echo $student->phone_no?></div>
									</li>
									<li class="list-group-item">
										<b>Whatsapp No </b>
										<div class="profile-desc-item pull-right"><?php echo $student->whatsapp_no?></div>
									</li>
									<li class="list-group-item">
										<b>DOB as Aadhar </b>
										<div class="profile-desc-item pull-right"><?php echo $student->dob?></div>
									</li>
									<li class="list-group-item">
										<b>Gender </b>
										<div class="profile-desc-item pull-right"><?php echo $student->gender ?></div>
									</li>
									<li class="list-group-item">
										<b>Religion </b>
										<div class="profile-desc-item pull-right"><?php echo $student->religion ?></div>
									</li>
									<li class="list-group-item">
										<b>Category</b>
										<div class="profile-desc-item pull-right"><?php echo $student->category ?></div>
									</li>

									<li class="list-group-item">
										<b>Physcially Disabled</b>
										<div class="profile-desc-item pull-right"><?php echo $student->physically?></div>
									</li>
									<li class="list-group-item">
										<b>Aadhar Number</b>
										<div class="profile-desc-item pull-right"><?php echo $student->aadhar?></div>
									</li>
									<li class="list-group-item">
										<b>Address Proof</b>
										<div class="profile-desc-item pull-right">	<?php if(isset($student->address_proof)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->address_proof?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?></div>
									</li>
									<li class="list-group-item">
										<b>Identity Proof</b>
										<div class="profile-desc-item pull-right">	<?php if(isset($student->identity_proof)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->identity_proof?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?></div>
									</li>
								
							
								</ul>
						
							</div>
						</div>


					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="card">
								<div class="card-topline-aqua">
									<header>Communication Address</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-4 col-6 b-r"> <strong>Communication Address</strong>
														<br>
														<p class="text-muted"><?php echo $student->comm_address ?> <?php echo $student->l_name ?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Village/Area/Locality</strong>
														<br>
														<p class="text-muted"><?php echo $student->comm_village?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Block/Taluk/Town</strong>
														<br>
														<p class="text-muted"><?php echo $student->comm_block?></p>
													</div>
													<div class="col-md-4 col-6"> <strong>State</strong>
														<br>
														<p class="text-muted"><?php echo $student->comm_state?>
													</div>
													<div class="col-md-4 col-6"> <strong>PIN Code</strong>
														<br>
														<p class="text-muted"><?php echo $student->comm_pin_code?> 
													</div>
												</div>
												<hr>
									
												<br>
												<!-- <h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul> -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-topline-aqua">
									<header>Permanent Address</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-4 col-6 b-r"> <strong>Permanent Address</strong>
														<br>
														<p class="text-muted"><?php echo $student->perm_address ?> <?php echo $student->l_name ?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Village/Area/Locality</strong>
														<br>
														<p class="text-muted"><?php echo $student->perm_village?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Block/Taluk/Town</strong>
														<br>
														<p class="text-muted"><?php echo $student->perm_block?></p>
													</div>
													<div class="col-md-4 col-6"> <strong>State</strong>
														<br>
														<p class="text-muted"><?php echo $student->perm_state?>
													</div>
													<div class="col-md-4 col-6"> <strong>PIN Code</strong>
														<br>
														<p class="text-muted"><?php echo $student->perm_pin_code?> 
													</div>
												</div>
												<hr>
									
												<br>
												<!-- <h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul> -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-topline-aqua">
									<header>Bank Details of Parent/Guardian</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-4 col-6 b-r"> <strong>Savings Bank Account Number</strong>
														<br>
														<p class="text-muted"><?php echo $student->account_no ?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Bank Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->bank_name?></p>
													</div>
													<div class="col-md-4 col-6 b-r"> <strong>Bank's Branch Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->bank_branch?></p>
													</div>
													<div class="col-md-4 col-6"> <strong>IFSC Code</strong>
														<br>
														<p class="text-muted"><?php echo $student->ifsc_code?>
													</div>
													<div class="col-md-4 col-6"> <strong>Full Name as per Aadhar</strong>
														<br>
														<p class="text-muted"><?php echo $student->name_as_per_bank?> 
													</div>
													<div class="col-md-4 col-6"> <strong>Bank Passbook/Statement/Cancelled Cheque </strong>
														<br>
														<?php if(isset($student->passbook_statement)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->passbook_statement?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?>
													</div>
												</div>
												<hr>
									
												<br>
												<!-- <h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul> -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-topline-aqua">
									<header>Family Information</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-6 col-6 b-r"> <strong>Number of Siblings</strong>
														<br>
														<p class="text-muted"><?php echo $student->siblings?></p>
													</div>
													<div class="col-md-6 col-6 b-r"> <strong>Family Annual Income</strong>
														<br>
														<p class="text-muted"><?php echo $student->annual_income?></p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Father's Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->father_name?></p>
													</div>
													<div class="col-md-3 col-6"> <strong>Father's Aadhar No</strong>
														<br>
														<p class="text-muted"><?php echo $student->f_aadhar?>
													</div>
													<div class="col-md-3 col-6"> <strong>Father's Mobile No</strong>
														<br>
														<p class="text-muted"><?php echo $student->f_phone?> 
													</div>
													<div class="col-md-3 col-6"> <strong>Upload Aadhar Card </strong>
														<br>
														<?php if(isset($student->father_aadhar_doc)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->father_aadhar_doc?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Mother's Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->mother_name?></p>
													</div>
													<div class="col-md-3 col-6"> <strong>Mother's Aadhar No</strong>
														<br>
														<p class="text-muted"><?php echo $student->m_aadhar?>
													</div>
													<div class="col-md-3 col-6"> <strong>Mother's Mobile No</strong>
														<br>
														<p class="text-muted"><?php echo $student->m_phone?> 
													</div>
													<div class="col-md-3 col-6"> <strong>Upload Aadhar Card</strong>
														<br>
														<?php if(isset($student->mother_aadhar_doc)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->mother_aadhar_doc?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?>
													</div>
												</div>
												<hr>
									
												<br>
												<!-- <h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul> -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-topline-aqua">
									<header>Current Academic Information</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->

									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-6 col-6 b-r"> <strong>Present Class / Course</strong>
														<br>
														<p class="text-muted"><?php echo $student->siblings?></p>
													</div>
													<div class="col-md-6 col-6 b-r"> <strong>City</strong>
														<br>
														<p class="text-muted"><?php echo $student->annual_income?></p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>State</strong>
														<br>
														<p class="text-muted"><?php echo $student->father_name?></p>
													</div>
													<div class="col-md-3 col-6"> <strong>Tuition Fees</strong>
														<br>
														<p class="text-muted"><?php echo $student->f_aadhar?>
													</div>
													<div class="col-md-3 col-6"> <strong>non Tutition Fees</strong>
														<br>
														<p class="text-muted"><?php echo $student->f_phone?> 
													</div>
													<div class="col-md-3 col-6"> <strong>Tuition Fees Receipt / Fees Structure</strong>
														<br>
														<?php if(isset($student->father_aadhar_doc)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->father_aadhar_doc?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Mother's Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->mother_name?></p>
													</div>
													<div class="col-md-3 col-6"> <strong>Mother's Aadhar No</strong>
														<br>
														<p class="text-muted"><?php echo $student->m_aadhar?>
													</div>
													<div class="col-md-3 col-6"> <strong>Mother's Mobile No</strong>
														<br>
														<p class="text-muted"><?php echo $student->m_phone?> 
													</div>
													<div class="col-md-3 col-6"> <strong>Upload Aadhar Card</strong>
														<br>
														<?php if(isset($student->mother_aadhar_doc)){ ?>
											<a href="<?php echo URLROOT?>/uploads/<?php echo $student->mother_aadhar_doc?>" target="_blank"><i class='fa-solid fa-eye'></i></a>
											<?php } ?>
													</div>
												</div>
												<hr>
									
												<br>
												<!-- <h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul> -->
												<br>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- <div class="card">
								<div class="card-topline-aqua">
									<header>Permanent Address</header>
								</div>
								<div class="white-box">
									Nav tabs -- needs to be commented

								Tab panes -- needs to be commented
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo" id="tab1">
											<div id="biography">
												
												<div class="row">
													<div class="col-md-3 col-6 b-r"> <strong>Full Name</strong>
														<br>
														<p class="text-muted"><?php echo $student->f_name ?> <?php echo $student->l_name ?></p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Mobile</strong>
														<br>
														<p class="text-muted"><?php echo $student->phone_no ?></p>
													</div>
													<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
														<br>
														<p class="text-muted">test@example.com</p>
													</div>
													
												</div>
												<hr>
												<ul class="list-group list-group-unbordered">
													<li class="list-group-item">
														<b>Father Name</b>
														<div class="profile-desc-item pull-right"><?php echo $student->father_name ?></div>
													</li>
													<li class="list-group-item">
														<b>Father Aadhar Number</b>
														<div class="profile-desc-item pull-right"><?php echo $student->f_aadhar ?></div>
													</li>
													<li class="list-group-item">
														<b>Father Phone Number</b>
														<div class="profile-desc-item pull-right"><?php echo $student->f_phone ?></div>
													</li>
													<li class="list-group-item">
														<b>Mother Name</b>
														<div class="profile-desc-item pull-right"><?php echo $student->mother_name ?></div>
													</li>
													<li class="list-group-item">
														<b>Mother Aadhar Number</b>
														<div class="profile-desc-item pull-right"><?php echo $student->m_aadhar ?></div>
													</li>
													<li class="list-group-item">
														<b>Mother Phone Number</b>
														<div class="profile-desc-item pull-right"><?php echo $student->m_phone ?></div>
													</li>
												
												</ul>
												<br>
												<h4 class="font-bold">Education</h4>
												<hr>
												<ul> Name
													<li>Schooling at sarvoday vidhyalay, Mumbai</li>
													<li>Betchler In Arts in Bhagvati College Hariyana</li>
												</ul>
												<br>
												<h4 class="font-bold">Scholarships</h4>
												<hr>
												<ul>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
													<li>Scholarship Name</li>
												</ul>
												<br>
											</div>
										</div>

									</div>
								</div>
							</div> -->
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- end page content -->
	<?php require APPROOT . '/views/inc_college/footer.php'; ?>