<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<style>
	.file-upload {
		height: 100px;
		width: 100px;
		margin: 40px auto;
		border: 1px solid #f0c0d0;
		border-radius: 100px;
		overflow: hidden;
		position: relative;
	}

	.file-upload input {
		position: absolute;
		height: 400px;
		width: 400px;
		left: -200px;
		top: -200px;
		background: transparent;
		opacity: 0;
		-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
		filter: alpha(opacity=0);
	}

	.file-upload img {
		height: 70px;
		width: 70px;
		margin: 15px;
	}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Question</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Question</li>
				</ol>
			</div>
		</div>

		<div class="inbox">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body no-padding height-9">
							<div class="row">

								<div class="col-md-12">
									<div class="inbox-body">

									</div>
									<div class="inbox-body no-pad">
										<div class="mail-list">
											<div class="compose-mail">
												<form method="post" action="<?php echo URLROOT; ?>/admin/create_question" enctype="multipart/form-data">


													<!-- <div class="col-md-6 col-sm-6">
																	<div class="form-group ">
																		<label for="to" class="">Enter your question</label>
																		<input type="text" tabindex="1" id="to"
																			class="form-control" name="question">
																		
																	</div>
																	</div> 
																-->

													<!-- 
													<div class="row">
														<div class="col-lg-6 p-t-20">
															<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																<input class="mdl-textfield__input" type="text" id="txtTimeLength" name="question" required>
																<label class="mdl-textfield__label">Enter your question</label>
															</div>
														</div> -->

													<!-- <div class="row">
														<div class="col-lg-6 p-t-20">
															
																<label class="mdl-textfield__label">Enter your question</label>
																<br>
																<textarea rows="4" cols="70" name="question"></textarea>
																

														
														</div>




														<div class="col-lg-6 p-t-20">
															<br>
															<br>
														
																<label class="mdl-textfield__label">Enter image for question (if available)</label>
																<br>
																<input class="mdl-textfield__input" type="file" id="maxStu" name="question_img">


													
															</td>


														</div>
													</div> -->


													<table class="table table-inbox table-hover">
														<tbody>

															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">Enter your question</label>
																		<br>
																		<textarea rows="4" cols="70" name="question" id="oodles_editor"></textarea>
																	</div>
																</td>
																<!-- <td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="question_img">


																	</div>
																</td> -->
																<td class="file-upload" a>
																	<img src="<?php echo URLROOT ?>/assets/images/upload.png">
																	<!--place input file last !-->
																	<input type="file" name="question_img" />
																</td>

																<script>

																</script>
																<!-- <td style="padding:0 15px 0 15px;">
																	<span class="form-group col-md-4">
																		<label for="subject" class="">Correct Option</label>
																		<input type="checkbox" class="radio" id="vehicle1" name="answer" value="option1">
																		<span>

																</td> -->
															</tr>

															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">First Option</label>
																		<br>
																		<textarea rows="4" cols="70" name="option1"></textarea>
																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="option1_img">


																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<span class="form-group col-md-4">
																		<label for="subject" class="">Correct Option</label>
																		<input type="checkbox" class="radio" id="vehicle1" name="answer" value="option1">
																		<span>

																</td>
															</tr>
															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">Second Option</label>
																		<br>
																		<textarea rows="4" cols="70" name="option2"></textarea>
																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="option2_img">


																	</div>
																</td>
																<td style="padding:0 15px 0 15px;">

																</td>
																<td style="padding:0 15px 0 15px;">
																	<span class="form-group col-md-4">
																		<label for="subject" class="">Correct Option</label>
																		<input type="checkbox" class="radio" id="vehicle1" name="answer" value="option2">
																		<span>

																</td>
															</tr>
															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">Third Option</label>
																		<br>
																		<textarea rows="4" cols="70" name="option3"></textarea>
																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="option3_img">


																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<span class="form-group col-md-4">
																		<label for="subject" class="">Correct Option</label>
																		<input type="checkbox" class="radio" id="vehicle1" name="answer" value="option3">
																		<span>

																</td>
															</tr>
															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">Fourth Option</label>
																		<br>
																		<textarea rows="4" cols="70" name="option4"></textarea>
																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="option4_img">


																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<span class="form-group col-md-4">
																		<label for="subject" class="">Correct Option</label>
																		<input type="checkbox" class="radio" id="vehicle1" name="answer" value="option4">
																		<span>

																</td>
															</tr>
															<tr>
																<td style="padding:0 15px 0 15px;">
																	<div class="form-group col-md-12">
																		<label for="subject" class="">Add Explanation to this Question</label>
																		<br>
																		<textarea rows="4" cols="70" name="explanation"></textarea>
																	</div>
																</td>
																<td style="padding:0 15px 0 15px;"></td>
																<td style="padding:0 15px 0 15px;">
																	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
																		<input class="mdl-textfield__input" type="file" id="maxStu" name="explanation_img">


																	</div>
																</td>

															</tr>
															<tr>
																<td>
																		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
																			<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
																			<label for="list2" class="mdl-textfield__label">Select Class</label>
																			<select name="class" class="form-control">
																				<option value="0">All</option>
																				<?php foreach ($data['get_all_class'] as $class_detail) { ?>
																					<option value="<?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
																				<?php } ?>
																			</select>


																	</div>
																</td>
																<td>
																		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
																			<input class="mdl-textfield__input" type="text" id="list2" value="" readonly tabIndex="-1">
																			<label for="list2" class="mdl-textfield__label">Select Subject</label>
																			<select name="subject" class="form-control">
																				<option value="0"> All</option>
																				<?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
																					<option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->subject_name; ?></option>
																				<?php } ?>
																			</select>
																	</div>
																</td>
																				</tr>
														</tbody>
													</table>

													<div class="col-lg-12 p-t-20 text-center">
														<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
													</div>

												</form>
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
</div>
</div>



<!-- end page content -->



<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>