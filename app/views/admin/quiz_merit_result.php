<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<?php
$adminMod = new Admins;

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Quiz Result</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/2/0">Quizes</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Result</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel tab-border card-box">
					<header class="panel-heading panel-heading-gray custom-tab ">
						<ul class="nav nav-tabs">
							
							<li class="nav-item"><a href="#about"  class="active" data-bs-toggle="tab">Merit</a>
							</li>
					
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
						
							<div class="tab-pane active" id="about">
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
										<tr>
											<th></th>
											<th> Id</th>
											<th> Quiz Name </th>
											<th> Dur(in min) </th>
											<th> Dur(in sec)</th>
											<th> School</th>
											<th> Class</th>
											<th> Subject</th>
											<th> Created By</th>
											<th> Date </th>
											<th>Time </th>
											<th>Action </th>
										</tr>
									</thead>

									<tbody>
										<?php $quiz_practice = $adminMod->get_particular_quiz(2) ?>
										<?php foreach ($quiz_practice as $quiz) { ?>
											<tr class="odd gradeX">

												<td class="patient-img">
													<img src="<?php echo URLROOT ?>/uploads/<?php echo $quiz->image ?>" alt="">
												</td>
												<td class="left"><?php echo $quiz->id ?></td>
												<td class="left"><?php echo $quiz->name ?></td>


												<td class="left"><?php echo  $quiz->duration_min ?></td>
												<td class="left"><?php echo  $quiz->duration_sec ?></td>
												<?php
												$adminMod = new Admins;
												$get_school_name = $adminMod->get_school_detail_single_name($quiz->school_name);
												$get_class_name = $adminMod->get_class_detail_single($quiz->class_name);
												$get_subject_name = $adminMod->get_single_school_subject($quiz->subject_name);
												?>
												<td class="left">
													<?php if ($quiz->school_name == 0) {
														echo "All";
													} else { ?>
														<?php echo $get_school_name->school_name ?>
													<?php  } ?>
												</td>

												<td class="left">
													<?php if ($quiz->class_name == 0) {
														echo "All";
													} else { ?>
														<?php echo $get_class_name->class_name ?>
													<?php } ?></td>
												<td class="left">
													<?php if ($quiz->subject_name == 0) {
														echo "All";
													} else { ?>
														<?php echo $get_subject_name->subject_name ?>
													<?php } ?></td>
												<td class="left"><?php echo $quiz->created_by ?></td>

												<td class="left"><?php echo date('d-m-y', strtotime($quiz->created_at)) ?></td>

												<td class="left"><?php echo date('h:i a', strtotime($quiz->created_at)) ?></td>
												<td>
													<a href="<?php echo URLROOT ?>/admin/quiz_result2/<?php echo $quiz->id; ?>"><button class="form-control"> View</button> </a>

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
<!-- end page content -->

<?php require APPROOT . '/views/inc_admin/footer.php'; ?>