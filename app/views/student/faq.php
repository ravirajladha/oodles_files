<?php require APPROOT . '/views/inc_student/header.php'; ?>
<?php require APPROOT . '/views/inc_student/navbar.php'; ?>

<style>
    .accordion-button {
      background-color: #6673fc;
      color: #ffffff;
    }

    .accordion-button:not(.collapsed) {
      background-color: #ffffff;
      color: #000000;
    }

    .accordion-collapse {
      background-color: #f5f5f5;
      color: #000000;
    }
  </style>
  <?php 
  $get_all_faqs = $data['get_all_faqs'];
  ?>
			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Ask Question Here?</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Blank Page</li>
							</ol>
						</div>
					</div>
					
<div class="container my-5">
  <h1 class="text-center mb-5">FAQ</h1>
  <div class="row mb-3">
    <div class="col-12 col-md-6 offset-md-3">
      <div class="input-group">
        <input type="text" id="search-input" class="form-control" placeholder="Search for questions or answers...">
        <button class="btn btn-primary" type="button" onclick="search()">Search</button>
      </div>
    </div>
  </div>
  <div class="accordion" id="accordionExample">
  <?php $count = 0;
  foreach($get_all_faqs as $faq){
    $count++; ?>
    <div class="accordion-item">
      <h2 class="accordion-header" id="heading<?php echo $count; ?>">
        <button class="accordion-button <?php if($count == 1) { echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count; ?>" aria-expanded="<?php echo ($count == 1) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $count; ?>">
          <?php echo $faq->question; ?>
        </button>
      </h2>
      <div id="collapse<?php echo $count; ?>" class="accordion-collapse collapse <?php if($count == 1) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $count; ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <?php echo $faq->answer; ?>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


</div>
				</div>
			</div>
			<!-- end page content -->
		
		<?php require APPROOT . '/views/inc_student/footer.php'; ?>
		<script>
    function search() {
      var input = document.getElementById("search-input").value.toLowerCase();
      var items = document.getElementsByClassName("accordion-item");
      for (var i = 0; i < items.length; i++) {
        var question = items[i].querySelector(".accordion-button").textContent.toLowerCase();
        var answer = items[i].querySelector(".accordion-body").textContent.toLowerCase();
        if (question.indexOf(input) > -1 || answer.indexOf(input) > -1) {
          items[i].style.display = "";
        } else {
          items[i].style.display = "none";
        }
      }
    }
  </script>

