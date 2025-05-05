<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


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
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">

					<div class="page-title">Create Quizes</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Scholarships</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Create Quiz </li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Create Quiz</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul>
					</div>
					<?php foreach($data['get_single_quiz'] as $quiz_detail){?>

					<form method="POST" action="<?php echo URLROOT; ?>/admin/update_quiz/<?php echo $quiz_detail->id?>" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtTimeLength" name="quiz_name" placeholder="<?php echo $quiz_detail->name?>" value="<?php echo $quiz_detail->name?>">
									<label class="mdl-textfield__label">Quiz Name</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="number" id="txtTimeLength" name="quiz_duration"  placeholder="<?php echo $quiz_detail->duration?>" value="<?php echo $quiz_detail->duration?>">

									<label class="mdl-textfield__label">Quiz Duration</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Start Date</label><br>
									<input class="mdl-textfield__input" type="date" id="txtTimeLength" name="start_date"  placeholder="<?php echo $quiz_detail->start_date?>" value="<?php echo $quiz_detail->start_date?>">


								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">End Date</label><br>
									<input class="mdl-textfield__input" type="date" id="txtTimeLength" name="end_date"  placeholder="<?php echo $quiz_detail->end_date?>" value="<?php echo $quiz_detail->end_date?>">

								</div>
							</div>

							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">


									Select any one:

									<label for="html">Paid</label>
									<input type="radio" id="html" name="paid" value="0" <?php 
     if($quiz_detail->paid=='0'){?> 
         checked="checked" 
<?php }?> >

									<label for="css">Unpaid</label>
									<input type="radio" id="css" name="paid" value="1" <?php 
     if($quiz_detail->paid=='1'){?> 
         checked="checked" 
<?php }?> >



								</div>
							</div>
							<div class="col-md-6 col-sm-6">

								<div class="form-group">
									<label>Select school: </label>
								
								

									<select name="school" class="form-control">
										<option value="0" 	<?php if($quiz_detail->school_name =='0'){ ?>selected="selected"<?php }?>>All</option>
										<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
											<option value="<?php echo $school_detail->id; ?>" 
										<?php if($quiz_detail->school_name ==$school_detail->id ){ ?>selected="selected"<?php }?>
										><?php echo $school_detail->institute_name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>


			

							<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label for="" class="">Select question for the quizes<span>&nbsp;*</span></label>
								<select name="checkbox[]" class="form-control select2" multiple>
									<?php $question_array= explode(',', $quiz_detail->question) ?>

									<?php foreach ($data['get_all_quiz_master'] as $question) { ?>
										<option value="<?php echo $question->id ?>" <?php if (in_array($question->id,$question_array)) {
																								echo "selected";
																							} ?>><?php echo $question->question; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>


							<div class="col-lg-5 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="file" id="maxStu" name="quiz_image">
										


								</div>
							</div>
							<div class="col-lg-1 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<img src="<?php echo URLROOT?>/uploads/<?php echo $quiz_detail->image ?>" style="height:60px;" style="width:60px;">
										


								</div>
							</div>
							<!-- <div class="col-lg-4 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="file" id="maxStu" name="quiz_image" required>
									<spanclass="profile-desc-item pull-right">	<img src="<?php echo URLROOT?>/uploads/<?php echo $quiz_detail->image ?>" style="height:40px;" style="width:40px;"></span>


								</div>
							</div> -->
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
									<label for="list2" class="mdl-textfield__label">Select Class</label>
									<select name="class" class="form-control">
										<option value="0" <?php if($quiz_detail->class_name =='0'){ ?>selected="selected"<?php }?>>All</option>
										<?php foreach ($data['get_all_class'] as $class_detail) { ?>
											<option value="<?php echo $class_detail->id; ?>" 
											<?php if($quiz_detail->class_name== $class_detail->id){ ?> 
												selected
<?php }?>
											><?php echo $class_detail->class_name; ?></option>
										<?php } ?>
									</select>


								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
									<label for="list2" class="mdl-textfield__label">Select Subject</label>
									<select name="subject" class="form-control">
										<option value="0" 	<?php if($quiz_detail->subject_name =='0'){ ?>selected="selected"<?php }?>> All</option>
										<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>" <?php if($quiz_detail->subject_name== $subject_detail->id){ ?> 
												selected
<?php }?>><?php echo $subject_detail->subject_name; ?></option>
										<?php } ?>
									</select>


								</div>
							</div>

							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
									<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
									<label for="list2" class="mdl-textfield__label">Select Category</label>
									<select name="category" class="form-control">
										
										<?php foreach ($data['get_all_quiz_category'] as $category) { ?>
											<option value="<?php echo $category->id; ?>" <?php if($quiz_detail->category==$category->id){echo "selected";} ?>><?php echo $category->category; ?></option>
										<?php } ?>
									</select>


								</div>
							</div>

						</div>


						<a class="btn btn-danger" href="<?php echo URLROOT; ?>/admin/reject_quiz/<?php echo $quiz_detail->id?>" role="button"><span>Reject</a><span>----</span>
						<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" name="submit">Final submit</button>
					</form>
<?php } ?>
					<!-- <div class="col-lg-12 p-t-20">
											<label class="control-label col-md-3">Scholarship Photo
											</label>
											<div class="col-md-12">
												<div id="id_dropzone" class="dropzone"></div>
											</div>
										</div>
									 <div class="col-lg-12 p-t-20 text-center">-->
					<!-- <button type="button"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>  -->
					<!-- <button type="button"
												class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button> -->
					<!-- </div>  -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php if (isset($_SESSION['success'])) { ?>
	<script type="text/javascript">
		swal("<?php echo $_SESSION['success']; ?>");
	</script>
<?php }
unset($_SESSION['success']); ?>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
		$('.select2').select2({
			closeOnSelect: false,
			allowClear: false
		});
	});

	$('select').select2({
  templateSelection: function (data) {
    if (data.id === '') { // adjust for custom placeholder values
      return 'Custom styled placeholder text';
    }

    return data.text;
  }
});


</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>