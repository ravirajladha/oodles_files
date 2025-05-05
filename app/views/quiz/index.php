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
   <link href="https://fonts.cdnfonts.com/css/bookman-old-style" rel="stylesheet">

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

   * {
      font-family: bookman-old-style;
   }

   .pt-2 {
      padding-top: 2rem !important;
      padding-bottom: 2rem !important;
      max-width: 100%;
      height: 100%;
   }


   .step_content span {
      color: #8d8d98;
   }
</style>
<!-- Modal style -->
<style>
   .popup {
      width: 100%;
      height: 20px;
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

   /* #foobar { display: none } */
</style>

<style>
   @media (max-width: 767px) {
  .submit-button {
      font-size: 15px;
  }
  .question_title h1 {
    font-size: 1.5rem !important;
}
.step_box_text{
   font-size: 15px !important;
   padding-top: 1rem !important;
   padding-bottom: 1rem !important;
}
.question_title {
   padding: 1rem 0rem !important;
}
}
.question_title h1 {
    font-size: 2.5rem;
}


</style>
<script>
   // document.oncontextmenu = function() {
   //    return false;
   // };
</script>
<?php

$quiz_detail = $data['get_question_detail'];

   $question_array = $quiz_detail->question;
   $var_temp = explode(',', $question_array);
   $vcount = 0;
   foreach ($var_temp as $v) {
       //  echo  '<script>
       //   setTimeout(function(){$("#nextBtn").trigger("click")},3000);
       //   </script>';

       $vcount++;
       echo  "<div class='step'></div>";
   }
   $quiz_category = $data['quiz_category']; ?>

<body>

   <div class="wrapper position-relative overflow-hidden">
      <div class="container-md-fluid p-3 p-lg-0 me-5">

         <div class="row">
            <div class="col-xl-7"></div>
            <div class="col-xl-4">
               <div class="step_content" style="float:right;">
                  <audio id="audio_playo24" controls autoplay loop style="display:none;">
                     <source src="<?php echo URLROOT ?>/uploads/<?php echo $quiz_detail->quiz_audio ?>" type="audio/mp3" />
                  </audio>
                  <a href="javascript:void(0);" onclick="toggleMute()"><i class="fa-solid fa-music"></i>&ensp;&ensp;&ensp;&ensp;</a>
                  <span class="text-end text-uppercase" style="color:black;" id="timer"> . </span>
               </div>
            </div>
            <div class="col-xl-1"> </div>
            <div class="col-xl-1"> </div>
            <div class="col-xl-10 ps-5">

               <form class="multisteps_form" id="wizard" method="POST" action="<?php echo URLROOT; ?>/quiz/quiz_submission/<?php echo $data['id']; ?>/<?php echo $data['token']; ?>">


                  <?php $quiz_detail = $data['get_question_detail'];
   $total_time_given = (intval($quiz_detail->duration_min) * 60) + intval($quiz_detail->duration_sec);
   // Get the time limit in milliseconds (for example, 10 minutes)
   // if($get_single_question->duration_min!=0 &&  $get_single_question->duration_sec!=0 ){
   //    $time_limit = $get_single_question->duration_min * $get_single_question->duration_sec * 1000; // 10 minutes * 60 seconds/minute * 1000 milliseconds/second
   // }elseif($get_single_question->duration_min==0){
   //    $time_limit = $get_single_question->duration_sec * 1000; // 10 minutes * 60 seconds/minute * 1000 milliseconds/second
   // }elseif($get_single_question->duration_sec==0){
   //    $time_limit = $get_single_question->duration_min * 1000; // 10 minutes * 60 seconds/minute * 1000 milliseconds/second
   // }


   $end_time = strtotime($quiz_detail->end_time); // Assuming $quiz_detail->end_time is a valid date/time string in a recognized format

   // Get the current time
   $current_time = time();

   // Calculate the time remaining until the end time
   $time_remaining = $end_time - $current_time;

   // If the time remaining is greater than the total time given for the quiz, set the time limit to the total time given
   // Otherwise, set the time limit to the time remaining
   $time_limit = ($time_remaining > $total_time_given) ? $total_time_given * 1000 : $time_remaining * 1000;

   // $time_limit =     $total_time_given * 1000;
   // Output the JavaScript code
   // echo "<script>";
   // echo "setTimeout(function() {";
   // echo "  document.getElementById('wizard').submit();"; //old

   //                   echo "  var formObject = document.getElementById('wizard');";
   // echo "  formObject.submit();";


   //                   echo "}, " . $time_limit . ");";
   //                   echo "</script>";
   ?>
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                  <script>
                     // Use jQuery to submit the form
                     setTimeout(function() {
                        formSubmitted = true;
                        $("#submitBtn").prop('disabled', true); // Disable the submit button
                        $.post($("#wizard").attr("action"), $("#wizard").serialize(), function() {
                           $("#wizard").submit();
                        });
                     }, <?php echo $time_limit; ?>);
                  </script>
                  <?php


   $question_array = $quiz_detail->question;
   $var = explode(',', $question_array);
   $count = 0;
   $opt_val = 1;

   foreach ($var as $question_ind) {
       $count++;
       $progress = ($count * 100) / $vcount;
       ?>

                     <!-- ------------------ Step-1 ------------------- -->
                     <div class="multisteps_form_panel" <?php if ($count == 1) {
                         echo "style='display: block;'";
                     } ?>>

                        <div class="step_content d-flex justify-content-between pt-5 pb-2" style="text-align:center;">
                           <?php $category = $quiz_detail->category;

       ?>
                           <?php if ($category == 1) {
                               echo "Practice";
                           } elseif ($category == 2) {
                               echo "Merit";
                           } elseif ($category == 3) {
                               echo "Rapid Fire";
                           } elseif ($category == '4') {
                               echo "Contest";
                           } ?>&ensp;:&ensp;<?php echo ucwords($quiz_detail->name); ?>
                  </div>
                        <div class="step_content d-flex justify-content-between pt-5 pb-2">
                           <h4> <img class="d-none d-lg-block" src="https://oodlesin.com/assets_home/images/resources/logo-1.png" alt="image_not_found" width="150"></h4>
                           <?php
                           $quizModel = new Quizes();
       $question_detail = $quizModel->get_single_question($question_ind);

       ?>
                           <?php if ($quiz_detail->category == 1) { ?>
                              <a class="" href="#modal1" style="color:blue;text-shadow: 2px 2px 4px #000000;"> <i class="fa-solid fa-note-sticky fa-2xl"></i>&nbsp;Resources</a>

                              <a class="" href="#modal2" style="color:blue;text-shadow: 2px 2px 4px #000000;"><i class="fa-solid fa-brain fa-2xl"></i>&nbsp;Mind Map</a>

                              <a class="" href="#modal3<?php echo $count ?>" style="color:blue;text-shadow: 2px 2px 4px #000000;"><i class="fa-solid fa-lightbulb fa-2xl"></i>&nbsp;Explanation</a>
                           <?php } ?>
                           <span class="text-end " style="color:black;font-size:20px;">
                              Question <?php echo $count ?> of <?php echo $vcount ?> </span>

                        </div>
                        <div class="step_progress_bar">
                           <div class="progress rounded-pill">
                              <div class="progress-bar" style="width:<?php echo $progress; ?>%"></div>
                           </div>
                        </div>

                        <div class="form_content">

                           <div class="question_title" style="padding:1rem 0 1rem;">
                              <div class="row">
                                 <?php if (!empty($question_detail->question_img)) { ?>


                                    <div class="col-md-3">
                                       <img src="<?php echo URLROOT ?>/uploads/<?php echo $question_detail->question_img ?>" style="height:250px;width:200px;max-height:200px;max-width:200px;border:solid 10px whitesmoke;" alt="question_img">

                                    </div>

                                    <div class="col-md-7" style="overflow-wrap: break-word;">
                                       <h1 class="">
                                          <?php echo ucfirst($question_detail->question) ?></h1>

                                    </div>
                                    <div class="col-md-2"></div>
                                 <?php } else { ?>
                                    <div class="col-md-12">
                                       <h1 class=""><?php echo ucfirst($question_detail->question) ?></h1>

                                    </div>
                                 <?php } ?>

                              </div>
                           </div>
                           <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 form_items">
                              <div class="col">
                                 <label id="opt_<?php echo $opt_val ?>" class="step_<?php echo $count; ?> d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_25ms">

                                    <span class="step_box_text pt-2" style="background-color:#2ed8b6;font-size:20px;line-height:23px;">
                                       <?php if (!isset($question_detail->option1_img)) {
                                           echo ucfirst($question_detail->option1);
                                       } else { ?>
                                          <img src="<?php echo URLROOT ?>/uploads/<?php echo $question_detail->option1_img; ?>" style="height:200px;width:200px;">
                                       <?php    }
       ?>
                                    </span>
                                    <!-- <p class="step_box_desc">
                                    My horse likes to relax
                                 </p> -->
                                    <input for="opt_<?php echo $opt_val++ ?>" type="radio" name="stp_<?php echo $count; ?>_select_option" value="option1">
                                 </label>
                              </div>
                              <div class="col">
                                 <label id="opt_<?php echo $opt_val++ ?>" class="step_<?php echo $count; ?> d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_50ms">

                                    <span class="step_box_text pt-2" style="background-color:#ffbf64;font-size:20px;line-height:23px;"> <?php if (!isset($question_detail->option2_img)) {
                                        echo ucfirst($question_detail->option2);
                                    } else { ?>
                                          <img src="<?php echo URLROOT ?>/uploads/<?php echo $question_detail->option2_img; ?>" style="height:200px;width:200px;">
                                       <?php    }
       ?></span>
                                    <!-- <p class="step_box_desc">
                                    My horse likes to relax
                                 </p> -->
                                    <input for="opt_<?php echo $opt_val ?>" type="radio" name="stp_<?php echo $count; ?>_select_option" value="option2">
                                 </label>
                              </div>
                              <div class="col">
                                 <label id="opt_<?php echo $opt_val++ ?>" class="step_<?php echo $count; ?> d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_100ms">

                                    <span class="step_box_text pt-2" style="background-color:#58a5fc;font-size:20px;line-height:23px;">
                                       <?php if (!isset($question_detail->option3_img)) {
                                           echo ucfirst($question_detail->option3);
                                       } else { ?>
                                          <img src="<?php echo URLROOT ?>/uploads/<?php echo $question_detail->option3_img; ?>" style="height:200px;width:200px;">
                                       <?php    }
       ?>
                                    </span>
                                    <!-- <p class="step_box_desc">
                                    My horse likes to relax
                                 </p> -->
                                    <input for="opt_<?php echo $opt_val ?>" type="radio" name="stp_<?php echo $count; ?>_select_option" value="option3">
                                 </label>
                              </div>
                              <div class="col">
                                 <label id="opt_<?php echo $opt_val++ ?>" class="step_<?php echo $count; ?> d-flex flex-column bg-white text-center animate__animated animate__fadeInRight animate_150ms">
                                    <span class="step_box_text pt-2" style="background-color:#ff768b;font-size:20px;line-height:23px;">
                                       <?php if (!isset($question_detail->option4_img)) {
                                           echo ucfirst($question_detail->option4);
                                       } else { ?>
                                          <img src="<?php echo URLROOT ?>/uploads/<?php echo $question_detail->option4_img; ?>" style="height:200px;width:200px;">
                                       <?php    }
       ?>
                                    </span>
                                    <!-- <p class="step_box_desc">
                                    My horse likes to relax
                                 </p> -->
                                    <input for="opt_<?php echo $opt_val ?>" type="radio" name="stp_<?php echo $count; ?>_select_option" value="option4">


                                 </label>
                              </div>
                           </div>
                        </div>
                        <!-- <?php $time_taken = "<span id='timer'></span>" ?>
                         <input type="text" name="timer" value=<?php echo $time_taken; ?> hidden> -->

                        <!-- <div class="d-flex"> -->



                        <div class="form_btn pt-5 d-flex align-items-center justify-content-between question_section" style="">
                           <!-- <button type="button" class="prev_btn text-uppercase bg-white" id="prevBtn" style="padding:9px;" onclick="nextPrev(-1)" <?php if ($count == 1) {
                               echo "style='display: none;'";
                           } ?>><span><i class="fas fa-arrow-left"></i></span> Last
                                 Question</button> -->
                           <?php if ($quiz_category == 4) { ?>
                              <div class="step_progress_bar">
                                 <div class="progress rounded-pill">
                                    <div class="progress-bar" id="progress2<?php echo $count ?>"><span id="timer2<?php echo $count; ?>"></span></div>
                                 </div>
                              </div>
                              <!-- <div class="mx-5">
                              <h4></h4>
                           </div> -->

                           <?php } ?>
                           <button type="button" class="next_btn text-uppercase text-white submit-button" id="nextBtn<?php echo $count ?>" style="padding:9px;" onclick="nextPrev(1)" ><?php if ($count != $vcount) {
                               echo "Next Question";
                           } else {
                               echo "Submit";
                           }  ?><span><i class="fas fa-arrow-right"></i></span></button>

                        </div>
                        <!-- </div> -->
                     </div>
                     <!-- First modal -->
                     <div class="popup" id="modal1">
                        <a class="popup__overlay" href="#"></a>
                        <div class="popup__wrapper">
                           <a class="popup__close" href="#">X</a>

                           <div class="card-body">
                              <!-- <div class="row"> -->


                              <div class="col-md-12">
                                 <!-- <img src="" class="card-img-top" alt="Mind map"> -->

                                 <?php
                                 $quizMod = new Quizes();
       $get_chapter_detail = $quizMod->get_quiz_master_detail($question_detail->id);
       $chapter_id = $get_chapter_detail->chapter;
       $get_chapter_detail = $quizMod->get_chapter_detail($chapter_id);
       $quiz_resource = $get_chapter_detail->resource;
       ?>

                                 <?php if (!empty($quiz_resource)) { ?>

                                    <embed src="<?php echo URLROOT ?>/uploads/<?php echo  $quiz_resource ?>#toolbar=0" type="application/pdf" height="600px" width="100%">
                                 <?php } ?>
                              </div>
                              <!-- </div> -->
                           </div>

                        </div>
                     </div>
                     <!-- first end -->
                     <!-- Second modal -->
                     <div class="popup" id="modal2">
                        <a class="popup__overlay" href="#"></a>
                        <div class="popup__wrapper">
                           <a class="popup__close" href="#">X</a>

                           <div class="card-body">
                              <!-- <div class="row"> -->


                              <div class="col-md-12">
                                 <!-- <img src="" class="card-img-top" alt="Mind map"> -->
                                 <?php
       $quizMod = new Quizes();
       $get_chapter_detail = $quizMod->get_quiz_master_detail($question_detail->id);
       $chapter_id = $get_chapter_detail->chapter;
       $get_chapter_detail = $quizMod->get_chapter_detail($chapter_id);
       $quiz_map = $get_chapter_detail->map;
       ?>
                                 <?php if (!empty($quiz_map)) { ?>
                                    <embed src="<?php echo URLROOT ?>/uploads/<?php echo $quiz_map ?>#toolbar=0" type="application/pdf" height="600px" width="100%">
                                 <?php } ?>
                              </div>

                              <!-- </div> -->
                           </div>

                        </div>
                     </div>
                     <!-- second modal end -->
                     <!-- Third modal -->





                     <div class="popup" id="modal3<?php echo $count ?>">
                        <a class="popup__overlay" href="#"></a>
                        <div class="popup__wrapper">
                           <a class="popup__close" href="#">X</a>

                           <div class="card-body">
                              <!-- <div class="row"> -->


                              <div class="col-md-12">
                                 <!-- <img src="" class="card-img-top" alt="Explanation"> -->
                                 <?php
       /*
       $quiz_detail = $data['get_question_detail'];
       $question_array = $quiz_detail->question;
       $var = explode(',', $question_array);


       foreach ($var as $question_ind) {

          $quizModel = new Quizes;
          $question_detail = $quizModel->get_single_question($question_ind); ?>

          <div>
             <?php echo $question_detail->question; ?>
             <br>
             Explanation:

             <hr>
          </div>

       <?php  }
*/
       ?>
                                 <!-- <span>123</span> -->
                                 <?php if (!empty($question_detail->explanation)) { ?>
                                    <?php echo $question_detail->explanation; ?>
                                 <?php } else {
                                     echo "No explanation";
                                 } ?>
                              </div>

                              <!-- </div> -->
                           </div>

                        </div>
                     </div>
                  <?php } ?>
                  <!--Question foreach loop end -->


                  <!-- ------------------ Step-2 ------------------- -->

                  <!-- ------------------ Step-3 ------------------- -->

                  <!-- ------------------ Step-4 ------------------- -->
                  <input type="text" style="display:none" id="time_elapsed" name="time_elapsed">
               </form>
            </div>
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
      var minute = <?php echo $quiz_detail->duration_min; ?>;
      var sec = <?php echo $quiz_detail->duration_sec; ?>;
      setInterval(function() {
         document.getElementById("timer").innerHTML = minute + " : " + sec;
         $('#time_elapsed').attr('value', minute + ":" + sec)
         // sec--;
         if (sec == 00) {
            minute--;
            sec = 60;
            // if (minute == 0) {
            //    minute = 5;
            // }
         }
         sec--;
      }, 1000);
      <?php if ($quiz_category == 4) {

          ?>
         var question_count = <?php echo $vcount ?>;
         var minute = <?php echo $quiz_detail->duration_min; ?>;
         var sec = <?php echo $quiz_detail->duration_sec; ?>;
         var single_quiz_sec = ((minute * 60) + sec) / question_count;
         var i = 1;

         function quizTimer() {

            var timer = document.getElementById("timer2" + i);
            var button = document.getElementById("nextBtn" + i);
            var progress = document.getElementById("progress2" + i);
            var count = single_quiz_sec;
            var intervalId;
            var isClicked = false;
            button.addEventListener("click", function() {
               isClicked = true;
               

            });
            // var submit_button = document.getElementById("nextBtn" + question_count);
            // submit_button.addEventListener("click", function() {
               
            //    // once clicked disable the button
            //    button.disabled = true;
            //    // console.log("disabled");

            // });
            // if(isClicked){
            //       count = 10; // reset the count
            //       i++;
            //       quizTimer();
            // }
            // adding color to timer

            function startTimer() {
               intervalId = setInterval(function() {
                  // count--;
                  // console.log(count);
                  if (count <= 0) {
                     clearInterval(intervalId);
                     button.click(); // programmatically click the button

                     count = single_quiz_sec; // reset the count
                     i++;
                     quizTimer();

                  } else if (isClicked) {
                     clearInterval(intervalId);
                     // button.click(); // programmatically click the button
                     // console.log(timer);
                     count = single_quiz_sec; // reset the count
                     i++;
                     quizTimer();
                  } else {
                     timer.textContent = parseInt(count) + " sec";
                     var progress_width = (count * 100) / single_quiz_sec;
                     progress.style.width = progress_width + '%';
                  }
                  count--;
               }, 1000);
            }

            startTimer();

         }
         quizTimer();
      <?php } ?>
   }

   function toggleMute() {
      var myAudio = document.getElementById('audio_playo24');
      myAudio.muted = !myAudio.muted;
   }

   history.pushState(null, document.title, location.href);
   window.addEventListener('popstate', function(event) {
      history.pushState(null, document.title, location.href);
   });
   document.onkeydown = function() {
      switch (event.keyCode) {
         case 116: //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
         case 82: //R button
            if (event.ctrlKey) {
               event.returnValue = false;
               event.keyCode = 0;
               return false;
            }
      }
   }
   // window.onbeforeunload = function () {return false;}


   let formSubmitted = false;


   // Attach a submit event handler to the form
   // const form = document.getElementById('wizard');

   var q_count = <?php echo $vcount ?>;
   console.log(q_count);
   const button = document.getElementById('nextBtn' + q_count);
   button.addEventListener('click', function(event) {
      formSubmitted = true;
      
   });

   // console.log(button);
   // Attach an onbeforeunload event handler to the window
   window.onbeforeunload = function(event) {
      // timeoutId = setTimeout(function() {
      //    window.location.reload();
      //  }, 5000);
      if (!formSubmitted) {

         return "Are you sure you want to leave?";
      }

   }
</script>