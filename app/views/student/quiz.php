<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo URLROOT ?>/assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
<!-- CSS only -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<style>
	#owl-demo .item img {
		display: block;
		width: 100%;
		height: auto;
	}

	#owl-demo2 .item {
		margin: 3px;
	}
</style>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- <div class="page-bar">
			<div class="page-title-breadcrumb">

				<div class=" pull-left">
					<div class="page-title">All Quizes List</div>
				</div>


				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quizes</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Quizes List</li>
				</ol>
			</div>
		</div> -->
		<div class="row">
			<div class="card-box" style="position:fixed;z-index:3;padding:42px;background-color:white;width:77%;margin-left:61px;height:10px;">
				<div class="card-head">
					<header>All Quizes</header>

					<div style="float:right;" class=" mdl-js-textfield mdl-textfield--floating-label getmdl-select px;getmdl-select__fix-height ">
						<!-- onchange="this.form.submit()" -->

						<form action="<?php echo URLROOT; ?>/student/quiz" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-2">

											<!-- <select class='form-control' id="category" name="select_category">
												<option value="">--Select--</option>
												<?php $category = $data['get_current_quiz_type']; ?>
												<option value="1" <?php if ($category == 1) {
																		echo "selected";
																	} ?>>
													Practice</option>
												<option value="2" <?php if ($category == 2) {
																		echo "selected";
																	} ?>>
													Merit</option>
												<option value="3" <?php if ($category == 3) {
																		echo "selected";
																	} ?>>
													Rapid Fire </option>
												<option value="4" <?php if ($category == 4) {
																		echo "selected";
																	} ?>>
													Contest</option>

											</select> -->

										</div>
										<div class="col-md-8">
											<select class="form-control" name="subject_name" required style="width:200px;height:34px;">
												<option readonly>--Select--</option>
												<?php
												/*
												foreach ($data['all_subject'] as $all_subject) {
													$subject = $data['get_current_quiz_subject'];
													$subject_name = $all_subject->subject_name;
													$adminMod = new Admins;
													$subject_id_to_name = $adminMod->get_school_subject($subject_name);
												?>
													<option value="<?php echo $subject_name; ?>" <?php if ($subject_name == $subject) {
																										echo 'selected';
																									} ?>><?php echo $subject_id_to_name->subject_name; ?></option>
												<?php }
*/
												?>

												<?php foreach ($data['get_all_subject'] as $subject) { ?>
													<option value=<?php echo $subject->id ?>><?php echo $subject->subject_name; ?></option>
												<?php } ?>
											</select>
										</div>
										<!-- <div class="col-md-4">
											<button type="submit" class="form-control" style="border:none;"><i class="fa-solid fa-filter"></i></button>
										</div> -->
									</div>
								</div>
							</div>
					</div>


				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="card-body" style="margin:40px; height:200px;">
				<!-- start course list -->
				<div class="row">

					<div class="col-lg-3 col-md-3 col-3 col-sm-3">
						<div class="blogThumb">

							<div class="row">
								<button type="submit" name="select_category" value="1">
									<h1 style="text-align:center;">Practice</h1>
								</button>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-3 col-sm-3">
						<div class="blogThumb">
							<div class="row">
								<button type="submit" name="select_category" value="2">
									<h1 style="text-align:center;">Merit</h1>
								</button>

							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-3 col-sm-3">
						<div class="blogThumb">
							<div class="row">
								<button type="submit" name="select_category" value="3">
									<h1 style="text-align:center;">Rapid Fire</h1>
								</button>

							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-3 col-sm-3">
						<div class="blogThumb">
							<div class="row">
								<button type="submit" name="select_category" value="4">
									<h1 style="text-align:center;">Contest</h1>
								</button>

							</div>
						</div>
					</div>
				</div>
			</div>

			</form>
			<div class="card-body" style="margin:10px;">
				<!-- start course list -->
				<div class="row">
					<?php foreach ($data['get_all_quiz'] as $quiz) { ?>
						<div class="col-lg-12 col-md-12 col-12 col-sm-12">
							<div class="blogThumb">
								<div class="row">
									<div class="col-md-4">
										<div class="thumb-center"><img class="img-responsive" alt="user" img src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" alt="<?php echo URLROOT; ?>/assets/img/course/course2.jpg" style="max-width:100%;height:300px;"></div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="course-box" style="text-align:center;">
											<?php $string = $quiz->name ?>
											<?php
											if (strlen($string) > 30) {
												$trimstring = substr($string, 0, 31) . '...';
											} else {
												$trimstring = $string;
											} ?>
											<div class="row">
												<div class="col-md-6" style="text-align:left;">
													<h4> <strong><?php echo strtoupper($trimstring) ?></strong></h4>
												</div>
												<div class="col-md-6" style="text-align:right;">

													<h4>Duration &ensp;<?php if ($quiz->duration_min <= 9) {
																			echo "0";
																		} ?><?php echo $quiz->duration_min ?>:<?php if ($quiz->duration_sec <= 9) {
																													echo "0";
																												} ?><?php echo $quiz->duration_sec ?><span>&nbsp;min</span></h4>
												</div>
											</div>
											<?php if (!empty($quiz->topic)) { ?>
												<p><span><i class="ti-alarm-clock"></i>Topic: <?php echo $quiz->topic ?></span>
												</p>
											<?php } ?>
											<?php if (isset($quiz->chapter)) { ?>
												<p><span><i class="ti-alarm-clock"></i>Chapter:
													<?php
													$array = explode(',', $quiz->chapter);
													foreach ($array as $value) {
														$adminMod = new admins;
														$get_chapter_detail = $adminMod->get_single_chapter($value);
														echo "| " . $get_chapter_detail->name . " | ";
													}
												} ?>
													</span>
												</p>
												<div class="row">
													<?php if (!empty($quiz->start_date) && !empty($quiz->end_date)) { ?>
														<p>
														<div class="col-md-6" style="text-align:left;"></i>Start Date: <?php echo date("d/m/y", strtotime($quiz->start_date)) ?> </div>
														<div class="col-md-6" style="text-align:right;">End Date: <?php echo date("d/m/y", strtotime($quiz->end_date)) ?></div>
														</p>
													<?php } ?>
												</div>
												<div class="row">
													<?php if (isset($quiz->start_time) && isset($quiz->end_time)) { ?>
														<p>
														<div class="col-md-6" style="text-align:left;"><i class="fa-solid fa-hourglass-start"></i> <?php echo $quiz->start_time ?></div>
														<div class="col-md-6" style="text-align:right;"><i class="fa-solid fa-flag-checkered"></i> <?php echo $quiz->end_time ?></div>
														</p>
													<?php } ?>
												</div>


												<?php if (isset($quiz->remarks)) { ?>
													<p><span><i class="ti-alarm-clock"></i> <?php echo strtoupper($quiz->remarks) ?> </span>
													</p>
												<?php } ?>
												<?php if ($quiz->category == 4) { ?>
													<a href="<?php echo URLROOT ?>/student/winnings/<?php echo $quiz->id; ?>"><button class="form-control">Winnings</button></a>
												<?php } ?>
												<p><span><i class="ti-alarm-clock"></i>Attempted:
														<?php $studentMod = new Students;
														$get_count = $studentMod->get_no_of_attempt($quiz->id);
														?>
														<?php echo ($get_count); ?><span>&nbsp;times</span></span>
												</p>
												<?php if ($quiz->category == 1) { ?>


													<?php $studentMod = new Students;
													$check_pass_status = $studentMod->check_quiz_pass_status($quiz->id);
													if (empty($check_pass_status)) { ?>

														<p style="color:red;"><?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.</p>
													<?php
													} else { ?>
														<p style="color:red;"><span><i class="ti-alarm-clock"></i> <?php echo strtoupper("You have already cleared the test, you can Replay the quiz") ?> </span>
														</p>
													<?php } ?>


													<?php if (($get_count < $quiz->attempt) || $quiz->attempt == 0) { ?>

														<?php
														$get_student_detail = $data['get_current_student'];
														if (!isset($get_student_detail->student_id)) { ?>
															<!-- <button data-toggle="modal" data-target="#add_student" class="btn btn-sm btn-warning" onclick="add_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->

															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
														<?php } else { ?>
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 

															<!-- <button data-toggle="modal" data-target="#update_student" class="btn btn-sm btn-warning" onclick="update_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<!-- </a> -->
														<?php } ?>
													<?php
													}
													?>
													<!-- How to know the test has been cleared in the first time or not??? -->
												<?php } elseif ($quiz->category == 2) { ?>
													<p style="color:red;"><?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.</p>
													<?php if ($get_count < 2) { ?>

														<?php
														$get_student_detail = $data['get_current_student'];
														if (!isset($get_student_detail->student_id)) { ?>
															<!-- <button data-toggle="modal" data-target="#add_student" class="btn btn-sm btn-warning" onclick="add_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->

															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
														<?php } else { ?>
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
															<!-- <button data-toggle="modal" data-target="#update_student" class="btn btn-sm btn-warning" onclick="update_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<!-- </a> -->
														<?php } ?>
													<?php
													}


													?>
												<?php } elseif ($quiz->category == 3) { ?>
													<!-- need to know the limitation of Rapid Fire test -->
													<p style="color:red;"><?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.</p>
													<!-- change the count <1 later -->
													<?php if ($get_count < 8) { ?>

														<?php
														$get_student_detail = $data['get_current_student'];
														if (!isset($get_student_detail->student_id)) { ?>
															<!-- <button data-toggle="modal" data-target="#add_student" class="btn btn-sm btn-warning" onclick="add_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
														<?php } else { ?>
															<!-- <a href=""  data-book-id="my_id_value" data-toggle="modal" data-target="#update_student"> -->
															<!-- <button data-toggle="modal" data-target="#update_student" class="btn btn-sm btn-warning" onclick="update_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
															<!-- </a> -->
														<?php } ?>
													<?php
													}

													?>
												<?php } elseif ($quiz->category == 4) { ?>
													<p style="color:red;"><?php echo $quiz->quiz_cost ?> coins will be debited from your wallet.</p>
													<!-- need to know the limitation of Rapid Fire test -->
													<?php if ($get_count < 1) { ?>

														<?php
														$get_student_detail = $data['get_current_student'];
														if (!isset($get_student_detail->student_id)) { ?>
															<!-- <button data-toggle="modal" data-target="#add_student" class="btn btn-sm btn-warning" onclick="add_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
														<?php } else { ?>
															<!-- <a href=""  data-book-id="my_id_value" data-toggle="modal" data-target="#update_student"> -->
															<!-- <button data-toggle="modal" data-target="#update_student" class="btn btn-sm btn-warning" onclick="update_student_modal(<?php echo $quiz->id; ?>)"> Play Now</button> -->
															<a href="<?php echo URLROOT?>/student/take_quiz/<?php echo $quiz->id?>" class="btn btn-sm btn-warning">Play Now</a> 
															<!-- </a> -->
														<?php } ?>
												<?php
													}
												}
												?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end page content -->


					<?php } ?>
				</div>
				<!-- End course list -->





			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div id="owl-demo2" class="owl-carousel">
				<?php foreach ($data['get_quiz_for_student'] as $quiz) { ?>
					<div class="item"><img src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" alt="">
					</div>
				<?php } ?>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl2.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl3.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl4.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl5.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl6.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl7.jpg" alt="">
				</div>
				<div class="item"><img src="<?php echo URLROOT; ?>/assets/img/slider/owl8.jpg" alt="">
				</div>
			</div>
		</div>
	</div>

</div>
</div>



<!-- Add student modal start -->
<div class="modal" id="add_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Add Information</h5>
			</div>

			<form method="post" action="<?php echo URLROOT; ?>/student/add_student_data_for_quiz" autocomplete="off" class="register-form">
				<div class="modal-body">
					<div class="form-group">
						<!-- <h2 class="form-title">Login</h2><br> -->
						<div class="">
							<select class="form-control" name="school">
								<option readonly>-Select School-</option>
								<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
									<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="">
							<select class="form-control" name="class">
								<option readonly>-Select Class-</option>
								<?php foreach ($data['get_all_class'] as $class_detail) { ?>
									<option value=" <?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<input type="text" readonly class="form-control" name="quiz_id" id="add_quiz_id" hidden>
					<div class="form-group form-button" style="text-align: center;">

					</div>


					<div class="social-login" style="text-align: center;">
						<br>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-round btn-primary" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Add student modal end -->
<!-- Update modal start -->
<div class="modal" id="update_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Update Information</h5>
				<!-- <button class="btn btn-round btn-primary" ><a href="<?php echo URLROOT ?>/student/register"> Signup</a></button> -->
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> -->
				<!-- <button class="btn btn-round btn-primary" type="submit">Login</button> -->
			</div>


			<?php

			?>
			<form method="post" action="<?php echo URLROOT; ?>/student/update_student_data_for_quiz" autocomplete="off" class="register-form">
				<div class="modal-body">
					<div class="form-group">
						<!-- <h2 class="form-title">Login</h2><br> -->
						<div class="">
							<select class="form-control" name="school">
								<option readonly>-Select School-</option>
								<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
									<option value="<?php echo $school_detail->school_id; ?>" <?php if ($get_student_detail->school == $school_detail->school_id) {
																									echo "selected";
																								} ?>><?php echo $school_detail->school_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="">
							<select class="form-control" name="class">
								<option readonly>-Select Class-</option>
								<?php foreach ($data['get_all_class'] as $class_detail) { ?>
									<option value="<?php echo $class_detail->id; ?>" <?php if ($get_student_detail->course == $class_detail->id) {
																							echo "selected";
																						} ?>><?php echo $class_detail->class_name; ?></option>
								<?php } ?>
							</select>
							<!-- <input type="text" name="bookID"  value="" /> -->
							<input type="text" readonly class="form-control" name="quiz_id" id="update_quiz_id" hidden>
						</div>
					</div>

					<div class="form-group form-button" style="text-align: center;">

					</div>


					<div class="social-login" style="text-align: center;">
						<br>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-round btn-primary" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end update modal -->



<?php require APPROOT . '/views/inc_student/footer.php'; ?>
<script>
	function update_student_modal(bid) {
		$('#update_quiz_id').val(bid);
	}

	function add_student_modal(bid) {
		$('#add_quiz_id').val(bid);
	}
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '#category', function() {
			var category_id = $(this).val();
			if (category_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/student/get_subject_by_category',
					data: {
						category_id
					},
					success: function(data) {
						$('#subject_name').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#subject_name').html('<option value="">-Select-</option>');
			}
		});
	});
</script>