<?php require APPROOT . "/views/inc_home/header.php"; ?>

<style>
	.input_oodles {
    height: 60px;
    width: 100%;
    border: none;
    background-color: #ffffff;
    padding-left: 30px;
    padding-right: 30px;
    outline: none;
    font-size: 15px;
    color: var(--insur-gray);
    display: block;
    border-radius: var(--insur-bdr-radius);
    font-weight: 500;
    letter-spacing: var(--insur-letter-spacing);
	margin-bottom:5px;
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
                <div class="image-layer" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/main-slider-1-2.jpeg);"></div>
                <!-- /.image-layer -->

                <div class="main-slider-shape-1 float-bob-x">
                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/main-slider-shape-1.png" alt="">
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider__content">
                                <h2 class="main-slider__title">Scholarship <br> for the better <br> school <span>life.</span></h2>
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

<br> for the better <br> school <span>life.</span></h2>
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

<!--Main Slider End-->
<section class="feature-three" style="z-index:200">
    <div class="feature-three-shape float-bob-x">
        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/feature-three-shape.png" alt="">
    </div>
    <div class="container">
        <div class="row">
        
            <!-- <div class="col-xl-6 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">
                <a href="<?php echo URLROOT; ?>/home/scholarships">
                <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/scholarship_new.jpg" alt="" style="width:100%; height:150px;"></div>
                <h3 class="feature text-center"><a>Explore Scholarship </a></h3>
                        </div>
                      
                </a>
            </div>

            <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/scholarship.jpg" alt=""></div>
                <h3 class="feature text-center"><a>Explore Schools </a></h3>
            </div> -->
                      

            <!-- <div class="col-xl-6 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">
                <a href="<?php echo URLROOT; ?>/home/quizes">
                <div class="feature-one__single">
                    <div class="feature-one__single-inner">
                        <div class="feature-one__icon">

                        </div>
                        <h3 class="feature-one__title">LEA<i class='fa fa-inr'></i>N <br>Quiz</h3>

                    </div>
                </div>
                
                </a>
            </div>

            <div class="col-xl-2 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">

                <a href="<?php echo URLROOT; ?>/home/all_schools">

                <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/school_new.jpg" alt="" style="width:100%; height: auto;"></div>
                <h3 class="feature text-center">Explore Schools</h3>
                        </div>
                </a>
            </div>

            <div class="col-xl-2 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">
                <a href="<?php echo URLROOT; ?>/home/all_colleges">

                <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/college_new.jpg" alt="" style="width:100%; height: auto;"></div>
                <h3 class="feature text-center">Explore Colleges</h3>
                        </div>
                </a>
            </div>

            <div class="col-xl-2 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">
                <a href="<?php echo URLROOT; ?>/home/donate">
              <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/partner_new.jpg" alt="" style="width:100%; height: auto;"></div>
                <h3 class="feature text-center">Partner & Donate</h3>
                        </div>
                </a>
            </div>

            <div class="col-xl-2 col-lg-2 wow fadeInLeft" data-wow-delay="100ms">
                 <a href="<?php echo URLROOT; ?>/home/tests"> 
                <div class="feature-one__single">
                <div> <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/strength_new.jpeg" alt="" style="width:100%; height: auto;"></div>
                <h3 class="feature text-center">Explore Strengths</h3>
                        </div>
                </a>
            </div>  -->


           
        </div>
    </div>
</section>
<!--Feature One Start-->

<!--Feature One End-->

<!--About One Start-->
  <!--Insurance Page Two Start-->
  <!-- <section class="insurance-page-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-6">
            </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/scholarship_new.jpg" alt="" style="height:80px;width:80px; clip-path: circle();">
                                
                                </div>
                            </div>
                      
                            <h3 class="services-two__title">
                            <a href="<?php echo URLROOT; ?>/home/scholarships">
                                Explore Scholarship </a> -->
                                <!-- <?php if(!isset($_SESSION['rexkod_oodles_student_id']) ){ ?>
                                    <a href=""  data-toggle="modal" data-target="#exampleModalCenter">
                                    Explore Scholarship </a>
                                    <?php }else{ ?>
                                        <a href="<?php echo URLROOT; ?>/home/scholarships">
                                Explore Scholarship </a>
                                  <?php   } ?> -->
                           <!-- </h3>
                            <p class="services-two__text"></p>
                        </div> -->
                    </div>
          
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <!-- <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/quiz_new.jpg" alt="" style="height:80px;width:80px; clip-path: circle();">
                                </div>
                            </div>
                            <h3 class="services-two__title">
                            <a href="<?php echo URLROOT; ?>/home/quizes">LEA<i class='fa fa-inr'></i>N Quiz </a> -->
                            <!-- <?php if(!isset($_SESSION['rexkod_oodles_student_id']) ){ ?>
                                    <a href=""  data-toggle="modal" data-target="#exampleModalCenter">
                                    LEA<i class='fa fa-inr'></i>N Quiz </a>
                                    <?php }else{ ?>
                                        <a href="<?php echo URLROOT; ?>/home/quizes">LEA<i class='fa fa-inr'></i>N Quiz </a>
                                  <?php   } ?> -->
                                  
                            <!-- <p class="services-two__text"></p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6">
            </div>
             
                </div>
            </div>
        </section> -->
        <!--Insurance Page Two End-->

        <!-- new card -->

        <style>
        .services-two__single {
        background-color: #fff;
        border: 0 solid #ccc;
        border-radius:0px;
        
        }

        .padding-0{
    padding-right:0;
    padding-left:0;
}
        </style>

        <section class="services" style="padding:20px;">
        
            <div class="services-two-shape-1"
                style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/shapes/services-two-shape-1.png);"></div>
            <div class="container">
               
                <div class="services-two__bottom">
                    <div class="row">
                        <!--Services Two Single Start-->

                        <div class="col-xl-4 col-lg-3 col-md-6 wow fadeInUp padding-0" data-wow-delay="100ms">
                        <!-- <a href="<?php echo URLROOT ?>/home/scholarships"> -->
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <span class="icon-drive"></span>
                                    </div>
                                </div>
                                <h3 class="services-two__title" >SCHOLARSHIP</h3>
                                <p class="services-two__text" >Coming Soon...<br><br></p>
                            </div>
                            <!-- </a> -->
                        </div>

                        <div class="col-xl-4 col-lg-3 col-md-6 wow fadeInUp padding-0" data-wow-delay="100ms">
                        <a href="<?php echo URLROOT; ?>/home/quizes">
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <!-- <span class="icon-drive"></span> -->
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/quiz.png" alt="" style="height:80px;width:80px; clip-path: circle();">
                                    </div>
                                </div>
                                <h3 class="services-two__title">QUIZ</h3>
                                <p class="services-two__text">Curriculum Based Quizzes to Learn & Earn pocket scholarship. </p>
                            </div>
                            </a>
                        </div>
                        <!--Services Two Single End-->
                        <!--Services Two Single Start-->
                        <div class="col-xl-4 col-lg-3 col-md-6 wow fadeInUp padding-0" data-wow-delay="200ms">
                        <!-- <a href="<?php echo URLROOT; ?>/home/all_colleges"> -->

                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <span class="icon-family"></span>
                                    </div>
                                </div>
                                <h3 class="services-two__title">EXPLORE COLLEGES</h3>
                                <!-- <p class="services-two__text">Find Top Colleges, Courses & more.<br/></p> -->
                                <p class="services-two__text">Coming Soon...<br/></p>

                            </div>
                            <!-- </a> -->
                        </div>
                        <!--Services Two Single End-->
                        <!--Services Two Single Start-->
                        <div class="col-xl-4 col-lg-3 col-md-6 wow fadeInUp padding-0" data-wow-delay="300ms">
                        <!-- <a href="<?php echo URLROOT; ?>/home/all_schools"> -->
                        

                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <span class="icon-home"></span>
                                    </div>
                                </div>
                                <h3 class="services-two__title">EXPLORE SCCHOOLS</h3>
                                <!-- <p class="services-two__text">Find Best Schools, Facilities & more.<br/></p> -->
                                <p class="services-two__text">Coming Soon...<br/></p>

                            </div>
                            <!-- </a> -->
                        </div>
                        <!--Services Two Single End-->
                        <!--Services Two Single Start-->
            
                        

                        <!-- <div class="col-xl-3 col-lg-2 col-md-6 wow fadeInUp padding-0" data-wow-delay="400ms">
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <span class="icon-heart-beat"></span>
                                    </div>
                                </div>
                                <h3 class="services-two__title"><a href="#">MULTIPLE INTELLIGENCES WORKSHOP</a>
                                </h3>
                                <p class="services-two__text"><span title="To manage their own learning & value their individual strength.">Now let's join hands together & make a change!!!</span>
<br></p>
                            </div>
                        </div> -->
                   
                        <!--Services Two Single End-->
                        <!--Services Two Single Start-->
                        <!-- <div class="col-xl-3 col-lg-2 col-md-6 wow fadeInUp padding-0" data-wow-delay="400ms">
                            <div class="services-two__single">
                                <div class="services-two__icon-box">
                                    <div class="services-two__icon">
                                        <span class="icon-heart-beat"></span>
                                    </div>
                                </div>
                                <h3 class="services-two__title"><a href="#">WEBINAR</a>
                                </h3>
                                <p class="services-two__text">Get connected with Mentors and Top Professionals. Explore New Topics<br></p>
                            </div>
                        </div> -->

                   
                        <!--Services Two Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!-- end card -->

<section class="about-one">
    <!-- <div class="about-one-bg wow slideInRight" data-wow-delay="100ms"
            data-wow-duration="2500ms" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/about-one-bg.png);"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <!-- <div class="about-one__img">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/resources/about-one-img-1.jpg" alt="">
                                </div>
                                <div class="about-one__img-two">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/resources/about-one-img-2.jpg" alt="">
                                </div> -->
                        <div class="about-one__img">
                            <img src="<?php echo URLROOT; ?>/assets_home/images/schools/learning_concept.png" alt="">
                        </div>

                        <div class="about-one__experience">
                            <h2 class="about-one__experience-year">3</h2>
                            <p class="about-one__experience-text">Years of <br> Experience</p>
                        </div>
                        <!-- <div class="about-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/about-one-shape-1.jpg" alt="">
                                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <div class="section-sub-title-box">
                            <p class="section-sub-title">SCHOLARSHIP</p>
                            <div class="section-title-shape-1">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                            </div>
                            <div class="section-title-shape-2">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                            </div>
                        </div>
                        <h2 class="section-title__title">We provide the best Scholarship policy</h2>
                    </div>
                    <p class="about-one__text-1">At OodlesIn, we provide you with the best Scholarship that you are eligible and are interested in. </p>
                    <ul class="list-unstyled about-one__points">
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>We offers CSR solutions to our ecosystem partners<br> that are measurable and impactful.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Flexibility to corporates to design their<br>scholarship funding schemes.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>We manage Scholarship end-to-end through our <br>technology driven platform - from online application,<br> tracking to granting scholarship.</p>
                            </div>
                        </li>
                    </ul>
                    <p class="about-one__text-2">Through OodlesIN platform, students can take 10 to 15 min curriculum-based quizzes and earn coins as rewards. Earned coins can then be used to redeemed (as Pocket Scholarship or invest in sectors to multiply the earned Scholarship). </p>


                    <!-- Pattern to shorten the texts -->
                    <!-- <span class="teaser">text goes here</span>

<span class="complete"> this is the 
complete text being shown</span>

<span class="more">more...</span> -->



                    <div class="about-one__btn-call">
                        <div class="about-one__btn-box">
                            <a href="<?php echo URLROOT ?>/home/about" class="thm-btn about-one__btn">Discover More</a>
                        </div>
                        <div class="about-one__call">
                            <div class="about-one__call-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="about-one__call-content">
                                <a href="tel:8151000945">+91 81510 00945</a>
                                <p>Call to Our Experts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About One End-->

<Section class="counter-one">
    <div class="counter-one-shape-1 float-bob-y">
        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/counter-one-shape-1.png" alt="">
    </div>
    <div class="counter-one-shape-2 float-bob-y">
        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/counter-one-shape-2.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <!--Counter One Single Start-->
            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="counter-one__single">
                    <div class="counter-one__top">
                        <div class="counter-one__icon">
                            <span class="icon-Scholarship-1"></span>
                        </div>
                        <div class="counter-one__count-box">
                            <div class="counter-one__count-box-inner">
                                <h3 class="odometer" data-count="2.6">00</h3>
                                <span class="counter-one__plus">k</span>
                            </div>
                        </div>
                    </div>
                    <p class="counter-one__text">Gave Scholarship</p>
                </div>
            </div>
            <!--Counter One Single End-->
            <!--Counter One Single Start-->
            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="counter-one__single">
                    <div class="counter-one__top">
                        <div class="counter-one__icon">
                            <span class="icon-group"></span>
                        </div>
                        <div class="counter-one__count-box">
                            <div class="counter-one__count-box-inner">
                                <h3 class="odometer" data-count="89">00</h3>
                                <span class="counter-one__plus">+</span>
                            </div>
                        </div>
                    </div>
                    <p class="counter-one__text">Professional team</p>
                </div>
            </div>
            <!--Counter One Single End-->
            <!--Counter One Single Start-->
            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                <div class="counter-one__single">
                    <div class="counter-one__top">
                        <div class="counter-one__icon">
                            <span class="icon-life-Scholarship"></span>
                        </div>
                        <div class="counter-one__count-box">
                            <div class="counter-one__count-box-inner">
                                <h3 class="odometer" data-count="2.8">00</h3>
                                <span class="counter-one__plus">k</span>
                            </div>
                        </div>
                    </div>
                    <p class="counter-one__text">Satisfied Students</p>
                </div>
            </div>
            <!--Counter One Single End-->
            <!--Counter One Single Start-->
            <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                <div class="counter-one__single">
                    <div class="counter-one__top">
                        <div class="counter-one__icon">
                            <span class="icon-success"></span>
                        </div>
                        <div class="counter-one__count-box">
                            <div class="counter-one__count-box-inner">
                                <h3 class="odometer" data-count="99">00</h3>
                                <span class="counter-one__plus">%</span>
                            </div>
                        </div>
                    </div>
                    <p class="counter-one__text">Our success rate</p>
                </div>
            </div>
            <!--Counter One Single End-->
        </div>
    </div>
</Section>


<!--Services One Start-->
<section class="process">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">work process</p>
                <div class="section-title-shape-1">
                    <img src="<?php echo URLROOT ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                </div>
                <div class="section-title-shape-2">
                    <img src="<?php echo URLROOT ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Our 4 Step Scholarship Cycle</h2>
        </div>
        <div class="process__inner">
            <div class="process-shape-1">
                <img src="<?php echo URLROOT ?>assets_home/images/shapes/process-shape-1.png" alt="">
            </div>
            <div class="process-shape-2">
                <img src="<?php echo URLROOT ?>assets_home/images/shapes/process-shape-1.png" alt="">
            </div>
            <div class="row">
                <!--Process Single Start-->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-select"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Apply Scholarship</h3>
                            <p class="process__text">Choose the scholarship that you’re eligible for and the one that suits your profile.</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single process__single-3">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-agreement"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Application Screening</h3>
                            <p class="process__text">Your Application will then be carefully scrutinized with over AI tools and a telephonic and face to face interview round will be scheduled to shortlist candidates.</p>
                        </div>
                    </div>
                </div>

                <!--Process Single End-->
                <!--Process Single Start-->

                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single process__single-2">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-meeting"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">

                            <h3 class="process__title">Schedule meeting</h3>
                            <p class="process__text">As soon as you choose scholarship and apply for the same, a request will be created after which our executive will schedule a meeting with you online or in-person.</p>
                        </div>
                    </div>
                </div>
                <!--Process Single End-->
                <!--Process Single Start-->
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="process__single process__single-4">
                        <div class="process__icon-box">
                            <div class="process__icon">
                                <span class="icon-insurance"></span>
                            </div>
                            <div class="process__count"></div>
                        </div>
                        <div class="process__content">
                            <h3 class="process__title">Scholarship Grant</h3>
                            <p class="process__text">

                                <span class="teaser"> Based on the applications, scholars will be selected and then be infomed and asked for document submission for granting scholarship.Post submission, scholars will receive scholarship </span> <span class="complete">amount. It is to be noted that applying for scholarship does not guarantee the same.</span><span class="more">more...</span>
                            </p>



                        </div>

                    </div>
                </div>
                <!--Process Single End-->
            </div>
        </div>

    </div>
</section>
<!--Services One End-->

<section class="brand-one" style="background:#fefefe">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="brand-one__title">
                    <div style="font-size:25px;color:orange;">Trusted and used by more then 800 Schools</div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="brand-one__main-content">
                    <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                        "0": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "375": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "575": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        },
                        "767": {
                            "spaceBetween": 50,
                            "slidesPerView": 4
                        },
                        "991": {
                            "spaceBetween": 50,
                            "slidesPerView": 5
                        },
                        "1199": {
                            "spaceBetween": 100,
                            "slidesPerView": 5
                        }
                    }}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/joseph100.jpg"  style=" z-index: 1" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/cms100.jpg" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/dps100.png" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/kps100.png" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/kv100.png" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/joseph100.jpg" alt="">
                            </div>
                            <!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/cms100.jpg" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/dps100.png" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/kps100.png" alt="">
                            </div><!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/school_16780/kv100.png" alt="">
                            </div><!-- /.swiper-slide -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>
<!--Why Choose One Start-->

<section class="about-two">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="about-two__left">
                    <div class="section-title text-left">
                        <div class="section-sub-title-box">
                            <p class="section-sub-title">QUIZ</p>
                            <div class="section-title-shape-1">
                                <img src="<?php echo URLROOT ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                            </div>
                            <div class="section-title-shape-2">
                                <img src="<?php echo URLROOT ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                            </div>
                        </div>
                        <h2 class="section-title__title">Get reliable & quick Scholarship for any degree</h2>
                    </div>
                    <p class="about-two__text">OodlesIN is a AI based platform that helps student get Scholarship based on their profile. The process makes it easy for students to pursue courses from their desired institutes. <br><br>We are a one stop platform for career guidance and learning needs of students. Explore OodlesIn and earn pocket Scholarship through curriculum based quizzes and more…</p>
                    <ul class="list-unstyled about-two__points">
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Curriculum Based Quizzes</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Pocket Scholarship</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Repository of Schools & Colleges Info</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Career Guidance & Mentoring</p>
                            </div>
                        </li>
                    </ul>
                    <a href="<?php echo URLROOT ?>/home/about" class="thm-btn about-two__btn">Discover More</a>
                </div>
            </div>
            <div class="col-xl-5">
                <!-- <div class="about-two__middle">
                            <div class="about-two__img-box">
                                <div class="about-two__img">
                                    <img src="assets_home/images/resources/about-two-img-1.jpg" alt="">
                                </div>
                                <div class="about-two__awards-box">
                                    <div class="about-two__awards-inner">
                                        <h2 class="about-two__awards-year">12</h2>
                                        <p class="about-two__awards-content">School Awards Won</p>
                                        <div class="about-two__awards-shape-2">
                                            <img src="assets_home/images/shapes/about-two-awards-shape-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="about-two__dots float-bob-y">
                                    <img src="assets_home/images/shapes/about-two-dots.png" alt="">
                                </div>
                            </div>
                        </div> -->
            </div>
            <div class="col-xl-2">
                <div class="about-two__counter">
                    <ul class="list-unstyled about-two__counter-list">
                        <li>
                            <div class="about-two__counter-single">
                                <div class="about-two__counter-count count-box">
                                    <h3 class="count-text" data-speed="4000" data-stop="1234">00</h3>
                                </div>
                                <p class="about-two__counter-text-1">Schools completed</p>
                                <!-- <p class="about-two__counter-text-2">Nulla viverra tortor eu nulla pulvinar
                                            dignissim.</p> -->
                            </div>
                        </li>
                        <li>
                            <div class="about-two__counter-single">
                                <div class="about-two__counter-count count-box">
                                    <h3 class="count-text" data-speed="4000" data-stop="955">00</h3>
                                </div>
                                <p class="about-two__counter-text-1">Satisfied Students</p>
                                <!-- <p class="about-two__counter-text-2">Nulla viverra tortor eu nulla pulvinar
                                            dignissim.</p> -->
                            </div>
                        </li>
                        <li>
                            <div class="about-two__counter-single">
                                <div class="about-two__counter-count count-box">
                                    <h3 class="count-text" data-speed="4000" data-stop="100">00</h3>
                                    <span class="about-two__counter-percent">%</span>
                                </div>
                                <p class="about-two__counter-text-1">Application success rates</p>
                                <!-- <p class="about-two__counter-text-2">Nulla viverra tortor eu nulla pulvinar
                                            dignissim.</p> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!--Why Choose One End-->

<!--Get Scholarship Start-->

<!--Get Scholarship End-->

<!--Counter One Start-->

<!--Counter One End-->

<!--Team One Start-->


<!--Testimonial One Start-->
<section class="testimonial-three">
    <div class="container">
        <div class="testimonial-three__top">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonial-three__left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">Let's hear them...</p>
                                <div class="section-title-shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                                </div>
                                <div class="section-title-shape-2">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                                        </div>
                            </div>
                            <h2 class="section-title__title">What our Users are talking about?</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonial-three__right">
                        <p class="testimonial-three__right-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-three__bottom">
            <div class="row">
                <div class="col-xl-12">
                    <div class="owl-carousel owl-theme thm-owl__carousel testimonial-three__carousel" data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 30,
                                "nav": false,
                                "dots": true,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 2
                                    },
                                    "1200": {
                                        "items": 3
                                    }
                                }
                            }'>
                        <!--Testimonial Three Single Start-->
                        <div class="item">
                            <div class="testimonial-three__single">
                                <div class="testimonial-three__client-img-box">
                                    <div class="testimonial-three__client-img">
                                        <!-- <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-3-1.jpg" alt=""> -->
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/schools/profile.jpg" alt="">
                                    </div>
                                    <div class="testimonial-three__quote">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-three__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="testimonial-three__text">My experience with OodlesIn has been amazing. I had no idea there was a platform like this where I could brush my knowledge through daily quizzes and get rewarded for the same too. It has been a win-win game for me.</p>
                                <div class="testimonial-three__client">
                                    <h4 class="testimonial-three__client-name">Dharmesh Pradhan</h4>
                                    <p class="testimonial-three__client-sub-title">Student</p>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <div class="item">
                            <div class="testimonial-three__single">
                                <div class="testimonial-three__client-img-box">
                                    <div class="testimonial-three__client-img">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/schools/profile.jpg" alt="">
                                    </div>
                                    <div class="testimonial-three__quote">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-three__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="testimonial-three__text">With OodlesIn, I can now check the list of all available Scholarship month wise and apply for which I am eligible for, I like their automated and transparent process for providing Scholarship.</p>
                                <div class="testimonial-three__client">
                                    <h4 class="testimonial-three__client-name">Sameeksha Reddy</h4>
                                    <p class="testimonial-three__client-sub-title">Student</p>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <div class="item">
                            <div class="testimonial-three__single">
                                <div class="testimonial-three__client-img-box">
                                    <div class="testimonial-three__client-img">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/schools/profile.jpg" alt="">
                                    </div>
                                    <div class="testimonial-three__quote">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-three__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="testimonial-three__text">The platform is simply a one stop solution for students like me who are always in search of Scholarship to fund degree courses. All thanks to OodlesIn, I can now search the right Scholarship for myself.</p>
                                <div class="testimonial-three__client">
                                    <h4 class="testimonial-three__client-name">Aman Jain</h4>
                                    <p class="testimonial-three__client-sub-title">Student</p>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <div class="item">
                            <div class="testimonial-three__single">
                                <div class="testimonial-three__client-img-box">
                                    <div class="testimonial-three__client-img">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/schools/profile.jpg" alt="">
                                    </div>
                                    <div class="testimonial-three__quote">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-three__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="testimonial-three__text">I love the quiz platform of OodlesIn, I can daily come here and attend quiz from my subject matter and test my abilities and work on the same to improve my knowledge. The layout of the platform is really impressive.</p>
                                <div class="testimonial-three__client">
                                    <h4 class="testimonial-three__client-name">Divya Khatri</h4>
                                    <p class="testimonial-three__client-sub-title">Student</p>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <div class="item">
                            <div class="testimonial-three__single">
                                <div class="testimonial-three__client-img-box">
                                    <div class="testimonial-three__client-img">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/schools/profile.jpg" alt="">
                                    </div>
                                    <div class="testimonial-three__quote">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                    </div>
                                </div>
                                <div class="testimonial-three__star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="testimonial-three__text">One of my friend recommended me about OodlesIn, I had no idea that a platform like this existed, the platform allows to take curriculumn based quizzes and also provide the opportunity to learn and earn. Kudos! To the development team. </p>
                                <div class="testimonial-three__client">
                                    <h4 class="testimonial-three__client-name">Kritika Singh </h4>
                                    <p class="testimonial-three__client-sub-title">Student</p>
                                </div>
                            </div>
                        </div>
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <!-- <div class="item">
                                    <div class="testimonial-three__single">
                                        <div class="testimonial-three__client-img-box">
                                            <div class="testimonial-three__client-img">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-3-3.jpg" alt="">
                                            </div>
                                            <div class="testimonial-three__quote">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-three__star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-three__text">Pellentesque habitant morbi tristique
                                            senectus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec
                                            aliquet blandit enim feugiat mattis.</p>
                                        <div class="testimonial-three__client">
                                            <h4 class="testimonial-three__client-name">Kevin Martin</h4>
                                            <p class="testimonial-three__client-sub-title">Student</p>
                                        </div>
                                    </div>
                                </div> -->
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <!-- <div class="item">
                                    <div class="testimonial-three__single">
                                        <div class="testimonial-three__client-img-box">
                                            <div class="testimonial-three__client-img">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-3-1.jpg" alt="">
                                            </div>
                                            <div class="testimonial-three__quote">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-three__star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-three__text">Pellentesque habitant morbi tristique
                                            senectus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec
                                            aliquet blandit enim feugiat mattis.</p>
                                        <div class="testimonial-three__client">
                                            <h4 class="testimonial-three__client-name">Smith Vectoria</h4>
                                            <p class="testimonial-three__client-sub-title">Student</p>
                                        </div>
                                    </div>
                                </div> -->
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <!-- <div class="item">
                                    <div class="testimonial-three__single">
                                        <div class="testimonial-three__client-img-box">
                                            <div class="testimonial-three__client-img">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-3-2.jpg" alt="">
                                            </div>
                                            <div class="testimonial-three__quote">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-three__star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-three__text">Pellentesque habitant morbi tristique
                                            senectus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec
                                            aliquet blandit enim feugiat mattis.</p>
                                        <div class="testimonial-three__client">
                                            <h4 class="testimonial-three__client-name">Jessica Brown</h4>
                                            <p class="testimonial-three__client-sub-title">Student</p>
                                        </div>
                                    </div>
                                </div> -->
                        <!--Testimonial Three Single End-->
                        <!--Testimonial Three Single Start-->
                        <!-- <div class="item">
                                    <div class="testimonial-three__single">
                                        <div class="testimonial-three__client-img-box">
                                            <div class="testimonial-three__client-img">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-3-3.jpg" alt="">
                                            </div>
                                            <div class="testimonial-three__quote">
                                                <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                            </div>
                                        </div>
                                        <div class="testimonial-three__star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-three__text">Pellentesque habitant morbi tristique
                                            senectus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec
                                            aliquet blandit enim feugiat mattis.</p>
                                        <div class="testimonial-three__client">
                                            <h4 class="testimonial-three__client-name">Kevin Martin</h4>
                                            <p class="testimonial-three__client-sub-title">Student</p>
                                        </div>
                                    </div>
                                </div> -->
                        <!--Testimonial Three Single End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonial One End-->
        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="contact-page__left">
                            <div class="section-title text-left">
                                <div class="section-sub-title-box">
                                    <p class="section-sub-title">Contact us</p>
                                    <div class="section-title-shape-1">
                                        <img src="<?php echo URLROOT?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                                    </div>
                                    <div class="section-title-shape-2">
                                        <img src="<?php echo URLROOT?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                                    </div>
                                </div>
                                <h2 class="section-title__title">Feel free to get in touch with us.</h2>
                            </div>
                            <div class="contact-page__call-email">
                                <div class="contact-page__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-page__call-email-content">
                                    <h4>
                                        <a href="tel:8151000945" class="contact-page__call-number">+91 81510 00945</a>
                                        <a href="mailto:connect@oodlesin.com" target="_blank" class="contact-page__email">connect@oodlesin.com</a>
                                    </h4>
                                </div>
                            </div>
                            <!-- <p class="contact-page__location-text">30 Commecial Broklyn Road <br> Fratton, Australia</p> -->
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-page__right">
                            <div class="contact-page__form">
                                <form action="<?php echo URLROOT?>/home/add_comment_home" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="text" placeholder="Your name" name="name" class="input_oodles">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="email" placeholder="Email address" name="email" class="input_oodles">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="text" placeholder="Phone number" name="phone" class="input_oodles">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="comment-form__input-box">
                                                <input type="text" placeholder="Subject" name="subject" class="input_oodles">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment-form__input-box text-message-box">
                                                <textarea name="message" placeholder="Write a message" class="input_oodles"></textarea>
                                            </div>
                                            <div class="comment-form__btn-box">
                                                <button type="submit" class="thm-btn comment-form__btn">Send a Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->


<section class="download">
    <!-- <div class="download-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/backgrounds/download-bg.png);"></div> -->
    <div class="download-shape-1 float-bob-y">
        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/download-shape-1.png" alt="">
    </div>
    <div class="download-shape-2 float-bob-x">
        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/download-shape-2.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-6">
                <div class="download__left">
                    <p class="download__sub-title">Get our application free now! Protect yourself</p>
                    <h3 class="download__title">Download our application</h3>
                    <div class="download__apps">
                        <div class="download__app-one">
                            <a href="#">
                                <i class="fa fa-play"></i>
                                <p> <span>Download on</span> <br> Google Play</p>
                            </a>
                        </div>
                        <!-- <div class="download__app-one download__app-one--two">
                            <a href="#">
                                <i class="fab fa-apple"></i>
                                <p> <span>get it on</span> <br> Play Store</p>
                            </a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="download__right">
                    <div class="download__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <img src="<?php echo URLROOT; ?>/assets_home/images/resources/download-img-1.png" alt="">
                        <div class="download__badge">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team One End-->



<!--News One Start-->

<!--News One End-->

<!--Tracking Start-->
<!-- <section class="tracking">
            <div class="container">
                <div class="tracking__inner">
                    <div class="tracking-shape-1 float-bob-y">
                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/tracking-shape-1.png" alt="">
                    </div>
                    <div class="tracking-shape-2 float-bob-x">
                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/tracking-shape-2.png" alt="">
                    </div>
                    <div class="tracking-shape-3 float-bob-x">
                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/tracking-shape-3.png" alt="">
                    </div>
                    <div class="tracking-shape-4 float-bob-y">
                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/tracking-shape-4.png" alt="">
                    </div>
                    <div class="tracking__left">
                        <div class="tracking__icon">
                            <span class="icon-folder"></span>
                        </div>
                        <div class="tracking__content">
                            <p class="tracking__sub-title">Quisque vel ortor</p>
                            <h3 class="tracking__title">Start tracking your Applications</h3>
                        </div>
                    </div>
                    <div class="tracking__btn-box">
                        <a href="#" class="thm-btn tracking__btn">Track Your Application</a>
                    </div>
                </div>
            </div>
        </section> -->
<!--Tracking End-->

<!--Site Footer Start-->


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script>
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
<!-- Login modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="<?php echo URLROOT; ?>/home/home_user_login ?>" autocomplete="off" class="register-form">
                                                    <div class="modal-body">
                                                  <div class="form-group">
                                                            <!-- <h2 class="form-title">Login</h2><br> -->
                                                            <div class="">  
                                                                <input type="text" name="username" placeholder="Your Email ID / Mobile No" class="valo form-control input-height" />
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <div class="">
                                                                <input type="password" name="password" placeholder="Password" class="valo form-control input-height" />
                                                            </div>
                                                        </div>


                                                        <div class="form-group form-button" style="text-align:right;">
                                                            <a href="<?php echo URLROOT; ?>/student/forgot_password" class="signup-image-link">Forgot Password?</a>

                                                        </div>
                                                        <!-- style="float:right"  -->
                                                        <div class="form-group form-button" style="text-align: center;">
                                                            <!-- <button class="thm-btn comment-form__btn" type="submit">Login</button> -->
                                                            <!-- <button class="btn btn-round btn-primary" type="submit" >Login</button> -->
                                                            <!-- <button class="thm-btn main-menu__main-menu-box-get-quote-btn-left" type="submit">Login</button> -->
                                                        </div>


                                                        <div class="social-login" style="text-align: center;">
                                                            <br>

                                                            <a href="<?php echo URLROOT; ?>/student/register"><span class="social-label">Don't have an account? Create an account</span></a>


                                                        </div>
                                                    </div>
                                       
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button class="btn btn-round btn-primary" type="submit">Login</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Modal end -->
<?php require APPROOT . "/views/inc_home/footer.php"; ?>

