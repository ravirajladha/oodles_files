<?php require APPROOT . '/views/inc_school/header.php'; ?>
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT ?>/assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Teacher</div>
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
						<!-- <header>Add Teacher</header> -->
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
					<form method="post" action="<?php echo URLROOT; ?>/school/create_teacher" enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Add Teacher Name</label><br>
									<input class="mdl-textfield__input" type="text" name="name" required>
								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Assign Class</label><br>
									<select class="mdl-textfield__input" name="class" id="class">
										<option>-Select-</option>
										<?php foreach ($data['get_all_class'] as $class) { ?>
											<option value="<?php echo $class->id ?>"><?php echo $class->class_name; ?></option>
										<?php } ?>
									</select>

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Assign Subject</label><br>
									<select class="mdl-textfield__input" name="subject"  id="multiple">
									<option value=""></option>
									</select>

								</div>
							</div>


							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Email id</label><br>
									<input class="mdl-textfield__input" type="email" name="email" id="email"  onkeyup="checkemail(this.value)"required>

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Phone</label><br>
									<input class="mdl-textfield__input" type="number" name="phone" id="phone" onkeyup="checkphone(this.value)"  required>

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Password</label><br>
									<input class="mdl-textfield__input" type="password" name="password" required>

								</div>
							</div>
							<div class="col-lg-3 p-t-20">
							<p id="phone_email_error" class="text-left pull-left"></p>
							</div>
							<div class="col-lg-3 p-t-20">
						<p id="check_email_error" class="text-left pull-left"></p>
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

		<div class="tab-pane active fontawesome-demo" id="tab1">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-box">
						<div class="card-head">
							<header>All Teacher's List</header>
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
							<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
								<thead>
									<tr>
										<th></th>
										<th> Id</th>
										<th> Teacher Name </th>
										<th> Teacher Email </th>
										<th> School </th>

										<!-- <th>DOB</th> -->
										<th> Action </th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($data['get_all_teacher'] as $teacher) { ?>
										<tr class="odd gradeX">
											<td class="patient-img">
												<i class="fa fa-graduation-cap"></i>
											</td>
											<td class="left"><?php echo $teacher->id ?></td>

											<td class="left"><?php echo $teacher->name ?></td>
											<td><a href="#">
													<?php echo $teacher->email ?> </a></td>
											<td><a href="#">
													<?php
													$adminMod = new admins;
													$get_teacher = $adminMod->get_single_teacher($teacher->id);
													$get_school_id = $get_teacher->school;

													$get_school_detail = $adminMod->get_ind_school($get_school_id);
													echo $get_school_detail->school_name;
													?>


												</a></td>
											<td>
												<!-- <a href="<?php echo URLROOT ?>/admin/edit_teacher/<?php echo $get_teacher->teacher_id ?>" class="tblEditBtn"> -->
												<!-- <i class="fa fa-pencil"></i> -->
												<!-- </a> -->
												<!-- <a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a> -->

												<form action="<?php echo URLROOT ?>/school/change_teacher_status/<?php echo $teacher->id ?>" method="POST">
													<?php if ($teacher->status == 0) { ?>
														<!-- <input name="activate" value="1" hidden> -->
														<button type="submit" name="activate" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Activate</button>
													<?php } else { ?>
														<button type="submit" name="deactivate" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-danger">De-Activate</button>
													<?php  } ?>
												</form>
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
<?php require APPROOT . '/views/inc_school/footer.php'; ?>
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
						$('#multiple').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#multiple').html('<option value="">-Select-</option>');
			}
		});
	});
</script>

<script src="<?php echo URLROOT ?>/assets/plugins/select2/js/select2.js"></script>
<script src="<?php echo URLROOT ?>/assets/js/pages/select2/select2-init.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/jquery-tags-input/jquery-tags-input.js"></script>
<script src="<?php echo URLROOT ?>/assets/plugins/jquery-tags-input/jquery-tags-input-init.js"></script>
<script>
	function checkemail(email) {

// var valid = 0;
// if (email.length == 10) {


	$.ajax({
				url  : '<?php echo URLROOT; ?>/student/check_email_live',
				type : 'POST',
				data : {email},
				success : function(res)
				{
					if(res == "1"){
						// valid = 1;
						document.getElementById("check_email_error").innerHTML = "";
							

					}else{
						document.getElementById("check_email_error").innerHTML = "<span style='color:red;'>Email Already Available</span>";
					}
				}

			});


//   }
}
	function checkphone(phn) {

// var valid = 0;
// if (email.length == 10) {
	if (phn.length == 10) {
// alert (phone);
		$.ajax({
							url  : '<?php echo URLROOT; ?>/student/check_phone_live',
							type : 'POST',
							data : {phn},
							success : function(res)
							{
							
								if(res == "1"){
									// valid = 1;
						document.getElementById("phone_email_error").innerHTML = "";
						

					}else{
						document.getElementById("phone_email_error").innerHTML = "<span style='color:red;'>Phone Already Available</span>";
					}
				}

			});


//   }
} else{
			document.getElementById("phone_email_error").innerHTML ="";
			document.getElementById("countdown").innerHTML=" ";

}
		  }
</script>
