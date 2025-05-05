<?php require APPROOT . '/views/inc_admin/header.php'; ?>


<style>
</style>
<style>
	.select2 {
		width: 100% !important;
	}
</style>
<style>
	.select2-container .select2-search--inline .select2-search__field {
		border: 0.7px solid #aaa;
		padding: 10px;
		width: 325px !important;
		height: 34px;
	}

	.select2-container .select2-selection--multiple .select2-selection__rendered {
		display: flex;
		padding: 10px;
	}

	.select2-container--bootstrap .select2-selection--multiple .select2-selection__choice__remove {
		border: none;
	}

	.select2-selection__choice {
		background-color: #eee !important;
		border: 1px solid #eee !important;
		padding-right: 10px;
	}

	focus-visible {
		outline: 10px !important;
	}
	.get-inline{display:inline-block;} 
</style>
<!-- start page content -->
<?php
$adminMod = new Admins;
$url = $_SERVER['REQUEST_URI'];
$trimmed_url = trim($url, '/');
$exploded_value = explode('/', $trimmed_url);
$page_path = end($exploded_value);
$get_current_quiz = $adminMod->get_single_quizes_i($page_path);

$subject = $get_current_quiz->subject_name;
$get_all_chapter = $adminMod->get_sub_subject_from_subject($subject);

?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Select Chapter</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
				<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="<?php echo URLROOT;?>/admin/index">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT; ?>/admin/quizes/<?php echo $get_current_quiz->category;?>/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Select Chapter</li>
				</ol>
			</div>
		</div>
		<div class="row">
		<div class=" col-sm-12">
		<div class="card">
									<div class="card-head">
										<header>Quiz</header>
									</div>
									<div class="card-body no-padding height-9">
										<?php $adminMod = New admins;

										?>
									
										<div class="row list-separated profile-stat">
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> Quiz Name </div>
												<div class="uppercase profile-stat-text"> <?php echo $data['get_current_quiz_detail']->name;?> </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> Class </div>
												<div class="uppercase profile-stat-text"> 
													<?php
												$get_school_class  = $adminMod->get_school_class($data['get_current_quiz_detail']->class_name);
												echo $get_school_class->class_name;
												?>
												 </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> Subject </div>
												<div class="uppercase profile-stat-text">
													<?php
												$get_single_chapter  = $adminMod->get_single_subject($data['get_current_quiz_detail']->subject_name);
												echo $get_single_chapter->subject_name; ?>
												  </div>
											</div>
											<div class="col-md-3 col-sm-3 col-6">
												<div class="uppercase profile-stat-title"> Category </div>
												<div class="uppercase profile-stat-text"> <?php $category_id =  $data['get_current_quiz_detail']->category;
												if($category_id==1){echo "Practice";} elseif($category_id==2){echo "Merit";}elseif($category_id==3){echo "Rapid Fire";}else{echo "Contest";}?> </div>
											</div>
										</div>
									</div>
									</div>
									</div>
								</div>
								
		<form action="<?php echo URLROOT?>/admin/add_chapter_to_quiz/<?php echo $page_path?>/1" method = "POST">
		<div class="row">
			<div class=" col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Select Chapter</header>
						<label style="float:right;"><input type="checkbox" name="sample" class="selectall"/> Select all</label>
					</div>
					
						<div class="card-body row" style="flex-wrap: wrap"> 
							<!-- BANK DETAILS -->
							<div class="col-md-12" >
								<div class="row" >
											<!-- <div class="btn-group" data-bs-toggle="buttons"> -->
											<?php foreach ($get_all_chapter as $chapter) { ?>
												<div class="col-md-6 col-lg-4">
												<label class="btn btn-primary deepPink-bgcolor" style="margin-top:8px;">
													<input type="checkbox" name="chapter[]" value="<?php echo  $chapter->id?>" multiple> <?php echo $chapter->name; ?>
												</label>
												<br>
												</div>
								
									<?php } ?>
								<!-- </div> -->
								</div>
							</div>
							<!-- <div class="row">
										<div class="col-md-12">
											<div class="btn-group" data-bs-toggle="buttons">
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 1
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 2
												</label>
												<label class="btn btn-primary deepPink-bgcolor">
													<input type="checkbox"> Option 3
												</label>
											</div>
											<br>
											<h4 class="sub-title">Multiple buttons group</h4>
										</div>
									</div> -->
						</div>
				</div>
			</div>
			
			<div class="row">
				<!-- <div class="col-lg-6 col-lg-6">
						<a class="btn btn-primary" href="<?php echo URLROOT; ?>/admin/quizes" role="button" style="float: right;">Finish</a>
					</div> -->
				<div class="col-lg-6 col-lg-6">
					<button type="submit" class="btn btn-primary" style="float: right;" id="submit">Select & Proceed</button>
				</div>
			
			</div>
		</div>
									</form>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- end page content -->
<?php require APPROOT . '/views/inc_admin/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div input').attr('checked', true);
    } else {
        $('div input').attr('checked', false);
    }
});
</script>
