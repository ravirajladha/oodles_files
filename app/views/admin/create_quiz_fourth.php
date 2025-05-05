<?php require APPROOT . '/views/inc_admin/header.php'; ?>

<br>
<style>
	/* div{
		word-wrap:break-word;
	} */
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
$get_all_quizes = $adminMod->get_all_quizes();
$capacity_full = 0;



// $get_all_question = $adminMod->get_selected_question($subject, $class);
?>

<?php
$count_of_added_question = 0;
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
if ($count_of_added_question >= $get_current_quiz->no_of_questions) {
	$capacity_full = 1;
}
?>

<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Select Question </div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/<?php echo $get_current_quiz->category; ?>/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/create_quiz_third/<?php echo $get_current_quiz->id; ?>">Select Chapter</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>

					<li class="active">Add Question</li>
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
								$get_all_question = $adminMod->get_selected_question($value);

								foreach ($get_all_question as $question) {
									$get_all_question_in_current_quiz =  explode(',', $get_current_quiz->question);
									if ((in_array($question->id, $get_all_question_in_current_quiz)) == false) {

										$count++;
									}
								}
							?>
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
									$get_all_question = $adminMod->get_selected_question($value);
									$count++;


									foreach ($get_all_question as $question) {
										// echo $question->question;
										$get_all_question_in_current_quiz =  explode(',', $get_current_quiz->question);
										if ((in_array($question->id, $get_all_question_in_current_quiz)) == false) {
								?>

											<div id="<?php echo $question->id; ?>">
												<p style="word-wrap:break-word;">
													<?php echo $i ?>&nbsp;&nbsp;<?php echo $question->question; ?>
													<?php if(!empty($question->question_img)){ ?>
													<img src="<?php echo URLROOT; ?>/uploads/<?php echo $question->question_img; ?>"  style="width:100%;height:80px;">
													<?php } ?>
												</p>

												<?php $i++; ?>
												<?php if ($capacity_full == 0) { ?>
													<a href="<?php echo URLROOT ?>/admin/add_question_to_quiz/<?php echo $question->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-plus-square"></i>
													</a>
												<?php } ?>
												<p <?php if (strtolower($question->answer) == strtolower("option1")) { ?> style="color:green;padding:0px;" <?php } else { ?> style="color:red;word-wrap:break-word;" <?php  } ?> > 1. <?php echo $question->option1; ?>
											
											
												<?php if(!empty($question->option1_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $question->option1_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>

											</p> 

												<p <?php if (strtolower($question->answer) == strtolower("option2")) { ?>style="color:green;" <?php } else { ?> style="color:red;word-wrap:break-word;" <?php  } ?>> 2. <?php echo $question->option2; ?>
												<?php if(!empty($question->option2_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $question->option2_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>
											</p>
											


												<p <?php if (strtolower($question->answer) == strtolower("option3")) { ?>style="color:green;" <?php } else { ?> style="color:red;word-wrap:break-word;" <?php  } ?>> 3. <?php echo $question->option3; ?>
												<?php if(!empty($question->option3_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $question->option3_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>
												</p>

												<p <?php if (strtolower($question->answer) == strtolower("option4")) { ?>style="color:green;" <?php } else { ?> style="color:red;word-wrap:break-word;" <?php  } ?>> 4. <?php echo $question->option4; ?>
											
												<?php if(!empty($question->option4_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $question->option4_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?></p>


												<p style="font-size:13px;">
													<?php
													$adminMod = new admins;
													$get_chapter_detail = $adminMod->get_single_chapter($question->chapter);
													echo $get_chapter_detail->name;
													$count_of_used_question = 0;
													foreach ($get_all_quizes as $all_quiz_from_db) {
														$all_quiz = explode(',', $all_quiz_from_db->question);
														if (in_array($question->id, $all_quiz)) {
															$count_of_used_question++;
														}
													}
													?> || Multiple Choice Questions || No. of times used: <?php echo $count_of_used_question; ?>
												</p>
												<hr />
											</div>
									<?php }
									}
									?>




								<?php } ?>
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

						<a href="<?php echo URLROOT ?>/admin/add_question_while_quiz/<?php echo $page_path; ?>" style="float:right;"> <button type="button" class="btn btn-circle btn-success"><i class="fa fa-plus"></i> Add Question</button></a>
						<a href="<?php echo URLROOT ?>/admin/update_quiz_first/<?php echo $page_path; ?>" style="float:right;"> <button type="button" class="btn btn-circle btn-warning"><i class="fa fa-book"></i> Change Chapters </button></a>
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

									?>
									
									<?php if(!empty($get_question_name->question_img)){ ?>
													<img src="<?php echo URLROOT; ?>/uploads/<?php echo $get_question_name->question_img; ?>"  style="width:100%;height:80px;">
													<?php } ?>
												
												
												</label>

								<a href="<?php echo URLROOT ?>/admin/delete_question_from_quiz/<?php echo $get_question_name->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-trash-can"></i></a>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option1")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 1. <?php echo $get_question_name->option1; ?>
							
								<?php if(!empty($get_question_name->option1_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $get_question_name->option1_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>
												
												</p>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option2")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 2. <?php echo $get_question_name->option2; ?>
							
								<?php if(!empty($get_question_name->option2_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $get_question_name->option2_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?></p>

								<p <?php if (strtolower($get_question_name->answer) == strtolower("option3")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 3. <?php echo $get_question_name->option3; ?>
								<?php if(!empty($get_question_name->option3_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $get_question_name->option3_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>
												</p>
								<p <?php if (strtolower($get_question_name->answer) == strtolower("option4")) { ?>style="color:green;" <?php } else { ?>style="color:red;" <?php  } ?>> 4. <?php echo $get_question_name->option4; ?>
							
								<?php if(!empty($get_question_name->option4_img)){ ?>
													<a href="<?php echo URLROOT; ?>/uploads/<?php echo $get_question_name->option4_img; ?>" target="_blank"><i class="fa fa-image"></i></a>
													<?php } ?>
												
												</p>
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
					</div><br>
					<div class="col-lg-12 col-lg-12">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/view_quiz/<?php echo $page_path; ?>" role="button" style="float: right;margin-top:50px;" >Save & Preview</a>
						
						<br>
					</div>

				</div>
			</div>
			<!-- <div class="row">
				<div class="col-lg-6 col-lg-6">
					<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/view_quiz/<?php echo $page_path; ?>" role="button" style="float: right;">Save & Preview</a>
				</div>
			

			</div> -->
		</div>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>