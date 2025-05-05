<?php require APPROOT . '/views/inc_teacher/header.php'; ?> 
<style>
table
{
  table-layout:fixed;
}
<?php 
$adminMod = New Admins;
$get_class_detail_single = $adminMod->get_class_detail_single($data['class']);
$get_subject_detail_single = $adminMod->get_subject_detail_single($data['subject']);
$get_single_chapter = $adminMod->get_single_chapter($data['chapter']);
$get_single_topic = $adminMod->get_single_topic($data['topic']);
$class_detail= $this->adminModel->get_class_detail_single($data['get_teacher_detail']->class);
?>

		</style>
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Quiz Master</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Quiz Master</li>
							</ol>
						</div>
					</div>
<?php if($data['class']!=0){ ?>
					<div class="row">
													<div class="col-xl-12">
														<div class="w-100">
															<div class="row">
																<div class="col-sm-3">
																	<div class="card bg-b-green">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title ">Class</h4>
																				</div>
																				<div class="col-auto">
																					<div class="l-bg-green info-icon">
																						<i class="fa fa-users pull-left col-orange font-30"></i>
																					</div>
																				</div>
																			</div>
																			
																			<h5 class="mt-1 mb-3 info-box-title"><?php echo $get_class_detail_single->class_name;?>

																													</h5>
																			<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														Total:
													</span>
													<span class="text-muted">Number</span>
												</div> -->
																		</div>
																	</div>

																</div>
															
																<div class="col-sm-3">
																	<div class="card bg-b-green">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title ">Subject</h4>
																				</div>
																				<div class="col-auto">
																					<div class="l-bg-green info-icon">
																						<i class="fa fa-users pull-left col-orange font-30"></i>
																					</div>
																				</div>
																			</div>
																			
																			<h5 class="mt-1 mb-3 info-box-title"><?php echo $get_subject_detail_single->subject_name;?>

																													</h5>
																			<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														Total:
													</span>
													<span class="text-muted">Number</span>
												</div> -->
																		</div>
																	</div>

																</div>
																<div class="col-sm-3">
																	<div class="card bg-b-green">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title ">Chapter</h4>
																				</div>
																				<div class="col-auto">
																					<div class="l-bg-green info-icon">
																						<i class="fa fa-users pull-left col-orange font-30"></i>
																					</div>
																				</div>
																			</div>
																			
																			<h5 class="mt-1 mb-3 info-box-title"><?php echo $get_single_chapter->name;?>

																													</h5>
																			<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														Total:
													</span>
													<span class="text-muted">Number</span>
												</div> -->
																		</div>
																	</div>

																</div>
																<div class="col-sm-3">
																	<div class="card bg-b-green">
																		<div class="card-body">
																			<div class="row">
																				<div class="col mt-0">
																					<h4 class="info-box-title ">Topic</h4>
																				</div>
																				<div class="col-auto">
																					<div class="l-bg-green info-icon">
																						<i class="fa fa-users pull-left col-orange font-30"></i>
																					</div>
																				</div>
																			</div>
																			
																			<h5 class="mt-1 mb-3 info-box-title"><?php echo $get_single_topic->name;?>

																													</h5>
																			<!-- <div class="mb-0">
													<span class="text-success m-r-10"><i
															class="material-icons col-green align-middle">trending_up</i>
														Total:
													</span>
													<span class="text-muted">Number</span>
												</div> -->
																		</div>
																	</div>

																</div>
																</div>
																</div>
																</div>
																</div>
																<?php } ?>

					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body no-padding height-9">
									
									<div class="inbox">
										<form action ="<?php echo URLROOT?>/teacher/quiz_master/0/0/0/0" method="POST">
										<!-- search bar start -->
										<div class="form-group mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<div class="row">
									<div class="col-lg-2">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Class</label><br>
									<select class="form-control" name="class" id="class" required>
										<option readonly>--Select--</option>
										
											<option value=<?php echo $data['get_teacher_detail']->class; ?>><?php echo $class_detail->class_name;?></option>
										
									</select>

								</div>
							</div>
							<div class="col-lg-2">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Subjects</label><br>
									<select class="form-control" name="subject" id="subject" required>
										<option readonly>--Select--</option>
										
									</select>

								</div>
							</div>

							<div class="col-lg-2">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<label class="mdl-textfield__label">Select Chapter</label><br>

									<select class="form-control" name="chapter" id="chapter" required>
										<option value="">-Select-</option>
									</select>

								</div>
							</div>
										
										<div class="col-lg-2">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<label class="mdl-textfield__label">Select Topic</label><br>
										
											<select name="topic" id="topic" class="form-control" required>
												<option value="">-Select-</option>
											</select>
										</div>
										</div>
										<div class="col-lg-4">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label></label>
										<button type="submit" class="form-control" style="background-color:#4B5A6C;color:white;">Search</button>
										</div>
										</div>
										
									</div>

								</div>
							
										</form>
										<!-- search bar end -->
										<div class="row">

										<!-- Side navabar style for quiz (open, categories, quiz toppers) -->
									
											<!-- closing side navbar style for  quiz -->
											<div class="col-md-12">
												<div class="inbox-body">
													<div class="inbox-header">
														<div class="mail-option no-pad-left">
														
														
															<div class="btn-group pull-right btn-prev-next">
																<button class="btn btn-sm btn-primary" type="button">
																	<i class="fa fa-chevron-left"></i>
																</button>
																<button class="btn btn-sm btn-primary" type="button">
																	<i class="fa fa-chevron-right"></i>
																</button>
															</div>
													
														</div>
													</div>
													<div class="inbox-body no-pad table-responsive">
														<table class="table table-inbox table-hover mytable">
															<tbody>
																<tr class="unread">
																
																
																	<td class="view-message ">Id</td>
																	<td class="view-message " width="40%">Question</td>
																	<td class="view-message ">Option1</a></td>
																	<td class="view-message ">Option2</a></td>
																	<td class="view-message ">Option3</a></td>
																	<td class="view-message ">Option4</a></td>
																	<td class="view-message ">Answer</a></td>
															<!-- Delete will come soon, only wehen we will allow to delete that wquestion from thq quiz also -->
																	<td>	
																		 <!-- <i
																		class=" fa fa-trash-o fa-lg"></i> -->
																		Status
																</td>
																	<td>		 <i
																		class=" fa fa-archive fa-lg"></i>
																</td>
																	<!-- <td class="view-message  inbox-small-cells"><i
																			class="fa fa-inr"></i>
																	</td> -->
																	<!-- <td class="view-message  text-right">May 10</td> -->
																</tr>

																<?php
																$count = 0;
																 foreach($data['get_all_quiz_by_filter'] as $quiz) {
																	$count++;
																	?> 
																<tr class="unread ">
																<!-- <td class="inbox-small-cells">
																		<div class="todo-check pull-left">
																			<input type="checkbox" value="None"
																				id="todo-check4">
																			<label for="todo-check4"></label>
																		</div>
																	</td> -->
																	<td class="view-message "><?php echo $count?></td>
																	<td class="view-message " width="40%"><?php echo $quiz->question?></td>
																	<td class="view-message "><?php echo $quiz->option1?></td>
																	<td class="view-message "><?php echo $quiz->option2?></td>
																	<td class="view-message "><?php echo $quiz->option3?></td>
																	<td class="view-message "><?php echo $quiz->option4?></td>
																	<!-- php conditions for options to show -->
																	<td class="view-message "><?php echo $quiz->answer?></td>
															
																	 <!-- <a href="<?php echo URLROOT; ?>/admin/delete_from_quiz_master/<?php echo $quiz->id;?>"><button class="btn btn-danger m-r-10" type="button">Delete</button></a> -->
																	 <td class="view-message "><?php if($quiz->status==0){echo "Pending";}else{echo "Approved";}?></td>
																	
																<td>	<div class="add-emp-section">
								<a href="<?php echo URLROOT; ?>/teacher/edit_question/<?php echo $quiz->id;?>"class="btn btn-primary btn-add-emp"><i class="fas fa-edit"></i> Edit</a>
							
							</div> </td>
							
							
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
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<?php require APPROOT . '/views/inc_teacher/footer.php'; ?> 

			<script>
	$(document).ready(function() {
		$(document).on('change', '#subject', function() {
			var subject_id = $(this).val();

			if (subject_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/admin/get_subject_chapter_name',
					data: {
						subject_id
					},
					success: function(data) {
						$('#chapter').html(data);
					},

					error: function(jqXHR, textStatus, errorThrown) {
						// error
					}
				});
			} else {
				$('#chapter').html('<option value="">-Select-</option>');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '#class', function() {
			var class_id = $(this).val();
			if (class_id.length != 0) {
				$.ajax({
					type: 'POST',
					url: '<?php echo URLROOT ?>/teacher/get_subject_class_name',
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
<script>
    $(document).ready(function(){
        $(document).on('change', '#chapter', function(){
            var chapter_id = $(this).val();
		
            if(chapter_id.length != 0){
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT?>/admin/get_topic_chapter_wise',
                    data: {chapter_id},
                    success: function(data){
                        $('#topic').html(data);
                    },

                    error: function(jqXHR, textStatus, errorThrown){
                        // error
                    }
                });
            }else{
                $('#topic').html('<option value="">-Select-</option>');
            }
        });
    });
</script>
