<?php require APPROOT . '/views/inc_admin/header.php'; ?>

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
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Edit Quiz</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Quiz</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class=" col-sm-12">
	
				<div class="card-box">
							<?php  $detail = $data['get_single_quiz'] ?>

						
<form method="POST" action="<?php echo URLROOT; ?>/admin/update_quiz/<?php echo $detail->id; ?>" enctype="multipart/form-data" autocomplete="OFF">
	<div class="card-body row"> 
					<div class="card-head">
						<header>Edit Quiz Information</header>
			
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
				
							<!-- BANK DETAILS -->
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Name<span>*</span></label>
									<input type="text" name="quiz_name" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->name ?>" value="<?php echo $detail->name ?>" required>
								</div>
							</div>
						
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Duration<span>*</span></label>
									<select name="quiz_duration_min" class="form-control">
										<option>-Select Minute-</option>
										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option <?php if($detail->duration_min==$i){echo "selected"; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
								
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label></label>
							<select name="quiz_duration_sec" class="form-control">
							<option>-Select Second-</option>

										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option <?php if($detail->duration_sec==$i){echo "selected"; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
									</div>
									</div>

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->image)) { ?>
									<label>Update Quiz Photo<span>*</span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->image ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_image">
								<?php } else { ?>
									<label>Upload Quiz Photo<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_image" required>
								<?php } ?>
									
								</div>
							</div>

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->quiz_audio)) { ?>
									<label>Update Quiz Audio<span>*</span></label>
									
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_audio">
								<?php } else { ?>
									<label>Upload Quiz Audio<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_audio">
								<?php } ?>
									
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Start Date</label>
									<input type="date" name="start_date" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->start_date ?>" value="<?php echo $detail->start_date ?>" >
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>End Date</label>
									<input type="date" name="end_date" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->end_date ?>" value="<?php echo $detail->end_date ?>" >
								</div>
							</div>
						
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Class<span>*</span></label>
									<br>
									<select name="class" class="form-control" required>
										<option value="0">All</option>
										<?php foreach ($data['get_all_class'] as $class_detail) { ?>
											<option value="<?php echo $class_detail->id; ?>" <?php if($detail->class_name ==$class_detail->id){ echo "selected"; } ?>><?php echo $class_detail->class_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						
						
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Subject<span>*</span></label>
									<br>
									<select name="subject" class="form-control" required>
										<option value="0"> All</option>
										<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>" <?php if($detail->subject_name ==$subject_detail->id){ echo "selected"; } ?>><?php echo $subject_detail->subject_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Attempts<span>*</span></label>
									<select name="attempt" class="form-control">
										<option value="0" <?php if($detail->attempt ==0){ echo "selected"; }?>> Unlimited</option>
										<option value="1"  <?php if($detail->attempt ==1){ echo "selected"; }?>> 1</option>

									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Category<span>*</span></label>
									<br>
									<select name="category" class="form-control">
										
										<?php foreach ($data['get_all_quiz_category'] as $category) { ?>
											<option value="<?php echo $category->id; ?>" <?php if($detail->category ==$category->id){ echo "selected"; } ?>><?php echo $category->category; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Chapter<span>*</span></label>
									<input type="text" name="chapter" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->chapter ?>" value="<?php echo $detail->chapter ?>"  required>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Quiz Topic<span>*</span></label>
									<input type="text" name="topic" class="form-control mdl-textfield__input" placeholder="<?php echo $detail->topic ?>" value="<?php echo $detail->topic ?>"  required>
								</div>
							</div>
						
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Quiz Payment Type<span>*</span></label>
									<br>
									<select name="paid" class="form-control" required>
										<option value="">-Select Type-</option>
										<option value="1" <?php if($detail->paid ==1){ echo "selected"; } ?>>Paid</option>
										<option value="2" <?php if($detail->paid ==2){ echo "selected"; } ?>>Unpaid</option>
									</select>
								</div>
							</div>
							<div class="col-md-8 col-sm-8">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select School<span>*</span></label>
									<br>
									<select name="school" class="form-control">
										<option value="0">All</option>
										<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
											<option value="<?php echo $school_detail->id; ?>" <?php if($detail->school ==$school_detail->id){ echo "selected"; } ?>><?php echo $school_detail->school_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

						
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->quiz_resource)) { ?>
									<label>Update Quiz Resources<span></span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->quiz_resource ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource">
								<?php } else { ?>
									<label>Upload Quiz Resources<span></span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource" >
								<?php } ?>
									
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if (!empty($detail->quiz_map)) { ?>
									<label>Update Mind Map<span></span></label>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $detail->quiz_map ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map">
								<?php } else { ?>
									<label>Upload Quiz Map<span></span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map" >
								<?php } ?>
									
								</div>
							</div>
						
							</div>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->
				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Preview</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>