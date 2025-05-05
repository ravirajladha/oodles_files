<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<?php $studentMod = new students;
$scholarship_id = $data['scholarship_id'];
$get_scholarship_detail  = $data['get_single_scholarship'];

$get_coprorate_detail = $studentMod->get_corporate_detail($get_scholarship_detail->offered_by);
?>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> 
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<?php $detail = $data['get_single_scholarship']; ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Scholarship Details</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Scholarship Details</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="card">
							<div class="card-topline-aqua">
								<header></header>
							</div>
							<div class="white-box">
								<!-- Nav tabs -->
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo">
										<div id="biography">
											<h4 class="font-bold">INSTRUCTIONS</h4>
											<p><?php echo $detail->instructions; ?></p>
										</div>
										<label>
											<input type="checkbox" id="confirmCheckbox">
											Please check if you confirm with our T&amp;C.
										</label>
										<br>


									</div>
								</div>
							</div>

						</div>
						<!-- <a href="<?php echo URLROOT; ?>/student/pay_now_for_scholarship/<?php echo $detail->id; ?>"> <button type="button" class="btn btn-success" style="width:100%;display: none;" id="payNowButton">Pay Now (Rs. 49)</button></a> -->


						<hr>
						<!-- checking the scholarship validity is valid or not -->
						<?php
						if (($detail->start_date <= date('Y-m-d')) && ($detail->end_date >= date('Y-m-d'))) {
							$scholarship_valid = 1;
						} else {
							$scholarship_valid = 0;
						}
						?>
						<!-- Criteria answering div -->

						<!-- Criteria answering div end-->
						<!-- Documents uploadation div -->
						<!-- <form action="<?php echo URLROOT ?>/student/submit_scholarship_document/<?php echo $detail->id ?>" method='POST' id="myForm" enctype="multipart/form-data" autocomplete="OFF"> -->
						<form action="<?php echo URLROOT ?>/student/submit_scholarship_document2/<?php echo $detail->id ?>" method='POST' id="myForm" enctype="multipart/form-data" autocomplete="OFF">
							<div class="card" <?php
												$studentMod = new Students;
												$get_scholarship_application = $studentMod->get_scholarship_application($detail->id);


												if (empty($get_scholarship_application)) {
													if (($scholarship_valid == 0)) {
														echo "style='display:none;'";
													}
												} else {
													echo "style='display:block;'";
												}
												?>>

								<div class="card-topline-aqua">
									<header>Upload Documents</header>
								</div>
								<div class="white-box">
									<!-- Nav tabs -->
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active fontawesome-demo">
											<div id="biography">
												<?php
												$studentMod = new Students;


												$array = explode(',', $detail->documents_required);
												$student_class = $_SESSION['rexkod_oodles_student_class'];
												foreach ($array as $document_id) {
													$get_document_detail = $studentMod->get_scholarship_document_detail($document_id);
													// echo $get_criteria_detail->criteria_name;

													$get_document_detail = $studentMod->get_scholarship_document_detail($document_id);
													// echo $get_document_detail->document_name;
												?>
													<div class="form-group row">
														<label class="col-sm-6 control-label"><?php echo $get_document_detail->name; ?></label>
														<div class="col-sm-6">
															<input type="file" name="<?php echo $document_id; ?>" class="form-control" required>


														</div>
													</div>
												<?php


												}
												?>
												<!-- <center><button type="submit" class="mdl-button  mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-success" style="width:100%;display: none;" id="payNowButton">Pay & Submit (Rs. <?php echo $get_scholarship_detail->student_charge; ?> )</button></center> -->
											
												<!-- added by ashutosh-- remove pay button from here and add after document verification-->
												<center><button type="submit" class="mdl-button  mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-success" style="width:100%;display: none;" id="payNowButton">Submit</button></center>





											</div>
										</div>
									</div>
								</div>

							</div>
						</form>
						<!-- Documents uploadation div end-->
					</div>
				</div>
				<!-- END PROFILE CONTENT -->
			</div>
		</div>
	</div>
</div>



<!-- end page content -->
<?php require APPROOT . '/views/inc_student/footer.php'; ?>

<script>
	document.getElementById("confirmCheckbox").addEventListener("click", function() {
		var payNowButton = document.getElementById("payNowButton");
		if (this.checked) {
			payNowButton.style.display = "inline-block";
		} else {
			payNowButton.style.display = "none";
		}
	});
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <script>
	document.getElementById('myForm').addEventListener('submit', function(event) {
		event.preventDefault(); // prevent form submission
		Swal.fire({
			title: 'Money will be debited from wallet?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Continue the payment!'
		}).then((result) => {
			if (result.isConfirmed) {
				// submit the form
				document.getElementById('myForm').submit();
			}
		});
	});
</script> -->