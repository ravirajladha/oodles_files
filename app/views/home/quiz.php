<?php require APPROOT . "/views/inc_home/header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .tool {
        cursor: help;
        position: relative;
    }

    .tool::before,
    .tool::after {
        position: absolute;
        left: 50%;
        opacity: 0;
        z-index: -100;
    }

    .tool:hover::before,
    .tool:focus::before,
    .tool:hover::after,
    .tool:focus::after {
        opacity: 1;
        z-index: 100;
    }

    .tool::before {
        border-style: solid;
        border-width: 1em .75em 0 .75em;
        border-color: #3e474f transparent transparent transparent;
        bottom: 100%;
        margin-left: -.5em;
        content: " ";
    }

    .tool::after {
        background: #32c5d2;
        border-radius: .25em;
        bottom: 180%;
        color: white;
        width: 17.5em;
        padding: 1em;
        margin-left: -8.75em;
        content: attr(data-tip);
    }
</style>
<?php

$adminMod = new Admins; ?>
<!--Main Slider Start-->
<section class="main-slider clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/v2.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px;">PLAY <br>QUIZ & <span>EARN</span><br> POCKET SCHOLARSHIP</span></h2>
                                <p class="main-slider__text">POCKET Scholarship programme aimed
                                    at encouraging Indian students<br> to improve their learning continuously by
                                    authenticating their learning <br>levels Quizzes & drive their 'eager to
                                    learn' nature by rewarding monthly<br> e-scholarships.Make your studies fun and rewarding with
                                    Pocket Scholarship! <br>Take Quizzes and get scholarships up to ₹1000 per month!</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/long1.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h4 class="main-slider__title" style="font-size:36px;">Practice Quiz offers high-quality test prep <br> for a variety of academic <span>exams.<span> </h4>
                                <p class="main-slider__text">This Quiz is intended to evaluate your knowledge and understanding <br>
                                    of Subjects by allowing you to practice and learn Chapters finished<br>in your school.p

                                    <hidden>The quiz features MCQ-based questions prepared by <br> subject matter experts that are similar to the topics you may encounter <br>in exams. These questions verify that you understand the Chapter & Topics<br> and are prepared for your academic evaluations. So, what are you holding out for? <br>Take this quiz now to boost your grades!
                                </p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/long2.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px; ">
                                    <span>!!! Contest!!!</span>
                                    <br>खेलो जीतो स्कालरशिप!!!<br>INDIA में सीखने का<br>नया तरीका !!!
                                </h2>
                                <p class="main-slider__text">A platform especially designed for those who have <br>a quest for knowledge and love to explore a new world <br>of learning. Dive in to the OodlesIn of Scholarship & quizzes <br>that we have for you .</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/vecteezy.jpg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:36px;">Scholarship
                                    <br> for the better <br> school <span>life.</span>
                                </h2>
                                <p class="main-slider__text">Take the Challenge and participate to win cash prizes.<br> You have a limited amount of time to answer each question. <br> The faster
                                    you respond, the greater your score. The higher <br>the score, the higher the
                                    ranking!!! Top the Ranking Leader <br> board to Win Big!!! Are you prepared for it?<br>
                                    Play Now and Start Winning,</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>


            </div>

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-right-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow1"></i>
            </div>
        </div>

    </div>
</section>
<!--Page Header End-->
<!-- Pragraph start -->
<nav aria-label="breadcrumb" style="margin-top:10px;margin-right:10px;">
    <ol class="breadcrumb" style="float:right;">
        <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/home/index">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo URLROOT; ?>/home/index">Quiz</a></li>
        <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
    </ol>
</nav>
<div class="container">
    <div class="services-two__top" style="float:right;">

        <!--Team Page Start-->
        <!-- <section class="team-page-carousel" style="padding:0 0 10px;">
            <div class="container">
                <div class="thm-owl__carousel owl-theme owl-carousel team-carousel carousel-dot-style" data-owl-options='{
                    "items": 3,
                    "margin": 108,
                    "smartSpeed": 700,
                    "loop":false,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>
            
                    <div class="item">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <div class="team-one__img-box">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/top_ranker1.jpg" alt="">
                                </div>
                                
                            </div>
                            <div class="team-one__content">
                                <p class="team-one__sub-title">TOP RANKER</p>
                                <h3 class="team-one__name"><a href="team-details.html">Lorem, ipsum.</a></h3>
                               
                            </div>
                        </div>
                    </div>
                
                    <div class="item">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <div class="team-one__img-box">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/top_ranker1.jpg" alt="">
                                </div>
                               
                            </div>
                            <div class="team-one__content">
                                <p class="team-one__sub-title">TOP RANKER</p>
                                <h3 class="team-one__name"><a href="team-details.html">Lorem, ipsum.</a></h3>
                               
                            </div>
                        </div>
                    </div>
                
                    <div class="item">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <div class="team-one__img-box">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/top_ranker1.jpg" alt="">
                                </div>
                                
                            </div>
                            <div class="team-one__content">
                                <p class="team-one__sub-title">TOP RANKER</p>
                                <h3 class="team-one__name"><a href="team-details.html">Lorem, ipsum.</a></h3>
                               
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section> -->


    </div>
    <!-- class carousal starts -->




    <?php
    $count1 = 0;
    foreach ($data['get_all_class'] as $class) {
        $count1++;
    }
    if ($count1 > 0) {
    ?>
        <div class="section-title text-left" style="padding:20px 0 0; margin-bottom: 12px;">

            <div class="section-sub-title-box">
                <p class="section-sub-title">Select Class</p>
                <div class="section-title-shape-1">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                </div>


            </div>


        </div>


        <!-- filter start -->

        <form method="post" id="quiz-form" action="<?php echo URLROOT; ?>/home/quiz/<?php echo $data['category']; ?>/0">
            <div class="container d-flex justify-content-center align-items-center">

                <div class="row">

                    <div class="col-xl-6">
                        <label for="list2" class="mdl-textfield__label"></label>

                        <select id="class" name="classes" class="form-control" required style="width:200px;" onchange="submitForm()">
                            <option selected>Select Class</option>
                            <?php foreach ($data['get_all_class'] as $class) { ?>
                                <option value=<?php echo $class->id; ?>><?php echo $class->class_name; ?></option>
                            <?php } ?>

                        </select>

                    </div>


                    <!-- <div class="col-xl-3">
                    <label for="list2" class="mdl-textfield__label" required></label>

                    <select class="form-control" id="subject" name="subject" style="width:150px;">
                        
                    </select>
                
                </div> -->
                    <!-- <div class="col-xl-4 p-t-20">
                    <br>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Search</button>

                </div> -->
                    <div class="col-xl-6 p-t-20">
                        <br>
                        <!-- <button class="btn btn-white" style="margin-left: 35px;"><a href="<?php echo URLROOT; ?>/home/quiz/<?php echo $data['category']; ?>/all"><u>View All</u></a></button> -->
                    </div>

                </div>
            </div>
            <input type="text" hidden value="<?php echo $data['category']; ?>" name="category">
        </form>

        <script>
            function submitForm() {
                document.getElementById("quiz-form").submit();
            }
        </script>

        <!-- start new serach -->
        <?php if (isset($data['get_quiz'])) { ?>
            <?php if (count($data['get_quiz']) == 0) { ?>
                <br>
                <br>
                <div class="alert alert-warning">No quizzes found.</div>
            <?php } ?>
            <section class="portfolio" style="padding-bottom:0px;padding-top:30px;">
                <div class="container">
                    <!-- <div class="row">
                <div class="col-3">
                    <ul class="portfolio-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                        <li data-filter=".filter-item" class="active"><span class="filter-text">All</span></li>
                    
                    </ul>
                </div>
            </div> -->
                    <!--Portfolio Single Start-->
                    <?php
                    $count = 0;
                     foreach ($data['get_quiz'] as $quiz) {
                        $count++; ?>


                        <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                            <div class="blogThumb" style="height:480px;">
                                <div class="thumb-center"><img class="img-responsive" alt="user" src="<?php echo URLROOT; ?>/uploads/<?php echo $quiz->image ?>" style="height:200px;width:100%;"></div>
                                <div class="white-box" style="padding:3px;">
                                    <div class="text-muted"><span class="m-r-10" style="font-size:14px;">
                                            <?php $out = strlen($quiz->name) > 33 ? substr($quiz->name, 0, 33) . "..." : $quiz->name; ?>
                                            <h5 style="color:black;"><?php echo strtoupper($out); ?></h5>
                                        </span></div>
                                    <div class="text-muted"><span class="m-r-10" style="font-size:12px;">
                                            FROM: <span style="color:green;"><?php echo date("d/m/y", strtotime($quiz->start_date)) ?></span>
                                        </span>
                                        <span class="m-r-10" style="float:right;font-size:12px;">
                                            TO: <span style="color:red;"><?php echo date("d/m/y", strtotime($quiz->end_date)) ?></span>
                                        </span>

                                    </div>

                                    <?php if (isset($quiz->start_time) && isset($quiz->end_time)) { ?>
                                        <div class="text-muted"><span class="m-r-10" style="font-size:12px;">
                                                START: <span style="color:green;"><?php echo $quiz->start_time; ?></span>
                                            </span>
                                            <span class="m-r-10" style="float:right;font-size:12px;">
                                                END: <span style="color:red;"><?php echo $quiz->end_time; ?></span>
                                            </span>

                                        </div>
                                        <?php if ($quiz->category == 4) { ?>
                                        <div class="text-muted"><span class="m-r-10" style="font-size:12px;">
                                                SLOT AVAILABLE: <span style="color:green;">
                                                </span>
                                                <span class="m-r-10" style="float:right;font-size:12px;">
                                                    <span style="color:green;">

                                                        <?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
    if (isset($contest_prize->no_of_participants)) {
        $total_participant_allowed =  $contest_prize->no_of_participants;
    }

    $get_slot_booked =     $adminMod->get_contest_registration($quiz->id);
    $slot_avialable = $total_participant_allowed - count($get_slot_booked);
    echo $slot_avialable;
    ?>
                                                    </span>
                                                </span>
                                        </div>
                                        <?php }?>
                                        <?php if ($quiz->category == 4) { ?>
                                        <div class="text-muted"><span class="m-r-10" style="font-size:12px;">
                                                TOTAL SLOTS: <span style="color:green;">

                                                    <span class="m-r-10" style="float:right;font-size:12px;">
                                                        <span style="color:green;">

                                                            <?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
                                                            if (isset($contest_prize->no_of_participants)) {
                                                                echo $total_participant_allowed =  $contest_prize->no_of_participants;
                                                            }


                                                            ?>
                                                        </span>
                                                    </span>
                                        </div>
                                        <?php }?>
                                    <?php } ?>
                                    <div>
                                        <?php if ($quiz->category == 1) { ?>
                                            <i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
                                        <?php } elseif ($quiz->category == 2) { ?>
                                            <i class="fa fa-coins"></i>&nbsp; <?php echo $quiz->quiz_cost ?>

                                        <?php } elseif ($quiz->category == 3) { ?>
                                            <i class='fas fa-coins'></i>&nbsp; <?php echo $quiz->quiz_cost ?>
                                        <?php } elseif ($quiz->category == 4) { ?>
                                            <!-- <a href="<?php echo URLROOT ?>/student/contest_prize_detail/<?php echo $quiz->prize_calc_data_id; ?>"> -->
                                            <button type="button" class="btn btn-sm rounded-pill btn-outline-info mb-2"><i class="fa fa-inr"></i>&nbsp;
                                                <?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
                                                if (isset($contest_prize->prize_pool_amount)) {
                                                    echo $contest_prize->entry_fee;
                                                } ?>

                                            </button>
                                            <!-- </a> -->


                                        <?php    }
                                        ?>
                                        <span style="font-size:12px;float:right;"><i class="fa fa-clock"></i>&nbsp;<?php echo intval(($quiz->duration_min)) * 60 + intval($quiz->duration_sec); ?>&nbsp;sec</span>
                                        <?php
                                        $quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
                                        $quiz_end_datetime = date('Y-m-d H:i:s', strtotime($quiz->end_date . ' ' . $quiz->end_time));
                                        $present_datetime = date('Y-m-d H:i:s');

                                        if (($present_datetime >= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>

                                            <?php if ($quiz->category != 4) { ?>
                                                <a href="<?php echo URLROOT ?>/student/start_play_now_session_quiz/<?php echo $quiz->id; ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Play Now</a>
                                            <?php } else { ?>

                                                <a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Registration Closed</a>
                                            <?php  } ?>
                                        <?php } elseif (($present_datetime <= $quiz_start_datetime) && ($present_datetime <= $quiz_end_datetime)) { ?>
                                            <?php if ($quiz->category != 4) { ?>
                                                <a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Coming Soon</a>
                                            <?php } else { ?>
                                                <?php if ($slot_avialable > 0) { ?>

<style>#timer {
  font-size: 12px;
  text-align: center;
}</style>
                                                    <?php

                                                    $quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));

                                                    $present_datetime = date('Y-m-d H:i:s');
                                                    $ten_minutes_before_start = date('Y-m-d H:i:s', strtotime('-10 minutes', strtotime($quiz_start_datetime)));
                                                    if ($present_datetime < $ten_minutes_before_start) { ?>

                                                        <a href="<?php echo URLROOT; ?>/student/start_play_now_session_quiz/<?php echo $quiz->id; ?>" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Login to Pre-Register</a>
                                                    <?php } else { ?>
                                                        <br>
                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">
                                                Starts In
                                                        <?php
                                                         $quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
                                                         echo '<script>var quizStartTime' . 'a'.$count . ' = new Date("' . $quiz_start_datetime . '");</script>';
                                                         echo '<span id="timer' . 'a'.$count . '"></span>';
                                                         echo '<script>
                                                         function updateTimer' . 'a'.$count . '() {
                                                             var now = new Date();
                                                             var remainingTime = quizStartTime' . 'a'.$count . ' - now;
                                                             if (remainingTime < 0) {
                                                                 // Quiz has already started
                                                                 document.getElementById("timer' . 'a'.$count . '").innerHTML = "Quiz has started";
                                                             } else {
                                                                 // Calculate remaining time
                                                                 var seconds = Math.floor(remainingTime / 1000);
                                                                 var minutes = Math.floor(seconds / 60);
                                                                 var hours = Math.floor(minutes / 60);
                                                                 var days = Math.floor(hours / 24);
                                                     
                                                                 hours %= 24;
                                                                 minutes %= 60;
                                                                 seconds %= 60;
                                                     
                                                                 // Output remaining time to HTML element
                                                                 document.getElementById("timer' . 'a'.$count . '").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                                             }
                                                         }
                                                     
                                                         setInterval(updateTimer' . 'a'.$count . ', 1000);
                                                     </script>';

                                                        ?></a>
                                                   
                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Registration Closed</a>
                                                    <?php } ?>


                                                <?php } else { ?>
                                                    <a href="" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">


                                                        Starts In
                                                        <?php
                                                         $quiz_start_datetime = date('Y-m-d H:i:s', strtotime($quiz->start_date . ' ' . $quiz->start_time));
                                                         echo '<script>var quizStartTime' . 'b'.$count . ' = new Date("' . $quiz_start_datetime . '");</script>';
                                                         echo '<span id="timer' . 'b'.$count . '"></span>';
                                                         echo '<script>
                                                         function updateTimer' . 'b'.$count . '() {
                                                             var now = new Date();
                                                             var remainingTime = quizStartTime' . 'b'.$count . ' - now;
                                                             if (remainingTime < 0) {
                                                                 // Quiz has already started
                                                                 document.getElementById("timer' . 'b'.$count . '").innerHTML = "Quiz has started";
                                                             } else {
                                                                 // Calculate remaining time
                                                                 var seconds = Math.floor(remainingTime / 1000);
                                                                 var minutes = Math.floor(seconds / 60);
                                                                 var hours = Math.floor(minutes / 60);
                                                                 var days = Math.floor(hours / 24);
                                                     
                                                                 hours %= 24;
                                                                 minutes %= 60;
                                                                 seconds %= 60;
                                                     
                                                                 // Output remaining time to HTML element
                                                                 document.getElementById("timer' . 'b'.$count . '").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                                                             }
                                                         }
                                                     
                                                         setInterval(updateTimer' . 'b'.$count . ', 1000);
                                                     </script>';
                                                        ?>



                                                    </a>
                                                    <a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Registration Closed</a>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <?php if ($quiz->category != 4) { ?>
                                                <a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Quiz Closed</a>
                                            <?php } else { ?>
                                                <a href="#" class="btn blue-bgcolor btn-outline btn-circle m-b-10" style="width:100%;">Contest Finished</a>
                                            <?php } ?>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php if ($quiz->category == 4) { ?>
                                        <center>
                                            <a href="" data-toggle="modal" data-target="#prize_pool_modal" data-id="<?php echo $quiz->prize_calc_data_id; ?>" id="prize_pool">
                                                <button type="button" class="btn btn-sm rounded-pill btn-outline-info mb-0" style="color:#000000;background-color:#66fc6f;"><i class="fa fa-hand-pointer"></i>&nbsp; PRIZE POOL: <i class="fa fa-inr"></i>
                                                    <?php $contest_prize = $adminMod->get_contest_prize_calculations($quiz->prize_calc_data_id);
                                                    echo $contest_prize->prize_pool_amount; ?>

                                                </button>
                                            </a>




                                        </center>
                                    <?php } ?>
                                    <p><i class="ti-alarm-clock"></i><a class="" data-toggle="modal" data-target="#terms">
                                            <span style="color:#32c5d2;">View T&C</span>
                                        </a>

                                        <span class="tool" data-tip="Please visit oodlesin.com/student for more quizes." style='float:right;'><i class='fa fa-info-circle'></i></span>
                                    </p>

                                    <hr style='border:1px solid;width:100%;margin:-8px 0 8px 0;'>
                                    <p style="margin:0 0 -15px;font-size:10px;line-height:8px">Remarks: <?php echo $quiz->remarks; ?></p>

                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <!--Portfolio Single End-->

                </div>
            </section>
            <!-- end new search -->
        <?php } ?>


        <!-- Fitler End -->

        <!-- <section class="portfolio-carousel-page" style="padding:0px;">
            <div class="container">
                <div class="row">
                    <div class="thm-owl__carousel owl-theme owl-carousel portfolio-carousel carousel-dot-style" data-owl-options='{
                        "items": 5,                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": 6000,
                        "nav":false,
                    
                        "dots":true,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "300":{
                                "items":2
                            },
                            "600":{
                                "items": 3
                            },
                            "992":{
                                "items": 4
                            },
                            "992":{
                                "items": 5
                            }
                        }
                    }'>
                  
                        <?php foreach ($data['get_all_class'] as $class) { ?>


                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">

                                <div class="comment-form__btn-box" style="padding:10px;">
                                    <a href="<?php echo URLROOT ?>/home/quiz/<?php echo $data['category'] ?>/<?php echo $class->id; ?>"> <button type="button" class="btn btn-outline-primary" style="border:3px solid black;"><?php echo $class->class_name; ?></button></a>
                                </div>
                            </div>

                        <?php } ?>
                       
                    </div>
                </div>
            </div>
        </section> -->
    <?php } ?>
    <!-- Chpater wise carousel end -->


    <!-- class carousal -->
    <?php
    $count1 = 0;
    foreach ($data['get_all_chapter'] as $chapter) {
        $count1++;
    }
    if ($count1 > 0) {
    ?>
        <div class="section-title text-left" style="padding:40px 0 0; margin-bottom: 12px;">
            <div class="section-sub-title-box">
                <p class="section-sub-title">Chapter Wise</p>
                <div class="section-title-shape-1">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                </div>
            </div>
        </div>
        <section class="portfolio-carousel-page" style="padding:0px;">
            <div class="container">
                <div class="row">
                    <div class="thm-owl__carousel owl-theme owl-carousel portfolio-carousel carousel-dot-style" data-owl-options='{
                        "items": 5,                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":true,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "300":{
                                "items":2
                            },
                            "600":{
                                "items": 3
                            },
                            "992":{
                                "items": 4
                            },
                            "992":{
                                "items": 5
                            }
                        }
                    }'>
                        <!--Portfolio Single Start-->
                        <?php foreach ($data['get_all_chapter'] as $chapter) { ?>
                            <?php $array = explode(',', $chapter->chapter);
                            foreach ($array as $value) {
                                $adminMod = new Admins;
                                $get_single_chapter = $adminMod->get_single_chapter($value);

                            ?>
                                <!-- <div class="item">
                                <div class="portfolio__single">
                                    <div class="portfolio__img">
                                        <img src="<?php echo URLROOT ?>/uploads/<?php echo $chapter->image ?>" style="width:200px;height:200px;" alt="">
                                       
                                        <div class="portfolio__content">
                                            <p class="portfolio__sub-title"><?php echo $get_single_chapter->name; ?></p>
                                            <h4 class="portfolio__title"><a href="<?php echo URLROOT ?>/student/register"><?php echo ucwords($chapter->name); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                                <div class="item">
                                    <div class="portfolio_single">
                                        <div class="portfolio__img">
                                            <img src="<?php echo URLROOT ?>/uploads/<?php echo $chapter->image ?>" style="width:200px;height:200px;" alt="">
                                        </div>
                                        <div class="service-one__content" style="padding-bottom:18px;">

                                            <h3 class="service-one__title"><a href="<?php echo URLROOT ?>/student/register"><?php echo ucwords($chapter->name); ?></a></h3>
                                            <p class="service-one__text" style="font-size:13px;"><?php echo $get_single_chapter->name; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <!--Portfolio Single End-->


                        <!--Portfolio Single Start-->
                        <!-- kept for future dummy version, client can tell for positioning -->

                        <!--Portfolio Single End-->
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- Chpater wise carousel end -->
    <!--Portfolio Carousel Page Start-->


    <?php
    $category = $data['category'];
    $count2 = 0;
    foreach ($data['get_all_subject'] as $subject) {
        $count2++;
    }
    if ($count2 > 0) {
    ?>
        <div class="section-title text-left" style="padding:20px 0 0; margin-bottom: 12px;">
            <div class="section-sub-title-box">
                <p class="section-sub-title">Subject Wise</p>
                <div class="section-title-shape-1">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                </div>
            </div>
        </div>
        <section class="portfolio-carousel-page" style="padding:0px;">
            <div class="container">
                <div class="row">
                    <div class="thm-owl__carousel owl-theme owl-carousel portfolio-carousel carousel-dot-style" data-owl-options='{
                        "items": 4,                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":true,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":true,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "768":{
                                "items":2
                            },
                            "992":{
                                "items": 3
                            },
                            "992":{
                                "items": 4
                            }
                        }
                    }'>
                        <!--Portfolio Single Start-->
                        <?php
                        foreach ($data['get_all_subject'] as $subject) {

                        ?>
                            <!-- <div class="item">
                                <div class="portfolio__single">
                                    <div class="portfolio__img" style="width:200px;height:200px;">
                                        <img src="<?php echo URLROOT ?>/uploads/<?php echo $subject->image ?>" style="width:200px;height:200px;" alt="">
                                        <div class="portfolio__plus">
                                            <a href="<?php echo URLROOT ?>/uploads/<?php echo $subject->image ?>" class="img-popup"><span class="icon-plus"></span></a>
                                        </div>
                                        <div class="portfolio__content">
                                            <?php
                                            $adminMod = new admins;
                                            $get_subject_name = $adminMod->get_single_subject($subject->subject_name) ?>
                                            <p class="portfolio__sub-title"><?php echo $get_subject_name->subject_name ?></p>
                                            <h4 class="portfolio__title"><a href="quiz.html"><?php echo ucwords($subject->name); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div> -->




                            <div class="item">
                                <div class="portfolio_single">
                                    <div class="portfolio__img">
                                        <img src="<?php echo URLROOT ?>/uploads/<?php echo $subject->image ?>" style="width:100%;height:200px;" alt="">
                                    </div>
                                    <div class="service-one__content" style="padding-bottom:18px;">
                                        <?php
                                        $adminMod = new admins;
                                        $get_subject_name = $adminMod->get_single_subject($subject->subject_name) ?>
                                        <h3 class="service-one__title"><a href="<?php echo URLROOT ?>/student/register"><?php echo $get_subject_name->subject_name ?></a></h3>
                                        <p class="service-one__text" style="font-size:13px;"><?php echo ucwords($subject->name); ?></p>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
                        <!--Portfolio Single End-->
                        <!--Portfolio Single Start-->

                        <!--Portfolio Single End-->

                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <style>
        .owl-carousel .owl-item img {
            height: 231px;
        }
    </style>
    <!-- Chpater wise carousel end -->
    <!--Portfolio Carousel Page Start-->
    <div class="section-title text-left" style="padding:20px 0 0; margin-bottom: 25px;">
        <div class="section-sub-title-box">
            <p class="section-sub-title">Select Category Wise</p>
            <div class="section-title-shape-1">
                <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
            </div>
            <div class="section-title-shape-2">
                <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
            </div>
        </div>
    </div>
    <section class="portfolio-carousel-page" style="padding:0px;">
        <div class="container">
            <div class="row">
                <div class="thm-owl__carousel owl-theme owl-carousel portfolio-carousel carousel-dot-style" data-owl-options='{
                        "items": 3,                        "margin": 30,
                        "smartSpeed": 700,
                        "loop":false,
                        "autoplay": 6000,
                        "nav":false,
                        "dots":false,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive":{
                            "0":{
                                "items":1
                            },
                            "768":{
                                "items":2
                            },
                            "992":{
                                "items": 3
                            }
                        }
                    }'>

                    <!--Portfolio Single Start-->
                    <?php if ($category != 1) { ?>
                        <div class="item">
                            <div class="portfolio__single">
                                <div class="portfolio__img">
                                    <img src="<?php echo URLROOT ?>/assets_home/images/resources/practice.png" alt="">
                                    <div class="portfolio__plus">
                                        <a href="<?php echo URLROOT ?>/assets_home/images/resources/practice.png" class="img-popup"><span class="icon-plus"></span></a>
                                    </div>
                                    <div class="portfolio__content">
                                        <p class="portfolio__sub-title"></p>
                                        <h4 class="portfolio__title"><a href="<?php echo URLROOT ?>/home/quiz/1/0">PRACTICE QUIZ</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <?php if ($category != 2) { ?>
                        <!-- <div class="item">
                            <div class="portfolio__single">
                                <div class="portfolio__img">
                                    <img src="<?php echo URLROOT ?>/assets_home/images/resources/merit.png" alt="">
                                    <div class="portfolio__plus">
                                        <a href="<?php echo URLROOT ?>/assets_home/images/resources/merit.png" class="img-popup"><span class="icon-plus"></span></a>
                                    </div>
                                    <div class="portfolio__content">
                                        <p class="portfolio__sub-title"></p>
                                        <h4 class="portfolio__title"><a href="<?php echo URLROOT ?>/home/quiz/2/0">MERIT QUIZ</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php } ?>

                    <!--Portfolio Single End-->
                    <!--Portfolio Single Start-->
                    <?php if ($category != 3) { ?>
                        <!-- <div class="item">
                            <div class="portfolio__single">
                                <div class="portfolio__img">
                                    <img src="<?php echo URLROOT ?>/assets_home/images/resources/rapid.png" alt="">
                                    <div class="portfolio__plus">
                                        <a href="<?php echo URLROOT ?>/assets_home/images/resources/rapid.png" class="img-popup"><span class="icon-plus"></span></a>
                                    </div>
                                    <div class="portfolio__content">
                                        <p class="portfolio__sub-title">QUIZ</p>
                                        <h4 class="portfolio__title"><a href="<?php echo URLROOT ?>/home/quiz/3/0">RAPID FIRE QUIZ</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php } ?>

                    <?php if ($category != 4) { ?>
                        <div class="item">
                            <div class="portfolio__single">
                                <div class="portfolio__img">
                                    <img src="<?php echo URLROOT ?>/assets_home/images/resources/contest.png" alt="">
                                    <div class="portfolio__plus">
                                        <a href="<?php echo URLROOT ?>/assets_home/images/resources/contest.png" class="img-popup"><span class="icon-plus"></span></a>
                                    </div>
                                    <div class="portfolio__content">
                                        <p class="portfolio__sub-title">QUIZ</p>
                                        <h4 class="portfolio__title"><a href="<?php echo URLROOT ?>/home/quiz/4/0">CONTEST FIRE QUIZ</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!--Portfolio Single End-->

                </div>
            </div>
        </div>
    </section>
    <!-- Chpater wise carousel end -->
</div>

<!--Portfolio Carousel Page End-->


<!-- Modal -->
<div class="modal fade " id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View T&C</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <!-- <h2 class="form-title">Login</h2><br> -->
                    <div class="">
                        <ol style="font-size:12px;">
                            <li>
                                PARTICIPANTS FROM ALL OVER THE WORLD AND
                                OF ALL NATIONALITIES ARE ELIGIBLE TO ENTER THE QUIZ.
                            </li>
                            <li>
                                THE QUIZ WILL BE AVAILABLE FOR ALL
                                CONTESTANTS FOR THE PERIOD MENTIONED ACCORDINGLY IN THE QUIZ, IN WHICH THEY
                                HAVE TO SCORE/ACHEIVE MINIMUM/PASS CRITERIA
                            </li>
                            <li>
                                THESE QUESTIONS WILL BE BASED ON NCERT,
                                CBSE, STATE AND BOARDS CURRICULUM. THE QUIZ WILL START AS SOON AS THE
                                PARTICIPANT CLICKS THE START QUIZ BUTTON.
                            </li>
                            <li>
                                YOU WILL BE REQUIRED TO PROVIDE YOUR
                                NAME, CLASS EMAIL ADDRESS, TELEPHONE NUMBER AND POSTAL ADDRESS. BY SUBMITTING
                                YOUR CONTACT DETAILS, YOU WILL GIVE CONSENT TO THESE DETAILS BEING USED FOR THE
                                PURPOSE OF THE QUIZ. YOU NEED TO COMPLETE THE PROFILE TO GET MATCHED QUIZ /
                                POCKET SCHOLARSHIPS.
                            </li>
                            <li>
                                DISCOVERY/DETECTION/NOTICING OF USE OF
                                ANY UNFAIR/SPURIOUS MEANS/ MALPRACTICES, INCLUDING BUT NOT LIMITED TO
                                IMPERSONATION, DOUBLE PARTICIPATION ETC. DURING THE PARTICIPATION IN THE QUIZ,
                                WILL RESULT IN THE PARTICIPATION BEING DECLARED NULL AND VOID AND HENCE,
                                REJECTED. THE ORGANIZERS OF THE QUIZ
                                COMPETITION OR ANY AGENCY ACTING ON THEIR BEHALF RESERVES THE RIGHT IN THIS
                                REGARD.
                            </li>
                            <li>
                                ONCE SUBMITTED AN ENTRY CANNOT BE
                                WITHDRAWN.
                            </li>
                            <li>
                                ENTRY
                                FEES IN CASE OF A PAID QUIZ, ONCE PAID IS NON-REFUNDABLE.
                            </li>
                            <li>
                                ORGANIZERS WILL NOT ACCEPT ANY
                                RESPONSIBILITY FOR ENTRIES THAT ARE LOST, ARE LATE OR INCOMPLETE OR HAVE NOT
                                BEEN TRANSMITTED DUE TO COMPUTER ERROR OR ANY OTHER ERROR BEYOND THE
                                ORGANIZER’S REASONABLE CONTROL. PLEASE NOTE PROOF OF SUBMISSION OF THE ENTRY IS
                                NOT PROOF OF RECEIPT OF THE SAME.
                            </li>
                            <li>
                                IN THE EVENT OF UNFORESEEN
                                CIRCUMSTANCES, ORGANIZERS RESERVE THE RIGHT TO AMEND OR WITHDRAW THE QUIZ AT
                                ANY TIME. FOR THE AVOIDANCE OF DOUBT THIS INCLUDES THE RIGHT TO AMEND THESE
                                TERMS AND CONDITIONS.
                            </li>
                            <li>

                                THE
                                PARTICIPANT SHALL ABIDE BY ALL THE RULES AND REGULATIONS OF PARTICIPATING IN
                                THE QUIZ FROM TIME TO TIME.
                            </li>
                            <li>
                                ORGANISERS
                                RESERVE ALL RIGHTS TO DISQUALIFY OR REFUSE PARTICIPATION TO ANY PARTICIPANT IF
                                THEY DEEM PARTICIPATION OR ASSOCIATION OF ANY PARTICIPANT WHICH IS DETRIMENTAL
                                TO THE QUIZ OR THE ORGANIZERS OR PARTNERS OF THE QUIZ. THE REGISTRATIONS SHALL
                                BE VOID IF THE INFORMATION RECEIVED BY THE ORGANIZERS IS ILLEGIBLE, INCOMPLETE,
                                DAMAGED, FALSE OR ERRONEOUS.
                            </li>
                            <li>
                                ORGANISER’S
                                DECISION ON THE QUIZ SHALL BE FINAL AND BINDING AND NO CORRESPONDENCE WILL BE
                                ENTERED INTO REGARDING THE SAME.
                            </li>
                            <li>
                                THESE
                                TERMS AND CONDITIONS SHALL BE GOVERNED BY THE LAWS OF THE INDIAN JUDICIARY.
                            </li>
                            <li>
                                BY
                                ENTERING THE QUIZ, THE PARTICIPANT ACCEPTS AND AGREES TO BE BOUND BY THESE
                                TERMS AND CONDITIONS, MENTIONED ABOVE.
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">

                    </div>
                </div>
                <input type="text" readonly class="form-control" name="quiz_id" id="add_quiz_id" hidden>
                <div class="form-group form-button" style="text-align: center;">

                </div>


                <div class="social-login" style="text-align: center;">
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>



<!-- filter end -->


<!-- Modal -->
<div class="modal fade " id="prize_pool_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Prize Pool</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">


                <div id="prize_pool_id"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . "/views/inc_home/footer.php"; ?>
<script>
    function update_student_modal(bid) {
        $('#update_quiz_id').val(bid);
    }

    function add_student_modal(bid) {
        $('#add_quiz_id').val(bid);
    }


    // $(document).ready(function() {
    //     $('#class').click(function() {
    //         var classes = $('#classes').val();
    //         var category = <?php echo $data['category']; ?>

    //         // alert(category);
    //         $.ajax({
    //             url: '<?php echo URLROOT; ?>/home/get_subject_by_class',
    //             type: 'POST',
    //             data: {
    //                 classes,
    //                 category
    //             },
    //             success: function(res) {
    //                 document.getElementById("subject").innerHTML = res;
    //                 document.getElementById("subject").style.display = 'block';
    //             }
    //         });
    //     });
    // });
</script>

<script>
    $(document).ready(function() {
        $(document).on('change', '#class', function() {
            var classes = $(this).val();
            var category = <?php echo $data['category']; ?>

            // alert(classes)
            if (classes.length != 0) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT ?>/home/get_subject_by_class',
                    data: {
                        classes,
                        category
                    },
                    success: function(res) {
                        // $('#subject').html(data);
                        document.getElementById("subject").innerHTML = res;
                    },

                    error: function(jqXHR, textStatus, errorThrown) {
                        // error
                    }
                });
            } else {
                $('#subject').html('<option value="">-Select-</option>');
            }
        });
    });



    $(document).on('click', '.btn', function() {
        var quizId = $(this).data('quiz-id');

        $.ajax({
            url: 'quiz_modal.php',
            type: 'POST',
            data: {
                quiz_id: quizId
            },
            success: function(response) {
                $('#quiz-modal .modal-body').html(response);
            }
        });
    });



    $(document).ready(function() {

        $(document).on('click', '#prize_pool', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // it will get id of clicked row
            //   alert(uid);
            $('#prize_pool_id').html(''); // leave it blank before ajax call
            $('#modal-loader').show();
            // load ajax loader

            $.ajax({
                    url: '<?php echo URLROOT; ?>/home/get_prize_pool',
                    type: 'POST',
                    data: 'id=' + uid,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#prize_pool_id').html('');
                    $('#prize_pool_id').html(data);
                    $('#modal-loader').hide();
                })
                .fail(function() {
                    $('#prize_pool_id').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });

        });

    });
</script>