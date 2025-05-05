<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php
$adminMod = new admins;

$scholarship_id = $data['scholarship_id']; ?>
<?php $get_all_applications = $data['get_all_schortlisted_students'];
$get_ind_scholarship = $adminMod->get_ind_scholarship($scholarship_id);


?>

<!-- end sidebar menu -->
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Shortlisted Applicants</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/all_scholarships">All Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Shortlisted Applicants </li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">

							<!-- sdsd -->
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>Shortlisted Applicants for <?php echo $get_ind_scholarship->name; ?></header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
										
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example1">
												<thead>
													<tr>
														<!-- <th></th> -->
														<th> Sl.No </th>
														<th>Applciation Id </th>
														<th>User Id </th>
														<th>View Applications </th>

													
														
													</tr>
												</thead>
												<tbody>
													<?php
													$count = 0;
													 foreach ($get_all_applications as $application) { 
														$count++; ?>

														<tr class="odd gradeX">
															<!-- <td class="patient-img">
															<img src="../assets/img/user/user1.jpg" alt="">
														</td> -->
															<td><?php echo $count; ?></td>
															<td><?php echo $application->id; ?></td>
															<td><?php
															$get_auth_detail  = $adminMod->get_auth_detail($application->student_id);
															echo $get_auth_detail->name; 
															?></td>
															
															<td>
																
															<a href="<?php echo URLROOT; ?>/admin/scholarship_status/<?php echo $application->id; ?>" class="tblEditBtn">
																	<i class="fa fa-eye"></i>
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
		</div>
	</div>
</div>
<!-- end page content -->

<!-- end chat sidebar -->

<!-- end page container -->
<!-- start footer -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script src="<?php echo URLROOT; ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/js/pages/table/table_data.js"></script>
<!-- Common js-->
<script src="<?php echo URLROOT; ?>/assets/js/app.js"></script>
<script src="<?php echo URLROOT; ?>/assets/js/layout.js"></script>
<script src="<?php echo URLROOT; ?>/assets/js/theme-color.js"></script>
<!-- Material -->
<script src="<?php echo URLROOT; ?>/assets/plugins/material/material.min.js"></script>
<script src="<?php echo URLROOT; ?>/assets/plugins/material/material.min.js"></script>

<!-- end js include path -->