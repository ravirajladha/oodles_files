<?php require APPROOT . '/views/inc_teacher/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	
<!-- <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script> -->

<?php
$url = $_SERVER['REQUEST_URI'];
$trimmed_url = trim($url, '/');
$exploded_value = explode('/', $trimmed_url);
$page_path = end($exploded_value);
$get_teacher_detail = $data['get_teacher_detail'];
$class = $get_teacher_detail->class;
$class_detail= $this->adminModel->get_class_detail_single($class);
$get_teacher_detail = $data['get_teacher_detail'];
$class = $get_teacher_detail->class;
$class_detail= $this->adminModel->get_class_detail_single($class);
?>
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



					<!-- Modal end -->

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Quiz</div>
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
					<form method="POST" action="<?php echo URLROOT; ?>/teacher/add_quiz_first" enctype="multipart/form-data" autocomplete="OFF">
						<div class="card-body row">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Quiz Name</label>
													<div class="input-group">
														<input type="text" class="form-control" placeholder="Enter Quiz Name"
															name="quiz_name" id="title">
													</div>
												</div>
											</div>
										</div>
										<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Class</label>
								<div class="input-group">
									<select  class="form-control" id="class" name="class" required>
									<option readonly>--Select--</option>
								
										<option value="<?php echo $class_detail->id;?>"><?php echo $class_detail->class_name;?></option>
					

									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label class="mdl-textfield__label">Select Subject </label><br>
								<select class="form-control" name="subject" id="subject_name" required>
										<option value="">--Select--</option>
									</select>

							</div>
						</div>
					</div>
										<div class="row">
											<div class="col-md-12 mb-4">
												<label>Category</label>
												<select name="category" class="form-control" id="category" requierd>

										<option >--Select--</option>
										<option value="1"> Practice</option>
										<!-- <option value="2"> Merit</option> -->
										<option value="3"> Rapid Fire</option>
										<!-- <option value="4"> Contest</option> -->
									</select>
											</div>
										</div>




										<!-- finish -->
							
						
						</div>
				</div>
			</div>
			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->
				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Proceed</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_teacher/footer.php'; ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
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
