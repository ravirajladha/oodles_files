<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Chapter</div>
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
					<?php
						$chapter = $data['get_single_chapter'];
					?>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<!-- <header>Basic Information</header> -->
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
								
								</div>
								<?php 
								$adminMod = New admins;
								$class = $adminMod->get_single_class($chapter->class);
								$subject = $adminMod->get_single_subject($chapter->subject);
								?>
								<form method="post" action="<?php echo URLROOT; ?>/admin/update_chapter/<?php echo $chapter->id?>" enctype="multipart/form-data">
								<div class="card-body row">
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Class</label><br>
											<input class="mdl-textfield__input" type="text"  value="<?php echo $class->class_name?>" readonly>
											
										</div>
									</div>
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Subject</label><br>
											<input class="mdl-textfield__input" type="text"  value="<?php echo $subject->subject_name?>" readonly>
											
										</div>
									</div>
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Chapter</label><br>
											<input class="mdl-textfield__input" name="chapter" type="text" value="<?php echo $chapter->name?>" readonly>
											
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Resources<?php if (!empty($chapter->resource)) { ?>
													 <a href="<?php echo URLROOT ?>/uploads/<?php echo $chapter->resource?>" id="blah" target="_blank"><i class='fa-regular fa-file-pdf-o'></i></a>
												<?php	} else { ?>
													<i class="fa fa-exclamation-circle"></i>
												<?php	} ?> </label><br>
												<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource">
											
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Mind Map<?php if (!empty($chapter->map)) { ?>
													 <a href="<?php echo URLROOT ?>/uploads/<?php echo $chapter->map?>" id="blah" target="_blank"><i class='fa-regular fa-file-pdf-o'></i></a>
												<?php	} else { ?>
													<i class="fa fa-exclamation-circle"></i>
												<?php	} ?> </label><br>
												<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map">
											
										</div>
									</div>
								
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
									
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