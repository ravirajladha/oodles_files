<?php require APPROOT . '/views/inc_school/header.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	<link href = "<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css"
	rel = "stylesheet"
	type = "text/css" />
</script>
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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- start page content -->
<br>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Resources</div>
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
					<div class="card-body ">
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



	</div>
</div>
<!-- end page content -->
<!-- modal start -->
<!-- Modal -->




<?php require APPROOT . '/views/inc_school/footer.php'; ?>


<script src="<?php echo URLROOT ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/table/table_data.js"></script>