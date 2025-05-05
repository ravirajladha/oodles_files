<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	< link href = "<?php echo URLROOT ?>/assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.css"
	rel = "stylesheet"
	type = "text/css" />
</script>
<script>
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

<?php
$adminMod = new Admins;
if(isset($_SESSION['quiz_category'])){
	$quiz_category = $_SESSION['quiz_category'];
}else{
	$quiz_category = 1;
}
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Resources</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT; ?>/student/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz Result</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Result</li>
				</ol>
			</div>
		</div>

		
		<!-- <div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Search</header>
						
					
					</div>
					<form method="post" action="<?php echo URLROOT; ?>/student/resources" enctype="multipart/form-data">
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
							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> -->

			<!-- advanced table start -->
			<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-head">
						<header>Resources</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapser btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body  ">
						<table id="saveStage" class="display" style="width:100%;">
							<thead>
								<tr>
									<th></th>
								
								
								
									<th>Chapter</th>
									<th>Resource </th>
									<th>Map </th>
									<!-- <th>DOB</th> -->
						
								</tr>
							</thead>
							<tbody>
							<?php
							$count = 0;
							 foreach($data['get_chapter_detail'] as $chapter){ 
								$count++;
								 ?>
									<tr class="odd gradeX">

										<td class="patient-img">
											<i class="fa fa-graduation-cap"></i>
										</td>
										
										<?php $adminMod = new Admins;
										$get_subject = $adminMod->get_single_school_subject($chapter->subject);
										$get_class = $adminMod->get_single_class($chapter->class);
										?>
										<td class="left"><a href="#">
												<?php echo $chapter->name; ?> </a></td>
								

												<td><a href="#">
												<?php if (!empty($chapter->resource)) { ?>
													<a href="<?php echo URLROOT?>/uploads/<?php echo $chapter->resource ;?>" class="" target="_blank" ><i class='fa-regular fa-file-pdf-o'></i></a>
												<?php } else { ?>
													<i
                                                        class="fa fa-times-circle"></i>
												<?php	} ?> </a></td>

										<td><a href="#">
												<?php if (!empty($chapter->map)) { ?>
													<a href="<?php echo URLROOT?>/uploads/<?php echo $chapter->map ;?>" id="blah" target="_blank"><i
                                                        class="fa fa-times-circle"></i></a>
												<?php	} else { ?>
													<i class="fa fa-exclamation-circle"></i>
												<?php	} ?> </a></td>
										
									</tr>
									<!-- <i class='fa-regular fa-file-pdf-o'></i> -->
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
						<?php if($count==0){ ?>
<h4 class="text-center">No resouces present! Please tighten you seat belt. Resources are coming soon for you.</h4>

<?php 
}
?>
			
					</div>
				</div>
			</div>
		</div>
		<!-- advanced table -->

	</div>
</div>
<!-- end page content -->
<?php unset($_SESSION['quiz_category']); ?>
<?php require APPROOT . '/views/inc_student/footer.php'; ?>
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
