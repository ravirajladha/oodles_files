<?php require APPROOT . '/views/inc_school/header.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style>
	tr:hover {
		background-size: 100% 100%;
		transform: scale(1.2, 1.2);
		transform-origin: center;
		background-color: yellow;
	}


	.tool {
		cursor: help;
		position: relative;
	}

	.tool::before,
	.tool::after {
		position: absolute;
		left: 50%;
		opacity: 0;
		z-index: -100;
	}

	.tool:hover::before,
	.tool:focus::before,
	.tool:hover::after,
	.tool:focus::after {
		opacity: 1;
		z-index: 100;
	}

	.tool::before {
		border-style: solid;
		border-width: 1em .75em 0 .75em;
		border-color: #3e474f transparent transparent transparent;
		bottom: 100%;
		margin-left: -.5em;
		content: " ";
	}

	.tool::after {
		background: #32c5d2;
		border-radius: .25em;
		bottom: 180%;
		color: white;
		width: 17.5em;
		padding: 1em;
		margin-left: -8.75em;
		content: attr(data-tip);
	}
</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">

		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="w-100">

						<div class="row">
							<div class="col-sm-12">
								<div class="card-box">
									<div class="card-head">
										<header>Select Any Subject To View the Quiz</header>
									</div>
									<div class="card-body  row">
										<?php
										$schoolMod = New Schools;
										$get_teacher_detail   = $schoolMod->get_teacher_detail($data['teacher_id']);
										$each_teacher_subject =explode(',', $get_teacher_detail->subject);

										// foreach ($data['all_subject'] as $subject) {
											foreach($each_teacher_subject as $each_subject){ 
											$studentMod = new students;
											$get_subject_detail = $studentMod->get_school_subject($each_subject);
										?>

											<div class="col-lg-2">
												<a href="<?php echo URLROOT ?>/school/quiz_result_category_wise/<?php echo $each_subject;?>/<?php echo $data['teacher_id']?>">
													<!-- Contact Chip -->
													<span class="mdl-chip mdl-chip--contact">
														<span class="mdl-chip__contact mdl-color--teal mdl-color-text--white"><?php echo implode('', array_map(function ($v) {
																																	return $v[0];
																																}, explode(' ',  $get_subject_detail->subject_name))); ?></span>
														<span class="mdl-chip__text"><?php echo $get_subject_detail->subject_name; ?></span>
													</span>
												</a>
											</div>
										<?php } ?>

									</div>
								</div>
							</div>
						</div>

						


					</div>
				</div>
			</div>

		</div>

	</div>
</div>
</div>





<?php require APPROOT . '/views/inc_school/footer.php'; ?>