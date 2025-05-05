<?php require APPROOT . '/views/inc_corporate/header.php'; ?>


<!-- end sidebar menu -->
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarships List</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/corporate/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Scholarships List</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					<!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-bs-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-bs-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
					<ul class="nav customtab nav-tabs" role="tablist">
						<li class="nav-item"><a href="#tab1" class="nav-link active" data-bs-toggle="tab">Card View</a></li>
						<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Table
								View</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<?php foreach ($data['get_all_scholarship'] as $scholarship) { ?>
									<div class="col-lg-4 col-md-6 col-12 col-sm-6 ">
										<div class="blogThumb">
											<div class="row" style="background-color:#E9F4FF;">
												<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
													<div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $scholarship->scholarship_file; ?>" style="height:80px;width:100%;"></div>
												</div>
												<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
												<?php 
$startdate = $scholarship->start_date;
$enddate = $scholarship->end_date;
$today = date('Y-m-d');

if ($today < $startdate) {
  // Scholarship has not started yet
  $date1 = DateTime::createFromFormat('Y-m-d', $startdate);
  $date2 = DateTime::createFromFormat('Y-m-d', $today);
  $diff = $date1->diff($date2);
  $message = $diff->format('%a days, %h hours, %i minutes') ; // Outputs "X days, X hours, X minutes until start"
} else if ($today <= $enddate) {
  // Scholarship is ongoing
  $date1 = DateTime::createFromFormat('Y-m-d', $enddate);
  $date2 = DateTime::createFromFormat('Y-m-d', $today);
  $diff = $date1->diff($date2);
  $message = $diff->format('%a days, %h hours, %i minutes'); // Outputs "X days, X hours, X minutes to end"
} else {
  // Scholarship has already expired
  $message = "Expired";
}

?>
<div class="thumb-center" style="margin-top:10px;background-color:yellow;vertical-align:center;">
  <i class="material-icons f-left">today</i><?php echo $message; ?>
  <br>
  <?php if ($today < $startdate) { echo "until start"; } else { echo "to end"; } ?>
</div>


												</div>
											</div>

											<div class="course-box">
												<?php $string =  $scholarship->name ?>
												<?php
												if (strlen($string) > 80) {
													$trimstring = substr($string, 0, 80) . '...';
												} else {
													$trimstring = $string;
												} ?>
												<a href="<?php echo URLROOT; ?>/corporate/scholarship_application/<?php echo $scholarship->id; ?>">
													<h6 style="text-align:center;"><b><u><?php echo strtoupper($trimstring) ?></u></b></h6>
												</a>
												<a href="<?php echo URLROOT; ?>/corporate/scholarship/<?php echo $scholarship->id; ?>" style="color:green;" target="_blank">
													<h6 style="text-align:center;"><b>VIEW SCHOLARSHIP DETAIL</b></h6>
												</a>


											</div>
											<div class="row" style="background-color:#46aaeb;">
												<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
													<div class="thumb-center">
														<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Prize Offer</span><br>
															<p style="font-size:12px;">
																Rs 50000, prize<BR>medal and future secure.
															</p>
														</div>

													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-12 col-sm-6 ">
													<div class="thumb-center" style="margin-top:10px;"><span style="float:left;font-size:14px;color:blue;">Eligibility</span><br>
														<p style="font-size:12px;">
															<!-- From Class 6 <br>to Class 12 -->
															<?php echo $scholarship->class_display; ?>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>



							</div>



						</div>
						<div class="tab-pane" id="tab2">





							<!-- sdsd -->
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Scholarships</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">
													<div class="btn-group">
														<a href="add_professor.html" id="addRow" class="btn btn-primary">
															Add New <i class="fa fa-plus"></i>
														</a>

													</div>
												</div>
											</div>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example1">
												<thead>
													<tr>
														<!-- <th></th> -->
														<th> Id </th>

														<th> name </th>
														<th> Course </th>
														<!-- <th> Criteria </th> -->
														<th> Start Date </th>
														<th> End Date </th>
													
													
														<!-- <th> Degree </th>
														<th> Mobile </th>
														<th> Email </th>
														<th>Joining Date</th> -->
														<th> Applicants </th>
													
													</tr>
												</thead>
												<tbody>
													<?php foreach ($data['get_all_scholarship'] as $scholarship) { ?>

														<tr class="odd gradeX">
															<!-- <td class="patient-img">
															<img src="../assets/img/user/user1.jpg" alt="">
														</td> -->
															<td><?php echo $scholarship->id; ?></td>
															<td class="left"> <a href="<?php echo URLROOT; ?>/corporate/scholarship/<?php echo $scholarship->id; ?>" style="color:green;" target="_blank"><?php echo ucwords($scholarship->name); ?></a></td>
															<td>
																<?php
																//  $classes=explode(',',$scholarship->course);
																// 	foreach($classes as $class){
																// 		$studentMod = new Students;
																// 		$class_name=$studentMod->get_class_detail_single($class);
																// 	 echo $class_name->class_name .','; 
																// 	}
																?>
																<?php echo ucwords($scholarship->class_display); ?>
															</td>

															<!-- <td class="left"><?php echo $scholarship->criteria_answer; ?></td> -->

															<td class="left"><?php echo $scholarship->start_date; ?></td>
															<td class="left"><?php echo $scholarship->end_date; ?></td>
														

															

															<td>
																<a href="<?php echo URLROOT; ?>/corporate/scholarship_application/<?php echo $scholarship->id; ?>" class="tblEditBtn">
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
<?php require APPROOT . '/views/inc_corporate/footer.php'; ?>

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