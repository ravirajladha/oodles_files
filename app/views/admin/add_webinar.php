<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


< <div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Webinar Detail</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">My Details</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Webinar Detail</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Webinar Detail Information</header>

					</div>

					<form method="post" action="<?php echo URLROOT; ?>/admin/add_webinar_db" enctype="multipart/form-data" autocomplete="OFF">

						<div class="card-body row">

							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>College Name</label>
									<input type="text"  name="college_name" class="form-control mdl-textfield__input" placeholder="Enter Name of the College" required>

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Subject / Topic</label>
									<input type="text"  name="subject" class="form-control mdl-textfield__input" placeholder="Enter Subject of the Webinar" required>

								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Add Image<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="image" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Audience Limitation<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="number" id="maxStu" name="audience_no" placeholder="Enter Audience Limitation" required>

								</div>
							</div>




							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Date<span>*</span></label><br>
									<input type="date" id="branch_address" name="webinar_date" class=" form-control mdl-textfield__input" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Webinar Start Time<span>*</span></label><br>
									<input class="form-control mdl-textfield__input"  type="time" name="start_time" required>

								</div>
							</div>
							<div class="col-md-3 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Webinar End Time<span>*</span></label><br>
									<input class="form-control mdl-textfield__input" type="time" name="end_time" required>

								</div>
							</div>



							<div class="col-md-12 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

									<label>Info<span>*</span></label>
									<br>
									<textarea id="oodles_editor1" rows="3" cols="60" name="webinar_info" required></textarea>

								</div>
							</div>



						</div>
				</div>


			</div>



			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/student" role="button">Skip All</a>
					</div> -->

				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Save</button>
				</div>

				</form>
			</div>

		</div>
	</div>
	</div>
	</div>
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