<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<style>
table
{
  table-layout:fixed;
}
</style>
<?php 
$adminMod = new Admins;
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Subscriptions Taken</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="enquiry-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="enquiry-item" href="">Subscriptions</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Subscriptions Taken</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tabbable-line">
					
					<div class="tab-content">
						<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Subscriptions Taken</header>
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
														<!-- <th></th> -->
														<th> Id</th>
														<th> Package Id </th>
														<th> Student Name </th>
														<th> Transaction Id</th>
														<th> Status</th>
														<th> Date</th>
														
											
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_edugorilla_package_responses'] as $subscription) { ?>
														<tr class="odd gradeX">
															<!-- <td class="patient-img">
																<i class="fa fa-graduation-cap"></i>
															</td> -->
															<td class="left"><?php echo $subscription->id ?></td>
															<td class="left"><?php echo $subscription->package_id?></td>
                                                            <?php $get_user_detail = $adminMod->get_auth_detail($subscription->student_id); ?>
															<td class="left"><?php echo $get_user_detail->name?></td>
															<td class="left"><?php echo $subscription->transaction_id?></td>
                                                            <td class="left">
																<?php if($subscription->status == 0){ ?>
                                                                Failed
                                                                <?php }else{ ?>
                                                                    Sucessfull
                                                                <?php } ?>
                                                            </td>
															<td class="left"><?php echo $subscription->created_at?></td>
															
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
</div>
</div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>