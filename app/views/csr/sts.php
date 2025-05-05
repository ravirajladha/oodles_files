  <!--Site Header Start-->
  <?php require APPROOT . "/views/inc_csr/header.php"; ?>  

        <!-- <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div> -->
        <!-- /.stricky-header -->



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

         <!--Get Insurance Start-->
         <section class="get-insurance">
            <div class="get-insurance-bg" style="background-image: url(<?php echo URLROOT; ?>/assets_home/images/about/first_banner.jpg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="get-insurance__left">
                            <div class="get-insurance__img wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                                <!-- <img src="<?php echo URLROOT; ?>/assets_home/images/resources/get-insurance-img-1.png" alt=""> -->
                            </div>
                            <!-- <div class="get-insurance__author">
                                <p>Aleesha Rose</p>
                            </div> -->
                            <!-- <div class="get-insurance__circle"></div> -->
                            <div class="get-insurance__shape-1 float-bob-x">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/about/second_banner.jpg" alt="">
                            </div>
                            <!-- size: 1919*900 -->
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="get-insurance__right">
                            <div class="section-title text-left">
                                <div class="section-sub-title-box">
                                    <p class="section-sub-title">Request a call back </p>
                                    <div class="section-title-shape-1">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-1.png" alt="">
                                    </div>
                                    <div class="section-title-shape-2">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/section-title-shape-2.png" alt="">
                                    </div>
                                </div>
                                <!-- <h2 class="section-title__title">Get an insurance quote <br> to get started!</h2> -->
                            </div>
                            <div class="get-insurance__tab">
                                <div class="get-insurance__tab-box tabs-box">
                                  
                                    <div class="tabs-content">
                                        <!--tab-->
                                        <div class="tab active-tab" id="home2">
                                            <div class="get-insurance__content">
                                             
                                                <form method="post" action="<?php echo URLROOT; ?>/csr/add_enquiry" enctype="multipart/form-data" class="get-insurance__form">
                                                    <div class="get-insurance__content-box">
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Enter your full name*" name="name" required class="input_oodles">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Enter your company name*" name="company_name" required class="input_oodles">
                                                        </div>
                                                      
                                                        <div class="get-insurance__input-box">
                                                            <input type="email" placeholder="Enter your business email*" name="business_email" required class="input_oodles">
                                                        </div>
                                                        <div class="get-insurance__input-box ">
                                                            <input type="number" placeholder="Enter your mobile number*" name="phone_no" required class="input_oodles">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Enter designation*" name="designation" required class="input_oodles">
                                                        </div>
                                                        <div class="get-insurance__input-box">
                                                            <input type="text" placeholder="Comment*" name="comment" required class="input_oodles">
                                                        </div>
                                                        <!-- <div class="get-insurance__input-box">
                                                            <select class="selectpicker" aria-label="Default select example">
                                                                <option selected>Select educational background</option>
                                                                <option value="1">School</option>
                                                                <option value="2">College</option>
                                                                <option value="3">Institute</option>
                                                            </select>
                                                        </div> -->
                                                    </div>
                                                    <button type="submit" class="thm-btn get-insurance__btn">Submit Now</button>
                                                </form>
                                            </div>
                                        </div>
                                        
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Get Insurance End-->
   
<br>
 <!--Benefits Two Start-->
 <section class="benefits-two_new">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="benefits-two__left">
                            <div class="benefits-two__img">
                                <img src="<?php echo URLROOT; ?>/assets_home/images/resources/benefits-two-img.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="why-choose-two__left">
                            <div class="section-title text-left">
                                <div class="section-sub-title-box">
                                <p class="section-sub-title"><h1>Overview</h1></p><br>
                                    <div class="section-title-shape-1">
                                        <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                                    </div>
                                    <div class="section-title-shape-2">
                                        <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                                    </div>
                                </div>
                                <p class="why-choose-two__text" style="text-align: justify;
  text-justify: inter-word;">Have you ever wondered what happens to students after they get a scholarship? Does your role end after giving them a scholarship? Is your mission accomplished? Did you achieve your CSR objective? Reports suggest that many students fail to fully utilize the benefits of the scholarships offered to them due to various contributing factors such as family situation, lack of guidance and mentorship and absence of a tracking mechanism.</p>
                            </div>
                            <p class="why-choose-two__text" style="text-indent:50px; text-align: justify;
  text-justify: inter-word;">To address this challenge, we designed the Scholar Tracking System (STS), an online monitoring tool that keeps track of scholars’ performance and progress. STS allows scholarship providers to monitor the academic performance of their scholars.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Benefits Two End-->
 <!--Insurance Page Two Start-->
 <section class="insurance-page-two_new">
            <div class="container">
                <div class="row">
                <div class="col-xl-12 text-center ">
               
               <h1>Benefits<br> </br></h1>
</div>
           <div class="col-xl-12 text-center">
          
           
</div>
                    <!--Services Two Single Start-->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-drive"></span>
                                </div>
                            </div><br>
                            <h3 class="services-two__title"><a href="#">Monitor renewal based scholarships</a></h3>
                            <br><p class="services-two__text">Monitor the academic performance of the scholars, for scholarships offered in instalments or renewed every year, using an online panel.</p>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-family"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Keep track of scholarship amount disbursed</a></h3>
                            <p class="services-two__text">STS allows providers to keep a detailed track of total scholarship amount disbursed, number of instalments given to each scholar, and utilization of the disbursed fund.</p>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-home"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Step-by-step scholar tracking.</a></h3>
                            <p class="services-two__text">Track how scholars are using the scholarship money by monitoring the records of academic mark sheets, fee receipts, and related academic expenses done by the scholar using the scholarship money.</p>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-heart-beat"></span>
                                </div>
                            </div>
                            <br>  <h3 class="services-two__title"><a href="#">Control scholarship disbursement</a></h3>
                            <br> <p class="services-two__text">Schedule the next instalment release only when you are satisfied with the performance of the scholar in the current year.</p>
                        </div>
                    </div>
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
                 <!--   <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-briefcase"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Lorem, ipsum.</a></h3>
                            <p class="services-two__text">Lorem ipsum dolor sit amet, sed consectetur adipiscing rutrum metus et elit.</p>
                        </div>
                    </div>-->
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
            <!--        <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-fire"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Lorem, ipsum.</a></h3>
                            <p class="services-two__text">Lorem ipsum dolor sit amet, sed consectetur adipiscing rutrum metus et elit.</p>
                        </div>
                    </div>-->
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
             <!--         <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-ring"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Lorem, ipsum.</a></h3>
                            <p class="services-two__text">Lorem ipsum dolor sit amet, sed consectetur adipiscing rutrum metus et elit.</p>
                        </div>
                    </div>-->
                    <!--Services Two Single End-->
                    <!--Services Two Single Start-->
               <!--      <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services-two__single">
                            <div class="services-two__icon-box">
                                <div class="services-two__icon">
                                    <span class="icon-plane"></span>
                                </div>
                            </div>
                            <h3 class="services-two__title"><a href="#">Lorem, ipsum.</a></h3>
                            <p class="services-two__text">Lorem ipsum dolor sit amet, sed consectetur adipiscing rutrum metus et elit.</p>
                        </div>
                    </div>-->
                    <!--Services Two Single End-->
                </div>
            </div>
        </section>
        <!--Insurance Page Two End-->

         <!--Brand One Start-->
         <section class="brand-one">
            <div class="container">
           
                <div class="row">
                <div class="col-xl-12">
                    <h1> Clients</h1>
</div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="brand-one__title">
                            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus illum nam consequatur, magnam harum eveniet ab eius sint fugit quibusdam.</h2>
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
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-1.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-2.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-3.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-4.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-5.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-1.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-2.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-3.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-4.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                    <div class="swiper-slide">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/brand/brand-1-5.png" alt="">
                                    </div><!-- /.swiper-slide -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <!--Brand One End-->
 <!--Testimonial Page Start-->
 <section class="testimonial-carousel-page_new">
            <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center ">
               
                    <h1> Testimonials<br> </br></h1>
</div>
                <div class="col-xl-12 text-center">
               
                
</div>
                <div class="owl-carousel owl-theme thm-owl__carousel testimonial-carousel__box carousel-dot-style" data-owl-options='{
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
                            "items": 2
                        }
                    }
                }'>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-1.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-2.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-3.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-4.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-5.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-one__single">
                            <div class="testimonial-one__single-inner">
                                <div class="testimonial-one__shape-1">
                                    <img src="<?php echo URLROOT; ?>/assets_home/images/shapes/testimonial-one-shape-1.png" alt="">
                                </div>
                                <div class="testimonial-one__client-info">
                                    <div class="testimonial-one__client-img-box">
                                        <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-6.jpg" alt="">
                                        <div class="testimonial-one__quote">
                                            <img src="<?php echo URLROOT; ?>/assets_home/images/testimonial/testimonial-1-quote.png" alt="">
                                        </div>
                                    </div>
                                    <div class="testimonial-one__client-content">
                                        <div class="testimonial-one__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="testimonial-one__client-details">
                                            <h3 class="testimonial-one__client-name">Lorem, ipsum.</h3>
                                            <p class="testimonial-one__client-sub-title">STUDENT</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="testimonial-one__text">Pellentesque habitant morbi tristique senectus netus et malesuada fames ac turp egestas. Aliquam viverra arcu. Donec aliquet blandit enim feugiat mattis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Page End-->


        <?php require APPROOT . "/views/inc_csr/footer.php"; ?>