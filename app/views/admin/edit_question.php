<?php require APPROOT . '/views/inc_admin/header.php'; ?>
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
<?php $quiz = $data['get_single_question'] ?>
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
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quiz_master/0/0/0/0">Question</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Question</li>
				</ol>
			</div>
		</div>
		<form method="POST" action="<?php echo URLROOT; ?>/admin/update_question/<?php echo $quiz->id ?>" enctype="multipart/form-data" autocomplete="OFF">
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

						<?php 
$adminMod = New admins;
if($quiz->class !=0){
	$get_single_class = $adminMod->get_single_class($quiz->class);
$class_name = $get_single_class->class_name;
}else{
	$class_name = "All";
}

$get_single_subject = $adminMod->get_single_subject($quiz->subject);
$subject_name = $get_single_subject->subject_name;
$get_single_chapter = $adminMod->get_single_chapter($quiz->chapter);
$chapter_name = $get_single_chapter->name;
$get_single_topic = $adminMod->get_single_topic($quiz->topic);
$topic_name = $get_single_topic->name;
											?>
						<div class="card-body row">
							<!-- BANK DETAILS -->
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<div class="row">

										<div class="col-md-6">
											<label for="list2" class="">Select Class<span>*</span></label>
											<br>
										<input name="class" class="form-control" type="text" value="<?php echo $quiz->class ?>" placeholder="<?php echo $class_name?>" hidden>
											<input  class="form-control" type="text"  placeholder="<?php echo $class_name;?>" readonly>
										</div>
										<div class="col-md-6">
											<label for="list2" class="">Select Subject<span>*</span></label>
											<br>
											<input name="subject" class="form-control" type="text" value="<?php echo $quiz->subject ?>" placeholder="<?php echo $subject_name?>" hidden>
											<input  class="form-control" type="text"  placeholder="<?php echo $subject_name?>" readonly>

											<!-- <select name="subject" class="form-control" readonly>
												
												<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
													<option value="<?php echo $subject_detail->id; ?>" <?php if ($quiz->subject == $subject_detail->id) {
												echo "selected";
												} ?>><?php echo $subject_detail->subject_name; ?></option>
												<?php } ?>
											</select> -->
										</div>
										<!-- <div class="col-md-2">
											<label for="list2" class="">Score<span>*</span></label>
											<br>
											<select name="score" class="form-control">
												<option value="1">-Select Score-</option>
												<?php
										for ($i = 1; $i <= 10; $i++) {
										?>
											<option <?php if($quiz->score ==$i){ echo "selected"; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
												
											</select>
										</div> -->
										<div class="col-md-6">
											<label for="list2" class="">Add Chapter<span></span></label>
											<br>
										
											<input name="chapter" class="form-control" type="text" value="<?php echo $quiz->chapter ?>" placeholder="<?php echo $chapter_name?>" hidden>
											<input  class="form-control" type="text"  placeholder="<?php echo $chapter_name?>" readonly>
											
										</div>
										<div class="col-md-6">
											<label for="list2" class="">Add Topic<span></span></label>
											<input name="topic" class="form-control" type="text" value="<?php echo $quiz->topic?>" placeholder="<?php echo $topic_name?>" hidden>
											<input  class="form-control" type="text" placeholder="<?php echo $topic_name?>" readonly>
											
										</div>
									</div>

								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">Enter Question <span>*</span>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input">
											&ensp;&ensp;<i class="fa fa-image"></i>
											</label>

											<input id="file-input" type="file" name="question_img" />
											<?php if (!empty($quiz->question_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->question_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
									&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
										</div>
									
									</label>
									<textarea rows="4" name="question" placeholder="Enter question" style="background-color:#6673fc;color:white;width:100%;"><?php echo $quiz->question ?></textarea>
								</div>
							</div>




							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">First Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option1" <?php
																										if ($quiz->answer == 'option1') { ?> checked="checked" <?php } ?>>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input1">
											&ensp;&ensp;<i class="fa fa-image"></i>
											</label>

											<input id="file-input1" type="file" name="option1_img" />
											<?php if (!empty($quiz->option1_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->option1_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
									
										</div>
										&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
									</label>
									<textarea id="oodles_editor1" rows="4" cols="30" name="option1" placeholder="Enter First Option" style="background-color:#ff7400;"><?php echo $quiz->option1 ?></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;">Second Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option2" <?php
																																if ($quiz->answer == 'option2') { ?> checked="checked" <?php } ?>>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input2">
											&ensp;&ensp;<i class="fa fa-image"></i>

											</label>

											<input id="file-input2" type="file" name="option2_img" />
											<?php if (!empty($quiz->option2_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->option2_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
									
										</div>
										&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
									</label>
									<textarea id="oodles_editor2" rows="4" cols="30" name="option2" placeholder="Enter Second Option" style="background-color:#ff7400;"><?php echo $quiz->option2 ?></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">Third Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option3" <?php
																																if ($quiz->answer == 'option3') { ?> checked="checked" <?php } ?>>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input3">
											&ensp;&ensp;<i class="fa fa-image"></i>
											</label>

											<input id="file-input3" type="file" name="option3_img" />
											<?php if (!empty($quiz->option3_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->option3_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
										</div>
										&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
									</label>
									<textarea id="oodles_editor3" rows="4" cols="30" name="option3" placeholder="Enter Third Option" style="background-color:#ff7400;"><?php echo $quiz->option3 ?></textarea>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block;max-width: 100%;">Fourth Option<span>*</span>
										<input type="radio" class="radio" name="answer" value="option4" <?php
																																if ($quiz->answer == 'option4') { ?> checked="checked" <?php } ?>>
										<div class="image-upload" style="display:inline-block;">
											<label for="file-input4">
											&ensp;&ensp;<i class="fa fa-image"></i>
											</label>

											<input id="file-input4" type="file" name="option4_img" style="display: none;" />
											<?php if (!empty($quiz->option4_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->option4_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
										</div>
										&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
									</label>
									<textarea id="oodles_editor4" rows="4" cols="30" name="option4" placeholder="Enter Fourth Option" style="background-color:#ff7400;"><?php echo $quiz->option4 ?></textarea>
								</div>
							</div>
							<div class="col-md-12 col-sm-12">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label style="display:block; max-width: 100%;">Explanation<span>*</span>

										<div class="image-upload" style="display:inline-block;">
											<label for="file-input5">
											&ensp;&ensp;<i class="fa fa-image"></i>
											</label>

											<input id="file-input5" type="file" name="explanation_img" />
											<?php if (!empty($quiz->explanation_img)) { ?>
									<a href="<?php echo URLROOT ?>/uploads/<?php echo $quiz->explanation_img ?>" id="blah" target="_blank"><i class='fa-solid fa-eye'></i></a>
									<?php } ?>
										</div>
										&ensp;&ensp; <span aria-hidden="true" class="icon-info "></span>
												&nbsp;
												</span>
									</label>
									<textarea id="oodles_editor5" rows="2"  name="explanation" placeholder="Enter Explanation" style="width:100%;background-color:#800080;"><?php echo $quiz->explanation ?></textarea>
								</div>
							</div>
						</div>
					</div>





				</div>
				<div class="row">

					<div class="col-lg-6 col-lg-6">
						<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Submit</button>
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
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script>
	CKEDITOR.replace('oodles_editor1', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor2', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor3', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor4', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>
<script>
	CKEDITOR.replace('oodles_editor5', {
		extraPlugins: 'mathjax',
		mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
		height: 150
	});

	if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
		document.getElementById('ie8-warning').className = 'tip alert';
	}

	function domChanged() {
		renderMathInElement(document.body);
	}
</script>

