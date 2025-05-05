<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

<style>
	table {
		/* table-layout: fixed; */
	}
	@media (max-width: 767px) {
  .table-responsive {
    overflow-x: scroll;
  }
  /* .table{
	overflow-x: scroll;
  } */
  
}

</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz bank</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/1/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Quiz Bank</li>
				</ol>
			</div>
		</div>

		<form action="<?php echo URLROOT ?>/admin/change_status_of_quiz_master" method="post" enctype="multipart/form">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-head">
							<header>QUESTION BANK</header>
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
										<button id="addRow1" class="btn btn-info" value="1" name="submit_approve" type="submit">
											APPROVE <i class="fa fa-plus"></i>
										</button>
										<button id="addRow1" class="btn btn-warning" value="2" name="submit_trash" type="submit">
											Reject <i class="fa fa-trash"></i>
										</button>
										<!-- <button id="addRow1" class="btn btn-danger" value="0" name="submit" type="submit">
                                                     <i class="fa fa-minus"></i>
                                                </button> -->
									</div>
								</div>
								<!-- <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group pull-right">
                                                <button class="btn deepPink-bgcolor  btn-outline dropdown-toggle"
                                                    data-bs-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
							</div>
							<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover table-checkable order-column" style="width: 100%" id="example4">
								<thead>
									<tr>
										<th>
											<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
												<input type="checkbox" class="group-checkable selectall" data-set="#sample_1 .checkboxes" />
												<span></span>
											</label>
										</th>
										<th > QUESTION </th>
										<th> OPTION1 </th>
										<th> OPTION2 </th>
										<th> OPTION3 </th>
										<th> OPTION4 </th>
										<th> ANSWER </th>
										<th> TEACHER </th>
										<th> SCHOOL </th>
										<th> STATUS </th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data['get_all_inactive_question'] as $question) { ?>
										<tr class="odd gradeX">


											<td>
												<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
													<input type="checkbox" class="checkboxes" name="checkbox[]" value="<?php echo $question->id; ?>" />
													<span></span>
												</label>
											</td>
											<td> <?php echo $question->question; ?> </td>
											<td>
												<?php echo $question->option1; ?>
											</td>
											<td>
												<?php echo $question->option2; ?>
											</td>
											<td>
												<?php echo $question->option3; ?>
											</td>
											<td>
												<?php echo $question->option4; ?>
											</td>
											<td>
												<?php echo $question->answer; ?>
											</td>
											<?php
											$adminMod = new admins;
											$get_auth_detail = $adminMod->get_current_user_auth_by_id($question->created_by);
											// This situation was introduced becuase admin wants to bring a subadmin who can add the question for him with limitation in the system. He is allowed to access few pages.
if (($question->created_by !=1) && ($question->created_by !=100)) {
    $get_single_teacher  = $adminMod->get_single_teacher($question->created_by);
    $get_ind_school = $adminMod->get_ind_school($get_single_teacher->school);
}
											?>
											<td>
											<?php 	if($question->created_by !=1){
												echo "Admin";
											}elseif($question->created_by !=100){
												echo "SubAdmin";
											}else{
												echo $get_auth_detail->name;
											}
												?>
											</td>
											<td>
											<?php 	if($question->created_by !=1){
												echo "Admin";
											}elseif($question->created_by !=100){
												echo "SubAdmin";
											}else{
												echo $get_ind_school->school_name;
											}
												?>
												
											</td>
											<td>
												<span class="label label-sm label-success"> <?php if ($question->status == 0) {
																								echo "Pending";
																							} elseif($question->status == 1) {
																							echo	"Approved";
												} elseif ($question->status == 2) {
													echo "Rejected";
												}?>
												</span>
											</td>
											<!-- <td class="valigntop">
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Actions
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-left" role="menu">
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-docs"></i> New Post </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-tag"></i> New Comment </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-user"></i> New User </a>
                                                            </li>
                                                            <li class="divider"> </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-flag"></i> Comments
                                                                    <span class="badge badge-success">4</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td> -->

										</tr>

									<?php } ?>

								</tbody>
							</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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
<script>

                        $('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});
</script>