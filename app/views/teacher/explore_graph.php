<?php require APPROOT . '/views/inc_teacher/header.php'; ?>


<?php
 
$dataPoints = array(
	array("x"=> 10, "y"=> 41),
	// array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
	// array("x"=> 30, "y"=> 50),
	// array("x"=> 40, "y"=> 45),
	// array("x"=> 50, "y"=> 52),
	// array("x"=> 60, "y"=> 68),
	// array("x"=> 70, "y"=> 38),
	// array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
	// array("x"=> 90, "y"=> 52),
	// array("x"=> 100, "y"=> 60),
	// array("x"=> 110, "y"=> 36),
	// array("x"=> 120, "y"=> 49),
	// array("x"=> 130, "y"=> 41)
);
	
?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Simple Column Chart with Index Labels"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
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
					<li class="active">Explore Answers</li>
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
