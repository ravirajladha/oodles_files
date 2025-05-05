<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit topic</div>
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
						$topic = $data['get_single_topic'];
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
								$class = $adminMod->get_single_class($topic->class);
								$subject = $adminMod->get_single_subject($topic->subject);
								$chapter = $adminMod->get_single_chapter($topic->chapter);
								?>
								<form method="post" action="<?php echo URLROOT; ?>/admin/update_topic/<?php echo $topic->id?>" enctype="multipart/form-data">
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
											<input class="mdl-textfield__input" type="text" value="<?php echo $chapter->name?>" readonly>
											
										</div>
									</div>
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label"> Chapter</label><br>
											<input class="mdl-textfield__input" name="topic" type="text" value="<?php echo $topic->name?>" >
											
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