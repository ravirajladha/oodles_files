<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
table
{
  table-layout:fixed;
}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Courses</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="enquiry-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="enquiry-item" href="">Courses</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Courses</li>
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
											<header>All Courses</header>
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
														<th> Id</th>
														<th> Course name</th>
														<th> Price </th>
														<th> Offer Price </th>
														<th>Update</th>
													</tr>
												</thead>

												<tbody>
													<?php
													foreach ($data["courses"] as $course) {
													?>
													<form action="<?php echo URLROOT; ?>/admin/update_course/<?php echo  $course->id ?>" method="post">
													<tr>
														<td><?php echo  $course->id ?></td>
														<td><?php echo $course->name ?></td>
														<td><input class="form-control mdl-textfield__input" name="price" type="text" value="<?php echo $course->price ?>"> </td>
														<td><input class="form-control mdl-textfield__input" name = "discounted_price" type="text" value="<?php echo $course->discounted_price ?>"></td>
														<td><button class="btn btn-success" type="submit">Update</button></td>
													</tr>
													</form>
													<?php }?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<div class="row">
								
								
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