<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Enquiries</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="enquiry-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="enquiry-item" href="">Enquiry</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Enquiries List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					<ul class="nav customtab nav-tabs" role="tablist">
						<li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">List
								View</a></li>
						<!-- <li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Grid
								View</a></li> -->
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Enquiries List</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">

												</div>
											</div>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
													<th><input type="checkbox" id="select-all">
														<th> Id</th>
														<th> Name </th>
														<th> Company Name </th>
														<th> Business Email </th>
														<th> Phone Number </th>
														<th> Designation </th>
														<th> Comment </th>
														<th> Enquired At </th>
														<!-- <th>DOB</th> -->
														<!-- <th> Action </th> -->
													</tr>
												</thead>

												<tbody>
														
												<form action="<?php echo URLROOT; ?>/admin/delete_csr_enquiry" method="POST">
												<button type="submit" class="btn btn-primary" style="float:right;">Delete</button>
													<?php foreach ($data['get_all_enquiry'] as $enquiry) { ?>
														<tr class="odd gradeX">

														<td class="patient-img">
																<input type="checkbox" name="id[]"  value="<?php  echo $enquiry->id; ?>"> 
															</td>



															<td class="left"><?php echo $enquiry->id ?></td>
															
															<td class="left"><?php echo $enquiry->name?></td>
															<td class="left"><?php echo $enquiry->company_name?></td>
															<td class="left"><?php echo $enquiry->business_email?></td>
															<td class="left"><?php echo $enquiry->phone_no?></td>
															<td class="left"><?php echo $enquiry->designation?></td>
															<td class="left"><?php echo $enquiry->comment?></td>
															<td class="left"><?php echo $enquiry->created_at?></td>
														

															<!-- <td>
																<a href="#" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
																<a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a>
															</td> -->
														</tr>
													<?php } ?>
													</form>
												
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
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	$('#select-all').click(function(event) {
    if(this.checked) {
        // Iterate over all checkboxes and set their checked state to true
        $('input[name="id[]"]').each(function() {
            this.checked = true;
        });
    } else {
        // Iterate over all checkboxes and set their checked state to false
        $('input[name="id[]"]').each(function() {
            this.checked = false;
        });
    }
});

</script>