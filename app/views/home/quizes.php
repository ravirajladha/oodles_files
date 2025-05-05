<?php require APPROOT . "/views/inc_home/header.php"; ?>
<link href="<?php echo URLROOT; ?>/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
    .complete {
        display: none;
    }

    .more {
        background: lightblue;
        color: navy;
        font-size: 13px;
        padding: 3px;
        cursor: pointer;
    }

    .modal {
        width: 100%;

    }
</style>
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
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/main-slider-1-2.jpeg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title" style="font-size:62px;">PLAY <br>QUIZ & <span>EARN</span><br> POCKET SCHOLARSHIP</span></h2>
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
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/main-slider-1-1.webp);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title">Scholarship <br> for the<br> future<span> studies.</span></h2>
                                <p class="main-slider__text">The quiz is an essential tool to help students to<br>
                                    prepare and succeed in their academic life. Curriculum based<br> quiz where
                                    students have to answer questions that are related to <br>their courses and college
                                    or university marks. It helps them get <br>scholarships, while they also get to
                                    meet new people with similar interests.</p>
                                <!-- <div class="main-slider__btn-box">
                                    <a href="#" class="thm-btn main-slider__btn">Let’s Get Started</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/main-slider-1-3.webp);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title">

                                    Scholarship

                                    <br> for the better <br> school <span>life.</span>
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
<div class="container" style="padding:20px;">
    <div class="services-two__top">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="services-two__top-left">
                    <div class="section-title text-left">
                        <div class="section-sub-title-box">
                            <p class="section-sub-title" style="color:#615F5E;">About Quizes</p>
                            <div class="section-title-shape-1">
                                <img src="assets_home/images/shapes/section-title-shape-5.png" alt="">
                            </div>
                            <div class="section-title-shape-2">
                                <img src="assets_home/images/shapes/section-title-shape-6.png" alt="">
                            </div>
                        </div>
                        <p class="section-title__title" style="color:#fc9d03;font-size:42px;">Curriculum Based Quizes to Lea<i class='fa fa-inr'></i>n Pocket Scholarship </p>
                        <span style="font-size:20px;color:blue;">100% Learning Platform</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="services-two__top-right">
                    <p class="services-two__top-text" style="font-size:18px;">We create personalized, on-demand quizzes that help students
                        master the subject and get good grades. A
                        player has to score at least an 80% to get the coins and earn scholarship, at the end of
                        each quiz, collected coins will be redeemable into
                        real money.</p>
                    <p class="services-two__top-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Paragraph end -->

<!-- Filter start -->
<form method="post" action="<?php echo URLROOT; ?>/home/quiz">
    <div class="container">
        <div class="row">
            <style>
                .form-control {
                    height: 49px;
                    /* background: #3587EA; */

                    color: #3587EA;
                    font-size: 18px;
                    width: 249px;
                    margin-left: -26px;

                }
            </style>

            <style>


            </style>
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <!-- commneted by ashutosh -->
                <!-- <label for="list2" class="mdl-textfield__label"></label>
                <br>
                <select name="class" class="form-control" required>
                    <option value="">SELECT CLASS&nbsp;<i class='fa fa-inr'></i></option>
                    <?php foreach ($data['get_all_class'] as $class_detail) { ?>
                        <option value="<?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
                    <?php } ?>
                </select> -->
            </div>
            <div class="col-md-5"></div>
            <!-- <div class="col-md-3">
                <label for="list2" class="mdl-textfield__label"></label>
                <select name="subject" class="form-control" required>
                    <option value=""> Select Subject</option>
                    <option value="0"> All</option>
                    <?php foreach ($data['get_all_subject'] as $subject_detail) { ?>
                        <option value="<?php echo $subject_detail->id; ?>"><?php echo $subject_detail->subject_name; ?></option>
                    <?php } ?>
                </select>
            </div> -->
            <!-- <div class="col-md-3">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i>&nbsp;Search</button>

            </div> -->

        </div>
    </div>
    <!-- Filter End -->
    <!-- Quiz category starts -->
    <!--pricing Start-->
    <style>
        .pricing__points li {
            margin: -15px 0px 0 -21px;
        }
    </style>
    <section class="pricing" style="padding-top:50px;">
        <div class="container">

            <div class="pricing__tab">
                <div class="pricing__tab-box tabs-box">

                    <div class="tabs-content">
                        <!--tab-->
                        <div class="tab active-tab" id="monthly">
                            <div class="pricing__main-content-box">
                                <div class="row">
                                    <!--Pricing Single Start-->
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="pricing__single">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-top">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/contest.png" style="width:100%;height:300px;" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-bottom">
                                                        <h3 class="pricing__title">CONTEST</h3>
                                                        <ul class="list-unstyled pricing__points">
                                                            <li>
                                                                <div class="text" style="text-align:justify;">
                                                                    <p>!!! Contest!!! Take the Challenge and participate to win cash prizes. You have a limited amount of time to answer each question. The faster you respond, the greater your score. The higher the score, the higher the ranking!!! Top the Ranking Leaderboard to Win Big!!! <span class="complete"> Are you prepared for it? Play Now and Start Winning.</span><span class="more">Read more...</span></p>
                                                                </div>
                                                            </li>
                                                        </ul>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-xl-6 col-lg-6" class="pricing__btn-box">
                                                    <!-- <button class="thm-btn-quiz pricing__btn__quiz" value="contest" type="submit" name="contest">Search</button> -->
                                                    <a href="<?php echo URLROOT ?>/home/quiz/4/0" class="thm-btn-quiz pricing__btn__quiz" value="contest" type="submit" name="contest">Search</a>
                                                </div>
                                                <div class="col-xl-6 col-lg-6"> <span style="float:right;"><a href="" data-toggle="modal" data-target="#quiz">View T&C <span> * </span></a> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-xl-6 col-lg-6">
                                        <div class="pricing__single">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-top">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/merit.png" style="width:100%;height:300px;" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-bottom">
                                                        <h3 class="pricing__title">MERIT</h3>
                                                        <ul class="list-unstyled pricing__points">
                                                            <li>
                                                                <div class="text" style="text-align:justify;">
                                                                    <p>Merit Quiz is a quiz game that offers scholarships to the
                                                                        players. It consists on a series of questions about different Subjects and topics,
                                                                        after answering all the questions correctly, players can earn pocket
                                                                        scholarship. A player has to score an 80% to Earn the scholarship.</p>
                                                                </div>
                                                            </li>
                                                        </ul>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-xl-6 col-lg-6" class="pricing__btn-box">
                                                    <button class="thm-btn-quiz pricing__btn__quiz" value="merit" type="submit" name="merit">Search</button>
                                                </div>
                                                <div class="col-xl-6 col-lg-6"> <span style="float:right;"><a href="" data-toggle="modal" data-target="#quiz">View T&C <span> * </span></a> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-xl-6 col-lg-6">
                                        <div class="pricing__single">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-top">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/speed.png" style="width:100%;height:300px;" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-bottom">
                                                        <h3 class="pricing__title">CHECK YOUR SPEED</h3>
                                                        <ul class="list-unstyled pricing__points">
                                                            <li>
                                                                <div class="text" style="text-align:justify;">
                                                                    <p>The purpose of this Knowledge exam is to determine whether you understand a subject. You have a limited amount of time to answer each question. The quicker you respond, the greater your score. When you're finished, attempt to beat your opponent's best score and climb to the top of the ranking leader board to earn more coins!!! </p>
                                                                </div>
                                                            </li>
                                                        </ul>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-xl-6 col-lg-6" class="pricing__btn-box">
                                                    <button class="thm-btn-quiz pricing__btn__quiz" value="speed" type="submit" name="speed">Search</button>
                                                </div>
                                                <div class="col-xl-6 col-lg-6"> <span style="float:right;"><a href="" data-toggle="modal" data-target="#quiz">View T&C <span> * </span></a> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="pricing__single">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-top">
                                                        <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/merit_test.png" style="width:100%;height:300px;" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="pricing__single-bottom">
                                                        <h3 class="pricing__title">PRACTICE</h3>
                                                        <ul class="list-unstyled pricing__points">
                                                            <li>
                                                                <div class="text" style="text-align:justify;">
                                                                    <p>Practice Quiz is a quiz that
                                                                        helps students practice the topics they are studying in school while playing a
                                                                        game-like quiz. It is designed to help them master their lessons with the help
                                                                        of Notes and MIND Maps and earn coins that they can later re-convert in real
                                                                        money.<span class="complete"> It's also a great way for parents to monitor the progress of their child.</span><span class="more">Read more...</span></p>
                                                                    <p>
                                                                        <!-- <span class="teaser">We are dedicated to a continuing tradition of excellence in an ever-changing world. we provide relevant, high-quality education information and prepare our diverse student body for future endeavors, In partnership with families and communities, our goal is to create relevant learning </span><span class="complete">opportunities for students – both inside and outside the classroom- that help them develop the knowledge, critical thinking skills, and character necessary to succeed in a technologically advanced world.</span><span class="more">more...</span> -->
                                                                    </p>

                                                                </div>
                                                            </li>
                                                        </ul>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-xl-6 col-lg-6" class="pricing__btn-box">
                                                    <!-- <button class="thm-btn-quiz pricing__btn__quiz" value="practice" type="submit" name="practice">Search</button> -->
                                                    <a href="<?php echo URLROOT ?>/home/quiz/1/0" class="thm-btn-quiz pricing__btn__quiz" value="practice" type="submit" name="practice">Search</a>
                                                </div>
                                                <div class="col-xl-6 col-lg-6"> <span style="float:right;"><a href="" data-toggle="modal" data-target="#quiz">View T&C <span> * </span></a> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Pricing Single End-->
                                    <!--Pricing Single Start-->
                                    <!-- <div class="col-xl-12 col-lg-12">
                                        <div class="pricing__single">
                                            <div class="pricing-shape-1">
                                                <img src="<?php echo URLROOT ?>/assets_home/images/shapes/pricing-shape-1.png" alt="">
                                            </div>
                                            <div class="pricing__single-top">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/quiz.png" style="height:100px;width:100%;float:left;" alt="">
                                            </div>
                                            <div class="pricing__single-bottom">
                                                <h3 class="pricing__title">Check Your Speed</h3>
                                                <ul class="list-unstyled pricing__points">
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem, ipsum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem, ipsum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem, ipsum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem, ipsum.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                        <div class="text">
                                                            <p>Lorem, ipsum.</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="pricing__btn-box">
                                                    <button class="thm-btn pricing__btn" type="submit" name="speed">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--Pricing Single End-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--pricing End-->
<!-- Leadership board -->


<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card  mb-3 text-center">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseSECOND">
                        <h5 class="card-title text-dark">All India Ranking</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Top 10</h6>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-hover group table-striped">
                        <table class="table table-hover group table-striped">

                            <tbody>
                                <tr style="background-color:orange;">
                                    <td>Name</td>
                                    <td>School</td>
                                    <td>State</td>
                                    <td>Rank</td>
                                </tr>

                                <tr>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>

                                <tr>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>

                                <tr>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>

                                <tr>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="card-footer text-muted">


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Leadership board end -->
    <!-- Quiz category ends -->
</form>


<!-- Contest card t&c-->
<div class="modal fade" id="quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Terms & Conditions</h5>
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
                <!-- <button class="btn btn-round btn-primary" type="submit">Submit</button> -->
            </div>

        </div>
    </div>
</div>
<!-- Add student modal start -->
<div class="modal fade" id="add_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Information</h5>
            </div>


            <form method="post" action="<?php echo URLROOT; ?>/home/add_student/" autocomplete="off" class="register-form">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <h2 class="form-title">Login</h2><br> -->
                        <div class="">
                            <select class="form-control" name="school">
                                <option readonly>-Select School-</option>
                                <?php foreach ($data['get_school_detail'] as $school_detail) { ?>
                                    <option value="<?php echo $school_detail->id; ?>"><?php echo $school_detail->school_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <select class="form-control" name="class">
                                <option readonly>-Select Class-</option>
                                <?php foreach ($data['get_all_class'] as $class_detail) { ?>
                                    <option value=" <?php echo $class_detail->id; ?>"><?php echo $class_detail->class_name; ?></option>
                                <?php } ?>
                            </select>
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
                    <button class="btn btn-round btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add student modal end -->
<!-- Update modal start -->
<div class="modal fade" id="update_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Information</h5>
                <!-- <button class="btn btn-round btn-primary" ><a href="<?php echo URLROOT ?>/student/register"> Signup</a></button> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> -->
                <!-- <button class="btn btn-round btn-primary" type="submit">Login</button> -->
            </div>


            <form method="post" action="<?php echo URLROOT; ?>/home/update_student" autocomplete="off" class="register-form">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <h2 class="form-title">Login</h2><br> -->
                        <div class="">
                            <select class="form-control" name="school">
                                <option readonly>-Select School-</option>
                                <?php foreach ($data['get_school_detail'] as $school_detail) { ?>
                                    <option value="<?php echo $school_detail->id; ?>" <?php if ($get_student_detail->school == $school_detail->id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $school_detail->school_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="">
                            <select class="form-control" name="class">
                                <option readonly>-Select Class-</option>
                                <?php foreach ($data['get_all_class'] as $class_detail) { ?>
                                    <option value="<?php echo $class_detail->id; ?>" <?php if ($get_student_detail->course == $class_detail->id) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $class_detail->class_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="text" readonly class="form-control" name="quiz_id" id="update_quiz_id" hidden>
                    <div class="form-group form-button" style="text-align: center;">

                    </div>


                    <div class="social-login" style="text-align: center;">
                        <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-round btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
    function update_student_modal(bid) {
        $('#update_quiz_id').val(bid);
    }

    function add_student_modal(bid) {
        $('#add_quiz_id').val(bid);
    }
    $.fn.clicktoggle = function(a, b) {
        return this.each(function() {
            var clicked = false;
            $(this).click(function() {
                if (clicked) {
                    clicked = false;
                    return b.apply(this, arguments);
                }
                clicked = true;
                return a.apply(this, arguments);
            });
        });
    };
    $(".more").clicktoggle(function() {
        $(this).text("less..").siblings(".complete").show();
    }, function() {
        $(this).text("more..").siblings(".complete").hide();
    });
</script>
<?php require APPROOT . "/views/inc_home/footer.php"; ?>