<?php require APPROOT . '/views/inc_teacher/header.php'; ?>


<?php
$teacherMod = new Teachers;
$dataPoints = [];
foreach ($data['get_all_student'] as $all_student) {
	// $get_student_result = $teacherMod->get_quiz_result_student_wise_and_quiz_wise($data['student_id'],$all_quizes->id);
	// echo $data['student_id'];
	// die();
	$total_quiz_played = 0;
	$score_gained = 0;

	foreach ($data['get_all_quizes'] as $all_quiz) {
		$get_quiz_result = $teacherMod->get_quiz_result_student_wise_and_quiz_wise($all_student->student_id, $all_quiz->id);
		foreach ($get_quiz_result as $result) {
			$empty_string = ','.$result->id;
			$total_quiz_played += count($get_quiz_result);
			// if ($result->pass == 1) {
			// 	$score_gained += $result->score_per;
			// }
			$score_gained += $result->score_per;
		}
	
		if (($total_quiz_played == 0) || ($score_gained == 0)) {
			$total_per = 0;
		} else {
			$total_per = $score_gained / $total_quiz_played;
		}
	
	}
	$total_test_attended = 0;
	$score_gained = 0;


	$cur = array("label" => $all_student->f_name, "y" => $total_per);
	array_push($dataPoints, $cur);
}


?>
<script>
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title: {
				text: "ALL STUDENTS / SUBJECT"
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