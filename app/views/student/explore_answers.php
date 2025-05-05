<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<?php 
$answer_array = $_SESSION['answer_array'];
$quizMod = New Quizes;
$get_single_quizes_ind = $quizMod->get_single_quizes_ind($_SESSION['current_quiz_id']);
$question = $get_single_quizes_ind->question;
$question_array  = explode(',',$question);
$no_of_question = sizeof($question_array);
for($i = 0; $i < $no_of_question; $i++){
$get_question_detail = $quizMod->get_single_question($question_array[$i]);
if($get_question_detail->answer!=$answer_array[$i]){
// echo $get_question_detail->question;
}

}
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Explore Answers</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="<?php echo URLROOT ?>/student/all_quiz/1/<?php echo $_SESSION['quiz_category'];?>/0">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Explore Answers</li>
				</ol>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Check The Answers</header>
									<button id="prfList" class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<!-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="prfList">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul> -->
								</div>
								<div class="card-body ">
									<div class="row">
										<ul class="docListWindow small-slimscroll-style">
										<?php 
										$count = 0;
$answer_array = $_SESSION['answer_array'];
$quizMod = New Quizes;
$get_single_quizes_ind = $quizMod->get_single_quizes_ind($_SESSION['current_quiz_id']);
$question = $get_single_quizes_ind->question;
$question_array  = explode(',',$question);
$no_of_question = sizeof($question_array);
$correct_answer_count =0;
for($i = 0; $i < $no_of_question; $i++){
	$count++;
$get_question_detail = $quizMod->get_single_question($question_array[$i]);
if($get_question_detail->answer!=$answer_array[$i]){ ?>

<li>
												<div class="prog-avatar">
												<?php echo $count; ?>
												</div>
												<div class="details">
													<div class="title">
														<a href="#"><?php echo $get_question_detail->question;?></a>
													</div>
													<div>
														<span class="clsAvailable"><?php 
														if($get_question_detail->answer=='option1'){
															echo $get_question_detail->option1;
														}elseif($get_question_detail->answer=='option2'){
															echo $get_question_detail->option2;
														}elseif($get_question_detail->answer=='option3'){
															echo $get_question_detail->option3;
														}elseif($get_question_detail->answer=='option4'){
															echo $get_question_detail->option4;
														}
														
														?>
														
													</span>
													</div>
												</div>
											</li>
<?php
} else {
	$correct_answer_count ++;
}

}?>
	

				
											
											
										</ul>

										<?php if($no_of_question == $correct_answer_count) { ?>
											<div class="full-width text-center" >
												<span class="clsAvailable" style="font-size:20px;">All Answers are correct.</span>
											</div>
											<?php }?>

										<div class="full-width text-center p-t-10">
											<a href="<?php echo URLROOT ?>/student/all_quiz/1/<?php echo $_SESSION['quiz_category'];?>/0" class="btn purple btn-outline btn-circle margin-0">Go Back to Quiz</a>
										</div>
									</div>
								</div>
							</div>
						</div>

		</div>


	</div>
</div>
<!-- end page content -->

<?php require APPROOT . '/views/inc_student/footer.php'; ?>