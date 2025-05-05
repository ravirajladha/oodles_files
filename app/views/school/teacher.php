<?php require APPROOT . '/views/inc_school/header.php'; ?> 
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
				

					<div class="tab-pane active fontawesome-demo" id="tab1">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-box">
										<div class="card-head">
											<header>All Teacher's List</header>
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
														<th> Teacher Name </th>
														<th> Email </th>
														<th> Phone </th>
														<!-- <th> School </th> -->
														<!-- <th>DOB</th> -->
														<th> Action </th>
														<th> Approval </th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($data['get_all_teacher'] as $teacher) { ?>
														<tr class="odd gradeX">

															<td class="patient-img">
																<i class="fa fa-graduation-cap"></i>
															</td>
															<td class="left"><?php echo $teacher->teacher_id ?></td>
															<?php 
															$schoolModel = New Schools;
															$get_teacher_detail = $schoolModel->get_student_detail($teacher->teacher_id);
															?>
															<td class="left"><?php echo $get_teacher_detail->name?></td>
															<td><a href="#">
																	<?php echo $get_teacher_detail->email?> </a></td>
															<td><a href="#">
																	<?php echo $get_teacher_detail->phone?> </a></td>
														
															 <td><a href="<?php echo URLROOT?>/school/quiz_result_subject_wise/<?php echo $get_teacher_detail->id;?>"><button  name="activate"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">View result</button></a></td>
															<td>
															
																
																	<form action="<?php echo URLROOT?>/school/change_teacher_status/<?php echo $get_teacher_detail->id ?>" method="POST">

																	<?php 
																	
																	if($get_teacher_detail->status==0){ ?>
																		<!-- <input name="activate" value="1" hidden> -->
																<button type="submit" name="activate"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Activate</button>
											<?php }else{ ?>
																	<button type="submit" name="deactivate"
																	class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-danger">De-Activate</button>
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