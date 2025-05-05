<?php require APPROOT . '/views/inc_admin/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Add Subject</div>
							</div>
							<!-- <ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="<?php echo URLROOT; ?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
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
								<form method="post" action="<?php echo URLROOT; ?>/admin/create_subject" enctype="multipart/form-data">
								<div class="card-body row">
									<div class="col-lg-12 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Add Subject</label><br>
											<input class="mdl-textfield__input" type="text"  name="subject_name">
											
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
						<!-- Chapters  -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Chapters</header>
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
								<form method="post" action="<?php echo URLROOT; ?>/admin/create_chapter" enctype="multipart/form-data">
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Select Subject Branches</label><br>
											<select class="form-control" name="subject_name">
											<?php foreach ($data['get_all_school_subject'] as $subject){?>
												<option value=<?php echo $subject->id; ?>><?php echo $subject->subject_name;?></option>
												<?php } ?>
										</select>
											
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Add Chapter Name</label><br>
											<input class="mdl-textfield__input" type="text"  name="chapter">
											
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Upload Quiz Resources  &nbsp;<i
                                                        class="fa fa-file-image-o"></i><span></span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_resource">
								
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label>Upload Mind Map &nbsp;<i
                                                        class="fa fa-file-image-o"></i><span></span></label><br>
									<input class="form-control mdl-textfield__input" type="file" id="maxStu" name="quiz_map">
								
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
											<header>All Chapters List</header>
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
														<th> Chapter  </th>
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
															
															<td class="left"><?php echo $chapter->name?></td>
															<?php $adminMod = New Admins;
															$get_subject = $adminMod->get_single_school_subject($chapter->subject);
															?>
															<td><a href="#">
																	<?php echo $get_subject->subject_name;?> </a></td>
														
															<td><a href="#">
																	<?php if(!empty($chapter->resource)){echo "Present";}else{echo "Absent";}?> </a></td>
													
															<td><a href="#">
																	<?php if(!empty($chapter->resource)){echo "Present";}else{echo "Absent";}?> </a></td>
															<td>
																<a href="#" class="tblEditBtn">
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

					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Topic Name</header>
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
								<form method="post" action="<?php echo URLROOT; ?>/admin/create_topic" enctype="multipart/form-data">
								<div class="card-body row">
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Select Subjects</label><br>
											<select class="form-control" name="subject" id="subject">
												<option readonly>--Select--</option>
											<?php foreach ($data['get_all_school_subject'] as $subject){?>
												<option value=<?php echo $subject->id; ?>><?php echo $subject->subject_name;?></option>
												<?php } ?>
										</select>
											
										</div>
									</div>
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Select Chapter</label><br>

											<select class="form-control" name="chapter" id="chapter">
										<option value=""></option>
										</select>
											
										</div>
									</div>
									<div class="col-lg-4 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label class="mdl-textfield__label">Add Topic  Name</label><br>
											<input class="mdl-textfield__input" type="text"  name="topic">
											
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
											<header>All Topics List</header>
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
														<th> Topic  </th>
														<th>Chapter </th>
														<th>Subject </th>
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



															<td class="left"><?php echo $topic->id ?></td>
															
															<td class="left"><?php echo $topic->name?></td>

															<?php $adminMod = New Admins;
															$get_chapter = $adminMod->get_single_chapter($topic->chapter);
															?>
															<td><a href="#">
																	<?php echo $get_chapter->name;?> </a></td>

															<?php $adminMod = New Admins;
															$get_subject = $adminMod->get_single_school_subject($topic->subject);
															?>
															<td><a href="#">
																	<?php echo $get_subject->subject_name;?> </a></td>
														<td>
																<a href="#" class="tblEditBtn">
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
			<script>
    $(document).ready(function(){
        $(document).on('change', '#subject', function(){
            var subject_id = $(this).val();
		
            if(subject_id.length != 0){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT?>/admin/get_subject_chapter_name',
                    data: {subject_id},
                    success: function(data){
                        $('#chapter').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
            }else{
                $('#chapter').html('<option value="">-Select-</option>');
            }
        });
    });
</script>