<?php require APPROOT . '/views/inc_admin/header.php'; ?>
<?php
$get_single_scholarship_type = $data['get_single_scholarship_type'];

?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Edit Scholarship Type</div>
				</div>
				<!-- <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Scholarship</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Add Class</li>
							</ol> -->
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<!-- <header>Basic Information</header> -->
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
					<form method="post" action="<?php echo URLROOT; ?>/admin/update_scholarship_type/<?php echo $get_single_scholarship_type->id;?> " enctype="multipart/form-data">
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Edit Scholarship Type</label><br>
									<input class="mdl-textfield__input" type="text" name="scholarship_type" value="<?php echo $get_single_scholarship_type->scholarship_type;?> ">

								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label> Update Image
										<?php if (!empty($get_single_scholarship_type->scholarship_image)){ ?>
										<a href="<?php echo URLROOT; ?>/uploads/<?php echo $get_single_scholarship_type->scholarship_image; ?>" target="_blank">View Image</a>
										<?php } ?>
										<input class="mdl-textfield__input" type="file" id="maxStu" name="scholarship_type_image"  style="width:500px;">


								</div>
							</div>
							<div class="col-lg-12 p-t-20 text-center">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
							<a href="<?php echo URLROOT; ?>/admin/add_scholarship_type">	<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-dark">View all</button></a>
								<!-- <button type="button"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Cancel</button> -->
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>




	



	</div>
</div>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>