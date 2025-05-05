<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Edit Subject</div>
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
									<!-- <header>Basic Information</header> -->
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
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

								<?php 
								$subject = $data['get_school_subject'];
								?>
								<form method="post" action="<?php echo URLROOT; ?>/admin/update_subject/<?php echo $data['get_school_subject']->id?>" enctype="multipart/form-data">
								<div class="card-body row">
								<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Subject Name</label>

								<div class="input-group">
								<input class="mdl-textfield__input" type="text"  name="subject_name" placeholder="<?php echo $data['get_school_subject']->subject_name?>" value="<?php echo $data['get_school_subject']->subject_name?>">
									<!-- <select name="subject_name" class="form-control" required>
										<option value="">--Select--</option>
										<option value="Physics" <?php if($subject->subject_name=="Physics"){ echo "selected";} ?>>Physics</option>
										<option value="Chemistry" <?php if($subject->subject_name=="Chemistry"){ echo "selected";} ?>>Chemistry</option>
										<option value="Mathematics" <?php if($subject->subject_name=="Mathematics"){ echo "selected";} ?>>Mathematics</option>
										<option value="Biology" <?php if($subject->subject_name=="Biology"){ echo "selected";} ?>>Biology</option>
										<option value="Accountancy" <?php if($subject->subject_name=="Accountancy"){ echo "selected";} ?>>Accountancy</option>
										<option value="Business Studies" <?php if($subject->subject_name=="Business Studies"){ echo "selected";} ?>>Physics</option>
										<option value="Economics" <?php if($subject->subject_name=="Economics"){ echo "selected";} ?> >Economics</option>
										<option value="Geography" <?php if($subject->subject_name=="Geography"){ echo "selected";} ?> >Geography</option>
										<option value="History" <?php if($subject->subject_name=="History"){ echo "selected";} ?> >History</option>
										<option value="Political science" <?php if($subject->subject_name=="Political science"){ echo "selected";} ?> >Political science</option>
										<option value="Psychology" <?php if($subject->subject_name=="Psychology"){ echo "selected";} ?> >Psychology</option>
										<option value="Sociology" <?php if($subject->subject_name=="Sociology"){ echo "selected";} ?> >Sociology</option>
										<option value="Hindi" <?php if($subject->subject_name=="Hindi"){ echo "selected";} ?> >Hindi</option>
										<option value="English" <?php if($subject->subject_name=="English"){ echo "selected";} ?> >English</option>
										<option value="Science" <?php if($subject->subject_name=="Science"){ echo "selected";} ?> >Science</option>
										<option value="Social Science" <?php if($subject->subject_name=="Social Science"){ echo "selected";} ?> > Social Science </option>
										<option value="Environmental Studies" <?php if($subject->subject_name=="Environmental Studies"){ echo "selected";} ?> > Environmental Studies </option>

									</select> -->
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
											<option value="<?php echo $class->id; ?>" <?php if($subject->class== $class->id){ echo "selected";} ?>><?php echo $class->class_name; ?></option>
										<?php   } ?>

									</select>
								</div>
							</div>
						</div>
					</div>
									
								
							
								
								
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Submit</button>
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
											<header>All Subject List</header>
											<div class="tools">
												<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
												<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
												<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
											</div>
										</div>
										<div class="card-body ">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6">

												</div>
											</div>
											<table class="table table-striped table-bordered table-hover table-checkable order-column valign-middle" id="example4">
												<thead>
													<tr>
														<th></th>
														<th> Id</th>
														<th> Subject  </th>
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
															
															<td class="left"><?php echo $subject->subject_name?></td>
															<td><a href="#">
																	<?php echo $subject->created_at?> </a></td>


															<td>
																<a href="<?php echo URLROOT?>/admin/edit_subject/<?php echo $subject->id ?>" class="tblEditBtn">
																	<i class="fa fa-pencil"></i>
																</a>
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
						</div>


				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 