<?php require APPROOT . '/views/inc_teacher/header.php'; ?>
<style>
	.image-upload>input {
		visibility: hidden;
		width: 0;
		height: 0
	}

	textarea {
		max-width: 100%;
		display: block;
	}

	#previewImg {
		height: 25px;
		width: 30px;
		pointer-events: none
	}

	.mdl-textfield {
		padding: -9px 0 !important;
	}


	textarea::-webkit-input-placeholder {
		color: #ffffff;
		font-size: 12px;
	}

	textarea:-moz-placeholder {
		/* Firefox 18- */
		color: #ffffff;
		font-size: 12px;
	}

	textarea::-moz-placeholder {
		/* Firefox 19+ */
		color: #ffffff;
		font-size: 12px;
	}

	textarea:-ms-input-placeholder {
		color: #ffffff;
		font-size: 12px;
	}

	textarea::placeholder {
		color: #ffffff;
		font-size: 12px;
	}
</style>
<?php 
$get_teacher_detail = $data['get_teacher_detail'];
$class = $get_teacher_detail->class;
$class_detail= $this->adminModel->get_class_detail_single($class);

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Question</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Question</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Question</li>
				</ol>
			</div>
		</div>
		<form method="POST" action="<?php echo URLROOT; ?>/teacher/create_question_while_quiz/<?php echo $data['get_quiz_id']?>" enctype="multipart/form-data" autocomplete="OFF">
			<div class="row">
				<div class=" col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Add Question </header>
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

						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<div class="row">

									<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Class</label><br>
									<select class="form-control" name="class" id="class" required>
										<option readonly>--Select--</option>
										
											<option value=<?php echo $class; ?>><?php echo $class_detail->class_name; ?></option>
								
									</select>

								</div>
							</div>
							<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Subjects</label><br>
									<select class="form-control" name="subject" id="subject" required>
										<option readonly>--Select--</option>
										
									</select>

								</div>
							</div>

							<div class="col-lg-3">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Chapter</label><br>

									<select class="form-control" name="chapter" id="chapter" required>
										<option value="">-Select-</option>
									</select>

								</div>
							</div>
										
										<div class="col-lg-3">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label class="mdl-textfield__label">Select Chapter</label><br>
										
											<select name="topic" id="topic" class="form-control">
												<option value="">-Select-</option>
											</select>
										</div>
										</div>
										<!-- <div class="col-md-6">
											<label for="list2" class="">Add Topic<span></span></label>
											<input name="topic" class="form-control" type="text" placeholder="Enter Topic">
											
										</div> -->
										<!-- <div class="col-md-2">
											<label for="list2" class="">Score<span>*</span></label>
											<br>
											<select name="score" class="form-control" required>
												<option value="1">-Select Score-</option>
												<?php
												for ($i = 1; $i <= 10; $i++) {
												?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php
												}
												?>

											</select>
										</div> -->
									</div>

								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">Enter Question <span>*</span>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input">
												&ensp;&ensp;<i class="fa fa-image"></i>
												&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input" type="file" name="question_img" />
										</div>
									</label>
									<textarea rows="4" name="question" placeholder="Enter Question" style="background-color:#6673fc;color:white;width:100%;" required></textarea>
								</div>
							</div>


							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">1st Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option1" required>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input1">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input1" type="file" name="option1_img" />
										</div>
									</label>
									<textarea rows="4" cols="30" name="option1" placeholder="Enter First Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">2nd Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option2" radio>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input2">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input2" type="file" name="option2_img" />
										</div>
									</label>
									<textarea rows="4" cols="30" name="option2" placeholder="Enter Second Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">3rd Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option3" radio>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input3">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input3" type="file" name="option3_img" />
										</div>
									</label>
									<textarea rows="4" cols="30" name="option3" placeholder="Enter Third Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">4th Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option4" radio>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input4">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input4" type="file" name="option4_img" style="display: none;" />
										</div>
									</label>
									<textarea rows="4" cols="30" name="option4" placeholder="Enter Fourth Option" style="background-color:#ff7400;"></textarea>
								</div>
							</div>
							<div class="col-md-12 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">Explanation<span>*</span>

										<div class="image-upload" style="display:inline-block;">
											<label for="file-input5">
												&ensp;&ensp;<i class="fa fa-image"></i>&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
											</label>

											<input id="file-input5" type="file" name="explanation_img" />
										</div>
									</label>
									<textarea rows="2" name="explanation" placeholder="Enter Explanation" style="width:100%;background-color:#800080"></textarea>
								</div>
							</div>
						</div>
					</div>





				</div>
				<div class="row">

					<div class="col-lg-6 col-lg-6">
						<button type="submit" class="btn btn-primary" style="float: left;" id="submit" name="single_question"  value="single">Submit</button>
					</div>
					<div class="col-lg-6 col-lg-6">
						<button type="submit" class="btn btn-primary" style="float: right;" id="submit" name="multi_question" value="multi">Submit & Add More</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>

<script>
	$(document).ready(function() {
		$(document).on('change', '#subject', function() {
			var subject_id = $(this).val();

			if (subject_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_chapter_name',
					data: {
						subject_id
					},
					success: function(data) {
						$('#chapter').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#chapter').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '#class', function() {
			var class_id = $(this).val();
			if (class_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/teacher/get_subject_class_name',
					data: {
						class_id
					},
					success: function(data) {
						$('#subject').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#subject').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
    $(document).ready(function(){
        $(document).on('change', '#chapter', function(){
            var chapter_id = $(this).val();
		
            if(chapter_id.length != 0){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT?>/admin/get_topic_chapter_wise',
                    data: {chapter_id},
                    success: function(data){
                        $('#topic').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
            }else{
                $('#topic').html('<option value="">-Select-</option>');
            }
        });
    });
</script>