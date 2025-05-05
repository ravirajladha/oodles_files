<?php require APPROOT . '/views/inc_teacher/header.php'; ?>


<?php
$abc = "";
foreach($data['get_all_subject'] as $all_subject){ 

	$abc = 'array("label"=>"abc" , "y"=> 284),';

	}
	$abc = explode('),', $abc);
 	
 $dataPoints = array($abc);

?>
<script>
window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 theme: "light2", // "light1", "light2", "dark1", "dark2"
	 title: {
		 text: "Top 10 Google Play Categories - till 2017"
	 },
	 axisY: {
		 title: "Number of Apps"
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
					<div class="page-title">Explore Answers</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="">Quiz</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Explore Answers<?php print_r($myArray);?></li>
				</ol>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card card-box">
								<div class="card-head">
									<header>Explore Answers</header>
									
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
