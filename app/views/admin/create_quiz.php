<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
<style>
	
</style>
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<style>
	.select2-container .select2-search--inline .select2-search__field {
		border: 0.7px solid #aaa;
		padding: 10px;
		width: 325px !important;
		height: 34px;
	}

	.select2-container .select2-selection--multiple .select2-selection__rendered {
		display: flex;
		padding: 10px;
	}

	.select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
		border: none;
	}

	.select2-selection__choice {
		background-color: #eee !important;
		border: 1px solid #eee !important;
		padding-right: 10px;
	}

	focus-visible {
		outline: 10px !important;
	}
</style>

<!-- start modal -->
<div class="modal show" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="addEventTitle">Create Quiz</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"
										aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form class="" action="add_quiz_first" method="POST">
										<input type="hidden" id="id" name="id">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Quiz Name</label>
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Enter Quiz Name"
															name="quiz_name" id="title">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 mb-4">
												<label>Class</label>
												<select class="form-select" id="categorySelect" name="class">
												<option value="0">All</option>
										<?php foreach ($data['get_all_class'] as $class_detail) { ?>
											<option value="<?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
										<?php } ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 mb-4">
												<label>Subject</label>
												<select class="form-select" id="categorySelect" name="subject">
												<option value="0"> All</option>
										<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->subject_name; ?></option>
										<?php } ?>
												</select>
											</div>
										</div>
										
										
										<div class="modal-footer bg-whitesmoke pr-0">
											<button type="submit" class="btn btn-round btn-primary" id="add-event">Create quiz</button>
											<!-- <button type="button" class="btn btn-round btn-primary" id="edit-event">Edit
												Event</button> -->
											<button type="button" id="close" class="btn btn-danger"
												data-bs-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal end -->
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Quiz</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Quiz</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Quiz Information</header>
						<!-- <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button3">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul> -->
					</div>
					<form method="POST" action="<?php echo URLROOT; ?>/admin/add_quiz" enctype="multipart/form-data" autocomplete="OFF">
						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Name<span>*</span></label>
									<input type="text" name="quiz_name" class="form-control mdl-textfield__input" placeholder="Enter Quiz Name">
								</div>
							</div>

							<div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label> Duration<span>*</span></label>
									<select name="quiz_duration_min" class="form-control">
										<option>Minute</option>
										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
								
								</div>
							</div>
							<div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label></label>
							<select name="quiz_duration_sec" class="form-control">
							<option>Seconds</option>

										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
									</div>
									</div>

							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Choose Photo&nbsp;<i
                                                        class="fa fa-file-image-o"></i><span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_image" required>
								
								</div>
							</div>
							<div class="col-md-4 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Choose Audio&nbsp;<i
                                                        class="fa fa-file-sound-o"></i><span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_audio" accept=".mp3,audio/*">
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Class<span>*</span></label>
									<br>
									<select name="class" class="form-control" required>
										<option value="0">All</option>
										<?php foreach ($data['get_all_class'] as $class_detail) { ?>
											<option value="<?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>


							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Subject<span>*</span></label>
									<br>
									<select name="subject" class="form-control" required>
										<option value="0"> All</option>
										<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->subject_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Category<span>*</span></label>
									<br>
									<select name="category" class="form-control" requierd>

										<?php foreach ($data['get_all_quiz_category'] as $category) { ?>
											<option value="<?php echo $category->id; ?>"><?php echo $category->category; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Chapter<span></span></label>
									<input type="text" name="chapter" class="form-control mdl-textfield__input" placeholder="Enter Quiz Chapter">
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Topic<span></span></label>
									<input type="text" name="topic" class="form-control mdl-textfield__input" placeholder="Enter Quiz Topic">
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Attempts<span></span></label>
									<select name="attempt" class="form-control">
										<option value="0"> Unlimited</option>
										<option value="1"> 1</option>

									</select>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Start Date</label>
									<input type="date" name="start_date" class="form-control mdl-textfield__input" placeholder="Enter Quiz Start Date">
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>End Date</label>
									<input type="date" name="end_date" class="form-control mdl-textfield__input" placeholder="Enter Quiz End Date">
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Quiz Payment Type<span></span></label>
									<br>
									<select name="paid" class="form-control">
										<option value="">-Select Type-</option>
										<option value="1">Paid</option>
										<option value="2">Unpaid</option>
									</select>
								</div>
							</div>
							<div class="col-md-5 col-sm-5">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select School<span></span></label>
									<br>
									<select name="school" class="form-control">
										<option value="0">All</option>
										<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
											<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Upload Quiz Resources  &nbsp;<i
                                                        class="fa fa-file-image-o"></i><span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource">
								
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Upload Mind Map &nbsp;<i
                                                        class="fa fa-file-image-o"></i><span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map">
								
								</div>
							</div>
							
							<!-- <div class="col-md-12 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Question<span>*</span></label>
									<br>
									<select name="checkbox[]" class="form-control select2 js-example-placeholder-multiple " multiple >
											<option value="" readonly>-Select Question-</option>
											<?php foreach ($data['get_all_quiz_master'] as $quiz) { ?>
											<option  value=<?php echo $quiz->id ?>><?php echo $quiz->question; ?></option>
											<?php } ?>
										</select>
								</div>
							</div> -->
						</div>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->
				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Proceed</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
</script>

<script>
	$(document).ready(function() {
		$('.select2').select2({
			closeOnSelect: false,
			allowClear: false
		});
	});
	$('select').select2({
		templateSelection: function(data) {
			if (data.id === '') { // adjust for custom placeholder values
				return 'Custom styled placeholder text';
			}
			return data.text;
		}
	});
	$(".js-example-placeholder-multiple").select2({
		placeholder: "Select Multiple"
	});
</script>
<!-- script to limit the input  -->
<script>
	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
</script>
