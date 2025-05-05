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
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
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
							<li class="nav-item"><a href="#home" data-bs-toggle="tab" class="active">Practice</a>
							</li>
							<li class="nav-item"><a href="#about" data-bs-toggle="tab">Merit</a>
							</li>
							<li class="nav-item"><a href="#profile" data-bs-toggle="tab">Rapid Fire</a>
							</li>
							<li class="nav-item"><a href="#contact" data-bs-toggle="tab">Contest</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane active" id="home">
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
										<?php $quiz_practice = $adminMod->get_particular_quiz(1) ?>
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
							<div class="tab-pane" id="about">
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
							<div class="tab-pane" id="profile">
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
										<?php $quiz_practice = $adminMod->get_particular_quiz(3) ?>
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
							<div class="tab-pane" id="contact">
							
								<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
									<thead>
								*****Here, the generate button  will automatically show when the contest quiz will get finish.
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
									
										
											<th>View </th>
											<th>Action </th>
										</tr>
									</thead>

									<tbody>
										<?php $quiz_practice = $adminMod->get_particular_quiz(4) ?>
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

												<!-- <td class="left"><?php echo date('d-m-y', strtotime($quiz->created_at)) ?></td> -->

												<!-- <td class="left"><?php echo date('h:i a', strtotime($quiz->created_at)) ?></td> -->
												<td><a href="<?php echo URLROOT; ?>/admin/view_quiz/<?php echo $quiz->id; ?>" target="_blank">View Quiz</a></td>
												<td>
													<?php 
$quiz_end_time = $quiz->end_time;
$quiz_end_date = $quiz->end_date;
$end_datetime = $quiz_end_date . ' ' . $quiz_end_time;

// Convert the end date and time to a UNIX timestamp
$end_timestamp = strtotime($end_datetime);

// Get the current timestamp
$current_timestamp = time();

// Compare the timestamps to check if the end date and time has passed
if ($end_timestamp < $current_timestamp) {
if ($quiz->generate==0) {
    ?>
   <!-- The end date and time has passed -->
   
   <form  action="<?php echo URLROOT; ?>/admin/generate_quiz_to_view/<?php echo $quiz->id; ?>" method="POST">
            <button type="submit" class="form-control btn-danger" onclick="return confirm('Are you sure?')">Generate</button>
			<span>The contest has ended.</span>
            </form>
<?php }else{  ?>
	<a href="<?php echo URLROOT ?>/admin/quiz_result2/<?php echo $quiz->id; ?>"><button class="form-control"> View</button> </a>

<?php }


  
} else {
  // The end date and time has not passed
  echo 'The contest is still ongoing.';
}
?>
													

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