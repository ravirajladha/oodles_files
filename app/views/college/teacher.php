<?php require APPROOT . '/views/inc_college/header.php'; ?> 
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Teacher<?php echo $_SESSION['rexkod_oodles_school_id'] ?></div>
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
															
															<td class="left"><?php echo $teacher->name?></td>
															<td><a href="#">
																	<?php echo $teacher->email?> </a></td>
															<td><a href="#">
																	<?php echo $teacher->phone?> </a></td>
															<td><a href="#">
																<?php 
$schoolMod = New Schools;

$get_school_detail = $schoolMod->get_school_detail();
echo $get_school_detail->school_name;
																?>


															 </a></td>
															<td>
																<!-- <a href="<?php echo URLROOT?>/admin/edit_teacher/<?php echo $get_teacher->teacher_id ?>" class="tblEditBtn"> -->
																	<!-- <i class="fa fa-pencil"></i> -->
																<!-- </a> -->
																<!-- <a class="tblDelBtn">
																	<i class="fa fa-trash-o"></i>
																</a> -->
																
																	<form action="<?php echo URLROOT?>/school/change_teacher_status/<?php echo $teacher->id ?>" method="POST">
																	<?php if($teacher->status==0 ){ ?>
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
			<?php require APPROOT . '/views/inc_college/footer.php'; ?> 
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