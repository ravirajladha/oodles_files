
<?php require APPROOT . '/views/inc_admin/header.php'; ?> 

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Teacher's List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Admin</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Teacher's List</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xl-12">
							<div class="card-box">
								<div class="card-head">
									<header>Teacher's List</header>
									<button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="sdntmenu">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body ">
									<div class="row">
										<div class="col-md-6 col-sm-6 col-6">
											<div class="btn-group">
												<!-- <a href="<?php echo URLROOT?>/admin/add_teacher" id="addRow" class="btn btn-primary">
													Add New <i class="fa fa-plus"></i>
												</a> -->
											</div>
										</div>
									</div>
									<table
										class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
										id="example4">
										<thead>
											<tr>
												
												<th>ID</th>
												<th>Name</th>
												<th>Class</th>
												<th>Subject</th>
										
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
                                            <?php $adminMod = New Admins; ?>
                                    <?php foreach($data['get_all_teacher_for_school'] as $teacher){ 
                                       $get_user_detail =  $adminMod->get_current_user_auth_by_id($teacher->teacher_id);
                                        ?>
											<tr class="odd">
												<td><?php echo $teacher->id;?></td>
												<td><?php echo $get_user_detail->name; ?></td>
												<td><?php echo $teacher->id;?></td>
												<td><?php echo $teacher->id;?></td>

                                                <td><?php if($get_user_detail->status==1){echo "Active";}else{echo "Inactive";} ?></td>

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
			<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?> 
