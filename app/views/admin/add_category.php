<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	< link href = "<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css"
	rel = "stylesheet"
	type = "text/css" />


</script>
<!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">  -->

<script>
	$(function() {

		$("#buttonId1").click(
			function() {
				$("#exampleModal1").modal('show');
			});

	});
	$(function() {

		$("#buttonId2").click(
			function() {
				$("#exampleModal2").modal('show');
			});

	});
	$(function() {

		$("#buttonId3").click(
			function() {
				$("#exampleModal3").modal('show');
			});

	});
	$(function() {

		$("#buttonId4").click(
			function() {
				$("#exampleModal4").modal('show');
			});

	});
	$(function() {

		$("#buttonId5").click(
			function() {
				$("#exampleModal5").modal('show');
			});

	});
	document.oncontextmenu = function() {
		return false;
	};
</script>
<script>
	function injectJS() {
		var frame = $('iframe');
		var contents = frame.contents();
		var body = contents.find('body').attr("oncontextmenu", "return false");
		var body = contents.find('body').append('<div>New Div</div>');
	}
</script>
<style>
	[id^=modal] {
		display: none;
		position: relative;
		/* top: 0;
      left: 0; */
	}

	[id^=modal]:target {
		display: none;
	}
</style>
<style>
	.tree,
	.tree ul {
		margin: 0;
		padding: 0;
		list-style: none
	}

	.tree ul {
		margin-left: 1em;
		position: relative
	}

	.tree ul ul {
		margin-left: .5em
	}

	.tree ul:before {
		content: "";
		display: block;
		width: 0;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		border-left: 1px solid
	}

	.tree li {
		margin: 0;
		padding: 0 1em;
		line-height: 2em;
		color: #369;
		font-weight: 700;
		position: relative
	}

	.tree ul li:before {
		content: "";
		display: block;
		width: 10px;
		height: 0;
		border-top: 1px solid;
		margin-top: -1px;
		position: absolute;
		top: 1em;
		left: 0
	}

	.tree ul li:last-child:before {
		background: #fff;
		height: auto;
		top: 1em;
		bottom: 0
	}

	.indicator {
		margin-right: 5px;
	}

	.tree li a {
		text-decoration: none;
		color: #369;
	}

	.tree li button,
	.tree li button:active,
	.tree li button:focus {
		text-decoration: none;
		color: #369;
		border: none;
		background: transparent;
		margin: 0px 0px 0px 0px;
		padding: 0px 0px 0px 0px;
		outline: 0;
	}
</style>
<style>
    @media (max-width: 767px) {
  .table-responsive {
    overflow-x: scroll;
  }
  .table{
	width:auto;
  }
}

</style>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- start page content -->
<br>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Category</div>
				</div>
				<!-- <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">School</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Class</li>
							</ol> -->
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Topic</header>
						<button type="button" id="buttonId5" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal5">
							Create Class</button>
						<button type="button" id="buttonId1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
							Create Subject</button>
						<button type="button" id="buttonId2" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
							Create Chapter
						</button>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<!-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->
					</div>
					<form method="post" action="<?php echo URLROOT; ?>/admin/create_topic" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-3 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Class</label><br>
									<select class="form-control" name="class" id="class" required>
										<option readonly>--Select--</option>
										<?php foreach ($data['get_all_class'] as $class) { ?>
											<option value=<?php echo $class->id; ?>><?php echo $class->class_name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="col-lg-3 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Subjects</label><br>
									<select class="form-control" name="subject" id="subject" required>
										<option readonly>--Select--</option>

									</select>

								</div>
							</div>

							<div class="col-lg-3 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Chapter</label><br>

									<select class="form-control" name="chapter" id="chapter" required>
										<option value=""></option>
									</select>

								</div>
							</div>

							<div class="col-lg-3 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Add Topic Name</label><br>
									<input class="mdl-textfield__input" type="text" name="topic" required>

								</div>
							</div>






							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
								<!-- <button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button> -->
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>


		
		<!-- advanced table start -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-head">
						<header>All Class list</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body  collapse">
						<table id="saveStage" class="display" style="width:100%;">
							<thead>
								<tr>
					
										<th> Id</th>
										<th> Class </th>
										<th> Created At </th>

										<!-- <th>DOB</th> -->
										<th> Action </th>
								</tr>
							</thead>
							<tbody>
									<?php foreach ($data['get_all_school_class'] as $class) { ?>
										<tr class="odd gradeX">

											<td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td>



											<td class="left"><?php echo $class->id ?></td>

											<td><a href="#"><?php echo $class->class_name ?></a></td>
											<td><a href="#">
													<?php echo $class->created_at ?> </a></td>


											<td>
												<a href="<?php echo URLROOT ?>/admin/edit_class/<?php echo $class->id; ?>"> <button type="button" id="buttonId3" class="btn btn-secondary">
														Update</button></a>
												<?php if ($class->status == 1) { ?>
													<a href="<?php echo URLROOT ?>/admin/change_class_status/<?php echo $class->id; ?>/0"> <button type="button" id="buttonId3" class="btn btn-secondary">
															Hide</button></a>
												<?php } else { ?>
													<a href="<?php echo URLROOT ?>/admin/change_class_status/<?php echo $class->id; ?>/1"> <button type="button" id="buttonId3" class="btn btn-secondary">
															Unhide</button></a>
												<?php } ?>
												<!-- <a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a> -->
											</td>
										</tr>
									<?php } ?>

								</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- advanced table -->




		<div class="tab-pane active fontawesome-demo" id="tab2">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>All Subject List</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body collapse ">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">

								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example3">
								<thead>
									<tr>
										<th></th>
										<th> Id</th>
										<th> Subject </th>
										<th> Class </th>
										<th> Created At </th>
										<!-- <th>DOB</th> -->
										<th> Action </th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($data['get_all_school_subject'] as $subject) { ?>
										<tr class="odd gradeX">
											<td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td>
											<td class="left"><?php echo $subject->id ?></td>
											<td class="left"><?php echo $subject->subject_name ?></td>
											<?php
											$adminMod = new Admins;
											$get_class = $adminMod->get_single_class($subject->class);
											?>
											<td class="left"><?php echo $get_class->class_name ?></td>
											<td><a href="#">
													<?php echo $subject->created_at ?> </a></td>
											<td>
												<a href="<?php echo URLROOT ?>/admin/edit_subject/<?php echo $subject->id; ?>"> <button type="button" id="buttonId3" class="btn btn-secondary">
														Update Subject</button></a>
											</td>


										</tr>
									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>




		<!-- advanced table start -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-head">
						<header>All Chapter list</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body  collapse">
						<table id="saveStage" class="display" style="width:100%;">
							<thead>
								<tr>
									<th></th>
									<th> Id</th>
									<th> Chapter </th>
									<th>Class </th>
									<th>Subject </th>
									<th>Resource </th>
									<th>Map </th>
									<!-- <th>DOB</th> -->
									<th> Action </th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['get_all_chapter'] as $chapter) { ?>
									<tr class="odd gradeX">

										<td class="patient-img">
											<i class="fa fa-graduation-cap"></i>
										</td>
										<td class="left"><?php echo $chapter->id ?></td>
										<td class="left"><?php echo $chapter->name ?></td>

									
										<?php $adminMod = new Admins;
										$get_subject = $adminMod->get_single_school_subject($chapter->subject);
										$get_class = $adminMod->get_single_class($chapter->class);
										?>
										<td class="left"><a href="#">
												<?php echo $get_class->class_name; ?> </a></td>
										<td><a href="left">
												<?php echo $get_subject->subject_name; ?> </a></td>

										<td><a href="#">
												<?php if (!empty($chapter->resource)) { ?>
													<a href="<?php echo URLROOT?>/uploads/<?php echo $chapter->resource ;?>" class="" target="_blank" ><i class='fa-regular fa-file-pdf-o'></i></a>
												<?php } else { ?>
													<i class="fa fa-exclamation-circle"></i>
												<?php	} ?> </a></td>

										<td><a href="#">
												<?php if (!empty($chapter->map)) { ?>
													<a href="<?php echo URLROOT?>/uploads/<?php echo $chapter->map ;?>" id="blah" target="_blank"><i class='fa-regular fa-file-pdf-o'></i></a>
												<?php	} else { ?>
													<i class="fa fa-exclamation-circle"></i>
												<?php	} ?> </a></td>
										<td>
											<a href="<?php echo URLROOT ?>/admin/edit_chapter/<?php echo $chapter->id; ?>"><button type="button" id="buttonId4" class="btn btn-secondary">
													Update </button></a>
										</td>
									</tr>

									<!-- First modal -->
									<div class="popup" id="modal1">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>

											<div class="card-body">
												<!-- <div class="row"> -->


												<div class="col-md-12">
													<!-- <img src="" class="card-img-top" alt="Mind map"> -->

													<iframe src="<?php echo URLROOT ?>/uploads/<?php echo $chapter->resource; ?> #toolbar=0" height="300px" width="100%" id="myiframe" onload="injectJS()"></iframe>

												</div>
												<!-- </div> -->
											</div>

										</div>
									</div>
									<!-- first end -->
									<!-- First modal -->
									<div class="popup" id="modal2">
										<a class="popup__overlay" href="#"></a>
										<div class="popup__wrapper">
											<a class="popup__close" href="#">X</a>

											<div class="card-body">
												<!-- <div class="row"> -->


												<div class="col-md-12">
													<!-- <img src="" class="card-img-top" alt="Mind map"> -->

													<iframe src="<?php echo URLROOT ?>/uploads/<?php echo $chapter->map; ?> #toolbar=0" height="300px" width="100%" id="myiframe" onload="injectJS()"></iframe>

												</div>
												<!-- </div> -->
											</div>

										</div>
									</div>
									<!-- first end -->

								<?php } ?>

							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- advanced table -->


		<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>All Topics List</header>
							<div class="tools">
								<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
								<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
								<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
							</div>
						</div>
						<div class="card-body collapse">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-6">

								</div>
							</div>
							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example5">
								<thead>
									<tr>
										<th></th>
										<th> Id</th>
										<th> Class </th>
										<th> Subject </th>
										<th>Chapter </th>
										<th>Topic </th>
										<!-- <th>DOB</th> -->
										<th> Action </th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($data['get_all_topic'] as $topic) { ?>
										<tr class="odd gradeX">

											<td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td>


											<?php $adminMod = new Admins;
											$get_chapter = $adminMod->get_single_chapter($topic->chapter);
											$get_class = $adminMod->get_single_class($topic->class);

											?>
											<td class="left"><?php echo $topic->id ?></td>
											<?php
											?>
											<td><a href="#">
													<?php echo $get_class->class_name; ?> </a></td>


											<?php
											$get_subject = $adminMod->get_single_school_subject($topic->subject);
											?>
											<td><a href="#">
													<?php echo $get_subject->subject_name; ?> </a></td>
											<td><a href="#">
													<?php echo $get_chapter->name; ?> </a></td>


											<td class="left"><?php echo $topic->name ?></td>

											<td>
												<a href="<?php echo URLROOT ?>/admin/edit_topic/<?php echo $topic->id; ?>"><button type="button" id="buttonId4" class="btn btn-secondary">
														Update</button></a>
											</td>
										</tr>



									<?php } ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>






	</div>
</div>
<!-- end page content -->
<!-- modal start -->
<!-- Modal -->

<div class="modal" id="exampleModal1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addEventTitle">Add Subject</h5>
				<!-- <h5 class="modal-title" id="editEventTitle">Edit Event</h5> -->
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo URLROOT; ?>/admin/create_subject" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Subject Name</label>

								<div class="input-group">
									<!-- <select name="subject_name" class="form-control" required>
										<option value="">--Select--</option>
										<option value="Physics">Physics</option>
										<option value="Chemistry">Chemistry</option>
										<option value="Mathematics">Mathematics</option>
										<option value="Biology">Biology</option>
										<option value="Accountancy">Accountancy</option>
										<option value="Business Studies">Physics</option>
										<option value="Economics">Economics</option>
										<option value="Geography">Geography</option>
										<option value="History">History</option>
										<option value="Political science">Political science</option>
										<option value="Psychology">Psychology</option>
										<option value="Sociology">Sociology</option>
										<option value="Hindi">Hindi</option>
										<option value="English">English</option>
										<option value="Science">Science</option>
										<option value="Social Science"> Social Science </option>
										<option value="Environmental Studies"> Environmental Studies </option>

									</select> -->
									<input type="text" name="subject_name" class="form-control" required>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Class</label>
								<div class="input-group">
									<select name="class" class="form-control" required>
										<option value="">--Select--</option>
										<?php foreach ($data['get_all_class'] as $class) { ?>
											<option value="<?php echo $class->id; ?>"><?php echo $class->class_name; ?></option>
										<?php   } ?>

									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer bg-whitesmoke pr-0">

						<button type="submit" class="btn btn-round btn-primary" id="edit-event">Add</button>
						<button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
<div class="modal" id="exampleModal5" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addEventTitle">Add Class</h5>
				<!-- <h5 class="modal-title" id="editEventTitle">Edit Event</h5> -->
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo URLROOT; ?>/admin/create_class" enctype="multipart/form-data">
					<input type="hidden" id="id" name="id">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">

								<label>Add Class</label><br>
								<input class="mdl-textfield__input" type="text" name="class_name">
							</div>
						</div>
					</div>

					<div class="modal-footer bg-whitesmoke pr-0">

						<button type="submit" class="btn btn-round btn-primary" id="edit-event">Add</button>
						<button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addEventTitle">Add Chapter</h5>
				<!-- <h5 class="modal-title" id="editEventTitle">Edit Event</h5> -->
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo URLROOT; ?>/admin/create_chapter" enctype="multipart/form-data">


					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Select Class</label>
								<div class="input-group">
									<select class="form-control" id="class" name="class" required>
										<option readonly>--Select--</option>
										<?php foreach ($data['get_all_class'] as $class) { ?>
											<option value="<?php echo $class->id; ?>"><?php echo $class->class_name; ?></option>
										<?php   } ?>

									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label class="mdl-textfield__label">Select Subject </label><br>
								<select class="form-control" name="subject_name" id="subject_name" required>
									<option value=""></option>
								</select>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mb-4">
							<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label class="mdl-textfield__label">Add Chapter Name</label><br>
								<input class="mdl-textfield__input" type="text" name="chapter" required>

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Quiz Resources &nbsp;<i class="fa fa-file-image-o"></i><span></span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource">

							</div>
						</div>
						<div class="col-6">

							<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<label>Upload Mind Map &nbsp;<i class="fa fa-file-image-o"></i><span></span></label><br>
								<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map">

							</div>
						</div>
					</div>

					<div class="modal-footer bg-whitesmoke pr-0">

						<button type="submmit" class="btn btn-round btn-primary" id="edit-event">
							Submit</button>
						<button type="button" id="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>

<script>
	$(document).ready(function() {
		$(document).on('change', '#subject', function() {
			var subject_id = $(this).val();

			if (subject_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_chapter_name',
					data: {
						subject_id
					},
					success: function(data) {
						$('#chapter').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#chapter').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '#class', function() {
			var class_id = $(this).val();
			if (class_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_class_name',
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
<script>
	$(document).ready(function() {
		$(document).on('change', '#class', function() {
			var class_id = $(this).val();
			if (class_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_class_name',
					data: {
						class_id
					},
					success: function(data) {
						$('#subject').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#subject').html('<option value="">-Select-</option>');
			}
		});
	});
</script>



<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>