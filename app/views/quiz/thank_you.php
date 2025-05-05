<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Oodles Quiz</title>
   <!-- FontAwesome-cdn include -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <!-- Google fonts include -->
   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&family=Lato&display=swap" rel="stylesheet">
   <!-- Bootstrap-css include -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/assets_quiz/css/bootstrap.min.css">
   <!-- Animate-css include -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/assets_quiz/css/animate.min.css">
   <!-- Main-StyleSheet include -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/assets_quiz/css/style.css">

   <!-- icons -->


   <link href="<?php echo URLROOT; ?>/assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
   <!-- modal links -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
   <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

</head>

<style>
   .step {
      display: none;
   }

   .py-5 {
      padding-top: 1rem !important;
      padding-bottom: 1rem !important;
   }
   .pt-2 {
      padding-top: 2rem !important;
      padding-bottom: 2rem !important;
   }
   *{
   font-family:bookman-old-style;
}

   .step_content span {
      color: #8d8d98;
   }
</style>
<!-- Modal style -->
<style>
   .popup {
      width: 100%;
      height: 100%;
      z-index: 99999;
   }

   .popup__overlay {
      position: fixed;
      z-index: 1;
      display: block;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background: #000000b3;
   }

   .popup__wrapper {
      position: fixed;
      z-index: 9;
      width: 80%;
      max-width: 1200px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 8px;
      padding: 58px 32px 32px 32px;
      background: #fff;
   }

   .popup__close {
      position: absolute;
      top: 16px;
      right: 26px;
   }

   .button {
      display: inline-block;
      border: 1px solid;
      border-color: #012766;
      background: #012766;
      padding: 10px 16px;
      border-radius: 4px;
      color: #ffffff;
   }

   [id^=modal] {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
   }

   [id^=modal]:target {
      display: block;
   }

   .btn-center {
      display: flex;
      justify-content: center;
      align-items: center;
      height:70px;
      /* height:10px; */
      /* height: 200px;
  border: 3px solid green;  */
  
   }

   .justify-content-between {
      justify-content: center !important;
   }
</style>
<style>
   @media (max-width: 767px) {
  .submit-button {
      font-size: 15px;
  }

}

</style>
<body>
<?php $quizModel = new Quizes; ?>
   <div class="wrapper position-relative overflow-hidden">
      <div class="container-md-fluid p-3 p-lg-0 me-5">

         <div class="row">
            <div class="col-xl-7"></div>
            <div class="col-xl-4">
               <div class="step_content" style="float:right;">
                  <!-- <span class="text-end text-uppercase" id="timer"> . </span> -->
               </div>
            </div>
            <div class="col-xl-1"> </div>
            <div class="col-xl-1"> </div>
            <div class="col-xl-10 ps-5">
               <form class="multisteps_form" id="wizard" method="POST" action="">

                  <!-- ------------------ Step-1 ------------------- -->
                  <div class="multisteps_form_panel" style='display: block;' ;>

                     <div class="step_content d-flex justify-content-between pt-5 pb-2">
                        <h4> <img class="d-none d-lg-block" src="https://oodlesin.com/assets_home/images/resources/logo-1.png" alt="image_not_found" width="150"></h4>


                        <span class="text-end text-uppercase"> </span>

                     </div>
                     <div class="">
                        <div class="">
                           <div class="">

                           </div>
                        </div>
                     </div>




                     <div class="form_content">
                      
                        <div class="question_title py-5" style="padding: 1rem 0 1rem;">
                           <h2 class="text" style="text-align:center;">Thank you for taking quiz</h2>
                         
                           <h4 class="text-capitalize" style="text-align:center;">Score: <?php echo $_SESSION['score'] ?>/<?php echo $_SESSION['total_question']; ?></h4>
                           <h4 class="text-capitalize" style="text-align:center;">Percentage: <?php echo round($_SESSION['score_per'], 2) ?>%</h4>
                 
                           <h4 class="text-capitalize" style="text-align:center;">Time Taken:<?php echo gmdate("i:s", $_SESSION['time_taken']) ?></h4>
                           <?php if ($_SESSION['quiz_category'] != 4) { ?>
                           <h4 class="text-capitalize" style="text-align:center;">Points Earned:
                              <?php
   if (isset($_SESSION['coin_to_be_added'])) {
       echo round($_SESSION['coin_to_be_added'],1);
   } else {
       echo "0";
   } ?></h4>
                       
                           <h4 class="text-capitalize" style="text-align:center;"><?php if ($_SESSION['passing_per'] < $_SESSION['score_per']) { ?> Hurray!, You have cleared the test! <?php } else { ?> Please Try Again... <?php } ?></h4>
                           <?php }else{?> 
                              <h4 class="text-capitalize" style="text-align:center;">Points Earned:
                              <?php
   if (isset($_SESSION['coin_to_be_added'])) {
      echo round($_SESSION['coin_to_be_added'],1);
   } else {
       echo "0";
   } ?></h4>
   <br>
                              <h4 class="text-capitalize" style="text-align:center;">Please wait for the Result declaration!. <br><br>You will be notified soon or check your results.<br> Thank you for participating in OodlesIn Contest.<br> Do visit website, for coming Contests. Happy learning.</h4>


                              <?php } ?>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">


                        </div>

                     </div>
                     <div class="btn-center" >
                        <a href="<?php echo URLROOT ?>/student/quiz_result"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-star"></i>&ensp;View Results</button></a>
                           </div>
                           <div class="btn-center" style="padding-top:5px;">
                        <a href="<?php echo URLROOT ?>/student/ranking"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-ranking-star"></i>&ensp;Explore Rank</button></a>
                        </div>
                           <div class="btn-center" style="padding-top:5px;">
                        <a href="<?php echo URLROOT ?>/student/all_quiz/1/<?php echo $_SESSION['quiz_category'];?>/<?php echo  $_SESSION['quiz_subject'];?>"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-border-all"></i>&ensp;See All Quizes</button></a>
                     </div>
                     <!-- fcommented because it was not working properly -->
                     <!-- <?php if ($_SESSION['quiz_category'] == 1) { ?>
                        <div class="btn-center" style="padding-top:5px;">
                           <a href="<?php echo URLROOT ?>/student/retake_test/<?php echo $_SESSION['current_quiz_id'] ?>"> <button type="button" class="next_btn text-uppercase text-white" style="float:none;"><i class="fa-solid fa-clock-rotate-left"></i>&ensp;&ensp;&ensp;Play&ensp;Again&ensp;&ensp;</button></a>
                        </div>
                     <?php } ?> -->
                     <?php if ($_SESSION['quiz_category'] == 1) { 
                        $total_attempt = $this->quizModel->get_total_attempt($_SESSION['current_quiz_id']);
                        $count_of_participation = count($this->quizModel->get_participated_quiz($_SESSION['current_quiz_id']));
                        if($total_attempt->attempt != 0){
                        if($count_of_participation < $total_attempt->attempt){
                        ?>
                        <div class="btn-center" style="padding-top:5px;">
                           <a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $_SESSION['current_quiz_id'] ?>"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-clock-rotate-left"></i>&ensp;&ensp;&ensp;Play&ensp;Again&ensp;&ensp;</button></a>
                        </div>
                        <?php } else{?>
                           <div class="btn-center" style="padding-top:5px;">
                           <a> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;">&ensp;&ensp;&ensp;Attempts&ensp;Finished&ensp;&ensp;</button></a>
                        </div>
                           <?php } ?>
                     <?php }else{ ?>
                        <div class="btn-center" style="padding-top:5px;">
                           <a href="<?php echo URLROOT ?>/student/take_quiz/<?php echo $_SESSION['current_quiz_id'] ?>"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-clock-rotate-left"></i>&ensp;&ensp;&ensp;Play&ensp;Again&ensp;&ensp;</button></a>
                        </div>
                        <?php }} ?>
                     <?php
                     $quizMod = new Quizes;
                     $get_all_quiz = $quizMod->get_quizes_by_category($_SESSION['quiz_category']);
                     foreach ($get_all_quiz as $all_quiz) {
                        $quiz_id1 = $all_quiz->id;
                        $get_participated_quiz = $quizMod->get_participated_quiz($quiz_id1);
                if(empty($get_participated_quiz)){
                  $next_quiz_id = $quiz_id1;
                  
                }
                     }
                     ?>
                     <?php if(isset($next_quiz_id)){ ?>
                     <?php if ($_SESSION['quiz_category'] == 1) { ?>
                        <div class="btn-center" style="padding-top:5px;">
                           <a href="<?php echo URLROOT ?>/student/all_quiz/1/<?php echo $_SESSION['quiz_category'];?>/<?php echo  $_SESSION['quiz_subject'];?>"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-forward"></i>&ensp;Next Quiz</button></a>
                        </div>
                     <?php } ?>
                     <?php } ?>
                     <?php if ($_SESSION['quiz_category'] == 1) { ?>
                        <div class="btn-center" style="padding-top:5px;">
                           <a href="<?php echo URLROOT ?>/student/explore_answers"> <button type="button" class="next_btn text-uppercase text-white submit-button" style="float:none;"><i class="fa-solid fa-pause"></i>&ensp;Explore Answer</button></a>
                        </div>
                     <?php } ?>


                     <!-- ------------------ Step-2 ------------------- -->

                     <!-- ------------------ Step-3 ------------------- -->

                     <!-- ------------------ Step-4 ------------------- -->

               </form>

         
            </div>
         </div>
      </div>
   </div>

   <!-- First modal -->
   <div class="popup" id="modal1">
      <a class="popup__overlay" href="#"></a>
      <div class="popup__wrapper">
         <a class="popup__close" href="#">X</a>

         <div class="card-body">
            <!-- <div class="row"> -->

            <div class="col-md-3">
               <img src="" class="card-img-top" alt="Resources">
            </div>

            <!-- </div> -->
         </div>

      </div>
   </div>
   <!-- Second modal -->
   <div class="popup" id="modal2">
      <a class="popup__overlay" href="#"></a>
      <div class="popup__wrapper">
         <a class="popup__close" href="#">X</a>

         <div class="card-body">
            <!-- <div class="row"> -->


            <div class="col-md-3">
               <img src="" class="card-img-top" alt="Mind map">
            </div>

            <!-- </div> -->
         </div>

      </div>
   </div>
   <!-- Third modal -->
   <div class="popup" id="modal3">
      <a class="popup__overlay" href="#"></a>
      <div class="popup__wrapper">
         <a class="popup__close" href="#">X</a>

         <div class="card-body">
            <!-- <div class="row"> -->


            <div class="col-md-3">
               <img src="" class="card-img-top" alt="Explanation">
            </div>

            <!-- </div> -->
         </div>

      </div>
   </div>




   <!-- jQuery-js include -->
   <script src="<?php echo URLROOT ?>/assets_quiz/js/jquery-3.6.0.min.js"></script>
   <!-- Countdown-js include -->
   <script src="<?php echo URLROOT ?>/assets_quiz/js/countdown.js"></script>
   <!-- Bootstrap-js include -->
   <script src="<?php echo URLROOT ?>/assets_quiz/js/bootstrap.min.js"></script>
   <!-- jQuery-validate-js include -->
   <script src="<?php echo URLROOT ?>/assets_quiz/js/jquery.validate.min.js"></script>
   <!-- Custom-js include -->
   <script src="<?php echo URLROOT ?>/assets_quiz/js/script.js"></script>


</body>

</html>

<script>
   window.onload = function() {
      var minute = <?php echo $quiz_detail->duration - 1; ?>;
      var sec = 60;
      setInterval(function() {
         document.getElementById("timer").innerHTML = minute + " : " + sec;
         sec--;
         if (sec == 00) {
            minute--;
            sec = 60;
            if (minute == 0) {
               minute = 5;
            }
         }

      }, 1000);

   }

   //    var btn = document.querySelector("[name='timer_next_btn']");
   // console.log(btn);
   // setInterval(function(){
   // btn.click();
   // },3000);
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if (isset($_SESSION['success'])) { ?>
   <script type="text/javascript">
      swal("<?php echo $_SESSION['success']; ?>");
   </script>
<?php }
unset($_SESSION['success']); ?>

<script>

history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
document.onkeydown = function(){
  switch (event.keyCode){
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        case 82 : //R button
            if (event.ctrlKey){ 
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            }
    }
}

</script>
<?php unset($_SESSION['thank_you_flag']); ?>