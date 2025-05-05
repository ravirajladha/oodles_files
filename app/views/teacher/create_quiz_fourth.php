<?php require APPROOT . '/views/inc_teacher/header.php'; ?>

<br>
<style>
	hr {
		border: 11;
		border-top: 8px solid #6673fc;
		border-bottom: 19;
	}
</style>
<!-- start page content -->
<?php
$adminMod = new Admins;
$url = $_SERVER['REQUEST_URI'];
$trimmed_url = trim($url, '/');
$exploded_value = explode('/', $trimmed_url);
$page_path = end($exploded_value);
$get_current_quiz = $adminMod->get_single_quizes_i($page_path);

$subject = $get_current_quiz->subject_name;
$class = $get_current_quiz->class_name;
$chapter = $get_current_quiz->chapter;
$teacherMod = New Teachers;
$get_teacher_detail  = $teacherMod->get_teacher_detail();
$school = $get_teacher_detail->school;

// $get_all_question = $adminMod->get_selected_question($subject, $class);
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Select Question </div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT?>/teacher/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;</i>
					</li>
					<!-- <li class="active">Add Quiz</li> -->
				</ol>
			</div>
		</div>
		<div class="row">
			<div class=" col-sm-6">
				<div class="card-box">
					<div class="card-head">
						<header>Select Questions
							<?php
							$array = explode(',', $get_current_quiz->chapter);
							$chapter = "";
							$count = 0;
							foreach ($array as $value) {
								// $get_all_question = $adminMod->get_all_questions_for_chapter($value,$school);
								$get_all_question = $adminMod->get_all_questions_for_chapter($value);
								foreach ($get_all_question as $question) {
									$get_all_question_in_current_quiz=  explode(',',$get_current_quiz->question);
if((in_array($question->id,$get_all_question_in_current_quiz))==false){

									$count++;
								} 
							} ?>
							<?php } ?>
							(<?php echo $count; ?>)
						</header>

					</div>

					<div class="card-body row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php if ($count == 0) { ?>
									<h2>No Questions present in the selected Chapters.<br> Go back and select suitable chapters. </h2>
								<?php } ?>
								<?php
								$i = 1;

								$array = explode(',', $get_current_quiz->chapter);
								$chapter = "";
								$count = 0;
								foreach ($array as $value) {
									// $get_all_question = $adminMod->get_all_questions_for_chapter($value,$school);
									$get_all_question = $adminMod->get_all_questions_for_chapter($value);
									$count++;
									foreach ($get_all_question as $question) { 

$get_all_question_in_current_quiz=  explode(',',$get_current_quiz->question);
if((in_array($question->id,$get_all_question_in_current_quiz))==false){
	?>

									<div id="<?php echo $question->id;?>">
										<label>
											<?php echo $i ?>&nbsp;)&nbsp;<?php echo $question->question; ?>
										</label>

										<?php $i++; ?>

										<a href="<?php echo URLROOT ?>/teacher/add_question_to_quiz/<?php echo $question->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-plus-square"></i>
										</a>
										<p <?php if (strtolower($question->answer) == strtolower("option1")) { ?>style="color:green;padding:5px;" <?php } else { ?>style="color:red;" <?php  } ?>> 1. <?php echo $question->option1; ?></p>
										<p <?php if (strtolower($question->answer) == strtolower("option2")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 2. <?php echo $question->option2; ?></p>
										<p <?php if (strtolower($question->answer) == strtolower("option3")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 3. <?php echo $question->option3; ?></p>
										<p <?php if (strtolower($question->answer) == strtolower("option4")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 4. <?php echo $question->option4; ?></p>
										<p style="font-size:13px;">
											<?php
											$adminMod = new admins;
											$get_chapter_detail = $adminMod->get_single_chapter($question->chapter);
											echo $get_chapter_detail->name;

											?> || Multiple Choice Questions
										</p>
										<hr />
									</div>
									<?php } ?>
								<?php } 
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-sm-6">
				<div class="card-box">
					<div class="card-head">
						<header> Added Questions
							<?php
							if (!empty($get_current_quiz->question)) {
								$count_of_added_question = 0;
							?>
							<?php $array = explode(',', $get_current_quiz->question);
								foreach ($array as $value1) //loop over values

								{
									$count_of_added_question++;
								}
								echo "(" . $count_of_added_question . ")";
							}
							?>

						</header>

						<a href="<?php echo URLROOT ?>/teacher/add_question_while_quiz/<?php echo $page_path; ?>" style="float:right;"> <button type="button" class="btn btn-circle btn-success"><i class="fa fa-plus"></i> Add Question</button></a>
						<a href="<?php echo URLROOT ?>/teacher/update_quiz_first/<?php echo $page_path; ?>" style="float:right;"> <button type="button" class="btn btn-circle btn-warning"><i class="fa fa-book"></i> Change Chapters </button></a>
					</div>

					<div class="card-body row">
						<!-- BANK DETAILS -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>
									<?php
									$count_of_added_question = 0;
									$array = explode(',', $get_current_quiz->question);
									foreach ($array as $value) //loop over values

									{
										$adminMod = new Admins;

										$get_question_name = $adminMod->get_single_question($value);
										if ($get_question_name) {
											$count_of_added_question++;
											echo $count_of_added_question . "&nbsp)&nbsp" . $get_question_name->question;

									?></label>

								<a href="<?php echo URLROOT ?>/teacher/delete_question_from_quiz/<?php echo $get_question_name->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-trash-can"></i></a>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option1")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 1. <?php echo $get_question_name->option1; ?></p>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option2")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 2. <?php echo $get_question_name->option2; ?></p>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option3")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 3. <?php echo $get_question_name->option3; ?></p>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option4")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 4. <?php echo $get_question_name->option4; ?></p>
								<p style="font-size:13px;">
									<?php
											$adminMod = new admins;
											$get_chapter_detail = $adminMod->get_single_chapter($get_question_name->chapter);
											echo $get_chapter_detail->name;
									?> || Multiple Choice Questions
								</p>
								<hr />
						<?php }
									}
						?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-lg-6">
					<a class="btn btn-primary" href="<?php echo URLROOT; ?>/teacher/quizes/<?php echo $get_current_quiz->category?>/<?php echo $get_current_quiz->subject_name?>" role="button" style="float: right;">Finish</a>
				</div>
				<!-- <div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Submit</button>
				</div> -->

			</div>
		</div>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

