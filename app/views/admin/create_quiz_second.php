<?php require APPROOT . '/views/inc_admin/header.php';?>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<!-- ======================================================= som ============================================= -->
<style>
	.input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
		margin-left: 15px;
		border-radius: 5px;

	}

	.table-container {
  height: 200px;
  overflow-y: auto;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

tbody {
  overflow-x: hidden;
}

</style>
<!-- ======================================================= som ============================================= -->

<?php
$url = $_SERVER['REQUEST_URI'];
$trimmed_url = trim($url, '/');
$exploded_value = explode('/', $trimmed_url);
$page_path = end($exploded_value);

$adminMod = new admins;
$get_quiz_detail = $adminMod->get_single_quizes_i($page_path);

?>



<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Quiz</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT;?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/<?php echo $get_quiz_detail->category;?>/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/create_quiz_first">Create Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Quiz Info</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class=" col-sm-12">
				<div class="card">
					<div class="card-head">
						<header>Quiz</header>
					</div>
					<div class="card-body no-padding height-9">
						<?php $adminMod = new admins;

						?>

						<div class="row list-separated profile-stat">
							<div class="col-md-3 col-sm-3 col-6">
								<div class="uppercase profile-stat-title"> Quiz Name </div>
								<div class="uppercase profile-stat-text"> <?php echo $data['get_current_quiz_detail']->name; ?> </div>
							</div>
							<div class="col-md-3 col-sm-3 col-6">
								<div class="uppercase profile-stat-title"> Class </div>
								<div class="uppercase profile-stat-text">
									<?php
									$get_school_class  = $adminMod->get_school_class($data['get_current_quiz_detail']->class_name);
									echo $get_school_class->class_name;
									?>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-6">
								<div class="uppercase profile-stat-title"> Subject </div>
								<div class="uppercase profile-stat-text">
									<?php
									$get_single_chapter  = $adminMod->get_single_subject($data['get_current_quiz_detail']->subject_name);
									echo $get_single_chapter->subject_name; ?>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-6">
								<div class="uppercase profile-stat-title"> Category </div>
								<div class="uppercase profile-stat-text"> <?php $category_id =  $data['get_current_quiz_detail']->category;
																			if ($category_id == 1) {
																				echo "Practice";
																			} elseif ($category_id == 2) {
																				echo "Merit";
																			} elseif ($category_id == 3) {
																				echo "Rapid Fire";
																			} else {
																				echo "Contest";
																			} ?> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Quiz Information</header>
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
					<form method="POST" action="<?php echo URLROOT; ?>/admin/add_quiz_second/<?php echo $page_path; ?>" enctype="multipart/form-data" autocomplete="OFF">
						<div class="card-body row">
							<!-- BANK DETAILS -->


							<div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label> Duration<span>*</span></label>
									<select name="quiz_duration_min" class="form-control" required>
										<option value="" readonly>Minute</option>
										<?php
										for ($i = 1; $i <= 60; $i++) {
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>

								</div>
							</div>
							<div class="col-md-1 col-sm-1">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label></label>
									<select name="quiz_duration_sec" class="form-control">
										<option value="" readonly> Seconds</option>

										<?php
										for ($i = 0; $i <= 60; $i++) {
										?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Choose Photo&nbsp;<i class="fa fa-file-image-o"></i><span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_image" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Choose Audio&nbsp;<i class="fa fa-file-sound-o"></i><span></span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_audio" accept=".mp3,audio/*">
								</div>
							</div>



							<!-- <div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Branches<span>*</span></label>
									<br>
									<select name="sub_subject" class="form-control" required>
										<option value="0" selected> All</option>
										<?php foreach ($data['get_sub_subject'] as $subject_detail) { ?>
											<option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div> -->

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Start Date<span>*</span></label>
									<input type="date" name="start_date" class="form-control mdl-textfield__input" min='<?php echo date('Y-m-d'); ?>' placeholder="Enter Quiz Start Date" required>
								</div>
							</div>

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>End Date<span>*</span></label>
									<input type="date" name="end_date" class="form-control mdl-textfield__input" placeholder="Enter Quiz End Date" min='<?php echo date('Y-m-d'); ?>' required>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Start Time (HH:mm)<span>*</span></label>
									<input type="time" name="start_time" class="form-control mdl-textfield__input" placeholder=" Start Time" required>
								</div>
							</div>

							<div class="col-md-2 col-sm-2">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>End Time (HH:mm)<span>*</span></label>
									<input type="time" name="end_time" class="form-control mdl-textfield__input" placeholder=" End Time" required>
								</div>
							</div>

							<!-- <div class="col-md-4 col-sm-4">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select School<span></span></label>
									<br>
									<select name="school" class="form-control">
										<option value="0">All</option>
										<?php foreach ($data['get_school_detail'] as $school_detail) { ?>
											<option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div> -->

							<!-- <div class="col-md-4 col-sm-4">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label for="list2" class="">Select Category<span>*</span></label>
									<br>
									<select name="category" class="form-control" id="select_category" requierd>

										<option value="1"> Practice</option>
										<option value="2"> Merit</option>
										<option value="3"> RAPID FIRE</option>
										<option value="4">Contest</option>
									</select>
								</div>
							</div> -->
							<?php if ($get_quiz_detail->category == 1) { ?>
								<div class="col-md-4 col-sm-4" id="attempt">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Quiz Attempts<span></span></label>
										<select name="attempt" class="form-control">
											<option value="0"> Unlimited</option>
											<option value="1"> 1</option>
											<option value="2"> 2</option>
											<option value="3"> 3</option>
											<option value="4"> 4</option>
											<option value="5"> 5</option>
											<option value="6"> 6</option>
											<option value="7"> 7</option>
											<option value="8"> 8</option>
											<option value="9"> 9</option>
											<option value="10"> 10</option>

										</select>
									</div>
								</div>
							<?php } ?>

							<div class="col-md-3 col-sm-3" id="passing_per">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Passing %<span>*</span></label>
									<input type="number" name="passing_per" class="form-control mdl-textfield__input" placeholder="Enter Passing Percentage" required>
								</div>
							</div>
							<!-- coins per attempt has been renamed to points per question on 07/11/2022 -->
							<?php if ($get_quiz_detail->category == 2) { ?>
								<div class="col-md-3 col-sm-3" id="coins_per_point1">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Points Per question(1st Attempt)<span>*</span></label>

										<input type="number" name="coins_per_point1" class="form-control mdl-textfield__input" placeholder="Enter Points per question for 1st attempt" required>
									</div>
								</div>
							<?php } ?>
							<?php if ($get_quiz_detail->category == 2) { ?>

								<div class="col-md-3 col-sm-3" id="coins_per_point2">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Points per question(2nd Attempt)<span>*</span></label>
										<input type="number" name="coins_per_point2" class="form-control mdl-textfield__input" placeholder="Enter Points per question for 2nd attempt" required>
									</div>
								</div>
							<?php } ?>
							<?php if (($get_quiz_detail->category == 1) || ($get_quiz_detail->category == 3) || ($get_quiz_detail->category == 4)) { ?>

								<!-- coins per point was renamed to points per question -->
								<div class="col-md-3 col-sm-3" id="coins_per_point1">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label>Points Per Question<span>*</span></label>
										<input type="number" name="coins_per_point1" class="form-control mdl-textfield__input" placeholder="Enter Points per Question" required>
									</div>
								</div>
								<!-- coinsss per second was rename dto points per second -->
								<?php if ($get_quiz_detail->category != 1) {  ?>
									<div class="col-md-2 col-sm-2" id="coins_per_sec1">
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label>Points Per Second<span>*</span></label>
											<input type="number" name="coins_per_sec1" class="form-control mdl-textfield__input" placeholder="Enter Points per second" required>
										</div>
									</div>
							<?php }
							}
							?>
							<?php if ($get_quiz_detail->category !=4) { ?>
								<div class="col-md-3 col-sm-3">
									<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label for="list2" class="">Quiz Cost<span>*</span></label>
										<br>
										<input type="number" name="quiz_cost" id="quiz_cost" class="form-control mdl-textfield__input" placeholder="Enter Quiz Cost" onkeyup="calculate_quiz_contest_pool()" required>
										<!-- removed 'lbh' class from this input and made this required on 30/05 -->
									</div>
								</div>
							<?php } ?>

							<?php if ($get_quiz_detail->category == 4) { ?>

								<!-- <div class="col-md-3 col-sm-3" id="Contest Prize"> -->
									<!-- <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"> -->
										<!-- <label>Contest Prize Comission<span>*</span></label>
										<input type="number" id="contest_prize_comission" class="form-control mdl-textfield__input lbh" placeholder="Enter Total Prize for Contest" onkeyup="calculate_quiz_contest_pool()"> -->
									<!-- </div> -->
								<!-- </div> -->
								<!-- <div class="col-md-3 col-sm-3" id="Contest Prize"> -->
									<!-- <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"> -->
										<!-- <label>Contest Prize Price<span>*</span></label>
										<input type="number" name="contest_prize" id="contest_prize" class="form-control mdl-textfield__input" placeholder="Enter Total Prize for Contest" onkeyup="calculate_quiz_contest_pool()"> -->
									<!-- </div> -->
								<!-- </div> -->
								<!-- <div class="col-md-2 col-sm-2"> -->
									<!-- <div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"> -->
										<!-- <label>No of Users<span>*</span></label>
										<input type="number" name="user_limit" id="user_limit" class="form-control mdl-textfield__input lbh" placeholder="Enter Count of Users for Prize Distribution" readonly> -->
									<!-- </div> -->
								<!-- </div> -->
								<!-- ================================= prize calculation ======================================= -->


								<h4 class="text-primary fw-bold text-center display-5">Choose Contest Prize</h4>
								<div class="table-responsive">
								<table class="table table-bordered table-hover responsive table-container" id="example4">
									<thead>
										<tr>

											<th>ID</th>
											<th>No of participants</th>
											<th>Entry fee</th>
											<th>Total amount collected</th>
											<th>Expenses</th>
											<th>Total expenses</th>
											<th>Prize pool amount</th>
											<th>No of winners percentage</th>
											<th>Total no of winners</th>
											<th>Total no of levels</th>
											<th>Choose Prize</th>



										</tr>
									</thead>

									<tbody>

										<?php foreach ($data['all_contest_prize_calculations'] as $prize_calc) { ?>
											<tr class="">

												<td class="left"><a href="<?php echo URLROOT; ?>/admin/contest_prize_view/<?php echo $prize_calc->id; ?>"  target="_blank"><?php echo $prize_calc->id; ?></a></td>
												<td class="left"><?php echo $prize_calc->no_of_participants; ?></td>
												<td class="left"><?php echo $prize_calc->entry_fee; ?></td>
												<td class="left"><?php echo $prize_calc->total_amount_collected; ?></td>
												<td class="left"><?php echo $prize_calc->expenses; ?></td>
												<td class="left"><?php echo $prize_calc->total_expenses; ?></td>
												<td class="left"><?php echo $prize_calc->prize_pool_amount; ?></td>
												<td class="left"><?php echo $prize_calc->no_of_winners_percentage; ?></td>
												<td class="left"><?php echo $prize_calc->total_no_of_winners; ?></td>
												<td class="left"><?php echo $prize_calc->total_no_of_levels; ?></td>

												<td class="left">
													<div class="form-check form-switch">
														<input class="form-check-input" required type="radio" role="switch" id="flexSwitchCheckDefault" name="prize_calc_data_id" value="<?php echo $prize_calc->id; ?>">
													</div>
												</td>

											</tr>

										<?php } ?>
									</tbody>
								</table>
								</div>

								<!-- </div> -->
								<!-- ================================== prize calculation ====================================== -->
							<?php } ?>
							<div class="col-md-3 col-sm-3" id="Contest Prize">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Remarks<span></span></label>
									<input type="text" name="remarks" class="form-control mdl-textfield__input" placeholder="Enter Remarks" >
								</div>
							</div>
							<div class="col-md-3 col-sm-3" id="Contest Prize">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>No. of questions<span></span></label>
									<input type="number" name="no_of_questions" class="form-control mdl-textfield__input" placeholder="Enter No of Questions" required>
								</div>
							</div>


							<div class="row mb-5 mt-5">
								<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->
								<div class="col-lg-6 col-lg-6">
									<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Proceed</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
</div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
	function numberOnly(id) {
		let input = document.getElementById(id);
		let value = input.value;
		if (value.length > input.maxLength) {
			input.value = value.substring(0, input.maxLength);
		}
	}
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

<script>
	function calculate_quiz_contest_pool() {
		var quiz_cost = $('#quiz_cost').val();
		var contest_prize = $('#contest_prize').val();
		var contest_prize_comission = $('#contest_prize_comission').val();
		(contest_prize_comission / 100);
		var user_limit = (100 * contest_prize) / ((100 - contest_prize_comission) * quiz_cost);
		document.getElementById("user_limit").value = user_limit;
	}


	$(".lbh").on("keyup", function() {
		if ($(this).val() == 0) {
			$(this).val(null);
		}
	});
</script>