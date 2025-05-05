<?php require APPROOT . '/views/inc_teacher/header.php'; ?>


<?php
$teacherMod= New Teachers;
$dataPoints = [];
foreach($data['get_all_quizes'] as $all_quizes){
	$get_student_result = $teacherMod->get_quiz_result_student_wise_and_quiz_wise($data['student_id'],$all_quizes->id);
	// echo $data['student_id'];
	// die();
$total_test_attended = 0;
$score_gained = 0;
	foreach($get_student_result as $student_result){
		$total_test_attended = count($get_student_result);
		if($student_result->pass==1){
		$score_gained += $student_result->score_per;
		}
	}

	
	if(($total_test_attended ==0)|| ($score_gained ==0)){
		$total_per = 0;
	}else{
		$total_per = $score_gained/$total_test_attended;
	}
// $store_percentage =0;
// $total_per =0;
// 	foreach($get_student_result as $student_result){
// 	$total_test_attended = count($get_student_result);
// 	if($student_result->pass==1){
// 		$store_percentage += $student_result->score_per;
// 	}
// 	if(($store_percentage ==0)|| ($total_test_attended ==0)){
// 		$total_per=0;
// 	}else{
// 	$total_per = $store_percentage/$total_test_attended;
// 	}
// }

$cur = array("label"=>$all_quizes->name , "y"=> $total_per);
array_push($dataPoints, $cur);
}


?>
<script>
window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 theme: "light2", // "light1", "light2", "dark1", "dark2"
	 title: {
		 text: "Results"
	 },
	 axisY: {
		 title: "Average"
	 },
	 data: [{
		 type: "column",
		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }
</script>

<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Graph</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Student Report Subjectwise</li>
				</ol>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Explore Graph</header>
									
								</div>
								<div class="card-body ">
									<div class="row">
									<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
										<div class="full-width text-center p-t-10">
											
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
