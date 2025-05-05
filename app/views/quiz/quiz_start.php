<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>OodlesIN Quiz</title>
<!-- FontAwesome-cdn include -->
<link rel="stylesheet" href="<?php echo URLROOT?>/assets_quiz/css/all.min.css">
<!-- Google fonts include -->
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
<!-- Bootstrap-css include -->
<link rel="stylesheet" href="<?php echo URLROOT?>/assets_quiz/css/bootstrap.min.css">
<!-- Animate-css include -->
<link rel="stylesheet" href="<?php echo URLROOT?>/assets_quiz/css/animate.min.css">
<!-- Main-StyleSheet include -->
<link rel="stylesheet" href="<?php echo URLROOT?>/assets_quiz/css/style.css">
<!-- links added by dev for testing -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</head>
<body>

<?php
 $prev_test = $data['id'] - 1;
 $url = $_SERVER['REQUEST_URI'];
 $trimmed_url = trim($url, '/');
 $exploded_value = explode('/', $trimmed_url);
 $page_path = end($exploded_value);

 $adminMod = new admins;
 $get_single_question = $adminMod->get_single_question($page_path);
 ?>

<div class="wrapper">
<!-- Top content -->
<div class="container">
<div class="row">
   <div class="col-md-6">
      <div class="logo_area ps-5 pt-5">
         <a href="index.html">
            <img src="<?php echo URLROOT; ?>/assets_home/images/resources/logo-1.png" width="350px" alt="image-not-found">
         </a>
      </div>
   </div>
   <!-- <div class="col-6 d-none d-md-block pt-5">
      <div class="count_box pe-3 me-5 rounded-pill d-flex align-items-center justify-content-center float-end">
         <div class="count_clock ps-2">
            <img  src="<?php echo URLROOT?>/assets_quiz/images/clock.png" alt="image-not-found">
         </div>
         <div class="count_title">
            <h4 class="ps-1">Quiz</h4>
            <span class="px-1">Time start</span>
         </div>
         <div class="count_number rounded-pill px-3 d-flex justify-content-around align-items-center position-relative overflow-hidden countdown_timer" data-countdown="2022/10/24">
         </div>
      </div>
   </div> -->
</div>
</div>
<div class="container">
<div class="container">
<progress value="0" max="10" id="progressBar" style="height:24px;width:100%"></progress>
</div>
<!-- <form class="multisteps_form overflow-hidden position-relative" id="wizard" method="POST" action="../thankyou/index-2.html"> -->
<form style="margin-top: 5px;" method="POST" id="get_single_question_test" action="<?php echo URLROOT; ?>/quiz/quiz_submit/<?php echo $page_path; ?>">

   <!------------------------- Step-1 ----------------------------->
   <div class="multisteps_form_panel">
      <div class="question_title">
         <h1 class="text-center py-5 animate__animated animate__fadeInRight animate_25ms"><?php echo  $get_single_question->question?></h1>
         </div>
         <div class="row pt-3">
            <ul class="text-center">
               <li class="position-relative step_1 d-inline-block animate__animated animate__fadeInRight animate_50ms ">
                  <input id="quiz_option" type="checkbox" name="option1"  >
                  <label for="opt_1"><?php echo  $get_single_question->option1?></label>
                  <span class="position-absolute">A</span>
               </li>
               <li class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_100ms">
                  <input id="quiz_option" type="checkbox" name="option2"   >
                  <label for="opt_2"><?php echo  $get_single_question->option2 ?></label>
                  <span class="position-absolute">B</span>
               </li>
            </ul>
         </div>
         <div class="row">
            <ul class="text-center">
               <li class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_150ms">
                  <input id="quiz_option" type="checkbox" name="option3"  >
                  <label for="opt_3"><?php echo  $get_single_question->option3; ?></label>
                  <span class="position-absolute">C</span>
               </li>
               <li class="step_1 position-relative d-inline-block animate__animated animate__fadeInRight animate_200ms">
                  <input id="quiz_option" type="checkbox" name="option4"  >
                  <label for="opt_4"><?php echo  $get_single_question->option4; ?></label>
                  <span class="position-absolute">D</span>
               </li>
            </ul>
            <!-- Progress bar -->
            <!-- <div class="step_progress position-absolute text-center step">
               <span class="text-capitalize">question 1 / 4</span>
               <div class="progress rounded-pill">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
            </div> -->
         </div>
      </div>
   
         <!---------- Form Button ---------->
         <!-- <button type="button" class="f_btn prev_btn text-uppercase position-absolute" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> Last Question</button>
         <button type="button" class="f_btn next_btn text-uppercase position-absolute" id="nextBtn" onclick="nextPrev(1)">Next Question</button> -->
         <button type="button" class="f_btn next_btn text-uppercase position-absolute"  onclick="document.getElementById('get_single_question_test').submit();" name="timer_button">Next</button>
         </form>
   </div>
</div>

<!-- jQuery-js include -->
<script src="<?php echo URLROOT?>/assets_quiz/js/jquery-3.6.0.min.js"></script>
<!-- jquery-count-down include -->
<script src="<?php echo URLROOT?>/assets_quiz/js/countdown.js"></script>
<!-- Bootstrap-js include -->
<script src="<?php echo URLROOT?>/assets_quiz/js/bootstrap.min.js"></script>
<!-- jQuery-validate-js include -->
<script src="<?php echo URLROOT?>/assets_quiz/js/jquery.validate.min.js"></script>
<!-- Custom-js include -->
<script src="<?php echo URLROOT?>/assets_quiz/js/script.js"></script>
<script type="text/javascript">
   $('#getting-started').countdown('2020/07/25', function(event) {
      $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
   });
</script>
</body>
</html>

<script>
jQuery(document).ready(function () {
    function openFancybox() {
        setTimeout(function () {
        $("#consolPopup").fancybox({'overlayShow': true}).trigger('click');
        }, 500);
        setTimeout(function () {
            jQuery('.fancybox-close').trigger('click');
        }, 10000);
    };
    var visited = jQuery.cookie('visited');
    var x = <?php echo $data['id']; ?>;

    if (visited == 'yes' && x!='1') {
        
    } else {
        openFancybox(); 
    }
    jQuery.cookie('visited', 'yes', {
        expires: 1 
    });
    jQuery("#popuplink").fancybox({modal:true, maxWidth: 400, overlay : {closeClick : true}});
});
</script>

<script>
var timeleft = 10;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 10 - timeleft;
  timeleft -= 1;
}, 1000);
    </script>

<script>
    var btn = document.querySelector("[name='timer_button']");
//console.log(btn);
setInterval(function(){
btn.click();
},10000);





</script>



