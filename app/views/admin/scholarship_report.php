<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;
$get_all_applicants = $data['get_all_applicants'];
$scholarship_id = $data['scholarship_id'];
$get_scholarship_detail = $data['get_scholarship_data'];


?>
<link href="<?php echo URLROOT ?>/assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/export/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarship Reports</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/all_scholarships">All Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Report</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card">
					<div class="card-head">
						<header>Scholarship Info</header>
					</div>
					<div class="card-body no-padding height-9" style="border: 3px groove;">
					

						<div class="row list-separated profile-stat">

						<!-- <div class="center" style="text-align: center;">
  	<div class="uppercase profile-stat-title">  <span style="color:#000;"><?php echo ucwords($get_scholarship_detail->name); ?> </span></div>
  	<div class="uppercase profile-stat-title"> Total Amount:  <span style="color:#000;">Rs. 10000 </span></div>

</div> -->
							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title">  Money Dispersed At</div>
								<div class="uppercase profile-stat-text"> <span style="color:#000;">26th April, 2023
									</span>
									</div>
							</div>
							<div class="col-md-4 col-sm-4 col-6">
							<div class="uppercase profile-stat-title">  <span style="color:#000;"><?php echo ucwords($get_scholarship_detail->name); ?> </span></div>
								<div class="uppercase profile-stat-title"> Total Amount Dispersed: <span style="color:#000;">Rs 0</span></div>
							
  	<div class="uppercase profile-stat-title"> Total Amount:  <span style="color:#000;">Rs. 10000 </span></div>
								
							</div>
							<div class="col-md-4 col-sm-4 col-6">
								<div class="uppercase profile-stat-title"> Total Students Participated: <span style="color:#000;">0 </span></div>
					
								<div class="uppercase profile-stat-title"> Total Students Shortlisted:<span style="color:#000;"> 0 </span> </div>
								<div class="uppercase profile-stat-title"> Total Students Rejected:<span style="color:#000;"> 0 </span> </div>
					
							
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
						<table id="exportTable" class="display nowrap" style="width:100%">
							<thead>
								<tr>
									<th>Sl. No </th>
									<th>Application Id </th>
									<th>Student Name</th>
									<th>Created At</th>
									<th>Status</th>
									
								
									<th>Amount Won</th>
									<th>Amount Dispersed </th>
									<th>Amount Dispersed At</th>
								
							
								




								</tr>
							</thead>
							<tbody>
								<?php
								$count = 0;
								foreach ($get_all_applicants as $applicant) {
									$count++; ?>

									<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $applicant->id; ?></td>
									<td><?php echo $applicant->student_id; ?></td>
									<td><?php echo $applicant->created_at; ?></td>
									<td><?php echo $applicant->status; ?></td>
									<td>Pending</td>
									<td>Pending</td>
									<td>0000-00-00 00:00:00</td>
								
											
										
												
										
										
									
										</tr>
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