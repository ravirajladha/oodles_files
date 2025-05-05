<?php require APPROOT . '/views/inc_teacher/header.php'; ?>


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
$get_all_question = $adminMod->get_selected_question($subject, $class);
?>
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
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Quiz</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class=" col-sm-6">
				<div class="card-box">
					<div class="card-head">
						<header>Select Questions
							<?php
							$count = 0;
							foreach ($get_all_question as $question) {
								$count++;
							} ?>
							(<?php echo $count; ?>)
						</header>

					</div>

					<div class="card-body row">
						<!-- BANK DETAILS -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<?php
								$i = 1;
								foreach ($get_all_question as $question) { ?>
									<label>
										<?php echo $i ?>)<?php echo $question->question; ?>
									</label>
									<?php $i++; ?>
									<a href="<?php echo URLROOT ?>/teacher/add_question_to_quiz/<?php echo $question->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-plus-square"></i>
									</a>
									<br>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class=" col-sm-6">
				<div class="card-box">
					<div class="card-head">
						<header>Already Added Questions</header>

					</div>

					<div class="card-body row">
						<!-- BANK DETAILS -->
						<div class="col-md-12 col-sm-12">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>
									<?php $array = explode(',', $get_current_quiz->question);
									foreach ($array as $value) //loop over values
									{
										$adminMod = new Admins;

										$get_question_name = $adminMod->get_single_question($value);
										if ($get_question_name) {
											echo $get_question_name->question;

									?></label>
								<a href="<?php echo URLROOT ?>/teacher/delete_question_from_quiz/<?php echo $get_question_name->id ?>/<?php echo $page_path; ?>" style="float:right;"><i class="fa-solid fa-trash-can"></i></a><br>
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
					<a class="btn btn-primary" href="<?php echo URLROOT; ?>/teacher/quizes" role="button" style="float: right;">Finish</a>
				</div>
				<!-- <div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Submit</button>
				</div> -->
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>